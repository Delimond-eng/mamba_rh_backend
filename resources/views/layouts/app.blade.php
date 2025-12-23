<!DOCTYPE html>
<html lang="en" data-theme="light" data-sidebar="nightblue" data-color="lavared" data-topbar="white" data-layout="default" data-topbarcolor="maroon" data-card="bordered" data-size="default" data-width="fluid" data-loader="enable" style="--primary-rgb: 84, 109, 254; --sidebar-rgb: 84, 109, 254; --topbar-rgb: 84, 109, 254; --topbarcolor-rgb: 84, 109, 254;">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
	<meta name="author" content="Dreams technologies - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Mamba RH </title>

        <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/feather/feather.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-lite.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Bootstrap Tagsinput CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Color Picker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

	@stack("styles")

</head>

<body>

	<div id="global-loader">
		<div class="page-loader"></div>
	</div>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">
			<div class="main-header">

				<div class="header-left">
					<a href="index.html" class="logo">
						<img src="assets/img/logo.svg" alt="Logo">
					</a>
					<a href="index.html" class="dark-logo">
						<img src="assets/img/logo-white.svg" alt="Logo">
					</a>
				</div>

				<a id="mobile_btn" class="mobile_btn" href="#sidebar">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>

				<div class="header-user">
					<div class="nav user-menu nav-list">

						<div class="me-auto d-flex align-items-center" id="header-search">
							<a id="toggle_btn" href="javascript:void(0);" class="btn btn-menubar me-1">
								<i class="ti ti-arrow-bar-to-left"></i>
							</a>
							<!-- Search -->
							<div class="input-group input-group-flat d-inline-flex me-1">
								<span class="input-icon-addon">
									<i class="ti ti-search"></i>
								</span>
								<input type="text" class="form-control" placeholder="Search in HRMS">
								<span class="input-group-text">
									<kbd>CTRL + / </kbd>
								</span>
							</div>
							<!-- /Search -->
							<div class="dropdown crm-dropdown">
								<a href="#" class="btn btn-menubar me-1" data-bs-toggle="dropdown">
									<i class="ti ti-layout-grid"></i>
								</a>
								<div class="dropdown-menu dropdown-lg dropdown-menu-start">
									<div class="card mb-0 border-0 shadow-none">
										<div class="card-header">
											<h4>CRM</h4>
										</div>
										<div class="card-body pb-1">
											<div class="row">
												<div class="col-sm-6">
													<a href="contacts.html"
														class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-user-shield text-default me-2"></i>Contacts
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
													<a href="deals-grid.html"
														class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-heart-handshake text-default me-2"></i>Deals
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
													<a href="pipeline.html"
														class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i
																class="ti ti-timeline-event-text text-default me-2"></i>Pipeline
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
												</div>
												<div class="col-sm-6">
													<a href="companies-grid.html"
														class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-building text-default me-2"></i>Companies
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
													<a href="leads-grid.html"
														class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-user-check text-default me-2"></i>Leads
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
													<a href="activity.html"
														class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
														<span class="d-flex align-items-center me-3">
															<i class="ti ti-activity text-default me-2"></i>Activities
														</span>
														<i class="ti ti-arrow-right"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a href="profile-settings.html" class="btn btn-menubar">
								<i class="ti ti-settings-cog"></i>
							</a>
						</div>

						<!-- Horizontal Single -->
						<div class="sidebar sidebar-horizontal" id="horizontal-single">
							<div class="sidebar-menu">
								<div class="main-menu">
									<ul class="nav-menu">
										<li class="menu-title">
											<span>Main</span>
										</li>
										<li class="submenu">
											<a href="#" class="active">
												<i class="ti ti-smart-home"></i><span>Dashboard</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="index.html">Admin Dashboard</a></li>
												<li><a href="Agent-dashboard.html" class="active">Agent
														Dashboard</a></li>
													</ul>
										</li>

										<li class="submenu">
											<a href="#">
												<i class="ti ti-user-star"></i><span>Super Admin</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="dashboard.html">Dashboard</a></li>
												<li><a href="companies.html">Companies</a></li>
												<li><a href="subscription.html">Subscriptions</a></li>
												<li><a href="packages.html">Packages</a></li>
												<li><a href="domain.html">Domain</a></li>
												<li><a href="purchase-transaction.html">Purchase Transaction</a></li>
											</ul>
										</li>


										<li class="submenu">
											<a href="#">
												<i class="ti ti-user-star"></i><span>Projects</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li>
													<a href="clients-grid.html"><span>Clients</span>
													</a>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Projects</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="projects-grid.html">Projects</a></li>
														<li><a href="tasks.html">Tasks</a></li>
														<li><a href="task-board.html">Task Board</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="call.html">Crm<span class="menu-arrow"></span></a>
													<ul>
														<li><a href="contacts-grid.html"><span>Contacts</span></a></li>
														<li><a href="companies-grid.html"><span>Companies</span></a>
														</li>
														<li><a href="deals-grid.html"><span>Deals</span></a></li>
														<li><a href="leads-grid.html"><span>Leads</span></a></li>
														<li><a href="pipeline.html"><span>Pipeline</span></a></li>
														<li><a href="analytics.html"><span>Analytics</span></a></li>
														<li><a href="activity.html"><span>Activities</span></a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Agents</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="Agents.html">Agent Lists</a></li>
														<li><a href="Agents-grid.html">Agent Grid</a></li>
														<li><a href="Agent-details.html">Agent Details</a></li>
														<li><a href="departments.html">Departments</a></li>
														<li><a href="designations.html">Designations</a></li>
														<li><a href="policy.html">Policies</a></li>
														<li><a href="{{ url('/baremes') }}">Barèmes</a></li>
														<li><a href="{{ url('/agent-bareme') }}">Affectation Barème</a></li>
														<li><a href="{{ url('/appels-non-repondu') }}">Appels non répondus</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Tickets</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="tickets.html">Tickets</a></li>
														<li><a href="ticket-details.html">Ticket Details</a></li>
													</ul>
												</li>
												<li><a href="holidays.html"><span>Holidays</span></a></li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Attendance</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);">Leaves<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="leaves.html">Leaves (Admin)</a></li>
																<li><a href="leaves-Agent.html">Leave (Agent)</a>
																</li>
																<li><a href="leave-settings.html">Leave Settings</a>
																</li>
															</ul>
														</li>
														<li><a href="attendance-admin.html">Attendance (Admin)</a></li>
														<li><a href="attendance-Agent.html">Attendance (Agent)</a>
														</li>
														<li><a href="timesheets.html">Timesheets</a></li>
														<li><a href="schedule-timing.html">Shift & Schedule</a></li>
														<li><a href="overtime.html">Overtime</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Performance</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="performance-indicator.html">Performance
																Indicator</a></li>
														<li><a href="performance-review.html">Performance Review</a>
														</li>
														<li><a href="performance-appraisal.html">Performance
																Appraisal</a></li>
														<li><a href="goal-tracking.html">Goal List</a></li>
														<li><a href="goal-type.html">Goal Type</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Training</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="training.html">Training List</a></li>
														<li><a href="trainers.html">Trainers</a></li>
														<li><a href="training-type.html">Training Type</a></li>
													</ul>
												</li>
												<li><a href="promotion.html"><span>Promotion</span></a></li>
												<li><a href="resignation.html"><span>Resignation</span></a></li>
												<li><a href="termination.html"><span>Termination</span></a></li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-user-star"></i><span>Administration</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Sales</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="estimates.html">Estimates</a></li>
														<li><a href="invoices.html">Invoices</a></li>
														<li><a href="payments.html">Payments</a></li>
														<li><a href="expenses.html">Expenses</a></li>
														<li><a href="provident-fund.html">Provident Fund</a></li>
														<li><a href="taxes.html">Taxes</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Accounting</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="categories.html">Categories</a></li>
														<li><a href="budgets.html">Budgets</a></li>
														<li><a href="budget-expenses.html">Budget Expenses</a></li>
														<li><a href="budget-revenues.html">Budget Revenues</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Payroll</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="Agent-salary.html">Agent Salary</a></li>
														<li><a href="payslip.html">Payslip</a></li>
														<li><a href="payroll.html">Payroll Items</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Assets</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="assets.html">Assets</a></li>
														<li><a href="asset-categories.html">Asset Categories</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Help & Supports</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="knowledgebase.html">Knowledge Base</a></li>
														<li><a href="activity.html">Activities</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>User Management</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="users.html">Users</a></li>
														<li><a href="roles-permissions.html">Roles & Permissions</a>
														</li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Reports</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li><a href="expenses-report.html">Expense Report</a></li>
														<li><a href="invoice-report.html">Invoice Report</a></li>
														<li><a href="payment-report.html">Payment Report</a></li>
														<li><a href="project-report.html">Project Report</a></li>
														<li><a href="task-report.html">Task Report</a></li>
														<li><a href="user-report.html">User Report</a></li>
														<li><a href="Agent-report.html">Agent Report</a></li>
														<li><a href="payslip-report.html">Payslip Report</a></li>
														<li><a href="attendance-report.html">Attendance Report</a></li>
														<li><a href="leave-report.html">Leave Report</a></li>
														<li><a href="daily-report.html">Daily Report</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Settings</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);">General Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="profile-settings.html">Profile</a></li>
																<li><a href="security-settings.html">Security</a></li>
																<li><a
																		href="notification-settings.html">Notifications</a>
																</li>
																<li><a href="connected-apps.html">Connected Apps</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Website Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="bussiness-settings.html">Business
																		Settings</a></li>
																<li><a href="seo-settings.html">SEO Settings</a></li>
																<li><a
																		href="localization-settings.html">Localization</a>
																</li>
																<li><a href="prefixes.html">Prefixes</a></li>
																<li><a href="preferences.html">Preferences</a></li>
																<li><a href="performance-appraisal.html">Appearance</a>
																</li>
																<li><a href="language.html">Language</a></li>
																<li><a
																		href="authentication-settings.html">Authentication</a>
																</li>
																<li><a href="ai-settings.html">AI Settings</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">App Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="salary-settings.html">Salary Settings</a>
																</li>
																<li><a href="approval-settings.html">Approval
																		Settings</a></li>
																<li><a href="invoice-settings.html">Invoice Settings</a>
																</li>
																<li><a href="leave-type.html">Leave Type</a></li>
																<li><a href="custom-fields.html">Custom Fields</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">System Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="email-settings.html">Email Settings</a>
																</li>
																<li><a href="email-template.html">Email Templates</a>
																</li>
																<li><a href="sms-settings.html">SMS Settings</a></li>
																<li><a href="sms-template.html">SMS Templates</a></li>
																<li><a href="otp-settings.html">OTP</a></li>
																<li><a href="gdpr.html">GDPR Cookies</a></li>
																<li><a href="maintenance-mode.html">Maintenance Mode</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Financial Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="payment-gateways.html">Payment Gateways</a>
																</li>
																<li><a href="tax-rates.html">Tax Rate</a></li>
																<li><a href="currencies.html">Currencies</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Other Settings<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="custom-css.html">Custom CSS</a></li>
																<li><a href="custom-js.html">Custom JS</a></li>
																<li><a href="cronjob.html">Cronjob</a></li>
																<li><a href="storage-settings.html">Storage</a></li>
																<li><a href="ban-ip-address.html">Ban IP Address</a>
																</li>
																<li><a href="backup.html">Backup</a></li>
																<li><a href="clear-cache.html">Clear Cache</a></li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li class="submenu">
											<a href="#">
												<i class="ti ti-page-break"></i><span>Pages</span>
												<span class="menu-arrow"></span>
											</a>
											<ul>
												<li><a href="starter.html"><span>Starter</span></a></li>
												<li><a href="profile.html"><span>Profile</span></a></li>
												<li><a href="gallery.html"><span>Gallery</span></a></li>
												<li><a href="search-result.html"><span>Search Results</span></a></li>
												<li><a href="timeline.html"><span>Timeline</span></a></li>
												<li><a href="pricing.html"><span>Pricing</span></a></li>
												<li><a href="coming-soon.html"><span>Coming Soon</span></a></li>
												<li><a href="under-maintenance.html"><span>Under Maintenance</span></a>
												</li>
												<li><a href="under-construction.html"><span>Under
															Construction</span></a></li>
												<li><a href="api-keys.html"><span>API Keys</span></a></li>
												<li><a href="privacy-policy.html"><span>Privacy Policy</span></a></li>
												<li><a href="terms-condition.html"><span>Terms & Conditions</span></a>
												</li>
												<li class="submenu">
													<a href="#"><span>Content</span> <span
															class="menu-arrow"></span></a>
													<ul>
														<li><a href="pages.html">Pages</a></li>
														<li class="submenu">
															<a href="javascript:void(0);">Blogs<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="blogs.html">All Blogs</a></li>
																<li><a href="blog-categories.html">Categories</a></li>
																<li><a href="blog-comments.html">Comments</a></li>
																<li><a href="blog-tags.html">Tags</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Locations<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="countries.html">Countries</a></li>
																<li><a href="states.html">States</a></li>
																<li><a href="cities.html">Cities</a></li>
															</ul>
														</li>
														<li><a href="testimonials.html">Testimonials</a></li>
														<li><a href="faq.html">FAQ’S</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="#">
														<span>Authentication</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);" class="">Login<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="login.html">Cover</a></li>
																<li><a href="login-2.html">Illustration</a></li>
																<li><a href="login-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);" class="">Register<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="register.html">Cover</a></li>
																<li><a href="register-2.html">Illustration</a></li>
																<li><a href="register-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu"><a href="javascript:void(0);">Forgot
																Password<span class="menu-arrow"></span></a>
															<ul>
																<li><a href="forgot-password.html">Cover</a></li>
																<li><a href="forgot-password-2.html">Illustration</a>
																</li>
																<li><a href="forgot-password-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Reset Password<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="reset-password.html">Cover</a></li>
																<li><a href="reset-password-2.html">Illustration</a>
																</li>
																<li><a href="reset-password-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">Email Verification<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="email-verification.html">Cover</a></li>
																<li><a href="email-verification-2.html">Illustration</a>
																</li>
																<li><a href="email-verification-3.html">Basic</a></li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">2 Step Verification<span
																	class="menu-arrow"></span></a>
															<ul>
																<li><a href="two-step-verification.html">Cover</a></li>
																<li><a
																		href="two-step-verification-2.html">Illustration</a>
																</li>
																<li><a href="two-step-verification-3.html">Basic</a>
																</li>
															</ul>
														</li>
														<li><a href="lock-screen.html">Lock Screen</a></li>
														<li><a href="error-404.html">404 Error</a></li>
														<li><a href="error-500.html">500 Error</a></li>
													</ul>
												</li>
												<li class="submenu">
													<a href="#">
														<span>UI Interface</span>
														<span class="menu-arrow"></span>
													</a>
													<ul>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-hierarchy-2"></i>
																<span>Base UI</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="ui-alerts.html">Alerts</a>
																</li>
																<li>
																	<a href="ui-accordion.html">Accordion</a>
																</li>
																<li>
																	<a href="ui-avatar.html">Avatar</a>
																</li>
																<li>
																	<a href="ui-badges.html">Badges</a>
																</li>
																<li>
																	<a href="ui-borders.html">Border</a>
																</li>
																<li>
																	<a href="ui-buttons.html">Buttons</a>
																</li>
																<li>
																	<a href="ui-buttons-group.html">Button Group</a>
																</li>
																<li>
																	<a href="ui-breadcrumb.html">Breadcrumb</a>
																</li>
																<li>
																	<a href="ui-cards.html">Card</a>
																</li>
																<li>
																	<a href="ui-carousel.html">Carousel</a>
																</li>
																<li>
																	<a href="ui-colors.html">Colors</a>
																</li>
																<li>
																	<a href="ui-dropdowns.html">Dropdowns</a>
																</li>
																<li>
																	<a href="ui-grid.html">Grid</a>
																</li>
																<li>
																	<a href="ui-images.html">Images</a>
																</li>
																<li>
																	<a href="ui-lightbox.html">Lightbox</a>
																</li>
																<li>
																	<a href="ui-media.html">Media</a>
																</li>
																<li>
																	<a href="ui-modals.html">Modals</a>
																</li>
																<li>
																	<a href="ui-offcanvas.html">Offcanvas</a>
																</li>
																<li>
																	<a href="ui-pagination.html">Pagination</a>
																</li>
																<li>
																	<a href="ui-popovers.html">Popovers</a>
																</li>
																<li>
																	<a href="ui-progress.html">Progress</a>
																</li>
																<li>
																	<a href="ui-placeholders.html">Placeholders</a>
																</li>
																<li>
																	<a href="ui-spinner.html">Spinner</a>
																</li>
																<li>
																	<a href="ui-sweetalerts.html">Sweet Alerts</a>
																</li>
																<li>
																	<a href="ui-nav-tabs.html">Tabs</a>
																</li>
																<li>
																	<a href="ui-toasts.html">Toasts</a>
																</li>
																<li>
																	<a href="ui-tooltips.html">Tooltips</a>
																</li>
																<li>
																	<a href="ui-typography.html">Typography</a>
																</li>
																<li>
																	<a href="ui-video.html">Video</a>
																</li>
																<li>
																	<a href="ui-sortable.html">Sortable</a>
																</li>
																<li>
																	<a href="ui-swiperjs.html">Swiperjs</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-hierarchy-3"></i>
																<span>Advanced UI</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="ui-ribbon.html">Ribbon</a>
																</li>
																<li>
																	<a href="ui-clipboard.html">Clipboard</a>
																</li>
																<li>
																	<a href="ui-drag-drop.html">Drag & Drop</a>
																</li>
																<li>
																	<a href="ui-rangeslider.html">Range Slider</a>
																</li>
																<li>
																	<a href="ui-rating.html">Rating</a>
																</li>
																<li>
																	<a href="ui-text-editor.html">Text Editor</a>
																</li>
																<li>
																	<a href="ui-counter.html">Counter</a>
																</li>
																<li>
																	<a href="ui-scrollbar.html">Scrollbar</a>
																</li>
																<li>
																	<a href="ui-stickynote.html">Sticky Note</a>
																</li>
																<li>
																	<a href="ui-timeline.html">Timeline</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-input-search"></i>
																<span>Forms</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li class="submenu submenu-two">
																	<a href="javascript:void(0);">Form Elements <span
																			class="menu-arrow inside-submenu"></span>
																	</a>
																	<ul>
																		<li>
																			<a href="form-basic-inputs.html">Basic
																				Inputs</a>
																		</li>
																		<li>
																			<a href="form-checkbox-radios.html">Checkbox
																				& Radios</a>
																		</li>
																		<li>
																			<a href="form-input-groups.html">Input
																				Groups</a>
																		</li>
																		<li>
																			<a href="form-grid-gutters.html">Grid &
																				Gutters</a>
																		</li>
																		<li>
																			<a href="form-select.html">Form Select</a>
																		</li>
																		<li>
																			<a href="form-mask.html">Input Masks</a>
																		</li>
																		<li>
																			<a href="form-fileupload.html">File
																				Uploads</a>
																		</li>
																	</ul>
																</li>
																<li class="submenu submenu-two">
																	<a href="javascript:void(0);">Layouts <span
																			class="menu-arrow inside-submenu"></span>
																	</a>
																	<ul>
																		<li>
																			<a href="form-horizontal.html">Horizontal
																				Form</a>
																		</li>
																		<li>
																			<a href="form-vertical.html">Vertical
																				Form</a>
																		</li>
																		<li>
																			<a href="form-floating-labels.html">Floating
																				Labels</a>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="form-validation.html">Form Validation</a>
																</li>

																<li>
																	<a href="form-select2.html">Select2</a>
																</li>
																<li>
																	<a href="form-wizard.html">Form Wizard</a>
																</li>
																<li>
																	<a href="form-pickers.html">Form Pickers</a>
																</li>

															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-table-plus"></i>
																<span>Tables</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="tables-basic.html">Basic Tables </a>
																</li>
																<li>
																	<a href="data-tables.html">Data Table </a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-chart-line"></i>
																<span>Charts</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="chart-apex.html">Apex Charts</a>
																</li>
																<li>
																	<a href="chart-c3.html">Chart C3</a>
																</li>
																<li>
																	<a href="chart-js.html">Chart Js</a>
																</li>
																<li>
																	<a href="chart-morris.html">Morris Charts</a>
																</li>
																<li>
																	<a href="chart-flot.html">Flot Charts</a>
																</li>
																<li>
																	<a href="chart-peity.html">Peity Charts</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-icons"></i>
																<span>Icons</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="icon-fontawesome.html">Fontawesome
																		Icons</a>
																</li>
																<li>
																	<a href="icon-tabler.html">Tabler Icons</a>
																</li>
																<li>
																	<a href="icon-bootstrap.html">Bootstrap Icons</a>
																</li>
																<li>
																	<a href="icon-remix.html">Remix Icons</a>
																</li>
																<li>
																	<a href="icon-feather.html">Feather Icons</a>
																</li>
																<li>
																	<a href="icon-ionic.html">Ionic Icons</a>
																</li>
																<li>
																	<a href="icon-material.html">Material Icons</a>
																</li>
																<li>
																	<a href="icon-pe7.html">Pe7 Icons</a>
																</li>
																<li>
																	<a href="icon-simpleline.html">Simpleline Icons</a>
																</li>
																<li>
																	<a href="icon-themify.html">Themify Icons</a>
																</li>
																<li>
																	<a href="icon-weather.html">Weather Icons</a>
																</li>
																<li>
																	<a href="icon-typicon.html">Typicon Icons</a>
																</li>
																<li>
																	<a href="icon-flag.html">Flag Icons</a>
																</li>
															</ul>
														</li>
														<li class="submenu">
															<a href="javascript:void(0);">
																<i class="ti ti-table-plus"></i>
																<span>Maps</span>
																<span class="menu-arrow"></span>
															</a>
															<ul>
																<li>
																	<a href="maps-vector.html">Vector</a>
																</li>
																<li>
																	<a href="maps-leaflet.html">Leaflet</a>
																</li>
															</ul>
														</li>
													</ul>
												</li>
												<li><a href="#">Documentation</a></li>
												<li><a href="#">Change Log</a></li>
												<li class="submenu">
													<a href="javascript:void(0);"><span>Multi Level</span><span
															class="menu-arrow"></span></a>
													<ul>
														<li><a href="javascript:void(0);">Multilevel 1</a></li>
														<li class="submenu submenu-two">
															<a href="javascript:void(0);">Multilevel 2<span
																	class="menu-arrow inside-submenu"></span></a>
															<ul>
																<li><a href="javascript:void(0);">Multilevel 2.1</a>
																</li>
																<li class="submenu submenu-two submenu-three">
																	<a href="javascript:void(0);">Multilevel 2.2<span
																			class="menu-arrow inside-submenu inside-submenu-two"></span></a>
																	<ul>
																		<li><a href="javascript:void(0);">Multilevel
																				2.2.1</a></li>
																		<li><a href="javascript:void(0);">Multilevel
																				2.2.2</a></li>
																	</ul>
																</li>
															</ul>
														</li>
														<li><a href="javascript:void(0);">Multilevel 3</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /Horizontal Single -->

						<div class="d-flex align-items-center">
							<div class="me-1">
								<a href="#" class="btn btn-menubar btnFullscreen">
									<i class="ti ti-maximize"></i>
								</a>
							</div>
							<div class="dropdown me-1">
								<a href="#" class="btn btn-menubar" data-bs-toggle="dropdown">
									<i class="ti ti-layout-grid-remove"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="card mb-0 border-0 shadow-none">
										<div class="card-header">
											<h4>Applications</h4>
										</div>
										<div class="card-body">
											<a href="calendar.html" class="d-block pb-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i
														class="ti ti-calendar text-gray-9"></i></span>Calendar
											</a>
											<a href="todo.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i
														class="ti ti-subtask text-gray-9"></i></span>To Do
											</a>
											<a href="notes.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i
														class="ti ti-notes text-gray-9"></i></span>Notes
											</a>
											<a href="file-manager.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i
														class="ti ti-folder text-gray-9"></i></span>File Manager
											</a>
											<a href="kanban-view.html" class="d-block py-2">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i
														class="ti ti-layout-kanban text-gray-9"></i></span>Kanban
											</a>
											<a href="invoices.html" class="d-block py-2 pb-0">
												<span class="avatar avatar-md bg-transparent-dark me-2"><i
														class="ti ti-file-invoice text-gray-9"></i></span>Invoices
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="me-1">
								<a href="chat.html" class="btn btn-menubar position-relative">
									<i class="ti ti-brand-hipchat"></i>
									<span
										class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
								</a>
							</div>
							<div class="me-1">
								<a href="email.html" class="btn btn-menubar">
									<i class="ti ti-mail"></i>
								</a>
							</div>
							<div class="me-1 notification_item">
								<a href="#" class="btn btn-menubar position-relative me-1" id="notification_popup"
									data-bs-toggle="dropdown">
									<i class="ti ti-bell"></i>
									<span class="notification-status-dot"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-end notification-dropdown p-4">
									<div
										class="d-flex align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
										<h4 class="notification-title">Notifications (2)</h4>
										<div class="d-flex align-items-center">
											<a href="#" class="text-primary fs-15 me-3 lh-1">Mark all as read</a>
											<div class="dropdown">
												<a href="javascript:void(0);" class="bg-white dropdown-toggle"
													data-bs-toggle="dropdown">
													<i class="ti ti-calendar-due me-1"></i>Today
												</a>
												<ul class="dropdown-menu mt-2 p-3">
													<li>
														<a href="javascript:void(0);" class="dropdown-item rounded-1">
															This Week
														</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item rounded-1">
															Last Week
														</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item rounded-1">
															Last Month
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="noti-content">
										<div class="d-flex flex-column">
											<div class="border-bottom mb-3 pb-3">
												<a href="activity.html">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="assets/img/profiles/avatar-27.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1"><span
																	class="text-dark fw-semibold">Shawn</span>
																performance in Math is below the threshold.</p>
															<span>Just Now</span>
														</div>
													</div>
												</a>
											</div>
											<div class="border-bottom mb-3 pb-3">
												<a href="activity.html" class="pb-0">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="assets/img/profiles/avatar-23.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1"><span
																	class="text-dark fw-semibold">Sylvia</span> added
																appointment on 02:00 PM</p>
															<span>10 mins ago</span>
															<div
																class="d-flex justify-content-start align-items-center mt-1">
																<span class="btn btn-light btn-sm me-2">Deny</span>
																<span class="btn btn-primary btn-sm">Approve</span>
															</div>
														</div>
													</div>
												</a>
											</div>
											<div class="border-bottom mb-3 pb-3">
												<a href="activity.html">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="assets/img/profiles/avatar-25.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1">New student record <span
																	class="text-dark fw-semibold"> George</span>
																is created by <span
																	class="text-dark fw-semibold">Teressa</span>
															</p>
															<span>2 hrs ago</span>
														</div>
													</div>
												</a>
											</div>
											<div class="border-0 mb-3 pb-0">
												<a href="activity.html">
													<div class="d-flex">
														<span class="avatar avatar-lg me-2 flex-shrink-0">
															<img src="assets/img/profiles/avatar-01.jpg" alt="Profile">
														</span>
														<div class="flex-grow-1">
															<p class="mb-1">A new teacher record for <span
																	class="text-dark fw-semibold">Elisa</span> </p>
															<span>09:45 AM</span>
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
									<div class="d-flex p-0">
										<a href="#" class="btn btn-light w-100 me-2">Cancel</a>
										<a href="activity.html" class="btn btn-primary w-100">View All</a>
									</div>
								</div>
							</div>
							<div class="dropdown profile-dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
									data-bs-toggle="dropdown">
									<span class="avatar avatar-sm online">
										<img src="assets/img/profiles/avatar-12.jpg" alt="Img"
											class="img-fluid rounded-circle">
									</span>
								</a>
								<div class="dropdown-menu shadow-none">
									<div class="card mb-0">
										<div class="card-header">
											<div class="d-flex align-items-center">
												<span class="avatar avatar-lg me-2 avatar-rounded">
													<img src="assets/img/profiles/avatar-12.jpg" alt="img">
												</span>
												<div>
													<h5 class="mb-0">Kevin Larry</h5>
													<p class="fs-12 fw-medium mb-0"><a
															href="https://smarthr.co.in/cdn-cgi/l/email-protection"
															class="__cf_email__"
															data-cfemail="7403150606111a34110c15190418115a171b19">[email&#160;protected]</a>
													</p>
												</div>
											</div>
										</div>
										<div class="card-body">
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
												href="profile.html">
												<i class="ti ti-user-circle me-1"></i>My Profile
											</a>
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
												href="bussiness-settings.html">
												<i class="ti ti-settings me-1"></i>Settings
											</a>

											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
												href="profile-settings.html">
												<i class="ti ti-circle-arrow-up me-1"></i>My Account
											</a>
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
												href="knowledgebase.html">
												<i class="ti ti-question-mark me-1"></i>Knowledge Base
											</a>
										</div>
										<div class="card-footer py-1">
											<a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
												href="login.html"><i class="ti ti-login me-2"></i>Logout</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
						aria-expanded="false">
						<i class="fa fa-ellipsis-v"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="profile-settings.html">Settings</a>
						<a class="dropdown-item" href="login.html">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->

			</div>

		</div>
		<!-- /Header -->

		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<!-- Logo -->
			<div class="sidebar-logo">
				<a href="index.html" class="logo logo-normal">
					<img src="assets/img/logo.svg" alt="Logo">
				</a>
				<a href="index.html" class="logo-small">
					<img src="assets/img/logo-small.svg" alt="Logo">
				</a>
				<a href="index.html" class="dark-logo">
					<img src="assets/img/logo-white.svg" alt="Logo">
				</a>
			</div>
			<!-- /Logo -->
			<div class="modern-profile p-3 pb-0">
				<div class="text-center rounded bg-light p-3 mb-4 user-profile">
					<div class="avatar avatar-lg online mb-3">
						<img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
					</div>
					<h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
					<p class="fs-10">System Admin</p>
				</div>
				<div class="sidebar-nav mb-3">
					<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent"
						role="tablist">
						<li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
						<li class="nav-item"><a class="nav-link border-0" href="chat.html">Chats</a></li>
						<li class="nav-item"><a class="nav-link border-0" href="email.html">Inbox</a></li>
					</ul>
				</div>
			</div>
			<div class="sidebar-header p-3 pb-0 pt-2">
				<div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
					<div class="avatar avatar-md onlin">
						<img src="assets/img/profiles/avatar-02.jpg" alt="Img" class="img-fluid rounded-circle">
					</div>
					<div class="text-start sidebar-profile-info ms-2">
						<h6 class="fs-12 fw-normal mb-1">Adrian Herman</h6>
						<p class="fs-10">System Admin</p>
					</div>
				</div>
				<div class="input-group input-group-flat d-inline-flex mb-4">
					<span class="input-icon-addon">
						<i class="ti ti-search"></i>
					</span>
					<input type="text" class="form-control" placeholder="Search in HRMS">
					<span class="input-group-text">
						<kbd>CTRL + / </kbd>
					</span>
				</div>
				<div class="d-flex align-items-center justify-content-between menu-item mb-3">
					<div class="me-3">
						<a href="calendar.html" class="btn btn-menubar">
							<i class="ti ti-layout-grid-remove"></i>
						</a>
					</div>
					<div class="me-3">
						<a href="chat.html" class="btn btn-menubar position-relative">
							<i class="ti ti-brand-hipchat"></i>
							<span
								class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
						</a>
					</div>
					<div class="me-3 notification-item">
						<a href="activity.html" class="btn btn-menubar position-relative me-1">
							<i class="ti ti-bell"></i>
							<span class="notification-status-dot"></span>
						</a>
					</div>
					<div class="me-0">
						<a href="email.html" class="btn btn-menubar">
							<i class="ti ti-message"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title"><span>MAIN MENU</span></li>
            <li>
                <ul>
                    <li class="submenu">
                        <a href="javascript:void(0);" class="active subdrop">
                            <i class="ti ti-smart-home"></i><span>Dashboard</span><span
                                class="badge badge-danger fs-10 fw-medium text-white p-1">Hot</span><span
                                class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="dashboard-admin.html" class="active">Dashboard Admin</a></li>
                            <li><a href="dashboard-rh.html">Dashboard RH</a></li>
                            <li><a href="dashboard-agent.html">Dashboard Agent</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"><span>RESSOURCES HUMAINES</span></li>
                    <li>
                        <ul>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-id-badge"></i><span>Personnel</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
									<li><a href="{{ url('/agents') }}">Création Agents</a></li>
									<li><a href="{{ url('/liste_agents') }}">Liste Agents</a></li>
									<li><a href="{{ url('/services') }}">Services</a></li>
                                    <li><a href="{{ url('/baremes') }}">Barèmes & Grades</a></li>

                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-clock"></i>
                                    <span>Temps & Présences</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>

                                    <li><a href="{{ url('/horaires') }}">Horaires</a></li>
                                    <li><a href="{{ url('/groupes') }}">Groupes</a></li>
                                    <li><a href="{{ url('/plannings') }}">Plannings rotatifs</a></li>
                                    <li><a href="{{ url('/retards') }}">Retards</a></li>
                                    <li><a href="{{ url('/absences') }}">Absences</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-gavel"></i>
                                    <span>Discipline & Sanctions</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="{{ url('/sanctions') }}">Sanctions disciplinaires</a></li>

                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-briefcase"></i>
                                    <span>Congés & Autorisations</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="{{ url('/conges') }}">Congés </a></li>
                                    <li><a href="{{ url('/heures') }}">Heures supplémentaires</a></li>
                                    <li><a href="{{ url('/autorisations') }}">Autorisations spéciales</a></li>
									<li><a href="{{ url('/parametres/formules') }}">Parametres</a></li>
                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-alert-triangle"></i>
                                    <span>Incidents RH</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="{{ url('/separations') }}">Séparations</a></li>

                                    <li><a href="{{ url('/desertions') }}">Désertions</a></li>

                                </ul>
                            </li>

                            <!-- ================= OPERATIONS ================= -->
                            <li class="menu-title"><span>OPÉRATIONS</span></li>

                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-transfer"></i>
                                    <span>Mouvements</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
									<li><a href="{{ url('/mouvements') }}">Nouveau mouvement</a></li>

                                    <li><a href="{{ url('/historiques.mouvements') }}">Historique des mouvements</a></li>
                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-building"></i>
                                    <span>Sites </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>

                                    <li><a href="{{ url('/sites') }}">Sites</a></li>
                                    <li><a href="{{ url('/affectations') }}">Affectations</a></li>
                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-phone"></i>
                                    <span>Appels non répondus</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
									<li><a href="{{ url('/appels-non-repondu') }}">Saisies journalières</a></li>

                                    <li><a href="{{ url('/appels_stats') }}">Statistiques</a></li>
                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-truck"></i>
                                    <span>Flotte de véhicules</span>
                                    <span class="menu-arrow"></span>
                                </a>
								<ul>
									<li><a href="{{ url('/vehicules') }}">Véhicules</a></li>
									<li><a href="{{ url('/vehicule-rapports') }}">Rapports vehicule</a></li>
									<li><a href="rapports-autres.html">Autres rapports</a></li>
								</ul>
                            </li>

							<li class="submenu">
								<a href="javascript:void(0);">
									<i class="ti ti-clock"></i>
									<span>Présences</span>
									<span class="menu-arrow"></span>
								</a>
								<ul>
									<li><a href="{{ url('/absences') }}">Absences</a></li>
									<li><a href="{{ url('/retards') }}">Retards</a></li>
								</ul>
							</li>

                            <!-- ================= PAIE (PRÉVUE) ================= -->
                            <li class="menu-title"><span>PAIE</span></li>

                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-cash"></i>
                                    <span>Gestion de la paie</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="paie-baremes.html">Barèmes & primes</a></li>
                                    <li><a href="paie-parametres.html">Paramètres de paie</a></li>
                                    <li><a href="paie-calcul.html">Calcul de la paie</a></li>
                                    <li><a href="paie-bulletins.html">Bulletins de paie</a></li>
                                    <li><a href="paie-avances.html">Avances & retenues</a></li>
                                    <li><a href="paie-decomptes.html">Décomptes finaux</a></li>
                                    <li><a href="paie-cnss.html">CNSS / INPP / ONEM</a></li>
                                </ul>
                            </li>

                            <!-- ================= RAPPORTS ================= -->
                            <li class="menu-title"><span>RAPPORTS</span></li>

                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-file-analytics"></i>
                                    <span>Rapports</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="rapport-presences.html">Présences</a></li>
                                    <li><a href="rapport-conges.html">Congés</a></li>
                                    <li><a href="rapport-retards.html">Retards</a></li>
                                    <li><a href="rapport-heures-supp.html">Heures supplémentaires</a></li>
                                    <li><a href="rapport-paie.html">Paie</a></li>
                                </ul>
                            </li>

                            <!-- ================= ADMINISTRATION ================= -->
                            <li class="menu-title"><span>ADMINISTRATION</span></li>

                            <li class="submenu">
                                <a href="javascript:void(0);">
                                    <i class="ti ti-settings"></i>
                                    <span>Système</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul>
                                    <li><a href="users.html">Utilisateurs</a></li>
                                    <li><a href="roles.html">Rôles & permissions</a></li>
                                    <li><a href="audit.html">Journal d’audit</a></li>
                                    <li><a href="backups.html">Sauvegardes</a></li>
                                    <li><a href="parametres.html">Paramètres système</a></li>
                                </ul>
                            </li>

                        </ul>
    </div>
 </div>
 </div>
		<!-- /Sidebar -->

		<!-- Horizontal Menu -->

		<!-- /Stacked Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">

			@yield("content")

			<div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
				<p class="mb-0">2014 - 2025 &copy; SmartHR.</p>
				<p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">Dreams</a></p>
			</div>

		</div>
		<!-- /Page Wrapper -->

		<!-- Add Leaves -->
		<div class="modal fade" id="add_leaves">
			<div class="modal-dialog modal-dialog-centered modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Leave</h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="Agent-dashboard.html">
						<div class="modal-body pb-0">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Agent Name</label>
										<select class="select">
											<option>Select</option>
											<option>Anthony Lewis</option>
											<option>Brian Villalobos</option>
											<option>Harvey Smith</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Leave Type</label>
										<select class="select">
											<option>Select</option>
											<option>Medical Leave</option>
											<option>Casual Leave</option>
											<option>Annual Leave</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">From </label>
										<div class="input-icon-end position-relative">
											<input type="text" class="form-control datetimepicker"
												placeholder="dd/mm/yyyy">
											<span class="input-icon-addon">
												<i class="ti ti-calendar text-gray-7"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">To </label>
										<div class="input-icon-end position-relative">
											<input type="text" class="form-control datetimepicker"
												placeholder="dd/mm/yyyy">
											<span class="input-icon-addon">
												<i class="ti ti-calendar text-gray-7"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">No of Days</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Remaining Days</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Reason</label>
										<textarea class="form-control" rows="3"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Add Leaves</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Leaves -->

		<!-- Edit Task -->
		<div class="modal fade" id="edit_task">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Task </h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
							aria-label="Close">
							<i class="ti ti-x"></i>
						</button>
					</div>
					<form action="Agent-dashboard.html">
						<div class="modal-body">
							<div class="row">
								<div class="col-12">
									<div class="mb-3">
										<label class="form-label">Todo Title</label>
										<input type="text" class="form-control" value="Patient appointment booking">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Due Date</label>
										<div class="input-icon-end position-relative">
											<input type="text" class="form-control datetimepicker"
												placeholder="dd/mm/yyyy">
											<span class="input-icon-addon">
												<i class="ti ti-calendar text-gray-7"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Project</label>
										<select class="select">
											<option>Select</option>
											<option selected>Office Management</option>
											<option>Clinic Management </option>
											<option>Educational Platform</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label me-2">Team Members</label>
										<input class="input-tags form-control" placeholder="Add new" type="text"
											data-role="tagsinput" name="Label" value="Jerald,Andrew,Philip,Davis">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Tag</label>
										<select class="select">
											<option>Select</option>
											<option>Internal</option>
											<option selected>Projects</option>
											<option>Meetings</option>
											<option>Reminder</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Status</label>
										<select class="select">
											<option>Select</option>
											<option selected>Inprogress</option>
											<option>Completed</option>
											<option>Pending</option>
											<option>Onhold</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Priority</label>
										<select class="select">
											<option>Select</option>
											<option selected>Medium</option>
											<option>High</option>
											<option>Low</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<label class="form-label">Who Can See this Task?</label>
									<div class="d-flex align-items-center">
										<div class="form-check me-3">
											<input class="form-check-input" type="radio" name="flexRadioDefault"
												id="flexRadioDefault4">
											<label class="form-check-label text-dark" for="flexRadioDefault4">
												Public
											</label>
										</div>
										<div class="form-check me-3">
											<input class="form-check-input" type="radio" name="flexRadioDefault"
												id="flexRadioDefault5" checked="">
											<label class="form-check-label text-dark" for="flexRadioDefault5">
												Private
											</label>
										</div>
										<div class="form-check ">
											<input class="form-check-input" type="radio" name="flexRadioDefault"
												id="flexRadioDefault6">
											<label class="form-check-label text-dark" for="flexRadioDefault6">
												Admin Only
											</label>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Descriptions</label>
										<div class="summernote"></div>
									</div>
								</div>
								<div class="col-md-12">
									<label class="form-label">Upload Attachment</label>
									<div class="bg-light rounded p-2">
										<div class="profile-uploader border-bottom mb-2 pb-2">
											<div class="drag-upload-btn btn btn-sm btn-white border px-3">
												Select File
												<input type="file" class="form-control image-sign" multiple="">
											</div>
										</div>
										<div
											class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
											<div class="d-flex align-items-center">
												<h6 class="fs-12 fw-medium me-1">Logo.zip</h6>
												<span class="badge badge-soft-info">21MB </span>
											</div>
											<a href="#" class="btn btn-sm btn-icon"><i class="ti ti-trash"></i></a>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<h6 class="fs-12 fw-medium me-1">Files.zip</h6>
												<span class="badge badge-soft-info">25MB </span>
											</div>
											<a href="#" class="btn btn-sm btn-icon"><i class="ti ti-trash"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Edit Task -->

		<!-- Delete Modal -->
		<div class="modal fade" id="delete_modal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
							<i class="ti ti-trash-x fs-36"></i>
						</span>
						<h4 class="mb-1">Confirm Delete</h4>
						<p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.
						</p>
						<div class="d-flex justify-content-center">
							<a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
							<a href="Agent-dashboard.html" class="btn btn-danger">Yes, Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Daterangepicker JS -->
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
    <!-- Datetimepicker JS -->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Bootstrap Tagsinput JS -->
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <!-- Summernote JS -->
    <script src="{{ asset('assets/plugins/summernote/summernote-lite.min.js') }}"></script>
    <!-- Color Picker JS -->
    <script src="{{ asset('assets/plugins/@simonwep/pickr/pickr.es5.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('assets/js/todo.js') }}"></script>
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="{{ asset('assets/js/vendor/vue2.js') }}"></script>

	<!-- SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	@stack("scripts")
</body>



</html>
