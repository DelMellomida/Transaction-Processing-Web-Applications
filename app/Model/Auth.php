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
            // echo "Database connection established successfully.<br>";
            $this->createUserTable();
        } else {
            // echo "Failed to establish a database connection.<br>";
        }
    }

    private function createUserTable()
    {
        try {
            $sql = "
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                fullname VARCHAR(100) NOT NULL,
                username VARCHAR(50) NOT NULL UNIQUE,
                email VARCHAR(100) NOT NULL UNIQUE,
                address TEXT,
                password VARCHAR(255) NOT NULL,
                role ENUM('admin', 'user', 'moderator') DEFAULT 'user',
                last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );";

            $this->db->exec($sql);
            // echo "Users table created successfully or already exists.<br>";
        } catch (PDOException $e) {
            $error_message = "Error creating users table: " . $e->getMessage() . " | Date/Time: " . date('Y-m-d H:i:s') . "\n";
            $log_file = '../logError/logs.txt';
            file_put_contents($log_file, $error_message, FILE_APPEND);
        }
    }

    public function createUser($data)
    {
        try {
            $sql = "
            INSERT INTO users (fullname, username, email, address, password)
            VALUES (:fullname, :username, :email, :address, :password)
        ";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':fullname' => $data['fullname'],
                ':username' => $data['username'],
                ':email' => $data['email'],
                ':address' => $data['address'],
                ':password' => $data['password'],
            ]);

            return "User registered successfully.";
        } catch (PDOException $e) {
            $error_message = "Error registering user: " . $e->getMessage() . " | Date/Time: " . date('Y-m-d H:i:s') . "\n";
            $log_file = '../logError/logs.txt';
            file_put_contents($log_file, $error_message, FILE_APPEND);

            return "Error registering user. Please try again later.";
        }
    }

    public function getUserByUsername($username)
    {
        try {
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':username' => $username]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function updateLoginTime($uid)
    {
        try {
            $sql = "UPDATE users SET last_login = CURRENT_TIMESTAMP WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':id', $uid, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return null;
        }
    }
}

?>