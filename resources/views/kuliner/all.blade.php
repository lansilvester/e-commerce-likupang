@extends('layouts.app')

@section('content')
<br><br>
<br><br>
<br><br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container">
    <div class="blog-details">
        <div class="gallary-header text-center">
            <h2>
                <i class="fa fa-gift" style="color:#007ca1;font-size: 2em; margin-bottom: .5em;"></i><br>
                Kuliner
            </h2>
            <p>
                Lihat berbagai Kuliner lokal yang menarik
            </p>
            <hr class="line-blue" />
        </div><!--/.gallery-header-->
        <div class="blog-content">
            <a href="{{ route('home') }}" class="btn btn-info" style="font-size:1.5em"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br><br>
            <div class="row">

                @forelse ($data_kuliner as $kuliner)
                <div class="col-md-3 col-xl-3 col-sm-6">
                    <div class="single-package-item">
                        <div class="thumbnail-img">
                            <img src="{{ asset('storage/' . $kuliner->foto) }}" alt="Gambar kuliner" width="100%">
                            <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                        </div><!--/.thumbnail-img-->
                        <div class="single-package-item-txt" style="margin-top:20px;">
                            <h1 style="font-size:21px; line-height:1.3em; font-weight:bold; color:#005353; ">{{ $kuliner->NamaKuliner }}</h1>
                            <h4 class="badge badge-success text-right" style="margin:1em 0; background:#008787">Rp.{{ $kuliner->Harga }}</h4>
                
                            <div class="mb-3">
                                @if ($kuliner->avg_rating())
                                    <div class="mb-3">
                                        @for ($i = 1; $i <= $kuliner->avg_rating(); $i++)
                                            <i class="bi bi-star-fill" style="color: #FFD700;"></i>
                                        @endfor
                                        @for ($i = $kuliner->avg_rating() + 1; $i <= 5; $i++)
                                            <i class="bi bi-star" style="color: #FFD700;"></i>
                                        @endfor
                                        <span>{{ number_format($kuliner->avg_rating(), 1) }}</span>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        <i class="bi bi-star" style="color: #FFD700;"></i>
                                        0
                                    </div>
                                @endif
                            </div>
                            <h5 class="fw-bold">Alamat</h5>
                            <p>{{ $kuliner->Alamat }}</p>
                
                            <div class="about-btn">
                                <a href="{{ route('kuliner.show', $kuliner->id) }}" class="about-view packages-btn">
                                    Read More &nbsp;<i class="fa fa-arrow-right"></i> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                

                @empty
                <div class="alert alert-info">Data Tidak Ada</div>
                @endforelse
            </div><!--/.row-->

        </div><!--/.blog-content-->
    </div>
</div>
@endsection