-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 03:03 PM
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
  `adminname` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `password`, `online`) VALUES
(1, 'admin', '6dad2b2478af51e592fd7150bce02ccb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
`id` int(11) NOT NULL,
  `user-id` int(11) NOT NULL,
  `admin-id` int(11) NOT NULL,
  `chat-text` varchar(500) NOT NULL,
  `by` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user-id`, `admin-id`, `chat-text`, `by`) VALUES
(1, 8, 1, 'lets get started', 'user'),
(2, 8, 1, 'hello', 'user'),
(3, 8, 1, 'heya', 'user'),
(4, 8, 1, 'full bakchudi', 'user'),
(5, 8, 1, 'ye to chalra h', 'user'),
(6, 8, 1, 'maza aa gaya', 'user'),
(7, 8, 1, 'ab bs ye chalta hi rahe', 'user'),
(8, 8, 1, 'tabhi to sahi hoga', 'user'),
(9, 8, 1, 'abhi bhi chalra h kya?', 'user'),
(10, 8, 1, 'Bilkul chalra h', 'user'),
(11, 8, 1, 'ab dekho jara', 'user'),
(12, 8, 1, 'vico', 'admin'),
(13, 8, 1, 'kya baat h', 'user'),
(14, 8, 1, 'and here i nailed it, excited', 'user'),
(15, 8, 1, 'even working while pressing with enter key', 'admin'),
(16, 8, 1, 'hahaha... saare browsers pe chalra h', 'user'),
(17, 8, 1, 'pehla phaad achievement', 'user'),
(18, 8, 1, 'ab jara m ise admin m b dekh lu', 'user'),
(19, 8, 1, 'hihi dekh lia', 'admin'),
(20, 8, 1, 'baht khoob aman, tera jawaab nahi', 'admin'),
(21, 8, 1, 'thanku..', 'user'),
(22, 8, 1, 'sup?', 'user'),
(23, 8, 1, 'ni jaare kya msg?', 'admin'),
(24, 8, 1, 'working or not?', 'admin'),
(25, 8, 1, 'everything is fine', 'user'),
(26, 8, 1, 'ab kya hua?', 'user'),
(27, 10, 1, 'hi', 'user'),
(28, 10, 1, 'whats up?', 'user'),
(29, 8, 1, 'hi', 'user'),
(30, 8, 1, 'not happening', 'user'),
(31, 8, 1, 'still not', 'user'),
(32, 8, 1, 'might be', 'user'),
(33, 8, 1, 'yes now scrolling down', 'user'),
(34, 8, 1, 'working', 'user'),
(35, 8, 1, 'singh is bling', 'user'),
(36, 8, 1, 'now', 'user'),
(37, 8, 1, 'working', 'user'),
(38, 8, 1, 'yups', 'user'),
(39, 8, 1, 'ka haal chal h??', 'user'),
(40, 8, 1, 'hey', 'user'),
(41, 8, 1, 'hello', 'admin'),
(42, 8, 1, 'now final check', 'admin'),
(43, 8, 1, 'working', 'admin'),
(44, 8, 1, 'same here', 'user'),
(45, 8, 1, 'again', 'user'),
(46, 8, 1, 'here also', 'admin'),
(47, 8, 1, 'hello', 'user'),
(48, 8, 1, 'w"up?', 'user');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `phone`, `password`) VALUES
(6, 'ashutosh', 'sharma', 'iamashu2002@gmail.com', '9410920247', '70aea0429bf46d1b922e48e1af58dd33'),
(7, 'sunita', 'sharma', 'sonu@gmail.com', '9557373673', '1c6ac5a840bb6d1f3120a59fe3e13ecc'),
(8, 'aman', 'sharma', 'aman.asvickes.sharma45@gmail.com', '9557373673', '7ca6feed54eb0ac5dd2e67cc40f21f27'),
(9, 'pranav', 'bansal', 'pranavbansal@gmail.com', '9410235012', '9e1135ff4157f14358c7c94c79aad47d'),
(10, 'mohit', 'dasila', 'mohitdasila1995@gmail.com', '8888888888', '01bab37f2d2b928bb557501f9820bf93');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
