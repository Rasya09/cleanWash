<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraLaundry;
use App\Models\user;


class AdminController extends Controller
{
    public function index()
    {
        // ambil semua mitra pending
        $mitras = MitraLaundry::where('status', 'pending')
            ->latest()
            ->get();

        // statistik
        $total = MitraLaundry::count();

        $pending = MitraLaundry::where(
            'status',
            'pending'
        )->count();

        $approved = MitraLaundry::where(
            'status',
            'approved'
        )->count();

        $rejected = MitraLaundry::where(
            'status',
            'rejected'
        )->count();

        return view(
            'admin.manajemen.verifikasi_mitra',
            compact(
                'mitras',
                'total',
                'pending',
                'approved',
                'rejected'
            )
        );
    }

    public function approve($id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        $mitra->verification_status = 'approved';
        $mitra->save();

        $user = User::find($mitra->user_id);

        $user->role = 'mitra';
        $user->save();

        return back()
            ->with('success', 'Mitra berhasil disetujui');
    }

    public function reject($id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        $mitra->verification_status = 'rejected';

        $mitra->save();

        return back()
            ->with('success', 'Mitra ditolak');
    }
}
