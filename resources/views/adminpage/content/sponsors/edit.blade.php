@extends('adminpage.layout.main')

@section('title', 'Edit Partner')

@section('css')
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/demo.css') }}">
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
@endsection

@section('toolbar')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Partner</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-8 col-md-8">
        <div class="card blog-edit">
            <form id="form" action="{{ route('sponsors.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <input id="id" name="id" type="hidden" value="{{ $sponsor->id }}">
                    <div class="form-group">
                        <label class="form-label text-dark">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $sponsor->name }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Email</label>
                        <input name="email" value="{{ old("email") ?? $sponsor->email }}" type="email" class="form-control" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label text-dark">Phone</label>
                        <input name="phone" value="{{ old("phone") ?? $sponsor->phone }}" type="text" class="form-control" placeholder="Phone" pattern="[0-9]+" title="Please enter only numbers" required>
                    </div>                    
                    <div class="form-group">
                        <label class="form-label text-dark">Description</label>
                        <div id="desc" class="min-h-200px mb-2" name="desc" >{!! $sponsor->desc !!}</div>
                    </div>
                    <div class="p-4 border mb-4 form-group">
                        <label class="form-label text-dark">Image</label>
                        <div>
                            <input id="file-upload" class="dropify" type="file" name="image" data-max-file-size="2M" data-default-file="{{ asset($sponsor->image) }}" data-allowed-file-extensions="jpeg jpg png webp svg" />
                        </div>
                    </div>
                    <small class="text-danger">Recomended image svg, 512 x 512</small>
                </div>
                <div class="card-footer">
                    <button id="btn-submit" class="btn btn-primary float-end my-2">Publish Now</button>
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
    });
</script>
@endsection
