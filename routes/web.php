<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Mitra\MitraOrderController;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MitraRegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Mitra\MitraController;
use App\Http\Controllers\LaundryController;

// ======================================================
// PUBLIC / GUEST
// ======================================================

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/tentang-kami', function () {
    return view('user.tentang_kami');
})->name('tentang.kami');

Route::get('/cari-laundry', function (\Illuminate\Http\Request $request) {
    $query = \App\Models\MitraLaundry::with(['reviews', 'activeServices'])->where('status', 'approved');
    if ($search = $request->query('search')) {
        $query->where('store_name', 'like', "%{$search}%");
    }
    if ($maxPrice = $request->query('max_price')) {
        if ($maxPrice < 100000) {
            $query->whereHas('activeServices', function ($q) use ($maxPrice) {
                $q->where('base_price', '<=', $maxPrice);
            });
        }
    }
    if ($status = $request->query('status')) {
        if ($status == 'buka') {
            $now = now()->format('H:i:s');
            $query->where('open_time', '<=', $now)
                  ->where('close_time', '>=', $now);
        }
    }
    if ($sort = $request->query('sort')) {
        if ($sort == 'populer') {
            $query->withCount('orders')->orderByDesc('orders_count');
        }
    }
    
    $laundries = $query->get();

    if ($sort) {
        if ($sort == 'rating_desc') {
            $laundries = $laundries->sortByDesc('average_rating')->values();
        } elseif ($sort == 'price_asc') {
            $laundries = $laundries->sortBy(function($laundry) {
                return $laundry->starting_price ?? 999999999;
            })->values();
        }
    }

    $popularStoreId = \App\Models\Order::select('mitra_laundry_id')
        ->groupBy('mitra_laundry_id')
        ->orderByRaw('COUNT(*) DESC')
        ->value('mitra_laundry_id');

    $bestUserId = \App\Models\Review::select('mitra_id')
        ->where('rating', 5)
        ->groupBy('mitra_id')
        ->orderByRaw('COUNT(*) DESC')
        ->value('mitra_id');
        
    $bestStoreId = $bestUserId 
        ? \App\Models\MitraLaundry::where('user_id', $bestUserId)->value('id')
        : null;

    return view('user.cari_laundry', compact('laundries', 'popularStoreId', 'bestStoreId'));
})->name('cari-laundry');

Route::get('/layanan', function () {
    return view('user.layanan');
})->name('layanan');


// ======================================================
// AUTH
// ======================================================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

});

// Chat Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/chat/messages/{contactId}', [\App\Http\Controllers\ChatController::class, 'fetchMessages'])->name('chat.messages');
    Route::get('/chat/user-details/{userId}', [\App\Http\Controllers\ChatController::class, 'getUserDetails'])->name('chat.user_details');
    Route::post('/chat/send/{contactId}', [\App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.send');
    Route::delete('/chat/thread/{contactId}', [\App\Http\Controllers\ChatController::class, 'deleteChat'])->name('chat.delete');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ======================================================
// MIDTRANS WEBHOOK (NO CSRF, NO AUTH)
// ======================================================
Route::post('/payment/notification', [\App\Http\Controllers\User\PaymentController::class, 'notificationCallback'])->name('payment.notification');


// ======================================================
// USER
// ======================================================

Route::middleware(['auth', 'user'])->prefix('user')->group(function () {

    Route::middleware('auth') ->prefix('register') ->group(function () {

        Route::get('/step-1',
            [MitraRegisterController::class, 'step1']
        )->name('user.register.step1');

        Route::post('/step-1/store',
            [MitraRegisterController::class, 'storeStep1'])
            ->name('user.register.step1.store');

        Route::post('/step-1/update/{id}',
            [MitraRegisterController::class, 'updateStep1'])
        ->name('user.register.step1.update');

        Route::get('/step-2/{id}',
            [MitraRegisterController::class, 'step2'])
            ->name('user.register.step2');

        Route::post('/step-2/{id}/store',
            [MitraRegisterController::class, 'storeStep2'])
            ->name('user.register.step2.store');

        Route::get('/step-3/{id}', function ($id) {
            return "STEP 3 ID : " . $id;
        })->name('user.register.step3');

        Route::get('/step-3/{id}',
            [MitraRegisterController::class, 'step3'])
            ->name('user.register.step3');

        Route::post('/step-3/store/{id}',
            [MitraRegisterController::class, 'storeStep3'])
            ->name('user.register.step3.store');

        Route::get('/step-4/{id}',
            [MitraRegisterController::class, 'step4'])
            ->name('user.register.step4');

        Route::post('/step-4/store/{id}',
            [MitraRegisterController::class, 'storeStep4'])
            ->name('user.register.step4.store');

        Route::get('/success',
            [MitraRegisterController::class, 'success'])
            ->name('user.register.success');

        Route::get('/hasil',
            [MitraRegisterController::class, 'hasil']
        )->name('user.register.hasil');

        Route::get('/register/reapply/{id}',
            [MitraRegisterController::class, 'reapply'])
            ->name('user.register.reapply');

        Route::post('/register/reapply/{id}',
            [MitraRegisterController::class, 'updateStep1'])
            ->name('user.register.reapply.update');

        Route::get('/register/reapply/step2/{id}',
            [MitraRegisterController::class, 'reapplyStep2'])
            ->name('user.register.reapply.step2');

        Route::get('/register/reapply/step2/{id}',
            [MitraRegisterController::class, 'reapplyStep2'])
            ->name('user.register.reapply.step2');

        Route::post('/register/reapply/step2/{id}',
            [MitraRegisterController::class, 'updateStep2'])
            ->name('user.register.reapply.step2.update');

        Route::get('/register/reapply/step3/{id}',
            [MitraRegisterController::class, 'reapplyStep3'])
            ->name('user.register.reapply.step3');

        Route::post('/register/reapply/step3/{id}',
            [MitraRegisterController::class, 'updateStep3'])
            ->name('user.register.reapply.step3.update');

        Route::get('/register/reapply/step4/{id}',
            [MitraRegisterController::class, 'reapplyStep4'])
            ->name('user.register.reapply.step4');

        Route::post('/register/reapply/step4/{id}',
            [MitraRegisterController::class, 'updateStep4'])
            ->name('user.register.reapply.step4.update');

    });

    Route::get('/home', function () {
        return view('user.home');
    })->name('user.home');

    Route::get('/cari-laundry', function (\Illuminate\Http\Request $request) {
        $query = \App\Models\MitraLaundry::with(['reviews', 'activeServices'])->where('status', 'approved');
        if ($search = $request->query('search')) {
            $query->where('store_name', 'like', "%{$search}%");
        }
        if ($maxPrice = $request->query('max_price')) {
            if ($maxPrice < 100000) {
                $query->whereHas('activeServices', function ($q) use ($maxPrice) {
                    $q->where('base_price', '<=', $maxPrice);
                });
            }
        }
        if ($status = $request->query('status')) {
            if ($status == 'buka') {
                $now = now()->format('H:i:s');
                $query->where('open_time', '<=', $now)
                      ->where('close_time', '>=', $now);
            }
        }
        if ($sort = $request->query('sort')) {
            if ($sort == 'populer') {
                $query->withCount('orders')->orderByDesc('orders_count');
            }
        }
        
        $laundries = $query->get();

        if ($sort) {
            if ($sort == 'rating_desc') {
                $laundries = $laundries->sortByDesc('average_rating')->values();
            } elseif ($sort == 'price_asc') {
                $laundries = $laundries->sortBy(function($laundry) {
                    return $laundry->starting_price ?? 999999999;
                })->values();
            }
        }

        $popularStoreId = \App\Models\Order::select('mitra_laundry_id')
            ->groupBy('mitra_laundry_id')
            ->orderByRaw('COUNT(*) DESC')
            ->value('mitra_laundry_id');

        $bestUserId = \App\Models\Review::select('mitra_id')
            ->where('rating', 5)
            ->groupBy('mitra_id')
            ->orderByRaw('COUNT(*) DESC')
            ->value('mitra_id');
            
        $bestStoreId = $bestUserId 
            ? \App\Models\MitraLaundry::where('user_id', $bestUserId)->value('id')
            : null;

        return view('user.cari_laundry', compact('laundries', 'popularStoreId', 'bestStoreId'));
    })->name('user.cari-laundry');

    Route::get('/layanan', function () {
        return view('user.layanan');
    })->name('user.layanan');

    Route::get('/detail-laundry', function (\Illuminate\Http\Request $request) {
        $id = $request->query('id');
        if (!$id) {
            return redirect()->route('user.cari-laundry');
        }
        $laundry = \App\Models\MitraLaundry::findOrFail($id);
        $reviews = \App\Models\Review::with('user')->where('mitra_id', $laundry->user_id)->latest()->get();

        return view('user.detail_laundry', compact('laundry', 'reviews'));
    })->name('user.detail-laundry');

    Route::get('/pesanan', function () {
        return view('user.pesanan');
    })->name('user.pesanan');

    // Route::get('/detail-pesanan', function () {
    //     return view('user.detailPesanan');
    // })->name('user.detail-pesanan');

    Route::get('/pembayaran', function () {
        return view('user.pembayaran');
    })->name('user.pembayaran');

    Route::get('/chat', [\App\Http\Controllers\ChatController::class, 'index'])->name('user.chat');

    Route::get('/profile', function () {
        $addresses = UserAddress::where('user_id', Auth::id())->get();
        return view('user.profile_customer', compact('addresses'));
    })->name('user.profile');

    Route::get('/alamat-saya', function () {
        $addresses = UserAddress::where('user_id', Auth::id())->get();
        return view('user.alamat_saya', compact('addresses'));
    })->name('user.alamat-saya');

    Route::put('/alamat/{id}/primary',  [UserAddressController::class, 'setPrimary'])->name('alamat.primary');
    Route::put('/alamat/{id}/update',   [UserAddressController::class, 'update'])->name('alamat.update');
    Route::delete('/alamat/{id}/delete',[UserAddressController::class, 'destroy'])->name('alamat.delete');
    Route::post('/alamat/store',        [UserAddressController::class, 'store'])->name('alamat.store');

    // ── PESANAN ──────────────────────────────────────────
    Route::get('/buat-pesanan', function (\Illuminate\Http\Request $request) {
        $laundryId = $request->query('laundry_id');
        if (!$laundryId) {
            return redirect()->route('user.cari-laundry')->with('error', 'Silakan pilih mitra laundry terlebih dahulu.');
        }
        $laundry = App\Models\MitraLaundry::with('services')->findOrFail($laundryId);

        // Cek jika toko belum memiliki layanan, redirect kembali
        if ($laundry->services->count() == 0) {
            return redirect()->route('user.detail-laundry', ['id' => $laundryId])->with('error', 'Mitra ini belum memiliki layanan yang dapat dipesan.');
        }

        return view('user.buat_pesanan', compact('laundry'));
    })->name('user.buat-pesanan');

    Route::post('/pesanan',             [OrderController::class, 'store'])->name('user.pesanan.store');
    Route::get('/pesanan',              [OrderController::class, 'index'])->name('user.pesanan');
    Route::get('/pesanan/{id}',         [OrderController::class, 'show'])->name('user.detail-pesanan');
    Route::get('/pesanan/{id}/invoice', [OrderController::class, 'invoice'])->name('user.pesanan.invoice');
    Route::put('/pesanan/{id}/cancel',  [OrderController::class, 'cancel'])->name('user.pesanan.cancel');

    // Pembayaran Midtrans
    Route::post('/pesanan/{id}/bayar',  [\App\Http\Controllers\User\PaymentController::class, 'pay'])->name('user.pesanan.bayar');
    Route::get('/pesanan/{id}/cek-pembayaran', [\App\Http\Controllers\User\PaymentController::class, 'checkStatus'])->name('user.pesanan.cek_pembayaran');
    Route::post('/pesanan/{id}/success', [\App\Http\Controllers\User\PaymentController::class, 'successCallback'])->name('user.pesanan.success_callback');
    // Ulasan
    Route::post('/pesanan/{id}/review', [\App\Http\Controllers\ReviewController::class, 'store'])->name('user.review.store');
    // RATING
    Route::middleware('auth')->post('/rating', [RatingController::class, 'store'])->name('rating.store');

});


// ======================================================
// MITRA
// ======================================================

Route::middleware(['auth', 'mitra'])->prefix('mitra')->group(function () {

    Route::prefix('register')->group(function () {

        Route::get('/step-1', function () {
            return view('auth.register_mitra.step1');
        })->name('mitra.register.step1');

        Route::post('/step-1/store',
            [MitraRegisterController::class, 'storeStep1'])
            ->name('mitra.register.step1.store');

        Route::get('/step-2/{id}',
            [MitraRegisterController::class, 'step2'])
            ->name('mitra.register.step2');

        Route::post('/step-2/{id}/store',
            [MitraRegisterController::class, 'storeStep2'])
            ->name('mitra.register.step2.store');

        Route::get('/step-3/{id}', function ($id) {
            return "STEP 3 ID : " . $id;
        })->name('mitra.register.step3');

    });


    Route::get('/dashboard', [\App\Http\Controllers\Mitra\MitraController::class, 'dashboard'])->name('mitra.dashboard');

    // ── PESANAN ──────────────────────────────────────────
    Route::get('/pesanan-saya',             [MitraOrderController::class, 'index'])->name('mitra.pesanan');
    Route::get('/pesanan/{id}',             [MitraOrderController::class, 'show'])->name('mitra.pesanan.detail');
    Route::put('/pesanan/{id}/terima',      [MitraOrderController::class, 'terima'])->name('mitra.pesanan.terima');
    Route::put('/pesanan/{id}/tolak',       [MitraOrderController::class, 'tolak'])->name('mitra.pesanan.tolak');
    Route::put('/pesanan/{id}/update',      [MitraOrderController::class, 'updateStatus'])->name('mitra.pesanan.update');

    Route::get('/gagal-pickup',            [MitraOrderController::class, 'gagalPickup'])->name('mitra.gagal-pickup');

    // LAYANAN
    Route::get(
        '/layanan-saya',
        [MitraController::class, 'layanan']
    )->name('mitra.layanan');

    Route::get(
        '/tambah-layanan',
        [MitraController::class, 'createService']
    )->name('mitra.tambah-layanan');

    Route::post(
        '/tambah-layanan',
        [MitraController::class, 'storeService']
    )->name('mitra.store-layanan');

    Route::get(
        '/layanan/{id}/edit',
        [MitraController::class, 'editLayanan']
    )->name('mitra.edit-layanan');

    Route::put(
        '/layanan/{id}',
        [MitraController::class, 'updateLayanan']
    )->name('mitra.update-layanan');

    Route::delete(
        '/layanan/{id}',
        [MitraController::class, 'destroyLayanan']
    )->name('mitra.delete-layanan');

    // PROMOSI
    Route::get('/gambar-toko',          [MitraController::class, 'gambar'])->name('mitra.gambar');
    Route::post('/gambar-toko/upload',  [MitraController::class, 'uploadFoto'])->name('mitra.gambar.upload');
    Route::delete('/gambar-toko/hapus', [MitraController::class, 'hapusFoto'])->name('mitra.gambar.hapus');

    Route::get('/diskon', function () {
        return view('mitra.pusat_promosi.diskon');
    })->name('mitra.diskon');

    Route::get('/voucher-toko', function () {
        return view('mitra.pusat_promosi.voucher_toko');
    })->name('mitra.voucher');

    Route::get('/penilaian-toko', function () {
        $reviews = \App\Models\Review::with('user', 'order')->where('mitra_id', Auth::id())->latest()->get();

        $totalUlasan = $reviews->count();
        $rataRata = $totalUlasan > 0 ? $reviews->avg('rating') : 0;

        $ulasanPositif = $reviews->whereIn('rating', [4, 5])->count();
        $ulasanNetral = $reviews->where('rating', 3)->count();
        $ulasanNegatif = $reviews->whereIn('rating', [1, 2])->count();

        $totalPelanggan = $reviews->unique('user_id')->count();

        $rating5 = $reviews->where('rating', 5)->count();
        $rating4 = $reviews->where('rating', 4)->count();
        $rating3 = $reviews->where('rating', 3)->count();
        $rating2 = $reviews->where('rating', 2)->count();
        $rating1 = $reviews->where('rating', 1)->count();

        return view('mitra.layanan_customer.penilaian_toko', compact(
            'reviews', 'totalUlasan', 'rataRata', 'ulasanPositif', 'ulasanNetral',
            'ulasanNegatif', 'totalPelanggan', 'rating5', 'rating4', 'rating3', 'rating2', 'rating1'
        ));
    })->name('mitra.penilaian');

    Route::post('/review/{id}/reply', [\App\Http\Controllers\ReviewController::class, 'reply'])->name('mitra.review.reply');

    Route::get('/manajemen-chat', [\App\Http\Controllers\ChatController::class, 'indexMitra'])->name('mitra.chat');

    // KEUANGAN
    Route::get('/penghasilan-saya', function () {
        return view('mitra.keuangan.penghasilan_saya');
    })->name('mitra.penghasilan');

    Route::get('/saldo-saya', function () {
        return view('mitra.keuangan.saldo');
    })->name('mitra.saldo');

    Route::get('/rekening-bank', function () {
        return view('mitra.keuangan.rekening_bank');
    })->name('mitra.rekening');

    Route::get(
        '/pengaturan-pengiriman',
        [MitraController::class, 'pengiriman']
    )->name('mitra.pengiriman');

    Route::post(
        '/pengaturan-pengiriman/update',
        [MitraController::class, 'updatePengiriman']
    )->name('mitra.pengiriman.update');

    Route::get(
        '/profil-toko',
        [MitraController::class, 'profil']
    )->name('mitra.profil');

    Route::get('/profil-toko/edit',
        [MitraController::class, 'edit'])
        ->name('mitra.edit.profil');

    Route::post('/profil-toko/update',
        [MitraController::class, 'update'])
        ->name('mitra.update.profil');

});


// ======================================================
// ADMIN
// ======================================================

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard',
        [AdminController::class, 'dashboard']
    )->name('admin.dashboard');

    // MANAJEMEN
   Route::get(
        '/user',
        [AdminController::class, 'userManagement']
    )->name('admin.user');

    Route::get('/mitra-laundry', function () {
        return view('admin.manajemen.mitra_laundry');
    })->name('admin.mitra');

    Route::get('/verifikasi-mitra',[AdminController::class, 'index']
    )->name('admin.verifikasi');

    Route::put('/mitra/{id}/approve',
        [AdminController::class, 'approve'])
        ->name('admin.mitra.approve');

    Route::put('/mitra/{id}/reject',
        [AdminController::class, 'reject'])
        ->name('admin.mitra.reject');


    // MODERASI
    Route::get('/review-rating', function () {
        return view('admin.moderasi.review');
    })->name('admin.review');

    Route::get('/komplain', function () {
        return view('admin.moderasi.komplain');
    })->name('admin.komplain');

    // PENGATURAN
    Route::get('/notifikasi', function () {
        return view('admin.pengaturan.notifikasi');
    })->name('admin.notifikasi');

});
