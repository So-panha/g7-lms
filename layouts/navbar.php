<!-- Get role of users -->
<?php
if (!empty($_SESSION['user'])) {
    $userRole;
    if ($_SESSION['user']['role'] === 'admin') {
        $userRole = 'Admin';
    } elseif ($_SESSION['user']['role'] === 'manager') {
        $userRole = 'Manager';
    } elseif ($_SESSION['user']['role'] === 'employee') {
        $userRole = 'Employee';
    }
}
?>
<!-- /Offcanvas menu -->
</div>
</div>
</div>
</div>
</div>
<!-- /Top Header Section -->
</header>
<!-- /Header -->
<!-- Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                <aside class="sidebar sidebar-user">
                    <div class="row">
                        <div class="col-12">
                            <div class="card ctm-border-radius shadow-sm grow bg-warning">
                                <div class="card-body py-4">
                                    <div class="row">
                                        <div class="col-md-12 mr-auto text-left">
                                            <div class="custom-breadcrumb d-flex justify-content-center">
                                                <h4 class="text-dark"><?= $userRole; ?> Dashboard</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                        <div class="user-info card-body">
                            <div class="user-avatar mb-4">
                                <img src="assets/images/profiles/img-2.jpg" alt="User Avatar" class="img-fluid rounded-circle" width="100">
                            </div>
                            <div class="user-details">
                                <!-- show role of the page -->
                                <h4><b>Welcome <?= $userRole; ?></b></h4>
                                <p>Sun, 29 Nov 2019</p>
                            </div>
                        </div>
                    </div>
                    <!-- splice php string for active_nabar -->
                    <?php
                    $mainUrl = $_SERVER['REQUEST_URI'];
                    $URL = trim(substr($_SERVER['REQUEST_URI'], 0, -5));
                    if ($URL === '/information_user') {
                        $_SERVER['REQUEST_URI'] =  '/information_user';
                    } else {
                        $_SERVER['REQUEST_URI'] = $mainUrl;
                    }
                    ?>
                    <!-- Sidebar -->
                    <div class="sidebar-wrapper d-lg-block d-md-none d-none">
                        <div class="card ctm-border-radius shadow-sm border-none grow">
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-6 align-items-center text-center">
                                        <!-- active navbar -->
                                        <a href="/" class="text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top <?php if ($_SERVER['REQUEST_URI'] == '/') echo 'active'; ?>"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                    </div>
                                    <?php if ($_SESSION['user']['role'] != 'employee') : ?>
                                        <div class="col-6 align-items-center shadow-none text-center">
                                            <a href="/admin_employees" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top <?php if ($_SERVER['REQUEST_URI'] == '/admin_employees' || $_SERVER['REQUEST_URI'] == '/information_user' || $_SERVER['REQUEST_URI'] == '/add_employee') echo 'active'; ?>"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Employees</span></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="/companies" class="text-dark p-4 ctm-border-right ctm-border-left <?php if ($_SERVER['REQUEST_URI'] == '/companies') echo 'active'; ?>"><span class="lnr lnr-apartment pr-0 pb-lg-2 font-23"></span><span class="">Company</span></a>
                                    </div>
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="/calendars" class="text-dark p-4 ctm-border-right <?php if ($_SERVER['REQUEST_URI'] == '/calendars') echo 'active'; ?>"><span class="lnr lnr-calendar-full pr-0 pb-lg-2 font-23"></span><span class="">Calendar</span></a>
                                    </div>
                                    <!-- Allow for all users -->
                                    <div class="col-6 align-items-center shadow-none text-center">
                                        <a href="/leaves" class="text-dark p-4 ctm-border-right ctm-border-left <?php if ($_SERVER['REQUEST_URI'] == '/leaves') echo 'active'; ?>"><span class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span class="">Leave</span></a>
                                    </div>
                                    <!-- Allow for employees -->
                                    <?php if ($_SESSION['user']['role'] === 'employee') : ?>
                                        <div class="col-6 align-items-center shadow-none text-center">
                                            <a href="/reviews" class="text-dark p-4 last-slider-btn ctm-border-right <?php if ($_SERVER['REQUEST_URI'] == '/reviews') echo 'active'; ?>"><span class="lnr lnr-star pr-0 pb-lg-2 font-23"></span><span class="">Reviews</span></a>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Allow only admin -->
                                    <?php if ($_SESSION['user']['role'] === 'admin') : ?>
                                        <div class="col-6 align-items-center shadow-none text-center">
                                            <a href="/reports" class="text-dark p-4 ctm-border-right ctm-border-left <?php if ($_SERVER['REQUEST_URI'] == '/reports') echo 'active'; ?>"><span class="lnr lnr-rocket pr-0 pb-lg-2 font-23"></span><span class="">Reports</span></a>
                                        </div>
                                        <div class="col-6 align-items-center shadow-none text-center">
                                            <a href="/manages" class="text-dark p-4 ctm-border-right <?php if ($_SERVER['REQUEST_URI'] == '/manages') echo 'active'; ?> "><span class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span class="">Manage</span></a>
                                        </div>
                                        <div class="col-6 align-items-center shadow-none text-center">
                                            <a href="/profiles" class="text-dark p-4 last-slider-btn ctm-border-right <?php if ($_SERVER['REQUEST_URI'] == '/profiles'  || $_SERVER['REQUEST_URI'] == '/user_profile') echo 'active'; ?>"><span class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span class="">Profile</span></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($_SESSION['user']['role'] != 'admin') : ?>
                                        <div class="col-6 align-items-center text-center">
                                        <!-- active navbar -->
                                        <a href="/history_request" class="text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top <?php if ($_SERVER['REQUEST_URI'] == '/history_request') echo 'active'; ?>"><span class="lnr lnr-history pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Sidebar -->

                    <!-- When we switch into the calendar page it will be hide -->
                    <?php if ($_SERVER['REQUEST_URI'] != '/calendars') : ?>
                </aside>
            </div>
        <?php endif ?>