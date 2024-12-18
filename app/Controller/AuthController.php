<?php

require_once("../app/Model/Auth.php");

class AuthController
{
    private $auth;

    function __construct()
    {
        $this->auth = new Auth();
    }
    // Read Forms Input and Register Accounts, and conditions
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

        $isSuccessful = $this->auth->createUser([
            'fullname' => $fullname,
            'address' => $address,
            'email' => $email,
            'username' => $username,
            'password' => $hashedPassword,
        ]);

        $_SESSION['register_status'] = $isSuccessful ? true : false;

        header("Location: http://localhost:8000/register");
        exit;

    }
    // Read Forms Input and Register Accounts, and conditions
    public function login($data)
    {
        $username = trim($data['username']);
        $password = trim($data['password']);

        if (empty($username) || empty($password)) {
            return "Username and Password are required.";
        }

        $user = $this->auth->getUserByUsername($username);

        if (!$user) {
            $this->renderAlert("dangerAlert", "No User Exists");
            return "User does not exist.";
        }

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; //For Role-based acces control Line 76-82
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
            $alertMessage = "Incorrect password.";
            $this->renderAlert("dangerAlert", $alertMessage);
            return "Incorrect password.";
        }
    }

    public function getUser()
    {
        $user = $this->auth->getUserByUsername($_SESSION['username']);
        return $user;
    }

    public function updateUser($data)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'username' => $_SESSION['username'],
                    'fullname' => $_POST['fullname'],
                    'email' => $_POST['email'],
                    'address' => $_POST['address'],
                ];

                $result = $this->auth->updateUser($data);
                $this->renderAlert("successAlert", "Successful Update");

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            $this->renderAlert("dangerAlert", "Unsuccessful Update");
        }
    }

    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'username' => $_SESSION['username'],
                ];

                $result = $this->auth->deleteUser($data);
                // $this->renderAlert("successAlert", "Successful Update");
                session_unset();
                session_destroy();
                header('Location: /');
                exit;


            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            // echo "Invalid request method.";
            $this->renderAlert("dangerAlert", "Unsuccessful Update");
        }
    }

    private function render($view, $data)
    {
        extract($data);
        require_once "../resources/views/{$view}.php";
    }

    private function renderAlert($view, $message)
    {
        $alertMessage = $message;
        include_once("../resources/components/{$view}.php");
    }
}
?>