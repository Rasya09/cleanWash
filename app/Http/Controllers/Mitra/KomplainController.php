<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Komplain;
use App\Models\Review;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;

class KomplainController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'review_id' => 'required|exists:reviews,id',
            'alasan' => 'required|string|max:500',
        ]);

        $review = Review::findOrFail($request->review_id);

        // Buat data Komplain
        $komplain = Komplain::create([
            'reporter_id' => Auth::id(),
            'reported_user_id' => $review->user_id,
            'review_id' => $review->id,
            'alasan' => $request->alasan,
            'status' => 'pending',
        ]);

        // Kirim Notifikasi ke Admin
        Notifikasi::create([
            'judul' => 'Laporan Ulasan Baru!',
            'pesan' => 'Mitra melaporkan ulasan dari ' . ($review->pelanggan->name ?? 'User') . '. Alasan: ' . $request->alasan,
            'modul' => 'Komplain',
            'penerima' => 'Admin',
            'is_read' => false,
        ]);

        return back()->with('success', 'Laporan Anda telah dikirim ke Admin untuk ditinjau.');
    }
}
