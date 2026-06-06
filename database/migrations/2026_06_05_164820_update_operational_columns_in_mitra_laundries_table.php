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
        Schema::table('mitra_laundries', function (Blueprint $table) {
            $table->dropColumn('operational_hours');

            $table->json('operational_days')
                ->nullable();

            $table->time('open_time')
                ->nullable();

            $table->time('close_time')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mitra_laundries', function (Blueprint $table) {
            //
        });
    }
};
