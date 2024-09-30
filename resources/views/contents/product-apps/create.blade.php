@extends('layout.main')

@section('title', 'Create Product')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Create Product</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <input id="id" name="id" type="hidden" value="">
                    <div class="form-group">
                        <label class="form-label text-dark">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>
                    <label class="form-label text-dark">Product Image</label>
                    <button type="button" id="btn-add-upload" class="btn btn-primary mb-2">Add Product Upload</button>
                    <div class="p-4 border mb-4 form-group">
                        <div class="row justify-content-center" id="initiator">
                            <div class="col-3">
                                <div>
                                    <input id="file-upload" class="dropify" type="file" name="product_image[]" data-allowed-file-extensions="jpeg jpg png webp svg" data-max-file-size="2M"/>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger">Recomended image svg, 512 x 512</small>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Thumbnail Image</label>
                        <div>
                            <input id="file-upload" class="dropify" type="file" name="image" data-allowed-file-extensions="jpeg jpg png webp svg" />
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Banner Image</label>
                        <div>
                            <input id="file-upload" class="dropify" type="file" name="banner_image" data-allowed-file-extensions="jpeg jpg png webp svg" />
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Category</label>
                        <select id="category" name="category_id[]" class="form-control select2 form-select" multiple="multiple" required></select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Description</label>
                        <textarea id="summernote" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="custom-control form-checkbox custom-control-md">
                            <input type="checkbox" class="custom-control-input" name="is_hki">
                            <span class="custom-control-label custom-control-label-md  tx-17">Is HKI</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Market Store URL</label>
                        <input type="text" name="market_store_url" class="form-control" value="{{ old('market_store_url') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Facebook URL</label>
                        <input type="text" name="fb_url" class="form-control" value="{{ old('fb_url') }}" placeholder="https://facebook.com/sampleuser.7">
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Instagram URL</label>
                        <input type="text" name="ig_url" class="form-control" value="{{ old('ig_url') }}" placeholder="https://instagram.com/sampleuser.7">
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Youtube Channel URL</label>
                        <input type="text" name="yt_url" class="form-control" value="{{ old('yt_url') }}" placeholder="https://www.youtube.com/@KakaoGames">
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Tiktok URL</label>
                        <input type="text" name="tk_url" class="form-control" value="{{ old('tk_url') }}" placeholder="https://tiktok.com/sampleuser.7">
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Video Youtube URL</label>
                        <input type="text" name="video" class="form-control" value="{{ old('video') }}" placeholder="https://www.youtube.com/watch?v=8bQp-iDT64o">
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Video Banner</label>
                        <div>
                            <input class="dropify" type="file" name="video_banner" data-allowed-file-extensions="jpeg jpg png webp svg" />
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Save</button>
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

<!--Internal File Upload js-->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>

<!--Internal Select2 js-->
{{-- <script src="{{ asset('virtual/assets/plugins/select2/js/select2.full.min.js') }}"></script> --}}

<script>
    $(document).ready(function () {
        
        $('.dropify').dropify();
        $('#summernote').summernote();

        ajaxSelect2Initiator('category', false, `{{ route('meta.product-category.select2') }}`);

        $('#btn-add-upload').on('click', function(e) {
            $('#initiator').append(`
                <div class="col-3">
                    <input class="dropify" type="file" name="product_image[]" data-allowed-file-extensions="jpeg jpg png webp svg" data-max-file-size="2M"/>
                </div>
            `);

            $('.dropify').dropify();
        })


        $('#btn-submit').on('click', function(e) {
            e.preventDefault();

            if($('#summernote').summernote('isEmpty'))  toast('Product description cannot be null!');
            else $('#form').submit();
        })

    });
</script>
@endsection