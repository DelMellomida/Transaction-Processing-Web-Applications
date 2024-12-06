<?php

require_once "../app/Model/Products.php"; // Assuming your model is named Product.php

class ProductController
{
    private $product;

    public function __construct()
    {
        $this->product = new Products();
    }

    public function createProduct($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'category' => $_POST['category'],
                // 'image_url' => $this->uploadImage($_FILES['image_url']),
            ];

            $result = $this->product->createProduct($data);
            echo $result;
        } else {
            echo "Invalid request method.";
        }
    }

    // Commenting out the image upload method for now
    /*
    private function uploadImage($file)
    {
        $targetDir = "/assets";
        $targetFile = $targetDir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validate the file
        if ($file["size"] > 500000) {
            throw new Exception("File is too large.");
        }

        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            throw new Exception("Invalid file type. Only JPG, PNG, JPEG, and GIF are allowed.");
        }

        if (!move_uploaded_file($file["tmp_name"], $targetFile)) {
            throw new Exception("Failed to upload image.");
        }

        return $targetFile; // Save relative path
    }
    */
}

// Router logic
if (isset($_GET['action'])) {
    $controller = new ProductController();

    if ($_GET['action'] === 'createProduct') {
        $controller->createProduct($data);
    } else {
        echo "Invalid action.";
    }
} else {
    echo "No action specified.";
}
?>