@extends('layouts.frontend.base')
@section('content')
    <!-- Header Start -->
    <head>
        <style>
            .card-img-top {
                width: 100%;
                height: 15vw;
                object-fit: cover;
            }

            @media (max-width: 768px) {
                .card-img-top {
                    height: 50vw;
                    /* Sesuaikan tinggi untuk tampilan mobile */
                }
            }
        </style>
    </head>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Ekstrakulikuler</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Ekstrakulikuler</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Ekstrakulikuler</h6>
            </div>
            <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-1">
                    @forelse ($categoryExtracurricular as $item)
                        <a href="{{ route('kegiatan-extrakulikuler', $item) }}">
                            <div class="card m-5" style="width: 18rem;">
                                <img src="{{ $item->image_url }}" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <p class="card-text">{{ $item->name }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                    <div>
                        
                    </div>
                        <div class="text-center">
                            <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
                            <p>
                                Belum Ada Data Ekstrakulikuler
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Courses End -->
@endsection
