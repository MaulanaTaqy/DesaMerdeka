@extends('adminpage.layout.main')

@section('title', 'Panduan | App - Desa Merdeka')

@section('css')
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/demo.css') }}">
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
<link href="{{ asset('adminpage/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('toolbar')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Upload Apps</li>
            </ol>
        </nav>
    </div>
</div>
@endsection




@section('content')


<div class="row">
    
    @include('adminpage.content.help.panduan.index')

    <div class="col-lg-8 col-md-12 col-md-12">
        <div class="card blog-edit">
            @role('admin')
            <form id="form" action="{{ route('panduan.store') }}" method="POST">
                <div class="card-body">
                    @csrf
                    <input id="id" name="id" type="hidden" value="{{ isset($app) ? $app->id : '' }}">
                    <input id="type" name="type" type="hidden" value="app">
                    <div class="form-group">
                        <label class="form-label text-dark">Content Upload App</label>
                        <div id="desc" class="min-h-200px mb-2 "  >{!! old('desc') ?: (isset($app) ? $app->desc : ' ') !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Save Now</button>
                </div>
            </form>
            @endrole
            @role('member')
            <div class="card-body {{ optional($app)->desc ? '' : 'text-center'}}">
                {!! optional($app)->desc ?? '<img src="https://plus.unsplash.com/premium_photo-1682309735318-934795084028?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8ZW1vdGljb258ZW58MHx8MHx8fDA%3D" style = "width:448px" alt=""> <h3 class="mt-3">Its Empty In Here</h3>' !!}
            </div>
            @endrole
        </div>
    </div>
</div> 



@endsection



@section('javascript')
<script src="{{ asset('adminpage/assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
<script src="{{ asset('adminpage/assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('adminpage/assets/plugins/custom/dropify/js/dropify.min.js') }}"></script>
<script>


$(document).ready(function () {
        $('.dropify').dropify();
        editorInitiator(['desc'])
});


</script>
@endsection