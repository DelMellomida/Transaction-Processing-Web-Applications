<?php

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "eCommerce";
    private $conn;

    public function __construct()
    {
        try {
            // Step 1: Connect to MySQL server (without selecting a database)
            $this->conn = new PDO("mysql:host=$this->servername", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Step 2: Check if the database exists, and create it if not
            $this->createDatabase();

            // Step 3: Reconnect to the specific database
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Step 4: Check if the `users` table exists, and create it if not
            $this->createUsersTable();
        } catch (PDOException $e) {
            $error_message = "Database Error: " . $e->getMessage() . " | Date/Time: " . date('Y-m-d H:i:s') . "\n";
            $log_file = '../logError/logs.txt';
            file_put_contents($log_file, $error_message, FILE_APPEND);
        }
    }

    private function createDatabase()
    {
        try {
            $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
            $this->conn->exec($sql);
        } catch (PDOException $e) {
            throw new Exception("Failed to create database: " . $e->getMessage());
        }
    }

    private function createUsersTable()
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
                last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
            ";

            $this->conn->exec($sql);
        } catch (PDOException $e) {
            throw new Exception("Failed to create users table: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>