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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->foreignId('id_mahasiswa')->nullable()->constrained('mahasiswa', 'id_mahasiswa')->onDelete('set null');
            $table->foreignId('id_dosen')->nullable()->constrained('dosen', 'id_dosen')->onDelete('set null');
            $table->foreignId('id_laboratorium')->constrained('laboratorium', 'id_laboratorium')->onDelete('cascade');
            $table->foreignId('id_jadwal')->nullable()->constrained('jadwal', 'id_jadwal')->onDelete('set null');
            $table->foreignId('id_admin')->nullable()->constrained('admin', 'id_admin')->onDelete('set null');
            $table->date('tanggal');
            $table->string('nama_kegiatan', 150);
            $table->text('keperluan')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'done'])->default('pending');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }

};
