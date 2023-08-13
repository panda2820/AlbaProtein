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
							<li class="nav-item align-items-center header-border"><a href="#" class="btn btn-danger btn-sm" style="background-color:#CA3B3B !important;border-color: #CA3B3B !important">Logout</a></li>	
							<li class="nav-item ps-3">
								<div class="dropdown header-profile2">
									<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<div class="header-info2 d-flex align-items-center">
											<div class="header-media">
												<img src="{{ asset('uploads/' . Auth::user()->profile_pic) }}" alt="">
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
		const apiUrl = '//albaprotein.com/api/';
	</script>
	@yield('script')
</body>

</html>