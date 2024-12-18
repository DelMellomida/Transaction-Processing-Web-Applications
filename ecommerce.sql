-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 02:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `category` varchar(100) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Artisanal Chocolates', 'Handcrafted by small-scale chocolatiers who emphasize quality, unique flavors, and ethical sourcing using traditional methods.', 50.00, 100, 'Indulgent Delights', '../assets/chocolates.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(2, 'Special Coffee', 'Specialty coffee: meticulously sourced, roasted, and brewed, offering unique flavors; 250 grams.', 150.00, 0, 'Indulgent Delights', '../assets/coffee.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(3, 'Gourmet Snacks', 'Gourmet snacks: handpicked ingredients, artisanal crafting, delivering exquisite taste; 150g of mixed nuts.', 100.00, 200, 'Indulgent Delights', '../assets/snacks.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(4, 'Baked Goods', 'Baked goods: Freshly baked pastries crafted with care, featuring a variety of flavors and textures.', 120.00, 150, 'Indulgent Delights', '../assets/baked.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(5, 'Artisanal Jam', 'Artisanal jam: Handmade with ripe, luscious fruits and natural ingredients, bursting with vibrant flavors.', 90.00, 120, 'Indulgent Delights', '../assets/jam.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(6, 'Premium Alcohol', 'Premium alcohol: Indulge in rich, complex flavors with our meticulously aged whiskey, perfect for savoring slowly.', 500.00, 50, 'Indulgent Delights', '../assets/wine.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(7, 'Handcrafted Candles', 'Handcrafted candles: Premium soy wax, infused with essential oils, emitting calming fragrances.', 120.00, 50, 'Handcrafted Luxuries', '../assets/candles.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(8, 'Luxury Bath Products', 'Luxury bath products: Handcrafted with nourishing ingredients, providing a lavish bathing experience.', 280.00, 30, 'Handcrafted Luxuries', '../assets/bath.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(9, 'Scented Soaps', 'Scented soaps: Handcrafted with natural oils, leaving skin refreshed and delicately scented.', 90.00, 100, 'Handcrafted Luxuries', '../assets/soap.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(10, 'Miniature Succulents', 'Miniature succulents: Handpicked varieties, perfect for small spaces, adding greenery to any room.', 150.00, 80, 'Handcrafted Luxuries', '../assets/succulent.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(11, 'Handmade Jewelry', 'Handmade jewelry: Unique designs, crafted with attention to detail, making each piece special.', 200.00, 40, 'Handcrafted Luxuries', '../assets/jewelry.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(12, 'Organic Skincare', 'Organic skincare: Handcrafted with natural ingredients, nurturing and rejuvenating skin.', 180.00, 60, 'Handcrafted Luxuries', '../assets/skincare.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(13, 'Handpoured Waxmelts', 'Handpoured waxmelts: Aromatic blends, created to enhance ambiance and relaxation.', 75.00, 120, 'Handcrafted Luxuries', '../assets/waxmelts.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(14, 'Unique Planter', 'Unique planter: Handcrafted designs, adding personality to indoor and outdoor spaces.', 160.00, 70, 'Handcrafted Luxuries', '../assets/planter.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(15, 'Personalized Notecards', 'Custom designs, perfect for adding a personal touch to your messages.', 50.00, 100, 'Personalized Treasures', '../assets/notecards.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(16, 'Custom Stationary', 'Personalized designs, ideal for expressing your unique style in writing.', 80.00, 80, 'Personalized Treasures', '../assets/stationary.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(17, 'Customized Mugs', 'Personalized with your favorite photos or quotes, making your mornings brighter.', 100.00, 50, 'Personalized Treasures', '../assets/mug.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(18, 'Customized Phone Case', 'Personalized protection for your device, reflecting your style and personality.', 120.00, 60, 'Personalized Treasures', '../assets/case.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(19, 'Photo Frame', 'Elegant designs, perfect for displaying your cherished memories in style.', 150.00, 40, 'Personalized Treasures', '../assets/frame.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(20, 'Engraved Keychains', 'Personalized with names or messages, perfect for adding a special touch to your keys.', 70.00, 120, 'Personalized Treasures', '../assets/keychain.png', '2024-12-18 12:43:42', '2024-12-18 12:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','moderator') DEFAULT 'user',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `address`, `password`, `role`, `last_login`, `created_at`) VALUES
(1, 'Default Admin', 'admin', 'admin@example.com', NULL, '$2y$10$ElPt9jAppr93o96701JBkeOp9OikZ7FlU/gkFaXsdm3/WTD3THErW', 'admin', '2024-12-18 12:43:42', '2024-12-18 12:43:42'),
(2, 'Arden', 'ArdenDiMarunongMagCode', 'Ardenkylde.deocampo@gmail.com', 'Pasig, Maybunga', '$2y$12$CiNb9nn4YnxiLght3ropjeiSFWBVvUC0eVzktHZIY1kxMrgE9Z2Xi', 'user', '2024-12-18 12:54:10', '2024-12-18 12:54:10'),
(3, 'Denmark Bensing', 'BensingMabaho', 'denmark.bensing@gmail.com', 'Cainta, Block 4', '$2y$12$qyvXYbr7cmYFKvgQVTi1aOsxK/HwdJGT9OgVCLcPgq76.sZvk73dy', 'user', '2024-12-18 12:56:12', '2024-12-18 12:56:12'),
(4, 'Jhondel Melomida', 'JhondelBatak', 'jhondel.melomida@gmail.com', 'Pasig, Sta Lucia', '$2y$12$3D7RiWsf4z/0UyiTtP7IXuviTRxTCG8qupL9rlH1fD03l2aKwEIaK', 'user', '2024-12-18 12:59:12', '2024-12-18 12:59:12'),
(5, 'James Ocariza', 'JamesSalot20', 'james.ocariza@gmail.com', 'Maybunga, Pasig', '$2y$12$Yv8hAwOiuwvQ2C/LBYTUbe/3lH4r.HexXgyui4pQ4KCKsMROuxbcu', 'user', '2024-12-18 13:03:58', '2024-12-18 13:03:58'),
(6, 'Liza Fernandez', 'liza_f123', 'liza.fernandez@gmail.com', 'San Juan, Metro Manila', '$2y$12$BQOLUq8MsHDukEsAhooq.O5cAGeHGDqaqXCOzOcdXFF4upLEO3LfK', 'user', '2024-12-18 13:05:31', '2024-12-18 13:05:31'),
(7, 'John Reyes', 'john_reyes2024', 'john.reyes@example.com', 'Quezon City, Metro Manila', '$2y$12$ahhLWAoCUmzJboXes7zWR.JBvTmPnWFB2FJhTcXi5unDPPch0Bthi', 'user', '2024-12-18 13:06:03', '2024-12-18 13:06:03'),
(8, 'Sarah Tan', 'sarah_tan92', 'sarah.tan@yahoo.com', 'Makati, Metro Manila', '$2y$12$TfUStDbZCL2uEdDZM/Jlse8rrExRq0eN0C7jj8cCE7Z9kyfD6P3yq', 'user', '2024-12-18 13:06:30', '2024-12-18 13:06:30'),
(9, 'Darren Santiago', 'darren_s1', 'darren.santiago@hotmail.com', 'Taguig, Metro Manila', '$2y$12$bPkWcGi3mVOGq2xdPAfDAeDV2mdju/0kH5KahvDx8ijX/Dcykyv6G', 'user', '2024-12-18 13:06:57', '2024-12-18 13:06:57'),
(10, 'Maria Alonzo', 'maria_alonzo88', 'maria.alonzo@gmail.com', 'Manila, Metro Manila', '$2y$12$4NWQFL1ruJMJlECJuZ1KqeC12QGKQsj7ZkWy4B01y9sYsVXC1eIo2', 'user', '2024-12-18 13:07:40', '2024-12-18 13:07:40'),
(11, 'Albert dela Cruz', 'albert_22', 'albert.delacruz@outlook.com', 'Pasig, Metro Manila', '$2y$12$qORMaZ9VEVDiCLvGF84zo.pGBMAciTTzJT.6ZZhSghM6XX.cDPPn.', 'user', '2024-12-18 13:08:09', '2024-12-18 13:08:09'),
(12, 'Jessica Villaruel', 'jessica_vil21', 'jessica.villaruel@gmail.com', 'Caloocan, Metro Manila', '$2y$12$uGc02SRXni0GI4vSbiYtM.sr4INzewyaL4NXvXsQyFUFaHPoRK7CC', 'user', '2024-12-18 13:08:38', '2024-12-18 13:08:38'),
(13, 'David Tan', 'daviddan95', 'david.tan@ymail.com', 'Mandaluyong, Metro Manila', '$2y$12$jdID2ja/yrBkaYtmhNnL9uUvmcPMi6UwCPy13KjFaIpdJu0ANqTUC', 'user', '2024-12-18 13:09:02', '2024-12-18 13:09:02'),
(14, 'Kimberly Lim', 'kimberly_l22', 'kimberly.lim@mail.com', 'Quezon City, Metro Manila', '$2y$12$ZRsgvWnSzR.T81CCavQWCOKOOyaHqIpZ7NhEaBKk/jkv7MJtpRN7W', 'user', '2024-12-18 13:09:33', '2024-12-18 13:09:33'),
(15, 'Victor Reyes', 'victor_2023', 'victor.reyes@icloud.com', 'Pasig, Metro Manila', '$2y$12$5AAI42QTG6SHfJZiUPVbweLPVwWF.JJjGJ1p/7airIzfjioG4dpAm', 'user', '2024-12-18 13:10:01', '2024-12-18 13:10:01'),
(16, 'Monica Santos', 'monica_s@2024', 'monica.santos@googlemail.com', 'Makati, Metro Manila', '$2y$12$85WKEKr4BUMv.lWx3y8fOO6kZnZdNIsWnPtWTWKnjGNKi0UlYLlIm', 'user', '2024-12-18 13:10:27', '2024-12-18 13:10:27'),
(17, 'Raphael Garcia', 'raphael_garcia77', 'raphael.garcia@gmail.com', 'Las Piñas, Metro Manila', '$2y$12$rLGdhgLWvSMxHhMRRuk52eX7106iuD87510Xvn0i/zog1GW6Xy9hW', 'user', '2024-12-18 13:11:00', '2024-12-18 13:11:00'),
(18, 'Clarissa Domingo', 'clarissa_d123', 'clarissa.domingo@yahoo.com', 'Mandaluyong, Metro Manila', '$2y$12$jv594CBWFgdBrKgi3.2CzOhYdT.TwKN6zWx.ABK4UX1as5BR68fam', 'user', '2024-12-18 13:11:34', '2024-12-18 13:11:34'),
(19, 'Steven Bautista', 'steven_b2024', 'steven.bautista@outlook.com', 'Pasay, Metro Manila', '$2y$12$JZyZA1g4UD0JABMfqTFisO2hddV7ocjlS.j6ZUeaKGKO8LPXU2fBq', 'user', '2024-12-18 13:13:54', '2024-12-18 13:13:54'),
(20, 'Paula Mendoza', 'paula_mend01', 'paula.mendoza@gmail.com', 'Quezon City, Metro Manila', '$2y$12$hM8Xn4iZItFya6tt8pSYd.cWJUZ7qvhwgP/6SATLRkcD6cXhdnRgO', 'user', '2024-12-18 13:14:27', '2024-12-18 13:14:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
