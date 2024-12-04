<?php
class Controller
{
    public $adminModel = null;
    public $employeeModel = null; // Declare employee model

    function __construct()
    {
        include_once('model/admin.php');
        $this->adminModel = new AdminModel();
        
        include_once('model/employee.php'); // Include EmployeeModel
        $this->employeeModel = new EmployeeModel(); // Instantiate EmployeeModel
    }

    public function navigatePages() 
    {   
        $command = isset($_REQUEST['command']) ? $_REQUEST['command'] : null;

        switch ($command) {
            case 0:              
                $employees = $this->employeeModel->getEmployees(); // Get employees from model
                include_once('view/admin/employee-list.php'); // Pass data to view
                break;
            case 1:
                include_once('view/admin/leave-list.php');
                break;
            case 2:
                include_once('view/admin/department-list.php');
                break;
            case 3:
                include_once('view/admin/project-status.php');
                break;
            case 4:
                include_once('view/admin/add-department.php');
                break;
            case 5:
                include_once('view/admin/logout.php');
                break;
            default:
                include_once('view/admin/employee-list.php');
                break;      
        }    
    }
}
?>
