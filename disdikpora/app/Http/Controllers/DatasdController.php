<?php

namespace App\Http\Controllers;

use App\Models\Datasd;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DatasdExport;
use App\Imports\DatasdImport;

class DatasdController extends Controller
{
    public function index(Request $request)
    {
        $query = Datasd::query();

        // Pencarian
        if ($request->has('search')) {
            $searchTerm = '%' . $request->search . '%';
            $columns = ['nama_satuan_pendidikan', 'npsn', 'bentuk_pendidikan', 'status_sekolah', 'alamat', 'desa', 'kecamatan', 'kabupaten_kota', 'nama_kepala_sekolah'];

            $query->where(function ($subquery) use ($searchTerm, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'like', $searchTerm);
                }
            });
        }

        $show = $request->input('show', 10);

        $datasd = $query->paginate($show);

        $message = $datasd->isEmpty() ? 'Tidak ada data yang ditemukan.' : null;

        return view('data.datasd', compact('datasd', 'message'));
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048',
        ]);

        try {
            $file = $request->file('file');
            Excel::import(new DatasdImport, $file);

            return redirect()->route('data.datasd')->with('success', 'Data imported successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('data.datasd')->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new DatasdExport, 'datasd.xlsx');
    }
}
