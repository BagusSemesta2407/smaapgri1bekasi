@extends('layouts.frontend.base')
@section('content')
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Karya Ilmiah</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Beranda</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Karya Ilmiah</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Karya Ilmiah </h6>
        </div>
        <iframe src="{{ $scientificpaper->file_url }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
    </div>
</div>
@endsection