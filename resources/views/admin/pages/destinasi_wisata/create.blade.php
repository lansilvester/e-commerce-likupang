@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3">Destinasi Wisata</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('dashboard_destinasi_wisata.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard_destinasi_wisata.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="nama_destinasi" class="card-title">Nama Destinasi</label>
                                <input type="text" class="form-control @error('nama_destinasi') is-invalid @enderror" id="nama_destinasi" placeholder="Ketikkan nama destinasi.." name="nama_destinasi" autofocus>
                                @error('nama_destinasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="alamat" class="card-title">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Ketikkan alamat.." name="alamat">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="map" class="card-title">Map</label><br>
                                <!-- Your Map Embed Code Here -->
                                <input type="text" class="form-control @error('map') is-invalid @enderror" id="map" placeholder="<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666059225827!2d106.82274531431713!3d-6.175392995526864!4m5!3m4!1s0x2e69f3e30de176b7:0x299c536b29f81720!8m2!3d-6.1751108!4d106.8270802' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'></iframe>" name="map">
                                @error('map')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="harga_masuk" class="card-title">Harga Masuk</label><br>
                            <div class="input-group mb-4">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" name="harga_masuk" class="form-control @error('harga_masuk') is-invalid @enderror" id="harga_masuk" placeholder="Masukkan Harga" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan deskripsi destinasi wisata" name="deskripsi"></textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="kontak" class="card-title">Kontak</label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" placeholder="Masukkan kontak destinasi wisata" name="kontak">
                                @error('kontak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="foto" class="card-title">Foto</label><br>
                                <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success text-white">
                                <i data-feather="save"></i> Simpan Data
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