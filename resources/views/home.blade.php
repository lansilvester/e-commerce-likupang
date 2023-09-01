@extends('layouts.app')

@section('content')
		<!-- 3 BOXES -->
        @include('layouts.partials.boxes')
		<!--3 BOXES end-->

        {{-- 3 Services --}}
        @include('layouts.partials.services')
        
		<!-- OBJEK WISATA start-->
		<section id="destination" class="gallery">
			<div class="container">
				<div class="gallery-details">
					<div class="gallary-header text-center">
						<h2>
							<i class="fa fa-plane" style="color: #007ca1; font-size: 3em; margin-bottom: .1em;"></i><br>
							Objek Wisata
						</h2>
						<p>
							Mulai liburan anda dengan melihat objek wisata di likupang
						</p>
						<hr class="line-blue" />
					</div>
@include('layouts.partials.destinasi_wisata')
					<div class="about-btn">
						<a href="{{ route('destinasi_wisata.index') }}" class="about-view packages-btn" style="background:#00abab; border-color:#4c97ad; width:300px; margin:0 auto;">
							Lihat Semua &nbsp;<i class="fa fa-arrow-right"></i> 
						</a>
					</div><!--/.about-btn-->

				</div><!--/.gallery-details-->
			</div><!--/.container-->

		</section>
		<!--OBJEK WISATA end-->

		<!--SOUVENIR start-->
		<section id="sovenir" class="packages" style="background-color: #f9fcff;">
			<div class="container">
				<div class="gallary-header text-center">
					<h2>
						<i class="fa fa-gift" style="color: #007ca1; font-size: 3em; margin-bottom: .1em;"></i><br>
						Sovenir
					</h2>
					<p>
						Lihat berbagai sovenir lokal yang menarik
					</p>
					<hr class="line-blue" />
				</div>		
				@include('layouts.partials.souvenir')
			</div><!--/.container-->
		</section>
		<!-- SOUVENIR END -->

		<!--hOMESTAY start-->
        <section id="homestay" class="blog">
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
					@include('layouts.partials.homestay')
                    <div class="about-btn">
                        <a href="{{ route('homestay.index') }}" class="about-view packages-btn" style="background:#00abab; border-color:#4c97ad; width:300px; margin:0 auto;">
                            Lihat Semua &nbsp;<i class="fa fa-arrow-right"></i> 
                        </a>
                    </div><!--/.about-btn-->
                
                </div><!--/.blog-details-->
            </div><!--/.container-->
        </section>
		<!--HOMESTAY end-->

		
		<!--subscribe start-->
		<section id="subs" class="subscribe">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2>
						Punya saran dan masukan? 
					</h2>
					<p> 
						Berikan saran dan masukan anda untuk pengalaman liburan yang lebih baik
					</p>
				</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
							<div class="custom-input-group">
								<form action="{{ route('feedback') }}" method="POST">
									@csrf
									<input type="text" name="pesan" class="form-control" placeholder="Saran dan masukan">
									<button class="appsLand-btn subscribe-btn" type="submit">Kirim</button>
									<div class="clearfix"></div>
									<i class="fa fa-envelope"></i>
								</form>
							</div>
							@if(Session::has('success'))
							<div class="alert alert-success" style="margin:2em 0em;">{{ Session::get('success') }}</div>
							@endif
						</div>
					</div>
			</div>

		</section>
		<!--subscribe end-->

@endsection
