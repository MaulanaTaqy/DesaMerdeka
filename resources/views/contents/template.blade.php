@extends('layout.main')

@section('title', 'Dashboard')

@section('css')

@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome {{ Auth::user()->{getRoleName()}->name }}!</h4>
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
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <!--div-->
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Form Input &amp; Textarea
                </div>
                <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                <div class="row row-sm">
                    <div class="col-lg">
                        <input class="form-control" placeholder="Input box" type="text">
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input class="form-control" placeholder="Input box (readonly)" readonly type="text">
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input class="form-control" disabled placeholder="Input box (disabled)" type="text">
                    </div>
                </div>
                <div class="row row-sm mg-t-20">
                    <div class="col-lg">
                        <textarea class="form-control" placeholder="Textarea" rows="3"></textarea>
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <textarea class="form-control" placeholder="Textarea (readonly)" readonly rows="3"></textarea>
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <textarea class="form-control" disabled placeholder="Texarea (disabled)" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>

@endsection



@section('script')
<script src="{{ asset('virtual/assets/js/script.js') }}"></script>
@endsection