@extends('layout.main')

@section('title', 'Management Event')

@section('css')
<style>
    .card-img-top {
        height: 300px !important;
        object-fit: cover !important;
    }
</style>
@endsection

@section('breadcumb')
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> List Event</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row row-sm">
    @foreach ( $guestEvent as $event)
    <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="card">
            <img class="card-img-top w-100" src="{{ asset($event->event->image) }}" alt="">
            <div class="card-body">
                <h4 class="card-title mb-3">{{ $event->event->title }}</h4>
                {{-- <p class="text-limit-x" style="--line:3"> <span> {!! $event->event->desc !!}</span></p> --}}
                <span style="--line:3" class="text-limit-x mb-3">{{ strip_tags($event->event->desc) }}</span>
                <a class="btn btn-primary" href="{{ url('/home/detail_event/' . $event->event->id . '/detail') }}" target="_blank">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection



@section('script')
<!-- DATA TABLE JS-->
<script src="{{ asset('virtual/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

<script src="{{ asset('virtual/assets/js/script.js') }}"></script>
@endsection