.@extends('homepage.layout.main')

@section('meta_title', 'Web Desa Merdeka')
@section('meta_desc', "Mari terhubung bersama untuk menciptakan ekosistem dibidang pertanian, peternakan, perikanan, ekonomi, pendidikan, sosial budaya dan bidang lainnya bersama Desa Merdeka.")
@section('meta_image', asset('homepage/images/default.jpeg'))
@section('meta_url', URL::current())

@section('css')
    <link rel="stylesheet" href="{{ asset('homepage') }}/js/rev-slider/css/settings.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ asset('homepage') }}/js/rev-slider/css/layers.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ asset('homepage') }}/js/rev-slider/css/navigation.css" type='text/css' media='all' />
    <style>
        .button-background {
            padding-left: 50px;
            padding-right: 50px;
            background: rgba(0, 0, 0, 0) linear-gradient(160deg, #ff0066 0%, #d41872 50%, #a445b2 100%) repeat scroll 0% 0%;
        }

        .main-content {
            padding-bottom: 0px;
        }
    </style>
@endsection

@section('content_top')
    <div class="main-slider wf100">
        <div class="home2-slider rev_slider_wrapper">
            <div class="rev_slider_wrapper fullwidthbanner-container">
                <div id="rev-slider2" class="rev_slider fullwidthabanner">
                    <ul>
                        <li data-transition="fade">
                            <img src="{{ asset('homepage') }}/images/h3-slide1.jpg" alt="" width="1920"
                                height="685" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="175" data-transform_idle="o:1;"
                                data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <h1>Memoptimalkan<br>
                                        Potensi Desa</h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="345" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <p>Bukan pertanian yang kita tingkatkan dan kita bangun di setiap desa<br>
                                    melainkan potensi apa yang ada di desa yang kita bisa tingkatkan</p>
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="450" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box"> <a href="#" class="con">Gabung Sekarang</a>
                                </div>
                            </div>
                        </li>
                        <li data-transition="slidehorizontal"> <img src="{{ asset('homepage') }}/images/h3-slide2.jpg"
                                alt="" width="1920" height="685" data-bgposition="top center" data-bgfit="cover"
                                data-bgrepeat="no-repeat" data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="175" data-transform_idle="o:1;"
                                data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <h1>Membuka secara Luas<br>
                                        Perdagangan dan Pemasaran</h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="345" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <p>Melalui Desa Merdeka semua produk dan keunggulan desa dapat dipasarkan<br>
                                        ke seluruh Indonesia</p>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="450" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <a href="#" class="con">Learn More</a>
                                </div>
                            </div>
                        </li>
                        <li data-transition="slidevertical"> <img src="{{ asset('homepage') }}/images/h3-slide3.jpg"
                                alt="" width="1920" height="685" data-bgposition="top center"
                                data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="175" data-transform_idle="o:1;"
                                data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <h1>Gabung bersama komunitas<br>
                                        di Desa Merdeka</h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="345" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <p>Untuk meningkatkan kualitas produk maupun keunggulan desa,<br>
                                        semua akan menjadi satu ekosistem</p>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="450" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box"> <a href="#" class="con">Learn More</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')
    <section class="wf100 p60">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="local-brands">
                        <div class="title-style-1">
                            <h2>Desa Merdeka</h2>
                            <p>
                                Mari terhubung bersama untuk menciptakan ekosistem dibidang pertanian, peternakan,
                                perikanan, ekonomi, pendidikan, sosial budaya dan bidang lainnya. Semakin banyak yang
                                terhubung, semakin banyak kebaikan yang bisa dibuat. "Merdeka Desaku Merdeka Negeriku"
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <ul class="lb-ser-box">

                                    <!--Start-->
                                    <li> <span class="lb-icon"><img src="{{ asset('homepage') }}/images/local-icon1.png"
                                                alt=""></span>
                                        <h6>Desa Wisata</h6>
                                        <p>Program support untuk desa melalui pembangunan lokasi wisata yang disesuaikan
                                            dengan karakteristik desa </p>
                                    </li>
                                    <!--End-->

                                    <!--Start-->
                                    <li> <span class="lb-icon"><img src="{{ asset('homepage') }}/images/local-icon3.png"
                                                alt=""></span>
                                        <h6>Desa Sehat</h6>
                                        <p>Penerapan kerjasama dalam bidang kesehatan antara masayarakat desa dengan dinas
                                            kesehatan</p>
                                    </li>
                                    <!--End-->

                                    <!--Start-->
                                    <li> <span class="lb-icon"><img src="{{ asset('homepage') }}/images/local-icon6.png"
                                                alt=""></span>
                                        <h6>Desa Cerdas</h6>
                                        <p>Program solusi pendidikan di desa dalam pendidikan berbasis keahlian dan
                                            kebutuhan di industri. </p>
                                    </li>
                                    <!--End-->

                                </ul>
                            </div>
                            <!--Local Service Box End-->

                            <!--Local Service Box Start-->
                            <div class="col-md-6 col-sm-6">
                                <ul class="lb-ser-box">

                                    <!--Start-->
                                    <li> <span class="lb-icon"><img src="{{ asset('homepage') }}/images/local-icon2.png"
                                                alt=""></span>
                                        <h6>Desa Mandiri</h6>
                                        <p>Membangun ekosistem dan pusat bisnis di desa dibidang pertanian, peternakan dan
                                            UMKM</p>
                                    </li>
                                    <!--End-->

                                    <!--Start-->
                                    <li> <span class="lb-icon"><img src="{{ asset('homepage') }}/images/local-icon4.png"
                                                alt=""></span>
                                        <h6>Desa Hijau</h6>
                                        <p>Memakmurkan dan meneruskan budaya yang ada di desa agar tetap lestasi dan menjadi
                                            ciri khas suatu daerah</p>
                                    </li>
                                    <!--End-->

                                    <!--Start-->
                                    <li> <span class="lb-icon"><img src="{{ asset('homepage') }}/images/local-icon5.png"
                                                alt=""></span>
                                        <h6>Desa Digital</h6>
                                        <p>Membangun Digitalisasi desa melalui penerapan teknologi yang teruji dan sesuai
                                            dengna karakteristik desa</p>
                                    </li>
                                    <!--End-->

                                </ul>
                            </div>
                            <!--Local Service Box End-->

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--Mayor Msg Start-->
                    <div class="Mayor-msg">
                        <div class="Mayor-thumb">
                            <img src="{{ asset('homepage/images/relawanneed.jpg') }}" alt="">
                        </div>
                        <div class="Mayor-text">
                            <!-- <span>Ayo Jadi Relawan</span>-->
                            <h5>Pilih 01 untuk Desa Merdeka</h5>
                            <p>Ayo jadi bagian perubahan untuk memajukan desa di Kab Bandung dengan semangat Kolaborasi,<br>
                            Pasangan No 01 berkomitmen dalam memajukan semua sektor desa dengan berbagai program yang mendukung kesejahteraan masyarakat Desa</p>
                            <a href="#">BANDUNG MENAWAN</a>
                        </div>
                    </div>
                    <!--Mayor Msg End-->
                </div>
            </div>
        </div>
    </section>

    <section class="wf100 p80 fact-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style-1 white">
                        <h2>Data Update Desa Merdeka</h2>
                        <p>Info update stake holder Desa Merdeka </p>
                    </div>
                    <div class="row">
                        <ul class="counter">
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box">
                                    <i class="fas fa-flag"></i>
                                    <strong>{{ $desa }}</strong>
                                    <span>Desa</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"> <i class="fas fa-map-marked-alt"></i>
                                    <strong>{{ $umkm }}</strong>
                                    <span>UMKM</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"> <i class="fas fa-users"></i> <strong>
                                        {{ $c_produk }}
                                    </strong>
                                    <span>Produk</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"> <i class="fas fa-building"></i>
                                    <strong>{{ $komunitas }}</strong>
                                    <span>Asosiasi/Komunitas</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"> <i class="fas fa-road"></i> <strong>{{ $industri }}</strong>
                                    <span>Industri</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box">
                                    <i class="fas fa-briefcase"></i>
                                    <strong>
                                        {{ $c_users }}
                                    </strong>
                                    <span>Pengguna</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wf100 city-news p60">
        <div class="container">
            <div class="title-style-3">
                <h3>Berita Update Desa Merdeka</h3>
                <p>Ayo baca berita maupun artikel yang bermanfaat dari desa di Indonesia </p>
            </div>
            <div class="row">
                @foreach ($blog as $data) 
                <div class="col-md-3 col-sm-6" style="padding-bottom: 15px;">
                    <div class="news-box">
                        <div class="new-thumb">
                            <span class="cat c1">
                                @foreach ($data['category'] as $item)
                                    {{ $item->meta_name->name }}
                                @endforeach
                            </span>
                            @if (file_exists($data->image))
                                <img src="{{ asset($data->image) }}" : alt="">
                            @else
                                <img src="{{ asset('homepage') }}/images/h3citynews-1.jpg" alt="">
                            @endif
                            
                        </div>
                        <div class="new-txt">
                            <ul class="news-meta">
                                <li>
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data['created_at'])->isoFormat('dddd, DD MMMM YYYY | HH:mm:ss') }}
                                </li>
                            </ul>
                            <h6>
                                <a href="{{ route('home.blog.detail', $data['id']) }}">
                                    {{ limitString($data['title'], 30) }}
                                </a>
                            </h6>
                            <p>
                                {!! limitString($data['desc'], 100) !!}
                            </p>
                        </div>
                        <div class="news-box-f">
                            @php $type = $data->admin ? 'admin' : 'member'; @endphp
                            @if (file_exists($data->{$type}->image))
                                <img src="{{ asset($data->{$type}->image) }}" : alt="">
                            @else
                                <img src="{{ asset('homepage/images/tuser2.jpg') }}">
                            @endif
                            
                            {{ $data->{$type}->name }}
                            <a href="{{ route('home.blog.detail', $data['id']) }}">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <center>
                <a href="{{ route('home.blog.all') }}" class="btn btn-primary btn-lg button-background">
                    Lihat Semua Berita
                </a>
            </center>
        </div>
    </section>

    <section class="wf100 p75-50  depart-info">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="title-style-3">
                        <h3>UMKM & Komunitas/Asosiasi</h3>
                        <p>Daftar UMKM, Komunitas, Asosisasi, Industri yang terlah terhubung di Desa Merdeka</p>
                    </div>
                    <div class="row">
                        @foreach ($member_data as $item)
                            <div class="col-md-4 col-sm-4">
                                <div class="deprt-icon-box">
                                    @if (file_exists($data->image))
                                        <img src="{{ asset($item->image) }}" : alt="">
                                    @else
                                        <img src="{{ asset('homepage') }}/images/newsg4.jpg" alt="">
                                    @endif
                                    <h6>
                                        <a href="#">
                                            {{ limitString($item->name, 30) }}
                                        </a>
                                    </h6>
                                    <a class="rm" href="{{ route('home.member.detail', $item->id) }}">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="latest-updates">
                        <h6>Lowongan Kerja
                            <img src="{{ asset('homepage') }}/images/newsicon.png" alt="">
                        </h6>
                        <ul>
                            @foreach ($lowongan as $item)
                                <li>
                                    <strong>
                                        <a href="{{ route('home.blog.detail', $item->blog->id) }}">
                                            {{ $item->blog->title }}
                                        </a>
                                    </strong>
                                    <span class="post-date">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->isoFormat('dddd, DD MMMM YYYY | HH:mm:ss') }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wf100 p75 recent-events">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3>Recent Events</h3>
                    <div class="recent-event-block">
                        <!--Slider Big Slider Start-->
                        <div class="recent-event-slider">
                            @foreach ($event as $item)
                                <div class="event-big">
                                    <div class="event-cap">
                                        <h5>
                                            <a href="{{ route('home.event.detail', $item->id) }}">
                                                {{ $item->title }}
                                            </a>
                                        </h5>
                                        <p>
                                            {!! limitString($item->desc, 250) !!}
                                        </p>
                                    </div>
                                    @if (file_exists($item->images?->first()->image))
                                        <img src="{{ asset('/' . $item->images->first()->image) }}">
                                    @else
                                        <img src="{{ asset('homepage') }}/images/rec-event1.jpg" alt="">
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="recent-event-slider-nav">
                            @foreach ($event as $item)
                            <div>
                                @if (file_exists($item->image))
                                    <img src="{{ asset('/' . $item->image) }}">
                                @else
                                    <img src="{{ asset('homepage') }}/images/rec-event-small1.jpg" alt="">
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <!--Slider Big Slider Nav-->
                    </div>
                </div>
                <div class="col-md-7">
                    <h3>Upcoming Schedules</h3>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#Events" aria-controls="Events" role="tab" data-toggle="tab">
                                Next Events
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="Events">
                            <!--Event List Start-->
                            @forelse ($next_event as $item)
                                <ul class="event-list">
                                    <li>
                                        <strong class="edate">
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i', $item->start_datetime)->isoFormat('D MMM, YYYY') }}
                                        </strong>
                                        <strong class="etime">
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i', $item->start_datetime)->format('H:i') }}
                                        </strong>
                                    </li>
                                    <li>
                                        @if (file_exists($item->image))
                                            <img src="{{ asset('/' . $item->image) }}" style="width: 80px" alt="">
                                        @else
                                            <img src="{{ asset('homepage') }}/images/upce-1.jpg" alt="">
                                        @endif
                                    </li>
                                    <li class="el-title">
                                        <h6>
                                            <a href="#">
                                                {{ limitString($item->title, 30) }}
                                            </a>
                                        </h6>
                                        <p>
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ limitString($item->address, 50) }}
                                        </p>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.event.detail', $item->id) }}" class="joinnow">
                                          Join Now
                                        </a>
                                    </li>
                                </ul>
                            @empty
                                <center>
                                    <strong style="text-transform: uppercase">
                                        Belum Ada Event Terdekat
                                    </strong>
                                </center>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <center>
                <a href="{{ route('home.event.all') }}" class="btn btn-primary btn-lg button-background">
                    Lihat Semua Event
                </a>
            </center>
        </div>
    </section>

    <section class="wf100 p75-50  depart-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style-3">
                        <h3>Produk Desa Merdeka</h3>
                        <p>Berikut daftar produk / brand yang terdaftar di Desa Merdeka </p>
                    </div>
                    <div class="row">
                        @foreach ($product as $item)
                            <div class="col-md-3 col-sm-3">
                                <div class="deprt-icon-box">
                                    <img src="{{ $item->image ? (file_exists($item->image) ? asset($item->image) :  asset('/homepage/images/newsg4.jpg')) :  asset('/homepage/images/newsg4.jpg')}}" alt="">
                                    <h6>
                                        <a href="#">
                                            {{ limitString($item->title, 20) }}
                                        </a>
                                    </h6>
                                    <a class="rm" href="#">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wf100 p80 explore-community">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Program Desa Merdeka</h3>
                    <ul class="community-links-style-two">
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon1.png"
                                    alt=""> Desa Wisata </a> </li>
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon2.png"
                                    alt=""> Desa Ceria </a> </li>
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon3.png"
                                    alt=""> Desa Cerdas </a> </li>
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon4.png"
                                    alt=""> Desa Aman </a> </li>
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon5.png"
                                    alt=""> Desa Sehat </a> </li>
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon6.png"
                                    alt=""> Desa Terhubung </a> </li>
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon7.png"
                                    alt=""> Desa Mandiri </a> </li>
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon8.png"
                                    alt=""> Desa Berbudaya </a> </li>
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon9.png"
                                    alt=""> Desa Agamis </a> </li>
                        <li> <a href="#"> <img src="{{ asset('homepage') }}/images/excomm-icon10.png"
                                    alt=""> Desa Digital </a> </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Tim Desa Merdeka</h3>
                    <!--Team Slider Start-->
                    <div id="h3team-slider" class="owl-carousel owl-theme">
                        <!--Team Box Start-->
                        <div class="item">
                            <div class="h3-team-box">
                                <div class="team-info">
                                    <h6>Iman Ahmad Setyawan</h6>
                                    <strong>Founder Desa Merdeka</strong>
                                    <p> Iman adalah Founder Desa Merdeka, praktisi, pengusaha </p>
                                    <ul>
                                        <li><strong>Connect:</strong></li>
                                        <li><a href="https://www.facebook.com/imanastyawan"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/imanahmads"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://linkedin.com/in/imanastyawan"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="https://instagram.com/imanastyawan"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('homepage') }}/images/user2.jpg" alt="">
                            </div>
                        </div>
                        <!--Team Box Start-->
                        <!--Team Box Start-->
                        <div class="item">
                            <div class="h3-team-box">
                                <div class="team-info">
                                    <h6>Aslihan Burhan</h6>
                                    <strong>Praktisi Syariah</strong>
                                    <p> Pengawas Desa Syariah di Desa Merdeka </p>
                                    <ul>
                                        <li><strong>Connect:</strong></li>
                                        <li><a href="https://www.facebook.com/profile.php?id=100069086294390"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('homepage') }}/images/user3.jpg" alt="">
                            </div>
                        </div>
                        <!--Team Box Start-->
                        <!--Team Box Start-->
                        <div class="item">
                            <div class="h3-team-box">
                                <div class="team-info">
                                    <h6>Endang Aprillia</h6>
                                    <strong>Praktisi Pelatihan</strong>
                                    <p> Berpengalaman dalam bidang pelatihan hingga sertifikasi </p>
                                    <ul>
                                        <li><strong>Connect:</strong></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('homepage') }}/images/user4.jpg" alt="">
                            </div>
                        </div>
                        <!--Team Box Start-->
                        <!--Team Box Start-->
                        <!-- <div class="item">
                            <div class="h3-team-box">
                                <div class="team-info">
                                    <h6>Dean Richard</h6>
                                    <strong>Assistant Mayor</strong>
                                    <p> Stephen is very Compitent person who assist to Mayor of the City. </p>
                                    <ul>
                                        <li><strong>Connect:</strong></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <img src="{{ asset('homepage') }}/images/h3-team2.jpg" alt="">
                            </div>
                        </div> -->
                        <!--Team Box Start-->
                    </div>
                    <!--Team Slider End-->
                </div>
            </div>
        </div>
    </section>

    <section class="wf100 p75-50  depart-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style-3">
                        <h3>Partner</h3>
                        <p>Pihak-pihak yang telah berkenan menjadi mitra Desa Merdeka</p>
                    </div>
                    <div class="row">
                        @foreach ($sponsor as $p)
                            <div class="col-md-3 col-sm-3">
                                <div class="deprt-icon-box">
                                    @if (file_exists($p->image))
                                        <img src="{{ asset('/' . $p->image) }}" alt="">
                                    @else
                                        <img src="{{ asset('homepage') }}/images/newsg4.jpg" alt="">
                                    @endif
                                    <h6>
                                        <a href="#">
                                            {{ limitString($p->name, 30) }}
                                        </a>
                                    </h6>
                                    <a class="rm" href="{{ route('partner.detail', $p->id) }}">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>

    <section class="wf100 home3 emergency-numbers">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-5">
                    <div class="newsletter-form">
                        <h5>Punya pertanyaan, saran, atau kritik?</h5>
                        <form  method="post" action="{{ route('contact.send') }}">
                                @csrf
                                <ul class="row">
                                    <li class="col-md-6">
                                        <input type="text" name="name" placeholder="Your Name" class="form-control">
                                    </li>
                                    <li class="col-md-6">
                                        <input type="email" name="email" placeholder="Your Email" class="form-control">
                                    </li>
                                    <li class="col-md-12" style="padding-left: 5px; padding-right: 5px;">
                                        <textarea style="line-height: inherit; padding : 20px; height:95px" class="form-control" id="message" name="message" placeholder="Message Here" required=""></textarea>
                                    </li>
                                    <li class="col-md-6">
                                      <button style="float: left;">Kirim Email</button>  
                                    </li>
                                </ul>
                            </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-7">
                    <div class="e-numbers">
                        <h5>Nomor Emergency</h5>
                        <p>Telpon no dibawah ini jika anda dalam kondisi emergency</p>
                        <div class="info-num"> <strong>Informasi Update</strong>
                            <h3>Klik Saja</h3>
                        </div>
                        <ul class="row">
                            <li class="col-md-4 col-sm-4">
                                <div class="em-box"> <i class="fas fa-user-secret"></i> <strong
                                        class="em-num">110</strong> <strong class="em-deprt">Kantor<br>
                                        Polisi</strong> </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="em-box"> <i class="fas fa-ambulance"></i> <strong class="em-num">119</strong>
                                    <strong class="em-deprt"> Layanan
                                        Ambulance</strong>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="em-box"> <i class="fas fa-fire-extinguisher"></i> <strong
                                        class="em-num">113</strong> <strong class="em-deprt">Pemadam
                                        Kebakaran</strong> </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Departments & Information Desk Start-->
    {{-- <section class="wf100 p75-50  depart-info">
                                                        <div class="container">
                                                          <div class="row">
                                                            <div class="col-md-12">
                                                              <div class="title-style-3">
                                                                <h3>Why Join Desa Merdeka</h3>
                                                                <p>Join Ke Desa Merdeka</p>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                  <div class="community-box mb30">
                                                                    <h6>Agriculture &amp; Food</h6>
                                                                    <ul>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Farming Sector
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Agri Industry Development
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Forestry
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Rural Environment
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Food Safety
                                                                        </a>
                                                                      </li>
                                                                    </ul>
                                                                    <a class="see-more" href="#">
                                                                      See More
                                                                    </a>
                                                                    <span>
                                                                      <img src="images/ccc-icon1.png" alt="">
                                                                    </span>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-6">
                                                                  <div class="community-box mb30">
                                                                    <h6>Agriculture &amp; Food</h6>
                                                                    <ul>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Farming Sector
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i>Agri Industry Development
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Forestry
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Rural Environment
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Food Safety
                                                                        </a>
                                                                      </li>
                                                                    </ul>
                                                                    <a class="see-more" href="#">
                                                                      See More
                                                                    </a>
                                                                    <span>
                                                                      <img src="images/ccc-icon1.png" alt="">
                                                                    </span>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-6">
                                                                  <div class="community-box mb30">
                                                                    <h6>Agriculture &amp; Food</h6>
                                                                    <ul>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Farming Sector
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i>Agri Industry Development
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Forestry
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Rural Environment
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Food Safety
                                                                        </a>
                                                                      </li>
                                                                    </ul>
                                                                    <a class="see-more" href="#">
                                                                      See More
                                                                    </a>
                                                                    <span>
                                                                      <img src="images/ccc-icon1.png" alt="">
                                                                    </span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-md-4 col-sm-6">
                                                                  <div class="community-box mb30">
                                                                    <h6>Agriculture &amp; Food</h6>
                                                                    <ul>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Farming Sector
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Agri Industry Development
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Forestry
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Rural Environment
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Food Safety
                                                                        </a>
                                                                      </li>
                                                                    </ul>
                                                                    <a class="see-more" href="#">
                                                                      See More
                                                                    </a>
                                                                    <span>
                                                                      <img src="images/ccc-icon1.png" alt="">
                                                                    </span>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-6">
                                                                  <div class="community-box mb30">
                                                                    <h6>Agriculture &amp; Food</h6>
                                                                    <ul>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Farming Sector
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i>Agri Industry Development
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Forestry
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Rural Environment
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Food Safety
                                                                        </a>
                                                                      </li>
                                                                    </ul>
                                                                    <a class="see-more" href="#">
                                                                      See More
                                                                    </a>
                                                                    <span>
                                                                      <img src="images/ccc-icon1.png" alt="">
                                                                    </span>
                                                                  </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-6">
                                                                  <div class="community-box mb30">
                                                                    <h6>Agriculture &amp; Food</h6>
                                                                    <ul>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Farming Sector
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i>Agri Industry Development
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Forestry
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Rural Environment
                                                                        </a>
                                                                      </li>
                                                                      <li>
                                                                        <a href="#">
                                                                          <i class="fas fa-circle"></i> Food Safety
                                                                        </a>
                                                                      </li>
                                                                    </ul>
                                                                    <a class="see-more" href="#">
                                                                      See More
                                                                    </a>
                                                                    <span>
                                                                      <img src="images/ccc-icon1.png" alt="">
                                                                    </span>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </section>
                                                      
                                                      <section class="wf100 city-news p75">
                                                        <div class="container">
                                                          <div class="title-style-3">
                                                            <h3>Event dan Program Desa Merdeka</h3>
                                                            <p>Venue</p>
                                                          </div>
                                                          <div class="row">
                                                            @foreach ($event->skip(3)->sortByDesc('created_at') as $data)
                                                            <div class="col-md-4 col-sm-6">
                                                              <div class="news-box">
                                                                <div class="new-thumb">
                                                                  <span class="cat c1">
                                                                    {{ limitString($data->subtitle, 18) }}
                                                                  </span>
                                                                  <img src="{{ url('/image/logo.png') }}" style="width: 100%; height: 300px;"
                                                                  alt="">
                                                                </div>
                                                                <div class="new-txt">
                                                                  <ul class="news-meta">
                                                                    <li>
                                                                      {{ $data->start_datetime }}
                                                                    </li>
                                                                  </ul>
                                                                  <h6>
                                                                    <a href="#">
                                                                      {{ limitString($data->title, 16) }}
                                                                    </a>
                                                                  </h6>
                                                                  <p>
                                                                    {{ limitString($data->address, 25) }}
                                                                  </p>
                                                                </div>
                                                                <div class="news-box-f">
                                                                  <a href="{{ route('home.event.detail', $data->id) }}">
                                                                    <i class="fas fa-arrow-right"></i>
                                                                  </a>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            @endforeach
                                                            <center>
                                                              <br>
                                                              <a href="{{ route('home.event.all') }}" class="btn btn-primary btn-lg button-background"
                                                              style="margin-top: 50px;">
                                                              View Event & Program All
                                                            </a>
                                                          </center>
                                                        </div>
                                                      </div>
                                                    </section> --}}
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('homepage') }}/js/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{ asset('homepage') }}/js/rev-slider/js/jquery.themepunch.revolution.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('homepage') }}/js/rev-slider.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
@endsection
