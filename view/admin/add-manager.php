<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Manager</title>
    <link rel="stylesheet" href="css/styles_update-activation.css">
</head>
<body>
    <header>
        <h1>Assign Manager</h1>
    </header>
    <main>
        <div class="form-container">
            <h2>Select a Manager</h2>
            <form action="index.php?page=dashboard&command=7&deptId=<?php echo urlencode($_GET['deptId']); ?>" method="POST">
            <label for="managerId">Select Manager:</label>
                <select id="managerId" name="managerId" required>
                    <option value="">--Select a Manager--</option>
                    <?php
                    // Fetch and display the employee list
                    include_once('model/employee.php');
                    $employeeModel = new EmployeeModel();
                    $employees = $employeeModel->getAllEmployees(); // Assuming you have this method

                    if (empty($employees)) {
                        echo "<option value=''>No employees found</option>";
                    } else {
                        foreach ($employees as $employee) {
                            echo "<option value='" . htmlspecialchars($employee['id']) . "'>" . htmlspecialchars($employee['name']) . "</option>";
                        }
                    }
                    ?>
                </select>
                <input type="hidden" id="deptId" name="deptId" value="<?php echo htmlspecialchars($_GET['deptId']); ?>" required>


                <button type="submit" class="btn">Assign Manager</button>
            </form>
        </div>
    </main>
</body>
</html>
