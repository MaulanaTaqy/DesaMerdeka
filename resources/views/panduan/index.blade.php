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
                    <span class="menu-link">
                    <a class="nav-link thumb  mb-2 {{ Route::is('panduan.regis.indexRegis') ? "active" : '' }}" href="{{ route('panduan.regis.indexRegis') }}">
                        <i class="fe fe-log-in" name="register"></i>
                         Register & Login 
                    </a>
                    </span>
                    <!--end::Inbox-->
                </div>

                <div class="menu-item mb-3">
                    <!--begin::Inbox-->
                    <span class="menu-link">
                        <a class="nav-link border-top-0 thumb mb-2 {{ Route::is('panduan.aktivasi.indexAktivasi') ? "active" : '' }}" href="{{ route('panduan.aktivasi.indexAktivasi') }}">
                            <i class="fe fe-user" name="aktivasi"></i>
                             Activation Account
                        </a>
                    </span>
                    <!--end::Inbox-->
                </div>

                <div class="menu-item mb-3">
                    <!--begin::Inbox-->
                    <span class="menu-link ">
                        <a class="nav-link border-top-0 thumb mb-2 {{ Route::is('panduan.dashboard.indexDashboard') ? "active" : '' }}" href="{{ route('panduan.dashboard.indexDashboard') }}">
                            <i class="fe fe-grid"></i> Dashboard</a>
                    </span>
                    <!--end::Inbox-->
                </div>

                <div class="menu-item mb-3">
                    <!--begin::Inbox-->
                    <span class="menu-link">
                        <a class="nav-link border-top-0 thumb mb-2 {{ Route::is('panduan.upload.indexUpload') ? "active" : '' }}" href="{{ route('panduan.upload.indexUpload') }}">
                            <i class="fe fe-award" name="event"></i>
                             Upload Event
                        </a>
                    </span>
                    <!--end::Inbox-->
                </div>

                <div class="menu-item mb-3">
                    <!--begin::Inbox-->
                    <span class="menu-link">
                        <a class="nav-link border-top-0 thumb mb-2 {{ Route::is('panduan.app.indexApp') ? "active" : '' }}" href="{{ route('panduan.app.indexApp') }}">
                            <i class="fe fe-smartphone" name="app"></i>
                             Upload Apps
                        </a>
                    </span>
                    <!--end::Inbox-->
                </div>

                
                <div class="menu-item mb-3">
                    <!--begin::Inbox-->
                    <span class="menu-link ">
                        <a class="nav-link border-top-0 thumb mb-2 {{ Route::is('panduan.berita.indexBerita') ? "active" : '' }}" href="{{ route('panduan.berita.indexBerita') }}">
                            <i class="fe fe-tv" name="berita"></i>
                             Upload Berita
                        </a>
                    </span>
                    <!--end::Inbox-->
                </div>

                <div class="menu-item mb-3">
                    <!--begin::Inbox-->
                    <span class="menu-link ">
                        <a class="nav-link border-top-0 thumb mb-2 {{ Route::is('panduan.mail.indexMail') ? "active" : '' }}" href="{{ route('panduan.mail.indexMail') }}">
                            <i class="fe fe-mail" name="mail"></i>
                            Mail
                    </a>
                    </span>
                    <!--end::Inbox-->
                </div>
                
                <div class="menu-item mb-3">
                    <!--begin::Inbox-->
                    <span class="menu-link ">
                        <a class="nav-link border-top-0 thumb mb-2 {{ Route::is('panduan.chat.indexChat') ? "active" : '' }}" href="{{ route('panduan.chat.indexChat') }}">
                            <i class="fe fe-message-square" name="chat"></i>
                            Chat
                    </a>
                    </span>
                    <!--end::Inbox-->
                </div>

                <!--end::Menu item-->
            </div>
 
        </div>
        <!--end::Aside content-->
    </div>
    <!--end::Sticky aside-->
</div>
<!--end::Sidebar-->