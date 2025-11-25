<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'nip' => '999999',
                'nama' => 'Administrator',
                'email' => 'admin@gmail.com',
                'nomor_telepon' => '081227631999',
            ]
        ];
        
        foreach ($admin as $data) {
            $admin = Dosen::create($data);
            User::create([
                'username' => $data['nip'],
                'password' => '123456',
                'role' => 'admin',
            ]);
        }
    }
}
