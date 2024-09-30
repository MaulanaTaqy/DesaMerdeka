@extends('layout.main')

@section('title', 'Edit Gallery Image')


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.9.1-beta-0/css/lightgallery.min.css" integrity="sha512-gk6oCFFexhboh5r/6fov3zqTCA2plJ+uIoUx941tQSFg6TNYahuvh1esZVV0kkK+i5Kl74jPmNJTTaHAovWIhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    a > img {
        height: 300px;
        object-fit: cover;
    }
    /* .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    a:hover > div.middle {
        opacity: 1;
    }

    .text {
        background-color: #04AA6D;
        color: white;
        font-size: 16px;
        padding: 16px 32px;
    } */
</style>

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Gallery Image</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">

    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" method="POST" action="{{ route('galleryImages.update', $gallery->id) }}" enctype="multipart/form-data" >
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <input id="gallery_id" name="gallery_id" type="hidden" value="{{ $id }}">
                    <div class="form-group">

                        <div class="mb-3">
                            <label for="name" class="form-label">Album Name</label>
                            <input type="text" value="{{ old('name') ?? $gallery->titile }}" name="name" class="form-control" id="name">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="name" class="form-label">Description (optional)</label>
                            <textarea name="desc" class="form-control" id="desc"> {{ old('desc') ?? $gallery->desc }}</textarea>
                        </div>
                    </div>
                    <label class="form-label text-dark">Album Image</label>
                    <div class="p-4 border mb-4 form-group">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div>
                                    <input id="file-upload" class="dropify" type="file" name="image"  data-default-file="{{ asset($gallery->image) }}"  data-allowed-file-extensions="jpeg jpg png webp svg" data-max-file-size="2M"/>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" value=" {{ old('location') ?? $gallery->lokasi }} " name="location" class="form-control" id="location">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" value="{{ old('date') ?? $gallery->date }}" name="date" class="form-control" id="date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button  id="btnSave" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
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


<script src="{{ asset('virtual/assets/plugins/select2/js/select2.full.min.js') }}"></script>

<!--- Datepicker js --->
<script src="{{ asset('virtual/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<script src="{{ asset('virtual/assets/js/form-elements.js') }}"></script>

<script src="{{ asset('virtual/assets/js/script.js') }}"></script>

<script src="{{ asset('virtual/assets/js/script.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/gallery/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/gallery/jquery.mousewheel.min.js') }}"></script>

<!-- INTERNAL Select2 js -->
<script src="{{ asset('virtual/assets/plugins/select2/js/select2.min.js') }}"></script>
{{-- <script src="{{ asset('virtual/assets/js/select2.js') }}"></script> --}}

<!-- FILE UPLOADES JS -->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>

<script>

$(document).ready(function() {
        ajaxSelect2Initiator("category", false, "{{ route('meta.gallery-category.select2') }}");

        $("#btn-add-upload").on("click", function(e) {
            $("#initiator").append(`
                <div class="col-12">
                    <input class="dropify" type="file" name="gallery_image[]" data-allowed-file-extensions="jpeg jpg png webp svg" data-max-file-size="2M"/>
                    <textarea class="form-control"> </textarea>
                </div>
            `);

            $('.dropify').dropify();
        });

        $("#btn-add-video").on("click", function(e) {
            $("#video-initiator").append(`
                <input type="text" value="{{ old('video[]') }}" name="video_url[]" class="form-control mb-2 video" id="">
            `);

            $('.dropify').dropify();
        });

        var dr = $('.dropify').dropify();
        
        });
      


</script>
@endsection