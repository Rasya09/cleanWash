<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request)
    {
    $validated = $request->validate([
        'emoji' => 'required|integer|min:1|max:5',
        'star'  => 'required|integer|min:1|max:5',
        'ulasan' => 'nullable|string|max:1000',
    ]);

    Rating::create([
        'user_id' => auth()->id(),
        'emoji'   => $validated['emoji'],
        'star'    => $validated['star'],
        'ulasan'  => $validated['ulasan'],
    ]);

    return back()->with('success', 'Rating berhasil dikirim!');
    }
}

