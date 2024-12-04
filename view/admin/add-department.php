<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <link rel="stylesheet" href="css/styles_update-activation.css">
</head>
<body>
    <header>
        <h1>Add New Department</h1>
    </header>
    <main>
        <div class="form-container">
            <h2>Enter Department Details</h2>
            <form action="index.php?page=dashboard&command=4" method="POST">
                <label for="departmentName">Department Name:</label>
                <input type="text" id="departmentName" name="departmentName" required>

                <button type="submit" class="btn">Add Department</button>
            </form>
        </div>
    </main>
</body>
</html>
