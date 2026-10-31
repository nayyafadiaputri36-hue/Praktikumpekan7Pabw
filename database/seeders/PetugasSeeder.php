<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 5 akun petugas dummy
        for ($i = 1; $i <= 5; $i++) {
            User::updateOrCreate(
                ['email' => 'petugas' . $i . '@bpbd.com'],
                [
                    'name' => 'Petugas ' . $i,
                    'password' => Hash::make('password123'),
                ]
            );
        }

        // Membuat akun Admin BPBD
        User::updateOrCreate(
            ['email' => 'admin@bpbd.com'],
            [
                'name' => 'Admin BPBD',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}