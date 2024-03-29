@extends('layouts.frontend.base')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
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
    </div>
    <!-- Service Start -->
    {{-- <div class="container-xxl py-5">
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
    </div> --}}
    <!-- Service End -->

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
                    <h3 class="mb-4">Selamat Datang di SMA PGRI 1 BEKASI</h3>
                    <p class="mb-4">{{ @$setting->about }}
                    </p>

                </div>
            </div>
        </div>
    </div>



    <div class="container-xxl py-5">
        <div class="container">
            {{-- <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Profil</h6>
            </div> --}}
            <div class="row g-4 justify-content-beetween">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Visi
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false">
                                    Misi
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact-tab-pane" type="button" role="tab"
                                    aria-controls="contact-tab-pane" aria-selected="false">
                                    Tujuan
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="disabled-tab" data-bs-toggle="tab"
                                    data-bs-target="#disabled-tab-pane" type="button" role="tab"
                                    aria-controls="disabled-tab-pane" aria-selected="false">
                                    Strategi
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <p class="mt-2">
                                    {{ @$visi->name }}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
                                <p class="mt-2">
                                    Untuk mewujudkan Visi SMA PGRI 1 Bekasi, maka dibutuhkan Misi. Adapun Misi
                                    SMA PGRI 1 Bekasi adalah:
                                </p>
                                <table class="table">
                                    <tbody>
                                        @forelse ($misi as $item)
                                            <tr>
                                                <td style="width: 30px">{{ $loop->iteration }}.</td>
                                                <td>{{ $item->name }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">Data Misi Belum Ada</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                                tabindex="0">
                                <p class="mt-2">
                                    Tujuan SMA PGRI 1 Bekasi adalah:
                                </p>

                                <table class="table">
                                    <tbody>
                                        @forelse ($tujuan as $item)
                                            <tr>
                                                <td style="width: 30px">{{ $loop->iteration }}.</td>
                                                <td>{{ $item->name }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">Data Tujuan Belum Ada</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel"
                                aria-labelledby="disabled-tab" tabindex="0">
                                <p class="mt-2">
                                    Untuk mencapai Tujuan yang diharapkan, strategi SMA PGRI 1
                                    Bekasi yang dilakukan adalah:
                                </p>

                                <table class="table">
                                    <tbody>
                                        @forelse ($strategy as $item)
                                            <tr>
                                                <td style="width: 30px">{{ $loop->iteration }}.</td>
                                                <td>{{ $item->name }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">Data Strategi Belum Ada</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Visi & Misi</h6>
                    <h1 class="mb-4">Visi</h1>
                    <p class="mb-4">BERPRESTASI, BERINOVASI, BERTAQWA, DAN BERBUDAYA</p>
                    <h1 class="mb-4">Misi</h1>
                    <ul>
                        <li>
                            Mewujudkan hasil pendidikan yang berkualitas sehingga mampu menghadapi kompetisi global
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Tujuan</h6>
                    <h1 class="mb-4">Tujuan</h1>
                    <ul>
                        <li>
                            Mewujudkan hasil pendidikan yang berkualitas sehingga mampu menghadapi kompetisi global
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Visi & Misi</h6>
                <h1 class="mb-5">Artikel Terbaru</h1>
            </div>
            <div class="d-flex">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-5">Visi</h3>
                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
