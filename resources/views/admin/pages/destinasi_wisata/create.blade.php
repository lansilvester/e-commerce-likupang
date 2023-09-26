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
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19108.295215177866!2d125.04425246420476!3d1.6695075932593564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287b096aa0e487d%3A0xccd43f4353226126!2sLikupang%2C%20Likupang%20II%2C%20Kec.%20Likupang%20Tim.%2C%20Kabupaten%20Minahasa%20Utara%2C%20Sulawesi%20Utara!5e0!3m2!1sid!2sid!4v1694784126628!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                               
                               <small class="mb-3"><a href="https://www.google.com/maps/@1.6712179,125.0605337,15z?hl=id&entry=ttu" target="_blank"><b>Open map</b></a>>Bagikan>Sematkan Peta>Salin HTML>Paste dibawah</small> 

                                <input type="text" class="form-control @error('map') is-invalid @enderror" id="map" placeholder="<iframe src='https://www.google.com/maps/embed....." name="map">
                                @error('map')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="harga_masuk_roda_dua" class="card-title">Harga Masuk Roda Dua</label><br>
                            <div class="input-group mb-4">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" name="harga_masuk_roda_dua" class="form-control @error('harga_masuk_roda_dua') is-invalid @enderror" id="harga_masuk_roda_dua" placeholder="Masukkan Harga" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>
                            <label for="harga_masuk_roda_empat" class="card-title">Harga Masuk Roda Empat</label><br>
                            <div class="input-group mb-4">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" name="harga_masuk_roda_empat" class="form-control @error('harga_masuk_roda_empat') is-invalid @enderror" id="harga_masuk_roda_empat" placeholder="Masukkan Harga" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan deskripsi destinasi wisata" name="deskripsi"></textarea>
                                @error('deskripsi')
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