@extends('homepage.layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/settings.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/layers.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/navigation.css" type='text/css' media='all' />
    <style>
        .button-background {
            padding-left: 50px;
            padding-right: 50px;
            background: rgba(0, 0, 0, 0) linear-gradient(160deg, #ff0066 0%, #d41872 50%, #a445b2 100%) repeat scroll 0% 0%;
        }
    </style>
@endsection

@section('content_top')
    <div class="main-slider wf100">
        <div class="home2-slider rev_slider_wrapper">
            <div class="rev_slider_wrapper fullwidthbanner-container">
                <div id="rev-slider2" class="rev_slider fullwidthabanner">
                    <ul>
                        <li data-transition="fade">
                            <img src="{{ url('/homepage') }}/images/h3-slide1.jpg" alt="" width="1920"
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
                        <li data-transition="slidehorizontal"> <img src="{{ url('/homepage') }}/images/h3-slide2.jpg"
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
                        <li data-transition="slidevertical"> <img src="{{ url('/homepage') }}/images/h3-slide3.jpg"
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
    </div>
@endsection

@section('content')
    <div class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    &nbsp;
                </div>
                <div class="col-md-9">
                    <h5>
                        <strong>
                            Album Gallery
                        </strong>
                    </h5>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="widget">
                            <h4>Album Category</h4>
                            <div class="categories inner">
                                <ul>
                                    <li>
                                        <a href="{{ route('home.gallery.index', 'all') }}">
                                            All
                                        </a>
                                    </li>
                                    @foreach ($categories as $data)
                                        <li>
                                            @if (empty($id))
                                            <a href="{{ route('home.gallery.index', $data->id) }}">
                                                {{ $data->name }}
                                            </a>
                                            @else
                                                @if ($data->id == $id)
                                                <a style="color: red; padding-left: 10px;" href="{{ route('home.gallery.index', $data->id) }}">
                                                    {{ $data->name }}
                                                </a>
                                                @else
                                                <a href="{{ route('home.gallery.index', $data->id) }}">
                                                    {{ $data->name }}
                                                </a>
                                                @endif
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($gallery as $data)
                            <div class="col-md-6 col-sm-6" style="margin-bottom: 10px">
                                <div class="event-post">
                                    <div class="thumb">
                                        <a href="{{ route('home.gallery.detail', $data->id) }}">
                                            <i class="fas fa-link"></i>
                                        </a>
                                        <img src="{{ url('homepage/images/logo/logo.png') }}" style="width: 100%; height: 300px;">
                                    </div>
                                    <div class="event-post-content">
                                        <div class="event-post-txt">
                                            <h5>
                                                <a href="#">
                                                    {{ limitString($data->title, 25) }}
                                                </a>
                                            </h5>
                                            <ul class="event-meta">
                                                <li>
                                                    <i class="far fa-calendar-alt"></i>
                                                    {{ $data->date }}
                                                </li>
                                                <li>
                                                    <i class="far fa-clock"></i>
                                                    @forelse($data->category as $item)
                                                        {{ $item->meta_name->name }},
                                                    @empty
                                                        -
                                                    @endforelse
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="event-post-loc">
                                            <i class="fas fa-map-marker-alt"></i> {{ limitString($data->location, 40) }}
                                            <a href="{{ route('home.gallery.detail', $data->id) }}">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="site-pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        @if ($gallery->currentPage() === 1)
                            <li class="disabled">
                                <a href="#">
                                    &laquo;
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $gallery->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        @for ($page = 1; $page <= $gallery->lastPage(); $page++)
                            @if (
                                $page == $gallery->currentPage() ||
                                    $page == $gallery->currentPage() - 1 ||
                                    $page == $gallery->currentPage() + 1 ||
                                    $page == 1 ||
                                    $page == $gallery->lastPage() ||
                                    $page == $gallery->currentPage() - 2 ||
                                    $page == $gallery->currentPage() + 2)
                                <li @if ($page == $gallery->currentPage()) class="active" @endif>
                                    <a @if ($page != $gallery->currentPage()) href="{{ $gallery->url($page) }}" @endif>
                                        {{ $page }}
                                    </a>
                                </li>
                            @elseif ($page == $gallery->currentPage() - 3 || $page == $gallery->currentPage() + 3)
                                <li>
                                    <a href="#">
                                        ...
                                    </a>
                                </li>
                            @endif
                        @endfor

                        @if ($gallery->currentPage() === $gallery->lastPage())
                            <li class="disabled">
                                <a href="#">
                                    &raquo;
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $gallery->url($gallery->currentPage() + 1) }}" aria-label="Next">
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
    <script type="text/javascript" src="{{ url('/homepage') }}/js/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{ url('/homepage') }}/js/rev-slider/js/jquery.themepunch.revolution.min.js">
    </script>
    <script type="text/javascript" src="{{ url('/homepage') }}/js/rev-slider.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
        src="{{ url('/homepage') }}/js/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
@endsection
