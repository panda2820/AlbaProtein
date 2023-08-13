<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | AlbaProtein</title>
    <meta name="description" content="FasTrans - Logistics & Delivery Company HTML template">
    <meta name="keywords" content="cargo, clean, contractor, corporate, freight, industry, localization, logistics, page builder, shipment, transport, transportation, truck, trucking">
    <meta name="author" content="Themexriver">
    <link rel="shortcut icon" href="{{ asset('logo/favicon.png') }}" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/video.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rs6.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div id="preloader"></div>
    <div class="up">
        <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
    </div>
    <!-- Start of header section
    ============================================= -->
    <header id="ft-header" class="ft-header-section header-style-two">
        <div class="ft-header-main-menu-wrapper">
            <div class="container">
                <div class="ft-header-main-menu-area position-relative">
                    <div class="ft-header-main-menu d-flex align-items-center justify-content-between position-relative">
                        <div class="ft-site-logo-area">
                            <div class="ft-site-logo position-relative">
                                <a href="{{ URL::to('/') }}"><img src="{{ asset('logo/logo-white.png') }}" style="height: 50px;" alt=""></a>
                            </div>
                        </div>
                        <div class="ft-main-navigation-area">
                            <nav class="ft-main-navigation clearfix ul-li">
                                <ul id="ft-main-nav" class="nav navbar-nav clearfix">
                                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                                    <li><a href="{{ URL::to('/') }}">Our Locations</a></li>
                                    <li><a href="{{ URL::to('/') }}">About</a></li>
                                    <li><a href="{{ URL::to('/') }}">Contact US</a></li>
                                </ul>
                            </nav>
                        </div>
                        @if(Auth::check())
                            @if(Auth::user()->user_type == 0)
                            <div class="ft-header-cta-btn">
                                <a class="d-flex justify-content-center align-items-center" href="{{ URL::to('/user/login') }}">Dashboard</a>
                            </div>
                            @elseif(Auth::user()->user_type == 1)
                            <div class="ft-header-cta-btn">
                                <a class="d-flex justify-content-center align-items-center" href="{{ URL::to('/office/login') }}">Dashboard</a>
                            </div>
                            @elseif(Auth::user()->user_type == 2)
                            <div class="ft-header-cta-btn">
                                <a class="d-flex justify-content-center align-items-center" href="{{ URL::to('/admin/login') }}">Dashboard</a>
                            </div>
                            @endif
                        @else
                        <div class="ft-header-cta-btn">
                            <a class="d-flex justify-content-center align-items-center" href="{{ URL::to('/user/login') }}">Login</a>
                        </div>
                        @endif
                    </div>
                    <div class="mobile_menu position-relative">
                        <div class="mobile_menu_button open_mobile_menu">
                            <i class="fal fa-bars"></i>
                        </div>
                        <div class="mobile_menu_wrap">
                            <div class="mobile_menu_overlay open_mobile_menu"></div>
                            <div class="mobile_menu_content">
                                <div class="mobile_menu_close open_mobile_menu">
                                    <i class="fal fa-times"></i>
                                </div>
                                <div class="m-brand-logo">
                                    <a href="{{ URl::to('/') }}"><img src="{{ asset('logo/logo.png') }}" alt=""></a>
                                </div>
                                <nav class="mobile-main-navigation  clearfix ul-li">
                                    <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                                        <li><a href="{{ URL::to('/') }}">Home</a></li>
                                        <li><a href="{{ URL::to('/') }}">Our Locations</a></li>
                                        <li><a href="{{ URL::to('/') }}">About</a></li>
                                        <li><a href="{{ URL::to('/') }}">Contact Us</a></li>
                                        @if(Auth::check())
                                            @if(Auth::user()->user_type == 0)
                                            <li><a href="{{ URL::to('/user/login') }}">Dashboard</a></li>
                                            @elseif(Auth::user()->user_type == 1)
                                            <li><a href="{{ URL::to('/office/login') }}">Dashboard</a></li>
                                            @elseif(Auth::user()->user_type == 2)
                                            <li><a href="{{ URL::to('/admin/login') }}">Dashboard</a></li>
                                            @endif
                                        @else
                                        <li><a href="{{ URL::to('/user/login') }}">Login</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- /Mobile-Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of header section
    ============================================= -->

    <!-- Start of banner section
    ============================================= -->
    <section id="ft-banner" class="ft-banner-section"  data-background="{{ asset('assets/img/bg/slider-bg.jpg') }}">
        <div class="ft-banner-content">
            <div class="container">
                <div class="ft-banner-text-content headline pera-content text-center" style="max-width: none;">
                    <h1 class="cd-headline letters scale">Trading Makes You
                        <span class="cd-words-wrapper">
                            <b class="is-visible">Strong</b>
                            <b>Wealthy</b>
                            <b>Rich</b>
                        </span></h1>
                        <p> Start Trading with Albaprotein and earn regular profits.  </p>
                        <div class="ft-banner-btn-wrapper d-flex justify-content-center align-items-center">
                            <div class="ft-banner-btn">
                                <a class="d-flex justify-content-center align-items-center" href="{{ URl::to('user/login') }}">Get Started</a>
                            </div>
                            <div class="ft-banner-video-btn">
                                <a class="video_box" href="{{ asset('assets/video.mp4') }}">
                                    <i class="fas fa-play"></i>
                                    <span>How It Work</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- End of banner section
    ============================================= -->	

    <!-- Start of featured section
    ============================================= -->
    <section id="ft-featured" class="ft-featured-section">
        <div class="container">
            <div class="ft-section-title-2 headline pera-content text-center">
                <span class="sub-title">Featured</span>
                <h2>The unique qualities that make
                    <span>FasTrans</span> special.
                </h2>
            </div>
            <div class="ft-featured-content">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="ft-featured-innerbox position-relative">
                            <div class="ft-featured-icon">
                                <i class="flaticon-pricing"></i>
                            </div>
                            <div class="ft-featured-text headline pera-content">
                                <h3><a href="#">Quick Trading Solutions</a></h3>
                                <p>AlbaProtein provides you quick trading solutions</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="ft-featured-innerbox position-relative">
                            <div class="ft-featured-icon">
                                <i class="flaticon-deadline"></i>
                            </div>
                            <div class="ft-featured-text headline pera-content">
                                <h3><a href="#">Real Time Tracking</a></h3>
                                <p>AlbaProtein allows to track Your tradings anytime everywhere</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="ft-featured-innerbox position-relative">
                            <div class="ft-featured-icon">
                                <i class="flaticon-warehouse"></i>
                            </div>
                            <div class="ft-featured-text headline pera-content">
                                <h3><a href="#">Trading Profits</a></h3>
                                <p>Trading with AlbaProtein give you profits regularly and track your tradings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of featured section
    ============================================= -->

    <!-- Start of Service section
    ============================================= -->
    <section id="ft-service-2" class="ft-service-section-2 position-relative">
        <span class="ft-service-bg position-absolute"> <img src="{{ asset('assets/img/bg/ser-bg.png') }}" alt=""></span>
        <div class="container">
            <div class="ft-section-title-2 headline pera-content text-center">
                <span class="sub-title">What We Do</span>
                <h2>We are optimists who Love 
                    to work together.
                </h2>
            </div>
            <div class="ft-service-content-2">
                <div class="ft-service-slider-2">
                    <div class="ft-item-innerbox">
                        <div class="ft-service-innerbox-2 position-relative">
                            <div class="ft-service-img text-center">
                                <img src="{{ asset('assets/img/service/ser4.3.jpg') }}" alt="">
                            </div>
                            <div class="ft-service-text position-relative headline">
                                <div class="ft-service-icon position-absolute d-flex align-items-center justify-content-center">
                                    <i class="flaticon-free-shipping"></i>
                                </div>
                                <h3><a href="#">Road Freight</a></h3>
                                <div class="ft-btn-2">
                                    <a href="#">
                                        <i class="icon-first flaticon-right-arrow"></i>
                                        <span>Read More</span>
                                    </a>
                                </div>
                            </div>
                            <div class="ft-service-serial position-absolute">
                                1
                            </div>
                        </div>
                    </div>
                    <div class="ft-item-innerbox">
                        <div class="ft-service-innerbox-2 position-relative">
                            <div class="ft-service-img text-center">
                                <img src="{{ asset('assets/img/service/ser4.4.jpg') }}" alt="">
                            </div>
                            <div class="ft-service-text position-relative headline">
                                <div class="ft-service-icon position-absolute d-flex align-items-center justify-content-center">
                                    <i class="flaticon-boat"></i>
                                </div>
                                <h3><a href="#">Ocean Freight</a></h3>
                                <div class="ft-btn-2">
                                    <a href="#">
                                        <i class="icon-first flaticon-right-arrow"></i>
                                        <span>Read More</span>
                                    </a>
                                </div>
                            </div>
                            <div class="ft-service-serial position-absolute">
                                2
                            </div>
                        </div>
                    </div>
                    <div class="ft-item-innerbox">
                        <div class="ft-service-innerbox-2 position-relative">
                            <div class="ft-service-img text-center">
                                <img src="{{ asset('assets/img/service/ser4.2.jpg') }}" alt="">
                            </div>
                            <div class="ft-service-text position-relative headline">
                                <div class="ft-service-icon position-absolute d-flex align-items-center justify-content-center">
                                    <i class="flaticon-plane"></i>
                                </div>
                                <h3><a href="#">Cargo Freight</a></h3>
                                <div class="ft-btn-2">
                                    <a href="#">
                                        <i class="icon-first flaticon-right-arrow"></i>
                                        <span>Read More</span>
                                    </a>
                                </div>
                            </div>
                            <div class="ft-service-serial position-absolute">
                                3
                            </div>
                        </div>
                    </div>
                    <div class="ft-item-innerbox">
                        <div class="ft-service-innerbox-2 position-relative">
                            <div class="ft-service-img text-center">
                                <img src="{{ asset('assets/img/service/ser4.jpg') }}" alt="">
                            </div>
                            <div class="ft-service-text position-relative headline">
                                <div class="ft-service-icon position-absolute d-flex align-items-center justify-content-center">
                                    <i class="flaticon-train"></i>
                                </div>
                                <h3><a href="#">Air Freight</a></h3>
                                <div class="ft-btn-2">
                                    <a href="#">
                                        <i class="icon-first flaticon-right-arrow"></i>
                                        <span>Read More</span>
                                    </a>
                                </div>
                            </div>
                            <div class="ft-service-serial position-absolute">
                                4
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Service section
    ============================================= -->

    <!-- Start of About section
    ============================================= -->
    <section id="ft-about-2" class="ft-about-section-2">
        <div class="container">
            <div class="ft-about-content-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ft-about-text-wrapper-2">
                            <div class="ft-section-title-2 headline pera-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <span class="sub-title">About Company</span>
                                <h2>The Best Solutions for 
                                    <span>Trading</span>
                                </h2>
                                <p>Here at Albaprotein, We export large amount of vegetables & meat including Beaf, Mutton and Fish to the Arab Countries. We purchase meat from Pakistan and export in large quantity. You can be our partner by trading in our business. Here are the list of countries where we export.</p>
                            </div>
                            <div class="ft-about-feature-wrapper-2">
                                <div class="row">
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms" style="padding: 5px">
                                        <div class="ft-about-feature-list-item d-flex align-items-center" style="justify-content: center;">
                                            <div class="ft-about-feature-text headline pera-content">
                                                <h3 style="padding:0px">UAE</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms" style="padding: 5px">
                                        <div class="ft-about-feature-list-item d-flex align-items-center" style="justify-content: center;">
                                            <div class="ft-about-feature-text headline pera-content">
                                                <h3 style="padding:0px">Saudi Arabia</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms" style="padding: 5px">
                                        <div class="ft-about-feature-list-item d-flex align-items-center" style="justify-content: center;">
                                            <div class="ft-about-feature-text headline pera-content">
                                                <h3 style="padding:0px">Qatar</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms" style="padding: 5px">
                                        <div class="ft-about-feature-list-item d-flex align-items-center" style="justify-content: center;">
                                            <div class="ft-about-feature-text headline pera-content">
                                                <h3 style="padding:0px">Kuwait</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms" style="padding: 5px">
                                        <div class="ft-about-feature-list-item d-flex align-items-center" style="justify-content: center;">
                                            <div class="ft-about-feature-text headline pera-content">
                                                <h3 style="padding:0px">Bahrain</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms" style="padding: 5px">
                                        <div class="ft-about-feature-list-item d-flex align-items-center" style="justify-content: center;">
                                            <div class="ft-about-feature-text headline pera-content">
                                                <h3 style="padding:0px">Oman</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ft-btn-3">
                                    <a class="d-flex justify-content-center align-items-center" href="about.html">Explore More <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="ft-about-img-2-wrapper position-relative">
                            <span class="ft-about-shape1 position-absolute"><img src="{{ asset('assets/img/shape/ab-sh1.png') }}" alt=""></span>
                            <span class="ft-about-shape2 position-absolute"><img src="{{ asset('assets/img/shape/ab-sh2.png') }}" alt=""></span>
                            <div class="ft-about-img-2">
                                <img src="{{ asset('assets/pic-11.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of About section
    ============================================= -->		

    <!-- Start of Experience section
    ============================================= -->
    <section id="ft-experience" class="ft-experience-section">
        <div class="container">
            <div class="ft-experience-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ft-experience-text">
                            <div class="ft-section-title-2 headline pera-content">
                                <span class="sub-title">Experience</span>
                                <h2>Global Shipping Partner
                                    To World’s  Famous Companies
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ft-experience-circle-progress">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="counter-boxed text-center headline position-relative">
                                        <div class="graph-outer">
                                            <input type="text" class="dial" data-fgColor="#f22728" data-bgColor="#fff" data-width="80" data-height="80" data-linecap="round"  value="95" >
                                            <div class="inner-text count-box"><span class="count-text" data-stop="95" data-speed="3500"></span>%</div>
                                        </div>
                                        <h3>Warehousing</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="counter-boxed text-center headline position-relative">
                                        <div class="graph-outer">
                                            <input type="text" class="dial" data-fgColor="#f22728" data-bgColor="#fff" data-width="80" data-height="80" data-linecap="round"  value="85" >
                                            <div class="inner-text count-box"><span class="count-text" data-stop="85" data-speed="3500"></span>%</div>
                                        </div>
                                        <h3>Oceann Freight</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="counter-boxed text-center headline position-relative">
                                        <div class="graph-outer">
                                            <input type="text" class="dial" data-fgColor="#f22728" data-bgColor="#fff" data-width="80" data-height="80" data-linecap="round"  value="90" >
                                            <div class="inner-text count-box"><span class="count-text" data-stop="90" data-speed="3500"></span>%</div>
                                        </div>
                                        <h3>Air Freight</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </section>
    <!-- End of Experience section
    ============================================= -->

    <!-- Start of Project section
    ============================================= -->
    <section id="ft-portfolio-2" class="ft-portfolio-section-2 position-relative">
        <div class="ft-section-title-2 headline pera-content text-center">
            <span class="sub-title">Project</span>
            <h2>Let's Checkout our All
                Latest Project
            </h2>
        </div>
        <div class="ft-portfolio-content-2">
            <div class="ft-portfolio-slider-2">
                <div class="ft-portfolio-slider-item">
                    <div class="ft-portfolio-slider-innerbox position-relative">
                        <div class="ft-portfolio-img">
                            <img src="{{ asset('assets/service-1.jpg') }}" alt="" style="height: 500px;object-fit: cover">
                        </div>
                        <div class="ft-portfolio-text headline headline pera-content">
                            <h3><a href="#">Frozen Fish & Sea Food</a></h3>
                            <div class="ft-btn-3">
                                <a class="d-flex justify-content-center align-items-center" href="#">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ft-portfolio-slider-item">
                    <div class="ft-portfolio-slider-innerbox position-relative">
                        <div class="ft-portfolio-img">
                            <img src="{{ asset('assets/service-2.jpg') }}" alt="" style="height: 500px;object-fit: cover">
                        </div>
                        <div class="ft-portfolio-text headline headline pera-content">
                            <h3><a href="#">Frozen Meat (Beef & Mutton)</a></h3>
                            <div class="ft-btn-3">
                                <a class="d-flex justify-content-center align-items-center" href="#">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ft-portfolio-slider-item">
                    <div class="ft-portfolio-slider-innerbox position-relative">
                        <div class="ft-portfolio-img">
                            <img src="{{ asset('assets/service-3.jpg') }}" alt="" style="height: 500px;object-fit: cover">
                        </div>
                        <div class="ft-portfolio-text headline headline pera-content">
                            <h3><a href="#">Fruits & Vegetables</a></h3>
                            <div class="ft-btn-3">
                                <a class="d-flex justify-content-center align-items-center" href="#">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ft-portfolio-slider-item">
                    <div class="ft-portfolio-slider-innerbox position-relative">
                        <div class="ft-portfolio-img">
                            <img src="{{ asset('assets/service-4.jpg') }}" alt="" style="height: 500px;object-fit: cover">
                        </div>
                        <div class="ft-portfolio-text headline headline pera-content">
                            <h3><a href="#">Dairy Products</a></h3>
                            <div class="ft-btn-3">
                                <a class="d-flex justify-content-center align-items-center" href="#">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Project section
    ============================================= -->
    
    <!-- Start of FAQ why choose  section
    ============================================= -->
    <section id="ft-faq-why-choose-us" class="ft-faq-why-choose-us-section">
        <div class="container">
            <div class="ft-faq-why-choose-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ft-faq-content">
                            <div class="ft-section-title-2 headline pera-content">
                                <span class="sub-title">Why Choose AlbaProtein</span>
                                <h2>Few Reason Why You Should Choose Us</h2>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item headline pera-content">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Where Pakistan ranks in exporting meat?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Pakistan ranks 19th as the biggest meat exporter in the world with exports of over $400 million.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline pera-content">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            What is the net worth of exporting meat?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            The export of live animals and other livestock products earned a value of $303.468 million during 2015-16.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline pera-content">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            What is the annual growth of this sector?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            This sector is constantly registering at an optimistic real growth rate at the rate of 4%, annually.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item headline pera-content">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            How much Pakistan Meat is exported?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Approximately, 80% of Pakistan's Halal meat production is exported to the Gulf Countries and Middle East, in which Saudi Arabia and the UAE.
                                        </div>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ft-why-choose-content-2">
                            <div class="ft-section-title-2 headline pera-content wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <h2>Export to UAE</h2>
                            </div>
                            <div class="ft-why-choose-feature-wrapper-2">
                                <div class="row">
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <div class="ft-why-choose-feature-list-item-2">
                                            <div class="ft-why-choose-feature-text headline pera-content">
                                                <p>The country pro Pakistan has capability to become internation competitor in halal meat industory.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <div class="ft-why-choose-feature-list-item-2">
                                            <div class="ft-why-choose-feature-text headline pera-content">
                                                <p>Beef is the prime traded product as the country ranked among the top 20 meat exporters in the world.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <div class="ft-why-choose-feature-list-item-2">
                                            <div class="ft-why-choose-feature-text headline pera-content">
                                                <p>Pakistan has the second largest Beffalo population in the world.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>						
    <!-- End of FAQ why choose  section
    ============================================= -->
    <section class="ft3-cta-section-two" style="background-image:url({{ asset('assets/images/background/9.jpg') }})">
		<div class="auto-container">
			<div class="content">
				<h3>Trading That Lead The <br> Way To Better Future.</h3>
				<a href="{{ URL::to('/user/login') }}" class="theme-btn read-more">Try Now <span class="fa fa-angle-right"></span></a>
			</div>
		</div>
	</section>
    <section class="ft1-steps-section" style="background-image:url({{ asset('assets/images/background/pattern-3.png') }})">
        <div class="auto-container">
            <div class="sec-title centered">
                <div class="title">Trading Process</div>
                <h2>Start Trading Simply</h2>
                <div class="text">Here is explained how you can Trade and earn profit</div>
            </div>
            <div class="inner-container">
                <div class="row clearfix">
                
                    <!-- Step Block -->
                    <div class="step-block col-lg-3 col-md-3 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="icon-outer">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/icons/create-account.png') }}" style="height: 40px;margin-top: -23px;margin-left: 10px;">
                                </div>
                            </div>
                            <h5>Create Account</h5>
                        </div>
                    </div>
                    
                    <div class="step-block col-lg-3 col-md-3 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="icon-outer">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/icons/location.png') }}" style="height: 40px;margin-top: -23px;margin-left: 10px;">
                                </div>
                            </div>
                            <h5>Find Nearnest Office</h5>
                        </div>
                    </div>
                    
                    <div class="step-block col-lg-3 col-md-3 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="icon-outer">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/icons/package.png') }}" style="height: 40px;margin-top: -23px;margin-left: 10px;">
                                </div>
                            </div>
                            <h5>Select Package</h5>
                        </div>
                    </div>
                    
                    <div class="step-block col-lg-3 col-md-3 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="icon-outer">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/icons/enjoy.png') }}" style="height: 40px;margin-top: -23px;margin-left: 10px;">
                                </div>
                            </div>
                            <h5>Enjoy Profit</h5>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Start of Footer   section
    ============================================= -->
    <footer id="ft-footer-2" class="ft-footer-section-2" data-background="{{ asset('assets/img/bg/f-bg.png') }}">
        <div class="ft-footer-newslatter position-relative">
            <div class="container">
                <div class="ft-footer-newslatter-content d-flex justify-content-between align-items-center flex-wrap">
                    <div class="ft-footer-newslatter-text headline">
                        <h2>Signup to our newsletter now.</h2>	
                    </div>
                    <div class="ft-footer-newslatter-form position-relative">
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="ft-footer-widget-wrapper-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ft-footer-widget ul-li-block headline pera-content">
                            <div class="logo-widget">
                                <div class="site-logo">
                                    <a href="#"><img src="{{ asset('logo/logo.png') }}" style="height: 100px" alt=""></a>
                                </div>
                                <div class="ft-footer-address">
                                    <span>Address: 27 Division St, New York, NY 10002, USA</span>
                                    <span>Email: info@albaprotein.com</span>
                                    <span>Phone: +8 (123) 152 25 45</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ft-footer-widget ul-li-block headline pera-content">
                            <div class="menu-widget">
                                <h3 class="widget-title">Our Services</h3>
                                <ul>
                                    <li><a href="#">Air Freight</a></li>
                                    <li><a href="#">Ocen Freight</a></li>
                                    <li><a href="#">Warehousing</a></li>
                                    <li><a href="#">Global stock transparency</a></li>
                                    <li><a href="#">Transport consolidation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ft-footer-widget ul-li-block headline pera-content">
                            <div class="menu-widget">
                                <h3 class="widget-title">Industry Sectors</h3>
                                <ul>
                                    <li><a href="#">Electronics Industry</a></li>
                                    <li><a href="#">Industrial & Manufacturing</a></li>
                                    <li><a href="#">Semicon & Solar</a></li>
                                    <li><a href="#">Oil & Gas Cargo</a></li>
                                    <li><a href="#">Energy & Chemicals</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ft-footer-widget ul-li-block headline pera-content">
                            <div class="menu-widget">
                                <h3 class="widget-title">Quick Links</h3>
                                <ul>
                                    <li><a href="#">How it Works</a></li>
                                    <li><a href="#">Help Link</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ft-footer-copywrite-2 text-center">
            <span>Copyright @ 2023 AlbaProtein.All Rights Reserved</span>
        </div>
    </footer>		
    <!-- End of FAQ why choose  section
    ============================================= -->


    <!-- For Js Library -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.filterizr.js') }}"></script>
    <script src="{{ asset('assets/js/rbtools.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cssslider.min.js') }}"></script>
    <script src="{{ asset('assets/js/rs6.min.js') }}"></script>
    <script src="{{ asset('assets/js/knob.js') }}"></script>
    <script src="{{ asset('assets/js/typer.js') }}"></script>
    <script>
        /* -----------------------------------------------------------------------------



        File:           JS Core
        Version:        1.0
        Last change:    00/00/00 
        -------------------------------------------------------------------------------- */
        (function() {

        "use strict";

        var FasTrans = {
            init: function() {
                this.Basic.init();  
            },

            Basic: {
                init: function() {

                    this.preloader();
                    this.BackgroundImage();
                    this.Animation();
                    this.StickyHeader();
                    this.MobileMenu();
                    this.scrollTop();
                    this.MainSlider();
                    this.searchPopUp();
                    this.counterUp();
                    this.PopUp();
                    this.CarouselSliderJs();
                    this.CircleProgress();
                    this.countDown();
                    this.HoverParallax();
                    this.MilesRange();

                    
                    
                },
                preloader: function (){
                    jQuery(window).on('load', function(){
                        jQuery('#preloader').fadeOut('slow',function(){jQuery(this).remove();});
                    })
                },
                BackgroundImage: function (){
                    $('[data-background]').each(function() {
                        $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
                    });
                },
                Animation: function (){
                    if($('.wow').length){
                        var wow = new WOW(
                        {
                            boxClass:     'wow',
                            animateClass: 'animated',
                            offset:       0,
                            mobile:       true,
                            live:         true
                        }
                        );
                        wow.init();
                    }
                },
                StickyHeader: function (){
                    jQuery(window).on('scroll', function() {
                        if (jQuery(window).scrollTop() > 250) {
                            jQuery('.ft-header-section, .pr-mark-main-header').addClass('sticky-on')
                        } else {
                            jQuery('.ft-header-section, .pr-mark-main-header').removeClass('sticky-on')
                        }
                    })
                },
                MobileMenu: function (){
                    $('.open_mobile_menu').on("click", function() {
                        $('.mobile_menu_wrap').toggleClass("mobile_menu_on");
                    });
                    $('.open_mobile_menu').on('click', function () {
                        $('body').toggleClass('mobile_menu_overlay_on');
                    });
                    if($('.mobile_menu li.dropdown ul').length){
                        $('.mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fas fa-caret-right"></span></div>');
                        $('.mobile_menu li.dropdown .dropdown-btn').on('click', function() {
                            $(this).prev('ul').slideToggle(500);
                        });
                    }
                    $(".dropdown-btn").on("click", function () {
                        $(this).toggleClass("toggle-open");
                    });
                },
                searchPopUp: function (){
                    if($('.search-box-outer').length) {
                        $('.search-box-outer').on('click', function() {
                            $('body').addClass('search-active');
                        });
                        $('.close-search').on('click', function() {
                            $('body').removeClass('search-active');
                        });
                    }
                },
                scrollTop: function (){
                    $(window).on("scroll", function() {
                        if ($(this).scrollTop() > 200) {
                            $('.scrollup').fadeIn();
                        } else {
                            $('.scrollup').fadeOut();
                        }
                    });

                    $('.scrollup').on("click", function()  {
                        $("html, body").animate({
                            scrollTop: 0
                        }, 800);
                        return false;
                    });
                },
                HoverParallax: function(){
                    if ($('.scene').length > 0 ) {
                        $('.scene').parallax({
                            scalarX: 10.0,
                            scalarY: 10.0,
                        }); 
                    }
                },
                MainSlider: function (){
                    var	tpj = jQuery;
                    if(window.RS_MODULES === undefined) window.RS_MODULES = {};
                    if(RS_MODULES.modules === undefined) RS_MODULES.modules = {};
                    RS_MODULES.modules["revslider271"] = {once: RS_MODULES.modules["revslider271"]!==undefined ? RS_MODULES.modules["revslider271"].once : undefined, init:function() {
                        window.revapi27 = window.revapi27===undefined || window.revapi27===null || window.revapi27.length===0  ? document.getElementById("rev_slider_27_1") : window.revapi27;
                        if(window.revapi27 === null || window.revapi27 === undefined || window.revapi27.length==0) { window.revapi27initTry = window.revapi27initTry ===undefined ? 0 : window.revapi27initTry+1; if (window.revapi27initTry<20) requestAnimationFrame(function() {RS_MODULES.modules["revslider271"].init()}); return;}
                        window.revapi27 = jQuery(window.revapi27);
                        if(window.revapi27.revolution==undefined){ revslider_showDoubleJqueryError("rev_slider_27_1"); return;}
                        revapi27.revolutionInit({
                            revapi:"revapi27",
                            DPR:"dpr",
                            sliderLayout:"fullwidth",
                            visibilityLevels:"1240,1024,778,480",
                            gridwidth:"1240,1024,778,480",
                            gridheight:"930,768,500,450",
                            perspective:600,
                            perspectiveType:"global",
                            editorheight:"930,768,500,450",
                            responsiveLevels:"1240,1024,778,480",
                            progressBar:{disableProgressBar:true},
                            navigation: {
                                wheelCallDelay:1000,
                                onHoverStop:false,
                                thumbnails: {
                                    enable:true,
                                    tmp:"<span class=\"tp-thumb-img-wrap\">  <span class=\"tp-thumb-image\"></span></span>",
                                    style:"gyges",
                                    h_align:"right",
                                    v_offset:0,
                                    space:5,
                                    width:70,
                                    height:70,
                                    wrapper_padding:5,
                                    wrapper_color:"transparent"
                                }
                            },
                            parallax: {
                                levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,30],
                                type:"scroll",
                                origo:"slidercenter",
                                speed:0
                            },
                            viewPort: {
                                global:false,
                                globalDist:"-200px",
                                enable:false
                            },
                            fallbacks: {
                                allowHTML5AutoPlayOnAndroid:true
                            },
                        });

                    }} 
                    if (window.RS_MODULES.checkMinimal!==undefined) { window.RS_MODULES.checkMinimal();};
                    var	tpj = jQuery;
                    if(window.RS_MODULES === undefined) window.RS_MODULES = {};
                    if(RS_MODULES.modules === undefined) RS_MODULES.modules = {};
                    RS_MODULES.modules["revslider291"] = {once: RS_MODULES.modules["revslider291"]!==undefined ? RS_MODULES.modules["revslider291"].once : undefined, init:function() {
                        window.revapi29 = window.revapi29===undefined || window.revapi29===null || window.revapi29.length===0  ? document.getElementById("rev_slider_29_1") : window.revapi29;
                        if(window.revapi29 === null || window.revapi29 === undefined || window.revapi29.length==0) { window.revapi29initTry = window.revapi29initTry ===undefined ? 0 : window.revapi29initTry+1; if (window.revapi29initTry<20) requestAnimationFrame(function() {RS_MODULES.modules["revslider291"].init()}); return;}
                        window.revapi29 = jQuery(window.revapi29);
                        if(window.revapi29.revolution==undefined){ revslider_showDoubleJqueryError("rev_slider_29_1"); return;}
                        revapi29.revolutionInit({
                            revapi:"revapi29",
                            DPR:"dpr",
                            sliderLayout:"fullwidth",
                            visibilityLevels:"1240,1024,778,480",
                            gridwidth:"1240,1024,778,480",
                            gridheight:"930,768,650,450",
                            perspective:600,
                            perspectiveType:"global",
                            editorheight:"930,768,650,450",
                            responsiveLevels:"1240,1024,778,480",
                            progressBar:{disableProgressBar:true},
                            navigation: {
                                wheelCallDelay:1000,
                                onHoverStop:false,
                                arrows: {
                                    enable:true,
                                    style:"hesperiden",
                                    hide_onmobile:true,
                                    hide_under:778,
                                    left: {
                                        h_offset:30
                                    },
                                    right: {
                                        h_align:"left",
                                        h_offset:29,
                                        v_offset:-53
                                    }
                                }
                            },
                            viewPort: {
                                global:false,
                                globalDist:"-200px",
                                enable:false
                            },
                            fallbacks: {
                                allowHTML5AutoPlayOnAndroid:true
                            },
                        });

                        }} // End of RevInitScript
                        if (window.RS_MODULES.checkMinimal!==undefined) { window.RS_MODULES.checkMinimal();};
                        if (window.RS_MODULES.checkMinimal!==undefined) { window.RS_MODULES.checkMinimal();};
                        var	tpj = jQuery;
                        if(window.RS_MODULES === undefined) window.RS_MODULES = {};
                        if(RS_MODULES.modules === undefined) RS_MODULES.modules = {};
                        RS_MODULES.modules["revslider301"] = {once: RS_MODULES.modules["revslider301"]!==undefined ? RS_MODULES.modules["revslider301"].once : undefined, init:function() {
                            window.revapi30 = window.revapi30===undefined || window.revapi30===null || window.revapi30.length===0  ? document.getElementById("rev_slider_30_1") : window.revapi30;
                            if(window.revapi30 === null || window.revapi30 === undefined || window.revapi30.length==0) { window.revapi30initTry = window.revapi30initTry ===undefined ? 0 : window.revapi30initTry+1; if (window.revapi30initTry<20) requestAnimationFrame(function() {RS_MODULES.modules["revslider301"].init()}); return;}
                            window.revapi30 = jQuery(window.revapi30);
                            if(window.revapi30.revolution==undefined){ revslider_showDoubleJqueryError("rev_slider_30_1"); return;}
                            revapi30.revolutionInit({
                                revapi:"revapi30",
                                DPR:"dpr",
                                sliderLayout:"fullwidth",
                                visibilityLevels:"1240,1024,778,480",
                                gridwidth:"1240,1024,778,480",
                                gridheight:"1040,768,600,470",
                                perspective:600,
                                perspectiveType:"global",
                                editorheight:"1040,768,600,470",
                                responsiveLevels:"1240,1024,778,480",
                                progressBar:{disableProgressBar:true},
                                navigation: {
                                    wheelCallDelay:1000,
                                    onHoverStop:false,
                                    thumbnails: {
                                        enable:true,
                                        tmp:"<span class=\"tp-thumb-img-wrap\">  <span class=\"tp-thumb-image\"></span></span>",
                                        style:"gyges",
                                        h_align:"left",
                                        v_offset:0,
                                        space:5,
                                        width:80,
                                        height:80,
                                        min_width:30,
                                        wrapper_padding:5,
                                        wrapper_color:"transparent"
                                    }
                                },
                                viewPort: {
                                    global:false,
                                    globalDist:"-200px",
                                    enable:false
                                },
                                fallbacks: {
                                    allowHTML5AutoPlayOnAndroid:true
                                },
                            });

                        }} 

                    },
                    counterUp: function (){
                        if($('.counter').length){
                            jQuery('.counter').counterUp({
                                delay: 50,
                                time: 2000,
                            });
                        };
                    },
                    PopUp: function (){
                        $('.zoom-gallery').magnificPopup({
                            delegate: 'a',
                            type: 'image',
                            closeOnContentClick: false,
                            closeBtnInside: false,
                            mainClass: 'mfp-with-zoom mfp-img-mobile',
                            gallery: {
                                enabled: true
                            },
                            zoom: {
                                enabled: true,
                                duration: 300, 
                                opener: function(element) {
                                    return element.find('img');
                                }
                            }
                        });
                        jQuery(window).on('load', function(){
                            $('.filtr-container').imagesLoaded ( function(){});
                            var filterizd = $('.filtr-container');

                            if(filterizd.length) {
                                filterizd.filterizr({

                                });
                                $('.filtr-button').on('click', function() {

                                    $('.filtr-button.filtr-active').removeClass('filtr-active');
                                    $(this).addClass('filtr-active');
                                });
                            }
                        });
                    },
                    CarouselSliderJs: function (){
                        $('.ft-service-slider-wrapper').slick({
                            arrow: false,
                            dots: true,
                            infinite: false,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 500,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }

                            ]
                        });
                        $('.ft-project-slider-area').slick({
                            arrow: false,
                            dots: true,
                            infinite: true,
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            centerMode: true,
                            variableWidth: true,
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 500,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }

                            ]
                        });
                        $('.ft-testimonial-slider-area').slick({
                            arrow: false,
                            infinite: false,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            dots: true,
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 799,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 599,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 500,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            ]
                        });
                        $('.ft-service-slider-2').slick({
                            arrow: false,
                            infinite: false,
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            dots: true,
                            responsive: [
                            {
                                breakpoint: 1100,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 799,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 599,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 500,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            ]
                        });
                        $('.ft-portfolio-slider-2').slick({
                            arrow: false,
                            infinite: false,
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            dots: true,
                            responsive: [
                            {
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 799,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 599,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 500,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            ]
                        });
                        $('.ft-blog-slider-2').slick({
                            arrow: true,
                            dots: false,
                            infinite: false,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            prevArrow: ".blg-left_arrow",
                            nextArrow: ".blg-right_arrow",
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 500,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }

                            ]
                        });
                        $("#mySlider1").AnimatedSlider( { prevButton: "#btn_prev1", 
                            nextButton: "#btn_next1",
                            visibleItems: 3,
                            infiniteScroll: true,
                            willChangeCallback: function(obj, item) { $("#statusText").text("Will change to " + item); },
                            changedCallback: function(obj, item) { $("#statusText").text("Changed to " + item); }
                        });
                        $(".ft-testimonial-slider-3").slick({
                            autoplay: false,
                            dots: true,
                            customPaging : function(slider, i) {
                                var thumb = $(slider.$slides[i]).data();
                                return '<a>'+(i+1)+'</a>';
                            },
                        });
                        $('.blog-slider-3').slick({
                            dots: true,
                            infinite: false,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            customPaging : function(slider, i) {
                                var thumb = $(slider.$slides[i]).data();
                                return '<a>'+(i+1)+'</a>';
                            },
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 500,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }

                            ]
                        });
                        $('.ft-thx-project-slider').slick({
                            arrow: true,
                            dots: false,
                            infinite: true,
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            prevArrow: ".port_left_arrow",
                            nextArrow: ".port_right_arrow",
                            responsive: [
                            {
                                breakpoint: 1300,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 1025,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2,
                                    infinite: true,
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 500,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }

                            ]
                        });
                        $('.pr-sv-testimonial-slider').slick({
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                            nav: false,
                        });
                        $('.pr-cor-blog-slider').slick({
                            arrow: false,
                            dots: true,
                            infinite: false,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 400,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            ]
                        });
                        $('.ft-thx-testimonial-slider-2').slick({
                            arrow: false,
                            dots: true,
                            infinite: false,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 400,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            ]
                        });
                        $('.ft-thx-sponsor-slider').slick({
                            arrow: false,
                            dots: false,
                            infinite: false,
                            slidesToShow: 4,
                            autoplay: true,
                            slidesToScroll: 1,
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    dots: false
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 400,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            ]
                        });
                        $('.ft-thx-project-slider-3').slick({
                            arrow: true,
                            dots: true,
                            centerMode: true,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            responsive: true,
                            prevArrow: ".port_left_arrow3",
                            nextArrow: ".port_right_arrow3",
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 1000,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 400,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            },
                            ]
                        });
                        $('.pr-sx-team-slider-for').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            fade: true,
                            asNavFor: '.pr-sx-team-img-nav'
                        });
                        $('.pr-sx-team-img-nav').slick({
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            centerMode: false,
                            arrows: true,
                            centerMode: true,
                            asNavFor: '.pr-sx-team-slider-for',
                            dots: false,
                            focusOnSelect: true,
                        });
                        $("#mySlider2").AnimatedSlider( { prevButton: "#btn_prev2", 
                            nextButton: "#btn_next2",
                            visibleItems: 3,
                            infiniteScroll: true,
                            willChangeCallback: function(obj, item) { $("#statusText").text("Will change to " + item); },
                            changedCallback: function(obj, item) { $("#statusText").text("Changed to " + item); }
                        });
                        $('.pr-an-blog-slider').slick({
                            arrow: true,
                            infinite: false,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            prevArrow: ".blg-an-left_arrow",
                            nextArrow: ".blg-an-right_arrow",
                            responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 800,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                            ]
                        });
                    },
                    CircleProgress: function (){
                        if($('.count-box').length){
                            $('.count-box').appear_c(function(){
                                var $t = $(this),
                                n = $t.find(".count-text").attr("data-stop"),
                                r = parseInt($t.find(".count-text").attr("data-speed"), 10);
                                if (!$t.hasClass("counted")) {
                                    $t.addClass("counted");
                                    $({
                                        countNum: $t.find(".count-text").text()
                                    }).animate({
                                        countNum: n
                                    }, {
                                        duration: r,
                                        easing: "linear",
                                        step: function() {
                                            $t.find(".count-text").text(Math.floor(this.countNum));
                                        },
                                        complete: function() {
                                            $t.find(".count-text").text(this.countNum);
                                        }
                                    });
                                }
                            },{accY: 0});
                        };
                        if($('.dial').length){
                            $('.dial').appear_c(function(){
                                var elm = $(this);
                                var color = elm.attr('data-fgColor');  
                                var perc = elm.attr('value'); 
                                var thickness = elm.attr('thickness');  
                                elm.knob({ 
                                    'value': 0, 
                                    'min':0,
                                    'max':100,
                                    'skin':'tron',
                                    'readOnly':true,
                                    'thickness':.1,
                                    'dynamicDraw': true,
                                    'displayInput':false
                                });
                                $({value: 0}).animate({ value: perc }, {
                                    duration: 3500,
                                    easing: 'swing',
                                    progress: function () { elm.val(Math.ceil(this.value)).trigger('change');
                                }
                            });
                            },{accY: 0});
                        }
                    },
                    countDown:  function (){
                        if ($('.coming-soon-countdown').length > 0) {
                            var deadlineDate = new Date('sep 26, 2023 23:59:59').getTime();
                            var countdownDays = document.querySelector('.days .ft-count-down-number');
                            var countdownHours = document.querySelector('.hours .ft-count-down-number');
                            var countdownMinutes = document.querySelector('.minutes .ft-count-down-number');
                            var countdownSeconds = document.querySelector('.seconds .ft-count-down-number');
                            setInterval(function () {
                                var currentDate = new Date().getTime();
                                var distance = deadlineDate - currentDate;
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                countdownDays.innerHTML = days;
                                countdownHours.innerHTML = hours;
                                countdownMinutes.innerHTML = minutes;
                                countdownSeconds.innerHTML = seconds;
                            }, 1000);

                        };
                        jQuery('.video_box').magnificPopup({
                            disableOn: 200,
                            type: 'iframe',
                            mainClass: 'mfp-fade',
                            removalDelay: 160,
                            preloader: false,
                            fixedContentPos: false,
                        });
                    },
                    MilesRange: function (){
                        if ($("#slider-range").length) {
                            $( "#slider-range" ).slider({
                                range: true,
                                min: 0,
                                max: 3000,
                                values: [ 0, 1500 ],
                                slide: function( event, ui ) {
                                    $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                                }
                            });
                        };
                        if ($("#amount").length) {
                            $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
                                " - " + $( "#slider-range" ).slider( "values", 1 ) );
                        };
                        $('.count').prop('disabled', true);
                        $(document).on('click','.plus',function(){
                            $('.count').val(parseInt($('.count').val()) + 1 );
                        });
                        $(document).on('click','.minus',function(){
                            $('.count').val(parseInt($('.count').val()) - 1 );
                            if ($('.count').val() == 0) {
                                $('.count').val(1);
                            }
                        });
                    },


                }
            }
            jQuery(document).ready(function (){
                FasTrans.init();
            });

        })();
    </script>
</body>
</html>		