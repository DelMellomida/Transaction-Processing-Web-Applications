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

    <!-- Hero Section -->
    <div class="hero swiper">
        <div class="carousel swiper-wrapper">
            <div class="carousel-item swiper-slide">
                <img src="/assets/bgImage.jpg" alt="New Collection">
                <div class="carousel-caption">
                    <h2>Discover Our Latest Collection</h2>
                    <button onclick="location.href='/collections'">Shop Now</button>
                </div>
            </div>
            <div class="carousel-item swiper-slide">
                <img src="/assets/bgImage2-try.png" alt="Special Offer"> <!-- Pianlitan ko pic dito par upscaled ko kasi malabo eh from jpg to png-->
                <div class="carousel-caption">
                    <h2>Exclusive Offer: 20% Off</h2>
                    <button onclick="location.href='/collections'">Learn More</button>
                </div>
            </div>
            <div class="carousel-item swiper-slide">
                <img src="/assets/bgImage3-try.png" alt="Gift Ideas"> <!-- Pianlitan ko pic dito par upscaled ko kasi malabo eh from jpg to png-->
                <div class="carousel-caption">
                    <h2>Perfect Gifts for Every Occasion</h2>
                    <button onclick="location.href='/collections'">Browse Gifts</button>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <!--Best Sellers-->
    <div class="gallery-container">
        <h1 class="gallery-title">Our Best-Selling Products</h1>
        <div class="gallery-content">
            <div class="container">
                <div class="container-img pic1"></div>
                <div class="pic-title">
                    <h3><a>Artisanal Chocolates</a></h3>
                </div>
            </div>
            <div class="container">
                <div class="container-img pic2"></div>
                <div class="pic-title">
                    <h3><a>Special Coffee</a></h3>
                </div>
            </div>
        </div>
    </div>

    <!--Why Choose Us Section-->
    <div class="why-choose-us">
        <h1>Why Choose Unbox Surprise?</h1>
        <div class="benefits-container">
            <div class="benefit-box">
                <i class="fas fa-check-circle"></i>
                <h3>Curated with Care</h3>
                <p>Every box is carefully selected with premium products, ensuring a delightful surprise for you.
                </p>
            </div>
            <div class="benefit-box">
                <i class="fas fa-gift"></i>
                <h3>Gifts for All Occasions</h3>
                <p>We offer a variety of boxes to suit any birthday, holiday, or special event.</p>
            </div>
            <div class="benefit-box">
                <i class="fas fa-star"></i>
                <h3>Top-Quality Products</h3>
                <p>We collaborate with reputable brands to guarantee exceptional quality in every box.</p>
            </div>
        </div>
    </div>

    <!--Testimonial Section-->
    <div class="testimonial-container">
        <h1>What Our Customers Say</h1>
        <div class="testimonial-wrapper">
            <div class="testimonial-box">
                <div class="testimonial-pic">
                    <img
                        src="https://images.pexels.com/photos/4927361/pexels-photo-4927361.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                </div>
                <div class="testimonial-content">
                    <h3>Lisa Wilson</h3>
                    <h5>Denver, CO</h5>
                    <p>Unboxing my 'Cozy Night In' box was an indulgent experience! The fluffy socks, rich gourmet
                        hot
                        chocolate, and calming aromatherapy candle were exactly what I needed for a relaxing
                        evening.
                        Thanks, Unbox Surprise, for creating such a blissful experience!</p>
                </div>
            </div>
            <div class="testimonial-box">
                <div class="testimonial-pic">
                    <img
                        src="https://images.pexels.com/photos/6507483/pexels-photo-6507483.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                </div>
                <div class="testimonial-content">
                    <h3>David Blaine</h3>
                    <h5>Los Angeles, CA</h5>
                    <p>Unbox Surprise is my go-to for birthdays and holidays! They always have a box that perfectly
                        fits
                        the recipient's interests, making gift-giving easy and special. No more stress about finding
                        the
                        perfect gift - Unbox Surprise has got it covered!</p>
                </div>
            </div>
            <div class="testimonial-box">
                <div class="testimonial-pic">
                    <img
                        src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                </div>
                <div class="testimonial-content">
                    <h3>Alice Guo</h3>
                    <h5>Bambang, CH</h5>
                    <p>I had a question about customizing a box for my niece's birthday, and the Unbox Surprise
                        customer
                        service team was fantastic! They were super helpful and patient, and helped me create the
                        perfect box for her. The gift was a hit, and the entire experience was wonderful. Thanks,
                        Unbox
                        Surprise!</p>
                </div>
            </div>
        </div>
    </div>

    <!--How it Works Sections-->
    <section class="how-it-works">
        <h1>How It Works</h1>
        <div class="works-container">
            <div class="work-step">
                <i class="fas fa-check-circle"></i>
                <h3>Select Your Box</h3>
                <p>Explore our wide selection of curated gift boxes to find the perfect one for your occasion or
                    recipient's interests.</p>
            </div>
            <i class="fas fa-arrow-right arrow"></i>
            <div class="work-step">
                <i class="fas fa-gift"></i>
                <h3>Add a Personal Touch</h3>
                <p>(Optional) Include a personalized message and gift wrap to make your present extra special.</p>
            </div>
            <i class="fas fa-arrow-right arrow"></i>
            <div class="work-step">
                <i class="fas fa-truck"></i>
                <h3>Relax and Unwind</h3>
                <p>We handle everything else! Your beautifully packaged gift box will be delivered straight to your
                    recipient's door.</p>
            </div>
        </div>
        <a href="/collections" class="how-it-works-btn">See All Boxes</a>
    </section>


    <!--Footer Section-->
    <footer>
        <div class="footer-content">
            <div class="quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="/collections">Products</a></li>
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