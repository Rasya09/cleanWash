<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraLaundry;
use App\Models\user;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCustomer = User::where('role', 'user')->count();

        // Customer sampai kemarin
        $totalCustomerKemarin = User::where('role', 'user')
            ->whereDate('created_at', '<', Carbon::today())
            ->count();

        $customerGrowth = 0;

        if ($totalCustomerKemarin > 0) {
            $customerGrowth = round(
                (($totalCustomer - $totalCustomerKemarin) / $totalCustomerKemarin) * 100,
                1
            );
        }

        $totalMitra = MitraLaundry::count();

        $verifiedMitra = MitraLaundry::where('status', 'approved')
            ->count();

        $pendingMitraCount = MitraLaundry::where('status', 'pending')
            ->count();

        $pendingMitra = MitraLaundry::where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        $todayMitra = MitraLaundry::count();

        $yesterdayMitra = MitraLaundry::whereDate(
            'created_at',
            Carbon::yesterday()
        )->count();

        $mitraGrowth = 0;

        if ($yesterdayMitra > 0) {
            $mitraGrowth = round(
                (($todayMitra - $yesterdayMitra) / $yesterdayMitra) * 100,
                1
            );
        }

        return view( 'admin.home',
            compact(
                'totalCustomer',
                'totalMitra',
                'verifiedMitra',
                'pendingMitraCount',
                'pendingMitra',
                'todayMitra',
                'mitraGrowth',
                'customerGrowth'
            )
        );
    }

    public function userManagement()
    {
        $customers = User::where('role', 'user')
            ->latest()
            ->paginate(10);

        $totalCustomer = User::where('role', 'user')
            ->count();

        $customerBaru = User::where('role', 'user')
            ->whereDate('created_at', today())
            ->count();

        $customerAktif = User::where('role', 'user')
            ->where('status', 'active')
            ->count();

        $customerBlocked = User::where('role', 'user')
            ->where('status', 'blocked')
            ->count();

        return view(
            'admin.manajemen.user',
            compact(
                'customers',
                'totalCustomer',
                'customerBaru',
                'customerAktif',
                'customerBlocked'
            )
        );
    }

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

        $mitra->status = 'approved';
        $mitra->save();

        $user = User::find($mitra->user_id);

        $user->role = 'mitra';
        $user->save();

        return back()->with(
            'success',
            'Mitra berhasil disetujui'
        );
    }

    public function reject($id)
    {
        $mitra = MitraLaundry::findOrFail($id);

        $mitra->status = 'rejected';
        $mitra->save();

        return back()->with(
            'success',
            'Mitra berhasil ditolak'
        );
    }
}
