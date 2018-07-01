-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 02:21 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `barangayID` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `folderNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` int(10) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `barangayID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` int(10) NOT NULL,
  `logDate` date NOT NULL,
  `logTime` time NOT NULL,
  `activity` varchar(120) NOT NULL,
  `userID` int(10) NOT NULL,
  `receiveID` int(10) DEFAULT NULL,
  `unclaimID` int(10) DEFAULT NULL,
  `releaseID` int(10) DEFAULT NULL,
  `recordID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `receiveID` int(10) NOT NULL,
  `code` varchar(20) NOT NULL,
  `dateReceived` date NOT NULL,
  `applicant` varchar(120) DEFAULT NULL,
  `sender` varchar(120) DEFAULT NULL,
  `purpose` text,
  `locationID` int(10) DEFAULT NULL,
  `actionslipID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `recordID` int(10) NOT NULL,
  `status` enum('inspection','unclaim','release') NOT NULL,
  `scanFile` varchar(45) NOT NULL,
  `receiveID` int(10) NOT NULL,
  `unclaimID` int(10) NOT NULL,
  `releaseID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `release`
--

CREATE TABLE `release` (
  `releaseID` int(10) NOT NULL,
  `releaseDate` date NOT NULL,
  `receiveID` int(10) NOT NULL,
  `unclaimID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unclaim`
--

CREATE TABLE `unclaim` (
  `unclaimID` int(10) NOT NULL,
  `dateInspected` date DEFAULT NULL,
  `documentDate` date DEFAULT NULL,
  `inspector` varchar(50) DEFAULT NULL,
  `classification` varchar(120) DEFAULT NULL,
  `subject` text,
  `receiveID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `userType` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`barangayID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`receiveID`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`recordID`);

--
-- Indexes for table `release`
--
ALTER TABLE `release`
  ADD PRIMARY KEY (`releaseID`);

--
-- Indexes for table `unclaim`
--
ALTER TABLE `unclaim`
  ADD PRIMARY KEY (`unclaimID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `barangayID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receive`
--
ALTER TABLE `receive`
  MODIFY `receiveID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `recordID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `release`
--
ALTER TABLE `release`
  MODIFY `releaseID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unclaim`
--
ALTER TABLE `unclaim`
  MODIFY `unclaimID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
