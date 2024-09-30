@extends('homepage.layout.main')


@section('css')
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/settings.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/layers.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/navigation.css" type='text/css' media='all' />
    <style>
        .contact-map-middle {
            /* position: relative; */
            width: 100%;
            top: 50px;
        }

        .mini-map-cover {
            height: 520px;
            width: 100%;co
            object-fit: cover;
        }

        .img-UMKM:hover,
        .partner-img:hover {
            -ms-transform: scale(1.2);
            /* IE 9 */
            -webkit-transform: scale(1.2);
            /* Safari 3-8 */
            transform: scale(1.2);
        }

        .kotak {
            width: 95%;
            /* Sesuaikan lebar sesuai kebutuhan */
            height: 500px;
            /* Sesuaikan tinggi sesuai kebutuhan */
            margin: 20px;
            border: 1px solid #ccc;
        }

        .slider-wrapper {
            display: inline-block;
            /* Membuat div menjadi inline-block */
            min-width: auto;
            /* Menyusun ukuran minimum lebar sesuai isi konten */
            min-height: auto;
            /* Menyusun ukuran minimum tinggi sesuai isi konten */
        }

        .gallery{
            background-color: white;
            color: #40407e;
        }
    </style>
@endsection

@section('content_top')
    <!--Sub Header Start-->
    {{-- <section class="wf100 subheader" style="background: url({{ asset($member->banner_image) }}) no-repeat;"> --}}
    <section class="wf100 subheader">
        <div class="container">
            <h2>{{ $member->name }}</h2>
            <ul>
                <li> <a href="index.html">Home</a> </li>
                <li> <a href="#"> Member</a> </li>
                <li> {{ $member->name }}</li>
            </ul>
        </div>
    </section>
    <!--Sub Header End-->
@endsection


@section('content')
    <!-- Team Detials Start -->
    <div class="team-details">
        <div class="container">
            <div class="row">
                <div class="team-details-txt m90">
                    <div class="col-md-5">
                        <div class="team-img"> <img src="{{ $member->image ? (file_exists($member->image) ? asset($member->image) : asset('/homepage/images/team-large.jpg')) : asset('/homepage/images/team-large.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="team-detail">
                            <h2>{{ $member->name }}</h2>
                            <strong class="advisor">{{ $member->member_type->name }}</strong>
                            {!! $member->desc !!}
                            <a class="contact-team" href="#kontak">Contact</a>
                            <ul class="member-social">
                                <li> Get Connect: </li>
                                <li> <a class="fb" href="{{ urlCheck($member->fb_url) }}"><i
                                            class="fab fa-facebook-f"></i></a> <a class="tw"
                                        href="{{ urlCheck($member->twitter_url) }}"><i class="fab fa-twitter"></i></a><a
                                        class="insta" href="{{ urlCheck($member->ig_url) }}"><i
                                            class="fab fa-instagram"></i></a> <a class="yt"
                                        href="{{ urlCheck($member->website_url) }}"><i class="fas fa-globe"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Team Detials End -->
    <!--News-->
    <section class="wf100 city-news p75">
        <div class="container">
            <div class="title-style-3">
                <h3>Products</h3>
                <p>Read the News Updates and Articles about Government </p>
            </div>
            <div class="team-grid official-members">
                <div class="container">
                    <div class="row">
                        <!--Team Box Start-->
                        @foreach ($product as $data)
                            <div class="col-md-4 col-sm-7">
                                <div class="team-box">
                                    <div class="team-thumb"> <a href="{{ route('app.detail', $data->id) }}"><i
                                                class="fas fa-link"></i></a> <img
                                            src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/team1.jpg')) : asset('/homepage/images/team1.jpg') }}" alt=""></div>
                                    <div class="team-txt">
                                        <h5 style="font-size: 16pt">{{ $data->title }}</h5>
                                        <strong class="dep">{{ $data->member->name }}</strong>
                                        <ul class="team-social">
                                            <li><em>Connect:</em></li>
                                            <li><a href="{{ urlCheck($data->fb_url) }}"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{ urlCheck($data->ig_url) }}"><i
                                                        class="fab fa-instagram"></i></a></li>
                                            <li><a href="{{ urlCheck($data->yt_url) }}"><i class="fab fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--Team Box End-->
                    </div>
                </div>
                <!--Team End-->
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="contact-team" style=" float: none; padding: 18px 50px;"
                        href="{{ route('app.created-by', $member->id) }}">View All</a>
                </div>
            </div>
        </div>
    </section>
    <!--News end-->
    <!--Cityscapes & Highlights Start-->
    <section class="wf100 p80 city-highlights ">
        <div class="container">
            <div class="title-style-1 text-center white-text">
                <h2>Gallery Photos & Videos</h2>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a class="contact-team gallery" style=" float: none; padding: 14px 50px;"
                            href="{{ route('home.gallery.created-by', $member->id) }}">View All</a>
                    </div>
                </div>
                {{-- <p>Form the beginning of a new paragraph marks a change of topic or a step in the development of an argument
                    or of a story. In writing essays or other compositions to include.</p> --}}
            </div>
        </div>
        <div class="container-fluid">
            <div id="highlight-slider" class="owl-carousel owl-theme">
                <!--Item Start-->
                @foreach ($gallery as $data)
                    <div class="item">
                        {{-- <div class="gallery-thumb"> <a href="{{ asset('/homepage/images/gallery/gallery-m1.jpg') }}" data-rel="prettyPhoto[gallery]"><i class="fas fa-search"></i></a> <img src="images/gallery/gallery-m1.jpg" alt=""> </div> --}}
                        <div class="ch-box">
                            <div class="ch-thumb"> <a href="{{ asset('/homepage/images/highlights-img1.jpg') }}"
                                    data-rel="prettyPhoto[gallery]"><i class="fas fa-search"></i></a> <img
                                    src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/highlights-img1.jpg')) : asset('/homepage/images/highlights-img1.jpg') }}" alt=""> </div>
                            <div class="ch-txt">
                                <h5><a title="{{ $data->title }}" href="#">{{ Str::limit($data->title, 30) }}</a>
                                </h5>
                                <ul>
                                    <li><a href="#"><i class="far fa-image"></i> {{ $data->images->count() }}
                                            Photos</a></li>
                                    <li><a href="#"><i class="fas fa-play-circle"></i> {{ $data->videos->count() }}
                                            Videos</a></li>
                                </ul>
                                {{-- <p>Aliquam facilisis lacus at risus condimentum, vitae auctor felis.</p> --}}
                                {!! Str::limit($data->desc, 50) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--Item End-->
            </div>
        </div>
    </section>
    <!--Cityscapes & Highlights End-->
    <!--Govt. Services & Informations  Start-->
    <section class="wf100 {{ $gallery->count() > 0 ? 'pb80' : 'p80' }}">
        <div class="container">
            <div class="row">
                <div class="title-style-2 wf100">
                    <div class="col-md-4 col-sm-6">
                        <h2>{{ $member->name }} Services</h2>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p>Form the beginning of a new paragraph marks a change of topic or a step in the development of an
                            argument or of a story. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <!--Department Box Start-->
                        @foreach ($service as $index => $data)
                            <div class="col-md-3 col-sm-3">
                                <div class="department-box mb30 c{{ $index + 1 }}">
                                    <h6>{{ $data->title }}</h6>
                                    <div style="padding: 15px; height:150px;">
                                        {!! $data->content !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--Department Box End-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Govt. Services & Informations  End-->
    <!--Facts About City Start-->
    @if ($member->member_type->name == 'Desa')
        <section class="wf100 p80 fact-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-style-1 white">
                            <h2>Facts & Figures</h2>
                            <p>Form the beginning of a new paragraph marks a change of topic or a step in the development of
                                an
                                argument or of a story. </p>
                        </div>
                        <div class="row">
                            <ul class="counter">
                                <li class="col-md-4 col-sm-4">
                                    <div class="fact-box"> <i class="fas fa-flag"></i>
                                        <strong>{{ $counter['umkm'] }}</strong>
                                        <span>UMKM</span>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <div class="fact-box"> <i class="fas fa-map-marked-alt"></i>
                                        <strong>{{ $counter['service'] }}</strong>
                                        <span>Layanan & Solusi</span>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <div class="fact-box"> <i class="fas fa-users"></i>
                                        <strong>{{ $counter['product'] }}</strong> <span>Produk</span>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <div class="fact-box"> <i class="fas fa-building"></i>
                                        <strong>{{ $counter['news'] }}</strong> <span>News & Artikel</span>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <div class="fact-box"> <i class="fas fa-briefcase"></i>
                                        <strong>{{ $counter['event'] }}</strong> <span>Event & Program</span>
                                    </div>
                                </li>
                                <li class="col-md-4 col-sm-4">
                                    <div class="fact-box"> <i class="fas fa-road"></i>
                                        <strong>{{ $sponsor->count() }}</strong> <span>Partner</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <!--Stay Connected Start-->
                        <div class="stay-connected">
                            <h5>Stay Connected</h5>
                            <p>Signup to get the updates on email from the city & town affairs!</p>
                            <ul>
                                <li>
                                    <input type="text" class="form-control" placeholder="Enter Your Name">
                                </li>
                                <li>
                                    <input type="text" class="form-control" placeholder="Enter Your Email Address">
                                </li>
                                <li>
                                    <input type="submit" value="Submit Details">
                                </li>
                            </ul>
                        </div>
                        <!--Stay Connected End-->
                    </div> --}}
                </div>
            </div>
        </section>
    @endif
    <!--Facts About City End-->
    <!--City Officials Team Start-->
    <section class="wf100 p80-p50 city-team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style-1 text-center">
                        <h2>Our Partner</h2>
                        <p>Form the beginning of a new paragraph marks a change of topic or a step in the development of an
                            argument or of a story. In writing essays or other compositions to include.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($sponsor as $data)
                    <div class="col-md-6">
                        <div class="team-box">
                            <div class="team-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
                                    src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/cteam1.jpg')) : asset('/homepage/images/cteam1.jpg') }}" alt=""></div>
                            <div class="team-txt">
                                <h5>{{ $data->name }}</h5>
                                {{-- <strong class="dep">Assistant Mayor</strong> --}}
                                {!! Str::limit($data->desc, 50, '...') !!}
                                <ul class="team-social">
                                    <li><em>Connect:</em></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="row">
                <div class="col-md-12">
                    <a class="contact-team" style=" float: none; padding: 18px 50px;" href="{{ route('app.created-by', $member->id) }}">View All</a>
                </div>
            </div>  --}}
        </div>
    </section>
    <!--City Officials Team End-->
    <!--Departments & Information Desk Start-->
    @if ($member->member_type->name == 'Desa')
        <section class="wf100 p75-50  depart-info">
            <div class="container">
                <div class="title-style-3">
                    <h3>UMKM {{ $member->name }}</h3>
                    <p>Read the News Updates and Articles about Government </p>
                </div>
                <div class="row">
                    <!--Icon Box Start-->
                    @foreach ($umkm as $item)
                        @if ($item->user->hasPermissionTo('approved'))
                            <div class="col-md-4 col-sm-4">
                                <div class="deprt-icon-box"> <img src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/deprticon1.png')) : asset('/homepage/images/deprticon1.png') }}"
                                        alt="">
                                    <h6> <a href="{{ route('home.member.detail', $item->id) }}">{{ $item->name }}</a>
                                    </h6>
                                    <a class="rm" href="{{ route('home.member.detail', $item->id) }}">Read More</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!--Icon Box End-->
                </div>
            </div>
        </section>
    @endif
    <!--Departments & Information Desk End-->
    <!--Departments & Information Desk Start-->
    <section class="wf100 p75-50  city-news">
        <div class="container">
            <div class="title-style-3">
                <h3>Events & Programs</h3>
                <p>Read the News Updates and Articles about Government </p>
            </div>
            <!--Events Start-->
            <div class="events-wrapper" style="background: none; padding: 40px 0px;">
                <div class="container">
                    <div class="row">
                        <!--Event Start-->
                        @foreach ($event as $data)
                            <div class="col-md-4 col-sm-6">
                                <div class="event-post">
                                    <div class="thumb"> <a href="{{ route('home.event.detail', $data->id) }}"><i
                                                class="fas fa-link"></i></a> <img
                                            src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/event-img2.jpg')) : asset('/homepage/images/event-img2.jpg') }}" alt=""></div>
                                    <div class="event-post-content">
                                        <div class="event-post-txt">
                                            <h5 style="font-size: 16pt"><a
                                                    href="{{ route('home.event.detail', $data->id) }}"
                                                    title="{{ $data->title }}">{{ Str::limit($data->title, 20) }}</a>
                                            </h5>
                                            <ul class="event-meta">
                                                <li><i class="far fa-calendar-alt"></i>
                                                    {{ date('d M Y', strtotime($data->start_datetime)) . ' - ' . date('d M Y', strtotime($data->end_datetime)) }}
                                                </li>
                                                <li><i class="far fa-clock"></i>
                                                    {{ date('h:i a', strtotime($data->start_datetime)) . ' - ' . date('h:i a', strtotime($data->end_datetime)) }}
                                                </li>
                                            </ul>
                                            {{-- <p>Explore art objects from six contemporary artists & designers that focus on
                                            function.</p> --}}
                                            {{ $data->subtitle }}
                                        </div>
                                        <div class="event-post-loc" title="{{ $data->address }}"> <i
                                                class="fas fa-map-marker-alt"></i>{{ Str::limit($data->address, 35) }}<a
                                                href="{{ route('home.event.detail', $data->id) }}"><i
                                                    class="fas fa-arrow-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--Event End-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="contact-team" style=" float: none; padding: 18px 50px;"
                        href="{{ route('home.event.created-by', $member->id) }}">View All</a>
                </div>
            </div>
            <!--Events End-->
        </div>

    </section>
    <!--Departments & Information Desk End-->
    <!--Departments & Information Desk Start-->
    <section class="wf100 p75-50  depart-info">
        <div class="container">
            <div class="title-style-3">
                <h3>News & Blog</h3>
                <p>Read the News Updates and Articles about Government </p>
            </div>
            <!--Events Start-->
            <div class="news-wrapper news-grid" style="background: none; padding: 40px 0px;">
                <div class="container">
                    <div class="row">
                        <!--Event Start-->
                        @foreach ($blog as $data)
                            
                            <!--News Box Start-->
                            <div class="col-md-3 col-sm-6">
                                @php
                                    $color = [
                                        'Animasi' => 'c1',
                                        'Games' => 'c2',
                                        'Internet of Things' => 'c3',
                                        'UMKM' => 'c4',
                                        'Edukasi' => 'c1',
                                        'Update Tech' => 'c2',
                                        'Event' => 'c3',
                                        'Kolaborasi' => 'c4',
                                        'StartUp' => 'c1',
                                    ];
                                @endphp
                                <div class="news-box">
                                    <div class="new-thumb">
                                        <span class="cat {{ $color['Event'] }}">{{  $data->category[0]->meta_name->name  }}</span> <img src="{{ $data->image ? (file_exists($data->image) ? asset($data->image): asset('/homepage/images/h3citynews-1.jpg')) : asset('/homepage/images/h3citynews-1.jpg') }}"
                                            alt="">
                                    </div>
                                    
                                    <div class="new-txt">
                                        <ul class="news-meta">
                                            <li>{{ date('d M Y', strtotime($data->created_at)) }}</li>
                                        </ul>
                                        <h6>
                                            <a href="{{ route('home.blog.detail', $data['id']) }}">
                                                {{ limitString($data->title, 30) }}
                                            </a>
                                        </h6>
                                        <p>
                                            {!! limitString($data->desc, 100) !!}
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
                            <!--News Box End-->
                        @endforeach
                        <!--Event End-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="contact-team" style=" float: none; padding: 18px 50px;"
                        href="{{ route('home.blog.created-by', $member->id) }}">View All</a>
                </div>
            </div>
            <!--Events End-->
        </div>
    </section>
    <!--Departments & Information Desk End-->
    <!--Testimonials Start-->
    <section class="testimonials-section wf100 p80 city-team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style-1 text-center">
                        <h2>Our Teams</h2>
                        <p style="background: none;border: none;padding-top: 0;">Form the beginning of a new paragraph
                            marks a change of topic or a step in the development of an
                            argument or of a story. In writing essays or other compositions to include.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="testimonials" class="owl-carousel owl-theme" data-autoplay="false">
                        <!--testimonials box start-->
                        @foreach ($team as $data)
                            <div class="item">
                                <div class="slider-wrapper">
                                    <div class="h3-team-box">
                                        <div class="team-info">
                                            <h5>{{ $data->name }}</h5>
                                            <strong>{{ $data->position }}</strong>
                                            {{-- <p> sStephen is very Compitent person who assist to Mayor of the City. </p> --}}
                                            <ul>
                                                <li><strong>Connect:</strong></li>
                                                <li><a href="{{ urlCheck($data->fb_url) }}"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="{{ urlCheck($data->ig_url) }}"><i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="{{ urlCheck($data->fb_url) }}"><i
                                                            class="fab fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                        <img src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/t3p-img1.jpg')) : asset('/homepage/images/t3p-img1.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--testimonials box End-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonials End-->
    <!-- Google Map with Contact Form -->
    <div class="wf100 p75-50  city-news" id="kontak" style="margin-bottom: -80px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-style-1 text-center">
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="add-box">
                        <h5>Get in Touch</h5>
                        <ul>
                            <li><i class="fas fa-phone"></i> <strong>Phone:</strong> {{ $member->phone }}</li>
                            <li><i class="fas fa-building"></i> <strong>Address:</strong> <br>
                                {{ $member->address }}
                            </li>
                            <li><i class="far fa-envelope"></i> <strong>Email:</strong> {{ $member->user->email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-sm-7">
                    <div class="map">
                        <iframe
                            src="{{ $member->gmap_url ?? asset('virtual/assets/img/location-not-available.png') }}"></iframe>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="kotak">
                        @if ($member->view_1_url)
                            <iframe src="{{ $member->view_1_url }}" width="100%" height="100%" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <img class="mini-map-cover"
                                src="{{ asset('virtual/assets/img/location-not-available-potrait.png') }}">
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="kotak">
                        @if ($member->view_2_url)
                            <iframe src="{{ $member->view_2_url }}" width="100%" height="100%" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <img class="mini-map-cover"
                                src="{{ asset('virtual/assets/img/location-not-available-potrait.png') }}">
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="kotak">
                        @if ($member->view_3_url)
                            <iframe src="{{ $member->view_3_url }}" width="100%" height="100%" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <img class="mini-map-cover"
                                src="{{ asset('virtual/assets/img/location-not-available-potrait.png') }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map with Contact Form End -->
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ url('/homepage') }}/js/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{ url('/homepage') }}/js/rev-slider/js/jquery.themepunch.revolution.min.js">
    </script>
    <script type="text/javascript" src="{{ url('/homepage') }}/js/rev-slider.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
@endsection
