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
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('homepage/images/logo/logo.png') }}" />

    <!-- TITLE -->
    <title>Forgot Password - Desa Merdeka</title>

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

    <script src="https://kit.fontawesome.com/1c2c2462bf.js" crossorigin="anonymous"></script>

    <style>
        .progress {
            height: 3px !important;
        }
        .progress-bar-danger {
            background-color: #e90f10;
        }
        .progress-bar-warning{
            background-color: #ffad00;
        }
        .progress-bar-success{
            background-color: #02b502;
        }
        .fa-circle{
            font-size: 6px;  
        }
        .fa-check{
            color: #02b502;
        }

        div#popover-password > ul.list-unstyled > li {
            border-bottom: 0px !important;
        }


        .ff_fileupload_wrap table.ff_fileupload_uploads button.ff_fileupload_start_upload {
                display: none !important;
            }
    
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
                        <form class="login100-form validate-form" action="{{ route('password.update') }}" method="post">
                            @csrf
                            <div class="col col-login mx-auto my-2" style="max-width: 50% !important">
                                <div class="text-center">
                                    <img src="{{ asset('assets/images/login/brand.png') }}" class="header-brand-img" alt="">
                                </div>
                            </div>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if (session()->has('status'))
                                <div class="alert alert-succes">
                                    {{ session()->get('status') }}
                                </div>
                            @endif
                            
                            <input type="hidden" name="token" value="{{ request()->token }}">

                            <input type="hidden" name="email" value="{{ request()->email }}">

                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                </a>
                                <input id="password" class="input100 border-start-0 ms-0 form-control" type="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                </a>
                                <input id="password_confirmation" class="input100 border-start-0 ms-0 form-control" type="password" placeholder="Password confirmation" name="password_confirmation" required>
                            </div>
                            <div id="popover-password">
                                <p><span id="result"></span></p>
                                <div class="progress">
                                    <div id="password-strength" 
                                        class="progress-bar" 
                                        role="progressbar" 
                                        aria-valuenow="40" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100" 
                                        style="width:0%">
                                    </div>
                                </div>
                                <ul class="list-unstyled mt-2">
                                    <li class="">
                                        <span class="low-upper-case">
                                            <i class="fas fa-circle" aria-hidden="true"></i>
                                            &nbsp;Lowercase &amp; Uppercase
                                        </span>
                                    </li>
                                    <li class="">
                                        <span class="one-number">
                                            <i class="fas fa-circle" aria-hidden="true"></i>
                                            &nbsp;Number (0-9)
                                        </span> 
                                    </li>
                                    <li class="">
                                        <span class="one-special-char">
                                            <i class="fas fa-circle" aria-hidden="true"></i>
                                            &nbsp;Special Character (!@#$%^&*)
                                        </span>
                                    </li>
                                    <li class="">
                                        <span class="eight-character">
                                            <i class="fas fa-circle" aria-hidden="true"></i>
                                            &nbsp;Atleast 8 Character
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="submit" id="btn-reset" class="btn btn-primary w-100">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('assets/js/show-password.min.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('landingpage/js/wow.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/paralax.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/swiper.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/time-circle.js') }}"></script>
    <script src="{{ asset('landingpage/js/skill.bars.jquery.js') }}"></script>
    <script src="{{ asset('landingpage/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/main.js') }}"></script>


    <script>
        $('#btn-reset').prop('disabled', true);
        
        let state = false;
        let password = document.getElementById("password");
        let passwordStrength = document.getElementById("password-strength");
        let lowUpperCase = document.querySelector(".low-upper-case i");
        let number = document.querySelector(".one-number i");
        let specialChar = document.querySelector(".one-special-char i");
        let eightChar = document.querySelector(".eight-character i");

        password.addEventListener("keyup", function(){
            let pass = document.getElementById("password").value;
            checkStrength(pass);
        });

        function toggle(){
            if(state){
                document.getElementById("password").setAttribute("type","password");
                state = false;
            }else{
                document.getElementById("password").setAttribute("type","text")
                state = true;
            }
        }

        function myFunction(show){
            show.classList.toggle("fa-eye-slash");
        }

        function checkStrength(password) {
            let strength = 0;

            //If password contains both lower and uppercase characters
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                strength += 1;
                lowUpperCase.classList.remove('fa-circle');
                lowUpperCase.classList.add('fa-check');
            } else {
                lowUpperCase.classList.add('fa-circle');
                lowUpperCase.classList.remove('fa-check');
            }
            //If it has numbers and characters
            if (password.match(/([0-9])/)) {
                strength += 1;
                number.classList.remove('fa-circle');
                number.classList.add('fa-check');
            } else {
                number.classList.add('fa-circle');
                number.classList.remove('fa-check');
            }
            //If it has one special character
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                strength += 1;
                specialChar.classList.remove('fa-circle');
                specialChar.classList.add('fa-check');
            } else {
                specialChar.classList.add('fa-circle');
                specialChar.classList.remove('fa-check');
            }
            //If password is greater than 7
            if (password.length > 7) {
                strength += 1;
                eightChar.classList.remove('fa-circle');
                eightChar.classList.add('fa-check');
            } else {
                eightChar.classList.add('fa-circle');
                eightChar.classList.remove('fa-check');   
            }

            // If value is less than 2
            if (strength < 2) {
                passwordStrength.classList.remove('progress-bar-warning');
                passwordStrength.classList.remove('progress-bar-success');
                passwordStrength.classList.add('progress-bar-danger');
                passwordStrength.style = 'width: 10%';
                $('#btn-reset').prop('disabled', true)
            } else if (strength == 3) {
                passwordStrength.classList.remove('progress-bar-success');
                passwordStrength.classList.remove('progress-bar-danger');
                passwordStrength.classList.add('progress-bar-warning');
                passwordStrength.style = 'width: 60%';
                $('#btn-reset').prop('disabled', true)
            } else if (strength == 4) {
                passwordStrength.classList.remove('progress-bar-warning');
                passwordStrength.classList.remove('progress-bar-danger');
                passwordStrength.classList.add('progress-bar-success');
                passwordStrength.style = 'width: 100%';
                $('#btn-reset').prop('disabled', false)
            }
        }
    </script>

</body>

</html>