-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 01:45 PM
-- Server version: 5.6.25
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `ID` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `ID` int(10) NOT NULL,
  `title` int(200) NOT NULL,
  `description` int(200) NOT NULL,
  `added_on` timestamp NOT NULL,
  `added_by` int(10) NOT NULL,
  `modified_on` timestamp NOT NULL,
  `modified_by` int(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `ID` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `ID` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `district` varchar(200) NOT NULL,
  `pincode` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `martial_status` int(11) NOT NULL,
  `image` varchar(10000) NOT NULL,
  `isActive` bit(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`ID`, `name`, `address`, `district`, `pincode`, `designation`, `gender`, `dob`, `qualification`, `martial_status`, `image`, `isActive`) VALUES
(1, 'Nengkhoiba chungkham', 'Brahmapur chungkham leikai', '2', 795001, 'admin', '1', '15-12-1990', 'BE', 2, '', b'1'),
(2, 'dsad', 'dasd', '1', 1, 'dasd', '1', 'dsads', 'sadsad', 1, '1534320895_Roshni kumar.jpg', b'0'),
(3, 'dsad', 'dsads', '1', 3213213, 'dassadsad', '2', 'dsadsad', 'dsadsadsad', 1, '1534320850_Roshni kumar.jpg', b'0'),
(4, 'sa', 'a', '1', 32132132, '32132aSAs', '1', 'a', 'saSAsa', 1, '1534321909_incoteLogo.png', b'1'),
(5, 'dsadsa', 'ds', '1', 1, 'dsadsad', '1', 'dsadsad', 'dsadsad', 1, '1534321973_Fisher (1).jpg', b'0'),
(6, 'dsadsad', 'a', '2', 1, 'a', '1', 'dsadsa', 'a', 1, '1534322015_banner11.jpg', b'0'),
(7, 'qq', 'dsadsad', '2', 1, 'dsadsad', '1', 'sdadsad', 'dsadsad', 1, '1534335846_banner21.jpg', b'1'),
(8, 'Test', 'Address', '2', 1, 'dsadsad', '2', 'dsadsaaaaa', 'dsadsad', 3, '1534323009_banner11.jpg', b'1'),
(9, 'dsadsa', 'dsadsad', '1', 111111, 'dsadsad', '1', 'dsadsa', 'dsadsad', 2, '1534324130_Roshni kumar.jpg', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `emp_login`
--

CREATE TABLE IF NOT EXISTS `emp_login` (
  `ID` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `keycode` varchar(300) NOT NULL,
  `role_id` int(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_login`
--

INSERT INTO `emp_login` (`ID`, `username`, `password`, `keycode`, `role_id`, `isActive`) VALUES
(1, 'admin@bank.com', '1', 'kjsagisgiagjks', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `ID` int(125) NOT NULL,
  `log_name` varchar(200) NOT NULL,
  `log_detail` varchar(500) NOT NULL,
  `ipaddress` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `datetime` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_table`
--

CREATE TABLE IF NOT EXISTS `page_table` (
  `ID` int(10) NOT NULL,
  `category` int(10) NOT NULL,
  `sub_category` int(10) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_icon` varchar(100) NOT NULL,
  `page_slug` varchar(500) NOT NULL,
  `page_view` varchar(200) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_table`
--

INSERT INTO `page_table` (`ID`, `category`, `sub_category`, `page_title`, `page_icon`, `page_slug`, `page_view`, `isActive`) VALUES
(1, 1, 0, 'Employee Registration', 'fa fa-pie-chart', 'vgfrdajqnmlkouytrmq6qk9mkajht', 'admin/employee', 1),
(2, 2, 0, 'Page Manager', 'fa fa-gear', 'jyausyauytsuyabsiuioquoisu878qbsqh', 'admin/pagemanager', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `ID` int(10) NOT NULL,
  `role` varchar(200) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID`, `role`, `isActive`) VALUES
(1, 'ADMIN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_manager`
--

CREATE TABLE IF NOT EXISTS `site_manager` (
  `ID` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `page_id` int(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_manager`
--

INSERT INTO `site_manager` (`ID`, `role_id`, `page_id`, `isActive`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `ID` int(10) NOT NULL,
  `country_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@bank.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emp_login`
--
ALTER TABLE `emp_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `page_table`
--
ALTER TABLE `page_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `site_manager`
--
ALTER TABLE `site_manager`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `emp_login`
--
ALTER TABLE `emp_login`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_table`
--
ALTER TABLE `page_table`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_manager`
--
ALTER TABLE `site_manager`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
