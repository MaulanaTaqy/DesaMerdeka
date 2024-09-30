<header class="wf100 header">
    <div class="logo-nav-row">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html">
                                <img src="{{ url('/homepage/images/logo/logo.png') }}" alt="" style="width: 100px">
                            </a>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        Menu Page
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/#join">Join Desa</a>
                                        </li>
                                        <li>
                                            <a href="/#counter">Member & UMKM</a>
                                        </li>
                                        <li>
                                            <a href="/#why">Why Desa</a>
                                        </li>
                                        <li>
                                            <a href="/#berita">News</a>
                                        </li>
                                        <li>
                                            <a href="/#event">Event & Program</a>
                                        </li>
                                        <li>
                                            <a href="/#app">Produk Apps & Software</a>
                                        </li>
                                        <li>
                                            <a href="/#industri">Supported Industry</a>
                                        </li>
                                        <li>
                                            <a href="/#fotter">Contact</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        Menu
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('home.event.all') }}">
                                                Event Program
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('app.index') }}">
                                                Produk Apps & Software
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('home.faq.index') }}">
                                                FAQ
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('home.member.all') }}">Member</a>
                                </li>
                                <li>
                                    <a href="{{ route('home.blog.all') }}">Blog</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        Tentang Kami
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('home.gallery.index') }}">
                                                Gallery
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('home.roadmap') }}">
                                                Road Map
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about.index') }}">
                                                Tentang Kami
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('contact.index') }}">
                                                Kontak
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
