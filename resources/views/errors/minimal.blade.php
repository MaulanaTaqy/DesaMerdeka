<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style_backup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dark-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/transparent-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/skin-modes.css') }}" />

    <!--- FONT-ICONS CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}" />

    <!-- COLOR SKIN CSS -->
    <link rel="stylesheet" id="theme" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

</head>

<body class="">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- End GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <!-- PAGE-CONTENT OPEN -->
            <div class="page-content error-page error2 text-white">
                <div class="container text-center">
                    <div class="error-template">
                        @yield('code')
                        <h5 class="error-details">
                            @yield('message')
                        </h5>
                        <div class="text-center">
                            <button onclick="history.back()" class="btn btn-secondary mt-5 mb-5" > <i class="fa fa-long-arrow-left"></i> Back to Home </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGE-CONTENT OPEN CLOSED -->
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>