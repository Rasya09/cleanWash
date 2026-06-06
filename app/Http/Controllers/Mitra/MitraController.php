<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\LaundryService;
use Illuminate\Http\Request;
use App\Models\MitraLaundry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    // ══════════════════════════════════════════════════════
    // PROFIL TOKO
    // ══════════════════════════════════════════════════════

    public function profil()
    {
        $mitra = MitraLaundry::where('user_id', Auth::id())->first();

        return view('mitra.profil_toko', compact('mitra'));
    }

    public function edit()
    {
        $mitra = MitraLaundry::where('user_id', Auth::id())->firstOrFail();

        return view('mitra.edit_profil', compact('mitra'));
    }

    public function update(Request $request)
    {
        $mitra = MitraLaundry::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'store_name'       => 'required|max:100',
            'description'      => 'required|max:500',
            'phone'            => 'required',
            'province'         => 'required',
            'city'             => 'required',
            'district'         => 'required',
            'village'          => 'required',
            'postal_code'      => 'required',
            'address'          => 'required',
            'operational_days' => 'required|array|min:1',
            'open_time'        => 'required',
            'close_time'       => 'required',
            'logo'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($mitra->logo) {
                Storage::disk('public')->delete($mitra->logo);
            }
            $mitra->logo = $request->file('logo')->store('mitra/logo', 'public');
        }

        $mitra->store_name       = $request->store_name;
        $mitra->description      = $request->description;
        $mitra->phone            = $request->phone;
        $mitra->province         = $request->province;
        $mitra->city             = $request->city;
        $mitra->district         = $request->district;
        $mitra->village          = $request->village;
        $mitra->postal_code      = $request->postal_code;
        $mitra->address          = $request->address;
        $mitra->operational_days = $request->operational_days;
        $mitra->open_time        = $request->open_time;
        $mitra->close_time       = $request->close_time;
        $mitra->save();

        return redirect()->route('mitra.profil')
            ->with('success', 'Profil berhasil diperbarui');
    }

    // ══════════════════════════════════════════════════════
    // PENGIRIMAN
    // ══════════════════════════════════════════════════════

    public function pengiriman()
    {
        $mitra = MitraLaundry::where('user_id', Auth::id())->firstOrFail();

        return view('mitra.pengaturan_pengiriman', compact('mitra'));
    }

    public function updatePengiriman(Request $request)
    {
        $request->validate([
            'service_radius' => 'required|integer|min:1|max:25',
            'pickup_fee'     => 'required|integer|min:0',
        ]);

        $mitra = MitraLaundry::where('user_id', Auth::id())->firstOrFail();

        $mitra->update([
            'service_radius' => $request->service_radius,
            'pickup_fee'     => $request->pickup_fee,
        ]);

        return redirect()->route('mitra.profil')
            ->with('success', 'Pengaturan pengiriman berhasil diperbarui');
    }

    // ══════════════════════════════════════════════════════
    // LAYANAN
    // ══════════════════════════════════════════════════════

    public function createService()
    {
        return view('mitra.layanan.tambah_layanan');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'nama_layanan'   => 'required|max:50',
            'hari'           => 'required|array|min:1',
            'harga_dasar'    => 'required|numeric|min:0',
            'estimasi'       => 'required|numeric|min:1',
            'minimal_order'  => 'nullable|numeric|min:1',
            'maksimal_order' => 'nullable|numeric|min:1',
        ]);

        $mitra = MitraLaundry::where('user_id', Auth::id())->firstOrFail();

        LaundryService::create([
            'mitra_laundry_id' => $mitra->id,
            'service_name'     => $request->nama_layanan,
            'operational_days' => $request->hari,
            'base_price'       => $request->harga_dasar,
            'estimated_days'   => $request->estimasi,
            'minimum_order'    => $request->minimal_order,
            'maximum_order'    => $request->maksimal_order,
            'is_active'        => true,
        ]);

        return redirect()->route('mitra.layanan')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    // ══════════════════════════════════════════════════════
    // GAMBAR TOKO
    // ══════════════════════════════════════════════════════

    public function gambar()
    {
        $mitra = MitraLaundry::where('user_id', Auth::id())->firstOrFail();

        return view('mitra.pusat_promosi.gambar', compact('mitra'));
    }

    public function uploadFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
        ]);

        $mitra  = MitraLaundry::where('user_id', Auth::id())->firstOrFail();
        $photos = $mitra->store_photos ?? [];

        if (count($photos) >= 4) {
            return back()->with('error', 'Maksimal 4 foto toko.');
        }

        $path     = $request->file('foto')->store('mitra/photos', 'public');
        $photos[] = $path;

        $mitra->update(['store_photos' => $photos]);

        return back()->with('success', 'Foto berhasil ditambahkan.');
    }

    public function hapusFoto(Request $request)
    {
        $request->validate([
            'index' => 'required|integer|min:0',
        ]);

        $mitra  = MitraLaundry::where('user_id', Auth::id())->firstOrFail();
        $photos = $mitra->store_photos ?? [];

        if (count($photos) <= 2) {
            return back()->with('error', 'Minimal harus ada 2 foto toko.');
        }

        $index = (int) $request->index;

        if (!isset($photos[$index])) {
            return back()->with('error', 'Foto tidak ditemukan.');
        }

        Storage::disk('public')->delete($photos[$index]);
        array_splice($photos, $index, 1);

        $mitra->update(['store_photos' => array_values($photos)]);

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}