-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/

-- Host: localhost
-- Generation Time: Apr 23, 2022 at 09:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doancnpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `customer_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`customer_id`, `email`, `name`, `role`, `password`) VALUES
(2, 'binhbksg0123@gmail.com', 'binh', 1, 'BuibinhBKSG0123~');

-- --------------------------------------------------------

--
-- Table structure for table `Device`
--

CREATE TABLE `Device` (
  `device_id` int(11) NOT NULL,
  `farm_id` int(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `feed_id` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `dashboard_view` tinyint(1) NOT NULL,
  `farm_name` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Device`
--

INSERT INTO `Device` (`device_id`, `farm_id`, `description`, `feed_id`, `type`, `device_name`, `dashboard_view`, `farm_name`, `active`) VALUES
(33, 23, '', 'binhbuibksg0123/feeds/ourfarm-temp', 'Temperature', 'Temp Sensor', 1, 'farm', 0),
(34, 23, '', 'binhbuibksg0123/feeds/ourfarm-lumi', 'Luminosity', 'Lumi Sensor', 1, 'farm', 1),
(35, 23, '', 'binhbuibksg0123/feeds/ourfarm-humid', 'Humidity', 'Humid Sensor', 1, 'farm', 0),
(36, 23, '', 'binhbuibksg0123/feeds/bbc-led', 'Luminosity', 'led', 0, 'farm', 1),
(37, 23, '', 'binhbuibksg0123/feeds/bbc-led', 'Other', 'led', 0, 'farm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Farm`
--

CREATE TABLE `Farm` (
  `farm_id` int(11) NOT NULL,
  `servername` varchar(100) NOT NULL,
  `port` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `farm_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Farm`
--

INSERT INTO `Farm` (`farm_id`, `servername`, `port`, `username`, `password`, `farm_name`) VALUES
(23, 'io.adafruit.com', 443, 'binhbuibksg0123', 'aio_rpEM21kDpSeH53QWMiDLYXqiIH5U', 'farm'),
(24, 'io.adafruit.com', 443, 'binhbuibksg0123', 'aio_rpEM21kDpSeH53QWMiDLYXqiIH5U', 'binhdz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `Device`
--
ALTER TABLE `Device`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `farmid` (`farm_id`);

--
-- Indexes for table `Farm`
--
ALTER TABLE `Farm`
  ADD PRIMARY KEY (`farm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Device`
--
ALTER TABLE `Device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `Farm`
--
ALTER TABLE `Farm`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Device`
--
ALTER TABLE `Device`
  ADD CONSTRAINT `farmid` FOREIGN KEY (`farm_id`) REFERENCES `Farm` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;