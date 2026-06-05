<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_laundry_id')->constrained('mitra_laundries')->onDelete('cascade');
            $table->string('nama');
            $table->string('kategori'); // kiloan, satuan, setrika, etc
            $table->string('subkategori')->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 2);
            $table->string('satuan')->default('kg'); // kg, item, etc
            $table->integer('min_order')->default(1);
            $table->integer('estimasi_hari')->default(1);
            $table->string('jam_buka')->default('08:00');
            $table->string('jam_tutup')->default('18:00');
            $table->boolean('is_active')->default(true);
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
