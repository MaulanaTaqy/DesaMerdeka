<!--begin::Sidebar-->
<div class="d-none d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-275px" data-kt-drawer="true" data-kt-drawer-name="inbox-aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_inbox_aside_toggle">
    <!--begin::Sticky aside-->
    <div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="inbox-aside-sticky" data-kt-sticky-offset="{default: false, xl: '100px'}" data-kt-sticky-width="{lg: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
        <!--begin::Aside content-->
        <div class="card-body">
            <!--begin::Button-->
            <a href="../../demo1/dist/apps/inbox/compose.html" class="btn btn-primary fw-bold w-100 mb-8">List Panduan</a>
            <!--end::Button-->
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary mb-10">
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Inbox-->
                    <a class="menu-link {{ Route::is('panduan.regis.*') ? 'active' : '' }} text-dark" href="{{ route('panduan.regis.indexRegis') }}">

                        {{-- {{ dd(request()->segments()); }} --}}
                        <span class="menu-title fw-bold" name="register">Register & Login </span>
                    </a>
                    <!--end::Inbox-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Marked-->
                    <a href="{{ route('panduan.aktivasi.indexAktivasi') }}" class="menu-link {{ Route::is('panduan.aktivasi.*') ? 'active' : '' }} text-dark">

                        <span class="menu-title fw-bold" name="aktivasi">Activation Account</span>
                    </a>
                    <!--end::Marked-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Draft-->
                    <a href="{{ route('panduan.dashboard.indexDashboard') }}" class="menu-link {{ Route::is('panduan.dashboard.*') ? 'active' : '' }} text-dark">
                        <span class="menu-title fw-bold" name="dashboard">Dashboardr</span>
                    </a>
                    <!--end::Draft-->

                    
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Sent-->
                    <a href="{{ route('panduan.upload.indexUpload') }}" class="menu-link {{ Route::is('panduan.upload.*') ? 'active' : '' }} text-dark">

                        <span class="menu-title fw-bold" name="event">Upload Event</span>
                    </a>
                    <!--end::Sent-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item">
                    <!--begin::Trash-->
                    <a href="{{ route('panduan.app.indexApp') }}" class="menu-link {{ Route::is('panduan.app.*') ? 'active' : '' }} text-dark">
                        <span class="menu-title fw-bold" name="app">Upload Apps</span>
                    </a>
                    <!--end::Trash-->
                </div>
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Marked-->
                    <a href="{{ route('panduan.berita.indexBerita') }}" class="menu-link {{ Route::is('panduan.berita.*') ? 'active' : '' }} text-dark">

                        <span class="menu-title fw-bold" name="berita"> Upload Berita</span>
                    </a>
                    <!--end::Marked-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Draft-->
                    <a href="{{ route('panduan.mail.indexMail') }}" class="menu-link {{ Route::is('panduan.mail.*') ? 'active' : '' }} text-dark">
                        <span class="menu-title fw-bold" name="mail">Mail</span>
                    </a>
                    <!--end::Draft-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Sent-->
                    <a href="{{ route('panduan.chat.indexChat') }}" class="menu-link {{ Route::is('panduan.chat.*') ? 'active' : '' }} text-dark" >

                        <span class="menu-title fw-bold" name="chat">Chat</span>
                    </a>
                    <!--end::Sent-->
                </div>
          

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside content-->
    </div>
    <!--end::Sticky aside-->
</div>
<!--end::Sidebar-->