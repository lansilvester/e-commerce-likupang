<!--/.gallery-header-->
<div class="gallery-box">
    <div class="gallery-content">
        <div class="filtr-container">
            <div class="row">
                @forelse ($data_destinasi_wisata as $destinasi)
                <div class="col-xs-12 col-sm-12 col-xl-6 col-md-6">
                    <div class="filtr-item">
                        <img src="{{ asset('storage/destinasi_wisata/' . $destinasi->foto) }}" alt="Gambar Destinasi Wisata">
                        <div class="item-title">
                            <a href="{{ route('destinasi_wisata.show', $destinasi->id) }}">
                            {{ $destinasi->nama_destinasi }}
                                <p>{{ $destinasi->deskripsi }}</p>
                            </a>

                        </div><!-- /.item-title -->
                    </div><!-- /.filtr-item -->
                </div><!-- /.col -->
                @empty
                    <div class="alert alert-info">Data Tidak Ada</div>
                @endforelse
            </div><!-- /.row -->
        </div><!-- /.filtr-container-->
    </div><!-- /.gallery-content -->
</div><!--/.galley-box-->
