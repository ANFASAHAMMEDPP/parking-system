-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 10:02 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `compid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `password`, `address`, `phone`, `email`) VALUES
(1, 'robin', '12345', 'C-237, nit calicut', '8606805608', 'robinjohnson890@gmail.com'),
(3, 'jerin', '12345', 'C-206, nit calicut', '9495853247', 'jerinjoseantony@gmail.com'),
(4, 'abin k paul', 'password', 'C-334, nit calicut', '9874455630', 'abin@gmail.com'),
(5, 'JUSTINE', 'justine', 'c 224', '8787878787', 'justine_b170212cs@nitc.ac.in'),
(7, 'anfas', '1234', 'nit calicut', '8848730114', 'anfasahammed619@gmail.com'),
(8, 'govind', '12345', 'C-206, nit calicut', '9658863545', 'govind@gmail.com'),
(9, 'Harijothis', '1234', 'C nit calicut', '9539984400', 'hari@gmail.com'),
(10, 'Aman', 'amansingh1', 'C-Hostel', '8959740385', 'amansingh160899@gmail.com'),
(11, 'Edwin ', '12345', 'C-231, nit calicut', '6547896474', 'edwin@gmail.com'),
(12, 'sreejith', '12345', 'C-109, nit calicut', '1234567890', 'xyz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `email`, `password`, `address`, `salary`, `phone`) VALUES
(1, 'robin', 'robinjohnson890@gmail.com', '12345', 'c 237', '500000', '8606805608'),
(2, 'anfas', 'anfas@gmail.com', '12345', 'sagsgg', '25000', '7593964953'),
(3, 'aakash', 'aakash@gmail.com', '12345', 'c-122', '15000', '9497082204'),
(4, 'stebin', 'stebin@gmail.com', '12345', 'e-122', '15000', '9061979078'),
(5, 'jerin', 'jerin@gmail.com', '12345', 'c-122', '300000', '9495853247');

-- --------------------------------------------------------

--
-- Table structure for table `parkings`
--

CREATE TABLE `parkings` (
  `pid` int(10) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `parkingspace` varchar(100) NOT NULL,
  `parkedtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vehicleid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkings`
--

INSERT INTO `parkings` (`pid`, `employee`, `customer`, `parkingspace`, `parkedtime`, `vehicleid`) VALUES
(13, 'robinjohnson890@gmail.com', 'hari@gmail.com', 'T-10', '2019-11-09 08:03:24', 'KL-57-A-6767'),
(15, 'robinjohnson890@gmail.com', 'jerinjoseantony@gmail.com', 'H-6', '2019-11-09 08:09:20', 'KL-17-T-9224'),
(16, 'robinjohnson890@gmail.com', 'amansingh160899@gmail.com', 'T-20', '2019-11-10 06:38:51', 'MP-20-B-9202'),
(19, 'anfas@gmail.com', 'edwin@gmail.com', 'H-1', '2019-11-10 07:52:13', 'KL-45-J-2956'),
(20, 'robinjohnson890@gmail.com', 'edwin@gmail.com', 'L-12', '2019-11-10 07:52:32', 'KL-17-T-9295'),
(22, 'anfas@gmail.com', 'xyz@gmail.com', 'L-14', '2019-11-10 08:17:52', 'KL-60-R-1809'),
(23, 'robinjohnson890@gmail.com', 'xyz@gmail.com', 'T-34', '2019-11-10 08:18:26', 'KL-16-R-9254');

-- --------------------------------------------------------

--
-- Table structure for table `parkingshis`
--

CREATE TABLE `parkingshis` (
  `employee` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `parkingspace` varchar(15) NOT NULL,
  `parkedtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vehicleid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkingshis`
--

INSERT INTO `parkingshis` (`employee`, `customer`, `parkingspace`, `parkedtime`, `vehicleid`) VALUES
('robinjohnson890@gmail.com', 'govind@gmail.com', 'H-1', '2019-11-09 08:25:31', 'KL-17-T-9224'),
('robinjohnson890@gmail.com', 'govind@gmail.com', 'H-1', '2019-11-09 10:45:36', 'KL-45-R-1809'),
('robinjohnson890@gmail.com', 'amansingh160899@gmail.com', 'T-20', '2019-11-10 06:38:51', 'MP-20-B-9202'),
('anfas@gmail.com', 'edwin@gmail.com', 'H-1', '2019-11-10 07:50:40', 'KL-45-J-2956'),
('anfas@gmail.com', 'xyz@gmail.com', 'L-7', '2019-11-10 08:14:52', 'KL-60-R-1809');

-- --------------------------------------------------------

--
-- Table structure for table `parking_space`
--

CREATE TABLE `parking_space` (
  `sid` int(10) NOT NULL,
  `spacename` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_space`
--

INSERT INTO `parking_space` (`sid`, `spacename`, `status`) VALUES
(1, 'L-1', '0'),
(2, 'L-2', '0'),
(3, 'L-3', '0'),
(4, 'L-4', '0'),
(5, 'L-5', '0'),
(6, 'L-6', '0'),
(9, 'L-7', '0'),
(10, 'L-8', '0'),
(11, 'L-9', '0'),
(12, 'L-10', '0'),
(13, 'L-11', '0'),
(14, 'L-12', '1'),
(15, 'L-13', '0'),
(16, 'L-14', '1'),
(17, 'L-15', '0'),
(18, 'L-16', '0'),
(19, 'L-17', '0'),
(20, 'L-18', '0'),
(21, 'L-19', '0'),
(22, 'L-20', '0'),
(23, 'T-1', '0'),
(27, 'T-2', '0'),
(28, 'T-3', '0'),
(29, 'T-4', '0'),
(30, 'T-5', '0'),
(31, 'T-6', '0'),
(32, 'T-7', '0'),
(33, 'T-8', '0'),
(34, 'T-9', '0'),
(35, 'T-10', '1'),
(36, 'T-11', '0'),
(37, 'T-12', '0'),
(38, 'T-13', '0'),
(39, 'T-14', '0'),
(40, 'T-15', '0'),
(41, 'T-16', '0'),
(42, 'T-17', '0'),
(43, 'T-18', '0'),
(44, 'T-19', '0'),
(45, 'T-20', '1'),
(46, 'T-21', '0'),
(47, 'T-22', '0'),
(48, 'T-23', '0'),
(49, 'T-24', '0'),
(50, 'T-25', '0'),
(51, 'T-26', '0'),
(52, 'T-27', '0'),
(53, 'T-28', '0'),
(54, 'T-29', '0'),
(55, 'T-30', '0'),
(56, 'T-31', '0'),
(57, 'T-32', '0'),
(58, 'T-33', '0'),
(59, 'T-34', '1'),
(60, 'T-35', '0'),
(61, 'T-36', '0'),
(62, 'T-37', '0'),
(63, 'T-38', '0'),
(64, 'T-39', '0'),
(65, 'T-40', '0'),
(66, 'H-1', '1'),
(67, 'H-2', '0'),
(68, 'H-3', '0'),
(69, 'H-4', '0'),
(70, 'H-5', '0'),
(71, 'H-6', '1'),
(72, 'H-7', '0'),
(73, 'H-8', '0'),
(74, 'H-9', '0'),
(75, 'H-10', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`compid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `parkings`
--
ALTER TABLE `parkings`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `vehicleid` (`vehicleid`);

--
-- Indexes for table `parking_space`
--
ALTER TABLE `parking_space`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `spacename` (`spacename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `compid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parkings`
--
ALTER TABLE `parkings`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `parking_space`
--
ALTER TABLE `parking_space`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
