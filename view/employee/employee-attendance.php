<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance</title>
    <link rel="stylesheet" href="css/styles_update-activation.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Employee Attendance</h1>
    </header>

    <div class="form-container">
        <h2>Attendance Report</h2>
        <form action="process-attendance.php" method="POST">
            <label for="employee-id">Employee ID:</label>
            <input type="text" id="employee-id" name="employee_id" placeholder="Enter Employee ID" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Employee Name" required>

            <label for="time-in">Time In:</label>
            <input type="time" id="time-in" name="time_in" required>
            <button type="submit">Submit Time in</button>

            <label for="time-out">Time Out:</label>
            <input type="time" id="time-out" name="time_out" required>

            <button type="submit">Submit Time Out</button>
        </form>
    </div>

    <div class="table-container">
        <h2>Full Attendance Records</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Hours</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data; replace with dynamic PHP code to generate rows -->
                <tr>
                    <td>001</td>
                    <td>John Doe</td>
                    <td>2024-12-01</td>
                    <td>09:00</td>
                    <td>17:00</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Jane Smith</td>
                    <td>2024-12-01</td>
                    <td>09:15</td>
                    <td>17:15</td>
                    <td>8</td>
                </tr>
                <!-- Additional rows can be added here -->
            </tbody>
        </table>
    </div>
</body>
</html>
