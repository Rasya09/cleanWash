<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    // =========================
    // STORE ADDRESS
    // =========================

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'recipient_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        if ($request->is_primary) {

            UserAddress::where('user_id', Auth::id())
                ->update([
                    'is_primary' => false
                ]);
        }

        UserAddress::create([

            'user_id' => Auth::id(),
            
            'label' => $request->label,
            
            'recipient_name' => $request->recipient_name,

            'phone' => $request->phone,

            'address' => $request->address,

            'province' => $request->province,

            'city' => $request->city,

            'postal_code' => $request->postal_code,

            'latitude' => $request->latitude,

            'longitude' => $request->longitude,

            'is_primary' => $request->is_primary ? true : false,

        ]);

        return back()->with('success', 'Alamat berhasil ditambahkan');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $user = User::find(Auth::id());
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = '62'.$request->phone;
            $user->save();
        }

        return back()->with(
            'success',
            'Profil berhasil diperbarui'
        );
    }

    public function setPrimary($id)
    {
        // ambil address milik user login
        $address = UserAddress::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // reset semua alamat jadi bukan utama
        UserAddress::where('user_id', Auth::id())
            ->update([
                'is_primary' => false
            ]);

        // jadikan address ini utama
        $address->update([
            'is_primary' => true
        ]);

        return back()->with(
            'success',
            'Alamat utama berhasil diubah'
        );

    }

    public function update(Request $request, $id)
    {
        $address = UserAddress::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $address->update([
            'label' => $request->label,
            'recipient_name' => $request->recipient_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'province' => $request->province,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
        ]);
        return back()->with(
            'success',
            'Alamat berhasil diupdate'
        );
    }

    public function destroy($id)
    {
        $address = UserAddress::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $totalAddress = UserAddress::where('user_id', Auth::id())
            ->count();
        // minimal 1 alamat
        if($totalAddress <= 1){
            return back()->with(
                'error',
                'Minimal harus memiliki 1 alamat'
            );
        }
        $wasPrimary = $address->is_primary;
        $address->delete();
        // kalau yg dihapus primary
        if($wasPrimary){
            $newPrimary = UserAddress::where('user_id', Auth::id())
                ->first();
            if($newPrimary){
                $newPrimary->update([
                    'is_primary' => true
                ]);
            }
        }
        return back()->with(
            'success',
            'Alamat berhasil dihapus'
        );
    }
}
