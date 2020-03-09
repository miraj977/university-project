-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 12:08 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PMSMS`
--
CREATE DATABASE IF NOT EXISTS `PMSMS`;
USE `PMSMS`;
-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE IF NOT EXISTS `ADMIN` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`id`, `username`, `password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ASSET`
--

CREATE TABLE IF NOT EXISTS `ASSET` (
  `AssetId` int(10) NOT NULL,
  `AssetName` varchar(200) NOT NULL,
  `AssetCode` varchar(100) NOT NULL,
  `AssetDescription` text NOT NULL,
  `AssetUnitPrice` varchar(20) NOT NULL,
  `AssetQuantity` varchar(20) NOT NULL,
  `TempCount` int(11) DEFAULT '0',
  `AssetLocation` varchar(20) NOT NULL,
  `AssetNote` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ASSET`
--

INSERT INTO `ASSET` (`AssetId`, `AssetName`, `AssetCode`, `AssetDescription`, `AssetUnitPrice`, `AssetQuantity`, `TempCount`, `AssetLocation`, `AssetNote`) VALUES
(1, 'Iphone XMaxs111', 'icode30034', 'Apple Company Inc', '2566', '1', 1, 'Pentagon House', 'One iPhone max remaining'),
(2, 'Macbook Pro', 'Mac3003', '2018 version', '7.9000', '27', 4, 'Lab', NULL),
(3, 'pixel', '3099', 'dfghjk', '200', '900', 3, 'sydney', NULL),
(5, 'Washing Machine', 'W0001', 'Washing machine 10 kg', '650', '1', 0, 'Parramatta', NULL),
(8, 'Samsung s10 ', 'S201', 'Phone for employee', '1300', '2', 2, 'Parramatta', NULL),
(9, 'King size bed', 'KB411', 'Heavy', '650', '34', 1, 'Pentagon House', 'Delivery needed');

-- --------------------------------------------------------

--
-- Table structure for table `ASSIGN`
--

CREATE TABLE IF NOT EXISTS `ASSIGN` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `assetid` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `count` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ASSIGN`
--

INSERT INTO `ASSIGN` (`id`, `empid`, `assetid`, `description`, `count`, `Date`) VALUES
(152, 2, 'Macbook Pro', '', 4, '2019-05-29 15:09:24'),
(155, 6, 'Macbook Pro', '', 4, '2019-05-29 15:09:45'),
(156, 6, 'pixel', 'Given for official visit to parramatta', 4, '2019-05-29 15:09:45'),
(157, 6, 'Samsung s10 ', '', 2, '2019-05-29 15:09:45'),
(158, 14, 'Macbook Pro', '', 4, '2019-05-29 15:10:02'),
(159, 14, 'pixel', '', 4, '2019-05-29 15:10:02'),
(160, 14, 'Samsung s10 ', '', 2, '2019-05-29 15:10:02'),
(162, 18, 'Iphone XMaxs111', '', 1, '2019-05-29 15:10:17'),
(163, 18, 'Macbook Pro', 'Assigned to room L501', 4, '2019-05-29 15:10:17'),
(164, 18, 'pixel', '', 4, '2019-05-29 15:10:17'),
(165, 18, 'King size bed', '', 2, '2019-05-29 15:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `COMPLETE`
--

CREATE TABLE IF NOT EXISTS `COMPLETE` (
  `id` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `assetid` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `Date` datetime NOT NULL,
  `ReleaseDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COMPLETE`
--

INSERT INTO `COMPLETE` (`id`, `empid`, `assetid`, `description`, `Date`, `ReleaseDate`) VALUES
(18, 6, 'Macbook Pro', 'Finally', '2019-05-16 00:00:00', '2019-05-29 15:07:56'),
(19, 6, 'Fridge', 'Feels goooood', '2019-05-16 00:00:00', '2019-05-29 15:08:00'),
(22, 4, 'Macbook Pro', '', '2019-05-21 00:00:00', '2019-05-29 15:08:09'),
(24, 6, 'Washing Machine', '', '2019-05-29 15:05:41', '2019-05-29 15:08:15'),
(27, 2, 'Washing Machine', '', '2019-05-29 15:09:24', '2019-05-29 15:10:29'),
(28, 14, 'King size bed', '', '2019-05-29 15:10:02', '2019-05-29 15:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE IF NOT EXISTS `EMPLOYEE` (
  `EmpId` int(10) NOT NULL,
  `EmpType` int(11) NOT NULL DEFAULT '0',
  `EmpJobTitle` varchar(200) NOT NULL,
  `EmpUname` varchar(150) NOT NULL,
  `EmpFname` varchar(200) NOT NULL,
  `EmpLname` varchar(200) NOT NULL,
  `EmpGender` varchar(20) NOT NULL,
  `EmpEmail` varchar(200) NOT NULL,
  `EmpPhone` varchar(20) NOT NULL,
  `EmpAddress` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`EmpId`, `EmpType`, `EmpJobTitle`, `EmpUname`, `EmpFname`, `EmpLname`, `EmpGender`, `EmpEmail`, `EmpPhone`, `EmpAddress`, `pass`) VALUES
(2, 0, 'ceo', 'nucha', 'Nirusha', 'Khadka', 'female', 'nirushakhadka@gmail.com', '45047', '66 Bond st', 'zxcvbnm,'),
(3, 0, 'ceo', 'nucha1', 'Nirusha1', 'Khadka1', 'female', 'nir1@gmail.com', '45047', '66 Bond st', 'zxcvbnm,'),
(4, 0, 'ceo', 'dsfsdf', 'Nargis', 'Khan', 'female', 'nird1@gmail.com', '4504', '66 Bond st', 'zxcvbnm,'),
(6, 0, 'ceo', 'dsgersg', 'Alis', 'Aryal', 'female', 'nirfd1@gmail.com', '04504', '66 Bond st', 'zxcvbnm,'),
(9, 0, 'ceo', 'bsdfds', 'Raser', 'Khadka1', 'female', 'nir1sere@gmail.com', '45047', '66 Bond st', 'zxcvbnm,'),
(14, 1, 'Tycoon', 'kuku', 'Gambo', 'Hatela', 'male', 'gambo@gmail.com', '', '66 Bond st', 'zxcvbnm,.'),
(15, 0, 'Staff', 'naruto', 'Amrit', 'Shreshta', 'male', 'a@a.com', '', '66 Bond st', '12345678'),
(16, 1, 'Hokage', 'admin', 'Miraj', 'Aryal', 'male', 'mirajaryssal@gmail.com', '41138', '66 Bond st', 'zxcvbnm,'),
(17, 0, 'memb er', 'sss', 'Arskll', 'sdfs', 'male', 'mijaryal@gmail.com', '4546466', '66 Bond st', 'zxcvbnm,.'),
(18, 0, 'Staff', 'nir', 'Miraj', 'Aryal', 'male', 'mirajal@gmail.com', '41138', '66 Bond st', 'zxcvbnm,'),
(19, 0, 'Hokage', 'miraj', 'Miraj', 'Aryal', 'male', 'mirajaryal@gmail.com', '', '66 Bond st', 'zxcvbnm,');

-- --------------------------------------------------------

--
-- Table structure for table `JOBTYPE`
--

CREATE TABLE IF NOT EXISTS `JOBTYPE` (
  `JobType` varchar(20) NOT NULL,
  `EstimatedHrs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ASSET`
--
ALTER TABLE `ASSET`
  ADD PRIMARY KEY (`AssetId`);

--
-- Indexes for table `ASSIGN`
--
ALTER TABLE `ASSIGN`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `COMPLETE`
--
ALTER TABLE `COMPLETE`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD PRIMARY KEY (`EmpId`);

--
-- Indexes for table `JOBTYPE`
--
ALTER TABLE `JOBTYPE`
  ADD PRIMARY KEY (`JobType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ASSET`
--
ALTER TABLE `ASSET`
  MODIFY `AssetId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ASSIGN`
--
ALTER TABLE `ASSIGN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `COMPLETE`
--
ALTER TABLE `COMPLETE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  MODIFY `EmpId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
