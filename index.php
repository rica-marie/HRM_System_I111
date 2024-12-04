<?php
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['admin']);

// Determine which page to display
$page = isset($_GET['page']) ? $_GET['page'] : 'main';

echo "<title>HRM System</title>";
echo "<div align='CENTER'>";

// Include navbar for logged-in users
if ($isLoggedIn) {
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
        include_once('view/employee/employee-login.php');
        break;
    case 'employee-signup':
        include_once('view/employee/employee-signup.php');
        break;
    case 'dashboard':
        // Only show the dashboard if logged in
        if ($isLoggedIn) {
            include_once('controller/controller.php');
            $controller = new Controller();
            $controller->navigatePages();
        } else {
            // Redirect to the main page if not logged in
            header("Location: index.php?page=main");
            exit();
        }
        break;
    default:
        include_once('main.php'); // Your main landing page
        break;
}

echo "</div>"; // Closing the center div
?>
