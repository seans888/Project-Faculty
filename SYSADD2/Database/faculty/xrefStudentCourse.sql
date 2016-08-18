/*
Navicat MySQL Data Transfer

Source Server         : PROD SERVER FLAVIO DB
Source Server Version : 50541
Source Host           : 10.106.1.10:3306
Source Database       : AREG

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2016-08-12 10:52:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xrefStudentCourse
-- ----------------------------
DROP TABLE IF EXISTS `xrefStudentCourse`;
CREATE TABLE `xrefStudentCourse` (
  `student_id` varchar(11) NOT NULL,
  `course_id` varchar(13) NOT NULL DEFAULT '',
  `flowchart` varchar(250) DEFAULT NULL,
  `school_year` year(4) NOT NULL,
  `term` enum('1','2','3','S') DEFAULT '1',
  `is_graduating` enum('No','Yes') NOT NULL DEFAULT 'No',
  `student_status` enum('Enrolled','Withdraw','LOA','Shiftee') NOT NULL DEFAULT 'Enrolled',
  `flow_id` int(5) NOT NULL,
  `course` int(5) NOT NULL,
  `term_id` int(5) NOT NULL,
  `fee` varchar(30) NOT NULL,
  PRIMARY KEY (`student_id`,`course`,`term_id`),
  KEY `student_id` (`student_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
