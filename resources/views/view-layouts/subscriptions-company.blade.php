﻿<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Subscriptions - HRMS admin template</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="assets/css/line-awesome.min.css">
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
			@include('layouts/includes/header')
             <!-- /Header -->
             <!-- Sidebar -->
			@include('layouts/includes/sidebar')
		 <!-- /Sidebar -->
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Page Content -->
			<div class="content container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-8 col-4">
							<h3 class="page-title">Subscriptions</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Subscriptions</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<!-- Plan Tab -->
						<div class="row justify-content-center mb-4">
							<div class="col-auto">
								<nav class="nav btn-group">
									<a href="#monthly" class="btn btn-outline-secondary active show" data-toggle="tab">Monthly Plan</a>
									<a href="#annual" class="btn btn-outline-secondary" data-toggle="tab">Annual Plan</a>
								</nav>
							</div>
						</div>
						<!-- /Plan Tab -->
						<!-- Plan Tab Content -->
						<div class="tab-content">
							<!-- Monthly Tab -->
							<div class="tab-pane fade active show" id="monthly">
								<div class="row mb-30 equal-height-cards">
									<div class="col-md-4">
										<div class="card pricing-box">
											<div class="card-body d-flex flex-column">
												<div class="mb-4">
													<h3>Free</h3>
													<span class="display-4">$0</span>
												</div>
												<ul>
													<li><i class="fa fa-check"></i> <b>1 User</b></li>
													<li><i class="fa fa-check"></i> 5 Projects </li>
													<li><i class="fa fa-check"></i> 5 GB Storage</li>
													<li><i class="fa fa-check"></i> Unlimited Message</li>
												</ul>
												<a href="#" class="btn btn-lg btn-success mt-auto">Current Plan</a>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card pricing-box">
											<div class="card-body d-flex flex-column">
												<div class="mb-4">
													<h3>Professional</h3>
													<span class="display-4">$21</span>
													<span>/mo</span>
												</div>
												<ul>
													<li><i class="fa fa-check"></i> <b>30 Users</b></li>
													<li><i class="fa fa-check"></i> 50 Projects</li>
													<li><i class="fa fa-check"></i> 100 GB Storage</li>
													<li><i class="fa fa-check"></i> Unlimited Message</li>
													<li><i class="fa fa-check"></i> 24/7 Customer Support</li>
												</ul>
												<a href="#" class="btn btn-lg btn-outline-secondary mt-auto">Upgrade</a>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card pricing-box">
											<div class="card-body d-flex flex-column">
												<div class="mb-4">
													<h3>Enterprise</h3>
													<span class="display-4">$38</span>
													<span>/mo</span>
												</div>
												<ul>
													<li><i class="fa fa-check"></i> <b>Unlimited Users </b></li>
													<li><i class="fa fa-check"></i> Unlimited Projects</li>
													<li><i class="fa fa-check"></i> 500 GB Storage</li>
													<li><i class="fa fa-check"></i> Unlimited Message</li>
													<li><i class="fa fa-check"></i> Voice and Video Call</li>
													<li><i class="fa fa-check"></i> 24/7 Customer Support</li>
												</ul>
												<a href="#" class="btn btn-lg btn-outline-secondary mt-auto">Upgrade</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Monthly Tab -->
							<!-- Yearly Tab -->
							<div class="tab-pane fade" id="annual">
								<div class="row mb-30 equal-height-cards">
									<div class="col-md-4">
										<div class="card pricing-box">
											<div class="card-body d-flex flex-column">
												<div class="mb-4">
													<h3>Free</h3>
													<span class="display-4">$0</span>
												</div>
												<ul>
													<li><i class="fa fa-check"></i> <b>1 User</b></li>
													<li><i class="fa fa-check"></i> 5 Projects </li>
													<li><i class="fa fa-check"></i> 5 GB Storage</li>
												</ul>
												<a href="#" class="btn btn-lg btn-outline-secondary mt-auto">Upgrade</a>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card pricing-box">
											<div class="card-body d-flex flex-column">
												<div class="mb-4">
													<h3>Professional</h3>
													<span class="display-4">$199</span>
													<span>/mo</span>
												</div>
												<ul>
													<li><i class="fa fa-check"></i> <b>30 Users</b></li>
													<li><i class="fa fa-check"></i> 50 Projects</li>
													<li><i class="fa fa-check"></i> 100 GB Storage</li>
													<li><i class="fa fa-check"></i> Unlimited Message</li>
													<li><i class="fa fa-check"></i> 24/7 Customer Support</li>
												</ul>
												<a href="#" class="btn btn-lg btn-outline-secondary mt-auto">Upgrade</a>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card pricing-box">
											<div class="card-body d-flex flex-column">
												<div class="mb-4">
													<h3>Enterprise</h3>
													<span class="display-4">$399</span>
													<span>/mo</span>
												</div>
												<ul>
													<li><i class="fa fa-check"></i> <b>Unlimited Users </b></li>
													<li><i class="fa fa-check"></i> Unlimited Projects</li>
													<li><i class="fa fa-check"></i> 500 GB Storage</li>
													<li><i class="fa fa-check"></i> Unlimited Message</li>
													<li><i class="fa fa-check"></i> Voice and Video Call</li>
													<li><i class="fa fa-check"></i> 24/7 Customer Support</li>
												</ul>
												<a href="#" class="btn btn-lg btn-outline-secondary mt-auto">Upgrade</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Yearly Tab -->
						</div>
						<!-- /Plan Tab Content -->
						<!-- Plan Details -->
						<div class="row">
							<div class="col-md-12">
								<div class="card card-table mb-0">
									<div class="card-header">
										<h4 class="card-title mb-0">Plan Transactions</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover table-center mb-0">
												<thead>
													<tr>
														<th>Plan</th>
														<th>Users</th>
														<th>Plan Duration</th>
														<th>Start Date</th>
														<th>End Date</th>
														<th>Amount</th>
														<th>Update Plan</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Free Trial</td>
														<td>30 Users</td>
														<td>1 Month</td>
														<td>9 Nov 2019</td>
														<td>8 Dec 2019</td>
														<td>$200.00</td>
														<td><a class="btn btn-primary btn-sm" href="javascript:void(0);">Change Plan</a></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Plan Details -->
					</div>
				</div>
			</div>
			<!-- /Page Content -->
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
	<!-- Custom JS -->
	<script src="assets/js/app.js"></script>
</body>

</html>