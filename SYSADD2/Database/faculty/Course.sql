/*
Navicat MySQL Data Transfer

Source Server         : PROD SERVER FLAVIO DB
Source Server Version : 50541
Source Host           : 10.106.1.10:3306
Source Database       : AREG

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2016-08-12 10:53:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Course
-- ----------------------------
DROP TABLE IF EXISTS `Course`;
CREATE TABLE `Course` (
  `course` int(5) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(13) DEFAULT NULL,
  `course_name` varchar(125) NOT NULL,
  `GP_num` enum('Y','N') NOT NULL DEFAULT 'Y',
  `dept_id` varchar(255) NOT NULL,
  `is_offered` enum('Y','N') NOT NULL,
  PRIMARY KEY (`course`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COMMENT='Masterlist of Courses';
