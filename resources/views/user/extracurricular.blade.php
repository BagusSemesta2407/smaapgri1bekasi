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
            <form action="#" class="form-horizontal"
                style="padding-bottom: 10px;border-bottom: 1px solid #d7d6d6; margin-bottom: 20px;">
                <div class="row align-items-center">

                    <div class="col-md-2 col-sm-12">
                        <label for="" class="label-control">
                            Kategori Extrakulikuler
                        </label>

                        <select name="category_extracurricuar_id" class="form-control select2">
                            <option value=" " selected>Pilih Kategori Extrakulikuler</option>
                            @foreach ($categoryextracurricular as $item)
                                <option value="{{ $item->id }}"
                                    {{ request()->category_extracurricular_id ? (request()->category_extracurricular_id == $item->id ? 'selected' : '') : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-1 col-sm-12 d-flex mt-auto">
                        <button type="submit" class="btn btn-outline-primary btn-block">FILTER</button>
                    </div>
                </div>
            </form>
            @forelse ($extracurricular as $item)
                <div class="row g-4 ">
                    <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item">
                            <div class="mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <img src="{{ $item->image_url }}" class="img-fluid rounded-start"
                                                alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body ms-2">
                                            <a href="{{ route('detail-extracurricular', $item) }}">
                                                <h5 class="card-title">{{ $item->title }}</h5>
                                            </a>
                                            <p class="card-text text-justify">
                                                {{ Str::limit($item->deskripsi, 150) }}
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
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
                </div>
                <div class="text-center">
                    Belum Ada Data Extrakulikuler
                </div>
            @endforelse
            <div class="text-center">
                <nav class="d-inline-block">
                    <div class="p-2">
                        {{ $extracurricular->onEachSide(5)->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Courses End -->
@endsection