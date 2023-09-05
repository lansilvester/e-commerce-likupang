@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <div class="blog-details">
        <div class="gallary-header text-center">
            <h2>
                <i class="fa fa-building" style="color:#007ca1;font-size: 2em; margin-bottom: .5em;"></i><br>
                Homestay
            </h2>
            <p>
                Temukan homestay favorit anda
            </p>
            <hr class="line-blue" />
        </div><!--/.gallery-header-->
        <div class="blog-content">
            <a href="{{ route('home') }}" class="btn btn-info" style="font-size:1.5em"><i class="fa fa-arrow-left"></i> Home</a>
            <br><br>
            <div class="row">

                @forelse ($desa_marinsow as $homestay)           
                <!-- Hoemstay items -->
                <div class="col-md-4 col-sm-6">
                    <div class="single-package-item">
                        <div class="thumbnail-img">
                        <img src="{{ asset('storage/homestay/'.$homestay->foto) }}" alt="blog-img">
                            <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                        </div><!--/.thumbnail-img-->
                        <div class="single-package-item-txt" style="margin-top:20px;">
                            <h1 style="font-size:21px; line-height:1.3em; font-weight:bold; color:#005353; ">{{ $homestay->nama_homestay }}</h1>
                            <div class="packages-para">
                                <p>{{ $homestay->deskripsi }}</p>
                            </div><!--/.packages-para-->
                            <div class="about-btn">
                                <a href="{{ route('homestay.show', $homestay->id) }}" class="about-view packages-btn">
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