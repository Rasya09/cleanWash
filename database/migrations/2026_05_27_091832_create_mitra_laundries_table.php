<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mitra_laundries', function (Blueprint $table) {
            $table->id();
            // RELATION
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            // STEP 1
            $table->string('owner_name');
            $table->string('store_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->text('description')->nullable();
            // STEP 2
            $table->string('province')->nullable();
            $table->string('village')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();
            // STEP 3
            $table->string('logo')->nullable();
            $table->json('store_photos')->nullable();
            // STEP 4
            $table->string('ktp')->nullable();
            $table->string('nib')->nullable();
            $table->string('npwp')->nullable();
            // STATUS
            $table->enum('status', [
                'draft',
                'pending',
                'approved',
                'rejected'
            ])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra_laundries');
    }
};
