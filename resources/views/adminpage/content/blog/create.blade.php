@extends('adminpage.layout.main')

@section('title', 'Buat Berita')

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
            <a href="{{ route('blog.index') }}" class="text-muted text-hover-primary">Berita</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Tambah Data</li>
    </ul>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <input id="id" name="id" type="hidden" value="">
                    <label class="form-label text-dark">Title</label>
                    <div class="input-group mb-5">
                        <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="Title"/>
                    </div>
                    
                    <label class="form-label text-dark">Banner</label>
                    <div class="input-group mb-5 ">
                        <input id="file-upload" class="dropify" type="file" name="banner_image" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" />
                    </div>

                    <label class="form-label text-dark">Thumbnail</label>
                    <div class="input-group mb-5 ">
                        <input id="file-upload-2" class="dropify" type="file" name="image" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" />
                    </div>
                    <div class="form-label">
                        <label class="form-label text-dark">Category</label>
                        <select class="form-select form-select-solid" id="category"  data-control="select2" data-placeholder="Select category" multiple="multiple" name="category_id[]">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Content</label>
                        <div id="desc" class="min-h-200px mb-2"></div>
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
        editorInitiator(['desc'])
        ajaxSelect2Initiator("category", false, "{{ route('meta.blog-category.select2') }}");
    });
</script>
@endsection
