<?php


namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\DataUmum;

class DataUmumImport implements ToModel
{
    public function model(array $row)
    {
        return new DataUmum([
            'nama_satuan_pendidikan' => $row[0],
            'npsn' => $row[1],
            'bentuk_pendidikan' => $row[2],
            'status_sekolah' => $row[3],
            'alamat' => $row[4],
            'desa' => $row[5],
            'kecamatan' => $row[6],
            'kabupaten_kota' => $row[7],
            'nama_kepala_sekolah' => $row[8],
        ]);
    }
    
}
