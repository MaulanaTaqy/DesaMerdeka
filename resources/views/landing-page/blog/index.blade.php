@extends('landing-page.layouts.main')

@section('title', 'Blog')

@section('css')
<style>
    .blog-img img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
    }
</style>
@endsection

@section('content')
<!-- Breadcrumbs Start -->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner" style="height: 100%;transition: transform 0.5s ease, opacity 1s ease-out;">
        @foreach($banner as $key => $data)
        <div class="carousel-item @if($key==0) active @endif">
            <img src="{{asset($data->image)}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
      @endforeach
      @if(count($banner) == 0)
        <div class="carousel-item active">
            <img src="{{asset('assets/images/img-tekno/slider/slide1-tp.png')}}" class="d-block w-100" alt="..." style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%; object-fit: contain;">
        </div>
      @endif
    </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Breadcrumbs End -->

<!-- Blog Section Start -->
<div class="rs-inner-blog pt-120 md-pt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 md-mb-50 mb-50">
                <div class="row">
                    @foreach($blog as $data)
                    <div class="col-lg-12 mb-50">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="{{ route('home.blog.detail', $data->id) }}"><img src="{{asset($data->image)}}" alt=""></a>
                                <ul class="post-categories">
                                    @foreach($data->category as $item)
                                    <li><a href="{{ route('home.blog.detail', $data->id) }}">{{ $item->meta_name->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title text-limit"><a href="{{ route('home.blog.detail', $data->id) }}">{{$data->title}}</a></h3>
                                <div class="blog-meta">
                                    <ul class="btm-cate">
                                        <li>
                                            <div class="blog-date">
                                                <i class="fa fa-calendar-check-o"></i> {{date('d F Y',strtotime($data->created_at))}}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="author">
                                                <i class="fa fa-user-o"></i> {{$data->admin ? $data->admin->name : $data->member->name}}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                
                                {{ limittext($data->desc, 50) }}
                                {{-- {!! $data->desc !!} --}}
                               
                                <div class="blog-button pt-3">
                                    <a href="{{ route('home.blog.detail', $data->id) }}">
                                        <span class="btn-txt">Read More</span>
                                        <i class="fa fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $blog->links('vendor.pagination.bootstrap-5') }}
            </div>
            <div class="col-lg-4 col-md-12 pl-35 md-pl-15">
                <div class="widget-area">
                    <div class="recent-posts mb-50">
                        <div class="widget-title">
                            <h3 class="title">Recent Posts</h3>
                        </div>
                        @foreach($recent as $data)
                        <div class="recent-post-widget no-border">
                            <div class="post-img">
                                <a href="{{route('home.blog.detail', $data->id)}}"><img src="{{asset($data->image)}}" alt=""></a>
                            </div>
                            <div class="post-desc">
                                <a class="text-limit" href="{{route('home.blog.detail', $data->id)}}">
                                    {{$data->title}} </a>
                                <span class="date-post"> <i class="fa fa-calendar"></i> {{date('d F Y',strtotime($data->created_at))}} </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="categories mb-45">
                        <div class="widget-title">
                            <h3 class="title">Categories</h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('home.blog.all', 'all') }}" class="{{ request()->segment(3) == 'all' ? 'category-active' : '' }}">All Category</a></li>
                            @foreach($categories as $data)
                            <li><a href="{{ route('home.blog.all', $data->id) }}" class="{{ request()->segment(3) == $data->id ? 'category-active' : '' }}">{{ $data->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="follow-us">
                        <div class="widget-title mb-40">
                            <h3 class="title">Follow Us</h3>
                        </div>
                        <ul>
                            <li><a href="{{ urlCheck($app->fb_url ?? '')}}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="{{ urlCheck($app->ig_url ?? '') }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="{{ urlCheck($app->yt_url ?? '') }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="{{ urlCheck($app->twt_url ?? '') }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="{{ urlCheck($app->tk_url ?? '') }}" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section End -->

</div>
<!-- Main content End -->



<!-- start scrollUp  -->
<div id="scrollUp" class="orange-color">
    <i class="fa fa-angle-up"></i>
</div>
<!-- End scrollUp  -->


<!-- Search Modal Start -->
<div class="modal fade search-modal" id="searchModal" tabindex="-1">
    <button type="button" class="close" data-bs-dismiss="modal">
        <span class="flaticon-cross"></span>
    </button>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="search-block clearfix">
                <form>
                    <div class="form-group">
                        <input class="form-control" placeholder="Search Here..." type="text">
                        <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal End -->

@endsection