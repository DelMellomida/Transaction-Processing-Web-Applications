<?php

require_once("Database.php");

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        if ($this->db) {
            echo "Database connection established successfully.";
        } else {
            echo "Failed to establish a database connection.";
        }
    }
}

?>