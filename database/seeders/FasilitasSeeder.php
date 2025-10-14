<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fasilitas = [
            [
                'id_laboratorium' => 1,
                'id_barang' => 1,
                'jumlah' => 30,
                'kondisi' => 'baik',
            ],
            [
                'id_laboratorium' => 1,
                'id_barang' => 3,
                'jumlah' => 1,
                'kondisi' => 'baik',
            ],
            [
                'id_laboratorium' => 1,
                'id_barang' => 4,
                'jumlah' => 1,
                'kondisi' => 'baik',
            ]
        ];

        foreach($fasilitas as $data) {
            Fasilitas::create([
                'id_laboratorium' => $data['id_laboratorium'],
                'id_barang' => $data['id_barang'],
                'jumlah' => $data['jumlah'],
                'kondisi' => $data['kondisi'],
            ]);
        }
    }
}
