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
            INSERT INTO products(name, description, price, stock, category, image_url)
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
            return "Product added successfully.";
        } catch (PDOException $e) {
            $this->db->rollBack(); // Rollback transaction

            $this->logError($e->getMessage());
            return "Error adding product. Please try again later.";
        }
    }
}

?>