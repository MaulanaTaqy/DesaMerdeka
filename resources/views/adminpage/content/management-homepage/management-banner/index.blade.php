<!--begin::Sidebar-->
<div class="d-none d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-275px" data-kt-drawer="true" data-kt-drawer-name="inbox-aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_inbox_aside_toggle">
    <!--begin::Sticky aside-->
    <div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="inbox-aside-sticky" data-kt-sticky-offset="{default: false, xl: '100px'}" data-kt-sticky-width="{lg: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
        <!--begin::Aside content-->
        <div class="card-body">
            <!--begin::Button-->
            <a class="btn btn-primary fw-bold w-100 mb-8">Banner</a>
            <!--end::Button-->
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary mb-10">
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Inbox-->
                    <a class="menu-link {{ request()->segment(1) == 'blog-banner' ? 'active' : '' }} text-dark" href="{{ route('blog-banner.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-sms fs-2 me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold">Blog Banner</span>
                    </a>
                    <!--end::Inbox-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Marked-->
                    <a href="{{ route('faq-banner.index') }}" class="menu-link {{ request()->segment(1) == 'faq-banner' ? 'active' : '' }} text-dark">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-abstract-23 fs-2 me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold">FAQ Banner</span>
                    </a>
                    <!--end::Marked-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Draft-->
                    <a href="{{ route('about-us-banner.index') }}" class="menu-link {{ request()->segment(1) == 'about-us-banner' ? 'active' : '' }} text-dark">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-file fs-2 me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold">About US Banner</span>
                    </a>
                    <!--end::Draft-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Sent-->
                    <a href="{{ route('contact-banner.index') }}" class="menu-link {{ request()->segment(1) == 'contact-banner' ? 'active' : '' }} text-dark">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-send fs-2 me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold">Contact Banner</span>
                    </a>
                    <!--end::Sent-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item">
                    <!--begin::Trash-->
                    <a href="{{ route('gallery-banner.index') }}" class="menu-link {{ request()->segment(1) == 'gallery-banner' ? 'active' : '' }} text-dark">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-trash fs-2 me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold">Gallery Banner</span>
                    </a>
                    <!--end::Trash-->
                </div>
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Marked-->
                    <a href="{{ route('roadmap-banner.index') }}" class="menu-link {{ request()->segment(1) == 'roadmap-banner' ? 'active' : '' }} text-dark">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-abstract-23 fs-2 me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold">Roadmap Banner</span>
                    </a>
                    <!--end::Marked-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Draft-->
                    <a href="{{ route('product-banner.index') }}" class="menu-link {{ request()->segment(1) == 'product-banner' ? 'active' : '' }} text-dark">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-file fs-2 me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold">Product Banner</span>
                    </a>
                    <!--end::Draft-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Sent-->
                    <a href="{{ route('event-banner.index') }}" class="menu-link {{ request()->segment(1) == 'event-banner' ? 'active' : '' }} text-dark" href="#">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-send fs-2 me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold">Event Banner</span>
                    </a>
                    <!--end::Sent-->
                </div>
                <!--begin::Menu item-->
                <div class="menu-item mb-3">
                    <!--begin::Marked-->
                    <a href="{{ route('member-type-banner.index') }}" class="menu-link {{ request()->segment(1) == 'member-type-banner' ? 'active' : '' }} text-dark">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-abstract-23 fs-2 me-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold">Member Type Banner</span>
                    </a>
                    <!--end::Marked-->
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside content-->
    </div>
    <!--end::Sticky aside-->
</div>
<!--end::Sidebar-->