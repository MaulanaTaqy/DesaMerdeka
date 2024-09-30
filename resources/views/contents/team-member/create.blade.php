@extends('layout.main')

@section('title', 'Team Member')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Team Member</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('team-member.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <input id="id" name="id" type="hidden" value="">
                    <div class="form-group">
                        <label class="form-label text-dark">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Position</label>
                        <input type="text" name="position" class="form-control" value="{{ old('position') }}" required>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Image</label>
                        <div>
                            <input id="file-upload-2" class="dropify" type="file" name="image" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Link Facebook</label>
                        <input type="text" name="fb_url" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Link Instagram</label>
                        <input type="text" name="ig_url" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Link Youtube</label>
                        <input type="text" name="yt_url" class="form-control" required>
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
        // $('#summernote').summernote();

        // ajaxSelect2Initiator('category', false, `{{ route('meta.blog-category.select2') }}`);

        $('#btn-submit').on('click', function(e) {
            e.preventDefault();
  
            $('#form').submit();
            // if($('#summernote').summernote('isEmpty'))  alert('Sponsors content cannot be null!');
            // else $('#form').submit();
        })

    });
</script>
@endsection