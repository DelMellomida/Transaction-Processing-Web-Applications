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
    <style>
        .button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Welcome, Admin</h1>

    <!-- Button to redirect to addproduct form -->
    <a href="/addproduct">
        <button class="button">Add Product</button>
    </a>
</body>

</html>