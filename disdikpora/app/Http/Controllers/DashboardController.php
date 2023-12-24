<?php

namespace App\Http\Controllers;


use App\Models\DataUmum;
use Illuminate\Http\Request;



class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $query = DataUmum::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->search . '%';
            $columns = ['nama_satuan_pendidikan', 'npsn', 'bentuk_pendidikan', 'status_sekolah', 'alamat', 'desa', 'kecamatan', 'kabupaten_kota', 'nama_kepala_sekolah'];

            $query->where(function ($subquery) use ($searchTerm, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'like', $searchTerm);
                }
            });
        }

        // Jumlah data per halaman
        $show = $request->input('show', 10);

        $dataUmum = $query->paginate($show);

        $message = $dataUmum->isEmpty() ? 'Tidak ada data yang ditemukan.' : null;

        return view('dashboard.index', compact('dataUmum', 'message'));
    }
}
