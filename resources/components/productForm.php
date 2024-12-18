<form action="" method="POST" enctype="multipart/form-data">
    <section class="overview">
        <?php if (!empty($product['id'])): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
            <!-- Hidden input for Existing Image URL -->
            <input type="hidden" name="existing_image_url" value="<?= htmlspecialchars($product['image_url']) ?>">
        <?php endif; ?>

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
            <label for="image_url">Product Image:</label><br><br><br>

            <?php if (!empty($product['image_url'])): ?>
                <img id="defaultImage" src="<?= htmlspecialchars($product['image_url']) ?>" alt="Product Image"
                    style="width: 200px; height: auto; display: block; margin-bottom: 10px;" />
            <?php endif; ?>

            <input type="file" name="image_url" id="image_url" accept="image/*" onchange="previewImage(event)">
        </div>

    </section>
    <br><br><button type="submit" class="submit-btn"><?= !empty($product) ? 'Update Product' : 'Add Product' ?></button>
</form>