@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3">Tambah Souvenir</h1>
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('dashboard_souvenir.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard_souvenir.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="nama_souvenir" class="card-title">Nama Souvenir</label>
                                <input type="text" class="form-control" id="nama_souvenir" placeholder="Ketik nama souvenir.." name="nama_souvenir" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <label for="alamat" class="card-title">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Ketik alamat.." name="alamat">
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
                                <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskripsi souvenir" name="deskripsi"></textarea>
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