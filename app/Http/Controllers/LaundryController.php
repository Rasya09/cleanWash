<?php

namespace App\Http\Controllers;

use App\Models\MitraLaundry;
use App\Models\Review;

class LaundryController extends Controller
{
    /**
     * Tampilkan halaman detail laundry.
     * GET /user/detail-laundry/{id}
     */
    public function show(int $id)
    {
        $laundry = MitraLaundry::with(['activeServices'])
            ->where('status', 'approved')
            ->findOrFail($id);

        // Review pakai mitra_id → user_id milik mitra
        $reviews = Review::with('user')
            ->where('mitra_id', $laundry->user_id)
            ->latest()
            ->get();

        $averageRating  = $reviews->count() > 0
            ? round($reviews->avg('rating'), 1)
            : 0;

        $startingPrice  = $laundry->activeServices->min('base_price');

        // Store photos: sudah di-cast array di model
        $storePhotoUrls = collect($laundry->store_photos ?? [])
            ->map(fn($photo) => asset('storage/' . $photo))
            ->values();

        $logoUrl = $laundry->logo
            ? asset('storage/' . $laundry->logo)
            : null;

        $fullAddress = implode(', ', array_filter([
            $laundry->address,
            $laundry->district,
            $laundry->city,
            $laundry->province,
        ]));

        return view('user.detail_laundry', compact(
            'laundry',
            'reviews',
            'averageRating',
            'startingPrice',
            'storePhotoUrls',
            'logoUrl',
            'fullAddress',
        ));
    }
}