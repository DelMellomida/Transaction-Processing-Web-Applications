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
            $this->conn = new PDO("mysql:host=$this->servername", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE IF NOT EXISTS " . $this->dbname;
            $this->conn->exec($sql);

            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $error_message = "Error: " . $e->getMessage() . " | Date/Time: " . date('Y-m-d H:i:s') . "\n";
            $log_file = '../logError/logs.txt';
            file_put_contents($log_file, $error_message, FILE_APPEND);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

?>