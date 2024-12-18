<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    // echo '<h1>Access Denied</h1>';
    // echo '<p>You do not have permission to view this page. Please contact your administrator if you believe this is an error.</p>';
    $alertMessage = "You do not have permission to view this page. Please contact your administrator if you believe this is an error.";
    include_once('../resources/components/dangerAlert.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Link to External CSS -->
    <link rel="stylesheet" href="css/adminStyles.css">

    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Admin Header -->
    <?php require_once __DIR__ . '/../components/adminHeader.php'; ?>

    
</body>

</html>







