<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!-- PAGE TITLE HERE -->
	<title>AlbaProtein Office | @yield('title')</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('logo/favicon.png') }}">
	
	<link href="{{ asset('assets-office/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets-office/vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets-office/cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css') }}">
	<link href="{{ asset('assets-office/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets-office/vendor/jvmap/jquery-jvectormap.css') }}" rel="stylesheet">
	<link href="{{ asset('assets-office/cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets-office/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
	
	<!-- tagify-css -->
	<link href="{{ asset('assets-office/vendor/tagify/dist/tagify.css') }}" rel="stylesheet">
	
	<!-- Style css -->
    <link href="{{ asset('assets-office/css/style.css') }}" rel="stylesheet">
	<script src="https://unpkg.com/feather-icons"></script>
	@yield('style')
	
</head>
<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header" style="background-color: #C10000;">
            <a href="{{ URL::to('office/dashboard') }}" class="brand-logo">
				<img src="{{ asset('logo/logo-white.png') }}" style="height: 40px;">
            </a>
            <div class="nav-control" style="background-color: #CA3B3B">
                <div class="hamburger">
                    <span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
		<div class="header" style="background-color: #C10000;">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item align-items-center header-border"><a href="{{ URL::to('office/logout') }}" class="btn btn-danger btn-sm" style="background-color:#CA3B3B !important;border-color: #CA3B3B !important">Logout</a></li>	
							<li class="nav-item ps-3">
								<div class="dropdown header-profile2">
										<div class="header-info2 d-flex align-items-center" style="margin-top: 9px;">
											<div class="header-media">
												<img src="{{ asset('uploads/' . Auth::user()->profile_pic) }}" alt="" style="height: 30px;width: 30px;object-fit: cover;">
											</div>
											<div class="header-info">
												<h6>{{ Auth::user()->name }}</h6>
												<p>{{ Auth::user()->email }}</p>
											</div>
											
										</div>
									</a>
								</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<li><a href="{{ URL::to('office/dashboard') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="home"></i>
						</div>	
						<span class="nav-text">Dashboard</span>
						</a>
					</li>
					<li><a href="{{ URL::to('office/add-user') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="user-plus"></i>
						</div>	
						<span class="nav-text">Create User</span>
						</a>
					</li>
					<li><a href="{{ URL::to('office/users') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="users"></i>
						</div>	
						<span class="nav-text">Users</span>
						</a>
					</li>
					<li><a href="{{ URL::to('office/promos') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="gift"></i>
						</div>	
						<span class="nav-text">Promo Cash</span>
						</a>
					</li>
					<li><a href="{{ URL::to('office/packages') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="package"></i>
						</div>	
						<span class="nav-text">Packages</span>
						</a>
					</li>
					<li><a href="{{ URL::to('office/active-packages') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="check-circle"></i>
						</div>	
						<span class="nav-text">Active Packages</span>
						</a>
					</li>
					{{-- <li><a href="{{ URL::to('office/withdraw/create') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="send"></i>
						</div>	
						<span class="nav-text">New Withdraw</span>
						</a>
					</li> --}}
					<li><a href="{{ URL::to('office/withdraws/all') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="send"></i>
						</div>	
						<span class="nav-text">Withdrawas</span>
						</a>
					</li>
					<li><a href="{{ URL::to('office/withdraws/pending') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="alert-circle"></i>
						</div>	
						<span class="nav-text">Pending Withdrawas</span>
						</a>
					</li>
					{{-- <li><a href="{{ URL::to('office/withdraws/completed') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="send"></i>
						</div>	
						<span class="nav-text">Completed Withdrawas</span>
						</a>
					</li>
					<li><a href="{{ URL::to('office/withdraws/declined') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="send"></i>
						</div>	
						<span class="nav-text">Declined Withdrawas</span>
						</a>
					</li> --}}
					<li><a href="{{ URL::to('office/settings') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="settings"></i>
						</div>	
						<span class="nav-text">Settings</span>
						</a>
					</li>
					<li><a href="{{ URL::to('office/logout') }}" aria-expanded="false">
						<div class="menu-icon">
							<i data-feather="log-out"></i>
						</div>	
						<span class="nav-text">Logout</span>
						</a>
					</li>
				</ul>
			</div>
        </div>
		
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        @yield('content')

        <!--**********************************
            Content body end
        ***********************************-->
		
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
               <p>Copyright © Developed by <a href="#" target="_blank">AlbaProtein</a> All Rights Reserved{{ date('Y') }}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets-office/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('assets-office/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('assets-office/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('assets-office/vendor/apexchart/apexchart.js') }}"></script>
	
	<!-- Dashboard 1 -->
	
	
	
	<!-- tagify -->
	<script src="{{ asset('assets-office/vendor/tagify/dist/tagify.js') }}"></script>
	 
	<script src="{{ asset('assets-office/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets-office/vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('assets-office/vendor/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('assets-office/vendor/datatables/js/jszip.min.js') }}"></script>
	<script src="{{ asset('assets-office/js/plugins-init/datatables.init.js') }}"></script>
   
	<!-- Apex Chart -->
	
	<script src="{{ asset('assets-office/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
	<script src="{{ asset('assets-office/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
	

	<!-- Vectormap -->
    <script src="{{ asset('assets-office/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets-office/vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets-office/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('assets-office/js/custom.js') }}"></script>
	<script src="{{ asset('assets-office/js/deznav-init.js') }}"></script>
	<script src="{{ asset('assets-office/js/demo.js') }}"></script>
	<script>
		feather.replace();
		const apiUrl = 'http://127.0.0.1:8000/api/';
		$(function(){
			$(".feather").css('height', '15px');
		});
	</script>
	@yield('script')
</body>

</html>