/*
Navicat MySQL Data Transfer

Source Server         : Dev Local FLAVIO DB
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : AREG

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-08-18 14:38:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Term
-- ----------------------------
DROP TABLE IF EXISTS `Term`;
CREATE TABLE `Term` (
  `term_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `school_year` year(4) NOT NULL,
  `term` enum('1','2','3','S') NOT NULL DEFAULT '1',
  `term_start` date DEFAULT NULL,
  `term_end` date DEFAULT NULL,
  `reg_start` date DEFAULT NULL,
  `reg_end` date DEFAULT NULL,
  `install1` date NOT NULL,
  `install2` date NOT NULL,
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `school_year` (`school_year`,`term`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1 COMMENT='Masterlist of Term Schedule';
