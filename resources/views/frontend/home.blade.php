@extends('layouts.frontend')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.9/dist/leaflet-search.src.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.css">
    <style>
        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
            url('{{ asset('icon/danau.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
        }

        .about {
            margin-bottom: 60px;
        }

        .latar {
            margin-bottom: 80px;
        }

        .latar img {
            width: 500px;
            height: 400px;
        }

        .gis img {
            width: 300px;
        }

        .webgis {
            padding-right: 50px;
        }

        .webgis img {
            width: 600px;
            height: 310px;
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
                <i class="fa-solid fa-circle-info" style="font-size: 70px; padding-bottom: 20px;"></i>
                    <h2>Informasi Geospasial</h2>
                    <p class="">Informasi geospasial dapat didefinisikan sebagai segala yang menyangkut lokasi dan keberadaan suatu objek pada permukaan bumi.</p>
                </div>
                <div class="col text-center py-5 text-white bg-success">
                <i class="fa-solid fa-map-location-dot" style="font-size: 70px; padding-bottom: 20px;"></i>
                    <h2>Data Geospasial</h2>
                    <p>Data tentang lokasi geografis, dimensi atau ukuran, dan/atau karakteristik objek alam yang berada di bawah, pada, atau di atas permukaan bumi.</p>
                </div>
            </div>
        </div>
     </div>
     <!-- End About Section -->

     <!-- Latar Belakang -->
      <div class="latar">
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('icon/peta-aceh.jpg')}}" alt="">
                </div>
                <div class="col">
                    <h2 class="mb-4 display-4 fw-semibold">Latar Belakang</h2>
                    <p class="fs-5">Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) mempunyai peran penting dalam penyusunan kebijakan pembangunan daerah dengan mengacu pada analisa data dan asumsi pertumbuhan daerah pada tahun rencana. Salah satu data yang dibutuhkan dalam perencanaan kebijakan pembangunan baik secara makro dan sektoral adalah data geospasial yang dikelola oleh Bidang Tata Ruang Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Aceh Tamiang.</p>
                </div>
            </div>
        </div>
      </div>
     <!-- Akhir Latar Belakang -->

     <!-- Apa Itu GIS -->
      <div class="gis">
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4 display-4 fw-semibold">Apa Itu GIS?</h2>
                    <p class="fs-5 mb-4">Secara umum Geographic Information System (GIS) juga dikenal sebagai Sistem Informasi Geografis (SIG) di Indonesia</p>
                    <p class="fs-5 fst-italic mb-4">“GIS adalah suatu komponen yang terdiri dari perangkat keras, perangkat lunak, data geografis dan sumber daya manusia yang bekerja bersama secara efektif untuk memasukan, menyimpan, memperbaiki, memperbaharui, mengelola, memanipulasi, mengintegrasikan, menganalisa dan menampilkan data dalam suatu informasi berbasis geografis“</p>
                    <p class="">Sumber: www.geospasialis.com & YouTube channel “ESRI”</p>
                </div>
                <div class="col text-center">
                    <img src="{{ asset('icon/maps-icon.png') }}" alt="">
                </div>
            </div>
        </div>
      </div>
     <!-- Akhir Apa Itu GIS -->

     <!-- WebGIS -->
      <div class="webgis bg-dark">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col">
                    <img src="{{ asset('icon/webgis.png') }}" alt="" class="">
                </div>
                <div class="col ms-4">
                    <h3 class="text-white mb-4">WebGIS Kabupaten Aceh Tamiang</h3>
                    <p class="text-white mb-4">WebGIS adalah pemetaan digital yang memanfaatkan jaringan internet sebagai media komunikasi yang berfungsi mendistribusikan, mempublikasikan, mengintegrasikan, mengkomunikasikan dan menyediakan informasi dalam bentuk teks, peta dijital serta menjalankan fungsi–fungsi analisis dan query yang terkait dengan GIS. Untuk mengakses WebGIS Kota Banda Aceh silahkan klik link berikut</p>
                    <button class="btn btn-success btn-lg px-4 py-2 rounded-1">WebGIS Aceh Tamiang</button>
                </div>
            </div>
        </div>
      </div>
     <!-- Akhir WebGIS -->
@endsection