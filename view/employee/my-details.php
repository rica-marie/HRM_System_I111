<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Details</title>
    <link rel="stylesheet" href="css/styles_navbar.css">
    <style>
        .details-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .details-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #007bff;
            text-align: center;
        }

        .details-container .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }

        .details-container .detail-item span {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <h1 class="logo">My Details</h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="employee-dashboard.html">Dashboard</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="details-container">
            <h2>Account Details</h2>
            <div class="detail-item">
                <span>Email:</span>
                <span>employee@example.com</span>
            </div>
            <div class="detail-item">
                <span>Name:</span>
                <span>John Doe</span>
            </div>
            <div class="detail-item">
                <span>Password:</span>
                <span>********</span>
            </div>
            <div class="detail-item">
                <span>Date of Birth:</span>
                <span>1990-01-01</span>
            </div>
            <div class="detail-item">
                <span>Department ID:</span>
                <span>12345</span>
            </div>
        </div>
    </main>
</body>
</html>