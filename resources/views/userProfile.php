<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once("../app/Controller/AuthController.php");

$authController = new AuthController();
// Check user authentication
$is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'delete') {
            $authController->deleteUser();
        } elseif ($_POST['action'] === 'update') {
            $authController->updateUser($_POST);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/myStyles.css">

    <title>User Profile Page</title>
    <style>
        body {
            background-image: url('/assets/bgImage3-try.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .submit-btn {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .submit-btn:active {
            background-color: #003f7f;
        }

        .submit-btn.delete {
            background-color: #dc3545;
        }

        .submit-btn.delete:hover {
            background-color: #a71d2a;
        }
    </style>
</head>

<body>


    <?php
    require_once __DIR__ . '/../components/header.php';

    $user = $authController->getUser();

    require_once __DIR__ . '/../components/userProfileForm.php';


    ?>


    <footer>
        <div class="footer-content">
            <div class="quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="collections.html">Products</a></li>
                    <li><a href="home.html">Blogs</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="home.html">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="subscription-form">
                <h3>Subscribe to our Newsletter</h3>
                <form>
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>

            <div class="contact-info">
                <h3>Contact Us</h3>
                <p>Email: info@example.com</p>
                <p>Phone: +1 123 456 7890</p>
            </div>

            <div class="location-icons">
                <span>New York, NY</span>
                <span>London, UK</span>
                <span>Tokyo, Japan</span>
            </div>

            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 Unbox Surprise. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>