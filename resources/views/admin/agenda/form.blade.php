@extends('layouts.backend.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.agenda.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>

                <h1>
                    @if (@$agenda->exists)
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
                    Data Agenda
                </h1>
            </div>


            @if (@$agenda->exists)
                <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.agenda.update', $agenda) }}">
                    @method('put')
                @else
                    <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('admin.agenda.store') }}">
            @endif
            {{ csrf_field() }}
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Agenda</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tanggal_awal" class="col-sm-3 col-form-label">
                                        Tanggal Awal <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('tanggal_awal') is-invalid @enderror"
                                            id="tanggal_awal" name="tanggal_awal"
                                            value="{{ old('tanggal_awal', @$agenda->tanggal_awal) }}">
                                        @if ($errors->has('tanggal_awal'))
                                            <span class="text-danger">
                                                {{ $errors->first('tanggal_awal') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tanggal_akhir" class="col-sm-3 col-form-label">
                                        Tanggal Akhir <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                            id="tanggal_akhir" name="tanggal_akhir" "
                                            value="{{ old('tanggal_akhir', @$agenda->tanggal_akhir) }}">
                                        @if ($errors->has('tanggal_akhir'))
                                            <span class="text-danger">
                                                {{ $errors->first('tanggal_akhir') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="uraian_kegiatan" class="col-sm-3 col-form-label">
                                        Uraian Kegiatan
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="uraian_kegiatan" 
                                            value="{{ old('uraian_kegiatan', @$agenda->uraian_kegiatan) }}">

                                        @if ($errors->has('uraian_kegiatan'))
                                            <span class="text-danger">{{ $errors->first('uraian_kegiatan') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-3 col-form-label">
                                        Keterangan
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="keterangan">
                                            {{ old('keterangan', @$agenda->keterangan) }}
                                        </textarea>

                                        @if ($errors->has('keterangan'))
                                            <span class="text-danger">{{ $errors->first('keterangan') }}</span>
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
