<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <meta name="robots" content="noindex, nofollow">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @stack('meta-data')
      <link rel="apple-touch-icon" sizes="57x57" href="{{  asset('/assets/img/icons/apple-icon-57x57.png') }}">
      <link rel="apple-touch-icon" sizes="60x60" href="{{  asset('/assets/img/icons/apple-icon-60x60.png') }}">
      <link rel="apple-touch-icon" sizes="72x72" href="{{  asset('/assets/img/icons/apple-icon-72x72.png') }}">
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/icons/apple-icon-76x76.png') }}">
      <link rel="apple-touch-icon" sizes="114x114" href="{{  asset('/assets/img/icons/apple-icon-114x114.png') }}">
      <link rel="apple-touch-icon" sizes="120x120" href="{{  asset('/assets/img/icons/apple-icon-120x120.png') }}">
      <link rel="apple-touch-icon" sizes="144x144" href="{{  asset('/assets/img/icons/apple-icon-144x144.png') }}">
      <link rel="apple-touch-icon" sizes="152x152" href="{{  asset('/assets/img/icons/apple-icon-152x152.png') }}">
      <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/img/icons/apple-icon-180x180.png') }}">
      <link rel="icon" type="image/png" sizes="192x192" href="{{  asset('/assets/img/icons/android-icon-192x192.png') }}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{  asset('/assets/img/icons/favicon-32x32.png') }}">
      <link rel="icon" type="image/png" sizes="96x96" href="{{  asset('/assets/img/icons/favicon-96x96.png') }}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/img/icons/favicon-16x16.png') }}">
      <link rel="manifest" href="{{ asset('/assets/img/icons/manifest.json') }}">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="{{ asset('/assets/img/icons/ms-icon-144x144.png') }}">
      <meta name="theme-color" content="#ffffff">
      <title>@yield('title') | {{ config('app.name') }}</title>
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
      <!-- Lineawesome CSS -->
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <!-- Main CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      @stack('page-css')
      <style>
            body {
                  font-family: Inter, sans-serif
            }

      </style>
</head>

<body class="{{ $class ?? '' }}">
      <!-- Main Wrapper -->
      <div class="main-wrapper">
            <!-- Loader -->
            <div id="loader-wrapper">
                  <div id="loader">
                        <div class="loader-ellips">
                              <span class="loader-ellips__dot"></span>
                              <span class="loader-ellips__dot"></span>
                              <span class="loader-ellips__dot"></span>
                              <span class="loader-ellips__dot"></span>
                        </div>
                  </div>
            </div>
            <!-- /Loader -->
            <!-- Header -->
            <div class="header">
                  <!-- Logo -->
                  <div class="header-left">
                        <a href="index.php" class="logo">
                              <img src="assets/img/logo.png" width="40" height="40" alt="">
                        </a>
                  </div>
                  <!-- /Logo -->
                  <a id="toggle_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                              <span></span>
                              <span></span>
                              <span></span>
                        </span>
                  </a>
                  <!-- Header Title -->
                  <div class="page-title-box">
                        <h3>{{ config('app.name') }}</h3>
                  </div>
                  <!-- /Header Title -->
                  <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
                  <!-- Header Menu -->
                  <ul class="nav user-menu">
                        <!-- Notifications -->
                        <li class="nav-item dropdown">
                              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i> <span class="badge badge-pill">{{ $notifications->count() }}</span>
                              </a>
                              <div class="dropdown-menu notifications">
                                    <div class="topnav-dropdown-header">
                                          <span class="notification-title">Notifications</span>
                                          <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                                    </div>
                                    <div class="noti-content">
                                          <ul class="notification-list">
                                                @foreach($notifications as $notification)
                                                <li class="notification-message">
                                                      <a href="/">
                                                            <div class="media">
                                                                  <span class="avatar">
                                                                        <img alt="" src="assets/img/profiles/avatar-03.jpg">
                                                                  </span>
                                                                  <div class="media-body">
                                                                        <p class="noti-details"><span class="noti-title"><strong>{{ $notification->title }}</strong> -
                                                                              </span>
                                                                              <span class="noti-title">{{ Str::limit($notification->description, 80) }}</span>
                                                                        </p>
                                                                        <p class="noti-time"><span class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
                                                                        </p>
                                                                  </div>
                                                            </div>
                                                      </a>
                                                </li>
                                                @endforeach
                                          </ul>
                                    </div>
                                    <div class="topnav-dropdown-footer">
                                          <a href="activities.php">View all Notifications</a>
                                    </div>
                              </div>
                        </li>
                        <!-- /Notifications -->
                        <li class="nav-item dropdown has-arrow main-drop">
                              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <span class="user-img">
                                          <img src="{{ asset('/assets/img/province.png') }}" alt="">
                                          <span class="status online"></span></span>
                                    <span id="employee--fullname">{{ Auth::user()->employee->fullname }}</span>
                              </a>
                              <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('employee.personal.profile') }}">Account Setting</a>
                                    <form action="{{  route('logout') }}" method="POST">
                                          @csrf
                                          <button class="dropdown-item" style="outline-none;" type="submit">Logout</button>
                                    </form>
                              </div>
                        </li>
                  </ul>
                  <!-- /Header Menu -->
                  <!-- Mobile Menu -->
                  <div class="dropdown mobile-user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{ route('employee.personal.profile') }}">Account Setting</a>
                              <form action="{{  route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" style="outline-none;" type="submit">Logout</button>
                              </form>
                        </div>
                  </div>
                  <!-- /Mobile Menu -->
            </div>

            <!-- /Header -->
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                  <div class="sidebar-inner slimscroll">
                        <div id="sidebar-menu" class="sidebar-menu">
                              <ul>
                                    <li class="menu-title">
                                          <span>Main</span>
                                    </li>
                                    <li>
                                          <a class="" href="{{ route('employee.dashboard') }}">
                                                <i class="las la-tachometer-alt"></i>
                                                <span>Dashboard</span></a>
                                    </li>
                                    <li>
                                          <a class="" href="{{ route('employee.personal-data-sheet') }}">
                                                <i class='las la-file'></i>
                                                <span>Personal Data Sheet</span>
                                          </a>
                                    </li>
                                    <li class="submenu">
                                          <a href="#">
                                                <i class="las la-address-card"></i>
                                                <span> Leaves</span> <span class="menu-arrow"></span></a>
                                          <ul style="display: none;">
                                                <li><a class="" href="{{ route('employee.leave.application.filling') }}">Leave
                                                            Application Filling</a></li>
                                                <li>
                                                      <a class="" href="{{ route('employee.leave.card.index') }}">Leave Card</a>
                                                </li>
                                          </ul>
                                    </li>
                                    <li>
                                          <a class="" href="{{ route('employee.payslip') }}">
                                                <i class="las la-receipt"></i>
                                                <span>Payslip</span></a>
                                    </li>
                              </ul>
                        </div>
                  </div>
            </div>

            <!-- /Sidebar -->
            <!-- Page Wrapper -->
            <div class="page-wrapper">
                  <!-- Page Content -->
                  @yield('content')
                  <!-- /Page Content -->
            </div>
            <!-- /Page Wrapper -->
      </div>
      <!-- /Main Wrapper -->
      <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @stack('page-scripts')
</body>

</html>
