@extends('layouts.frontend')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.9/dist/leaflet-search.src.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.css">
    <style>
        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
            url('{{ asset('icon/danau.jpg') }}');;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
        }

        .about .row .col:nth-child(1) {
            background-color: #222;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="hero d-flex align-items-center" style="padding-top: 5rem;">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-white mb-4 fw-bold">Selamat Datang <br> WebGIS PUPR Aceh Tamiang</h1>
                    <p class="text-white mb-4 text-opacity-75">Menampilkan Informasi Letak Geografis, Batas Administrasi Kecamatan di Kabupaten Aceh Tamiang</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- About Section -->
     <div class="about">
        <div class="container-fluid">
            <div class="row row-cols-lg-2 row-cols-lg-1">
                <div class="col text-center py-5 text-white">
                    <h2>Jumlah Kecamatan</h2>
                    <h2 class="fw-bold">12 Kecamatan</h2>
                </div>
                <div class="col text-center py-5 text-white bg-success">
                    <h2>Jumlah Desa</h2>
                    <h2 class="fw-bold">216 Desa</h2>
                </div>
            </div>
        </div>
     </div>
    <!-- End About Section -->
@endsection