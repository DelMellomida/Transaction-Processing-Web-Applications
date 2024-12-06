<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    echo '<h1>Access Denied</h1>';
    echo '<p>You do not have permission to view this page. Please contact your administrator if you believe this is an error.</p>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- Link to External CSS -->
    <link rel="stylesheet" href="/public/css/adminStyles.css">

    <!-- Inline CSS Fallback -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .button {
            padding: 10px 20px;
            font-size: 18px;
            color: white;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <?php require_once __DIR__ . '/../components/adminHeader.php'; ?>

    <h1>Welcome, Admin</h1>

</body>

</html>