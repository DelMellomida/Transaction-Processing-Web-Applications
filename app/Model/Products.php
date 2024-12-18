<?php

require_once("Database.php");

class Products
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    private function logError($message)
    {
        $error_message = "Error: " . $message . " | Date/Time: " . date('Y-m-d H:i:s') . "\n";
        $log_file = '../logError/logs.txt';
        file_put_contents($log_file, $error_message, FILE_APPEND);
    }

    public function createProduct($data)
    {
        try {
            $this->db->beginTransaction();

            $sql = "
        INSERT INTO products (name, description, price, stock, category, image_url)
        VALUES (:name, :description, :price, :stock, :category, :image_url);
        ";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':name' => $data['name'],
                ':description' => $data['description'],
                ':price' => $data['price'],
                ':stock' => $data['stock'],
                ':category' => $data['category'],
                ':image_url' => $data['image_url'],
            ]);

            $this->db->commit(); // Commit transaction
           // echo "<script>alert('Product added successfully.');</script>";
        } catch (PDOException $e) {
            $this->db->rollBack(); // Rollback transaction

            $this->logError($e->getMessage());
            return "Error adding product. Please try again later.";
        }
    }

    public function getProducts($category)
    {
        try {
            if (!isset($category) || $category === "") {
                $sql = "SELECT * FROM products;";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $sql = "SELECT * FROM products WHERE category=:category;";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([":category" => $category]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            $this->logError($e->getMessage());
            return null;
        }

    }
}

?>