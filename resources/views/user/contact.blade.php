@extends('layouts.frontend.base')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Kontak</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Kontak</li>
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


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Kontak</h6>
                <h1 class="mb-5"></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    {{-- <h5>Get In Touch</h5> --}}
                    {{-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> --}}
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Alamat</h5>
                            <p class="mb-0">{{ $setting->alamat }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Telepon</h5>
                            <p class="mb-0">{{ $setting->telepon }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <a href="mailto:{{ $setting->email }}">
                            <div class="ms-3">
                                <h5 class="text-primary">Email</h5>
                                <p class="mb-0 text-dark" style="text-decoration: underline">{{ $setting->email }}</p>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="d-flex align-items-center">
                        <a href="{{ $setting->fb }}">
                            <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                                <i class="bi bi-facebook text-white"></i>
                            </div>
                        </a>
                    </div> --}}

                    <div class="d-flex pt-2">
                        <a class="btn btn-outline btn-social" href="{{ $setting->ig }}" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline btn-social" href="{{ $setting->fb }}" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline btn-social" href="{{ $setting->yt }}" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=sma pgri 1 bekasi&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0">
                    </iframe>
                </div>
                {{-- <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
