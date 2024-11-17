<?php

class Database
{
    private $host = "localhost";
    private $dbname = "meh";
    private $username = "root";
    private $password = "";
    private $port = 3306; // Add port if needed (default is 3306)

    private $connection;
    private static $instance = null;

    private function __construct()
    {
        try {
            // First, connect without selecting a database
            $dsnWithoutDb = "mysql:host={$this->host};port={$this->port};charset=utf8mb4";
            $this->connection = new PDO($dsnWithoutDb, $this->username, $this->password);

            // Set attributes for the connection
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // Create the database if it does not exist
            $createDbQuery = "CREATE DATABASE IF NOT EXISTS {$this->dbname}";
            $this->connection->exec($createDbQuery);

            // Check if the database was created
            if ($this->connection->errorCode()) {
                echo "Error creating database: " . implode(", ", $this->connection->errorInfo());
            } else {
                echo "Database created successfully or already exists.";
            }

            // Now, connect to the newly created database
            $dsnWithDb = "mysql:host={$this->host};dbname={$this->dbname};port={$this->port};charset=utf8mb4";
            $this->connection = new PDO($dsnWithDb, $this->username, $this->password);

            // Set attributes for the new connection
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // Call the function to create tables
            $this->createTables();

        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
    }

    private function createTables()
    {
        // SQL for creating the users table
        $sql = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            role VARCHAR(50) NOT NULL DEFAULT 'user',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        ";

        // Execute the SQL to create the table
        try {
            $this->connection->exec($sql);
            echo "Users table is ready!";
        } catch (PDOException $e) {
            die("Error creating table: " . $e->getMessage());
        }

        // Add other table creation logic here if needed
    }
}
