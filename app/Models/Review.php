<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database
    protected $table = 'reviews';

    // Kolom-kolom yang wajib ada di database dan boleh diisi
    protected $fillable = [
        'user_id',       // Foreign key: Untuk memanggil data {nama, hp, email} pelanggan
        'mitra_id',      // Foreign key: Untuk memanggil data {nama, logo, warna, kota} mitra
        'order_id',      // Foreign key: Untuk memanggil data order (tglOrder, tglSelesai, totalBayar)
        'rating',        // Menyimpan angka rating (1-5)
        'komentar',      // Menyimpan isi teks review
        'status',        // Menyimpan status ('wait', 'ok', 'rej')
        'approved_by',   // Menyimpan nama admin (misal: 'Super Admin') atau null
        'approved_at'    // Menyimpan waktu disetujui atau null
    ];

    /**
     * Tipe data kolom (Casting)
     * Mengubah format otomatis saat data ditarik dari database
     */
    protected $casts = [
        'approved_at' => 'datetime',
        'rating' => 'integer',
    ];

    // ======================================================
    // RELASI ANTAR TABEL (Meniru struktur bersarang di Dummy)
    // ======================================================

    /**
     * Relasi ke tabel pelanggan (users)
     * Ini akan menggantikan objek `pelanggan: {...}` di data dummy
     */
    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke tabel mitra laundry
     * Ini akan menggantikan objek `mitra: {...}` di data dummy
     */
    public function mitra()
    {
        // Pastikan kamu punya model Mitra.php
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }

    /**
     * Relasi ke tabel order/pesanan
     * Ini untuk mengambil orderId, tglOrder, tglSelesai, dan totalBayar
     */
    public function order()
    {
        // Pastikan kamu punya model Order.php / Pesanan.php
        return $this->belongsTo(Order::class, 'order_id');
    }
}