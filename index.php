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
            $command = isset($_GET['command']) ? $_GET['command'] : '';
                if ($command === 'process') {
                    include_once('controller/controller.php');
                    $controller = new Controller();
                    $controller->employeeSignup(); // Handle employee sign-up
                } else {
                    include_once('view/employee/employee-signup.php'); // Show sign-up form
                }
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
                include_once('view/navbar-employees.php'); // Include employee navbar
                $command = isset($_GET['command']) ? $_GET['command'] : '0';
                include_once('controller/controller.php');
                $controller = new Controller();
                $controller->navigatesPagesEmployee(); // Call the employee navigation method
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
