<header class="wf100 header" id="header">
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <ul class="left-links" style="float: right;">
                <li><a class="btn btn-sm btn-danger" href="{{ url('/donation') }}">Donasi</a></li>
                @if (Auth::check())
                    <li><a class="btn btn-sm btn-danger" href="{{ route('dashboard') }}">Admin Panel</a></li>
                @else
                    <li><a class="btn btn-sm btn-danger" href="{{ route('auth.login') }}">Login/Daftar</a></li>
                @endif
            </ul>
          </div>
 
          <div class="col-md-6 col-sm-6">
            <ul class="right-links">
              <li> <a href="#">Admin: <strong>0821 1653 0496</strong></a> </li>
              <!-- <li> <a href="#"><i class="fas fa-street-view"></i> Explore Desa</a> </li>
              <li> <a href="#"><i class="fas fa-cloud-sun"></i> <strong>24</strong>°C / <strong>75</strong>°F</a> </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="logo-nav-row">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class="navbar">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('homepage/images/logo/logo.png') }}" style="max-width: 125px;" alt=""></a> </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li>
                    <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      role="button" aria-haspopup="true" aria-expanded="false">About <span
                      class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="{{ route('about.index') }}">Tentang Desa Merdeka</a></li>
                          <li><a href="{{ route('home.faq.index') }}">FAQ</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      role="button" aria-haspopup="true" aria-expanded="false">Stake Holder <span
                      class="caret"></span></a>
                      <ul class="dropdown-menu">
                          @forelse (headerContent()['member_type'] as $item)
                          <li>
                              <a href="{{ route('home.member.all', $item->id) }}">
                                  {{ $item->name }}
                              </a>
                          </li>
                          @empty
                          <li>
                              <a href="#">
                                  Belum Ada Stake Holder
                              </a>
                          </li>
                          @endforelse
                      </ul>
                  </li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          News
                          <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="{{ route("home.blog.all", 'all') }}">
                                  Semua Berita
                              </a>
                          </li>
                          @forelse (headerContent()["member_type"] as $item)
                          <li>
                              <a href="{{ route("home.blog.all", $item->id) }}">
                                  Berita {{ $item["name"] }}
                              </a>
                          </li>
                          @empty
                          <li>
                              <a href="">
                                  Belum Ada Berita
                              </a>
                          </li>
                          @endforelse
                      </ul>
                  </li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                      role="button" aria-haspopup="true" aria-expanded="false">Events <span
                      class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="{{ route("home.event.all", 'all') }}">
                                  Semua Event
                              </a>
                          </li>
                          @forelse (headerContent()['member_type'] as $item)
                          <li>
                              <a href="{{ route('home.event.all', ['id' => 'all', 'tags' => $item->id]) }}">
                                  Event {{ $item->name }}
                              </a>
                          </li>
                          @empty
                          <li>
                              <a href="#">
                                  Belum Ada Event
                              </a>
                          </li>
                          @endforelse
                      </ul>
                  </li>
                  <!-- <li><a href="{{ route('contact.index') }}">Kontak</a></li> -->
                </ul>
                <ul class="nav navbar-nav navbar-right" style="display: flex;align-items: center;">
                    <li class="bars-btn">
                        <li class="donate-btn"><a style="border-radius: 5px;background: red;padding: 10px 20px;color: white; margin-right: 10px;" href="{{ url('/donation') }}">Donasi</a></li>
                    @if (Auth::check())
                        <!--<a style="padding: 0px;" href="{{ route('dashboard') }}">Admin Panel</a>-->
                        <li class="donate-btn"><a style="border-radius: 5px;background: red;padding: 10px 20px;color: white;" href="{{ route('dashboard') }}">Admin Panel</a></li>
                    @else
                        <li class="donate-btn"><a style="border-radius: 5px;background: red;padding: 10px 20px;color: white;" href="{{ route('auth.login') }}">Login</a></li>
                        <!--<a style="padding: 0px;" href="{{ route('auth.login') }}">Login/Daftar</a>-->
                    @endif
                    </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
