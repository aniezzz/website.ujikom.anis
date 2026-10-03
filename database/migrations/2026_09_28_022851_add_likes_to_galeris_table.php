<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('galeris', 'likes')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->unsignedInteger('likes')->default(0);
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('galeris', 'likes')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->dropColumn('likes');
            });
        }
    }
};