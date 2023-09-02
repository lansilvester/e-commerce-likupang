@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3">Edit Souvenir</h1>
                <div class="card flex-fill">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('dashboard_souvenir.index') }}" class="btn btn-outline-info"><i data-feather="chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard_souvenir.update', $data_sovenir->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT') <!-- Method untuk update -->
                            <div class="form-group mb-4">
                                <label for="nama_souvenir" class="card-title">Nama Souvenir</label>
                                <input required type="text" class="form-control" id="nama_souvenir" placeholder="Ketik nama souvenir.." name="nama_souvenir" value="{{ $data_sovenir->nama_souvenir }}" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <label for="alamat" class="card-title">Alamat</label>
                                <input required type="text" class="form-control" id="alamat" placeholder="Ketik alamat.." name="alamat" value="{{ $data_sovenir->alamat }}">
                            </div>
                            <label for="harga" class="card-title">Harga</label><br>
                            <div class="input-group mb-4">
                                <span class="input-group-text">Rp.</span>
                                <input required type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga" aria-label="Amount (to the nearest dollar)" value="{{ $data_sovenir->harga }}">
                                <span class="input-group-text">.00</span>
                            </div>
                            <div class="form-group mb-4">
                                <label for="deskripsi" class="card-title">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" placeholder="Masukkan deskripsi souvenir" name="deskripsi">{{ $data_sovenir->deskripsi }}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="kontak" class="card-title">Kontak</label>
                                <input type="number" class="form-control" name="kontak" maxlength="15" id="kontak" placeholder="08xxxxxxxxx" name="kontak" value="{{ $data_sovenir->kontak }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="foto" class="card-title">Foto</label><br>
                                <img src="{{ asset('storage/souvenir/' . $data_sovenir->foto) }}" alt="" width="250px" class="img-fluid mb-1">
                                <input type="file" id="foto" name="foto" value="{{ $data_sovenir->foto }}" class="form-control">
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