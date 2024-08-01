-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 10:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benoite`
--

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `name`, `description`, `price`, `image_url`) VALUES
(1, 'Chocolate Cake', 'Delicious chocolate cake with rich chocolate frosting.', 150000.00, 'chocolate_cake.jpeg'),
(2, 'Vanilla Cake', 'Classic vanilla cake with creamy vanilla frosting.', 140000.00, 'vanilla_cake.jpeg'),
(3, 'Strawberry Cake', 'Fresh strawberry cake with strawberry cream filling.', 160000.00, 'strawberry_cake.jpeg'),
(4, 'Red Velvet Cake', 'Smooth red velvet cake with cream cheese frosting.', 170000.00, 'red_velvet_cake.jpeg'),
(5, 'Lemon Cake', 'Tangy lemon cake with lemon glaze and frosting.', 150000.00, 'lemon_cake.jpeg'),
(6, 'Carrot Cake', 'Moist carrot cake with cream cheese frosting and walnuts.', 155000.00, 'carrot_cake.jpeg'),
(7, 'Cheesecake', 'Creamy cheesecake with a graham cracker crust.', 180000.00, 'cheesecake.jpeg'),
(8, 'Black Forest Cake', 'Chocolate cake with cherries and whipped cream.', 165000.00, 'black_forest_cake.jpeg'),
(9, 'Coconut Cake', 'Light and fluffy coconut cake with coconut frosting.', 145000.00, 'coconut_cake.jpeg'),
(10, 'Coffee Cake', 'Rich coffee-flavored cake with coffee buttercream.', 160000.00, 'coffee_cake.jpeg'),
(11, 'Banana Cake', 'Moist banana cake with cream cheese frosting.', 140000.00, 'banana_cake.jpeg'),
(12, 'Pineapple Upside-Down Cake', 'Cake topped with caramelized pineapple slices.', 150000.00, 'pineapple_cake.jpeg'),
(13, 'Mango Cake', 'Fresh mango cake with mango cream filling.', 165000.00, 'mango_cake.jpeg'),
(14, 'Peanut Butter Cake', 'Peanut butter cake with peanut butter frosting.', 155000.00, 'peanut_butter_cake.jpeg'),
(15, 'Almond Cake', 'Almond-flavored cake with almond frosting.', 160000.00, 'almond_cake.jpeg'),
(16, 'Blueberry Cake', 'Blueberry cake with blueberry cream filling.', 170000.00, 'blueberry_cake.jpeg'),
(17, 'Tiramisu Cake', 'Classic tiramisu cake with layers of coffee-soaked sponge cake and mascarpone cheese.', 180000.00, 'tiramisu_cake.jpeg'),
(18, 'Pumpkin Cake', 'Spiced pumpkin cake with cream cheese frosting.', 160000.00, 'pumpkin_cake.jpeg'),
(19, 'Raspberry Cake', 'Light raspberry cake with raspberry filling and frosting.', 155000.00, 'raspberry_cake.jpeg'),
(20, 'Hazelnut Cake', 'Rich hazelnut cake with hazelnut cream filling.', 170000.00, 'hazelnut_cake.jpeg'),
(21, 'Matcha Cake', 'Delicate matcha-flavored cake with matcha cream frosting.', 175000.00, 'matcha_cake.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cake_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `address`, `total`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Nesia Diah Praiwi', 'Jl. Sadewa VII no 48, Pindrikan Lor, Semarang Tengah, Kota Semarang, Jawa Tengah, 50131', 290000.00, 'Pending', '2024-07-29 16:07:06', '2024-07-29 16:07:06', 0),
(2, 'Nesia Diah Praiwi', 'Jl. Sadewa VII no 48, Pindrikan Lor, Semarang Tengah, Kota Semarang, Jawa Tengah, 50131', 150000.00, 'Pending', '2024-07-31 13:30:57', '2024-07-31 13:30:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cake_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `cake_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 150000.00, '2024-07-29 16:07:06', '2024-07-29 16:07:06'),
(2, 1, 2, 1, 140000.00, '2024-07-29 16:07:06', '2024-07-29 16:07:06'),
(3, 2, 1, 1, 150000.00, '2024-07-31 13:30:58', '2024-07-31 13:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_admin`) VALUES
(1, 'nechispace', '$2y$10$EM41zcK9..bXa0wyiX1oG.oLrW582K2tBENgKxv/7V25uoB5Vgid.', 'echinesia@gmail.com', 0),
(2, 'echinesia', '$2y$10$GS1XfFYgpY7ZIhLxLboVpOH.jBG1OIVqz9xV0aUPL6dK.JgKxJ2bW', 'kimo.nechii@gmail.com', 0),
(5, 'testuser', '$2y$10$ers54vCH9QYCxDUnfsF0U.zEVxi/dYqO2Q6iDkXDiKjN8EQsjM46i', 'testuser@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cake_id` (`cake_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

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
-- AUTO_INCREMENT for table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cake_id`) REFERENCES `cakes` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
