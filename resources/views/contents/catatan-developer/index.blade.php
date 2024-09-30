@extends('layout.main')

@section('title', 'Developer Note')

@section('css')

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
    <div class="col-lg-8 col-md-12 col-md-12">
        <div class="card blog-edit">
            @role('admin')
            <form id="form" action="{{ route('developer-notes.store') }}" method="POST">
                <div class="card-body">
                    @csrf
                    <input id="id" name="id" type="hidden" value="">
                    <div class="form-group">
                        <label class="form-label text-dark">Notes</label>
                        <textarea id="summernote" name="desc">{{ old('desc') ?: (isset($notes) ? $notes->desc : ' ') }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Save Now</button>
                </div>
            </form>
            @endrole
            @role('member')
            <div class="card-body {{ optional($notes)->desc ? '' : 'text-center'}}">
                {!! optional($notes)->desc ?? '<img src="../../assets/images/note_taking.svg" style = "width:448px" alt=""> <h3 class="mt-3">Its Empty In Here</h3>' !!}
            </div>
            @endrole
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

<!-- FILE UPLOADES JS -->
<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>

<script src="{{ asset('virtual/assets/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.dropify').dropify();
        $('#summernote').summernote();

        // ajaxSelect2Initiator('category', false, `{{ route('meta.blog-category.select2') }}`);

        $('#btn-submit').on('click', function(e) {
            e.preventDefault();
  
            if($('#summernote').summernote('isEmpty'))  alert('Notes content cannot be null!');
            else $('#form').submit();
        })

    });


</script>
@endsection