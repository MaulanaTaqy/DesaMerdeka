@extends('landing-page.layouts.main')

@section('title', 'Blog Detail')

@section('css')

@endsection

@section('content') 
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs" style="background: url(/{{ $blog->banner_image }});">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                {{$blog->title}}
                <!-- <span class="watermark">Blog Single</span> -->
            </h1>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Blog Section Start -->
<div class="rs-inner-blog pt-120 md-pt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-details">
                            <div class="bs-img mb-35">
                                <a href="#"><img src="{{ asset($blog->image) }}" alt=""></a>
                            </div>
                            <div class="blog-full">
                                <ul class="single-post-meta">
                                    <li>
                                        <span class="p-date"><i class="fa fa-calendar-check-o"></i> {{date('d F Y',strtotime($blog->created_at))}} </span>
                                    </li>
                                    <li>
                                        <span class="p-date"> <i class="fa fa-user-o"></i> {{ $blog->admin ? $blog->admin->name : $blog->member->name }} </span>
                                    </li>
                                    <li class="Post-cate">
                                        <div class="tag-line">
                                            <i class="fa fa-book"></i>
                                            @foreach($blog->category as $item)
                                            <a href="#">{{ $item->meta_name->name }}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                                <div>
                                    {!!$blog->desc!!}
                                </div>


                                <div class="tag-info">
                                    Categories:
                                    @foreach($blog->category as $item)
                                    <button class="btn btn-light">{{ $item->meta_name->name }}</button>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
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
                                <a href="{{ route('home.blog.detail', $data->id) }}"><img src="{{asset($data->image)}}" alt=""></a>
                            </div>
                            <div class="post-desc">
                                <a class="text-limit" href="{{ route('home.blog.detail', $data->id) }}"> {{$data->title}} </a>
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
                            @foreach($categories as $data)
                            <li><a href="{{ route('home.blog.all', $data->id) }}">{{ $data->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="follow-us">
                        <div class="widget-title mb-40">
                            <h3 class="title">Follow Us</h3>
                        </div>
                        <ul>
                            <li><a href="{{ urlCheck($app->fb_url ?? '') }}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
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
@endsection

