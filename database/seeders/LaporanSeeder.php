<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 15 laporan dummy menggunakan Factory
        Laporan::factory()->count(15)->create();
    }
}
