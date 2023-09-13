@extends('layouts.backend.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.extracurricular.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>

                <h1>
                    @if (@$extracurricular->exists)
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
                    Data Ektrakulikuler
                </h1>
            </div>


            @if (@$extracurricular->exists)
                <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.extracurricular.update', $extracurricular) }}">
                    @method('put')
                @else
                    <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('admin.extracurricular.store') }}">
            @endif
            {{ csrf_field() }}
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Ekstrakulikuler</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Pilih Kategori Ekstrakulikuler <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select name="category_extracurricular_id"
                                                class="form-control select2 @error('category_extracurricular_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">
                                                    Pilih Kategori Artikel
                                                </option>

                                                @foreach ($categoryExtracurricular as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('category_extracurricular_id', @$extracurricular->category_extracurricular_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('category_extracurricular_id'))
                                            <span class="text-danger">{{ $errors->first('category_extracurricular_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Nama Kegiatan <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" placeholder="Masukan Judul Artikel"
                                            value="{{ old('title', @$extracurricular->title) }}">
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
                                            data-default-file="{{ @$extracurricular->image_url }}"
                                            data-max-file-size="5M">

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
                                        <textarea class="form-control @error('deskripsi')
                                        is-invalid
                                    @enderror" name="deskripsi" >{{ old('deskripsi', @$extracurricular->deskripsi) }}</textarea>

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
