<?php
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/StudentController.php';

$url = $_GET['url'] ?? 'login';

switch ($url) {
    case 'login':
        (new AuthController)->login(); break;
    case 'register':
        (new AuthController)->register(); break;
    case 'forgot-password':
        (new AuthController)->forgotPassword(); break;
    case 'logout':
        (new AuthController)->logout(); break;

    case 'admin/dashboard':
        require 'app/views/admin/dashboard.php'; break;

    case 'admin/students':
        (new StudentController)->index(); break;
    case 'admin/students/create':
        (new StudentController)->create(); break;
    case 'admin/students/edit':
        (new StudentController)->edit(); break;
    case 'admin/students/delete':
        (new StudentController)->delete(); break;

    default:
        echo "404 Not Found";
}
