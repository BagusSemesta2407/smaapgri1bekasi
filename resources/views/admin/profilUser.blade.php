@extends('layouts.backend.base')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>
                    Profile
                </h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">
                    Hi, {{ auth()->user()->name }}
                </h2>

                <p class="section-lead">
                    Lakukan Perubahan Informasi Anda
                </p>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form id="myForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.post-profil', $user) }}">
                                {{ csrf_field() }}

                                <div class="card-header">
                                    <h4>
                                        Data Profile
                                    </h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        {{-- <div class="form-group col-md-4 col-12">
                                            <label for="" class="col-sm-3 col-form-label">
                                                Foto Profile <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-sm-9">
                                                <input type="file" class="dropify" name="image" data-height='250'
                                                    data-default-file="{{ $user->image_url }}"
                                                    data-allowed-file-extensions="jpg jpeg png">
                                            </div>
                                        </div> --}}
                                        <div class="form-group col-md-4 col-12">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                NIP <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('nip') is-invalid @enderror" id="name"
                                                    name="nip" placeholder="Masukan Nama"
                                                    value="{{ old('nip', @$user->nip) }}">
                                                @if ($errors->has('nip'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('nip') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4 col-12">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Nama <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    name="name" placeholder="Masukan Nama"
                                                    value="{{ old('name', @$user->name) }}">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- <div class="form-group col-md-4 col-12">
                                            <label for="username" class="col-sm-3 col-form-label">
                                                Username <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" name="username" placeholder="Masukan Username"
                                                    value="{{ old('username', @$user->username) }}">
                                                @if ($errors->has('username'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('username') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div> --}}

                                        <div class="form-group col-md-4 col-12">
                                            <label for="email" class="col-sm-3 col-form-label">
                                                Email <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" placeholder="Masukan Email"
                                                    value="{{ old('email', @$user->email) }}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4 col-12">
                                            <label for="password" class="col-sm-3 col-form-label">
                                                Password <sup class="text-danger">*</sup>
                                            </label>

                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="Masukkan Password">
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('password') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $(document).on('click', '.delete', function() {
                let url = $(this).val();

                deleteSwal(url);
            });
        });
    </script>
@endsection
