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
        Schema::table('reviews', function (Blueprint $table) {
            if (Schema::hasColumn('reviews', 'komentar')) {
                $table->renameColumn('komentar', 'comment');
            }
            if (!Schema::hasColumn('reviews', 'reply')) {
                $table->text('reply')->nullable()->after('comment');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            if (Schema::hasColumn('reviews', 'comment')) {
                $table->renameColumn('comment', 'komentar');
            }
            if (Schema::hasColumn('reviews', 'reply')) {
                $table->dropColumn('reply');
            }
        });
    }
};
