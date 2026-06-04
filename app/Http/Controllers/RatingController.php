<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Notifikasi; // Jangan lupa panggil model Notifikasi di sini!

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emoji'  => 'required|integer|min:1|max:5',
            'star'   => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string|max:1000',
        ]);

        // 1. Simpan data Rating
        $rating = Rating::create([
            'user_id' => auth()->id(),
            'emoji'   => $validated['emoji'],
            'star'    => $validated['star'],
            'ulasan'  => $validated['ulasan'],
        ]);

        // 2. Tembak data Notifikasi untuk Admin
        // Asumsi kamu punya tabel 'notifikasis' dengan kolom judul, pesan, modul, dll.
        Notifikasi::create([
            'judul'    => 'Rating & Ulasan Baru Masuk!',
            'pesan'    => 'Pengguna telah memberikan rating ' . $validated['star'] . ' bintang.',
            'modul'    => 'Review & Rating',
            'penerima' => 'Admin',
            'is_read'  => false, // Default belum dibaca
        ]);

        return back()->with('success', 'Rating berhasil dikirim!');
    }
}