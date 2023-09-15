@extends('admin.base')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Selamat </strong> Datang</h1>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-md-3 col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Users</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $data_users->count() }}</h1>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Destinasi Wisata</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="map"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $data_destinasi_wisata->count() }}</h1>
                                    
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-3 col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Sovenir</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="gift"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $data_souvenir->count() }}</h1>
                                    
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-3 col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Homestay</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="home"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $data_homestay->count() }}</h1>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">kuliner</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="shopping-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{ $data_kuliner->count() }}</h1>
                                    
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Users --}}
        @if(Auth::user()->role == 'SA')
        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">

                            <h5 class="card-title mb-0"><i data-feather="users"></i> Daftar Users</h5>
                            <a href="{{ route('users.create') }}" class="btn btn-success"><i data-feather="plus"></i> Tambah User</a>
                        </div>
                        @if (Session::has('success_delete_user'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong style="color:#01aa72">User telah dihapus!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        @if (Session::has('success_create_user'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong style="color:#01aa72">Berhasil create user</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Bergabung pada</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_users as $i => $user)
                            <tr>
                                <td>{{ $i+1; }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->created_at)
                                    {{ $user->created_at }}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if ($user->role == 'SA')
                                    <span class="badge badge-success bg-success">Super Admin</span>
                                    @else
                                    <span class="badge badge-info bg-info">{{ $user->role }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::user()->id !== $user->id)
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i data-feather="edit"></i></a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i data-feather="trash"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-warning">User kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        @endif
        
        @if(Auth::user()->role== 'ss')
        <div class="row">
            <div class="col-6 col-lg-6 col-xxl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        @if (Session::has('success_delete_feedback'))
                            <div class="alert alert-success">Berhasil Dihapus</div>
                        @endif
                        <h5 class="card-title mb-0"><i data-feather="message-square"></i> Feedback</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_feedback as $i => $data)
                            <tr>
                                <td>{{ $i+1; }}</td>
                                <td>{{ $data->pesan }}</td>
                                <td>
                                    <form action="{{ route('feedback.destroy', $data->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i data-feather="trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-warning">Feedback kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        @endif
        
    </div>
</main>
@endsection