<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAddressController;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MitraRegisterController;



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

Route::get('/detail-laundry', function () {
    return view('user.detail_laundry');
})->name('detail-laundry');


// ======================================================
// AUTH (hanya bisa diakses kalau belum login)
// ======================================================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);
});


// ======================================================
// LOGOUT
// ======================================================

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ======================================================
// USER (wajib login)
// ======================================================

Route::middleware('auth')->prefix('user')->group(function () {

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
        return view('user.detail_laundry');
    })->name('user.detail-laundry');

    Route::get('/pesanan', function () {
        return view('user.pesanan');
    })->name('user.pesanan');

    Route::get('/detail-pesanan', function () {
        return view('user.detail_pesanan');
    })->name('user.detail-pesanan');

    Route::get('/pembayaran', function () {
        return view('user.pembayaran');
    })->name('user.pembayaran');

    Route::get('/chat', function () {
        return view('user.chat');
    })->name('user.chat');
    
    Route::get('/profile', function () {
        $addresses = UserAddress::where(
            'user_id',
            Auth::id()
        )->get();
        return view('user.profile_customer', compact('addresses'));
    })->name('user.profile');

    Route::get('/alamat-saya', function () {
        $addresses = UserAddress::where(
            'user_id',
            Auth::id()
        )->get();
        return view('user.alamat_saya', compact('addresses'));
    })->name('user.alamat-saya');

    Route::put('/alamat/{id}/primary',
    [UserAddressController::class, 'setPrimary'])
    ->name('alamat.primary');

    Route::put('/alamat/{id}/update',
    [UserAddressController::class, 'update'])
    ->name('alamat.update');

    Route::delete('/alamat/{id}/delete',
    [UserAddressController::class, 'destroy'])
    ->name('alamat.delete');

    Route::post('/alamat/store',
    [UserAddressController::class, 'store'])
    ->name('alamat.store');

});


// ======================================================
// MITRA (wajib login)
// ======================================================

Route::middleware('auth')->prefix('mitra')->group(function () {

    Route::middleware('auth') ->prefix('register') ->group(function () {

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

    // PESANAN
    Route::get('/pesanan-saya', function () {
        return view('mitra.pesanan.pesanan_saya');
    })->name('mitra.pesanan');

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


    // CUSTOMER SERVICE
    Route::get('/penilaian-toko', function () {
        return view('mitra.layanan_customer.penilaian_toko');
    })->name('mitra.penilaian');

    Route::get('/manajemen-chat', function () {
        return view('mitra.layanan_customer.manajemen_chat');
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

});


// ======================================================
// ADMIN (wajib login)
// ======================================================

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.home');
    })->name('admin.dashboard');

    // MANAJEMEN
    Route::get('/user', function () {
        return view('admin.manajemen.user');
    })->name('admin.user');

    Route::get('/mitra-laundry', function () {
        return view('admin.manajemen.mitra_laundry');
    })->name('admin.mitra');

    Route::get('/verifikasi-mitra', function () {
        return view('admin.manajemen.verifikasi_mitra');
    })->name('admin.verifikasi');


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