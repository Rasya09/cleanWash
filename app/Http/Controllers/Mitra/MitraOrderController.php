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
            return redirect()->route('mitra.dashboard') // sesuaikan dengan route dashboard kamu
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

    // ── Gagal Pickup / Pembatalan ──────────────────────────
    public function gagalPickup(Request $request)
    {
        $mitra = Auth::user()->mitraLaundry;

        if (!$mitra) {
            return redirect()->route('mitra.dashboard')->with('error', 'Data mitra tidak ditemukan.');
        }

        $mitraId = $mitra->id;

        $query = Order::with(['user', 'items', 'statusHistories.changedBy'])
                      ->where('mitra_laundry_id', $mitraId)
                      ->whereIn('status', ['gagal_pickup', 'dibatalkan']);

        // Search
        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_code', 'like', "%$search%")
                  ->orWhereHas('user', fn($u) => $u->where('name', 'like', "%$search%"));
            });
        }

        $orders = $query->orderByDesc('updated_at')->paginate(10);

        // Stats
        // 1. Total Gagal Pickup (30 hari terakhir)
        $totalGagalPickup = Order::where('mitra_laundry_id', $mitraId)
            ->where('status', 'gagal_pickup')
            ->where('updated_at', '>=', now()->subDays(30))
            ->count();

        // 2. Dibatalkan Pelanggan (30 hari terakhir)
        $batalPelanggan = Order::where('mitra_laundry_id', $mitraId)
            ->where('status', 'dibatalkan')
            ->where('updated_at', '>=', now()->subDays(30))
            ->whereHas('statusHistories', function($q) {
                $q->where('status_baru', 'dibatalkan')
                  ->where('role_changer', 'customer');
            })
            ->count();

        // 3. Dibatalkan Mitra (30 hari terakhir)
        $batalMitra = Order::where('mitra_laundry_id', $mitraId)
            ->where('status', 'dibatalkan')
            ->where('updated_at', '>=', now()->subDays(30))
            ->whereHas('statusHistories', function($q) {
                $q->where('status_baru', 'dibatalkan')
                  ->where('role_changer', 'mitra');
            })
            ->count();

        // Jika riwayat pembatalan belum mencatat role secara akurat, kita estimasi jika query di atas 0 sementara ada pesanan dibatalkan
        $totalDibatalkan = Order::where('mitra_laundry_id', $mitraId)
            ->where('status', 'dibatalkan')
            ->where('updated_at', '>=', now()->subDays(30))
            ->count();
            
        if ($batalPelanggan == 0 && $batalMitra == 0 && $totalDibatalkan > 0) {
            // Asumsi default: dibatalkan oleh mitra jika kita tidak punya role yang spesifik
            $batalMitra = $totalDibatalkan;
        }

        // 4. Persentase Pembatalan (Total Batal+Gagal / Total Pesanan)
        $totalAllOrders = Order::where('mitra_laundry_id', $mitraId)->count();
        $totalBatalDanGagal = Order::where('mitra_laundry_id', $mitraId)->whereIn('status', ['gagal_pickup', 'dibatalkan'])->count();
        $persentase = $totalAllOrders > 0 ? round(($totalBatalDanGagal / $totalAllOrders) * 100, 1) : 0;

        $stats = [
            'gagal_pickup' => $totalGagalPickup,
            'batal_pelanggan' => $batalPelanggan,
            'batal_mitra' => $batalMitra,
            'persentase' => $persentase
        ];

        return view('mitra.pesanan.gagal_pickup', compact('orders', 'stats'));
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
                         ->with('success', 'Pesanan berhasil diterima!')
                         ->with('show_invoice_modal', true);
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
            'status_baru'  => 'required|string',
            'timbangan'    => 'nullable|array',
            'timbangan.*'  => 'nullable|numeric|min:0.1',
            'catatan'           => 'nullable|string|max:300',
            'foto_pickup'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'foto_pengantaran'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $order = $this->getPesanan($id);

        // Validasi flow status
        $allowedTransitions = [
            'aktif'               => ['pickup', 'gagal_pickup'],
            'pickup'              => ['menunggu_pembayaran', 'gagal_pickup'],
            'menunggu_pembayaran' => ['diproses'],
            'diproses'            => ['pengantaran'],
            'pengantaran'         => ['selesai'],
        ];

        $allowed = $allowedTransitions[$order->status] ?? [];

        if (!in_array($request->status_baru, $allowed)) {
            return back()->withErrors([
                'error' => "Tidak bisa update dari status '{$order->status}' ke '{$request->status_baru}'."
            ]);
        }

        $updateData = ['status' => $request->status_baru];
        
        if ($request->hasFile('foto_pickup')) {
            $updateData['foto_pickup'] = $request->file('foto_pickup')->store('orders/foto_pickup', 'public');
        }

        if ($request->hasFile('foto_pengantaran')) {
            $updateData['foto_pengantaran'] = $request->file('foto_pengantaran')->store('orders/foto_pengantaran', 'public');
        }

        // Hitung ulang harga jika ada input timbangan per item
        if ($request->has('timbangan') && is_array($request->timbangan)) {
            $this->hitungUlangHarga($order, $request->timbangan);
        }

        // Jika gagal pickup, simpan alasan (walaupun textareanya sudah diganti, ini fallback jika ada catatan)
        if ($request->status_baru === 'gagal_pickup' && $request->catatan) {
            $updateData['alasan_gagal'] = $request->catatan;
        }

        // Jika selesai, tandai lunas (kalau COD)
        if ($request->status_baru === 'selesai' && $order->metode_bayar === 'cod') {
            $updateData['status_bayar'] = 'lunas';
        }

        // Jika timbangan diinput, status pembayaran ikut berubah
        if ($request->status_baru === 'menunggu_pembayaran') {
            $updateData['status_bayar'] = 'menunggu_pembayaran';
        }

        $statusLama = $order->status;
        $order->update($updateData);

        if ($request->status_baru === 'menunggu_pembayaran') {
            // Catat history ditimbang juga agar muncul di timeline
            $this->catatHistory($order, $statusLama, 'ditimbang', 'Barang telah diinput timbangannya oleh mitra.');
            $this->catatHistory($order, 'ditimbang', 'menunggu_pembayaran', $request->catatan);
        } else {
            $this->catatHistory($order, $statusLama, $request->status_baru, $request->catatan);
        }

        if (in_array($request->status_baru, ['menunggu_pembayaran', 'pengantaran'])) {
            return redirect()->route('mitra.pesanan.detail', $id)
                             ->with('success', 'Status pesanan diperbarui!')
                             ->with('show_invoice_modal', true);
        }

        if ($request->status_baru === 'selesai') {
            return redirect()->route('mitra.pesanan.detail', $id)
                             ->with('success', 'Status pesanan diperbarui!')
                             ->with('show_review_modal', true);
        }

        return redirect()->route('mitra.pesanan.detail', $id)
                         ->with('success', 'Status pesanan diperbarui!');
    }

    // ── Hitung ulang harga berdasarkan timbangan per item ───────
    private function hitungUlangHarga(Order $order, array $timbanganData): void
    {
        $subtotal = 0;
        $totalBeratAktual = 0; // opsional, kita hitung kg nya

        foreach ($order->items as $item) {
            $inputVal = $timbanganData[$item->id] ?? null;
            if ($inputVal === null || $inputVal === '') continue;

            $inputVal = (float) $inputVal;

            $namaLayananLower = strtolower($item->nama_layanan);
            $isKiloan = str_contains($namaLayananLower, 'cuci kering') || str_contains($namaLayananLower, 'setrika');
            
            $price = $isKiloan ? $item->harga_per_kg : $item->harga_satuan;
            if (is_null($price) || $price == 0) {
                $laundryService = \App\Models\LaundryService::find($item->jenis_layanan);
                $price = $laundryService ? $laundryService->base_price : $item->subtotal;
            }

            $itemSubtotal = $price * $inputVal;

            if ($isKiloan) {
                $item->update([
                    'harga_per_kg' => $price,
                    'berat_aktual' => $inputVal,
                    'qty'          => 1, // Reset
                    'subtotal'     => $itemSubtotal,
                ]);
                $totalBeratAktual += $inputVal;
            } else {
                $item->update([
                    'harga_satuan' => $price,
                    'qty'          => $inputVal,
                    'berat_aktual' => null, // Reset
                    'subtotal'     => $itemSubtotal,
                ]);
            }

            $subtotal += $itemSubtotal;
        }

        $totalBayar = $subtotal + $order->ongkir - $order->diskon;

        $order->update([
            'subtotal'    => $subtotal,
            'total_bayar' => max(0, $totalBayar),
            'berat_aktual' => $totalBeratAktual > 0 ? $totalBeratAktual : null, // simpan total kg saja jika ada
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