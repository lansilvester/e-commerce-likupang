@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3">Edit Destinasi Wisata</h1>
                <div class="card flex-fill">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('dashboard_destinasi_wisata.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard_destinasi_wisata.update', $data_destinasi_wisata->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT') <!-- Method untuk update -->
                            <div class="form-group mb-4">
                                <label for="nama_destinasi" class="card-title">Nama Destinasi</label>
                                <input required type="text" class="form-control" id="nama_destinasi" placeholder="Ketikan nama destinasi.." name="nama_destinasi" value="{{ $data_destinasi_wisata->nama_destinasi }}" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <label for="alamat" class="card-title">Alamat</label>
                                <input required type="text" class="form-control" id="alamat" placeholder="Ketikan alamat.." name="alamat" value="{{ $data_destinasi_wisata->alamat }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="map" class="card-title">Map</label><br>
                                @if ($data_destinasi_wisata->map)
                                    {!! $data_destinasi_wisata->map !!}
                                @else
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15952.477994116887!2d125.04499826414474!3d1.6720543716457308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287b096aa0e487d%3A0xccd43f4353226126!2sLikupang%2C%20Likupang%20II%2C%20Kec.%20Likupang%20Tim.%2C%20Kabupaten%20Minahasa%20Utara%2C%20Sulawesi%20Utara!5e0!3m2!1sid!2sid!4v1693578813996!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                @endif
                                <br><small><b style="color:#007979"><a href="https://www.google.com/maps/place/Likupang,+Likupang+II,+Kec.+Likupang+Tim.,+Kabupaten+Minahasa+Utara,+Sulawesi+Utara/@1.6584552,125.030399,12.25z/data=!4m6!3m5!1s0x3287b096aa0e487d:0xccd43f4353226126!8m2!3d1.672033!4d125.055298!16s%2Fg%2F1hc0hffrf?hl=id&entry=ttu" target="__blank">Open Maps</a></b> > Bagikan > Sematkan Peta > Salin HTML > <b>Paste</b> pada kolom dibawah</small>

                                <input class="form-control" id="map" placeholder="Masukkan kode iframe Google Maps" name="map" value="{{ $data_destinasi_wisata->map }}">
                            </div>
                            <label for="harga_masuk" class="card-title">Harga Masuk</label><br>
                            <div class="input-group mb-4">
                                <span class="input-group-text">Rp.</span>
                                <input required type="number" name="harga_masuk" class="form-control" id="harga_masuk" placeholder="Masukan Harga" aria-label="Amount (to the nearest dollar)" value="{{ $data_destinasi_wisata->harga_masuk }}">
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" placeholder="Masukan deskripsi destinasi wisata" name="deskripsi">{{ $data_destinasi_wisata->deskripsi }}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="kontak" class="card-title">Kontak</label>
                                <input type="text" class="form-control" name="kontak" maxlength="15" id="kontak" placeholder="08xxxxxxxxx" name="kontak" value="{{ $data_destinasi_wisata->kontak }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="foto" class="card-title">Foto</label><br>
                                <img src="{{ asset('storage/destinasi_wisata/' . $data_destinasi_wisata->foto) }}" alt="" width="250px" class="img-fluid mb-1">
                                <input type="file" id="foto" name="foto" value="{{ $data_destinasi_wisata->foto }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success text-white">
                                    <i data-feather="save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection