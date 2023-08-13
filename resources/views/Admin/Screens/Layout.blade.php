<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8" />
    <title>AlbaProtein Admin | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="AlbaProtein Admin" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo/favicon.png') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets-admin/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('assets-admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <!--datatable css-->
    <link rel="stylesheet" href="{{ asset('assets-admin/cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css') }}" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="{{ asset('assets-admin/cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets-admin/cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css') }}">
    <!-- Layout config Js -->
    <script src="{{ asset('assets-admin/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets-admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets-admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets-admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-office/css/style.css') }}" rel="stylesheet">
    <style>
        .menu-icon i{
            font-size: 15px !important;
            margin-right: 10px;
        }
    </style>
    @yield('style')
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        @yield('modal')
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="{{ URL::to('/admin/dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('logo/logo-white.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('logo/logo-white.png') }}" alt="" height="17">
                                </span>
                            </a>

                            <a href="{{ URL::to('/admin/dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('logo/logo-white.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('logo/logo-white.png') }}" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                        </div>



                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('uploads/' . Auth::user()->profile_pic) }}" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                            {{ Auth::user()->name }}</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                                <a class="dropdown-item" href="{{URL::to('admin/settings')}}">
                                    <i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                                <a class="dropdown-item" href="{{ URL::to('admin/logout') }}">
                                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('logo/favicon.png') }}" alt="" height="33">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo.png') }}" alt="" height="50">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('logo/favicon.png') }}" alt="" height="33">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo-white.png') }}" alt="" height="45">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <!-- Sidebar -->
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/dashboard') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarDashboards">
                                <div class="menu-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <span data-key="t-dashboards">Dashboard</span>
                            </a>
                        </li>
                        <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/users*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/users') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <div class="menu-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <span data-key="">Users</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/office-users*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/office-users') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <div class="menu-icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <span data-key="">Office Users</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/offices*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/offices') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <div class="menu-icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <span data-key="">Offices</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/packages*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/packages') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <div class="menu-icon">
                                    <i class="fas fa-box-open"></i>
                                </div>
                                <span data-key="">Packages</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/active-packages*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/active-packages') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <div class="menu-icon">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <span data-key="">Active Packages</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/withdraws/all*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/withdraws/all') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <div class="menu-icon">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <span data-key="">Withdraws</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/transictions*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/transictions') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <div class="menu-icon">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <span data-key="">Transactions</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/settings*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/settings') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <div class="menu-icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <span data-key="">Settings</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Request::is('admin/logout*') ? 'active' : '' }}"
                                href="{{ URL::to('admin/logout') }}" role="button" aria-expanded="false"
                                aria-controls="sidebarApps">
                                <div class="menu-icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <span data-key="">Logout</span>
                            </a>
                        </li>



                    </ul>
                </div>
                <!-- Sidebar -->


            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
        
        @yield('content')
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets-admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets-admin/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets-admin/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets-admin/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets-admin/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets-admin/js/pages/dashboard-ecommerce.init.js') }}"></script>

    <script src="{{ asset('assets-admin/code.jquery.com/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="{{ asset('assets-admin/cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets-admin/cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets-admin/cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets-admin/cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets-admin/cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets-admin/cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js') }}"></script>
    {{-- <script src="{{ asset('assets-admin/js/pages/datatables.init.js') }}"></script> --}}
    <!-- App js -->
    <script src="{{ asset('assets-admin/js/app.js') }}"></script>
    @yield('script')
</body>
</html>
