@extends('layout.main')

@section('title', 'Edit Event')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Event</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">

    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <input id="id" name="id" type="hidden" value="{{ $event->id }}">
                    <div class="form-group">
                        <label class="form-label text-dark">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $event->title }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Sub-Title</label>
                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') ?? $event->subtitle }}" required>
                    </div>
                    <label class="form-label text-dark">Banner Image</label>
                    <button type="button" id="btn-add-upload" class="btn btn-primary mb-2">Add Banner Upload</button>
                    <div class="p-4 border mb-4 form-group">
                        <div class="row" id="initiator">
                            @foreach ($event->images as $item)
                            <div class="col-3">
                                <div>
                                    <input id="file-upload" class="dropify" type="file" name="banner_image[]" data-id="{{ $item->id }}" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" data-default-file="{{ asset($item->image) }}"/>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Thumbnail Image</label>
                        <div>
                            <input id="file-upload" class="dropify" type="file" name="image" data-allowed-file-extensions="jpeg jpg png webp svg" data-default-file="{{ asset($event->image) }}"/>
                        </div>
                        <small class="text-danger">Recomended image svg, 1200 x 600</small>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="" class="form-label">YouTube Event Trailer URL</label>
                            <button type="button" id="btn-add-video" class="btn btn-primary mb-2">Add URL</button>
                            <div id="video-initiator">
                                <input type="text" value="{{ $item->video_url }}" name="video_url[]" class="form-control mb-2" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Sponsor</label>
                        <select id="sponsor" name="sponsor_id[]" class="form-control select2 form-select" multiple="multiple" required>
                            @foreach ($event->event_sponsor as $item)
                                <option value="{{ $item->sponsor->id }}" selected>{{ $item->sponsor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Keynote Speaker</label>
                        <select id="keynote-speaker" name="keynote_speaker_id" multiple="multiple" class="form-control select2 form-select" required>
                            @foreach ($event->event_speaker->where('is_keynote', 1) as $item)
                                <option value="{{ $item->speaker->id }}" selected>{{ $item->speaker->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Speakers</label>
                        <select id="speaker" name="speaker_id[]" class="form-control select2 form-select" multiple="multiple" required>
                            @foreach ($event->event_speaker->where('is_keynote', 0) as $item)
                                <option value="{{ $item->speaker->id }}" selected>{{ $item->speaker->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Category</label>
                        <select id="category" name="category_id[]" class="form-control select2 form-select" multiple="multiple" required>
                            @foreach ($event->category as $item)
                                <option value="{{ $item->meta_name->id }}" selected>{{ $item->meta_name->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Description</label>
                        <textarea id="summernote" name="desc">{{ $event->desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Start Datetime</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                </div>
                            </div><input class="form-control time" name="start_datetime" type="text" value="{{ $event->start_datetime }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">End Datetime</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                </div>
                            </div><input class="form-control time"  name="end_datetime" type="text" value="{{ $event->end_datetime }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') ?? $event->address }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Facebook URL</label>
                        <input type="text" name="fb_url" class="form-control" value="{{ old('fb_url') ?? $event->fb_url }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Instagram URL</label>
                        <input type="text" name="ig_url" class="form-control" value="{{ old('ig_url') ?? $event->ig_url }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Tiktok URL</label>
                        <input type="text" name="tk_url" class="form-control" value="{{ old('tk_url') ?? $event->tk_url }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Youtube Channel URL</label>
                        <input type="text" name="yt_url" class="form-control" value="{{ old('yt_url') ?? $event->yt_url }}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Update Now</button>
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
        
        $('.dropify').dropify();
        $('#summernote').summernote();

        ajaxSelect2Initiator('category', false, `{{ route('meta.event-category.select2') }}`);
        ajaxSelect2Initiator('speaker', false, `{{ route('meta.speakers.select2') }}`);
        ajaxSelect2Initiator('keynote-speaker', false, `{{ route('meta.speakers.select2') }}`, 1);
        ajaxSelect2Initiator('sponsor', false, `{{ route('sponsors.select2') }}`);

        $('#btn-add-upload').on('click', function(e) {
            $('#initiator').append(`
                <div class="col-3">
                    <input class="dropify" type="file" name="banner_image[]" data-max-file-size="2M"/>
                </div>
            `);

            $('.dropify').dropify();
        })

        $('.dropify-clear').click(function(e){
            let id = $(this).siblings('input[type="file"]').attr('data-id');
            let url = `{{ route('event.images.delete', ':id') }}`
            url = url.replace(':id', id)
            
            $.ajax({
                url    : url,
                type   : "DELETE",
                dataType: "JSON",
                success: function(response) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Foto berhasil dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })
        });

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