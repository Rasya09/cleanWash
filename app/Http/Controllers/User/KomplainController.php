<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komplain;
use App\Models\MitraLaundry;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;

class KomplainController extends Controller
{
    public function reportStore(Request $request)
    {
        $request->validate([
            'mitra_id' => 'required|exists:mitra_laundries,id',
            'alasan' => 'required|string|max:500',
        ]);

        $mitra = MitraLaundry::findOrFail($request->mitra_id);

        // Buat data Komplain
        Komplain::create([
            'reporter_id' => Auth::id(),
            'reported_user_id' => $mitra->user_id,
            'mitra_laundry_id' => $mitra->id,
            'alasan' => $request->alasan,
            'status' => 'pending',
        ]);

        // Kirim Notifikasi ke Admin
        Notifikasi::create([
            'judul' => 'Laporan Toko Laundry!',
            'pesan' => Auth::user()->name . ' melaporkan toko ' . $mitra->store_name . '. Alasan: ' . $request->alasan,
            'modul' => 'Komplain',
            'penerima' => 'Admin',
            'is_read' => false,
        ]);

        return back()->with('success', 'Laporan Anda telah dikirim. Terima kasih telah membantu menjaga kualitas layanan kami.');
    }
}
