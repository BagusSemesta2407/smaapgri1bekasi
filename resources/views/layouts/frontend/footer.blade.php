<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                {{-- <img src="{{ asset('logo.jpeg') }}" alt="" width="100" height="100"> --}}
                <h5 class="text-light">
                    SMA PGRI 1 BEKASI
                </h5>
                <p>
                    Bersama Kami, Kita Berprestasi, Berinovasi, Bertaqwa, dan Berbudaya
                </p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-3">Kontak</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ @$setting->alamat }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ @$setting->telepon }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ @$setting->email }}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="{{ @$setting->ig }}"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ @$setting->fb }}"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ @$setting->yt }}"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                {{-- <h4 class="text-white mb-3">Gallery</h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ $item->image_url }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('template/img/course-2.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('template/img/course-3.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('template/img/course-2.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('template/img/course-3.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('template/img/course-1.jpg') }}" alt="">
                    </div>
                </div> --}}

                <iframe class="position-relative rounded w-100 h-100"
                        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=sma pgri 1 bekasi&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0">
                    </iframe>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{ '/' }}">SMA PGRI 1 BEKASI</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        {{-- <a href="{{  }}">Home</a> --}}
                        <a href="{{ route('landing-page-gallery') }}">Jelajah</a>
                        @if (Route::has('login'))
                            {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                                @auth
                                    <a href="{{ url('/dashboard') }}" >Dahboard</a>
                                @else
                                    <a href="{{ route('login') }}" >Log in</a>
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>