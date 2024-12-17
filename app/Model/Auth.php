<?php

require_once("Database.php");

class Auth
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function createUser($data)
    {
        $retryAttempts = 100;
        $attempt = 0;

        while ($attempt < $retryAttempts) {
            try {
                $this->db->beginTransaction(); // Start transaction

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

                $this->db->commit(); // Commit transaction
                return true;
            } catch (PDOException $e) {
                $this->db->rollBack(); // Rollback transaction

                if (strpos($e->getMessage(), '1205') !== false) {
                    $attempt++;
                    sleep(1); // Brief pause before retrying
                } else {
                    $this->logError($e->getMessage());
                    return false;
                }
                return false;
            }
        }

        return false;
    }

    public function getUserByUsername($username)
    {
        try {
            $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':username' => $username]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->logError($e->getMessage());
            return null;
        }
    }

    public function updateLoginTime($uid)
    {
        try {
            $sql = "UPDATE users SET last_login = CURRENT_TIMESTAMP WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':id' => $uid]);

            return true;
        } catch (PDOException $e) {
            $this->logError($e->getMessage());
            return false;
        }
    }

    private function logError($message)
    {
        $error_message = "Error: " . $message . " | Date/Time: " . date('Y-m-d H:i:s') . "\n";
        $log_file = '../logError/logs.txt';
        file_put_contents($log_file, $error_message, FILE_APPEND);
    }
}
?>