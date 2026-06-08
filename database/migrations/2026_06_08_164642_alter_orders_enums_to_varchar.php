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
        // Ubah kolom ENUM menjadi VARCHAR agar lebih fleksibel dan tidak mudah error (Data truncated)
        // ketika kita menambahkan status baru di masa depan atau ketika ada ketidaksesuaian nilai.
        DB::statement("ALTER TABLE orders MODIFY COLUMN status VARCHAR(50) DEFAULT 'masuk'");
        DB::statement("ALTER TABLE orders MODIFY COLUMN status_bayar VARCHAR(50) DEFAULT 'belum'");
        DB::statement("ALTER TABLE orders MODIFY COLUMN metode_bayar VARCHAR(50) DEFAULT 'cod'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert ke ENUM (harus mencantumkan semua kemungkinan value)
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('masuk','aktif','pickup','ditimbang','menunggu_pembayaran','diproses','pengantaran','selesai','gagal_pickup','dibatalkan') DEFAULT 'masuk'");
        DB::statement("ALTER TABLE orders MODIFY COLUMN status_bayar ENUM('belum','lunas','menunggu_timbangan','menunggu_pembayaran') DEFAULT 'belum'");
        DB::statement("ALTER TABLE orders MODIFY COLUMN metode_bayar ENUM('cod','transfer','ewallet') DEFAULT 'cod'");
    }
};
