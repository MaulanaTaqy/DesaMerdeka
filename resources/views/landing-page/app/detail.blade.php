@extends('landing-page.layouts.main')

@section('title', 'Product Apps & Software - Deatil')

@section('css')
<style>
    .text-limit {
        overflow-wrap: break-word;
        word-wrap: break-word;
        -ms-word-break: break-all;
        word-break: break-word;
        overflow: hidden;
    }
    .owl-item {
        height: 400px !important;
        width: 250px !important;
        display: flex;
        align-items: center;
    }

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

    .title {
        font-size: 48px;
        line-height: 80px;
        font-weight: 700;
        margin-top: -90px;
        color: #ffffff;
        position: relative;
        z-index: 1;
        font-family: 'Fira Sans', sans-serif;
    }

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
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs img4" style="background-image: url('{{ asset($product->banner_image) }}');">
    <div class="container">
        <div class="col-lg-7">
            <div class="breadcrumbs-inner">
                <h1 class="title" style="font-size: 50px;">
                    {{ $product->title }}
                </h1>
                <div class="produk">
                    <img src="{{ asset($product->image) }}" alt="">
                    <p>Posted</p>
                    <span>{{$product->admin_id ? $product->admin->name : $product->member->name}}</span>
                </div>
                <div class="about1">
                    {{-- <a href="//{{ $product->market_store_url }}"><button class="detail">Dowload</button></a> --}}
                    <a href="#detail"><button class="detail">Baca lebih detail</button></a>
                    {{-- <p><i class="bi bi-bookmark-plus"></i></p>
                    <span>Tambahkan ke wishlist</span> --}}
                </div>
                <div class="aplikasi mt-3">
                    <h5><i class="bi bi-android"></i></h5>
                    <p>Produk ini Sudah Terdaftar di Desa Merdeka</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div id="rs-blog" class="rs-blog blog-main-home pt-50 md-pt-70 md-pb-80">
                <div class="container" id="berita">
                    <div class="rs-carousel owl-carousel" data-loop="false" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="2" data-md-device-nav="false" data-md-device-dots="true">
                        @foreach($product->images as $image)
                        <div class="blog-item">
                            <div class="image-wrap" style="height: 100%; width: 100%; border-radius: 10px;">
                                <a class="image-popup" href="{{asset($image->image)}}"><img src="{{asset($image->image)}}" alt="No Image Uploaded" style="height: 100%; object-fit: cover;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="about py-5" id="detail" style="word-wrap: break-word;">
                    <h4 style="color: #5c5c5c;">Tentang Aplikasi ini <i class="bi bi-forward"></i></h4>
                    <p class="text-limit" style="width: 100%;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                    word-wrap: break-word;">{!! $product->desc !!}</p>
                    
                    <div class="upload">
                        <h5 style="font-size: 15px;">Di Update Pada</h5>
                        <p style="margin-top: -30px;">{{ $product->created_at->format('Y-m-d') }}</p>
                    </div>
                    <div class="rs-privacy-policy" style="margin-top: -40px;margin-left: -35px ;">
                        <div class="privacy-wrap">
                            <div class="privacy-content measures">
                                <ul class="covid-safety-item">
                                    @foreach ($product->category as $item)
                                    <li>
                                        <span class="list-icon"><i class="fa fa-hashtag"></i></span>
                                        <span class="list-text">{{ $item->meta_name->name }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="rs-about style1" style="background-color: white; box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                        <div class="video">
                            <div class="rs-videos about-video home5-about-video" style="background-image: url('{{ asset($product->video_banner) }}'); width:100%;">
                                <div class="animate-border" \="">
                                    <a class="popup-border" href="{{ $product->video }}">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="rs-inner-blog pt-30 md-pt-70">
                <div class="widget-area">
                    <div class="recent-posts mb-0" style="box-shadow:none">
                        <div class="widget-title">
                            <h3 class="title">Aplikasi Lainnya <a href="/apps/all"><i class="bi bi-fullscreen-exit all" style="margin-left:10px;"></i></a> </h3>
                        </div>
                        @foreach ($latest as $item)
                        <div class="recent-post-widget no-border" style="border-radius: 20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                            <div class="post-img" style="padding-right: 25px;">
                                <a href="{{ route('app.detail', $item->id) }}"><img src="{{asset($item->image)}}" alt="" style="border-radius: 20px;margin-left: 10px;margin-bottom: 10px;box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"></a>
                            </div>
                            <div class="post-desc mt-3">
                                <a href="{{ route('app.detail', $item->id) }}">{{ $item->title }}</a>
                                <p>Created By: {{$product->admin_id ? $product->admin->name : $product->member->name}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="categories mb-45">
                        <div class="widget-title">
                            <h3 class="title">Categories</h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('app.index', 'all') }}" class="{{ request()->segment(2) == 'all' ? 'category-active' : '' }}">All Category</a></li>
                            @foreach($categories as $data)
                            <li><a href="{{ route('app.index', $data->id) }}" class="{{ request()->segment(2) == $data->id ? 'category-active' : '' }}">{{ $data->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="follow-us">
                        <div class="widget-title mb-40">
                            <h3 class="title">Follow Us</h3>
                        </div>
                        <ul>
                            <li><a href="{{urlCheck($product->fb_url)}}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="{{urlCheck($product->ig_url)}}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="{{urlCheck($product->yt_url)}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="{{urlCheck($product->tk_url)}}" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Main content End -->
 <div class="rs-contact home-style1 home-style3">
    <div class="container">
        <!-- Contact Section Start -->
        <div class="rs-contact md-pt-80">
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
                    <p class="margin-0">Berikan developer umpan balik anda agar pengembangan produk bisa menjadi lebih baik lagi, atau hubungi developer untuk hal lain.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 pr-40 md-pr-15 md-mb-50">
                    <div class="contact-map">
                        <iframe src="{{ $product->member ? $product->member->gmap_url : asset('virtual/assets/img/location-not-available.png') }}"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-wrap">
                        <div id="form-messages"></div>
                        <form id="contact-form" method="post" action="{{ route('app.send-message') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}" />
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
    </div>
</div><br><br><br>

<!-- Desa Merdeka -->
<div class="basic mt-3">
    <img src="../../images/img-app/basic.gif" alt="">
</div><br><br>
</div><br><br><br>
@if($product->member)
<a href="https://api.whatsapp.com/send?phone=62{{ $product->member->phone }}&text=Halo kak saya " class="float" target="_blank">
    <i class="fa-brands fa-whatsapp my-float"></i>
</a>
@endif

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
<script>
    $(document).ready(function () {
        var form = $('#contact-form');

        // Get the messages div.
        var formMessages = $('#form-messages');

        // Set up an event listener for the contact form.
        $(form).submit(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();

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

                // Clear the form.
                $('#name, #email, #phone, #website, #message').val('');
                $('#btn-submit').prop('disabled', false)
            })
            .fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');

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