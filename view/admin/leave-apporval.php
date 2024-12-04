<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Approval</title>
    <link rel="stylesheet" href="css/styles_update-activation.css">
</head>
<body>
    <header>
        <h1>Leave Approval</h1>
    </header>
    <main>
        <div class="form-container">
            <h2>Approve or Deny Employee Leave</h2>
            <form action="process-activation.php" method="POST">

                <label for="status">Deny / Approve Employee Leave:</label>
                <select id="status" name="status">
                    <option value="activated">Approve</option>
                    <option value="deactivated">Deny</option>
                </select>

                <button type="submit" class="btn">Update</button>
            </form>
        </div>
    </main>
</body>
</html>
