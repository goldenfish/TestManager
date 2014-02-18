/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50018
Source Host           : localhost:3306
Source Database       : testmanager

Target Server Type    : MYSQL
Target Server Version : 50018
File Encoding         : 65001

Date: 2014-02-17 22:07:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_case`
-- ----------------------------
DROP TABLE IF EXISTS `t_case`;
CREATE TABLE `t_case` (
  `id` int(10) NOT NULL auto_increment,
  `cid` int(10) default NULL COMMENT '用例ID',
  `pid` int(10) default NULL COMMENT '项目ID',
  `rid` int(10) default NULL COMMENT '需求ID',
  `fid` int(10) default NULL COMMENT '所属功能ID',
  `uid` int(10) default NULL COMMENT '用例创建者ID',
  `title` varchar(200) default NULL COMMENT '用例标题',
  `premise` varchar(300) default NULL COMMENT '测试前提条件',
  `operate` varchar(800) default NULL COMMENT '操作步骤描述',
  `result` varchar(800) default NULL COMMENT '期望结果描述',
  `method` smallint(10) default NULL COMMENT '测试方法(1为手工测试 , 2为自动化测试)',
  `ctime` varchar(200) default NULL COMMENT '用例创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_case
-- ----------------------------

-- ----------------------------
-- Table structure for `t_case_detail`
-- ----------------------------
DROP TABLE IF EXISTS `t_case_detail`;
CREATE TABLE `t_case_detail` (
  `id` int(10) NOT NULL auto_increment,
  `pid` int(10) default NULL COMMENT '项目ID',
  `rid` int(10) default NULL COMMENT '需求ID',
  `fid` int(10) default NULL COMMENT '功能ID',
  `cid` int(10) default NULL COMMENT '用例ID',
  `uid` int(10) default NULL COMMENT '建立者ID',
  `ctime` varchar(100) default NULL COMMENT '编写时间',
  `title` varchar(200) default NULL COMMENT '用例的标题',
  `method` smallint(10) default NULL COMMENT '测试方法(1为手工测试 , 2为自动化测试)',
  `tester_id` int(10) default NULL COMMENT '测试工程师ID',
  `last_time` varchar(300) default NULL COMMENT '测试时间',
  `status` smallint(10) default NULL COMMENT '用例当前状态',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_case_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `t_demand`
-- ----------------------------
DROP TABLE IF EXISTS `t_demand`;
CREATE TABLE `t_demand` (
  `id` int(10) NOT NULL auto_increment,
  `rid` int(10) default NULL COMMENT '需求ID',
  `pid` int(10) default NULL COMMENT '项目ID',
  `name` varchar(100) default NULL COMMENT '需求名称',
  `desc` varchar(800) default NULL,
  `uid` int(10) default NULL COMMENT '创建者ID',
  `ctime` varchar(100) default NULL COMMENT '创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_demand
-- ----------------------------

-- ----------------------------
-- Table structure for `t_file`
-- ----------------------------
DROP TABLE IF EXISTS `t_file`;
CREATE TABLE `t_file` (
  `id` int(10) NOT NULL auto_increment,
  `uid` int(10) default NULL COMMENT '上传用户ID',
  `pid` int(10) default NULL COMMENT '所属项目ID',
  `typeid` smallint(10) default NULL COMMENT '文档类型ID (1为项目文档,2为需求文档)',
  `filepath` varchar(300) default '' COMMENT '文档路径',
  `ctime` varchar(200) default NULL COMMENT '上传时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_file
-- ----------------------------

-- ----------------------------
-- Table structure for `t_func`
-- ----------------------------
DROP TABLE IF EXISTS `t_func`;
CREATE TABLE `t_func` (
  `id` int(10) NOT NULL auto_increment,
  `fid` int(10) default NULL COMMENT '功能ID',
  `pid` int(10) default NULL COMMENT '项目ID',
  `rid` int(10) default NULL COMMENT '需求ID',
  `name` varchar(200) default NULL COMMENT '功能点文本',
  `uid` int(10) default NULL COMMENT '功能点创建者ID',
  `ctime` varchar(200) default NULL COMMENT '创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_func
-- ----------------------------

-- ----------------------------
-- Table structure for `t_node`
-- ----------------------------
DROP TABLE IF EXISTS `t_node`;
CREATE TABLE `t_node` (
  `id` int(10) NOT NULL auto_increment,
  `nid` int(10) default NULL COMMENT 'node ID用来记录权限id',
  `name` varchar(100) default NULL COMMENT '限权名称',
  `pid` int(20) default NULL COMMENT '属从父级关系',
  `status` smallint(5) default NULL COMMENT '状态值',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_node
-- ----------------------------

-- ----------------------------
-- Table structure for `t_nodelist`
-- ----------------------------
DROP TABLE IF EXISTS `t_nodelist`;
CREATE TABLE `t_nodelist` (
  `id` int(10) NOT NULL auto_increment,
  `uid` int(10) default NULL COMMENT '用户ID',
  `nid` int(10) default NULL COMMENT '用户的权限ID',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_nodelist
-- ----------------------------

-- ----------------------------
-- Table structure for `t_project`
-- ----------------------------
DROP TABLE IF EXISTS `t_project`;
CREATE TABLE `t_project` (
  `id` int(10) NOT NULL auto_increment,
  `pid` int(10) default NULL COMMENT '项目ID',
  `name` varchar(200) default NULL COMMENT '项目名称',
  `desc` varchar(500) default NULL COMMENT '项目描述',
  `uid` int(10) default NULL COMMENT '创建者ID',
  `ctime` varchar(100) default NULL COMMENT '项目创建时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_project
-- ----------------------------

-- ----------------------------
-- Table structure for `t_rolelist`
-- ----------------------------
DROP TABLE IF EXISTS `t_rolelist`;
CREATE TABLE `t_rolelist` (
  `id` int(5) NOT NULL auto_increment,
  `role_id` int(5) default NULL COMMENT '色角id',
  `role_name` varchar(100) default NULL COMMENT '角色名称',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_rolelist
-- ----------------------------

-- ----------------------------
-- Table structure for `t_task`
-- ----------------------------
DROP TABLE IF EXISTS `t_task`;
CREATE TABLE `t_task` (
  `id` int(10) NOT NULL auto_increment,
  `pid` int(10) default NULL COMMENT '项目ID',
  `rid` int(10) default NULL COMMENT '任务ID=项目的需求ID',
  `uid` int(10) default NULL COMMENT '添加者ID',
  `lid` int(10) default NULL COMMENT '负责人ID',
  `ctime` varchar(100) default NULL,
  `rtime` varchar(200) default NULL COMMENT '任务计划执行时间',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_task
-- ----------------------------

-- ----------------------------
-- Table structure for `t_task_detail`
-- ----------------------------
DROP TABLE IF EXISTS `t_task_detail`;
CREATE TABLE `t_task_detail` (
  `id` int(10) unsigned zerofill NOT NULL auto_increment,
  `pid` int(10) default NULL COMMENT '项目ID',
  `rid` int(10) default NULL COMMENT '需求ID',
  `fid` int(10) default NULL COMMENT '功能ID',
  `uid` int(10) default NULL COMMENT '添加者ID',
  `tester_id` int(10) default NULL COMMENT '分配的测试人员的UID=uid',
  `status` smallint(10) default NULL COMMENT '此功能点的状态(1为未认领,2为已认领,3为执行中,4为测试完成)',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_task_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `t_tester`
-- ----------------------------
DROP TABLE IF EXISTS `t_tester`;
CREATE TABLE `t_tester` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default NULL,
  `username` varchar(100) default NULL COMMENT '用户名',
  `password` varchar(100) default NULL COMMENT '密码',
  `nickname` varchar(200) default NULL COMMENT '姓名',
  `mobile` varchar(100) default NULL COMMENT '手机',
  `mail` varchar(200) default NULL COMMENT '邮箱',
  `role_id` smallint(10) default NULL COMMENT '角色id',
  `role_name` varchar(100) default NULL COMMENT '色角中文名称',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_tester
-- ----------------------------
