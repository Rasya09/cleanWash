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