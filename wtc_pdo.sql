-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 09:44 AM
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
-- Database: `myser`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_myanmar_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(2, 'mobile phone'),
(4, 'destop'),
(6, 'electronic device'),
(8, 'cleaning device'),
(9, 'watches'),
(10, 'aircon');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_myanmar_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `phone`, `address`, `status`, `created_date`, `updated_date`) VALUES
(1, 'min', 'min@gmail.com', 9343434, 'ygn', 1, '2024-02-04 09:34:54', '2024-02-04 09:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_myanmar_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `customer_id`, `product_id`, `qty`) VALUES
(1, 1, 5, 4),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` varchar(55) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_myanmar_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `photo`, `price`, `is_featured`, `created_date`, `updated_date`) VALUES
(1, 2, 'Nike', 'sneaker', 'sneaker1.jpg', '105', 1, '2024-01-30 10:41:39', '2024-01-30 10:41:39'),
(2, 2, 'Nike air', 'sneaker', 'sneaker2.jpg', '156', 1, '2024-01-30 10:43:35', '2024-01-30 10:43:35'),
(3, 2, 'Nike pink', 'sneaker', 'sneaker3.jpg', '90', 0, '2024-01-30 10:46:34', '2024-01-30 10:46:34'),
(4, 2, 'Heineken', 'beer', 'heineken.jpg', '2', 0, '2024-01-30 10:49:01', '2024-01-30 10:49:01'),
(5, 2, 'Iphone 15', 'phone', 'iphone-15.jpg', '1200', 1, '2024-01-30 10:51:18', '2024-01-30 10:51:18'),
(8, 2, 'LG', 'air-conditioner', 'aircon.jpg', '600', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 'S24', 'latest design', 's24.jpg', '1200', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 'Rolex', 'swiss brand', 'Rolex.jpg', '7000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 'swatch', 'swiss', 'swatch women.jpg', '2000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_myanmar_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `photo`, `address`, `created_date`, `updated_date`) VALUES
(3, 'suaung', 'suaung@gmail.com', 'lsfgsggg', '968628333', '—Pngtree—coffee shop logo_6557428.png', 'ygn', '2024-01-07 08:59:05', '2024-01-07 08:59:05'),
(4, 'aung124', 'aungaung@gmail.com', 'slglajgpa', '986284242', 'Doctors-bro.png', '', '2024-01-07 09:00:01', '2024-01-07 09:00:01'),
(6, 'myomyo', 'myomyo@gmail.com', 'sfghfdg', '0934546666', '', 'pathein', '2024-01-07 09:01:51', '2024-01-07 09:01:51'),
(37, 'hlahla', 'hlahla@gmail.com', '$2y$10$xkyd6uGfEp1EAUObsTuG7OAxvbvKKBEzO654oEjhoFSlPTgmkxulm', '9454546546', 'sneaker2.jpg', 'ygn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'min', 'min@gmail.com', '$2y$10$mhGQN.Z1WzsRvROUFQDhSeCIJNBP7YVEJIVoA.nPZX5TUYgUCPks2', '93434343434', 'sneaker3.jpg', 'ygn', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
