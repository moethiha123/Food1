-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 10:17 AM
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
-- Database: `php_loginuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(4, 'Book'),
(5, 'Phone'),
(8, 'Shoe'),
(13, 'Cake');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `phone`, `address`, `status`, `created_date`, `updated_date`) VALUES
(1, '', '', '', 'Address', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Jerome Bolton', 'duzoqaziv@mailinator.com', '+1 (381) 269-2735', 'Minim qui quia tempo', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Tyrone Blackburn', 'vinihugeju@mailinator.com', '+1 (597) 674-3915', 'Sit aute sit volupta', '0', '2023-07-30 08:46:56', '2023-07-30 08:46:56'),
(4, 'Dai Travis', 'pyfili@mailinator.com', '+1 (565) 214-5203', 'Accusamus necessitat', '0', '2023-07-30 09:31:46', '2023-07-30 09:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `customer_id`, `product_id`, `qty`) VALUES
(1, 1, 1, '1'),
(2, 2, 1, '1'),
(3, 3, 4, '2'),
(4, 4, 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `price`, `featured`, `photo`) VALUES
(1, 4, 'Strawberry Cake', 'new flavor                                  ', '23400', '0', 'strawberry-cake.jpg'),
(2, 5, 'XIAOMI', 'NEW                                                  ', '345000', '0', 'XIAOMI.jpg'),
(4, 4, 'Mere Christiainity', 'NEW\r\nBy CS LEWIS                             ', '40000', '0', 'MereChristianity.jpg'),
(6, 8, 'Nike Aiforce', 'NEW                                                    ', '45678', '0', 'Nike Aiforce.jpg'),
(7, 5, 'SAMSUNG', 'NEW                                                ', '678900', '0', 'SAMSUNG.jpg'),
(8, 4, 'Book OF PSALMS', 'new                                                                                                       ', '34567', '0', 'PSALMS.jpg'),
(9, 8, 'Fila Disruptor ', 'NEW                                                      ', '45678', '0', 'Fila Disruptor White.jpg'),
(10, 5, 'IPHONE11', 'NEW', '678880', '0', 'IPHONE11.jpg'),
(11, 8, 'WHITE PUMA', 'NEW               ', '23450', '0', 'PUMA.jpg'),
(12, 4, 'Book Of PROVERBS', 'NEW                                                  ', '20000', '0', 'PROVERB.jpg'),
(13, 8, 'ADIDAS', 'NEW                                                      ', '20000', '0', 'ADIDAS.jpg'),
(14, 4, 'Psychology Of Money', 'new\r\nwritten by HOWARD MARKS                  ', '30000', '0', 'PsycologyOfMoney.jpg'),
(15, 13, '        Carot Cake  ', '        new flavor                                        ', '23456', '0', 'Carrot cake.jpg'),
(16, 5, 'OPPO', 'NEW                ', '804000', '0', 'OPPO.jpg'),
(17, 8, 'NIKE', 'NEW                  ', '30300', '0', 'NIKE.jpg'),
(18, 4, 'How Innovation Works', 'new                                                        ', '89450', '0', 'HowInnovationWorks.jpg'),
(19, 4, 'Company Of One', '     new                                 ', '20000', '0', 'CompanyOfOne.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `photo`, `address`, `created_date`, `updated_date`) VALUES
(16, 'ban', 'ban@gmail.com', '6tgyujio', 'erik-lucatero-5c3vdZz_jdc-unsplash.jpg', 'bago            ', '2023-07-02 09:51:28', '2023-07-02 09:51:28'),
(18, 'cc', 'cc@gmail.com', '4r5t6y7u', 'foto-sushi-ocOW8-uiAjk-unsplash.jpg', 'mdy            ', '2023-07-02 09:59:31', '2023-07-02 09:59:31'),
(25, 'jane', 'abc@gmail.com', '$2y$10$GEz5tY.iGaNDwLF3VOwF1.oVBNiQxrZ9IRaRba2GQm5umvTCJM/5S', 'foto-sushi-JgXxNIHotZ8-unsplash.jpg', 'Autem dolorsdfsd consecte                                                            ', '2023-07-08 14:27:26', '2023-07-08 14:27:26'),
(26, 'bobo', 'bobobobo@gmail.com', 'hjdsfkl', 'foto-sushi-jKuch64WZ_o-unsplash.jpg', 'ygn            ', '2023-07-22 14:17:47', '2023-07-22 14:17:47'),
(27, 'Irene', 'irene@gmail.com', '$2y$10$e.ugp/QpMiCDrmTsEttrAOrsGir5h1YX/VMPoJKx1c1cu7UVR3y2e', 'allef-vinicius-BqNEe_ZAtxg-unsplash.jpg', 'mdy', '2023-07-25 14:43:22', '2023-07-25 14:43:22'),
(28, 'Vincent Barber', 'rewufum@mailinator.com', '$2y$10$GG8etjrS3tdTu5KwWdeZ5uwfRojBSNZjGtDUDJlGkYKqZZTN3nn3W', 'brooke-cagle-86YOjoT3hi4-unsplash.jpg', 'Et rerum voluptatum', '2023-07-25 17:13:16', '2023-07-25 17:13:16'),
(29, 'jame', 'jame@gmail.com', '$2y$10$yzX2tPq0uL3dgmolqSRKJev2djY/hs93p4odSA/OaV5fXldnMQnQy', 'IPHONE11.jpg', 'mdy', '2023-07-30 08:57:31', '2023-07-30 08:57:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
