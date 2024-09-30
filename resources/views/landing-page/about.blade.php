@extends('landing-page.layouts.main')

@section('title', 'About')

@section('css')

@endsection

@section('content')
<!-- Breadcrumbs Start -->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner" style="height: 100%;transition: transform 0.5s ease, opacity 1s ease-out;">
        @foreach($banner as $key => $data)
        <div class="carousel-item @if($key==0) active @endif">
            <img src="{{asset($data->image)}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
      @endforeach
      @if(count($banner) == 0)
        <div class="carousel-item active">
            <img src="{{asset('assets/images/img-tekno/slider/slide1-tp.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
      @endif
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Breadcrumbs End -->

<!-- About Section Start -->
<div class="rs-about style1 pt-120 pb-120 md-pt-80 md-pb-75">
    <div class="container">
        {!! $app->desc ?? '' !!}
        {{-- <div class="row y-middle">
            <div class="images-part">
                <div style="max-width: 300px;" class="mb-4 mx-auto">
                    <img src="{{ asset($app->short_about_image) }}" alt="Images">
                </div>
            </div>
            <h2 class="text-center">{{$app->short_about_title}}</h2>
        </div>
        <div class="col-sm-12">
            {!!$app->short_about_desc!!}
        </div> --}}

    </div>
    </main>
</div>
<!-- About Section End -->

@endsection