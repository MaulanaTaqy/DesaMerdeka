@extends('landing-page.layouts.main')

@section('title', 'Member')

@section('css')

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
<div class="rs-inner-blog rs-events-schedule our-event  pt-120 md-pt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 pr-35 md-pr-15">
                <div class="widget-area">
                    <div class="search-widget mb-50">
                        <div class="search-wrap">
                            <form method="get">
                                @csrf
                                <input type="search" placeholder="Cari..." name="search" class="search-input" value="">
                                <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="categories mb-45">
                        <div class="widget-title">
                            <h3 class="title">Tipe</h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('home.member.all', 'all') }}" class="{{ request()->segment(3) == 'all' || request()->segment(3) == null ? 'category-active' : '' }}">All Member</a></li>
                            @foreach($member_type as $data)
                            <li><a href="{{ route('home.member.all', $data->id) }}" class="{{ request()->segment(3) == $data->id ? 'category-active' : '' }}">{{ $data->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 md-mb-50 rs-counter about-style home-style2">
                <h2 align="start">{{ optional($member_type->where('id', request()->segment(3)))->first()->name ?? 'All'}}</h2>
                <div class="">
                    <div class="counter-text plus" style="display: flex; align-items: center;">
                        <h5 align="start" class="title" style="display: flex;margin-top: 24px;">Jumlah :</h5>
                        <div class="fs-4" style="margin-left: 10px; font-weight: bold;color: black;"> {{ $count }}</div>
                    </div>
                </div>
                <div id="rs-team" class="rs-team style3 pt-40 md-pt-80">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="events-schedule-contents tab-content schedule-one">
                                <div class="tab-pane events-shedule-des active show" id="sunday">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            @foreach($member as $data)
                                                <div class="col-lg-4 col-md-6 mb-30">
                                                    <div class="team-item shadow" style="height: 100%;">
                                                        <div class="team-img" style="height: 100%;">
                                                            <a href="{{ route('home.member.detail', $data->id) }}"><img src="{{ asset($data->image ?? 'virtual/assets/img/default.png') }}" alt="No Images Uploaded" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                        </div>
                                                        <div class="team-content">
                                                            <div class="team-info">
                                                                <div class="name" style="font-size: 15px;">
                                                                    <a href="{{ route('home.member.detail', $data->id) }}">{{ limitString($data->name, 20) }}</a>
                                                                </div>
                                                                <span class="post">{{ $data->member_type->name}}</span>
                                                            </div>
                                                            <ul class="social-icon">
                                                                <li><a href="{{ urlCheck($data->fb_url) }}"><i class="fa-brands fa-facebook"></i></a></li>
                                                                <li><a href="{{ urlCheck($data->ig_url) }}"><i class="fa-brands fa-instagram"></i></a></li>
                                                                <li><a href="{{ urlCheck($data->website_url) }}"><i class="fa fa-globe"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{ $member->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="nav eventday-list py-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-outline-secondary btn-lg me-md-2 fw-bold" data-bs-toggle="tab" href="#sunday">1</button>
                                <button class="btn btn-outline-secondary btn-lg me-md-2 fw-bold" data-bs-toggle="tab" href="#monday">2</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection