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
                        <th>Assigned Project</th>
                        <th>Department Manager</th>
                        <th>Add New Project</th>
                        <th>Add New Manager</th>
                        <th>Delete Department</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($departments)) {
                        foreach ($departments as $row) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['deptId']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['deptName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['assignProject']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['deptManager']) . "</td>";
                            echo "<td><a href='index.php?page=dashboard&command=6&deptId=" . urlencode($row['deptId']) . "' class='btn add-project-btn'>Add Project</a></td>";
                            echo "<td><button class='btn add-manager-btn'>Add Manager</button></td>";
                            echo "<td><button class='btn delete-btn'>Delete</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No departments found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
