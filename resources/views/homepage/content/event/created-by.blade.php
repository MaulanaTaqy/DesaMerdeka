@extends('homepage.layout.main')


@section('css')
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/settings.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/layers.css" type='text/css' media='all' />
    <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/navigation.css" type='text/css' media='all' />
@endsection

@section('content_top')
    <section class="wf100 subheader">
        <div class="container">
            <h2>Events By {{ $member ? $member->name : 'AdminVT' }}</h2>
            <ul>
                <li> <a href="index.html">Home</a> </li>
                <li> <a href="#"> Events </a> </li>
                <li>Events By {{ $member ? $member->name : 'AdminVT' }}</li>
            </ul>
        </div>
    </section>
@endsection


@section('content')
    <!--Events Start-->
    <div class="events-wrapper" style="margin: -80px 0px ">
        <div class="container">
            <div class="row">
                <!--Event Start-->
                @foreach ($event as $data)
                <div class="col-md-4 col-sm-6">
                    <div class="event-post">
                        <div class="thumb"> <a href="{{ route('home.event.detail', $data->id) }}"><i
                                    class="fas fa-link"></i></a> <img
                                src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/event-img2.jpg')) : asset('/homepage/images/event-img2.jpg') }}" alt=""></div>
                        <div class="event-post-content">
                            <div class="event-post-txt">
                                <h5 style="font-size: 16pt"><a
                                        href="{{ route('home.event.detail', $data->id) }}"
                                        title="{{ $data->title }}">{{ Str::limit($data->title, 20) }}</a>
                                </h5>
                                <ul class="event-meta">
                                    <li><i class="far fa-calendar-alt"></i>
                                        {{ date('d M Y', strtotime($data->start_datetime)) . ' - ' . date('d M Y', strtotime($data->end_datetime)) }}
                                    </li>
                                    <li><i class="far fa-clock"></i>
                                        {{ date('h:i a', strtotime($data->start_datetime)) . ' - ' . date('h:i a', strtotime($data->end_datetime)) }}
                                    </li>
                                </ul>
                                {{-- <p>Explore art objects from six contemporary artists & designers that focus on
                                function.</p> --}}
                                {{ $data->subtitle }}
                            </div>
                            <div class="event-post-loc" title="{{ $data->address }}"> <i
                                    class="fas fa-map-marker-alt"></i>{{ Str::limit($data->address, 35) }}<a
                                    href="{{ route('home.event.detail', $data->id) }}"><i
                                        class="fas fa-arrow-right"></i></a> </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!--Event End-->
            </div>
            <div class="row">
                <div class="site-pagination">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            @if ($event->currentPage() === 1)
                                <li class="disabled">
                                    <a href="#">
                                        &laquo;
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $event->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            @endif

                            @for ($page = 1; $page <= $event->lastPage(); $page++)
                                @if (
                                    $page == $event->currentPage() ||
                                        $page == $event->currentPage() - 1 ||
                                        $page == $event->currentPage() + 1 ||
                                        $page == 1 ||
                                        $page == $event->lastPage() ||
                                        $page == $event->currentPage() - 2 ||
                                        $page == $event->currentPage() + 2)
                                    <li @if ($page == $event->currentPage()) class="active" @endif>
                                        <a @if ($page != $event->currentPage()) href="{{ $event->url($page) }}" @endif>
                                            {{ $page }}
                                        </a>
                                    </li>
                                @elseif ($page == $event->currentPage() - 3 || $page == $event->currentPage() + 3)
                                    <li>
                                        <a href="#">
                                            ...
                                        </a>
                                    </li>
                                @endif
                            @endfor

                            @if ($event->currentPage() === $event->lastPage())
                                <li class="disabled">
                                    <a href="#">
                                        &raquo;
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $event->url($event->currentPage() + 1) }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--Events End-->
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
