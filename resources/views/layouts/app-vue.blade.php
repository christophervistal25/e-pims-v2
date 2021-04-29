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
    <title>@yield('title') | e-Pims</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

    </style>
	@stack('page-css')

    
</head>

<body>
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
    <!-- Main Wrapper -->
    <div class="main-wrapper" id="app">
        <!-- Header -->
        <div class="header">
            <!-- Logo -->
            <div class="header-left">
                <a href="/" class="logo">
                    {{-- <img src=/assets/img/logo.png" width="40" height="40" alt=""> --}}
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
                <h3>e-PIMS</h3>
            </div>
            <!-- /Header Title -->
            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
            <!-- Header Menu -->
            <ul class="nav user-menu">
                <!-- Message Notifications -->
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link d-none" data-toggle="dropdown">
                        <i class="fa fa-comment-o"></i> <span class="badge badge-pill">8</span>
                    </a>
                    <div class="dropdown-menu notifications d-none">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Messages</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    {{-- <img alt="" src="/assets/img/profiles/avatar-09.jpg"> --}}
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Richard Miles </span>
                                                <span class="message-time">12:28 AM</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="/assets/img/profiles/avatar-02.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">John Doe</span>
                                                <span class="message-time">6 Mar</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="/assets/img/profiles/avatar-03.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Tarah Shropshire </span>
                                                <span class="message-time">5 Mar</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="/assets/img/profiles/avatar-05.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Mike Litorus</span>
                                                <span class="message-time">3 Mar</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="chat.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar">
                                                    <img alt="" src="/assets/img/profiles/avatar-08.jpg">
                                                </span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author"> Catherine Manseau </span>
                                                <span class="message-time">27 Feb</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="chat.html">View all Messages</a>
                        </div>
                    </div>
                </li>
                <!-- /Message Notifications -->
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            {{-- <img src=/assets/img/profiles/avatar-21.jpg" alt=""> --}}
                            <span class="status online"></span></span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="settings.html">Settings</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
            <!-- /Header Menu -->
            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
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
                            <span>Personal Information Module</span>
                        </li>
                        <li>
                            <a class='text-decoration-none' href="{{ route('employee.index') }}">
                                <i class="fa fa-user text-sm "></i> <span> Employees </span>
                            </a>
                        </li>
                        <li>
                            <a class='text-decoration-none' href="{{ route('data.index') }}">
                                <i class="fa fa-file-excel text-sm" aria-hidden="true"></i> <span> Personal Data Sheet
                                </span>
                            </a>
                        </li>
                        <li class="menu-title">
                            <span>Human Resource Module</span>
                        </li>
                        <li class="submenu">
                            <a href="#" class='text-decoration-none'><i class="fas fa-house-user text-sm"></i> <span>
                                    Leave Management </span> <i
                                    class="ml-3 fas fa-caret-down text-sm text-right"></i></a>
                            <ul style="display: none;">
                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Leave Application Filling</a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Leave Recall, Cancel or Transfer
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Leave Index Monitoring
                                    </a>
                                </li>

                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Leave Starting Balance
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Leave Forwaded Balance
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Compensatory Build-up
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="submenu">
                            <a href="#" class='text-decoration-none'><i class="fas fa-address-card text-sm"></i>
                                <span>Service Record</span> <i
                                    class="ml-3 fas fa-caret-down text-sm text-right"></i></a>
                            <ul style="display: none;">
                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Maintenance & Monitoring
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#" class='text-decoration-none'><i class="fas fa-bookmark text-sm"></i>
                                <span>Plantilla of Position</span> <i
                                    class="ml-3 fas fa-caret-down text-sm text-right"></i></a>
                            <ul style="display: none;">
                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Plantilla of Position
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Plantilla of Personnel
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Notice of Step Increment
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a class='text-decoration-none' href="javascript:void(0);"> <span>Salary Adjustment
                                            Individual</span> <i
                                            class="ml-3 fas fa-caret-down text-sm text-right"></i></a>
                                    <ul style="display: none;">
                                        <li>
                                            <a class='text-decoration-none' href="javascript:void(0);">
                                                <span>Per Office</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a class='text-decoration-none' href="javascript:void(0);"> <span>Step
                                            Increment</span> <i
                                            class="ml-3 fas fa-caret-down text-sm text-right"></i></a>
                                    <ul style="display: none;">
                                        <li>
                                            <a class='text-decoration-none' href="javascript:void(0);">
                                                <span>Add Increment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class='text-decoration-none' href="javascript:void(0);">
                                                <span>Print Increment</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">@yield('title')</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <!-- Content Starts -->
                @yield('content')
                <!-- /Content End -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    @stack('page-scripts')
</body>

</html>
