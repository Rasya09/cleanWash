<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
    request()->routeIs('home') ? 'active' : '';
})->name('home');

Route::get('cari-laundry', function () {
    return view('user.cari_laundry');
    request()->routeIs('cari-laundry') ? 'active' : '';
})->name('cari-laundry');

Route::get('layanan', function () {
    return view('user.layanan');
    request()->routeIs('layanan') ? 'active' : '';
})->name('layanan');

Route::get('login', function () {
    return view('user.login');
})->name('login');

Route::get('register', function () {
    return view('user.register');
})->name('register');

Route::get('detail_pesanan', function () {
    return view('user.detail_pesanan');
})->name('detail_pesanan');

Route::get('detail_laundry', function () {
    return view('user.detail_laundry');
})->name('detail_laundry');

Route::get('pesanan', function () {
    return view('user.pesanan');
})->name('pesanan');

Route::get('pembayaran', function () {
    return view('user.pembayaran');
})->name('pembayaran');

Route::get('profile_customer', function () {
    return view('user.profile_customer');
})->name('profile_customer');


Route::get('home-mitra', function () {
    return view('mitra.home');
})->name('home-mitra');

Route::get('pesanan-saya', function () {
    return view('mitra.pesanan.pesanan_saya');
})->name('pesanan-saya');

Route::get('gagal-pickup', function () {
    return view('mitra.pesanan.gagal_pickup');
})->name('gagal-pickup');

Route::get('pengaturan-pengiriman', function () {
    return view('mitra.pesanan.pengaturan_pengiriman');
})->name('pengaturan-pengiriman');

Route::get('layanan-saya', function () {
    return view('mitra.layanan.layanan_saya');
})->name('layanan-saya');

Route::get('tambah-layanan', function () {
    return view('mitra.layanan.tambah_layanan');
})->name('tambah-layanan');

Route::get('gambar-toko', function () {
    return view('mitra.pusat_promosi.gambar');
})->name('gambar-toko');

Route::get('diskon', function () {
    return view('mitra.pusat_promosi.diskon');
})->name('diskon');

Route::get('voucher-toko', function () {
    return view('mitra.pusat_promosi.voucher_toko');
})->name('voucher-toko');

Route::get('penilaian-toko', function () {
    return view('mitra.layanan_customer.penilaian_toko');
})->name('penilaian-toko');

Route::get('manajemen-chat', function () {
        return view('mitra.layanan_customer.manajemen_chat');
})->name('manajemen-chat');

Route::get('penghasilan-saya', function () {
    return view('mitra.keuangan.penghasilan_saya');
})->name('penghasilan-saya');

Route::get('saldo-saya', function () {
    return view('mitra.keuangan.saldo');
})->name('saldo-saya');

Route::get('rekening-bank', function () {
    return view('mitra.keuangan.rekening_bank');
})->name('rekening-bank');

Route::get('performa-toko', function () {
    return view('mitra.data.perfoma_toko');
})->name('performa-toko');

Route::get('kesehatan-toko', function () {
    return view('mitra.data.kesehatan_toko');
})->name('kesehatan-toko');

Route::get('dashboard-admin', function () {
    return view('admin.dashboard');
})->name('dashboard-admin');

Route::get('user-admin', function () {
    return view('admin.user');
})->name('user-admin');

Route::get('mitra_laundry-admin', function () {
    return view('admin.mitra_laundry');
})->name('mitra_laundry-admin');

Route::get('verifikasi_mitra-admin', function () {
    return view('admin.verifikasi_mitra');
})->name('verifikasi_mitra-admin');

Route::get('pesanan-admin', function () {
    return view('admin.pesanan');
})->name('pesanan-admin');

Route::get('pembayaran-admin', function () {
    return view('admin.pembayaran');
})->name('pembayaran-admin');

Route::get('review_rating-admin', function () {
    return view('admin.review_rating');
})->name('review_rating-admin');

Route::get('komplain-admin', function () {
    return view('admin.komplain');
})->name('komplain-admin');

Route::get('statistik_laporan-admin', function () {
    return view('admin.statistik_laporan');
})->name('statistik_laporan-admin');

Route::get('aktivitas-admin', function () {
    return view('admin.aktivitas');
})->name('aktivitas-admin');

Route::get('pengaturan_platform-admin', function () {
    return view('admin.pengaturan_platform');
})->name('pengaturan_platform-admin');

Route::get('admin_role-admin', function () {
    return view('admin.admin_role');
})->name('admin_role-admin');

Route::get('notifikasi-admin', function () {
    return view('admin.notifikasi');
})->name('notifikasi-admin');