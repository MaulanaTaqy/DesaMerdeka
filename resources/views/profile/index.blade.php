@extends('layout.main')

@section('title', 'profile')

@section('css')
{{-- Custom CSS --}}
@endsection

@section('breadcumb')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome {{ Auth::user()->{getRoleName()}->name }}!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit-Profile</li>
            </ol>
        </nav>
    </div>
</div>
<!-- /breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="row row-sm">
    <!-- Col -->
    <div class="col-lg-4">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="ps-0">
                    <form class="form-horizontal" action="{{ route('profile.update', $datas->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="type" value="profile" />
                        <div class="main-profile-overview text-center">
                            <div class="main-img-user profile-user"><img alt="" src="{{ asset($datas->image ?? 'virtual/assets/img/default.png') }}"></div>
                            <div class="text-center mb-4">
                                <div>
                                    <h5 class="main-profile-name">{{ $datas->name }}</h5>
                                </div>
                            </div>
                            <input type="file" class="form-control" name="image" placeholder="First Name" value="">
                            @error('image')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control mt-2" name="name" placeholder="Name" value="{{$datas->name}}">
                            {{-- <input type="text" class="form-control mt-2" name="username"  placeholder="Username" value="{{$user->username}}"> --}}
                        </div>
                </div><!-- main-profile-contact-list -->

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
            </div>
            </form>
        </div>

    </div>
    <!-- /Col -->

    <!-- Col -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="mb-4 main-content-label">Change Password ( Kosongkan Jika Tidak Ingin Mengubah Password )</div>
                <form class="form-horizontal" action="{{ route('profile.update', $datas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="password" />
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Username</label>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="username" placeholder="username" value="{{$user->username}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Email</label>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-9">
                                    <input type="text" class="form-control mt-2" name="email" placeholder="Email" value="{{$user->email}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Old Password</label>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="oldPassword" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">New Password</label>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="newPassword" placeholder="New Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Repeat-password</label>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="repeatPassword" placeholder="Ulangi Password">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Password</button>
            </div>
            </form>
        </div>
    </div>
    <!-- /Col -->
</div>
<!-- row closed -->

@endsection

@section('script')


@endsection
