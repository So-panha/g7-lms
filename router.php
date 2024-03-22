<?php
session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";

// Router
if (empty($_SESSION['user'])) {
    if ($_SERVER['REQUEST_URI'] === '/') {
        echo "<script>location.href = '/login';</script>";
    }
    // Start router
    $routes = ['/login' => 'controllers/login/login.controller.php'];
} elseif (!empty($_SESSION['user'])) {
    if ($_SESSION['user']['role'] === 'admin') {
        // Change router by role
        if ($_SERVER['REQUEST_URI'] === '/') {
            echo "<script>location.href = '/admin';</script>";
        }
    } elseif ($_SESSION['user']['role'] === 'manager') {
        if ($_SERVER['REQUEST_URI'] === '/') {
            echo "<script>location.href = '/manager';</script>";
        }
    } elseif ($_SESSION['user']['role'] === 'employee') {
        // Change router by role
        if ($_SERVER['REQUEST_URI'] === '/') {
            echo "<script>location.href = '/employee';</script>";
        }
    }
}

// Divide router of the user
if (!empty($_SESSION['user'])) {
    if ($_SESSION['user']['role'] === 'admin') {
        // admin's router
        $routes = [
            '/admin' => 'controllers/admin/admin.controller.php',
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
            '/edit_employee' => 'controllers/admin/admin.edit.employee.controller.php',
            '/views_group' => 'controllers/admin/admin.view.team.controller.php',
            '/edit_information' => 'controllers/employees/employee/edit.information.controller.php',
            '/report_detail' => 'controllers/reports/detail.report.conroller.php',
        ];
    } elseif ($_SESSION['user']['role'] === 'manager') {
        // manager's router
        $routes = [
            '/manager' => 'controllers/employees/manager/manager.controller.php',
            '/calendars' => 'controllers/calendars/calendar.controller.php',
            '/companies' => 'controllers/companies/company.controller.php',
            '/leaves' => 'controllers/leaves/leave.controller.php',
            '/user_profile' => 'controllers/user_profile/user_profile.controller.php',
            '/history_request' => 'controllers/history/history.controller.php',
            '/view_alert' => 'controllers/alert/alert.controller.php',
            '/members' => 'controllers/employees/manager/list_employee_member.controller.php',
            '/infomation_members' => 'controllers/employees/manager/show.information.member.controller.php',
            '/eidt_infomation_members' => 'controllers/employees/manager/edit.member.controller.php',
            '/edit_information' => 'controllers/employees/employee/edit.information.controller.php',

        ];
    } elseif ($_SESSION['user']['role'] === 'employee') {
        // employee's router
        $routes = [
            '/employee' => 'controllers/employees/employee/employee.controller.php',
            '/calendars' => 'controllers/calendars/calendar.controller.php',
            '/companies' => 'controllers/companies/company.controller.php',
            '/leaves' => 'controllers/leaves/leave.controller.php',
            '/reviews' => 'controllers/reviews/review.controller.php',
            '/user_profile' => 'controllers/user_profile/user_profile.controller.php',
            '/history_request' => 'controllers/history/history.controller.php',
            '/edit_information' => 'controllers/employees/employee/edit.information.controller.php',
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
    if ($_SERVER['REQUEST_URI'] === "/login") {
        session_destroy();
        require "layouts/header.php";
        require $page;
        require "layouts/footer.php";
    } else {
        // prevent when try access by path without login
        require $page;
    }
} elseif (!empty($_SESSION['user'])) {
    // if already login
    if ($_SERVER['REQUEST_URI'] != "/login") {
        require "layouts/header.php";
        require "layouts/navbar.php";
        require $page;
        require "layouts/footer.php";
    }else {
        require $page;
    }
}

// If user back using sign back in browser
if(!empty($_SESSION['user'])){
    if ($_SERVER['REQUEST_URI'] === "/login") {
        session_destroy();
        require "layouts/header.php";
        require "views/login/loginForm.view.php";
        require "layouts/footer.php";
    }
}

