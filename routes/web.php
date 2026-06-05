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

// ======================================================
// PUBLIC / GUEST
// ======================================================

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/cari-laundry', function () {
    return view('user.cari_laundry');
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
    Route::get('/chat/messages', [\App\Http\Controllers\ChatController::class, 'fetchMessages'])->name('chat.messages');
    Route::post('/chat/send', [\App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.send');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


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

    Route::get('/cari-laundry', function () {
        return view('user.cari_laundry');
    })->name('user.cari-laundry');

    Route::get('/layanan', function () {
        return view('user.layanan');
    })->name('user.layanan');

    Route::get('/detail-laundry', function () {
        // Karena sementara masih statis, kita ambil semua review yang ada
        $reviews = \App\Models\Review::with('user')->latest()->get();
        return view('user.detail_laundry', compact('reviews'));
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

    Route::get('/chat', function () {
        $contact = \App\Models\User::where('role', 'mitra')->first();
        return view('user.chat', compact('contact'));
    })->name('user.chat');

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
    Route::get('/buat-pesanan', function () {
        $laundry = App\Models\MitraLaundry::findOrFail(1);
        return view('user.buat_pesanan', compact('laundry'));
    })->name('user.buat-pesanan');

    Route::post('/pesanan',             [OrderController::class, 'store'])->name('user.pesanan.store');
    Route::get('/pesanan',              [OrderController::class, 'index'])->name('user.pesanan');
    Route::get('/pesanan/{id}',         [OrderController::class, 'show'])->name('user.detail-pesanan');
    Route::put('/pesanan/{id}/cancel',  [OrderController::class, 'cancel'])->name('user.pesanan.cancel');
    
    // Ulasan
    Route::post('/pesanan/{id}/review', [\App\Http\Controllers\ReviewController::class, 'store'])->name('user.review.store');

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


    Route::get('/dashboard', function () {
        return view('mitra.home');
    })->name('mitra.dashboard');

    // ── PESANAN ──────────────────────────────────────────
    Route::get('/pesanan-saya',             [MitraOrderController::class, 'index'])->name('mitra.pesanan');
    Route::get('/pesanan/{id}',             [MitraOrderController::class, 'show'])->name('mitra.pesanan.detail');
    Route::put('/pesanan/{id}/terima',      [MitraOrderController::class, 'terima'])->name('mitra.pesanan.terima');
    Route::put('/pesanan/{id}/tolak',       [MitraOrderController::class, 'tolak'])->name('mitra.pesanan.tolak');
    Route::put('/pesanan/{id}/update',      [MitraOrderController::class, 'updateStatus'])->name('mitra.pesanan.update');

    Route::get('/gagal-pickup', function () {
        return view('mitra.pesanan.gagal_pickup');
    })->name('mitra.gagal-pickup');

    Route::get('/pengaturan-pengiriman', function () {
        return view('mitra.pesanan.pengaturan_pengiriman');
    })->name('mitra.pengiriman');

    // LAYANAN
    Route::get('/layanan-saya', function () {
        return view('mitra.layanan.layanan_saya');
    })->name('mitra.layanan');

    Route::get('/tambah-layanan', function () {
        return view('mitra.layanan.tambah_layanan');
    })->name('mitra.tambah-layanan');

    // PROMOSI
    Route::get('/gambar-toko', function () {
        return view('mitra.pusat_promosi.gambar');
    })->name('mitra.gambar');

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

    Route::get('/manajemen-chat', function () {
        $contact = \App\Models\User::where('role', 'user')->first();
        return view('mitra.layanan_customer.manajemen_chat', compact('contact'));
    })->name('mitra.chat');

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

    // DATA TOKO
    Route::get('/performa-toko', function () {
        return view('mitra.data.perfoma_toko');
    })->name('mitra.performa');

    Route::get('/kesehatan-toko', function () {
        return view('mitra.data.kesehatan_toko');
    })->name('mitra.kesehatan');

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