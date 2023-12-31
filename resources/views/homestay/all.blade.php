@extends('layouts.app')

@section('content')
<br><br>
<br><br>
<br><br>
<div class="container">
    <div class="gallary-header text-center">
        <h2>
            <i class="fa fa-building" style="color:#007ca1;font-size: 2em; margin-bottom: .5em;"></i><br>
            Homestay
        </h2>
        <p>
            Temukan homestay favorit anda
        </p>
        <hr class="line-blue" />
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ url('/') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a>
        <a href="{{ url('') }}" class="btn btn-info"><i class="fa fa-home"></i> Home</a>
    </div>
    </div><!--/.gallery-header-->
    <div class="row text-center">
        <div class="col-md-4 col-sm-6">
            <div class="single-package-item">
                <div class="thumbnail-img">
                    <img src="https://i.pinimg.com/originals/17/a6/41/17a641a1ca292b904463bbeba9bbd519.jpg" alt="blog-img">
                    <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                </div><!--/.thumbnail-img-->
                <div class="single-package-item-txt" style="margin-top:20px;">
                    <h1 style="font-size:21px; line-height:1.3em; font-weight:bold; color:#005353; ">Desa Marinsow</h1>
                    <div class="about-btn">
                        <a href="{{ route('desa_marinsow') }}" class="about-view packages-btn">
                            Temukan Homestay &nbsp;<i class="fa fa-arrow-right"></i> 
                        </a>
                        <a target="_blank" href="https://mylikupang.id/desa%20marinsow/" class="btn btn-primary mt-4 w-100"><i class="fa fa-eye"></i> Virtual Tour</a>
                    </div><!--/.about-btn-->
                </div><!--/.single-package-item-txt-->
            </div><!--/.single-package-item-->
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="single-package-item">
                <div class="thumbnail-img">
                    <img src="https://akcdn.detik.net.id/community/media/visual/2020/09/03/pantai-likupang-1_169.jpeg?w=620" alt="blog-img">
                    <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                </div><!--/.thumbnail-img-->
                <div class="single-package-item-txt" style="margin-top:20px;">
                    <h1 style="font-size:21px; line-height:1.3em; font-weight:bold; color:#005353; ">Desa Pulisan</h1>
                    <div class="about-btn">
                        <a href="{{ route('desa_pulisan') }}" class="about-view packages-btn">
                            Temukan Homestay &nbsp;<i class="fa fa-arrow-right"></i> 
                        </a>
                        <a target="_blank" href="https://mylikupang.id/desa%20pulisan/" class="btn btn-primary mt-4 w-100"><i class="fa fa-eye"></i> Virtual Tour</a>
                    </div><!--/.about-btn-->
                </div><!--/.single-package-item-txt-->
            </div><!--/.single-package-item-->
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="single-package-item">
                <div class="thumbnail-img">
                    <img src="https://3.bp.blogspot.com/-korNlxtUg9U/WlY0zmFNcpI/AAAAAAAAA1w/Nlg13yqjS2c3GYpIOsphdneG36s5k-eSACLcBGAs/s1600/20180107_164515.jpg" alt="blog-img">
                    <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                </div><!--/.thumbnail-img-->
                <div class="single-package-item-txt" style="margin-top:20px;">
                    <h1 style="font-size:21px; line-height:1.3em; font-weight:bold; color:#005353; ">Desa Kinunang</h1>
                    <div class="about-btn">
                        <a href="{{ route('desa_kinunang') }}" class="about-view packages-btn">
                            Temukan Homestay &nbsp;<i class="fa fa-arrow-right"></i> 
                        </a>
                        <a target="_blank" href="https://mylikupang.id/desa%20kinunang/" class="btn btn-primary mt-4 w-100"><i class="fa fa-eye"></i> Virtual Tour</a>
                    </div><!--/.about-btn-->
                </div><!--/.single-package-item-txt-->
            </div><!--/.single-package-item-->
        </div>
    </div><!--/.row-->
</div>
@endsection