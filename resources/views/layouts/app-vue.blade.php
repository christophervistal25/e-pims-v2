<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
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
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('/js/app.js') }}" defer></script>
    @stack('page-css')

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

    </style>

</head>
<body class="mini-sidebar">
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
                    <img src="{{ asset('/assets/img/province.png') }}" alt="" height="50" width="50">
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
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img src="{{ asset('/assets/img/province.png') }}" alt="">
                            <span class="status online"></span></span>
                        <span>{{  auth()->user()->username }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('administrator.profile') }}">My Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
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
                    <a class="dropdown-item" href="{{ route('administrator.profile') }}">My Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
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
                        <li>
                            <a class='text-decoration-none' href='/administrator/dashboard'>
                                <i class="las la-tachometer-alt"></i> <span>Dashboard</span></a>
                            </a>
                        </li>
                        <li class="menu-title">
                            <span>Personal Information Module</span>
                        </li>
                        <li>
                            <a class='text-decoration-none' href="{{ route('employee.index') }}">
                                <i class="la la-users"></i> <span> Employees </span>
                            </a>
                        </li>
                        <li>
                            <a class='text-decoration-none' href="{{ route('employees-birthday.index') }}">
                                <i class="la la-birthday-cake"></i> <span> Employee's Birthday </span>
                            </a>
                        </li>
                        <li class="menu-title">
                            <span>Human Resource Module</span>
                        </li>


                        {{-- <li class="submenu">
                            <a href="#" class='text-decoration-none'><i class="la la-home"></i> <span> Leave Management </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li>
                                    <a class='text-decoration-none mr-2' href="{{ route('leave.application.filling') }}">
                                        Leave Application Filing</a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="{{ route('leave.leave-list') }}">
                                        Leave List
                                        @if($no_of_pending_leave_list !== 0)
                                        <div class="float-right">
                                            <span class='badge badge-danger'>{{ $no_of_pending_leave_list }}</span>
                                        </div>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="{{  route('leave-recall.index') }}">
                                        Leave Recall, Cancel or Transfer
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="{{  route('leave-monitoring.index') }}">
                                        Leave Monitoring Index
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="{{  route('leave-starting-balance.index') }}">
                                        Leave Starting Balance
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="{{  route('leave-forwarded-balance.index') }}">
                                        Leave Forwaded Balance
                                    </a>
                                </li>
                                <li>
                                    <a class='text-decoration-none mr-2' href="{{  route('compensatory-build-up.index') }}">
                                        Compensatory Build-up
                                    </a>
                                </li>
                            </ul>
                        </li> --}}


                        <li class="submenu">
                            <a href="#" class='text-decoration-none'><i class="la la-bookmark"></i> <span>Plantilla</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">

                                <li>
                                    <a class='text-decoration-none' href="{{  route('plantilla-of-position.index') }}"> <span>Plantilla of Position</span></a>
                                </li>

                                <li>
                                    <a class='text-decoration-none' href="{{  route('plantilla-of-personnel.index') }}"> <span>Plantilla of Personnel</span></a>
                                </li>

                                <li>
                                    <a class='text-decoration-none mr-2' href="{{  route('step-increment.index') }}">
                                        Notice of Step Increment
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a class='text-decoration-none' href="javascript:void(0);"> <span>Salary Adjustment</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li>
                                            <a class='text-decoration-none' href="{{  route('salary-adjustment.index') }}">
                                                <span>Individual</span>
                                            </a>
                                            <a class='text-decoration-none' href="{{  route('salary-adjustment-per-office.index') }}">
                                                <span>Per Office</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        <li>
                            <a class='text-decoration-none' href="#" id="plantillaScheduleCreate">
                                <i class="las la-book-medical"></i>
                                <span> Plantilla Schedule <span @class([ 'badge' , 'badge-primary' , 'd-none'=> $no_of_employees_for_plantilla_schedule === 0
                                        ])
                                        class='badge badge-primary'>{{ $no_of_employees_for_plantilla_schedule }}</span> </span>
                            </a>
                        </li>

                        <li>
                            <a class='text-decoration-none' href="{{ route('promotion.index') }}">
                                <i class="las la-sort-amount-up"></i> <span>Promotions</span>
                            </a>
                        </li>



                        <li>
                            <a class='text-decoration-none' href="{{ route('service-records.index') }}">
                                <i class="la la-bars"></i> <span>Service Record</span>
                            </a>
                        </li>

                        <li class="submenu">
                            <a href="#" class='text-decoration-none'><i class="la la-cog"></i> <span>Maintenance</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li>
                                    <a class='text-decoration-none' href="{{ route('users.index') }}">
                                        Users
                                    </a>
                                    <a class='text-decoration-none' href="{{ route('salary-grade.index') }}">
                                        Salary Grade
                                    </a>
                                    <a class='text-decoration-none mr-2' href="{{ route('maintenance-position.index') }}">
                                        Position
                                    </a>
                                    <a class='text-decoration-none mr-2' href="{{ route('maintenance-office.index') }}">
                                        Office
                                    </a>
                                    <a class='text-decoration-none mr-2' href="{{ route('maintenance-division.index') }}">
                                        Division
                                    </a>
                                    <a class='text-decoration-none mr-2' href="{{ route('leave.index') }}">
                                        Leave Types
                                    </a>
                                    {{-- <a class='text-decoration-none mr-2' href="{{ route('employee.leave.increment') }}">
                                        Leave Increment
                                    </a> --}}
                                </li>
                            </ul>
                        </li>


                        <li class="menu-title">
                            <span class="text-capitalize"> Reports</span>
                        </li>

                        <li>
                            <a class='text-decoration-none' href='{{ route('plantilla.report.index') }}'>
                                <i class="las la-file-excel"></i> <span>Plantilla</span></a>
                            </a>
                        </li>


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
    {{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

    </style>
    <script src="{{ asset('/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/socket.io.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script>
        const EMPLOYEE_ID = "{{ Auth::user()->Employee_id }}";

        const conectionString = "{{ env('MIX_SOCKET_IP') }}";
        let socket = io.connect(conectionString, {
            query: "name=e-PIMS"
        });
        socket.on(`PUBLISH_DONE_SECOND_${EMPLOYEE_ID}`, function() {
            window.open(`/prints/download-personal-data-sheet-pdf/${EMPLOYEE_ID}-E-PDS`);
            $('#selectFilExportModal').modal('toggle');
            $('#btn-download-status').fadeOut().hide();
        });

    </script>
    @stack('page-scripts')
</body>

</html>
