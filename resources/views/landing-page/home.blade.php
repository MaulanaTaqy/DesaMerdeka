@extends('landing-page.layouts.main')

@section('title', 'Home')

@section('css')
<style>
    .inner.disabled{
        opacity: 0.65;
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

    .show-btn,
    .container1 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(60%, -50%);
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

    .show-login-btn,
    .container1 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(60%, -50%);
    }

    input[type="checkbox"] {
        display: none;
    }

    .container1 {
        display: none;
        background: #fff;
        width: 500px;
        padding: 30px;
        position: absolute;
        left: 60%;
        top: 70%;
        z-index: 1;
        margin-left: -150px;
        margin-top: -120px;
        border-radius: 20px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }

    #show:checked~.container1 {
        display: block;
    }

    #show-login:checked~.container1 {
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

    .counter-list {
        width: 300px;
        height: 100%;
    }

    .sponsor-logos img {
        height: 10rem;
        padding: 15px 33px 15px 33px;
        opacity: 0.7;
        transition: 0.3s;
    }

    .sponsor-logos img:hover {
        -ms-transform: scale(1.5);
        /* IE 9 */
        -webkit-transform: scale(1.5);
        /* Safari 3-8 */
        transform: scale(1.5);
        opacity: 1;
    }
    
    .blog-item img {
        height: 15rem;
        object-fit: scale-down;
    }

    .product-img img {
        height: 7rem;
        /* object-fit: cover; */
    }

    .product-img img:hover {
        -ms-transform: scale(1.3);
        /* IE 9 */
        -webkit-transform: scale(1.3);
        /* Safari 3-8 */
        transform: scale(1.3);
    }

    .partner-img img {
        height: 8rem;
    }

    .partner-img img:hover {
        -ms-transform: scale(1.5);
        /* IE 9 */
        -webkit-transform: scale(1.5);
        /* Safari 3-8 */
        transform: scale(1.5);
    }

    .images-wrap{
        height: 250px !important;
        width: 250px !important;
        display: flex !important;
        align-items: center !important;
        background-color: white !important;
        margin: auto;
    }

    .rs-blog.blog-main-home .blog-item .image-wrap a img{
        object-fit: cover;
    }

    .rs-team.style2 .team-item .team-inner-wrap .images-wrap a img {
        border-radius: 0 !important;
    }

    .services-img{
        height: 250px !important;
        /* display: flex !important; */
        /* align-items: center !important; */
        background-color: white !important;
    }

    .rs-services.style2 .services-item .services-text {
        position: relative;
    }

    .rs-services.style2 .services-item .services-img img {
        width: 100% !important;
        height: 100% !important;
        transition: all 0.5s;
        object-fit: cover !important;
    }

    .sub-detail {
        position: absolute;
        top: 95px;
    }

    .contact-img {
        height: 400px;
        display: flex;
        align-items: center;
    }

    .services-icon-new img{
        width: 20px;
        margin: 10px;
    }
    
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection


@section('content')

<!-- Banner Section Start -->
<div class="rs-banner banner-home-style2" style="background: transparent; height: 120vh;" id="home">
    @if(optional($app)->url_vidio_banner_yt)
    <iframe class="video-bg"
        src="{{ optional($app)->url_vidio_banner_yt.'?autoplay=1&loop=1&controls=0'}}">
    </iframe> 
    @else
    <video class="video-bg" autoplay loop muted poster="{{asset('upload/aset_image/banner/home.jpg')}}">
        <source src="{{ asset('upload/aset_vidio/home.mp4')}}" type="video/mp4">
    </video>
    @endif
    <div class="container">
        <div class="content-wrap">
            <h2 class="title wow fadeInDown">{{ optional($app)->title ?? 'VIRTUAL'}}</h2>
            <h2 class="small-title wow fadeInLeft">{{ optional($app)->sub_title ?? 'Desa INDUSTRY ICT'}}</h2>
            <span class="sub-title wow fadeInLeft new">{{ optional($app)->desc ?? 'KEMENTERIAN PERINDUSTRIAN RI'}}</span>
            <div class="btn-part wow fadeinup new buttonkota">
                <a class="readon btn-text ticket map" href="{{route('home.map_virtual')}}">
                    <span>Go to Maps VirtualDesa</span>
                </a>
            </div>
        </div>
    </div>
    <div class="animation-style">
        <div class=" fly one stuff">
            <img data-depth="0.2" src="{{ asset('landingpage/images/banner/style2/icons/1.png') }}" alt="Icons">
        </div>
        <div class=" fly two stuff2">
            <img data-depth="0.3" src="{{ asset('landingpage/images/banner/style2/icons/2.png') }}" alt="Icons">
        </div>
        <div class=" fly three stuff3">
            <img data-depth="0.4" src="{{ asset('landingpage/images/banner/style2/icons/3.png') }}" alt="Icons">
        </div>
        <div class=" fly four stuff4">
            <img data-depth="0.5" src="{{ asset('landingpage/images/banner/style2/icons/4.png') }}" alt="Icons">
        </div>
        <div class=" fly five stuff5">
            <img data-depth="0.6" src="{{ asset('landingpage/images/banner/style2/icons/5.png') }}" alt="Icons">
        </div>
        <div class=" fly six stuff6">
            <img data-depth="0.7" src="{{ asset('landingpage/images/banner/style2/icons/6.png') }}" alt="Icons">
        </div>
        <div class=" fly seven stuff7">
            <img data-depth="0.8" src="{{ asset('landingpage/images/banner/style2/icons/7.png') }}" alt="Icons">
        </div>
    </div>
</div>
<!-- Banner Section End -->

<!-- About Section Start -->
<div class="rs-about style1 pt-120 pb-120 md-pt-80 md-pb-75" style="background-color: #FFFFFF;" id="join">
    <div class="container">
        <div class="row y-middle">
            <div class="col-lg-6 pr-15 md-pr-15 md-mb-50">
                <div class="images-part">
                    {{-- <img src=" {{ asset(optional($app)->short_about_image) }} " alt="Images" width="400" height="580" data-aos="fade-right" data-aos-delay="100"> --}}
                    <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 pl-45 md-pl-15">
                <div class="sec-title">
                    <span class="sub-text" data-aos="fade-down" data-aos-delay="300">About Desa Merdeka</span>
                    <h2 class="title pb-22" data-aos="fade-left" data-aos-delay="400">
                        {{ optional($app)->short_about_title ?? 'Welcome to Desa Merdeka Industry ICT'}}
                    </h2>
                    <div class="heading-border-line left-style"></div>
                    <p class="desc margin-0 pt-40 pb-28" data-aos="zoom-in" data-aos-delay="500">
                        {!! optional($app)->short_about_desc ?? 'Welcome to Desa Merdeka Industry ICT' !!}
                    </p>

                    @if(!Auth::check())
                    <div class="btn-part mt-35" data-aos="zoom-in" data-aos-delay="800">
                        <a class="readon btn-text ticket" href="{{route('auth.register')}}">
                            <span>Join Member Desa Merdeka</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="rs-animation">
        <div class="animate dot stuff2">
            <img data-depth="0.2" src="{{asset('landingpage/images/about/style1/1.png')}}" alt="Icons">
        </div>
        <div class="animate circle stuff3">
            <img data-depth="0.3" src="{{asset('landingpage/images/about/style1/2.png')}}" alt="Icons">
        </div>
        <div class="animate microphone stuff4">
            <img data-depth="0.4" src="{{asset('landingpage/images/about/style1/3.png')}}" alt="Icons">
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Counter Start Here -->
<div class="rs-counter about-style home-style2 bg10 pt-160 pb-160 md-pt-80 md-pb-80" id="counter" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/10/bg2.jpg');">
    <div class="container  counterhome">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 md-mb-30">
                <div class="counter-list">
                    <div class="counter-icon">
                        {{-- <a href="{{ route('home.member.all', $member_type->where('name', 'Desa')->first()->id) }}"> --}}
                        <a href="{{ route('home.member.all', $member_type->where('name', 'Desa')->first()->id) }}">
                            <img src="{{ asset('landingpage/images/img-counter/ict.png') }}" alt="Counter">
                        </a>
                    </div>
                    <div class="counter-text plus">
                        <div class="h1 fw-bold">{{ $desa ?? '0'}}</div>
                        <h4 class="title">Desa ICT</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 md-mb-30">
                <div class="counter-list">
                    <div class="counter-icon">
                        <a href="{{ route('home.member.all', $member_type->where('name', 'UMKM')->first()->id) }}">
                            <img src="{{asset('landingpage/images/img-counter/st.png')}}" alt="Counter">
                        </a>
                    </div>
                    <div class="counter-text plus">
                        <div class="h1 fw-bold">{{ $umkm ?? '0'}}</div>
                        <h4 class="title">UMKM</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 xs-mb-30">
                <div class="counter-list">
                    <div class="counter-icon">
                        <a href="{{ route('home.member.all', $member_type->where('name', 'Komunitas/Asosiasi')->first()->id) }}">
                            <img src="{{asset('landingpage/images/img-counter/asosiasi.png')}}" alt="Counter">
                        </a>
                    </div>
                    <div class="counter-text plus">
                        <div class="h1 fw-bold">{{ $komunitas ?? '0'}}</div>
                        <h4 class="title">Assosiasi</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-list">
                    <div class="counter-icon">
                        <a href="{{ route('home.member.all', $member_type->where('name', 'Industri')->first()->id) }}">
                            <img src="{{asset('landingpage/images/img-counter/dev.png')}}" alt="Counter">
                        </a>
                    </div>
                    <div class="counter-text plus">
                        <div class="h1 fw-bold">{{ $komunitas ?? '0'}}</div>
                        <h4 class="title">Industri</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6" style="margin-top: 3rem;">
                <div class="counter-list">
                    <div class="counter-icon">
                        <a href="{{ route('home.event.all') }}">
                            <img src="{{asset('landingpage/images/img-counter/event.png')}}" alt="Counter">
                        </a>
                    </div>
                    <div class="counter-text plus">
                        <div class="h1 fw-bold">{{ $event_count ?? '0'}}</div>
                        <h4 class="title">Event</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6" style="margin-top: 3rem;">
                <div class="counter-list">
                    <div class="counter-icon">
                        <a href="/apps/all">
                            <img src="{{asset('landingpage/images/img-counter/app.png')}}" alt="Counter">
                        </a>
                    </div>
                    <div class="counter-text plus">
                        <div class="h1 fw-bold">{{ $product_count ?? '0'}}</div>
                        <h4 class="title">App/Software</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6" style="margin-top: 3rem;">
                <div class="counter-list">
                    <div class="counter-icon">
                        <img src="{{asset('landingpage/images/img-counter/solusi.png')}}" alt="Counter">
                    </div>
                    <div class="counter-text plus">
                        <div class="h1 fw-bold">{{ $member_category_count ?? '0' }}</div>
                        <h4 class="title"> Layanan Dan Solusi</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6" style="margin-top: 3rem;">
                <div class="counter-list">
                    <div class="counter-icon">
                        <img src="{{asset('landingpage/images/img-counter/member.png')}}" alt="Counter">
                    </div>
                    <div class="counter-text plus">
                        <div class="h1 fw-bold">{{ $guest_count ?? '0'}}</div>
                        <h4 class="title">Member Event</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter End Here -->

<!-- Services Section Start -->
<div class="rs-services style3 bg11 pt-110 pb-120 md-pt-75 md-pb-80" id="why" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/10/bg.jpg')">
    <div class="container">
        <div class="sec-title text-center mb-70 md-mb-50">
            <span class="sub-text">Joint The Virtual Colaboration</span>
            <h2 class="title pb-30">
                Why Join Desa Merdeka
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-20">
                <div class="services-item" data-aos="fade-right" data-aos-delay="300">
                    <div class="services-icon">
                        <img src="{{asset('landingpage/images/services/style2/1.png')}}" alt="">
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="title">Colaboration & in-person network</h3>
                        </div>
                        <p class="services-txt">Membantu anda mengembangkan hubungan yang lebih dalam dengan koneksi
                            utama</p>
                        <div class="serial-number">
                            01
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-20">
                <div class="services-item" data-aos="fade-down" data-aos-delay="500">
                    <div class="services-icon">
                        <img src="{{asset('landingpage/images/services/style2/2.png')}}" alt="">
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="title">Start Up Industry Creative Festival</h3>
                        </div>
                        <p class="services-txt">perusahaan yang berfokus untuk mengembangkan produk, layanan, atau platform yang layak.</p>
                        <div class="serial-number">
                            02
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-20">
                <div class="services-item" data-aos="fade-left" data-aos-delay="300">
                    <div class="services-icon">
                        <img src="{{asset('landingpage/images/services/style2/3.png')}}" alt="">
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="title">Update Tech and Gallery Apps</h3>
                        </div>
                        <p class="services-txt">memperbarui aplikasi technology dan gallery agar mendapatkan
                            fitur-fitur yang terbaru</p>
                        <div class="serial-number">
                            03
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 md-mb-20">
                <div class="services-item" data-aos="fade-right" data-aos-delay="300">
                    <div class="services-icon">
                        <img src="{{asset('landingpage/images/services/style2/4.png')}}" alt="">
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="title">Connect with Potential Clients</h3>
                        </div>
                        <p class="services-txt">
                            Tujuannya adalah agar klien potensial bisa merasakan dahulu service yang Anda berikan.
                            <div class="serial-number">
                                04
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sm-mb-20">
                <div class="services-item" data-aos="fade-up" data-aos-delay="500">
                    <div class="services-icon">
                        <img src="{{asset('landingpage/images/services/style2/5.png')}}" alt="">
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="title">Event, Program & Top Speaker</h3>
                        </div>
                        <p class="services-txt">Program pada dasarnya adakah sekumpulan kegiatan, dapat bersifat fisik atau non-fisik</p>
                        <div class="serial-number">
                            05
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="services-item" data-aos="fade-left" data-aos-delay="300">
                    <div class="services-icon">
                        <img src="{{asset('landingpage/images/services/style2/6.png')}}" alt="">
                    </div>
                    <div class="services-content">
                        <div class="services-text">
                            <h3 class="title">Desa Innovasi Awardnes</h3>
                        </div>
                        <p class="services-txt">Kompetisi dan Innovasi Produk terbarukan dari Desa ICT Menjadi Lohan Untuk Kolaborasi</p>
                        <div class="serial-number">
                            06
                        </div>
                    </div>
                </div>
            </div>
            @if(!Auth::check())
            <div class="col-lg-12 text-center mt-70 md-mt-50">
                <div class="btn-part" id="register">
                    <a class="readon btn-text ticket" href="{{route('auth.register')}}">
                        <span>Register Account</span>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="rs-animation">
        <div class="animate-icons one">
            <img src="{{asset('landingpage/images/services/style2/animate/1.png')}}" alt="Icons">
        </div>
        <div class="animate-icons two">
            <img src="{{asset('landingpage/images/services/style2/animate/2.png')}}" alt="Icons">
        </div>
        <div class="animate-icons three">
            <img src="{{asset('landingpage/images/services/style2/animate/3.png')}}" alt="Icons">
        </div>
        <div class="animate-icons four">
            <img src="{{asset('landingpage/images/services/style2/animate/4.png')}}" alt="Icons">
        </div>
    </div>
</div>
<!-- Services Section End -->

<!-- Blog Section Start -->
<div id="rs-blog" class="rs-blog blog-main-home gray-bg pt-110 pb-120 md-pt-70 md-pb-80">
    <div class="container" id="berita">
        <div class="sec-title text-center mb-85">
            <span class="sub-text small">Our Blog</span>
            <h2 class="title pb-26">
                News & Virtual Blog
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true">
            @foreach($blog as $data)
            <div class="blog-item">
                <div class="image-wrap">
                    <a href="{{ route('home.blog.detail', $data->id) }}">
                        {{-- <img src="{{asset($data->image)}}" alt="Blog"> --}}
                        <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                    </a>
                    <div class="blog-date">
                        <span class="day">{{date('d',strtotime($data->created_at))}}</span>
                        <span class="month">{{date('F',strtotime($data->created_at))}}</span>
                    </div>
                </div>
                <div class="blog-content" style="height: 210px;">
                    <ul class="blog-meta">
                        <li class="admin">
                            <i class="fa fa-user-o"></i>
                            {{$data->admin_id ? 'AdminVT' : limitString($data->member->name, 15) }}
                        </li>
                        @foreach($data->category->take(1) as $item)
                        <li class="cat-list"><a href="{{ route('home.blog.detail', $data->id) }}"> <i class="fa fa-folder"></i>{{ $item->meta_name->name }}</a></li>
                        @endforeach
                    </ul>
                    <h3 class="blog-title text-limit"><a href="{{ route('home.blog.detail', $data->id) }}">{{$data->title}}</a></h3>
                    <div class="blog-button">
                        <a href="{{ route('home.blog.detail', $data->id) }}" style="position: absolute; bottom: 20px">
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
            <a class="readon btn-text ticket" href="{{route('home.blog.all')}}">
                <span>View News All</span>
            </a>
        </div>
    </div>
    <div class="blog-animation">
        <div class="blog-animate teangle">
            <img src="landingpage/images/blog/animate.png" alt="Icons">
        </div>
    </div>
</div>
<!-- Blog Section End -->

<!-- Contact Section Start -->
<div class="rs-contact home-style1 home-style2 pt-110 pb-120 md-pt-70 md-pb-80" style="background-color: #FFFFFF;" id="event">
    <div class="container">
        <div class="sec-title text-center mb-85">
            <span class="sub-text">Venue</span>
            <h2 class="title pb-26">
                Event dan Program Desa Merdeka
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div id="carouselExampleControlsNoTouching" class="carousel carousel-dark slide"  data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($event->take(3) as $data)
                <button type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->iteration === 1 ? 'active' : '' }}" aria-current="{{ $loop->iteration === 1 ? 'true' : '' }}"></button>
                @endforeach
              </div>
            <div class="carousel-inner">
                @foreach ($event->take(3) as $data)
                <div class="carousel-item {{ $loop->iteration === 1 ? 'active' : '' }}">
                    <div class="row y-middle">
                        <div class="col-lg-8 pr-130 md-pr-15 md-mb-50">
                            <div class="contact-img" style="position: relative;">
                                <a href="{{ route('home.event.detail', $data->id) }}">
                                    {{-- <img src="{{ asset($data->image) }}" alt="Images" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"> --}}
                                    <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                                    <h5 class="px-4 py-2 text-white text-center" style="position: absolute; width: 100%; bottom: 0px; background-color: rgba(0, 0, 0, 0.5);">{{ $data->title }}</h5>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="widget-item mb-20">
                                <div class="widget-img">
                                    {{-- <img src="{{ asset('landingpage/images/contact/icons/2-1.png') }}" alt="Images"> --}}
                                    <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                                </div>
                                <div class="address-item">
                                    <div class="address-icon">
                                        {{-- <img src="{{ asset('assets/images/contact/icons/1.png') }}" alt="Images"> --}}
                                        <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                                    </div>
                                    <div class="address-text">
                                        <h3 class="title"> Address</h3>
                                        <p class="services-txt">
                                            {{ $data->address}}I
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-item mb-20">
                                <div class="widget-img">
                                    {{-- <img src="{{ asset('assets/images/contact/icons/2-2.png') }}" alt="Images"> --}}
                                    <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                                </div>
                                <div class="address-item">
                                    <div class="address-icon">
                                        <img src="{{ asset('assets/images/contact/icons/2.png') }}" alt="Images">
                                    </div>
                                    <div class="address-text">
                                        <h3 class="title">Email us</h3>
                                        <p class="services-txt">
                                            {{ $data->admin ? $data->admin->user->email : $data->member->user->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-item">
                                <div class="widget-img">
                                    {{-- <img src="{{ asset('assets/images/contact/icons/2-3.png') }}" alt="Images"> --}}
                                    <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                                </div>
                                <div class="address-item">
                                    <div class="address-icon">
                                        {{-- <img src="{{ asset('assets/images/contact/icons/3.png') }}" alt="Images"> --}}
                                        <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                                    </div>
                                    <div class="address-text">
                                        <h3 class="title">Call us</h3>
                                        <p class="services-txt">
                                            {{ $data->admin ? (optional($app)->phone ?? '-') : $data->member->phone }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
    </div>
    <!-- Services Section Start -->
    <div class="rs-services style2 pt-100 md-pt-70">
        <div class="container">
            <div class="row">
                @foreach ($event->skip(3)->sortByDesc('created_at') as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="services-item" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <div class="services-img">
                            <a href="{{ route('home.event.detail', $data->id) }}">
                                {{-- <img src="{{ asset($data->image) }}" alt="images" width="768" height="462"> --}}
                                <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                            </a>
                        </div>
                        <div class="services-text" style="height: 270px;">
                            <h2 class="title text-limit">{{ $data->title }}</h2>
                            <div class="sub-detail">
                                <div class="addon-services">
                                    <div class="services-icon">
                                        <img src="{{ asset('assets/images/services/style1/icons/price.png') }}" alt="">
                                    </div>
                                    <p class="services-txt">{{ limitString($data->subtitle, 25) }}</p>
                                </div>
                                <div class="addon-services">
                                    <div class="services-icon">
                                        <img src="{{ asset('assets/images/services/main-home/home3/3.png') }}" alt="">
                                    </div>
                                    <p class="services-txt">{{ $data->start_datetime }}</p>
                                </div>
                                <div class="services-part mb-15">
                                    <div class="services-icon">
                                        <img src="{{ asset('landingpage/images/services/style1/icons/pin.png') }}" alt="">
                                    </div>
                                    <p class="services-txt  text-limit-1">
                                        {{ limitString($data->address, 25) }}
                                    </p>
                                </div>
                                <div class="blog-button service mt-24">
                                    <a href="{{ route('home.event.detail', $data->id) }}">
                                        <span class="btn-txt">View </span>
                                        <i class="fa fa fa-chevron-right"></i>
                                    </a>
                                    @if(date('Y-m-d') <= $data->start_datetime)
                                    @if(!Auth::check())
                                    <a href="{{ route('home.event.detail', $data->id) }}/#register" id="show-loginr">
                                        <span class="btn-txt">Daftar </span>
                                        <i class="fa fa fa-chevron-right"></i>
                                    </a>
                                    @elseif(getRoleName() == 'guest')
                                    <a href="#" id="show-loginr" onclick="event.preventDefault(); confirmDaftar('{{ $data->id }}').submit();">
                                        <span class="btn-txt">Daftar </span>
                                        <i class="fa fa fa-chevron-right"></i>
                                    </a>
                                    <form id="{{ $data->id }}" action="{{ route('daftarGuest', $data->id) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @else
                                    <a href="#" id="show-loginr" onclick="event.preventDefault(); confirmDaftar('{{ $data->id }}').submit();">
                                        <span class="btn-txt">Daftar </span>
                                        <i class="fa fa fa-chevron-right"></i>
                                    </a>
                                    <form id="{{ $data->id }}" action="{{ route('daftar', $data->id) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div style="border-top: 1px solid rgba(0, 0, 0, 0.4);display: flex; align-items: center;" class="services-icon-new">
                            {{-- <img src="{{ asset($data->admin ? $data->admin->image : $data->member->image) }}" alt=""> --}}
                            <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                            <span class="sub-text"><a href="{{ route('home.event.created-by', $data->admin ? $data->admin->id : $data->member->id) }}">{{ $data->admin ? 'AdminVT' : $data->member->name }}</a></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-12 text-center mt-70 md-mt-50">
            <div class="btn-part">
                <a class="readon btn-text ticket" href="{{ route('home.event.all') }}">
                    <span>View Event & Program All</span>
                </a>
            </div>
        </div>
    </div>


    <div class="contact-animation py-5">
        <div class="animate one">
            {{-- <img src="{{ asset('assets/images/contact/animation/1.png') }}" alt="Icons"> --}}
            <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
        </div>
        <div class="animate two">
            {{-- <img src="{{ asset('assets/images/contact/animation/2.png') }}" alt="Icons"> --}}
            <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
        </div>
        <div class="animate three">
            {{-- <img src="{{ asset('assets/images/contact/animation/3.png') }}" alt="Icons"> --}}
            <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
        </div>
        <div class="animate four">
            {{-- <img src="{{ asset('assets/images/contact/animation/4.png') }}" alt="Icons"> --}}
            <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
        </div>
    </div>
</div>

<!-- Team Section Start -->
<div class="rs-team style2 bg12 pt-110 pb-50 md-pt-70" id="app" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/11/bg4.jpg');">
    <div class="container">

        <div class="sec-title text-center mb-60 md-mb-40">
            <span class="sub-text">Collaraboration is nice</span>
            <h2 class="title black-color pb-35">
                Our Product Apps and Software
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row justify-content-center">
            @foreach ($product as $data)
            <div class="col-lg-3 col-md-6 mb-20">
                <div class="team-item">
                    <div class="team-inner-wrap">
                        <div class="images-wrap">
                            <a href="{{ route('app.detail', $data->id) }}">
                                {{-- <img src="{{ asset($data->image ?? 'virtual/assets/img/default.png') }}" alt="Team"> --}}
                                <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                            </a>
                        </div>
                        <div class="team-content">
                            <div class="rs-arrow">
                                <div class="curve"></div>
                                <div class="point"></div>
                            </div>
                            <h3 class="title-name text-limit-1"><a href="{{ route('app.detail', $data->id) }}" style="color: black;">{{ $data->title }}</a></h3>
                            <div class="team-title">{{ $data->admin ? $data->admin->name : $data->member->name }}</div>
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
        <div class="col-lg-12 text-center mt-70 md-mt-50">
            <div class="btn-part">
                <a class="readon btn-text ticket" href="{{route('app.index')}}">
                    <span>View Product All</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- sponsor industri -->
<div id="industri" class="rs-our-sponsor sponsor-home-style5 gray-bg5 pt-120 pb-80 md-pt-70 md-pb-80">
    <div class="container">
        <div class="all-grid-sponsors">
            <div class="sec-title text-center mb-20">
                <h2 class="title title3">
                    - Supporting Industry -
                </h2>
            </div>
            <div class="sponsor-logos">
                @foreach($sponsor as $data)
                <div class="item">
                    {{-- <img src="{{$data->image}}"> --}}
                    <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-12 text-center mt-70 md-mt-50">
            <div class="col-md-12">
                <div class="btn-part justify-content-betwen">
                    <a class="readon btn-text ticket mr-5" href="{{route('home.sponsor.all')}}">
                        <span>View All Industry</span>
                    </a>
                    <a class="readon btn-text ticket mr-5" href="{{route('home.sponsor.register')}}">
                        <span>Join Us</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end industri sponsor -->


<!-- sponsor asosiasi -->
<div id="partner" class="rs-partner sponsors-style pt-110 pb-110 md-pt-70 md-pb-0" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/11/bg11.jpg');">
    <div class="container">
        <div class="sec-title text-center mb-65">
            <span class="sub-text small">Our</span>
            <h2 class="title pb-35">
                Partner
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row no-gutters justify-content-center">
            @foreach($partner as $data)
            <div class="col-lg-2 col-md-4 col-sm-auto" data-aos="zoom-in" data-aos-delay="100" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
                <div class="grid-figure">
                    <div class="partner-img">
                        <a href="{{route('home.member.detail',$data->id)}}">
                            {{-- <img src="{{ asset($data->image) }}" alt="{{ asset($data->name) }}"> --}}
                            <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-lg-12 text-center mt-70 md-mt-50">
            <div class="btn-part">
                <a class="readon btn-text ticket" href="{{route('home.member.all')}}">
                    <span>View Member All</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- end sponsor asosiasi -->

@endsection



@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.sponsor-logos').slick({
        dots: true
        , infinite: true
        , autoplay: true
        , autoplaySpeed: 2000
        , speed: 300
        , slidesToShow: 1
        , centerMode: true
        , variableWidth: true
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
