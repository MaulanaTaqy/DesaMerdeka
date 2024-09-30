
@extends('landing-page.layouts.main')

@section('title', 'Event - Detail')

@section('css')
{{-- <script src="https://kit.fontawesome.com/1c2c2462bf.js" crossorigin="anonymous"></script> --}}

<style>
    .progress {
        height: 3px !important;
    }
    .progress-bar-danger {
        background-color: #e90f10;
    }
    .progress-bar-warning{
        background-color: #ffad00;
    }
    .progress-bar-success{
        background-color: #02b502;
    }
    .fa-circle{
        font-size: 6px;  
    }
    .fa-check{
        color: #02b502;
    }

    div#popover-password > ul.list-unstyled > li {
        border-bottom: 0px !important;
    }
</style>
<style>
        * {
           margin: 0;
           padding: 0;
           outline: none;
           box-sizing: border-box;
           font-family: sans-serif;
       }
       
       body {
           height: 100%;
           width: 100%;
           /* background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%); */
       }
       
       .show-btn {
           background: #fff;
           padding: 10px 20px;
           font-size: 20px;
           font-weight: 500;
           color: #3498bd;
           cursor: pointer;
           box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
       }
       
       .show-btn, .container1 {
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
       }
       
       .show-login-btn {
           background: #fff;
           padding: 10px 20px;
           font-size: 20px;
           font-weight: 500;
           color: #3498bd;
           cursor: pointer;
           box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
       }
       
       .show-login-btn, .container1 {
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
       }
       
       input[type="checkbox"] {
           display: none;
       }
       
       .container1 {
           display: none;
           background: #fff;
           width: 500px;
           padding: 30px;
           position:absolute;
           left:60%;
           top:70%;
           z-index: 1;
           margin-left:-150px; 
           margin-top:-120px; 
           border-radius: 20px;
           box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
       }
       
       #show:checked ~ .container1 {
           display: block;
       }
       
       #show-login:checked ~ .container1 {
           display: block;
       }
       
       .container1 .close-btn {
           position: absolute;
           right: 20px;
           top: 15px;
           font-size: 25px;
           cursor: pointer;
       }
       
       .container1 .close-btn:hover {
           color: #3498db;
       }
       
       .container1 .text {
           font-size: 35px;
           font-weight: 600;
           text-align: center;
       }
       
       .container1 form {
           margin-top: -20px;
       }
       
       .container1 form .data {
           height: 45px;
           width: 100%;
           margin: 40px 0;
       }
       
       form .data label {
           font-size: 18px;
       }
       
       form .data input {
           height: 100%;
           width: 100%;
           padding-left: 10px;
           font-size: 17px;
           border: 1px solid silver;
           border-radius: 10px;
       }
       
       form .data input:focus {
           color: #3498bd;
           border-bottom-width: 2px;
       }
       
       form .forget-pass {
           margin-top: -8px;
       }
       
       form .forget-pass a {
           color: #3498bd;
           text-decoration: none;
       }
       
       form .forget-pass a:hover {
           text-decoration: underline;
       }
       
       form .btn {
           margin: 30px 0;
           height: 45px;
           width: 100%;
           position: relative;
           overflow: hidden;
       }
       
       form .btn .inner {
           height: 100%;
           width: 300%;
           position: absolute;
           left: -100%;
           z-index: -1;
           background: black;
           transition: all 0.4s;
           border-radius: 10px;
       }
       
       form .btn:hover .inner {
           left: 0;
       }
       
       form .btn button {
           height: 100%;
           width: 100%;
           background: none;
           border: none;
           color: #fff;
           font-size: 18px;
           font-weight: 500;
           text-transform: uppercase;
           letter-spacing: 1px;
           cursor: pointer;
       }
       
       form .signup-link {
           text-align: center;
       }
       
       form .signup-link a {
           color: #3498bd;
           text-decoration: none;
       }
       
       form .signup-link a:hover {
           text-decoration: underline;
       }
     
       @media (min-width: 700px) and (max-width: 916px) { 
           .social-info{
               margin-left: 400px;
               margin-top: -105px ;
               width: 80px;
           
           }
               
           .social-info1{
               margin-left: 400px;
               margin-bottom: -100px ;
               width: 80px;
               
           }

           .readon{
               margin-bottom: -80px ;
           }
       }
       
       @media (min-width: 917px) and (max-width: 1000px) { 
           .social-info{
               margin-left: 400px;
               margin-top: -105px ;
               width: 80px;
           
           }
               
           .social-info1{
               margin-left: 400px;
               margin-bottom: -100px ;
               width: 80px;
               
           }

           .readon{
               margin-bottom: -80px ;
           }
       }
       
       @media (min-width: 200px) and (max-width: 768px) { 
           .social-info{
               margin-left: 250px;
               margin-top: -105px ;
               width: 80px;
           
           }
               
           .social-info1{
               margin-left: 250px;
               margin-bottom: -100px ;
               width: 80px;
               
           }

           .readon{
               margin-top: 50px;
           }

           .container1{
                width: 80% !important;
                top: 50% !important;
                left: 50% !important;
                margin-left: 0 !important;
                margin-top: 0 !important;
           }

       }

       @media (min-width: 10px) and (max-width: 500px){ 
           .social-info{
               margin-left: 200px;
               margin-top: -105px ;
           }

           .social-info1{
               margin-left: 200px;
               margin-bottom: -100px ;
               width: 80px;
               
           }
           
           .readon{
               margin-top: 50px;
           }
       }

       .img-UMKM:hover, .partner-img:hover {
            -ms-transform: scale(1.2);
            /* IE 9 */
            -webkit-transform: scale(1.2);
            /* Safari 3-8 */
            transform: scale(1.2);
            transition: 0.2s ease;
        }
        .partner-img{
            transition: 0.2s ease;
        }
       </style>
<style>
    .images-wrap{
        height: 250px !important;
        width: 250px !important;
        display: flex !important;
        align-items: center !important;
        background-color: white !important;
        margin: auto;
    }
</style>
@endsection

@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner" style="height: 100%;transition: transform 0.5s ease, opacity .1s ease-out;">
    @forelse ( $event->images as $data )
    <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
        {{-- <img src="{{asset($data->image)}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"> --}}
        <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
    </div>
    @empty
    <div class="carousel-item active">
        {{-- <img src="{{asset('assets/images/img-tekno/slider/slide2-tp.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"> --}}
        <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
    </div>
    @endforelse
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
<div class="rs-about style1 pt-120 pb-120 md-pt-80 md-pb-75" id="register">
    <div class="container">
        <div class="row y-middle">
            <div class="col-lg-6 pr-15 md-pr-15 md-mb-50">
                <div class="images-part">
                    {{-- <img src="{{asset($event->image)}}" alt="Images" width="600" height="600"> --}}
                    <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 pl-45 md-pl-15">
                <div class="sec-title">
                    <span class="sub-text">Detail Event</span>
                    <h2 class="title pb-22">
                        {{ $event->title }}
                    </h2>
                    <div class="heading-border-line left-style mb-4" id="daftar"></div>
                    <span style="" class="desc margin-0 pt-40 pb-25">
                        {!! $event->desc !!}
                    </span>
                    <div class="rs-counter about-style mt-5">
                        <div class="row">
                            <div class="col-lg-6 md-mb-30">
                                <div class="counter-list">
                                    <div class="counter-icon" style="margin-top: -15px;">
                                        <img src="{{asset('assets/images/counter/icons/1.png')}}" alt="Counter">
                                    </div>
                                    <div class="counter-text" style="margin-top: -30px;">
                                        <div class="h1 fw-bold">{{ $event->event_speaker->count() }}</div>
                                        <h4 class="title">Speakers</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="counter-list1">
                                    <div class="counter-icon1" style="font-size: 40px; margin-top: -20px;">
                                        <ul class="social-info" style=" display: flex; justify-content: space-around; align-items: center;">
                                            <li style="display: block;"><a href="{{ urlCheck($event->fb_url) }}"><i class="fa-brands fa-facebook"></i></a></li>
                                            <li style="display: block;"><a href="{{ urlCheck($event->tk_url) }}"><i class="fa-brands fa-tiktok"></i></a></li>
                                        </ul>
                                        <ul class="social-info1" style=" display: flex; justify-content: space-around;">
                                            <li style="display: block;"><a href="{{ urlCheck($event->ig_url) }}"><i class="fa-brands fa-instagram"></i></a></li>
                                            <li style="display: block;"><a href="{{ urlCheck($event->yt_url) }}"><i class="fa-brands fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(date('Y-m-d') >= $event->start_datetime)
                <button href="#" class="readon btn-text" style="pointer-events: none;">
                    <span class="btn-txt"> Pendaftaran berakhir</span>
                </button>
                @else
                
                @if(!Auth::check())
                <div class="btn-part" style="margin-top: -50px;">
                    <input type="checkbox" id="show">
                    <label for="show" class="readon btn-text ticket" style="margin-top: -10;">Daftar</label>
                    <div class="container1">
                        <label for="show" class="close-btn"><i class="bi bi-x-square"></i></label>
                        <h2 class="text-left">Daftar</h2>
                        <form id='form' action="{{ route('auth.registerGuest.process') }}" method="POST">
                            @csrf
                            <input id="id" name="id" type="hidden" value="">
                            <input id="id" name="event_id" type="hidden" value="{{ $event->id }}">
                            <div class="data">
                                <label for="">Name</label>
                                <input type="text" name="name" required>
                            </div>
                            <div class="data">
                                <label for="">Phone</label>
                                <input type="text" name="phone" required>
                            </div>
                            <div class="data">
                                <label for="">Address</label>
                                <input type="text" name="address" required>
                            </div>
                            <div class="data">
                                <label for="">Email</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="data">
                                <label for="">Username</label>
                                <input type="text" name="username" placeholder="min:5 Character" required>
                            </div>
                            <div class="data">
                                <label for="">Password</label>
                                <input id="password" type="password" placeholder="Password" name="password" required>
                            </div>
                            <div id="popover-password">
                                <p><span id="result"></span></p>
                                <div class="progress">
                                    <div id="password-strength" 
                                        class="progress-bar" 
                                        role="progressbar" 
                                        aria-valuenow="40" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100" 
                                        style="width:0%">
                                    </div>
                                </div>
                                <ul class="list-unstyled mt-2">
                                    <li class="">
                                        <span class="low-upper-case">
                                            <i class="fas fa-circle" aria-hidden="true"></i>
                                            &nbsp;Lowercase &amp; Uppercase
                                        </span>
                                    </li>
                                    <li class="">
                                        <span class="one-number">
                                            <i class="fas fa-circle" aria-hidden="true"></i>
                                            &nbsp;Number (0-9)
                                        </span> 
                                    </li>
                                    <li class="">
                                        <span class="one-special-char">
                                            <i class="fas fa-circle" aria-hidden="true"></i>
                                            &nbsp;Special Character (!@#$%^&*)
                                        </span>
                                    </li>
                                    <li class="">
                                        <span class="eight-character">
                                            <i class="fas fa-circle" aria-hidden="true"></i>
                                            &nbsp;Atleast 8 Character
                                        </span>
                                    </li>
                                </ul>
                            </div>

                            <div class="btn">
                                <div class="inner"></div>
                                <button class="submit" id="show-login">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                @elseif(getRoleName() == 'guest')
                <a href="#" class="readon btn-text ticket" onclick="event.preventDefault(); confirmDaftar('{{ $event->id }}').submit();">
                    <span class="btn-txt">Daftar </span>
                </a>
                <form id="{{ $event->id }}" action="{{ route('daftarGuest', $event->id) }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a href="#" class="readon btn-text ticket" onclick="event.preventDefault(); confirmDaftar('{{ $event->id }}').submit();">
                    <span class="btn-txt">Daftar </span>
                </a>
                <form id="{{ $event->id }}" action="{{ route('daftar', $event->id) }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endif
                @endif
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
                                <img src="{{asset('assets/images/img-event/detail/acci.png')}}" alt="Images">
                            </div>
                            <div class="services-text">
                                <h3 class="title"><a href="services-style1.html">Event By</a></h3>
                                <p class="services-txt"> {{ $event->admin ? 'AdminVT' : $event->member->name }}</p>
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
                                @if($event->event_speaker->where('is_keynote', 1)->first())
                                <p class="services-txt">{{ $event->event_speaker->where('is_keynote', 1)->first()->speaker->name }}</p>
                                @endif
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
                                <p class="services-txt">{{ Carbon\Carbon::parse($event->start_datetime)->format('Y-m-d') }}</p>
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
                                <p class="services-txt">{{ Carbon\Carbon::parse($event->start_datetime)->format('h:i') }} - {{ Carbon\Carbon::parse($event->end_datetime)->format('h:i') }}</p>
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
                                @if($event->is_paid == 1)
                                <p class="services-txt"><i class="fa fa-check" aria-hidden="true">Paid</i></p>
                                @else
                                <p class="services-txt"><i class="fa fa-check" aria-hidden="true">Free</i></p>
                                @endif
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
                                <p class="services-txt">{{ $event->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pl-50 md-pl-15">
                <div class="rs-videos choose-video">
                    @if($event->video == null)
                    <div class="images-video">
                        <img src="{{asset('assets/images/img-event/news1.png')}}" alt="video/mp4" style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;">
                    </div>
                    @else
                    <div class="images-video">
                        <img src="{{ $event->image_video_thumbnail}}" alt="video/mp4" style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;">
                    </div>
                    @endif

                    <div class="animate-border">
                        <a class="popup-border" href="{{ $event->video}}">
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
        @if($event->event_speaker->where('is_keynote', 1)->first())
        <div class="">
            <div class="team-item">
                <div class="team-inner-wrap">
                    <div class="images-wrap">
                        <a href="#"><a href="#"><img src="{{asset($event->event_speaker->where('is_keynote', 1)->first()->speaker->image)}}" alt="Images"  alt="Team" width="350"></a>
                    </div>
                    <div class="team-content">
                        <div class="rs-arrow">
                            <div class="curve"></div>
                            <div class="point"></div>
                        </div>
                        <h3 class="title-name"><a href="#" style="color: black;">{{ $event->event_speaker->where('is_keynote', 1)->first()->speaker->name }}.</a></h3>
                        <div class="team-title">{{ $event->event_speaker->where('is_keynote', 1)->first()->speaker->title }}</div>
                        <ul class="social-icons">
                            <li><a href="{{ urlCheck($event->event_speaker->where('is_keynote', 1)->first()->speaker->fb_url) }}"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                            <li><a href="{{ urlCheck($event->event_speaker->where('is_keynote', 1)->first()->speaker->ig_url) }}"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                            <li><a href="{{ urlCheck($event->event_speaker->where('is_keynote', 1)->first()->speaker->linkedIn_url) }}"><i class="fa-brands fa-linkedin" style="color: black;"></i></a></li>
                            {{-- <li><a href="{{ urlCheck($event->event_speaker->where('is_keynote', 1)->first()->speaker->yt_url) }}"><i class="fa-brands fa-youtube" style="color: black;"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row justify-content-center">
            @foreach($event->event_speaker->where('is_keynote', 0) as $data)
            <div class="col-lg-3 col-md-6 md-mb-20">
                <div class="team-item">
                    <div class="team-inner-wrap">
                        <div class="images-wrap">
                            <a href="#"><img src="{{asset($data->speaker->image)}}" alt="Team"></a>
                        </div>
                        <div class="team-content">
                            <div class="rs-arrow">
                                <div class="curve"></div>
                                <div class="point"></div>
                            </div>
                            <h3 class="title-name"><a href="#" style="color: black;">{{ $data->speaker->name}}.</a></h3>
                            <div class="team-title">{{ $data->speaker->title}}.</div>
                            <ul class="social-icons">
                                <li><a href="{{ urlCheck($data->speaker->fb_url) }}"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                                <li><a href="{{ urlCheck($data->speaker->ig_url) }}"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                                <li><a href="{{ urlCheck($data->speaker->linkedIn_url) }}"><i class="fa-brands fa-linkedin" style="color: black;"></i></a></li>
                            </ul>
                        </div>
                      
                    </div>
                </div>
            </div>
         
            @endforeach
           
            </div>
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
        <div class="row no-gutters justify-content-center">
            @foreach ($event->event_sponsor as $data)
            {{-- @dd($data)   --}}
            <div class="col-lg-3 col-md-6 col-sm-6 col-6" data-aos="zoom-in" data-aos-delay="100" style="justify-content: center;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;display: flex;align-items: center;">
                <div class="grid-figure">
                    <div class="partner-img">
                        <a href="#"><img class="" src="{{ asset($data->sponsor->image) }}" width="200px" alt="images"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end sponsor asosiasi -->

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#btn-regis').prop('disabled', true);
    
    let state = false;
    let password = document.getElementById("password");
    let passwordStrength = document.getElementById("password-strength");
    let lowUpperCase = document.querySelector(".low-upper-case i");
    let number = document.querySelector(".one-number i");
    let specialChar = document.querySelector(".one-special-char i");
    let eightChar = document.querySelector(".eight-character i");

    password.addEventListener("keyup", function(){
        let pass = document.getElementById("password").value;
        checkStrength(pass);
    });

    function toggle(){
        if(state){
            document.getElementById("password").setAttribute("type","password");
            state = false;
        }else{
            document.getElementById("password").setAttribute("type","text")
            state = true;
        }
    }

    function myFunction(show){
        show.classList.toggle("fa-eye-slash");
    }

    function checkStrength(password) {
        let strength = 0;

        //If password contains both lower and uppercase characters
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
            strength += 1;
            lowUpperCase.classList.remove('fa-circle');
            lowUpperCase.classList.add('fa-check');
        } else {
            lowUpperCase.classList.add('fa-circle');
            lowUpperCase.classList.remove('fa-check');
        }
        //If it has numbers and characters
        if (password.match(/([0-9])/)) {
            strength += 1;
            number.classList.remove('fa-circle');
            number.classList.add('fa-check');
        } else {
            number.classList.add('fa-circle');
            number.classList.remove('fa-check');
        }
        //If it has one special character
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
            strength += 1;
            specialChar.classList.remove('fa-circle');
            specialChar.classList.add('fa-check');
        } else {
            specialChar.classList.add('fa-circle');
            specialChar.classList.remove('fa-check');
        }
        //If password is greater than 7
        if (password.length > 7) {
            strength += 1;
            eightChar.classList.remove('fa-circle');
            eightChar.classList.add('fa-check');
        } else {
            eightChar.classList.add('fa-circle');
            eightChar.classList.remove('fa-check');   
        }

        // If value is less than 2
        if (strength < 2) {
            passwordStrength.classList.remove('progress-bar-warning');
            passwordStrength.classList.remove('progress-bar-success');
            passwordStrength.classList.add('progress-bar-danger');
            passwordStrength.style = 'width: 10%';
            $('#btn-regis').prop('disabled', true)
        } else if (strength == 3) {
            passwordStrength.classList.remove('progress-bar-success');
            passwordStrength.classList.remove('progress-bar-danger');
            passwordStrength.classList.add('progress-bar-warning');
            passwordStrength.style = 'width: 60%';
            $('#btn-regis').prop('disabled', true)
        } else if (strength == 4) {
            passwordStrength.classList.remove('progress-bar-warning');
            passwordStrength.classList.remove('progress-bar-danger');
            passwordStrength.classList.add('progress-bar-success');
            passwordStrength.style = 'width: 100%';
            $('#btn-regis').prop('disabled', false)
        }
    }

    $(document).ready(function () {
        $('#show-login').on('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Event Register",
                text: "Apakah Anda yakin ingin mendaftar event ini?",
                icon: "warning",
                showCancelButton  : true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor : "#d33",
                confirmButtonText : "Ya!"
            }).then((result) => {
                if (result.value) {
                    $('#form').submit()
                }
            })
        })

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