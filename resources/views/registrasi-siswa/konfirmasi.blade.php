@extends('layouts.backend.base')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.registrasi-siswa.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>Data Pendaftar</h1>
            </div>

            <form action="{{ route('admin.registrasi-siswa.update', $registrasiSiswa) }}" id="myForm" class="forms-sample"
                enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Identitas Diri</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" id="name"
                                                    class="form-control" value="{{ $registrasiSiswa->name }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <input type="text" id="nisn"
                                                    class="form-control" value="{{ $registrasiSiswa->nisn }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_kk">NO. KK (Kartu Keluarga)</label>
                                                <input type="text" id="no_kk"
                                                    class="form-control" value="{{ $registrasiSiswa->no_kk }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">NIK (Nomor Induk Keluarga)</label>
                                                <input type="text" id="nik"
                                                    class="form-control" value="{{ $registrasiSiswa->nik }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">NIK (Nomor Induk Keluarga)</label>
                                                <input type="text" id="nik"
                                                    class="form-control" value="{{ $registrasiSiswa->nik }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">NIK (Nomor Induk Keluarga)</label>
                                                <input type="text" id="nik"
                                                    class="form-control" value="{{ $registrasiSiswa->nik }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-actions right">
                                <button type="submit" class="btn btn-primary" id="btnSubmit">
                                    <i class="la la-check-square-o"></i>
                                    Submit
                                    <span class="spinner-border ml-2 d-none" id="loader"
                                        style="width: 1rem; height: 1rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                </button>
                            </div> --}}
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Pendaftar</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="email" name="email"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-primary" id="btnSubmit">
                                    <i class="la la-check-square-o"></i>
                                    Submit
                                    <span class="spinner-border ml-2 d-none" id="loader"
                                        style="width: 1rem; height: 1rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
