<!doctype html>
<html lang="en">    
<head>
        
        <meta charset="utf-8" />
        <title>@yield('title') | AlbaProtein</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="AlbaProtein" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('logo/favicon.png') }}">
        <link href="{{ asset('assets-user/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets-user/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets-user/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets-user/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

        @yield('style')

    </head>

    <body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{ URL::to('/user/dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('logo/logo-white.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('logo/logo-white.png') }}" alt="" height="50">
                                </span>
                            </a>

                            <a href="{{ URL::to('/user/dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('logo/logo-white.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('logo/logo-white.png') }}" alt="" height="50">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset('uploads/' . Auth::user()->profile_pic) }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item d-block" href="{{URL::to('/user/settings')}}"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Profile Settings</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{URL::to('/user/logout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>
                            <li>
                                <a href="{{ URL::to('user/dashboard') }}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user/invites') }}" class="waves-effect">
                                    <i class="bx bx-user-plus"></i>
                                    <span key="t-dashboards">Invites</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user/packages') }}" class="waves-effect">
                                    <i class="bx bx-package"></i>
                                    <span key="t-dashboards">Packages</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user/active-packages') }}" class="waves-effect">
                                    <i class="bx bx-package"></i>
                                    <span key="t-dashboards">Active Packages</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user/transactions') }}" class="waves-effect">
                                    <i class="bx bx-receipt"></i>
                                    <span key="t-dashboards">Transactions</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user/wallet') }}" class="waves-effect">
                                    <i class="bx bx-wallet-alt"></i>
                                    <span key="t-dashboards">Wallet</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user/withdraws') }}" class="waves-effect">
                                    <i class="bx bx-dollar"></i>
                                    <span key="t-dashboards">Withdraws</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user/settings') }}" class="waves-effect">
                                    <i class="bx bx-cog"></i>
                                    <span key="t-dashboards">Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('user/logout') }}" class="waves-effect">
                                    <i class="bx bx-power-off"></i>
                                    <span key="t-dashboards">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
            <div class="main-content">
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            @yield('content')
            <!-- end main content-->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © AlbaProtein.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets-user/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets-user/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets-user/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets-user/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets-user/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets-user/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets-user/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- apexcharts -->
        <script src="{{ asset('assets-user/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- dashboard init -->
        <script src="{{ asset('assets-user/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets-user/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        <script>
            var notyf = new Notyf({
                ripple: true,
                position: {x:'right',y:'top'}
            });
        </script>
        @yield('script')
    </body>
</html>