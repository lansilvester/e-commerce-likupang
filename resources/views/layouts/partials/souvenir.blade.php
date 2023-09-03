<div class="blog-content">
    <div class="row">

        @forelse ($data_souvenir as $souvenir)
            
        <!-- Hoemstay items -->
        <div class="col-md-4 col-sm-6">
            <div class="single-package-item">
                <div class="thumbnail-img">
                    <img src="{{ asset('storage/souvenir/' . $souvenir->foto) }}" alt="Gambar Souvenir" width="100%">
                    <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->
                </div><!--/.thumbnail-img-->
                <div class="single-package-item-txt" style="margin-top:20px;">
                    <h1 style="font-size:21px; line-height:1.3em; font-weight:bold; color:#005353; ">{{ $souvenir->nama_souvenir }}</h1>
                    <div class="packages-para">
                        <h5>Deskripsi</h5>
                        <p>{{ $souvenir->deskripsi }}</p>
                    </div><!--/.packages-para-->
                    <div class="about-btn">
                        <a href="{{ route('souvenir.show', $souvenir->id) }}" class="about-view packages-btn">
                            Read More &nbsp;<i class="fa fa-arrow-right"></i> 
                        </a>
                    </div><!--/.about-btn-->
                </div><!--/.single-package-item-txt-->
            </div><!--/.single-package-item-->
        </div>
        <!--/.homestay items-->
        @empty
        <div class="alert alert-info">Data Tidak Ada</div>
        @endforelse
    </div><!--/.row-->
    <div class="about-btn">
        <a href="{{ route('souvenir.index') }}" target="__blank" class="about-view packages-btn" style="background:#00abab; border-color:#4c97ad; width:300px; margin:0 auto;">
            Lihat Semua &nbsp;<i class="fa fa-arrow-right"></i> 
        </a>
    </div><!--/.about-btn-->
</div>