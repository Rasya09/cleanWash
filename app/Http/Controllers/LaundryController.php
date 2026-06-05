<?php

namespace App\Http\Controllers;

use App\Models\MitraLaundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function index(Request $request)
    {
        $query = MitraLaundry::with(['layanans', 'reviews'])
            ->where('status', 'approved');

        if ($search = $request->query('q')) {
            $query->where(function($q) use ($search) {
                $q->where('store_name', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        $laundries = $query->latest()->paginate(12);
        $totalCount = MitraLaundry::where('status', 'approved')->count();

        return view('user.cari_laundry', compact('laundries', 'totalCount'));
    }

    public function show($id)
    {
        $laundry = MitraLaundry::with(['layanans' => function($q) {
            $q->where('is_active', true);
        }, 'reviews.user'])
        ->where('status', 'approved')
        ->findOrFail($id);

        return view('user.detail_laundry', compact('laundry'));
    }
}
