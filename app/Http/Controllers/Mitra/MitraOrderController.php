<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatusHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraOrderController extends Controller
{
    // ── Daftar semua pesanan mitra ────────────────────────
    public function index(Request $request)
    {
        // AMAN: Cek apakah user benar-benar punya data mitra laundry
        $mitra = Auth::user()->mitraLaundry;

        if (!$mitra) {
            return redirect()->route('mitra.pesanan') // sesuaikan dengan route dashboard kamu
                             ->with('error', 'Akun Anda belum terdaftar sebagai Mitra Laundry atau data profil belum lengkap.');
        }

        $mitraId = $mitra->id;

        $query = Order::with(['user', 'items'])
                      ->where('mitra_laundry_id', $mitraId);

        // Filter tab
        if ($request->tab && $request->tab !== 'semua') {
            if ($request->tab === 'proses') {
                $query->whereIn('status', ['aktif', 'pickup', 'diproses', 'pengantaran']);
            } else {
                $query->where('status', $request->tab);
            }
        }

        // Search
        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_code', 'like', "%$search%")
                  ->orWhereHas('user', fn($u) => $u->where('name', 'like', "%$search%"));
            });
        }

        $orders = $query->orderByDesc('created_at')->paginate(10);

        // Stats
        $stats = [
            'total'   => Order::where('mitra_laundry_id', $mitraId)->count(),
            'proses'  => Order::where('mitra_laundry_id', $mitraId)
                              ->whereIn('status', ['masuk', 'aktif', 'pickup', 'diproses', 'pengantaran'])
                              ->count(),
            'selesai' => Order::where('mitra_laundry_id', $mitraId)
                              ->where('status', 'selesai')
                              ->count(),
        ];

        return view('mitra.pesanan.pesanan_saya', compact('orders', 'stats'));
    }

    // ── Detail pesanan ────────────────────────────────────
    public function show($id)
    {
        // AMAN: Cek ketersediaan mitra
        $mitra = Auth::user()->mitraLaundry;

        if (!$mitra) {
            return redirect()->route('mitra.dashboard')->with('error', 'Data mitra tidak ditemukan.');
        }

        $mitraId = $mitra->id;

        $pesanan = Order::with(['user', 'items', 'statusHistories.changedBy'])
                        ->where('mitra_laundry_id', $mitraId)
                        ->findOrFail($id);

        return view('mitra.pesanan.detail_pesanan', compact('pesanan'));
    }

    // ── Terima pesanan ────────────────────────────────────
    public function terima($id)
    {
        $order = $this->getPesanan($id);

        if (!$order->isMasuk()) {
            return back()->withErrors(['error' => 'Pesanan tidak bisa diterima pada status ini.']);
        }

        $statusLama = $order->status;
        $order->update(['status' => 'aktif']);
        $this->catatHistory($order, $statusLama, 'aktif', 'Pesanan diterima oleh mitra');

        return redirect()->route('mitra.pesanan.detail', $id)
                         ->with('success', 'Pesanan berhasil diterima!');
    }

    // ── Tolak pesanan ─────────────────────────────────────
    public function tolak(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required|string|max:300',
        ]);

        $order = $this->getPesanan($id);

        if (!$order->isMasuk()) {
            return back()->withErrors(['error' => 'Pesanan tidak bisa ditolak pada status ini.']);
        }

        $statusLama = $order->status;
        $order->update([
            'status'       => 'dibatalkan',
            'alasan_batal' => $request->alasan,
        ]);
        $this->catatHistory($order, $statusLama, 'dibatalkan', $request->alasan);

        return redirect()->route('mitra.pesanan')
                         ->with('success', 'Pesanan ditolak.');
    }

    // ── Update status (aktif → pickup → diproses → pengantaran → selesai) ──
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_baru'  => 'required|in:pickup,diproses,pengantaran,selesai,gagal_pickup',
            'berat_aktual' => 'nullable|numeric|min:0.1',
            'catatan'      => 'nullable|string|max:300',
        ]);

        $order = $this->getPesanan($id);

        // Validasi flow status
        $allowedTransitions = [
            'aktif'        => ['pickup', 'gagal_pickup'],
            'pickup'       => ['diproses', 'gagal_pickup'],
            'diproses'     => ['pengantaran'],
            'pengantaran'  => ['selesai'],
        ];

        $allowed = $allowedTransitions[$order->status] ?? [];

        if (!in_array($request->status_baru, $allowed)) {
            return back()->withErrors([
                'error' => "Tidak bisa update dari status '{$order->status}' ke '{$request->status_baru}'."
            ]);
        }

        $updateData = ['status' => $request->status_baru];

        // Hitung ulang harga jika berat aktual diisi
        if ($request->berat_aktual) {
            $updateData['berat_aktual'] = $request->berat_aktual;
            $this->hitungUlangHarga($order, $request->berat_aktual);
        }

        // Jika gagal pickup, simpan alasan
        if ($request->status_baru === 'gagal_pickup') {
            $updateData['alasan_gagal'] = $request->catatan;
        }

        // Jika selesai, tandai lunas (kalau COD)
        if ($request->status_baru === 'selesai' && $order->metode_bayar === 'cod') {
            $updateData['status_bayar'] = 'lunas';
        }

        $statusLama = $order->status;
        $order->update($updateData);
        $this->catatHistory($order, $statusLama, $request->status_baru, $request->catatan);

        return redirect()->route('mitra.pesanan.detail', $id)
                         ->with('success', 'Status pesanan diperbarui!');
    }

    // ── Hitung ulang harga berdasarkan berat aktual ───────
    private function hitungUlangHarga(Order $order, float $beratAktual): void
    {
        $subtotal = 0;

        foreach ($order->items as $item) {
            if ($item->harga_per_kg) {
                $itemSubtotal = $item->harga_per_kg * $beratAktual;
            } else {
                $itemSubtotal = ($item->harga_satuan ?? 0) * $item->qty;
            }

            $item->update([
                'berat_aktual' => $beratAktual,
                'subtotal'     => $itemSubtotal,
            ]);

            $subtotal += $itemSubtotal;
        }

        $totalBayar = $subtotal + $order->ongkir - $order->diskon;

        $order->update([
            'subtotal'   => $subtotal,
            'total_bayar' => max(0, $totalBayar),
        ]);
    }

    // ── Helper ────────────────────────────────────────────
    private function getPesanan(int $id): Order
    {
        // AMAN: Mencegah error jika helper dipanggil tapi data mitra null
        $mitra = Auth::user()->mitraLaundry;
        
        if (!$mitra) {
            abort(403, 'Akses ditolak. Anda tidak memiliki toko mitra laundry.');
        }

        $mitraId = $mitra->id;
        return Order::where('mitra_laundry_id', $mitraId)->findOrFail($id);
    }

    private function catatHistory(Order $order, ?string $lama, string $baru, ?string $catatan = null): void
    {
        OrderStatusHistory::create([
            'order_id'     => $order->id,
            'changed_by'   => Auth::id(),
            'role_changer' => 'mitra',
            'status_lama'  => $lama,
            'status_baru'  => $baru,
            'catatan'      => $catatan,
            'created_at'   => now(),
        ]);
    }
}