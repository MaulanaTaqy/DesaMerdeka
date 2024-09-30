@extends('adminpage.layout.main')

@section('title', 'Edit Produk')

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
        <li class="breadcrumb-item text-muted">Edit Data</li>
    </ul>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-md-12">
        <div class="card blog-edit">
            <form id="form" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <label class="form-label text-dark">Nama Produk</label>
                    <div class="input-group mb-5">
                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $product->title }}" required>
                    </div>
                    
                    <label class="form-label text-dark">Foto Katalog</label>
                    <button type="button" id="btn-add-upload" class="btn btn-primary mb-2">Tambah Foto Produk</button>
                    <div class="form-group mb-5">
                        <div class="row justify-content-center btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex" id="initiator">
                            @foreach ($product->images as $item)
                            <div class="col-3 mt-3">
                                <div>
                                    <input id="file-upload" class="dropify" type="file" name="product_image[]" data-id="{{ $item->id }}" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png webp svg" data-default-file="{{ asset($item->image) }}"/>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <label class="form-label text-dark">Banner</label>
                    <div class="input-group mb-5 ">
                        <input id="file-upload" class="dropify" type="file" name="banner_image" data-allowed-file-extensions="jpeg jpg png webp svg" data-default-file="{{ asset($product->image) }}"/>
                    </div>

                    <label class="form-label text-dark">Thumbnail</label>
                    <div class="input-group mb-5 ">
                        <input id="file-upload" class="dropify" type="file" name="image" data-allowed-file-extensions="jpeg jpg png webp svg" data-default-file="{{ asset($product->banner_image) }}"/>
                    </div>


                    <div class="form-label">
                        <label class="form-label text-dark">Kategori</label>
                        <select class="form-select form-select-solid" id="category"  data-control="select2" data-placeholder="Select category" multiple="multiple" name="category_id[]">
                            @foreach ($product->category as $item)
                                <option value="{{ $item->meta_name->id }}" selected>{{ $item->meta_name->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Deskripsi Produk</label>
                        <div id="desc" class="min-h-200px mb-2">{!! $product->desc !!}</div>
                    </div>

                    <label class="form-label text-dark">Market Store URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="market_store_url" class="form-control" value="{{ old('market_store_url') ?? $product->market_store_url }}">
                    </div>
                    <label class="form-label text-dark">Facebook URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="fb_url" class="form-control" value="{{ old('fb_url') ?? $product->fb_url }}">
                    </div>
                    <label class="form-label text-dark">Instagram URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="ig_url" class="form-control" value="{{ old('ig_url') ?? $product->ig_url }}">
                    </div>
                    <label class="form-label text-dark">Youtube Channel URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="yt_url" class="form-control" value="{{ old('yt_url')  ?? $product->yt_url }}">
                    </div>
                    <label class="form-label text-dark">Tiktok URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="tk_url" class="form-control" value="{{ old('tk_url')  ?? $product->tk_url }}">
                    </div>
                    <label class="form-label text-dark">Video Youtube URL</label>
                    <div class="input-group mb-5">
                        <input type="text" name="video" class="form-control" value="{{ old('video')  ?? $product->video }}">
                    </div>
                    <label class="form-label text-dark">Thumbnail Video</label>
                    <div class="input-group mb-5 ">
                        <input class="dropify" type="file" name="video_banner" data-allowed-file-extensions="jpeg jpg png webp svg" data-default-file="{{ asset($product->video_banner) }}" />
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
