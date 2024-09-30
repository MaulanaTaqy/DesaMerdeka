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
    <title>Register - Desa Merdeka</title>

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


        form .data label {
        font-size: 18px;
    }

    form .data input {
        height: 100%;
        width: 100%;
        padding-left: 10px;
        font-size: 17px;
        border: 1px solid silver;
        border-radius: 10px;
    }

    form .data input:focus {
        color: #3498bd;
        border-bottom-width: 2px;
    }

    form .forget-pass {
        margin-top: -8px;
    }

    form .forget-pass a {
        color: #3498bd;
        text-decoration: none;
    }

    form .forget-pass a:hover {
        text-decoration: underline;
    }

    form .btn {
        margin: 30px 0;
        height: 45px;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    form .btn .inner {
        height: 100%;
        width: 300%;
        position: absolute;
        left: -100%;
        z-index: -1;
        background: black;
        transition: all 0.4s;
        border-radius: 10px;
    }

    form .btn:hover .inner {
        left: 0;
    }

    form .btn button {
        height: 100%;
        width: 100%;
        background: none;
        border: none;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
    }

    form .signup-link {
        text-align: center;
    }

    form .signup-link a {
        color: #3498bd;
        text-decoration: none;
    }

    form .signup-link a:hover {
        text-decoration: underline;
    }
    </style>

</head>

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img" style="background-image: url({{ asset('assets/images/login/bannerhome.png') }})">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->

                <form id='form' action="{{ route('auth.registerGuest.process') }}" method="POST">
                    @csrf
                    <div class="container-login100">
                        <div class="wrap-login100 p-6">
                                <div class="col col-login mx-auto my-2" style="max-width: 50% !important">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/images/login/brand.png') }}" class="header-brand-img" alt="">
                                    </div>
                                </div>
                                <input id="id" name="id" type="hidden" value="">
                                <input id="id" name="event_id" type="hidden" value="{{ $event->id }}">

                                <div class="data">
                                    <label for="">Name</label>
                                    <input type="text" name="name" required>
                                </div>
                                <div class="data">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" required>
                                </div>
                                <div class="data">
                                    <label for="">Address</label>
                                    <input type="text" name="address" required>
                                </div>
                                <div class="data">
                                    <label for="">Email</label>
                                    <input type="email" name="email" required>
                                </div>
                                <div class="data">
                                    <label for="">Username</label>
                                    <input type="text" name="username" placeholder="min:5 Character" required>
                                </div>
                                <div class="data">
                                    <label for="">Password</label>
                                    <input id="password" type="password" placeholder="Password" name="password" required>
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
    
                                <div class="btn">
                                    <div class="inner"></div>
                                    <button class="submit" id="show-login">Register</button>
                                </div>
                                <div class="signup-link">Not a Member ? <a href="">Sign Up Now</a></div>
               
                        </div>
                    </div>
                </form>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->

    </div>
    {{-- @secti on('script') --}}
    <!-- BACKGROUND-IMAGE CLOSED -->
    <!-- JQUERY JS -->
    
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('virtual/assets/js/script.js') }}"></script> --}}
    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('assets/js/show-password.min.js') }}"></script>
    
    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    
    <!-- INTERNAL Summernote Editor js -->
    <script src="{{ asset('virtual/assets/plugins/summernote-editor/summernote1.js') }}"></script>
    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
    
    <!-- CUSTOM JS -->
    <!-- FILE UPLOADES JS -->
    <script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
          $('#btn-regis').prop('disabled', true);
    
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
            $('#btn-regis').prop('disabled', true)
        } else if (strength == 3) {
            passwordStrength.classList.remove('progress-bar-success');
            passwordStrength.classList.remove('progress-bar-danger');
            passwordStrength.classList.add('progress-bar-warning');
            passwordStrength.style = 'width: 60%';
            $('#btn-regis').prop('disabled', true)
        } else if (strength == 4) {
            passwordStrength.classList.remove('progress-bar-warning');
            passwordStrength.classList.remove('progress-bar-danger');
            passwordStrength.classList.add('progress-bar-success');
            passwordStrength.style = 'width: 100%';
            $('#btn-regis').prop('disabled', false)
        }
    }







    $(document).ready(function () {
        $('#show-login').on('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Sudah Yakin?",
                icon: "warning",
                showCancelButton  : true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor : "#d33",
                confirmButtonText : "Ya!"
            }).then((result) => {
                if (result.value) {
                    $('#form').submit()
                }
            })
        })

    });
    </script>
    
    {{-- @Section --}}
</body>

</html>