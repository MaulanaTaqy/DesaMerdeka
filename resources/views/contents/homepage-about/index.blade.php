@extends('layout.main')

@section('title', 'About us')

@section('css')
{{-- Custom CSS --}}
@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Home About Us</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<!-- row -->
<form class="form-horizontal" action="{{ route('home-about.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row row-sm">
        <!-- Col -->
        <div class="col-lg-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="ps-0">
                            <div class="mb-4 main-content-label">About</div>
                            <textarea class="form-control mt-2" id="summernote" name="desc" >{{ $about->desc ?? '' }}</textarea>
                            
                    </div><!-- about us -->

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
            </div>

        </div>
        <!-- /Col -->
    </div>
</form>

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

        ajaxSelect2Initiator('category', false, `{{ route('meta.member-category.select2') }}`);

        $('#btn-submit').on('click', function(e) {
            e.preventDefault();
  
            if($('#summernote').summernote('isEmpty'))  toast('Blog / Article content cannot be null!');
            else $('#form').submit();
        })

    });
</script>

@endsection
