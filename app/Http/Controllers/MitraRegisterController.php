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
            'phone' => [
                'required',
                'regex:/^[1-9][0-9]{8,14}$/'
            ],
            'description' => 'nullable',
            'operational_days' => 'required|array|min:1',
            'open_time' => 'required|string',
            'close_time' => 'required|string',
        ]);
        
        $data = session('register_mitra', []);
        $data = array_merge($data, $request->only('owner_name', 'store_name', 'email', 'phone', 'description', 'operational_days', 'open_time', 'close_time'));
        session(['register_mitra' => $data]);

        return redirect()->route('user.register.step2');
    }

    public function step1()
    {
        $existingMitra = MitraLaundry::where('user_id', Auth::id())->first();

        if($existingMitra && $existingMitra->status != 'draft') {
            return redirect()->route('user.home')->with('success', 'Anda sudah mendaftar sebagai mitra. Silakan tunggu verifikasi atau cek status Anda.');
        }

        if ($existingMitra && $existingMitra->status == 'draft') {
            $existingMitra->delete();
        }

        $mitra = (object) session('register_mitra', []);
        return view('auth.register_mitra.step1', compact('mitra'));
    }

    public function step2()
    {
        if(!session()->has('register_mitra')) { return redirect()->route('user.register.step1'); }
        $mitra = (object) session('register_mitra', []);
        return view('auth.register_mitra.step2', compact('mitra'));
    }

    public function storeStep2(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'village' => 'required',
            'district' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
        ]);

        $data = session('register_mitra', []);
        $data = array_merge($data, $request->only('address', 'village', 'district', 'city', 'province', 'postal_code'));
        session(['register_mitra' => $data]);

        return redirect()->route('user.register.step3');
    }

    public function step3()
    {
        if(!session()->has('register_mitra')) { return redirect()->route('user.register.step1'); }
        $mitra = (object) session('register_mitra', []);
        return view('auth.register_mitra.step3', compact('mitra'));
    }

    public function storeStep3(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'store_photos' => 'required|array|min:2|max:3',
            'store_photos.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = session('register_mitra', []);

        if($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('mitra/logo', 'public');
        }

        $photos = [];
        if($request->hasFile('store_photos')) {
            foreach($request->file('store_photos') as $photo) {
                $photos[] = $photo->store('mitra/store', 'public');
            }
            $data['store_photos'] = json_encode($photos);
        }

        session(['register_mitra' => $data]);

        return redirect()->route('user.register.step4');
    }

    public function step4()
    {
        if(!session()->has('register_mitra')) { return redirect()->route('user.register.step1'); }
        $mitra = (object) session('register_mitra', []);
        return view('auth.register_mitra.step4', compact('mitra'));
    }

    public function storeStep4(Request $request)
    {
        $request->validate([
            'ktp'   => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'nib'   => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'npwp'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'ktp.max' => 'Ukuran file KTP maksimal 2MB',
            'nib.max' => 'Ukuran file NIB maksimal 2MB',
            'npwp.max' => 'Ukuran file NPWP maksimal 2MB',
            'ktp.mimes' => 'Format file KTP harus jpg, jpeg, png, atau pdf',
            'nib.mimes' => 'Format file NIB harus jpg, jpeg, png, atau pdf',
            'npwp.mimes' => 'Format file NPWP harus jpg, jpeg, png, atau pdf',
        ]);

        $data = session('register_mitra', []);

        $ktpPath = $request->file('ktp')->store('mitra/documents/ktp', 'public');
        $nibPath = $request->file('nib')->store('mitra/documents/nib', 'public');
        $npwpPath = $request->hasFile('npwp') ? $request->file('npwp')->store('mitra/documents/npwp', 'public') : null;

        MitraLaundry::create([
            'user_id' => Auth::id(),
            'owner_name' => $data['owner_name'],
            'store_name' => $data['store_name'],
            'email' => $data['email'] ?? null,
            'phone' => '62' . $data['phone'],
            'description' => $data['description'] ?? null,
            'address' => $data['address'],
            'village' => $data['village'],
            'district' => $data['district'],
            'city' => $data['city'],
            'province' => $data['province'],
            'postal_code' => $data['postal_code'],
            'operational_days' => $data['operational_days'] ?? [],
            'open_time' => $data['open_time'] ?? '08:00',
            'close_time' => $data['close_time'] ?? '20:00',
            'logo' => $data['logo'] ?? null,
            'store_photos' => $data['store_photos'] ?? null,
            'ktp'   => $ktpPath,
            'nib'   => $nibPath,
            'npwp'  => $npwpPath,
            'status' => 'pending',
        ]);

        session()->forget('register_mitra');

        return redirect()->route('user.home')->with('success', 'Pengajuan mitra berhasil dikirim! Silakan tunggu verifikasi dari admin.');
    }

    public function success()
    {
        return view(
            'auth.register_mitra.success'
        );
    }

    private function getNextStep($mitra)
    {
        // STEP 2 belum lengkap
        if (
            empty($mitra->address) ||
            empty($mitra->city) ||
            empty($mitra->province)
        ) {
            return route(
                'user.register.step2',
                $mitra->id
            );
        }

        // STEP 3 belum lengkap
        if (
            empty($mitra->store_photos)
        ) {
            return route(
                'user.register.step3',
                $mitra->id
            );
        }

        // STEP 4 belum lengkap
        if (
            empty($mitra->ktp) ||
            empty($mitra->nib)
        ) {
            return route(
                'user.register.step4',
                $mitra->id
            );
        }

        return null;
    }

    public function hasil()
    {
        $mitra = MitraLaundry::where(
            'user_id',
            Auth::id()
        )->first();

        if (!$mitra) {
            return redirect()
                ->route('user.register.step1');
        }

        $nextStep = $this->getNextStep($mitra);

        return view(
            'auth.register_mitra.hasil',
            compact('mitra', 'nextStep')
        );
    }

    public function reapply($id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        return view(
            'auth.register_mitra.updateStep1',
            compact('mitra')
        );
    }

    public function updateStep1(Request $request, $id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        $mitra->update([
            'owner_name' => $request->owner_name,
            'store_name' => $request->store_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'description'=> $request->description,
            'operational_days' => $request->operational_days,
            'open_time'  => $request->open_time,
            'close_time' => $request->close_time,
        ]);

        return redirect()
            ->route(
                'user.register.reapply.step2',
                $mitra->id
            );
    }

    public function reapplyStep2($id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        return view(
            'auth.register_mitra.updateStep2',
            compact('mitra')
        );
    }

    public function updateStep2(Request $request, $id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        $mitra->update([
            'province'    => $request->province,
            'city'        => $request->city,
            'district'    => $request->district,
            'village'     => $request->village,
            'postal_code' => $request->postal_code,
            'address'     => $request->address,
        ]);

        return redirect()->route(
            'user.register.reapply.step3',
            $mitra->id
        );
    }

    public function reapplyStep3($id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        return view(
            'auth.register_mitra.updateStep3',
            compact('mitra')
        );
    }

    public function updateStep3(Request $request, $id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        if ($request->hasFile('logo'))
        {
            $logo = $request->file('logo')
                ->store('mitra/logo', 'public');

            $mitra->logo = $logo;
        }

        if ($request->hasFile('store_photos'))
        {
            $photos = [];

            foreach ($request->file('store_photos') as $photo)
            {
                $photos[] = $photo->store(
                    'mitra/store_photos',
                    'public'
                );
            }

            $mitra->store_photos = json_encode($photos);
        }

        $mitra->save();

        return redirect()->route(
            'user.register.reapply.step4',
            $mitra->id
        );
    }

    public function reapplyStep4($id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        return view(
            'auth.register_mitra.updateStep4',
            compact('mitra')
        );
    }

    public function updateStep4(Request $request, $id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        if ($request->hasFile('ktp'))
        {
            $mitra->ktp = $request->file('ktp')
                ->store(
                    'mitra/documents/ktp',
                    'public'
                );
        }

        if ($request->hasFile('nib'))
        {
            $mitra->nib = $request->file('nib')
                ->store(
                    'mitra/documents/nib',
                    'public'
                );
        }

        if ($request->hasFile('npwp'))
        {
            $mitra->npwp = $request->file('npwp')
                ->store(
                    'mitra/documents/npwp',
                    'public'
                );
        }

        // reset status
        $mitra->status = 'pending';

        // hapus alasan penolakan lama
        $mitra->rejection_reason = null;

        $mitra->save();

        return redirect()
            ->route('user.register.success')
            ->with(
                'success',
                'Pengajuan berhasil dikirim ulang'
            );
    }

    public function profil()
    {
        $mitra = MitraLaundry::where('user_id', Auth::id())
                    ->where('status', 'approved')
                    ->first();

        return view('mitra.profil.index', compact('mitra'));
    }

}
