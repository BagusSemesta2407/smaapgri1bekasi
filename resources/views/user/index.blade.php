@extends('layouts.frontend.base')
@section('content')

    <head>
        <style>
            @media (max-width: 768px) {
                .carousel-inner .carousel-item>div {
                    display: none;
                }

                .carousel-inner .carousel-item>div:first-child {
                    display: block;
                }
            }
            .card-img-top {
                width: 100%;
                height: 40vw;
                object-fit: cover;
            }
            .img-top {
                width: 50vw;
                height: 15vw;
                object-fit: cover;
            }

            .carousel-inner .carousel-item.active,
            .carousel-inner .carousel-item-start,
            .carousel-inner .carousel-item-next,
            .carousel-inner .carousel-item-prev {
                display: flex;
                // transition-duration: 10s;
            }

            /* display 4 */
            @media (min-width: 768px) {

                .carousel-inner .carousel-item-right.active,
                .carousel-inner .carousel-item-next,
                .carousel-item-next:not(.carousel-item-start) {
                    transform: translateX(25%) !important;
                }

                .carousel-inner .carousel-item-left.active,
                .carousel-item-prev:not(.carousel-item-end),
                .active.carousel-item-start,
                .carousel-item-prev:not(.carousel-item-end) {
                    transform: translateX(-25%) !important;
                }

                .carousel-item-next.carousel-item-start,
                .active.carousel-item-end {
                    transform: translateX(0) !important;
                }

                .carousel-inner .carousel-item-prev,
                .carousel-item-prev:not(.carousel-item-end) {
                    transform: translateX(-25%) !important;
                }
            }
        </style>
    </head>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-1">
        <div class="owl-carousel header-carousel position-relative">
            @forelse ($banner as $item)
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid card-img-top" src="{{ $item->image_url }}" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang Di
                                        Website</h5>
                                    <h1 class="display-3 text-white animated slideInDown">SMA PGRI 1 BEKASI</h1>
                                    <p class="fs-5 text-white mb-4 pb-2">Bersama Kami, Kita Berprestasi, Berinovasi,
                                        Bertaqwa, dan Berbudaya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('default.jpg') }}" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang Di
                                        Website</h5>
                                    <h1 class="display-3 text-white animated slideInDown">SMA PGRI 1 BEKASI</h1>
                                    <p class="fs-5 text-white mb-4 pb-2">Bersama Kami, Kita Berprestasi, Berinovasi,
                                        Bertaqwa, dan Berbudaya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-8">
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <a href="{{ route('karya-ilmiah-landing-page') }}">
                            <div class="p-4">
                                <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                <h5 class="mb-3">Karya Ilmiah</h5>
                                <p>Ada {{ $countScientificPaper }} Karya Ilmiah Siswa/i di SMA PGRI 1 BEKASI</p>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- &nbsp; --}}
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <a href="{{ route('extracurricular') }}">
                            <div class="p-4">
                                <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                                <h5 class="mb-3">Ekstrakulikuler</h5>
                                <p>Ada {{ $countExtraculicullar  }} Ekstrakulikuler di SMA PGRI 1 BEKASI</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-200 h-200" src="{{ asset('logo-sma.png') }}" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Tentang</h6>
                    <h4 class="mb-4">Selamat Datang di SMA PGRI 1 BEKASI</h4>
                    {{-- <p class="mb-4">SMA PGRI 1 BEKASI didirikan pertama kali pada tahun 1980. Saat ini SMA PGRI 1 Bekasi
                        menggunakan
                        kurikulum SMA 2013 IPS.
                        SMAS PGRI 1 Bekasi memiliki akreditasi grade A dengan nilai 94 (akreditasi tahun 2018) dari BAN-S/M
                        (Badan Akreditasi Nasional) Sekolah/Madrasah.
                    </p> --}}
                    <p class="mb-4">{{ @$setting->about }}
                    </p>

                    <a class="btn btn-outline-primary" href="{{ route('about') }}">Selengkapnya .. <i
                            class="bi bi-caret-right-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    {{-- <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Gambar</h6>
                <h1 class="mb-5">Album Kami</h1>
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <div class="row g-3">
                        @forelse ($gallery->take(3) as $item)
                            @if ($loop->iteration == 1)
                                <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                                    <a class="position-relative d-block overflow-hidden" href="">
                                        <img class="img-fluid" src="{{ $item->image_url }}" alt="">

                                    </a>
                                </div>
                            @else
                                <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                                    <a class="position-relative d-block overflow-hidden" href="">
                                        <img class="img-fluid" src="{{ $item->image_url }}" alt="">

                                    </a>
                                </div>
                            @endif
                        @empty
                            <div class="text-center">
                                <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
                            </div>
                            <div class="text-center">
                                Belum Ada Data Album
                            </div>
                        @endforelse
                    </div>
                </div>

                @if ($gallery->isNotEmpty())
                    <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                        <a class="position-relative d-block h-100 overflow-hidden" href="">
                            <img class="img-fluid position-absolute w-100 h-100" src="{{ $item->image_url }}" alt=""
                                style="object-fit: cover;">
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div> --}}

    <div class="container-fluid bg-dark text-light pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item">
                        <h1 class="text-light">SMA PGRI 1 BEKASI</h1>
                        <p>Bersama Kami, Kita Berprestasi, Berinovasi, Bertaqwa, dan Berbudaya</p>
                        <a class="btn btn-outline-light py-3 px-5 mt-2"
                            href="{{ route('landing-page-gallery') }}">Jelajahi</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->


    <!-- Courses Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Artikel</h6>
                <h1 class="mb-5">Artikel Terbaru</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($article as $item)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ $item->image_url }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($item->deskripsi, 150) }}
                                    <a href="{{ route('detail-article', $item) }}">
                                        Lihat Selengkapnya ...
                                    </a>
                                </p>

                                <p class="card-text">
                                    <small class="text-body-secondary">
                                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                        | {{ $item->categoryArticle->name }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
                    </div>
                    <div class="text-center">
                        Belum Ada Data Album
                    </div>
                @endforelse
            </div>
        </div>
    </div> --}}

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Berita & Pengumuman</h6>
            </div>
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-3">Berita</h3>
                            </div>
                            <div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
                                <div class="carousel-inner w-100">

                                    @forelse ($article as $key => $item)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <div class="col-md-12">
                                                <div class="card card-body">
                                                    <img class="img-fluid img-top" src="{{ $item->imageArticle->first()->image_url }}">
                                                    <h5 class="card-title mt-2">
                                                        {{ $item['title'] }}
                                                    </h5>
                                                    <p class="card-text">
                                                        {{ Str::limit($item['deskripsi'], 150) }}
                                                        <a href="{{ route('detail-article', $item) }}">
                                                            Lihat Selengkapnya ...
                                                        </a>
                                                    </p>

                                                    <p class="card-text">
                                                        <small class="text-body-secondary">
                                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                                            | {{ $item->categoryArticle->name }}
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center">
                                            <img src="{{ asset('empty.jpg') }}" alt="" width="280"
                                                height="280">
                                        </div>
                                        <div class="text-center">
                                            Belum Ada Data Artikel
                                        </div>
                                    @endforelse
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="mt-2 float-end">
                            <a class="btn btn-primary" href="{{ route('article') }}">Klik Untuk Lebih Lengkap ... </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-3">Pengumuman</h3>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        @forelse ($announcement as $item)
                                            <h6>
                                                {{ $item->title }}
                                            </h6>
                                            <p>
                                                {{ $item->uraian }}
                                            </p>
                                        @empty
                                            <p>Belum Ada Pengumuman</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Extrakulikuler & Karya Ilmiah</h6>
            </div>
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-3">Extrakulikuler</h3>
                            </div>
                            <div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
                                <div class="carousel-inner w-100">
                                    @foreach ($extracurricular as $key => $item)
                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            <div class="col-md-12">
                                                <div class="card card-body">
                                                    <img class="img-fluid" src="{{ $item['image_url'] }}">
                                                    <h5 class="card-title mt-2">
                                                        {{ $item['title'] }}
                                                    </h5>
                                                    <p class="card-text">
                                                        {{ Str::limit($item['deskripsi'], 150) }}
                                                        <a href="{{ route('detail-extracurricular', $item) }}">
                                                            Lihat Selengkapnya ...
                                                        </a>
                                                    </p>

                                                    <p class="card-text">
                                                        <small class="text-body-secondary">
                                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                                            | {{ $item->categoryExtracurricular->name }}
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="mt-2 float-end">
                            <a class="btn btn-primary" href="{{ route('extracurricular') }}">Klik Untuk Lebih Lengkap ...
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-3">Karya Ilmiah</h3>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        @foreach ($scientificPaper as $item)
                                            <h6>
                                                {{ $item->file }}
                                            </h6>
                                            <p>
                                                {{ $item->year }}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- </div> --}}
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Berita & Pengumuman</h6>
            </div>
            <div class="d-flex justify-content-beetween">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="mb-3">Berita</h3>
                            </div>

                            <div class="col-12">
                                <div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
                                    <div class="carousel-inner w-100">
                                        @forelse ($article as $key => $item)
                                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="card">
                                                            <img src="{{ $item->image_url }}" alt=""
                                                                class="img-fluid">

                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    {{ $item->title }}
                                                                </h4>

                                                                <p class="card-text">
                                                                    {{ Str::limit($item->deskripsi, 100) }}
                                                                    <a href="{{ route('detail-article', $item) }}">
                                                                        Lihat Selengkapnya ...
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card card-body">
                                                        <img src="{{ $item->image_url }}" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
                                    <div class="carousel-inner w-100">
                                        @foreach ($article as $key => $item)
                                        @if ($key % 2 == 0)
                                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                            .row
                                        @endif
                                                <div class="col-md-12">
                                                    <div class="card card-body">
                                                        <img class="img-fluid" src="{{ $item->image_url }}">
                                                    </div>
                                                </div>
                                                @if (($key + 1) % 2 == 0 || $key === count($article))
                                                    
                                            </div>
                                            @endif
                                        @endforeach 
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-3">Pengumuman</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
        <div class="carousel-inner w-100">
            <div class="carousel-item active">
                <div class="col-md-3">
                    <div class="card card-body">
                        <img class="img-fluid" src="http://placehold.it/380?text=1">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-3">
                    <div class="card card-body">
                        <img class="img-fluid" src="http://placehold.it/380?text=2">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-3">
                    <div class="card card-body">
                        <img class="img-fluid" src="http://placehold.it/380?text=3">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-3">
                    <div class="card card-body">
                        <img class="img-fluid" src="http://placehold.it/380?text=4">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-3">
                    <div class="card card-body">
                        <img class="img-fluid" src="http://placehold.it/380?text=5">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-3">
                    <div class="card card-body">
                        <img class="img-fluid" src="http://placehold.it/380?text=6">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-3">
                    <div class="card card-body">
                        <img class="img-fluid" src="http://placehold.it/380?text=7">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="col-md-3">
                    <div class="card card-body">
                        <img class="img-fluid" src="http://placehold.it/380?text=8">
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> --}}
@endsection

@section('script')
    <script>
        // var myCarousel = document.querySelector('#myCarousel')
        // var carousel = new bootstrap.Carousel(myCarousel, {
        //   interval: 100000
        // })

        $('.carousel .carousel-item').each(function() {
            var minPerSlide = 1;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < minPerSlide; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
@endsection
