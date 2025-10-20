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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->integer('nim', 20)->primary()->unique();
            $table->string('nama', 100);
            $table->string('prodi', 100)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('nomor_telepon', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
