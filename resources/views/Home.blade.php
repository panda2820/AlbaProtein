<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from rstheme.com/products/html/reobiz/index9.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jul 2023 08:33:25 GMT -->
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>AlbaProtein</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.html">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo/favicon.png') }}">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/bootstrap.min.css') }}">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/font-awesome.min.css') }}">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/animate.css') }}">
        <!-- aos css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/aos.css') }}">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/owl.carousel.css') }}">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/slick.css') }}">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/off-canvas.css') }}">
        <!-- linea-font css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/fonts/linea-fonts.css') }}">
        <!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/fonts/flaticon.css') }}">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/magnific-popup.css') }}">
        <!-- Main Menu css -->
        <link rel="stylesheet" href="{{ asset('assets-front/css/rsmenu-main.css') }}">
        <!-- nivo slider CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/inc/custom-slider/css/nivo-slider.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/inc/custom-slider/css/preview.css') }}">
        <!-- rsmenu transitions css -->
        <link rel="stylesheet" href="{{ asset('assets-front/css/rsmenu-transitions.css') }}">
        <!-- spacing css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/rs-spacing.css') }}">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/style.css') }}">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/css/responsive.css') }}">
        <style>
            .country-img{
                height: 300px;
                width: 100%;
                object-fit: cover;
            }
        </style>
    </head>
    <body class="home-nine">

        <!-- Preloader area start here -->
        <div id="loader" class="loader">
            <div class="spinner"></div>
        </div>
        <!--End preloader here -->

        <!--Full width header Start-->
        <div class="full-width-header header-style2 red modify">
            <!--Header Start-->
            <header id="rs-header" class="rs-header">
                <!-- Menu Start -->
                <div class="menu-area menu-sticky">
                    <div class="container-fluid2">
                        <div class="row y-middle">
                            <div class="col-lg-2">
                                <div class="logo-area">
                                    <a class="dark" href="{{ URL::to('/') }}"><img src="{{ asset('logo/logo.png') }}" alt="logo"></a>
                                    <a class="light" href="{{ URL::to('/') }}"><img src="{{ asset('logo/logo-white.png') }}" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="rs-menu-area">
                                    <div class="main-menu">
                                        <div class="mobile-menu">
                                            <a class="rs-menu-toggle">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                        </div>
                                        <nav class="rs-menu">
                                            <ul class="nav-menu">
                                                <li> <a href="#home-section">Home</a></li>
                                                <li> <a href="#rs-whychooseus">Why Choose Us</a></li>
                                                <li> <a href="#services-section">Services</a></li>
                                                <li> <a href="#countries">Global Reach</a></li>
                                                <li> <a href="#how-it-works">How It Works</a></li>
                                                <li> <a href="#rs-footer">Contact</a></li>
                                            </ul> <!-- //.nav-menu -->
                                        </nav>
                                    </div> <!-- //.main-menu -->
                                    <div class="expand-btn-inner" style="
                                        width: 150px;
                                        padding: 5px 10px;
                                        background: rgba(255,255,255,0.3);
                                        border-radius: 5px;
                                        text-align: center;
                                    ">
                                        @php
                                            $user_type = ''
                                        @endphp
                                        @if(Auth::check())
                                            @if(Auth::user()->user_type == 0)
                                            @php
                                                $user_type = 'user'
                                            @endphp
                                            @elseif(Auth::user()->user_type == 1)
                                            @php
                                                $user_type = 'office'
                                            @endphp
                                            @elseif(Auth::user()->user_type == 2)
                                            @php
                                                $user_type = 'admin'
                                            @endphp
                                            @endif
                                        <a href="{{ URL::to($user_type . '/dashboard') }}" style="color: white">Dashboard</a>
                                        @else
                                        <a href="{{ URL::to('user/login') }}" style="color: white">Sign In</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->
            </header>
            <!--Header End-->
        </div>
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
            <!-- Banner Section Start -->
            <div class="rs-banner style2" id="home-section">
                <div class="container relative">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="content-part">
                                <h1 class="title mb-19 white-color">Exploring the Lucrative World of Meat Trading!</h1>
                                <p class="desc mb-36 white-color">Uncover the essentials of supply chain dynamics, global market trends, and the art of smart negotiations that fuel this industry. Join us on this journey to discover the meaty potential of trading and seize the opportunities that await!</p>
                                <div class="btn-part">
                                    <a class="readon" href="{{ URL::to('/user/register') }}">Create Account Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bnr-image-wrap">
                        <div class="bnr-image">
                            <img class="main-img" src="{{ asset('assets-front/app/main.png') }}" alt="" data-aos="fade-left" data-aos-duration="1500">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner Section End -->

            <!-- Services Mini Section Start -->
            <div class="rs-services style10 xs-pt-80">
                <div class="container">
                    <div class="mt--142 md-mt--100 xs-mt-0">
                        <div class="row no-gutter">
                            <div class="col-md-4">
                                <div class="service-wrap">
                                    <div class="icon-part">
                                        <img src="{{ asset('assets-front/images/services/icons/style10/1.png') }}" alt="">
                                    </div>
                                    <div class="content-part">
                                        <h5 class="title"><a href="#">Trading Solutions</a></h5>
                                        <p class="desc mb-0">AlbaProtein provides you quick trading solutions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service-wrap">
                                    <div class="icon-part">
                                        <img src="{{ asset('assets-front/images/services/icons/style10/2.png') }}" alt="">
                                    </div>
                                    <div class="content-part">
                                        <h5 class="title"><a href="#">Tracking</a></h5>
                                        <p class="desc mb-0">AlbaProtein allows to track Your tradings anytime everywhere.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service-wrap last-item">
                                    <div class="icon-part">
                                        <img src="{{ asset('assets-front/images/services/icons/style10/3.png') }}" alt="">
                                    </div>
                                    <div class="content-part">
                                        <h5 class="title"><a href="#">Profits</a></h5>
                                        <p class="desc mb-0">Trading with AlbaProtein give you profits regularly and track your tradings.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Services Mini Section End -->

            <!-- Why Choose Us Section Start -->
            <div id="rs-whychooseus" class="rs-whychooseus style5 pt-120 pb-120 md-pt-80 md-pb-72">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-6 md-mb-40">
                            <div class="image-wrap" data-aos="fade-right">
                                <img src="{{ asset('assets-front/app/main-banner.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8 pl-75 lg-pl-15">
                            <div class="sec-title mb-40">
                                <h2 class="title mb-0">Fueling the Future: AlbaProtein - Your Protein Powerhouse!</h2>
                            </div>
                            <div class="content-wrap">
                                <div class="item-part mb-20">
                                    <div class="icon-part">
                                        <img src="{{ asset('assets-front/images/whychooseus/style5/icons/1.png') }}" alt="">
                                    </div>
                                    <div class="desc-text">
                                        <h4 class="title">Extensive Product Portfolio</h4>
                                        <div class="desc">We offer a wide-ranging selection of meat products to cater to diverse consumer preferences</div>
                                    </div>
                                </div>
                                <div class="item-part mb-20">
                                    <div class="icon-part">
                                        <img src="{{ asset('assets-front/images/whychooseus/style5/icons/2.png') }}" alt="">
                                    </div>
                                    <div class="desc-text">
                                        <h4 class="title">Rigorous Quality Assurance</h4>
                                        <div class="desc">Our dedicated team of experts ensures that all meats undergo thorough inspections, adhering to international quality and safety regulations.</div>
                                    </div>
                                </div>
                                <div class="item-part">
                                    <div class="icon-part">
                                        <img src="{{ asset('assets-front/images/whychooseus/style5/icons/3.png') }}" alt="">
                                    </div>
                                    <div class="desc-text">
                                        <h4 class="title">Global Supplier Network</h4>
                                        <div class="desc">We forge strong relationships with reputable farmers and producers, allowing us to secure competitive prices and maintain a consistent supply chain.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Why Choose Us Section End -->

            <!-- Our Featured Services Section Start -->
            <div id="services-section" class="rs-featured style1 gray-bg4 pt-104 pb-75 md-pt-66 md-pb-35">
                <div class="container">
                    <div class="sec-title text-center mb-62 md-mb-34 sm-mb-45">
                        <h2 class="title mb-0 bottom-wave">Our Featured Services</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-37">
                            <div class="featured-wrap">
                                <div class="icon-part pt-7">
                                    <img src="{{ asset('assets-front/images/featured/style1/icons/1.png') }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h4 class="title"><a href="services-single.html">Innovative Trading Platform</a></h4>
                                    <div class="desc">Embracing modern technology, we have developed an efficient and user-friendly online trading platform.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-37">
                            <div class="featured-wrap">
                                <div class="icon-part pt-7">
                                    <img src="{{ asset('assets-front/images/featured/style1/icons/2.png') }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h4 class="title"><a href="services-single.html">Customized Solutions</a></h4>
                                    <div class="desc">We recognize that each customer's requirements are unique. Our team of experienced professionals works closely with clients to provide personalized solutions.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-37">
                            <div class="featured-wrap">
                                <div class="icon-part pt-7">
                                    <img src="{{ asset('assets-front/images/featured/style1/icons/3.png') }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h4 class="title"><a href="services-single.html">Sustainable Practices</a></h4>
                                    <div class="desc">We prioritize eco-friendly production methods and partner with suppliers who adhere to responsible farming and ethical animal welfare standards.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-37">
                            <div class="featured-wrap">
                                <div class="icon-part pt-7">
                                    <img src="{{ asset('assets-front/images/featured/style1/icons/4.png') }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h4 class="title"><a href="services-single.html">Market Insights</a></h4>
                                    <div class="desc">We provide regular market insights, industry reports, and analysis of global meat trends to assist our customers in making well-informed trading decisions.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-37">
                            <div class="featured-wrap">
                                <div class="icon-part pt-7">
                                    <img src="{{ asset('assets-front/images/featured/style1/icons/5.png') }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h4 class="title"><a href="services-single.html">Global Supplier Network</a></h4>
                                    <div class="desc">Our well-established network of trusted suppliers extends to various countries, ensuring a steady and reliable supply of meat products year-round.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-37">
                            <div class="featured-wrap">
                                <div class="icon-part pt-7">
                                    <img src="{{ asset('assets-front/images/featured/style1/icons/6.png') }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h4 class="title"><a href="services-single.html">Support & Maintain</a></h4>
                                    <div class="desc">Our dedicated customer support team is available round-the-clock to address any queries or concerns.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Featured Services Section End -->

            <!-- Counter Section Start -->
            <div class="rs-counter style2 pt-120 pb-104 md-pt-80 md-pb-66 xs-pb-59">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-6 md-mb-30">
                            <div class="img-part">
                                <img src="{{ asset('assets-front/app/about.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 pl-85 lg-pl-15">
                            <div class="counter-wrap">
                                <div class="content-part mb-50">
                                    <div class="counter-part">
                                        <div class="rs-count thousand">2</div>
                                        <h4 class="title mb-0">Employees</h4>
                                    </div>
                                    <div class="desc-text">
                                        <div class="desc">Our dedicated team of over 2,000 passionate employees drives the success of AlbaProtein, working tirelessly to deliver excellence in every aspect of our protein-powered endeavors.</div>
                                    </div>
                                </div>
                                <div class="content-part mb-50">
                                    <div class="counter-part">
                                        <div class="rs-count thousand">3</div>
                                        <h4 class="title mb-0">Clients</h4>
                                    </div>
                                    <div class="desc-text">
                                        <div class="desc">Our success at AlbaProtein is a testament to the trust and satisfaction of over 3,000 valued clients who rely on us for top-notch protein solutions.</div>
                                    </div>
                                </div>
                                <div class="content-part">
                                    <div class="counter-part">
                                        <div class="rs-count">6</div>
                                        <h4 class="title mb-0">Countries</h4>
                                    </div>
                                    <div class="desc-text">
                                        <div class="desc">AlbaProtein proudly extends its footprint across 6 Arab countries, fueling the protein needs of millions and contributing to the region's culinary excellence</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Counter Section End -->

            <!-- Latest Work Start -->
            <div id="countries" class="rs-latest-work style1">
                <div class="sec-title text-center mb-69 md-mb-44">
                    <h2 class="title mb-0 bottom-wave">Global Reach</h2>
                </div>
                <div class="row no-gutter">
                    <div class="col-lg-4 col-sm-6">
                        <div class="work-wrap">
                            <img class="country-img" src="{{ asset('assets-front/app/uae.jpg') }}" alt="">
                            <div class="content-part">
                                <h3 class="title"><a href="#">United Arab Emirates</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="work-wrap">
                            <img class="country-img" src="{{ asset('assets-front/app/saudi.jpg') }}" alt="">
                            <div class="content-part">
                                <h3 class="title"><a href="#">Saudi Arabia</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="work-wrap">
                            <img class="country-img" src="{{ asset('assets-front/app/qatar.jpg') }}" alt="">
                            <div class="content-part">
                                <h3 class="title"><a href="#">Qatar</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="work-wrap">
                            <img class="country-img" src="{{ asset('assets-front/app/kuwait.jpg') }}" alt="">
                            <div class="content-part">
                                <h3 class="title"><a href="#">Kuwait</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="work-wrap">
                            <img class="country-img" src="{{ asset('assets-front/app/bahrain.jpg') }}" alt="">
                            <div class="content-part">
                                <h3 class="title"><a href="#">Bahrain</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="work-wrap">
                            <img class="country-img" src="{{ asset('assets-front/app/oman.jpg') }}" alt="">
                            <div class="content-part">
                                <h3 class="title"><a href="#">Oman</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Latest Work End -->

            <!-- Blog Section Start -->
            <div id="how-it-works" class="rs-blog style2 pt-104 pb-120 md-pt-66 md-pb-80">
                <div class="container">
                    <div class="sec-title text-center mb-68 md-mb-45">
                        <h2 class="title mb-0 bottom-wave">How it Works</h2>
                    </div>
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-lg-device="3" data-md-device-nav="false" data-md-device-dots="false">
                        <div class="blog-wrap">
                            <img src="{{ asset('assets-front/app/step1.jpg') }}" alt="">
                            <div class="content-part">
                                <h4 class="title"><a href="#">Create Account</a></h4>
                            </div>
                        </div>
                        <div class="blog-wrap">
                            <img src="{{ asset('assets-front/app/step2.jpg') }}" alt="">
                            <div class="content-part">
                                <h4 class="title"><a href="#">Find Nearest Office</a></h4>
                            </div>
                        </div>
                        <div class="blog-wrap">
                            <img src="{{ asset('assets-front/app/step3.jpg') }}" alt="">
                            <div class="content-part">
                                <h4 class="title"><a href="#">Select Package</a></h4>
                            </div>
                        </div>
                        <div class="blog-wrap">
                            <img src="{{ asset('assets-front/app/step4.jpg') }}" alt="">
                            <div class="content-part">
                                <h4 class="title"><a href="#">Enjoy Profit</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Section End -->
        </div> 
        <!-- Main content End -->

        <!-- Footer Start -->
        <footer id="rs-footer" class="rs-footer">
            <div class="container">
                <div class="footer-content pt-62 pb-79 md-pb-64 sm-pt-48">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 footer-widget md-mb-39">
                            <div class="about-widget pr-15">
                                <div class="logo-part">
                                    <a href="{{ URL::to('/') }}"><img src="{{ asset('logo/logo.png') }}" alt="Footer Logo"></a>
                                </div>
                                <p class="desc">At AlbaProtein International, we pride ourselves on being a leading player in the global meat trading industry. As an established exporter of premium-quality meat products, we facilitate seamless trade opportunities for meat enthusiasts, suppliers, and buyers across the globe.</p>
                                <div class="btn-part">
                                    <a class="readon" href="{{ URL::to('user/register') }}">Register Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 md-mb-32 footer-widget">
                            <h4 class="widget-title">Contact Info</h4>
                            <ul class="address-widget pr-40">
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">374 William S Canning Blvd, Fall River MA 2721, USA</div>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <div class="desc">
                                        <a href="tel:+8801739753105">(+880)173-9753105</a>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-email"></i>
                                    <div class="desc">
                                        <a href="mailto:support@rstheme.com">inf@albaprotein.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row y-middle">
                        <div class="col-lg-6 col-md-8 sm-mb-21">
                            <div class="copyright">
                                <p>© Copyright {{ date('Y') }} AlbaProtein. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 text-right sm-text-center">
                            <ul class="footer-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text" required="">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->

        <!-- modernizr js -->
        <script src="{{ asset('assets-front/js/modernizr-2.8.3.min.js') }}"></script>
        <!-- jquery latest version -->
        <script src="{{ asset('assets-front/js/jquery.min.js') }}"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="{{ asset('assets-front/js/bootstrap.min.js') }}"></script>
        <!-- Menu js -->
        <script src="{{ asset('assets-front/js/rsmenu-main.js') }}"></script> 
        <!-- op nav js -->
        <script src="{{ asset('assets-front/js/jquery.nav.js') }}"></script>
        <!-- owl.carousel js -->
        <script src="{{ asset('assets-front/js/owl.carousel.min.js') }}"></script>
        <!-- Slick js -->
        <script src="{{ asset('assets-front/js/slick.min.js') }}"></script>
        <!-- isotope.pkgd.min js -->
        <script src="{{ asset('assets-front/js/isotope.pkgd.min.js') }}"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="{{ asset('assets-front/js/imagesloaded.pkgd.min.js') }}"></script>
        <!-- wow js -->
        <script src="{{ asset('assets-front/js/wow.min.js') }}"></script>
        <!-- aos js -->
        <script src="{{ asset('assets-front/js/aos.js') }}"></script>
        <!-- Skill bar js -->
        <script src="{{ asset('assets-front/js/skill.bars.jquery.js') }}"></script>
        <script src="{{ asset('assets-front/js/jquery.counterup.min.js') }}"></script>         
         <!-- counter top js -->
        <script src="{{ asset('assets-front/js/waypoints.min.js') }}"></script>
        <!-- video js -->
        <script src="{{ asset('assets-front/js/jquery.mb.YTPlayer.min.js') }}"></script>
        <!-- magnific popup js -->
        <script src="{{ asset('assets-front/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Nivo slider js -->
        <script src="{{ asset('assets-front/inc/custom-slider/js/jquery.nivo.slider.js') }}"></script>
        <!-- plugins js -->
        <script src="{{ asset('assets-front/js/plugins.js') }}"></script>
        <!-- parallax-effect js -->
        <script src="{{ asset('assets-front/js/parallax-effect.min.js') }}"></script>
        <!-- contact form js -->
        <script src="{{ asset('assets-front/js/contact.form.js') }}"></script>
        <!-- ProgressBar Js -->
        <script src="{{ asset('assets-front/js/jQuery-plugin-progressbar.js') }}"></script>
        <!-- main js -->
        <script src="{{ asset('assets-front/js/main.js') }}"></script>
    </body>
</html>