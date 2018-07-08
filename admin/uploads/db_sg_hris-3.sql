-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2018 at 09:11 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sg_hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `sg_abs_id` int(11) NOT NULL,
  `sg_em_id` int(255) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `sg_abs_date` date DEFAULT NULL,
  `sg_abs_day` date DEFAULT NULL,
  `sg_abs_reason` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'Pending',
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`sg_abs_id`, `sg_em_id`, `firstname`, `middlename`, `lastname`, `sg_abs_date`, `sg_abs_day`, `sg_abs_reason`, `type`, `status`) VALUES
(20, 70000, 'tristan', 'camalao', 'villareal', '2018-06-15', '2018-06-16', NULL, 'Valid', NULL),
(23, 40000, 'lurin', 'manzano', 'padawan', '2018-06-15', '2018-06-16', NULL, 'Valid', NULL),
(24, 40000, 'lurin', 'manzano', 'padawan', '2018-06-15', '2018-06-16', NULL, 'Pending', NULL),
(25, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-15', '2018-06-21', NULL, 'Pending', NULL),
(26, 70000, 'tristan', 'camalao', 'villareal', '2018-06-15', '2018-06-16', NULL, 'Invalid', NULL),
(27, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-15', '2018-06-16', NULL, 'Pending', NULL),
(28, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-15', '2018-06-16', NULL, 'Pending', NULL),
(29, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-15', '2018-06-23', NULL, 'Pending', NULL),
(30, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-15', '2018-06-26', NULL, 'Pending', NULL),
(31, 40000, 'lurin', 'manzano', 'padawan', '2018-06-15', '2018-06-16', NULL, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `pid` int(11) NOT NULL,
  `postmes` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`pid`, `postmes`, `comment`) VALUES
(1, 'fdsfrgw', NULL),
(3, 'hullo', NULL),
(4, 'hello', NULL),
(7, 'hello', NULL),
(8, 'hello', NULL),
(9, 'bb', NULL),
(10, 'hello', NULL),
(11, 'hello', NULL),
(12, 'hi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commendation`
--

CREATE TABLE `commendation` (
  `sg_comm_id` int(11) NOT NULL,
  `sg_em_id` int(255) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `sg_comm_date` date DEFAULT NULL,
  `sg_comm_nature` varchar(255) DEFAULT NULL,
  `sg_comm_num` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commendation`
--

INSERT INTO `commendation` (`sg_comm_id`, `sg_em_id`, `firstname`, `middlename`, `lastname`, `sg_comm_date`, `sg_comm_nature`, `sg_comm_num`) VALUES
(5, 345, 'ab', 'sc', 'bn', '2018-06-12', 'good', 1),
(6, 345, 'ab', 'sc', 'bn', '2018-06-13', 'saasdada', 2),
(7, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-14', 'asdwwa', 1),
(8, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-15', 'very good', 2);

-- --------------------------------------------------------

--
-- Table structure for table `company_accounts`
--

CREATE TABLE `company_accounts` (
  `acc_id` int(11) NOT NULL,
  `acc_desc` varchar(250) NOT NULL,
  `acc_acro` varchar(50) DEFAULT NULL,
  `acc_parent_id` int(11) NOT NULL DEFAULT '0',
  `sg_em_id` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_accounts`
--

INSERT INTO `company_accounts` (`acc_id`, `acc_desc`, `acc_acro`, `acc_parent_id`, `sg_em_id`) VALUES
(1, 'Syner G', '', 0, NULL),
(2, 'The Spot', 'TS', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_positions`
--

CREATE TABLE `company_positions` (
  `pos_id` int(11) NOT NULL,
  `pos_desc` varchar(75) NOT NULL,
  `sg_em_id` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_positions`
--

INSERT INTO `company_positions` (`pos_id`, `pos_desc`, `sg_em_id`) VALUES
(1, 'President', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `sg_leave_id` int(11) NOT NULL,
  `sg_em_id` int(100) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `sg_leave_start` date DEFAULT NULL,
  `sg_leave_end` date DEFAULT NULL,
  `sg_leave_account` varchar(255) DEFAULT NULL,
  `sg_leave_type` int(12) DEFAULT NULL COMMENT '1=sick; 2=vacation; 3=bereavement; 4=pubholiday; 5=patmat; 6=emergency; 7=priv; 8=personal; 9=forcemajeure; 10=admin; 11=rehab; 12=family',
  `sg_leave_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`sg_leave_id`, `sg_em_id`, `firstname`, `middlename`, `lastname`, `sg_leave_start`, `sg_leave_end`, `sg_leave_account`, `sg_leave_type`, `sg_leave_remark`) VALUES
(2, 0, NULL, NULL, NULL, '2018-06-24', '2018-06-28', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resign`
--

CREATE TABLE `resign` (
  `sg_res_id` int(11) NOT NULL,
  `sg_em_id` int(255) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `sg_res_date` date DEFAULT NULL,
  `sg_res_day` date DEFAULT NULL,
  `sg_res_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resign`
--

INSERT INTO `resign` (`sg_res_id`, `sg_em_id`, `firstname`, `middlename`, `lastname`, `sg_res_date`, `sg_res_day`, `sg_res_remark`) VALUES
(4, 654, 'kath', 'nbm', 'arbo', '2018-06-13', '2018-06-15', 'wer');

-- --------------------------------------------------------

--
-- Table structure for table `sanction`
--

CREATE TABLE `sanction` (
  `sg_sanc_id` int(11) NOT NULL,
  `sg_em_id` int(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `sg_sanc_date` date DEFAULT NULL,
  `sg_sanc_num` int(255) DEFAULT NULL,
  `sg_sanc_nature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanction`
--

INSERT INTO `sanction` (`sg_sanc_id`, `sg_em_id`, `firstname`, `middlename`, `lastname`, `sg_sanc_date`, `sg_sanc_num`, `sg_sanc_nature`) VALUES
(218, 345, 'ab', 'sc', 'bn', '2018-06-12', 3, 'late'),
(222, 345, 'ab', 'sc', 'bn', '2018-06-13', 2, 'qadsa'),
(223, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-14', 1, 'late'),
(224, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-14', 1, 'Late'),
(225, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-14', 1, 'LIE'),
(226, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-14', 3, 'late'),
(227, 21011, 'Klarize', 'Rodriguez', 'Abeya', '2018-06-15', 5, 'sadasd');

-- --------------------------------------------------------

--
-- Table structure for table `suspend`
--

CREATE TABLE `suspend` (
  `sg_sus_id` int(11) NOT NULL,
  `sg_em_id` int(255) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `sg_sus_date` date DEFAULT NULL,
  `sg_sus_day` date DEFAULT NULL,
  `sg_sus_remark` varchar(255) DEFAULT NULL,
  `sg_sus_nature` varchar(255) DEFAULT NULL,
  `sg_sus_num` int(100) DEFAULT NULL,
  `sg_sus_daysu` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suspend`
--

INSERT INTO `suspend` (`sg_sus_id`, `sg_em_id`, `firstname`, `middlename`, `lastname`, `sg_sus_date`, `sg_sus_day`, `sg_sus_remark`, `sg_sus_nature`, `sg_sus_num`, `sg_sus_daysu`) VALUES
(3, 789, 'tristan', 'qwerty', 'abeya', '2018-06-13', '2018-06-14', 'wea', 'asda', 1, NULL),
(4, 143, 'klarize', 'ab', 'abeya', '2018-06-13', '2018-06-14', 'awd', 'sda', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `termination`
--

CREATE TABLE `termination` (
  `sg_ter_id` int(11) NOT NULL,
  `sg_em_id` int(255) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `sg_ter_date` date DEFAULT NULL,
  `sg_ter_day` date DEFAULT NULL,
  `sg_ter_remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `termination`
--

INSERT INTO `termination` (`sg_ter_id`, `sg_em_id`, `firstname`, `middlename`, `lastname`, `sg_ter_date`, `sg_ter_day`, `sg_ter_remark`) VALUES
(4, 123, 'jen', 'narzabal', 'ocado', '2018-06-13', '2018-06-14', 'sdadsa');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `sg_cred_id` int(11) NOT NULL,
  `sg_username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `sg_password` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `sg_status` int(1) NOT NULL DEFAULT '0',
  `sg_user_type` int(1) NOT NULL DEFAULT '1' COMMENT '1=user; 2=admin; 3=super admin',
  `sg_em_id` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`sg_cred_id`, `sg_username`, `sg_password`, `sg_status`, `sg_user_type`, `sg_em_id`) VALUES
(1, 'devadmin', 'devadmin', 1, 3, 0),
(4, 'admin', '123', 1, 2, 0),
(5, 'user', 'user', 1, 1, 21011),
(6, 'user1', '123', 1, 1, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `user_other_info`
--

CREATE TABLE `user_other_info` (
  `sg_cred_id` int(11) NOT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_num` int(11) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `dependents` text,
  `sg_em_id` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_positions`
--

CREATE TABLE `user_positions` (
  `sg_cred_id` int(11) NOT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `date_terminated` date DEFAULT NULL,
  `termination_reason` text,
  `sg_em_id` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_positions`
--

INSERT INTO `user_positions` (`sg_cred_id`, `acc_id`, `pos_id`, `date_hired`, `date_terminated`, `termination_reason`, `sg_em_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_cred_id` int(11) NOT NULL,
  `sg_em_id` int(45) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `civil_status` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `citizenship` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `city_address` varchar(255) DEFAULT NULL,
  `provincial_address` varchar(255) DEFAULT NULL,
  `cp_num` varchar(30) DEFAULT NULL,
  `tel_num` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_cred_id`, `sg_em_id`, `firstname`, `middlename`, `lastname`, `civil_status`, `gender`, `age`, `birthdate`, `birthplace`, `citizenship`, `nationality`, `religion`, `city_address`, `provincial_address`, `cp_num`, `tel_num`, `email`) VALUES
(1, 123, 'Dev', '', 'Admin', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 21011, 'Klarize', 'Rodriguez', 'Abeya', 'Single', 'Female', 18, '1996-01-26', 'trinidad', 'filipino', 'filipino', 'Roman catholic', '1331 munoz drive, Baguio city', 'n/a', '0916-665-3939', 'n/a', 'one@gmail.com'),
(3, 210000, 'erika', 'cachero', 'hirai', 'married', 'female', 35, '2015-08-11', 'labrador', 'korean', 'korean', 'catholic', 'royal', 'labrador', '09111111111', 'n/a', 'jirai@yahoo.com'),
(4, 20000, 'kathleen', 'gorge', 'arbolente', 'single', 'female', 21, '2017-10-09', 'zambales', 'filipino', 'filipino', 'muslim', 'aurora', 'zambales', '0922222222', 'n/a', 'kathkath@gmail.com'),
(5, 30000, 'brent', 'caballa', 'ried', 'widowed', 'male', 45, '2017-02-15', 'pangasinan', 'filipino', 'filipino', 'roman catholic', 'bakakeng', 'pangasinan', '09834567541', 'n/a', 'brent@gmail.com'),
(6, 40000, 'lurin', 'manzano', 'padawan', 'single', 'female', 22, '2017-12-21', 'baguio', 'filipino', 'filipino', 'cathoic', 'baguio', 'n/a', '0977777453', 'n/a', 'lurin@yahoo.com'),
(7, 70000, 'tristan', 'camalao', 'villareal', 'married', 'male', 23, '2017-03-07', 'baguio', 'filipino', 'filipino', 'catholic', 'baguio', 'n/a', '09666789452', 'n/a', 'triti@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_numbers`
--

CREATE TABLE `user_profile_numbers` (
  `sg_cred_id` int(11) NOT NULL,
  `pnb_num` int(11) DEFAULT NULL,
  `sss_num` int(11) DEFAULT NULL,
  `tin_num` int(11) DEFAULT NULL,
  `phil_num` int(11) DEFAULT NULL,
  `pag_num` int(11) DEFAULT NULL,
  `sg_em_id` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_numbers`
--

INSERT INTO `user_profile_numbers` (`sg_cred_id`, `pnb_num`, `sss_num`, `tin_num`, `phil_num`, `pag_num`, `sg_em_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`sg_abs_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `commendation`
--
ALTER TABLE `commendation`
  ADD PRIMARY KEY (`sg_comm_id`);

--
-- Indexes for table `company_accounts`
--
ALTER TABLE `company_accounts`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `acc_desc` (`acc_desc`),
  ADD UNIQUE KEY `acc_acro` (`acc_acro`);

--
-- Indexes for table `company_positions`
--
ALTER TABLE `company_positions`
  ADD PRIMARY KEY (`pos_id`),
  ADD UNIQUE KEY `pos_desc` (`pos_desc`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`sg_leave_id`);

--
-- Indexes for table `resign`
--
ALTER TABLE `resign`
  ADD PRIMARY KEY (`sg_res_id`);

--
-- Indexes for table `sanction`
--
ALTER TABLE `sanction`
  ADD PRIMARY KEY (`sg_sanc_id`);

--
-- Indexes for table `suspend`
--
ALTER TABLE `suspend`
  ADD PRIMARY KEY (`sg_sus_id`);

--
-- Indexes for table `termination`
--
ALTER TABLE `termination`
  ADD PRIMARY KEY (`sg_ter_id`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`sg_cred_id`),
  ADD UNIQUE KEY `sg_username` (`sg_username`);

--
-- Indexes for table `user_other_info`
--
ALTER TABLE `user_other_info`
  ADD PRIMARY KEY (`sg_cred_id`);

--
-- Indexes for table `user_positions`
--
ALTER TABLE `user_positions`
  ADD PRIMARY KEY (`sg_cred_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_cred_id`);

--
-- Indexes for table `user_profile_numbers`
--
ALTER TABLE `user_profile_numbers`
  ADD PRIMARY KEY (`sg_cred_id`),
  ADD UNIQUE KEY `pnb_num` (`pnb_num`),
  ADD UNIQUE KEY `tin_num` (`tin_num`),
  ADD UNIQUE KEY `sss_num` (`sss_num`),
  ADD UNIQUE KEY `phil_num` (`phil_num`),
  ADD UNIQUE KEY `pag_num` (`pag_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `sg_abs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `commendation`
--
ALTER TABLE `commendation`
  MODIFY `sg_comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `company_accounts`
--
ALTER TABLE `company_accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company_positions`
--
ALTER TABLE `company_positions`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `sg_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `resign`
--
ALTER TABLE `resign`
  MODIFY `sg_res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sanction`
--
ALTER TABLE `sanction`
  MODIFY `sg_sanc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table `suspend`
--
ALTER TABLE `suspend`
  MODIFY `sg_sus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `termination`
--
ALTER TABLE `termination`
  MODIFY `sg_ter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_credentials`
--
ALTER TABLE `user_credentials`
  MODIFY `sg_cred_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_other_info`
--
ALTER TABLE `user_other_info`
  MODIFY `sg_cred_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_positions`
--
ALTER TABLE `user_positions`
  MODIFY `sg_cred_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `user_cred_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_profile_numbers`
--
ALTER TABLE `user_profile_numbers`
  MODIFY `sg_cred_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
