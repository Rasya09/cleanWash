<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->onDelete('cascade');

            // Nama layanan (snapshot saat order, bukan FK agar tidak berubah)
            $table->string('nama_layanan');   // e.g. "Cuci Kering"
            $table->string('jenis_layanan');  // e.g. "cuci_kiloan"

            // Harga & qty
            $table->decimal('harga_per_kg',  10, 2)->nullable(); // untuk kiloan
            $table->decimal('harga_satuan',  10, 2)->nullable(); // untuk satuan/pcs
            $table->decimal('estimasi_berat', 8, 2)->nullable(); // estimasi awal
            $table->decimal('berat_aktual',   8, 2)->nullable(); // diisi setelah timbang
            $table->integer('qty')->default(1);                  // untuk satuan

            // Subtotal item
            $table->decimal('subtotal', 12, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};