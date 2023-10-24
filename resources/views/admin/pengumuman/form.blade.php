@extends('layouts.backend.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.announcement.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>

                <h1>
                    @if (@$announcement->exists)
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
                    Data Pengumuman
                </h1>
            </div>


            @if (@$announcement->exists)
                <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.announcement.update', $announcement) }}">
                    @method('put')
                @else
                    <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('admin.announcement.store') }}">
            @endif
            {{ csrf_field() }}
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Pengumuman</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="uraian_kegiatan" class="col-sm-3 col-form-label">
                                        Judul
                                    </label>
                                    <div class="col-sm-9">
                                        {{-- <textarea class="form-control" name="title" >
                                            {{ old('title', @$announcement->title) }}
                                        </textarea> --}}
                                        <input type="text" name="title" placeholder="Masukkan Judul Pengumuman" class="form-control" value="{{ old('title', @$announcement->title) }}">

                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uraian_kegiatan" class="col-sm-3 col-form-label">
                                        Uraian
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="uraian" >{{ old('uraian', @$announcement->uraian) }}</textarea>

                                        @if ($errors->has('uraian'))
                                            <span class="text-danger">{{ $errors->first('uraian') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uraian_kegiatan" class="col-sm-3 col-form-label">
                                        File
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="file" name="file" class="dropify" data-default-file="{{ @$announcement->file_url }}">

                                        @if ($errors->has('file'))
                                            <span class="text-danger">{{ $errors->first('file') }}</span>
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
<script>
    $(document).ready(function() {
        // Inisialisasi Dropify
        $('.dropify').dropify();
    });
</script>
@endsection
