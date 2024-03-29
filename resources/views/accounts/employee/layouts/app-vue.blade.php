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
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet"> --}}
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/line-awesome.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

    </style>
    @stack('page-css')


</head>
<body class="{{ $class ?? '' }}">
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
                    <img src="{{ asset('/assets/img/logo.png') }}" alt="">
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
                <a href="/" class='text-decoration-none'>
                    <h3>{{ config('app.name') }}</h3>
                </a>
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
                            <a class="" href="{{  route('employee.dashboard') }}">
                                <i class="las la-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a class="" href="{{ route('employee.personal-data-sheet') }}">
                                <i class="las la-file"></i>
                                <span>Personal Data Sheet</span></a>
                        </li>
                        <li>
                            <a class="" href="https://lms.phrmosds.ph/" target="_blank">
                                <i class="las la-suitcase-rolling"></i>
                                <span>Leave</span>
                            </a>
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
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-slimscroll@1.3.8/jquery.slimscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.min.js" integrity="sha512-fB746S+jyTdN2LSWbYSGP2amFYId226wpOeV4ApumcDpIttPxvk1ZPOgnwqwQziRAtZkiFJVx9F64GLAtoIlCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/socket.io.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script>
        const EMPLOYEE_ID = "{{ Auth::user()->Employee_id }}";

        const fullname = "{{ Auth::user()->employee->fullname }}";
        const ID = "{{ Auth::user()->employee_id }}";

        let socket = io.connect("{{ env('MIX_SOCKET_IP') }}", {
            query: `id=${ID}&fullName=${fullname}`
        });

        let printCertificate = () => {
            const window_title = "LEAVE_CERTIFICATE";
            let fullname = "Christopher P. Vistal";

            $.ajax({
                url: '/leave-certification-print'
                , success: function(response) {
                    if (response.success) {
                        socket.emit('preview_leave_certification', {
                            arguments: `${fullname}|${window_title}`
                        })
                    }
                }
            });
        }

        socket.on(`PUBLISH_DONE_SECOND_${EMPLOYEE_ID}`, function() {
            window.open(`/prints/download-personal-data-sheet-pdf/${EMPLOYEE_ID}-E-PDS`);
            $('#selectFilExportModal').modal('toggle');
            $('#btn-download-status').fadeOut().hide();
        });

    </script>
    @stack('page-scripts')

</body>


</html>
