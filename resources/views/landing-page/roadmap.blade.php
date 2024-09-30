@extends('landing-page.layouts.main')

@section('title', 'Roadmap')

@section('css')
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<style>
    #popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        max-width: 500px;
        height: 60%;
        text-align: center;
        padding: 80px 60px;
        font-size:  18px;
        font-weight: bold;
        background: white;
        z-index: 9999;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        display: none;
    }
    
    .info{
        width: 150px;
        margin-top: -130px;
    }

    #popup .info-pesan {
        margin-top: 30px;
    }

    .close-icon {
        width: 25px;
        height: 25px;
        position: absolute;
        top: 25px;
        right: 25px;
        cursor: pointer;
    }
</style>
@endsection
@section('content')

<div id="popup" class="animate__heartBeat" onchange="ubah_animasi()">
    <img src="{{ asset('assets/images/img-tekno/info.png') }}" alt="" class="info">
    <h3 class="info-pesan">INFORMATION UPDATED</h3>
    <P>update relase terbaru pada tanggal : <span id="tangal">{{ $note ? \Carbon\Carbon::parse($note->updated_at) : ' ' }}</span></P>
    <img src="{{ asset('assets/images/img-tekno/close.png') }}" alt="" class="close-icon" onclick="closemodal()">
    {!! $note->desc ?? 'Tidak ada catatan apapun' !!}
</div>

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
<!-- Faq Section Start -->
<div id="rs-events-schedule" class="rs-events-schedule rs-events-schedule3 bg5 pt-120 pb-120 md-pt-65 md-pb-80" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/10/bg1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="events-schedule-tabs">
                    <h2 text-align="center">RoadMap Desa Merdeka ICT</h2>
                    <!-- Nav tabs -->
                    <ul class="nav eventday-list">
                        @foreach($roadmap as $data)
                        <li class="nav-item text-center">
                            @if($loop->iteration==1)
                            <a class="nav-link active" data-bs-toggle="tab" href="#tahap{{$loop->iteration}}">{{$data->type}}<small class="d-block fw-normal fs-6">Tahun {{ $data->year }}</small></a>
                            @else
                            <a class="nav-link" data-bs-toggle="tab" href="#tahap{{$loop->iteration}}">{{$data->type}}<small class="d-block fw-normal fs-6">Tahun {{ $data->year }}</small></a>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    <div class="events-schedule-contents tab-content schedule-one">
                        @foreach($roadmap as $data)
                            @if($loop->iteration==1)
                            <div class="tab-pane events-shedule-des active show" id="tahap{{$loop->iteration}}">
                            @else
                            <div class="tab-pane events-shedule-des" id="tahap{{$loop->iteration}}">
                            @endif
                                <div class="events-items">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="event-author">
                                                <div class="speak-date">
                                                    <i class="flaticon-clock-1"></i>
                                                    <div class="date">Q1</div>
                                                    <div class="hall-room">Desa Merdeka</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="event-shedule-info">
                                                <div class="rs-topic-content">
                                                    <h3 class="event-title">{{$data->q1_title}}</h3>
                                                    <p>
                                                        {!!$data->q1_desc!!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="events-items highlight">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="event-author">
                                                <div class="speak-date">
                                                    <i class="flaticon-clock-1"></i>
                                                    <div class="date">Q2</div>
                                                    <div class="hall-room">Desa Merdeka</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="event-shedule-info">
                                                <div class="rs-topic-content">
                                                    <h3 class="event-title">{{$data->q2_title}}</h3>
                                                    <p>
                                                        {!!$data->q2_desc!!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="events-items">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="event-author">
                                                <div class="speak-date">
                                                    <i class="flaticon-clock-1"></i>
                                                    <div class="date">Q3</div>
                                                    <div class="hall-room">Desa Merdeka</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="event-shedule-info">
                                                <div class="rs-topic-content">
                                                    <h3 class="event-title">{{$data->q3_title}}</h3>
                                                    <p>
                                                        {!!$data->q3_desc!!}
                                                    </p>
                                                </div>
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
    <!-- Faq Section End -->
    @endsection

    @section('script')
    <script>
        $(document).ready(function () {
            let popup = document.getElementById('popup');
            showPopup();
        });

        function showPopup(){
            setTimeout(() => {
                popup.style.display = "block";
            }, 3000)
        }

        function closemodal() {
            popup.style.display = "none";
        }
    </script>
    @endsection