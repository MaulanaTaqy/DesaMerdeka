<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />
    <meta name="_token" content="{{ csrf_token() }}" />

    <!-- Title -->
    <title> @yield('title', 'Desa Merdeka') </title>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('homepage/images/fav.png') }}" type="image/x-icon" />

    <!-- Bootstrap css -->
    <link href="{{ asset('virtual/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" id="style" />

    <!--- Icons css --->
    <link href="{{ asset('virtual/assets/css/icons.css') }}" rel="stylesheet">

    <!--- Style css --->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/css/style.css')}}"> --}}
    <link href="{{ asset('virtual/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('virtual/assets/css/plugins.css') }}" rel="stylesheet">

    <!--- Animations css --->
    <link href="{{ asset('virtual/assets/css/animate.css') }}" rel="stylesheet">

    <style>
        .ff_fileupload_wrap table.ff_fileupload_uploads button.ff_fileupload_start_upload {
            display: none !important;
        }

        .latest-tasks .task-line::before{
            height: 100% !important;
        }

        .text-limit {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* number of lines to show */
            line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .text-limit-x {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: var(--line);
                    line-clamp: var(--line);
            -webkit-box-orient: vertical;
            text-align: justify;
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

    @yield('css')

</head>

<body class="main-body app sidebar-mini ltr">

    <!-- Loader -->
    <div class="offwrap"></div>
    <div id="pre-load">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class='loader-icon'><img src="{{ asset('homepage/images/fav.png') }}" alt="Evenio - Events & Conference" width="500"></div>
            </div>
        </div>
    </div>
    <!-- /Loader -->

    <!-- page -->
    <div class="page custom-index">

        <!-- main-header -->
        @include('layout.navbar')
        <!-- /main-header -->

        <!-- main-sidebar -->
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        @include('layout.sidebar')
        <!-- main-sidebar -->

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- container -->
            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                @yield('breadcumb')
                <!-- /breadcrumb -->

                <!-- row -->
                @yield('content')
                <!-- row closed -->
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        <!--Sidebar-right-->
        @include('layout.right-sidebar')
        <!--/Sidebar-right-->

        <!-- Footer opened -->
        @include('layout.footer')
        <!-- Footer closed -->
    </div>
    <!-- page closed -->

    <!--- Back-to-top --->
    <a href="#top" id="back-to-top"><i class="ti-angle-double-up"></i></a>

    <!--- JQuery min js --->
    <script src="{{ asset('virtual/assets/plugins/jquery/jquery.min.js') }}"></script>

    <!--- Bootstrap Bundle js --->
    <script src="{{ asset('virtual/assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('virtual/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--- Ionicons js --->
    <script src="{{ asset('virtual/assets/plugins/ionicons/ionicons.js') }}"></script>

    <!--- Moment js --->
    <script src="{{ asset('virtual/assets/plugins/moment/moment.js') }}"></script>

    <!--- JQuery sparkline js --->
    <script src="{{ asset('virtual/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>


    <!--- P-scroll js --->
    <script src="{{ asset('virtual/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('virtual/assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

    <!--- Sidebar js --->
    <script src="{{ asset('virtual/assets/plugins/side-menu/sidemenu.js') }}"></script>

    <!--- sticky js --->
    <script src="{{ asset('virtual/assets/js/sticky.js') }}"></script>

    <!--- Right-sidebar js --->
    <script src="{{ asset('virtual/assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('virtual/assets/plugins/sidebar/sidebar-custom.js') }}"></script>


    <!--- Eva-icons js --->
    <script src="{{ asset('virtual/assets/js/eva-icons.min.js') }}"></script>

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
    <script src="{{ asset('landingpage/js/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.modal-effect', function(e) {
                e.preventDefault();
                var effect = $(this).attr('data-bs-effect');
                $('#modal_form').addClass(effect);
            });
            // hide modal with effect
            $(document).on('hidden.bs.modal', '#modal_form', function(e) {
                $(this).removeClass(function(index, className) {
                    return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
                });
            });
        });

        function ajaxSelect2Initiator(elm, modal, url, limit = false) {
            return $('#' + elm).select2({
                width: '100%',
                maximumSelectionLength: limit,
                dropdownParent: modal ? $(this).parent() : '',
                ajax: {
                    url: url,
                    dataType: 'json',
                    type: "GET",
                    delay: 500,
                    quietMillis: 500,
                    data: function(term) {
                        searchData = term.term;
                        return {
                            term: term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: $.map(response, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        }

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

        function toast(message) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'ERROR !',
                text: message,
                showConfirmButton: false,
                timer: 2000
            });
        }

        function validateUrl(string) {
            if (!string) return 'javascript:void(0)';

            try {
                new URL(string);
                return string;
            } catch (err) {
                return '//' + string;
            }
        }



        $(document).ready(function() {
            var url = `{{ route('event.upcoming-event') }}`;

            $.get(url, function(response) {
                data = response.data;
                console.log(data);
                data.map(function(item) {
                    $('#upcomingEvent').append(`<div class="Day">${moment(item.start_datetime).format('MMM DD, YYYY')}</div>
							<div class="tasks">
								<div class=" task-line info">
									<p href="javascript:void(0);" class="label" style="padding-top: 10px;">
										${item.title}
									</p>
									<div class="time">
										${moment(item.start_datetime).format('hh:mm A')}
									</div>
								</div>
							</div>`)
                });
            })
        })
    </script>

    @yield('script')

    <!--themecolor js-->
    <script src="{{ asset('virtual/assets/js/themecolor.js') }}"></script>

    <!--swither-styles js-->
    <script src="{{ asset('virtual/assets/js/swither-styles.js') }}"></script>

    <!--- Custom js --->
    <script src="{{ asset('virtual/assets/js/custom.js') }}"></script>

</body>

</html>