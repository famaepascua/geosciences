-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2018 at 02:58 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geosciences`
--
CREATE DATABASE IF NOT EXISTS `geosciences` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `geosciences`;

-- --------------------------------------------------------

--
-- Table structure for table `actionslip`
--

DROP TABLE IF EXISTS `actionslip`;
CREATE TABLE IF NOT EXISTS `actionslip` (
  `actionslipID` int(10) NOT NULL AUTO_INCREMENT,
  `action` varchar(200) DEFAULT NULL,
  `actionDesired` varchar(200) DEFAULT NULL,
  `oicrd` varchar(120) NOT NULL,
  `note` text,
  PRIMARY KEY (`actionslipID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

DROP TABLE IF EXISTS `barangay`;
CREATE TABLE IF NOT EXISTS `barangay` (
  `barangayID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `folderNumber` int(10) NOT NULL,
  PRIMARY KEY (`barangayID`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`barangayID`, `name`, `folderNumber`) VALUES
(1, 'Asin Road', 1),
(2, 'San Luis', 1),
(3, 'Balacbac', 2),
(4, 'Sto. Tomas', 2),
(5, 'Camp 7', 3),
(6, 'Camp 8', 3),
(7, 'Bakakeng', 4),
(8, 'Balsigan', 5),
(9, 'Poliwes', 5),
(10, 'San Vicente', 5),
(11, 'Dominican', 6),
(12, 'Crystal Cave', 6),
(13, 'Mirador Hill', 6),
(14, 'Brookside', 7),
(15, 'New Lucban', 7),
(16, 'Trancoville', 7),
(17, 'Sanitary Camp', 7),
(18, 'T.Alonzo', 7),
(19, 'Dontogan', 8),
(20, 'Fairview', 9),
(21, 'Irisan', 10),
(22, 'Pinsao', 11),
(23, 'Longlong', 12),
(24, 'Outlook Drive', 13),
(25, 'Loakan', 14),
(26, 'Holy Ghost', 15),
(27, 'Rimando Road', 15),
(28, 'Aurora Hill', 15),
(29, 'Pinget', 16),
(30, 'Dizon Subdivision', 16),
(31, 'Lourdes Barangay', 17),
(32, 'Pacdal', 18),
(33, 'Navy Base', 18),
(34, 'Gabriela Silang', 19),
(35, 'Quezon Hill', 20),
(36, 'Quirino Hill', 21),
(37, 'P.Burgos', 22),
(38, 'Cresencia Village', 22),
(39, 'Camp Allen', 22),
(40, 'Guisad', 22),
(41, 'Ferguson Road', 22),
(42, 'Kitma', 23),
(43, 'City Camp', 23),
(44, 'Queen of Peace', 23),
(45, 'Campo Sioco', 23),
(46, 'Palma', 23),
(47, 'South Drive', 24),
(48, 'Cabinet Hill', 24),
(49, 'Salud Mitra', 24),
(50, 'Lualhati', 24),
(51, 'General Luna', 24),
(52, 'Bontoc', 25),
(53, 'La Trinidad', 26),
(54, 'Other Barangays', 27),
(55, 'Tuba', 28),
(56, 'Other Municipalities', 29);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `locationID` int(10) NOT NULL AUTO_INCREMENT,
  `municipality` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `barangayID` int(10) NOT NULL,
  PRIMARY KEY (`locationID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `municipality`, `province`, `barangayID`) VALUES
(1, 'Baguio City', 'Benguet', 1),
(2, 'Baguio City', 'Benguet', 2),
(3, 'Baguio City', 'Benguet', 3),
(4, 'Baguio City', 'Benguet', 4),
(5, 'Baguio City', 'Benguet', 5),
(6, 'Baguio City', 'Benguet', 6),
(7, 'Baguio City', 'Benguet', 7),
(8, 'Baguio City', 'Benguet', 8),
(9, 'Baguio City', 'Benguet', 9),
(10, 'Baguio City', 'Benguet', 10),
(11, 'Baguio City', 'Benguet', 11),
(12, 'Baguio City', 'Benguet', 12),
(13, 'Baguio City', 'Benguet', 13),
(14, 'Baguio City', 'Benguet', 14),
(15, 'Baguio City', 'Benguet', 15),
(16, 'Baguio City', 'Benguet', 16),
(17, 'Baguio City', 'Benguet', 17),
(18, 'Baguio City', 'Benguet', 18),
(19, 'Baguio City', 'Benguet', 19),
(20, 'Baguio City', 'Benguet', 20),
(21, 'Baguio City', 'Benguet', 21),
(22, 'Baguio City', 'Benguet', 22),
(23, 'Baguio City', 'Benguet', 23),
(24, 'Baguio City', 'Benguet', 24),
(25, 'Baguio City', 'Benguet', 25),
(26, 'Baguio City', 'Benguet', 26),
(27, 'Baguio City', 'Benguet', 27),
(28, 'Baguio City', 'Benguet', 28),
(29, 'Baguio City', 'Benguet', 29),
(30, 'Baguio City', 'Benguet', 30),
(31, 'Baguio City', 'Benguet', 31),
(32, 'Baguio City', 'Benguet', 32),
(33, 'Baguio City', 'Benguet', 33),
(34, 'Baguio City', 'Benguet', 34),
(35, 'Baguio City', 'Benguet', 35),
(36, 'Baguio City', 'Benguet', 36),
(37, 'Baguio City', 'Benguet', 37),
(38, 'Baguio City', 'Benguet', 38),
(39, 'Baguio City', 'Benguet', 39),
(40, 'Baguio City', 'Benguet', 40),
(41, 'Baguio City', 'Benguet', 41),
(42, 'Baguio City', 'Benguet', 42),
(43, 'Baguio City', 'Benguet', 43),
(44, 'Baguio City', 'Benguet', 44),
(45, 'Baguio City', 'Benguet', 45),
(46, 'Baguio City', 'Benguet', 46),
(47, 'Baguio City', 'Benguet', 47),
(48, 'Baguio City', 'Benguet', 48),
(49, 'Baguio City', 'Benguet', 49),
(50, 'Baguio City', 'Benguet', 50),
(51, 'Baguio City', 'Benguet', 51);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `logID` int(10) NOT NULL AUTO_INCREMENT,
  `logDate` date NOT NULL,
  `logTime` varchar(150) NOT NULL,
  `activity` varchar(120) NOT NULL,
  `userID` int(10) NOT NULL,
  `receiveID` int(10) DEFAULT NULL,
  `unclaimID` int(10) DEFAULT NULL,
  `releaseID` int(10) DEFAULT NULL,
  `recordID` int(10) DEFAULT NULL,
  PRIMARY KEY (`logID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

DROP TABLE IF EXISTS `receive`;
CREATE TABLE IF NOT EXISTS `receive` (
  `receiveID` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `dateReceived` date NOT NULL,
  `applicant` varchar(120) DEFAULT NULL,
  `sender` varchar(120) DEFAULT NULL,
  `purpose` text,
  `actionslipID` int(10) DEFAULT NULL,
  PRIMARY KEY (`receiveID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receivelocations`
--

DROP TABLE IF EXISTS `receivelocations`;
CREATE TABLE IF NOT EXISTS `receivelocations` (
  `recLocID` int(11) NOT NULL AUTO_INCREMENT,
  `receiveID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL,
  PRIMARY KEY (`recLocID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `recordID` int(10) NOT NULL AUTO_INCREMENT,
  `status` enum('inspection','unclaim','release','archived') NOT NULL,
  `scanFile` varchar(45) DEFAULT NULL,
  `receiveID` int(10) NOT NULL,
  `receiver` varchar(250) DEFAULT NULL,
  `unclaimID` int(10) DEFAULT NULL,
  `releaseDate` date DEFAULT NULL,
  PRIMARY KEY (`recordID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unclaim`
--

DROP TABLE IF EXISTS `unclaim`;
CREATE TABLE IF NOT EXISTS `unclaim` (
  `unclaimID` int(10) NOT NULL AUTO_INCREMENT,
  `dateInspected` date DEFAULT NULL,
  `documentDate` date DEFAULT NULL,
  `inspector` varchar(50) DEFAULT NULL,
  `classification` varchar(120) DEFAULT NULL,
  `subject` text,
  PRIMARY KEY (`unclaimID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `userType` enum('admin','user') NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `firstName`, `lastName`, `userType`) VALUES
(1, 'adminmark', 'admin01', 'Raymark', 'Cuenca', 'admin'),
(2, 'famaepascua', 'user1', 'Fatima Mae', 'Pascua', 'user'),
(3, 'gabinanaman', 'gab02', 'Gab', 'Uy', 'user'),
(4, 'kimpot', 'user3', 'Kimberly', 'Mercado', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
