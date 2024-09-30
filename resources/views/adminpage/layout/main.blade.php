
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title>
			@yield('title', 'Dashboard') - Desa Merdeka	
		</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta name="_token" content="{{ csrf_token() }}" />

		
		<link rel="shortcut icon" href="{{ asset('adminpage/assets/media/logos/favicon.ico') }}" />
		
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		
		
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('adminpage/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('adminpage/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<link href="{{ asset('adminpage/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
		
		<style>
			.bgsize-contain{
				background-size: contain !important; 
			}
		</style>
		<!--begin::Vendor Stylesheets(used for this page only)-->
		@yield('css')
		<!--end::Vendor Stylesheets-->
		
		<style>
			.dark-theme .dropify-wrapper,  .dark-theme .dropify-wrapper .dropify-preview{
				background-color: #1b1a1a;
				color: #fff;
				border: 2px solid #292929;
			}

			.dark-theme .dropify-wrapper:hover {
				background-size: 30px 30px;
				background-image: -webkit-linear-gradient(135deg,#494949 25%,transparent 25%,transparent 50%,#494949 50%,#494949 75%,transparent 75%,transparent);
				background-image: linear-gradient(-45deg,#494949 25%,transparent 25%,transparent 50%,#494949 50%,#494949 75%,transparent 75%,transparent);
				-webkit-animation: stripes 2s linear infinite;
				animation: stripes 2s linear infinite;
			}

			.dark-theme .dropify-infos {
				background-color: #222;
				color: #fff;
			}

			.dropify-wrapper .dropify-message p {
				font-size: 20px;
			}
		</style>

		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
			if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
		</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" 
		data-kt-app-layout="dark-sidebar" 
		data-kt-app-header-fixed="true" 
		data-kt-app-sidebar-enabled="true" 
		data-kt-app-sidebar-fixed="true" 
		data-kt-app-sidebar-hoverable="true" 
		data-kt-app-sidebar-push-header="true" 
		data-kt-app-sidebar-push-toolbar="true" 
		data-kt-app-sidebar-push-footer="true" 
		data-kt-app-toolbar-enabled="true" class="app-default"
	>
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->

		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				@include("adminpage.layout.component.header")
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					@include("adminpage.layout.component.sidebar")
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
                            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                                <!--begin::Toolbar container-->
                                <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                                    @yield('toolbar')
                                </div>
                                <!--end::Toolbar container-->
                            </div>
							<!--end::Toolbar-->
							<!--begin::Content-->
                            <div id="kt_app_content" class="app-content flex-column-fluid">
                                <!--begin::Content container-->
                                <div id="kt_app_content_container" class="app-container container-fluid">
                                    <!--begin::Row-->
                                    @yield('content')
                                    <!--end::Row-->
                                </div>
                                <!--end::Content container-->
                            </div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						@include("adminpage.layout.component.footer")
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::Drawers-->
		@include("adminpage.layout.component.drawer")
		<!--end::Drawers-->
		@yield("modal")
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->
		
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('adminpage/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('adminpage/assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});

			$()

			$(document).ready(function () {
				KTMenu.createInstances();
				KTMenu.updateByLinkAttribute(`{{ URL::current() }}`);
				KTImageInput.createInstances();

				var handlerId = KTThemeMode.on("kt.thememode.change", function() {
					if(KTThemeMode.getMode() == 'light'){
						$('.dropify-wrapper').parent().parent().removeClass('dark-theme')
						$('.dropify').parent().parent().removeClass('dark-theme')
					}else{
						$('.dropify-wrapper').parent().parent().addClass('dark-theme')
						$('.dropify').parent().parent().addClass('dark-theme')
					}
				});
				
				if(themeMode == 'light'){
					$('.dropify').parent().parent().removeClass('dark-theme')
				}else{
					$('.dropify').parent().parent().addClass('dark-theme')
				}

				$(document).on('click', '.modal-effect', function(e) {
					e.preventDefault();
					var effect = $(this).attr('data-bs-effect');
					$('#modal_form').addClass(effect);
				});
				// hide modal with effect
				$(document).on('hidden.bs.modal', '#modal_form', function(e) {
					$(this).removeClass(function(index, className) {
						return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
					});
				});
			});

			function toast(message) {
				Swal.fire({
					toast: true,
					position: 'top-end',
					icon: 'error',
					title: 'ERROR !',
					text: message,
					showConfirmButton: false,
					timer: 2000
				});
			}

			function ajaxSelect2Initiator(elm, modal, url, limit = false) {
				return $('#' + elm).select2({
					width: '100%',
					maximumSelectionLength: limit,
					dropdownParent: modal ? $(this).parent() : '',
					ajax: {
						url: url,
						dataType: 'json',
						type: "GET",
						delay: 500,
						quietMillis: 500,
						data: function(term) {
							searchData = term.term;
							return {
								term: term
							};
						},
						processResults: function(response) {
							return {
								results: $.map(response, function(item) {
									return {
										text: item.name,
										id: item.id
									}
								})
							};
						}
					}
				});
			}

			function editorInitiator(ids = []) {
				var o, a;
				ids.forEach((e) => {
					let t = document.querySelector('#'+e);
					t &&
					(t = new Quill('#'+e, {
						modules: {
							toolbar: [
							['bold', 'italic', 'underline', 'strike'],
							['blockquote', 'code-block'],

							[{ 'header': 1 }, { 'header': 2 }],
							[{ 'list': 'ordered'}, { 'list': 'bullet' }],
							[{ 'script': 'sub'}, { 'script': 'super' }],
							[{ 'indent': '-1'}, { 'indent': '+1' }],
							[{ 'direction': 'rtl' }],

							[{ 'size': ['small', false, 'large', 'huge'] }],
							[{ 'header': [1, 2, 3, 4, 5, 6, false] }],

							[{ 'color': [] }, { 'background': [] }],
							[{ 'font': [] }],
							[{ 'align': [] }],

							["image", "code-block"],

							['clean']
						]},
						placeholder: "Type your text here...",
						theme: "snow",
					}));

					$('#'+e+' .ql-editor').height($('#'+e).height() <= 100 ? 200 : $('#'+e).height())

					$('#'+e).parent().append(`
						<textarea class="d-none" id="${e}_id" name="${e}" placeholder="short description..."></textarea>
					`)

					t.on('text-change', (delta, oldContents, source) => {
						if (source !== 'user') return;

						$('#'+ e +'_id').html($('#'+ e + ' .ql-editor').html());
					});

					$('#'+ e +'_id').html($('#'+ e + ' .ql-editor').html());

				})
			}

			let type = false;

			if (`{{ session()->has('success') }}` == true) type = 'success';
			if (`{{ session()->has('error') }}` == true) type = 'error';

			if (type) {
				Swal.fire({
					title: type == 'success' ? "Success !" : 'Error !',
					html: type == 'success' ? "{{ session()->get('success') }}" : "{!! session()->get('error') !!}",
					icon: `${type}`,
				})
			}
	
		</script>
		<!--begin::Custom Javascript(used for this page only)-->
		@yield('javascript')
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>