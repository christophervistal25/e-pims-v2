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
				<li>
					<a class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index'){echo 'active'; }else { echo ''; } ?>" href="clients"><i class="la la-users"></i> <span>Clients</span></a>
				</li>
			</ul>
		</div>
	</div>
</div>
