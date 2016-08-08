-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2016 at 03:37 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `AHR`
--

-- --------------------------------------------------------

--
-- Table structure for table `OTEvaluationRatings`
--

CREATE TABLE IF NOT EXISTS `OTEvaluationRatings` (
  `period` int(11) NOT NULL,
  `stud_id` varchar(20) NOT NULL,
  `item_id` tinyint(4) NOT NULL,
  `target_id` varchar(20) NOT NULL,
  `subject_code` varchar(39) NOT NULL,
  `section` varchar(39) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `remarks` varchar(10000) NOT NULL,
  PRIMARY KEY (`period`,`stud_id`,`item_id`,`target_id`,`subject_code`,`section`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
