<?php

require_once("../app/Controller/ProductController.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    echo '<h1>Access Denied</h1>';
    echo '<p>You do not have permission to view this page. Please contact your administrator if you believe this is an error.</p>';
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new ProductController();
    $message = $authController->createProduct($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <h1>Add New Product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>

        <label for="price">Price (PHP):</label><br>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="stock" required><br><br>

        <label for="category">Category:</label><br>
        <select id="category" name="category" required>
            <option value="Coffee">Coffee</option>
            <option value="Tea">Tea</option>
            <option value="Snacks">Snacks</option>
        </select><br><br>

        <label for="image_url">Product Image:</label><br>
        <input type="file" id="image_url" name="image_url" accept="image/*" required><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>

</html>