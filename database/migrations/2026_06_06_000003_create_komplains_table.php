<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komplains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporter_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('reported_user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('review_id')->nullable()->constrained('reviews')->onDelete('cascade');
            $table->text('alasan');
            $table->enum('status', ['pending', 'selesai', 'ditolak'])->default('pending');
            $table->text('tanggapan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komplains');
    }
};
