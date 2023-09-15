@extends('admin.base')
@section('content')
<div class="container">
    <div class="blog-details">
        <div class="gallary-header py-3 fw-bolder">
            <h1>
                Homestay
            </h1>
            <p>
                Temukan tempat menginap yang nyaman di Likupang
            </p>
        </div>
        <div class="blog-content">
            
                <a href="{{ route('dashboard_homestay.index') }}" class="btn btn-info"><i data-feather="arrow-left"></i> Lihat Semua Homestay</a>
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
                        <img src="{{ asset('storage/homestay/' . $homestay->foto) }}" alt="Gambar Homestay" width="100%">
                        <div class="thumbnail-img-overlay"></div>
                    </div>
                    <br>
                @auth
                    @if (Auth::user()->role = 'SA' || Auth::user()->role = 'admin_homestay')
                    <a class="btn btn-warning btn-lg w-100" href="{{ route('dashboard_homestay.edit', $homestay->id) }}"><i class="align-middle" data-feather="edit"></i> Edit</a>
                    @endif
                @endauth

                </div>
                <div class="col-md-8 col-xl-8">
                    <table class="table table-border table-hover">
                        <tr>
                            <td>
                                <tr>
                                    <td>
                                        <h1 style="font-size:25px; line-height:1.3em; font-weight:bold; color:#005353; ">{{ $homestay->nama_homestay }}</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Deskripsi</h5>{{ $homestay->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Alamat</h5>{{ $homestay->alamat }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Harga</h5>@currency($homestay->harga)</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Kontak</h5>{{ $homestay->kontak }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Desa</h5>{{ $homestay->desa }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Map</h5>
                                        <a href="{{ $homestay->map }}" target="_blank">
                                        
                                        {!! $homestay->map !!}
                                        </a>
                                    </td>
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