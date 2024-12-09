<?php

require_once("../app/Model/Auth.php");

class AuthController
{
    private $auth;

    function __construct()
    {
        $this->auth = new Auth();
    }

    public function register($data)
    {
        $fullname = trim($data['fullname']);
        $address = trim($data['address']);
        $email = trim($data['email']);
        $username = trim($data['username']);
        $password = trim($data['password']);
        $confirm_password = trim($data['confirm_password']);

        if (empty($fullname) || empty($address) || empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
            return "All fields are required.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }

        if ($password !== $confirm_password) {
            return "Passwords do not match.";
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        return $this->auth->createUser([
            'fullname' => $fullname,
            'address' => $address,
            'email' => $email,
            'username' => $username,
            'password' => $hashedPassword,
        ]);
    }

    public function login($data)
    {
        $username = trim($data['username']);
        $password = trim($data['password']);

        if (empty($username) || empty($password)) {
            return "Username and Password are required.";
        }

        $user = $this->auth->getUserByUsername($username);

        if (!$user) {
            return "User does not exist.";
        }

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['user_logged_in'] = true;

            $this->auth->updateLoginTime($user['id']);

            if ($_SESSION['role'] === 'admin') {
                header("Location: http://localhost:8000/admin");
                exit;
            } else {
                header("Location: http://localhost:8000/home");
                exit;
            }

        } else {
            return "Incorrect password.";
        }
    }
}
?>