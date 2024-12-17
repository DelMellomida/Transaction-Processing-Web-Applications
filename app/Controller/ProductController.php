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
            try {
                $imagePath = $this->uploadImage($_FILES['image_url']);

                $data = [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'price' => $_POST['price'],
                    'stock' => $_POST['stock'],
                    'category' => $_POST['category'],
                    'image_url' => $imagePath,
                ];

                $result = $this->product->createProduct($data);
                echo $result;


            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Invalid request method.";
        }
    }

    private function uploadImage($file)
    {
        $targetDir = "../public/assets/";
        $fileName = uniqid() . "-" . basename($file["name"]);
        $targetFile = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validate the file
        if ($file["size"] > 500000) {
            throw new Exception("File is too large.");
        }

        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            throw new Exception("Invalid file type. Only JPG, PNG, JPEG, and GIF are allowed.");
        }

        // Move uploaded file to target directory
        if (!move_uploaded_file($file["tmp_name"], $targetFile)) {
            throw new Exception("Failed to upload image.");
        }

        return "/assets/" . $fileName; // Save relative path for database storage
    }

    public function showProducts($data)
    {

        $category = trim($data['category']);

        $products = $this->product->getProducts($category);

        $this->render('listProducts', ['products' => $products]);
    }

    private function render($view, $data)
    {
        extract($data);
        require_once "../resources/views/{$view}.php";
    }
}

?>