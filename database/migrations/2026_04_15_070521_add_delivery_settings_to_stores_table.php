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
        Schema::table('stores', function (Blueprint $table) {
            $table->boolean('delivery_available')->default(true)->after('status');
            $table->decimal('delivery_cost', 10, 2)->default(0)->after('delivery_available');
            $table->decimal('delivery_radius_km', 8, 2)->default(5)->after('delivery_cost');
            $table->decimal('min_weight_kg', 8, 2)->default(1)->after('delivery_radius_km');
            $table->string('open_time')->nullable()->after('min_weight_kg');
            $table->string('close_time')->nullable()->after('open_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn([
                'delivery_available',
                'delivery_cost',
                'delivery_radius_km',
                'min_weight_kg',
                'open_time',
                'close_time',
            ]);
        });
    }
};
