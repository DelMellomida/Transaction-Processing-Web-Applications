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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $_SESSION['product_id'] = $_POST['product_id'];
    echo $_SESSION['product_id'];
    header('Location: /editproduct');
    exit;
}

include_once("../resources/components/adminHeader.php");

?>
<link rel="stylesheet" href="css/adminStyles.css">




<body>
    <form method="POST" action="">
        <section class="overview">
            <div class="card">
                <h3>Filter by Category</h3> <br> <!-- <label for="category">Filter by Category:</label> -->
                <select id="category" name="category" required>
                    <option value="">-- All Categories --</option>
                    <option value="Indulgent Delights">Indulgent Delights</option>
                    <option value="Handcrafted Luxuries">Handcrafted Luxuries</option>
                    <option value="Personalized Treasures">Personalized Treasures</option>
                </select>
            </div>
        </section>
        <br><br><button type="submit" class="submit-btn">Filter</button>
        <!--   ORIGINAL CODE
        <label for="category">:</label>
        <select name="category" id="category">
            <option value="">-- All Categories --</option>
            <option value="Tea">Tea</option>
            <option value="Books">Books</option>
            <option value="Clothing">Clothing</option>
            <option value="Toys">Toys</option>
            <option value="Home">Home</option>
        </select>

        <button type="submit">Filter</button>-->

    </form>



    <div class="product-container">
        <section class="product-grid">
            <?php if ($products && count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <h3>Product: <?= htmlspecialchars($product['name']) ?></h3>
                        <p>Description: <?= htmlspecialchars($product['description']) ?></p>
                        <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
                        <p>Stock: <?= htmlspecialchars($product['stock']) ?></p>
                        <p>Category: <?= htmlspecialchars($product['category']) ?></p>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <img src="<?= htmlspecialchars($product['image_url']) ?>"
                                    alt="<?= htmlspecialchars($product['name']) ?>" style="display: block;">
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </section>
    </div>
</body>