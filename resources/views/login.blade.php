<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}" />

    <!-- TITLE -->
    <title>Login</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style_backup.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

    <style>
        /*----------------------------------------------
						29. Preloader CSS
		----------------------------------------------*/
        #pre-load {
            background-color: #fff;
            height: 100%;
            width: 100%;
            position: fixed;
            margin-top: 0px;
            top: 0px;
            z-index: 9999;
        }

        .loader .loader-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border: 5px solid #ebebec;
            border-radius: 50%;
        }

        .loader .loader-container:before {
            position: absolute;
            content: "";
            display: block;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border-top: 4px solid #f00c46;
            border-radius: 50%;
            animation: loaderspin 1.8s infinite ease-in-out;
            -webkit-animation: loaderspin 1.8s infinite ease-in-out;
        }

        .loader .loader-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            text-align: center;
        }

        .loader .loader-icon img {
            animation: loaderpulse alternate 900ms infinite;
            width: 35px;
        }

        @keyframes loaderspin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @-webkit-keyframes loaderspin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes loaderpulse {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.2);
            }
		}
    </style>

</head>

<body class="app sidebar-mini ltr">
    <!-- BACKGROUND-IMAGE -->
    <div class="login-img" style="background-image: url({{ asset('assets/images/login/bannerhome.png') }})">

        <!-- GLOABAL LOADER -->
        <div class="offwrap"></div>
        <div id="pre-load">
            <div id="loader" class="loader">
                <div class="loader-container">
                    <div class='loader-icon'><img src="{{asset('landingpage/images/fav.png')}}" alt="Evenio - Events & Conference" width="500"></div>
                </div>
            </div>
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" action="{{ route('auth.login.process') }}" method="post">
                            @csrf
                            <div class="col col-login mx-auto my-2" style="max-width: 50% !important">
                                <div class="text-center">
                                    <img src="{{ asset('assets/images/login/brand.png') }}" class="header-brand-img" alt="">
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-account text-muted" aria-hidden="true"></i>
                                                </a>
                                                {{-- <input class="input100 border-start-0 form-control ms-0" type="email" name="email" placeholder="Email"> --}}
                                                <input class="input100 border-start-0 form-control ms-0" type="text" name="cred" placeholder="Email or Username">
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="text-end pt-4">
                                                <p class="mb-0"><a href="{{ route('forgot-password') }}" class="text-primary ms-1">Forgot Password?</a></p>
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <button href="{{ route('auth.register') }}" class="login100-form-btn btn-primary">
                                                        Login
                                                </button>
                                            </div>
                                            <div class="text-center pt-3">
                                                <p class="text-dark mb-0">Not a member?<a href="{{ route('auth.register') }}" class="text-primary ms-1">Sign UP</a></p>
                                                <p class="text-dark mt-4">Back to  <a href="{{ route('home.index') }}" class="text-primary ms-1">Homepage</a></p>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <div id="mobile-num" class="wrap-input100 validate-input input-group mb-4">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <span>+91</span>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0">
                                            </div>
                                            <div id="login-otp" class="justify-content-around mb-5">
                                                <input class="form-control text-center w-15" id="txt1" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt2" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt3" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt4" maxlength="1">
                                            </div>
                                            <span>Note : Login with registered mobile number to generate OTP.</span>
                                            <div class="container-login100-form-btn ">
                                                <a href="javascript:void(0)" class="login100-form-btn btn-primary" id="generate-otp">
                                                    Proceed
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('assets/js/show-password.min.js') }}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{ asset('assets/js/generate-otp.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- INTERNAL Notifications js -->
    <script src="{{ asset('assets/plugins/notify/js/rainbow.js') }}"></script>
    <script src="{{ asset('assets/plugins/notify/js/sample.js') }}"></script>
    <script src="{{ asset('assets/plugins/notify/js/jquery.growl.js') }}"></script>
    <script src="{{ asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ asset('landingpage/js/wow.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/paralax.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/swiper.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/time-circle.js') }}"></script>
    <script src="{{ asset('landingpage/js/skill.bars.jquery.js') }}"></script>
    <script src="{{ asset('landingpage/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('landingpage/js/sweetalert/sweetalert.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            let type = false;
            if('{{session()->has("success")}}' == true) type = "success";
            if('{{session()->has("warning")}}' == true) type = "warning";
            if('{{session()->has("error")}}' == true) type = "error";

            if(type === "success"){
                $.growl.notice1({
                    message: `{{ Session::get('success') }}`
                });
            }else if(type === "warning") {
                $.growl.warning({
                    message: `{{ Session::get('warning') }}`
                });
            }else if(type === "error") {
                $.growl.error({
                    message: `{{ Session::get('error') }}`
                });
            }
        });
    </script>



</body>

</html>