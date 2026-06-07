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
        ]);
        $mitra = MitraLaundry::create([
            'user_id' => Auth::id(),
            'owner_name' => $request->owner_name,
            'store_name' => $request->store_name,
            'email' => $request->email,
            'phone' => '62' . $request->phone,
            'description' => $request->description,
            'status' => 'draft',

        ]);

        return redirect()
            ->route('user.register.step2', $mitra->id);
    }

    public function step1()
    {
        $mitra = MitraLaundry::where(
            'user_id',
            Auth::id()
        )->first();

        if($mitra)
        {
            return redirect()
                ->route('user.register.hasil');
        }

        return view('auth.register_mitra.step1');
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
        ]);

        return redirect()
            ->route('user.register.step3', $mitra->id);
    }

    public function step3($id)
    {
        $mitra = MitraLaundry::findOrFail($id);
        return view('auth.register_mitra.step3',compact('mitra'));
    }

    public function storeStep3(Request $request, $id)
    {
        // dd($request->all(), $request->file());
        $request->validate([
            'logo' =>
                'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'store_photos' =>
                'required|array|min:2|max:3',
            'store_photos.*' =>
                'image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $mitra = MitraLaundry::findOrFail($id);
        // =========================
        // UPLOAD LOGO
        // =========================
        $logoPath = null;
        if($request->hasFile('logo'))
        {
            $logoPath = $request
                ->file('logo')
                ->store('mitra/logo', 'public');
        }
        // =========================
        // UPLOAD STORE PHOTOS
        // =========================
        $photos = [];
        if($request->hasFile('store_photos'))
        {
            foreach($request->file('store_photos') as $photo)
            {
                $path = $photo->store(
                    'mitra/store',
                    'public'
                );
                $photos[] = $path;
            }
        }
        $mitra->update([
            'logo' => $logoPath,
            'store_photos' =>
                json_encode($photos)
        ]);
        return redirect()->route('user.register.step4',$mitra->id);
    }

    public function step4($id)
    {
        $mitra = MitraLaundry::findOrFail($id);
        return view('auth.register_mitra.step4',compact('mitra'));
    }

    public function storeStep4(Request $request, $id)
    {
        $request->validate([
            'ktp'   => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'nib'   => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'npwp'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        // ambil data mitra
        $mitra = MitraLaundry::findOrFail($id);
        // upload KTP
        $ktpPath = $request->file('ktp')->store(
            'mitra/documents/ktp',
            'public'
        );
        // upload NIB
        $nibPath = $request->file('nib')->store(
            'mitra/documents/nib',
            'public'
        );
        // upload NPWP (optional)
        $npwpPath = null;
        if($request->hasFile('npwp'))
        {
            $npwpPath = $request->file('npwp')->store(
                'mitra/documents/npwp',
                'public'
            );
        }
        // update database
        $mitra->update([
            'ktp'   => $ktpPath,
            'nib'   => $nibPath,
            'npwp'  => $npwpPath,

            // status pengajuan
            'status' => 'pending',
        ]);
        // redirect selesai
        return redirect()
            ->route('user.register.hasil')
            ->with(
                'success',
                'Pengajuan mitra berhasil dikirim!'
            );
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
