@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="blog-details">
        <div class="gallary-header text-center">
            <h2>
                <i class="fa fa-gift" style="color:#007ca1;font-size: 2em; margin-bottom: .5em;"></i><br>
                Homestay
            </h2>
            <p>Lihat berbagai sovenir lokal yang menarik
            </p>
            <hr class="line-blue" />
        </div><!--/.gallery-header-->
        <div class="blog-content">
            
                <a href="{{ route('souvenir.index') }}" class="btn btn-info" style="font-size:1.3em"><i class="fa fa-arrow-left"></i> Lihat Semua Souvenir</a>
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
                        <img src="{{ asset('storage/souvenir/'.$souvenir->foto) }}" alt="blog-img">
                        <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                    </div><!--/.thumbnail-img-->
                    <br>
                @auth
                    @if (Auth::user()->role = 'SA' || Auth::user()->role = 'admin_homestay')
                    <a class="btn btn-warning" href="{{ route('dashboard_souvenir.edit', $souvenir->id) }}" target="__blank"><i class="fa fa-pencil"></i> Edit</a>
                    @endif
                @endauth

                </div>
                <div class="col-md-8 col-xl-8">
                    <table class="table table-border table-hover">
                        <tr>
                            <td>
                                <h1 style="font-size:25px; line-height:1.3em; font-weight:bold; color:#005353; ">{{ $souvenir->nama_souvenir }}</h1>
                            </td>
                        </tr>
                        <tr>
                            <td><h5 class="fw-bold">Deskripsi</h5>{{ $souvenir->deskripsi }}</td>
                        </tr>
                        <tr>
                            <td><h5 class="fw-bold">Alamat</h5>{{ $souvenir->alamat }}</td>
                        </tr>
                        <tr>
                            <td><h5 class="fw-bold">Harga</h5>{{ $souvenir->harga }}</td>
                        </tr>
                        <tr>
                            <td><h5 class="fw-bold">Kontak</h5>{{ $souvenir->kontak }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <br><br>

        </div><!--/.blog-content-->
    </div>
</div>
@endsection