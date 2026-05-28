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
        Schema::create('user_addresses', function (Blueprint $table) {

            $table->id();

            // =========================
            // RELATION
            // =========================

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');



            // =========================
            // ADDRESS INFO
            // =========================

            $table->string('label');
            // Rumah / Kos / Kantor

            $table->string('recipient_name');

            $table->string('phone');

            $table->text('address');

            $table->string('province')
                  ->nullable();

            $table->string('city')
                  ->nullable();

            $table->string('postal_code')
                  ->nullable();



            // =========================
            // GPS
            // =========================

            $table->decimal('latitude', 10, 7)
                  ->nullable();

            $table->decimal('longitude', 10, 7)
                  ->nullable();



            // =========================
            // PRIMARY ADDRESS
            // =========================

            $table->boolean('is_primary')
                  ->default(false);



            // =========================
            // TIMESTAMP
            // =========================

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
