<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Login - Desa Merdeka
    </title>
    <!-- CSS Files -->
    <link href="{{ url('/homepage') }}/css/custom.css" rel="stylesheet">
    <link href="{{ url('/homepage') }}/css/responsive.css" rel="stylesheet">
    <link href="{{ url('/homepage') }}/css/all.css" rel="stylesheet">
    <link href="{{ url('/homepage') }}/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ url('/homepage') }}/images/fav.png" type="image/png">
    <style>
        body {
            background-image: url('{{ asset("homepage/images/h3footerbg.jpg") }}')
        }
        
        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        @media (max-width: 767px) {
            .row {
                display: block;
                justify-content: initial;
                align-items: initial;
            }
        }
    </style>
</head>

<body>
    
    <div class="my-account p80">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-12">
                    <div class="login-account" style="width: 100%">
                        <center>
                            <img src="{{ url('homepage/images/logo/logo-2.png') }}" style="max-width: 200px;" alt="Logo">
                        </center>
                        <br>
                        
                        @if(session()->has("error"))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                            <!--<strong>Email konfirmasi terkirim!</strong> <br>Harap untuk mengecek email Kotak Masuk/Inbox/Spam anda dan melakukan aktivasi akun.-->
                        </div>
                        @endif
                        @if(session()->has("warning"))
                        <div class="alert alert-warning" role="alert">
                            {{ Session::get('warning') }}
                            <!--<strong>Email konfirmasi terkirim!</strong> <br>Harap untuk mengecek email Kotak Masuk/Inbox/Spam anda dan melakukan aktivasi akun.-->
                        </div>
                        @endif
                        @if(session()->has("success"))                        
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                            <!--<strong>Akun telah diaktivasi!</strong> <br>Terimakasih telah melakukan verifikasi email, kini anda sudah bisa Login!.-->
                        </div>
                        @endif

                        <form action="{{ route('auth.login.process') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" name="cred" class="form-control" placeholder="Email or Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <a class="pull-right" href="{{ route('forgot-password') }}">Forgot Password?</a>
                            <ul>
                                <li>
                                    <input value="Login Account" type="submit">
                                </li>
                            </ul>
                        </form>
                        <div class="text-center pt-3">
                            <p class="text-dark">
                                Not a member ? 
                                <a href="{{ route('auth.register') }}" class="text-primary ms-1">
                                    Sign Up
                                </a>
                            </p>
                            <p class="text-dark">
                                Back to <a href="{{ route('home.index') }}" class="text-primary ms-1">
                                    Homepage
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
