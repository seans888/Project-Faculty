/*
Navicat MySQL Data Transfer

Source Server         : PROD SERVER FLAVIO DB
Source Server Version : 50541
Source Host           : 10.106.1.10:3306
Source Database       : AREG

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2016-08-12 10:51:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xrefStudentSchedule
-- ----------------------------
DROP TABLE IF EXISTS `xrefStudentSchedule`;
CREATE TABLE `xrefStudentSchedule` (
  `subject_offering_id` int(9) NOT NULL DEFAULT '0',
  `student_id` varchar(11) NOT NULL,
  `enrollment_status` enum('Dropped','Registered','Enrolled') DEFAULT 'Registered',
  `date` date DEFAULT NULL,
  `term_id` varchar(250) NOT NULL,
  `subject_code` varchar(250) NOT NULL,
  PRIMARY KEY (`subject_offering_id`,`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
