@extends('landing-page.layouts.main')

@section('title', 'Product By')

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

    .services-content {
        height: 150px;
    }

    .rs-count {
        margin-left: auto !important;
    }

    .title-services {
        color: #FA0368;
    }

    .blog-item img {
        height: 15rem;
        object-fit: cover;
    }

    .images-wrap{
        height: 100% !important;
        width: 250px !important;
        display: flex !important;
        align-items: center !important;
        background-color: white !important;
        margin: auto;
    }

    .services-img{
        height: 250px !important;
        /* display: flex !important; */
        /* align-items: center !important; */
        background-color: white !important;
    }

    .rs-team.style2 .team-item .team-inner-wrap .images-wrap a img {
        border-radius: 0 !important;
    }

    .rs-services.style2 .services-item .services-img img {
        width: 100% !important;
        height: 100% !important;
        transition: all 0.5s;
        object-fit: cover !important;
    }
    
    .sub-detail {
        position: absolute;
        bottom: 10px;
    }

    .owl-carousel .owl-stage {
        display: flex;
        align-items: center;
        height: 380px !important;
    }

    .counter-icon{ font-size: 100px; }
    .counter-icon a{ color: white; }

    .img-gallery {
        height: 225px;
        width: 367px;
        object-fit: cover;
    }

    .img-UMKM {
        height: 165px;
        width: 100%;
        object-fit: cover;
        background: white;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 15px
    }

    .contact-map-middle{
        /* position: relative; */
        width: 100%;
        top: 50px;
    }

    .mini-map-cover{
        height: 520px;
        width: 100%;
        object-fit: cover;
    }

    .img-UMKM:hover, .partner-img:hover {
        -ms-transform: scale(1.5);
        /* IE 9 */
        -webkit-transform: scale(1.5);
        /* Safari 3-8 */
        transform: scale(1.5);
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
<div class="rs-team style2 bg12 pt-110 pb-50 md-pt-70" id="app" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/11/bg4.jpg');">
    <div class="container">
        <div class="sec-title text-center mb-60 md-mb-40">
            <span class="sub-text">Venue</span>
            <h2 class="title pb-26">
                Product By {{ $member ? $member->name : 'AdminVT' }}
            </h2>
            <div class="heading-border-line"></div>
        </div>
        <div class="row justify-content-center">
            @foreach ($product as $data)
            <div class="col-lg-4 col-md-6 mb-20">
                <div class="team-item">
                    <div class="team-inner-wrap">
                        <div class="images-wrap" style="border-radius: 3px !important; width: 100% !important; height: 256px !important;">
                            <a href="{{ route('app.detail', $data->id) }}"><img src="{{ asset($data->image ?? 'virtual/assets/img/default.png') }}" alt="Team"></a>
                        </div>
                        <div class="team-content">
                            <div class="rs-arrow">
                                <div class="curve"></div>
                                <div class="point"></div>
                            </div>
                            <h3 class="title-name text-limit-1"><a href="{{ route('app.detail', $data->id) }}" style="color: black;">{{ $data->title }}</a></h3>
                            <div class="team-title">{{ $data->member->name }}</div>
                            <ul class="social-icons">
                                <li><a href="{{ urlCheck($data->fb_url) }}"><i class="fa-brands fa-facebook" style="color: black;"></i></a></li>
                                <li><a href="{{ urlCheck($data->ig_url) }}"><i class="fa-brands fa-instagram" style="color: black;"></i></a></li>
                                <li><a href="{{ urlCheck($data->yt_url) }}"><i class="fa-brands fa-youtube" style="color: black;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $product->links('vendor.pagination.bootstrap-5') }}

        </div>
    </div>
        {{-- <div class="col-lg-12 text-center mt-70 md-mt-50">
            <div class="btn-part">
                <a class="readon btn-text ticket" href="{{ route('app.created-by', $member->id) }}">
                    <span>View Product All</span>
                </a>
            </div>
        </div> --}}
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
        product.prproductDefault();
        product.stopPropagation();
        Swal.fire({
            title: 'product Register',
            text: 'Apakah Anda yakin ingin mendaftar product ini?',
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