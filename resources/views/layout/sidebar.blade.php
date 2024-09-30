<div class="sticky">
    <aside class="app-sidebar sidebar-scroll">
        <div class="main-sidebar-header active">
            <a class="desktop-logo logo-light active" href="index.html"><img src="{{ asset('homepage/images/logo/logo.png') }}" class="main-logo" alt="logo"></a>
            <a class="desktop-logo logo-dark active" href="index.html"><img src="{{ asset('homepage/images/logo/logo.png') }}" class="main-logo" alt="logo"></a>
            <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="{{ asset('virtual/assets/img/brand/favicon.png') }}" alt="logo"></a>
            <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="{{ asset('virtual/assets/img/brand/favicon-white.png') }}" alt="logo"></a>
        </div>
        <div class="main-sidemenu">
            <div class="main-sidebar-loggedin">
                <div class="app-sidebar__user">
                    <div class="dropdown user-pro-body text-center">
                        <div class="user-pic">
                            <img src="{{ asset(Auth::user()->{getRoleName()}->image ?? 'virtual/assets/img/default-user.webp') }}" alt="user-img" class="rounded-circle mCS_img_loaded">
                        </div>
                        <div class="user-info">
                            <h6 class=" mb-0 text-dark">{{ Auth::user()->{getRoleName()}->name }}</h6>
                            @if (getRoleName() == 'admin')
                            <span class="text-muted app-sidebar__user-name text-sm">{{ 'Administrator' }}</span>
                            @else
                            <span class="text-muted app-sidebar__user-name text-sm">{{ Auth::user()->member->member_type->name ?? '' }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-navs">
                <ul class="nav  nav-pills-circle" style="justify-content: center;">
                    @if(getRoleName() != 'guest')
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Settings" aria-describedby="tooltip365540">
                        <a href="{{  getRoleName() == 'admin' ? route('home-contact.index') : route('profile-member.index') }}" class="nav-link text-center m-2">
                            <i class="fe fe-settings"></i>
                        </a>
                    </li>
                    @endif
                    <!--<li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Chat" aria-describedby="tooltip143427">-->
                    <!--    <a class="nav-link text-center m-2">-->
                    <!--        <i class="fe fe-mail"></i>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Followers">
                        <a href="{{ route('profile.index') }}" class="nav-link text-center m-2">
                            <i class="fe fe-user"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Logout">
                        <a href="{{ route('auth.logout') }}" class="nav-link text-center m-2">
                            <i class="fe fe-power"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
            <ul class="side-menu ">
                @if(getRoleName() == 'admin' || auth()->user()->can('approved'))
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('dashboard') }}" data-sidebar="dashboard">
                        <i class="side-menu__icon fe fe-airplay"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                @endif
                @can('member-account')
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Management Account</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" data-sidebar="umkm" href="{{ route('umkm.index') }}">UMKM</a></li>
                        <li><a class="slide-item" data-sidebar="komunitas-asosiasi" href="{{ route('komunitas-asosiasi.index') }}">Komunitas/Asosiasi</a></li>
                        <li><a class="slide-item" data-sidebar="industri" href="{{ route('industri.index') }}">Industri</a></li>
                    </ul>
                </li>
                @endcan
                @role('admin')
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Management Member</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" data-sidebar="desa" href="{{ route('desa.index') }}">Desa</a></li>
                        <li><a class="slide-item" data-sidebar="umkm" href="{{ route('umkm.index') }}">UMKM</a></li>
                        <li><a class="slide-item" data-sidebar="komunitas-asosiasi" href="{{ route('komunitas-asosiasi.index') }}">Komunitas/Asosiasi</a></li>
                        <li><a class="slide-item" data-sidebar="industri" href="{{ route('industri.index') }}">Industri</a></li>
                        <li><a class="slide-item" data-sidebar="guest-event" href="{{ route('guest-event.index') }}">Event Member</a></li>
                    </ul>
                </li>
                @endrole
                @if(getRoleName() == 'admin' || auth()->user()->can('approved'))
                <li class="slide">
                    <a class="side-menu__item" data-sidebar="blog" href="{{ route('blog.index') }}">
                        <i class="side-menu__icon far fa-newspaper"></i>
                        <span class="side-menu__label">Management Blog / Articel</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-sidebar="product" href="{{ route('product.index') }}">
                        <i class="side-menu__icon fab fa-android"></i>
                        <span class="side-menu__label">Product Apps & Software</span>
                    </a>
                </li>
                @endif
                @if(getRoleName() == 'admin' || auth()->user()->can('approved'))
                <li class="slide">
                    <a class="side-menu__item" data-sidebar="service" href="{{ route('service.index') }}">
                        <i class="side-menu__icon fa fa-tasks"></i>
                        <span class="side-menu__label">Service</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-calendar"></i><span class="side-menu__label">Management Event</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" data-sidebar="speakers" href="{{ route('meta.speakers.index') }}">Event Speakers</a></li>
                        <li><a class="slide-item" data-sidebar="event" href="{{ route('event.index') }}">Event</a></li>
                        @can('approved')
                        <li><a class="slide-item" data-sidebar="guest-event" href="{{ route('guest-event.index') }}">Event Member</a></li>
                        @endcan()
                    </ul>
                </li>
                @endif
                @if (getRoleName() != "admin")
                <li class="slide">
                    <a class="side-menu__item" data-sidebar="list" href="{{ route('event.guest.index') }}">
                        <i class="side-menu__icon fe fe-calendar"></i>
                        <span class="side-menu__label">Registered Event</span>
                    </a>
                </li>
                @endif
                @if (getRoleName() == "guest")
                <li class="slide">
                    <a class="side-menu__item" data-sidebar="register-event" href="{{ route('event.register-event') }}">
                        <i class="side-menu__icon fe fe-calendar"></i>
                        <span class="side-menu__label">Available Event</span>
                    </a>
                </li>
                @endif
                @role('admin')
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Pengaturan Category</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" data-sidebar="member-category" href="{{ route('meta.member-category.index') }}">Member Category</a></li>
                        <li><a class="slide-item" data-sidebar="product-category" href="{{ route('meta.product-category.index') }}">Product Category</a></li>
                        <li><a class="slide-item" data-sidebar="blog-category" href="{{ route('meta.blog-category.index') }}">Blog Category</a></li>
                        <li><a class="slide-item" data-sidebar="event-category"href="{{ route('meta.event-category.index') }}">Event Category</a></li>
                        <li><a class="slide-item" data-sidebar="gallery-category"href="{{ route('meta.gallery-category.index') }}">Gallery Category</a></li>
                    </ul>
                </li>
                @endrole
                @if(getRoleName() == 'admin' || auth()->user()->can('approved'))
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon si si-badge"></i><span class="side-menu__label">Management Supported</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" data-sidebar="sponsors" href="{{ route('sponsors.index') }}">Supported Industry</a></li>
                        {{-- <li><a class="slide-item" data-sidebar="support-assosiasi" href="#">Supported Assosiasi</a></li> --}}
                    </ul>
                </li>
                @endif
                @role('admin')
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fas fa-code-branch"></i><span class="side-menu__label">Management Homepage</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" data-sidebar="home-contact" href="{{ route('home-contact.index') }}">Homepage & Contact</a></li>
                        <li><a class="slide-item" data-sidebar="blog-banner" href=" {{ route('blog-banner.index') }}">Management Banner</a></li>
                        <li><a class="slide-item" data-sidebar="gallery" href="{{ route('gallery.index') }}">Page Gallery</a></li>
                        <li class="sub-slide">
                            <a class="slide-item" data-bs-toggle="sub-slide" href="javascript:void(0);"><span class="sub-side-menu__label">Page Roadmap</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-side-menu__item" data-sidebar="roadmap" href="{{ route('roadmap.index') }}">Road Maps</a></li>
                                <li><a class="sub-side-menu__item" href="{{ route('developer-notes.index') }}">Info Update Dev</a></li>
                            </ul>
                        </li>
                        <li><a class="slide-item" data-sidebar="faq" href="{{ route('faq.index') }}">FAQ & Term And Condition</a></li>
                        <li><a class="slide-item" data-sidebar="home-about" href="{{ route('home-about.index') }}">About Us</a></li>
                    </ul>
                </li>
                @endrole
                @role('member')
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="side-menu__icon fas fa-code-branch"></i><span class="side-menu__label">Management Homepage</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" data-sidebar="profile-member" href="{{ route('profile-member.index') }}">Homepage & Contact</a></li>
                        @if(getRoleName() == 'admin' || auth()->user()->can('approved'))
                        <li><a class="slide-item" data-sidebar="team-member" href="{{ route('team-member.index') }}">Team Member</a></li>
                        <li><a class="slide-item" data-sidebar="gallery" href="{{ route('gallery.index') }}">Gallery</a></li>
                        @endif
                    </ul>
                </li>
                @endrole
                @if(getRoleName() == 'admin' || auth()->user()->can('approved'))
                <li class="slide">
                    <a class="side-menu__item" data-sidebar="" href="#">
                        <i class="side-menu__icon bi bi-chat-left-dots"></i>
                        <span class="side-menu__label">Chat</span>
                    </a>
                </li>
                @endif
                @if(getRoleName() == 'admin' || auth()->user()->can('approved'))
                <li class="slide">
                    <a class="side-menu__item" data-sidebar="registrasi" href="{{ route('panduan.regis.indexRegis') }}">
                        <i class="side-menu__icon far fa-address-book"></i>
                        <span class="side-menu__label">Panduan</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-sidebar="update-noted" href="{{ route('update-noted.index') }}">
                        <i class="side-menu__icon fab fa-wpforms"></i>
                        <span class="side-menu__label" >Update Note</span>
                    </a>
                </li>
                @endif
                @if (getRoleName() == "guest")
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('guest-dashboard.index') }}" data-sidebar="dashboard">
                        <i class="side-menu__icon fe fe-airplay"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                @endif
                <li class="slide">
                    <a class="side-menu__item" data-sidebar="" href="{{ route('home.index') }}">
                        <i class="side-menu__icon fas fa-home"></i>
                        <span class="side-menu__label" >Homepage</span>
                    </a>
                </li>
                
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
        </div>
    </aside>
</div>