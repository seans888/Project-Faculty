/*
Navicat MySQL Data Transfer

Source Server         : Dev Local FLAVIO DB
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : AHR

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-08-18 14:32:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for FacultyLoad
-- ----------------------------
DROP TABLE IF EXISTS `FacultyLoad`;
CREATE TABLE `FacultyLoad` (
  `load_id` int(5) NOT NULL AUTO_INCREMENT,
  `emp_id` char(10) NOT NULL,
  `subject_offering_id` int(5) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`load_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19162 DEFAULT CHARSET=latin1 COMMENT='Faculty Load Effectivity Date';
