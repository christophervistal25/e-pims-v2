﻿<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Goal - HRMS admin template</title>
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
	<!-- Datatable CSS -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
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
		 @include('layouts/includes/header');
		 <!-- /Header -->
		 <!-- Sidebar -->
		@include('layouts/includes/sidebar');
	 <!-- /Sidebar -->
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Page Content -->
			<div class="content container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Goal Tracking</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Goal Tracking</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_goal"><i class="fa fa-plus"></i> Add New</a>
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
										<th style="width: 30px;">#</th>
										<th>Goal Type</th>
										<th>Subject</th>
										<th>Target Achievement</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Description </th>
										<th>Status </th>
										<th>Progress </th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Event Goal</td>
										<td>Test Goal</td>
										<td>Lorem ipsum dollar</td>
										<td>
											7 May 2019
										</td>
										<td>10 May 2019</td>
										<td>Lorem ipsum dollar</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> Active
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td>
											<p class="mb-1">Completed 73%</p>
											<div class="progress" style="height:5px">
												<div class="progress-bar bg-primary progress-sm" style="width: 73%;height:10px;"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_goal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_goal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Invoice Goal</td>
										<td>Test Goal</td>
										<td>Lorem ipsum dollar</td>
										<td>
											7 May 2019
										</td>
										<td>10 May 2019</td>
										<td>Lorem ipsum dollar</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Inactive
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td>
											<p class="mb-1">Completed 100%</p>
											<div class="progress" style="height:5px">
												<div class="progress-bar bg-primary progress-sm" style="width: 100%;height:10px;"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_goal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_goal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Employee Goal</td>
										<td>Test Goal</td>
										<td>Lorem ipsum dollar</td>
										<td>
											7 May 2019
										</td>
										<td>10 May 2019</td>
										<td>Lorem ipsum dollar</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> Active
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td>
											<p class="mb-1">Completed 73%</p>
											<div class="progress" style="height:5px">
												<div class="progress-bar bg-primary progress-sm" style="width: 73%;height:10px;"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_goal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_goal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Invoice Goal</td>
										<td>Test Goal</td>
										<td>Lorem ipsum dollar</td>
										<td>
											7 May 2019
										</td>
										<td>10 May 2019</td>
										<td>Lorem ipsum dollar</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> Active
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td>
											<p class="mb-1">Completed 73%</p>
											<div class="progress" style="height:5px">
												<div class="progress-bar bg-primary progress-sm" style="width: 73%;height:10px;"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_goal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_goal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Project Goal</td>
										<td>Test Goal</td>
										<td>Lorem ipsum dollar</td>
										<td>
											7 May 2019
										</td>
										<td>10 May 2019</td>
										<td>Lorem ipsum dollar</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> Active
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td>
											<p class="mb-1">Completed 73%</p>
											<div class="progress" style="height:5px">
												<div class="progress-bar bg-primary progress-sm" style="width: 73%;height:10px;"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_goal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_goal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
			<!-- Add Goal Modal -->
			<div id="add_goal" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Goal Tracking</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label class="col-form-label">Goal Type</label>
											<select class="select">
												<option>Invoice Goal</option>
												<option>Event Goal</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Subject</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Target Achievement</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Start Date <span class="text-danger">*</span></label>
											<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>End Date <span class="text-danger">*</span></label>
											<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Description <span class="text-danger">*</span></label>
											<textarea class="form-control" rows="4"></textarea>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label class="col-form-label">Status</label>
											<select class="select">
												<option>Active</option>
												<option>Inactive</option>
											</select>
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
			<!-- /Add Goal Modal -->
			<!-- Edit Goal Modal -->
			<div id="edit_goal" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Goal Tracking</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label class="col-form-label">Goal Type</label>
											<select class="select">
												<option selected="">Invoice Goal</option>
												<option>Event Goal</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Subject</label>
											<input class="form-control" type="text" value="Test Goal">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-form-label">Target Achievement</label>
											<input class="form-control" type="text" value="Lorem ipsum dollar">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Start Date <span class="text-danger">*</span></label>
											<div class="cal-icon"><input class="form-control datetimepicker" value="01-01-2019" type="text"></div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>End Date <span class="text-danger">*</span></label>
											<div class="cal-icon"><input class="form-control datetimepicker" value="01-01-2019" type="text"></div>
										</div>
									</div>
									<div class="col-sm-12 mb-3">
										<div class="form-group">
											<label for="customRange">Progress</label>
											<input type="range" class="form-control-range custom-range" id="customRange">
											<div class="mt-2" id="result">Progress Value: <b></b></div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Description <span class="text-danger">*</span></label>
											<textarea class="form-control" rows="4">Lorem ipsum dollar</textarea>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label class="col-form-label">Status</label>
											<select class="select">
												<option>Active</option>
												<option>Inactive</option>
											</select>
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
			<!-- /Edit Goal Modal -->
			<!-- Delete Goal Modal -->
			<div class="modal custom-modal fade" id="delete_goal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Goal Tracking List</h3>
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
			<!-- /Delete Goal Modal -->
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
	<script>
	$(document).ready(function() {
		// Read value on page load
		$("#result b").php($("#customRange").val());

		// Read value on change
		$("#customRange").change(function() {
			$("#result b").php($(this).val());
		});
	});
	</script>
</body>
</html>