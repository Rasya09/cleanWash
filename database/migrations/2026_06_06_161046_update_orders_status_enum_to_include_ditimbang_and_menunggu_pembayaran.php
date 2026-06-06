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
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('masuk','aktif','pickup','ditimbang','menunggu_pembayaran','diproses','pengantaran','selesai','gagal_pickup','dibatalkan') DEFAULT 'masuk'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('masuk','aktif','pickup','diproses','pengantaran','selesai','gagal_pickup','dibatalkan') DEFAULT 'masuk'");
    }
};
