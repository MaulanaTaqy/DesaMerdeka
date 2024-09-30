<div class="widget">
    <h4>About us</h4>
    <div class="about-widget inner">
        <img src="{{ $app->logo_app ? (file_exists($app->logo_app) ? asset($app->logo_app) : asset('/homepage/images/about-widget-img.jpg')) : asset('/homepage/images/about-widget-img.jpg') }}" alt="">
        {!! $app->short_about_desc !!}
        <a href="#">More About us</a>
    </div>
</div>