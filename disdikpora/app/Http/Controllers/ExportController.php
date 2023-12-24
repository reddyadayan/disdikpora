<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DataUmumExport;
use App\Models\DataUmum;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataUmumImport;

class ExportController extends Controller
{
    public function export()
    {
        $dataUmum = DataUmum::all();

        return Excel::download(new DataUmumExport($dataUmum), 'data_umum.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048',
        ]);

        try {
            $file = $request->file('file');
            Excel::import(new DataUmumImport, $file);

            return redirect()->route('dashboard.index')->with('success', 'Data imported successfully!');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.index')->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }
}
