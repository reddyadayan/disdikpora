@extends('layouts.app')

@section('content')

    <style>
        .table {
            background-color: rgba(255, 255, 255, 0.8);
            /* Transparan */

            /* Agar pinggiran tidak lancip, bisa disesuaikan */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            /* Efek bayangan */
        }

        h2 {
            color: #333;
            /* Warna judul */
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
                <form action="{{ route('dashboard.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mb-3">
                <form action="{{ route('dashboard.index') }}" method="GET">
                    <div class="d-flex justify-content-end">
                        <label for="show" class="me-2">Tampilkan:</label>
                        <select id="show" name="show" class="form-select" onchange="this.form.submit()">
                            <option value="10" {{ request('show') == 10 ? 'selected' : '' }}>10</option>
                            <option value="50" {{ request('show') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('show') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="container">
                <div class="row">
                    @if (auth()->user()->role == 'admin')
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Import Data</h5>
                                    <form action="{{ route('dashboard.import') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="file">Choose file:</label>
                                            <input type="file" name="file" class="form-control-file mb-3"
                                                accept=".xlsx, .csv" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Export Data</h5>
                                    <a href="{{ route('dashboard.export') }}" class="btn btn-success">Export Data</a>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
        @if ($message)
            <div class="alert alert-info mt-2">
                {{ $message }}
            </div>
        @else
            <div class="table-responsive">
                <table class="table costum-table table-bordered">
                    <br>
                    <br>
                    <h2 class="mt-3 mb-3">Tabel Data Satuan </h2>
                    <thead class="thead-dark">
                        <tr>
                            <th id="th-no">No</th>
                            <th id="th-nama">Nama Satuan Pendidikan</th>
                            <th id="th-npsn">NPSN</th>
                            <!-- Tambahkan ID untuk setiap kolom yang ingin di-sort -->
                            <th id="th-bentuk">Bentuk Pendidikan</th>
                            <th id="th-status">Status Sekolah</th>
                            <th id="th-alamat">Alamat</th>
                            <th id="th-desa">Desa</th>
                            <th id="th-kecamatan">Kecamatan</th>
                            <th id="th-kabupaten">Kabupaten/Kota</th>
                            {{-- <th>Nama Kepala Sekolah</th> --}}
                            @if (auth()->user()->role == 'admin')
                                <th id="th-aksi">
                                    Aksi
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataUmum as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_satuan_pendidikan }}</td>
                                <td>{{ $item->npsn }}</td>
                                <td>{{ $item->bentuk_pendidikan }}</td>
                                <td>{{ $item->status_sekolah }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->desa }}</td>
                                <td>{{ $item->kecamatan }}</td>
                                <td>{{ $item->kabupaten_kota }}</td>
                                {{-- <td>{{ $item->nama_kepala_sekolah }}</td> --}}
                                @if (auth()->user()->role == 'admin')
                                    <td>

                                        <a href="{{ route('edit.show', $item->id) }}" class="btn btn-primary mb-3">Edit</a>
                                        <form action="{{ route('edit.destroy', $item->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</button>
                                        </form>

                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $dataUmum->links('vendor.pagination.bootstrap') }}
            </div>
        @endif
    </div>
@endsection
