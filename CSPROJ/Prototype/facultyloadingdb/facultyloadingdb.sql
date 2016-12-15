-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 02:49 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `facultyloadingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`empid` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `emp_first_name` varchar(25) NOT NULL,
  `emp_last_name` varchar(25) NOT NULL,
  `emp_middle_name` varchar(25) NOT NULL,
  `emp_type` enum('full-time','part-time') DEFAULT NULL,
  `specialization` int(10) NOT NULL,
  `ote` decimal(4,0) DEFAULT NULL,
  `MTH` enum('y','n') NOT NULL,
  `TF` enum('y','n') NOT NULL,
  `seven_thirty` enum('y','n') NOT NULL,
  `nine_thirty` enum('y','n') NOT NULL,
  `eleven_thirty` enum('y','n') NOT NULL,
  `one_thirty` enum('y','n') NOT NULL,
  `three_thirty` enum('y','n') NOT NULL,
  `tagged` enum('checked','unchecked') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `username`, `emp_first_name`, `emp_last_name`, `emp_middle_name`, `emp_type`, `specialization`, `ote`, `MTH`, `TF`, `seven_thirty`, `nine_thirty`, `eleven_thirty`, `one_thirty`, `three_thirty`, `tagged`) VALUES
(6, 'ldlazaro', 'Gabrielle', 'Lazaro', '', 'full-time', 1, '6', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'checked'),
(7, 'jgjauod', 'Jameiah', 'Jauod', '', 'full-time', 2, '7', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'checked'),
(8, 'vsalfafara', 'Von', 'Alfafara', 'Sogocio', 'part-time', 3, '4', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'unchecked'),
(9, 'raochotorena', 'Rafael', 'Ochotorena', '', 'part-time', 4, '5', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'unchecked'),
(10, 'aabaldovino', 'Allen', 'Baldovino', '', 'part-time', 5, '8', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'checked'),
(11, 'rhear', 'Rhea', 'Valbuena', '', 'full-time', 2, '7', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'unchecked');

-- --------------------------------------------------------

--
-- Table structure for table `load`
--

CREATE TABLE IF NOT EXISTS `load` (
`loadID` int(11) NOT NULL,
  `facultyID` int(11) NOT NULL,
  `faculty_first_name` varchar(100) NOT NULL,
  `faculty_middle_name` varchar(100) NOT NULL,
  `faculty_last_name` varchar(100) NOT NULL,
  `full-time/part-time` enum('part-time','full-time') NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `ote` decimal(4,0) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_desc` varchar(100) NOT NULL,
  `unit` int(1) NOT NULL,
  `year` varchar(4) NOT NULL,
  `term` enum('1','2','3') NOT NULL,
  `start_time` varchar(5) NOT NULL,
  `end_time` varchar(5) NOT NULL,
  `load_creator` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `load`
--

INSERT INTO `load` (`loadID`, `facultyID`, `faculty_first_name`, `faculty_middle_name`, `faculty_last_name`, `full-time/part-time`, `specialization`, `ote`, `subjectid`, `subject_name`, `subject_desc`, `unit`, `year`, `term`, `start_time`, `end_time`, `load_creator`) VALUES
(13, 11, 'Rhea', '', 'Valbuena', 'full-time', 'Database Systems', '7', 4, 'DATAMA1', 'Database Management 1', 3, '2016', '2', '11:30', '01:30', 'vsalfafara'),
(14, 11, 'Rhea', '', 'Valbuena', 'full-time', 'Database Systems', '7', 10, 'DATAMA2', 'Data Management 2', 3, '2016', '2', '03:30', '5:30', 'vsalfafara'),
(15, 8, 'Von', 'Sogocio', 'Alfafara', 'part-time', 'Software Engineering', '4', 2, 'INPROLA', 'Introduction to Programming Languages', 3, '2016', '2', '09:30', '11:30', 'vsalfafara'),
(16, 8, 'Von', 'Sogocio', 'Alfafara', 'part-time', 'Software Engineering', '4', 6, 'PROGCON', 'Programming Concepts', 3, '2016', '2', '07:30', '09:30', 'vsalfafara'),
(17, 8, 'Von', 'Sogocio', 'Alfafara', 'part-time', 'Software Engineering', '4', 9, 'DASTRUC', 'Data Structures', 3, '2016', '2', '01:30', '3:30', 'vsalfafara'),
(18, 9, 'Rafael', '', 'Ochotorena', 'part-time', 'Computer Networks', '5', 3, 'DATACOM', 'Data Communications', 3, '2016', '2', '07:30', '09:30', 'vsalfafara'),
(19, 6, 'Gabrielle', '', 'Lazaro', 'full-time', 'Computer Engineering', '6', 7, 'COMPORG', 'Computer Organization', 3, '2016', '2', '01:30', '03:30', 'vsalfafara'),
(20, 7, 'Jameiah', '', 'Jauod', 'full-time', 'Database Systems', '7', 4, 'DATAMA1', 'Database Management 1', 3, '2016', '2', '11:30', '01:30', 'vsalfafara'),
(21, 7, 'Jameiah', '', 'Jauod', 'full-time', 'Database Systems', '7', 10, 'DATAMA2', 'Data Management 2', 3, '2016', '2', '03:30', '5:30', 'vsalfafara'),
(22, 10, 'Allen', '', 'Baldovino', 'part-time', 'System Analyst', '8', 1, 'SYSADD1', 'System Analysis and Design', 3, '2016', '2', '09:30', '11:30', 'vsalfafara'),
(23, 10, 'Allen', '', 'Baldovino', 'part-time', 'System Analyst', '8', 5, 'INSTDEV', 'Introduction to Systems and Design', 3, '2016', '2', '11:30', '01:30', 'vsalfafara'),
(24, 10, 'Allen', '', 'Baldovino', 'part-time', 'System Analyst', '8', 8, 'OPESYS1', 'Operating Systems 1', 3, '2016', '2', '03:30', '05:30', 'vsalfafara');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE IF NOT EXISTS `specialization` (
`specializationid` int(11) NOT NULL,
  `specialization_name` varchar(25) NOT NULL,
  `specialized_subjectid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specializationid`, `specialization_name`, `specialized_subjectid`) VALUES
(1, 'Computer Engineering', 1),
(2, 'Database Systems', 2),
(3, 'Software Engineering', 3),
(4, 'Computer Networks', 4),
(5, 'System Analyst', 5);

-- --------------------------------------------------------

--
-- Table structure for table `specialized_subjects`
--

CREATE TABLE IF NOT EXISTS `specialized_subjects` (
`spec_sub_id` int(10) NOT NULL,
  `subject1` varchar(25) NOT NULL,
  `subject2` varchar(25) NOT NULL,
  `subject3` varchar(25) NOT NULL,
  `subject4` varchar(25) NOT NULL,
  `subject5` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`subjectid` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_desc` varchar(100) NOT NULL,
  `specialized_subjectid` int(10) NOT NULL,
  `unit` int(1) NOT NULL,
  `year` varchar(4) NOT NULL,
  `term` enum('1','2','3') NOT NULL,
  `MTH` enum('y','n') NOT NULL,
  `TF` enum('y','n') NOT NULL,
  `start_time` varchar(5) NOT NULL,
  `end_time` varchar(5) NOT NULL,
  `occupied` enum('y','n') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `subject_name`, `subject_desc`, `specialized_subjectid`, `unit`, `year`, `term`, `MTH`, `TF`, `start_time`, `end_time`, `occupied`) VALUES
(1, 'SYSADD1', 'System Analysis and Design', 5, 3, '2016', '2', 'n', 'y', '09:30', '11:30', 'n'),
(2, 'INPROLA', 'Introduction to Programming Languages', 3, 3, '2016', '2', 'n', 'y', '09:30', '11:30', 'n'),
(3, 'DATACOM', 'Data Communications', 4, 3, '2016', '2', 'y', 'n', '07:30', '09:30', 'n'),
(4, 'DATAMA1', 'Database Management 1', 2, 3, '2016', '2', 'n', 'y', '11:30', '01:30', 'n'),
(5, 'INSTDEV', 'Introduction to Systems and Design', 5, 3, '2016', '2', 'y', 'n', '11:30', '01:30', 'n'),
(6, 'PROGCON', 'Programming Concepts', 3, 3, '2016', '2', 'y', 'n', '07:30', '09:30', 'n'),
(7, 'COMPORG', 'Computer Organization', 1, 3, '2016', '2', 'n', 'y', '01:30', '03:30', 'n'),
(8, 'OPESYS1', 'Operating Systems 1', 5, 3, '2016', '2', 'y', 'n', '03:30', '05:30', 'n'),
(9, 'DASTRUC', 'Data Structures', 3, 3, '2016', '2', 'n', 'y', '01:30', '3:30', 'n'),
(10, 'DATAMA2', 'Data Management 2', 2, 3, '2016', '2', 'y', 'n', '03:30', '5:30', 'n'),
(11, 'DIGDESG', 'Digital Design', 1, 3, '2016', '2', 'n', 'y', '01:30', '3:30', 'n'),
(12, 'DATAMA1', 'Data Management 1', 2, 3, '2015', '1', 'n', 'y', '09:30', '11:30', 'n'),
(13, 'COMPORG', 'Computer Organization', 1, 3, '2015', '1', 'n', 'y', '09:30', '11:30', 'n'),
(14, 'DIGDESG', 'Digital Design', 1, 3, '2015', '1', 'y', 'n', '07:30', '09:30', 'n'),
(15, 'SYSADD1', 'System Analysis and Design', 5, 3, '2015', '1', 'n', 'y', '11:30', '01:30', 'n'),
(16, 'DATAMA2', 'Data Management 2', 2, 3, '2015', '1', 'y', 'n', '11:30', '01:30', 'n'),
(17, 'PROGCON', 'Programming Concepts', 3, 3, '2015', '1', 'y', 'n', '07:30', '09:30', 'n'),
(18, 'INPROLA', 'Introduction to Programming Languages', 3, 3, '2015', '1', 'n', 'y', '01:30', '03:30', 'n'),
(19, 'OPESYS1', 'Operating Systems 1', 5, 3, '2015', '1', 'y', 'n', '03:30', '05:30', 'n'),
(21, 'INSTDEV', 'Introduction to Systems and Design', 5, 3, '2015', '1', 'y', 'n', '03:30', '5:30', 'n'),
(22, 'DATACOM', 'Data Communications', 4, 3, '2015', '1', 'n', 'y', '01:30', '3:30', 'n'),
(23, 'DASTRUC', 'Data Structures', 3, 3, '2015', '1', 'n', 'y', '01:30', '3:30', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`userid` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `lastname`, `firstname`, `middlename`, `type`) VALUES
(1, 'vsalfafara', 'pausebreak', 'ALFAFARA', 'VON MATTHEW', 'S.', 0),
(2, 'ldlazaro', 'Forgetit1', 'LAZARO', 'GABRIELLE', '', 1),
(3, 'jgjauod', 'Jameiah22', 'JAUOD', 'JAMEIAH NICOLE', '', 1),
(4, 'rhear', 'qwerty', '', '', '', 0),
(5, 'aabaldovino', 'qwerty', 'Baldovino', 'Allen', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `load`
--
ALTER TABLE `load`
 ADD PRIMARY KEY (`loadID`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
 ADD PRIMARY KEY (`specializationid`);

--
-- Indexes for table `specialized_subjects`
--
ALTER TABLE `specialized_subjects`
 ADD PRIMARY KEY (`spec_sub_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subjectid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `empid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `load`
--
ALTER TABLE `load`
MODIFY `loadID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
MODIFY `specializationid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `specialized_subjects`
--
ALTER TABLE `specialized_subjects`
MODIFY `spec_sub_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subjectid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
