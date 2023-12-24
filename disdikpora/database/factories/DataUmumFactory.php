<?php

use App\Models\DataUmum;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataUmumFactory extends Factory
{
    protected $model = DataUmum::class;

    public function definition()
    {
        return [
            'nama_satuan_pendidikan' => $this->faker->name,
            'npsn' => $this->faker->randomNumber(8),
            'bentuk_pendidikan' => $this->faker->word,
            'status_sekolah' => $this->faker->word,
            'alamat' => $this->faker->address,
            'desa' => $this->faker->word,
            'kecamatan' => $this->faker->word,
            'kabupaten_kota' => $this->faker->word,
            'nama_kepala_sekolah' => $this->faker->name,
        ];
    }
}
