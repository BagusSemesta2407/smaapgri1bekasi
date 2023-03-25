@extends('layouts.frontend.base')
@section('content')
    <!-- Header Start -->
    {{-- <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Tentang</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Tentang</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            @forelse ($banner as $item)
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ $item->image_url }}" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(24, 29, 56, .7);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-sm-10 col-lg-8">
                                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang Di
                                        Website</h5>
                                    <h1 class="display-3 text-white animated slideInDown">SMA PGRI 1 BEKASI</h1>
                                    <p class="fs-5 text-white mb-4 pb-2">Bersama Meraih Juara</p>
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
                                    <p class="fs-5 text-white mb-4 pb-2">Bersama Meraih Juara</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Siswa</h5>
                            <p>Ada 500++ Siswa/i di SMA PGRI 1 BEKASI</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Ekstrakulikuler</h5>
                            <p>Ada 17 Ekstrakulikuler di SMA PGRI 1 BEKASI</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-200 h-200" src="{{ asset('logo.jpeg') }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Tentang</h6>
                    <h1 class="mb-4">Selamat Datang di SMA PGRI 1 BEKASI</h1>
                    <p class="mb-4">SMA PGRI 1 Bekasi merupakan lembaga pendidikan menengah akhir yang berlokasi daerah
                        bekasi</p>
                    <p class="mb-4">SMA PGRI 1 BEKASI memiliki jurusan ipa dan ips yang dapat menunjang pemantapan minat
                        dari siswa/i </p>
                </div>
            </div>
        </div>
    </div>
@endsection