@extends('layouts.backend.base')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customer Support</h1>
        </div>
        <form id="myForm" class="form" method="POST" action="{{ route('admin.post-setting') }}">
            @csrf
        <div class="content-body">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="email" name="email"
                                                value="{{ old('email', @$setting->email) }}">
                                            @error('email')
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" id="telepon"
                                                class="form-control @error('telepon') is-invalid @enderror"
                                                placeholder="telepon" name="telepon"
                                                value="{{ old('telepon', @$setting->telepon) }}">
                                            @error('telepon')
                                                <span class="text-danger">{{ $errors->first('telepon') }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="ig">Instagram</label>
                                            <input type="text" id="ig"
                                                class="form-control @error('ig') is-invalid @enderror"
                                                placeholder="Link Instagram" name="ig"
                                                value="{{ old('ig', @$setting->ig) }}">
                                            @error('ig')
                                                <span class="text-danger">{{ $errors->first('ig') }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="fb">Facebook</label>
                                            <input type="text" id="fb"
                                                class="form-control @error('fb') is-invalid @enderror"
                                                placeholder="Link Facebook" name="fb"
                                                value="{{ old('fb', @$setting->fb) }}">
                                            @error('fb')
                                                <span class="text-danger">{{ $errors->first('fb') }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="yt">Youtube</label>
                                            <input type="text" id="yt"
                                                class="form-control @error('yt') is-invalid @enderror"
                                                placeholder="Link Youtube" name="yt"
                                                value="{{ old('yt', @$setting->yt) }}">
                                            @error('yt')
                                                <span class="text-danger">{{ $errors->first('yt') }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" id="alamat"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                placeholder="Masukkan Alamat" name="alamat"
                                                value="{{ old('alamat', @$setting->alamat) }}">
                                            @error('alamat')
                                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="about">Tentang</label>
                                            {{-- <input type="text" id="about"
                                                class="form-control @error('about') is-invalid @enderror"
                                                placeholder="Masukkan Tentang" name="about"
                                                value="{{ old('about', @$setting->about) }}"> --}}
                                            <textarea id="about" name="about" class="form-control">{{ @$setting->about }}</textarea>
                                                @error('about')
                                                <span class="text-danger">{{ $errors->first('about') }}</span>
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
            </form>
    </section>
</div>
@endsection