@extends('landing-page.layouts.main')

@section('title', 'Gallery - Detail')

@section('css')
<style>
    .image-popup {
        /* display: flex; */
        /* align-items: center; */
        height: 250px;
        overflow: hidden;
        /* vertical-align: middle; */
        /* margin: auto; */
    }
    .image-popup > img{
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .rs-breadcrumbs.img4 {
        background: url('{{ isset($gallery[0]->gallery->image) ? asset($gallery[0]->gallery->image) : asset("virtual/assets/img/default.png") }}');
        box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.5);
    }
</style>
@endsection

@section('content')
<div class="rs-breadcrumbs img4">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                Album - {{ $gallery[0]->gallery->title ?? "No Content"}}
                <span class="watermark">Gallery</span>
                <div class="sub-title">
                  <span class="h3 ">{{ $gallery[0]->gallery->desc ?? "No Content"}} </span>  
                </div>
                 
                
            </h1>  
                               
        </div>
    </div>
</div>

<!-- Gallery Start -->

<div class="rs-gallery style1 mb--110 rs-events-schedule rs-events-schedule3 bg5 pt-120 pb-120 md-pt-65 md-pb-80" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/11/bg4.jpg');">
    <div class="container">
        <div class="col=lg-12">
            <div class="events-schedule-tabs">
                <ul class="nav eventday-list">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#foto">Gallery Foto<span></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#vidio">Gallery Video<span></span></a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="row no-gutters mb-100">
            <div class="events-schedule-contents tab-content schedule-one">
                <div class="tab-pane events-shedule-des active show" id="foto">
                    <div class="row">
                        @foreach ($gallery as $item)
                        <div class="col-lg-4 col-md-6 col-xs-12 mb-4">
                            <div class="card">
                                <a class="image-popup" href="{{ asset($item->image) }}"><img src="{{ asset($item->image) }}" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title"> {{ $item->titile }} </h5>
                                    <div class="services-part">
                                        <div class="services-icon">
                                            <img src="{{asset('assets/images/img-event/detail/kalender.png')}}" style="width: 20px;" class="services-txt"> {{ $item->date }}
                                        </div>
                                    </div>
                                    <div class="addon-services">
                                        <div class="services-icon">
                                            <img src="{{asset('assets/images/services/style1/icons/pin.png')}}" style="width: 20px;" class="services-txt"> {{ $item->lokasi }}
                                        </div>
                                    </div>
                                    <div class="addon-services" style="display: flex;">
                                        <div class="services-icon">
                                            <img src="{{ asset('assets/images/services/style1/icons/home6/price.png') }}" alt="" style="width: 20px;" class="services-txt">
                                        </div>
                                        <p class="pl-6 services-txt text-limit-1" style="margin-bottom: 0px !important;">
                                            @foreach ($item->gallery->category as $kategori)
                                                {{ $kategori->meta_name->name }}
                                             @endforeach
                                        </p>
                                    </div>                          
                                    <div class="addon-services" style="display: flex;">
                                        <div class="services-icon">
                                            <img src="{{ asset('assets/images/services/main-home/home3/3.png') }}" alt="" style="width: 20px;" class="services-txt">
                                        </div>
                                        <p class="pl-6 services-txt text-limit-1" style="margin-bottom: 15px !important;">{{ $item->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>

                {{-- video --}}
                <div class="tab-pane events-shedule-des" id="vidio">
                    <div class="row">
                        @foreach ($galleryVideo as $item)    
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="card">
                                <div class="rs-videos choose-video">
                                    <div class="images-video">
                                        <img src="{{ $item->video_thumbnail }}" alt="images">
                                    </div>
                                    <div class="animate-border">
                                        <a class="popup-border" href="{{ $item->video }}">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Kegiatan Coaching dan Penjurian Tahap Akhir</h5>
                                    <div class="addon-services">
                                        <div class="services-icon">
                                            <img src="{{asset('assets/')}}/images/services/style1/icons/pin.png" style="width: 20px;" class="services-txt"> Bandung
                                        </div>
                                    </div>
                                    <div class="services-part mb-15">
                                        <div class="services-icon">
                                            <img src="{{asset('assets/')}}/images/services/style1/icons/price.png" style="width: 20px;" class="services-txt"> 2020-12-31
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery End -->
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
<!-- Search Modal End -->
@endsection