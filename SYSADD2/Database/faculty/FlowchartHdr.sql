/*
Navicat MySQL Data Transfer

Source Server         : PROD SERVER FLAVIO DB
Source Server Version : 50541
Source Host           : 10.106.1.10:3306
Source Database       : AREG

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2016-08-12 10:52:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for FlowchartHdr
-- ----------------------------
DROP TABLE IF EXISTS `FlowchartHdr`;
CREATE TABLE `FlowchartHdr` (
  `flow_id` int(5) NOT NULL AUTO_INCREMENT,
  `flow_code` varchar(25) NOT NULL,
  `flow_name` varchar(200) NOT NULL,
  `school_year_start` char(4) NOT NULL,
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `course_id` int(5) NOT NULL,
  PRIMARY KEY (`flow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=333 DEFAULT CHARSET=latin1 COMMENT='Flowchart Header';
