@extends('layouts.frontend.base')
@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="card col-6">
            <div class="card-body">
                <div class="text-center">
                    <h1>{{ $article->title }}</h1>
                    <br>
                    <br>
                    <img src="{{ $article->image_url }}" alt="" class="col-sm-12">
                    <br>
                    <br>
                    <br>
                    <p style="text-align:justify; text-justify:inter-word;">{{ $article->deskripsi }}</p>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection