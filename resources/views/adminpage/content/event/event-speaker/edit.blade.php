@extends('adminpage.layout.main')

@section('title', 'Edit Event Speaker')

@section('css')
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
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
            <a href="{{ route('meta.speakers.index') }}" class="text-muted text-hover-primary">Event Speaker</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Edit Data</li>
    </ul>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('meta.speakers.update', $speaker->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <label class="form-label text-dark">Title</label>
                    <div class="input-group mb-5">
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $speaker->name }}" required>
                    </div>
                    
                    <label class="form-label text-dark">Keynote</label>
                    <div class="input-group mb-5">
                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $speaker->title }}" required>
                    </div>
                    
                    <label class="form-label text-dark">Image</label>
                    <div class="input-group mb-5 ">
                        <input id="file-upload-2" class="dropify" type="file" name="image" data-max-file-size="2M" data-default-file="{{ asset($speaker->image) }}" data-allowed-file-extensions="jpeg jpg png webp svg" />
                    </div>

                    <label class="form-label text-dark">Link Facebook</label>
                    <div class="input-group mb-5">
                        <input type="text" name="fb_url" class="form-control" value="{{ old('fb_url') ?? $speaker->fb_url }}" required>
                    </div>
                    <label class="form-label text-dark">Link Instagram</label>
                    <div class="input-group mb-5">
                        <input type="text" name="ig_url" class="form-control" value="{{ old('ig_url') ?? $speaker->ig_url }}" required>
                    </div>
                    <label class="form-label text-dark">Link LinkedIn</label>
                    <div class="input-group mb-5">
                        <input type="text" name="li_url" class="form-control" value="{{ old('li_url') ?? $speaker->linkedIn_url }}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection



@section('javascript')
<script src="{{ asset('adminpage/assets/plugins/custom/dropify/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.dropify').dropify();
    });
</script>
@endsection
