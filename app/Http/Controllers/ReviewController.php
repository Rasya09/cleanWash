<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request, $orderId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $order = Order::findOrFail($orderId);

        // Security checks
        if ($order->user_id !== Auth::id()) {
            return back()->with('error', 'Anda tidak diizinkan memberi ulasan pada pesanan ini.');
        }

        if ($order->status !== 'selesai') {
            return back()->with('error', 'Pesanan belum selesai, tidak dapat memberi ulasan.');
        }

        if ($order->review()->exists()) {
            return back()->with('error', 'Anda sudah memberikan ulasan untuk pesanan ini.');
        }

        Review::create([
            'order_id' => $order->id,
            'user_id' => Auth::id(),
            'mitra_id' => $order->mitra_laundry_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Ulasan berhasil dikirim. Terima kasih!');
    }

    /**
     * Reply to a review (for Mitra).
     */
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string'
        ]);

        $review = Review::findOrFail($id);

        if ($review->mitra->user_id !== Auth::id()) {
            return back()->with('error', 'Anda tidak memiliki akses ke ulasan ini.');
        }

        $review->update([
            'reply' => $request->reply
        ]);

        return back()->with('success', 'Balasan berhasil dikirim.');
    }
}
