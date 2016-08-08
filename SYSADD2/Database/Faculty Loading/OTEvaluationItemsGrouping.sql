-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2016 at 03:35 PM
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
-- Table structure for table `OTEvaluationItemsGrouping`
--

CREATE TABLE IF NOT EXISTS `OTEvaluationItemsGrouping` (
  `group_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50000) NOT NULL,
  `weight` tinyint(4) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `OTEvaluationItemsGrouping`
--

INSERT INTO `OTEvaluationItemsGrouping` (`group_id`, `group_name`, `weight`, `class_id`) VALUES
(4, '1. Knowledge of the Subject Matter', 25, NULL),
(5, '2. Instructional Presentation ', 20, NULL),
(6, '3. Class Management', 20, NULL),
(7, '4. Feedback Mechanism', 20, NULL),
(8, '5. Interpersonal Skills', 15, NULL),
(9, '1. Knowledge of the subject matter', 25, 1),
(10, '2. Instructional Presentation', 20, 1),
(11, '3. Class Management', 20, 1),
(12, '4. Feedback Mechanism', 20, 1),
(13, '5. Interpersonal Skills', 15, 1),
(14, '1. Knowledge of the subject matter', 25, 2),
(15, '2. Instructional Presentation', 20, 2),
(16, '3. Class Management', 20, 2),
(17, '4. Feedback Mechanism', 20, 2),
(18, '5. Interpersonal Skills', 15, 2),
(19, '1. Knowledge of the subject matter', 25, 3),
(20, '2. Instructional Presentation', 20, 3),
(21, '3. Class Management', 20, 3),
(22, '4. Feedback Mechanism', 20, 3),
(23, '5. Interpersonal Skills', 15, 3),
(24, '1. Knowledge of the subject matter', 25, 4),
(25, '2. Instructional Presentation', 20, 4),
(26, '3. Class Management', 20, 4),
(27, '4. Feedback Mechanism', 20, 4),
(28, '5. Interpersonal Skills', 15, 4),
(29, '1. Knowledge of the subject matter', 25, 5),
(30, '2. Instructional Presentation', 20, 5),
(31, '3. Class Management', 20, 5),
(32, '4. Feedback Mechanism', 20, 5),
(33, '5. Interpersonal Skills', 15, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
