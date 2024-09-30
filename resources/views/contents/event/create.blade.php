@extends('layout.main')

@section('title', 'Create Event')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Create Event</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <input id="id" name="id" type="hidden" value="">
                    <div class="form-group">
                        <label class="form-label text-dark">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Sub-Title</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" required>
                    </div>
                    <label class="form-label text-dark">Banner Image</label>
                    <button type="button" id="btn-add-upload" class="btn btn-primary mb-2">Add Banner Upload</button>
                    <div class="p-4 border mb-4 form-group">
                        <div class="row justify-content-center" id="initiator">
                            <div class="col-3">
                                <div>
                                    <input id="file-upload" class="dropify" type="file" name="banner_image[]" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg"/>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Thumbnail Image</label>
                        <div>
                            <input id="file-upload" class="dropify" data-default-value="{{ old('image') }}" type="file" name="image" data-allowed-file-extensions="jpeg jpg png webp svg" />
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="" class="form-label">YouTube Event Trailer URL</label>
                            <button type="button" id="btn-add-video" class="btn btn-primary mb-2">Add URL</button>
                            <div id="video-initiator">
                                <input type="text" value="{{ old('video_url[]') }}" name="video_url[]" class="form-control mb-2" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Sponsors</label>
                        <select id="sponsor" name="sponsor_id[]" class="form-control select2 form-select" multiple="multiple" required></select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Keynote Speaker</label>
                        <select id="keynote-speaker" name="keynote_speaker_id" class="form-control select2 form-select" multiple="multiple" ></select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Speakers</label>
                        <select id="speaker" name="speaker_id[]" class="form-control select2 form-select" multiple="multiple" required></select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Category</label>
                        <select id="category" name="category_id[]" class="form-control select2 form-select" multiple="multiple" required></select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Description</label>
                        <textarea id="summernote" name="desc">{{ old('desc') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Start Datetime</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                </div>
                            </div><input class="form-control time" name="start_datetime" type="text" value="{{ old('start_datetime') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">End Datetime</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                </div>
                            </div><input class="form-control time"  name="end_datetime" type="text" value="{{ old('end_datetime') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Facebook URL</label>
                        <input type="text" name="fb_url" class="form-control" value="{{ old('fb_url') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Instagram URL</label>
                        <input type="text" name="ig_url" class="form-control" value="{{ old('ig_url') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Tiktok URL</label>
                        <input type="text" name="tk_url" class="form-control" value="{{ old('tk_url') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Youtube Channel URL</label>
                        <input type="text" name="yt_url" class="form-control" value="{{ old('yt_url') }}" required>
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

<!--Internal File Upload js-->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>


<script src="{{ asset('virtual/assets/plugins/select2/js/select2.full.min.js') }}"></script>

<!--- Datepicker js --->
<script src="{{ asset('virtual/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>

<script>
    $(document).ready(function () {
        var counter = 1;
        $('.dropify').dropify();
        $('#summernote').summernote();

        ajaxSelect2Initiator('category', false, `{{ route('meta.event-category.select2') }}`);
        ajaxSelect2Initiator('keynote-speaker', false, `{{ route('meta.speakers.select2') }}`, 1);
        ajaxSelect2Initiator('speaker', false, `{{ route('meta.speakers.select2') }}`);
        ajaxSelect2Initiator('sponsor', false, `{{ route('sponsors.select2') }}`);

        $('#btn-add-upload').on('click', function(e) {
            counter+=1;
            if(counter <= 5){
                $('#initiator').append(`
                    <div class="col-3">
                        <input class="dropify" type="file" name="banner_image[]" accept=" image/jpeg, image/png" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" />
                    </div>
                `);

                $('.dropify').dropify();
            }

        })

        $('#btn-add-video').on('click', function(e) {
            counter+=1;
            if(counter <= 5){
            $('#video-initiator').append(`
                <input type="text" value="{{ old('video[]') }}" name="video_url[]" class="form-control mb-2 video" id="">
            `);

            $('.dropify').dropify();
            }
        })


        $('#btn-submit').on('click', function(e) {
            e.preventDefault();
  
            if($('#summernote').summernote('isEmpty'))  alert('Event content cannot be null!');
            else $('#form').submit();
        })

        $('.time').appendDtpicker({
		closeOnSelected: true,
		onInit: function(handler) {
			var picker = handler.getPicker();
			$(picker).addClass('main-datetimepicker');
		}
	});
    });
</script>
@endsection