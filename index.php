<?php
session_start();

// Check if the user is logged in
$isAdminLoggedIn = isset($_SESSION['admin']);
$isEmployeeLoggedIn = isset($_SESSION['employee']);

// Determine which page to display
$page = isset($_GET['page']) ? $_GET['page'] : 'main';

echo "<title>HRM System</title>";
echo "<div align='CENTER'>";

// Include navbar for logged-in users
if ($isAdminLoggedIn) {
    include_once('view/navbar_admin.php');
}

// Switch statement to handle different pages
switch ($page) {
    case 'admin-login':
        $command = isset($_GET['command']) ? $_GET['command'] : '';
        if ($command === 'validate') {
            include_once('controller/controller.php');
            $controller = new Controller();
            $controller->validateAdminLogin();
        } else {
            include_once('view/admin/admin-login.php');
        }
        break;
    case 'employee-login':
        $command = isset($_GET['command']) ? $_GET['command'] : '';
            if ($command === 'validate') {
                include_once('controller/controller.php');
                $controller = new Controller();
                $controller->validateEmployeeLogin(); // Call employee login validation
            } else {
                include_once('view/employee/employee-login.php'); // Show login form
            }
            break;
        

    case 'employee-signup':
        include_once('view/employee/employee-signup.php');
        break;
    case 'dashboard':
        if ($isAdminLoggedIn) {
            include_once('controller/controller.php');
            $controller = new Controller();
            $controller->navigatePages();
        } else {
            header("Location: index.php?page=main");
            exit();
        }
        break;
    case 'employee-dashboard':
        if ($isEmployeeLoggedIn) {
            // Include the employee dashboard view here
            include_once('view/employee/my-details.php'); // Create this file for employee dashboard
        } else {
            header("Location: index.php?page=employee-login");
            exit();
        }
        break;
    default:
        include_once('main.php'); // Your main landing page
        break;
}

echo "</div>"; // Closing the center div
?>
