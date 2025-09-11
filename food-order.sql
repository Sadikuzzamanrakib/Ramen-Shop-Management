-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 11, 2025 at 07:50 PM
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
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`id`, `username`, `email`, `password`) VALUES
(38, 'Siam360', 'mdsiam2002j@gmail.com', '$2y$10$7U/4qvK.Tnzrh9/A2BtT3ew7ORKWhM3LkcQMN50J0pCMxq806zLnK'),
(42, 'admin', 'jafirislam10@gmail.com', '$2y$10$eR7M9CZbZ0xJHVOtIlQZ6OXByudewWIVksJgwYHmE1OmugkwBRYRS'),
(46, 'admin1', 'jafirislam101@gmail.com', '$2y$10$gNYJWCxT6xiO/7ASHuiFMu7x0VSZ6XisH5iHb.XbVPxVKbplApM/6'),
(50, 'admin12', 'mdsiam2002j@gmail.com12', '$2y$10$7OJLVfQDoDdot1osLK9rmORPLG7NAqkIS89yGa6/Hc0P9Lch3MoH.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(9, 'sadik', 'zzzz', '8f60c8102d29fcd525162d02eed4566b'),
(12, 'sadik', 'sadik', '202cb962ac59075b964b07152d234b70'),
(13, 'sadik', 'sadik', '202cb962ac59075b964b07152d234b70'),
(14, 'Mostak ', 'sadik', '202cb962ac59075b964b07152d234b70'),
(15, 'Mostakkkkkk', 'sadikkkkkk', '202cb962ac59075b964b07152d234b70'),
(16, 'admistator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(17, 'rad', 'rad', '202cb962ac59075b964b07152d234b70'),
(18, 'sad', 'sad', '49f0bad299687c62334182178bfd75d8'),
(20, 'sad', 'sad', '49f0bad299687c62334182178bfd75d8'),
(21, 'sad', 'sa', '202cb962ac59075b964b07152d234b70'),
(22, 'sadik', 'sadik', '21232f297a57a5a743894a0e4a801fc3'),
(23, 'sadik', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(24, 'SAdik', 'admin', '7815696ecbf1c96e6894b779456d330e'),
(25, 'sadi', 'sadi', '48abbef8cb2a1444c87c2838aec5e93d'),
(26, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(27, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(28, 'zxc', 'zxc', '5fa72358f0b4fb4f2c5d7de8c9a41846'),
(29, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(36, 'zzz', 'zzzz', '02c425157ecd32f259548b33402ff6d3'),
(37, 'rakib', 'rakib', 'a36949228c1d9146cace6359d88968e8'),
(38, 'vvv', 'vvv', '4786f3282f04de5b5c7317c490c6d922');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(3, 'Egg Ramen', 'Food_Category_850.png', 'Yes', 'Yes'),
(4, 'Meat Ramen', 'Food_Category_746.jpg', 'Yes', 'Yes'),
(5, 'Fish Ramen', 'Food_Category_215.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Tonketsu Ramen', ' Deep umami flavor, silky broth, traditional Japanese style.', 2, 'Food-Name-8764.jpg', 4, 'Yes', 'Yes'),
(4, 'Shoyu Ramen', ' Bold savory flavor with a hearty veggie and beef balance.', 2, 'Food-Name-5074.jpg', 4, 'Yes', 'Yes'),
(6, 'Spicy Miso Ramen', '   Medium spice heat, nutty richness, perfect for chili lovers.', 3, 'Food-Name-9221.jpg', 3, 'Yes', 'Yes'),
(7, 'Vegan Ramen', ' Light, clean, and refreshing—ideal for a plant-based option.', 4, 'Food-Name-6990.jpg', 3, 'Yes', 'Yes'),
(8, 'Classic Shoyu Ramen', '  Simple and nostalgic with clean, traditional flavors.', 5, 'Food-Name-1873.jpg', 3, 'Yes', 'Yes'),
(9, 'Sapporo Corn Butter Ramen', '   Famous Hokkaido specialty with a fish comforting and rich miso base.', 3, 'Food-Name-6070.jpg', 3, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
