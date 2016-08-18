/*
Navicat MySQL Data Transfer

Source Server         : PROD SERVER FLAVIO DB
Source Server Version : 50541
Source Host           : 10.106.1.10:3306
Source Database       : AREG

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2016-08-12 10:52:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for FlowchartDtl
-- ----------------------------
DROP TABLE IF EXISTS `FlowchartDtl`;
CREATE TABLE `FlowchartDtl` (
  `flow_dtl_id` int(5) NOT NULL AUTO_INCREMENT,
  `flow_id` int(5) NOT NULL,
  `subject_id` int(5) NOT NULL,
  `location_xy` varchar(4) NOT NULL,
  `with_prerequisite` enum('Y','N') NOT NULL,
  PRIMARY KEY (`flow_dtl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22609 DEFAULT CHARSET=latin1 COMMENT='Flowchart Details';
