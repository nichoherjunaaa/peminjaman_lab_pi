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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('id_dosen');
            $table->string('nip', 20)->unique();
            $table->string('nama', 100);
            $table->string('email', 100)->unique()->nullable();
            $table->string('nomor_telepon', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
