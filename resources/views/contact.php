<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check user authentication
$is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unbox Surprise</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon_io//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon_io//favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="/css/myStyles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Freeman&family=Teachers:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>

    <?php
    require_once __DIR__ . '/../components/header.php';
    ?>

    <!--Contact Section-->
    <section class="contact">
        <div class="contact-left-content">
            <h1>Contact Us</h1><br>
            <form>
                <table>
                    <label>Name</label><br>
                    <input type="text" name="name"><br><br>
                    <label>Email</label><br>
                    <input type="email" name="email"><br><br>
                    <label>Subject </label><br>
                    <select name="subject">
                        <option value="selecting" hidden selected>Select a subject</option>
                        <option value="product-issue">Product Issue</option>
                        <option value="customization">Customization</option>
                        <option value="cancel-order">Cancel Order</option>
                        <option value="other">Other(Specify Below)</option>
                    </select><br></br>
                    <label>Message</label><br>
                    <textarea name="message" rows="3" cols="23">
                    </textarea><br><br>
                    <input type="button" id="submit" value="Submit">
                </table>
            </form>
        </div>
        <div class="contact-right-content">
            <h2>Connect through another way</h2>
            <div class="icons">
                <a href="https://www.facebook.com/jhondel.jumuadmellomida/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://x.com/jhondeeeeeeel?t=dkc1bocYxW27V0gAK85lxQ&s=07"><i
                        class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/jhndlmllmd/"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </section>

    <!--Footer Section-->
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

    <script src="/js/myScript.js"></script>
</body>

</html>