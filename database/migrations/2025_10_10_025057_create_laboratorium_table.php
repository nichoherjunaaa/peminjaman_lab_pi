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
        Schema::create('laboratorium', function (Blueprint $table) {
            $table->id('id_laboratorium');
            $table->string('nama_laboratorium', 100);
            $table->string('lokasi', 100)->nullable();
            $table->integer('kapasitas')->nullable();
            $table->text('deskripsi')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laboratorium');
    }
};
