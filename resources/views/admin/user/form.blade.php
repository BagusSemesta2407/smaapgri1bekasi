@extends('layouts.backend.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>

                <h1>
                    @if (@$user->exists)
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
                    Data User
                </h1>
            </div>


            @if (@$user->exists)
                <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.user.update', $user) }}">
                    @method('put')
                @else
                    <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('admin.user.store') }}">
            @endif
            {{ csrf_field() }}
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form User</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Nama  <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Masukan Nama"
                                            value="{{ old('name', @$user->name) }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">
                                        NIP  <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                            id="nip" name="nip" placeholder="Masukan NIP"
                                            value="{{ old('nip', @$user->nip) }}">
                                        @if ($errors->has('nip'))
                                            <span class="text-danger">
                                                {{ $errors->first('nip') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Email  <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Masukan Email"
                                            value="{{ old('email', @$user->email) }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">
                                        Password  <sup class="text-danger">*</sup>
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Isi Jika Akan Mengganti Password"
                                            >
                                        @if ($errors->has('password'))
                                            <span class="text-danger">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>
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
