-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 12:14 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `availability_id` int(10) NOT NULL,
  `emp_id` char(10) NOT NULL,
  `day` enum('MON','TUE','WED','THU','FRI','SAT') NOT NULL,
  `start_time` enum('07:30am','09:30am','11:30am','01:30pm','03:30pm','05:30pm') NOT NULL,
  `end_time` enum('09:30am','11:30am','01:30pm','03:30pm','05:30pm','07:30pm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`availability_id`, `emp_id`, `day`, `start_time`, `end_time`) VALUES
(2, '2017-00001', 'MON', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cobalt_reporter`
--

CREATE TABLE `cobalt_reporter` (
  `module_name` varchar(255) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `show_field` blob NOT NULL,
  `operator` blob NOT NULL,
  `text_field` blob NOT NULL,
  `sum_field` blob NOT NULL,
  `count_field` blob NOT NULL,
  `group_field1` blob NOT NULL,
  `group_field2` blob NOT NULL,
  `group_field3` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cobalt_sst`
--

CREATE TABLE `cobalt_sst` (
  `auto_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `config_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` char(10) NOT NULL,
  `emp_last_name` varchar(25) NOT NULL,
  `emp_first_name` varchar(30) NOT NULL,
  `emp_middle_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `emp_status` int(5) NOT NULL,
  `emp_group` int(5) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` char(4) NOT NULL,
  `tel_num` varchar(40) NOT NULL,
  `mobile_num` char(15) NOT NULL,
  `hiring_date` date DEFAULT NULL,
  `resignation_date` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `civil_status` enum('Single','Married','Legally Separated','Single Parent') DEFAULT 'Single',
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `is_deleted` enum('Yes','No') DEFAULT 'No',
  `ATM_num` varchar(25) NOT NULL,
  `BDO_ATM_num` varchar(25) NOT NULL,
  `SSS_num` varchar(25) NOT NULL,
  `PhilHealth_num` varchar(25) NOT NULL,
  `TIN_num` varchar(25) NOT NULL,
  `PagIbig_num` varchar(25) NOT NULL,
  `specialization_id` int(10) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `availability_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Master List of Employees in APC';

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_last_name`, `emp_first_name`, `emp_middle_name`, `email`, `emp_status`, `emp_group`, `address`, `postal_code`, `tel_num`, `mobile_num`, `hiring_date`, `resignation_date`, `gender`, `civil_status`, `birth_date`, `birth_place`, `religion`, `is_deleted`, `ATM_num`, `BDO_ATM_num`, `SSS_num`, `PhilHealth_num`, `TIN_num`, `PagIbig_num`, `specialization_id`, `tag_id`, `availability_id`) VALUES
('2017-00001', 'Alfafara', 'Von', 'Sogocio', 'alfafara.vm@gmail.com', 2, 2, '2', '2', '2', '2', '2018-03-20', '2018-03-20', 'Male', 'Married', '2017-03-16', '2', '2', 'No', '2', '2', '2', '2', '2', '2', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facultyload`
--

CREATE TABLE `facultyload` (
  `load_id` int(11) NOT NULL,
  `emp_id` char(10) NOT NULL,
  `subject_offering_id` int(5) DEFAULT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Faculty Load Effectivity Date';

--
-- Dumping data for table `facultyload`
--

INSERT INTO `facultyload` (`load_id`, `emp_id`, `subject_offering_id`, `date`) VALUES
(20153, '2017-00001', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `otevaluationresultspersection`
--

CREATE TABLE `otevaluationresultspersection` (
  `emp_id` char(10) NOT NULL,
  `period` int(11) NOT NULL,
  `target_id` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `evaluators` int(11) NOT NULL,
  `final_grade` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `first_name`, `middle_name`, `last_name`, `gender`) VALUES
(1, 'Super User', 'X', 'Root', 'Male'),
(2, 'Von', 'Sogocio', 'Alfafara', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `refsubjectofferingdtl`
--

CREATE TABLE `refsubjectofferingdtl` (
  `subject_offering_id` int(5) NOT NULL,
  `time` char(17) DEFAULT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `day` char(3) DEFAULT NULL,
  `room` varchar(5) NOT NULL,
  `room_type` enum('Lec','Lab') NOT NULL DEFAULT 'Lec',
  `occupied` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Schedule Detail';

-- --------------------------------------------------------

--
-- Table structure for table `refsubjectofferinghdr`
--

CREATE TABLE `refsubjectofferinghdr` (
  `subject_offering_id` int(11) NOT NULL,
  `term_id` int(5) NOT NULL,
  `subject_id` int(5) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `subject_code` varchar(250) NOT NULL,
  `load_id` int(5) NOT NULL,
  `emp_id` char(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='List of Subjects Offered per Term';

-- --------------------------------------------------------

--
-- Table structure for table `reftermperiod`
--

CREATE TABLE `reftermperiod` (
  `term_id` int(5) NOT NULL,
  `period` enum('Midterm','Final') NOT NULL,
  `exam_start` date DEFAULT NULL,
  `exam_end` date DEFAULT NULL,
  `faculty_evaluation_start` date DEFAULT NULL,
  `faculty_evaluation_end` date DEFAULT NULL,
  `grade_submission_start` date DEFAULT NULL,
  `grade_submission_end` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reftermperiod`
--

INSERT INTO `reftermperiod` (`term_id`, `period`, `exam_start`, `exam_end`, `faculty_evaluation_start`, `faculty_evaluation_end`, `grade_submission_start`, `grade_submission_end`) VALUES
(37, 'Midterm', NULL, NULL, '2005-02-14', '2005-02-23', NULL, NULL),
(37, 'Final', NULL, NULL, '2005-04-04', '2005-09-09', NULL, NULL),
(38, 'Midterm', NULL, NULL, '2005-06-27', '2005-07-09', NULL, NULL),
(38, 'Final', NULL, NULL, '2005-08-15', '2005-08-27', NULL, NULL),
(39, 'Midterm', '2005-10-24', '2005-10-29', '2005-10-10', '2005-10-29', '2005-10-24', '2005-11-05'),
(39, 'Final', '2005-12-15', '2005-12-19', '2005-11-28', '2005-12-17', '2005-12-15', '2005-12-22'),
(40, 'Midterm', '2006-02-20', '2006-02-25', '2006-02-06', '2006-02-25', '2006-02-20', '2006-03-02'),
(40, 'Final', '2006-04-07', '2006-04-11', '2006-03-28', '2006-04-11', '2006-04-07', '2006-04-19'),
(44, 'Midterm', '2006-07-17', '2006-07-22', '2006-07-03', '2006-07-22', '2006-07-17', '2006-07-25'),
(44, 'Final', '2006-09-02', '2006-09-06', '2006-08-19', '2006-09-06', '2006-09-02', '2006-09-08'),
(45, 'Midterm', '2006-10-30', '2006-11-04', '2006-10-16', '2006-11-04', '2006-10-30', '2006-11-08'),
(45, 'Final', '2006-12-16', '2006-12-20', '2006-12-02', '2006-12-20', '2006-12-16', '2006-12-22'),
(46, 'Midterm', '2007-02-19', '2007-02-24', '2007-02-05', '2007-02-24', '2007-02-19', '2007-02-28'),
(46, 'Final', '2007-04-13', '2007-04-17', '2007-03-30', '2007-04-17', '2007-04-13', '2007-04-19'),
(50, 'Final', '2007-12-15', '2007-12-21', NULL, NULL, NULL, NULL),
(51, 'Final', '2008-04-10', '2008-04-14', '1970-01-01', '1970-01-01', '2008-04-10', '2008-04-17'),
(51, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2008-02-20', '2008-02-29'),
(52, 'Final', '2008-09-01', '2008-09-04', '2008-08-18', '2008-09-04', '2008-09-01', '2008-09-06'),
(52, 'Midterm', '2008-07-19', '2008-07-22', '2008-07-05', '2008-07-22', '2008-07-19', '2008-07-22'),
(53, 'Midterm', '2008-07-14', '2008-07-22', '2008-07-01', '2008-07-19', '2008-07-14', '2008-07-22'),
(53, 'Final', '2008-09-01', '2008-09-04', '1970-01-01', '1970-01-01', '2008-09-01', '2008-09-06'),
(58, 'Final', '2010-01-14', '2010-01-18', '1970-01-01', '1970-01-01', '2010-01-11', '2010-01-18'),
(58, 'Midterm', '2009-11-09', '2009-11-17', '2009-10-28', '2009-11-17', '2009-11-09', '2009-11-17'),
(54, 'Midterm', '2008-10-27', '2008-10-31', '1970-01-01', '1970-01-01', '2008-10-27', '2008-12-04'),
(54, 'Final', '2008-12-16', '2008-12-19', '1970-01-01', '1970-01-01', '2008-12-16', '2008-12-22'),
(55, 'Midterm', '2009-02-16', '2009-02-24', '2009-02-02', '2009-02-24', '2009-02-16', '2009-02-24'),
(55, 'Final', '2009-04-13', '2009-04-16', '2009-03-20', '2009-04-16', '2009-04-03', '2009-04-18'),
(56, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01'),
(56, 'Final', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01'),
(57, 'Final', '2009-09-08', '2009-09-11', '2009-08-20', '2009-09-09', '2009-09-03', '2009-09-14'),
(57, 'Midterm', '2009-07-18', '2009-07-29', '2009-07-03', '2009-07-21', '2009-07-18', '2009-07-29'),
(59, 'Midterm', '2010-03-08', '2010-03-16', '1970-01-01', '1970-01-01', '2010-03-03', '2010-03-17'),
(59, 'Final', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2010-04-30', '2010-05-08'),
(61, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2010-07-12', '2010-07-21'),
(61, 'Final', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2010-09-02', '2010-09-08'),
(63, 'Midterm', '2011-02-21', '2011-02-26', '2011-02-21', '2011-02-26', '2011-02-21', '2011-03-02'),
(63, 'Final', '2011-04-11', '2011-04-14', '2011-04-11', '2011-04-14', '2011-04-11', '2011-04-16'),
(64, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01'),
(64, 'Final', '2011-05-09', '2011-05-14', '2011-05-12', '2011-05-14', '2011-05-12', '2011-05-17'),
(62, 'Midterm', '2010-10-26', '2010-11-03', '2010-10-18', '2010-11-02', '2010-10-26', '2010-11-03'),
(62, 'Final', '2010-12-16', '2010-12-20', '2010-12-16', '2010-12-20', '2010-12-15', '2010-12-22'),
(65, 'Final', '2011-09-06', '2011-09-09', '2011-08-29', '2011-09-02', '2011-09-05', '2011-09-11'),
(65, 'Midterm', '2011-07-18', '2011-07-23', '2011-07-12', '2011-07-16', '2011-07-22', '2011-08-13'),
(10000, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01'),
(10000, 'Final', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01'),
(66, 'Final', '2011-12-17', '2011-12-21', '1970-01-01', '1970-01-01', '2011-12-17', '2011-12-23'),
(66, 'Midterm', '2011-10-31', '2011-11-05', '1970-01-01', '1970-01-01', '2011-11-02', '2011-11-08'),
(67, 'Midterm', '2012-02-18', '2012-02-29', '1970-01-01', '1970-01-01', '2012-02-18', '2012-02-02'),
(67, 'Final', '2012-04-13', '2012-04-17', '1970-01-01', '1970-01-01', '2012-04-13', '2012-04-19'),
(68, 'Final', '1999-11-30', '1999-11-30', '1999-11-30', '1999-11-30', '2012-05-21', '2012-05-22'),
(68, 'Midterm', '1999-11-30', '1999-11-30', '1999-11-30', '1999-11-30', '1999-11-30', '1999-11-30'),
(69, 'Final', '2012-09-04', '2012-09-08', '2012-08-13', '2012-09-08', '2012-09-04', '2012-09-10'),
(69, 'Midterm', '2012-07-23', '2012-07-24', '2012-07-02', '2012-07-20', '2012-07-11', '2012-07-24'),
(70, 'Final', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2012-12-17', '2012-12-22'),
(70, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2012-10-29', '2012-11-05'),
(73, 'Midterm', '2013-02-26', '2013-03-02', '2013-02-27', '2013-03-02', '2013-02-27', '2013-03-04'),
(73, 'Final', '2013-04-13', '2013-04-17', '2013-04-01', '2013-04-21', '2013-04-14', '2013-04-20'),
(74, 'Final', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2013-09-04', '2013-09-09'),
(74, 'Midterm', '2013-07-15', '2013-07-23', '1970-01-01', '1970-01-01', '2013-07-15', '2013-07-23'),
(75, 'Final', '2013-09-04', '2013-09-07', '2013-12-01', '2013-12-23', '2013-12-18', '2014-01-02'),
(75, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2013-10-29', '2013-11-05'),
(76, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2014-02-24', '2014-03-04'),
(76, 'Final', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2014-04-21', '2014-04-28'),
(77, 'Final', '1970-01-01', '1970-01-01', '2014-08-18', '2014-09-01', '2014-09-02', '2014-09-09'),
(77, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2014-07-18', '2014-07-25'),
(78, 'Final', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2014-05-12', '2014-05-12'),
(78, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01'),
(79, 'Final', '2014-12-15', '2014-12-19', '2014-11-24', '2014-12-14', '2014-12-15', '2014-12-23'),
(79, 'Midterm', '2014-10-29', '2014-11-04', '2014-10-08', '2014-10-28', '2014-10-29', '2014-11-08'),
(80, 'Final', '2015-04-15', '2015-04-20', '2015-04-01', '2015-04-14', '2015-04-15', '2015-04-22'),
(80, 'Midterm', '2015-02-23', '2015-02-28', '2015-02-09', '2015-02-22', '2015-02-23', '2015-03-04'),
(81, 'Midterm', '2015-05-11', '2015-05-15', '2015-05-12', '2015-05-14', '2015-05-12', '2015-05-16'),
(81, 'Final', '2015-05-18', '2015-05-22', '2015-05-19', '2015-05-21', '2015-05-18', '2015-05-23'),
(82, 'Final', '2015-09-01', '2015-09-04', '2015-09-01', '2015-09-04', '2015-09-05', '2015-09-12'),
(82, 'Midterm', '2015-07-15', '2015-07-21', '2015-07-15', '2015-07-21', '2015-07-16', '2015-07-29'),
(83, 'Midterm', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2015-11-09', '2015-11-12'),
(83, 'Final', '1970-01-01', '1970-01-01', '2015-12-03', '2015-12-23', '2016-01-04', '2016-01-11'),
(84, 'Final', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '2016-04-20', '2016-04-25'),
(84, 'Midterm', '2016-02-29', '2016-03-05', '2016-02-15', '2016-02-27', '2016-02-29', '2016-03-09'),
(86, 'Midterm', '2016-07-18', '2016-07-23', '2016-07-04', '2016-07-16', '2016-07-18', '2016-07-27'),
(86, 'Final', '2016-09-05', '2016-09-08', '2016-08-22', '2016-09-03', '2016-09-05', '2016-09-12'),
(87, 'Midterm', '2016-11-02', '2016-11-07', '2016-10-17', '2016-11-01', '2016-11-02', '2016-11-10'),
(87, 'Final', '2016-12-19', '2016-12-22', '2016-12-05', '2016-12-17', '2016-12-19', '2017-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specialization_id` int(10) NOT NULL,
  `emp_id` char(10) NOT NULL,
  `specialization_name` varchar(50) NOT NULL,
  `specialization_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specialization_id`, `emp_id`, `specialization_name`, `specialization_desc`) VALUES
(2, '2017-00001', 'Software Engineering', 'desc');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(5) NOT NULL,
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
  `is_elective` char(3) DEFAULT NULL,
  `grade_type` char(1) DEFAULT NULL,
  `accept_substitute` char(1) DEFAULT NULL,
  `lab_type_id` char(1) DEFAULT NULL,
  `dept_id` int(5) NOT NULL DEFAULT '0',
  `category` tinyint(4) NOT NULL,
  `assess_note` varchar(255) NOT NULL,
  `specialization_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Subject' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `term_id`, `subject_code`, `subject_name`, `subject_description`, `unit`, `pay_unit`, `compute_GPA`, `lab_id`, `group_owner`, `evaluate_OTE`, `is_elective`, `grade_type`, `accept_substitute`, `lab_type_id`, `dept_id`, `category`, `assess_note`, `specialization_id`) VALUES
(6, 1, 'PROGCON', 'Programming Concepts', 'desc', '3.0', '1.0', '1', '1', '1', '1', 'N', '1', '1', '1', 1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE `system_log` (
  `entry_id` bigint(20) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `action` mediumtext NOT NULL,
  `module` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_log`
--

INSERT INTO `system_log` (`entry_id`, `ip_address`, `user`, `datetime`, `action`, `module`) VALUES
(1, '::1', 'root', '2017-02-21 04:10:02', 'Logged in', '/softdev/login.php'),
(2, '::1', 'root', '2017-02-21 04:10:04', 'Query Executed: UPDATE user SET `password`=?, `salt`=?, `iteration`=?, `method`=? WHERE username=?\r\nArray\n(\n    [0] => ssiss\n    [1] => $2y$12$YzbCFBfZX5wXO6H8oMeATegS7MbR4eQRXndrmKsDGqgNQlen6geH2\n    [2] => YzbCFBfZX5wXO6H8oMeATg\n    [3] => 12\n    [4] => blowfish\n    [5] => root\n)\n', '/softdev/login.php'),
(3, '::1', 'root', '2017-02-21 04:31:01', 'Logged in', '/softdev/login.php'),
(4, '::1', 'root', '2017-02-21 04:35:19', 'Logged in', '/softdev/login.php'),
(5, '::1', 'root', '2017-02-21 04:35:28', 'Logged out', '/softdev/end.php'),
(6, '::1', 'root', '2017-02-21 07:19:30', 'Logged in', '/softdev/login.php'),
(7, '::1', 'root', '2017-02-21 07:22:35', 'Logged out', '/softdev/end.php'),
(8, '::1', 'root', '2017-02-21 07:31:08', 'Logged in', '/softdev/login.php'),
(9, '::1', 'root', '2017-02-21 07:31:15', 'Query executed: UPDATE user SET skin_id=\'10\' WHERE username=\'root\'', '/softdev/change_skin.php'),
(10, '::1', 'root', '2017-02-21 07:31:20', 'Query executed: UPDATE user SET skin_id=\'8\' WHERE username=\'root\'', '/softdev/change_skin.php'),
(11, '::1', 'root', '2017-02-21 07:31:22', 'Query executed: UPDATE user SET skin_id=\'7\' WHERE username=\'root\'', '/softdev/change_skin.php'),
(12, '::1', 'root', '2017-02-21 07:31:26', 'Query executed: UPDATE user SET skin_id=\'6\' WHERE username=\'root\'', '/softdev/change_skin.php'),
(13, '::1', 'root', '2017-02-21 07:31:59', 'Logged out', '/softdev/end.php'),
(14, '::1', 'root', '2017-02-21 07:40:17', 'Logged in', '/softdev/login.php'),
(15, '::1', 'root', '2017-02-21 07:44:28', 'Logged out', '/softdev/end.php'),
(16, '::1', 'root', '2017-02-21 07:48:44', 'Logged in', '/softdev/login.php'),
(17, '::1', 'root', '2017-02-21 07:51:20', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(18, '::1', 'root', '2017-02-21 07:51:21', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View otevaluationresultspersection\n    [2] => modules/ote/results_per_section/listview_otevaluationresultspersection.php\n    [3] => OTE Results Per Section\n    [4] => \n    [5] => 1\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 55\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(19, '::1', 'root', '2017-02-21 23:54:24', 'Logged in', '/softdev/login.php'),
(20, '::1', 'root', '2017-02-22 12:04:33', 'Logged in', '/softdev/login.php'),
(21, '::1', 'root', '2017-02-23 13:50:53', 'Logged in', '/softdev/login.php'),
(22, '::1', 'root', '2017-02-24 03:26:16', 'Logged in', '/softdev/login.php'),
(23, '::1', 'root', '2017-02-24 03:27:04', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(24, '::1', 'root', '2017-02-24 03:27:05', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View refsubjectofferingdtl\n    [2] => modules/ref/subjectoffering/dtl/listview_refsubjectofferingdtl.php\n    [3] => Subject Offering Details\n    [4] => \n    [5] => 1\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 59\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(25, '::1', 'root', '2017-02-24 03:27:28', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(26, '::1', 'root', '2017-02-24 03:27:28', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View refsubjectofferinghdr\n    [2] => modules/ref/subjectoffering/hdr/listview_refsubjectofferinghdr.php\n    [3] => Subject Offering Header\n    [4] => \n    [5] => 1\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 63\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(27, '::1', 'root', '2017-02-24 03:27:57', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(28, '::1', 'root', '2017-02-24 03:27:57', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View reftermperiod\n    [2] => modules/ref/termperiod/listview_reftermperiod.php\n    [3] => Term Period\n    [4] => \n    [5] => 1\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 67\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(29, '::1', 'root', '2017-02-24 03:28:37', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(30, '::1', 'root', '2017-02-24 03:28:38', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View facultyload\n    [2] => modules/facultyload/listview_facultyload.php\n    [3] => Faculty Load\n    [4] => \n    [5] => 1\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 51\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(31, '::1', 'root', '2017-02-24 03:28:50', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(32, '::1', 'root', '2017-02-24 03:28:50', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View taggedemployee\n    [2] => modules/taggedfaculty/listview_taggedemployee.php\n    [3] => Tagged Employee\n    [4] => \n    [5] => 1\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 79\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(33, '::1', 'root', '2017-02-24 04:42:29', 'Logged in', '/softdev/login.php'),
(34, '::1', 'root', '2017-02-24 04:54:01', 'Logged out', '/softdev/end.php'),
(35, '::1', 'root', '2017-02-24 06:43:22', 'Logged in', '/softdev/login.php'),
(36, '::1', 'root', '2017-02-24 07:06:24', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(37, '::1', 'root', '2017-02-24 07:06:25', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Edit taggedemployee\n    [2] => modules//employee/taggedemployee/edit_taggedemployee.php\n    [3] => Edit Taggedemployee\n    [4] => \n    [5] => 1\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 78\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(38, '::1', 'root', '2017-02-24 07:06:39', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(39, '::1', 'root', '2017-02-24 07:06:39', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add taggedemployee\n    [2] => modules//employee/taggedemployee/add_taggedemployee.php\n    [3] => Add Taggedemployee\n    [4] => \n    [5] => 1\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 77\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(40, '::1', 'root', '2017-02-24 07:07:41', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(41, '::1', 'root', '2017-02-24 07:07:41', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View taggedemployee\n    [2] => module/employee/taggedemployee/listview_taggedemployee.php\n    [3] => Tagged Employee\n    [4] => \n    [5] => 1\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 79\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(42, '::1', 'root', '2017-02-24 07:07:54', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(43, '::1', 'root', '2017-02-24 07:07:54', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Delete taggedemployee\n    [2] => modules/employee/taggedemployee/delete_taggedemployee.php\n    [3] => Delete Taggedemployee\n    [4] => \n    [5] => 1\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 80\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(44, '::1', 'root', '2017-02-24 07:08:59', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(45, '::1', 'root', '2017-02-24 07:09:00', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View taggedemployee\n    [2] => modules/employee/taggedemployee/listview_taggedemployee.php\n    [3] => Tagged Employee\n    [4] => \n    [5] => 1\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 79\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(46, '::1', 'root', '2017-02-24 07:09:10', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(47, '::1', 'root', '2017-02-24 07:09:10', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add taggedemployee\n    [2] => modules/employee/taggedemployee/add_taggedemployee.php\n    [3] => Add Taggedemployee\n    [4] => \n    [5] => 1\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 77\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(48, '::1', 'root', '2017-02-24 07:09:17', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(49, '::1', 'root', '2017-02-24 07:09:18', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Edit taggedemployee\n    [2] => modules/employee/taggedemployee/edit_taggedemployee.php\n    [3] => Edit Taggedemployee\n    [4] => \n    [5] => 1\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 78\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(50, '::1', 'root', '2017-02-24 07:13:20', 'Query executed: DELETE FROM user_role_links WHERE role_id=\'1\'', '/softdev/sysadmin/role_permissions.php'),
(51, '::1', 'root', '2017-02-24 07:13:20', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'37\')', '/softdev/sysadmin/role_permissions.php'),
(52, '::1', 'root', '2017-02-24 07:13:21', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'33\')', '/softdev/sysadmin/role_permissions.php'),
(53, '::1', 'root', '2017-02-24 07:13:21', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'41\')', '/softdev/sysadmin/role_permissions.php'),
(54, '::1', 'root', '2017-02-24 07:13:21', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'45\')', '/softdev/sysadmin/role_permissions.php'),
(55, '::1', 'root', '2017-02-24 07:13:22', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'49\')', '/softdev/sysadmin/role_permissions.php'),
(56, '::1', 'root', '2017-02-24 07:13:22', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'53\')', '/softdev/sysadmin/role_permissions.php'),
(57, '::1', 'root', '2017-02-24 07:13:22', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'4\')', '/softdev/sysadmin/role_permissions.php'),
(58, '::1', 'root', '2017-02-24 07:13:22', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'57\')', '/softdev/sysadmin/role_permissions.php'),
(59, '::1', 'root', '2017-02-24 07:13:22', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'61\')', '/softdev/sysadmin/role_permissions.php'),
(60, '::1', 'root', '2017-02-24 07:13:23', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'65\')', '/softdev/sysadmin/role_permissions.php'),
(61, '::1', 'root', '2017-02-24 07:13:23', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'69\')', '/softdev/sysadmin/role_permissions.php'),
(62, '::1', 'root', '2017-02-24 07:13:23', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'73\')', '/softdev/sysadmin/role_permissions.php'),
(63, '::1', 'root', '2017-02-24 07:13:23', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'16\')', '/softdev/sysadmin/role_permissions.php'),
(64, '::1', 'root', '2017-02-24 07:13:23', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'28\')', '/softdev/sysadmin/role_permissions.php'),
(65, '::1', 'root', '2017-02-24 07:13:24', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'77\')', '/softdev/sysadmin/role_permissions.php'),
(66, '::1', 'root', '2017-02-24 07:13:24', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'81\')', '/softdev/sysadmin/role_permissions.php'),
(67, '::1', 'root', '2017-02-24 07:13:24', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'85\')', '/softdev/sysadmin/role_permissions.php'),
(68, '::1', 'root', '2017-02-24 07:13:24', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'8\')', '/softdev/sysadmin/role_permissions.php'),
(69, '::1', 'root', '2017-02-24 07:13:24', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'20\')', '/softdev/sysadmin/role_permissions.php'),
(70, '::1', 'root', '2017-02-24 07:13:25', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'24\')', '/softdev/sysadmin/role_permissions.php'),
(71, '::1', 'root', '2017-02-24 07:13:25', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'12\')', '/softdev/sysadmin/role_permissions.php'),
(72, '::1', 'root', '2017-02-24 07:13:25', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'39\')', '/softdev/sysadmin/role_permissions.php'),
(73, '::1', 'root', '2017-02-24 07:13:25', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'35\')', '/softdev/sysadmin/role_permissions.php'),
(74, '::1', 'root', '2017-02-24 07:13:25', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'43\')', '/softdev/sysadmin/role_permissions.php'),
(75, '::1', 'root', '2017-02-24 07:13:26', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'40\')', '/softdev/sysadmin/role_permissions.php'),
(76, '::1', 'root', '2017-02-24 07:13:26', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'36\')', '/softdev/sysadmin/role_permissions.php'),
(77, '::1', 'root', '2017-02-24 07:13:26', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'44\')', '/softdev/sysadmin/role_permissions.php'),
(78, '::1', 'root', '2017-02-24 07:13:26', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'48\')', '/softdev/sysadmin/role_permissions.php'),
(79, '::1', 'root', '2017-02-24 07:13:27', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'52\')', '/softdev/sysadmin/role_permissions.php'),
(80, '::1', 'root', '2017-02-24 07:13:27', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'56\')', '/softdev/sysadmin/role_permissions.php'),
(81, '::1', 'root', '2017-02-24 07:13:28', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'7\')', '/softdev/sysadmin/role_permissions.php'),
(82, '::1', 'root', '2017-02-24 07:13:29', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'60\')', '/softdev/sysadmin/role_permissions.php'),
(83, '::1', 'root', '2017-02-24 07:13:29', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'64\')', '/softdev/sysadmin/role_permissions.php'),
(84, '::1', 'root', '2017-02-24 07:13:29', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'68\')', '/softdev/sysadmin/role_permissions.php'),
(85, '::1', 'root', '2017-02-24 07:13:29', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'72\')', '/softdev/sysadmin/role_permissions.php'),
(86, '::1', 'root', '2017-02-24 07:13:30', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'76\')', '/softdev/sysadmin/role_permissions.php'),
(87, '::1', 'root', '2017-02-24 07:13:30', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'19\')', '/softdev/sysadmin/role_permissions.php'),
(88, '::1', 'root', '2017-02-24 07:13:31', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'31\')', '/softdev/sysadmin/role_permissions.php'),
(89, '::1', 'root', '2017-02-24 07:13:31', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'80\')', '/softdev/sysadmin/role_permissions.php'),
(90, '::1', 'root', '2017-02-24 07:13:32', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'84\')', '/softdev/sysadmin/role_permissions.php'),
(91, '::1', 'root', '2017-02-24 07:13:33', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'88\')', '/softdev/sysadmin/role_permissions.php'),
(92, '::1', 'root', '2017-02-24 07:13:33', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'11\')', '/softdev/sysadmin/role_permissions.php'),
(93, '::1', 'root', '2017-02-24 07:13:33', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'23\')', '/softdev/sysadmin/role_permissions.php'),
(94, '::1', 'root', '2017-02-24 07:13:34', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'27\')', '/softdev/sysadmin/role_permissions.php'),
(95, '::1', 'root', '2017-02-24 07:13:34', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'15\')', '/softdev/sysadmin/role_permissions.php'),
(96, '::1', 'root', '2017-02-24 07:13:34', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'38\')', '/softdev/sysadmin/role_permissions.php'),
(97, '::1', 'root', '2017-02-24 07:13:35', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'34\')', '/softdev/sysadmin/role_permissions.php'),
(98, '::1', 'root', '2017-02-24 07:13:35', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'42\')', '/softdev/sysadmin/role_permissions.php'),
(99, '::1', 'root', '2017-02-24 07:13:36', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'46\')', '/softdev/sysadmin/role_permissions.php'),
(100, '::1', 'root', '2017-02-24 07:13:36', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'50\')', '/softdev/sysadmin/role_permissions.php'),
(101, '::1', 'root', '2017-02-24 07:13:36', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'54\')', '/softdev/sysadmin/role_permissions.php'),
(102, '::1', 'root', '2017-02-24 07:13:37', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'5\')', '/softdev/sysadmin/role_permissions.php'),
(103, '::1', 'root', '2017-02-24 07:13:37', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'58\')', '/softdev/sysadmin/role_permissions.php'),
(104, '::1', 'root', '2017-02-24 07:13:37', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'62\')', '/softdev/sysadmin/role_permissions.php'),
(105, '::1', 'root', '2017-02-24 07:13:38', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'66\')', '/softdev/sysadmin/role_permissions.php'),
(106, '::1', 'root', '2017-02-24 07:13:38', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'70\')', '/softdev/sysadmin/role_permissions.php'),
(107, '::1', 'root', '2017-02-24 07:13:38', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'74\')', '/softdev/sysadmin/role_permissions.php'),
(108, '::1', 'root', '2017-02-24 07:13:39', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'17\')', '/softdev/sysadmin/role_permissions.php'),
(109, '::1', 'root', '2017-02-24 07:13:39', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'29\')', '/softdev/sysadmin/role_permissions.php'),
(110, '::1', 'root', '2017-02-24 07:13:39', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'78\')', '/softdev/sysadmin/role_permissions.php'),
(111, '::1', 'root', '2017-02-24 07:13:39', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'82\')', '/softdev/sysadmin/role_permissions.php'),
(112, '::1', 'root', '2017-02-24 07:13:40', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'86\')', '/softdev/sysadmin/role_permissions.php'),
(113, '::1', 'root', '2017-02-24 07:13:40', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'9\')', '/softdev/sysadmin/role_permissions.php'),
(114, '::1', 'root', '2017-02-24 07:13:41', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'21\')', '/softdev/sysadmin/role_permissions.php'),
(115, '::1', 'root', '2017-02-24 07:13:41', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'25\')', '/softdev/sysadmin/role_permissions.php'),
(116, '::1', 'root', '2017-02-24 07:13:42', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'13\')', '/softdev/sysadmin/role_permissions.php'),
(117, '::1', 'root', '2017-02-24 07:13:42', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'47\')', '/softdev/sysadmin/role_permissions.php'),
(118, '::1', 'root', '2017-02-24 07:13:43', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'51\')', '/softdev/sysadmin/role_permissions.php'),
(119, '::1', 'root', '2017-02-24 07:13:43', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'1\')', '/softdev/sysadmin/role_permissions.php'),
(120, '::1', 'root', '2017-02-24 07:13:44', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'55\')', '/softdev/sysadmin/role_permissions.php'),
(121, '::1', 'root', '2017-02-24 07:13:45', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'6\')', '/softdev/sysadmin/role_permissions.php'),
(122, '::1', 'root', '2017-02-24 07:13:45', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'32\')', '/softdev/sysadmin/role_permissions.php'),
(123, '::1', 'root', '2017-02-24 07:13:46', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'3\')', '/softdev/sysadmin/role_permissions.php'),
(124, '::1', 'root', '2017-02-24 07:13:46', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'2\')', '/softdev/sysadmin/role_permissions.php'),
(125, '::1', 'root', '2017-02-24 07:13:47', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'71\')', '/softdev/sysadmin/role_permissions.php'),
(126, '::1', 'root', '2017-02-24 07:13:47', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'75\')', '/softdev/sysadmin/role_permissions.php'),
(127, '::1', 'root', '2017-02-24 07:13:47', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'59\')', '/softdev/sysadmin/role_permissions.php'),
(128, '::1', 'root', '2017-02-24 07:13:48', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'63\')', '/softdev/sysadmin/role_permissions.php'),
(129, '::1', 'root', '2017-02-24 07:13:48', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'18\')', '/softdev/sysadmin/role_permissions.php'),
(130, '::1', 'root', '2017-02-24 07:13:49', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'30\')', '/softdev/sysadmin/role_permissions.php'),
(131, '::1', 'root', '2017-02-24 07:13:49', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'79\')', '/softdev/sysadmin/role_permissions.php'),
(132, '::1', 'root', '2017-02-24 07:13:49', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'83\')', '/softdev/sysadmin/role_permissions.php'),
(133, '::1', 'root', '2017-02-24 07:25:01', 'Logged out', '/softdev/end.php'),
(134, '::1', 'root', '2017-02-24 07:26:24', 'Logged in', '/softdev/login.php'),
(135, '::1', 'root', '2017-02-24 07:30:12', 'Logged out', '/softdev/end.php'),
(136, '::1', 'root', '2017-02-24 07:36:09', 'Logged in', '/softdev/login.php'),
(137, '::1', 'root', '2017-03-03 07:47:09', 'Logged in', '/softdev/login.php'),
(138, '::1', 'root', '2017-03-06 17:19:23', 'Logged in', '/softdev/login.php'),
(139, '::1', 'root', '2017-03-06 17:23:06', 'Logged out', '/softdev/end.php'),
(140, '::1', 'root', '2017-03-08 22:37:12', 'Logged in', '/softdev/login.php'),
(141, '::1', 'root', '2017-03-08 22:37:42', 'Pressed submit button', '/softdev/sysadmin/edit_user_passport_groups.php'),
(142, '::1', 'root', '2017-03-08 22:37:43', 'Query Executed: UPDATE user_passport_groups SET passport_group = ?, priority = ?, icon = ? WHERE passport_group_id = ?\r\nArray\n(\n    [0] => sisi\n    [1] => Modules\n    [2] => 0\n    [3] => blue_folder3.png\n    [4] => 1\n)\n', '/softdev/sysadmin/edit_user_passport_groups.php'),
(143, '::1', 'root', '2017-03-08 22:43:06', 'Logged in', '/softdev/login.php'),
(144, '::1', 'root', '2017-03-08 22:47:16', 'Logged in', '/softdev/login.php'),
(145, '::1', 'root', '2017-03-08 22:48:12', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(146, '::1', 'root', '2017-03-08 22:48:13', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add taggedemployee\n    [2] => modules/taggedemployee/add_taggedemployee.php\n    [3] => Add Taggedemployee\n    [4] => \n    [5] => 1\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 77\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(147, '::1', 'root', '2017-03-08 22:48:21', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(148, '::1', 'root', '2017-03-08 22:48:21', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Edit taggedemployee\n    [2] => modules/taggedemployee/edit_taggedemployee.php\n    [3] => Edit Taggedemployee\n    [4] => \n    [5] => 1\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 78\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(149, '::1', 'root', '2017-03-08 22:48:28', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(150, '::1', 'root', '2017-03-08 22:48:28', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View taggedemployee\n    [2] => modules/taggedemployee/listview_taggedemployee.php\n    [3] => Tagged Employee\n    [4] => \n    [5] => 1\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 79\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(151, '::1', 'root', '2017-03-08 22:48:35', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(152, '::1', 'root', '2017-03-08 22:48:35', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Delete taggedemployee\n    [2] => modules/taggedemployee/delete_taggedemployee.php\n    [3] => Delete Taggedemployee\n    [4] => \n    [5] => 1\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 80\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(153, '::1', 'root', '2017-03-08 22:48:43', 'Pressed cancel button', '/softdev/modules/taggedemployee/add_taggedemployee.php'),
(154, '::1', 'root', '2017-03-09 13:44:07', 'Logged in', '/softdev/login.php'),
(155, '::1', 'root', '2017-03-09 13:44:19', 'Pressed submit button', '/softdev/sysadmin/add_person.php'),
(156, '::1', 'root', '2017-03-09 13:44:20', 'Query Executed: INSERT INTO person(person_id, first_name, middle_name, last_name, gender) VALUES(?,?,?,?,?)\r\nArray\n(\n    [0] => issss\n    [1] => \n    [2] => Von\n    [3] => Sogocio\n    [4] => Alfafara\n    [5] => Male\n)\n', '/softdev/sysadmin/add_person.php'),
(157, '::1', 'root', '2017-03-09 13:44:56', 'Pressed submit button', '/softdev/sysadmin/add_user_role.php'),
(158, '::1', 'root', '2017-03-09 13:44:56', 'Query Executed: INSERT INTO user_role(role_id, role, description) VALUES(?,?,?)\r\nArray\n(\n    [0] => iss\n    [1] => \n    [2] => Program Head\n    [3] => desc\n)\n', '/softdev/sysadmin/add_user_role.php'),
(159, '::1', 'root', '2017-03-09 13:48:59', 'Query executed: DELETE FROM user_role_links WHERE role_id=\'3\'', '/softdev/sysadmin/role_permissions.php'),
(160, '::1', 'root', '2017-03-09 13:49:00', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'37\')', '/softdev/sysadmin/role_permissions.php'),
(161, '::1', 'root', '2017-03-09 13:49:00', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'69\')', '/softdev/sysadmin/role_permissions.php'),
(162, '::1', 'root', '2017-03-09 13:49:00', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'77\')', '/softdev/sysadmin/role_permissions.php'),
(163, '::1', 'root', '2017-03-09 13:49:00', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'39\')', '/softdev/sysadmin/role_permissions.php'),
(164, '::1', 'root', '2017-03-09 13:49:00', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'40\')', '/softdev/sysadmin/role_permissions.php'),
(165, '::1', 'root', '2017-03-09 13:49:01', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'52\')', '/softdev/sysadmin/role_permissions.php'),
(166, '::1', 'root', '2017-03-09 13:49:01', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'72\')', '/softdev/sysadmin/role_permissions.php'),
(167, '::1', 'root', '2017-03-09 13:49:01', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'80\')', '/softdev/sysadmin/role_permissions.php'),
(168, '::1', 'root', '2017-03-09 13:49:01', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'38\')', '/softdev/sysadmin/role_permissions.php'),
(169, '::1', 'root', '2017-03-09 13:49:01', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'46\')', '/softdev/sysadmin/role_permissions.php'),
(170, '::1', 'root', '2017-03-09 13:49:02', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'50\')', '/softdev/sysadmin/role_permissions.php'),
(171, '::1', 'root', '2017-03-09 13:49:02', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'70\')', '/softdev/sysadmin/role_permissions.php'),
(172, '::1', 'root', '2017-03-09 13:49:02', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'47\')', '/softdev/sysadmin/role_permissions.php'),
(173, '::1', 'root', '2017-03-09 13:49:02', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'51\')', '/softdev/sysadmin/role_permissions.php'),
(174, '::1', 'root', '2017-03-09 13:49:03', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'71\')', '/softdev/sysadmin/role_permissions.php'),
(175, '::1', 'root', '2017-03-09 13:49:03', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'75\')', '/softdev/sysadmin/role_permissions.php'),
(176, '::1', 'root', '2017-03-09 13:49:03', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'79\')', '/softdev/sysadmin/role_permissions.php'),
(177, '::1', 'root', '2017-03-09 13:49:24', 'Pressed submit button', '/softdev/sysadmin/add_user.php'),
(178, '::1', 'root', '2017-03-09 13:49:24', 'Query Executed: INSERT INTO user(username, password, salt, iteration, method, person_id, role_id, skin_id) VALUES(?,?,?,?,?,?,?,?)\r\nArray\n(\n    [0] => sssisiii\n    [1] => vsalfafara\n    [2] => $2y$12$CzD/34NBjSbXYJLnYk0UYO6Gy1kRxPd0BFukdmTP6Jn/u2FbM5YZm\n    [3] => CzD/34NBjSbXYJLnYk0UYQ\n    [4] => 12\n    [5] => blowfish\n    [6] => 2\n    [7] => 3\n    [8] => 6\n)\n', '/softdev/sysadmin/add_user.php'),
(179, '::1', 'root', '2017-03-09 13:49:25', 'Query executed: INSERT `user_passport` SELECT \'vsalfafara\', `link_id` FROM user_role_links WHERE role_id=\'3\'', '/softdev/sysadmin/add_user.php'),
(180, '::1', 'root', '2017-03-09 13:50:01', 'Logged out', '/softdev/end.php'),
(181, '::1', 'vsalfafara', '2017-03-09 13:50:07', 'Logged in', '/softdev/login.php'),
(182, '::1', 'vsalfafara', '2017-03-09 13:52:17', 'Pressed cancel button', '/softdev/modules/facultyload/csv_facultyload.php'),
(183, '::1', 'vsalfafara', '2017-03-09 13:53:52', 'Logged out', '/softdev/end.php'),
(184, '::1', 'root', '2017-03-09 13:53:57', 'Logged in', '/softdev/login.php'),
(185, '::1', 'vsalfafara', '2017-03-09 13:54:23', 'Logged in', '/softdev/login.php'),
(186, '::1', 'root', '2017-03-09 13:56:18', 'Pressed submit button', '/softdev/sysadmin/add_user_passport_groups.php'),
(187, '::1', 'root', '2017-03-09 13:56:18', 'Query Executed: INSERT INTO user_passport_groups(passport_group_id, passport_group, priority, icon) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isis\n    [1] => \n    [2] => Employee Data\n    [3] => 2\n    [4] => blue_folder3.png\n)\n', '/softdev/sysadmin/add_user_passport_groups.php'),
(188, '::1', 'root', '2017-03-09 13:56:52', 'Pressed delete button', '/softdev/sysadmin/delete_user_passport_groups.php'),
(189, '::1', 'root', '2017-03-09 13:56:52', 'Query Executed: DELETE FROM user_passport_groups WHERE passport_group_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 3\n)\n', '/softdev/sysadmin/delete_user_passport_groups.php'),
(190, '::1', 'root', '2017-03-09 13:59:34', 'Pressed submit button', '/softdev/sysadmin/add_user_passport_groups.php'),
(191, '::1', 'root', '2017-03-09 13:59:34', 'Query Executed: INSERT INTO user_passport_groups(passport_group_id, passport_group, priority, icon) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isis\n    [1] => \n    [2] => Employee Data\n    [3] => 2\n    [4] => blue_folder3.png\n)\n', '/softdev/sysadmin/add_user_passport_groups.php'),
(192, '::1', 'root', '2017-03-09 13:59:46', 'Pressed submit button', '/softdev/sysadmin/add_user_passport_groups.php'),
(193, '::1', 'root', '2017-03-09 13:59:47', 'Query Executed: INSERT INTO user_passport_groups(passport_group_id, passport_group, priority, icon) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isis\n    [1] => \n    [2] => Subject Data\n    [3] => 1\n    [4] => blue_folder3.png\n)\n', '/softdev/sysadmin/add_user_passport_groups.php'),
(194, '::1', 'root', '2017-03-09 14:00:02', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(195, '::1', 'root', '2017-03-09 14:00:03', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add employee\n    [2] => modules/employee/add_employee.php\n    [3] => Add Employee\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 45\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(196, '::1', 'root', '2017-03-09 14:00:07', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(197, '::1', 'root', '2017-03-09 14:00:07', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Edit employee\n    [2] => modules/employee/edit_employee.php\n    [3] => Edit Employee\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 46\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(198, '::1', 'root', '2017-03-09 14:00:13', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(199, '::1', 'root', '2017-03-09 14:00:13', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View employee\n    [2] => modules/employee/listview_employee.php\n    [3] => Employee\n    [4] => \n    [5] => 4\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 47\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(200, '::1', 'root', '2017-03-09 14:00:18', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(201, '::1', 'root', '2017-03-09 14:00:18', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Delete employee\n    [2] => modules/employee/delete_employee.php\n    [3] => Delete Employee\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 48\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(202, '::1', 'root', '2017-03-09 14:00:24', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(203, '::1', 'root', '2017-03-09 14:00:25', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add taggedemployee\n    [2] => modules/taggedemployee/add_taggedemployee.php\n    [3] => Add Taggedemployee\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 77\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(204, '::1', 'root', '2017-03-09 14:00:29', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(205, '::1', 'root', '2017-03-09 14:00:30', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Edit taggedemployee\n    [2] => modules/taggedemployee/edit_taggedemployee.php\n    [3] => Edit Taggedemployee\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 78\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(206, '::1', 'root', '2017-03-09 14:00:35', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(207, '::1', 'root', '2017-03-09 14:00:37', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View taggedemployee\n    [2] => modules/taggedemployee/listview_taggedemployee.php\n    [3] => Tagged Employee\n    [4] => \n    [5] => 4\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 79\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(208, '::1', 'root', '2017-03-09 14:00:43', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(209, '::1', 'root', '2017-03-09 14:00:44', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Delete taggedemployee\n    [2] => modules/taggedemployee/delete_taggedemployee.php\n    [3] => Delete Taggedemployee\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 80\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(210, '::1', 'root', '2017-03-09 14:00:55', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(211, '::1', 'root', '2017-03-09 14:00:56', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add specialization\n    [2] => modules/specialization/add_specialization.php\n    [3] => Add Specialization\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 69\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(212, '::1', 'root', '2017-03-09 14:01:03', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(213, '::1', 'root', '2017-03-09 14:01:05', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Edit specialization\n    [2] => modules/specialization/edit_specialization.php\n    [3] => Edit Specialization\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 70\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(214, '::1', 'root', '2017-03-09 14:01:08', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(215, '::1', 'root', '2017-03-09 14:01:09', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View specialization\n    [2] => modules/specialization/listview_specialization.php\n    [3] => Specialization\n    [4] => \n    [5] => 4\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 71\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(216, '::1', 'root', '2017-03-09 14:01:13', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(217, '::1', 'root', '2017-03-09 14:01:13', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Delete specialization\n    [2] => modules/specialization/delete_specialization.php\n    [3] => Delete Specialization\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 72\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(218, '::1', 'root', '2017-03-09 14:03:04', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(219, '::1', 'root', '2017-03-09 14:03:04', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Module Control\n    [2] => sysadmin/module_control.php\n    [3] => Module Control\n    [4] => Enable or disable system modules\n    [5] => 4\n    [6] => Yes\n    [7] => On\n    [8] => modulecontrol.png\n    [9] => 0\n    [10] => 1\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(220, '::1', 'root', '2017-03-09 14:03:09', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(221, '::1', 'root', '2017-03-09 14:03:10', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Set User Passports\n    [2] => sysadmin/set_user_passports.php\n    [3] => Set User Passports\n    [4] => Change the passport settings of system users\n    [5] => 4\n    [6] => Yes\n    [7] => On\n    [8] => passport.png\n    [9] => 0\n    [10] => 2\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(222, '::1', 'root', '2017-03-09 14:03:55', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(223, '::1', 'root', '2017-03-09 14:03:55', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Module Control\n    [2] => sysadmin/module_control.php\n    [3] => Module Control\n    [4] => Enable or disable system modules\n    [5] => 2\n    [6] => Yes\n    [7] => On\n    [8] => modulecontrol.png\n    [9] => 0\n    [10] => 1\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(224, '::1', 'root', '2017-03-09 14:04:08', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(225, '::1', 'root', '2017-03-09 14:04:09', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Set User Passports\n    [2] => sysadmin/set_user_passports.php\n    [3] => Set User Passports\n    [4] => Change the passport settings of system users\n    [5] => 2\n    [6] => Yes\n    [7] => On\n    [8] => passport.png\n    [9] => 0\n    [10] => 2\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(226, '::1', 'root', '2017-03-09 14:05:50', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(227, '::1', 'root', '2017-03-09 14:05:50', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add availability\n    [2] => modules/availability/add_availability.php\n    [3] => Add Availability\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 37\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(228, '::1', 'root', '2017-03-09 14:05:54', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(229, '::1', 'root', '2017-03-09 14:05:55', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Edit availability\n    [2] => modules/availability/edit_availability.php\n    [3] => Edit Availability\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 38\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(230, '::1', 'root', '2017-03-09 14:05:58', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(231, '::1', 'root', '2017-03-09 14:05:59', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View availability\n    [2] => modules/availability/listview_availability.php\n    [3] => Availability\n    [4] => \n    [5] => 4\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 39\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(232, '::1', 'root', '2017-03-09 14:06:02', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(233, '::1', 'root', '2017-03-09 14:06:02', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Delete availability\n    [2] => modules/availability/delete_availability.php\n    [3] => Delete Availability\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 40\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(234, '::1', 'root', '2017-03-09 14:06:53', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php');
INSERT INTO `system_log` (`entry_id`, `ip_address`, `user`, `datetime`, `action`, `module`) VALUES
(235, '::1', 'root', '2017-03-09 14:06:54', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add subject\n    [2] => modules/subject/add_subject.php\n    [3] => Add Subject\n    [4] => \n    [5] => 5\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 73\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(236, '::1', 'root', '2017-03-09 14:07:00', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(237, '::1', 'root', '2017-03-09 14:07:01', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View subject\n    [2] => modules/subject/listview_subject.php\n    [3] => Subject\n    [4] => \n    [5] => 5\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 75\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(238, '::1', 'root', '2017-03-09 14:07:06', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(239, '::1', 'root', '2017-03-09 14:07:06', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add subject\n    [2] => modules/subject/add_subject.php\n    [3] => Add Subject\n    [4] => \n    [5] => 5\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 73\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(240, '::1', 'root', '2017-03-09 14:07:16', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(241, '::1', 'root', '2017-03-09 14:07:17', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Edit subject\n    [2] => modules/subject/edit_subject.php\n    [3] => Edit Subject\n    [4] => \n    [5] => 5\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 74\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(242, '::1', 'root', '2017-03-09 14:07:22', 'Pressed cancel button', '/softdev/sysadmin/edit_user_links.php'),
(243, '::1', 'root', '2017-03-09 14:07:30', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(244, '::1', 'root', '2017-03-09 14:07:32', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Delete subject\n    [2] => modules/subject/delete_subject.php\n    [3] => Delete Subject\n    [4] => \n    [5] => 4\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 76\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(245, '::1', 'vsalfafara', '2017-03-09 14:09:10', 'Pressed cancel button', '/softdev/modules/taggedemployee/add_taggedemployee.php'),
(246, '::1', 'vsalfafara', '2017-03-09 14:09:16', 'Pressed cancel button', '/softdev/modules/employee/csv_employee.php'),
(247, '::1', 'vsalfafara', '2017-03-09 15:50:06', 'Logged in', '/softdev/login.php'),
(248, '::1', 'vsalfafara', '2017-03-09 15:52:49', 'Logged in', '/softdev/login.php'),
(249, '::1', 'vsalfafara', '2017-03-09 15:55:12', 'Logged out', '/softdev/end.php'),
(250, '::1', 'vsalfafara', '2017-03-09 15:57:47', 'Logged in', '/softdev/login.php'),
(251, '::1', 'vsalfafara', '2017-03-09 16:02:07', 'Logged out', '/softdev/end.php'),
(252, '::1', 'vsalfafara', '2017-03-09 16:06:21', 'Logged in', '/softdev/login.php'),
(253, '::1', 'vsalfafara', '2017-03-13 14:33:41', 'Logged in', '/softdev/login.php'),
(254, '::1', 'vsalfafara', '2017-03-13 14:33:50', 'Logged out', '/softdev/end.php'),
(255, '::1', 'root', '2017-03-13 14:33:55', 'Logged in', '/softdev/login.php'),
(256, '::1', 'root', '2017-03-13 14:34:15', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(257, '::1', 'root', '2017-03-13 14:34:16', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Add refsubjectofferinghdr\n    [2] => modules/ref/subjectoffering/hdr/add_refsubjectofferinghdr.php\n    [3] => Add Refsubjectofferinghdr\n    [4] => \n    [5] => 5\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 61\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(258, '::1', 'root', '2017-03-13 14:34:21', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(259, '::1', 'root', '2017-03-13 14:34:22', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Edit refsubjectofferinghdr\n    [2] => modules/ref/subjectoffering/hdr/edit_refsubjectofferinghdr.php\n    [3] => Edit Refsubjectofferinghdr\n    [4] => \n    [5] => 5\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 62\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(260, '::1', 'root', '2017-03-13 14:34:26', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(261, '::1', 'root', '2017-03-13 14:34:26', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => View refsubjectofferinghdr\n    [2] => modules/ref/subjectoffering/hdr/listview_refsubjectofferinghdr.php\n    [3] => Subject Offering Header\n    [4] => \n    [5] => 5\n    [6] => Yes\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 63\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(262, '::1', 'root', '2017-03-13 14:34:31', 'Pressed submit button', '/softdev/sysadmin/edit_user_links.php'),
(263, '::1', 'root', '2017-03-13 14:34:33', 'Query Executed: UPDATE user_links SET name = ?, target = ?, descriptive_title = ?, description = ?, passport_group_id = ?, show_in_tasklist = ?, status = ?, icon = ?, priority = ? WHERE link_id = ?\r\nArray\n(\n    [0] => ssssisssii\n    [1] => Delete refsubjectofferinghdr\n    [2] => modules/ref/subjectoffering/hdr/delete_refsubjectofferinghdr.php\n    [3] => Delete Refsubjectofferinghdr\n    [4] => \n    [5] => 5\n    [6] => No\n    [7] => On\n    [8] => form3.png\n    [9] => 0\n    [10] => 64\n)\n', '/softdev/sysadmin/edit_user_links.php'),
(264, '::1', 'root', '2017-03-13 14:34:56', 'Query executed: DELETE FROM user_role_links WHERE role_id=\'3\' AND link_id IN (\'61\',\'62\',\'63\',\'64\',\'73\',\'74\',\'75\')', '/softdev/sysadmin/role_permissions.php'),
(265, '::1', 'root', '2017-03-13 14:34:56', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'75\')', '/softdev/sysadmin/role_permissions.php'),
(266, '::1', 'root', '2017-03-13 14:34:56', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'63\')', '/softdev/sysadmin/role_permissions.php'),
(267, '::1', 'root', '2017-03-13 14:34:58', 'Logged out', '/softdev/end.php'),
(268, '::1', 'vsalfafara', '2017-03-13 14:35:02', 'Logged in', '/softdev/login.php'),
(269, '::1', 'vsalfafara', '2017-03-13 14:35:06', 'Logged out', '/softdev/end.php'),
(270, '::1', 'root', '2017-03-13 14:35:15', 'Logged in', '/softdev/login.php'),
(271, '::1', 'root', '2017-03-13 14:35:37', 'Query executed: DELETE FROM user_passport WHERE username=\'vsalfafara\'', '/softdev/sysadmin/set_user_passports.php'),
(272, '::1', 'root', '2017-03-13 14:35:37', 'Query executed: INSERT INTO user_passport(username, link_id) VALUES(\'vsalfafara\', \'37\'),(\'vsalfafara\', \'69\'),(\'vsalfafara\', \'77\'),(\'vsalfafara\', \'39\'),(\'vsalfafara\', \'40\'),(\'vsalfafara\', \'52\'),(\'vsalfafara\', \'72\'),(\'vsalfafara\', \'80\'),(\'vsalfafara\', \'38\'),(\'vsalfafara\', \'46\'),(\'vsalfafara\', \'50\'),(\'vsalfafara\', \'70\'),(\'vsalfafara\', \'47\'),(\'vsalfafara\', \'51\'),(\'vsalfafara\', \'71\'),(\'vsalfafara\', \'75\'),(\'vsalfafara\', \'63\'),(\'vsalfafara\', \'79\')', '/softdev/sysadmin/set_user_passports.php'),
(273, '::1', 'root', '2017-03-13 14:35:37', 'Query executed: UPDATE user SET role_id=\'0\' WHERE username=\'vsalfafara\'', '/softdev/sysadmin/set_user_passports.php'),
(274, '::1', 'root', '2017-03-13 14:35:44', 'Pressed cancel button', '/softdev/sysadmin/role_permissions_cascade.php'),
(275, '::1', 'root', '2017-03-13 14:35:46', 'Logged out', '/softdev/end.php'),
(276, '::1', 'vsalfafara', '2017-03-13 14:35:50', 'Logged in', '/softdev/login.php'),
(277, '::1', 'vsalfafara', '2017-03-13 14:35:57', 'Logged out', '/softdev/end.php'),
(278, '::1', 'root', '2017-03-13 14:36:08', 'Logged in', '/softdev/login.php'),
(279, '::1', 'root', '2017-03-13 14:36:28', 'Query executed: DELETE FROM user_passport WHERE username=\'vsalfafara\'', '/softdev/sysadmin/set_user_passports.php'),
(280, '::1', 'root', '2017-03-13 14:36:29', 'Query executed: INSERT INTO user_passport(username, link_id) VALUES(\'vsalfafara\', \'37\'),(\'vsalfafara\', \'61\'),(\'vsalfafara\', \'69\'),(\'vsalfafara\', \'77\'),(\'vsalfafara\', \'39\'),(\'vsalfafara\', \'40\'),(\'vsalfafara\', \'52\'),(\'vsalfafara\', \'72\'),(\'vsalfafara\', \'80\'),(\'vsalfafara\', \'38\'),(\'vsalfafara\', \'46\'),(\'vsalfafara\', \'50\'),(\'vsalfafara\', \'70\'),(\'vsalfafara\', \'47\'),(\'vsalfafara\', \'51\'),(\'vsalfafara\', \'71\'),(\'vsalfafara\', \'75\'),(\'vsalfafara\', \'63\'),(\'vsalfafara\', \'79\')', '/softdev/sysadmin/set_user_passports.php'),
(281, '::1', 'root', '2017-03-13 14:36:29', 'Query executed: UPDATE user SET role_id=\'0\' WHERE username=\'vsalfafara\'', '/softdev/sysadmin/set_user_passports.php'),
(282, '::1', 'root', '2017-03-13 14:36:31', 'Logged out', '/softdev/end.php'),
(283, '::1', 'vsalfafara', '2017-03-13 14:36:34', 'Logged in', '/softdev/login.php'),
(284, '::1', 'vsalfafara', '2017-03-13 14:40:51', 'Logged out', '/softdev/end.php'),
(285, '::1', 'root', '2017-03-13 14:40:56', 'Logged in', '/softdev/login.php'),
(286, '::1', 'root', '2017-03-13 14:49:08', 'Logged in', '/softdev/login.php'),
(287, '::1', 'root', '2017-03-13 15:09:29', 'Logged in', '/softdev/login.php'),
(288, '::1', 'root', '2017-03-13 15:17:21', 'Logged in', '/softdev/login.php'),
(289, '::1', 'root', '2017-03-13 15:18:49', 'Pressed cancel button', '/softdev/sysadmin/listview_user_links.php'),
(290, '::1', 'root', '2017-03-13 15:22:12', 'Logged out', '/softdev/end.php'),
(291, '::1', 'root', '2017-03-13 15:22:15', 'Logged in', '/softdev/login.php'),
(292, '::1', 'root', '2017-03-13 15:31:41', 'Logged in', '/softdev/login.php'),
(293, '::1', 'root', '2017-03-13 15:47:49', 'Logged in', '/softdev/login.php'),
(294, '::1', 'root', '2017-03-13 15:50:52', 'Logged in', '/softdev/login.php'),
(295, '::1', 'root', '2017-03-13 16:27:35', 'Pressed submit button', '/softdev/modules/employee/add_employee.php'),
(296, '::1', 'root', '2017-03-13 16:56:26', 'Pressed submit button', '/softdev/sysadmin/add_user_links.php'),
(297, '::1', 'root', '2017-03-13 16:56:26', 'Query Executed: INSERT INTO user_links(link_id, name, target, descriptive_title, description, passport_group_id, show_in_tasklist, status, icon, priority) VALUES(?,?,?,?,?,?,?,?,?,?)\r\nArray\n(\n    [0] => issssisssi\n    [1] => \n    [2] => Faculty Loading\n    [3] => modules/facultyloading/facultyloading.php\n    [4] => Faculty Loading\n    [5] => desc\n    [6] => 1\n    [7] => Yes\n    [8] => On\n    [9] => blue_folder3.png\n    [10] => 1\n)\n', '/softdev/sysadmin/add_user_links.php'),
(298, '::1', 'root', '2017-03-13 16:56:51', 'Query executed: DELETE FROM user_role_links WHERE role_id=\'3\' AND link_id IN (\'41\',\'42\',\'43\',\'44\',\'49\',\'50\',\'51\',\'52\',\'53\',\'54\',\'55\',\'56\',\'57\',\'58\',\'59\',\'60\',\'65\',\'66\',\'67\',\'68\',\'81\',\'82\',\'83\',\'84\',\'85\',\'86\',\'87\',\'88\',\'89\')', '/softdev/sysadmin/role_permissions.php'),
(299, '::1', 'root', '2017-03-13 16:56:52', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'52\')', '/softdev/sysadmin/role_permissions.php'),
(300, '::1', 'root', '2017-03-13 16:56:52', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'50\')', '/softdev/sysadmin/role_permissions.php'),
(301, '::1', 'root', '2017-03-13 16:56:52', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'51\')', '/softdev/sysadmin/role_permissions.php'),
(302, '::1', 'root', '2017-03-13 16:56:52', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'3\', \'89\')', '/softdev/sysadmin/role_permissions.php'),
(303, '::1', 'root', '2017-03-13 16:57:05', 'Pressed cancel button', '/softdev/sysadmin/role_permissions_cascade.php'),
(304, '::1', 'root', '2017-03-13 16:57:19', 'Query executed: DELETE FROM user_role_links WHERE role_id=\'1\' AND link_id IN (\'41\',\'42\',\'43\',\'44\',\'49\',\'50\',\'51\',\'52\',\'53\',\'54\',\'55\',\'56\',\'57\',\'58\',\'59\',\'60\',\'65\',\'66\',\'67\',\'68\',\'81\',\'82\',\'83\',\'84\',\'85\',\'86\',\'87\',\'88\',\'89\')', '/softdev/sysadmin/role_permissions.php'),
(305, '::1', 'root', '2017-03-13 16:57:19', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'41\')', '/softdev/sysadmin/role_permissions.php'),
(306, '::1', 'root', '2017-03-13 16:57:20', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'49\')', '/softdev/sysadmin/role_permissions.php'),
(307, '::1', 'root', '2017-03-13 16:57:20', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'53\')', '/softdev/sysadmin/role_permissions.php'),
(308, '::1', 'root', '2017-03-13 16:57:20', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'57\')', '/softdev/sysadmin/role_permissions.php'),
(309, '::1', 'root', '2017-03-13 16:57:21', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'65\')', '/softdev/sysadmin/role_permissions.php'),
(310, '::1', 'root', '2017-03-13 16:57:21', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'81\')', '/softdev/sysadmin/role_permissions.php'),
(311, '::1', 'root', '2017-03-13 16:57:21', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'85\')', '/softdev/sysadmin/role_permissions.php'),
(312, '::1', 'root', '2017-03-13 16:57:21', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'43\')', '/softdev/sysadmin/role_permissions.php'),
(313, '::1', 'root', '2017-03-13 16:57:22', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'44\')', '/softdev/sysadmin/role_permissions.php'),
(314, '::1', 'root', '2017-03-13 16:57:22', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'52\')', '/softdev/sysadmin/role_permissions.php'),
(315, '::1', 'root', '2017-03-13 16:57:22', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'56\')', '/softdev/sysadmin/role_permissions.php'),
(316, '::1', 'root', '2017-03-13 16:57:23', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'60\')', '/softdev/sysadmin/role_permissions.php'),
(317, '::1', 'root', '2017-03-13 16:57:23', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'68\')', '/softdev/sysadmin/role_permissions.php'),
(318, '::1', 'root', '2017-03-13 16:57:24', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'84\')', '/softdev/sysadmin/role_permissions.php'),
(319, '::1', 'root', '2017-03-13 16:57:24', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'88\')', '/softdev/sysadmin/role_permissions.php'),
(320, '::1', 'root', '2017-03-13 16:57:24', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'42\')', '/softdev/sysadmin/role_permissions.php'),
(321, '::1', 'root', '2017-03-13 16:57:25', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'50\')', '/softdev/sysadmin/role_permissions.php'),
(322, '::1', 'root', '2017-03-13 16:57:25', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'54\')', '/softdev/sysadmin/role_permissions.php'),
(323, '::1', 'root', '2017-03-13 16:57:25', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'58\')', '/softdev/sysadmin/role_permissions.php'),
(324, '::1', 'root', '2017-03-13 16:57:25', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'66\')', '/softdev/sysadmin/role_permissions.php'),
(325, '::1', 'root', '2017-03-13 16:57:26', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'82\')', '/softdev/sysadmin/role_permissions.php'),
(326, '::1', 'root', '2017-03-13 16:57:26', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'86\')', '/softdev/sysadmin/role_permissions.php'),
(327, '::1', 'root', '2017-03-13 16:57:26', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'51\')', '/softdev/sysadmin/role_permissions.php'),
(328, '::1', 'root', '2017-03-13 16:57:26', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'89\')', '/softdev/sysadmin/role_permissions.php'),
(329, '::1', 'root', '2017-03-13 16:57:27', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'55\')', '/softdev/sysadmin/role_permissions.php'),
(330, '::1', 'root', '2017-03-13 16:57:27', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'59\')', '/softdev/sysadmin/role_permissions.php'),
(331, '::1', 'root', '2017-03-13 16:57:27', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'83\')', '/softdev/sysadmin/role_permissions.php'),
(332, '::1', 'root', '2017-03-13 16:57:28', 'Query executed: INSERT INTO user_role_links(role_id, link_id) VALUES(\'1\', \'67\')', '/softdev/sysadmin/role_permissions.php'),
(333, '::1', 'root', '2017-03-13 16:57:38', 'Query executed: DELETE FROM user_passport WHERE username IN (\'root\')', '/softdev/sysadmin/role_permissions_cascade.php'),
(334, '::1', 'root', '2017-03-13 16:57:39', 'Query executed: INSERT `user_passport` SELECT \'root\', `link_id` FROM user_role_links WHERE role_id=\'1\'', '/softdev/sysadmin/role_permissions_cascade.php'),
(335, '::1', 'root', '2017-03-13 16:57:41', 'Pressed cancel button', '/softdev/sysadmin/role_permissions_cascade.php'),
(336, '::1', 'root', '2017-03-13 16:57:42', 'ILLEGAL ACCESS ATTEMPT - Tried to access \'/softdev/sysadmin/listview_user_role.php\' without sufficient privileges.', '/softdev/sysadmin/listview_user_role.php'),
(337, '::1', 'root', '2017-03-13 16:57:47', 'Logged in', '/softdev/login.php'),
(338, '::1', 'root', '2017-03-15 08:57:38', 'Logged in', '/softdev/login.php'),
(339, '::1', 'root', '2017-03-15 09:07:17', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(340, '::1', 'root', '2017-03-15 09:16:02', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(341, '::1', 'root', '2017-03-15 09:16:14', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(342, '::1', 'root', '2017-03-15 09:17:07', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(343, '::1', 'root', '2017-03-15 09:18:15', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(344, '::1', 'root', '2017-03-15 09:20:02', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(345, '::1', 'root', '2017-03-15 09:20:11', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(346, '::1', 'root', '2017-03-15 09:23:44', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(347, '::1', 'root', '2017-03-15 09:25:32', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(348, '::1', 'root', '2017-03-15 09:26:24', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(349, '::1', 'root', '2017-03-15 09:27:24', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(350, '::1', 'root', '2017-03-15 09:28:40', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(351, '::1', 'root', '2017-03-15 09:28:47', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(352, '::1', 'root', '2017-03-15 09:29:23', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(353, '::1', 'root', '2017-03-15 09:29:26', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(354, '::1', 'root', '2017-03-15 09:35:20', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(355, '::1', 'root', '2017-03-15 09:35:37', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(356, '::1', 'root', '2017-03-15 09:36:20', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(357, '::1', 'root', '2017-03-15 09:36:21', 'Query Executed: INSERT INTO employee(emp_last_name, emp_first_name) VALUES(?,?)\r\nArray\n(\n    [0] => ss\n    [1] => \n    [2] => \n)\n', '/softdev/modules/facultyloading/facultyloading.php'),
(358, '::1', 'root', '2017-03-15 09:37:10', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(359, '::1', 'root', '2017-03-15 09:37:43', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(360, '::1', 'root', '2017-03-15 09:37:43', 'Query Executed: INSERT INTO employee(emp_last_name, emp_first_name) VALUES(?,?)\r\nArray\n(\n    [0] => ss\n    [1] => alfafara\n    [2] => von\n)\n', '/softdev/modules/facultyloading/facultyloading.php'),
(361, '::1', 'root', '2017-03-15 09:37:59', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(362, '::1', 'root', '2017-03-15 09:39:12', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(363, '::1', 'root', '2017-03-15 09:44:30', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(364, '::1', 'root', '2017-03-15 09:44:51', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(365, '::1', 'root', '2017-03-15 09:45:30', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(366, '::1', 'root', '2017-03-15 09:46:53', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(367, '::1', 'root', '2017-03-15 09:47:36', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(368, '::1', 'root', '2017-03-15 09:49:07', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(369, '::1', 'root', '2017-03-15 09:49:31', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(370, '::1', 'root', '2017-03-15 09:50:00', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(371, '::1', 'root', '2017-03-15 09:50:00', 'Query Executed: UPDATE employee SET emp_last_name = ?, emp_first_name = ? WHERE emp_id = ?\r\nArray\n(\n    [0] => ssi\n    [1] => Lopez sample\n    [2] => Kimberly\n    [3] => 2017-00001\n)\n', '/softdev/modules/facultyloading/facultyloading.php'),
(372, '::1', 'root', '2017-03-15 23:04:56', 'Pressed delete button', '/softdev/modules/employee/delete_employee.php'),
(373, '::1', 'root', '2017-03-15 23:04:57', 'Query Executed: DELETE FROM facultyload WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => \n)\n', '/softdev/modules/employee/delete_employee.php'),
(374, '::1', 'root', '2017-03-15 23:04:57', 'Query Executed: DELETE FROM specialization WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => \n)\n', '/softdev/modules/employee/delete_employee.php'),
(375, '::1', 'root', '2017-03-15 23:04:57', 'Query Executed: DELETE FROM availability WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => \n)\n', '/softdev/modules/employee/delete_employee.php'),
(376, '::1', 'root', '2017-03-15 23:04:57', 'Query Executed: DELETE FROM employee WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => \n)\n', '/softdev/modules/employee/delete_employee.php'),
(377, '::1', 'root', '2017-03-15 23:05:17', 'Pressed submit button', '/softdev/modules/employee/edit_employee.php'),
(378, '::1', 'root', '2017-03-15 23:14:31', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(379, '::1', 'root', '2017-03-15 23:24:47', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(380, '::1', 'root', '2017-03-15 23:24:59', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(381, '::1', 'root', '2017-03-16 00:04:42', 'Pressed submit button', '/softdev/modules/specialization/add_specialization.php'),
(382, '::1', 'root', '2017-03-16 00:37:52', 'Pressed submit button', '/softdev/modules/taggedemployee/add_taggedemployee.php'),
(383, '::1', 'root', '2017-03-16 00:37:53', 'Query Executed: INSERT INTO taggedemployee(tag_id, school_year, term, emp_id) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isis\n    [1] => \n    [2] => 2017\n    [3] => 1\n    [4] => 2017-00001\n)\n', '/softdev/modules/taggedemployee/add_taggedemployee.php'),
(384, '::1', 'root', '2017-03-16 00:53:41', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(385, '::1', 'root', '2017-03-16 00:54:03', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(386, '::1', 'root', '2017-03-16 00:54:39', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(387, '::1', 'root', '2017-03-16 00:58:01', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(388, '::1', 'root', '2017-03-16 00:58:19', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(389, '::1', 'root', '2017-03-16 00:58:58', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(390, '::1', 'root', '2017-03-16 00:59:28', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(391, '::1', 'root', '2017-03-16 00:59:45', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(392, '::1', 'root', '2017-03-16 01:02:57', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(393, '::1', 'root', '2017-03-16 01:04:37', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(394, '::1', 'root', '2017-03-16 01:06:17', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(395, '::1', 'root', '2017-03-16 01:06:31', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(396, '::1', 'root', '2017-03-16 01:06:31', 'Query executed: SELECT * FROM `employee`', '/softdev/modules/facultyloading/facultyloading.php'),
(397, '::1', 'root', '2017-03-16 01:08:20', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(398, '::1', 'root', '2017-03-16 01:08:28', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(399, '::1', 'root', '2017-03-16 01:09:41', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(400, '::1', 'root', '2017-03-16 01:09:53', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(401, '::1', 'root', '2017-03-16 01:10:02', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(402, '::1', 'root', '2017-03-16 01:10:07', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(403, '::1', 'root', '2017-03-16 01:10:28', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(404, '::1', 'root', '2017-03-16 01:11:51', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(405, '::1', 'root', '2017-03-16 01:11:51', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(406, '::1', 'root', '2017-03-16 01:12:58', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(407, '::1', 'root', '2017-03-16 01:12:58', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(408, '::1', 'root', '2017-03-16 01:13:22', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(409, '::1', 'root', '2017-03-16 01:13:23', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(410, '::1', 'root', '2017-03-16 01:13:49', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(411, '::1', 'root', '2017-03-16 01:13:49', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(412, '::1', 'root', '2017-03-16 01:13:51', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(413, '::1', 'root', '2017-03-16 01:13:51', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(414, '::1', 'root', '2017-03-16 01:13:53', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(415, '::1', 'root', '2017-03-16 01:13:53', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(416, '::1', 'root', '2017-03-16 01:13:55', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(417, '::1', 'root', '2017-03-16 01:13:55', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(418, '::1', 'root', '2017-03-16 01:14:10', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(419, '::1', 'root', '2017-03-16 01:14:10', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(420, '::1', 'root', '2017-03-16 01:14:41', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(421, '::1', 'root', '2017-03-16 01:14:41', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(422, '::1', 'root', '2017-03-16 01:15:18', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(423, '::1', 'root', '2017-03-16 01:15:18', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(424, '::1', 'root', '2017-03-16 01:17:00', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(425, '::1', 'root', '2017-03-16 01:17:00', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(426, '::1', 'root', '2017-03-16 01:18:32', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(427, '::1', 'root', '2017-03-16 01:18:32', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(428, '::1', 'root', '2017-03-16 01:18:57', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(429, '::1', 'root', '2017-03-16 01:18:57', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(430, '::1', 'root', '2017-03-16 01:19:32', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(431, '::1', 'root', '2017-03-16 01:19:32', 'Query executed: SELECT * FROM `employee` WHERE emp_id = 2017-00001', '/softdev/modules/facultyloading/facultyloading.php'),
(432, '::1', 'root', '2017-03-16 01:20:58', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(433, '::1', 'root', '2017-03-16 01:20:58', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(434, '::1', 'root', '2017-03-16 01:21:17', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(435, '::1', 'root', '2017-03-16 01:21:17', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(436, '::1', 'root', '2017-03-16 01:30:26', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(437, '::1', 'root', '2017-03-16 01:30:26', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(438, '::1', 'root', '2017-03-16 01:30:26', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(439, '::1', 'root', '2017-03-16 01:31:46', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(440, '::1', 'root', '2017-03-16 01:31:46', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(441, '::1', 'root', '2017-03-16 01:31:46', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(442, '::1', 'root', '2017-03-16 01:32:04', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(443, '::1', 'root', '2017-03-16 01:32:05', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(444, '::1', 'root', '2017-03-16 01:32:05', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(445, '::1', 'root', '2017-03-16 01:39:10', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(446, '::1', 'root', '2017-03-16 01:39:10', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(447, '::1', 'root', '2017-03-16 01:39:10', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(448, '::1', 'root', '2017-03-16 01:39:23', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(449, '::1', 'root', '2017-03-16 01:39:23', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(450, '::1', 'root', '2017-03-16 01:39:23', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(451, '::1', 'root', '2017-03-16 01:43:52', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(452, '::1', 'root', '2017-03-16 01:43:52', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(453, '::1', 'root', '2017-03-16 01:43:53', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(454, '::1', 'root', '2017-03-16 01:45:47', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(455, '::1', 'root', '2017-03-16 01:45:47', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(456, '::1', 'root', '2017-03-16 01:46:02', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(457, '::1', 'root', '2017-03-16 01:46:03', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(458, '::1', 'root', '2017-03-16 01:46:03', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(459, '::1', 'root', '2017-03-16 01:47:14', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(460, '::1', 'root', '2017-03-16 01:47:15', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(461, '::1', 'root', '2017-03-16 01:47:15', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(462, '::1', 'root', '2017-03-16 01:48:11', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(463, '::1', 'root', '2017-03-16 01:48:11', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(464, '::1', 'root', '2017-03-16 01:48:12', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(465, '::1', 'root', '2017-03-16 01:48:20', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(466, '::1', 'root', '2017-03-16 01:48:21', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(467, '::1', 'root', '2017-03-16 01:48:21', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(468, '::1', 'root', '2017-03-16 15:41:14', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(469, '::1', 'root', '2017-03-16 15:41:14', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(470, '::1', 'root', '2017-03-16 15:41:14', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(471, '::1', 'root', '2017-03-16 15:41:40', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(472, '::1', 'root', '2017-03-16 15:41:40', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(473, '::1', 'root', '2017-03-16 15:41:41', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(474, '::1', 'root', '2017-03-16 15:46:25', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(475, '::1', 'root', '2017-03-16 15:46:25', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(476, '::1', 'root', '2017-03-16 15:46:25', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(477, '::1', 'root', '2017-03-16 15:46:42', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(478, '::1', 'root', '2017-03-16 15:46:42', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(479, '::1', 'root', '2017-03-16 15:46:42', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(480, '::1', 'root', '2017-03-16 15:56:26', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(481, '::1', 'root', '2017-03-16 15:56:26', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(482, '::1', 'root', '2017-03-16 15:56:26', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(483, '::1', 'root', '2017-03-16 15:59:31', 'Pressed submit button', '/softdev/modules/employee/add_employee.php'),
(484, '::1', 'root', '2017-03-16 16:04:04', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(485, '::1', 'root', '2017-03-16 16:04:04', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(486, '::1', 'root', '2017-03-16 16:04:04', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(487, '::1', 'root', '2017-03-16 16:04:11', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(488, '::1', 'root', '2017-03-16 16:04:11', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(489, '::1', 'root', '2017-03-16 16:04:11', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(490, '::1', 'root', '2017-03-16 16:04:47', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(491, '::1', 'root', '2017-03-16 16:04:48', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(492, '::1', 'root', '2017-03-16 16:04:48', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(493, '::1', 'root', '2017-03-16 16:06:44', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(494, '::1', 'root', '2017-03-16 16:06:44', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(495, '::1', 'root', '2017-03-16 16:06:45', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(496, '::1', 'root', '2017-03-16 16:08:46', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(497, '::1', 'root', '2017-03-16 16:08:46', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(498, '::1', 'root', '2017-03-16 16:08:46', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(499, '::1', 'root', '2017-03-16 16:09:29', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(500, '::1', 'root', '2017-03-16 16:09:31', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(501, '::1', 'root', '2017-03-16 16:09:31', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(502, '::1', 'root', '2017-03-16 16:09:58', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(503, '::1', 'root', '2017-03-16 16:09:58', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(504, '::1', 'root', '2017-03-16 16:09:59', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(505, '::1', 'root', '2017-03-16 16:10:49', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(506, '::1', 'root', '2017-03-16 16:10:50', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(507, '::1', 'root', '2017-03-16 16:10:50', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(508, '::1', 'root', '2017-03-16 16:11:33', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(509, '::1', 'root', '2017-03-16 16:11:34', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(510, '::1', 'root', '2017-03-16 16:11:34', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(511, '::1', 'root', '2017-03-16 16:13:17', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(512, '::1', 'root', '2017-03-16 16:13:18', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(513, '::1', 'root', '2017-03-16 16:13:18', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(514, '::1', 'root', '2017-03-16 16:13:39', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(515, '::1', 'root', '2017-03-16 16:13:39', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(516, '::1', 'root', '2017-03-16 16:13:39', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(517, '::1', 'root', '2017-03-16 16:14:19', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(518, '::1', 'root', '2017-03-16 16:14:19', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(519, '::1', 'root', '2017-03-16 16:14:19', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(520, '::1', 'root', '2017-03-16 16:15:16', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(521, '::1', 'root', '2017-03-16 16:15:16', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(522, '::1', 'root', '2017-03-16 16:15:17', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(523, '::1', 'root', '2017-03-16 16:20:02', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(524, '::1', 'root', '2017-03-16 16:20:02', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(525, '::1', 'root', '2017-03-16 16:20:03', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(526, '::1', 'root', '2017-03-16 16:20:38', 'Pressed submit button', '/softdev/modules/specialization/add_specialization.php'),
(527, '::1', 'root', '2017-03-16 16:22:24', 'Pressed delete button', '/softdev/modules/subject/delete_subject.php'),
(528, '::1', 'root', '2017-03-16 16:22:24', 'Query Executed: DELETE FROM subject WHERE subject_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 2\n)\n', '/softdev/modules/subject/delete_subject.php'),
(529, '::1', 'root', '2017-03-16 16:36:42', 'Pressed submit button', '/softdev/modules/employee/add_employee.php');
INSERT INTO `system_log` (`entry_id`, `ip_address`, `user`, `datetime`, `action`, `module`) VALUES
(530, '::1', 'root', '2017-03-16 16:36:42', 'Query Executed: INSERT INTO employee(emp_id, emp_last_name, emp_first_name, emp_middle_name, email, emp_status, emp_group, address, postal_code, tel_num, mobile_num, hiring_date, resignation_date, gender, civil_status, birth_date, birth_place, religion, is_deleted, ATM_num, BDO_ATM_num, SSS_num, PhilHealth_num, TIN_num, PagIbig_num, specialization_id, tag_id, availability_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)\r\nArray\n(\n    [0] => sssssiissssssssssssssssssiii\n    [1] => 2017-00002\n    [2] => Alfafara\n    [3] => Von\n    [4] => Sogocio\n    [5] => alfafara.vm@gmail.com\n    [6] => 1\n    [7] => 1\n    [8] => aw\n    [9] => 1231\n    [10] => 123\n    [11] => 123\n    [12] => 2017-03-16\n    [13] => 2017-03-16\n    [14] => Male\n    [15] => Married\n    [16] => 2017-03-16\n    [17] => 123\n    [18] => 123\n    [19] => No\n    [20] => 123123\n    [21] => 123\n    [22] => 123123\n    [23] => 123213\n    [24] => 12312\n    [25] => 12312\n    [26] => 312\n    [27] => 123\n    [28] => 123\n)\n', '/softdev/modules/employee/add_employee.php'),
(531, '::1', 'root', '2017-03-16 16:36:43', 'Query Executed: INSERT INTO facultyload(load_id, emp_id, subject_offering_id, date) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isii\n    [1] => \n    [2] => 2017-00002\n    [3] => 123\n    [4] => 123\n)\n', '/softdev/modules/employee/add_employee.php'),
(532, '::1', 'root', '2017-03-16 16:36:44', 'Query Executed: INSERT INTO specialization(specialization_id, emp_id, specialization_name, specialization_desc) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isss\n    [1] => \n    [2] => 2017-00002\n    [3] => Software Engineering\n    [4] => desc\n)\n', '/softdev/modules/employee/add_employee.php'),
(533, '::1', 'root', '2017-03-16 16:36:44', 'Query Executed: INSERT INTO availability(availability_id, emp_id, day, start_time, end_time) VALUES(?,?,?,?,?)\r\nArray\n(\n    [0] => issss\n    [1] => \n    [2] => 2017-00002\n    [3] => MON\n    [4] => 09:00 AM\n    [5] => 04:30 PM\n)\n', '/softdev/modules/employee/add_employee.php'),
(534, '::1', 'root', '2017-03-16 16:37:25', 'Pressed submit button', '/softdev/modules/subject/add_subject.php'),
(535, '::1', 'root', '2017-03-16 16:38:13', 'Pressed submit button', '/softdev/modules/subject/add_subject.php'),
(536, '::1', 'root', '2017-03-16 16:38:40', 'Pressed submit button', '/softdev/modules/subject/add_subject.php'),
(537, '::1', 'root', '2017-03-16 16:41:23', 'Pressed submit button', '/softdev/modules/subject/add_subject.php'),
(538, '::1', 'root', '2017-03-16 16:41:44', 'Logged out', '/softdev/end.php'),
(539, '::1', 'vsalfafara', '2017-03-16 16:43:53', 'Logged in', '/softdev/login.php'),
(540, '::1', 'vsalfafara', '2017-03-16 16:44:06', 'Pressed delete button', '/softdev/modules/availability/delete_availability.php'),
(541, '::1', 'vsalfafara', '2017-03-16 16:44:06', 'Query Executed: DELETE FROM availability WHERE availability_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 1\n)\n', '/softdev/modules/availability/delete_availability.php'),
(542, '::1', 'vsalfafara', '2017-03-16 16:44:34', 'Pressed delete button', '/softdev/modules/specialization/delete_specialization.php'),
(543, '::1', 'vsalfafara', '2017-03-16 16:44:34', 'Query Executed: DELETE FROM subject WHERE specialization_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 1\n)\n', '/softdev/modules/specialization/delete_specialization.php'),
(544, '::1', 'vsalfafara', '2017-03-16 16:44:35', 'Query Executed: DELETE FROM specialization WHERE specialization_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 1\n)\n', '/softdev/modules/specialization/delete_specialization.php'),
(545, '::1', 'vsalfafara', '2017-03-16 16:44:39', 'Pressed delete button', '/softdev/modules/specialization/delete_specialization.php'),
(546, '::1', 'vsalfafara', '2017-03-16 16:44:39', 'Query Executed: DELETE FROM subject WHERE specialization_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 3\n)\n', '/softdev/modules/specialization/delete_specialization.php'),
(547, '::1', 'vsalfafara', '2017-03-16 16:44:39', 'Query Executed: DELETE FROM specialization WHERE specialization_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 3\n)\n', '/softdev/modules/specialization/delete_specialization.php'),
(548, '::1', 'vsalfafara', '2017-03-16 16:46:18', 'Pressed submit button', '/softdev/modules/specialization/add_specialization.php'),
(549, '::1', 'vsalfafara', '2017-03-16 16:46:19', 'Query Executed: INSERT INTO specialization(specialization_id, emp_id, specialization_name, specialization_desc) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isss\n    [1] => \n    [2] => 2017-00001\n    [3] => Database Systems\n    [4] => desc\n)\n', '/softdev/modules/specialization/add_specialization.php'),
(550, '::1', 'vsalfafara', '2017-03-16 16:46:19', 'Query Executed: INSERT INTO subject(subject_id, term_id, subject_code, subject_name, subject_description, unit, pay_unit, compute_GPA, lab_id, group_owner, evaluate_OTE, is_elective, grade_type, accept_substitute, lab_type_id, dept_id, category, assess_note, specialization_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)\r\nArray\n(\n    [0] => iisssssssssssssiisi\n    [1] => \n    [2] => 1\n    [3] => DATAMA1\n    [4] => Database Management 1\n    [5] => desc\n    [6] => 3.0\n    [7] => 1\n    [8] => 1\n    [9] => 1\n    [10] => 1\n    [11] => 1\n    [12] => N\n    [13] => 1\n    [14] => 1\n    [15] => 1\n    [16] => 1\n    [17] => 1\n    [18] => 1\n    [19] => 4\n)\n', '/softdev/modules/specialization/add_specialization.php'),
(551, '::1', 'vsalfafara', '2017-03-16 16:48:04', 'Pressed submit button', '/softdev/modules/specialization/add_specialization.php'),
(552, '::1', 'vsalfafara', '2017-03-16 16:48:55', 'Pressed submit button', '/softdev/modules/specialization/add_specialization.php'),
(553, '::1', 'vsalfafara', '2017-03-16 16:48:55', 'Query Executed: INSERT INTO specialization(specialization_id, emp_id, specialization_name, specialization_desc) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isss\n    [1] => \n    [2] => 2017-00002\n    [3] => Software Engineering\n    [4] => desc\n)\n', '/softdev/modules/specialization/add_specialization.php'),
(554, '::1', 'vsalfafara', '2017-03-16 16:48:55', 'Query Executed: INSERT INTO subject(subject_id, term_id, subject_code, subject_name, subject_description, unit, pay_unit, compute_GPA, lab_id, group_owner, evaluate_OTE, is_elective, grade_type, accept_substitute, lab_type_id, dept_id, category, assess_note, specialization_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)\r\nArray\n(\n    [0] => iisssssssssssssiisi\n    [1] => \n    [2] => 1\n    [3] => PROGCON\n    [4] => Programming Concepts\n    [5] => desc\n    [6] => 3.0\n    [7] => 1\n    [8] => 1\n    [9] => 1\n    [10] => 1\n    [11] => 1\n    [12] => N\n    [13] => 1\n    [14] => 1\n    [15] => 1\n    [16] => 1\n    [17] => 1\n    [18] => 1\n    [19] => 5\n)\n', '/softdev/modules/specialization/add_specialization.php'),
(555, '::1', 'vsalfafara', '2017-03-16 16:48:55', 'Query Executed: INSERT INTO subject(subject_id, term_id, subject_code, subject_name, subject_description, unit, pay_unit, compute_GPA, lab_id, group_owner, evaluate_OTE, is_elective, grade_type, accept_substitute, lab_type_id, dept_id, category, assess_note, specialization_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)\r\nArray\n(\n    [0] => iisssssssssssssiisi\n    [1] => \n    [2] => 1\n    [3] => INPROLA\n    [4] => Introduction to Programming Language\n    [5] => desc\n    [6] => 3.0\n    [7] => 1\n    [8] => 1\n    [9] => 1\n    [10] => 1\n    [11] => 1\n    [12] => N\n    [13] => 1\n    [14] => 1\n    [15] => 1\n    [16] => 1\n    [17] => 1\n    [18] => 1\n    [19] => 5\n)\n', '/softdev/modules/specialization/add_specialization.php'),
(556, '::1', 'vsalfafara', '2017-03-16 16:49:08', 'Pressed delete button', '/softdev/modules/facultyload/delete_facultyload.php'),
(557, '::1', 'vsalfafara', '2017-03-16 16:49:09', 'Query Executed: DELETE FROM refsubjectofferinghdr WHERE load_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 20152\n)\n', '/softdev/modules/facultyload/delete_facultyload.php'),
(558, '::1', 'vsalfafara', '2017-03-16 16:49:09', 'Query Executed: DELETE FROM facultyload WHERE load_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 20152\n)\n', '/softdev/modules/facultyload/delete_facultyload.php'),
(559, '::1', 'vsalfafara', '2017-03-16 16:49:14', 'Logged out', '/softdev/end.php'),
(560, '::1', 'root', '2017-03-16 16:49:18', 'Logged in', '/softdev/login.php'),
(561, '::1', 'root', '2017-03-16 16:49:36', 'Query executed: DELETE FROM user_passport WHERE username=\'vsalfafara\'', '/softdev/sysadmin/set_user_passports.php'),
(562, '::1', 'root', '2017-03-16 16:49:36', 'Query executed: INSERT INTO user_passport(username, link_id) VALUES(\'vsalfafara\', \'37\'),(\'vsalfafara\', \'61\'),(\'vsalfafara\', \'69\'),(\'vsalfafara\', \'77\'),(\'vsalfafara\', \'39\'),(\'vsalfafara\', \'40\'),(\'vsalfafara\', \'52\'),(\'vsalfafara\', \'72\'),(\'vsalfafara\', \'80\'),(\'vsalfafara\', \'38\'),(\'vsalfafara\', \'46\'),(\'vsalfafara\', \'50\'),(\'vsalfafara\', \'70\'),(\'vsalfafara\', \'47\'),(\'vsalfafara\', \'51\'),(\'vsalfafara\', \'89\'),(\'vsalfafara\', \'71\'),(\'vsalfafara\', \'75\'),(\'vsalfafara\', \'63\'),(\'vsalfafara\', \'79\')', '/softdev/sysadmin/set_user_passports.php'),
(563, '::1', 'root', '2017-03-16 16:49:36', 'Query executed: UPDATE user SET role_id=\'0\' WHERE username=\'vsalfafara\'', '/softdev/sysadmin/set_user_passports.php'),
(564, '::1', 'root', '2017-03-16 16:49:38', 'Logged out', '/softdev/end.php'),
(565, '::1', 'vsalfafara', '2017-03-16 16:49:43', 'Logged in', '/softdev/login.php'),
(566, '::1', 'vsalfafara', '2017-03-16 16:49:47', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(567, '::1', 'vsalfafara', '2017-03-16 16:49:47', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(568, '::1', 'vsalfafara', '2017-03-16 16:49:48', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(569, '::1', 'vsalfafara', '2017-03-16 16:53:03', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(570, '::1', 'vsalfafara', '2017-03-16 16:53:04', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(571, '::1', 'vsalfafara', '2017-03-16 16:53:04', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 4', '/softdev/modules/facultyloading/facultyloading.php'),
(572, '::1', 'vsalfafara', '2017-03-16 16:53:17', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(573, '::1', 'vsalfafara', '2017-03-16 16:53:17', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(574, '::1', 'vsalfafara', '2017-03-16 16:53:18', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 4', '/softdev/modules/facultyloading/facultyloading.php'),
(575, '::1', 'vsalfafara', '2017-03-16 16:53:26', 'Logged out', '/softdev/end.php'),
(576, '::1', 'root', '2017-03-16 16:53:32', 'Logged in', '/softdev/login.php'),
(577, '::1', 'root', '2017-03-16 16:53:41', 'Pressed delete button', '/softdev/modules/employee/delete_employee.php'),
(578, '::1', 'root', '2017-03-16 16:53:41', 'Query Executed: DELETE FROM facultyload WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => 2017-00001\n)\n', '/softdev/modules/employee/delete_employee.php'),
(579, '::1', 'root', '2017-03-16 16:53:42', 'Query Executed: DELETE FROM specialization WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => 2017-00001\n)\n', '/softdev/modules/employee/delete_employee.php'),
(580, '::1', 'root', '2017-03-16 16:53:42', 'Query Executed: DELETE FROM availability WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => 2017-00001\n)\n', '/softdev/modules/employee/delete_employee.php'),
(581, '::1', 'root', '2017-03-16 16:53:42', 'Query Executed: DELETE FROM employee WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => 2017-00001\n)\n', '/softdev/modules/employee/delete_employee.php'),
(582, '::1', 'root', '2017-03-16 16:53:46', 'Pressed delete button', '/softdev/modules/employee/delete_employee.php'),
(583, '::1', 'root', '2017-03-16 16:53:46', 'Query Executed: DELETE FROM facultyload WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => 2017-00002\n)\n', '/softdev/modules/employee/delete_employee.php'),
(584, '::1', 'root', '2017-03-16 16:53:46', 'Query Executed: DELETE FROM specialization WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => 2017-00002\n)\n', '/softdev/modules/employee/delete_employee.php'),
(585, '::1', 'root', '2017-03-16 16:53:47', 'Query Executed: DELETE FROM availability WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => 2017-00002\n)\n', '/softdev/modules/employee/delete_employee.php'),
(586, '::1', 'root', '2017-03-16 16:53:47', 'Query Executed: DELETE FROM employee WHERE emp_id = ?\r\nArray\n(\n    [0] => s\n    [1] => 2017-00002\n)\n', '/softdev/modules/employee/delete_employee.php'),
(587, '::1', 'root', '2017-03-16 16:54:00', 'Pressed delete button', '/softdev/modules/subject/delete_subject.php'),
(588, '::1', 'root', '2017-03-16 16:54:00', 'Query Executed: DELETE FROM subject WHERE subject_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 3\n)\n', '/softdev/modules/subject/delete_subject.php'),
(589, '::1', 'root', '2017-03-16 16:54:03', 'Pressed delete button', '/softdev/modules/subject/delete_subject.php'),
(590, '::1', 'root', '2017-03-16 16:54:03', 'Query Executed: DELETE FROM subject WHERE subject_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 4\n)\n', '/softdev/modules/subject/delete_subject.php'),
(591, '::1', 'root', '2017-03-16 16:54:05', 'Pressed delete button', '/softdev/modules/subject/delete_subject.php'),
(592, '::1', 'root', '2017-03-16 16:54:06', 'Query Executed: DELETE FROM subject WHERE subject_id = ?\r\nArray\n(\n    [0] => i\n    [1] => 5\n)\n', '/softdev/modules/subject/delete_subject.php'),
(593, '::1', 'root', '2017-03-16 16:54:30', 'Logged out', '/softdev/end.php'),
(594, '::1', 'root', '2017-03-16 16:54:35', 'Logged in', '/softdev/login.php'),
(595, '::1', 'root', '2017-03-16 17:04:20', 'Pressed submit button', '/softdev/modules/employee/add_employee.php'),
(596, '::1', 'root', '2017-03-16 17:04:21', 'Query Executed: INSERT INTO employee(emp_id, emp_last_name, emp_first_name, emp_middle_name, email, emp_status, emp_group, address, postal_code, tel_num, mobile_num, hiring_date, resignation_date, gender, civil_status, birth_date, birth_place, religion, is_deleted, ATM_num, BDO_ATM_num, SSS_num, PhilHealth_num, TIN_num, PagIbig_num, specialization_id, tag_id, availability_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)\r\nArray\n(\n    [0] => sssssiissssssssssssssssssiii\n    [1] => 2017-00001\n    [2] => Alfafara\n    [3] => Von\n    [4] => Sogocio\n    [5] => alfafara.vm@gmail.com\n    [6] => 2\n    [7] => 2\n    [8] => 2\n    [9] => 2\n    [10] => 2\n    [11] => 2\n    [12] => 2018-03-20\n    [13] => 2018-03-20\n    [14] => Male\n    [15] => Married\n    [16] => 2017-03-16\n    [17] => 2\n    [18] => 2\n    [19] => No\n    [20] => 2\n    [21] => 2\n    [22] => 2\n    [23] => 2\n    [24] => 2\n    [25] => 2\n    [26] => 1\n    [27] => 1\n    [28] => 1\n)\n', '/softdev/modules/employee/add_employee.php'),
(597, '::1', 'root', '2017-03-16 17:04:21', 'Query Executed: INSERT INTO facultyload(load_id, emp_id, subject_offering_id, date) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isii\n    [1] => \n    [2] => 2017-00001\n    [3] => 1\n    [4] => 1\n)\n', '/softdev/modules/employee/add_employee.php'),
(598, '::1', 'root', '2017-03-16 17:04:21', 'Query Executed: INSERT INTO specialization(specialization_id, emp_id, specialization_name, specialization_desc) VALUES(?,?,?,?)\r\nArray\n(\n    [0] => isss\n    [1] => \n    [2] => 2017-00001\n    [3] => Software Engineering\n    [4] => desc\n)\n', '/softdev/modules/employee/add_employee.php'),
(599, '::1', 'root', '2017-03-16 17:04:22', 'Query Executed: INSERT INTO availability(availability_id, emp_id, day, start_time, end_time) VALUES(?,?,?,?,?)\r\nArray\n(\n    [0] => issss\n    [1] => \n    [2] => 2017-00001\n    [3] => MON\n    [4] => 08:30 AM\n    [5] => 12:30 PM\n)\n', '/softdev/modules/employee/add_employee.php'),
(600, '::1', 'root', '2017-03-16 17:07:36', 'Pressed submit button', '/softdev/modules/subject/add_subject.php'),
(601, '::1', 'root', '2017-03-16 17:07:37', 'Query Executed: INSERT INTO subject(subject_id, term_id, subject_code, subject_name, subject_description, unit, pay_unit, compute_GPA, lab_id, group_owner, evaluate_OTE, is_elective, grade_type, accept_substitute, lab_type_id, dept_id, category, assess_note, specialization_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)\r\nArray\n(\n    [0] => iisssssssssssssiisi\n    [1] => \n    [2] => 1\n    [3] => PROGCON\n    [4] => Programming Concepts\n    [5] => desc\n    [6] => 3.0\n    [7] => 1\n    [8] => 1\n    [9] => 1\n    [10] => 1\n    [11] => 1\n    [12] => N\n    [13] => 1\n    [14] => 1\n    [15] => 1\n    [16] => 1\n    [17] => 1\n    [18] => 1\n    [19] => 6\n)\n', '/softdev/modules/subject/add_subject.php'),
(602, '::1', 'root', '2017-03-16 17:08:44', 'Logged out', '/softdev/end.php'),
(603, '::1', 'vsalfafara', '2017-03-16 17:08:48', 'Logged in', '/softdev/login.php'),
(604, '::1', 'vsalfafara', '2017-03-16 17:09:47', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(605, '::1', 'vsalfafara', '2017-03-16 17:09:47', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(606, '::1', 'vsalfafara', '2017-03-16 17:09:48', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(607, '::1', 'vsalfafara', '2017-03-16 17:11:28', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(608, '::1', 'vsalfafara', '2017-03-16 17:11:28', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(609, '::1', 'vsalfafara', '2017-03-16 17:11:28', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(610, '::1', 'vsalfafara', '2017-03-16 17:11:49', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(611, '::1', 'vsalfafara', '2017-03-16 17:11:49', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(612, '::1', 'vsalfafara', '2017-03-16 17:11:49', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(613, '::1', 'vsalfafara', '2017-03-16 17:12:13', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(614, '::1', 'vsalfafara', '2017-03-16 17:12:14', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(615, '::1', 'vsalfafara', '2017-03-16 17:12:14', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(616, '::1', 'vsalfafara', '2017-03-16 17:12:15', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(617, '::1', 'vsalfafara', '2017-03-16 17:12:15', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(618, '::1', 'vsalfafara', '2017-03-16 17:12:15', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(619, '::1', 'vsalfafara', '2017-03-16 17:12:22', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(620, '::1', 'vsalfafara', '2017-03-16 17:12:22', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(621, '::1', 'vsalfafara', '2017-03-16 17:12:23', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(622, '::1', 'vsalfafara', '2017-03-16 17:12:34', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(623, '::1', 'vsalfafara', '2017-03-16 17:12:34', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(624, '::1', 'vsalfafara', '2017-03-16 17:12:34', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(625, '::1', 'root', '2017-03-21 07:31:12', 'Logged in', '/softdev/login.php'),
(626, '::1', 'root', '2017-03-21 07:31:27', 'Logged out', '/softdev/end.php'),
(627, '::1', 'vsalfafara', '2017-03-21 07:31:34', 'Logged in', '/softdev/login.php'),
(628, '::1', 'vsalfafara', '2017-03-21 07:33:26', 'Query executed: SELECT * FROM `taggedemployee`', '/softdev/modules/facultyloading/facultyloading.php'),
(629, '::1', 'vsalfafara', '2017-03-21 07:33:26', 'Query executed: SELECT * FROM `employee` WHERE emp_id = \'2017-00001\'', '/softdev/modules/facultyloading/facultyloading.php'),
(630, '::1', 'vsalfafara', '2017-03-21 07:33:27', 'Query executed: SELECT * FROM `subject` WHERE specialization_id = 1', '/softdev/modules/facultyloading/facultyloading.php'),
(631, '::1', 'root', '2017-03-25 18:39:03', 'Logged in', '/softdev/login.php');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `setting` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`setting`, `value`) VALUES
('Max Attachment Height', '0'),
('Max Attachment Size (MB)', '0'),
('Max Attachment Width', '0'),
('Security Level', 'HIGH');

-- --------------------------------------------------------

--
-- Table structure for table `system_skins`
--

CREATE TABLE `system_skins` (
  `skin_id` int(11) NOT NULL,
  `skin_name` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `master_css` varchar(255) NOT NULL,
  `colors_css` varchar(255) NOT NULL,
  `fonts_css` varchar(255) NOT NULL,
  `override_css` varchar(255) NOT NULL,
  `icon_set` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_skins`
--

INSERT INTO `system_skins` (`skin_id`, `skin_name`, `header`, `footer`, `master_css`, `colors_css`, `fonts_css`, `override_css`, `icon_set`) VALUES
(1, 'Cobalt Default', 'skins/default_header.php', 'skins/default_footer.php', 'cobalt_master.css', 'cobalt_colors.css', 'cobalt_fonts.css', 'cobalt_override.css', 'cobalt'),
(2, 'Cobalt Minimal', 'skins/minimal_header.php', 'skins/minimal_footer.php', 'cobalt_minimal.css', 'cobalt_minimal.css', 'cobalt_minimal.css', 'cobalt_minimal.css', 'cobalt'),
(3, 'After Sunset', 'skins/default_header.php', 'skins/default_footer.php', 'after_sunset_master.css', 'after_sunset_colors.css', 'after_sunset_fonts.css', 'after_sunset_override.css', 'cobalt'),
(4, 'Hello There', 'skins/default_header.php', 'skins/default_footer.php', 'hello_there_master.css', 'hello_there_colors.css', 'hello_there_fonts.css', 'hello_there_override.css', 'cobalt'),
(5, 'Gold Titanium', 'skins/default_header.php', 'skins/default_footer.php', 'gold_titanium_master.css', 'gold_titanium_colors.css', 'gold_titanium_fonts.css', 'gold_titanium_override.css', 'cobalt'),
(6, 'Summer Rain', 'skins/default_header.php', 'skins/default_footer.php', 'summer_rain_master.css', 'summer_rain_colors.css', 'summer_rain_fonts.css', 'summer_rain_override.css', 'cobalt'),
(7, 'Salmon Impression', 'skins/default_header.php', 'skins/default_footer.php', 'salmon_impression_master.css', 'salmon_impression_colors.css', 'salmon_impression_fonts.css', 'salmon_impression_override.css', 'cobalt'),
(8, 'Royal Amethyst', 'skins/default_header.php', 'skins/default_footer.php', 'royal_amethyst_master.css', 'royal_amethyst_colors.css', 'royal_amethyst_fonts.css', 'royal_amethyst_override.css', 'cobalt'),
(9, 'Red Decadence', 'skins/default_header.php', 'skins/default_footer.php', 'red_decadence_master.css', 'red_decadence_colors.css', 'red_decadence_fonts.css', 'red_decadence_override.css', 'cobalt'),
(10, 'Modern Eden', 'skins/default_header.php', 'skins/default_footer.php', 'modern_eden_master.css', 'modern_eden_colors.css', 'modern_eden_fonts.css', 'modern_eden_override.css', 'cobalt'),
(11, 'Warm Teal', 'skins/default_header.php', 'skins/default_footer.php', 'warm_teal_master.css', 'warm_teal_colors.css', 'warm_teal_fonts.css', 'warm_teal_override.css', 'cobalt'),
(12, 'Purple Rain', 'skins/default_header.php', 'skins/default_footer.php', 'purple_rain_master.css', 'purple_rain_colors.css', 'purple_rain_fonts.css', 'purple_rain_override.css', 'cobalt');

-- --------------------------------------------------------

--
-- Table structure for table `taggedemployee`
--

CREATE TABLE `taggedemployee` (
  `tag_id` int(11) NOT NULL,
  `school_year` year(4) NOT NULL,
  `term` tinyint(1) NOT NULL,
  `emp_id` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taggedemployee`
--

INSERT INTO `taggedemployee` (`tag_id`, `school_year`, `term`, `emp_id`) VALUES
(1, 2017, 1, '2017-00001');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(5) UNSIGNED NOT NULL,
  `school_year` year(4) NOT NULL,
  `term` enum('1','2','3','S') NOT NULL DEFAULT '1',
  `term_start` date DEFAULT NULL,
  `term_end` date DEFAULT NULL,
  `reg_start` date DEFAULT NULL,
  `reg_end` date DEFAULT NULL,
  `install1` date NOT NULL,
  `install2` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Masterlist of Term Schedule';

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `school_year`, `term`, `term_start`, `term_end`, `reg_start`, `reg_end`, `install1`, `install2`) VALUES
(1, 1993, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(2, 1993, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(3, 1993, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(4, 1994, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(5, 1994, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(6, 1994, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(7, 1995, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(8, 1995, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(9, 1995, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(10, 1996, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(11, 1996, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(12, 1996, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(13, 1997, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(14, 1997, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(15, 1997, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(16, 1998, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(17, 1998, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(18, 1998, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(19, 1999, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(20, 1999, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(21, 1999, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(22, 2000, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(23, 2000, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(24, 2000, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(25, 2001, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(26, 2001, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(27, 2001, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(28, 2002, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(29, 2002, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(30, 2002, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(31, 2003, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(32, 2003, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(33, 2003, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(34, 1998, 'S', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(35, 2004, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(36, 2004, '2', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(37, 2004, '3', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(38, 2005, '1', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(39, 2005, '2', '2005-09-14', '2005-12-22', '2005-11-15', '2005-12-01', '0000-00-00', '0000-00-00'),
(40, 2005, '3', '2006-01-09', '2006-04-19', '2006-03-13', '2006-03-31', '0000-00-00', '0000-00-00'),
(41, 1999, 'S', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(42, 2000, 'S', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(43, 2006, 'S', '2007-04-23', '2007-05-17', NULL, NULL, '0000-00-00', '0000-00-00'),
(44, 2006, '1', '2006-06-05', '2006-09-08', '2006-08-08', '2006-08-24', '0000-00-00', '0000-00-00'),
(45, 2006, '2', '2006-09-16', '2006-12-22', '2006-11-21', '2006-12-08', '0000-00-00', '0000-00-00'),
(46, 2006, '3', '2007-01-10', '2007-04-19', '2007-03-14', '2007-03-28', '0000-00-00', '0000-00-00'),
(47, 2003, 'S', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(48, 2005, 'S', NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00'),
(49, 2007, '1', '2007-06-06', '2007-09-10', '2007-08-07', '2007-08-22', '0000-00-00', '0000-00-00'),
(50, 2007, '2', '2007-09-17', '2007-12-19', NULL, NULL, '0000-00-00', '0000-00-00'),
(51, 2007, '3', '2008-01-09', '2008-04-17', '2007-11-20', '2007-12-07', '0000-00-00', '0000-00-00'),
(53, 2008, '1', '2008-06-02', '2008-09-16', '2008-08-05', '2008-08-19', '0000-00-00', '0000-00-00'),
(52, 2007, 'S', '2008-04-23', '2008-05-16', '2008-04-19', '2008-04-19', '0000-00-00', '0000-00-00'),
(54, 2008, '2', '2008-09-17', '2008-12-19', '2008-08-05', '2008-08-22', '0000-00-00', '0000-00-00'),
(55, 2008, '3', '2009-01-06', '2009-04-12', '2008-01-01', '2008-01-06', '0000-00-00', '0000-00-00'),
(56, 2008, 'S', '2009-04-27', '2009-05-23', '2009-05-18', '2009-05-23', '0000-00-00', '0000-00-00'),
(57, 2009, '1', '2009-06-04', '2009-09-14', '2009-08-04', '2009-08-19', '0000-00-00', '0000-00-00'),
(58, 2009, '2', '2009-09-22', '2010-01-23', '2009-09-01', '2009-09-14', '0000-00-00', '0000-00-00'),
(59, 2009, '3', '2010-01-25', '2010-05-03', '2009-12-01', '2009-12-16', '0000-00-00', '0000-00-00'),
(61, 2010, '1', '2010-05-31', '2010-09-08', '2010-03-30', '2010-04-17', '2010-07-10', '2010-08-31'),
(60, 2009, 'S', '2010-05-12', '2010-05-29', '2010-05-11', '2010-05-15', '0000-00-00', '0000-00-00'),
(62, 2010, '2', '2010-09-15', '2010-12-22', '2010-08-10', '2010-08-25', '2010-10-25', '2010-12-15'),
(63, 2010, '3', '2011-01-10', '2011-04-16', '2011-03-15', '2011-03-31', '2011-02-16', '2011-04-01'),
(65, 2011, '1', '2011-05-27', '2011-09-13', '2011-03-17', '2011-03-26', '2011-07-16', '2011-09-03'),
(64, 2010, 'S', '2011-04-15', '2011-05-20', '2011-04-30', '2011-05-15', '0000-00-00', '0000-00-00'),
(75, 2013, '2', '2013-09-14', '2013-12-21', '2013-08-05', '2013-08-17', '2013-10-26', '2013-12-17'),
(66, 2011, '2', '2011-09-13', '2011-12-23', '2011-08-16', '2011-08-31', '2011-10-29', '2011-12-16'),
(67, 2011, '3', '2012-01-05', '2012-04-19', '2011-11-22', '2011-12-06', '2012-02-17', '2012-04-12'),
(68, 2011, 'S', '2011-04-23', '2011-05-21', '1999-11-30', '1999-11-30', '0000-00-00', '0000-00-00'),
(69, 2012, '1', '2012-05-29', '2012-09-10', '1999-11-30', '1999-11-30', '2012-07-14', '2012-09-03'),
(70, 2012, '2', '2012-09-11', '2012-12-22', '2012-08-06', '2012-08-18', '2012-10-25', '2012-12-14'),
(73, 2012, '3', '2013-01-07', '2013-05-15', '2012-11-19', '2012-11-29', '2013-02-16', '2013-04-13'),
(74, 2013, '1', '2013-06-05', '2013-09-20', '2013-03-18', '2013-03-27', '2013-07-16', '2013-09-03'),
(76, 2013, '3', '2014-01-03', '2014-04-28', '2013-11-23', '2013-12-04', '2014-02-22', '2014-04-11'),
(77, 2014, '1', '2014-05-09', '2014-09-08', '2014-03-17', '2014-03-29', '2014-07-12', '2014-08-30'),
(78, 2013, 'S', '2014-04-28', '2014-05-21', '2014-04-23', '2014-04-27', '0000-00-00', '0000-00-00'),
(79, 2014, '2', '2014-09-11', '2015-01-04', '2014-11-22', '2014-12-05', '2014-10-28', '2014-12-13'),
(80, 2014, '3', '2015-01-05', '2015-04-22', '2015-03-16', '2015-03-28', '2015-02-20', '2015-04-13'),
(81, 2014, 'S', '2015-04-24', '2015-06-02', '2015-01-15', '2015-01-30', '0000-00-00', '0000-00-00'),
(82, 2015, '1', '2015-06-03', '2015-09-12', '2015-03-16', '2015-03-28', '2015-07-10', '2015-08-28'),
(83, 2015, '2', '2015-09-16', '2016-01-06', '2015-08-03', '2015-08-15', '2015-10-31', '2015-12-16'),
(84, 2015, '3', '2016-01-18', '2016-04-22', '2015-11-23', '2015-12-07', '2016-02-29', '2016-04-19'),
(85, 2015, 'S', '2016-04-27', '2016-05-20', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(86, 2016, '1', '2016-06-06', '2016-09-09', '2016-03-21', '2016-04-02', '2016-07-16', '2016-09-03'),
(87, 2016, '2', '2016-09-19', '2017-01-03', '2016-08-08', '2016-08-20', '2016-10-29', '2016-12-17'),
(88, 2016, '3', '2017-01-09', '2017-04-19', '2016-11-21', '2016-12-05', '2017-02-18', '2017-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `iteration` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `person_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `skin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `salt`, `iteration`, `method`, `person_id`, `role_id`, `skin_id`) VALUES
('root', '$2y$12$YzbCFBfZX5wXO6H8oMeATegS7MbR4eQRXndrmKsDGqgNQlen6geH2', 'YzbCFBfZX5wXO6H8oMeATg', 12, 'blowfish', 1, 1, 6),
('vsalfafara', '$2y$12$CzD/34NBjSbXYJLnYk0UYO6Gy1kRxPd0BFukdmTP6Jn/u2FbM5YZm', 'CzD/34NBjSbXYJLnYk0UYQ', 12, 'blowfish', 2, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_links`
--

CREATE TABLE `user_links` (
  `link_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `descriptive_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `passport_group_id` int(11) NOT NULL,
  `show_in_tasklist` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_links`
--

INSERT INTO `user_links` (`link_id`, `name`, `target`, `descriptive_title`, `description`, `passport_group_id`, `show_in_tasklist`, `status`, `icon`, `priority`) VALUES
(1, 'Module Control', 'sysadmin/module_control.php', 'Module Control', 'Enable or disable system modules', 2, 'Yes', 'On', 'modulecontrol.png', 0),
(2, 'Set User Passports', 'sysadmin/set_user_passports.php', 'Set User Passports', 'Change the passport settings of system users', 2, 'Yes', 'On', 'passport.png', 0),
(3, 'Security Monitor', 'sysadmin/security_monitor.php', 'Security Monitor', 'Examine the system log', 2, 'Yes', 'On', 'security3.png', 0),
(4, 'Add person', 'sysadmin/add_person.php', 'Add Person', '', 2, 'No', 'On', 'form.png', 0),
(5, 'Edit person', 'sysadmin/edit_person.php', 'Edit Person', '', 2, 'No', 'On', 'form.png', 0),
(6, 'View person', 'sysadmin/listview_person.php', 'Person', '', 2, 'Yes', 'On', 'persons.png', 0),
(7, 'Delete person', 'sysadmin/delete_person.php', 'Delete Person', '', 2, 'No', 'On', 'form.png', 0),
(8, 'Add user', 'sysadmin/add_user.php', 'Add User', '', 2, 'No', 'On', 'form.png', 0),
(9, 'Edit user', 'sysadmin/edit_user.php', 'Edit User', '', 2, 'No', 'On', 'form.png', 0),
(10, 'View user', 'sysadmin/listview_user.php', 'User', '', 2, 'Yes', 'On', 'card.png', 0),
(11, 'Delete user', 'sysadmin/delete_user.php', 'Delete User', '', 2, 'No', 'On', 'form.png', 0),
(12, 'Add user role', 'sysadmin/add_user_role.php', 'Add User Role', '', 2, 'No', 'On', 'form.png', 0),
(13, 'Edit user role', 'sysadmin/edit_user_role.php', 'Edit User Role', '', 2, 'No', 'On', 'form.png', 0),
(14, 'View user role', 'sysadmin/listview_user_role.php', 'User Roles', '', 2, 'Yes', 'On', 'roles.png', 0),
(15, 'Delete user role', 'sysadmin/delete_user_role.php', 'Delete User Role', '', 2, 'No', 'On', 'form.png', 0),
(16, 'Add system settings', 'sysadmin/add_system_settings.php', 'Add System Settings', '', 2, 'No', 'On', 'form.png', 0),
(17, 'Edit system settings', 'sysadmin/edit_system_settings.php', 'Edit System Settings', '', 2, 'No', 'On', 'form.png', 0),
(18, 'View system settings', 'sysadmin/listview_system_settings.php', 'System Settings', '', 2, 'Yes', 'On', 'system_settings.png', 0),
(19, 'Delete system settings', 'sysadmin/delete_system_settings.php', 'Delete System Settings', '', 2, 'No', 'On', 'form.png', 0),
(20, 'Add user links', 'sysadmin/add_user_links.php', 'Add User Links', '', 2, 'No', 'On', 'form.png', 0),
(21, 'Edit user links', 'sysadmin/edit_user_links.php', 'Edit User Links', '', 2, 'No', 'On', 'form.png', 0),
(22, 'View user links', 'sysadmin/listview_user_links.php', 'User Links', '', 2, 'Yes', 'On', 'links.png', 0),
(23, 'Delete user links', 'sysadmin/delete_user_links.php', 'Delete User Links', '', 2, 'No', 'On', 'form.png', 0),
(24, 'Add user passport groups', 'sysadmin/add_user_passport_groups.php', 'Add User Passport Groups', '', 2, 'No', 'On', 'form.png', 0),
(25, 'Edit user passport groups', 'sysadmin/edit_user_passport_groups.php', 'Edit User Passport Groups', '', 2, 'No', 'On', 'form.png', 0),
(26, 'View user passport groups', 'sysadmin/listview_user_passport_groups.php', 'User Passport Groups', '', 2, 'Yes', 'On', 'passportgroup.png', 0),
(27, 'Delete user passport groups', 'sysadmin/delete_user_passport_groups.php', 'Delete User Passport Groups', '', 2, 'No', 'On', 'form.png', 0),
(28, 'Add system skins', 'sysadmin/add_system_skins.php', 'Add System Skins', '', 2, 'No', 'On', 'form.png', 0),
(29, 'Edit system skins', 'sysadmin/edit_system_skins.php', 'Edit System Skins', '', 2, 'No', 'On', 'form.png', 0),
(30, 'View system skins', 'sysadmin/listview_system_skins.php', 'System Skins', '', 2, 'Yes', 'On', 'system_skins.png', 0),
(31, 'Delete system skins', 'sysadmin/delete_system_skins.php', 'Delete System Skins', '', 2, 'No', 'On', 'form.png', 0),
(32, 'Reset Password', 'sysadmin/reset_password.php', 'Reset Password', '', 2, 'Yes', 'On', 'lock_big.png', 0),
(33, 'Add cobalt sst', 'sst/add_cobalt_sst.php', 'Add Cobalt SST', '', 2, 'No', 'On', 'form3.png', 0),
(34, 'Edit cobalt sst', 'sst/edit_cobalt_sst.php', 'Edit Cobalt SST', '', 2, 'No', 'On', 'form3.png', 0),
(35, 'View cobalt sst', 'sst/listview_cobalt_sst.php', 'Cobalt SST', '', 2, 'Yes', 'On', 'form3.png', 0),
(36, 'Delete cobalt sst', 'sst/delete_cobalt_sst.php', 'Delete Cobalt SST', '', 2, 'No', 'On', 'form3.png', 0),
(37, 'Add availability', 'modules/availability/add_availability.php', 'Add Availability', '', 4, 'No', 'On', 'form3.png', 0),
(38, 'Edit availability', 'modules/availability/edit_availability.php', 'Edit Availability', '', 4, 'No', 'On', 'form3.png', 0),
(39, 'View availability', 'modules/availability/listview_availability.php', 'Availability', '', 4, 'Yes', 'On', 'form3.png', 0),
(40, 'Delete availability', 'modules/availability/delete_availability.php', 'Delete Availability', '', 4, 'No', 'On', 'form3.png', 0),
(41, 'Add day', 'modules/day/add_day.php', 'Add Day', '', 1, 'No', 'On', 'form3.png', 0),
(42, 'Edit day', 'modules/day/edit_day.php', 'Edit Day', '', 1, 'No', 'On', 'form3.png', 0),
(43, 'View day', 'modules/day/listview_day.php', 'Day', '', 1, 'Yes', 'On', 'form3.png', 0),
(44, 'Delete day', 'modules/day/delete_day.php', 'Delete Day', '', 1, 'No', 'On', 'form3.png', 0),
(45, 'Add employee', 'modules/employee/add_employee.php', 'Add Employee', '', 4, 'No', 'On', 'form3.png', 0),
(46, 'Edit employee', 'modules/employee/edit_employee.php', 'Edit Employee', '', 4, 'No', 'On', 'form3.png', 0),
(47, 'View employee', 'modules/employee/listview_employee.php', 'Employee', '', 4, 'Yes', 'On', 'form3.png', 0),
(48, 'Delete employee', 'modules/employee/delete_employee.php', 'Delete Employee', '', 4, 'No', 'On', 'form3.png', 0),
(49, 'Add facultyload', 'modules/facultyload/add_facultyload.php', 'Add Facultyload', '', 1, 'No', 'On', 'form3.png', 0),
(50, 'Edit facultyload', 'modules/facultyload/edit_facultyload.php', 'Edit Facultyload', '', 1, 'No', 'On', 'form3.png', 0),
(51, 'View facultyload', 'modules/facultyload/listview_facultyload.php', 'Faculty Load', '', 1, 'Yes', 'On', 'form3.png', 0),
(52, 'Delete facultyload', 'modules/facultyload/delete_facultyload.php', 'Delete Facultyload', '', 1, 'No', 'On', 'form3.png', 0),
(53, 'Add otevaluationresultspersection', 'modules/ote/results_per_section/add_otevaluationresultspersection.php', 'Add Otevaluationresultspersection', '', 1, 'No', 'On', 'form3.png', 0),
(54, 'Edit otevaluationresultspersection', 'modules/ote/results_per_section/edit_otevaluationresultspersection.php', 'Edit Otevaluationresultspersection', '', 1, 'No', 'On', 'form3.png', 0),
(55, 'View otevaluationresultspersection', 'modules/ote/results_per_section/listview_otevaluationresultspersection.php', 'OTE Results Per Section', '', 1, 'Yes', 'On', 'form3.png', 0),
(56, 'Delete otevaluationresultspersection', 'modules/ote/results_per_section/delete_otevaluationresultspersection.php', 'Delete Otevaluationresultspersection', '', 1, 'No', 'On', 'form3.png', 0),
(57, 'Add refsubjectofferingdtl', 'modules/ref/subjectoffering/dtl/add_refsubjectofferingdtl.php', 'Add Refsubjectofferingdtl', '', 1, 'No', 'On', 'form3.png', 0),
(58, 'Edit refsubjectofferingdtl', 'modules/ref/subjectoffering/dtl/edit_refsubjectofferingdtl.php', 'Edit Refsubjectofferingdtl', '', 1, 'No', 'On', 'form3.png', 0),
(59, 'View refsubjectofferingdtl', 'modules/ref/subjectoffering/dtl/listview_refsubjectofferingdtl.php', 'Subject Offering Details', '', 1, 'Yes', 'On', 'form3.png', 0),
(60, 'Delete refsubjectofferingdtl', 'modules/ref/subjectoffering/dtl/delete_refsubjectofferingdtl.php', 'Delete Refsubjectofferingdtl', '', 1, 'No', 'On', 'form3.png', 0),
(61, 'Add refsubjectofferinghdr', 'modules/ref/subjectoffering/hdr/add_refsubjectofferinghdr.php', 'Add Refsubjectofferinghdr', '', 5, 'No', 'On', 'form3.png', 0),
(62, 'Edit refsubjectofferinghdr', 'modules/ref/subjectoffering/hdr/edit_refsubjectofferinghdr.php', 'Edit Refsubjectofferinghdr', '', 5, 'No', 'On', 'form3.png', 0),
(63, 'View refsubjectofferinghdr', 'modules/ref/subjectoffering/hdr/listview_refsubjectofferinghdr.php', 'Subject Offering Header', '', 5, 'Yes', 'On', 'form3.png', 0),
(64, 'Delete refsubjectofferinghdr', 'modules/ref/subjectoffering/hdr/delete_refsubjectofferinghdr.php', 'Delete Refsubjectofferinghdr', '', 5, 'No', 'On', 'form3.png', 0),
(65, 'Add reftermperiod', 'modules/ref/termperiod/add_reftermperiod.php', 'Add Reftermperiod', '', 1, 'No', 'On', 'form3.png', 0),
(66, 'Edit reftermperiod', 'modules/ref/termperiod/edit_reftermperiod.php', 'Edit Reftermperiod', '', 1, 'No', 'On', 'form3.png', 0),
(67, 'View reftermperiod', 'modules/ref/termperiod/listview_reftermperiod.php', 'Term Period', '', 1, 'Yes', 'On', 'form3.png', 0),
(68, 'Delete reftermperiod', 'modules/ref/termperiod/delete_reftermperiod.php', 'Delete Reftermperiod', '', 1, 'No', 'On', 'form3.png', 0),
(69, 'Add specialization', 'modules/specialization/add_specialization.php', 'Add Specialization', '', 4, 'No', 'On', 'form3.png', 0),
(70, 'Edit specialization', 'modules/specialization/edit_specialization.php', 'Edit Specialization', '', 4, 'No', 'On', 'form3.png', 0),
(71, 'View specialization', 'modules/specialization/listview_specialization.php', 'Specialization', '', 4, 'Yes', 'On', 'form3.png', 0),
(72, 'Delete specialization', 'modules/specialization/delete_specialization.php', 'Delete Specialization', '', 4, 'No', 'On', 'form3.png', 0),
(73, 'Add subject', 'modules/subject/add_subject.php', 'Add Subject', '', 5, 'No', 'On', 'form3.png', 0),
(74, 'Edit subject', 'modules/subject/edit_subject.php', 'Edit Subject', '', 5, 'No', 'On', 'form3.png', 0),
(75, 'View subject', 'modules/subject/listview_subject.php', 'Subject', '', 5, 'Yes', 'On', 'form3.png', 0),
(76, 'Delete subject', 'modules/subject/delete_subject.php', 'Delete Subject', '', 4, 'No', 'On', 'form3.png', 0),
(77, 'Add taggedemployee', 'modules/taggedemployee/add_taggedemployee.php', 'Add Taggedemployee', '', 4, 'No', 'On', 'form3.png', 0),
(78, 'Edit taggedemployee', 'modules/taggedemployee/edit_taggedemployee.php', 'Edit Taggedemployee', '', 4, 'No', 'On', 'form3.png', 0),
(79, 'View taggedemployee', 'modules/taggedemployee/listview_taggedemployee.php', 'Tagged Employee', '', 4, 'Yes', 'On', 'form3.png', 0),
(80, 'Delete taggedemployee', 'modules/taggedemployee/delete_taggedemployee.php', 'Delete Taggedemployee', '', 4, 'No', 'On', 'form3.png', 0),
(81, 'Add term', 'modules/term/add_term.php', 'Add Term', '', 1, 'No', 'On', 'form3.png', 0),
(82, 'Edit term', 'modules/term/edit_term.php', 'Edit Term', '', 1, 'No', 'On', 'form3.png', 0),
(83, 'View term', 'modules/term/listview_term.php', 'Term', '', 1, 'Yes', 'On', 'form3.png', 0),
(84, 'Delete term', 'modules/term/delete_term.php', 'Delete Term', '', 1, 'No', 'On', 'form3.png', 0),
(85, 'Add time', 'modules/time/add_time.php', 'Add Time', '', 1, 'No', 'On', 'form3.png', 0),
(86, 'Edit time', 'modules/time/edit_time.php', 'Edit Time', '', 1, 'No', 'On', 'form3.png', 0),
(87, 'View time', 'modules/time/listview_time.php', 'Time', '', 1, 'Yes', 'On', 'form3.png', 0),
(88, 'Delete time', 'modules/time/delete_time.php', 'Delete Time', '', 1, 'No', 'On', 'form3.png', 0),
(89, 'Faculty Loading', 'modules/facultyloading/facultyloading.php', 'Faculty Loading', 'desc', 1, 'Yes', 'On', 'blue_folder3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_passport`
--

CREATE TABLE `user_passport` (
  `username` varchar(255) NOT NULL,
  `link_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_passport`
--

INSERT INTO `user_passport` (`username`, `link_id`) VALUES
('root', 1),
('root', 2),
('root', 3),
('root', 4),
('root', 5),
('root', 6),
('root', 7),
('root', 8),
('root', 9),
('root', 11),
('root', 12),
('root', 13),
('root', 15),
('root', 16),
('root', 17),
('root', 18),
('root', 19),
('root', 20),
('root', 21),
('root', 23),
('root', 24),
('root', 25),
('root', 27),
('root', 28),
('root', 29),
('root', 30),
('root', 31),
('root', 32),
('root', 33),
('root', 34),
('root', 35),
('root', 36),
('root', 37),
('root', 38),
('root', 39),
('root', 40),
('root', 41),
('root', 42),
('root', 43),
('root', 44),
('root', 45),
('root', 46),
('root', 47),
('root', 48),
('root', 49),
('root', 50),
('root', 51),
('root', 52),
('root', 53),
('root', 54),
('root', 55),
('root', 56),
('root', 57),
('root', 58),
('root', 59),
('root', 60),
('root', 61),
('root', 62),
('root', 63),
('root', 64),
('root', 65),
('root', 66),
('root', 67),
('root', 68),
('root', 69),
('root', 70),
('root', 71),
('root', 72),
('root', 73),
('root', 74),
('root', 75),
('root', 76),
('root', 77),
('root', 78),
('root', 79),
('root', 80),
('root', 81),
('root', 82),
('root', 83),
('root', 84),
('root', 85),
('root', 86),
('root', 88),
('root', 89),
('vsalfafara', 37),
('vsalfafara', 38),
('vsalfafara', 39),
('vsalfafara', 40),
('vsalfafara', 46),
('vsalfafara', 47),
('vsalfafara', 50),
('vsalfafara', 51),
('vsalfafara', 52),
('vsalfafara', 61),
('vsalfafara', 63),
('vsalfafara', 69),
('vsalfafara', 70),
('vsalfafara', 71),
('vsalfafara', 72),
('vsalfafara', 75),
('vsalfafara', 77),
('vsalfafara', 79),
('vsalfafara', 80),
('vsalfafara', 89);

-- --------------------------------------------------------

--
-- Table structure for table `user_passport_groups`
--

CREATE TABLE `user_passport_groups` (
  `passport_group_id` int(11) NOT NULL,
  `passport_group` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_passport_groups`
--

INSERT INTO `user_passport_groups` (`passport_group_id`, `passport_group`, `priority`, `icon`) VALUES
(1, 'Modules', 0, 'blue_folder3.png'),
(2, 'Admin', 0, 'preferences-system.png'),
(4, 'Employee Data', 2, 'blue_folder3.png'),
(5, 'Subject Data', 1, 'blue_folder3.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`, `description`) VALUES
(1, 'Super Admin', 'Super admin role with 100% system privileges'),
(2, 'System Admin', 'System admin role with all sysadmin permissions'),
(3, 'Program Head', 'desc');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_links`
--

CREATE TABLE `user_role_links` (
  `role_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role_links`
--

INSERT INTO `user_role_links` (`role_id`, `link_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 11),
(1, 12),
(1, 13),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 23),
(1, 24),
(1, 25),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 88),
(1, 89),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 46),
(3, 47),
(3, 50),
(3, 51),
(3, 52),
(3, 63),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(3, 75),
(3, 77),
(3, 79),
(3, 80),
(3, 89);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`availability_id`);

--
-- Indexes for table `cobalt_reporter`
--
ALTER TABLE `cobalt_reporter`
  ADD PRIMARY KEY (`module_name`,`report_name`);

--
-- Indexes for table `cobalt_sst`
--
ALTER TABLE `cobalt_sst`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `facultyload`
--
ALTER TABLE `facultyload`
  ADD PRIMARY KEY (`load_id`);

--
-- Indexes for table `otevaluationresultspersection`
--
ALTER TABLE `otevaluationresultspersection`
  ADD PRIMARY KEY (`period`,`target_id`,`subject_code`,`section`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `refsubjectofferingdtl`
--
ALTER TABLE `refsubjectofferingdtl`
  ADD UNIQUE KEY `subject_offering_id` (`subject_offering_id`,`time`,`day`,`room`);

--
-- Indexes for table `refsubjectofferinghdr`
--
ALTER TABLE `refsubjectofferinghdr`
  ADD PRIMARY KEY (`subject_offering_id`);

--
-- Indexes for table `reftermperiod`
--
ALTER TABLE `reftermperiod`
  ADD PRIMARY KEY (`term_id`,`period`),
  ADD UNIQUE KEY `term_id` (`term_id`,`period`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specialization_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `system_log`
--
ALTER TABLE `system_log`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`setting`);

--
-- Indexes for table `system_skins`
--
ALTER TABLE `system_skins`
  ADD PRIMARY KEY (`skin_id`);

--
-- Indexes for table `taggedemployee`
--
ALTER TABLE `taggedemployee`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`),
  ADD UNIQUE KEY `school_year` (`school_year`,`term`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_links`
--
ALTER TABLE `user_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `user_passport`
--
ALTER TABLE `user_passport`
  ADD PRIMARY KEY (`username`,`link_id`);

--
-- Indexes for table `user_passport_groups`
--
ALTER TABLE `user_passport_groups`
  ADD PRIMARY KEY (`passport_group_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_role_links`
--
ALTER TABLE `user_role_links`
  ADD PRIMARY KEY (`role_id`,`link_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `availability_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cobalt_sst`
--
ALTER TABLE `cobalt_sst`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facultyload`
--
ALTER TABLE `facultyload`
  MODIFY `load_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20154;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `refsubjectofferinghdr`
--
ALTER TABLE `refsubjectofferinghdr`
  MODIFY `subject_offering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19647;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specialization_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `system_log`
--
ALTER TABLE `system_log`
  MODIFY `entry_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=632;
--
-- AUTO_INCREMENT for table `system_skins`
--
ALTER TABLE `system_skins`
  MODIFY `skin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `taggedemployee`
--
ALTER TABLE `taggedemployee`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `user_links`
--
ALTER TABLE `user_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `user_passport_groups`
--
ALTER TABLE `user_passport_groups`
  MODIFY `passport_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
