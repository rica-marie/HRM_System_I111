<?php
 
echo "<title>Best Beaches in the Philippines</title>";
echo "<div align=CENTER>";
include_once('navbar_admin.php');
// if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
//     include_once('navbar_admin.php');
// }

echo "</div>";
echo "<div>";
include_once('Controller/controller.php');
$controller = new Controller();
$controller->navigatePages();
echo "</div>";
?>
