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
    <!--Sub Header Start-->
    <section class="wf100 subheader">
        <div class="container">
            <h2>Members</h2>
            <ul>
                <li> <a href="index.html">Home</a> </li>
                <li> Members</li>
            </ul>
        </div>
    </section>
    <!--Sub Header End-->
@endsection


@section('content')
    <div class="team-grid official-members">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="event-post-full" style="box-shadow: none; background-color:none; padding: 5px;">
                        <div class="row">
                            @foreach($member as $data)
                                {{-- <div class="col-lg-4 col-md-6 mb-30">
                                    <div class="team-item shadow" style="height: 100%;">
                                        <div class="team-img" style="height: 100%;">
                                            <a href="{{ route('home.member.detail', $data->id) }}"><img src="{{ asset($data->image ?? 'virtual/assets/img/default.png') }}" alt="No Images Uploaded" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;"></a>
                                        </div>
                                        <div class="team-content">
                                            <div class="team-info">
                                                <div class="name" style="font-size: 15px;">
                                                    <a href="{{ route('home.member.detail', $data->id) }}">{{ limitString($data->name, 20) }}</a>
                                                </div>
                                                <span class="post">{{ $data->member_type->name}}</span>
                                            </div>
                                            <ul class="social-icon">
                                                <li><a href="{{ urlCheck($data->fb_url) }}"><i class="fa-brands fa-facebook"></i></a></li>
                                                <li><a href="{{ urlCheck($data->ig_url) }}"><i class="fa-brands fa-instagram"></i></a></li>
                                                <li><a href="{{ urlCheck($data->website_url) }}"><i class="fa fa-globe"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                                <!--Team Box Start-->
                                <div class="col-md-3 col-sm-6">
                                    <div class="team-box">
                                        <div class="team-thumb"> <a href="{{ route('home.member.detail', $data->id) }}"><i class="fas fa-link"></i></a> <img
                                                src="{{ $data->image ? (file_exists($data->image) ? asset($data->image) : asset('/homepage/images/team1.jpg')) : asset('/homepage/images/team1.jpg') }}" alt=""></div>
                                        <div class="team-txt">
                                            <h6 style="font-weight: 600"><a style="text-decoration: none; color: black;" href="{{ route('home.member.detail', $data->id) }}">{{ limitString($data->name, 10) }}</a></h6>
                                            <strong class="dep">{{ $data->member_type->name}}</strong>
                                            {{-- <p>{{ limitString($data->desc, 10) }}</p> --}}
                                            <ul class="team-social">
                                                <li><em>Connect:</em></li>
                                                <li><a href="{{ urlCheck($data->website_url) }}"><i class="fa fa-globe"></i></a></li>
                                                <li><a href="{{ urlCheck($data->fb_url) }}"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="{{ urlCheck($data->twitter_url) }}"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="{{ urlCheck($data->ig_url) }}"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Team Box End-->
                            @endforeach
                            {{-- <div class="col-md-3 col-sm-6">
                                <div class="team-box">
                                    <div class="team-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
                                            src="{{ asset('/homepage/images/team2.jpg') }}" alt=""></div>
                                    <div class="team-txt">
                                        <h5>Stephen Paul</h5>
                                        <strong class="dep">Assistant Mayor</strong>
                                        <p>Stephen Paul is very Compitent and very agile person who assist to Mayor of the
                                            City.</p>
                                        <ul class="team-social">
                                            <li><em>Connect:</em></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Team Box End-->
                            <!--Team Box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="team-box">
                                    <div class="team-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
                                            src="{{ asset('/homepage/images/team3.jpg') }}" alt=""></div>
                                    <div class="team-txt">
                                        <h5>Harry Wilson</h5>
                                        <strong class="dep">Health Minister</strong>
                                        <p> Harry Wilson is Minister of Health Department, look after all matters related
                                            health in the
                                            city.</p>
                                        <ul class="team-social">
                                            <li><em>Connect:</em></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Team Box End-->
                            <!--Team Box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="team-box">
                                    <div class="team-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
                                            src="{{ asset('/homepage/images/team4.jpg') }}" alt=""></div>
                                    <div class="team-txt">
                                        <h5>James Scott</h5>
                                        <strong class="dep">Marketing Coordinator</strong>
                                        <p> James Scott is very strong person who coordinate in all the events and marketing
                                            strategies.
                                        </p>
                                        <ul class="team-social">
                                            <li><em>Connect:</em></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Team Box End-->
                            <!--Team Box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="team-box">
                                    <div class="team-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
                                            src="{{ asset('/homepage/images/team5.jpg') }}" alt=""></div>
                                    <div class="team-txt">
                                        <h5>Alex Joe</h5>
                                        <strong class="dep">Task Force Chief</strong>
                                        <p> Danny Richard has the main task force command in multiple security companies.
                                        </p>
                                        <ul class="team-social">
                                            <li><em>Connect:</em></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Team Box End-->
                            <!--Team Box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="team-box">
                                    <div class="team-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
                                            src="{{ asset('/homepage/images/team6.jpg') }}" alt=""></div>
                                    <div class="team-txt">
                                        <h5>Waynes Davies</h5>
                                        <strong class="dep">Assistant Mayor</strong>
                                        <p> Stephen Paul is very Compitent and very agile person who assist to Mayor of the
                                            City. </p>
                                        <ul class="team-social">
                                            <li><em>Connect:</em></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Team Box End-->
                            <!--Team Box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="team-box">
                                    <div class="team-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
                                            src="{{ asset('/homepage/images/team7.jpg') }}" alt=""></div>
                                    <div class="team-txt">
                                        <h5>Alan Barry</h5>
                                        <strong class="dep">Health Minister</strong>
                                        <p> Harry Wilson is Minister of Health Department, look after all matters related
                                            health in the
                                            city. </p>
                                        <ul class="team-social">
                                            <li><em>Connect:</em></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Team Box End-->
                            <!--Team Box Start-->
                            <!--Team Box Start-->
                            <div class="col-md-3 col-sm-6">
                                <div class="team-box">
                                    <div class="team-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img
                                            src="{{ asset('/homepage/images/team8.jpg') }}" alt=""></div>
                                    <div class="team-txt">
                                        <h5>Taylor Jone</h5>
                                        <strong class="dep">Marketing Coordinator</strong>
                                        <p> James Scott is very strong person who coordinate in all the events and marketing
                                            strategies.
                                        </p>
                                        <ul class="team-social">
                                            <li><em>Connect:</em></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Team Box End--> --}}
                        </div>
                        <div class="site-pagination">
                            <nav aria-label="Page navigation" style=" /* position: absolute; top: 100%; left: 35%; */">
                                <ul class="pagination">
                                    @if ($member->currentPage() === 1)
                                        <li class="disabled">
                                            <a href="#">
                                                &laquo;
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $member->previousPageUrl() }}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    @endif
            
                                    @for ($page = 1; $page <= $member->lastPage(); $page++)
                                        @if (
                                            $page == $member->currentPage() ||
                                                $page == $member->currentPage() - 1 ||
                                                $page == $member->currentPage() + 1 ||
                                                $page == 1 ||
                                                $page == $member->lastPage() ||
                                                $page == $member->currentPage() - 2 ||
                                                $page == $member->currentPage() + 2)
                                            <li @if ($page == $member->currentPage()) class="active" @endif>
                                                <a @if ($page != $member->currentPage()) href="{{ $member->url($page) }}" @endif>
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @elseif ($page == $member->currentPage() - 3 || $page == $member->currentPage() + 3)
                                            <li>
                                                <a href="#">
                                                    ...
                                                </a>
                                            </li>
                                        @endif
                                    @endfor
            
                                    @if ($member->currentPage() === $member->lastPage())
                                        <li class="disabled">
                                            <a href="#">
                                                &raquo;
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $member->url($member->currentPage() + 1) }}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
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
                        <!--Widget Start-->
                        <div class="widget">
                            <h4>Tipe</h4>
                            <div class="categories inner">
                                <ul>
                                    <li><a style="{{ request()->segment(3) == 'all' ? 'color:#d94148;' : '' }}" href="{{ route('home.member.all', 'all') }}" class="{{ request()->segment(3) == 'all' || request()->segment(3) == null ? 'category-active' : '' }}">All Member</a></li>
                                    @foreach($member_type as $data)
                                    <li><a style="{{ request()->segment(3) == $data->id ? 'color:#d94148;' : '' }}" href="{{ route('home.member.all', $data->id) }}" class="{{ request()->segment(3) == $data->id ? 'category-active' : '' }}">{{ $data->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--Widget End-->
                        <!--Widget recent posts-->
                        {{-- @include('homepage.content.right-sidebar.recent-post', [
                            'blogs' => $blogs,
                        ]) --}}
                        <!--Widget End-->
                        <!--Upcoming events-->
                        {{-- @include('homepage.content.right-sidebar.upcoming-event', [
                            'events' => $upcomingEvent,
                        ]) --}}
                        <!--End Upcoming events-->
                        <!--Widget about us-->
                        {{-- @include('homepage.content.right-sidebar.about-us', [
                            'app' => $app,
                        ]) --}}
                        <!--Widget End-->

                    </div>
                </div>
            </div>
        </div>
        <!--Team End-->
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
