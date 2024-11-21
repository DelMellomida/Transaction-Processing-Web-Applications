<?php
session_start();

$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php

    switch ($_SERVER['REQUEST_URI']) {
        case '/logout':
            session_unset();
            session_destroy();
            header('Location: /');
            exit;

        case '/login':
            include('../resources/views/login.php');
            break;

        case '/register':
            include('../resources/views/register.php');
            break;

        default:
            include('../resources/views/home.php');
            break;
    }
    ?>

</body>

</html>