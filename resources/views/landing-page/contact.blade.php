@extends('landing-page.layouts.main')

@section('title', 'Contact')

@section('css')
<style>
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:105px;
        right:15px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        font-size:30px;
        box-shadow: 2px 2px 3px #999;
        z-index:100;
    }

    .my-float{
        margin-top:16px;
    }

    .recent-post-widget:hover {
        background-color: #e8eaed;
    }

    .recent-post-widget i {
        color: gold;
    }

    .recent-post-widget:hover i {
        color: white;
    }

    .rs-breadcrumbs {
        height: 611px;
        position: relative;

    }

    .rs-breadcrumbs::after {
        content: '';
        display: block;
        width: 100%;
        height: 80%;
        background-image: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
        position: absolute;
        top: 130px;
    }

    /* .title {
        font-size: 48px;
        line-height: 80px;
        font-weight: 700;
        margin-top: -90px;
        color: #ffffff;
        position: relative;
        z-index: 1;
        font-family: 'Fira Sans', sans-serif;
    } */

    .produk {
        display: flex;
        position: relative;
    }

    .produk img {
        z-index: 2;
        max-width: 70px;
        border-radius: 10px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    }

    .produk P {
        margin-left: 20px;
        color: white;
        z-index: 3;
        font-weight: bold;
        display: block;
        width: 20px;
        margin-top: 10px;
    }

    .produk span {
        margin-top: 40px;
        margin-left: -20px;
        position: relative;
        color: #00a173;
        z-index: 4;
        font-weight: 700;
    }

    .produk h5 {
        z-index: 5;
        position: relative;
        color: white;
        margin-left: 10px;
        margin-top: 20px;
    }

    .about1 {
        position: relative;
        z-index: 6;
        display: flex;
    }

    .about1 .detail {
        background-color: #00a173;
        border: none;
        margin-top: 30px;
        width: 210px;
        height: 50px;
        border-radius: 10px;
        font-size: 17px;
        font-family: 'Fira Sans', sans-serif;
    }

    .detail:hover {
        background-color: #00a173;
        border: none;
        margin-top: 30px;
        width: 210px;
        height: 50px;
        border-radius: 10px;
        font-size: 17px;
        font-family: 'Fira Sans', sans-serif;
        color: white;
    }

    .about1 p {
        position: relative;
        z-index: 8;
        color: #00a173;
        font-size: 20px;
        margin-top: 37px;
        margin-left: 20px;
        font-weight: bold;
    }

    .about1 span {
        position: relative;
        z-index: 8;
        color: #00a173;
        font-size: 13px;
        margin-top: 45px;
        margin-left: 10px;
        font-weight: 530;
    }

    .aplikasi {
        position: relative;
        display: flex;
    }

    .aplikasi h5 {
        color: #9AA0A6;
        position: relative;
        z-index: 13;
    }

    .aplikasi p {
        color: #9AA0A6;
        position: relative;
        z-index: 14;
        font-size: 11px;
        margin-left: 10px;
        margin-top: 7px;
    }

    @media (max-width: 575.98px) {
        .aplikasi h5 {
            margin-top: -20px;
        }

        .aplikasi p {
            margin-top: -13px;
        }

        .rs-privacy-policy {
            margin-left: 30px;
        }
    }

    .post-img {
        display: flex !important;
        height: 85px !important;
        align-items: center !important;
        margin: inherit;
    }
</style>
@endsection

@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner" style="height: 100%;transition: transform 0.5s ease, opacity 1s ease-out;">
        @foreach($contact as $key => $data)
        <div class="carousel-item @if($key==0) active @endif">
            <img src="{{asset($data->image)}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
      @endforeach
      @if(count($contact) == 0)
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


<div class="rs-contact home-style1 home-style3 pt-120 md-pt-80 pb-100">
    <div class="container">
        <div class="row y-middle">
            <div class="col-lg-8 pr-130 md-pr-15 md-mb-50">
                <div class="contact-img text-center">
                    <img style="max-height: 550px; max-width: 550px;" src="{{ asset($app->short_about_image) }}" alt="Images" width="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-item mb-20">
                    <div class="widget-img">
                        <img src="{{ asset('landingpage/images/contact/icons/2-1.png') }}" alt="Images">
                    </div>
                    <div class="address-item">
                        <div class="address-icon">
                            <img src="{{ asset('landingpage/images/contact/icons/1.png') }}" alt="Images">
                        </div>
                        <div class="address-text">
                            <h3 class="title"> Address</h3>
                            <p class="services-txt">
                                virtual Event or Zoom,<br>
                                Kemenperin Perindustrian RI
                            </p>
                        </div>
                    </div>
                </div>
                <div class="widget-item mb-20">
                    <div class="widget-img">
                        <img src="{{ asset('landingpage/images/contact/icons/2-2.png') }}" alt="Images">
                    </div>
                    <div class="address-item">
                        <div class="address-icon">
                            <img src="{{ asset('landingpage/images/contact/icons/2.png') }}" alt="Images">
                        </div>
                        <div class="address-text">
                            <h3 class="title">Email us</h3>
                            <p class="services-txt">
                                {{$app->email}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="widget-item">
                    <div class="widget-img">
                        <img src="{{ asset('landingpage/images/contact/icons/2-3.png') }}" alt="Images">
                    </div>
                    <div class="address-item">
                        <div class="address-icon">
                            <img src="{{ asset('landingpage/images/contact/icons/3.png') }}" alt="Images">
                        </div>
                        <div class="address-text">
                            <h3 class="title">Call us</h3>
                            <p class="services-txt">
                                <a href="tel:{{$app->phone}}">{{$app->phone}}</a><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section Start -->
        <div class="rs-contact pt-120 md-pt-80">
            <div class="row y-middle">
                <div class="col-lg-6">
                    <div class="sec-title mb-85 md-mb-50">
                        <span class="sub-text">Any Query</span>
                        <h2 class="title pb-26">
                            Send Message
                        </h2>
                        <div class="heading-border-line left-style"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="margin-0">Berikan kami umpan balik anda, pertanyaan, atau hubungi kami melalui form dibawah ini</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 pr-40 md-pr-15 md-mb-50">
                    <div class="contact-map">
                        <iframe src="{{ $app->gmap_url ?: asset('virtual/assets/img/location-not-available.png') }}"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-wrap">
                        <div id="form-messages"></div>
                        <form id="contact-form" method="post" action="{{ route('contact.send') }}">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                        <input class="from-control" type="text" id="name" name="name" placeholder="Name" required="">
                                    </div> 
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                        <input class="from-control" type="text" id="email" name="email" placeholder="E-Mail" required="">
                                    </div>   
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                        <input class="from-control" type="text" id="phone" name="phone" placeholder="Phone Number" required="">
                                    </div>   
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                        <input class="from-control" type="text" id="website" name="website" placeholder="Your Website" required="">
                                    </div>
                              
                                    <div class="col-lg-12 mb-30">
                                        <textarea class="from-control" id="message" name="message" placeholder="Your message Here" required=""></textarea>
                                    </div>
                                </div>
                                <div class="btn-part">
                                    <div class="form-group mb-0">
                                        <div class="submit-btn">
                                            <input id="btn-submit" class="submit" type="submit" value="Submit Now">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section End -->

        @if($app->phone)
        <a href="https://api.whatsapp.com/send?phone={{ $app->phone }}&text=Halo kak saya ..." class="float" target="_blank">
            <i class="fa-brands fa-whatsapp my-float"></i>
        </a>
        @endif

    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        var form = $('#contact-form');

        // Get the messages div.
        var formMessages = $('#form-messages');

        // Set up an event listener for the contact form.
        $(form).submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();
            $('#pre-load').addClass('opacity-50')

            $('#btn-submit').prop('disabled', true)

            // Serialize the form data.
            var formData = $(form).serialize();

            // Submit the form using AJAX.
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            })
            .done(function(response) {
                // Make sure that the formMessages div has the 'success' class.
                $(formMessages).removeClass('error');
                $(formMessages).addClass('success');

                // Set the message text.
                $(formMessages).text(response);

                $('#pre-load').removeClass('opacity-50')

                // Clear the form.
                $('#name, #email, #phone, #website, #message').val('');
                $('#btn-submit').prop('disabled', false)
            })
            .fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');
                
                $('#pre-load').removeClass('opacity-50')

                // Set the message text.
                if (data.responseText !== '') {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text('Oops! An error occured and your message could not be sent.');
                }
            });
        });
    });
</script>
@endsection