-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 02:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
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
  `isActive` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`ID`, `name`, `address`, `district`, `pincode`, `designation`, `gender`, `dob`, `qualification`, `martial_status`, `image`, `isActive`) VALUES
(1, 'Nengkhoiba', '', '', 0, '', '', '0', '', 0, '', b'0'),
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
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_login`
--

INSERT INTO `emp_login` (`ID`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `ID` int(125) NOT NULL AUTO_INCREMENT,
  `log_name` varchar(200) NOT NULL,
  `log_detail` varchar(500) NOT NULL,
  `ipaddress` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `datetime` timestamp NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_table`
--

CREATE TABLE IF NOT EXISTS `page_table` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `category` int(10) NOT NULL,
  `sub_category` int(10) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_icon` varchar(100) NOT NULL,
  `page_slug` varchar(500) NOT NULL,
  `page_view` varchar(200) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `page_table`
--

INSERT INTO `page_table` (`ID`, `category`, `sub_category`, `page_title`, `page_icon`, `page_slug`, `page_view`, `isActive`) VALUES
(1, 1, 0, 'Regstration', 'fa fa-user', 'adkjfhbkjahkjdfhkjahkjdj862w862kshdkj', 'admin/register', 1),
(2, 2, 0, 'Setting', 'fa fa-gear', 'sgfajksgdjgalknadl97812jg', 'admin/setting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(200) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID`, `role`, `isActive`) VALUES
(1, 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_manager`
--

CREATE TABLE IF NOT EXISTS `site_manager` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) NOT NULL,
  `page_id` int(10) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `site_manager`
--

INSERT INTO `site_manager` (`ID`, `role_id`, `page_id`, `isActive`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@bank.com', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
