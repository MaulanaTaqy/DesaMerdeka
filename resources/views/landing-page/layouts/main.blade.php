<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title> @yield('title', 'Desa Merdeka')</title>
    <meta name="description" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landingpage/images/fav.png')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/fonts/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/off-canvas.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/rsmenu-main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/rs-spacing.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/responsive.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('landingpage/js/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @yield('css')
    <style>
        @media only screen and (max-width: 480px){
            .sticky-logo {
                max-height: 40px !important;
            }
            .sticky {
                position: fixed !important;
                height: 60px !important;
            }
        }
        @media only screen and (max-width: 992px){
            .sticky {
                position: fixed !important;
                height: 90px;
            }
        }
        .opacity-50{
            display: block !important;
            opacity: 50% !important;
        }
        .video-bg {
            height: 100vh;
            width: 100vw;
            object-fit: cover;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;
        }
        
        .text-limit {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* number of lines to show */
                    line-clamp: 2; 
            -webkit-box-orient: vertical;
        }

        .text-limit-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1; /* number of lines to show */
                    line-clamp: 1; 
            -webkit-box-orient: vertical;
        }

        .category-active {
            color: #ff0066 !important;
        }

        .text-limit-x {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: var(--line);
                    line-clamp: var(--line);
            -webkit-box-orient: vertical;
            text-align: justify;
        }
    </style>
    <script src="{{ asset('landingpage/js/jquery.min.js') }}"></script>
</head>

<body class="defult-home">
    <div class="" style="disp">
    <div class="offwrap"></div>
    <div id="pre-load">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class='loader-icon'><img src="{{asset('landingpage/images/fav.png')}}" alt="Evenio - Events & Conference" width="500"></div>
            </div>
        </div>
    </div>
    <div class="main-content">
        @include('landing-page.layouts.navbar')
        @yield('content')
    </div>
        @include('landing-page.layouts.footer')
    <div id="scrollUp" class="orange-color">
        <i class="fa fa-angle-up"></i>
    </div>
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
    <script src="{{ asset('landingpage/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('landingpage/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/wow.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/paralax.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/swiper.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/time-circle.js') }}"></script>
    <script src="{{ asset('landingpage/js/skill.bars.jquery.js') }}"></script>
    <script src="{{ asset('landingpage/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('landingpage/js/main.js') }}"></script>
    <script src="{{ asset('assets/plugins/notify/js/rainbow.js') }}"></script>
    <script src="{{ asset('assets/plugins/notify/js/sample.js') }}"></script>
    <script src="{{ asset('assets/plugins/notify/js/jquery.growl.js') }}"></script>
    <script src="{{ asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $(document).ready(function(){
            let type = false;
            var data = 'a';

            if (`{{ Session::has('success') }}` == true) type = 'success';
            if (`{{ Session::has('error') }}` == true) type = 'error';

            if (type) {
                Swal.fire({
                    title: 'A New Notification!',
                    html: type == 'success' ? "{!! Session::get('success') !!}" : "{!! Session::get('error') !!}",
                    icon: `${type}`,
                    confirmButtonColor: "#556ee6"
                })
            }
        })

        function logout() {
            let endpoint = `${window.location.origin}/auth/logout`;
            Swal.fire({
                title: "Yakin ingin logout?",
                text: "Ketika anda logout, anda harus login kembali untuk bisa mengakses panel user.",
                icon: "warning",
                showCancelButton  : true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor : "#d33",
                confirmButtonText : "Ya!"
            }).then((result) => {
                if (result.value) {
                    window.location.replace(endpoint)
                }
            })
        }
    </script>
    @yield('script')
</body>

</html