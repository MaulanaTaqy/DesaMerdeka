<footer id="rs-footer" class="rs-footer style1" style="background-image: url('https://rstheme.com/products/wordpress/evenio/wp-content/uploads/2021/09/footer-bg-5.jpg');">
    <div class="footer-top">
        <div class="container" id="fotter">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 md-mb-10">
                    <div class="footer-logo mb-40">
                        <a href="/"><img src="{{ asset($app->logo_app ?? 'landingpage/images/logo-light2.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 md-pl-15">
                            <h3 class="footer-title">Address</h3>
                            <div class="textwidget">{{$app->address ?? 'Jalan Gatot Subroto Kav 52-53 Lantai 11 - Jakarta Selatan, DKI Jakarta, Indonesia'}}</div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 md-mb-10 pl-45 md-pl-15">
                            <h3 class="footer-title">Call Us</h3>
                            <div class="textwidget">
                                <a href="#">{{$app->email ?? 'virtualDesa@gmail.com'}} </a><br>
                                <a href="#">tel : {{$app->phone ?? '(+62) 85162972729'}}</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 pl-45 md-pl-15">
                            <h3 class="footer-title">Follow Us</h3>
                            <ul class="footer-social">
                                <li>
                                    <a href="{{ urlCheck($app->fb_url ?? '') }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{ urlCheck($app->ig_url ?? '') }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{{ urlCheck($app->yt_url ?? '') }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="{{ urlCheck($app->twt_url ?? '') }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{ urlCheck($app->tk_url ?? '') }}" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-6 md-mb-10 text-lg-end text-center order-last">
                    <ul class="copy-right-menu">
                        <li><a href="{{route('app.index')}}">Product</a></li>
                        <li><a href="{{route('home.member.all')}}">Member</a></li>
                        <li><a href="{{route('home.blog.all')}}">Blog</a></li>
                        <li><a href="{{route('home.roadmap')}}">Road Map</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="copyright text-lg-start text-center ">
                        <p>@2022 Desa Merdeka, Industri Elektronika & Telematika - Dirjen ILMATE Kementerian Perindustrian, Development by Subdit Software dan Konten</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>