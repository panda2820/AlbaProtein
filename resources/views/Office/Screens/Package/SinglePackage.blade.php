<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- PAGE TITLE HERE -->
	<title>AlbaProtein Office | Package Details</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('logo/favicon.png') }}">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<!-- Style css -->
    <link href="{{ asset('assets-office/css/style.css') }}" rel="stylesheet">
	<script src="https://unpkg.com/feather-icons"></script>
</head>
<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header" style="background-color: #C10000;">
            <a href="{{ URL::to('office/dashboard') }}" class="brand-logo">
				<img src="{{ asset('logo/logo-white.png') }}" style="height: 40px;">
            </a>
        </div>
		<div class="header" style="background-color: #C10000;">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item align-items-center header-border"><a href="#" class="btn btn-danger btn-sm" style="background-color:#CA3B3B !important;border-color: #CA3B3B !important">Close Invoice</a></li>	
							<li class="nav-item ps-3">
								<div class="dropdown header-profile2">
									<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<div class="header-info2 d-flex align-items-center">
											<div class="header-media">
												<img src="{{ asset('uploads/' . $active_package->user->profile_pic) }}" alt="">
											</div>
											<div class="header-info">
												<h6>{{ $active_package->user->name }}</h6>
												<p>{{ $active_package->user->email }}</p>
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
        <div class="content" style="padding: 100px 50px">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="margin-top: 10px;padding: 10px">
                    <div style="background: #F4F4F4;border-radius: 10px;">
                        <table class="table">
                            <tr>
                                <th>Package Details</th>
                                <td>{{ $active_package->package->name }} - {{ $active_package->package->type == 1 ? ($active_package->total_invested / $active_package->price_per_kg) : $active_package->package->meat_kgs }} KGs</td>
                            </tr>
                            <tr>
                                <th>Price Per KG</th>
                                <td>PKR {{ number_format($active_package->price_per_kg) }}</td>
                            </tr>
                            <tr>
                                <th>Total Investment</th>
                                <td>PKR {{ number_format($active_package->total_invested) }}</td>
                            </tr>
                            @if($active_package->package->type == 1)
                            <tr>
                                <th>Total Return on Investment</th>
                                <td>{{ $active_package->profit_per_kg }}%</td>
                            </tr>
                            <tr>
                                <th>Total Return on Investment</th>
                                <td>PKR {{ $active_package->per_day_profit }}</td>
                            </tr>
                            @else
                            <tr>
                                <th>Profit Per KG</th>
                                <td>PKR {{ $active_package->profit_per_kg }}</td>
                            </tr>
                            <tr>
                                <th>Profit Per Day</th>
                                <td>PKR {{ $active_package->per_day_profit }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Total Days</th>
                                <td>{{ $active_package->total_days }} Day(s)</td>
                            </tr>
                            <tr>
                                <th>Completed Days</th>
                                <td>{{ $active_package->completed_days }} Day(s)</td>
                            </tr>
                            <tr>
                                <th>Remaining Days</th>
                                <td>{{ $active_package->remaining_days }} Day(s)</td>
                            </tr>
                            <tr>
                                <th>Total Return</th>
                                <td>PKR {{ number_format($active_package->total_return) }}</td>
                            </tr>
                            <tr>
                                <th>Started On</th>
                                <td>{{ $active_package->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Expires On</th>
                                <td>{{ $active_package->expire_on }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="footer">
            <div class="copyright">
               <p>Copyright © Developed by <a href="#" target="_blank">AlbaProtein</a> All Rights Reserved{{ date('Y') }}</p>
            </div>
        </div>
	</div>
    <!-- Required vendors -->
    <script src="{{ asset('assets-office/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('assets-office/vendor/chart.js/Chart.bundle.min.js') }}"></script>

	<!-- Vectormap -->
    <script src="{{ asset('assets-office/js/custom.js') }}"></script>
	<script src="{{ asset('assets-office/js/deznav-init.js') }}"></script>
	<script src="{{ asset('assets-office/js/demo.js') }}"></script>
	<script>
		feather.replace();
	</script>
</body>
</html>