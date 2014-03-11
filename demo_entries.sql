/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50096
Source Host           : localhost:3306
Source Database       : testmanager

Target Server Type    : MYSQL
Target Server Version : 50096
File Encoding         : 65001

Date: 2014-03-11 21:45:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_entries`
-- ----------------------------
DROP TABLE IF EXISTS `t_entries`;
CREATE TABLE `t_entries` (
  `title` varchar(255) default NULL,
  `content` varchar(255) default NULL,
  `date` varchar(255) default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

