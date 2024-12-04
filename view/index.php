<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'main';

switch ($page) {
    case 'admin-login':
        include_once('view/admin/admin-login.php');
        break;
    case 'employee-login':
        include_once('view/employee/employee-login.php');
        break;
    case 'employee-signup':
        include_once('view/employee/employee-signup.php');
        break;
    case 'dashboard':
        include_once('controller/controller.php');
        $controller = new Controller();
        $controller->navigatePages();
        break;
    default:
      //  include_once('view/index.php');
        break;
}
