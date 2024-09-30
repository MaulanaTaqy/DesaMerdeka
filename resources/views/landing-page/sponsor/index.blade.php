@extends('landing-page.layouts.main')

@section('title', 'Sponsor')

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
            <div class="col-lg-12 md-mb-50 rs-counter about-style home-style2">
                <h2 align="start">ALL</h2>
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
                                            @foreach($sponsor as $data)
                                            <div class="col-lg-4 col-md-6 mb-30" style="box-shadow: 0px 6px 25px 0px #eee;">
                                                <div class="team-item" style="height: 100%;">
                                                    <div class="team-img" style="height: 250px;">
                                                        <img src="{{asset($data->image)}}" alt="{{asset($data->image)}}" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: cover;">
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="team-info">
                                                            <div class="name" style="font-size: 15px;">
                                                                {{ $data->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{ $sponsor->links('vendor.pagination.bootstrap-5') }}
                                <br><br>
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