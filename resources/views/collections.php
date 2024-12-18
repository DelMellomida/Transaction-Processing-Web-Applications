<?php

require_once("../app/Controller/ProductController.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check user authentication
$is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;

$productController = new ProductController();
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
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <?php
    require_once __DIR__ . '/../components/header.php';
    ?>

    <div class="notification hidden" id="notification">Item added to cart!</div>

    <!--Checkout Section-->
    <div class='checkout-container hidden'>
        <div class='window'>
            <div class='order-info'>
                <div class='order-info-content'>
                    <h3>Checkout Summary</h3>
                    <div class='line'></div>
                    <ul class='order-list'>

                    </ul>
                    <div class='line'></div>
                    <div class='total'>
                        <span style='float:left;'>
                            <div class='thin dense'>VAT 15%</div>
                            <div class='thin dense'>Delivery</div>
                            TOTAL
                        </span>
                        <span style='float:right; text-align:right;'>
                            <div class='thin dense' id="totalCheckout"></div>
                            <div class='thin dense' id="delivery">Php 40.00</div>
                            <div id="totalOverall"></div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class='credit-info'>
            <div class='credit-info-content'>
                <table class='half-input-table'>
                    <tr>
                        <td>
                            <select id="payment-method" class="dropdown-select">
                                <option value="visa">Visa</option>
                                <option value="mastercard">MasterCard</option>
                                <option value="gcash">GCash</option>
                                <option value="cash">Cash</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <img src='/assets/visa.png' height='80' class='credit-card-image' id='credit-card-image'></img>
                <label id="card-number-label">Card Number</label>
                <input id="card-number" class='input-field'></input>
                <label id="card-holder-label">Card Holder</label>
                <input id="card-holder" class='input-field'></input>
                <label id="name-label">Name</label>
                <input id="name" class='input-field' required></input>
                <label id="address-label">Address</label>
                <input id="address" class='input-field' required></input>
                <table class='half-input-table'>
                    <tr>
                        <td> <label id="expiration-label">Expires</label>
                            <input class='input-field inTable' id="expiration"></input>
                        </td>
                        <td><label id="cvc-label">CVC</label>
                            <input class='input-field inTable' id="cvc"></input>
                        </td>
                    </tr>
                </table>
                <button class='pay-btn' onclick="processCheckout()">Checkout</button>
                <button class="cancelCheckout-btn">Cancel</button>
            </div>
        </div>
    </div>

    <div class='success-message hidden'>
        <h3>Payment Successful!</h3>
        <p>Thank you for your purchase.</p>
        <br>
        <div class="next-steps">
            <h4>What happens next?</h4>
            <p>Your order has been successfully processed. Our team will now begin preparing your items for shipment.
            </p>
        </div>
    </div>

    <!--Product Selection Section-->
    <div class="products" id="indulgent">
        <h1 style="padding-top: 1.5%;">Products</h1>
        <nav class="products-categories">
            <ul>
                <li><a href="#indulgent">Indulgent Delights</a></li>
                <li><a href="#handcrafted">Handcrafted Luxuries</a></li>
                <li><a href="#personalized">Personalized Treasures</a></li>
            </ul>
        </nav>
    </div>

    <!--Product Section-->
    <div class="products-box">
        <?php
        $category = "Indulgent Delights";
        $products = $productController->getProducts($category);
        ?>
        <h3>Indulgent Delights</h3>
        <?php if (!empty($products)): ?>
            <ul class="listing carousel">
                <?php foreach ($products as $product): ?>
                    <li class="product">
                        <a class="img-wrapper" href="#">
                            <!-- Dynamically display the product image -->
                            <img src="<?= $product['image_url']; ?>" alt="<?= htmlspecialchars($product['name']); ?>" />
                        </a>

                        <div class="info">
                            <!-- Dynamically display the product title -->
                            <div class="title"><?= htmlspecialchars($product['name']); ?></div>

                            <!-- Dynamically display the product description -->
                            <div class="desc hide"><?= htmlspecialchars($product['description']); ?></div>

                            <!-- Dynamically display the product price -->
                            <div class="price">Php <?= number_format($product['price'], 2); ?></div>
                        </div>

                        <div class="actions-wrapper">
                            <!-- Wishlist and Cart buttons -->
                            <a href="#" class="add-btn wishlist">Wishlist</a>
                            <a class="add-btn cart" onclick="showNotification('Item added to the cart')">Cart</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-products">No products found in this category.</div>
            <?php endif; ?>
            </li>
        </ul>
    </div>

    <div class="products-box opposite">
        <h3 style="padding-top: 1.5%; color: #333333" id="handcrafted">Handcrafted Luxuries</h3>
        <?php if (!empty($products)): ?>
            <ul class="listing carousel">
                <?php foreach ($products as $product): ?>
                    <li class="product">
                        <a class="img-wrapper" href="#">
                            <!-- Dynamically display the product image -->
                            <img src="<?= $product['image_url']; ?>" alt="<?= htmlspecialchars($product['name']); ?>" />
                        </a>

                        <div class="info">
                            <!-- Dynamically display the product title -->
                            <div class="title"><?= htmlspecialchars($product['name']); ?></div>

                            <!-- Dynamically display the product description -->
                            <div class="desc hide"><?= htmlspecialchars($product['description']); ?></div>

                            <!-- Dynamically display the product price -->
                            <div class="price">Php <?= number_format($product['price'], 2); ?></div>
                        </div>

                        <div class="actions-wrapper">
                            <!-- Wishlist and Cart buttons -->
                            <a href="#" class="add-btn wishlist">Wishlist</a>
                            <a class="add-btn cart" onclick="showNotification('Item added to the cart')">Cart</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-products">No products found in this category.</div>
            <?php endif; ?>
        </ul>
    </div>

    <div class="products-box">
        <?php
        $category = "Personalized Treasures";
        $products = $productController->getProducts($category);
        ?>
        <h3>Personalized Treasures</h3>
        <?php if (!empty($products)): ?>
            <ul class="listing carousel">
                <?php foreach ($products as $product): ?>
                    <li class="product">
                        <a class="img-wrapper" href="#">
                            <!-- Dynamically display the product image -->
                            <img src="<?= $product['image_url']; ?>" alt="<?= htmlspecialchars($product['name']); ?>" />
                        </a>

                        <div class="info">
                            <!-- Dynamically display the product title -->
                            <div class="title"><?= htmlspecialchars($product['name']); ?></div>

                            <!-- Dynamically display the product description -->
                            <div class="desc hide"><?= htmlspecialchars($product['description']); ?></div>

                            <!-- Dynamically display the product price -->
                            <div class="price">Php <?= number_format($product['price'], 2); ?></div>
                        </div>

                        <div class="actions-wrapper">
                            <!-- Wishlist and Cart buttons -->
                            <a href="#" class="add-btn wishlist">Wishlist</a>
                            <a class="add-btn cart" onclick="showNotification('Item added to the cart')">Cart</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-products">No products found in this category.</div>
            <?php endif; ?>
            </li>
        </ul>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.carousel').slick({
                slidesToShow: 2.6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                centerMode: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-chevron-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ],
            });
        });
    </script>
</body>

</html>