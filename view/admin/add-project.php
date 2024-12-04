<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link rel="stylesheet" href="css/styles_update-activation.css">
</head>
<body>
    <header>
        <h1>Add New Project</h1>
    </header>
    <main>
        <div class="form-container">
            <h2>Enter Project Details</h2>
            <form action="index.php?page=dashboard&command=6&deptId=<?php echo urlencode($_GET['deptId']); ?>" method="POST">
            <label for="projectName">Project Name:</label>
                <input type="text" id="projectName" name="projectName" required>

                <!-- Capture deptId from the URL -->
                <input type="hidden" id="deptId" name="deptId" value="<?php echo htmlspecialchars($_GET['deptId']); ?>" required>

                <button type="submit" class="btn">Add Project</button>
            </form>
        </div>
    </main>
</body>
</html>
