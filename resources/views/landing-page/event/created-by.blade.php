@extends('landing-page.layouts.main')

@section('title', 'Events By')

@section('css')
<style>
    .services-img{
        height: 250px !important;
        background-color: white !important;
    }

    .rs-services.style2 .services-item .services-img img {
        width: 100% !important;
        height: 100% !important;
        transition: all 0.5s;
        object-fit: cover !important;
    }

    .sub-detail {
        position: absolute;
        bottom: 20px;
    }
</style>
@endsection

@section('content')
<!-- Breadcrumbs Start -->
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
<!-- Breadcrumbs End -->

<!-- Gallery Start -->
<div class="rs-services style2 pt-40 md-pt-80 pb-100" id="event">
    <div class="container">
    <div class="sec-title text-center mb-85">
            <span class="sub-text">Venue</span>
            <h2 class="title pb-26">
                Event By {{ $member ? $member->name : 'AdminVT' }}
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row">
            <div class="events-schedule-contents tab-content schedule-one">
                <div class="tab-pane events-shedule-des active show" id="sunday">
                    <div class="row">
                        @foreach ($event as $data)
                        <div class="col-lg-4 col-md-6 col-xs-12 md-mb-30 mt-30">
                            <div class="services-item" style="position: relative">
                                <div class="services-img">
                                    <img src="{{asset($data->image)}}" alt="images">
                                </div>
                                <div class="services-text" style="height: 300px;">
                                    <h2 class="title text-limit">"{{ $data->title }}"</h2>
                                    <div class="sub-detail">
                                        <div class="addon-services">
                                            <div class="services-icon">
                                                <img src="{{asset('assets/images/services/style1/icons/price.png')}}" alt="">
                                            </div>
                                            <p class="services-txt text-limit-1">
                                                {!! str_limit($data->subtitle, 25); !!}
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
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><br>
                {{ $event->links('vendor.pagination.bootstrap-5') }}
                <br><br>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<!-- Gallery End -->



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
<!-- Search Modal End -->
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