<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="menu-bar">
            <h1 class="logo">Department Management</h1>
        </div>
    </header>
    <main>
        <div class="table-container">
            <h2>Department List</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Department ID</th>
                        <th>Department Name</th>
                        <th>Current Project</th>
                        <th>Manager Username</th>
                        <th>Add New Project</th>
                        <th>Add New Manager</th>
                        <th>Delete Department</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database connection
                    $db = new mysqli('localhost', 'root', '', '_hrmsystem');

                    // Check connection
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }

                    // Fetch departments
                    $query = "SELECT deptID, deptName, assignProject, deptManager FROM department";
                    $result = $db->query($query);

                    if ($result && $result->num_rows > 0) {
                        // Loop through each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['deptID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['deptName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['assignProject']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['deptManager']) . "</td>";
                            echo "<td><button class='btn add-project-btn'>Add Project</button></td>";
                            echo "<td><button class='btn add-manager-btn'>Add Manager</button></td>";
                            echo "<td><button class='btn delete-btn'>Delete</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        // No data available
                        echo "<tr><td colspan='7'>No departments found</td></tr>";
                    }

                    // Close connection
                    $db->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
