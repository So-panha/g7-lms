<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/' => 'controllers/admin/admin.controller.php',
    '/login' => 'controllers/login/login.controller.php',
    '/check_role' => 'controllers/checkRole/check.role.controller.php',
    '/employees' => 'controllers/employees/employee.controller.php',
    '/companies' => 'controllers/companies/company.controller.php',
    '/calendars' => 'controllers/calendars/calendar.controller.php',
    '/leaves' => 'controllers/leaves/leave.controller.php',
    '/reviews' => 'controllers/reviews/review.controller.php',
    '/reports' => 'controllers/reports/report.controller.php',
    '/manages' => 'controllers/manages/manage.controller.php',
    '/profiles' => 'controllers/profiles/profile.controller.php',
    '/admin_employees' => 'controllers/admin/admin.eyployees.controller.php',
    '/admin_employees_team' => 'controllers/admin/admin.employee.team.controller.php',
    '/add_employee' => 'controllers/admin/admin.form.addEmployee.controller.php',
    '/information_user' => 'controllers/admin/admin.show.user.information.controller.php',
    '/user_profile' => 'controllers/admin/user_profile.controller.php',
    '/view_alert' => 'controllers/alert/alert.controller.php',
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
    http_response_code(404);
    $page = 'views/errors/404.php';
    die();
}


// If not yet login 
if (empty($_SESSION['user'])) {
    if ($page === 'controllers/login/login.controller.php') {
        session_destroy();
        require "layouts/header.php";
        require $page;
        require "layouts/footer.php";
    } else {
        // prevent when try access by path without login
        header('location: /login');
    }
} else {
    // if already login
    if ($page != 'controllers/login/login.controller.php') {
        require "layouts/header.php";
        require "layouts/navbar.php";
        require $page;
        require "layouts/footer.php";
    }
}
