<?php foreach ($products as $product): ?>
    <div class="product-item">
        <img src="<?= htmlspecialchars($product['image_url']); ?>" alt="Product Image" />
        <h2><?= htmlspecialchars($product['name']); ?></h2>
        <p><?= htmlspecialchars($product['description']); ?></p>
        <p>Price: <?= htmlspecialchars($product['price']); ?></p>
        <p>Stock: <?= htmlspecialchars($product['stock']); ?></p>
        <p>Category: <?= htmlspecialchars($product['category']); ?></p>
    </div>
<?php endforeach; ?>