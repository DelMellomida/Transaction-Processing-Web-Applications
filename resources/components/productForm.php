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
        <option value="Indulgent Delights">Indulgent Delights</option>
        <option value="Handcrafted Luxuries">Handcrafted Luxuries</option>
        <option value="Personalized Treasures">Personalized Treasures</option>
    </select><br><br>

    <label for="image_url">Product Image:</label><br>
    <input type="file" name="image_url" id="image_url" accept="image/*" required><br><br>

    <button type="submit">Add Product</button>
</form>