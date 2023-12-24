<?php

namespace Database\Seeders;

use App\Models\DataUmum;
use Faker\Factory as Faker;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DataUmum::create([
                'nama_satuan_pendidikan' => $faker->company,
                'npsn' => $faker->randomNumber(8),
                'bentuk_pendidikan' => $faker->word,
                'status_sekolah' => $faker->word,
                'alamat' => $faker->streetAddress,
                'desa' => $faker->city,
                'kecamatan' => $faker->city,
                'kabupaten_kota' => $faker->city,
                'nama_kepala_sekolah' => $faker->name,
            ]);
        }
    }
}
