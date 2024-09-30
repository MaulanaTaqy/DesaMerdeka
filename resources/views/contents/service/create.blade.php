@extends('layout.main')

@section('title', 'Create Service')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Service / create</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <input id="id" name="id" type="hidden" value="">
                    <div class="form-group">
                        <label class="form-label text-dark">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Icon Image</label>
                        <div>
                            <input id="file-upload" class="dropify" type="file" name="image" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" />
                        </div>
                        <small class="text-danger">Recomended image svg, 512 x 512</small>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Content</label>
                        <textarea id="summernote" name="content" value="{{ old('content') }}"></textarea>
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

        $('#btn-submit').on('click', function(e) {
            e.preventDefault();
            if($('#summernote').summernote('isEmpty')) toast('Content cannot be null!');
            else $('#form').submit();
        })

    });
</script>
@endsection
