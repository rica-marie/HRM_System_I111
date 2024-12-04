<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Project</title>
    <link rel="stylesheet" href="css/styles_update-activation.css">
</head>
<body>
    <div class="form-container">
        <h2>Update Project Completion Status</h2>
        <form action="process-update-project.php" method="POST">
            <label for="project-select">Select Project:</label>
            <select id="project-select" name="project">
                <option value="project1">Project 1</option>
                <option value="project2">Project 2</option>
                <option value="project3">Project 3</option>
                <!-- Add more projects as needed -->
            </select>

            <label for="status-update">Completion Status:</label>
            <input type="text" id="status-update" name="status_update" placeholder="Enter completion status" required>

            <button type="submit">Update Status</button>
        </form>
    </div>
</body>
</html>
