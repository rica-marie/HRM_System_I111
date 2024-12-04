<?php
class Controller
{
    private $adminModel;
    private $employeeModel;
    private $departmentModel;

    public function __construct()
    {
        include_once('model/admin.php');
        include_once('model/employee.php');
        include_once('model/department.php'); // Include DepartmentModel
        $this->adminModel = new AdminModel();
        $this->employeeModel = new EmployeeModel();
        $this->departmentModel = new DepartmentModel(); // Initialize DepartmentModel
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

    
    public function validateEmployeeLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($this->employeeModel->validateEmployee($username, $password)) {
            $_SESSION['employee'] = $username;
            header("Location: index.php?page=employee-dashboard"); // Redirect to employee dashboard
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password!');</script>";
            include_once('view/employee/employee-login.php');
        }
    }

    public function showDepartments()
    {
        $departments = $this->departmentModel->getDepartments();
        include_once('view/admin/department-list.php');
    }
    


    public function addDepartment()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $deptName = trim($_POST['departmentName']);

        // Validate the department name
        if (empty($deptName)) {
            echo "<script>alert('Department Name is required!');</script>";
            include_once('view/admin/add-department.php');
            return;
        }

        // Try to add department
        try {
            $result = $this->departmentModel->addDepartment(null, $deptName); // Pass null if deptId is auto-incrementing
            if ($result) {
                echo "<script>alert('Department added successfully!');</script>";
                header("Location: index.php?page=dashboard&command=4"); // Redirect to department list
                exit();
            } else {
                echo "<script>alert('Failed to add department. Please try again.');</script>";
                include_once('view/admin/add-department.php');
            }
        } catch (Exception $e) {
            echo "<script>alert('An error occurred: " . $e->getMessage() . "');</script>";
            include_once('view/admin/add-department.php');
        }
    } else {
        include_once('view/admin/add-department.php');
    }
}


public function addProject()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $projectName = trim($_POST['projectName']);
        $deptId = intval($_POST['deptId']);

        if (empty($projectName) || empty($deptId)) {
            echo "<script>alert('Both Project Name and Department ID are required!');</script>";
            include_once('view/admin/add-project.php');
            return;
        }

        // Add the project to the department
        $result = $this->departmentModel->assignProject($deptId, $projectName);
        if ($result) {
            echo "<script>alert('Project added successfully!');</script>";
            header("Location: index.php?page=dashboard&command=2"); // Change command to reflect where to redirect
            exit();
        } else {
            echo "<script>alert('Failed to add project. Please try again.');</script>";
            include_once('view/admin/add-project.php');
        }
    } else {
        include_once('view/admin/add-project.php');
    }
}







    public function employeeSignup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $name = $_POST['name'];
            $password = $_POST['password'];
           
            if (isset($_POST['dob'])) {
                $dob = $_POST['dob'];  // Get DOB from the form
            } else {
                echo "<script>alert('Please provide a Date of Birth.');</script>";
                include_once('view/employee/employee-signup.php');
                return;
            }
            
            // Validate that passwords match
            if ($password !== $_POST['confirmPassword']) {
                echo "<script>alert('Passwords do not match!');</script>";
                include_once('view/employee/employee-signup.php');
                return;
            }
            
            // Insert employee into the database
            if ($this->employeeModel->signUpEmployee($username,  $name,$password, $dob)) {
                echo "<script>alert('Employee successfully registered!');</script>";
                header("Location: index.php?page=employee-login"); // Redirect to login
                exit();
            } else {
                echo "<script>alert('Error during registration. Please try again.');</script>";
                include_once('view/employee/employee-signup.php');
            }
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
            case '2': // Department list
                $this->showDepartments(); // Call the new method
                break;
            case '3':
                include_once('view/admin/project-status.php');
                break;
            case '4': // Add department
                $this->addDepartment();
                break;
                
            case '5':
                session_destroy();
                header("Location: index.php?page=admin-login");
                exit();

            case '6':
                $this->addProject(); // Call the addProject method
                break;
                
            default:
                include_once('view/admin/employee-list.php');
                break;
        }
    }

    public function navigatesPagesEmployee()
    {
        $command = isset($_GET['command']) ? $_GET['command'] : 0; // Correct variable name
    
        switch ($command) {
            case '0':
                include_once('view/employee/my-details.php');
                break;
            case '1':
                include_once('view/employee/leave-history.php');
                break;
            case '2':
                include_once('view/employee/apply-for-leave.php'); // Adjust case as necessary
                break;
            case '3':
                include_once('view/employee/update-project.php'); // Adjust case as necessary
                break;
            case '4':
                include_once('view/employee/employee-attendance.php'); // Adjust case as necessary
                break;
            case '5':
                session_destroy();
                header("Location: index.php?page=employee-login.php");
                exit();
            default:
                include_once('view/employee/my-details.php');
                break;
        }
    }
    
}
?>
