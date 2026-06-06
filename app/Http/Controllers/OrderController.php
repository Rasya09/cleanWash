<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatusHistory;
use App\Models\MitraLaundry;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class OrderController extends Controller
{
    // =========================================================
    // HALAMAN BUAT PESANAN
    // =========================================================
    public function create($mitraId)
    {
        $laundry = MitraLaundry::where('id', $mitraId)
            ->where('status', 'approved')
            ->firstOrFail();

        return view('user.buat_pesanan', compact('laundry'));
    }

    // =========================================================
    // SIMPAN PESANAN BARU
    // =========================================================
    public function store(Request $request)
    {
        $request->validate([
            'mitra_laundry_id'   => 'required|exists:mitra_laundries,id',
            'layanan'   => 'required|array|min:1',
            'layanan.*' => 'required|string',
            'tanggal'            => 'required|date_format:Y-m-d|after:today',
            'waktu'              => 'required|date_format:H:i',
            'alamat_pickup'      => 'nullable|string|max:500',
            'alamat_pengantaran' => 'nullable|string|max:500',
            'foto_barang'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'catatan'            => 'nullable|string|max:500',
            'metode_bayar'       => 'nullable|in:cod,transfer,ewallet',
        ]);
        Log::info('Order store dipanggil', $request->all());

        // ── Validasi mitra harus approved ─────────────────────
        $mitra = MitraLaundry::where('id', $request->mitra_laundry_id)
            ->where('status', 'approved')
            ->first();

        if (!$mitra) {
            return back()->withErrors(['mitra_laundry_id' => 'Mitra laundry tidak tersedia.'])->withInput();
        }

        // ── Validasi jadwal: minimal H+1 & jam 07:00–20:00 ───
        $validasiJadwal = $this->validasiJadwal($request->tanggal, $request->waktu);
        if ($validasiJadwal !== true) {
            return back()->withErrors(['waktu' => $validasiJadwal])->withInput();
        }

        // ── Upload foto barang ────────────────────────────────
        $fotoPath = null;
        if ($request->hasFile('foto_barang')) {
            $fotoPath = $request->file('foto_barang')->store('orders/foto', 'public');
        }

        // ── Ambil alamat user ─────────────────────────────────
        $alamatPickup      = $request->alamat_pickup;
        $alamatPengantaran = $request->alamat_pengantaran;

        if (!$alamatPickup) {
            $alamat            = UserAddress::where('user_id', Auth::id())
                                ->where('is_primary', true)
                                ->first()
                              ?? UserAddress::where('user_id', Auth::id())->first();
            $alamatPickup      = $alamat?->alamat_lengkap ?? '-';
            $alamatPengantaran = $alamat?->alamat_lengkap ?? '-';
        }

        $orderId = null;

        DB::transaction(function () use ($request, $fotoPath, $alamatPickup, $alamatPengantaran, &$orderId) {

            $order = Order::create([
                'user_id'            => Auth::id(),
                'mitra_laundry_id'   => $request->mitra_laundry_id,
                'status'             => 'masuk',
                'tanggal_pickup'     => $request->tanggal,
                'waktu_pickup'       => $request->waktu,
                'alamat_pickup'      => $alamatPickup,
                'alamat_pengantaran' => $alamatPengantaran,
                'foto_barang'        => $fotoPath,
                'catatan'            => $request->catatan,
                'metode_bayar'       => $request->metode_bayar ?? 'cod',
                'status_bayar'       => 'menunggu_timbangan',
                'subtotal'           => 0,
                'ongkir'             => 0,
                'diskon'             => 0,
                'total_bayar'        => 0,
            ]);

            // Simpan setiap item layanan
            foreach ($request->layanan as $jenis) {
                $laundryService = \App\Models\LaundryService::find($jenis);
                $namaLayanan = $laundryService ? $laundryService->service_name : $this->labelLayanan($jenis);

                $isKiloan = $laundryService && in_array($laundryService->getRawOriginal('service_name'), ['Cuci Kering', 'Setrika Aja']);

                OrderItem::create([
                    'order_id'      => $order->id,
                    'nama_layanan'  => $namaLayanan,
                    'jenis_layanan' => $jenis,
                    'qty'           => 1,
                    'harga_per_kg'  => $isKiloan && $laundryService ? $laundryService->base_price : null,
                    'harga_satuan'  => !$isKiloan && $laundryService ? $laundryService->base_price : null,
                    'subtotal'      => $laundryService ? $laundryService->base_price : 0,
                ]);
            }

            // Catat history status awal
            $this->catatHistory($order, null, 'masuk', 'user', 'Pesanan dibuat oleh customer');

            $orderId = $order->id;
        });

        return redirect()
            ->route('user.detail-pesanan', $orderId)
            ->with('success', 'Pesanan berhasil dibuat! Menunggu konfirmasi mitra.');
    }

    // =========================================================
    // DAFTAR PESANAN USER
    // =========================================================
    public function index()
    {
        $orders = Order::with(['mitraLaundry', 'items'])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('user.pesanan', compact('orders'));
    }

    // =========================================================
    // DETAIL PESANAN USER
    // =========================================================
    public function show($id)
    {
        $pesanan = Order::with(['mitraLaundry', 'items', 'statusHistories.changedBy'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.detailPesanan', compact('pesanan'));
    }

    // =========================================================
    // CANCEL PESANAN (USER)
    // Hanya bisa cancel saat status = masuk
    // =========================================================
    public function cancel(Request $request, $id)
    {
        $request->validate([
            'alasan_batal' => 'required|string|max:300',
        ]);

        $order = Order::where('user_id', Auth::id())->findOrFail($id);

        // Hanya bisa cancel saat status masuk
        if (!$order->isMasuk()) {
            return back()->withErrors([
                'cancel' => 'Pesanan tidak dapat dibatalkan. Hanya pesanan dengan status "Masuk" yang bisa dibatalkan.'
            ]);
        }

        $statusLama = $order->status;

        DB::transaction(function () use ($order, $request, $statusLama) {
            $order->update([
                'status'       => 'dibatalkan',
                'alasan_batal' => $request->alasan_batal,
            ]);

            $this->catatHistory(
                $order,
                $statusLama,
                'dibatalkan',
                'user',
                'Dibatalkan oleh customer: ' . $request->alasan_batal
            );
        });

        return redirect()
            ->route('user.pesanan')
            ->with('success', 'Pesanan berhasil dibatalkan.');
    }

    // =========================================================
    // BAYAR PESANAN (USER)
    // =========================================================
    public function bayar(Request $request, $id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);

        if ($order->status !== 'menunggu_pembayaran') {
            return back()->withErrors(['error' => 'Pesanan belum menunggu pembayaran.']);
        }

        $statusLama = $order->status;

        DB::transaction(function () use ($order, $statusLama) {
            $order->update([
                'status_bayar' => 'lunas',
                'status'       => 'diproses',
            ]);

            $this->catatHistory(
                $order,
                $statusLama,
                'diproses',
                'user',
                'Pembayaran lunas, pesanan mulai diproses'
            );
        });

        return back()->with('success', 'Pembayaran berhasil, pesanan sedang diproses!');
    }

    // =========================================================
    // VALIDASI JADWAL PICKUP
    // - Minimal H+1 (bukan hari ini)
    // - Hari Senin–Sabtu saja
    // - Jam 07:00–20:00
    // =========================================================
    private function validasiJadwal(string $tanggal, string $waktu): bool|string
    {
        $tgl = Carbon::parse($tanggal)->startOfDay();
        $now = Carbon::now()->startOfDay();

        if ($tgl->lessThanOrEqualTo($now)) {
            return 'Tanggal pickup minimal adalah besok (H+1).';
        }

        if ($tgl->isSunday()) {
            return 'Pickup tidak tersedia pada hari Minggu.';
        }

        // Validasi jam 07:00–20:00
        [$jam, $menit] = array_map('intval', explode(':', $waktu));
        $totalMenit    = $jam * 60 + $menit;

        if ($totalMenit < (7 * 60) || $totalMenit > (20 * 60)) {
            return 'Waktu pickup harus antara pukul 07:00 – 20:00.';
        }

        return true;
    }

    // =========================================================
    // HELPER: Label nama layanan
    // =========================================================
    private function labelLayanan(string $value): string
    {
        return match ($value) {
            'cuci_kiloan' => 'Cuci Kiloan',
            'cuci_satuan' => 'Cuci Satuan',
            'cuci_karpet' => 'Cuci Karpet',
            'cuci_tas'    => 'Cuci Tas',
            'cuci_sepatu' => 'Cuci Sepatu',
            default       => ucwords(str_replace('_', ' ', $value)),
        };
    }

    // =========================================================
    // HELPER: Catat history status
    // =========================================================
    private function catatHistory(
        Order $order,
        ?string $lama,
        string $baru,
        string $role,
        ?string $catatan = null
    ): void {
        OrderStatusHistory::create([
            'order_id'     => $order->id,
            'changed_by'   => Auth::id(),
            'role_changer' => $role,
            'status_lama'  => $lama,
            'status_baru'  => $baru,
            'catatan'      => $catatan,
            'created_at'   => now(),
        ]);
    }
}