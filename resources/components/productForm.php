<form action="" method="POST" enctype="multipart/form-data">
    <section class="overview">
        <div class="card">
            <h3>Product Name</h3> <br>
            <input type="text" id="name" name="name"
                value="<?= !empty($product) ? htmlspecialchars($product['name']) : '' ?>" required>
        </div>
        <div class="card">
            <h3>Category</h3> <br>
            <select id="category" name="category" required>
                <option value="Indulgent Delights" <?= !empty($product) && $product['category'] === 'Indulgent Delights' ? 'selected' : '' ?>>Indulgent Delights</option>
                <option value="Handcrafted Luxuries" <?= !empty($product) && $product['category'] === 'Handcrafted Luxuries' ? 'selected' : '' ?>>Handcrafted Luxuries</option>
                <option value="Personalized Treasures" <?= !empty($product) && $product['category'] === 'Personalized Treasures' ? 'selected' : '' ?>>Personalized Treasures</option>
            </select>
        </div>
        <div class="card">
            <h3>Price</h3> <br>
            <input type="number" id="price" name="price" step="0.01"
                value="<?= !empty($product) ? htmlspecialchars($product['price']) : '' ?>" required>
        </div>
        <div class="card">
            <h3>Stock</h3> <br>
            <input type="number" id="stock" name="stock"
                value="<?= !empty($product) ? htmlspecialchars($product['stock']) : '' ?>" required>
        </div>
        <div class="card">
            <h3>Description</h3>
            <textarea id="description" name="description" rows="4"
                required><?= !empty($product) ? htmlspecialchars($product['description']) : '' ?></textarea>
        </div>
        <div class="card">
            <label for="image_url">Product Image:</label><br> <br><br>
            <input type="file" name="image_url" id="image_url" accept="image/*" required>
        </div>
    </section>
    <br><br><button type="submit" class="submit-btn"><?= !empty($product) ? 'Update Product' : 'Add Product' ?></button>
</form>