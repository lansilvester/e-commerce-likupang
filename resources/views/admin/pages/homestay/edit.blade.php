@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3">Edit Homestay</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('dashboard_homestay.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard_homestay.update', $homestay->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="nama_homestay" class="card-title">Nama Homestay</label>
                                <input type="text" class="form-control @error('nama_homestay') is-invalid @enderror" id="nama_homestay" placeholder="Ketik nama homestay.." name="nama_homestay" value="{{ $homestay->nama_homestay }}" autofocus>
                                @error('nama_homestay')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="alamat" class="card-title">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Ketik alamat.." name="alamat" value="{{ $homestay->alamat }}">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="map" class="card-title">Map</label><br>
                                {!! $homestay->map !!}
                                <br><small><b style="color:#007979"><a target="__blank" href="https://www.google.com/maps?ll=1.672033,125.055298&z=14&t=m&hl=id&gl=ID&mapclient=embed&q=Likupang+Likupang+II+Kec.+Likupang+Tim.+Kabupaten+Minahasa+Utara,+Sulawesi+Utara">Open Maps</a></b> > Bagikan > Sematkan Peta > Salin HTML > <b>Paste</b> pada kolom dibawah</small>
                                <input type="text" class="form-control @error('map') is-invalid @enderror" id="map" placeholder="Masukkan kode iframe Google Maps" name="map" value="{{ $homestay->map }}">
                                @error('map')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="harga" class="card-title">Harga</label><br>
                            <div class="input-group mb-4">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukan Harga" aria-label="Amount (to the nearest dollar)" value="{{ $homestay->harga }}">
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="kontak" class="card-title">Kontak</label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" placeholder="Ketik nomor kontak.." name="kontak" value="{{ $homestay->kontak }}">
                                @error('kontak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan deskripsi homestay" name="deskripsi">{{ $homestay->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="foto" class="card-title">Foto</label><br>
                                <small>Preview</small><br>
                                <img src="{{ asset('storage/homestay/'. $homestay->foto) }}" alt="" class="mb-2" width="500px">
                                <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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