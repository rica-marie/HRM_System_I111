<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Manager</title>
    <link rel="stylesheet" href="css/styles_update-activation.css">
</head>
<body>
    <div class="form-container">
        <h2>Add Manager</h2>
        <form action="process-add-manager.php" method="POST">
            <label for="managerName">Manager Name</label>
            <input type="text" id="managerName" name="manager_name" required placeholder="Enter the manager's name">

            <label for="managerEmail">Manager Email</label>
            <input type="email" id="managerEmail" name="manager_email" required placeholder="Enter the manager's email">

            <label for="managerPassword">Manager Password</label>
            <input type="password" id="managerPassword" name="manager_password" required placeholder="Enter a password for the manager">

            <label for="departmentID">Department ID</label>
            <input type="text" id="departmentID" name="department_id" required placeholder="Enter the department ID">

            <button type="submit">Add Manager</button>
        </form>
    </div>
</body>
</html>
