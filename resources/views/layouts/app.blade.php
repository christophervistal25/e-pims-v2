<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="SmarthrBootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="DreamguysBootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="leave-list-route" content="{{ route('leave.leave-list') }}">

    @stack('meta-data')
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/img/favicon.png') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/assets/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/assets/css/line-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('page-css')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

    </style>
</head>

{{-- mini-sidebar --}}
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
    <div id='app' class="main-wrapper">
        <!-- Header -->
        <div class="header">
            <!-- Logo -->
            <div class="header-left">
                <a href="/" class="logo">
                    <img src="/assets/img/logo.png">
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
                <a class='text-decoration-none' href="/">
                    <h3>
                        {{ config('app.name') }}
                    </h3>
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
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                        <span>Admin</span>
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
                            <span class="text-capitalize">Personal Information Module</span>
                        </li>
                        <li>
                            <a class='text-decoration-none' href="{{ route('employee.index') }}">
                                <i class="la la-users"></i> <span> Employees </span>
                            </a>
                        </li>
                        <li>
                            <a class='text-decoration-none' href="{{ route('employees-birthday.index') }}?from={{ date('m-d') }}&to={{ date('m-d') }}">
                                <i class="las la-birthday-cake"></i> <span> Employee's Birthday </span>
                            </a>
                        </li>
                        {{-- <li>
                            <a class='text-decoration-none' href="{{ route('data.index') }}">
                        <i class="la la-file-text"></i> <span> Personal Data Sheet </span>
                        </a>
                        </li> --}}
                        <li class="menu-title">
                            <span class="text-capitalize">Human Resource Module</span>
                        </li>
                        <li class="submenu">
                            <a href="#" class='text-decoration-none'><i class="la la-home"></i> <span> Leave Management </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                {{-- <li>
                                    <a class='text-decoration-none mr-2' href="{{ route('leave.application.filling') }}">
                                Leave Application Filing</a>
                        </li> --}}
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
                        {{-- <li>
                                    <a class='text-decoration-none mr-2' href="{{  route('leave-recall.index') }}">
                        Leave Recall, Cancel or Transfer
                        </a>
                        </li> --}}
                        <li>
                            <a class='text-decoration-none mr-2' href="{{  route('leave-monitoring.index') }}">
                                Leave Monitoring Index
                            </a>
                        </li>
                        {{-- <li>
                                    <a class='text-decoration-none mr-2' href="{{  route('leave-starting-balance.index') }}">
                        Leave Starting Balance
                        </a>
                        </li> --}}
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
                    </li>

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
                            <span> Plantilla of Schedule <span @class([ 'badge' , 'badge-primary' , 'd-none'=> $no_of_employees_for_plantilla_schedule === 0
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
                                <a class='text-decoration-none mr-2' href="{{ route('holiday.index') }}">
                                    Holiday
                                </a>
                                <a class='text-decoration-none mr-2' href="{{ route('leave.index') }}">
                                    Leave
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu-title">
                        <span class="text-capitalize"> Reports</span>
                    </li>

                    <li>
                        <a class='text-decoration-none' href='{{ route('show-plantilla-report') }}'>
                            <i class="las la-file-excel"></i> <span>Plantilla</span></a>
                        </a>
                    </li>

                    {{-- <li class="submenu">
                              <a href="#" class="text-decoration-none"><i class="la la-folder"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
                              <ul>
                                   <li>
                                        <a href="{{ route('show-plantilla-report') }}" class="text-decoration-none" >Plantilla</a>
                    </li>
                    </ul>
                    </li> --}}


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
                                <li class="breadcrumb-item"><a href="/administrator/dashboard">Dashboard</a></li>
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

            <!-- Modal -->
            <div class="modal fade" id="plantillaCreateScheduleModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <span class="modal-title" id="plantillaCreateScheduleTitle">
                                Create Plantilla Schedule for Year :
                                <strong>
                                    {{ date('Y') }}
                                </strong>
                            </span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info">
                                No. of Employees doesn't have plantilla schedule for year <strong> <i>{{ date('Y') }}</i> </strong> :
                                <strong>
                                    {{ $no_of_employees_for_plantilla_schedule }}
                                </strong>
                            </div>
                        </div>
                        <div class="modal-footer">
                            @if($no_of_employees_for_plantilla_schedule != 0)
                            <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary text-white" id="btnCreatePlantillaScheduleModal">
                                <div class="spinner-border text-light spinner-border-sm" id='spinner-create-plantilla-schedule' role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Create Plantilla Schedule
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.min.js" integrity="sha512-eiqtDDb4GUVCSqOSOTz/s/eiU4B31GrdSb17aPAA4Lv/Cjc8o+hnDvuNkgXhSI5yHuDvYkuojMaQmrB5JB31XQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.socket.io/3.1.1/socket.io.min.js" integrity="sha384-gDaozqUvc4HTgo8iZjwth73C6dDDeOJsAgpxBcMpZYztUfjHXpzrpdrHRdVp8ySO" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <script>
        const conectionString = "{{ env('MIX_SOCKET_IP') }}";
        let socket = io.connect(conectionString);

        $('#plantillaScheduleCreate').click(function() {
            $('#plantillaCreateScheduleModal').modal('toggle');
        });

        $('#spinner-create-plantilla-schedule').hide();

        $('#btnCreatePlantillaScheduleModal').click(function() {
            $('#btnCreatePlantillaScheduleModal').attr('disabled', true);
            $('#spinner-create-plantilla-schedule').show();
            $.ajax({
                url: '/bulk-plantilla-of-schedule-generate'
                , method: 'POST'
                , success: function(response) {
                    if (response.success) {
                        $('#plantillaCreateScheduleModal').modal('toggle');
                        $('#btnCreatePlantillaScheduleModal').removeAttr('disabled');
                        $('#spinner-create-plantilla-schedule').hide();
                        swal({
                            title: ''
                            , text: 'Successfully generate plantilla schedule for this year'
                            , icon: 'success'
                            , buttons: false
                        , });
                    }
                }
            });
        });

    </script>
    @stack('page-scripts')
</body>
</html>
