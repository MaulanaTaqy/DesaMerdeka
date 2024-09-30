@extends('landing-page.layouts.main')

@section('title', 'Product - Detail')

@section('css')

@endsection

@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner" style="height: 100%;transition: transform 0.5s ease, opacity .1s ease-out;">
        <div class="carousel-item active">
            <img src="{{asset('assets/images/img-tekno/slider/slide2-tp.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/images/img-tekno/slider/slide3-tp.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/images/img-tekno/slider/slide1-tp.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
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
</div>
<!-- Breadcrumbs End -->

<!-- About Section Start -->
<div class="rs-about style1 pt-120 pb-120 md-pt-80 md-pb-75">
    <div class="container">
        <div class="row y-middle">
            <div class="col-lg-6 pr-15 md-pr-15 md-mb-50">
                <div class="images-part">
                    <img src="{{asset($product->image)}}" alt="Images">
                </div>
            </div>
            <div class="col-lg-6 pl-45 md-pl-15">
                <div class="sec-title">
                    <span class="sub-text">Detail Product</span>
                    <h2 class="title pb-22">
                        {{ $product->title }}
                    </h2>
                    <div class="heading-border-line left-style" id="daftar"></div>
                    <p class="desc margin-0 pt-40 pb-25">
                        {!! $product->desc !!}


                    </p>
                    <div class="rs-counter about-style">
                        <div class="row">
                            <div class="col-lg-6 md-mb-30">
                                <div class="counter-list">
                                    <div class="counter-icon" style="margin-top: -15px;">
                                        <img src="{{asset('assets/images/counter/icons/1.png')}}" alt="Counter">
                                    </div>
                                    <div class="counter-text plus" style="margin-top: -30px;">
                                        <div class="rs-count">5</div>
                                        <h4 class="title">Speakers</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="counter-list1">
                                    <div class="counter-icon1" style="font-size: 40px; margin-left: 100px; margin-top: -20px; width: 50%;">
                                        <ul class="social-info" style=" display: flex; justify-content: space-around; align-items: center;">
                                            <li style="display: block;"><a href="{{ urlCheck($product->fb_url) }}"><i class="fa-brands fa-facebook fa-10x"></i></a></li>
                                        </ul>
                                        <ul class="social-info1" style=" display: flex; justify-content: space-around;">
                                            <li style="display: block;"><a href="{{ urlCheck($product->ig_url) }}"><i class="fa-brands fa-instagram fa-10x"></i></a></li>
                                            <li style="display: block;"><a href="{{ urlCheck($product->yt_url) }}"><i class="fa-brands fa-youtube fa-10x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-part" style="margin-top: -50px;">
                    <input type="checkbox" id="show">
                    <label for="show" class="readon btn-text ticket" style="margin-top: -10;">Daftar</label>
                    <div class="container1">
                        <label for="show" class="close-btn"><i class="bi bi-x-square"></i></label>
                        <h2 class="text-left">Daftar</h2>
                        <form action="">
                            <div class="data">
                                <label for="">Email</label>
                                <input type="email" required>
                            </div>
                            <div class="data">
                                <label for="">Nama Lengkap</label>
                                <input type="text" required>
                            </div>
                            <div class="data">
                                <label for="">Kata Sandi</label>
                                <input type="password" required>
                            </div>
                            <div class="data">
                                <label for="">Ulangi Kata Sandi</label>
                                <input type="password" required>
                            </div>
                            <div class="btn">
                                <div class="inner"></div>
                                <button class="submit" id="show-login">Daftar</button>
                            </div>
                            <div class="signup-link">Not a Member ? <a href="">Sign Up Now</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- About Section End -->

<!-- Services Section Start -->
<div class="rs-services style4 bg14 pt-120 pb-120 md-pt-80 md-pb-80" style="background-image: url('{{asset('assets/images/bg.jpg')}}');">
    <div class="container">
        <div class="row y-middle">
            <div class="col-lg-6 md-mb-50">
                <div class="sec-title mb-60">
                    <span class="sub-text">Join The Event</span>
                    <h2 class="title pb-25">
                        Our Provided Perks For You<br>
                        During Conference
                    </h2>
                    <div class="heading-border-line left-style"></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="services-item mb-45">
                            <div class="services-icon">
                                <img src="{{asset('assets/images/img-event/detail/acci.png')}}" alt="Images" width="350">
                            </div>
                            <div class="services-text">
                                <h3 class="title"><a href="services-style1.html">Event By</a></h3>
                                {{ $member->member_type->name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="services-item mb-45">
                            <div class="services-icon">
                                <img src="{{asset('assets/images/img-event/detail/icons8-micro-55.png')}}" alt="Images">
                            </div>
                            <div class="services-text">
                                <h3 class="title"><a href="services-style1.html">Keynote Speakers</a></h3>
                                <p class="services-txt">DR. Agus Gumiwang Kartasasmita, M.Si.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="services-item mb-45">
                            <div class="services-icon">
                                <img src="{{asset('assets/images/img-event/detail/calendar-55.ico')}}" alt="Images">
                            </div>
                            <div class="services-text">
                                <h3 class="title"><a href="services-style1.html">Tanggal</a></h3>
                                <p class="services-txt">{{ $product->created_at->format('Y-m-d') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="services-item mb-45">
                            <div class="services-icon">
                                <img src="{{asset('assets/images/img-event/detail/clock-4-55.ico')}}" alt="Images">
                            </div>
                            <div class="services-text">
                                <h3 class="title"><a href="services-style1.html">Waktu</a></h3>
                                <p class="services-txt">13:30 WIB - 17.30 WIB</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="services-item mb-45">
                            <div class="services-icon">
                                <img src="{{asset('assets/images/img-event/detail/icons8-ticket-55.png')}}" alt="Images">
                            </div>
                            <div class="services-text">
                                <h3 class="title"><a href="#">Tipe Event</a></h3>
                                <p class="services-txt">Free/Gratis</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="services-item">
                            <div class="services-icon">
                                <img src="{{asset('assets/images/img-event/detail/map-5-55.ico')}}" alt="Images">
                            </div>
                            <div class="services-text">
                                <h3 class="title"><a href="services-style1.html">Tempat</a></h3>
                                <p class="services-txt">GOR Citra, jl Cikutra No.19</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pl-50 md-pl-15">
                <div class="rs-videos choose-video">
                    <div class="images-video">
                        <img src="{{asset('assets/images/img-event/news1.png')}}"alt="video/mp4" style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;">
                    </div>
                    <div class="animate-border">
                        <a class="popup-border" href="https://www.youtube.com/watch?v=CxXmxRD3Gr0">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services Section End -->

<!-- Team Section Start -->
<div class="rs-team style2 bg12 pt-120 pb-50 md-pt-80" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/11/bg4.jpg');">
    <div class="container">
        <div class="sec-title text-center mb-60">
            <span class="sub-text">Speakers</span>
            <h2 class="title black-color pb-35">
                Event Speakers
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="">
            <div class="team-item">
                <div class="team-inner-wrap">
                    <div class="images-wrap">
                        {{-- <img src="{{asset($speaker->image)}}" alt="Images"> --}}
                        <a href="#"><img src="{{asset($speaker->image)}}" alt="Images">
                    </div>
                    <div class="team-content">
                        <div class="rs-arrow">
                            <div class="curve"></div>
                            <div class="point"></div>
                        </div>
                        <h3 class="title-name"><a href="#" style="color: black;">{{ $speaker->name}}.</a></h3>
                        <div class="team-title">{{ $speaker->title}}</div>
                        <ul class="social-icons">
                            <li><a href="{{ urlCheck($speaker->fb_url) }}"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                            <li><a href="{{ urlCheck($speaker->ig_url) }}"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                            <li><a href="{{ urlCheck($speaker->yt_url) }}"><i class="fa-brands fa-youtube" style="color: black;"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($skipped as $data)
            
            <div class="col-lg-3 col-md-6 md-mb-20">
                <div class="team-item">
                    <div class="team-inner-wrap">
                        <div class="images-wrap">
                            <a href="#"><img src="{{asset($data->image)}}" alt="Team"></a>
                        </div>
                        <div class="team-content">
                            <div class="rs-arrow">
                                <div class="curve"></div>
                                <div class="point"></div>
                            </div>
                            <h3 class="title-name"><a href="#" style="color: black;">{{ $data->name}}.</a></h3>
                            <div class="team-title">{{ $data->title}}.</div>
                            <ul class="social-icons">
                                <li><a href="{{ urlCheck($data->fb_url) }}"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                                <li><a href="{{ urlCheck($data->ig_url) }}"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                                <li><a href="{{ urlCheck($data->yt_url) }}"><i class="fa-brands fa-youtube" style="color: black;"></i></a></li>
                            </ul>
                        </div>
                      
                    </div>
                </div>
            </div>
         
            @endforeach
           
           
        
        </div>
    </div>
</div>
<!-- Team Section Start -->
<!-- sponsor asosiasi -->
<div id="assosiasi" class="rs-partner sponsors-style pt-110 pb-110 md-pt-70 md-pb-0" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/11/bg11.jpg');">
    <div class="container">
        <div class="sec-title text-center mb-65">
            <span class="sub-text small">Our Partner</span>
            <h2 class="title pb-35">
                Partner By
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="100" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure">
                    <div class="log-img">
                        <a href="/detail_member/ainaki"><img src="{{ asset('assets/images/img-sponsor/ainaki.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="200" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure">
                    <div class="log-img">
                        <a href="/detail_member/agi"><img src="{{ asset('assets/images/img-sponsor/agi.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="300" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure">
                    <div class="log-img">
                        <a href="/detail_member/aspiluki"><img src="{{ asset('assets/images/img-sponsor/aspiluki.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="300" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure border-no">
                    <div class="log-img">
                        <a href="/detail_member/rice"><img src="{{ asset('assets/images/img-sponsor/rice.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="400" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure">
                    <div class="log-img">
                        <a href="#"><img src="{{ asset('assets/images/img-sponsor/iot.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="500" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure">
                    <div class="log-img">
                        <a href="/detail_member/bdg"><img src="{{ asset('assets/images/img-sponsor/btp.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="600" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure">
                    <div class="log-img">
                        <a href="/detail_member/bdi"><img src="{{ asset('assets/images/img-sponsor/bdi.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="700" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure border-no">
                    <div class="log-img">
                        <a href="/detail_member/smr"><img src="{{ asset('assets/images/img-sponsor/semarang.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" style="visibilty:hidden;">
                <div class="grid-figure bottom-noborder">
                    <div class="log-img">
                        <a href="#"><img src="{{ asset('assets/images/partner/sponsor/9.png') }}" alt="images" style="visibility: hidden"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="800" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure bottom-noborder">
                    <div class="log-img">
                        <a href="#"><img src="{{ asset('assets/images/img-sponsor/makasar.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="900" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure bottom-noborder">
                    <div class="log-img">
                        <a href="#"><img src="{{ asset('assets/images/partner/sponsor/11.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" style="visibility: hidden">
                <div class="grid-figure border-no bottom-noborder">
                    <div class="log-img">
                        <a href="#"><img src="{{ asset('assets/images/partner/sponsor/12.png') }}" alt="images"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end sponsor asosiasi -->
<!-- Main content End -->
@endsection