<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- PAGE TITLE HERE -->
    <title>AlbaProtien Office | Login</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo/favicon.png') }}">
    <link href="{{ asset('assets-office/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-office/css/style.css') }}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="page-wraper">

        <!-- Content -->
        <div class="browse-job login-style3">
            <!-- Coming Soon -->
            <div class="bg-img-fix overflow-hidden"
                style="background:#fff url({{ asset('assets/pic-7.jpg') }}); height: 100vh;background-size: cover;background-repeat: no-repeat;background-position: center;background-attachment: fixed;">
                <div class="row gx-0">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                            style="max-height: 653px;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                                dir="ltr">
                                <div class="login-form style-2">
                                    <div class="card-body">
                                        <div class="logo-header">
                                            <a href="#" class="logo"><img src="{{ asset('logo/logo.png') }}"
                                                    alt="" class="width-230 light-logo"
                                                    style="height: 100px;margin: auto;"></a>
                                            <a href="#" class="logo"><img src="{{ asset('logo/logo.png') }}"
                                                    alt="" class="width-230 dark-logo"
                                                    style="height: 100px;margin: auto;"></a>
                                        </div>
                                        <nav>
                                            <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                                                <div class="tab-content w-100" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-personal"
                                                        role="tabpanel" aria-labelledby="nav-personal-tab">
                                                        <form action="{{ URL::to('admin/login') }}" method="POST"
                                                            class=" dz-form pb-3" autocomplete="off">
                                                            @csrf
                                                            <h3 class="form-title m-t0">Login Information</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-danger style-liner"></div>
                                                            </div>
                                                            <p>Enter your e-mail address and your password. </p>
                                                            @if (Session::has('error'))
                                                                <div
                                                                    class="alert alert-danger alert-dismissible fade show">
                                                                    <svg viewBox="0 0 24 24" width="24"
                                                                        height="24" stroke="currentColor"
                                                                        stroke-width="2" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="me-2">
                                                                        <polygon
                                                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                        </polygon>
                                                                        <line x1="15" y1="9"
                                                                            x2="9" y2="15"></line>
                                                                        <line x1="9" y1="9"
                                                                            x2="15" y2="15"></line>
                                                                    </svg>
                                                                    {{ Session::get('error') }}
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert" aria-label="btn-close">
                                                                    </button>
                                                                </div>
                                                            @endif
                                                            <div class="form-group mb-3">
                                                                <input type="email" class="form-control"
                                                                    name="email" value="{{ old('email') }}"
                                                                    placeholder="Your Email">
                                                                @error('email')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <input type="password" class="form-control"
                                                                    name="password" value=""
                                                                    placeholder="Your Password">
                                                                @error('password')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group text-left mb-5 forget-main">
                                                                <button type="submit" class="btn btn-danger">Sign Me
                                                                    In</button>
                                                                {{-- <button
                                                                    class="nav-link m-auto btn tp-btn-light btn-danger forget-tab "
                                                                    id="nav-forget-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#nav-forget" type="button"
                                                                    role="tab" aria-controls="nav-forget"
                                                                    aria-selected="false">Forget Password ?</button> --}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </nav>
                                    </div>
                                    <div class="card-footer">
                                        <div class=" bottom-footer clearfix m-t10 m-b20 row text-center">
                                            <div class="col-lg-12 text-center">
                                                <span> © Copyright
                                                    <a href="{{ URL::to('/') }}">AlbaProtein </a> All rights
                                                    reserved.</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="mCSB_1_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                                style="display: block;">
                                <div class="mCSB_draggerContainer">
                                    <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                        style="position: absolute; min-height: 0px; display: block; height: 652px; max-height: 643px; top: 0px;">
                                        <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Full Blog Page Contant -->
        </div>
        <!-- Content END-->
    </div>

    <!--**********************************
 Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets-office/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets-office/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets-office/js/deznav-init.js') }}"></script>
    <script src="{{ asset('assets-office/js/custom.js') }}"></script>
    <script src="{{ asset('assets-office/js/demo.js') }}"></script>
</body>

</html>
