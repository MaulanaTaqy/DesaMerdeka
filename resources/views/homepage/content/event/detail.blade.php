@extends('homepage.layout.main')

@section('meta_title', $event->title)
@section('meta_desc', strip_tags($event->desc))
@section('meta_image', asset($event->image))
@section('meta_url', URL::current())

@section('css')
    <style>
        .progress {
            height: 3px !important;
        }

        .progress-bar-danger {
            background-color: #e90f10;
        }

        .progress-bar-warning {
            background-color: #ffad00;
        }

        .progress-bar-success {
            background-color: #02b502;
        }

        .fa-circle {
            font-size: 6px;
        }

        .fa-check {
            color: #02b502;
        }

        div#popover-password>ul.list-unstyled>li {
            border-bottom: 0px !important;
        }
    </style>
    {{-- <style>
        button {
            background-color: #40407e;
            border:1px solid #40407e;
            color: white;
            border-radius: 5px;
            padding: 10px 40px 10px 40px;
        }
    </style> --}}
    <style>
        .show-btn {
            background: #fff;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: 500;
            color: #3498bd;
            cursor: pointer;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .show-btn,
        .container1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .show-login-btn {
            background: #fff;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: 500;
            color: #3498bd;
            cursor: pointer;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .show-login-btn,
        .container1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        input[type="checkbox"] {
            display: none;
        }

        .container1 {
            display: none;
            background: #fff;
            width: 500px;
            padding: 30px;
            position: absolute;
            left: 83%;
            top: 0%;
            z-index: 999;
            margin-left: -150px;
            margin-top: -120px;
            border-radius: 20px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        }

        #show:checked~.container1 {
            display: block;
        }

        #show-login:checked~.container1 {
            display: block;
        }

        .container1 .close-btn {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 25px;
            cursor: pointer;
        }

        .container1 .close-btn:hover {
            color: #3498db;
        }

        .container1 .text {
            font-size: 35px;
            font-weight: 600;
            text-align: center;
        }

        .container1 form {
            margin-top: -20px;
        }

        .container1 form .data {
            height: 45px;
            width: 100%;
            margin: 40px 0;
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
            background: #40407e;
            transition: 0.5s ease;
        }

        form .btn:hover .inner {
            background: #da4949;
            left: 0;
            transition: 0.5s ease;
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

        @media (min-width: 700px) and (max-width: 916px) {
            .social-info {
                margin-left: 400px;
                margin-top: -105px;
                width: 80px;

            }

            .social-info1 {
                margin-left: 400px;
                margin-bottom: -100px;
                width: 80px;

            }

            .readon {
                margin-bottom: -80px;
            }
        }

        @media (min-width: 917px) and (max-width: 1000px) {
            .social-info {
                margin-left: 400px;
                margin-top: -105px;
                width: 80px;

            }

            .social-info1 {
                margin-left: 400px;
                margin-bottom: -100px;
                width: 80px;

            }

            .readon {
                margin-bottom: -80px;
            }
        }

        @media (min-width: 200px) and (max-width: 768px) {
            .social-info {
                margin-left: 250px;
                margin-top: -105px;
                width: 80px;

            }

            .social-info1 {
                margin-left: 250px;
                margin-bottom: -100px;
                width: 80px;

            }

            .readon {
                margin-top: 50px;
            }

            .container1 {
                width: 80% !important;
                top: 50% !important;
                left: 50% !important;
                margin-left: 0 !important;
                margin-top: 0 !important;
            }

        }

        @media (min-width: 10px) and (max-width: 500px) {
            .social-info {
                margin-left: 200px;
                margin-top: -105px;
            }

            .social-info1 {
                margin-left: 200px;
                margin-bottom: -100px;
                width: 80px;

            }

            .readon {
                margin-top: 50px;
            }
        }

        .contact-team {
            background-color: white;
            color: #40407e;
        }
    </style>
@endsection

@section('content_top')
    <section class="wf100 subheader">
        <div class="container">
            <h2>{{ $event->title }}</h2>
            <ul>
                <li> <a href="index.html">Home</a> </li>
                <li> <a href="#">Events</a> </li>
                <li> {{ $event->title }} </li>
            </ul>
        </div>
    </section>
@endsection

@section('content')
    <div class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="event-details">
                        <div class="event-thumb">
                            <img src="{{ $event->images->count() > 0 ? (file_exists($event->images->first()->image) ? asset($event->images->first()->image) : asset('/homepage/images/event-detail.jpg')) : asset('/homepage/images/event-detail.jpg') }}" alt="">
                        </div>
                        <!--Counter-->
                        <div class="event-counter">
                            <ul>
                                <li class="first-col"><strong>This Event
                                        Starting in:</strong>
                                </li>
                                <li class="snd-col">
                                    <div id="defaultCountdown"></div>
                                </li>
                                <li class="trd-col">
                                    @if (date('Y-m-d') >= $event->start_datetime)
                                        <a href="#"
                                            style="padding: 5px 20px; background-color:#fff; color:#40407e; cursor: no-drop;">Berakhir</a>
                                    @elseif (!Auth::check())
                                        <label for="show" class="contact-team" style="float: none; ">Daftar</label>
                                    @elseif (getRoleName() == 'guest')
                                        <a href="#" style="padding: 5px 20px;"
                                            onclick="event.preventDefault(); confirmDaftar('{{ $event->id }}').submit();">
                                            Daftar
                                        </a>
                                        <form id="{{ $event->id }}" action="{{ route('daftarGuest', $event->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <a href="#" style="padding: 5px 20px;"
                                            onclick="event.preventDefault(); confirmDaftar('{{ $event->id }}').submit();">
                                            Daftar
                                        </a>
                                        <form id="{{ $event->id }}" action="{{ route('daftar', $event->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <!--Counter End-->
                        <!--Event Details text-->
                        <div class="event-content" style="display:grid;">
                            <!--Date and Share Start-->
                            <div class="event-date-share">
                                <div class="edate"> <strong>{{ date('d', strtotime($event->start_datetime)) }}</strong>
                                    {{ date('M', strtotime($event->start_datetime)) }} <span
                                        class="year">{{ date('Y', strtotime($event->start_datetime)) }}</span> </div>
                                <div class="event-share">
                                    <ul>
                                        <li><a class="like" href="#"><i class="fas fa-share-alt"></i> 2k</a></li>
                                        <li><a class="fb" href="{{ urlCheck($event->fb_url) }}"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="ig" href="{{ urlCheck($event->ig_url) }}"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li><a class="tw" href="{{ urlCheck($event->yt_url) }}"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <li><a class="in" href="{{ urlCheck($event->linkedIn_url) }}"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Date and Share End-->
                            <div class="etext" style="margin-bottom: 30px">
                                <ul class="emeta">
                                    <li><strong>Time:</strong>
                                        {{ date('h:i a', strtotime($event->start_datetime)) . ' - ' . date('h:i a', strtotime($event->end_datetime)) }}
                                    </li>
                                    {{-- <li><strong>Attending:</strong> 613</li> --}}
                                    <li><strong>Location:</strong> {{ $event->address }}</li>
                                </ul>

                                {!! $event->desc !!}
                            </div>

                            @if (!Auth::check())
                                <div class="btn-part" style="margin-top: -50px;">
                                    <input type="checkbox" id="show">
                                    <div class="container1">
                                        <label for="show" class="close-btn"><i class="fas fa-times"></i></label>
                                        <h2 class="text-left">Daftar</h2>
                                        <form id='form' action="{{ route('auth.registerGuest.process') }}"
                                            method="POST">
                                            @csrf
                                            <input id="id" name="id" type="hidden" value="">
                                            <input id="id" name="event_id" type="hidden"
                                                value="{{ $event->id }}">
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
                                                <input type="text" name="username" placeholder="min:5 Character"
                                                    required>
                                            </div>
                                            <div class="data">
                                                <label for="">Password</label>
                                                <input id="password" type="password" placeholder="Password"
                                                    name="password" required>
                                            </div>
                                            <div id="popover-password">
                                                <p><span id="result"></span></p>
                                                <div class="progress">
                                                    <div id="password-strength" class="progress-bar" role="progressbar"
                                                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
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
                                                <button class="submit" id="show-login"
                                                    style="margin-top: 3px">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!--Event Details End-->
                        <!--Event Speakers Start-->
                        <div class="event-speakers">
                            <h3>Speakers & Chief Guests</h3>
                            <div class="row">
                                @foreach ($event->event_speaker as $data)
                                    <!--Speaker Box Start-->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="h3-team-box">
                                            <div class="team-info" style="">
                                                <h5>{{ $data->speaker->name }}</h5>
                                                <strong>{{ $data->speaker->title }}</strong>
                                                {{-- <p> Stephen is very Compitent person who assist to Mayor of the City. </p> --}}
                                                <ul>
                                                    <li><strong>Connect:</strong></li>
                                                    <li><a href="{{ urlCheck($data->speaker->fb_url) }}"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    {{-- <li><a href="{{ $data->speaker-> }}"><i class="fab fa-twitter"></i></a></li> --}}
                                                    <li><a href="{{ urlCheck($data->speaker->linkedIn_url) }}"><i
                                                                class="fab fa-linkedin-in"></i></a></li>
                                                    <li><a href="{{ urlCheck($data->speaker->ig_url) }}"><i
                                                                class="fab fa-instagram"></i></a></li>
                                                    <li><a href="{{ urlCheck($data->yt_url) }}" class="yt"><i
                                                                class="fab fa-youtube"></i></a></li>
                                                </ul>
                                            </div>
                                            <img src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/highlights-img1.jpg')) : asset('/homepage/images/t3p-img1.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <!--Speaker Box End-->
                                @endforeach
                            </div>
                        </div>
                        <!--Event Speakers End-->
                        <!--Event Gallery Start-->
                        {{-- <div class="event-gallery">
                        <h3>Our Partner</h3>
                        <ul class="gallery">
                            @foreach ($event->event_sponsor as $data)
                            <li>
                                <div class="eg-thumb"> <a href="{{ asset('/homepage/images/eg1.jpg') }}" data-rel="prettyPhoto" title=""> <i class="fas fa-search"></i> </a> <img src="{{ asset('/homepage/images/eg1.jpg') }}" alt=""> </div>
                            </li>
                            @endforeach
                        </ul>
                    </div> --}}
                    </div>
                </div>
                <!--Content Col End-->
                <!--Sidebar Start-->
                <div class="col-md-3">
                    <div class="sidebar">
                        <!--Widget Start-->
                        <div class="widget">
                            <h4>Event By</h4>
                            @php $type = $event->admin ? 'admin' : 'member'; @endphp
                            <div class="about-widget inner">
                                <img src="{{ $event->{$type}->image ? (file_exists($event->{$type}->image)? asset($event->{$type}->image) : asset('/homepage/images/about-widget-img.jpg')) : asset('/homepage/images/about-widget-img.jpg') }}" alt="">
                                <p> {!! limitString($event->{$type}->desc, 100) !!}</p>
                                {{-- <a href="#">{{ $event->admin ? 'AdminVT' : $event->{$type}->name }}</a> --}}
                                <a href="#">{{ $event->{$type}->name }}</a>
                            </div>
                        </div>
                        <!--Widget End-->
                        <div class="widget">
                            <h4>Categories</h4>
                            <div class="categories inner">
                                <ul>
                                    @foreach ($categories as $data)
                                        <li>
                                            <a href="{{ route('home.event.all', $data->id) }}">
                                                {{ $data->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--Widget End-->
                        <!--Widget Start-->
                        <div class="widget">
                            <h4>Upcoming Events</h4>
                            <div class="upcoming-events inner">

                                <ul>
                                    @foreach ($allEvent->where('start_datetime', '>=', now()) as $data)
<li>
                                    <div class="edate"> <strong>{{ date('d', strtotime($data->start_datetime)) }}</strong>{{ date('M', strtotime($data->start_datetime)) }}<span class="year">{{ date('Y', strtotime($data->start_datetime)) }}</span>
                                    </div>
                                    <h6> <a href="{{ route('home.event.detail', $data->id) }}">{{ $data->title }}</a> </h6>
                                    <span class="loc">{{ $data->address }}</span>
                                </li>
@endforeach
                            </ul>
                        </div>
                    </div>
                    <!--Widget End-->
                </div>
            </div>
        </div>
    </div>
</div>

 <!--Departments & Information Desk Start-->
 <section class="wf100 p75-50  depart-info" style="margin-bottom: -80px">
    <div class="container">
        <div class="title-style-3">
            <h3>Our Partner</h3>
            <p>Read the News Updates and Articles about Government </p>
        </div>
        <div class="row"> 
            <!--Icon Box Start-->
            @foreach ($event->event_sponsor as $data)
<div class="col-md-3 col-sm-3">
                    <div class="deprt-icon-box"> <img src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/deprticon1.png')) : asset('/homepage/images/deprticon1.png') }}" alt="">
                    <h6> <a href="#">{{ $data->sponsor->name }}</a> </h6>
                    <a class="rm" href="#">Read More</a> </div>
                </div>
@endforeach
            <!--Icon Box End--> 
        </div>
    </div>
</section>
<!--Departments & Information Desk End-->
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('/homepage/js/jquery.countdown.js') }}"></script>
            <script>
                var year = `{{ date('Y', strtotime($event->start_datetime)) }}`;
                var month = `{{ date('m', strtotime($event->start_datetime)) }}`;
                var day = `{{ date('d', strtotime($event->start_datetime)) }}`;
                var hour = `{{ date('H', strtotime($event->start_datetime)) }}`;
                var austDay = new Date(year, month - 1, day, hour);
                $('#defaultCountdown').countdown({
                    until: austDay
                });
                $('#year').text(austDay.getFullYear());

                $('#btn-regis').prop('disabled', true);

                let state = false;
                let password = document.getElementById("password");
                let passwordStrength = document.getElementById("password-strength");
                let lowUpperCase = document.querySelector(".low-upper-case i");
                let number = document.querySelector(".one-number i");
                let specialChar = document.querySelector(".one-special-char i");
                let eightChar = document.querySelector(".eight-character i");

                password.addEventListener("keyup", function() {
                    let pass = document.getElementById("password").value;
                    checkStrength(pass);
                });

                function toggle() {
                    if (state) {
                        document.getElementById("password").setAttribute("type", "password");
                        state = false;
                    } else {
                        document.getElementById("password").setAttribute("type", "text")
                        state = true;
                    }
                }

                function myFunction(show) {
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

                $(document).ready(function() {
                    $('#show-login').on('click', function(e) {
                        e.preventDefault();

                        Swal.fire({
                            title: "Event Register",
                            text: "Apakah Anda yakin ingin mendaftar event ini?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ya!"
                        }).then((result) => {
                            if (result.value) {
                                $('#form').submit()
                            }
                        })
                    })

                });

                function confirmDaftar(id) {
                    event.preventDefault();
                    event.stopPropagation();
                    Swal.fire({
                        title: 'Event Register',
                        text: 'Apakah Anda yakin ingin mendaftar event ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, daftar sekarang!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $('#' + id).submit();
                        }
                    });
                }
            </script>
@endsection

