<?php

namespace Database\Seeders;

use App\Models\Laboratorium;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaboratoriumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laboratorium = [
            [
                'nama_laboratorium' => 'Laboratorium Komputer Dasar A',
                'lokasi' => 'Lantai 2',
                'kapasitas' => 30,
                'deskripsi' => 'Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.',
                'status' => 'tersedia',
                'luas' => 100
            ],
            [
                'nama_laboratorium' => 'Laboratorium Komputer Dasar B',
                'lokasi' => 'Lantai 2',
                'kapasitas' => 20,
                'deskripsi' => 'Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.',
                'status' => 'tersedia',
                'luas' => 72
            ],
            [
                'nama_laboratorium' => 'Laboratorium Komputer Dasar C',
                'lokasi' => 'Lantai 2',
                'kapasitas' => 30,
                'deskripsi' => 'Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.',
                'status' => 'tersedia',
                'luas' => 100
            ],
            [
                'nama_laboratorium' => 'Laboratorium Basis Data A',
                'lokasi' => 'Lantai 3',
                'kapasitas' => 30,
                'deskripsi' => 'Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.',
                'status' => 'tersedia',
                'luas' => 100
            ],
            [
                'nama_laboratorium' => 'Laboratorium Basis Data B',
                'lokasi' => 'Lantai 3',
                'kapasitas' => 30,
                'deskripsi' => 'Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.',
                'status' => 'tersedia',
                'luas' => 100
            ],
            [
                'nama_laboratorium' => 'Laboratorium Basis Data C',
                'lokasi' => 'Lantai 3',
                'kapasitas' => 30,
                'deskripsi' => 'Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.',
                'status' => 'tersedia',
                'luas' => 100
            ],
            [
                'nama_laboratorium' => 'Laboratorium Komputer Jaringan A',
                'lokasi' => 'Lantai 4',
                'kapasitas' => 30,
                'deskripsi' => 'Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.',
                'status' => 'tersedia',
                'luas' => 100
            ],
            [
                "nama_laboratorium" => "Laboratorium Komputer Jaringan B",
                "lokasi" => "Lantai 4",
                "kapasitas" => 30,
                "deskripsi" => "Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.",
                "status" => "tersedia",
                "luas" => 100
            ],
            [
                "nama_laboratorium" => "Laboratorium Komputer Jaringan E",
                "lokasi" => "Lantai 4",
                "kapasitas" => 40,
                "deskripsi" => "Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.",
                "status" => "tersedia",
                "luas" => 100
            ]
        ];

        foreach ($laboratorium as $data) {
            Laboratorium::firstOrCreate(
                ['nama_laboratorium' => $data['nama_laboratorium']],
                $data
            );
        }
    }
}
