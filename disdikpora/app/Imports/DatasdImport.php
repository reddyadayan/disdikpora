<?php

namespace App\Imports;

use App\Models\Datasd;
use Maatwebsite\Excel\Concerns\ToModel;

class DatasdImport implements ToModel
{
    public function model(array $row)
    {
        return new Datasd([
            'nama_satuan_pendidikan' => $row[0],
            'npsn' => $row[1],
            'bentuk_pendidikan' => $row[2],
            'status_sekolah' => $row[3],
            'alamat' => $row[4],
            'desa' => $row[5],
            'kecamatan' => $row[6],
            'kabupaten_kota' => $row[7],
        ]);
    }
    
}
