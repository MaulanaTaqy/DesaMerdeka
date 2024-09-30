@extends('landing-page.layouts.main')

@section('title', 'Gallery')

@section('css')
<style>
    .services-img {
        display: flex;
        align-items: center;
        height: 250px;
    }
</style>
@endsection

@section('content')
<!--Full width header End-->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner" style="height: 100%;transition: transform 0.5s ease, opacity .1s ease-out;">
        <div class="carousel-item active">
            <img src="{{asset('assets/images/img-gallery/slider/1.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/images/img-gallery/slider/2.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/images/img-gallery/slider/3.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
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
                            <li><a href="{{ route('home.member.gallery.index', ['id' => 'all', 'member_id' => request()->segment(4)]) }}" class="{{ request()->segment(2) == 'all' ? 'category-active' : '' }}">All</a></li>
                            @foreach($categories as $data)
                            <li><a href="{{ route('home.member.gallery.index', ['id' => $data->id, 'member_id' => request()->segment(4)]) }}" class="{{ request()->segment(2) == $data->id ? 'category-active' : '' }}">{{$data->name}}</a></li>
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
                                            <div class="services-item">
                                                <div class="services-img">
                                                    <img src="{{ asset($data->image) }}" alt="images">
                                                </div>
                                                <div class="services-text">
                                                    <h2 class="title text-limit">{{ $data->title }}</h2>
                                                    <div class="services-part mb-1">
                                                        <div class="services-icon">
                                                            <img src="{{asset('assets/images/img-event/detail/kalender.png')}}" alt="">
                                                        </div>
                                                        <p class="services-txt">{{ $data->date }}</p>
                                                    </div>
                                                    <div class="services-part">
                                                        <div class="services-icon">
                                                            <img src="{{asset('assets/')}}/images/services/style1/icons/pin.png" alt="">

                                                        </div>
                                                        <p class="services-txt"> {{ $data->location }}</p>
                                                    </div>
                                                    <div class="blog-button service mt-3">
                                                        <a href="{{ route('home.member.gallery.detail', $data->id) }}">
                                                            <span class="btn-txt">Views </span>
                                                            <i class="fa fa fa-chevron-right"></i>
                                                        </a>
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