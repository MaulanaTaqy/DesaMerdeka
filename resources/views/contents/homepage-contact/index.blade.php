@extends('layout.main')

@section('title', 'Management Landing Page')

@section('css')
{{-- Custom CSS --}}
<style>
    .main-profile-overview .main-img-user {
        width: 100%;
        height: 100%;
        max-width: 300px;
        max-height: 100px;
    }
</style>
@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Home Page & Contact</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<!-- row -->
<form class="form-horizontal" action="{{ route('home-contact.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row row-sm">
        <!-- Col -->
        <div class="col-lg-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="ps-0">
                            <div class="mb-4 main-content-label">Update Header Content</div>
                            <div class="main-profile-overview text-center">
                                <div class="main-img-user profile-user" style="object-fit: scale-down">
                                    <img alt="" style="max-height: 130px !important;" src="{{ asset($appConfig->logo_app ?? 'virtual/assets/img/default.png')}}">
                                </div>
                                <div class="text-center mb-4">
                                    <div>
                                        <h5 class="main-profile-name"></h5>
                                    </div>
                                </div>
                                <label for="file-upload">Image logo App :
                                    <input type="file" class="form-control" name="logo_app" placeholder="First Name" value="" accept="image/*">
                                    <small class="text-danger">recomended image svg, 600x600 / 600x200</small> 
                                </label>
                                    @error('image') 
                                    <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                <input type="text" class="form-control mt-2" name="link_vid_banner_yt" placeholder="Url Link Untuk Home Page Banner" value="{{ old('link_vid_banner_yt', $appConfig->url_vidio_banner_yt ?? '')}}">
                                <input type="text" class="form-control mt-2" name="title" placeholder="Title" value="{{ old('title' , $appConfig->title ?? '')}}">
                                <input type="text" class="form-control mt-2" name="sub_title" placeholder="Subtitle" value="{{ old('title' , $appConfig->sub_title ?? '')}}">
                                <textarea class="form-control mt-2" name="desc" id="" placeholder="Desc">@isset($appConfig->desc){{ old('desc', $appConfig->desc) }}@else{{ old('desc') }}@endisset</textarea>
                                {{-- <input type="text" class="form-control mt-2" name="username"  placeholder="Username" value="{{$user->username}}"> --}}
                            </div>
                    </div>
                </div>
            </div>

            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="ps-0">
                            <div class="mb-4 main-content-label">Update Footer Content</div>
                            <input type="hidden" name="type" value="profile" />
                            <div class="main-profile-social-list">
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon icon-map"></i>
                                    </div>
                                    <div class="media-body">
                                        <textarea class="form-control mt-2" name="address" id="" placeholder="Address">{{  old('address') ?? optional($appConfig)->address ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon zmdi zmdi-email"></i>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control mt-2" name="email" placeholder="Email" value="{{ old('email' , $appConfig->email ?? '')}}">
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon zmdi zmdi-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control mt-2" name="phone" placeholder="Phone" value="{{ old('phone' , $appConfig->phone ?? '') }}">
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon zmdi zmdi-facebook"></i>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control mt-2" name="fb_url" placeholder="FB Url" value="{{ old('fb_url' , $appConfig->fb_url ?? '')}}">
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon zmdi zmdi-instagram"></i>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control mt-2" name="ig_url" placeholder="IG Url" value="{{ old('ig_url' , $appConfig->ig_url ?? '') }}">
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon zmdi zmdi-youtube"></i>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control mt-2" name="yt_url" placeholder="YT Url" value="{{ old('yt_url', $appConfig->yt_url ?? '') }}">
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon zmdi zmdi-twitter"></i>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control mt-2" name="twt_url" placeholder="TWT Url" value="{{ old('twt_url', $appConfig->twt_url ?? '') }}">
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon zmdi zmdi-tiktok"></i>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control mt-2" name="tk_url" placeholder="TT Url" value="{{ old('tk_url', $appConfig->tk_url ?? '') }}">
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="zmdi zmdi-google-maps"></i>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control mt-2" name="gmap_url" placeholder="GMAP Url" value="{{ old('gmap_url', $appConfig->gmap_url ?? '') }}">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="ps-0">
                            <div class="mb-4 main-content-label">Update Content</div>
                            <input type="hidden" name="type" value="profile" />
                            <div class="main-profile-overview text-center">
                                <div class="main-img-user profile-user" style="object-fit: scale-down">
                                    <img alt="" style="max-height: 130px; width: auto !important;" src="{{ asset($appConfig->short_about_image ?? 'virtual/assets/img/default.png') }}"></div>
                                <div class="text-center mb-4">
                                    <div>
                                        <h5 class="main-profile-name"></h5>
                                    </div>
                                </div>
                                <label for="file-upload">Image about short :
                                <input type="file" class="form-control" name="short_about_image" placeholder="First Name" value="" accept="image/*">
                                <small class="text-danger">recomended image svg, 1200x600 / 600x300</small> 
                            </div>
                            </label>
                                @error('image')
                                <div class="text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            <input type="text" class="form-control mt-2 mb-2" name="short_about_title" placeholder="short about title" value="{{ old('short_about_title' , $appConfig->short_about_title ?? '')}}">
                            <textarea class="form-control mt-2" id="summernote" name="short_about_desc" >{{ old('short_about_desc' , $appConfig->short_about_desc ?? '')  }}</textarea>
                    </div><!-- main-profile-contact-list -->

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Create Homepage & Contact</button>
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
