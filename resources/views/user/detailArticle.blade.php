@extends('layouts.frontend.base')
@section('content')
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    </head>

    <div class="row">
        <div class="col-3"></div>
        <div class="card col-6 mt-5">
            <div class="card-body">
                <div class="text-center">
                    <h1>{{ $article->title }}</h1>
                    <div class="row row-cols-1 g-1">
                        @forelse ($imageArticle as $item)
                            <div class="col d-flex justify-content-center align-items-center">
                                <div class="card">
                                    <a href="{{ $item->image_url }}" data-fancybox="imageArticle">
                                        <img src="{{ $item->first()->image_url }}" class="card-img-top mx-auto" alt="..." >
                                    </a>
                                </div>
                            </div>
                            @break 
                        @empty
                            <div class="col text-center">
                                <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
                                <p>Foto Belum Ditambahkan</p>
                            </div>
                        @endforelse
                    </div>
                        <p class="card-text">
                            <small class="text-body-secondary">
                                {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('l, d F Y') }}
                                |{{ @$article->categoryArticle->name}}
                            </small>
                        </p>
                    <hr>
                    <p style="text-align:justify; text-justify:inter-word;">{{ $article->deskripsi }}</p>
                    <div class="card">
                        <div class="row row-cols-1 row-cols-md-4 g-1" data-masonry='{"percentPosition": true }'>
                            @forelse ($imageArticle as $item)
                                <div class="col">
                                    <div class="card">
                                        <a href="{{ $item->image_url }}" data-fancybox="imageArticle">
                                            <img src="{{ $item->image_url }}" class="card-img-top"
                                                alt=" ">
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col text-center">
                                    <img src="{{ asset('empty.jpg') }}" alt="" width="280" height="280">
                                    <p>Foto Belum Ditambahkan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('[data-fancybox="imageArticle"]').fancybox();
        });
    </script>
@endsection
