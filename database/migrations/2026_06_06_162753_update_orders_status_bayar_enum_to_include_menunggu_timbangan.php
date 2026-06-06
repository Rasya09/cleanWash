<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tambahkan nilai baru ke dalam ENUM tanpa menghapus yang lama terlebih dahulu
        DB::statement("ALTER TABLE orders MODIFY COLUMN status_bayar ENUM('belum', 'menunggu_timbangan', 'menunggu_pembayaran', 'lunas') DEFAULT 'menunggu_timbangan'");

        // 2. Migrasikan data lama yang statusnya 'belum' menjadi 'menunggu_timbangan' (sebagai default awal)
        DB::table('orders')->where('status_bayar', 'belum')->update(['status_bayar' => 'menunggu_timbangan']);

        // 3. Hapus 'belum' dari ENUM agar hanya tersisa 3 nilai sesuai permintaan
        DB::statement("ALTER TABLE orders MODIFY COLUMN status_bayar ENUM('menunggu_timbangan', 'menunggu_pembayaran', 'lunas') DEFAULT 'menunggu_timbangan'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Tambahkan 'belum' kembali
        DB::statement("ALTER TABLE orders MODIFY COLUMN status_bayar ENUM('belum', 'menunggu_timbangan', 'menunggu_pembayaran', 'lunas') DEFAULT 'belum'");

        // 2. Kembalikan data
        DB::table('orders')
            ->whereIn('status_bayar', ['menunggu_timbangan', 'menunggu_pembayaran'])
            ->update(['status_bayar' => 'belum']);

        // 3. Kembalikan ENUM asli
        DB::statement("ALTER TABLE orders MODIFY COLUMN status_bayar ENUM('belum', 'lunas') DEFAULT 'belum'");
    }
};
