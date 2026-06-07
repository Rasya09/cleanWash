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
        Schema::create('laundry_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_laundry_id')
                ->constrained('mitra_laundries')
                ->cascadeOnDelete();
            $table->string('service_name');
            $table->integer('base_price');
            $table->integer('estimated_days');
            $table->integer('minimum_order')
                ->nullable();
            $table->integer('maximum_order')
                ->nullable();
            $table->boolean('is_active')
                ->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry_services');
    }
};
