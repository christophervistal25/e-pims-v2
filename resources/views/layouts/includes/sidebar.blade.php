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
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index'){echo 'active'; }else { echo ''; } ?>" href="index">Admin Dashboard</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'employee-dashboard'){echo 'active'; }else { echo ''; } ?>" href="employee-dashboard">Employee Dashboard</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'chat'){echo 'active'; }else { echo ''; } ?>" href="chat">Chat</a></li>
						<li class="submenu">
							<a href="#"><span> Calls</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'voice-call'){echo 'active'; }else { echo ''; } ?>" href="voice-call">Voice Call</a></li>
								<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'video-call'){echo 'active'; }else { echo ''; } ?>" href="video-call">Video Call</a></li>
								<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'outgoing-call'){echo 'active'; }else { echo ''; } ?>" href="outgoing-call">Outgoing Call</a></li>
								<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'incoming-call'){echo 'active'; }else { echo ''; } ?>" href="incoming-call">Incoming Call</a></li>
							</ul>
						</li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'events'){echo 'active'; }else { echo ''; } ?>" href="events">Calendar</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'contacts'){echo 'active'; }else { echo ''; } ?>" href="contacts">Contacts</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'inbox'){echo 'active'; }else { echo ''; } ?>" href="inbox">Email</a></li>

					</ul>
				</li>
				<li class="menu-title">
					<span>Employees</span>
				</li>
				<li class="submenu">
					<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'employees'){echo 'active'; }else { echo ''; } ?>" href="employees">All Employees</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'holidays'){echo 'active'; }else { echo ''; } ?>" href="holidays">Holidays</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'leaves'){echo 'active'; }else { echo ''; } ?>" href="leaves">Leaves (Admin) <span class="badge badge-pill bg-primary float-right">1</span></a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'leaves-employee'){echo 'active'; }else { echo ''; } ?>" href="leaves-employee">Leaves (Employee)</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'leave-settings'){echo 'active'; }else { echo ''; } ?>" href="leave-settings">Leave Settings</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'attendance'){echo 'active'; }else { echo ''; } ?>" href="attendance">Attendance (Admin)</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'attendance-employee'){echo 'active'; }else { echo ''; } ?>" href="attendance-employee">Attendance (Employee)</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'departments'){echo 'active'; }else { echo ''; } ?>" href="departments">Departments</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'designations'){echo 'active'; }else { echo ''; } ?>" href="designations">Designations</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'timesheet'){echo 'active'; }else { echo ''; } ?>" href="timesheet">Timesheet</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'overtime'){echo 'active'; }else { echo ''; } ?>" href="overtime">Overtime</a></li>
					</ul>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index'){echo 'active'; }else { echo ''; } ?>" href="clients"><i class="la la-users"></i> <span>Clients</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'projects'){echo 'active'; }else { echo ''; } ?>" href="projects">Projects</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'tasks'){echo 'active'; }else { echo ''; } ?>" href="tasks">Tasks</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'task-board'){echo 'active'; }else { echo ''; } ?>" href="task-board">Task Board</a></li>
					</ul>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'leads'){echo 'active'; }else { echo ''; } ?>" href="leads"><i class="la la-user-secret"></i> <span>Leads</span></a>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'tickets'){echo 'active'; }else { echo ''; } ?>" href="tickets"><i class="la la-ticket"></i> <span>Tickets</span></a>
				</li>
				<li class="menu-title">
					<span>HR</span>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-files-o"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'estimates'){echo 'active'; }else { echo ''; } ?>" href="estimates">Estimates</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'invoices'){echo 'active'; }else { echo ''; } ?>" href="invoices">Invoices</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'payments'){echo 'active'; }else { echo ''; } ?>" href="payments">Payments</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'expenses'){echo 'active'; }else { echo ''; } ?>" href="expenses">Expenses</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'provident-fund'){echo 'active'; }else { echo ''; } ?>" href="provident-fund">Provident Fund</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'taxes'){echo 'active'; }else { echo ''; } ?>" href="taxes">Taxes</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'salary'){echo 'active'; }else { echo ''; } ?>" href="salary"> Employee Salary </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'salary-view'){echo 'active'; }else { echo ''; } ?>" href="salary-view"> Payslip </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'payroll-items'){echo 'active'; }else { echo ''; } ?>" href="payroll-items"> Payroll Items </a></li>
					</ul>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'policies'){echo 'active'; }else { echo ''; } ?>" href="policies"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'expense-reports'){echo 'active'; }else { echo ''; } ?>" href="expense-reports"> Expense Report </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'invoice-reports'){echo 'active'; }else { echo ''; } ?>" href="invoice-reports"> Invoice Report </a></li>
					</ul>
				</li>
				<li class="menu-title">
					<span>Performance</span>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'performance-indicator'){echo 'active'; }else { echo ''; } ?>" href="performance-indicator"> Performance Indicator </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'performance'){echo 'active'; }else { echo ''; } ?>" href="performance"> Performance Review </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'performance-appraisal'){echo 'active'; }else { echo ''; } ?>" href="performance-appraisal"> Performance Appraisal </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-crosshairs"></i> <span> Goals </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'goal-tracking'){echo 'active'; }else { echo ''; } ?>" href="goal-tracking"> Goal List </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'goal-type'){echo 'active'; }else { echo ''; } ?>" href="goal-type"> Goal Type </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'training'){echo 'active'; }else { echo ''; } ?>" href="training"> Training List </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'trainers'){echo 'active'; }else { echo ''; } ?>" href="trainers"> Trainers</a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'training-type'){echo 'active'; }else { echo ''; } ?>" href="training-type"> Training Type </a></li>
					</ul>
				</li>
				<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'promotion'){echo 'active'; }else { echo ''; } ?>" href="promotion"><i class="la la-bullhorn"></i> <span>Promotion</span></a></li>
				<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'resignation'){echo 'active'; }else { echo ''; } ?>" href="resignation"><i class="la la-external-link-square"></i> <span>Resignation</span></a></li>
				<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'termination'){echo 'active'; }else { echo ''; } ?>" href="termination"><i class="la la-times-circle"></i> <span>Termination</span></a></li>
				<li class="menu-title">
					<span>Administration</span>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'assets'){echo 'active'; }else { echo ''; } ?>" href="assets"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'jobs'){echo 'active'; }else { echo ''; } ?>" href="jobs"> Manage Jobs </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'job-applicants'){echo 'active'; }else { echo ''; } ?>" href="job-applicants"> Applied Candidates </a></li>
					</ul>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'knowledgebase'){echo 'active'; }else { echo ''; } ?>" href="knowledgebase"><i class="la la-question"></i> <span>Knowledgebase</span></a>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'activities'){echo 'active'; }else { echo ''; } ?>" href="activities"><i class="la la-bell"></i> <span>Activities</span></a>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'users'){echo 'active'; }else { echo ''; } ?>" href="users"><i class="la la-user-plus"></i> <span>Users</span></a>
				</li>
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'settings'){echo 'active'; }else { echo ''; } ?>" href="settings"><i class="la la-cog"></i> <span>Settings</span></a>
				</li>
				<li class="menu-title">
					<span>Pages</span>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'profile'){echo 'active'; }else { echo ''; } ?>" href="profile"> Employee Profile </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'client-profile'){echo 'active'; }else { echo ''; } ?>" href="client-profile"> Client Profile </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-key"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="login"> Login </a></li>
						<li><a href="register"> Register </a></li>
						<li><a href="forgot-password"> Forgot Password </a></li>
						<li><a href="otp"> OTP </a></li>
						<li><a href="lock-screen"> Lock Screen </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-exclamation-triangle"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="error-404">404 Error </a></li>
						<li><a href="error-500">500 Error </a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-hand-o-up"></i> <span> Subscriptions </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'subscriptions'){echo 'active'; }else { echo ''; } ?>" href="subscriptions"> Subscriptions (Admin) </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'subscriptions-company'){echo 'active'; }else { echo ''; } ?>" href="subscriptions-company"> Subscriptions (Company) </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'subscribed-companies'){echo 'active'; }else { echo ''; } ?>" href="subscribed-companies"> Subscribed Companies</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="la la-columns"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'search'){echo 'active'; }else { echo ''; } ?>" href="search"> Search </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'faq'){echo 'active'; }else { echo ''; } ?>" href="faq"> FAQ </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'terms'){echo 'active'; }else { echo ''; } ?>" href="terms"> Terms </a></li>
						<li><a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'privacy-policy'){echo 'active'; }else { echo ''; } ?>" href="privacy-policy"> Privacy Policy </a></li>
						<li><a href="blank-page"> Blank Page </a></li>
					</ul>
				</li>

			</ul>
		</div>
	</div>
</div>
