<?php

require_once("../app/Controller/AuthController.php");

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();
    $message = $authController->register($_POST);

}

if (!isset($_SESSION['register_status'])) {
    $_SESSION['register_status'] = null;
} else if ($_SESSION['register_status'] == true) {
    include_once('../resources/components/successAlert.php');
    $_SESSION['register_status'] = null;
} else if ($_SESSION['register_status'] == false) {
    include_once('../resources/components/dangerAlert.php');
    $_SESSION['register_status'] = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <!-- component -->
    <div class="bg-sky-100 flex justify-center items-center h-screen">
        <!-- Left: Image -->
        <div class="w-1/2 h-screen hidden lg:block">
            <img src="https://img.freepik.com/fotos-premium/imagen-fondo_910766-187.jpg?w=826" alt="Placeholder Image"
                class="object-cover w-full h-full">
        </div>
        <!-- Right: Register Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4">Register</h1>
            <form action="" method="POST">
                <!-- Full Name Input -->
                <div class="mb-4">
                    <label for="fullname" class="block text-gray-600">Full Name</label>
                    <input type="text" id="fullname" name="fullname"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <!-- Address Input -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-600">Address</label>
                    <textarea id="address" name="address"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off"></textarea>
                </div>
                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-600">Username</label>
                    <input type="text" id="username" name="username"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-800">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <label for="confirm_password" class="block text-gray-800">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        autocomplete="off">
                </div>
                <!-- Register Button -->
                <button type="submit"
                    class="bg-red-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Register</button>
            </form>
            <!-- Login Link -->
            <div class="mt-6 text-green-500 text-center">
                <a href="/login" class="hover:underline">Login Here</a>
            </div>
        </div>
    </div>
</body>

</html>