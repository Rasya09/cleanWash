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
        // Alter ENUM pada MySQL untuk menambahkan 'menunggu_timbangan'
        DB::statement("ALTER TABLE orders MODIFY COLUMN status_bayar ENUM('belum', 'lunas', 'menunggu_timbangan') DEFAULT 'belum'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert kembali ke default jika dibutuhkan
        DB::statement("ALTER TABLE orders MODIFY COLUMN status_bayar ENUM('belum', 'lunas') DEFAULT 'belum'");
    }
};
