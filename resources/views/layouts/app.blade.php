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
	<title>@yield('title') |  e-Pims</title>
	{{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/img/favicon.png') }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"> --}}
	<link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-datetimepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    @stack('page-css')
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class='mini-sidebar'>
	<!-- Main Wrapper -->
	<div class="main-wrapper" id="app">
		<!-- Header -->
		<div class="header">
			<!-- Logo -->
			<div class="header-left">
				<a href="index.html" class="logo">
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
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
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
						<li class="submenu">
							<a href="#" class='text-decoration-none'><i class="la la-users"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li>
                                    <a class='text-decoration-none' href="{{ route('employee.index') }}">
                                        List of Employee
                                    </a>
                                </li>
								<li>
                                    <a class='text-decoration-none' href="#">
                                        Print Employee
                                    </a>
                                </li>
							</ul>
						</li>

                        <li class="submenu">
							<a href="#" class='text-decoration-none'><i class="la la-file-text"></i> <span> Personal Data Sheet </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li>
                                    <a class='text-decoration-none' href="{{ route('data.index') }}">
                                        Generate PDS
                                    </a>
                                </li>
								<li><a class='text-decoration-none' href="#">Update PDS</a></li>
								<li><a class='text-decoration-none' href="#">Print PDS</a></li>
							</ul>
						</li>

						<li class="menu-title">
							<span>Human Resource Module</span>
						</li>
						<li class="submenu">
							<a href="#" class='text-decoration-none'><i class="la la-home"></i> <span> Leave Management </span> <span class="menu-arrow"></span></a>
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
							<a href="#" class='text-decoration-none'><i class="la la-bars"></i> <span>Service Record</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li>
                                    <a class='text-decoration-none mr-2' href="#">
                                        Maintenance & Monitoring
                                    </a>
                                </li>
							</ul>
						</li>

                        <li class="submenu">
							<a href="#" class='text-decoration-none'><i class="la la-bookmark"></i> <span>Plantilla of Position</span> <span class="menu-arrow"></span></a>
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
									<a  class='text-decoration-none' href="javascript:void(0);"> <span>Salary Adjustment Individual</span> <span class="menu-arrow"></span></a>
									<ul style="display: none;">
										<li>
                                            <a class='text-decoration-none' href="javascript:void(0);">
                                                <span>Per Office</span>
                                            </a>
                                        </li>
									</ul>
								</li>
                                <li class="submenu">
									<a  class='text-decoration-none' href="javascript:void(0);"> <span>Step Increment</span> <span class="menu-arrow"></span></a>
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
	<script
	src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
	<script src="{{asset('/assets/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ asset('/assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/assets/js/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('/assets/js/select2.min.js') }}"></script>
	<script src="{{ asset('/assets/js/moment.min.js') }}"></script>
	<script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ asset('/assets/js/app.js') }}"></script>
	{{-- <script src="{{ asset('/assets/js/searchable.js') }}"></script> --}}
    @stack('page-scripts')
</body>
</html>
