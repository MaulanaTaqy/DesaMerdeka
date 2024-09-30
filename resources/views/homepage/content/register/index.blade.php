<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Register - Desa Merdeka
    </title>
    <!-- CSS Files -->
    <link href="{{ url('/homepage') }}/css/custom.css" rel="stylesheet">
    <link href="{{ url('/homepage') }}/css/responsive.css" rel="stylesheet">
    <link href="{{ url('/homepage') }}/css/all.css" rel="stylesheet">
    <link href="{{ url('/homepage') }}/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ url('/homepage') }}/images/fav.png" type="image/png">
    <style>
        .progress {
            height: 3px !important;
        }
        .progress-bar-danger {
            background-color: #e90f10;
        }
        .progress-bar-warning{
            background-color: #ffad00;
        }
        .progress-bar-success{
            background-color: #02b502;
        }
        .fa-circle{
            font-size: 6px;  
        }
        .fa-check{
            color: #02b502;
        }

        div#popover-password > ul.list-unstyled > li {
            border-bottom: 0px !important;
        }
    </style>
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
                <form action="{{ route('auth.register.process') }}" method="post">
                    @csrf
                    <div class="login-account" style="width: 100%">
                        <center>
                            <img src="{{ url('homepage/images/logo/logo-2.png') }}" style="max-width: 200px;" alt="Logo">
                        </center>
                        <br>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                            @endforeach
                        @endif
                        
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-book"></i>
                                </span>
                                <select name="member_type" class="input100 border-start-0 ms-0 form-control" id="">
                                    <option value="" selected disabled>-- Pilih Tipe Akun --</option>
                                    <option value="member"  name="member">Umum</option>
                                    @foreach ($member as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == old("member_type") ? 'selected' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input name="name" value="{{ old("name") }}" type="text" class="input100 border-start-0 ms-0 form-control" placeholder="Name" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input name="username" value="{{ old("username") }}" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input name="email" value="{{ old("email") }}" type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg" id="Password-toggle">
                                <span class="input-group-addon" id="basic-addon1">
                                    <i class="fa fa-eye"></i>
                                </span>
                                <input name="password" value="{{ old("password") }}" id="password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div id="popover-password">
                            <p><span id="result"></span></p>
                            <div class="progress">
                                <div id="password-strength" 
                                    class="progress-bar" 
                                    role="progressbar" 
                                    aria-valuenow="40" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100" 
                                    style="width:0%">
                                </div>
                            </div>
                            <ul class="list-unstyled mt-2">
                                <li class="">
                                    <span class="low-upper-case">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Lowercase &amp; Uppercase
                                    </span>
                                </li>
                                <li class="">
                                    <span class="one-number">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Number (0-9)
                                    </span> 
                                </li>
                                <li class="">
                                    <span class="one-special-char">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Special Character (!@#$%^&*)
                                    </span>
                                </li>
                                <li class="">
                                    <span class="eight-character">
                                        <i class="fas fa-circle" aria-hidden="true"></i>
                                        &nbsp;Atleast 8 Character
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <ul>
                            <li>
                                <input id="btn-regis" value="Signup" type="submit">
                            </li>
                        </ul>
                        <div class="text-center pt-3">
                            <p class="text-dark">
                                Already have account ? 
                                <a href="{{ route('auth.login') }}" class="text-primary ms-1">
                                    Sign In
                                </a>
                            </p>
                            <p class="text-dark">
                                Back to <a href="{{ route('home.index') }}" class="text-primary ms-1">
                                    Homepage
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('homepage/js/jquery.min.js') }}"></script>
    <script src="{{ asset('homepage/js/bootstrap.min.js') }}"></script>
    
    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('homepage/js/show-password.min.js') }}"></script>

    <script>
        $('#btn-regis').prop('disabled', true);
        
        let state = false;
        let password = document.getElementById("password");
        let passwordStrength = document.getElementById("password-strength");
        let lowUpperCase = document.querySelector(".low-upper-case i");
        let number = document.querySelector(".one-number i");
        let specialChar = document.querySelector(".one-special-char i");
        let eightChar = document.querySelector(".eight-character i");

        password.addEventListener("keyup", function(){
            let pass = document.getElementById("password").value;
            checkStrength(pass);
        });

        function toggle(){
            if(state){
                document.getElementById("password").setAttribute("type","password");
                state = false;
            }else{
                document.getElementById("password").setAttribute("type","text")
                state = true;
            }
        }

        function myFunction(show){
            show.classList.toggle("fa-eye-slash");
        }

        function checkStrength(password) {
            let strength = 0;

            //If password contains both lower and uppercase characters
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                strength += 1;
                lowUpperCase.classList.remove('fa-circle');
                lowUpperCase.classList.add('fa-check');
            } else {
                lowUpperCase.classList.add('fa-circle');
                lowUpperCase.classList.remove('fa-check');
            }
            //If it has numbers and characters
            if (password.match(/([0-9])/)) {
                strength += 1;
                number.classList.remove('fa-circle');
                number.classList.add('fa-check');
            } else {
                number.classList.add('fa-circle');
                number.classList.remove('fa-check');
            }
            //If it has one special character
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                strength += 1;
                specialChar.classList.remove('fa-circle');
                specialChar.classList.add('fa-check');
            } else {
                specialChar.classList.add('fa-circle');
                specialChar.classList.remove('fa-check');
            }
            //If password is greater than 7
            if (password.length > 7) {
                strength += 1;
                eightChar.classList.remove('fa-circle');
                eightChar.classList.add('fa-check');
            } else {
                eightChar.classList.add('fa-circle');
                eightChar.classList.remove('fa-check');   
            }

            // If value is less than 2
            if (strength < 2) {
                passwordStrength.classList.remove('progress-bar-warning');
                passwordStrength.classList.remove('progress-bar-success');
                passwordStrength.classList.add('progress-bar-danger');
                passwordStrength.style = 'width: 10%';
                $('#btn-regis').prop('disabled', true)
            } else if (strength == 3) {
                passwordStrength.classList.remove('progress-bar-success');
                passwordStrength.classList.remove('progress-bar-danger');
                passwordStrength.classList.add('progress-bar-warning');
                passwordStrength.style = 'width: 60%';
                $('#btn-regis').prop('disabled', true)
            } else if (strength == 4) {
                passwordStrength.classList.remove('progress-bar-warning');
                passwordStrength.classList.remove('progress-bar-danger');
                passwordStrength.classList.add('progress-bar-success');
                passwordStrength.style = 'width: 100%';
                $('#btn-regis').prop('disabled', false)
            }
        }
    </script>
    
</body>

</html>
