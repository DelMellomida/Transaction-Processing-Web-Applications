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

    <!--Introduction Section-->
    <div class="row">
        <div class="containers col-lg-6 col-md-6">
            <div class="pic"></div>

            <div class="box1"></div>
            <div class="box2"></div>

            <div class="social1">
                <i class="fa-brands fa-facebook" aria-hidden="true"></i>
            </div>
            <div class="social2">
                <i class="fa-brands fa-instagram" aria-hidden="true"></i>
            </div>
            <div class="social3">
                <i class="fa-brands fa-twitter" aria-hidden="true"></i>
            </div>
        </div>

        <div class="about-content">
            <center>
                <h1 class="contentHead">About Unbox Surprise</h1>
            </center>

            <p>We're Unbox Surprise, and we're passionate about making gift-giving a joy, not a chore. We believe the
                best gifts are surprises filled with unique and delightful finds.</p>
            <br>

            <p>Imagine the excitement on someone's face when they open a box curated just for them, overflowing with
                high-quality treasures they'll truly love. That's the magic we create at Unbox Surprise.</p>
            <br>

            <p>So, next time you're looking for a gift that sparks joy and creates lasting memories, skip the generic
                and explore our surprise boxes. We have something special for everyone!</p>
            <br>

            <p class="ending">Warmly,</p>

            <p class="ending">The Unbox Surprise Team</p>
        </div>
    </div>

    <!--Mission and Vision Section-->
    <div class="story-container">
        <h1>Our Mission and Vision</h1>
        <p>At Unbox Surprise, our mission is to transform gift-giving into a delightful experience for both the giver
            and the receiver. We strive to curate surprise boxes that are not only filled with high-quality treasures
            but also evoke a sense of excitement and anticipation.</p>

        <p>Our vision is to become the go-to destination for anyone seeking unique and thoughtful gifts. We envision a
            world where gift-giving is no longer a chore but a joyful celebration of connection and appreciation.</p>
    </div>

    <!--Team Section-->
    <div class="team-container">
        <h1>Meet the team</h1>
        <div class="team-row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" src="/assets/bensing.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Denmark Bensing</h3>
                        <h4 class="title">Chief Creative Officer</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://facebook.com" class="fa-brands fa-facebook" aria-hidden="true"></a></li>
                        <li><a href="https://twitter.com" class="fa-brands fa-twitter" aria-hidden="true"></a></li>
                        <li><a href="https://google.com" class="fa-brands fa-google-plus-g" aria-hidden="true"></a></li>
                        <li><a href="https://linkedin.com" class="fa-brands fa-linkedin" aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" src="/assets/de_ocampo.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Arden Klyde De Ocampo</h3>
                        <h4 class="title">Marketing Manager</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://facebook.com" class="fa-brands fa-facebook" aria-hidden="true"></a></li>
                        <li><a href="https://twitter.com" class="fa-brands fa-twitter" aria-hidden="true"></a></li>
                        <li><a href="https://google.com" class="fa-brands fa-google-plus-g" aria-hidden="true"></a></li>
                        <li><a href="https://linkedin.com" class="fa-brands fa-linkedin" aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" src="/assets/ocariza.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">James Andrew Ocariza</h3>
                        <h4 class="title">Product Designer</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://facebook.com" class="fa-brands fa-facebook" aria-hidden="true"></a></li>
                        <li><a href="https://twitter.com" class="fa-brands fa-twitter" aria-hidden="true"></a></li>
                        <li><a href="https://google.com" class="fa-brands fa-google-plus-g" aria-hidden="true"></a></li>
                        <li><a href="https://linkedin.com" class="fa-brands fa-linkedin" aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" src="/assets/mellomida.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="name">Jhondel Mellomida</h3>
                        <h4 class="title">Operations Manager</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://facebook.com" class="fa-brands fa-facebook" aria-hidden="true"></a></li>
                        <li><a href="https://twitter.com" class="fa-brands fa-twitter" aria-hidden="true"></a></li>
                        <li><a href="https://google.com" class="fa-brands fa-google-plus-g" aria-hidden="true"></a></li>
                        <li><a href="https://linkedin.com" class="fa-brands fa-linkedin" aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="our-team">
                    <div class="picture">
                        <img class="img-fluid" src="/assets/chatgpt.png">
                    </div>
                    <div class="team-content">
                        <h3 class="name">ChatGpt</h3>
                        <h4 class="title">Product Designer</h4>
                    </div>
                    <ul class="social">
                        <li><a href="https://facebook.com" class="fa-brands fa-facebook" aria-hidden="true"></a></li>
                        <li><a href="https://twitter.com" class="fa-brands fa-twitter" aria-hidden="true"></a></li>
                        <li><a href="https://google.com" class="fa-brands fa-google-plus-g" aria-hidden="true"></a></li>
                        <li><a href="https://linkedin.com" class="fa-brands fa-linkedin" aria-hidden="true"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



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