@extends('adminpage.layout.main')

@section('title', 'Create Akun Desa')

@section('css')

@endsection

@section('toolbar')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
        @yield("title")
    </h1>

    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/desa') }}" class="text-muted text-hover-primary">Desa</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Tambah Data</li>
    </ul>
</div>
@endsection

@section('content')

<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <div class="card card-xl-stretch mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">
                        Manajemen Tambah Data
                    </span>
                </h3>
            </div>
            <form action="{{ url('/desa') }}" method="POST">
                {{ csrf_field() }}
                <div class="card-body p-9">
                    <div class="row mb-7 form-group">
                        <label class="col-lg-2 fw-semibold text-muted" for="name"> Nama Desa </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="row mb-7 form-group">
                        <label class="col-lg-2 fw-semibold text-muted" for="name_admin"> Nama Admin </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="name_admin" id="name_admin" value="{{ old('name_admin') }}" required>
                        </div>
                    </div>
                    <div class="row mb-7 form-group">
                        <label class="col-lg-2 fw-semibold text-muted" for="phone"> No. HP / WA </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div>
                    <div class="row mb-7 form-group">
                        <label class="col-lg-2 fw-semibold text-muted" for="username"> Username </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" required>
                        </div>
                    </div>
                    <div class="row mb-7 form-group">
                        <label class="col-lg-2 fw-semibold text-muted" for="email"> Email </label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="row mb-7 form-group">
                        <label class="col-lg-2 fw-semibold text-muted" for="password"> Password </label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" required>
                        </div>
                    </div>
                    <div class="row mb-7 form-group">
                        <label class="col-lg-2 fw-semibold text-muted" for="ulangi_password"> Ulangi Password </label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" name="ulangi_password" id="ulangi_password" value="{{ old('ulangi_password') }}" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        Create Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('modal')

@endsection

@section('javascript')

@endsection