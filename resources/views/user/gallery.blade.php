@extends('layouts.frontend.base')
@section('content')

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
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

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Galeri</h6>
                    <div class="card">
                        <div class="row row-cols-1 row-cols-md-4 g-1" data-masonry='{"percentPosition": true }'>
                            @forelse ($gallery as $item)
                                <div class="col">
                                    <div class="card">
                                        <a href="{{ $item->image_url }}" data-fancybox="gallery"
                                            data-caption="{{ $item->caption }}">
                                            <img src="{{ $item->image_url }}" class="card-img-top"
                                                alt="{{ $item->caption }}">
                                                <p class="text-dark">{{ $item->title }}</p>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col text-center">
                                    <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
                                    <p>Belum Ada Data Album</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('[data-fancybox="gallery"]').fancybox();
        });
    </script>
@endsection
