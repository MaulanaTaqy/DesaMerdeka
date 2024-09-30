@extends('layout.main')

@section('title', 'Edit Member Kemenperin')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Kemenperin</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-8 col-md-8">
        <div class="card blog-edit">
            <form id="form" action="{{ route('kemenperin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <input id="id" name="id" type="hidden" value="{{ $admin->id }}">
                    <div class="form-group">
                        <label class="form-label text-dark">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $admin->name }}" required>
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

<script>
    $(document).ready(function () {
        
    });
</script>
@endsection
