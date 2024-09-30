@extends('landing-page.layouts.main')

@section('title', 'Member')

@section('css')

@endsection

@section('content')
<!--Full width header End-->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner" style="height: 100%;transition: transform 0.5s ease, opacity .1s ease-out;">
        <div class="carousel-item active">
            <img src="{{asset('assets/')}}/images/img-tekno/slider/slide2-tp.png" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/')}}/images/img-tekno/slider/slide3-tp.png" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/')}}/images/img-tekno/slider/slide1-tp.png" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
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
<div class="rs-inner-blog rs-events-schedule our-event  pt-120 md-pt-80">
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
                            <h3 class="title">Tipe</h3>
                        </div>
                        <ul>
                            <li><a href="all" style="color: #fa0368;">All</a></li>
                            @foreach($member_type as $data)
                            <li><a href="{{route('home.member.type',$data->id)}}">{{ $data->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 md-mb-50 rs-counter about-style home-style2">
                <h2 align="start">{{$title}}</h2>
                <div class="counter-list">
                    <div class="counter-text plus" style="display: flex;">
                        <h5 align="start" class="title" style="display: flex;margin-top: 24px;">Jumlah :</h5>
                        <div class="rs-count fs-4" style="margin-left: 10px;"> {{ $count }}</div>
                    </div>
                </div>
                <div id="rs-team" class="rs-team style3 pt-40 md-pt-80">
                    <div class="container">
                        <div class="row">
                            <div class="events-schedule-contents tab-content schedule-one">
                                <div class="tab-pane events-shedule-des active show" id="sunday">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            @foreach($member as $data)
                                            <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                                <div class="team-item" style="height: 100%;">
                                                    <div class="team-img" style="height: 100%;">
                                                        <a href="{{ route('home.member.detail', $data->id) }}"><img src="{{asset($data->image)}}" alt="{{asset($data->image)}}" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="team-info">
                                                            <div class="name" style="font-size: 15px;">
                                                                <a href="{{ route('home.member.detail', $data->id) }}">{{ $data->name }}</a>
                                                            </div>
                                                            <span class="post">{{ $data->type_name}}</span>
                                                        </div>
                                                        <ul class="social-icon">
                                                            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane events-shedule-des" id="monday">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="/detail_member/acci"><img src="{{asset('assets/images/img-sponsor/acci.png')}}" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="/detail_member">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="/detail_member/aibi"><img src="{{asset('assets/images/img-sponsor/aibi.png')}}" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="/detail_member/aibi">Aibi</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane events-shedule-des" id="friday">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="/detail_member"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="/detail_member">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item" style="height: 100%;">
                                                <div class="team-img" style="height: 100%;">
                                                    <a href="speaker-single.html"><img src="{{asset('assets/')}}//images/team/1.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                </div>
                                                <div class="team-content">
                                                    <div class="team-info">
                                                        <div class="name" style="font-size: 15px;">
                                                            <a href="speaker-single.html">Lorem, ipsum.</a>
                                                        </div>
                                                        <span class="post">Desa</span>
                                                    </div>
                                                    <ul class="social-icon">
                                                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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