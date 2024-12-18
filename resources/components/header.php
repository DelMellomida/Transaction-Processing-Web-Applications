<header>
    <div class="navbar stay">
        <nav class="menu-bar">
            <div class="logo-container">
                <a href="/home"><img class=" logo-design" src="/assets/logo.png"></a>
            </div>
            <div class="menu-item-container">
                <li class="menu-item"><a href="/home">Home</a></li>
                <li class="menu-item"><a href="/about">About</a></li>
                <li class="menu-item"><a href="/collections">Products</a></li>
                <li class="menu-item"><a href="/contact">Contact</a></li>

                <?php if ($is_logged_in): ?>
                    <li class="cart-btn menu-item" onclick="toggleCartSummary()">
                        <a><i class="fa-solid fa-cart-shopping"></i></a>
                        <span id="cart-count" class="cart-count">0</span>
                    </li>
                    <li class="menu-item"><a href="/userprofile">Profile</a></li>
                    <li class="menu-item"><a href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </li>
                <?php else: ?>
                    <li class="menu-item"><a href="/login">Login</a></li>
                    <li class="menu-item"><a href="/register">Register</a></li>
                <?php endif; ?>

                <li class="menu hidden"><i class="fa-solid fa-bars"></i></li>
                <li class="cancel-btn"><i class="fa-solid fa-xmark"></i></li>
                <div id="cart-summary" class="cart-summary">
                    <h2>Cart Summary</h2>
                    <ul id="cart-items"></ul>
                    <p>Total: Php <span id="cart-total">0.00</span></p>
                    <button class="checkOutBtn">Checkout</button>
                </div>
            </div>
        </nav>
    </div>
</header>