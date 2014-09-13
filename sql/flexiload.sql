-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2014 at 11:17 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flexiload`
--

-- --------------------------------------------------------

--
-- Table structure for table `statement`
--

CREATE TABLE IF NOT EXISTS `statement` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `userid` int(9) NOT NULL,
  `balance` decimal(6,2) NOT NULL,
  `addedby` varchar(100) COLLATE utf8_bin NOT NULL,
  `sdate` date NOT NULL,
  `action` varchar(9) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `statement`
--

INSERT INTO `statement` (`id`, `userid`, `balance`, `addedby`, `sdate`, `action`) VALUES
(1, 3, '100.00', '', '2014-09-13', 'add'),
(2, 3, '100.00', '', '2014-09-13', 'add'),
(3, 3, '300.00', '', '2014-09-13', 'add');

-- --------------------------------------------------------

--
-- Table structure for table `usercredential`
--

CREATE TABLE IF NOT EXISTS `usercredential` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone` varchar(100) COLLATE utf8_bin NOT NULL,
  `gender` char(100) COLLATE utf8_bin NOT NULL,
  `sdate` date NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usercredential`
--

INSERT INTO `usercredential` (`id`, `username`, `password`, `phone`, `gender`, `sdate`, `balance`) VALUES
(2, 'jewel', '1234', '5555', 'male', '2014-09-13', '0.00'),
(3, 'miru', '12345', '6666', 'female', '2014-09-13', '500.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
