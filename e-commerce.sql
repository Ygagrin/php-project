-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 09:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product` varchar(225) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `seller_email` varchar(255) DEFAULT NULL,
  `location` varchar(225) DEFAULT NULL,
  `total_payments` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product`, `customer_email`, `seller_email`, `location`, `total_payments`, `order_date`, `price`, `quantity`) VALUES
(1, 'lenovo laptop', 'haditermos2@gmail.com', 'haditermos@gmail.com', 'lebanese university', 400.00, '2024-01-25 00:00:00', 400.00, 1),
(2, 'lenovo laptop', 'haditermos2@gmail.com', 'haditermos@gmail.com', 'lebanese university', 400.00, '2024-01-25 00:00:00', 400.00, 1),
(3, 'lenovo laptop', 'haditermos2@gmail.com', 'haditermos@gmail.com', 'lebanese university', 400.00, '2024-01-25 00:00:00', 400.00, 1),
(4, 'lenovo laptop', 'haditermos2@gmail.com', 'haditermos@gmail.com', 'lebanese university', 400.00, '2024-01-25 23:53:45', 400.00, 1),
(5, 'lenovo laptop', 'haditermos2@gmail.com', 'haditermos@gmail.com', 'lebanese university', 400.00, '2024-01-25 23:59:32', 400.00, 1),
(6, 'lenovo laptop', 'haditermos2@gmail.com', 'haditermos@gmail.com', 'lebanese university', 400.00, '2024-01-26 00:00:18', 400.00, 1),
(7, 'costway header', 'haditermos2@gmail.com', 'husseinshamas@gmail.com', 'lebanese university', 1200.00, '2024-01-26 00:10:04', 100.00, 12),
(8, 'lego technic', 'guestone@gmail.com', 'haditermos@gmail.com', 'home', 40.00, '2024-01-26 00:12:30', 40.00, 1),
(9, 'oupink watch', 'guestone@gmail.com', 'husseinshamas@gmail.com', 'home', 1200.00, '2024-01-26 00:15:03', 300.00, 4),
(10, 'costway header', 'haditermos@gmail.com', 'husseinshamas@gmail.com', 'beirut hamra street', 300.00, '2024-01-26 09:17:19', 100.00, 3),
(11, 'ceiling fan', 'haditermos@gmail.com', 'husseinshamas2@gmail.com', 'beirut hamra street', 80.00, '2024-01-26 09:41:39', 40.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `seller_email` varchar(255) DEFAULT NULL,
  `product_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `description`, `quantity`, `date`, `seller_email`, `product_image`) VALUES
(17, 'costway header', 100.00, 'electric heater from costway high condition', 35, '2024-01-25 00:00:00', 'husseinshamas@gmail.com', '/project/uploaded/65b24f50e827a_heater.jpeg'),
(19, 'oupink watch', 300.00, 'oupink luxury watch black and gold', 26, '2024-01-25 00:00:00', 'husseinshamas@gmail.com', '/project/uploaded/65b253d1c1336_oupinke.jpeg'),
(20, 'lenovo laptop', 500.00, 'lenovo laptop ThinkBook 16 Gen 4 (16, Intel) portable ', 12, '2024-01-25 22:38:20', 'haditermos@gmail.com', '/project/uploaded/65b2d4cc8d898_lenovo.png'),
(21, 'lego technic', 40.00, 'lego technic car color yellow bugati 9+ years', 40, '2024-01-26 08:58:10', 'haditermos@gmail.com', '/project/uploaded/65b366121668c_GoOnlineTools-image-downloader.jpeg'),
(22, 'lego technic', 40.00, 'lego technic car green lamborghini 9+ years', 50, '2024-01-26 08:58:47', 'haditermos@gmail.com', '/project/uploaded/65b36637e2252_GoOnlineTools-image-downloader.png'),
(23, 'lenovo laptop', 600.00, 'IdeaPad Slim 3i Gen 8 | 15 inch Intel-powered lightweight laptop | Lenovo  Lebanon  IdeaPad Slim 3i Gen 8 | 15 inch Intel-powered lightweight laptop | Lenovo Lebanon', 15, '2024-01-26 09:00:32', 'haditermos@gmail.com', '/project/uploaded/65b366a0a00a3_GoOnlineTools-image-downloader (1).png'),
(24, 'asus laptop', 1500.00, 'ASUS ROG STRIX Gaming Laptop, 15.6” IPS-Type Full HD, Intel Core i7-7700HQ Processor GTX', 3, '2024-01-26 09:07:12', 'haditermos@gmail.com', '/project/uploaded/65b368301a71d_GoOnlineTools-image-downloader (5).jpeg'),
(25, 'Logo City', 40.00, 'Logo city ship 60638 pieces 7+ years old', 40, '2024-01-26 09:19:47', 'husseinshamas2@gmail.com', '/project/uploaded/65b36b239d11a_logocity.jpeg'),
(26, 'fan', 10.00, 'Buy Bajaj Veloce 40cm Sweep 3 Blade Table Fan (With Copper Motor, 251346,  White and Purple) Online - Croma  Buy Bajaj Veloce 40cm Sweep 3 Blade Table Fan (With Copper Motor, 251346, White and Purple)', 40, '2024-01-26 09:21:19', 'husseinshamas2@gmail.com', '/project/uploaded/65b36b7fae21b_GoOnlineTools-image-downloader (2).png'),
(27, 'ceiling fan', 40.00, 'Brown Ceiling Fan | Usha Fan', 48, '2024-01-26 09:22:47', 'husseinshamas2@gmail.com', '/project/uploaded/65b36bd711821_GoOnlineTools-image-downloader (3).png');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `number` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `location` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `number`, `email`, `password`, `location`) VALUES
(9, 'hadi', 'termos', 76777888, 'haditermos@gmail.com', 'haditermos', 'beirut hamra street'),
(11, 'hussein', 'shamas', 12312312, 'husseinshamas@gmail.com', 'husseinshamas', 'beqaa'),
(12, 'hadi', 'termos', 99999999, 'haditermos2@gmail.com', 'haditermos', 'lebanese university'),
(13, 'hussein', 'shamas', 12345678, 'husseinshamas2@gmail.com', 'husseinshamas', 'saida'),
(30, 'Guest', 'one', 12312312, 'guestone@gmail.com', 'guestone', 'home');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_email` (`customer_email`),
  ADD KEY `seller_email` (`seller_email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `seller_email` (`seller_email`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_email`) REFERENCES `registration` (`email`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`seller_email`) REFERENCES `registration` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
