-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2016 at 03:38 PM
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
-- Table structure for table `OTEvaluationResultsPerSection`
--

CREATE TABLE IF NOT EXISTS `OTEvaluationResultsPerSection` (
  `period` int(11) NOT NULL,
  `target_id` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `evaluators` int(11) NOT NULL,
  `final_grade` varchar(10) NOT NULL,
  PRIMARY KEY (`period`,`target_id`,`subject_code`,`section`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
