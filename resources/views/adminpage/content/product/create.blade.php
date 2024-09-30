@extends('adminpage.layout.main')

@section('title', 'Buat Produk')

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
            <a href="{{ route('product.index') }}" class="text-muted text-hover-primary">Produk</a>
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
            <form id="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <label class="form-label text-dark">Nama Produk</label>
                    <div class="input-group mb-5">
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>
                    
                    <label class="form-label text-dark">Foto Katalog</label>
                    <button type="button" id="btn-add-upload" class="btn btn-primary mb-2">Tambah Foto Produk</button>
                    <div class="form-group mb-5 ">
                        <div class="row justify-content-center btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex" id="initiator">
                            <div class="col-3 mt-3">
                                <div>
                                    <input id="file-upload" class="dropify" type="file" name="product_image[]" data-allowed-file-extensions="jpeg jpg png webp svg" data-max-file-size="2M"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <label class="form-label text-dark">Banner</label>
                    <div class="input-group mb-5 ">
                        <input id="file-upload-2" class="dropify" type="file" name="banner_image" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" />
                    </div>

                    <label class="form-label text-dark">Thumbnail</label>
                    <div class="input-group mb-5 ">
                        <input id="file-upload-2" class="dropify" type="file" name="image" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" />
                    </div>


                    <div class="form-label">
                        <label class="form-label text-dark">Kategori</label>
                        <select class="form-select form-select-solid" id="category"  data-control="select2" data-placeholder="Select category" multiple="multiple" name="category_id[]">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Deskripsi Produk</label>
                        <div id="desc" class="min-h-200px mb-2"></div>
                    </div>

                    <label class="form-label text-dark">Market Store URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="market_store_url" class="form-control" value="{{ old('market_store_url') }}">
                    </div>
                    <label class="form-label text-dark">Facebook URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="fb_url" class="form-control" value="{{ old('fb_url') }}" placeholder="Contoh : https://facebook.com/sampleuser.7">
                    </div>
                    <label class="form-label text-dark">Instagram URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="ig_url" class="form-control" value="{{ old('ig_url') }}" placeholder="Contoh : https://instagram.com/sampleuser.7">
                    </div>
                    <label class="form-label text-dark">Youtube Channel URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="yt_url" class="form-control" value="{{ old('yt_url') }}" placeholder="Contoh : https://www.youtube.com/@KakaoGames">
                    </div>
                    <label class="form-label text-dark">Tiktok URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="tk_url" class="form-control" value="{{ old('tk_url') }}" placeholder="Contoh : https://tiktok.com/sampleuser.7">
                    </div>
                    <label class="form-label text-dark">Video Youtube URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="video" class="form-control" value="{{ old('video') }}" placeholder="Contoh : https://www.youtube.com/watch?v=8bQp-iDT64o">
                    </div>
                    <label class="form-label text-dark">Thumbnail Video</label>
                    <div class="input-group mb-5 ">
                        <input class="dropify" type="file" name="video_banner" data-allowed-file-extensions="jpeg jpg png webp svg" />
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
<script>
    $(document).ready(function () {
        
        $('.dropify').dropify();
        editorInitiator(['desc'])

        ajaxSelect2Initiator('category', false, `{{ route('meta.product-category.select2') }}`);

        $('#btn-add-upload').on('click', function(e) {
            $('#initiator').append(`
                <div class="col-3 mt-3">
                    <input class="dropify" type="file" name="product_image[]" data-allowed-file-extensions="jpeg jpg png webp svg" data-max-file-size="2M"/>
                </div>
            `);

            $('.dropify').dropify();
            
        })

    });
</script>
@endsection
