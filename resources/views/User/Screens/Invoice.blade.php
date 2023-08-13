<!doctype html>
<html lang="en">    
    <head>
            <meta charset="utf-8" />
            <title>Package Invoice | AlbaProtein</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="AlbaProtein" name="description" />
            <meta content="Themesbrand" name="author" />
            <!-- App favicon -->
            <link rel="shortcut icon" href="{{ asset('logo/favicon.png') }}">
            <!-- Bootstrap Css -->
            <link href="{{ asset('assets-user/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
            <!-- Icons Css -->
            <link href="{{ asset('assets-user/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
            <!-- App Css-->
            <link href="{{ asset('assets-user/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    </head>
    <body data-sidebar="dark" data-layout-mode="light">
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title mb-4">{{ $active_package->package->name }}</h4>
                                    <p class="font-16 text-muted mb-2"></p>
                                    <h5><a href="javascript: void(0);" class="text-dark">{{ $active_package->package->type == 1 ? ($active_package->total_invested / $active_package->price_per_kg) : $active_package->package->meat_kgs }} KGs - <span class="text-muted font-16">PKR {{ $active_package->price_per_kg }}</span> </a></h5>
                                </div>
                                <div class="row mt-3">
                                    <h4 class="card-title mb-4">Subscriber Information</h4>
                                    <div class="col-6">
                                        <table class="table">
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $active_package->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone / Account ID</th>
                                                <td>{{ $active_package->user->email }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <h4 class="card-title mb-4">Package Information</h4>
                                    <div class="col-12">
                                        <table class="table">
                                            <tr>
                                                <th>Total Investment</th>
                                                <td>PKR {{ number_format($active_package->total_invested) }}</td>
                                            </tr>
                                            <tr>
                                                <th>OFFICE ID</th>
                                                <td>{{ $active_package->office->office_code }}</td>
                                            </tr>
                                            @if($active_package->package->type == 1)
                                            <tr>
                                                <th>Total Return on Investment</th>
                                                <td>{{ $active_package->profit_per_kg }}%</td>
                                            </tr>
                                            <tr>
                                                <th>Total Return on Investment</th>
                                                <td>PKR {{ number_format($active_package->per_day_profit) }}</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <th>Profit Per KG</th>
                                                <td>PKR {{ $active_package->profit_per_kg }}</td>
                                            </tr>
                                            <tr>
                                                <th>Profit Per Day</th>
                                                <td>PKR {{ number_format($active_package->per_day_profit) }}</td>
                                            </tr>
                                            @endif
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
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3">
                                                <span class="avatar-title rounded-circle bg-primary font-size-16">
                                                        <i class="bx bx-hourglass text-white"></i>
                                                    </span>
                                            </div>
                                            <h5 class="font-size-15">Total Days</h5>
                                            <p class="text-muted mb-0">{{ $active_package->total_days }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3">
                                                <span class="avatar-title rounded-circle bg-info font-size-16">
                                                        <i class="bx bx-happy-alt text-white"></i>
                                                    </span>
                                            </div>
                                            <h5 class="font-size-15">Completed</h5>
                                            <p class="text-muted mb-0">{{ $active_package->completed_days }}</p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3">
                                                <span class="avatar-title rounded-circle bg-pink font-size-16">
                                                    <i class="bx bx-meh-alt text-white"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-15">Remaining Days</h5>
                                            <p class="text-muted mb-0">{{ $active_package->remaining_days }}</p>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets-user/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets-user/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('assets-user/js/app.js') }}"></script>
    </body>
</html>