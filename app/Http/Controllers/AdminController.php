<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraLaundry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

    public function mitraManagement(Request $request)
    {
        $query = MitraLaundry::with(['user', 'services', 'reviews']);

        // Filtering
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('store_name', 'like', "%{$search}%")
                  ->orWhere('owner_name', 'like', "%{$search}%");
            });
        }

        if ($request->has('id')) {
            $query->where('id', $request->id);
        }

        $mitras = $query->latest()->paginate(10);

        // Stats
        $totalMitra = MitraLaundry::count();
        $verifiedMitra = MitraLaundry::where('status', 'approved')->count();
        $pendingMitra = MitraLaundry::where('status', 'pending')->count();
        $rejectedMitra = MitraLaundry::where('status', 'rejected')->count();
        $suspendedMitra = MitraLaundry::where('status', 'suspended')->count();

        return view('admin.manajemen.mitra_laundry', compact(
            'mitras',
            'totalMitra',
            'verifiedMitra',
            'pendingMitra',
            'rejectedMitra',
            'suspendedMitra'
        ));
    }

    public function suspendMitra(Request $request, $id)
    {
        $mitra = MitraLaundry::findOrFail($id);
        
        if ($mitra->status === 'suspended') {
            $mitra->status = 'approved'; // Or whatever logic for unblocking
            $message = 'Akses mitra berhasil dipulihkan.';
        } else {
            $mitra->status = 'suspended';
            $message = 'Mitra berhasil diblokir/ditangguhkan.';
        }
        
        $mitra->save();

        return response()->json([
            'success' => true,
            'message' => $message,
            'new_status' => $mitra->status
        ]);
    }

    public function blockUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        if ($user->status === 'blocked') {
            $user->status = 'active';
            $message = 'Akun customer berhasil diaktifkan kembali.';
        } else {
            $user->status = 'blocked';
            $message = 'Customer berhasil diblokir.';
        }
        
        $user->save();

        return response()->json([
            'success' => true,
            'message' => $message,
            'new_status' => $user->status
        ]);
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

    public function komplainManagement()
    {
        $komplains = \App\Models\Komplain::with(['reporter', 'reportedUser.mitraLaundry', 'review.order', 'mitraLaundry'])->orderByDesc('created_at')->get();
        return view('admin.moderasi.komplain', compact('komplains'));
    }

    public function followUp(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string'
        ]);

        $komplain = \App\Models\Komplain::with(['mitraLaundry', 'reportedUser'])->findOrFail($id);

        $mitraUserId = $komplain->mitra_laundry_id ? $komplain->mitraLaundry->user_id : $komplain->reported_user_id;

        // Pesan otomatis + Tanggapan
        $warningMessage = "HALO MITRA!\n\nKami menerima laporan mengenai layanan Anda.\n\n" .
                         "Alasan Laporan: " . $komplain->alasan . "\n\n" .
                         "Tindakan Admin: " . $request->tanggapan . "\n\n" .
                         "Mohon segera lakukan klarifikasi atau perbaikan layanan agar tidak terjadi penangguhan akun.";

        // Kirim Pesan Chat
        \App\Models\Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $mitraUserId,
            'message' => $warningMessage,
        ]);

        $komplain->update([
            'status' => 'selesai',
            'tanggapan_admin' => $request->tanggapan
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Laporan berhasil diproses dan peringatan telah dikirim.'
        ]);
    }

    public function followUpReporter(Request $request, $id)
    {
        $komplain = \App\Models\Komplain::with(['reporter'])->findOrFail($id);

        $msgText = "Halo " . $komplain->reporter->name . ",\n\n" .
                  "Terima kasih telah melaporkan kendala Anda. Laporan Anda sedang kami proses dan kami telah menghubungi pihak terkait.\n\n" .
                  "Mohon tunggu informasi selanjutnya. Salam, Admin CleanWash.";

        \App\Models\Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $komplain->reporter_id,
            'message' => $msgText,
        ]);

        // Jika status masih pending, ubah ke sedang diproses
        if($komplain->status === 'pending') {
            $komplain->update(['status' => 'pending']); // Tetap pending tapi terkirim pesan
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghubungi pelapor.'
        ]);
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

    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required'
        ]);

        $mitra = MitraLaundry::findOrFail($id);

        $mitra->update([
            'status' => 'rejected',
            'rejection_reason' =>
                $request->rejection_reason
        ]);

        return back()
            ->with(
                'success',
                'Mitra berhasil ditolak'
            );
    }
}
