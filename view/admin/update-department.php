<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Department</title>
    <link rel="stylesheet" href="css/styles_update-department.css">
</head>
<body>
    <header>
        <h1>Update Department</h1>
    </header>
    <main>
        <?php
        $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : null;

        if ($username === null) {
            echo "<p>No employee selected.</p>";
            exit;
        }

        // Fetch employee details (optional)
        include_once('model/employee.php');
        $employeeModel = new EmployeeModel();
        $employee = $employeeModel->getEmployeeByUsername($username);
        ?>
        <div class="form-container">
            <h2>Update Department for: <?php echo $employee['name']; ?></h2>
            <form action="process-department-update.php" method="POST">
                <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
                <label for="department">Select New Department:</label>
                <select id="department" name="department">
                    <option value="1">HR</option>
                    <option value="2">Finance</option>
                    <option value="3">IT</option>
                    <option value="4">Marketing</option>
                    <!-- Add more departments as needed -->
                </select>
                <button type="submit" class="btn">Update</button>
            </form>
        </div>
    </main>
</body>
</html>
