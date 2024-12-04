<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
 
    <header>
        <div class="menu-bar">
            <h1 class="logo">Employee Management</h1>
        </div>
    </header>
    <main>
        <div class="table-container">
            <h2>Employee List</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Date of Birth</th>
                        <th>Department ID</th>
                        <th>Account Status</th>
                        <th>Update Activation</th>
                        <th>Update Department</th>
                        <th>Delete Employee</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include the EmployeeModel
                    include_once('model/employee.php');

                    // Create an instance of EmployeeModel
                    $employeeModel = new EmployeeModel();
                    
                    // Fetch all employees
                    $employees = $employeeModel->getAllEmployees();

                    // Check if there are employees and display them
                    if ($employees) {
                        foreach ($employees as $employee) {
                            echo "<tr>";
                            echo "<td>{$employee['username']}</td>";
                            echo "<td>{$employee['name']}</td>";
                            echo "<td>********</td>"; // Do not display the actual password
                            echo "<td>{$employee['DOB']}</td>";
                            echo "<td>{$employee['deptId']}</td>";
                            echo "<td>" . ($employee['accountActive'] ? 'Activated' : 'Deactivated') . "</td>";
                            echo "<td>
                                    <form action='controller/adminController.php' method='post'>
                                        <input type='hidden' name='employee_id' value='{$employee['username']}'>
                                        <button type='submit' name='activate' class='btn'>Activate</button>
                                        <button type='submit' name='deactivate' class='btn'>Disable</button>
                                    </form>
                                  </td>";
                            echo "<td>
                                    <button class='btn update-dept-btn'>Update</button>
                                  </td>";
                            echo "<td>
                                    <form action='controller/adminController.php' method='post'>
                                        <input type='hidden' name='employee_id' value='{$employee['username']}'>
                                        <button type='submit' name='delete' class='btn'>Delete</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No employees found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
