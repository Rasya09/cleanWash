<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraLaundry;
use Illuminate\Support\Facades\Auth;

class MitraRegisterController extends Controller
{
    // =====================================
    // STEP 1 STORE
    // =====================================

    public function storeStep1(Request $request)
    {
        $request->validate([
            'owner_name' => 'required',
            'store_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required',
            'description' => 'nullable',
        ]);

        $mitra = MitraLaundry::create([
            'user_id' => Auth::id(),
            'owner_name' => $request->owner_name,
            'store_name' => $request->store_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'status' => 'draft',

        ]);

        return redirect()
            ->route('mitra.register.step2', $mitra->id);
    }

    public function step2($id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        return view('auth.register_mitra.step2', compact('mitra'));
    }

    public function storeStep2(Request $request, $id)
    {
        $request->validate([
            'address' => 'required',
            'village' => 'required',
            'district' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
        ]);

        $mitra = MitraLaundry::findOrFail($id);

        $mitra->update([
            'address' => $request->address,
            'village' => $request->village,
            'district' => $request->district,
            'city' => $request->city,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('mitra.register.step3', $mitra->id)
            ->with('success', 'Data alamat tersimpan. Menunggu verifikasi admin.');
    }
}
