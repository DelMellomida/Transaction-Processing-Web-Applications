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

require_once("../app/Controller/ProductController.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productController = new ProductController();
    $productController->showProducts($_POST);
}

include_once("../resources/components/adminHeader.php");
?>
<div>
    <h1>All Products</h1>

    <form method="POST" action="">
        <label for="category">Filter by Category:</label>
        <select name="category" id="category">
            <option value="">-- All Categories --</option>
            <option value="Tea">Tea</option>
            <option value="Books">Books</option>
            <option value="Clothing">Clothing</option>
            <option value="Toys">Toys</option>
            <option value="Home">Home</option>
        </select>

        <button type="submit">Filter</button>
    </form>

</div>

<?php if ($products && count($products) > 0): ?>
    <?php foreach ($products as $product): ?>
        </br>
        <div>
            <h3>Product: <?= htmlspecialchars($product['name']) ?></h3>
            <p>Description: <?= htmlspecialchars($product['description']) ?></p>
            <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
            <p>Stock: <?= htmlspecialchars($product['stock']) ?></p>
            <p>Category: <?= htmlspecialchars($product['category']) ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?>