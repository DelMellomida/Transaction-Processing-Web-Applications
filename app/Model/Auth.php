<?php

require_once("Database.php");

class Auth
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();

        if ($this->db) {
            echo "Database connection established successfully.<br>";
            $this->createUserTable();
        } else {
            echo "Failed to establish a database connection.<br>";
        }
    }

    private function createUserTable()
    {
        try {
            $sql = "
                CREATE TABLE IF NOT EXISTS users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL UNIQUE,
                    email VARCHAR(100) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    role ENUM('admin', 'user', 'moderator') DEFAULT 'user',
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                );
            ";

            $this->db->exec($sql);
            // echo "Users table created successfully or already exists.<br>";
        } catch (PDOException $e) {
            $error_message = "Error creating users table: " . $e->getMessage() . " | Date/Time: " . date('Y-m-d H:i:s') . "\n";
            $log_file = '../logError/logs.txt';
            file_put_contents($log_file, $error_message, FILE_APPEND);
        }
    }
}

?>