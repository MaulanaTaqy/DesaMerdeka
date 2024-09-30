@extends('landing-page.layouts.main')

@section('title', 'Event')

@section('css')
<style>
    @media only screen and (max-width: 480px){
        .our-event {
            margin-top: 0px !important;
        }
    }
    
    .services-img{
        height: 250px !important;
        background-color: white !important;
    }
    
    .rs-services.style2 .services-item .services-text {
        position: relative;
        padding: 24px 24px 34px 30px !important;
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
    
    .services-text > img{
        width: 20px;
        margin: 10px;
    }
    
</style>
@endsection

@section('content')
<!--Full width header End-->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner" style="height: 100%;transition: transform 0.5s ease, opacity 1s ease-out;">
        @foreach($banner as $key => $data)
        <div class="carousel-item @if($key==0) active @endif">
            {{-- <img src="{{asset($data->image)}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"> --}}
            <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
        </div>
        @endforeach
        @if(count($banner) == 0)
        <div class="carousel-item active">
            {{-- <img src="{{asset('assets/images/img-tekno/slider/slide1-tp.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"> --}}
            <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
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
                            <h3 class="title">Kategori Event & Program</h3>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ route('home.event.all', 'all') }}" class="{{ request()->segment(3) == 'all' || request()->segment(3) == null ? 'category-active' : '' }}">
                                    All Event
                                </a>
                            </li>
                            @foreach($event as $data)
                            <li>
                                <a href="{{ route('home.event.all', $data->id) }}" class="{{ request()->segment(3) == $data->id ? 'category-active' : '' }}">
                                    {{$data->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 md-mb-50 rs-counter about-style home-style2">
                {{-- <div class="col-lg-8 md-mb-50"> --}}
                    <h2 class="pt-35 text-center">ALL EVENT</h2>
                    <div class="">
                        <div class="counter-text plus" style="display: flex;">
                            <h5 class="title" style="display: flex; align-items: center;">Jumlah Event :</h5>
                            <div class=" fs-4" style="margin-left: 10px; font-weight: bold;color: black;"> {{ $count }}</div>
                        </div>
                    </div>
                    <div class="rs-services style2 pt-40 md-pt-80 pb-100">
                        <div class="container">
                            <div class="row">
                                <div class="events-schedule-contents tab-content schedule-one">
                                    <div class="tab-pane events-shedule-des active show" id="sunday">
                                        <div class="row">
                                            @foreach ($allEvent as $data)
                                            <div class="col-lg-6 col-md-6 md-mb-30 mt-30">
                                                <div class="services-item" style="position: relative">
                                                    <div class="services-img">
                                                        {{-- <img src="{{asset($data->image)}}" alt="images"> --}}
                                                        <img src="{{ url('/landingpage/images/logo-light2.png') }}" alt="">
                                                    </div>
                                                    <div class="services-text" style="height: 300px;">
                                                        <h2 class="title text-limit">{{ $data->title }}</h2>
                                                        <div class="sub-detail">
                                                            <div class="addon-services">
                                                                <div class="services-icon">
                                                                    <img src="{{asset('assets/images/services/style1/icons/price.png')}}" alt="">
                                                                </div>
                                                                <p class="services-txt text-limit-1">
                                                                    {!! Str::limit($data->subtitle, 30, '...') !!}
                                                                </p>
                                                            </div>
                                                            <div class="services-part mb-15 mt-3">
                                                                <div class="services-icon">
                                                                    <img src="{{asset('assets/images/services/style1/icons/pin.png')}}" alt="">
                                                                </div>
                                                                <p class="services-txt text-limit-1">{{ $data->address }}</p>
                                                            </div>
                                                            <div class="services-part mb-15">
                                                                <div class="services-icon">
                                                                    <img src="{{asset('assets/images/img-event/detail/kalender.png')}}" alt="">
                                                                </div>
                                                                <p class="services-txt">{{ $data->start_datetime }}</p>
                                                            </div>
                                                            <div class="blog-button service mt-24">
                                                                <a href="{{ route('home.event.detail', $data->id) }}">
                                                                    <span class="btn-txt">Views </span>
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
                                                    <div style="padding: 10px; border-top: 1px solid rgba(0, 0, 0, 0.4);display: flex; align-items: center;" class="services-text">
                                                        <img src="{{ asset($data->admin ? $data->admin->image : $data->member->image) }}" alt="">
                                                        <span class="sub-text"><a href="{{ route('home.event.created-by', $data->admin ? $data->admin->id : $data->member->id) }}">{{ $data->admin ? 'AdminVT' : $data->member->name }}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div><br>
                                    {{ $allEvent->links('vendor.pagination.bootstrap-5') }}
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content End -->
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
    
    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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