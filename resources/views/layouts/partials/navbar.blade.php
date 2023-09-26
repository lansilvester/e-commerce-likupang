<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="top">
    <style>
    </style>
    <div class="container py-2">
      <a class="navbar-brand" href="/">Liku<span style="color:#2fa8ff;font-weight:bold">pang</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-1">
            <a class="nav-link  {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"><i class="bi bi-house"></i> Home</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link  {{ request()->routeIs('destinasi_wisata*') ? 'active' : '' }}" href="{{ route('destinasi_wisata.index') }}">Destinasi  Wisata</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link  {{ request()->routeIs('souvenir*') ? 'active' : '' }}" href="{{ route('souvenir.index') }}">Souvenir</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link  {{ request()->routeIs('homestay*') ? 'active' : '' }}" href="{{ route('homestay.index') }}">Homestay</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link  {{ request()->routeIs('kuliner*') ? 'active' : '' }}" href="{{ route('kuliner.index') }}">Kuliner</a>
          </li>
          @auth
          <li class="nav-item mx-1">
            <a href="{{ route('dashboard') }}" target="__blank" class="btn btn-primary"><i class="fa fa-user-circle"></i> {{ Auth::user()->name }}</a>
          </li>
          @endauth
          @guest
          <li class="nav-item">
            <a href="{{ route('login') }}" target="__blank" class="btn btn-primary">Sign In</a>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  