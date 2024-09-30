@extends('adminpage.layout.main')

@section('title', 'Update Team Member')

@section('css')
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/demo.css') }}">
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
@endsection

@section('toolbar')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex fw-bold fs-3 flex-column justify-content-center my-0">
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
            <a href="{{ route('team-member.index') }}" class="text-muted text-hover-primary">Team Member</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Update Data</li>
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
                        Manajemen Update Data
                    </span>
                </h3>
            </div>
            <form id="form" action="{{ route('team-member.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body p-9">
                    @csrf
                    @method("PUT")
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $teamMember->name }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="position">Position</label>
                        <input type="text" name="position" class="form-control" value="{{ old('position') ?? $teamMember->position }}" required>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label" for="image">Image</label>
                        <div>
                            <input id="file-upload-2" class="dropify" type="file" name="image" data-max-file-size="2M" data-default-file="{{ url($teamMember->image) }}" data-allowed-file-extensions="jpeg jpg png webp svg" />
                            <small class="text-danger">Recomended image svg, 512 x 512</small>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Link Facebook</label>
                        <input type="text" name="fb_url" class="form-control" required value="{{ old('fb_url') ?? $teamMember->fb_url }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Link Instagram</label>
                        <input type="text" name="ig_url" class="form-control" required value="{{ old('ig_url') ?? $teamMember->ig_url }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Link Youtube</label>
                        <input type="text" name="yt_url" class="form-control" required value="{{ old('yt_url') ?? $teamMember->yt_url }}">
                    </div>

                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">
                        Submit Now
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

<script src="{{ asset('adminpage/assets/plugins/custom/dropify/js/dropify.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
@endsection