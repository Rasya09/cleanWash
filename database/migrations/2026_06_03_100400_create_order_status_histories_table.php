<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_status_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->onDelete('cascade');

            // Siapa yang mengubah status
            $table->foreignId('changed_by')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->string('role_changer'); // 'user' | 'mitra' | 'system'

            // Status
            $table->string('status_lama')->nullable();
            $table->string('status_baru');

            // Catatan opsional (misal alasan tolak/batal)
            $table->text('catatan')->nullable();

            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_status_histories');
    }
};