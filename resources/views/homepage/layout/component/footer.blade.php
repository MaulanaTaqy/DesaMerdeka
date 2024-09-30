<footer class="home3 main-footer wf100">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="textwidget">
                    <img width="70%" src="{{ asset($app->logo_app ?? 'image/logo.png' ) }}" alt="">
                    <address>
                        <ul>
                            <li>
                                <i class="fas fa-university"></i>
                                <strong>Alamat :</strong>
                                {{$app->address ?? 'Jalan Gatot Subroto Kav 52-53 Lantai 11 - Jakarta Selatan, DKI Jakarta, Indonesia'}}
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i> 
                                <strong>Email:</strong> {{ $app->email ?? 'desakumerdeka@gmail.com' }}
                                <br>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <strong>Call us:</strong> 
                                {{$app->phone ?? '(+62) 85162972729'}}
                            </li>
                        </ul>
                    </address>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-widget">
                    <h6>Program Desa Merdeka</h6>
                    <ul>
                        <li><a href="#"><i class="fas fa-star"></i> Desa Tani</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Desa Ternak</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Desa Wisata</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Desa Cerdas</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Desa Ahli</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Desa Sehat</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-widget">
                    <h6>Akses Cepat</h6>
                    <ul>
                        <li><a href="#"><i class="fas fa-star"></i> Daftar Desa</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Daftar UMKM</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Daftar Asosiasi/Komunitas</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Daftar Industri</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Donations</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Jadi Relawan</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Maps</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="twitter-widget">
                    <div class="tw-txt">
                        <h6>Iman Ahmad</h6>
                        <a href="#" class="reply-tw"><i class="fas fa-reply"></i></a>
                        <p> Sebaik-baik manusia adalah yang mampu memberikan manfaat kebaikan untuk orang banyak. </p>
                    </div>
                    <div class="tw-footer">
                        @desamerdeka 
                        <strong>10 November, 2023</strong>
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<footer class="home3 footer wf100">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <p class="copyr">
                    @2023 Desa Merdeka
                </p>
            </div>
            <div class="col-md-5 col-sm-5">
                <ul class="footer-social">
                    <li>
                        <a href="{{ urlCheck($app->fb_url ?? '') }}" target="_blank" class="fb">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ urlCheck($app->twt_url ?? '') }}" target="_blank" class="tw">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ urlCheck($app->ig_url ?? '') }}" target="_blank" class="insta">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ urlCheck($app->tk_url ?? '') }}" target="_blank" class="linken">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ urlCheck($app->yt_url ?? '') }}" target="_blank" class="yt">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
