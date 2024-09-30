@extends('homepage.layout.main')


@section('css')
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/settings.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/layers.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/navigation.css" type='text/css' media='all' />
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

        .form-control:focus {
            border: none;
            outline: none;
            /* Menghapus efek kontur saat fokus */
        }

        .dropdown-toggle {
            color: #ccc;
            text-decoration: none;
            transition: 0.4s;
        }
        .dropdown-toggle:hover {
            color: #d94148;
            text-decoration: none
            transition: 0.4s;
        }
    </style>
@endsection

@section('content_top')
    {{-- <div class="main-slider wf100">
        <div class="home2-slider rev_slider_wrapper">
            <!-- START REVOLUTION SLIDER -->
            <div class="rev_slider_wrapper fullwidthbanner-container">
                <div id="rev-slider2" class="rev_slider fullwidthabanner">
                    <ul>
                        <li data-transition="fade"> <img src="{{ url('/homepage') }}/images/h3-slide1.jpg" alt=""
                                width="1920" height="685" data-bgposition="top center" data-bgfit="cover"
                                data-bgrepeat="no-repeat" data-bgparallax="1">
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
    </div> --}}
    <section class="wf100 subheader">
        <div class="container">
            <h2>Event di Desa Merdeka</h2>
            <ul>
                <li> <a href="{{ route('home.index') }}">Home</a> </li>
                <li> <a href="#"> Events </a> </li>
                <li>Events List</li>
            </ul>
        </div>
    </section>
@endsection


@section('content')
    {{-- <div class="events-wrapper">
    <div class="container">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-4">
                <div class="widget"> cek</div>
            </div>
            <div class="col-md-6">
                <h4>
                    <strong>
                        Jumlah Event: {{ $count }}
                    </strong>
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="sidebar">
                    <div class="widget">
                        <h4>Kategori Event & Program</h4>
                        <div class="categories inner">
                            <ul>
                                <li>
                                    <a href="{{ route('home.event.all', 'all') }}">
                                        All Event
                                    </a>
                                </li>
                                @foreach ($event as $data)
                                <li>
                                    <a href="{{ route('home.event.all', $data->id) }}">
                                        {{$data->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <div class="row">
                    @foreach ($allEvent as $data)
                    <div class="col-md-6 col-sm-6">
                        <div class="event-post">
                            <div class="thumb">
                                <a href="{{ route('home.event.detail', $data->id) }}">
                                    <i class="fas fa-link"></i>
                                </a>
                                <img src="{{ url('/homepage/images/logo/logo.png') }}" style="width: 100%; height: 300px;">
                            </div>
                            <div class="event-post-content">
                                <div class="event-post-txt">
                                    <h5>
                                        <a href="#">
                                            {{ limitString($data->title, 15) }}
                                        </a>
                                    </h5>
                                    <ul class="event-meta">
                                        <li>
                                            <i class="far fa-calendar-alt"></i> {{ $data->start_datetime }}
                                        </li>
                                        <li>
                                            <i class="far fa-clock"></i> {{ limitString($data->subtitle, 35) }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="event-post-loc">
                                    <i class="fas fa-map-marker-alt"></i> {{ limitString($data->address, 30) }}
                                    <a href="{{ route('home.event.detail', $data->id) }}">
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
        <div class="row">
            <div class="site-pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div> --}}
    <div class="events-wrapper events-listing" style="margin-top: -89px;">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <!--Event List Box Start-->
                    @foreach ($allEvent as $data)
                        <div class="event-post-full">
                            <div class="thumb"> <a href="{{ route('home.event.detail', $data->id) }}"><i
                                        class="fas fa-link"></i></a> <img
                                    src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/event-list1.jpg')) : asset('/homepage/images/event-list1.jpg') }}"
                                    alt=""> </div>
                            <div class="event-post-content">
                                <div class="event-post-txt">
                                    @foreach ($data->category as $item)
                                        <span class="ecat c1">{{ $item->meta_name->name }}</span>
                                    @endforeach
                                    <!--Share Start-->
                                    <div class="btn-group share-post">
                                        @php $type = $data->admin ? 'admin' : 'member'; @endphp
                                        <img style="margin-right: 5px; width: 20px;" alt="" src="
                                        {{ $data->{$type}?->image ? (file_exists($data->{$type}?->image) ? asset($data->{$type}?->image) : asset('homepage/images/user2.jpg')) : asset('homepage/images/user2.jpg') }}
                                        ">
                                        <a class="dropdown-toggle" href="{{ route('home.event.created-by', $data->admin ? $data->admin->id : $data->member->id) }}"> {{ $data->admin ? 'AdminDM' : $data->member->name }}
                                        </a>
                                    </div>
                                    <!--Share End-->
                                    <h5><a href="{{ route('home.event.detail', $data->id) }}">{{ $data->title }}</a></h5>
                                    <ul class="event-meta">
                                        {{-- <li><i class="far fa-calendar-alt"></i> 3-5 March, 2019</li> --}}
                                        <li><i class="far fa-calendar-alt"></i>
                                            {{ date('d M Y', strtotime($data->start_datetime)) . ' - ' . date('d M Y', strtotime($data->end_datetime)) }}
                                        </li>
                                        <li><i class="far fa-clock"></i>
                                            {{ date('h:i a', strtotime($data->start_datetime)) . ' - ' . date('h:i a', strtotime($data->end_datetime)) }}
                                        </li>
                                    </ul>
                                    <p>{{ Str::limit($data->subtitle, 100, '...') }}</p>
                                </div>
                                <div class="event-post-loc"> <i class="fas fa-map-marker-alt"></i> {{ $data->address }} <a
                                        href="{{ route('home.event.detail', $data->id) }}"><i
                                            class="fas fa-arrow-right"></i></a> </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="site-pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                @if ($allEvent->currentPage() === 1)
                                    <li class="disabled">
                                        <a href="#">
                                            &laquo;
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $allEvent->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @for ($page = 1; $page <= $allEvent->lastPage(); $page++)
                                    @if (
                                        $page == $allEvent->currentPage() ||
                                            $page == $allEvent->currentPage() - 1 ||
                                            $page == $allEvent->currentPage() + 1 ||
                                            $page == 1 ||
                                            $page == $allEvent->lastPage() ||
                                            $page == $allEvent->currentPage() - 2 ||
                                            $page == $allEvent->currentPage() + 2)
                                        <li @if ($page == $allEvent->currentPage()) class="active" @endif>
                                            <a @if ($page != $allEvent->currentPage()) href="{{ $allEvent->url($page) }}" @endif>
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @elseif ($page == $allEvent->currentPage() - 3 || $page == $allEvent->currentPage() + 3)
                                        <li>
                                            <a href="#">
                                                ...
                                            </a>
                                        </li>
                                    @endif
                                @endfor

                                @if ($allEvent->currentPage() === $allEvent->lastPage())
                                    <li class="disabled">
                                        <a href="#">
                                            &raquo;
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $allEvent->url($allEvent->currentPage() + 1) }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>

                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="sidebar">
                        <!--Widget Start-->
                        <div class="widget" style="margin-bottom: 18px;">
                            <div class="about-widget inner">
                                <form class="form-inline" method="get" style="display: flex">
                                    @csrf
                                    <input type="text" class="form-control" name="search"
                                        style="border-radius: 15px 0px 0px 15px; border: 1px solid #e1e1e1;"
                                        placeholder="Cari...">
                                    <button type="submit"
                                        style="
                                    /* display: inline; */
                                    /* position: absolute; */
                                    right: 0;
                                    top: 0;
                                    background: none;
                                    /* border: 0; */
                                    line-height: 28px;
                                    padding: 0 12px;
                                    border: 1px solid #e1e1e1;
                                    border-radius: 0px 15px 15px 0px;
                                "><i
                                            class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!--Widget End-->
                        <!--Widget about us-->
                        {{-- @include('homepage.content.right-sidebar.about-us', [
                            'app' => $app,
                        ]) --}}
                        <!--Widget End-->
                        <!--Widget recent posts-->
                        @include('homepage.content.right-sidebar.recent-post', [
                            'blogs' => $blogs,
                        ])
                        <!--Widget End-->
                        <!--Widget Start-->
                        <div class="widget">
                            <h4>Categories</h4>
                            <div class="categories inner">
                                <ul>
                                    <li>
                                        <a href="{{ route('home.event.all', ['id' => 'all', 'tags' => request()->segment(4)]) }}" style="{{ request()->segment(3) == 'all' ? 'color:#d94148;' : '' }}">
                                            All Event
                                        </a>
                                    </li>
                                    @foreach ($event as $data)
                                        <li>
                                            <a href="{{ route('home.event.all',['id' => $data->id, 'tags' => request()->segment(4)]) }}" style="{{ request()->segment(3) == $data->id ? 'color:#d94148;' : '' }}">
                                                {{ $data->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--Widget End-->
                        <!--Upcoming events-->
                        @include('homepage.content.right-sidebar.upcoming-event', [
                            'events' => $allEvent->where('start_datetime', '>=', now()),
                        ])
                        <!--End Upcoming events-->
                        <!--Widget Start-->
                        <div class="widget">
                            <h4>Archives</h4>
                            <div class="archives inner">

                                <ul>
                                    @foreach ($yearGrouped as $key => $item)
                                    <li><a style="{{ request()->get('y') == $key ? 'color:#d94148;' : '' }}" href="?y={{ $key }}">{{ $key }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--Widget End-->

                        <!--Widget Start-->
                        <div class="widget">
                            <h4>Tags</h4>
                            <div class="tags-widget inner">

                                @foreach ($memberType->where('name', '!=', 'Kemenprim') as $data)
                                <a style="{{ request()->segment(4) == $data->id ? 'background-color: #d94148; color: white;' : '' }}" href="{{ route('home.event.all', ['id'=> request()->segment(3), 'tags' => $data->id]) }}">{{ $data->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <!--Widget End-->
                    </div>
                </div>
            </div>
        </div>
        <!--Events End-->
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
