<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- Icon From Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
        @yield('css')
        <style>
        .footer {
          min-height: 60vh;
          background-color: #15181f;
        }

        .footer i {
          color: white;
        }
        </style>

    <link rel="shortcut icon" href="{{ asset('icon/pupr.jpg') }}" type="image/x-icon" />
</head>

<style>
    
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <div class="container">
        <span class="navbar-brand fw-bold">
            <img src="{{ asset('icon/pupr.jpg') }}" alt="" height="40px" class="d-inline-block align-text-center rounded">
            PUPR GIS Aceh Tamiang
        </span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('page') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Home
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('page') }}">Home</a></li>
                      <li><a class="dropdown-item" href="#about">About</a></li>
                      <li><a class="dropdown-item" href="#latar">Latar Belakang</a></li>
                      <li><a class="dropdown-item" href="#gis">Apa Itu GIS</a></li>
                      <li><a class="dropdown-item" href="#webgis">WebGIS Aceh Tamiang</a></li>
                      <li><a class="dropdown-item" href="#faq">FAQ</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('webgis') }}" target="_blank">WebGIS</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                  </li> --}}
                  @auth
                  <li class="nav-item dropdown">
                    <p class="text-white mt-2 ms-3" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user me-2" style="color: white"></i>{{ auth()->user()->name }}</p>
                  <ul class="dropdown-menu">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket me-3" style="color: red"></i>Logout</a></li>
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <a class="dropdown-item" href="{{ route('home') }}"><i class="fa-solid fa-user-tie me-3"></i>Admin Panel</a>
                    @endif
                  </ul>
                  </li>
                  @else
                  <a href="{{ route('login')}}" class="btn btn-dark rounded-0 fw-semibold text-uppercase">Login</a>
                  @endauth
                </ul>
              </div>
        </div>
    </nav>
    @yield('content')

    <!-- Footer -->
    <div class="footer">
      <div class="container">
        <div class="row pt-5 justify-content-between row-cols-lg-3 row-cols-1">
          <div class="col col-md-6 mb-lg-0 mb-4">
            <div class="d-flex gap-3">
              <img src="{{ asset('icon/pupr.jpg')}}" height="70px" alt="">
              <h2 class="text-white fw-bold">PUPR <br> Aceh Tamiang</h2>
            </div>
            <p class="text-white-50">Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Aceh Tamiang</p>
          </div>
          <div class="col col-lg-2 d-flex flex-column mb-lg-0 mb-4">
            <h5 class="text-white fw-bold mb-3">Menu</h5>
            <a href="{{ route('page') }}" class="text-white-50 text-decoration-none mb-2">Home</a>
            <a href="{{ route('webgis') }}" class="text-white-50 text-decoration-none mb-2">WebGIS</a>
            <a href="{{ route('contact') }}" class="text-white-50 text-decoration-none mb-2">Contact</a>
          </div>
          <div class="col col-lg-3 d-flex flex-column">
            <h5 class="text-white fw-bold mb-3">Contact</h5>
            <a href="https://maps.app.goo.gl/WVfh3dHMX5t3vfns8" target="_blank" class="text-white-50 text-decoration-none mb-2 d-flex align-items-center gap-2"><i class="fa-solid fa-map-location-dot"></i>Jalan Ir. Juanda, Karang Baru, Aceh Tamiang</a>
            <a href="#" class="text-white-50 text-decoration-none mb-2 d-flex align-items-center gap-2"><i class="fa-regular fa-envelope"></i>diskominfo@gmail.com</a>
            <a href="#" class="text-white-50 text-decoration-none mb-2 d-flex align-items-center gap-2"><i class="fa-solid fa-phone"></i>+62 123 4567 8901</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p class="text-white-50 pt-5">&copy; Copyright 2025 By Dinas PUPR Aceh Tamiang, All Right Reserved.</p>
          </div>
        </div>
      </div>
     </div>
    <!-- Akhir Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @stack('javascript')
</body>
</html>