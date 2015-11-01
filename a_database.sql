-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2015 at 06:40 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

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
(21, 8, 1, 'thanku..', 'user');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `phone`, `password`) VALUES
(6, 'ashutosh', 'sharma', 'iamashu2002@gmail.com', '9410920247', '70aea0429bf46d1b922e48e1af58dd33'),
(7, 'sunita', 'sharma', 'sonu@gmail.com', '9557373673', '1c6ac5a840bb6d1f3120a59fe3e13ecc'),
(8, 'aman', 'sharma', 'aman.asvickes.sharma45@gmail.com', '9557373673', '7ca6feed54eb0ac5dd2e67cc40f21f27'),
(9, 'pranav', 'bansal', 'pranavbansal@gmail.com', '9410235012', '9e1135ff4157f14358c7c94c79aad47d');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE IF NOT EXISTS `users1` (
`id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `username`, `password`, `firstname`, `surname`) VALUES
(1, 'amansh', '7ca6feed54eb0ac5dd2e67cc40f21f27', 'aman', 'sharma');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
