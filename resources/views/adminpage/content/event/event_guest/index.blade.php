@extends('adminpage.layout.main')

@section('title', 'Event Guest')

@section('css')

<link rel="stylesheet" href="{{ asset('adminpage/partials/css/style.min.css') }}">

@endsection

@section('toolbar')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
        Event Guest
    </h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-400 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">List Event</li>
    </ul>
</div>
@endsection

@section('content')

<div class="row g-5 g-xl-8">
    @foreach ( $guestEvent as $event)
    <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="card card-xl-stretch mb-xl-8">
            <div class="card-body py-3">
                <img style="width: 100%; height: 300px;" src="{{ asset($event->event->image) }}" alt="">
                <br><br>
                <h4 class="card-title mb-3">{{ $event->event->title }}</h4>

                <span class="text-limit-x mb-3">{{ limitString($event->event->desc, 200) }}</span>
                <hr>
                <a class="btn btn-primary btn-sm" style="width: 100%;" href="{{ url('/home/detail_event/' . $event->event->id . '/detail') }}" target="_blank">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
