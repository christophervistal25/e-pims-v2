﻿<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Contacts - HRMS admin template</title>
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
		 <!-- Header -->
			@include('layouts/includes/header');
             <!-- /Header -->
             <!-- Sidebar -->
			@include('layouts/includes/sidebar');
		 <!-- /Sidebar -->
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Contact Main Row -->
			<div class="chat-main-row">
				<!-- Contact Wrapper -->
				<div class="chat-main-wrapper">
					<div class="col-lg-12 message-view">
						<div class="chat-window">
							<div class="fixed-header">
								<div class="row">
									<div class="col-6">
										<h4 class="page-title mb-0">Contacts</h4>
									</div>
									<div class="col-6">
										<div class="navbar justify-content-end">
											<div class="search-box m-t-0">
												<div class="input-group input-group-sm">
													<input type="text" class="form-control" placeholder="Search">
													<span class="input-group-append">
														<button class="btn" type="button"><i class="fa fa-search"></i></button>
													</span>
												</div>
											</div>
											<ul class="nav float-right custom-menu">
												<li class="nav-item dropdown dropdown-action">
													<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="javascript:void(0)">Menu 1</a>
														<a class="dropdown-item" href="javascript:void(0)">Menu 2</a>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="chat-contents">
								<div class="chat-content-wrap">
									<div class="chat-wrap-inner">
										<div class="contact-box">
											<div class="row">
												<div class="contact-cat col-sm-4 col-lg-3">
													<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_contact"><i class="fa fa-plus"></i> Add Contact</a>
													<div class="roles-menu">
														<ul>
															<li class="active"><a href="javascript:void(0);">All</a></li>
															<li><a href="#">Company</a></li>
															<li><a href="#">Client</a></li>
															<li><a href="#">Staff</a></li>
														</ul>
													</div>
												</div>
												<div class="contacts-list col-sm-8 col-lg-9">
													<ul class="contact-list">
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-02.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">John Doe</span>
																	<span class="contact-date">Web Developer</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-09.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">Richard Miles</span>
																	<span class="contact-date">Web Developer</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-10.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">John Smith</span>
																	<span class="contact-date">Android Developer</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-05.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">Mike Litorus</span>
																	<span class="contact-date">IOS Developer</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-11.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">Wilmer Deluna</span>
																	<span class="contact-date">Team Leader</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-12.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">Jeffrey Warden</span>
																	<span class="contact-date">Web Developer</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-13.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">Bernardo Galaviz</span>
																	<span class="contact-date">Web Developer</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-01.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">Lesley Grauer</span>
																	<span class="contact-date">Team Leader</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-16.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">Jeffery Lalor</span>
																	<span class="contact-date">Team Leader</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
														<li>
															<div class="contact-cont">
																<div class="float-left user-img">
																	<a href="profile.php" class="avatar">
																		<img class="rounded-circle" alt="" src="assets/img/profiles/avatar-16.jpg">
																		<span class="status online"></span>
																	</a>
																</div>
																<div class="contact-info">
																	<span class="contact-name text-ellipsis">Loren Gatlin</span>
																	<span class="contact-date">Android Developer</span>
																</div>
																<ul class="contact-action">
																	<li class="dropdown dropdown-action">
																		<a href="" class="dropdown-toggle action-icon" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_contact">Edit</a>
																			<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_contact">Delete</a>
																		</div>
																	</li>
																</ul>
															</div>
														</li>
													</ul>
												</div>
												<div class="contact-alphapets">
													<div class="alphapets-inner">
														<a href="#">A</a>
														<a href="#">B</a>
														<a href="#">C</a>
														<a href="#">D</a>
														<a href="#">E</a>
														<a href="#">F</a>
														<a href="#">G</a>
														<a href="#">H</a>
														<a href="#">I</a>
														<a href="#">J</a>
														<a href="#">K</a>
														<a href="#">L</a>
														<a href="#">M</a>
														<a href="#">N</a>
														<a href="#">O</a>
														<a href="#">P</a>
														<a href="#">Q</a>
														<a href="#">R</a>
														<a href="#">S</a>
														<a href="#">T</a>
														<a href="#">U</a>
														<a href="#">V</a>
														<a href="#">W</a>
														<a href="#">X</a>
														<a href="#">Y</a>
														<a href="#">Z</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Contact Wrapper -->
			</div>
			<!-- /Contact Main Row -->
			<!-- Add Contact Modal -->
			<div class="modal custom-modal fade" id="add_contact" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Contact</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="email">
								</div>
								<div class="form-group">
									<label>Contact Number <span class="text-danger">*</span></label>
									<input class="form-control" type="text">
								</div>
								<div class="form-group">
									<label class="d-block">Status</label>
									<div class="status-toggle">
										<input type="checkbox" id="contact_status" class="check">
										<label for="contact_status" class="checktoggle">checkbox</label>
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
			<!-- /Add Contact Modal -->
			<!-- Edit Contact Modal -->
			<div class="modal custom-modal fade" id="edit_contact" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Contact</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text" value="John Doe">
								</div>
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" type="email" value="johndoe@example.com">
								</div>
								<div class="form-group">
									<label>Contact Number <span class="text-danger">*</span></label>
									<input class="form-control" type="text" value="9876543210">
								</div>
								<div class="form-group">
									<label class="d-block">Status</label>
									<div class="status-toggle">
										<input type="checkbox" id="edit_contact_status" class="check">
										<label for="edit_contact_status" class="checktoggle">checkbox</label>
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
			<!-- /Edit Contact Modal -->
			<!-- Delete Contact Modal -->
			<div class="modal custom-modal fade" id="delete_contact" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Contact</h3>
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
			<!-- /Delete Contact Modal -->
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