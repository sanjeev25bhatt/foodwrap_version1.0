-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2016 at 09:14 AM
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
-- Table structure for table `map-markers`
--

CREATE TABLE IF NOT EXISTS `map-markers` (
`id` int(11) NOT NULL,
  `description` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `city` varchar(30) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map-markers`
--

INSERT INTO `map-markers` (`id`, `description`, `name`, `city`,`latitude`, `longitude`, `content`) VALUES
(1, 'restaurant', 'PRAKASH RESTAURANT', 'Roorkee', 29.869738, 77.890167, 'a high class restaurant of roorkee\r\ngood facilities and food in reasonable price'),
(2, 'bar', 'HOTEL ROYAL PALACE', 'Roorkee', 29.869081, 77.889277, 'its a restaurant with a bar and a hotel..\r\nHere chicken is really awesome.'),
(3, 'restaurant', 'PANJABI DHABA', 'Roorkee', 29.864084, 77.889197, 'another non veg venue'),
(4, 'delievery', 'DOMINOS', 'Roorkee', 29.871517, 77.892003, 'a place for pizza lover..\r\nHome delievery is also available, call 6888-6888'),
(5, 'restaurant', 'PATANJALI YOGPITH', 'Roorkee', 29.907368, 78.001535, 'A place for herb lovers. Residence of ram dev baba.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `map-markers`
--
ALTER TABLE `map-markers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `map-markers`
--
ALTER TABLE `map-markers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
