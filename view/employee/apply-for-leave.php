<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Leave</title>
    <link rel="stylesheet" href="css/styles_update-activation.css">
</head>
<body>
    <div class="form-container">
        <h2>Apply for Leave</h2>
        <form action="process-leave-application.php" method="POST">
            <label for="leaveStart">Enter Leave Start Date</label>
            <input type="date" id="leaveStart" name="leave_start" required>

            <label for="leaveEnd">Enter Leave End Date</label>
            <input type="date" id="leaveEnd" name="leave_end" required>

            <label for="leaveReason">Reason</label>
            <textarea id="leaveReason" name="leave_reason" rows="4" required placeholder="Enter your reason for leave..."></textarea>

            <button type="submit">Submit Leave Application</button>
        </form>
    </div>
</body>
</html>
