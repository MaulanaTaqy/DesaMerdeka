@extends('adminpage.layout.main')

@section('title', 'Create Blog - Desa Merdeka')

@section('css')
<link href="{{ asset('adminpage/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Dashboard</li>
            </ol>
        </nav>
    </div>
</div>
@endsection




@section('content')


<div class="row">
    
    @include('panduan.index')

    <div class="col-lg-8 col-md-12 col-md-12">
        <div class="card blog-edit">
            @role('admin')
            <form id="form" action="{{ route('panduan.store') }}" method="POST">
                <div class="card-body">
                    @csrf
                    <input id="id" name="id" type="hidden" value="">
                    <input id="type" name="type" type="hidden" value="aktivasi">
                    <div class="form-group">
                        <label class="form-label text-dark">Content Aktivasi</label>
                        <textarea id="kt_docs_tinymce_hidden"  class="tox-target" name="desc">{{ old('desc') ?: (isset($aktivasi) ? $aktivasi->desc : ' ') }}
                        </textarea>                   
                     </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Save Now</button>
                </div>
            </form>
            @endrole
            @role('member')
            <div class="card-body {{ optional($aktivasi)->desc ? '' : 'text-center'}}">
                {!! optional($aktivasi)->desc ?? '<img src="../../assets/images/note_taking.svg" style = "width:448px" alt=""> <h3 class="mt-3">Its Empty In Here</h3>' !!}
            </div>
            @endrole
        </div>
    </div>
</div> 



@endsection



@section('javascript')
<script src="{{ asset('adminpage/assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
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

        tinymce.init({
            selector: "#kt_docs_tinymce_hidden", height : "480",
    menubar: false,
    toolbar: ["styleselect fontselect fontsizeselect",
        "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
        "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"],
    plugins : "advlist autolink link image lists charmap print preview code"
        });

        function isTinyEditorEmpty() {
            var content = tinymce.get("kt_docs_tinymce_hidden").getContent();
            return !content.trim();
        }

        $('#btn-submit').on('click', function(e) {
            if (isTinyEditorEmpty()) {
                e.preventDefault();
                alert("Activasi content cannot be null!");
            }
     
        });
    });


</script>
@endsection