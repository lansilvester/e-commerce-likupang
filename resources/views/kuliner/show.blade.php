@extends('layouts.app')

@section('content')
<br><br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .star {
        cursor: pointer;
        font-size: 24px;
        margin-right: 5px;
    }

    .selected {
        color: gold;
    }
    .mb-3{
        margin-bottom:30px;
    }
    .mt-3{
        margin-top:30px;
    }
    h3{
        color:#007ca1;
    }
</style>

<div class="container">
    <div class="blog-details">
        <div class="gallary-header text-center">
            <h2>
                <i class="fa fa-shopping-bag" style="color:#007ca1;font-size: 2em; margin-bottom: .5em;"></i><br>
                Kuliner
            </h2>
            <p>Lihat berbagai sovenir lokal yang menarik
            </p>
            <hr class="line-blue" />
        </div><!--/.gallery-header-->
        <div class="blog-content">
            
                <a href="{{ route('kuliner.index') }}" class="btn btn-info" style="font-size:1.3em"><i class="fa fa-arrow-left"></i> Lihat Semua kuliner</a>
            <br><br>
            <style>
                .fw-bold{
                    font-weight: bold;
                    line-height: 1.5em;
                }
            </style>
            <div class="row mb-3">
                <div class="col-md-4 col-xl-4">
                    <div class="thumbnail-img">
                        <img src="{{ asset('storage/'.$kuliner->foto) }}" alt="blog-img">
                        <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                    </div><!--/.thumbnail-img-->
                    <br>
                @auth
                    @if (Auth::user()->role = 'SA' || Auth::user()->role = 'admin_homestay')
                    <a class="btn btn-warning" href="{{ route('dashboard_kuliner.edit', $kuliner->id) }}" target="__blank"><i class="fa fa-pencil"></i> Edit</a>
                    @endif
                @endauth

                </div>
                <div class="col-md-8 col-xl-8">
                    <h1 style="font-size:25px; line-height:1.3em; font-weight:bold; color:#005353; ">{{ $kuliner->NamaKuliner }}</h1>
                    <table class="table table-border table-hover">
                        <tr>
                            <td><h5 class="fw-bold">Alamat</h5>{{ $kuliner->Alamat }}</td>
                        </tr>
                        <tr>
                            <td><h5 class="fw-bold">Harga</h5>{{ $kuliner->Harga }}</td>
                        </tr>
                        <tr>
                            <td><h5 class="fw-bold">Diposting oleh</h5>{{ $kuliner->user->name }}</td>
                        </tr>
                        <tr>
                            <td><h5 class="fw-bold">Diposting pada</h5>{{ $kuliner->created_at->format('D, d-M-Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row" style="margin:3em 0">
            @if (Auth::check())
                <div class="col-12">
                    <h3 class="">Berikan Ulasan Anda</h3>
                    <br>
                    <form method="POST" action="{{ route('ulasan.store') }}">
                        @csrf
                        <input type="hidden" name="kuliner_id" value="{{ $kuliner->id }}">
                        <div class="rating">
                            <span class="star" data-rating="1"><i class="bi bi-star"></i></span>
                            <span class="star" data-rating="2"><i class="bi bi-star"></i></span>
                            <span class="star" data-rating="3"><i class="bi bi-star"></i></span>
                            <span class="star" data-rating="4"><i class="bi bi-star"></i></span>
                            <span class="star" data-rating="5"><i class="bi bi-star"></i></span>
                            <input type="hidden" name="rating" id="rating" value="0">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="ulasan" name="ulasan" rows="3" placeholder="Tambahkan komentar"></textarea>
                        </div>
                        
                        <div class="mb-3">

                            <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-send"></i> Kirim Ulasan</button>
                        </div>
                    </form>
                </div>
            @endif
            <div class="col-12">
                @if(!Auth::check())
                <p style="padding:1em; border-radius:1em; background:#b4c2c2;color:white"><a href="{{ route('login') }}"><b>Login</b></a> sekarang untuk dapat memberikan ulasan anda</p>
                <br>
                @endif
                <h3 class="mb-3">Ulasan Pengguna</h3>
                <ul id="userReviews" class="list-unstyled">
                    @if ($ulasan->isEmpty())
                        <div class="alert alert-info" style="margin: 15px 0;">Belum ada ulasan</div>
                    @else
                        @foreach ($ulasan as $review)
                            <li class="mb-3" style="background:rgba(234, 234, 234, 0.473); padding:1em 2em; border-radius:1em">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Rating:</strong>
                                        @for ($i = 1; $i <= $review->rating; $i++)
                                            <i class="bi bi-star-fill" style="color: #FFD700;"></i>
                                        @endfor
                                        @for ($i = $review->rating + 1; $i <= 5; $i++)
                                            <i class="bi bi-star" style="color: #FFD700;"></i>
                                        @endfor
                                        <p>{{ $review->ulasan }}</p>
                                    </div>
                                    <div>
                                        <small>Oleh: {{ $review->user->name }}</small><br>
                                        <small>{{ $review->created_at->format('d M Y, H:i') }}</small>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            
            </div>


        </div><!--/.blog-content-->
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');
    const ulasanInput = document.getElementById('ulasan'); // Ubah ini

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = parseInt(star.getAttribute('data-rating'));
            ratingInput.value = rating;

            // Untuk memberi efek visual pada bintang yang dipilih.
            stars.forEach(s => {
                const sRating = parseInt(s.getAttribute('data-rating'));
                if (sRating <= rating) {
                    s.classList.add('selected');
                } else {
                    s.classList.remove('selected');
                }
            });
        });
    });

    // Tambahkan event listener untuk mengambil nilai textarea
    ulasanInput.addEventListener('input', function () {
        // Misalnya, Anda dapat menyimpan nilai dalam variabel
        const ulasanValue = this.value;
        // Kemudian, lakukan apa yang Anda inginkan dengan nilai ini
    });
});

</script>

@endsection