<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fund Me</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="admin/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="admin/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="admin/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="admin/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->


  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="admin/img/profile icon.png" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">{{Auth::user()->name}}</h2>
              <span>
                 @if(Auth::user()->role =='1')
                  Admin
                 @endif
                 @if(Auth::user()->role =='0')
                  Student
                 @endif
                 @if(Auth::user()->role =='2')
                  University Representative
                 @endif
              </span>

          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"> <strong>D</strong><strong class="text-primary">B</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">
            @if(Auth::user()->role =='1')
              <li><a href="/dashboard"> <i class="icon-home"></i>Dashboard </a></li>
              <li><a href="/user-list"> <i class="icon-user"></i>Manage User </a></li>
              <li><a href="/admin_manage_campaign"> <i class="icon-form"></i>Manage Campaign </a></li>
              <li><a href="/" target="_blank"> <i class="icon-picture"></i>Visit Site</a></li>
            @endif
            @if(Auth::user()->role =='2')
              <li><a href="/campaign_university"> <i class="icon-form"></i>Verify Campaign</a></li>
              <li><a href="/edit-profile"> <i class="icon-form"></i>Edit Profile</a></li>
                <li><a href="/" target="_blank"> <i class="icon-picture"></i>Visit Site</a></li>
            @endif
            @if(Auth::user()->role =='0')
              <li><a href="/user_campaign_all"> <i class="icon-form"></i>Manage Campaign</a></li>
              <li><a href="/user_total_donation"> <i class="icon-form"></i>Your Donation</a></li>
              <li><a href="/edit-profile"> <i class="icon-form"></i>Edit Profile</a></li>
                <li><a href="/" target="_blank"> <i class="icon-picture"></i>Visit Site</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-warning">
                      @if(Auth::user()->role =='1')
                        Admin
                      @endif
                      @if(Auth::user()->role =='0')
                        Campaign Creator
                      @endif
                      @if(Auth::user()->role =='2')
                        University representative
                      @endif
                    </strong><strong class="text-primary">Dashboard</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Log out-->
                <li class="nav-item">
                  <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link logout">
                    <span class="d-none d-sm-inline-block">Logout</span>
                    <i class="fa fa-sign-out"></i>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                  </form>
                </li>

              </ul>
            </div>
          </div>
        </nav>
      </header>
