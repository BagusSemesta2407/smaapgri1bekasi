@extends('layouts.backend.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>

                <h1>
                    @if (@$article->exists)
                        Edit
                        @php
                            $aksi = 'Edit';
                        @endphp
                    @else
                        Tambah
                        @php
                            $aksi = 'Tambah';
                        @endphp
                    @endif
                    Data Kategori Artikel
                </h1>
            </div>


            @if (@$article->exists)
                <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.article.update', $article) }}">
                    @method('put')
                @else
                    <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('admin.article.store') }}">
            @endif
            {{ csrf_field() }}
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Kategori Produk</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Pilih Kategori Artikel <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select name="category_article_id"
                                                class="form-control select2 @error('category_article_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">
                                                    Pilih Kategori Artikel
                                                </option>

                                                @foreach ($categoryArticle as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('category_article_id', @$article->category_article_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('category_article_id'))
                                            <span class="text-danger">{{ $errors->first('category_article_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Judul <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" placeholder="Masukan Judul Artikel"
                                            value="{{ old('title', @$article->title) }}">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">
                                                {{ $errors->first('title') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 col-form-label">
                                        Gambar
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="file" class="dropify @error('image') is-invalid @enderror"
                                            name='image' id="image" data-height='250'
                                            value="{{ @$article->image_url }}"
                                            data-default-file="{{ @$article->image_url }}"
                                            data-allowed-file-extensions="jpeg jpg png" data-max-file-size="5M">

                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">
                                        Deskripsi
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="deskripsi">
                                            {{ old('deskripsi', @$article->deskripsi) }}
                                        </textarea>

                                        @if ($errors->has('deskripsi'))
                                            <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-icon icon-left" id="btnSubmit">
                                        {{ $aksi }}

                                        <span class="spinner-border ml-2 d-none" id="loader"
                                            style="width: 1rem; height: 1rem;" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
        </section>
    </div>
@endsection
