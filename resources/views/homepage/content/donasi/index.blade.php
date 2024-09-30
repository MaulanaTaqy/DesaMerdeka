@extends('homepage.layout.main')


@section('css')
   <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/settings.css" type='text/css' media='all' />
   <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/layers.css" type='text/css' media='all' />
   <link rel="stylesheet" href="{{ url('/homepage') }}/js/rev-slider/css/navigation.css" type='text/css' media='all' />
@endsection

@section('content_top')
   <!--Sub Header Start-->
   <section class="wf100 subheader">
      <div class="container">
         <h2>Donasi </h2>
         <ul>
               <li> <a href="index.html">Home</a> </li>
               <li> <a href="#"> Donasi</a> </li>
         </ul>
      </div>
   </section>
   <!--Sub Header End-->
@endsection


@section('content')
   <div class="container">
      <form action="{{ route('donation.donate') }}" method="post">
         @csrf
         <div class="row">
             <div class="col-md-12">
                 <div class="donations">
                     <h4>Aplikasi dan Operasional Desa Merdeka 100 % adalah wakaf yang sudah dibuat oleh Founder dan Tim.</h4>
                     <h6>Jika anda berkenan ingin berdonasi, anda dapat berdonasi di Yayasan Binaan yaitu Yayasan Pendidikan Ahmad Syarif yang memiliki visi utama yaitu mencerdaskan generasi Qurani yang mandiri dan BerAkhlak Mulia</h6>
                     
                 </div>
                 <div class="col-md-3">
                    
                    <img width="100%" src="{{ asset('homepage') }}/images/QRIS YPAS.jpg"
                                    alt="">
                    
                </div>
                 <div class="col-md-9">
                    
                    <img width="50%" src="{{ asset('homepage') }}/images/bsi2.png"
                                    alt=""><br><br><br>
                    <h5>No.Rekening : 71-891-29-771</h5>
                    <h6>Atas Nama: Yayasan Pendidikan Ahmad Syarif</h6>
                    <ul class="radio-boxes">
                         <li>
                             <div class="radio custom">
                                 <input name="donation" value="5000" id="d1" type="radio" class="css-radio">
                                 <label for="d1" class="css-label">5K</label>
                             </div>
                         </li>
                         <li>
                             <div class="radio custom">
                                 <input name="donation" value="10000" id="d2" type="radio" class="css-radio">
                                 <label for="d2" class="css-label">10K</label>
                             </div>
                         </li>
                         <li>
                             <div class="radio custom">
                                 <input name="donation" value="20000" id="d3" type="radio" class="css-radio">
                                 <label for="d3" class="css-label">20K</label>
                             </div>
                         </li>
                         <li>
                             <div class="radio custom">
                                 <input name="donation" value="25000" id="d4" type="radio" class="css-radio">
                                 <label for="d4" class="css-label">25K</label>
                             </div>
                         </li>
                         <li>
                             <div class="radio custom">
                                 <input name="donation" value="50000" id="d5" type="radio" class="css-radio">
                                 <label for="d5" class="css-label">50K</label>
                             </div>
                         </li>
                         <li>
                             <div class="radio custom">
                                 <input name="donation" value="100000" id="d6" type="radio" class="css-radio">
                                 <label for="d6" class="css-label">100K</label>
                             </div>
                         </li>
                         <li>
                             <div class="inputs">
                                 <input class="enter" name="other" type="number" placeholder="lainnya">
                             </div>
                         </li>
                     </ul>
                     
                </div><br>
                <h6>Dana yang terkumpul akan digunakan untuk operasional, pembelian Al-Quran, Perbaikan Rumah Tahfiz dan Pengembangan Pendidikan sehingga tercapai visi yaitu membangun generasi
                     Qurani yang mandiri dan BerAkhlak Mulia</h6>
        
                <div class="wf100 donator-details">
                         <br><h4>Info Donatur</h4><br>
                         <ul>
                             <li class="half pr15">
                                 <input name="name" placeholder="Name" class="form-control">
                             </li>
                             <li class="half pl15">
                                 <input name="no_telp" placeholder="No Telp" class="form-control">
                             </li>
                             <li class="half pr15">
                                 <input name="email" placeholder="Email Adress" class="form-control">
                             </li>
                             <li class="half pl15">
                                 <input name="comment" placeholder="Comment" class="form-control">
                             </li>
                             <li class="half pr15">
                                 <input name="instance" placeholder="Nama Instansi" class="form-control">
                             </li>
                             <li class="half pl15">
                                 <input value="Kirim" type="submit">
                             </li>
                         </ul>
                     </div>
             </div>
         </div>
      </form>
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
