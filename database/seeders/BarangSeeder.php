<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = [
            [
                'nama_barang' => 'Laptop',
            ],
            [
                'nama_barang' => 'PC',
            ],
            [
                'nama_barang' => 'Papan Tulis',
            ],
            [
                'nama_barang' => 'Proyektor',
            ]
        ];

        foreach($barang as $data) {
            Barang::create([
                'nama_barang' => $data['nama_barang'],
            ]);
        }
    }
}
