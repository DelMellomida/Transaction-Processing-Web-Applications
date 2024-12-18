<?php

require_once("../app/Controller/ProductController.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    // echo '<h1>Access Denied</h1>';
    // echo '<p>You do not have permission to view this page. Please contact your administrator if you believe this is an error.</p>';
    $alertMessage = "You do not have permission to view this page. Please contact your administrator if you believe this is an error.";
    include_once('../resources/components/dangerAlert.php');
    exit;
}

$productController = new ProductController();
$message = '';

$product = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productController = new ProductController();
    $productController->editProduct($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/adminStyles.css">
</head>

<body>
    <?php
    require_once __DIR__ . '/../components/adminHeader.php';

    $product = $productController->getProduct();
    require_once __DIR__ . '/../components/productForm.php';
    ?>
</body>

</html>