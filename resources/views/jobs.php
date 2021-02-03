﻿<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Jobs - HRMS admin template</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper">
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
				<h3>Dreamguy's Technologies</h3>
			</div>
			<!-- /Header Title -->
			<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
			<!-- Header Menu -->
			<ul class="nav user-menu">
				<!-- Search -->
				<li class="nav-item">
					<div class="top-nav-search">
						<a href="javascript:void(0);" class="responsive-search">
							<i class="fa fa-search"></i>
						</a>
						<form action="search.php">
							<input class="form-control" type="text" placeholder="Search here">
							<button class="btn" type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</li>
				<!-- /Search -->
				<!-- Flag -->
				<li class="nav-item dropdown has-arrow flag-nav">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
						<img src="assets/img/flags/us.png" alt="" height="20"> <span>English</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="assets/img/flags/us.png" alt="" height="16"> English
						</a>
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="assets/img/flags/fr.png" alt="" height="16"> French
						</a>
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="assets/img/flags/es.png" alt="" height="16"> Spanish
						</a>
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="assets/img/flags/de.png" alt="" height="16"> German
						</a>
					</div>
				</li>
				<!-- /Flag -->
				<!-- Notifications -->
				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="activities.php">
										<div class="media">
											<span class="avatar">
												<img alt="" src="assets/img/profiles/avatar-02.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.php">
										<div class="media">
											<span class="avatar">
												<img alt="" src="assets/img/profiles/avatar-03.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
												<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.php">
										<div class="media">
											<span class="avatar">
												<img alt="" src="assets/img/profiles/avatar-06.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.php">
										<div class="media">
											<span class="avatar">
												<img alt="" src="assets/img/profiles/avatar-17.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
												<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="activities.php">
										<div class="media">
											<span class="avatar">
												<img alt="" src="assets/img/profiles/avatar-13.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
												<p class="noti-time"><span class="notification-time">2 days ago</span></p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="activities.php">View all Notifications</a>
						</div>
					</div>
				</li>
				<!-- /Notifications -->
				<!-- Message Notifications -->
				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fa fa-comment-o"></i> <span class="badge badge-pill">8</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Messages</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="chat.php">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-09.jpg">
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
									<a href="chat.php">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-02.jpg">
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
									<a href="chat.php">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-03.jpg">
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
									<a href="chat.php">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-05.jpg">
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
									<a href="chat.php">
										<div class="list-item">
											<div class="list-left">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-08.jpg">
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
							<a href="chat.php">View all Messages</a>
						</div>
					</div>
				</li>
				<!-- /Message Notifications -->
				<li class="nav-item dropdown has-arrow main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img src="assets/img/profiles/avatar-21.jpg" alt="">
							<span class="status online"></span></span>
						<span>Admin</span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.php">My Profile</a>
						<a class="dropdown-item" href="settings.php">Settings</a>
						<a class="dropdown-item" href="login.php">Logout</a>
					</div>
				</li>
			</ul>
			<!-- /Header Menu -->
			<!-- Mobile Menu -->
			<div class="dropdown mobile-user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="profile.php">My Profile</a>
					<a class="dropdown-item" href="settings.php">Settings</a>
					<a class="dropdown-item" href="login.php">Logout</a>
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
						<li class="submenu">
							<a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="index.php">Admin Dashboard</a></li>
								<li><a href="employee-dashboard.php">Employee Dashboard</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="chat.php">Chat</a></li>
								<li class="submenu">
									<a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
									<ul style="display: none;">
										<li><a href="voice-call.php">Voice Call</a></li>
										<li><a href="video-call.php">Video Call</a></li>
										<li><a href="outgoing-call.php">Outgoing Call</a></li>
										<li><a href="incoming-call.php">Incoming Call</a></li>
									</ul>
								</li>
								<li><a href="events.php">Calendar</a></li>
								<li><a href="contacts.php">Contacts</a></li>
								<li><a href="inbox.php">Email</a></li>
								<li><a href="file-manager.php">File Manager</a></li>
							</ul>
						</li>
						<li class="menu-title">
							<span>Employees</span>
						</li>
						<li class="submenu">
							<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="employees.php">All Employees</a></li>
								<li><a href="holidays.php">Holidays</a></li>
								<li><a href="leaves.php">Leaves (Admin) <span class="badge badge-pill bg-primary float-right">1</span></a></li>
								<li><a href="leaves-employee.php">Leaves (Employee)</a></li>
								<li><a href="leave-settings.php">Leave Settings</a></li>
								<li><a href="attendance.php">Attendance (Admin)</a></li>
								<li><a href="attendance-employee.php">Attendance (Employee)</a></li>
								<li><a href="departments.php">Departments</a></li>
								<li><a href="designations.php">Designations</a></li>
								<li><a href="timesheet.php">Timesheet</a></li>
								<li><a href="overtime.php">Overtime</a></li>
							</ul>
						</li>
						<li>
							<a href="clients.php"><i class="la la-users"></i> <span>Clients</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="projects.php">Projects</a></li>
								<li><a href="tasks.php">Tasks</a></li>
								<li><a href="task-board.php">Task Board</a></li>
							</ul>
						</li>
						<li>
							<a href="leads.php"><i class="la la-user-secret"></i> <span>Leads</span></a>
						</li>
						<li>
							<a href="tickets.php"><i class="la la-ticket"></i> <span>Tickets</span></a>
						</li>
						<li class="menu-title">
							<span>HR</span>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-files-o"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="estimates.php">Estimates</a></li>
								<li><a href="invoices.php">Invoices</a></li>
								<li><a href="payments.php">Payments</a></li>
								<li><a href="expenses.php">Expenses</a></li>
								<li><a href="provident-fund.php">Provident Fund</a></li>
								<li><a href="taxes.php">Taxes</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="salary.php"> Employee Salary </a></li>
								<li><a href="salary-view.php"> Payslip </a></li>
								<li><a href="payroll-items.php"> Payroll Items </a></li>
							</ul>
						</li>
						<li>
							<a href="policies.php"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="expense-reports.php"> Expense Report </a></li>
								<li><a href="invoice-reports.php"> Invoice Report </a></li>
							</ul>
						</li>
						<li class="menu-title">
							<span>Performance</span>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="performance-indicator.php"> Performance Indicator </a></li>
								<li><a href="performance.php"> Performance Review </a></li>
								<li><a href="performance-appraisal.php"> Performance Appraisal </a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="goal-tracking.php"> Goal List </a></li>
								<li><a href="goal-type.php"> Goal Type </a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="training.php"> Training List </a></li>
								<li><a href="trainers.php"> Trainers</a></li>
								<li><a href="training-type.php"> Training Type </a></li>
							</ul>
						</li>
						<li><a href="promotion.php"><i class="la la-bullhorn"></i> <span>Promotion</span></a></li>
						<li><a href="resignation.php"><i class="la la-external-link-square"></i> <span>Resignation</span></a></li>
						<li><a href="termination.php"><i class="la la-times-circle"></i> <span>Termination</span></a></li>
						<li class="menu-title">
							<span>Administration</span>
						</li>
						<li>
							<a href="assets.php"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a class="active" href="jobs.php"> Manage Jobs </a></li>
								<li><a href="job-applicants.php"> Applied Candidates </a></li>
							</ul>
						</li>
						<li>
							<a href="knowledgebase.php"><i class="la la-question"></i> <span>Knowledgebase</span></a>
						</li>
						<li>
							<a href="activities.php"><i class="la la-bell"></i> <span>Activities</span></a>
						</li>
						<li>
							<a href="users.php"><i class="la la-user-plus"></i> <span>Users</span></a>
						</li>
						<li>
							<a href="settings.php"><i class="la la-cog"></i> <span>Settings</span></a>
						</li>
						<li class="menu-title">
							<span>Pages</span>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="profile.php"> Employee Profile </a></li>
								<li><a href="client-profile.php"> Client Profile </a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-key"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="login.php"> Login </a></li>
								<li><a href="register.php"> Register </a></li>
								<li><a href="forgot-password.php"> Forgot Password </a></li>
								<li><a href="otp.php"> OTP </a></li>
								<li><a href="lock-screen.php"> Lock Screen </a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-exclamation-triangle"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="error-404.php">404 Error </a></li>
								<li><a href="error-500.php">500 Error </a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-hand-o-up"></i> <span> Subscriptions </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="subscriptions.php"> Subscriptions (Admin) </a></li>
								<li><a href="subscriptions-company.php"> Subscriptions (Company) </a></li>
								<li><a href="subscribed-companies.php"> Subscribed Companies</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-columns"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="search.php"> Search </a></li>
								<li><a href="faq.php"> FAQ </a></li>
								<li><a href="terms.php"> Terms </a></li>
								<li><a href="privacy-policy.php"> Privacy Policy </a></li>
								<li><a href="blank-page.php"> Blank Page </a></li>
							</ul>
						</li>
						<li class="menu-title">
							<span>UI Interface</span>
						</li>
						<li>
							<a href="components.php"><i class="la la-puzzle-piece"></i> <span>Components</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-object-group"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="form-basic-inputs.php">Basic Inputs </a></li>
								<li><a href="form-input-groups.php">Input Groups </a></li>
								<li><a href="form-horizontal.php">Horizontal Form </a></li>
								<li><a href="form-vertical.php"> Vertical Form </a></li>
								<li><a href="form-mask.php"> Form Mask </a></li>
								<li><a href="form-validation.php"> Form Validation </a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="tables-basic.php">Basic Tables </a></li>
								<li><a href="data-tables.php">Data Table </a></li>
							</ul>
						</li>
						<li class="menu-title">
							<span>Extras</span>
						</li>
						<li>
							<a href="#"><i class="la la-file-text"></i> <span>Documentation</span></a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="la la-info"></i> <span>Change Log</span> <span class="badge badge-primary ml-auto">v3.4</span></a>
						</li>
						<li class="submenu">
							<a href="javascript:void(0);"><i class="la la-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li class="submenu">
									<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
									<ul style="display: none;">
										<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
										<li class="submenu">
											<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
											<ul style="display: none;">
												<li><a href="javascript:void(0);">Level 3</a></li>
												<li><a href="javascript:void(0);">Level 3</a></li>
											</ul>
										</li>
										<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
									</ul>
								</li>
								<li>
									<a href="javascript:void(0);"> <span>Level 1</span></a>
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
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Jobs</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Jobs</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_job"><i class="fa fa-plus"></i> Add Job</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 datatable">
								<thead>
									<tr>
										<th>#</th>
										<th>Job Title</th>
										<th>Department</th>
										<th>Start Date</th>
										<th>Expire Date</th>
										<th class="text-center">Job Type</th>
										<th class="text-center">Status</th>
										<th>Applicants</th>
										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td><a href="job-details.php">Web Developer</a></td>
										<td>Development</td>
										<td>3 Mar 2019</td>
										<td>31 May 2019</td>
										<td class="text-center">
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Full Time
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Full Time</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Part Time</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Internship</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Temporary</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Other</a>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Open
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Open</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Closed</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Cancelled</a>
												</div>
											</div>
										</td>
										<td><a href="job-applicants.php" class="btn btn-sm btn-primary">3 Candidates</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item" data-toggle="modal" data-target="#edit_job"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_job"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td><a href="job-details.php">Web Designer</a></td>
										<td>Designing</td>
										<td>3 Mar 2019</td>
										<td>31 May 2019</td>
										<td class="text-center">
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> Part Time
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Full Time</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Part Time</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Internship</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Temporary</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Other</a>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> Closed
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Open</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Closed</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Cancelled</a>
												</div>
											</div>
										</td>
										<td><a href="job-applicants.php" class="btn btn-sm btn-primary">2 Candidates</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item" data-toggle="modal" data-target="#edit_job"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_job"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td><a href="job-details.php">Android Developer</a></td>
										<td>Android</td>
										<td>3 Mar 2019</td>
										<td>31 May 2019</td>
										<td class="text-center">
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Internship
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Full Time</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Part Time</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Internship</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Temporary</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Other</a>
												</div>
											</div>
										</td>
										<td class="text-center">
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Cancelled
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Open</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Closed</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Cancelled</a>
												</div>
											</div>
										</td>
										<td><a href="job-applicants.php" class="btn btn-sm btn-primary">1 Candidates</a></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" class="dropdown-item" data-toggle="modal" data-target="#edit_job"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_job"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
			<!-- Add Job Modal -->
			<div id="add_job" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Job</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Job Title</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Department</label>
											<select class="select">
												<option>-</option>
												<option>Web Development</option>
												<option>Application Development</option>
												<option>IT Management</option>
												<option>Accounts Management</option>
												<option>Support Management</option>
												<option>Marketing</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Job Location</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>No of Vacancies</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Experience</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Age</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Salary From</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Salary To</label>
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Job Type</label>
											<select class="select">
												<option>Full Time</option>
												<option>Part Time</option>
												<option>Internship</option>
												<option>Temporary</option>
												<option>Remote</option>
												<option>Others</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>
											<select class="select">
												<option>Open</option>
												<option>Closed</option>
												<option>Cancelled</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Start Date</label>
											<input type="text" class="form-control datetimepicker">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Expired Date</label>
											<input type="text" class="form-control datetimepicker">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control"></textarea>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Job Modal -->
			<!-- Edit Job Modal -->
			<div id="edit_job" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Job</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Job Title</label>
											<input class="form-control" type="text" value="Web Developer">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Department</label>
											<select class="select">
												<option>-</option>
												<option selected="">Web Development</option>
												<option>Application Development</option>
												<option>IT Management</option>
												<option>Accounts Management</option>
												<option>Support Management</option>
												<option>Marketing</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Job Location</label>
											<input class="form-control" type="text" value="California">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>No of Vacancies</label>
											<input class="form-control" type="text" value="5">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Experience</label>
											<input class="form-control" type="text" value="2 Years">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Age</label>
											<input class="form-control" type="text" value="-">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Salary From</label>
											<input type="text" class="form-control" value="32k">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Salary To</label>
											<input type="text" class="form-control" value="38k">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Job Type</label>
											<select class="select">
												<option selected="">Full Time</option>
												<option>Part Time</option>
												<option>Internship</option>
												<option>Temporary</option>
												<option>Remote</option>
												<option>Others</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>
											<select class="select">
												<option selected="">Open</option>
												<option>Closed</option>
												<option>Cancelled</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Start Date</label>
											<input type="text" class="form-control datetimepicker" value="3 Mar 2019">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Expired Date</label>
											<input type="text" class="form-control datetimepicker" value="31 May 2019">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control"></textarea>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Job Modal -->
			<!-- Delete Job Modal -->
			<div class="modal custom-modal fade" id="delete_job" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Job</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Job Modal -->
		</div>
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->
	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Slimscroll JS -->
	<script src="assets/js/jquery.slimscroll.min.js"></script>
	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>
	<!-- Datatable JS -->
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap4.min.js"></script>
	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>
</html>