@extends('admin.base')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<main class="content">
    <div class="container-fluid p-0">
        
        
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('dashboard_kuliner.index') }}" class="btn btn-outline-info my-2"><i data-feather="chevron-left"></i></a>
                
                <div class="card">
                    <div class="card-body">
                        <h1 class="h3 mb-3"><strong>Tambah Kuliner</strong></h1>
                        <form action="{{ route('dashboard_kuliner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="NamaKuliner" class="form-label">Nama Kuliner</label>
                                <input type="text" class="form-control @error('NamaKuliner') is-invalid @enderror" id="NamaKuliner" name="NamaKuliner" value="{{ old('NamaKuliner') }}" placeholder="Masukkan Nama Kuliner" required>
                                @error('NamaKuliner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="Harga" class="form-label">Harga</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control @error('Harga') is-invalid @enderror" id="Harga" name="Harga" value="{{ old('Harga') }}" placeholder="" required>
                                <span class="input-group-text">.00</span>
                                
                                @error('Harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control @error('Alamat') is-invalid @enderror" id="Alamat" name="Alamat" value="{{ old('Alamat') }}" placeholder="Masukkan Alamat" required>
                                @error('Alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*" placeholder="Upload Foto" required>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <img id="preview" src="#" alt="Preview Gambar" style="max-width: 100%; display: none;">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('dashboard_kuliner.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    // Ambil elemen input gambar
    var inputFoto = document.getElementById('foto');
    // Ambil elemen img untuk preview
    var imgPreview = document.getElementById('preview');

    // Tambahkan event listener untuk perubahan pada input gambar
    inputFoto.addEventListener('change', function() {
        // Pastikan ada file yang dipilih
        if (inputFoto.files && inputFoto.files[0]) {
            var reader = new FileReader();

            // Saat file selesai diunggah, atur src gambar preview
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block'; // Tampilkan gambar
            }

            // Baca file gambar sebagai URL data
            reader.readAsDataURL(inputFoto.files[0]);
        }
    });
</script>

@endsection