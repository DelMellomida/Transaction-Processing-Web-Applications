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
                // echo $result;


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

    public function getProducts($category)
    {
        $products = $this->product->getProducts($category);
        return $products;
    }

    public function getProduct()
    {
        if (isset($_SESSION['product_id']) && !empty($_SESSION['product_id'])) {
            $id = $_SESSION['product_id'];

            try {
                $productItem = $this->product->getProduct($id);

                if ($productItem && is_array($productItem)) {
                    $_SESSION['product_id'] = null;  // Clear after fetching
                    return $productItem;
                } else {
                    throw new Exception("Product not found.");
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return [];  // Return an empty array instead of null
            }
        } else {
            return [];
        }
    }

    public function editProduct($data)
    {
        // $imagePath = $this->uploadImage($_POST['image_url']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'price' => $_POST['price'],
                    'stock' => $_POST['stock'],
                    'category' => $_POST['category'],
                    'image_url' => $_POST['existing_image_url'],
                ];

                $result = $this->product->editProduct($data);
                $this->renderAlert("successAlert", "Successful Update");


            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            // echo "Invalid request method.";
            $this->renderAlert("dangerAlert", "Unsuccessful Update");
        }
    }

    private function render($view, $data)
    {
        extract($data);
        require_once "../resources/views/{$view}.php";
    }

    private function renderAlert($view, $message)
    {
        $alertMessage = $message;
        include_once("../resources/components/{$view}.php");
    }
}

?>