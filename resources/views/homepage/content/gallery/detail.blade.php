@extends('homepage.layout.main')

@section('css')
<style>
    .subheader {
        background: none;
    }
    .button-group .is-checked-filter {
        background-color: red; 
        padding: 10px; 
        border-radius: 10px; 
        color: white; 
        border: 1px solid red;
    }
    
    .button-group .is-checked-filter:hover {
        color: black;
    }
    
    .button-group .button:before {
        content: "";
        padding-right: 0px;
    }
    
    .button-group .is-non-checked {
        background-color: white; 
        color: black; 
        padding: 10px; 
        border-radius: 10px; 
        border: 1px solid black;
    }
    
    .button-group .is-non-checked:hover {
        color: red;
        border: 1px solid red;
    }
    
    .button-group .button.is-checked {
        color: white;
    }
    
    .main-content {
        padding-top: 0px;
        padding-bottom: 0px;
    }
    
</style>
@endsection

@section('content_top')
<section class="wf100 subheader" style="background: url({{ asset('homepage/images/h3footerbg.jpg') }});">
    <div class="container">
        <h2>
            Album - {{ $gallery[0]->gallery->title ?? 'No Content' }}
        </h2>
        {{ $gallery[0]->gallery->desc ?? 'No Content' }}
    </div>
</section>
@endsection

@section('content')

<div class="events-wrapper">
    <div class="container">
        <div class="row">
            <div class="portfolio filter-gallery filter">
                <div id="filters" class="button-group">
                    <button class="button is-checked-filter" data-name=".gallery_foto">
                        Gallery Foto
                    </button>
                    <button class="button is-non-checked" data-name=".gallery_video">
                        Gallery Video
                    </button>
                </div>
                <div class="clearfix"></div>
                <div class="grid">
                    
                    <div class="row">

                        @foreach ($gallery as $item)
                        <div class="col-md-4 grid-item gallery_foto">
                            <div class="event-post">
                                <div class="thumb">
                                    <a href="{{ url('homepage') }}/images/event-img2.jpg">
                                        <i class="fas fa-link"></i>
                                    </a>
                                    <img src="{{ url('homepage') }}/images/event-img2.jpg" alt="">
                                </div>
                                <div class="event-post-content">
                                    <div class="event-post-txt">
                                        <h5>
                                            <a href="#">
                                                {{ empty($item->titile) ? 'Gallery Program' : $item->titile }}
                                            </a>
                                        </h5>
                                        <ul class="event-meta">
                                            <li>
                                                <i class="far fa-calendar-alt"></i> 
                                                {{ empty($item->date) ? date("Y-m-d H:i:s") : $item->date }}
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> 
                                                {{ empty($item->lokasi) ? "Jakarta Barat" : $item->lokasi }}
                                            </li>
                                            <li>
                                                <i class="fa fa-bars"></i>
                                                @forelse ($item->gallery->category as $kategori)
                                                {{ $kategori->meta_name->name }}
                                                @empty
                                                Kategori Belum Ada
                                             @endforelse
                                            </li>
                                        </ul>
                                        
                                        <p style="text-align: justify">
                                            {{ empty($item->desc) ? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit pariatur error blanditiis officia possimus nesciunt veniam optio! Ipsam, ex officia, laborum minus iste totam error beatae voluptatum non, qui iure?' : $item->desc }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    
                    <div class="row">
                        @foreach ($gallery as $item)
                        <div class="col-md-4 grid-item gallery_video hidden">
                            <div class="event-post">
                                <div class="thumb">
                                    <a href="{{ url('homepage') }}/images/event-img2.jpg">
                                        <i class="fas fa-link"></i>
                                    </a>
                                    <img src="{{ url('homepage') }}/images/event-img2.jpg" alt="">
                                </div>
                                <div class="event-post-content">
                                    <div class="event-post-txt">
                                        <h5>
                                            <a href="#">
                                                {{ empty($item->titile) ? 'Video Program' : $item->titile }}
                                            </a>
                                        </h5>
                                        <ul class="event-meta">
                                            <li>
                                                <i class="far fa-calendar-alt"></i> 
                                                {{ empty($item->date) ? date("Y-m-d H:i:s") : $item->date }}
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> 
                                                {{ empty($item->lokasi) ? "Jakarta Barat" : $item->lokasi }}
                                            </li>
                                            <li>
                                                <i class="fa fa-bars"></i>
                                                @forelse ($item->gallery->category as $kategori)
                                                {{ $kategori->meta_name->name }}
                                                @empty
                                                Kategori Belum Ada
                                             @endforelse
                                            </li>
                                        </ul>
                                        
                                        <p style="text-align: justify">
                                            {{ empty($item->desc) ? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit pariatur error blanditiis officia possimus nesciunt veniam optio! Ipsam, ex officia, laborum minus iste totam error beatae voluptatum non, qui iure?' : limittext($item->desc, 50) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("javascript")
<script src="{{ url('homepage/js/isotope/isotope.pkgd.min.js') }}"></script>
<script>
    
    $(document).ready(function() {
        $(".button[data-name='.gallery_video']").on("click", function() {
            $(this).removeClass("is-non-checked").addClass("is-checked-filter");
            
            $(".button[data-name='.gallery_foto']").removeClass("is-checked-filter").addClass("is-non-checked");
        });
        
        $(".button[data-name='.gallery_foto']").on("click", function() {
            $(this).removeClass("is-non-checked").addClass("is-checked-filter");
            
            $(".button[data-name='.gallery_video']").removeClass("is-checked-filter").addClass("is-non-checked");
        });
    });
    
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        getSortData: {
            name: function (element) {
                return $(element).text();
            }
        }
    });
    
    function initializePage() {
        var initialValue = ".gallery_foto";
        $grid.isotope({
            filter: initialValue
        });
        $('.filter button').removeClass('active');
        $('button[data-name="' + initialValue + '"]').addClass('active');
    }
    
    initializePage();
    
    $('.button').on("click", function () {
        var value = $(this).attr('data-name');
        var $clickedButton = $(this);
        
        if (!$clickedButton.hasClass('active')) {
            $('.button').removeClass('active');
            $clickedButton.addClass('active');
            
            $('.grid-item').addClass('hidden');
            
            $(`.grid-item${value}`).removeClass('hidden');
            
            $grid.isotope({
                filter: value
            });
        }
    });
    
    $('.filter button').on("click", function () {
        var value = $(this).attr('data-name');
        $grid.isotope({
            filter: value
        });
        $('.filter button').removeClass('active');
        $(this).addClass('active');
    })
    $('.sort button').on("click", function () {
        var value = $(this).attr('data-name');
        $grid.isotope({
            sortBy: value
        });
        $('.sort button').removeClass('active');
        $(this).addClass('active');
    })
</script>

@endsection