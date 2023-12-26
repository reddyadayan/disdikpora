<?php

namespace App\Http\Controllers;

use App\Models\Datasd;
use App\Models\DataUmum;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function show($id)
    {
        $dataUmum = DataUmum::find($id);
        $datasd = Datasd::find($id);

        return view('edit.show', compact('dataUmum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_satuan_pendidikan' => 'required',
            'npsn' => 'required',
            'bentuk_pendidikan' => 'required',
            'status_sekolah' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',


        ]);

        $dataUmum = DataUmum::find($id);
        $dataUmum->update($request->all());

        return redirect()->route('dashboard.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dataUmum = DataUmum::find($id);
        $dataUmum->delete();

        return redirect()->route('dashboard.index')->with('success', 'Data berhasil dihapus.');
    }
}
