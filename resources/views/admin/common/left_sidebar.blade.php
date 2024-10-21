<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
       <a href="index.html">
    <img alt="Logo" src="{{ asset('backend/assets/media/logos/zurent-logo-new.jpg') }}"
        class="app-sidebar-logo-default logo" />
    <img alt="Logo" src="{{ asset('backend/assets/media/logos/zurent-logo-new.jpg') }}"
        class="app-sidebar-logo-minimize logo" />
</a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->

    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <!--begin::Scroll wrapper-->
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">

                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">

                    <!-- <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboards</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link active" href="{{ asset('admin/dashboard') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Default</span>
                                </a>
                            </div>
                        </div>
                    </div> -->

                    <div class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ url('admin/dashboard') }}">
                            <span class="menu-icon">
                                <i class="fa-solid fa-gauge">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">OPERATIONS</span>
                            </div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'customers'))
                            <div class="menu-item {{ request()->is('admin/customers') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/customers') }}">
                                    <span class="menu-icon">
                                        <i class="fa-solid fa-users">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Customers</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif


                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'properties'))
                            <div class="menu-item {{ request()->is('admin/properties') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/properties') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-home">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Properties</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif

                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_bookings'))
                            <div class="menu-item {{ request()->is('admin/bookings') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/bookings') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-shopping-cart">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Bookings</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif



                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_bookings'))
                            <div class="menu-item {{ request()->is('admin/invoices') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/invoices') }}">
                                    <span class="menu-icon">
                                        <i class="fa-brands fa-paypal"></i>
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">invoices</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif

                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'view_payouts'))
                            <div class="menu-item {{ request()->is('admin/payouts') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/payouts') }}">
                                    <span class="menu-icon">
                                        <i class="fa-brands fa-paypal"></i>
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Payouts</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif




                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_amenities'))
                            <div class="menu-item {{ request()->is('admin/amenities') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/amenities') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-bullseye"></i>
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Amenities</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif


                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'addons'))
                            <div class="menu-item {{ request()->is('admin/addons') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/addons') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-puzzle-piece">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Addons</span>
                                </a>
                            </div>
                        @endif



                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_reviews'))
                            <div class="menu-item {{ request()->is('admin/reviews') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/reviews') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-eye">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Manage Reviews</span>
                                </a>
                            </div>
                        @endif


                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_testimonial'))
                            <div class="menu-item {{ request()->is('admin/testimonials') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/testimonials') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-quote-left">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Testimonials</span>
                                </a>
                            </div>
                        @endif


                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_admin'))
                            <div class="menu-item {{ request()->is('admin/admin-users') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/admin-users') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-user-plus">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Users</span>
                                </a>
                            </div>
                        @endif


                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_messages'))
                            <div class="menu-item {{ request()->is('admin/messages') ? 'active' : '' }}">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ url('admin/messages') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-comments">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Messages</span>
                                </a>
                            </div>
                        @endif

                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'view_reports'))
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{
                                                                            in_array(Route::current()->uri(), ['admin/sales-report', 'admin/sales-analysis', 'admin/overview-stats']) ? 'here show' : ''
                                                                        }}">
                                <!--begin:Menu link-->
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="fa-solid fa-chart-bar">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Reports</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <!--end:Menu link-->

                                <!--begin:Menu sub-->
                                <div class="menu-sub menu-sub-accordion">
                                    <!-- Overview & Stats -->
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::current()->uri() == 'admin/overview-stats' ? 'active' : '' }}"
                                            href="{{ url('admin/overview-stats') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Overview & Stats</span>
                                        </a>
                                    </div>

                                    <!-- Sales Report -->
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::current()->uri() == 'admin/sales-report' ? 'active' : '' }}"
                                            href="{{ url('admin/sales-report') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Sales Report</span>
                                        </a>
                                    </div>

                                    <!-- Sales Analysis -->
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::current()->uri() == 'admin/sales-analysis' ? 'active' : '' }}"
                                            href="{{ url('admin/sales-analysis') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Sales Analysis</span>
                                        </a>
                                    </div>
                                </div>
                                <!--end:Menu sub-->
                            </div>
                        @endif


                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_email_template'))
                            <div class="menu-item {{ request()->is('admin/email-template/*') ? 'active' : '' }}">
                                <a class="menu-link" href="{{ url('admin/email-template/1') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-envelope">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Email Templates</span>
                                </a>
                            </div>
                        @endif

                        <div class="menu-item {{ request()->is('admin/cache-clear') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('admin/cache-clear') }}">
                                <span class="menu-icon">
                                    <i class="fa fa-rotate">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Cache Clear</span>
                            </a>
                        </div>

                        @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'general_setting'))
                            <div class="menu-item {{ request()->is('admin/settings') ? 'active' : '' }}">
                                <a class="menu-link" href="{{ url('admin/settings') }}">
                                    <span class="menu-icon">
                                        <i class="fa fa-gears">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Settings</span>
                                </a>
                            </div>
                        @endif

                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Scroll wrapper-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>

