<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating; // Menggunakan model Rating karena tabel reviews belum ada
use Illuminate\Http\Request;

class ModerasiController extends Controller
{
    public function indexReview()
    {
        // 1. Ambil data dari tabel ratings
        $dataRatings = Rating::with(['user'])->orderBy('created_at', 'desc')->get();

        // 2. Format datanya agar struktur kolom database cocok dengan format Javascript di Blade
        $formattedReviews = $dataRatings->map(function($item) {
            return [
                'id' => 'RVW-' . str_pad($item->id, 4, '0', STR_PAD_LEFT),
                'pelanggan' => [
                    'nama' => $item->user->name ?? 'User',
                    'inisial' => substr($item->user->name ?? 'U', 0, 2),
                    'hp' => $item->user->phone ?? '-',
                    'email' => $item->user->email ?? '-',
                ],
                'mitra' => [
                    'nama' => 'Website Review', // Placeholder karena rating website
                    'logo' => 'CW',
                    'warna' => 'blue',
                ],
                'teks' => $item->ulasan ?? '-',
                'rating' => (float) $item->star,
                'status' => 'ok', // Status default
                'statusLabel' => 'Disetujui',
                'orderId' => '-',
                'tglOrder' => $item->created_at->format('d M Y'),
                'tglSelesai' => $item->created_at->format('d M Y'),
                'totalBayar' => 'Rp 0',
                'tanggal' => $item->created_at->format('d M Y'),
                'jam' => $item->created_at->format('H:i'),
            ];
        });

        // 3. Kirim data ke file Blade
        return view('admin.moderasi.review', [
            'reviewsData' => $formattedReviews
        ]);
    }
}