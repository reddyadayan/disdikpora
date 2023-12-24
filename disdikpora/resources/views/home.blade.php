@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="{{ asset('img/logo.png') }}" class="card-img-top" alt="Card Image 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Data Umum</h5>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary"> Pergi Ke Data Umum</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="{{ asset('img/logo.png') }}" class="card-img-top" alt="Card Image 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Data SD</h5>
                        <a href="{{ route('data.datasd') }}" class="btn btn-primary">Pergi Ke Data SD</a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="{{ asset('img/logo.png') }}" class="card-img-top" alt="Card Image 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Card 3</h5>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Go to Page 3</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow">
                    <img src="{{ asset('img/logo.png') }}" class="card-img-top" alt="Card Image 4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Card 4</h5>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Go to Page 4</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
