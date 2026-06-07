<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('komplains', function (Blueprint $table) {
            $table->foreignId('mitra_laundry_id')->nullable()->after('review_id')->constrained('mitra_laundries')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('komplains', function (Blueprint $table) {
            $table->dropForeign(['mitra_laundry_id']);
            $table->dropColumn('mitra_laundry_id');
        });
    }
};
