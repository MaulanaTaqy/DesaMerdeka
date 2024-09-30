@extends('homepage.layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('homepage') }}/js/rev-slider/css/settings.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ asset('homepage') }}/js/rev-slider/css/layers.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ asset('homepage') }}/js/rev-slider/css/navigation.css" type='text/css' media='all' />
    <style>
        /*.subheader {*/
        /*    background-size: cover !important;*/
        /*    background-position: center !important;*/
        /*    height: 500px !important;*/
        /*}*/
        
        .button-background {
            padding-left: 50px;
            padding-right: 50px;
            background: rgba(0, 0, 0, 0) linear-gradient(160deg, #ff0066 0%, #d41872 50%, #a445b2 100%) repeat scroll 0% 0%;
        }

        .hamdan {
            color: #d94148;
            padding: 0 10px;
        }
    </style>
@endsection

@section('content_top')
{{--    
    <div class="main-slider wf100">
        <div class="home2-slider rev_slider_wrapper">
            <div class="rev_slider_wrapper fullwidthbanner-container">
                <div id="rev-slider2" class="rev_slider fullwidthabanner">
                    <ul>
                        <li data-transition="fade">
                            <img src="{{ asset('homepage') }}/images/h3-slide1.jpg" alt="" width="1920"
                                height="685" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="175" data-transform_idle="o:1;"
                                data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <h1>Support us to Become<br>
                                        Strong Economy</h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="345" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <p>Follow the Decmocracy for Good Governance in our Country</p>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="410" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box"> <a href="#" class="con">Join us Now</a>
                                </div>
                            </div>
                        </li>
                        <li data-transition="slidehorizontal"> <img src="{{ asset('homepage') }}/images/h3-slide2.jpg"
                                alt="" width="1920" height="685" data-bgposition="top center" data-bgfit="cover"
                                data-bgrepeat="no-repeat" data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="175" data-transform_idle="o:1;"
                                data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <h1>Good Governance is<br>
                                        Part of the Democracy</h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="345" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <p>City Council is the legislative branch of State & Government as<br>
                                        defined by the current Mayor Council Act</p>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="450" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <a href="#" class="con">Learn More</a>
                                </div>
                            </div>
                        </li>
                        <li data-transition="slidevertical"> <img src="{{ asset('homepage') }}/images/h3-slide3.jpg"
                                alt="" width="1920" height="685" data-bgposition="top center"
                                data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="175" data-transform_idle="o:1;"
                                data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <h1>Good Governance is<br>
                                        Part of the Democracy</h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="345" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box">
                                    <p>City Council is the legislative branch of State & Government as<br>
                                        defined by the current Mayor Council Act</p>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                data-voffset="455" data-transform_idle="o:1;"
                                data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                                data-start="700">
                                <div class="slide-content-box"> <a href="#" class="con">Learn More</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div> --}}
    <section class="wf100 subheader">
        <div class="container">
            <h2>Berita Desa Merdeka</h2>
            <ul>
                <li> <a href="{{ route('home.index') }}">Home</a> </li>
                <li> <a href="#"> Berita </a> </li>
            </ul>
        </div>
    </section>
@endsection

@section('content')
    <div class="news-details">
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    @foreach ($blog as $data)
                        <div class="news-box" style="margin-bottom: 25px;">
                            <div class="new-thumb">
                                <a href="{{ route('home.blog.detail', $data->id) }}">
                                    <i class="fas fa-link"></i>
                                </a>
                                @foreach ($data->category as $item)
                                    <span class="cat c4">
                                        {{ $item->meta_name->name }}
                                    </span>
                                @endforeach
                                <img src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) :  asset('/homepage/images/newsfull4.jpg')) :  asset('/homepage/images/newsfull4.jpg')}}" alt="">
                            </div>
                            <div class="new-txt">
                                <ul class="news-meta">
                                    <li>
                                        {{ date('d F Y', strtotime($data->created_at)) }}
                                    </li>
                                    <li>
                                        <a href="{{ route('home.blog.created-by', $data->admin ? $data->admin->id : $data->member->id) }}">
                                            {{ $data->admin ? $data->admin->name : $data->member->name }}
                                        </a>
                                    </li>
                                </ul>
                                <h4>{{ $data->title }}</h4>
                                <p>
                                    {{ limittext($data->desc, 50) }}
                                </p>
                                <a href="{{ route('home.blog.detail', $data->id) }}"
                                    class="btn btn-primary btn-lg button-background">
                                    Read More <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-3">
                    <div class="sidebar">

                        @include("homepage.content.right-sidebar.recent-post")

                        <div class="widget">
                            <h4>Categories</h4>
                            <div class="categories inner">
                                <ul>
                                    @foreach ($categories as $data)
                                        <li>
                                            @if (empty($id))
                                            <a href="{{ route('home.blog.all', $data->id) }}">
                                                {{ $data->name }}
                                            </a>
                                            @else
                                            <a {{ $data["id"] == $id ? 'style=color:#d94148; padding: 0 10px' : '' }} href="{{ route('home.blog.all', $data->id) }}">
                                                {{ $data->name }}
                                            </a>
                                            @endif
                                           
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <h4>Follow Us</h4>
                            <div class="upcoming-events inner">
                                <a href="{{ urlCheck($app->fb_url ?? '') }}" style="margin-right: 10px;"
                                    target="_blank">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="{{ urlCheck($app->ig_url ?? '') }}" style="margin-right: 10px;"
                                    target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="{{ urlCheck($app->yt_url ?? '') }}" style="margin-right: 10px;"
                                    target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="{{ urlCheck($app->twt_url ?? '') }}" style="margin-right: 10px;"
                                    target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                {{-- <a href="{{ urlCheck($app->tk_url ?? '') }}" style="margin-right: 5px;" target="_blank">
                                <i class="fab fa-tiktok"></i>
                            </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        @if ($blog->currentPage() === 1)
                            <li class="disabled">
                                <a href="#">
                                    &laquo;
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $blog->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @for ($page = 1; $page <= $blog->lastPage(); $page++)
                            @if (
                                $page == $blog->currentPage() ||
                                    $page == $blog->currentPage() - 1 ||
                                    $page == $blog->currentPage() + 1 ||
                                    $page == 1 ||
                                    $page == $blog->lastPage() ||
                                    $page == $blog->currentPage() - 2 ||
                                    $page == $blog->currentPage() + 2)
                                <li @if ($page == $blog->currentPage()) class="active" @endif>
                                    <a @if ($page != $blog->currentPage()) href="{{ $blog->url($page) }}" @endif>
                                        {{ $page }}
                                    </a>
                                </li>
                            @elseif ($page == $blog->currentPage() - 3 || $page == $blog->currentPage() + 3)
                                <li>
                                    <a href="#">
                                        ...
                                    </a>
                                </li>
                            @endif
                        @endfor

                        @if ($blog->currentPage() === $blog->lastPage())
                            <li class="disabled">
                                <a href="#">
                                    &raquo;
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $blog->url($blog->currentPage() + 1) }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('homepage') }}/js/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{ asset('homepage') }}/js/rev-slider/js/jquery.themepunch.revolution.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('homepage') }}/js/rev-slider.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
        src="{{ asset('homepage') }}/js/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
@endsection
