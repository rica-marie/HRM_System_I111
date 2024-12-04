<?php
// Retrieve the username from the query parameters
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Activation</title>
    <link rel="stylesheet" href="css/styles_update-activation.css">
</head>
<body>
    <header>
        <h1>Update Account Activation</h1>
    </header>
    <main>
        <div class="form-container">
            <h2>Manage Account Activation for <?php echo $username; ?></h2>
            <form action="process-activation.php" method="POST">
                <input type="hidden" name="username" value="<?php echo $username; ?>"> <!-- Pass username to the processing script -->

                <label for="status">Account Status:</label>
                <select id="status" name="status">
                    <option value="activated">Activated</option>
                    <option value="deactivated">Deactivated</option>
                </select>

                <button type="submit" class="btn">Update</button>
            </form>
        </div>
    </main>
</body>
</html>
