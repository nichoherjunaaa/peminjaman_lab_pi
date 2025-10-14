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
        Schema::table('laboratorium', function (Blueprint $table) {
            $table->enum('status', ['tersedia', 'dalam perawatan', 'tidak tersedia'])->default('tersedia');
            $table->integer("luas")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laboratorium', function (Blueprint $table) {
            $table->dropColumn("status");
            $table->dropColumn("luas");
        });
    }
};
