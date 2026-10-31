<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaporanFactory extends Factory
{
    public function definition(): array
    {
        $faker = fake('id_ID');

        $lokasi = [
            'Dayeuhkolot',
            'Baleendah',
            'Bojongsoang',
            'Rancaekek',
            'Majalaya',
            'Cileunyi',
            'Banjaran',
            'Pameungpeuk',
            'Katapang',
            'Margahayu',
        ];

        return [
            'nama_pelapor' => $faker->name(),
            'lokasi' => $faker->randomElement($lokasi),
            'tinggi_genangan' => $faker->numberBetween(10, 150),
            'tanggal_kejadian' => $faker
                ->dateTimeBetween('-1 month', 'now')
                ->format('Y-m-d'),
            'keterangan' => $faker->sentence(12),
        ];
    }
}
