-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2022 at 09:08 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SoftwareEngineeringProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `user_id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f647451ba88dbdd9', '2022-03-10 02:00:53'),
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f6474535ae0afee1', '2022-03-10 02:03:31'),
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f647454b43a93425', '2022-03-10 02:05:32'),
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f64745d8955e0222', '2022-03-10 02:09:19'),
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f64745de7c55bdde', '2022-03-10 02:12:07'),
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f64745ba1a24ac8b', '2022-03-10 02:15:20'),
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f647455d26fa4407', '2022-03-10 02:16:09'),
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f647454d169b0b7a', '2022-03-10 02:31:54'),
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f647459724a539e8', '2022-03-10 02:33:06'),
('kassiejgarcia@gmail.com', '768e78024aa8fdb9b8fe87be86f64745afad45b26a', '2022-03-10 02:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int UNSIGNED NOT NULL,
  `product_name` varchar(60) DEFAULT NULL,
  `product_description` varchar(300) DEFAULT NULL,
  `product_type` varchar(25) DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `product_price` int DEFAULT NULL,
  `product_quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `ADMINID` int DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `ADMINID`, `email`) VALUES
(2, 'thr757', '$2y$10$0T.uEzhB6SuQMcCrzwMG3O5HMJ3VKM6iEFkstcvrg0XrZvOomCtiu', NULL, NULL, NULL, NULL),
(3, 'sailormoon', '$2y$10$6rS8CxPm0poymDT3UostXuAFvZSkq2SNwMBUNJKJvYDN1TiV5n3oq', 'kassie', 'garcia', NULL, NULL),
(4, 'hamtaro', '$2y$10$.q70zkUPAxvCw.JY0/UJvuDhJqMSrtYhnBH1YD57aMaDbhXTBAnsK', 'Betty', 'Boop', NULL, NULL),
(5, 'keroppi', '$2y$10$QaI5JVSTmLHdPObyKpgwkOVQQ4TOjZdDKQNf1s3TYPA7Ah/ziVT1i', 'kassie', 'garcia', NULL, NULL),
(6, 'bettyboop', '$2y$10$JzAFbpvmKobuTs9CNRKyh.thxcVubF5MDPlJR3RBW.g95fNkK9jxe', 'Betty', 'Boop', NULL, NULL),
(7, 'UTSASEPROJECT', '$2y$10$IVo3TMkGFcvI9rWMakH1B./W76AApFn9RCeqgy5n4z1ZRMQNZ2JOS', 'utsa', 'proj', NULL, NULL),
(8, 'hellokitty', '$2y$10$QoI6tFnPHF2dAv7TcVt9.uDP2wPFXI8zGStUJbHG9tUW.5W4k8yU.', 'Kassie', 'Garcia', NULL, 'kassiejgarcia@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`user_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `customer_orders_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
