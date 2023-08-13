<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 May 2023 13:30:07 GMT -->

<head>
    <!--  Title -->
    <title>Login | AlbaProtein</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="AlbaProtein" />
    <meta name="author" content="" />
    <meta name="keywords" content="AlbaProtein" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" href="{{ asset('logo/favicon.png') }}">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{asset('dist/css/style.min.css')}}" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{asset('logo/favicon.png')}}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{asset('logo/favicon.png')}}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href="{{ URL::to('user/login') }}" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="{{asset('logo/logo.png')}}" width="180" alt="">
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(65vh - 80px);">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h2 class="mb-3 fs-7 fw-bolder">Welcome to AlbaProtein</h2>
                            <p class=" mb-9">Your office Login</p>
                            <div class="row">
                                <div class="col-6 mb-2 mb-sm-0">
                                    <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/google-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>Google
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/facebook-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>FB
                                    </a>
                                </div>
                            </div>
                            <div class="position-relative text-center my-4">
                                <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">or sign in with</p>
                                <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                            </div>
                            <form action="{{ URL::to('office/login') }}" method="POST" class=" dz-form pb-3" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="Enter Email"">
                                    @error('email')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label  class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                    @error('password')
                                    <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">

                                    </div>
                                    <a class="text-primary fw-medium" href="{{ URL::to('user/forgot-password') }}">Forgot Password ?</a>
                                </div>
                                <!-- <a href="{{ URL::to('user/dashboard') }}" class="btn btn-primary w-100 py-8 mb-4 rounded-2" type="submit">Sign In</a> -->
                                <button class="btn btn-primary w-100 py-8 mb-4 rounded-2" type="submit">Sign In</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">New to AlbaProtein?</p>
                                    <a class="text-primary fw-medium ms-2" href="{{ URL::to('user/register') }}">Create an account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>

    <!--  Import Js Files -->
    <script src="{{asset('dist/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!--  core files -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('dist/js/app.init.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>

    <script src="{{asset('dist/js/custom.js')}}"></script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 May 2023 13:30:07 GMT -->

</html>