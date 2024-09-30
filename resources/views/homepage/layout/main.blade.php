<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('homepage/images/fav.png') }}" type="image/png">
    
    <meta property="og:title" content="@yield('meta_title', 'Berita Desa Merdeka')">
    <meta property="og:description" content="@yield('meta_desc', 'Klik untuk membaca lebih lanjut')">
    <meta property="og:image" content="@yield('meta_image', asset('homepage/images/fav.png'))">
    <meta property="og:url" content="@yield('meta_url', '#')">

    <title>
        @yield('title', 'Desa Merdeka')
    </title> 
    
    @include('homepage.layout.partials.css.style')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .col-md-3:nth-child(4n+5) {
          clear: left;
        }
        
        #header {
          transition: all 0.5s;
        }
        
        .logo-nav-row .navbar-brand {
            padding: 20px 0;
            height: inherit;
            margin-right: 70px;
        }

        @media only screen and (min-width: 1280px) {
            .topbar {
                display: none;
            }
        }
    </style>
    @yield('css')
    
</head>

<body>
    <div class="wrapper">
        
        @include("homepage.layout.component.header_home")
        
        
        @yield("content_top")
        
        <!--Main Content Start-->
        <div class="main-content {{ Request::segment(2) == 'detail_event' || 'blog' ? 'p80' : '' }} ">
            @yield('content')
        </div>
        <!--Main Content End-->
        
        <!-- Footer -->
        @include('homepage.layout.component.footer')
        <!-- END Footer -->
        
    </div>
    <!--Wrapper End-->
    
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-right"></i>
        </div>
        <div class="sidebar-header">
            <img src="{{ url('/homepage') }}/images/footer-logo2.png" alt="">
        </div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li><a href="index.html">Default Home Page</a></li>
                    <li><a href="home-two.html">Home Page Two</a></li>
                    <li><a href="home-three.html">Home Page Three</a></li>
                </ul>
            </li>
            <li>
                <a href="aboutus.html">About Us</a>
            </li>
            <li>
                <a href="departments.html">Departments</a>
            </li>
            <li>
                <a href="news-full.html">News</a>
            </li>
            <li> <a href="event.html">Events</a> </li>
            <li> <a href="explore-city.html">Explore City</a> </li>
            <li> <a href="services.html">Services</a> </li>
            <li> <a href="contact.html">Contact</a> </li>
        </ul>
    </nav>
    <div class="overlay"></div>
    
    @include('homepage.layout.partials.javascript.style')
    <script>
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("header").style.zIndex = "999";
            document.getElementById("header").style.position = "fixed";
          } else {
            document.getElementById("header").style.position = "initial";
            document.getElementById("header").style.zIndex = "999";
            // document.getElementById("navbar").style.padding = "80px 10px";
            // document.getElementById("logo").style.fontSize = "35px";
          }
        } 
    </script>    
    @yield('javascript')
    
</body>

</html>
