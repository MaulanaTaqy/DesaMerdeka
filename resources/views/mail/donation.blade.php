<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.2.0
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../"/>
		<title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('adminpage') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('adminpage') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <style>
            a{
                text-decoration: none;
            }
        </style>
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-column-fluid">
				<!--begin::Body-->
				<div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#D5D9E2; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
					<!--begin::Email template-->
					<style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
					<div id="#kt_app_body_content" style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:10px; width:100%;">
						<div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
								<tbody>
									<tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
											<!--begin:Email content-->
											<div style="text-align:center; margin:0 60px 34px 60px">
												<!--begin:Logo-->
												<div style="margin-bottom: 10px">
													<a href="https://keenthemes.com" rel="noopener" target="_blank">
														<img alt="Logo" src="{{ asset('homepage/images/logo/logo.png') }}" style="height: 35px" />
													</a>
												</div>
												<!--end:Logo-->
												<!--begin:Media-->
												<div style="margin-bottom: 15px">
													<img alt="Logo" src="{{ asset('adminpage') }}/assets/media/email/icon-positive-vote-3.svg" />
												</div>
												<!--end:Media-->
												<!--begin:Text-->
												<div style="font-size: 14px; font-weight: 500; margin-bottom: 42px; font-family:Arial,Helvetica,sans-serif">
													<p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Permintaan Donasi</p>
													<p style="margin-bottom:2px; color:#7E8299">Hi Desa Merdeka!</p>
													<p style="margin-bottom:2px; color:#7E8299">Saya {{ $request->name }} ingin berkontribusi dalam</p>
													<p style="margin-bottom:2px; color:#7E8299">pengembangan desa merdeka</p>
												</div>
												<!--end:Text-->
												<!--begin:Order-->
												<div style="margin-bottom: 15px">
													<!--begin:Title-->
													<h3 style="text-align:left; color:#181C32; font-size: 18px; font-weight:600; margin-bottom: 22px">Rincian Donasi</h3>
													<!--end:Title-->
													<!--begin:Items-->
													<div style="padding-bottom:9px">
														<!--begin:Item-->
														<div style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500; margin-bottom:8px">
															<!--begin:Description-->
															<div style="font-family:Arial,Helvetica,sans-serif">Nama Donatur</div>
															<!--end:Description-->
															<!--begin:Total-->
															<div style="font-family:Arial,Helvetica,sans-serif">{{ $request->name }}</div>
															<!--end:Total-->
														</div>
														<!--end:Item-->
														<!--begin:Item-->
														<div style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500;">
															<!--begin:Description-->
															<div style="font-family:Arial,Helvetica,sans-serif">Instansi</div>
															<!--end:Description-->
															<!--begin:Total-->
															<div style="font-family:Arial,Helvetica,sans-serif">{{ $request->instance }}</div>
															<!--end:Total-->
														</div>
														<!--end:Item-->
														<!--begin::Separator-->
														<div class="separator separator-dashed" style="margin:15px 0"></div>
														<!--end::Separator-->
														<!--begin:Item-->
														<div style="display:flex; justify-content: space-between; color:#7E8299; font-size: 14px; font-weight:500">
															<!--begin:Description-->
															<div style="font-family:Arial,Helvetica,sans-serif">Total Donasi</div>
															<!--end:Description-->
															<!--begin:Total-->
															<div style="color:#50cd89; font-weight:700; font-family:Arial,Helvetica,sans-serif">{{ formatRupiah($request->donation ?? $request->other) }}</div>
															<!--end:Total-->
														</div>
														<!--end:Item-->
													</div>
													<!--end:Items-->
												</div>
												<!--end:Order-->
												<!--begin:Order-->
												<div style="margin-bottom: 15px">
													<!--begin:Title-->
													<p style="text-align:left; color:#181C32; font-size: 16px; font-weight:600; margin-bottom: 9px">Komentar</p>
													<!--end:Title-->
													<!--begin:Items-->
													<p style="color:#7E8299; text-align:left">{{ $request->comment ?? '-' }}</p>
													<!--end:Items-->
												</div>
												<!--end:Order-->
											</div>
											<!--end:Email content-->
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
											<p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">Hubungi saya kembali</p>
											<p style="margin-bottom:2px">Anda dapat menghubungi saya</p>
											<p style="margin-bottom:2px">melalui nomor {{ $request->no_telp }} atau melalui</p>
											<p style="margin-bottom:4px">email
											<a href="{{ $request->email }}" rel="noopener" target="_blank" style="font-weight: 600">{{ $request->email }}</a>.</p>
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
											<p>&copy; Copyright Desa Merdeka.</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!--end::Email template-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('adminpage') }}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('adminpage') }}/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>