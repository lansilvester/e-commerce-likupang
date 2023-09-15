@extends('admin.base')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Data Kuliner & Souvenir</strong></h1>
        
        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    
                    @if (Session::has('success'))
                    <div class="p-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif

                    <div class="card-header">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-4">
                                <form action="{{ route('search_kuliner') }}" method="GET">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" style="margin-right:20px" class="form-control" placeholder="Cari Nama Kuliner" value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i data-feather="search"></i></button>
                                        </div>
                                        @if(request('search'))
                                        <div class="input-group-append" style="margin-left:10px">
                                            <a href="{{ route('dashboard_kuliner.index') }}" class="btn btn-danger"><i data-feather="x"></i></a>
                                            <small>Pencarian tentang <i>'{{ $searchTerm }}'</i></small>
                                        </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <a href="{{ route('dashboard_kuliner.create') }}" class="btn btn-success"><i data-feather="plus"></i> Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Alamat</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($results as $i => $data)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $data->foto) }}" alt="Gambar Kuliner" width="150px">
                                    </td>
                                    <td>{{ $data->NamaKuliner }}</td>
                                    <td>{{ $data->Harga }}</td>
                                    <td>{{ $data->Alamat }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>
                                        <a href="{{ route('dashboard_kuliner.show', $data->id) }}" class="btn btn-info"><i data-feather="eye"></i></a>
                                        <a href="{{ route('dashboard_kuliner.edit', $data->id) }}" class="btn btn-warning"><i data-feather="edit"></i></a>
                                        <form action="{{ route('dashboard_kuliner.destroy', $data->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i data-feather="trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center"><div class="alert alert-warning">Belum ada data</div></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>       
                        <style>
                            svg{
                                width:20px;
                            }
                            .text-sm{
                                margin-top:25px;
                            }
                        </style>
                        {{ $results->links() }}                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection