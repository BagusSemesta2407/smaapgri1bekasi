@extends('layouts.frontend.base')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Artikel</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Artikel</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container-fluid p-0 mb-5">
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
</div> --}}
<!-- Header End -->


<!-- Categories Start -->
{{-- <div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Kategori</h6>
            <h1 class="mb-5">Kategori Artikel</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-7">
                <div class="row g-4 justify-content-center">
                    @foreach ($categoryArticle as $item)
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="{{ $item->image_url }}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">{{ $item->name }}</h5>
                            </div>
                        </a>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div> --}}
<!-- Categories Start -->


<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Artikel</h6>
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
<!-- Courses End -->


@endsection