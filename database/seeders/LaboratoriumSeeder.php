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
                'lokasi' => 'Lantai 1',
                'kapasitas' => 30,
                'deskripsi' => 'Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.',
            ],
            [
                'nama_laboratorium' => 'Laboratorium Komputer Dasar B',
                'lokasi' => 'Lantai 1',
                'kapasitas' => 20,
                'deskripsi' => 'Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.',
            ]
        ];

        foreach ($laboratorium as $data) {
            Laboratorium::firstOrCreate(
                ['nama_laboratorium' => $data['nama_laboratorium']], // cek berdasarkan nama
                $data
            );
        }
    }
}
