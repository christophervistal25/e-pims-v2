﻿<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Events - HRMS admin template</title>
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
	<!-- Calendar CSS -->
	<link rel="stylesheet" href="assets/css/fullcalendar.min.css">
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
		<?php 
		include_once 'includes/header.php';
		// <!-- /Header -->
		// <!-- Sidebar -->
		include_once 'includes/sidebar.php';
		// <!-- /Sidebar -->
		?>
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Page Content -->
			<div class="content container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Events</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Events</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_event"><i class="fa fa-plus"></i> Add Event</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card mb-0">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<!-- Calendar -->
										<div id="calendar"></div>
										<!-- /Calendar -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
			<!-- Add Event Modal -->
			<div id="add_event" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Event</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Event Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group">
									<label>Event Date <span class="text-danger">*</span></label>
									<div class="cal-icon">
										<input class="form-control datetimepicker" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Category</label>
									<select class="select form-control">
										<option>Danger</option>
										<option>Success</option>
										<option>Purple</option>
										<option>Primary</option>
										<option>Pink</option>
										<option>Info</option>
										<option>Inverse</option>
										<option>Orange</option>
										<option>Brown</option>
										<option>Teal</option>
										<option>Warning</option>
									</select>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Event Modal -->
			<!-- Event Modal -->
			<div class="modal custom-modal fade" id="event-modal">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Event</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body"></div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-success submit-btn save-event">Create event</button>
							<button type="button" class="btn btn-danger submit-btn delete-event" data-dismiss="modal">Delete</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /Event Modal -->
			<!-- Add Category Modal-->
			<div class="modal custom-modal fade" id="add-category">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add a category</h4>
						</div>
						<div class="modal-body p-20">
							<form>
								<div class="row">
									<div class="col-md-6">
										<label class="col-form-label">Category Name</label>
										<input class="form-control" placeholder="Enter name" type="text" name="category-name">
									</div>
									<div class="col-md-6">
										<label class="col-form-label">Choose Category Color</label>
										<select class="form-control" data-placeholder="Choose a color..." name="category-color">
											<option value="success">Success</option>
											<option value="danger">Danger</option>
											<option value="info">Info</option>
											<option value="pink">Pink</option>
											<option value="primary">Primary</option>
											<option value="warning">Warning</option>
											<option value="orange">Orange</option>
											<option value="brown">Brown</option>
											<option value="teal">Teal</option>
										</select>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-danger save-category" data-dismiss="modal">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /Add Category Modal-->
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
	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Calendar JS -->
	<script src="assets/js/jquery-ui.min.js"></script>
	<script src="assets/js/fullcalendar.min.js"></script>
	<script src="assets/js/jquery.fullcalendar.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>
</html>