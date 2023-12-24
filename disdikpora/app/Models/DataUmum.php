<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmum extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'dataumum';

    protected $fillable = [
        'nama_satuan_pendidikan',
        'npsn',
        'bentuk_pendidikan',
        'status_sekolah',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten_kota',
        'nama_kepala_sekolah',
    ];

    public function saveDataUmum(array $data)
    {
        $this->nama_satuan_pendidikan = $data['nama_satuan_pendidikan'];
        $this->npsn = $data['npsn'];
        $this->bentuk_pendidikan = $data['bentuk_pendidikan'];
        $this->status_sekolah = $data['status_sekolah'];
        $this->alamat = $data['alamat'];
        $this->desa = $data['desa'];
        $this->kecamatan = $data['kecamatan'];
        $this->kabupaten_kota = $data['kabupaten_kota'];
        $this->nama_kepala_sekolah = $data['nama_kepala_sekolah'];

        $this->save();
    }
}
