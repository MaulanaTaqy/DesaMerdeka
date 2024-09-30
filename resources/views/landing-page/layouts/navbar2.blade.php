<div class="full-width-header">
    <header id="rs-header" class="rs-header header-style2 header-transparent">
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row-table">
                    <div class="col-cell header-logo">
                        <div class="logo-area">
                            <a href="/">
                                <img class="normal-logo" src="{{asset($app->logo_app)}}" alt="logo">
                                <img class="sticky-logo" src="{{asset($app->logo_app)}}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-cell">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <nav class="rs-menu hidden-md">
                                    <ul class="nav-menu">
                                        <li>
                                            <a href="/">Home</a>
                                        </li>
                                        <li><a href="/#join">About</a></li>
                                        <!-- <li><a href="/#counter">Member</a></li> -->
                                        <li><a href="/#why">Join Us</a></li>
                                        <li><a href="/#berita">News</a></li>
                                        <li><a href="/#event">Event</a></li>
                                        <li><a href="/#app">Product</a></li>
                                        <li><a href="/#industri">Industry</a></li>
                                        <li><a href="/#partner">Partner</a></li>
                                        <li><a href="/#fotter">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-cell">
                        <div class="expand-btn-inner">
                            <ul>
                                <li class="humburger">
                                    <a id="nav-expander" class="nav-expander bar" href="#">
                                        <div class="bar">
                                            <span class="dot1"></span>
                                            <span class="dot2"></span>
                                            <span class="dot3"></span>
                                            <span class="dot4"></span>
                                            <span class="dot5"></span>
                                            <span class="dot6"></span>
                                            <span class="dot7"></span>
                                            <span class="dot8"></span>
                                            <span class="dot9"></span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="right_menu_togle menu-wrap-off  hidden-md">
            <div class="close-btn">
                <a id="nav-close" class="nav-close">
                    <div class="line">
                        <span class="line1"></span>
                        <span class="line2"></span>
                    </div>
                </a>
            </div>
            <div class="rs-offcanvas-inner">
                <div class="canvas-logo">
                    <a href="/"><img src="{{asset($app->logo_app)}}" alt="logo"></a>
                </div>
                <div class="offcanvas-text">
                    <p>Desa Merdeka mempunyai Visi untuk menyediakan lahan seluas-luasnya untuk Desa eksisting guna mempromosikan solusi dan kegiatannya & untuk para UMKM / industri kreatif yang ternaungi dalamnya. Sehingga terjadi kolaborasi antara pelaku didalam Desa Merdeka</p>
                </div>
                <div class="canvas-contact">
                    <div class="address-area">
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-location"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Address</h4>
                                <em>{{$app->address}}</em>
                            </div>
                        </div>
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Email</h4>
                                <em><a href="#">{{$app->email}}</a></em>
                            </div>
                        </div>
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Phone</h4>
                                <em>{{$app->phone}}</em>
                            </div>
                        </div>
                    </div>
                    <ul class="social">
                        <li><a href="{{$app->fb_url}}"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="{{$app->ig_url}}"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="{{$app->yt_url}}"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul><br />
                    @if($user == null)
                    <div class="btn-part text-light" id="auth">
                        <a class="readon btn-text ticket2" href="{{route('auth.login')}}">
                            <span> Login Account </span>
                        </a>
                    </div>
                    @else
                    <div class="btn-part text-light" id="logged">
                        Selamat Datang! <span id="user"></span><br />
                        <a class="readon btn-text ticket2" href="{{route('dashboard')}}">
                            <span>Dashbord</span>
                        </a>
                        <a class="readon btn-text ticket2" href="{{route('auth.logout')}}" onclick="logout()">
                            <span>Logout</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </nav>
        <nav class="right_menu_togle mobile-navbar-menu" id="mobile-navbar-menu">
            <div class="close-btn">
                <a id="nav-close2" class="nav-close">
                    <div class="line">
                        <span class="line1"></span>
                        <span class="line2"></span>
                    </div>
                </a>
            </div>
            <ul class="nav-menu">
                <li class="menu-item-has-children current-menu-item">
                    <a href="/">Home</a>
                </li>
                <li><a href="/#join">About</a></li>
                <!-- <li><a href="/#counter">Member</a></li> -->
                <li><a href="/#why">Join Us</a></li>
                <li><a href="/#berita">News</a></li>
                <li><a href="/#event">Event</a></li>
                <li><a href="/#app">Product</a></li>
                <li><a href="/#industri">Industry</a></li>
                <li><a href="/#partner">Partner</a></li>
                <li><a href="/#fotter">Contact</a></li>
            </ul> <!-- //.nav-menu -->
            <div class="canvas-contact">
                <div class="address-area">
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title">Address</h4>
                            <em>{{$app->address}}</em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title">Email</h4>
                            <em><a href="#">{{$app->email}}</a></em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title">Phone</h4>
                            <em>{{$app->phone}}</em>
                        </div>
                    </div><br>
                    <div class="btn-part wow fadeinup new" id="auth-mobile">
                        <a class="readon btn-text ticket2" href="{{route('auth.login')}}">
                            <span> Login Account </span>
                        </a>
                    </div>
                    <div class="btn-part wow fadeinup new  text-light" id="logged-mobile">
                        Selamat Datang! <span id="user"></span><br />
                        <a class="readon btn-text ticket2" href="{{route('dashboard')}}">
                            <span>Dashbord</span>
                        </a>
                        <a class="readon btn-text ticket2" href="#" onclick="logout()">
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>