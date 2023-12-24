@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Edit Data</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('edit.update', $dataUmum->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="nama_satuan_pendidikan" class="form-label">Nama Satuan Pendidikan</label>
                        <input type="text" class="form-control" id="nama_satuan_pendidikan" name="nama_satuan_pendidikan"
                            value="{{ $dataUmum->nama_satuan_pendidikan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="npsn" class="form-label">NPSN</label>
                        <input type="text" class="form-control" id="npsn" name="npsn"
                            value="{{ $dataUmum->npsn }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="bentuk_pendidikan" class="form-label">Bentuk Pendidikan</label>
                        <input type="text" class="form-control" id="bentuk_pendidikan" name="bentuk_pendidikan"
                            value="{{ $dataUmum->bentuk_pendidikan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status_sekolah" class="form-label">Status Sekolah</label>
                        <input type="text" class="form-control" id="status_sekolah" name="status_sekolah"
                            value="{{ $dataUmum->status_sekolah }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ $dataUmum->alamat }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="desa" class="form-label">Desa</label>
                        <input type="text" class="form-control" id="desa" name="desa"
                            value="{{ $dataUmum->desa }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                            value="{{ $dataUmum->kecamatan }}" required>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="kabupaten_kota" class="form-label">Kabupaten/Kota</label>
                        <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota"
                            value="{{ $dataUmum->kabupaten_kota }}" required>
                    </div> --}}

                    

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
