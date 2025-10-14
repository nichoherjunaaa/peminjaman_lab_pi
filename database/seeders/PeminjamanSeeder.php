<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peminjaman = [
            [
                'id_peminjaman' => 1,
                'id_peminjam' => 1,
                'peminjam_type' => 'mahasiswa',
                'id_laboratorium' => 1,
                'tanggal' => '2025-10-21',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                "nama_kegiatan" => "Seminar Technology",
                "keperluan" => "Penggunaan tempat seminar",
                "status" => "pending",
            ],
            [
                'id_peminjaman' => 2,
                'id_peminjam' => 1,
                'peminjam_type' => 'dosen',
                'id_laboratorium' => 2,
                'tanggal' => '2025-10-24',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                "nama_kegiatan" => "Praktikum Pemrograman Web",
                "keperluan" => "Agenda praktikum pemrograman web",
                "status" => "approved",
            ],
            [
                'id_peminjaman' => 3,
                'id_peminjam' => 1,
                'peminjam_type' => 'dosen',
                'id_laboratorium' => 2,
                'tanggal' => '2025-10-25',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                "nama_kegiatan" => "Praktikum Pemrograman Platform",
                "keperluan" => "Agenda praktikum pemrograman platform",
                "status" => "approved",
            ],
            [
                'id_peminjaman' => 4,
                'id_peminjam' => 2,
                'peminjam_type' => 'mahasiswa',
                'id_laboratorium' => 5,
                'tanggal' => '2025-10-26',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '10:00:00',
                "nama_kegiatan" => "Seleksi Lomba Pemrograman Mobile",
                "keperluan" => "Agenda lomba pemrograman mobile",
                "status" => "rejected",
            ]
        ];

        foreach ($peminjaman as $data) {
            Peminjaman::firstOrCreate(
                ['nama_kegiatan' => $data['nama_kegiatan']],
                $data
            );
        }
    }
}
