@extends('User.Layouts.AuthLayout')
@section('title', 'Login')
@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-5 col-xxl-12">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h2 class="mb-3 fs-7 fw-bolder">Welcome to AlbaProtein</h2>
                            <p class=" mb-9">Your User Login</p>
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
                            <form class="needs-validation" method="POST" action="{{ URL::to('/user/login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter Email"">
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
@endsection