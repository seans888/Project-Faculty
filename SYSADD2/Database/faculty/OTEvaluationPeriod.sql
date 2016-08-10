-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2016 at 03:36 PM
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
-- Table structure for table `OTEvaluationPeriod`
--

CREATE TABLE IF NOT EXISTS `OTEvaluationPeriod` (
  `period` int(11) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(4) NOT NULL,
  `term` char(1) NOT NULL,
  `midtermfinal` char(1) NOT NULL,
  `active` char(3) NOT NULL,
  PRIMARY KEY (`period`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `OTEvaluationPeriod`
--

INSERT INTO `OTEvaluationPeriod` (`period`, `school_year`, `term`, `midtermfinal`, `active`) VALUES
(4, '2007', '3', 'M', 'No'),
(5, '2007', '3', 'F', 'No'),
(6, '2008', '1', 'M', 'No'),
(7, '2008', '1', 'F', 'No'),
(8, '2008', '2', 'M', 'No'),
(9, '2008', '2', 'F', 'No'),
(10, '2008', '3', 'M', 'No'),
(11, '2008', '3', 'F', 'No'),
(12, '2009', '1', 'M', 'No'),
(13, '2009', '1', 'F', 'No'),
(14, '2009', '2', 'M', 'No'),
(15, '2009', '2', 'F', 'No'),
(16, '2009', '3', 'M', 'No'),
(17, '2009', '3', 'F', 'No'),
(18, '2010', '1', 'M', 'No'),
(19, '2010', '1', 'F', 'No'),
(20, '2010', '2', 'M', 'No'),
(21, '2010', '2', 'F', 'No'),
(22, '2010', '3', 'M', 'No'),
(23, '2010', '3', 'F', 'No'),
(24, '2011', '1', 'M', 'No'),
(25, '2011', '1', 'F', 'No'),
(26, '2011', '2', 'M', 'No'),
(27, '2011', '2', 'F', 'No'),
(28, '2011', '3', 'M', 'No'),
(29, '2011', '3', 'F', 'No'),
(30, '2012', '1', 'M', 'No'),
(31, '2012', '1', 'F', 'No'),
(32, '2012', '2', 'M', 'No'),
(33, '2012', '2', 'F', 'No'),
(34, '2012', '3', 'M', 'No'),
(35, '2012', '3', 'F', 'No'),
(36, '2013', '1', 'M', 'No'),
(37, '2013', '1', 'F', 'No'),
(38, '2013', '2', 'M', 'No'),
(39, '2013', '2', 'F', 'No'),
(40, '2013', '3', 'M', 'No'),
(41, '2013', '3', 'F', 'No'),
(42, '2014', '1', 'M', 'No'),
(43, '2014', '1', 'F', 'No'),
(44, '2014', '2', 'M', 'No'),
(45, '2014', '2', 'F', 'No'),
(46, '2014', '3', 'M', 'No'),
(47, '2014', '3', 'F', 'No'),
(48, '2015', '1', 'M', 'No'),
(49, '2015', '1', 'F', 'No'),
(50, '2015', '2', 'M', 'No'),
(51, '2015', '2', 'F', 'No'),
(52, '2015', '3', 'M', 'Yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
