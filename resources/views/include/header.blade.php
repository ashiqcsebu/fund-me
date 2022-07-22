<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fund Me</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="single-page about-page">
<header class="site-header">
    <div class="top-header-bar">
        <div class="container">
            <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                    <div class="header-bar-email">
                        MAIL: <a href="#">contact@fundme.com</a>
                    </div><!-- .header-bar-email -->

                    <div class="header-bar-text">
                        <p>PHONE: <span>01709175859</span></p>
                    </div><!-- .header-bar-text -->
                </div><!-- .col -->

                <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                    <div class="donate-btn">
                        <a href="#">Donate Now</a>
                    </div><!-- .donate-btn -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .top-header-bar -->

    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="site-branding d-flex align-items-center">
                        <a class="d-block" href="/" rel="home"><img class="d-block" src="images/fund me logo.jpg" alt="logo"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li class="current-menu-item"><a href="/">Home</a></li>
                            <li><a href="/campaign-all">Live Campaigns</a></li>
                            <li><a href="/about">About us</a></li>
                            <li><a href="/contact">Contact</a></li>
                            @if (Route::has('login'))
                                @auth
                                    @if(Auth::user()->role =='0')
                                    <li><a href="/user_campaign_all">Dashboard</a></li>
                                    @endif
                                    @if(Auth::user()->role =='1')
                                    <li><a href="/dashboard">Dashboard</a></li>
                                    @endif
                                    @if(Auth::user()->role =='2')
                                    <li><a href="/campaign_university">Dashboard</a></li>
                                    @endif

                                @else
                                    <li><a href="/login">Login</a></li>
                                    <li><a href="/register">Register</a></li>
                                @endauth
                            @endif
                        </ul>
                    </nav><!-- .site-navigation -->

                    <div class="hamburger-menu d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- .hamburger-menu -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .nav-bar -->
</header><!-- .site-header -->
