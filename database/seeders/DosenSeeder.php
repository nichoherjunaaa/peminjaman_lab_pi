<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosen = [
            [
                'nip' => '235314121',
                'nama' => 'Alfeus Galih',
                'email' => 'alfeusdosen@gmail.com',
                'nomor_telepon' => '081234567890',
            ],
        ];

        foreach ($dosen as $data) {
            $dosen = Dosen::create($data);

            User::create([
                'username' => $data['nip'],
                'password' => '123456',
                'role' => 'dosen',
            ]);
        }
    }
}
