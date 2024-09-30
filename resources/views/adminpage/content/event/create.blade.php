@extends('adminpage.layout.main')

@section('title', 'Buat Event')

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
            <a href="{{ route('event.index') }}" class="text-muted text-hover-primary">Event</a>
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
            <form id="form" action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <label class="form-label text-dark">Nama Event</label>
                    <div class="input-group mb-5">
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>
                    <label class="form-label text-dark">Sub-Title</label>
                    <div class="input-group mb-5">
                        <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" required>
                    </div>
                    
                    <label class="form-label text-dark">Banner Image</label>
                    <button type="button" id="btn-add-upload" class="btn btn-primary mb-2">Tambah Foto Banner Event</button>
                    <div class="form-group mb-5 ">
                        <div class="row justify-content-center btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex" id="initiator">
                            <div class="col-3 mt-3">
                                <div>
                                    <input id="file-upload" class="dropify" type="file" name="banner_image[]" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <label class="form-label text-dark">Thumbnail Image</label>
                    <div class="input-group mb-5 ">
                        <input id="file-upload" class="dropify" data-default-value="{{ old('image') }}" type="file" name="image" data-allowed-file-extensions="jpeg jpg png webp svg" />
                    </div>

                    <label for="" class="form-label">YouTube Event Trailer URL</label>
                    <div class="form-group mb-5 ">
                        <div id="video-initiator">
                            <input type="text" value="{{ old('video_url[]') }}" name="video_url[]" class="form-control mb-2" id="">
                        </div>
                    </div>

                    <div class="form-label">
                        <label class="form-label text-dark">Sponsors</label>
                        <select id="sponsor" name="sponsor_id[]" class="form-control select2 form-select" multiple="multiple" required></select>
                    </div>
                    <div class="form-label">
                        <label class="form-label text-dark">Keynote Speaker</label>
                        <select id="keynote-speaker" name="keynote_speaker_id" class="form-control select2 form-select" multiple="multiple" ></select>
                    </div>
                    <div class="form-label">
                        <label class="form-label text-dark">Speakers</label>
                        <select id="speaker" name="speaker_id[]" class="form-control select2 form-select" multiple="multiple" required></select>
                    </div>
                    <div class="form-label">
                        <label class="form-label text-dark">Kategori</label>
                        <select id="category" name="category_id[]" class="form-control select2 form-select" multiple="multiple" required></select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Deskripsi Event</label>
                        <div id="desc" class="min-h-200px mb-2"></div>
                    </div>
                    <div class="form-label">
                        <label class="form-label text-dark">Tanggal Mulai Event</label>
                        <input type="time" id="start_time" name="start_time" class="form-control form-control-lg form-control-solid" value="{{ old('start_time') }}" >
                    </div>
                    <div class="form-label">
                        <label class="form-label text-dark">Tanggal Berakhir Event</label>
                        <input type="time" id="end_time" name="end_time" class="form-control form-control-lg form-control-solid" value="{{ old('end_time') }}" >
                    </div>
                    <div class="form-label">
                        <label class="form-label text-dark">Alamat</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                    </div>

                    <label class="form-label text-dark">Facebook URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="fb_url" class="form-control" value="{{ old('fb_url') }}" placeholder="Contoh : https://facebook.com/sampleuser.7">
                    </div>
                    <label class="form-label text-dark">Instagram URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="ig_url" class="form-control" value="{{ old('ig_url') }}" placeholder="Contoh : https://instagram.com/sampleuser.7">
                    </div>
                    <label class="form-label text-dark">Tiktok URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="tk_url" class="form-control" value="{{ old('tk_url') }}" placeholder="Contoh : https://tiktok.com/sampleuser.7">
                    </div>
                    <label class="form-label text-dark">Youtube Channel URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="yt_url" class="form-control" value="{{ old('yt_url') }}" placeholder="Contoh : https://www.youtube.com/@KakaoGames">
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
<script src="{{ asset('adminpage/assets/plugins/custom/flatpickr/id.js') }}"></script>
<script>
    $(document).ready(function () {
        var counter = 1;

        $('.dropify').dropify();
        editorInitiator(['desc'])
        $("#start_time, #end_time").flatpickr({
            locale : 'id',
            enableTime: true,
            time_24hr: true,
            dateFormat: "d-m-Y H:i",
        });

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
            }else{
                alert('Maksimal Banner 5 gambar!')
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

    });
</script>
@endsection
