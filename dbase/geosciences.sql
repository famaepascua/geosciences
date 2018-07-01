-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2018 at 10:41 PM
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
-- Table structure for table `actionslip`
--

CREATE TABLE `actionslip` (
  `actionslipID` int(10) NOT NULL,
  `action` varchar(200) DEFAULT NULL,
  `actionDesired` varchar(200) DEFAULT NULL,
  `oicrd` varchar(120) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `barangayID` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `folderNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `logDate`, `logTime`, `activity`, `userID`, `receiveID`, `unclaimID`, `releaseID`, `recordID`) VALUES
(1, '0000-00-00', '00:00:00', '', 1, NULL, NULL, NULL, NULL),
(2, '0000-00-00', '00:00:00', '', 1, NULL, NULL, NULL, NULL),
(3, '0000-00-00', '00:00:00', '', 1, NULL, NULL, NULL, NULL),
(4, '0000-00-00', '00:00:00', '', 1, NULL, NULL, NULL, NULL),
(5, '0000-00-00', '00:00:00', '', 1, NULL, NULL, NULL, NULL),
(6, '0000-00-00', '00:00:00', '', 1, NULL, NULL, NULL, NULL),
(7, '0000-00-00', '00:00:00', '', 1, NULL, NULL, NULL, NULL);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `firstName`, `lastName`, `userType`) VALUES
(1, 'adminmark', 'admin01', 'Raymark', 'Cuenca', 'admin'),
(2, 'famaepascua', 'user1', 'Fatima Mae', 'Pascua', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actionslip`
--
ALTER TABLE `actionslip`
  ADD PRIMARY KEY (`actionslipID`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`barangayID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`),
  ADD KEY `barangay` (`barangayID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `user` (`userID`),
  ADD KEY `received_docu` (`receiveID`),
  ADD KEY `release_docu` (`releaseID`),
  ADD KEY `unclaim_docu` (`unclaimID`),
  ADD KEY `record` (`recordID`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`receiveID`),
  ADD KEY `location` (`locationID`),
  ADD KEY `action_slip` (`actionslipID`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`recordID`),
  ADD KEY `received` (`receiveID`),
  ADD KEY `unclaimed` (`unclaimID`),
  ADD KEY `release` (`releaseID`);

--
-- Indexes for table `release`
--
ALTER TABLE `release`
  ADD PRIMARY KEY (`releaseID`),
  ADD KEY `unclaimed_doc` (`unclaimID`),
  ADD KEY `received_doc` (`receiveID`);

--
-- Indexes for table `unclaim`
--
ALTER TABLE `unclaim`
  ADD PRIMARY KEY (`unclaimID`),
  ADD KEY `received_docs` (`receiveID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actionslip`
--
ALTER TABLE `actionslip`
  MODIFY `actionslipID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `barangayID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `barangay` FOREIGN KEY (`barangayID`) REFERENCES `barangay` (`barangayID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `received_docu` FOREIGN KEY (`receiveID`) REFERENCES `receive` (`receiveID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `record` FOREIGN KEY (`recordID`) REFERENCES `records` (`recordID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `release_docu` FOREIGN KEY (`releaseID`) REFERENCES `release` (`releaseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unclaim_docu` FOREIGN KEY (`unclaimID`) REFERENCES `unclaim` (`unclaimID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receive`
--
ALTER TABLE `receive`
  ADD CONSTRAINT `action_slip` FOREIGN KEY (`actionslipID`) REFERENCES `actionslip` (`actionslipID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `location` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `received` FOREIGN KEY (`receiveID`) REFERENCES `receive` (`receiveID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `release` FOREIGN KEY (`releaseID`) REFERENCES `release` (`releaseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unclaimed` FOREIGN KEY (`unclaimID`) REFERENCES `unclaim` (`unclaimID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `release`
--
ALTER TABLE `release`
  ADD CONSTRAINT `received_doc` FOREIGN KEY (`receiveID`) REFERENCES `receive` (`receiveID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `unclaimed_doc` FOREIGN KEY (`unclaimID`) REFERENCES `unclaim` (`unclaimID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `unclaim`
--
ALTER TABLE `unclaim`
  ADD CONSTRAINT `received_docs` FOREIGN KEY (`receiveID`) REFERENCES `receive` (`receiveID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
