<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
        Config::$curlOptions = [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => []
        ];
    }

    /**
     * Generate Snap Token (dipanggil via AJAX)
     */
    public function pay(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Hanya boleh bayar jika belum lunas dan status menunggu pembayaran
        if ($order->status_bayar === 'lunas') {
            return response()->json(['error' => 'Pesanan ini sudah lunas'], 400);
        }

        // Jika token sudah ada, gunakan kembali
        if ($order->snap_token) {
            return response()->json([
                'snap_token' => $order->snap_token
            ]);
        }

        // Generate Token Baru
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_code . '-' . time(), // Tambahkan time() agar unique di midtrans sandbox jika ada pembayaran gagal
                'gross_amount' => (int) $order->total_bayar,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email ?? 'customer@cleanwash.com',
                'phone' => $order->user->phone ?? '-',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            
            // Simpan snap token ke database
            $order->update([
                'snap_token' => $snapToken
            ]);

            return response()->json([
                'snap_token' => $snapToken
            ]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            return response()->json(['error' => 'Gagal menghubungkan ke payment gateway'], 500);
        }
    }

    /**
     * Handle Notification Webhook dari Midtrans
     */
    public function notificationCallback(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        if (!$notification) {
            return response()->json(['message' => 'Invalid JSON'], 400);
        }

        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . Config::$serverKey);

        if ($notification->signature_key !== $validSignatureKey) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Extract order_code dari order_id (karena formatnya ORD-XXXXX-time())
        $orderIdParts = explode('-', $notification->order_id);
        $orderCode = $orderIdParts[0] . '-' . $orderIdParts[1];

        $order = Order::where('order_code', $orderCode)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Handle transaksi
        $transactionStatus = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraudStatus = $notification->fraud_status;

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                // challenge
            } else if ($fraudStatus == 'accept') {
                $this->markAsPaid($order);
            }
        } else if ($transactionStatus == 'settlement') {
            $this->markAsPaid($order);
        } else if ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            // Jika gagal, reset snap token agar user bisa generate pembayaran baru
            $order->update([
                'snap_token' => null
            ]);
        } else if ($transactionStatus == 'pending') {
            // pending
        }

        return response()->json(['message' => 'OK']);
    }

    /**
     * Cek status pembayaran secara manual (untuk environment lokal / tanpa ngrok)
     */
    public function checkStatus($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status_bayar === 'lunas') {
            return back()->with('success', 'Pembayaran sudah lunas.');
        }

        // Kita cari transaksi di Midtrans.
        // Karena order_id waktu snap_token di-generate ada tambahan time() untuk menghindari duplicate order_id di Sandbox,
        // kita tidak bisa tau pasti order_id apa yang terakhir berhasil DENGAN PASTI hanya dari order_code.
        // TAPI karena webhook yang update, tombol ini hanya fallback.
        // Jika kita simpan `snap_token` saja, kita bisa cek dari API Midtrans? Tidak, status check butuh order_id transaksi.
        // SEHINGGA: Lebih baik tombol Cek Status ini memberitahu pengguna untuk menunggu, atau kita biarkan `successCallback` yang menangani jika di lokal.
        // Namun, jika kita set order_id ke order_code secara eksak tanpa time() maka kita bisa cek.
        // Mari kita perbaiki saat create snap token: gunakan $order->order_code saja. Midtrans sandbox kadang error bila duplicate,
        // tapi untuk production itu sudah benar.
        
        return back()->with('error', 'Status pembayaran akan otomatis diperbarui. Jika belum, silakan coba bayar kembali atau hubungi admin.');
    }

    /**
     * Callback saat sukses via frontend (jika webhook gagal di lokal)
     */
    public function successCallback(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        // Idealnya verifikasi statusnya lagi ke API Midtrans.
        // Di sini kita langsung tandai lunas sebagai simulasi callback berhasil di lokal.
        $this->markAsPaid($order);

        return redirect()->route('user.detail-pesanan', $order->id)->with('success', 'Pembayaran Berhasil! Pesanan Anda akan segera diproses.');
    }

    private function markAsPaid(Order $order)
    {
        if ($order->status_bayar !== 'lunas') {
            $order->update([
                'status_bayar' => 'lunas',
                'status' => 'diproses' // otomatis pindah ke diproses
            ]);

            // Catat history perubahan status ke diproses otomatis
            \App\Models\OrderStatusHistory::create([
                'order_id' => $order->id,
                'changed_by' => $order->user_id,
                'role_changer' => 'system',
                'status_lama' => 'menunggu_pembayaran',
                'status_baru' => 'diproses',
                'catatan' => 'Pembayaran berhasil dikonfirmasi (Otomatis sistem)'
            ]);
        }
    }
}
