@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3">Tambah Homestay</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('dashboard_homestay.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard_homestay.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="nama_homestay" class="card-title">Nama Homestay</label>
                                <input type="text" class="form-control" id="nama_homestay" placeholder="Ketik nama homestay.." name="nama_homestay" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <label for="alamat" class="card-title">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Ketik alamat.." name="alamat">
                            </div>
                            <div class="form-group mb-4">
                                <label for="map" class="card-title">Map</label><br>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15952.477994116887!2d125.04499826414474!3d1.6720543716457308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287b096aa0e487d%3A0xccd43f4353226126!2sLikupang%2C%20Likupang%20II%2C%20Kec.%20Likupang%20Tim.%2C%20Kabupaten%20Minahasa%20Utara%2C%20Sulawesi%20Utara!5e0!3m2!1sid!2sid!4v1693578813996!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <br><small><b style="color:#007979"><a target="__blank" href="https://www.google.com/maps?ll=1.672033,125.055298&z=14&t=m&hl=id&gl=ID&mapclient=embed&q=Likupang+Likupang+II+Kec.+Likupang+Tim.+Kabupaten+Minahasa+Utara,+Sulawesi+Utara">Open Maps</a></b> > Bagikan > Sematkan Peta > Salin HTML > <b>Paste</b> pada kolom dibawah</small>
                                <input type="text" class="form-control" id="map" placeholder="<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666059225827!2d106.82274531431713!3d-6.175392995526864!4m5!3m4!1s0x2e69f3e30de176b7:0x299c536b29f81720!8m2!3d-6.1751108!4d106.8270802' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'></iframe>" name="map">
                            </div>
                            <label for="harga" class="card-title">Harga</label><br>
                            <div class="input-group mb-4">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukan Harga" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="kontak" class="card-title">Kontak</label>
                                <input type="text" class="form-control" id="kontak" placeholder="Ketik nomor kontak.." name="kontak">
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskripsi homestay" name="deskripsi"></textarea>
                            </div>
                            <div class="form-group mb-5">
                                <label for="foto" class="card-title">Foto</label><br>
                                <input type="file" id="foto" name="foto" class="form-control">
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
