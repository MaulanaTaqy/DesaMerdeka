@extends('adminpage.layout.main')

@section('title', 'Homepage About Us')

@section('css')
    
<link href="{{ asset('adminpage/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('adminpage/assets/plugins/custom/dropify/css/dropify.min.css') }}">
<style>
    
</style>
@endsection

@section('toolbar')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Homepage About Us</h1>
        <!--end::Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-400 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">Homepage About Us</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
@endsection

@section('content')

<div class="row g-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Tables Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">About Us</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form"  action="{{ route('home-about.store') }}" method="POST">
                @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <div id="desc" class="min-h-200px mb-2">
                        {!! old('desc') ?: (isset($about) ? $about->desc : ' ') !!}
                    </div>
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

@endsection

@section('modal')
@endsection

@section('javascript')
<script>
    $(document).ready(function () {
        editorInitiator(['desc'])
    });
</script>
@endsection