@extends('landing-page.layouts.main')

@section('title', 'Member - Detail')

@section('css')
<style>
    .services-content {
        height: 150px;
    }

    .rs-count {
        margin-left: auto !important;
    }

    .title-services {
        color: #FA0368;
    }

    .blog-item img {
        height: 15rem;
        object-fit: cover;
    }

    .images-wrap{
        height: 100% !important;
        width: 250px !important;
        display: flex !important;
        align-items: center !important;
        background-color: white !important;
        margin: auto;
    }

    .services-img{
        height: 250px !important;
        /* display: flex !important; */
        /* align-items: center !important; */
        background-color: white !important;
    }

    .rs-team.style2 .team-item .team-inner-wrap .images-wrap a img {
        border-radius: 0 !important;
    }

    .rs-services.style2 .services-item .services-img img {
        width: 100% !important;
        height: 100% !important;
        transition: all 0.5s;
        object-fit: fill !important;
    }
    
    .sub-detail {
        position: absolute;
        bottom: 10px;
    }

    .owl-carousel .owl-stage {
        display: flex;
        align-items: center;
        height: 380px !important;
    }

    .counter-icon{ font-size: 100px; }
    .counter-icon a{ color: white; }

    .img-gallery {
        height: 225px;
        width: 367px;
        object-fit: cover;
    }

    .img-UMKM {
        height: 165px;
        width: 100%;
        object-fit: cover;
        background: white;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 15px
    }

    @media only screen and (max-width: 480px){
        .img-UMKM {
            height: auto;
        }
    }

    .contact-map-middle{
        /* position: relative; */
        width: 100%;
        top: 50px;
    }

    .mini-map-cover{
        height: 520px;
        width: 100%;
        object-fit: cover;
    }

    .img-UMKM:hover, .partner-img:hover {
        -ms-transform: scale(1.2);
        /* IE 9 */
        -webkit-transform: scale(1.2);
        /* Safari 3-8 */
        transform: scale(1.2);
    }
</style>
@endsection

@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner" style="height: 100%;transition: transform 2s ease, opacity .2s ease-out;">
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

<div id="rs-about" class="rs-about style1 pt-120 md-pt-80">
    <div class="container mb-4 position-relative">
        <div class="row">
            <div class="col-lg-6 pr-15 md-pr-15 md-mb-50">
                <div class="images-part">
                    <img src="{{asset($member->image)}}" alt="Images" width="600" height="600">
                </div>
            </div>
            <div class="col-lg-6 pl-45 md-pl-15">
                <div class="sec-title">
                    <span class="sub-text">Profile</span>
                    <h2 class="title pb-22">
                        {{ $member->name }}
                    </h2>
                    <div class="heading-border-line left-style"></div>
                    <span style="--line:15" class="desc margin-0 pt-40 text-limit-x">
                        {!! $member->desc !!}
                    </span>
                    {{-- {!! Str::limit($event->event->desc, 100, '...') !!} --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- produk --}}
<div class="rs-team style2 bg12 pt-110 pb-50 md-pt-70" id="app" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/11/bg4.jpg');">
    <div class="container">
        <div class="sec-title text-center mb-60 md-mb-40">
            <span class="sub-text">Our</span>
            <h2 class="title black-color pb-35">
                Product
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row justify-content-center">
            <div class="container" id="berita">
                <div class="rs-carousel owl-carousel" data-loop="false" data-items="3" data-margin="50" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="3" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="3" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true">
                    @foreach ($product as $data)
                    {{-- <div class="col-lg-4 col-md-6 mb-20"> --}}
                        <div class="team-item">
                            <div class="team-inner-wrap">
                                <div class="images-wrap" style="border-radius: 3px !important; width: 100% !important; height: 256px !important;">
                                    <a href="{{ route('app.detail', $data->id) }}"><img src="{{ asset($data->image ?? 'virtual/assets/img/default.png') }}" alt="Team"></a>
                                </div>
                                <div class="team-content">
                                    <div class="rs-arrow">
                                        <div class="curve"></div>
                                        <div class="point"></div>
                                    </div>
                                    <h3 class="title-name text-limit-1"><a href="{{ route('app.detail', $data->id) }}" style="color: black;">{{ $data->title }}</a></h3>
                                    <div class="team-title">{{ $data->member->name }}</div>
                                    <ul class="social-icons">
                                        <li><a href="{{ urlCheck($data->fb_url) }}"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                                        <li><a href="{{ urlCheck($data->ig_url) }}"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                                        <li><a href="{{ urlCheck($data->yt_url) }}"><i class="fa-brands fa-youtube" style="color: black;"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                    @endforeach
                </div> 
            </div>
        </div>       
    </div>
        <div class="col-lg-12 text-center mt-70 md-mt-50">
            <div class="btn-part">
                <a class="readon btn-text ticket" href="{{ route('app.created-by', $member->id) }}">
                    <span>View Product All</span>
                </a>
            </div>
        </div>
    </div>
</div>
{{-- end produk --}}

<div class="rs-services style3 bg11 pt-110 pb-120 md-pt-75 md-pb-80" id="why" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/10/bg.jpg')">
    <div class="container">
        <div class="sec-title text-center mb-70 md-mb-50">
            <span class="sub-text">Layanan and Solusi</span>
            <h2 class="title pb-30">
                Layanan & Solusi
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row">
            @foreach($service as $data)
            <div class="col-lg-3 col-md-6 mb-20">
                <div class="services-item" data-aos="fade-right" data-aos-delay="300">
                    <div class="services-icon">
                        <img src="{{ asset($data->image ? $data->image : 'assets/images/services/style2/1.png') }}" alt="">
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="title" style="font-size: 14px;line-height: 26px;">{{$data->title}}</h3>
                        </div>
                        <div class="services-desc" style="position: absolute;width: 65%;bottom: 10px;">
                            <span style="--line:5; font-size: 12px;" class="services-txt text-limit-x">{!! $data->content !!}</span>
                        </div>
                        <div class="serial-number">
                            {{ sprintf("%02d", $loop->iteration) }}
                        </div>
                    </div>                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- @if($member->member_type->name == 'Desa') --}}
@if($member->member_type->name == 'Desa')
<div class="rs-counter home-style2 counter-member bg20 md-pb-80 " style="height:auto !important; background-image: url('{{ asset('assets/images/counter/counterbg.png') }}');">
    <div class="container">
        <div class="col-lg-12" style="color: white">
            <div class="row">
                <div class="col-lg-2 offset-1">
                    <div class="counter-list text-center">
                        <div class="counter-icon">
                            <a href="#">
                                <span class="bi bi-rocket-takeoff-fill" alt="Counter"></span>
                            </a>
                        </div>
                        <div class="counter-text plus">
                            <div class="rs-count">{{ $counter['UMKM'] }}</div>
                            <h4 class="title">UMKM COMPANY</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="counter-list text-center">
                        <div class="counter-icon">
                            <a href="#">
                                <span class="bi bi-file-ruled" alt="Counter"></span>
                            </a>
                        </div>
                        <div class="counter-text plus">
                            <div class="rs-count">{{ $counter['service'] }}</div>
                            <h4 class="title">LAYANAN DAN SOLUSI</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="counter-list text-center">
                        <div class="counter-icon">
                            <a href="#">
                                <span class="bi bi-file-earmark-text" alt="Counter"></span>
                            </a>
                        </div>
                        <div class="counter-text plus">
                            <div class="rs-count">{{ $counter['product'] }}</div>
                            <h4 class="title">INTELECTUAL PROPERTY & PRODUCT</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="counter-list text-center">
                    <div class="counter-icon">
                            <a href="#">
                                <span class="bi bi-buildings" alt="Counter"></span>
                            </a>
                        </div>
                        <div class="counter-text plus">
                            <div class="rs-count">{{ $counter['news'] }}</div>
                            <h4 class="title">UPDATE NEWS DAN ARTIKEL</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="counter-list text-center">
                        <div class="counter-icon">
                            <a href="#">
                                <span class="bi bi-calendar-check" alt="Counter"></span>
                            </a>
                        </div>
                        <div class="counter-text plus">
                            <div class="rs-count">{{ $counter['event'] }}</div>
                            <h4 class="title">EVENT & PROGRAM</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Services Section End -->
<br>
<div class="rs-services style5 bg20 pt-10 pb-120 md-pt-75 md-pb-80" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/10/bg.jpg')">
    <div class="container">
        <div class="sec-title text-center mb-50">
            <span class="sub-text">- Team ICT -</span>
            <h2 class="title pb-25">
                <span class="event-style">Our </span> Team
            </h2>
            <div class="container" style="width: 100%;">
                <P class="text-center">We have team who can solve all our problems</P>
            </div>
        </div>
        <div class="rs-carousel owl-carousel rs-counter about-style" 
            data-count="{{ $team->count() }}" 
            data-loop="true"
            data-items="3"
            data-margin="30" 
            data-autoplay="true" 
            data-hoverpause="true" 
            data-autoplay-timeout="3000" 
            data-smart-speed="800" 
            data-dots="true" 
            data-nav="false" 
            data-nav-speed="false" 
            data-center-mode="true" 
            data-mobile-device="1" 
            data-mobile-device-nav="false" 
            data-mobile-device-dots="true" 
            data-ipad-device="2" 
            data-ipad-device-nav="false" 
            data-ipad-device-dots="true" 
            data-ipad-device2="2" 
            data-ipad-device-nav2="false" 
            data-ipad-device-dots2="true" 
            data-md-device="3" 
            data-md-device-nav="false" 
            data-md-device-dots="true"
        >
            @foreach ($team as $item)
            <div class="services-slider">
                <div class="rs-team style6">
                    <div class="team-item" style="width: 21rem;">
                        <div class="team-inner-wrap">
                            <div class="images-wrap">
                                <img src="{{ asset($item->image) }}" alt="Team">
                            </div>
                            <div class="team-content">
                                <h3 class="title-name"><a href="speaker-single.html">{{ $item->name }}</a></h3>
                                <div class="team-title">{{ $item->position }}</div>
                                <ul class="social-icons">
                                    <li><a href="{{ urlCheck($item->fb_url) }}"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li><a href="{{ urlCheck($item->ig_url) }}"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="{{ urlCheck($item->yt_url) }}"><i class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end -->
<br>
<br>

{{-- @if ($member->member_type->name == 'Desa') --}}
@if ($member->member_type->name == 'Desa')
<div id="rs-our-sponsor" class="rs-our-sponsor sponsor-home-style5 gray-bg5 pt-10 pb-120 md-pt-70 md-pb-80">
    <div class="container">
        <div class="all-grid-sponsors">

            <div style="background: #9694957A;border-radius: 31px;" class="sec-title text-center my-5 py-3">
                <h2 class="title title3">
                    UMKM {{ $member->name }} 
                </h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($umkm as $item)
                    @if ($item->user->hasPermissionTo('approved'))
                        <div class="col-md-2 col-sm-auto mt-5" data-aos="zoom-in" data-aos-delay="100">
                            <a href="{{ route('home.member.detail', $item->id) }}" >
                                <img class="img-UMKM" src="{{ asset($item->image) }}" alt="">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<!-- Banner Section Start -->
<div class="rs-services style2 md-pt-70 my-5" id="event">
    <div class="container">
        <div class="sec-title text-center mb-50">
            <span class="sub-text">- Event -</span>
            <h2 class="title pb-25">
                Event <span class="event-style"> & </span> Program
            </h2>
            <div class="container" style="width: 100%;">
                <P class="text-center">Upcoming event and our last Event</P>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($event as $item)
            <div class="col-lg-4 col-md-6 md-mb-30 pt-4">
                <div class="services-item" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="services-img">
                        <a href="{{ route('home.event.detail', $item->id) }}">
                            <img src="{{ asset($item->image) }}" alt="images">
                        </a>
                    </div>
                    <div class="services-text" style="height: 270px; position:relative;">
                        <h2 class="title text-limit">{{ $item->title }}</h2>
                        <div class="sub-detail">
                            <div class="addon-services mb-2">
                                <div class="services-icon">
                                    <img src="{{ asset('assets/images/services/style1/icons/price.png') }}" alt="">
                                </div>
                                <p class="services-txt">{{ limitString($item->subtitle, 35) }}</p>
                            </div>
                            <div class="services-part mb-2">
                                <div class="services-icon">
                                    <img src="{{ asset('assets/images/services/main-home/home3/3.png') }}" alt="">
                                </div>
                                <p class="services-txt">{{ $item->start_datetime }}</p>
                            </div>
                            <div class="services-part mb-15">
                                <div class="services-icon">
                                    <img src="{{ asset('landingpage/images/services/style1/icons/pin.png') }}" alt="">
                                </div>
                                <p class="services-txt">
                                    {{ limitString($item->address, 35) }}
                                </p>
                            </div>
                            <div class="blog-button service mt-24">
                                <a href="{{ route('home.event.detail', $item->id) }}">
                                    <span class="btn-txt">View </span>
                                    <i class="fa fa fa-chevron-right"></i>
                                </a>
                                
                                @if(date('Y-m-d') <= $item->start_datetime)
                                @if(!Auth::check())
                                <a href="{{ route('home.event.detail', $item->id) }}/#register" id="show-loginr">
                                    <span class="btn-txt">Daftar </span>
                                    <i class="fa fa fa-chevron-right"></i>
                                </a>
                                @elseif(getRoleName() == 'guest')
                                <a href="#" id="show-loginr" onclick="event.preventDefault(); confirmDaftar('{{ $item->id }}').submit();">
                                    <span class="btn-txt">Daftar </span>
                                    <i class="fa fa fa-chevron-right"></i>
                                </a>
                                <form id="{{ $item->id }}" action="{{ route('daftarGuest', $item->id) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @else
                                <a href="#" id="show-loginr" onclick="event.preventDefault(); confirmDaftar('{{ $item->id }}').submit();">
                                    <span class="btn-txt">Daftar </span>
                                    <i class="fa fa fa-chevron-right"></i>
                                </a>
                                <form id="{{ $item->id }}" action="{{ route('daftar', $item->id) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-12 text-center mt-70 md-mt-50">
        <div class="btn-part">
            <a class="readon btn-text ticket" href="{{ route('home.event.created-by', $member->id) }}">
                <span>View Event & Program All</span>
            </a>
        </div>
    </div>
</div>


<div id="rs-blog" class="rs-blog blog-main-home gray-bg pt-110 pb-120 md-pt-70 md-pb-80">
    <div class="container" id="berita">
        <div class="sec-title text-center mb-85">
            <span class="sub-text small">Our Blog</span>
            <h2 class="title pb-26">
                News & Virtual Blog
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="rs-carousel owl-carousel"
            data-count="{{ $blog->count() }}" 
            data-loop="true"
            data-items="3"
            data-margin="30" 
            data-autoplay="true" 
            data-hoverpause="true" 
            data-autoplay-timeout="3000" 
            data-smart-speed="800" 
            data-dots="true" 
            data-nav="false" 
            data-nav-speed="false" 
            data-center-mode="true" 
            data-mobile-device="1" 
            data-mobile-device-nav="false" 
            data-mobile-device-dots="true" 
            data-ipad-device="2" 
            data-ipad-device-nav="false" 
            data-ipad-device-dots="true" 
            data-ipad-device2="2" 
            data-ipad-device-nav2="false" 
            data-ipad-device-dots2="true" 
            data-md-device="3" 
            data-md-device-nav="false" 
            data-md-device-dots="true"
        >
            @foreach ($blog as $item)
            <div class="blog-item">
                <div class="image-wrap">
                    <a href="{{ route('home.blog.detail', $item->id) }}"><img src="{{ asset($item->image) }}" alt="No Image Uploaded"></a>
                    <div class="blog-date">
                        <span class="day">{{ date('d', strtotime($item->created_at)) }}</span>
                        <span class="month">{{ date('M', strtotime($item->created_at)) }}</span>
                    </div>
                </div>
                <div class="blog-content" style="height: 210px;">
                    <ul class="blog-meta">
                        <li class="admin"><i class="fa fa-user-o"></i>{{$item->admin_id ? 'AdminVT' : limitString($item->member->name, 15) }}</li>
                        @foreach($item->category->take(1) as $cat)
                        <li class="cat-list"><a href="{{ route('home.blog.detail', $cat->id) }}"> <i class="fa fa-folder"></i>{{ $cat->meta_name->name }}</a></li>
                        @endforeach
                    </ul>
                    <h3 class="blog-title text-limit"><a href="{{ route('home.blog.detail', $item->id) }}">{{ $item->title }}</a></h3>
                    <div class="blog-button">
                        <a href="{{ route('home.blog.detail', $item->id) }}" style="position: absolute; bottom: 20px">
                            <span class="btn-txt">Read More</span>
                            <i class="fa fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-12 text-center mt-70 md-mt-50">
        <div class="btn-part">
            <a class="readon btn-text ticket" href="{{ route('home.blog.created-by', $member->id) }}">
                <span>View News All</span>
            </a>
        </div>
    </div>
    <div class="blog-animation">
        <div class="blog-animate teangle">
            <img src="{{ asset('assets/images/blog/animate.png') }}" alt="Icons">
        </div>
    </div>
</div>

<!-- sponsor asosiasi -->
<div id="partner" class="rs-partner sponsors-style pt-110 pb-110 md-pt-70 md-pb-0" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/11/bg11.jpg');">
    <div class="container">
        <div class="sec-title text-center mb-65">
            <span class="sub-text small">Our</span>
            <h2 class="title pb-35">
                Industri & Komunitas/Asosiasi Pendukung dan Sinergi
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row no-gutters justify-content-center">
            @foreach($sponsor as $data)
            <div class="col-lg-2 col-md-4 col-sm-auto" data-aos="zoom-in" data-aos-delay="100" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px; display: flex; align-items: center;">
                <div class="grid-figure" style="width: 100%;">
                    <div class="partner-img text-center">
                        <img src="{{ asset($data->image) }}" alt="{{ asset($data->name) }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div id="rs-blog" class="rs-blog blog-main-home gray-bg pt-110 pb-120 md-pt-70 md-pb-80">
    <div class="container" id="berita">
        <div class="sec-title text-center mb-85">
            <span class="sub-text small">Our Blog</span>
            <h2 class="title pb-26">
                Gallery Foto & Video
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="rs-carousel owl-carousel"
            data-count="{{ $gallery->count() }}" 
            data-loop="false"
            data-items="3"
            data-margin="30" 
            data-autoplay="true" 
            data-hoverpause="true" 
            data-autoplay-timeout="3000" 
            data-smart-speed="800" 
            data-dots="true" 
            data-nav="false" 
            data-nav-speed="false" 
            data-center-mode="true" 
            data-mobile-device="1" 
            data-mobile-device-nav="false" 
            data-mobile-device-dots="true" 
            data-ipad-device="2" 
            data-ipad-device-nav="false" 
            data-ipad-device-dots="true" 
            data-ipad-device2="2" 
            data-ipad-device-nav2="false" 
            data-ipad-device-dots2="true" 
            data-md-device="3" 
            data-md-device-nav="false" 
            data-md-device-dots="true"
        >
            @foreach ($gallery as $item)
            <div class="blog-item">
                <div class="image-wrap">
                    <a href="{{ route('home.gallery.detail', $item->id) }}"><img src="{{ asset($item->image) }}" alt="No Image Uploaded"></a>
                    <div class="blog-date">
                        <span class="day">{{ date('d', strtotime($item->date)) }}</span>
                        <span class="month">{{ date('M', strtotime($item->date)) }}</span>
                    </div>
                </div>
                <div class="blog-content" style="height: 240px;">
                    <h3 class="blog-title text-limit" style="margin-bottom: 5px !important;"><a href="{{ route('home.gallery.detail', $item->id) }}">{{ $item->title }}</a></h3>

                    <div class="addon-services" style="display: flex;">
                        <div class="services-icon">
                            <img src="{{ asset('assets/images/services/style1/icons/home6/price.png') }}" alt="" style="padding: 4px 6px 0px 5px; max-width: unset; height: 22px; width: 29px;">
                        </div>
                        <p class="pl-6 services-txt text-limit-1" style="margin-bottom: 0px !important;">
                            @foreach ($item->category as $kategori)
                                {{ $kategori->meta_name->name }}
                             @endforeach
                        </p>
                    </div>


                    {{-- {{ $item->category->meta_name->name }}  --}}

                    <div class="addon-services" style="display: flex;">
                        <div class="services-icon">
                            <img src="{{ asset('assets/images/services/main-home/home3/3.png') }}" alt="" style="padding: 4px 6px 0px 5px; max-width: unset; height: 22px; width: 29px;">
                        </div>
                        <p class="pl-6 services-txt text-limit-1" style="margin-bottom: 15px !important;">{{ $item->desc }}</p>
                    </div>
                    <div class="blog-button">
                        <a href="{{ route('home.gallery.detail', $item->id) }}" style="position: absolute; bottom: 45px">
                            <span class="btn-txt">Read More</span>
                            <i class="fa fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-lg-12 text-center mt-70 md-mt-50">
        <div class="btn-part">
            <a class="readon btn-text ticket" href="{{ route('home.gallery.created-by', $member->id) }}">
                <span>View Gallery All</span>
            </a>
        </div>
    </div>
    <div class="blog-animation">
        <div class="blog-animate teangle">
            <img src="{{ asset('assets/images/blog/animate.png') }}" alt="Icons">
        </div>
    </div>
</div>

<div class="py-3" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/10/bg.jpg');">
    <div class="container rs-contact home-style1">
        <div class="sec-title text-center mb-65">
            <h2 class="title pb-35">
                Kontak
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row y-middle">
            <div class="col-lg-8 pr-50 md-pr-15 md-mb-50">
                <div class="contact-map contact-map-middle">
                    <iframe src="{{ $member->gmap_url ?? asset('virtual/assets/img/location-not-available.png') }}" width="600" height="400" style="border:0; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-item mb-20">
                    <div class="widget-img">
                        <img src="{{ asset('assets/images/contact/icons/2-1.png')}}" alt="Images">
                    </div>
                    <div class="address-item">
                        <div class="address-icon">
                            <img src="{{ asset('assets/images/contact/icons/1.png')}}" alt="Images">
                        </div>
                        <div class="address-text">
                            <h3 class="title"> Alamat</h3>
                            <p class="services-txt">
                                {{ $member->address ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="widget-item mb-20">
                    <div class="widget-img">
                        <img src="{{ asset('assets/images/contact/icons/2-2.png') }}" alt="Images">
                    </div>
                    <div class="address-item">
                        <div class="address-icon">
                            <img src="{{ asset('assets/images/contact/icons/2.png') }}" alt="Images">
                        </div>
                        <div class="address-text">
                            <h3 class="title">Email</h3>
                            <p class="services-txt">
                                {{ $member->user->email }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="widget-item">
                    <div class="widget-img">
                        <img src="{{ asset('assets/images/contact/icons/2-3.png') }}" alt="Images">
                    </div>
                    <div class="address-item">
                        <div class="address-icon">
                            <img src="{{ asset('assets/images/contact/icons/3.png') }}" alt="Images">
                        </div>
                        <div class="address-text">
                            <h3 class="title">Telepon</h3>
                            <p class="services-txt">
                                <a href="#">{{ $member->phone ?? '-' }}</a><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="contact-map">
                    @if ($member->view_1_url)
                    <iframe src="{{ $member->view_1_url }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                    <img class="mini-map-cover" src="{{ asset('virtual/assets/img/location-not-available-potrait.png') }}">
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-map">
                    @if ($member->view_2_url)
                    <iframe src="{{ $member->view_2_url }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                    <img class="mini-map-cover" src="{{ asset('virtual/assets/img/location-not-available-potrait.png') }}">
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-map">
                    @if ($member->view_3_url)
                    <iframe src="{{ $member->view_3_url }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                    <img class="mini-map-cover" src="{{ asset('virtual/assets/img/location-not-available-potrait.png') }}">
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        
        // console.log($('.blog-item').length);
        // $('.owl-carousel').data('owl.carousel').options.loop = false;

        // $('.owl-carousel').trigger('refresh.owl.carousel');
    });

    function confirmDaftar(id) {
        event.preventDefault();
        event.stopPropagation();
        Swal.fire({
            title: 'Event Register',
            text: 'Apakah Anda yakin ingin mendaftar event ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, daftar sekarang!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
               
                $('#'+id).submit();
            }
        });
    }
</script>
@endsection