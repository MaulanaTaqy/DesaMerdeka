@extends('layout.main')

@section('title', 'Create Member UMKM')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page">Create UMKM</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h3>FORM REGISTRASI</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <h4 class="card-title mb-4">Registrasi UMKM Desa Merdeka oleh Super Admin</h4>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark">Nama UMKM</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark">Nama Admin</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="name_admin" class="form-control" value="{{ old('name_admin') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark">No. HP/WA</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark">Username</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input id="" type="email" name="email"  class="form-control" value="{{ old('email') }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark">Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-dark">Ulangi Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Create Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection



@section('script')
<script>
    $(document).ready(function () {
        
    });
</script>
@endsection