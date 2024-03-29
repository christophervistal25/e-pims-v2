﻿<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Attendance - HRMS admin template</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
	<!-- Main Stylesheet -->
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
			@include('layouts/includes/header');
             <!-- /Header -->
             <!-- Sidebar -->
			@include('layouts/includes/sidebar');
		 <!-- /Sidebar -->
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Attendance</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Attendance</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-4">
						<div class="card punch-status">
							<div class="card-body">
								<h5 class="card-title">Timesheet <small class="text-muted">11 Mar 2019</small></h5>
								<div class="punch-det">
									<h6>Punch In at</h6>
									<p>Wed, 11th Mar 2019 10.00 AM</p>
								</div>
								<div class="punch-info">
									<div class="punch-hours">
										<span>3.45 hrs</span>
									</div>
								</div>
								<div class="punch-btn-section">
									<button type="button" class="btn btn-primary punch-btn">Punch Out</button>
								</div>
								<div class="statistics">
									<div class="row">
										<div class="col-md-6 col-6 text-center">
											<div class="stats-box">
												<p>Break</p>
												<h6>1.21 hrs</h6>
											</div>
										</div>
										<div class="col-md-6 col-6 text-center">
											<div class="stats-box">
												<p>Overtime</p>
												<h6>3 hrs</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card att-statistics">
							<div class="card-body">
								<h5 class="card-title">Statistics</h5>
								<div class="stats-list">
									<div class="stats-info">
										<p>Today <strong>3.45 <small>/ 8 hrs</small></strong></p>
										<div class="progress">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="stats-info">
										<p>This Week <strong>28 <small>/ 40 hrs</small></strong></p>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="stats-info">
										<p>This Month <strong>90 <small>/ 160 hrs</small></strong></p>
										<div class="progress">
											<div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="stats-info">
										<p>Remaining <strong>90 <small>/ 160 hrs</small></strong></p>
										<div class="progress">
											<div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="stats-info">
										<p>Overtime <strong>4</strong></p>
										<div class="progress">
											<div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card recent-activity">
							<div class="card-body">
								<h5 class="card-title">Today Activity</h5>
								<ul class="res-activity-list">
									<li>
										<p class="mb-0">Punch In at</p>
										<p class="res-activity-time">
											<i class="fa fa-clock-o"></i>
											10.00 AM.
										</p>
									</li>
									<li>
										<p class="mb-0">Punch Out at</p>
										<p class="res-activity-time">
											<i class="fa fa-clock-o"></i>
											11.00 AM.
										</p>
									</li>
									<li>
										<p class="mb-0">Punch In at</p>
										<p class="res-activity-time">
											<i class="fa fa-clock-o"></i>
											11.15 AM.
										</p>
									</li>
									<li>
										<p class="mb-0">Punch Out at</p>
										<p class="res-activity-time">
											<i class="fa fa-clock-o"></i>
											1.30 PM.
										</p>
									</li>
									<li>
										<p class="mb-0">Punch In at</p>
										<p class="res-activity-time">
											<i class="fa fa-clock-o"></i>
											2.00 PM.
										</p>
									</li>
									<li>
										<p class="mb-0">Punch Out at</p>
										<p class="res-activity-time">
											<i class="fa fa-clock-o"></i>
											7.30 PM.
										</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Search Filter -->
				<div class="row filter-row">
					<div class="col-sm-3">
						<div class="form-group form-focus">
							<div class="cal-icon">
								<input type="text" class="form-control floating datetimepicker">
							</div>
							<label class="focus-label">Date</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group form-focus select-focus">
							<select class="select floating">
								<option>-</option>
								<option>Jan</option>
								<option>Feb</option>
								<option>Mar</option>
								<option>Apr</option>
								<option>May</option>
								<option>Jun</option>
								<option>Jul</option>
								<option>Aug</option>
								<option>Sep</option>
								<option>Oct</option>
								<option>Nov</option>
								<option>Dec</option>
							</select>
							<label class="focus-label">Select Month</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group form-focus select-focus">
							<select class="select floating">
								<option>-</option>
								<option>2019</option>
								<option>2018</option>
								<option>2017</option>
								<option>2016</option>
								<option>2015</option>
							</select>
							<label class="focus-label">Select Year</label>
						</div>
					</div>
					<div class="col-sm-3">
						<a href="#" class="btn btn-success btn-block"> Search </a>
					</div>
				</div>
				<!-- /Search Filter -->
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0">
								<thead>
									<tr>
										<th>#</th>
										<th>Date </th>
										<th>Punch In</th>
										<th>Punch Out</th>
										<th>Production</th>
										<th>Break</th>
										<th>Overtime</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>19 Feb 2019</td>
										<td>10 AM</td>
										<td>7 PM</td>
										<td>9 hrs</td>
										<td>1 hrs</td>
										<td>0</td>
									</tr>
									<tr>
										<td>2</td>
										<td>20 Feb 2019</td>
										<td>10 AM</td>
										<td>7 PM</td>
										<td>9 hrs</td>
										<td>1 hrs</td>
										<td>0</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
		</div>
		<!-- Page Wrapper -->
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
	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>
</html>