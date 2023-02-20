@extends('layouts.backend.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.banner.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>

                <h1>
                    @if (@$banner->exists)
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
                    Data Banner
                </h1>
            </div>


            @if (@$banner->exists)
                <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.banner.update', $banner) }}">
                    @method('put')
                @else
                    <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('admin.banner.store') }}">
            @endif
            {{ csrf_field() }}
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Banner</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="image" class="col-sm-3 col-form-label">
                                        Gambar
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="file" class="dropify @error('image') is-invalid @enderror"
                                            name='image' id="image" data-height='250'
                                            data-default-file="{{ @$banner->image_url }}"
                                            data-max-file-size="5M">

                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
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
