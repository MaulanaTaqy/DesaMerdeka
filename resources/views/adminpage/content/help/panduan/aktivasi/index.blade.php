@extends('adminpage.layout.main')

@section('title', 'Panduan | Activation Account - Desa Merdeka')

@section('css')
<link href="{{ asset('adminpage/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/demo.css') }}">
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
@endsection

@section('toolbar')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Activasi Account</li>
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
                    <input id="id" name="id" type="hidden" value="{{ isset($aktivasi) ? $aktivasi->id : '' }}">
                    <input id="type" name="type" type="hidden" value="aktivasi">
                    <div class="form-group">
                        <label class="form-label text-dark">Content Aktivasi</label>
                        <div id="desc" class="min-h-200px mb-2" >{!! old('desc') ?: (isset($aktivasi) ? $aktivasi->desc : ' ') !!} </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Save Now</button>
                </div>
            </form>
            
            @endrole
            @role('member')
            <div class="card-body {{ optional($aktivasi)->desc ? '' : 'text-center'}}">
                {!! optional($aktivasi)->desc ?? '<img src="https://plus.unsplash.com/premium_photo-1682309735318-934795084028?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8ZW1vdGljb258ZW58MHx8MHx8fDA%3D" style = "width:448px" alt=""> <h3 class="mt-3">Its Empty In Here</h3>' !!}
            </div>
            @endrole
        </div>
    </div>
</div> 



@endsection



@section('javascript')
<script src="{{ asset('adminpage/assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('adminpage/assets/plugins/custom/dropify/js/dropify.min.js') }}"></script>
<script>
    // $(document).ready(function () {
    //     $('.dropify').dropify();
    //     $('#summernote').summernote();

    //     // ajaxSelect2Initiator('category', false, `{{ route('meta.blog-category.select2') }}`);

    //     $('#btn-submit').on('click', function(e) {
    //         e.preventDefault();
  
    //         if($('#summernote').summernote('isEmpty'))  alert('Activasi content cannot be null!');
    //         else $('#form').submit();
    //     })

    // });

    $(document).ready(function () {
        $('.dropify').dropify();
        editorInitiator(['desc'])
    });


</script>
@endsection