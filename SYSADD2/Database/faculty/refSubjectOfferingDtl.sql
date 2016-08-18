/*
Navicat MySQL Data Transfer

Source Server         : PROD SERVER FLAVIO DB
Source Server Version : 50541
Source Host           : 10.106.1.10:3306
Source Database       : AREG

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2016-08-12 10:51:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for refSubjectOfferingDtl
-- ----------------------------
DROP TABLE IF EXISTS `refSubjectOfferingDtl`;
CREATE TABLE `refSubjectOfferingDtl` (
  `subject_offering_id` int(5) NOT NULL,
  `time` char(17) DEFAULT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `day` char(3) DEFAULT NULL,
  `room` varchar(5) NOT NULL,
  `room_type` enum('Lec','Lab') NOT NULL DEFAULT 'Lec',
  UNIQUE KEY `subject_offering_id` (`subject_offering_id`,`time`,`day`,`room`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Schedule Detail';
