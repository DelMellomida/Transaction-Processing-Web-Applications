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

    <?php if ($isLoggedIn): ?>
        <div class="bg-blue-500 p-4">
            <ul class="flex space-x-4 text-white">
                <li><a href="/home">Home</a></li>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
    <?php endif; ?>

    <?php
    if ($_SERVER['REQUEST_URI'] === '/login') {
        include('../resources/views/login.php');
    } elseif ($_SERVER['REQUEST_URI'] === '/register') {
        include('../resources/views/register.php');
    } else {
        include('../resources/views/home.php');
    }
    ?>

</body>

</html>