@extends('admin.base')
@section('content')
<div class="container">
    <div class="blog-details">
        <div class="gallary-header py-3 fw-bolder">
            <h1>
                Kuliner
            </h1>
            <p>
                Lihat detail kuliner di Likupang
            </p>
        </div><!--/.gallery-header-->
        <div class="blog-content">
            <a href="{{ route('dashboard_kuliner.index') }}" class="btn btn-info"><i data-feather="arrow-left"></i> Lihat Semua Kuliner</a>
            <br><br>
            <style>
                .fw-bold {
                    font-weight: bold;
                    line-height: 1.5em;
                }
            </style>
            <div class="card">
                <div class="card-body">
                    
            <div class="row">
                <div class="col-md-4 col-xl-4">
                    <div class="thumbnail-img">
                        <img src="{{ asset('storage/' . $kuliner->foto) }}" alt="Gambar Kuliner" width="100%">
                        <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                    </div><!--/.thumbnail-img-->
                    <br>
                    @auth
                    @if (Auth::user()->role = 'SA' || Auth::user()->role = 'admin_kuliner')
                    <a class="btn btn-warning btn-lg w-100" href="{{ route('dashboard_kuliner.edit', $kuliner->id) }}"><i class="align-middle" data-feather="edit"></i> Edit</a>
                    @endif
                    @endauth
                </div>
                <div class="col-md-8 col-xl-8">
                    <table class="table table-border table-hover">
                        <tr>
                            <td>
                                <tr>
                                    <td>
                                        <h1 style="font-size:25px; line-height:1.3em; font-weight:bold; color:#005353; ">{{ $kuliner->NamaKuliner }}</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Alamat</h5>{{ $kuliner->Alamat }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Harga</h5>Rp. {{ $kuliner->Harga }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Dibuat Oleh</h5>{{ $kuliner->user->name }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Dibuat pada</h5>{{ $kuliner->created_at->format('D, d-M-Y') }}</td>
                                </tr>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            
                </div>
            </div>
            <br><br>
        </div><!--/.blog-content-->
    </div>
</div>
@endsection
