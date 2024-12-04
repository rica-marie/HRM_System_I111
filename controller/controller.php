<?php
class Controller
{
    private $adminModel;

    public function __construct()
    {
        include_once('model/admin.php');
        $this->adminModel = new AdminModel();
    }

    public function validateAdminLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($this->adminModel->validateAdmin($username, $password)) {
            $_SESSION['admin'] = $username;
            header("Location: index.php?page=dashboard");
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password!');</script>";
            include_once('view/admin/admin-login.php');
        }
    }

    public function navigatePages()
    {
        $command = isset($_GET['command']) ? $_GET['command'] : '0';

        switch ($command) {
            case '0':
                include_once('view/admin/employee-list.php');
                break;
            case '1':
                include_once('view/admin/leave-list.php');
                break;
            case '2':
                include_once('view/admin/department-list.php');
                break;
            case '3':
                include_once('view/admin/project-status.php');
                break;
            case '4':
                include_once('view/admin/add-department.php');
                break;
            case '5':
                session_destroy();
                header("Location: index.php?page=admin-login");
                exit();
            default:
                include_once('view/admin/employee-list.php');
                break;
        }
    }
}
?>
