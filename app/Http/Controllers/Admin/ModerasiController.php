<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating; 
use Illuminate\Http\Request;

class ModerasiController extends Controller
{
    public function indexReview()
    {
        // 1. Ambil data dari tabel ratings, kecuali yang berstatus 'deleted'
        $dataRatings = Rating::with(['user'])
            ->where(function($query) {
                $query->where('status', '!=', 'deleted')
                      ->orWhereNull('status');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // 2. Format datanya agar struktur kolom database cocok dengan format Javascript di Blade
        $formattedReviews = $dataRatings->map(function($item) {
            $statusLabel = 'Menunggu';
            if ($item->status === 'ok') $statusLabel = 'Disetujui';
            if ($item->status === 'spam') $statusLabel = 'Spam';
            if ($item->status === 'deleted') $statusLabel = 'Dihapus';

            return [
                'id_raw' => $item->id,
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
                'status' => $item->status ?? 'wait', 
                'statusLabel' => $statusLabel,
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

    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:ok,spam,deleted'
            ]);

            // GUNAKAN MODEL RATING (Bukan Review)
            $rating = Rating::find($id);
            
            if (!$rating) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data review tidak ditemukan.'
                ], 404);
            }

            if ($request->status === 'deleted') {
                $rating->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Review berhasil dihapus secara permanen.'
                ]);
            }

            // Simpan perubahan ke tabel ratings
            $rating->status = $request->status;
            $rating->reviewed_by = auth()->id();
            $rating->reviewed_at = now();
            $rating->save();

            return response()->json([
                'success' => true,
                'message' => 'Status review berhasil diperbarui menjadi ' . $request->status
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}