@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="blog-details">
        <div class="gallary-header text-center">
            <h2>
                <i class="fa fa-plane" style="color:#007ca1;font-size: 2em; margin-bottom: .5em;"></i><br>
                Destinasi Wisata
            </h2>
            <p>
                Mulai liburan anda dengan melihat objek wisata di likupang
            </p>
            <hr class="line-blue" />
        </div><!--/.gallery-header-->
        <div class="blog-content">
            
                <a href="{{ route('destinasi_wisata.index') }}" class="btn btn-info" style="font-size:1.3em"><i class="fa fa-arrow-left"></i> Lihat Semua Destinasi</a>
            <br><br>
            <style>
                .fw-bold{
                    font-weight: bold;
                    line-height: 1.5em;
                }
            </style>
            <div class="row">
                <div class="col-md-4 col-xl-4">
                    <div class="thumbnail-img">
                        
                        <img src="{{ asset('storage/destinasi_wisata/' . $destinasi->foto) }}" alt="Gambar Destinasi Wisata" width="100%">
                        <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                    </div><!--/.thumbnail-img-->
                    <br>
                @auth   
                    @if (Auth::user()->role = 'SA' || Auth::user()->role = 'admin_destinasi')
                    <a class="btn btn-warning" href="{{ route('dashboard_destinasi_wisata.edit', $destinasi->id) }}" target="__blank"><i class="fa fa-pencil"></i> Edit</a>
                    @endif
                @endauth

                </div>
                <div class="col-md-8 col-xl-8">
                    <table class="table table-border table-hover">
                        <tr>
                            <td>
                                <tr>
                                    <td>
                                        <h1 style="font-size:25px; line-height:1.3em; font-weight:bold; color:#005353; ">{{ $destinasi->nama_destinasi }}</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Deskripsi</h5>{{ $destinasi->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Alamat</h5>{{ $destinasi->alamat }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Harga Masuk</h5>@currency($destinasi->harga_masuk)</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Kontak</h5>{{ $destinasi->kontak }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Map</h5>{!! $destinasi->map !!}</td>
                                </tr>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <br><br>

        </div><!--/.blog-content-->
    </div>
</div>
@endsection