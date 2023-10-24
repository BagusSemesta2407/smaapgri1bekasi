@extends('layouts.backend.base')
@section('content')
    <!-- Main Content -->

    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
            rel="stylesheet" />
    </head>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    @role('admin')
                        <a href="{{ route('admin.scientificpaper.index') }}" class="btn btn-icon">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    @endrole

                    @role('guru')
                        <a href="{{ route('guru.scientificpaper.index') }}" class="btn btn-icon">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    @endrole
                </div>

                <h1>
                    @if (@$scientific->exists)
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
                    Data Karya Ilmiah
                </h1>
            </div>


            @role('admin')
                @if (@$scientific->exists)
                    <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('admin.scientificpaper.update', $scientific) }}">
                        @method('put')
                    @else
                        <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                            action="{{ route('admin.scientificpaper.store') }}">
                @endif
            @endrole

            @role('guru')
                @if (@$scientific->exists)
                    <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('guru.scientificpaper.update', $scientific) }}">
                        @method('put')
                    @else
                        <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                            action="{{ route('guru.scientificpaper.store') }}">
                @endif
            @endrole
            {{ csrf_field() }}
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Karya Ilmiah</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="judul" class="col-sm-3 col-form-label">
                                        Judul
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control"
                                            value="{{ old('title', @$scientific->title) }}" placeholder="Masukkan Judul">

                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="file karya ilmiah" class="col-sm-3 col-form-label">
                                        File
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="file" name="file" class="dropify"
                                            data-default-file="{{ @$scientific->file_url }}"
                                            data-allowed-file-extensions="pdf">

                                        @if ($errors->has('file'))
                                            <span class="text-danger">{{ $errors->first('file') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tahun" class="col-sm-3 col-form-label">
                                        Tahun
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="year" class="form-control" id="datepicker"
                                            value="{{ old('year', @$scientific->year) }}" placeholder="Masukkan Tahun" autocomplete="off">

                                        @if ($errors->has('year'))
                                            <span class="text-danger">{{ $errors->first('year') }}</span>
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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Dropify
            $('.dropify').dropify();
        });
    </script>
    <script>
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
@endsection
