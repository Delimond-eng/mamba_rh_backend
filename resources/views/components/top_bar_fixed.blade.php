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
                    <div class="dropdown profile-dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <span class="avatar avatar-sm online">
                                <img src="{{ asset("assets/img/users/user.avif") }}" alt="Img"
                                    class="img-fluid rounded-circle">
                            </span>
                        </a>
                        <div class="dropdown-menu shadow-none">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg me-2 avatar-rounded">
                                            <img src="{{ asset("assets/img/users/user.avif") }}" alt="img">
                                        </span>
                                        <div>
                                            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                            <p class="fs-12 fw-medium mb-0">
                                                {{ Auth::user()->email }}
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
                                </div>
                                <div class="card-footer py-1">
                                    <a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
                                        href="#"
                                        data-bs-toggle="modal"
                                        data-bs-target="#logoutModal">
                                            <i class="ti ti-login me-2"></i> Déconnexion
                                    </a>
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

<div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p class="mb-0">
                    Voulez-vous vraiment vous déconnecter ?
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    Annuler
                </button>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        Oui, se déconnecter
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
