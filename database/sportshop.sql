-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 12:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Basketball'),
(2, 'Soccer'),
(3, 'Tennis'),
(4, 'Running'),
(5, 'Swimming');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` enum('paid','pending','failed') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `category_id`, `stock_quantity`, `image_url`) VALUES
(1, 'Basketball Ball', 'High-quality leather basketball', '59.99', 1, 100, 'https://contents.mediadecathlon.com/p1914261/b8c46165714a1d01ff25f648a6a3a0a3/p1914261.jpg?format=auto&quality=70&f=650x0'),
(2, 'Soccer Ball', 'FIFA-approved match ball', '34.99', 2, 150, 'https://contents.mediadecathlon.com/p2193900/91e905b11acd674880d87d3dc45e9ea8/p2193900.jpg?format=auto&quality=70&f=650x0'),
(3, 'Tennis Racket', 'Carbon fiber tennis racket', '129.99', 3, 80, 'https://contents.mediadecathlon.com/p170335/51e89d1e55b6e55f0d3468a508caba39/p170335.jpg?format=auto&quality=70&f=650x0'),
(4, 'Running Shoes', 'Comfortable running shoes', '75.00', 4, 200, 'https://contents.mediadecathlon.com/p1811509/e88f59ebcbc63930d57f0ee771d6b234/p1811509.jpg?format=auto&quality=70&f=650x0'),
(5, 'Swim Goggles', 'Anti-fog swimming goggles', '25.99', 5, 50, 'https://contents.mediadecathlon.com/p2690639/734a90eab9709558a3aaa9c89d6bb220/p2690639.jpg?format=auto&quality=70&f=650x0'),
(6, 'Basketball Hoop', 'Indoor basketball hoop', '199.99', 1, 30, 'https://contents.mediadecathlon.com/p2637772/61cfff51de3dc03bd54bb9b473979f22/p2637772.jpg?format=auto&quality=70&f=650x0'),
(7, 'Soccer Goal', 'Portable soccer goal', '89.99', 2, 40, 'https://contents.mediadecathlon.com/p2606698/7294136a4dd7e1209dde9e179815fbb5/p2606698.jpg?format=auto&quality=70&f=650x0'),
(8, 'Tennis Balls', 'Pack of 3 tennis balls', '9.99', 3, 150, 'https://contents.mediadecathlon.com/p1996990/9f52ded110287c4b6cda870cdea1d96d/p1996990.jpg?format=auto&quality=70&f=650x0'),
(9, 'Running Shorts', 'Lightweight running shorts', '29.99', 4, 100, 'https://contents.mediadecathlon.com/p2600603/a692b61fd7ea0932ffbd0e85916f58f7/p2600603.jpg?format=auto&quality=70&f=650x0'),
(10, 'Swim Cap', 'Silicone swim cap', '12.99', 5, 60, 'https://contents.mediadecathlon.com/p2637135/2f605367b9d3a7cb92ad5c533b202e70/p2637135.jpg?format=auto&quality=70&f=650x0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
