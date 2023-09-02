@extends('admin.base')

@section('content')
<div class="container" style="min-height:90vh">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-info mb-4">
                        <i data-feather="arrow-left"></i>
                    </a>
                    <h3>Tambah User</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="role">{{ __('Role') }}</label>
                            <select id="role" class="form-control" name="role" required>
                                <option value="SA">SA</option>
                                <option value="admin_homestay">Admin Homestay</option>
                                <option value="admin_souvenir">Admin Souvenir</option>
                                <option value="admin_objek_wisata">Admin Objek Wisata</option>
                            </select>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success">
                                <i data-feather="save"></i> Tambah User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
