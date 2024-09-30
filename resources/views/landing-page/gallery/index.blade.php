@extends('landing-page.layouts.main')

@section('title', 'Gallery')

@section('css')
<style>
    @media only screen and (max-width: 480px){
        .our-event {
            margin-top: 0px !important;
        }
    }
    .services-img{
        height: 250px !important;
        background-color: white !important;
    }

    .rs-services.style2 .services-item .services-img img {
        width: 100% !important;
        height: 100% !important;
        transition: all 0.5s;
        object-fit: cover !important;
    }

    .rs-services.style2 .services-item .services-text {
    padding: 24px 30px 34px 30px;
    border-radius: 3px 3px 3px 3px;
    box-shadow: 0px 6px 25px 0px #eee;
    }

    .sub-detail {
        position: absolute;
        bottom: 20px;
    }
</style>
@endsection

@section('content')
<!--Full width header End-->
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
<!-- Banner Section Start -->
<div class="rs-inner-blog rs-events-schedule our-event  pt-120 md-pt-80 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 pr-35 md-pr-15">
                <div class="widget-area">
                    <div class="search-widget mb-50">
                        <div class="search-wrap">
                            <input type="search" placeholder="Cari..." name="s" class="search-input" value="">
                            <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                        </div>
                    </div>
                    <div class="categories mb-45">
                        <div class="widget-title">
                            <h3 class="title">Album Category</h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('home.gallery.index', 'all') }}" class="{{ request()->segment(2) == 'all' ? 'category-active' : '' }}">All</a></li>
                            @foreach($categories as $data)
                            <li><a href="{{ route('home.gallery.index', $data->id) }}" class="{{ request()->segment(2) == $data->id ? 'category-active' : '' }}">{{$data->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 md-mb-50">
                <h2 align="start" class="pt-35">Album Gallery</h2>
                <div class="rs-services style2 pt-40 md-pt-80">
                    <div class="container">
                        <div class="row">
                            <div class="events-schedule-contents tab-content schedule-one">
                                <div class="tab-pane events-shedule-des active show" id="sunday">
                                    <div class="row mb-5">
                                        @foreach ($gallery as $data)
                                        <div class="col-lg-6 col-md-6 md-mb-30 mt-30">
                                            <div class="services-item" style="position: relative">
                                                <div class="services-img">
                                                    <img src="{{ asset($data->image) }}" alt="images">
                                                </div>
                                                <div class="services-text" style="height:280px;">
                                                    <h2 class="title text-limit">{{ $data->title }}</h2>
                                                    <div class="sub-detail">
                                                        <div class="services-part mb-1">
                                                            <div class="services-icon">
                                                                <img src="{{asset('assets/images/img-event/detail/kalender.png')}}" alt="">
                                                            </div>
                                                            <p class="services-txt">{{ $data->date }}</p>
                                                        </div>
                                                        <div class="services-part mb-1">
                                                            <div class="services-icon">
                                                                <img src="{{asset('assets/')}}/images/services/style1/icons/pin.png" alt="">

                                                            </div>
                                                            <p class="services-txt text-limit-1"> {{ $data->location }}</p>
                                                        </div>
                                                        <div class="services-part">
                                                            <div class="services-icon">
                                                                <img src="{{asset('assets/')}}/images/event/icons/4.png" alt="">
                                                            </div>
                                                            <p class="services-txt">
                                                                @foreach($data->category as $item)
                                                                {{ $item->meta_name->name }}, 
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                        <div class="blog-button service mt-3">
                                                            <a href="{{ route('home.gallery.detail', $data->id) }}">
                                                                <span class="btn-txt">Views </span>
                                                                <i class="fa fa fa-chevron-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    {{ $gallery->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main content End -->



<!-- start scrollUp  -->
<div id="scrollUp" class="orange-color">
    <i class="fa fa-angle-up"></i>
</div>
<!-- End scrollUp  -->

@endsection