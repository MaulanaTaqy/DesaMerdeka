<div class="full-width-header">
    <header id="rs-header" class="rs-header header-style2 header-transparent">
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row-table">
                    <div class="col-cell header-logo">
                        <div class="logo-area">
                            <a href="/">
                                <img class="normal-logo" src="{{ asset($app->logo_app ?? 'landingpage/images/logo-light2.png') }}" alt="logo">
                                <img class="sticky-logo" src="{{ asset($app->logo_app ?? 'landingpage/images/logo-light2.png') }}" alt="logo">
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
                                        <li class="menu-item-has-children">
                                            <a href="#">Menu Page</a>
                                            <ul class="sub-menu">
                                                <li><a href="/#join">Join Desa</a></li>
                                                <li><a href="/#counter">Member & UMKM</a></li>
                                                <li><a href="/#why">Why Desa</a></li>
                                                <li><a href="/#berita">News</a></li>
                                                <li><a href="/#event">Event & Program</a></li>
                                                <li><a href="/#app">Produk Apps & Software</a></li>
                                                <li><a href="/#industri">Supported Industry</a></li>
                                                {{-- <li><a href="/#assosiasi">Supported Assosiasi</a></li> --}}
                                                <li><a href="/#fotter">Contact</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Menu</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('home.event.all')}}">Event Program</a></li>
                                                <li><a href="{{route('app.index')}}">Produk Apps & Software</a></li>
                                                <li><a href="{{route('home.faq.index')}}">FAQ</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('home.member.all')}}">Member</a>
                                        </li>
                                        <li>
                                            <a href="{{route('home.blog.all')}}">Blog</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Tentang Kami</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('home.gallery.index')}}">Gallery</a></li>
                                                <li><a href="{{route('home.roadmap')}}">Road Map</a></li>
                                                <li><a href="{{route('about.index')}}">Tentang Kami</a></li>
                                                <li><a href="{{route('contact.index')}}">Kontak</a></li>
                                            </ul>
                                        </li>
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
                    <a href="/"><img src="{{ asset($app->logo_app ?? 'landingpage/images/logo-light2.png') }}" alt="logo"></a>
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
                                <em>{{ $app->address ?? 'Jalan Gatot Subroto Kav 52-53 Lantai 11 - Jakarta Selatan, DKI Jakarta, Indonesia'}}</em>
                            </div>
                        </div>
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Email</h4>

                                
                                <em>{{$app->email ?? 'virtualDesa@gmail.com'}}</em>
                            </div>
                        </div>
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Phone</h4>
                                <em>{{$app->phone ?? '(+62) 85162972729'}}</em>
                            </div>
                        </div>
                    </div>
                    <ul class="social">
                        <li><a href="{{ urlCheck( $app->fb_url ?? '')  }}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="{{ urlCheck($app->ig_url ?? '') }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="{{ urlCheck($app->yt_url ?? '') }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="{{ urlCheck($app->twt_url ?? '') }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="{{ urlCheck($app->tk_url ?? '') }}" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                    </ul><br />
                    @if(!Auth::check())
                    <div class="btn-part" id="auth">
                        <a class="readon btn-text ticket2" href="{{route('auth.login')}}">
                            <span> Login/Register </span>
                        </a>
                    </div>
                    @else
                    <div class="btn-part  text-light" id="logged">
                        <h4 class="title" style="font-size: 16px; line-height: 26px; font-weight: 600; color: #ffffff; margin-bottom: 5px;">Selamat Datang!</h4>
                        <span id="user">{{ Auth::user()->{getRoleName()}->name }}</span><br /><br>
                        <a class="readon btn-text ticket2" href="{{route('dashboard')}}">
                            <span>Dashbord</span>
                        </a>
                        <a class="readon btn-text ticket2" type="button" href="#" onclick="logout()">
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
                <li class="menu-item-has-children">
                    <a href="#">Menu Page</a>
                    <ul class="sub-menu">
                        <li><a href="/#join">Join Desa</a></li>
                        <li><a href="/#counter">Member & UMKM</a></li>
                        <li><a href="/#why">Why Desa</a></li>
                        <li><a href="/#berita">News</a></li>
                        <li><a href="/#event">Event & Program</a></li>
                        <li><a href="/#app">Produk Apps & Software</a></li>
                        <li><a href="/#industri">Supported Industry</a></li>
                        {{-- <li><a href="/#assosiasi">Supported Assosiasi</a></li> --}}
                        <li><a href="/#fotter">Contact</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Menu</a>
                    <ul class="sub-menu">
                        <li><a href="{{route('home.event.all')}}">Event Program</a></li>
                        <li><a href="{{route('app.index')}}">Produk Apps & Software</a></li>
                        <li><a href="{{route('home.faq.index')}}">FAQ</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('home.member.all')}}">Member</a>
                </li>
                <li>
                    <a href="{{route('home.blog.all')}}">Blog</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Tentang Kami</a>
                    <ul class="sub-menu">
                        <li><a href="{{route('home.gallery.index')}}">Gallery</a></li>
                        <li><a href="{{route('home.roadmap')}}">Road Map</a></li>
                        <li><a href="{{route('about.index')}}">Tentang Kami</a></li>
                        <li><a href="{{route('contact.index')}}">Kontak</a></li>

                    </ul>
                </li>
            </ul> <!-- //.nav-menu -->
            <div class="canvas-contact">
                <div class="address-area">
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title">Address</h4>
                            <em>{{$app->address ?? 'Jalan Gatot Subroto Kav 52-53 Lantai 11 - Jakarta Selatan, DKI Jakarta, Indonesia'}}</em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title">Email</h4>
                            <em>{{$app->email ?? 'virtualDesa@gmail.com'}}</em>
                        </div>
                    </div>
                    <div class="address-list">
                        <div class="info-icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="info-content">
                            <h4 class="title">Phone</h4>
                            <em>{{$app->phone ?? '(+62) 85162972729'}}</em>
                        </div>
                    </div>
                    <ul class="social">
                        <li><a href="{{ urlCheck( $app->fb_url ?? '')  }}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="{{ urlCheck($app->ig_url ?? '') }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="{{ urlCheck($app->yt_url ?? '') }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="{{ urlCheck($app->twt_url ?? '') }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="{{ urlCheck($app->tk_url ?? '') }}" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                    </ul><br>
                    @if(!Auth::check())
                    <div class="btn-part" id="auth-mobile">
                        <a class="readon btn-text ticket2" href="{{route('auth.login')}}">
                            <span> Login/Register </span>
                        </a>
                    </div>
                    @else
                    <div class="btn-part text-light" id="logged-mobile">
                        <h4 class="title" style="font-size: 16px; line-height: 26px; font-weight: 600; color: #ffffff; margin-bottom: 5px;">Selamat Datang!</h4>
                        <span id="user">{{ Auth::user()->{getRoleName()}->name }}</span><br /><br>
                        <a class="readon btn-text ticket2" href="{{route('dashboard')}}">
                            <span>Dashbord</span>
                        </a>
                        <a class="readon btn-text ticket2" type="button" href="#" onclick="logout()">
                            <span>Logout</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </nav>
    </header>
</div>