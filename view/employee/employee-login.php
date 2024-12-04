<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="css/styles_admin_login.css">
</head>
<body>
    <div class="login-container">
        <h2>Employees Login</h2>
        <form action="index.php?page=employee-login&command=validate" method="POST"> <!-- Update form action -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-btn">Log In</button>
        </form>
        <div class="login-footer">
            <a href="#">Forgot password?</a>
        </div>
    </div>
</body>
</html>
