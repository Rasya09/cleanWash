<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Hapus data lama agar tidak konflik
        DB::table('laundry_services')->delete();

        Schema::table('laundry_services', function (Blueprint $table) {
            $table->boolean('is_setrika')->default(false)->after('service_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laundry_services', function (Blueprint $table) {
            $table->dropColumn('is_setrika');
        });
    }
};
