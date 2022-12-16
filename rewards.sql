-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2022 at 07:34 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rewards`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `accountId` int NOT NULL,
  `userId` int NOT NULL,
  `accountType` varchar(100) NOT NULL,
  `points` int NOT NULL,
  PRIMARY KEY (`accountId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountId`, `userId`, `accountType`, `points`) VALUES
(0, 0, '[employee]', 0),
(1, 1001, 'employee', 1000),
(2, 1002, 'admin', 10000),
(3, 1003, 'employee', 5000),
(4, 1004, 'employee', 3500),
(5, 1005, 'admin', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `giftcard`
--

DROP TABLE IF EXISTS `giftcard`;
CREATE TABLE IF NOT EXISTS `giftcard` (
  `cardid` char(13) NOT NULL,
  `cardname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cardtype` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cardvalue` int DEFAULT NULL,
  `points` int DEFAULT NULL,
  PRIMARY KEY (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giftcard`
--

INSERT INTO `giftcard` (`cardid`, `cardname`, `cardtype`, `cardvalue`, `points`) VALUES
('101', 'Lowes', 'gift card', 100, 500),
('104', 'Cummins', 'gift card', 150, 450),
('105', 'Air Asia Rewards', 'gift card', 500, 1800),
('106', 'Samsung', 'gift card', 2000, 5000),
('107', 'Discord', 'gift card', 50, 200),
('108', 'Blizzard Entertainment', 'gift card', 100, 500),
('109', 'Steam', 'gift card', 100, 750),
('110', 'Ubisoft', 'gift card', 150, 650),
('111', 'Canvas', 'gift card', 70, 350),
('112', 'Free Real Estate', 'gift card', 2000, 8000),
('113', 'MSI', 'gift card', 1500, 7500),
('114', 'Starbucks', 'gift card', 85, 450),
('115', 'Smiths', 'gift card', 200, 800),
('116', 'Roblox', 'gift card', 25, 125),
('117', 'Cabelas ', 'gift card', 500, 1250),
('118', 'Casino Nights', 'gift card', 120, 750),
('119', 'Delta', 'gift card', 500, 1350),
('120', 'TryHackMe', 'gift card', 150, 750),
('121', 'Linux', 'gift card', 500, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `redemption`
--

DROP TABLE IF EXISTS `redemption`;
CREATE TABLE IF NOT EXISTS `redemption` (
  `redeemId` int NOT NULL,
  `date` varchar(100) NOT NULL,
  `accountId` int NOT NULL,
  `cardId` int NOT NULL,
  `pointsRedeemed` int NOT NULL,
  PRIMARY KEY (`redeemId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `redemption`
--

INSERT INTO `redemption` (`redeemId`, `date`, `accountId`, `cardId`, `pointsRedeemed`) VALUES
(489619, '2009', 0, 104, 450),
(631003, '2009', 0, 104, 450),
(843211, '2009', 0, 104, 450),
(697723, '2009', 0, 104, 450),
(741882, '2009', 0, 104, 450),
(732139, '2009', 0, 104, 450),
(460945, '2009', 0, 104, 450),
(539898, '2009', 0, 104, 450),
(227175, '2009', 0, 104, 450),
(528877, '2009', 0, 104, 0),
(967883, '2009', 0, 104, 450),
(180975, '2009', 0, 104, 450),
(195353, '2009', 0, 104, 450),
(921338, '2009', 0, 101, 500),
(797042, '2009', 0, 105, 1800),
(22297, '2009', 0, 105, 1800),
(186508, '2009', 0, 110, 650),
(832417, '2009', 0, 105, 1800),
(366687, '2009', 0, 106, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `points` int NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `username`, `password`, `role`, `points`) VALUES
(1, 'Bill', 'Smith', 'bsmith', '$2y$10$PkSlL9jF29KzfRDm4OvVZeHwfZ3WB1sZbdzSBU./e8u5qYcVNlZL2', 'admin', 1000000),
(2, 'Pauline', 'Jones', 'pjones', '$2y$10$Jzi5yMenWza0NjmOyAGU..58qEVzsqaws2RzAxcapULvheUEv8rZW', 'user', 1000000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
