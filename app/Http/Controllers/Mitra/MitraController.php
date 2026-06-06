<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\LaundryService;
use Illuminate\Http\Request;
use App\Models\MitraLaundry;
use Illuminate\Support\Facades\Auth;


class MitraController extends Controller
{
    public function profil()
    {
        $mitra = MitraLaundry::where('user_id', Auth::id())->first();

        return view(
            'mitra.profil_toko',
            compact('mitra')
        );
    }

    public function edit()
    {
        $mitra = MitraLaundry::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        return view( 'mitra.edit_profil',compact('mitra'));
    }

    public function update(Request $request)
    {
        $mitra = MitraLaundry::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $request->validate([
            'store_name' => 'required|max:100',
            'description' => 'required|max:500',
            'phone' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'postal_code' => 'required',
            'address' => 'required',

            'operational_days' => 'required|array|min:1',
            'open_time' => 'required',
            'close_time' => 'required',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // =========================
        // UPLOAD LOGO
        // =========================

        if($request->hasFile('logo'))
        {
            $logoPath = $request
                ->file('logo')
                ->store(
                    'mitra/logo',
                    'public'
                );

            $mitra->logo = $logoPath;
        }

        // =========================
        // UPDATE DATA
        // =========================

        $mitra->store_name = $request->store_name;
        $mitra->description = $request->description;
        $mitra->phone = $request->phone;

        $mitra->province = $request->province;
        $mitra->city = $request->city;
        $mitra->district = $request->district;
        $mitra->village = $request->village;
        $mitra->postal_code = $request->postal_code;
        $mitra->address = $request->address;

        $mitra->operational_days =
            $request->operational_days;

        $mitra->open_time =
            $request->open_time;

        $mitra->close_time =
            $request->close_time;

        $mitra->save();

        return redirect()
            ->route('mitra.profil')
            ->with(
                'success',
                'Profil berhasil diperbarui'
            );
    }

    public function pengiriman()
    {
        $mitra = MitraLaundry::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        return view('mitra.pengaturan_pengiriman',compact('mitra'));
    }

    public function updatePengiriman(Request $request)
    {
        $request->validate([
            'service_radius' => 'required|integer|min:1|max:25',
            'pickup_fee' => 'required|integer|min:0',
        ]);

        $mitra = MitraLaundry::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $mitra->update([
            'service_radius' => $request->service_radius,
            'pickup_fee' => $request->pickup_fee,
        ]);

        return redirect()
            ->route('mitra.profil')
            ->with(
                'success',
                'Pengaturan pengiriman berhasil diperbarui'
            );
    }
    
    public function createService()
    {
        return view(
            'mitra.layanan.tambah_layanan'
        );
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|max:50',
            'hari' => 'required|array|min:1',
            'harga_dasar' => 'required|numeric|min:0',
            'estimasi' => 'required|numeric|min:1',
            'minimal_order' => 'nullable|numeric|min:1',
            'maksimal_order' => 'nullable|numeric|min:1',
        ]);

        $mitra = MitraLaundry::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        LaundryService::create([
            'mitra_laundry_id' => $mitra->id,
            'service_name' => $request->nama_layanan,
            'operational_days' => $request->hari,
            'base_price' => $request->harga_dasar,
            'estimated_days' => $request->estimasi,
            'minimum_order' => $request->minimal_order,
            'maximum_order' => $request->maksimal_order,
            'is_active' => true,
        ]);

        return redirect()
            ->route('mitra.layanan')
            ->with(
                'success',
                'Layanan berhasil ditambahkan'
            );
    }

    public function layanan()
    {
        $mitra = MitraLaundry::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $services = LaundryService::where(
            'mitra_laundry_id',
            $mitra->id
        )->latest()
        ->get();

        $totalServices = $services->count();

        $activeServices = $services
            ->where('is_active', true)
            ->count();

        $inactiveServices = $services
            ->where('is_active', false)
            ->count();

        return view(
            'mitra.layanan.layanan_saya',
            compact(
                'services',
                'totalServices',
                'activeServices',
                'inactiveServices'
            )
        );
    }

}
