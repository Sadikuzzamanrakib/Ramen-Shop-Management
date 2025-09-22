-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2025 at 10:44 PM
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
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`id`, `username`, `email`, `photo`, `password`) VALUES
(38, 'Siam360', 'mdsiam2002j@gmail.com', NULL, '$2y$10$7U/4qvK.Tnzrh9/A2BtT3ew7ORKWhM3LkcQMN50J0pCMxq806zLnK'),
(42, 'admin', 'jafirislam10@gmail.com', NULL, '$2y$10$eR7M9CZbZ0xJHVOtIlQZ6OXByudewWIVksJgwYHmE1OmugkwBRYRS'),
(46, 'admin1', 'jafirislam101@gmail.com', NULL, '$2y$10$gNYJWCxT6xiO/7ASHuiFMu7x0VSZ6XisH5iHb.XbVPxVKbplApM/6'),
(50, 'admin12', 'mdsiam2002j@gmail.com12', NULL, '$2y$10$7OJLVfQDoDdot1osLK9rmORPLG7NAqkIS89yGa6/Hc0P9Lch3MoH.'),
(51, 'sadik', 'sadik@gmail.com', NULL, '$2y$10$hf5iixvgLVQgwLAMj2qoyeUSmIjT.NaBh0xjhlnlp4Wn./z1ymkxW'),
(53, 'Sashaa', 'Sasha1@gmail.com', 'uploads/img_68d1b4edda8914.58431420.jpg', '$2y$10$9KoIkjgSxrLXIm1m3AizMODPNyun80.py0307craoQrlyhm1QuSny');

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
(29, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
(9, 'Sapporo Corn Butter Ramen', '   Famous Hokkaido specialty with a fish comforting and rich miso base.', 3, 'Food-Name-6070.jpg', 3, 'Yes', 'Yes'),
(10, 'Special Bangaldeshi Ramen', 'Bangaldeshi Ramen Recipe using Hilsha Fish', 30, '', 5, 'Yes', 'Yes');

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
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Spicy Miso Ramen', 3, 1, 3, '2025-09-22 22:16:32', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(2, 'Spicy Miso Ramen', 3, 1, 3, '2025-09-22 22:24:44', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(3, 'Tonketsu Ramen', 2, 1, 2, '2025-09-22 22:25:05', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(4, 'Tonketsu Ramen', 2, 1, 2, '2025-09-22 22:26:53', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(5, 'Vegan Ramen', 4, 1, 4, '2025-09-22 22:28:31', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(6, 'Vegan Ramen', 4, 1, 4, '2025-09-22 22:28:44', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(7, 'Vegan Ramen', 4, 1, 4, '2025-09-22 22:30:22', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(8, 'Vegan Ramen', 4, 1, 4, '2025-09-22 22:30:28', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(9, 'Vegan Ramen', 4, 1, 4, '2025-09-22 22:31:33', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(10, 'Shoyu Ramen', 2, 1, 2, '2025-09-22 22:32:16', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(11, 'Shoyu Ramen', 2, 1, 2, '2025-09-22 22:33:52', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(12, 'Tonketsu Ramen', 2, 1, 2, '2025-09-22 22:37:42', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(13, 'Tonketsu Ramen', 2, 1, 2, '2025-09-22 22:41:20', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh'),
(14, 'Shoyu Ramen', 2, 10, 20, '2025-09-22 22:43:41', 'Ordered', 'Sashaa', '01793310669', 'Sasha1@gmail.com', 'Matpara,Munshiganj Dhaka Bangladesh');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
