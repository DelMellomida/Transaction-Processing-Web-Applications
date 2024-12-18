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

        case '/about':
            include('../resources/views/about.php');
            break;

        case '/collections':
            include('../resources/views/collections.php');
            break;

        case '/contact':
            include('../resources/views/contact.php');
            break;

        case '/admin':
            include('../resources/views/adminHome.php');
            break;

        case '/addproduct':
            include('../resources/views/addProduct.php');
            break;

        case '/editproduct':
            include('../resources/views/editProduct.php');
            break;

        case '/userprofile':
            include('../resources/views/userProfile.php');
            break;

        case '/allproduct':
            require_once("../app/Controller/ProductController.php");
            $controller = new ProductController();
            $data = [
                'category' => isset($_POST['category']) ? $_POST['category'] : ''
            ];
            $controller->showProducts($data);
            break;

        default:
            include('../resources/views/home.php');
            break;
    }
    ?>

</body>

</html>