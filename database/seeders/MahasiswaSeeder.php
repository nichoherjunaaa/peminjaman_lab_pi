<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswaList = [
            [
                'nim' => '235314122',
                'nama' => 'Nicho Herjuna',
                'prodi' => 'Teknik Informatika',
                'email' => 'nicho@example.com',
                'nomor_telepon' => '081234567890',
            ],
            [
                'nim' => '2251002',
                'nama' => 'Siti Rahmawati',
                'prodi' => 'Sistem Informasi',
                'email' => 'siti.rahma@example.com',
                'nomor_telepon' => '081234567891',
            ],
            [
                'nim' => '2251003',
                'nama' => 'Andi Pratama',
                'prodi' => 'Teknik Komputer',
                'email' => 'andi.pratama@example.com',
                'nomor_telepon' => '081234567892',
            ],
        ];

        foreach ($mahasiswaList as $data) {
            $mhs = Mahasiswa::create($data);

            User::create([
                'username' => $data['nim'],
                'password' => '123456',
                'role' => 'mahasiswa',
            ]);
        }
    }
}
