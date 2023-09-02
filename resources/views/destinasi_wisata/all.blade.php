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
            <a href="{{ route('home') }}" class="btn btn-info" style="font-size:1.5em"><i class="fa fa-arrow-left"></i> Home</a>
            <br><br>
            <div class="row">

                @forelse ($data_destinasi as $destinasi)           
                <!-- Hoemstay items -->
                <div class="col-md-4 col-sm-6">
                    <div class="single-package-item">
                        <div class="thumbnail-img">
                            
                            <img src="{{ asset('storage/destinasi_wisata/'.$destinasi->foto) }}" alt="Gambar destinasi" style="width: 100%">
                            
                            <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                        </div><!--/.thumbnail-img-->
                        <div class="single-package-item-txt" style="margin-top:20px;">
                            <h1 style="font-size:21px; line-height:1.3em; font-weight:bold; color:#005353; ">{{ $destinasi->nama_destinasi }}</h1>
                            <div class="packages-para">
                                <p>{{ $destinasi->deskripsi }}</p>
                            </div>
                           
                            <div class="about-btn">
                                <a href="{{ route('destinasi_wisata.show', $destinasi->id) }}" class="about-view packages-btn">
                                    Read More &nbsp;<i class="fa fa-arrow-right"></i> 
                                </a>
                            </div><!--/.about-btn-->
                        </div><!--/.single-package-item-txt-->
                    </div><!--/.single-package-item-->
                </div>
                <!--/.homestay items-->
                @empty
                    <div class="alert alert-info">Tidak ada Data</div>
                @endforelse
            </div><!--/.row-->

        </div><!--/.blog-content-->
    </div>
</div>
@endsection