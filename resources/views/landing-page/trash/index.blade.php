@extends('landing-page.layouts.main')

@section('title', 'Product')

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
                            <input type="search" placeholder="Cari..." name="s" class="search-input" value="">
                            <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                        </div>
                    </div>
                    <div class="categories mb-45">
                        <div class="widget-title">
                            <h3 class="title">Kategori Produk & Apps</h3>
                        </div>
                        <ul>
                            <li><a href="all" style="color: fuchsia;">All Produk & Apps</a></li>
                            <li><a href="animasi">Animasi</a></li>
                            <li><a href="software">Software</a></li>
                            <li><a href="mobile">Mobile & App</a></li>
                            <li><a href="game">Games</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 md-mb-50">
                <h2 align="start">ALL PRODUK & APPS</h2>
                <div class="counter-list">
                    <div class="counter-text plus" style="display: flex;">
                        <h5 align="start" class="title" style="display: flex;margin-top: 24px;">Jumlah All Produk & Apps :</h5>
                        <div class="rs-count fs-4" style="margin-left: 10px;margin-top: 20px;font-weight: bold;color: black;"> 30</div>
                    </div>
                </div>
                <div class="rs-team style2 bg30 pt-60 pb-50 md-pt-70">
                    <div class="container">
                        <div class="row">
                            <div class="events-schedule-contents tab-content schedule-one">
                                <div class="tab-pane events-shedule-des active show" id="sunday">
                                    <div class="row">
                                        @foreach ($product as $data)
                                        <div class="col-lg-4 col-md-6 mb-50" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item">
                                                <div class="team-inner-wrap">
                                                    <div class="images-wrap">
                                                        <a href="{{route('app.detail')}}"><img src="{{asset($data->image)}}" alt="Team" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rs-arrow">
                                                            <div class="curve"></div>
                                                            <div class="point"></div>
                                                        </div>
                                                        <h3 class="title-name"><a href="game/1" style="color: black;">{{ $data->title }}</a></h3>
                                                        <ul class="social-icons">
                                                            <li><a href="#"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-twitter" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-tiktok" style="color: black;"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane events-shedule-des" id="monday">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 mb-20" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item">
                                                <div class="team-inner-wrap">
                                                    <div class="images-wrap">
                                                        <a href="software/5"><img src="{{asset('assets/images/img-app/software/vscode.png')}}" alt="Team" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rs-arrow">
                                                            <div class="curve"></div>
                                                            <div class="point"></div>
                                                        </div>
                                                        <h3 class="title-name"><a href="software/5" style="color: black;">Visual Studio Code</a></h3>
                                                        <div class="team-title" style="color: fuchsia;">Software</div>
                                                        <ul class="social-icons">
                                                            <li><a href="#"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-twitter" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-tiktok" style="color: black;"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-20" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item">
                                                <div class="team-inner-wrap">
                                                    <div class="images-wrap">
                                                        <a href="software/3"><img src="{{asset('assets/images/img-app/software/kotlin.png')}}" alt="Team" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rs-arrow">
                                                            <div class="curve"></div>
                                                            <div class="point"></div>
                                                        </div>
                                                        <h3 class="title-name"><a href="software/3" style="color: black;">Bahasa Pemrograman Kotlin</a></h3>
                                                        <div class="team-title" style="color: fuchsia;">Software</div>
                                                        <ul class="social-icons">
                                                            <li><a href="#"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-twitter" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-tiktok" style="color: black;"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-20" style="box-shadow: 0px 6px 25px 0px #eee;">
                                            <div class="team-item">
                                                <div class="team-inner-wrap">
                                                    <div class="images-wrap">
                                                        <a href="software/1"><img src="{{asset('assets/images/img-app/software/dart.png')}}" alt="Team" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rs-arrow">
                                                            <div class="curve"></div>
                                                            <div class="point"></div>
                                                        </div>
                                                        <h3 class="title-name"><a href="software/1" style="color: black;">Google Fuchsia Dart</a></h3>
                                                        <div class="team-title" style="color: fuchsia;">Software</div>
                                                        <ul class="social-icons">
                                                            <li><a href="#"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-twitter" style="color: black;"></i></a></li>
                                                            <li><a href="#"><i class="fa-brands fa-tiktok" style="color: black;"></i></a></li>
                                                        </ul>
                                                    </div>
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
<!-- Main content End -->

<!-- Footer Start -->

<!-- Footer End -->

<!-- start scrollUp  -->
<div id="scrollUp" class="orange-color">
    <i class="fa fa-angle-up"></i>
</div>
<!-- End scrollUp  -->


<!-- Search Modal Start -->
<div class="modal fade search-modal" id="searchModal" tabindex="-1">
    <button type="button" class="close" data-bs-dismiss="modal">    
        <span class="flaticon-cross"></span>
    </button>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="search-block clearfix">
                <form>
                    <div class="form-group">
                        <input class="form-control" placeholder="Search Here..." type="text">
                        <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection