@extends('layouts.frontend.base')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-1">
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
    <!-- Carousel End -->
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-8">
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

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-200 h-200" src="{{ asset('logo.jpeg') }}" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Tentang</h6>
                    <h1 class="mb-4">Selamat Datang di SMA PGRI 1 BEKASI</h1>
                    <p class="mb-4">SMA PGRI 1 Bekasi merupakan lembaga pendidikan menengah akhir yang berlokasi daerah
                        bekasi</p>
                    <p class="mb-4">SMA PGRI 1 BEKASI memiliki jurusan ipa dan ips yang dapat menunjang pemantapan minat
                        dari siswa/i </p>

                    <a class="btn btn-primary py-3 px-5 mt-2" href="{{ route('about') }}">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
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
    </div>
    <!-- Categories Start -->


    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Artikel</h6>
                <h1 class="mb-5">Artikel Terbaru</h1>
            </div>
            @forelse ($article as $item)
                <div class="row g-4 justify-content-beetween">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                        <div class="course-item">
                            <a href="{{ route('detail-article', $item) }}">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{ $item->image_url }}" alt="">
                                </div>
                                <div class="text-center p-4 pb-0">
                                    <h5 class="mb-4">{{ $item->title }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center">
                    <img src="{{ asset('empty.jpg') }}" alt="">
                </div>
                Belum Ada Data Artikel
            @endforelse
        </div>
    </div>

@endsection
