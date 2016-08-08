-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2016 at 03:39 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `AREG`
--

-- --------------------------------------------------------

--
-- Table structure for table `Subject`
--

CREATE TABLE IF NOT EXISTS `Subject` (
  `subject_id` int(5) NOT NULL AUTO_INCREMENT,
  `term_id` int(11) NOT NULL DEFAULT '1',
  `subject_code` varchar(10) NOT NULL DEFAULT '',
  `subject_name` varchar(100) NOT NULL,
  `subject_description` varchar(50000) NOT NULL,
  `unit` decimal(2,1) NOT NULL DEFAULT '0.0',
  `pay_unit` decimal(2,1) NOT NULL,
  `compute_GPA` char(1) DEFAULT NULL,
  `lab_id` varchar(1) DEFAULT NULL,
  `group_owner` varchar(25) DEFAULT NULL,
  `evaluate_OTE` char(1) DEFAULT NULL,
  `is_elective` char(1) DEFAULT NULL,
  `grade_type` char(1) DEFAULT NULL,
  `accept_substitute` char(1) DEFAULT NULL,
  `lab_type_id` char(1) DEFAULT NULL,
  `dept_id` int(5) NOT NULL DEFAULT '0',
  `category` tinyint(4) NOT NULL,
  `assess_note` varchar(255) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Subject' AUTO_INCREMENT=1559 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
