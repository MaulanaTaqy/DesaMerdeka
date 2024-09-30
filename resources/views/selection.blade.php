<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
		<title> Desa Selection </title>

		<!--- Favicon --->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}" />

		<!-- Bootstrap css -->
		<link href="{{ asset('virtual/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" id="style"/>

		<!--- Icons css --->
		<link href="{{ asset('virtual/assets/css/icons.css') }}" rel="stylesheet">

		<!--- Style css --->
		<link href="{{ asset('virtual/assets/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('virtual/assets/css/plugins.css') }}" rel="stylesheet">

		<!--- Animations css --->
		<link href="{{ asset('virtual/assets/css/animate.css') }}" rel="stylesheet">

		<style>
			.outer-wrapper{
				display: inline-block; 
				margin: 20px;
			}
			.frame{  
				width: 350px;
				height: 235px;
				vertical-align: middle;
				text-align: center;
				display: table-cell;
			}    
			img{
				max-width: 100%;
				max-height: 100%;
				display: block;
				margin: 0 auto;
			}
		</style>

	</head>

	<body class="main-body  login-img">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ asset('virtual/assets/img/loaders/loader-4.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- page -->
	<div class="page">

		<!-- main-signin-wrapper -->
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin construction text-center">
					<div class="p-5  wd-100p">
						<div>
							<h2 class="tx-30">Desa Selection</h2>
							<p class="tx-14 text-muted">Before you login to dashboard, please select which Desa you want to join in!</p>
							
							<div class="row row-sm">
                                @foreach ($desa as $item)
                                <div class="col-md-4 col-sm-auto">
                                    <div class="card">
                                        <div class="card-body h-100">
                                            <h3 class="h6 mb-2 font-weight-bold text-uppercase">{{ $item->name }}</h3>
											<div class="frame">
												<img class="w-100 mt-2 mb-3" src="{{ asset($item->image ?? 'virtual/assets/img/default.png') }}" alt="product-image">
											</div>
											<a class="add-to-cart btn btn-primary btn-block my-1" type="button" href="{{ route('auth.proccess.selection', $item->id) }}">Join</a>
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
		<!-- /main-signin-wrapper -->
	</div>
		<!-- page closed -->


		<!--- JQuery min js --->
		<script src="{{ asset('virtual/assets/plugins/jquery/jquery.min.js') }}"></script>

		<!--- Bootstrap Bundle js --->
		<script src="{{ asset('virtual/assets/plugins/bootstrap/popper.min.js') }}"></script>
		<script src="{{ asset('virtual/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!--- Ionicons js --->
		<script src="{{ asset('virtual/assets/plugins/ionicons/ionicons.js') }}"></script>

		<!--- Moment js --->
		<script src="{{ asset('virtual/assets/plugins/moment/moment.js') }}"></script>

		<!--- JQuery sparkline js --->
		<script src="{{ asset('virtual/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

		<!--- Eva-icons js --->
		<script src="{{ asset('virtual/assets/js/eva-icons.min.js') }}"></script>

		<!--- JQuery sparkline js --->
		<script src="{{ asset('virtual/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

		<!--themecolor js-->
		<script src="{{ asset('virtual/assets/js/themecolor.js') }}"></script>


		<!--- Custom js --->
		<script src="{{ asset('virtual/assets/js/custom.js') }}"></script>

	</body>
</html>