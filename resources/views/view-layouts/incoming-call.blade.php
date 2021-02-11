﻿<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Incoming Call - HRMS admin template</title>
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
		@include('layouts/includes/header');
		 <!-- /Header -->
		 <!-- Sidebar -->
		@include('layouts/includes/sidebar');
	 <!-- /Sidebar -->
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Incoming Call -->
			<div class="call-box incoming-box">
				<div class="call-wrapper">
					<div class="call-inner">
						<div class="call-user">
							<img class="call-avatar" src="assets/img/profiles/avatar-11.jpg" alt="">
							<h4>Wilmer Deluna</h4>
							<span>Calling ...</span>
						</div>
						<div class="call-items">
							<a href="chat.php" class="btn call-item call-end"><i class="material-icons">call_end</i></a>
							<a href="video-call.php" class="btn call-item call-start"><i class="material-icons">call</i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- /Incoming Call -->
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