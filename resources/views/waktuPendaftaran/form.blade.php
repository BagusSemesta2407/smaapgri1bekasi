@extends('layouts.backend.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.waktu-pendaftaran.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>

                <h1>
                    @if (@$waktuPendaftaran->exists)
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
                    Data Waktu Pendaftaran (PPDB)
                </h1>
            </div>


            @if (@$waktuPendaftaran->exists)
                <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.waktu-pendaftaran.update', $waktuPendaftaran) }}">
                    @method('put')
                @else
                    <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('admin.waktu-pendaftaran.store') }}">
            @endif
            {{ csrf_field() }}
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Waktu Pendaftaran</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Keterangan <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Masukan Keterangan Waktu"
                                            value="{{ old('name', @$waktuPendaftaran->name) }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="startDate" class="col-sm-3 col-form-label">
                                        Waktu Mulai <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('startDate') is-invalid @enderror"
                                            id="startDate" name="startDate" placeholder="Masukan Judul Berita"
                                            value="{{ old('startDate', @$waktuPendaftaran->startDate) }}">
                                        @if ($errors->has('startDate'))
                                            <span class="text-danger">
                                                {{ $errors->first('startDate') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="endDate" class="col-sm-3 col-form-label">
                                        Waktu Selesai <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('endDate') is-invalid @enderror"
                                            id="endDate" name="endDate" placeholder="Masukan Judul Berita"
                                            value="{{ old('endDate', @$waktuPendaftaran->endDate) }}">
                                        @if ($errors->has('endDate'))
                                            <span class="text-danger">
                                                {{ $errors->first('endDate') }}
                                            </span>
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
