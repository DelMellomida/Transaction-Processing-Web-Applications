<?php
$cssPath = __DIR__ . 'css/adminStyles.css';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Dynamically include adminStyles.css -->
    <link rel="stylesheet" href="<?php echo $cssPath; ?>">
</head>

<body>
    <header>
        <nav>
            <div class="button-container">
                <a href="/adminHome" class="button">Dashboard</a>
                <a href="/addProduct" class="button">Add Product</a>
                <a href="/allProduct" class="button">All Products</a>
                <a href="/logout" class="button">Logout</a>
            </div>
        </nav>
    </header>

</body>