-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 08:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bse482lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `details_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `details_id`, `item_id`, `quantity`, `user_id`) VALUES
(12, 1, 1, 1, 0),
(13, 2, 2, 1, 0),
(14, 1, 1, 1, 1),
(15, 2, 2, 1, 2),
(16, 1, 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_image`) VALUES
(1, 'Oxford Button-Down Shirt', 'this a sed'),
(2, 'Cuban Collar Shirt', 'this is me'),
(3, 'Overshirt', 'this is me');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `loc_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`loc_id`, `name`) VALUES
(1, 'mirpur'),
(2, 'bashundhara');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingmall`
--

CREATE TABLE `shoppingmall` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `mall_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoppingmall`
--

INSERT INTO `shoppingmall` (`id`, `shop_name`, `address`, `loc_id`, `mall_img`) VALUES
(1, 'jamuna future park', 'bashundhara', 2, 'jamuna-future-park.jpg'),
(2, 'amir complex', 'bashundhara', 2, 'ban1.jpg'),
(3, 'lek power', 'mirpur', 1, 'mirpur1.jpg'),
(4, 'ditra mall', 'mirpur', 1, 'mirpur1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shppingmall_details`
--

CREATE TABLE `shppingmall_details` (
  `details_id` int(11) NOT NULL,
  `shpping_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shppingmall_details`
--

INSERT INTO `shppingmall_details` (`details_id`, `shpping_id`, `item_id`, `price`, `image`) VALUES
(1, 1, 1, 100, 'shart2.jpg'),
(2, 1, 2, 100, 'shart1.jpg'),
(3, 1, 3, 100, 'pant.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'Abdur Rahman', 'ami@gmail.com', '12345678'),
(2, 'abdur rahman kazi', 'kaziar42@gmail.com', '12345678'),
(3, '', 'kaziar42@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `shoppingmall`
--
ALTER TABLE `shoppingmall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shppingmall_details`
--
ALTER TABLE `shppingmall_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shoppingmall`
--
ALTER TABLE `shoppingmall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shppingmall_details`
--
ALTER TABLE `shppingmall_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
