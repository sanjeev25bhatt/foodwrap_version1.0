-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2016 at 05:18 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `adminname` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `password`, `online`) VALUES
(1, 'admin', '6dad2b2478af51e592fd7150bce02ccb', 0),
(2, 'admin2', '9fcca8a6f2920f02c0b7b49b140b1d36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_status`
--

CREATE TABLE IF NOT EXISTS `admin_status` (
`id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `uid11` int(11) NOT NULL,
  `uid12` int(11) NOT NULL,
  `uid13` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_status`
--

INSERT INTO `admin_status` (`id`, `admin_id`, `uid11`, `uid12`, `uid13`) VALUES
(1, 1, 0, 0, 0),
(2, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
`id` int(11) NOT NULL,
  `user-id` int(11) NOT NULL,
  `admin-id` int(11) NOT NULL,
  `chat-text` varchar(500) NOT NULL,
  `by` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user-id`, `admin-id`, `chat-text`, `by`) VALUES
(1, 13, 2, 'hi admin', 'user'),
(2, 14, 2, 'hi there', 'admin'),
(3, 12, 2, 'hi there', 'admin'),
(4, 13, 2, 'hi there', 'admin'),
(5, 14, 2, 'i am vicky', 'user'),
(6, 14, 2, 'i got it', 'admin'),
(7, 12, 2, 'i am aman', 'user'),
(8, 13, 2, 'i am ashu', 'user'),
(9, 12, 2, 'i got it', 'admin'),
(10, 13, 2, 'i got it', 'admin'),
(11, 14, 2, 'yo', 'admin'),
(12, 12, 2, 'yo', 'admin'),
(13, 13, 2, 'yo man', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `map-markers`
--

CREATE TABLE IF NOT EXISTS `map-markers` (
`id` int(11) NOT NULL,
  `description` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map-markers`
--

INSERT INTO `map-markers` (`id`, `description`, `name`, `latitude`, `longitude`, `content`) VALUES
(1, 'restaurant', 'PRAKASH RESTAURANT', 29.86968, 77.890167, 'a high class restaurant of roorkee\r\ngood facilities and food in reasonable price'),
(2, 'bar', 'HOTEL ROYAL PALACE', 29.869081, 77.889277, 'its a restaurant with a bar and a hotel..\r\nHere chicken is really awesome.'),
(3, 'restaurant', 'PANJABI DHABA', 29.864084, 77.889197, 'another non veg venue'),
(4, 'delievery', 'DOMINOS', 29.871517, 77.892003, 'a place for pizza lover..\r\nHome delievery is also available, call 6888-6888');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
`payment_id` int(11) NOT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `status`) VALUES
(1, 'Product1', 'product_image1.jpg', 10.00, 1),
(2, 'Product2', 'product_image2.jpg', 50.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` varchar(65) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `phone`, `password`) VALUES
(12, 'aman', 'sharma', 'aman@gmail.com', '9557373673', '7ca6feed54eb0ac5dd2e67cc40f21f27'),
(13, 'ashu', 'sharma', 'ashu@gmail.com', '9557373383', 'a510dbdb455263aef31c9b7cf3c6830b'),
(14, 'vicky', 'sharma', 'vicky@gmail.com', '9745863210', 'e3882d06140f056587ff6c9af39ba7d6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_status`
--
ALTER TABLE `admin_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map-markers`
--
ALTER TABLE `map-markers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_status`
--
ALTER TABLE `admin_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `map-markers`
--
ALTER TABLE `map-markers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
