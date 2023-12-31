@extends('admin.base')
@section('content')
<div class="container">
    <div class="blog-details">
        <div class="gallary-header py-3 fw-bolder">
            <h1>
                Destinasi Wisata
            </h1>
            <p>
                Mulai liburan anda dengan melihat objek wisata di likupang
            </p>
        </div><!--/.gallery-header-->
        <div class="blog-content">
            
                <a href="{{ route('dashboard_destinasi_wisata.index') }}" class="btn btn-info"><i data-feather="arrow-left"></i> Lihat Semua Destinasi</a>
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
                    <a class="btn btn-warning btn-lg w-100" href="{{ route('dashboard_destinasi_wisata.edit', $destinasi->id) }}"><i class="align-middle" data-feather="edit"></i> Edit</a>
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
                                    <td>
                                        <h5 class="fw-bold">Dibuat Oleh</h5>
                                        <span class="badge badge-success bg-success">{{ $destinasi->user->name }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="fw-bold">Tanggal</h5>{{ $destinasi->created_at->format('D, d-M-Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Deskripsi</h5>{{ $destinasi->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Alamat</h5>{{ $destinasi->alamat }}</td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Harga Masuk</h5>

                                        <p>
                                            Roda Dua : @currency($destinasi->harga_masuk_roda_dua)
                                        </p>
                                        <p>
                                            Roda Empat : @currency($destinasi->harga_masuk_roda_empat)
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h5 class="fw-bold">Map</h5>
                                        {!! $destinasi->map !!}<br>
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