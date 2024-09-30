@extends('landing-page.layouts.main')

@section('title', 'Product Apps & Software')

@section('css')
<style>
    .images-wrap{
        height: 215px !important;
        width: 215px !important;
        display: flex !important;
        align-items: center !important;
        background-color: white !important;
        margin: auto;
    }

    .rs-team.style2 .team-item .team-inner-wrap .images-wrap a img {
        border-radius: 0 !important;
    }
</style>
@endsection

@section('content')
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
                            <h3 class="title">Kategori Produk & Apps</h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('app.index', 'all') }}" class="{{ request()->segment(2) == 'all' || request()->segment(2) == null ? 'category-active' : '' }}">All Category</a></li>
                            @foreach($categories as $data)
                            <li><a href="{{ route('app.index', $data->id) }}" class="{{ request()->segment(2) == $data->id ? 'category-active' : '' }}">{{ $data->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 md-mb-50">
                <h2 align="start">ALL PRODUK & APPS</h2>
                <div class="">
                    <div class="counter-text plus" style="display: flex;">
                        <h5 align="start" class="title" style="display: flex;margin-top: 24px;">Jumlah All Produk & Apps :</h5>
                        <div class="fs-4" style="margin-left: 10px;margin-top: 20px;font-weight: bold;color: black;"> {{ $count }}</div>
                    </div>
                </div>
                <div class="rs-team style2 bg30 pt-20 pb-50 md-pt-70">
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
                                                        <a href="{{route('app.detail' , $data->id)}}"><img src="{{asset($data->image)}}" alt="Team" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rs-arrow">
                                                            <div class="curve"></div>
                                                            <div class="point"></div>
                                                        </div>

                                                        <h3 class="title-name text-limit-1"><a href="{{ route('app.detail', $data->id) }}" style="color: black;">{{ $data->title }}</a></h3>
                                                        <div class="team-title" style="color: fuchsia;">
                                                            @foreach ($data->category->take(1) as $item)
                                                                {{ $item->meta_name->name }}
                                                            @endforeach
                                                        </div>
                                                        <ul class="social-icons">
                                                            <li><a href="{{ urlCheck($data->fb_url) }}"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                                                            <li><a href="{{ urlCheck($data->ig_url) }}"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                                                            <li><a href="{{ urlCheck($data->tk_url) }}"><i class="fa-brands fa-tiktok" style="color: black;"></i></a></li>
                                                            <li><a href="{{ urlCheck($data->yt_url) }}"><i class="fa-brands fa-youtube" style="color: black;"></i></a></li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{ $product->links('vendor.pagination.bootstrap-5') }}
                            </div>
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