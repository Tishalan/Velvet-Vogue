-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2025 at 01:16 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `velvet_vogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `Product_ID` int DEFAULT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','On Process','Delivered') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`order_id`),
  KEY `product_id` (`Product_ID`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `contact_ID` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `description` text,
  `admin_reply` varchar(200) DEFAULT 'Pending',
  PRIMARY KEY (`contact_ID`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_ID`, `user_id`, `email`, `phone_number`, `address`, `description`, `admin_reply`) VALUES
(27, 1, 'satgunamtishalan@gmail.com', '0750906065', 'No.21, 5th cross street, Columbuthurai, Jaffna', 'I hope this message finds you well. I am writing to inquire about the status of my recent order. Unfortunately, I have not yet received the product.\r\nCould you please provide an update on the shipment and estimated delivery timeline? I would appreciate your assistance in resolving this matter as soon as possible.\r\n\r\nThank you for your attention to this issue. I look forward to your prompt response.', 'Thank you for reaching out. I apologize for the delay in your order. I will check the status of your shipment and provide you with an updated delivery timeline shortly.');

-- --------------------------------------------------------

--
-- Table structure for table `products_details`
--

DROP TABLE IF EXISTS `products_details`;
CREATE TABLE IF NOT EXISTS `products_details` (
  `Product_ID` int NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Discount_Price` decimal(10,2) DEFAULT NULL,
  `Image` longblob NOT NULL,
  `category` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Availability` enum('in_stock','out_of_stock') NOT NULL,
  `Size` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Colors` varchar(200) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=78786862 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products_details`
--

INSERT INTO `products_details` (`Product_ID`, `Product_name`, `Price`, `Discount_Price`, `Image`, `category`, `Description`, `Availability`, `Size`, `Colors`) VALUES
(13, 'Skirt', 1499.00, 999.00, 0x313734323237353231322e706e67, 'women', 'This is skirt', 'in_stock', 'M,L', 'butter,red'),
(12, 'Full sleeved T-Shirt', 4999.00, 0.00, 0x313734323237323435352e706e67, 'women', 'this is Full sleeved T-shirt', 'in_stock', 'M,L', 'blue'),
(11, 'Sleeveless Frock', 2999.00, 0.00, 0x313734323237323331362e706e67, 'women', 'This is women frock', 'in_stock', 'M,L', 'red'),
(9, 'Full sleeved shirt', 2999.00, 0.00, 0x313734323237313838312e706e67, 'women', 'This is full sleeved shirt', 'in_stock', 'M,L', 'red'),
(8, 'Printed Shirt ', 1999.00, 0.00, 0x313734323237313831332e706e67, 'men', 'This is printed shirt', 'in_stock', 'L,XL', 'green'),
(7, 'Summer Printed Shirt', 2999.00, 0.00, 0x313734323237313736302e706e67, 'men', 'This is printed Shirt', 'out_of_stock', 'M,L', 'green,butter,blue,red'),
(6, 'Carco Pants', 4999.00, 3499.00, 0x313734323237313639322e706e67, 'men', 'This is carco pants', 'in_stock', 'M,L', 'green,butter,red'),
(4, 'Shorts', 1499.00, 0.00, 0x313734323237313537392e706e67, 'men', 'This is shorts', 'in_stock', 'S,M', 'green,butter'),
(3, 'Half Sleeved Shirt', 2000.00, 0.00, 0x313734323237313533392e706e67, 'men', 'This is half Sleeved shirt', 'in_stock', 'M', 'red'),
(2, 'Full sleeved Shirt', 3499.00, 0.00, 0x313734323237313430342e706e67, 'men', 'This is full sleeved shirt', 'in_stock', 'M', 'red'),
(1, 'T-Shirt', 2999.00, 1999.00, 0x313734323237313333332e706e67, 'men', 'This is a T-shirt', 'in_stock', 'S,M', 'butter,blue'),
(10, 'Trouser', 4999.00, 3999.00, 0x313734323237313933322e706e67, 'women', 'This is trouser', 'in_stock', 'M,L', 'blue,red'),
(5, 'Trouser', 2999.00, 2499.00, 0x313734323237313633372e706e67, 'men', 'This is trouser', 'in_stock', 'M,L,XL', 'butter,blue,red'),
(14, 'Wedding Dress', 5999.00, 4999.00, 0x313734323237353236342e706e67, 'women', 'This is wedding dress', 'in_stock', 'M,L', 'blue,red'),
(15, 'Sleeveless Frock', 2499.00, 0.00, 0x313734323237353335392e706e67, 'women', 'This is frock', 'in_stock', 'M,L,XL', 'green,butter'),
(16, 'Kaftan	', 2499.00, 0.00, 0x313734323830313739322e706e67, 'women', 'This is kaftan', 'in_stock', 'L,XL', 'butter,blue,red'),
(17, 'Frock', 1499.00, 999.00, 0x313734323237353436392e706e67, 'kids', 'This is frock', 'in_stock', 'M,L', 'butter,blue'),
(18, 'Full sleeved T-Shirt', 2499.00, 1999.00, 0x313734323237353534372e706e67, 'kids', 'This is full sleeve T-shirt', 'out_of_stock', 'M,L', 'blue'),
(19, 'Shorts', 1499.00, 999.00, 0x313734323237353730322e706e67, 'kids', 'This is shorts ', 'in_stock', 'M,L', 'green'),
(20, 'Trouser', 3999.00, 2499.00, 0x313734323237353734352e706e67, 'kids', 'This is trouder', 'out_of_stock', 'M,L', 'butter,blue'),
(21, 'T-Shirt', 2499.00, 0.00, 0x313734323237353938352e706e67, 'kids', 'This is T-shirt', 'in_stock', 'M', 'butter,blue'),
(22, 'Hoodie', 2499.00, 1999.00, 0x313734323237363035342e706e67, 'kids', 'This is hoodie ', 'in_stock', 'M', 'butter,blue'),
(23, 'Frock', 3499.00, 1999.00, 0x313734323237363232362e706e67, 'kids', 'This is frock', 'in_stock', 'M,L', 'red'),
(24, 'Boy\'s T-shirt', 999.00, 0.00, 0x313734323237363238302e706e67, 'kids', 'This is tshirt', 'in_stock', 'M,L', 'butter');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

DROP TABLE IF EXISTS `shipping_details`;
CREATE TABLE IF NOT EXISTS `shipping_details` (
  `order_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `shipping_address` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`order_id`, `user_id`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_country`) VALUES
(161, 1, 'No.21, 5th cross street, columbuthurai, jaffna', 'jaffna', 'Columbuthurai', 'Srilanka'),
(158, 8, 'No.67,1st cross street, petta, colombo', 'Colombo', 'Petta', 'Srilanka'),
(0, 14, 'Jaffna', 'jaffna', 'huih', 'Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `track_details`
--

DROP TABLE IF EXISTS `track_details`;
CREATE TABLE IF NOT EXISTS `track_details` (
  `track_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('on process','pending','delivered') DEFAULT 'pending',
  PRIMARY KEY (`track_id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `track_details`
--

INSERT INTO `track_details` (`track_id`, `order_id`, `user_id`, `product_name`, `price`, `quantity`, `total`, `total_price`, `order_date`, `status`) VALUES
(91, 201, 1, 'Boy\'s T-shirt', 999.00, 3, 2997.00, 4996.00, '2025-03-24 08:01:20', 'on process');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phonenumber`, `profile_image`) VALUES
(1, 'Tishalan', 'tishalan2003@T', 'Satgunamtishalan@gmail.com', '0750906060', 'Admindb/uploads/download.jpg'),
(8, 'ish', '123', 'ish@gmail.com', '0779754267', 'Admindb/uploads/download.jpg'),
(13, 'Vijay', '12345', 'Vijay@gmail.com', '0771178318', NULL),
(14, 'Rich', '123', 'Ram@gmail.com', '088675', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
