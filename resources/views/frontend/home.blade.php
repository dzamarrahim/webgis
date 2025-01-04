@extends('layouts.frontend')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.9/dist/leaflet-search.src.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Animate Style -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

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

        .webgis {
            margin-bottom: 50px;
        }

        .about .row .col:nth-child(1) {
            background-color: #222;
        }

        .faq {
            margin-top: 70px;
            margin-bottom: 100px;
        }

        .faq .accordion {
            --bs-accordion-bg: #198754;
        }

        .faq .accordion-button:not(.collapsed) {
            background-color: #212529;
        }

        .faq .accordion .accordion-button:focus {
            box-shadow: none;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="hero d-flex align-items-center" style="padding-top: 5rem;" id="home">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-white mb-4 fw-bold animate__animated animate__zoomIn">Selamat Datang <br> WebGIS PUPR Aceh Tamiang</h1>
                    <p class="text-white mb-4 text-opacity-75"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- About Section -->
     <div class="about" id="about">
        <div class="container-fluid">
            <div class="row row-cols-lg-2 row-cols-lg-1">
                <div class="col text-center py-5 text-white px-4">
                <i class="fa-solid fa-circle-info" style="font-size: 70px; padding-bottom: 20px;"></i>
                    <h2>Informasi Geospasial</h2>
                    <p class="">Informasi geospasial dapat didefinisikan sebagai segala yang menyangkut lokasi dan keberadaan suatu objek pada permukaan bumi.</p>
                </div>
                <div class="col text-center py-5 text-white bg-success px-3">
                <i class="fa-solid fa-map-location-dot" style="font-size: 70px; padding-bottom: 20px;"></i>
                    <h2>Data Geospasial</h2>
                    <p>Data tentang lokasi geografis, dimensi atau ukuran, dan/atau karakteristik objek alam yang berada di bawah, pada, atau di atas permukaan bumi.</p>
                </div>
            </div>
        </div>
     </div>
     <!-- End About Section -->

     <!-- Latar Belakang -->
      <div class="latar" id="latar">
        <div class="container my-5">
            <div class="row">
                <div class="col"  data-aos="fade-right" data-aos-duration="1000" data-tilt data-tilt-scale="1.1">
                    <img src="{{ asset('icon/peta-aceh.jpg')}}" alt="">
                </div>
                <div class="col">
                    <h2 class="mb-4 display-4 fw-semibold" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">Latar Belakang</h2>
                    <p class="fs-5" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="1000">Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) mempunyai peran penting dalam penyusunan kebijakan pembangunan daerah dengan mengacu pada analisa data dan asumsi pertumbuhan daerah pada tahun rencana. Salah satu data yang dibutuhkan dalam perencanaan kebijakan pembangunan baik secara makro dan sektoral adalah data geospasial yang dikelola oleh Bidang Tata Ruang Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Aceh Tamiang.</p>
                </div>
            </div>
        </div>
      </div>
     <!-- Akhir Latar Belakang -->

     <!-- Apa Itu GIS -->
      <div class="gis" id="gis">
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4 display-4 fw-semibold" data-aos="fade-right" data-aos-duration="1000">Apa Itu GIS?</h2>
                    <p class="fs-5 mb-4" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="500">Secara umum Geographic Information System (GIS) juga dikenal sebagai Sistem Informasi Geografis (SIG) di Indonesia</p>
                    <p class="fs-5 fst-italic mb-4" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="1000">“GIS adalah suatu komponen yang terdiri dari perangkat keras, perangkat lunak, data geografis dan sumber daya manusia yang bekerja bersama secara efektif untuk memasukan, menyimpan, memperbaiki, memperbaharui, mengelola, memanipulasi, mengintegrasikan, menganalisa dan menampilkan data dalam suatu informasi berbasis geografis“</p>
                    <p class="" data-aos="fade-right" data-aos-duration="1000">Sumber: www.geospasialis.com & YouTube channel “ESRI”</p>
                </div>
                <div class="col text-center" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="2000">
                    <img src="{{ asset('icon/maps-icon.png') }}" alt="">
                </div>
            </div>
        </div>
      </div>
     <!-- Akhir Apa Itu GIS -->

     <!-- WebGIS -->
      <div class="webgis bg-dark" id="webgis">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col" data-aos="fade-right" data-aos-duration="1000">
                    <img src="{{ asset('icon/gis.png') }}" alt="" class="">
                </div>
                <div class="col ms-4">
                    <h3 class="text-white mb-4" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">WebGIS Kabupaten Aceh Tamiang</h3>
                    <p class="text-white mb-4" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="1000">WebGIS adalah pemetaan digital yang memanfaatkan jaringan internet sebagai media komunikasi yang berfungsi mendistribusikan, mempublikasikan, mengintegrasikan, mengkomunikasikan dan menyediakan informasi dalam bentuk teks, peta digital serta menjalankan fungsi–fungsi analisis dan query yang terkait dengan GIS. Untuk mengakses WebGIS Kabupaten Aceh Tamiang silahkan klik link berikut</p>
                    <a href="{{ route('webgis') }}" class="btn btn-success btn-lg px-4 py-2 rounded-1" target="_blank" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">WebGIS Aceh Tamiang</a>
                </div>
            </div>
        </div>
      </div>
     <!-- Akhir WebGIS -->

     <!-- FAQ -->
      <div class="faq" id="faq">
        <div class="container">
            <div class="row">
                <div class="col" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="fw-semibold">Pertanyaan Umum <br> Yang Sering ditanyakan</h2>
                </div>
            </div>
            <div class="row row-cols-lg-2 row-cols-1 g-4 pt-4">
                <div class="col" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-white fw-semibold lh-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Apa Itu GIS?
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-white">
                                GIS adalah suatu komponen yang terdiri dari perangkat keras, perangkat lunak, data geografis dan sumber daya manusia yang bekerja bersama secara efektif untuk memasukan, menyimpan, memperbaiki, memperbaharui, mengelola, memanipulasi, mengintegrasikan, menganalisa dan menampilkan data dalam suatu informasi berbasis geografis
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-white fw-semibold lh-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Apa Itu WebGIS?
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-white">
                                WebGIS adalah pemetaan digital yang memanfaatkan jaringan internet sebagai media komunikasi yang berfungsi mendistribusikan, mempublikasikan, mengintegrasikan, mengkomunikasikan dan menyediakan informasi dalam bentuk teks, peta dijital serta menjalankan fungsi–fungsi analisis dan query yang terkait dengan GIS. Untuk mengakses WebGIS Kabupaten Aceh Tamiang silahkan klik link berikut
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="600">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-white fw-semibold lh-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Apakah Saat Mengakses WebGIS Harus Login Terlebih Dahulu?
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-white">
                                Iya, Kamu Harus Login Atau Membuat Akun Terlebih Dahulu Sebelum Mengakses WebGIS
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="600">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed text-white fw-semibold lh-lg" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourth" aria-expanded="false" aria-controls="collapseFourth">
                            Apa Itu Geospasial?
                            </button>
                            </h2>
                            <div id="collapseFourth" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body text-white">
                                Geospasial adalah data yang berkaitan dengan lokasi dan karakteristik suatu objek atau kejadian di permukaan bumi. Data geospasial juga disebut sebagai geodata.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
@endsection

@push('javascript')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
<script>
    VanillaTilt.init(document.querySelectorAll(".latar img"), {
      max: 25,
      speed: 400,
      glare: true,
      "max-glare": 0.5,
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/TextPlugin.min.js"></script>
<script>
    gsap.registerPlugin(TextPlugin)
    gsap.to('.hero p', {
        duration: 2,
        delay: 0.8,
        text: "Menampilkan Informasi Letak Geografis, Batas Administrasi Kecamatan di Kabupaten Aceh Tamiang",
        ease: "none",
    });
</script>
@endpush