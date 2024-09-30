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

    <link href="{{ asset('landingpage/js/sweetalert/sweetalert.css') }}" rel="stylesheet" />

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

                <form id="form" action="{{ route('sponsor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container-login100">
                        <div class="wrap-login100 p-6" style="max-width: 800px;">
                            <form class="login100-form validate-form" action="" method="post">
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
                                <div class="wrap-input100 validate-input input-group">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="mdi mdi-home-modern" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="text" placeholder="Name" name="name" required>
                                </div>
                                <div class="wrap-input100 validate-input input-group">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="mdi mdi-cellphone" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="text" placeholder="Number Phone" name="phone" required>
                                </div>
                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email" name="email" required>
                                </div>
                                <div class="wrap-input100 validate-input input-group">
                                    <label for="">File Logo</label>
                                    <input class="input100 border-start-0 ms-0 form-control p-2 dropify" type="file" placeholder="Logo Image" name="image" required>
                                    <small class="text-danger mt-1">Recomended image svg, 512 x 512</small>
                                </div>
                                <label for="">Company Description</label>
                                <div class="input-group">
                                    <textarea id="summernote" name="desc"></textarea>
                                </div>
                                <div class="container-login100-form-btn">
                                    <button id="btn-regis" class="btn btn-primary w-100">
                                        Register
                                    </button>
                                </div>
                                <div class="text-center pt-3">
                                    {{-- <p class="text-dark mb-0">Already have account?<a href="{{ route('auth.login') }}" class="text-primary ms-1">Sign In</a></p> --}}
                                    <p class="text-dark mt-4">Back to  <a href="{{ route('home.index') }}" class="text-primary ms-1">Homepage</a></p>
                                </div>
                            </form>
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
    <script src="{{ asset('landingpage/js/sweetalert/sweetalert.min.js')}}"></script>

    
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
            $('#summernote').summernote();
    
            // ajaxSelect2Initiator('category', false, `{{ route('meta.member-category.select2') }}`);
    
            $('#btn-regis').on('click', function(e) {
                e.preventDefault();
      
                if($('#summernote').summernote('isEmpty'))  toast('Description cannot be null!');
                else $('#form').submit();
            })

            let type = false;

            if (`{{ session()->has('success') }}` == true) type = 'success';
            if (`{{ session()->has('error') }}` == true) type = 'error';

            if (type) {
                Swal.fire({
                    title: type == 'success' ? "Success !" : 'Error !',
                    html: type == 'success' ? "{{ session()->get('success') }}" : "{!! session()->get('error') !!}",
                    icon: `${type}`,
                    confirmButtonColor: "#556ee6"
                })
            }
    
        });
    </script>
    
    {{-- @Section --}}
</body>

</html>