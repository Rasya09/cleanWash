<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Relasi
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('mitra_laundry_id')
                  ->constrained('mitra_laundries')
                  ->onDelete('cascade');

            // Info pesanan
            $table->string('order_code')->unique(); // ORD-XXXXX
            $table->enum('status', [
                'masuk',        // baru masuk, belum dikonfirmasi mitra
                'aktif',        // diterima mitra, sedang diproses
                'pickup',       // kurir menuju lokasi
                'diproses',     // sedang dicuci
                'pengantaran',  // dalam perjalanan balik
                'selesai',      // selesai & diterima customer
                'gagal_pickup', // gagal pickup
                'dibatalkan',   // dibatalkan
            ])->default('masuk');

            // Jadwal
            $table->date('tanggal_pickup');
            $table->time('waktu_pickup');

            // Alamat
            $table->text('alamat_pickup');
            $table->text('alamat_pengantaran');

            // Foto barang
            $table->string('foto_barang')->nullable();

            // Catatan
            $table->text('catatan')->nullable();

            // Alasan gagal/batal
            $table->text('alasan_gagal')->nullable();
            $table->text('alasan_batal')->nullable();

            // Harga
            $table->decimal('subtotal',     12, 2)->default(0);
            $table->decimal('ongkir',       12, 2)->default(0);
            $table->decimal('diskon',       12, 2)->default(0);
            $table->decimal('total_bayar',  12, 2)->default(0);

            // Pembayaran
            $table->enum('metode_bayar', ['cod', 'transfer', 'ewallet'])->default('cod');
            $table->enum('status_bayar', ['belum', 'lunas'])->default('belum');

            // Berat aktual (diisi setelah ditimbang)
            $table->decimal('berat_aktual', 8, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};