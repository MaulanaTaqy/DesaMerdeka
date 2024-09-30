
@extends("homepage.layout.main")

@section('meta_title', $blog->title)
@section('meta_desc', strip_tags($blog->desc))
@section('meta_image', asset($blog->image))
@section('meta_url', URL::current())

@section("css")

<style>
    .subheader {
        background-size: cover !important;
        background-position: center !important;
    }
    
</style>

@endsection

@section("content_top")

@if (file_exists($blog->banner_image))
    <section class="wf100 subheader" style="background: url('{{ asset($blog->banner_image) }}');">
@else
    <section class="wf100 subheader" style="background: url({{ asset('homepage/images/h3footerbg.jpg') }});">
@endif
    <div class="container">
        <h2>
            {{ $blog->title }}
        </h2>
    </div>
</section>

@endsection

@section("content")

<div class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="news-box">
                    <div class="new-thumb">
                        <a href="#">
                            <i class="fas fa-link"></i>
                        </a>
                        @foreach($blog->category as $item)
                        <span class="cat c4">
                                {{ $item->meta_name->name }}
                        </span>
                        @endforeach
                        
                        @if (file_exists($blog->banner_image))
                            <img src="{{ asset($blog->banner_image) }}" alt="">
                        @else
                            <img src="{{ asset('homepage') }}/images/newsfull4.jpg" alt="">
                        @endif
                    </div>
                    <div class="new-txt">
                        <ul class="news-meta">
                            <li>
                                {{date('d F Y',strtotime($blog->created_at))}}
                            </li>
                            <li>
                                {{ $blog->admin ? $blog->admin->name : $blog->member->name }}
                            </li>
                            <li>
                                @foreach($blog->category as $item)
                                    <a href="#">
                                        {{ $item->meta_name->name }}
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                        <p>
                            {!!$blog->desc!!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar">
                    
                    @include("homepage.content.right-sidebar.recent-post")
                    <!--Widget End--> 
                    <!--Widget Start-->
                    <div class="widget">
                        <h4>Categories</h4>
                        <div class="categories inner">
                            <ul>
                                @foreach($categories as $data)
                                <li>
                                    <a href="{{ route('home.blog.all', $data->id) }}">
                                        {{ $data->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget">
                        <h4>Follow Us</h4>
                        <div class="upcoming-events inner">
                            <a href="{{ urlCheck($app->fb_url ?? '')}}" style="margin-right: 10px;" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="{{ urlCheck($app->ig_url ?? '') }}" style="margin-right: 10px;" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="{{ urlCheck($app->yt_url ?? '') }}" style="margin-right: 10px;" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="{{ urlCheck($app->twt_url ?? '') }}" style="margin-right: 10px;" target="_blank">
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
    </div>
</div>

@endsection
