@extends("homepage.layout.main")

@section("css")

<style>
    .subheader {
        background: none;
    }
    
</style>

@endsection

@section("content_top")

<section class="wf100 subheader" style="background: url({{ asset('homepage/images/h3footerbg.jpg') }});">
    <div class="container">
        <h2>
            Detail Blog {{ $member->name }}
        </h2>
    </div>
</section>

@endsection

@section("content")

<div class="container">
    <div class="title-style-3">
        <h3>Blog By {{ $member->name }} </h3>
        <p>Venue</p>
    </div>
    <div class="row">
        @foreach ($blog as $item)
        <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
            <div class="news-box">
                <div class="new-thumb">
                    @foreach ($item->category as $category)
                    <span class="cat c4">
                        {{ $category->meta_name->name }}
                    </span>
                    @endforeach
                    @if (file_exists($item->image))
                    <img src="{{ asset($item->image) }}" alt="">
                    @else
                    <img src="{{ url('homepage') }}/images/h3citynews-1.jpg" alt="">
                    @endif
                </div>
                <div class="new-txt">
                    <ul class="news-meta">
                        <li>
                            {{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $item->created_at)->isoFormat("D MMM, YYYY") }}
                        </li>
                    </ul>
                    <h6>
                        <a href="#">
                            {{ limitString($item->title, 30) }}
                        </a>
                    </h6>
                    <p>
                        {!! limitString($item->desc, 100) !!}
                    </p>
                </div>
                <div class="news-box-f">
                    @if (file_exists($item->member->image))
                        <img src="{{ asset($item->member->image) }}" : alt="">
                    @else
                        <img src="{{ asset('homepage/images/tuser2.jpg') }}">
                    @endif
                    
                    {{ $item->admin ? $item->admin->name : $item->member->name }}
                    <a href="{{ route('home.blog.detail', $item->id) }}">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
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

@endsection