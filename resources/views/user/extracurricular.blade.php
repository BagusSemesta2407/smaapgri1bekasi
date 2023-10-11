@extends('layouts.frontend.base')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Extrakulikuler</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Extrakulikuler</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Extrakulikuler</h6>
            </div>
            <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-1">
                    @forelse ($categoryExtracurricular as $item)
                        <a href="{{ route('kegiatan-extrakulikuler', $item) }}">
                            <div class="card m-5" style="width: 18rem;">
                                <img src="{{ $item->image_url }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-text">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </a>
                    @empty
                    <div>
                        
                    </div>
                        <div class="text-center">
                            <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
                            <p>
                                Belum Ada Data Extrakulikuler
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Courses End -->
@endsection
