<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";

// Router
$routes = ['/login' => 'controllers/login/login.controller.php',];
// Divide router of the user
if (!empty($_SESSION['user'])) {
    if ($_SESSION['user']['role'] === 'admin') {
        // admin's router
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
            '/user_profile' => 'controllers/user_profile/user_profile.controller.php',
            '/view_alert' => 'controllers/alert/alert.controller.php',
            '/edit_employee' => 'controllers/admin/admin.edit.employee.controller.php',
        ];
    } elseif ($_SESSION['user']['role'] === 'manager') {
        // manager's router
        $routes = [
            '/' => 'controllers/employees/manager/manager.controller.php',
            '/calendars' => 'controllers/calendars/calendar.controller.php',
            '/companies' => 'controllers/companies/company.controller.php',
            '/leaves' => 'controllers/leaves/leave.controller.php',
            '/admin_employees' => 'controllers/employees/manager/edit.member.controller.php',
            '/user_profile' => 'controllers/user_profile/user_profile.controller.php',
        ];
    } elseif ($_SESSION['user']['role'] === 'employee') {
        // employee's router
        $routes = [
            '/' => 'controllers/users/employee/employee.controller.php',
            '/calendars' => 'controllers/calendars/calendar.controller.php',
            '/companies' => 'controllers/companies/company.controller.php',
            '/reviews' => 'controllers/reviews/review.controller.php',
            '/user_profile' => 'controllers/user_profile/user_profile.controller.php',
        ];
    }
}

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
    http_response_code(404);
    $page = 'views/errors/404.php';
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
        require $page;
    }
} elseif ($page != 'controllers/login/login.controller.php' && $page != 'views/errors/404.php') {
    // if already login
    require "layouts/header.php";
    require "layouts/navbar.php";
    require $page;
    require "layouts/footer.php";
} else{
    require $page;
}
