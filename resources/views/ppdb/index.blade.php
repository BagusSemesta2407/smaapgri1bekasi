@extends('layouts.frontend.base')
@section('content')
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">PPDB</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">PPDB</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">PPDB</h6>
            </div>
            @forelse ($waktuPendaftaran as $item)
                <div class="row g-4">
                    <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item">
                            <div class="mb-3">
                                <div class="row g-0">
                                    <div class="col-md-12">
                                        <div class="card-body mt-3">
                                            <a href="">
                                                <h5 class="card-title text-center">{{ $item->name }}</h5>
                                            </a>

                                            <p class="card-text text-center">
                                                <small class="text-body-secondary">
                                                    {{ \Carbon\Carbon::parse($item->startDate)->translatedFormat('l, d F Y') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($item->endDate)->translatedFormat('l, d F Y') }}
                                                </small>
                                            </p>

                                            <div class="text-center">
                                                <a href="{{ route('registrasi', Crypt::encryptString($item->id)) }}" class="btn btn-primary">
                                                    Daftar Sekarang
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="text-center">
                    <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
                </div>
                <div class="text-center">
                    Belum Ada Jadwal PPDB
                </div>
            @endforelse
            {{-- <div class="text-center">
                <nav class="d-inline-block">
                    <div class="p-2">
                        {{ $announcement->onEachSide(5)->links() }}
                    </div>
                </nav>
            </div> --}}
        </div>
    </div>
@endsection
