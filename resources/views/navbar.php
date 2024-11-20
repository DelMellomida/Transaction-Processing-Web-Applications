<?php

$isLoggedIn = isset($_SESSION['user']);

echo '<nav class="bg-blue-600 p-4 shadow-md">
        <ul class="flex space-x-6 text-white">';

echo '<li><a href="/" class="hover:text-gray-300">Home</a></li>
      <li><a href="/best-selling" class="hover:text-gray-300">Best Selling</a></li>';

if ($isLoggedIn) {
    echo '<li class="text-lg font-semibold">Welcome, ' . htmlspecialchars($_SESSION['user']) . '!</li>
          <li><a href="/logout" class="hover:text-gray-300">Logout</a></li>';
} else {
    echo '<li><a href="/login" class="hover:text-gray-300">Login</a></li>
          <li><a href="/register" class="hover:text-gray-300">Register</a></li>';
}

echo '</ul>
      </nav>';
?>