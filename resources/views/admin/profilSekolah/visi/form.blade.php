@extends('layouts.backend.base')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Visi</h1>
        </div>
        <form id="myForm" class="form" method="POST" action="{{ route('admin.post-visi') }}">
            @csrf
        <div class="content-body">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="name">Visi</label>
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Masukkan Visi" name="name"
                                                value="{{ old('name', @$visi->name) }}">
                                            @error('name')
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
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