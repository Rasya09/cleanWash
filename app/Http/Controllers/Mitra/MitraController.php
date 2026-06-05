<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraLaundry;
use Illuminate\Support\Facades\Auth;


class MitraController extends Controller
{
    public function profil()
    {
        $mitra = MitraLaundry::with(['layanans', 'reviews.pelanggan'])
            ->where('user_id', Auth::id())
            ->first();

        if (!$mitra) {
            return redirect()->route('user.register.step1')->with('error', 'Silakan lengkapi profil toko Anda terlebih dahulu.');
        }

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
        ]);

        $mitra->update([
            'store_name' => $request->store_name,
            'description' => $request->description,
            'phone' => $request->phone,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'village' => $request->village,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
        ]);

        return redirect()
            ->route('mitra.profil')
            ->with(
                'success',
                'Profil berhasil diperbarui'
            );
    }

}
