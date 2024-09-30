@extends('layout.main')

@section('title', 'Create Blog - Desa Merdeka')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Dashboard</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card mg-b-20">
            <img class="card-img-top w-100" src="{{ asset($blog->banner_image) }}" alt="">
            <div class="card-body">
                <div class="ps-0">
                    <div class="main-profile-overview">
                        <div class="main-img-user profile-user">
                            <img alt="" src="{{ asset($blog->image) }}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                        </div>
                        <div class="d-flex justify-content-between mg-b-20">
                            <div>
                                <h5 class="main-profile-name">{{ $blog->title }}</h5>
                                @foreach ($blog->category as $item)
                                <a class="badge bg-primary" href="javascript:void(0);">{{ old('item') ?? $item->meta_name->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <h6>Content</h6>
                        <div class="main-profile-bio">
                            {{ limittext($blog->desc, 50) }} <a href="">More</a>
                        </div><!-- main-profile-bio -->
                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-8 col-md-8">
        <div class="card blog-edit">
            <form id="form" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <input id="id" name="id" type="hidden" value="{{ $blog->id }}">
                    <div class="form-group">
                        <label class="form-label text-dark">Blog / Article Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $blog->title }}" required>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Banner Image</label>
                        <div>
                            <input id="file-upload" class="dropify" type="file" name="banner_image" data-max-file-size="2M" data-default-file="{{ asset($blog->banner_image) }}" data-allowed-file-extensions="jpeg jpg png webp svg" />
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Thumbnail Image</label>
                        <div>
                            <input id="file-upload-2" class="dropify" type="file" name="image" data-max-file-size="2M" data-default-file="{{ asset($blog->image) }}" data-allowed-file-extensions="jpeg jpg png webp svg" />
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Category</label>
                        <select id="category" name="category_id[]" class="form-control select2 form-select" multiple="multiple" required>
                            @foreach ($blog->category as $item)
                                <option value="{{ $item->meta_name->id }}" selected>{{old('item') ?? $item->meta_name->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Content</label>
                        <textarea id="summernote" name="desc">{{old('blog') ?? $blog->desc }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Publish Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection



@section('script')
<script src="{{ asset('virtual/assets/js/script.js') }}"></script>

<!-- INTERNAL Select2 js -->
<script src="{{ asset('virtual/assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('virtual/assets/js/select2.js') }}"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{ asset('virtual/assets/plugins/summernote-editor/summernote1.js') }}"></script>

<!-- FILE UPLOADES JS -->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>

<script src="{{ asset('virtual/assets/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.dropify').dropify();
        $('#summernote').summernote();
        
        ajaxSelect2Initiator('category', false, `{{ route('meta.blog-category.select2') }}`);

        $('#btn-submit').on('click', function(e) {
            e.preventDefault();
  
            if($('#summernote').summernote('isEmpty'))  toast('Content cannot be null!');
            else $('#form').submit();
        })

    });
</script>
@endsection
