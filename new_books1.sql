/*
Navicat MySQL Data Transfer

Source Server         : 119.45.156.22
Source Server Version : 50648
Source Host           : 119.45.156.22:3306
Source Database       : new_books

Target Server Type    : MYSQL
Target Server Version : 50648
File Encoding         : 65001

Date: 2020-07-21 11:30:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for books_admin
-- ----------------------------
DROP TABLE IF EXISTS `books_admin`;
CREATE TABLE `books_admin` (
  `admin_id` int(8) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `admin_password` varchar(255) NOT NULL COMMENT '管理员密码',
  `admin_power` text COMMENT '权限组',
  `admin_describe` varchar(255) DEFAULT '' COMMENT '描述',
  `add_time` datetime DEFAULT NULL COMMENT '创建时间',
  `is_disable` tinyint(4) DEFAULT '0' COMMENT '是否禁用 0否 1是',
  PRIMARY KEY (`admin_id`,`admin_name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for books_article
-- ----------------------------
DROP TABLE IF EXISTS `books_article`;
CREATE TABLE `books_article` (
  `article_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `article_name` varchar(255) DEFAULT '' COMMENT '文章标题',
  `article_author` varchar(255) DEFAULT '' COMMENT '文章作者',
  `article_content` text COMMENT '文章内容',
  `article_status` tinyint(4) DEFAULT '1' COMMENT '是否发布 0否，1是',
  `add_time` datetime DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='文章';

-- ----------------------------
-- Table structure for books_chapter
-- ----------------------------
DROP TABLE IF EXISTS `books_chapter`;
CREATE TABLE `books_chapter` (
  `books_id` int(11) NOT NULL COMMENT '对应的小说id',
  `chapter_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '章节名称',
  `chapter_url` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '章节源链接',
  PRIMARY KEY (`books_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for books_cou
-- ----------------------------
DROP TABLE IF EXISTS `books_cou`;
CREATE TABLE `books_cou` (
  `books_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `books_name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '书籍名称',
  `books_author` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '书籍作者',
  `books_time` date DEFAULT NULL COMMENT '更新时间',
  `books_type` int(11) DEFAULT NULL COMMENT '书籍类型',
  `books_status` int(11) DEFAULT '0' COMMENT '书箱状态 0 连载 1完结',
  `books_synopsis` text COLLATE utf8_bin COMMENT '书籍简介',
  `books_img` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '书籍封面',
  `books_url` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '书箱来源地址',
  PRIMARY KEY (`books_id`,`books_name`),
  UNIQUE KEY `books_name` (`books_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10297 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for books_history
-- ----------------------------
DROP TABLE IF EXISTS `books_history`;
CREATE TABLE `books_history` (
  `books_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `history_name` varchar(255) DEFAULT '' COMMENT '记录章节',
  `history_url` varchar(255) DEFAULT '' COMMENT '章节地址',
  `history_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '阅读时间',
  PRIMARY KEY (`books_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='阅读记录';

-- ----------------------------
-- Table structure for books_module
-- ----------------------------
DROP TABLE IF EXISTS `books_module`;
CREATE TABLE `books_module` (
  `module_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '模块id',
  `module_name` varchar(255) DEFAULT '' COMMENT '模块名称',
  `module_key` varchar(255) DEFAULT NULL COMMENT '标识字段',
  `module_data` text COMMENT '数据',
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for books_rule
-- ----------------------------
DROP TABLE IF EXISTS `books_rule`;
CREATE TABLE `books_rule` (
  `rule_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id',
  `rule_name` varchar(255) NOT NULL COMMENT '规则名称',
  `rule_url` varchar(255) DEFAULT NULL COMMENT '规则搜索地址',
  `search_name` varchar(255) DEFAULT NULL COMMENT '结果页书名匹配规则',
  `search_url` varchar(255) DEFAULT NULL COMMENT '结果页地址匹配规则',
  `is_search` tinyint(4) DEFAULT '0' COMMENT '是否可用于小说搜索 0否 1是',
  `is_urlencode` tinyint(4) DEFAULT '0' COMMENT '书名是否开启urlencode化 0否 1是',
  PRIMARY KEY (`rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='小说添加规则';

-- ----------------------------
-- Table structure for books_rule_info
-- ----------------------------
DROP TABLE IF EXISTS `books_rule_info`;
CREATE TABLE `books_rule_info` (
  `rule_id` int(8) NOT NULL COMMENT '规则id',
  `books_name` varchar(255) DEFAULT NULL COMMENT '书名匹配规则',
  `books_author` varchar(255) DEFAULT NULL COMMENT '作者匹配规则',
  `books_time` varchar(255) DEFAULT NULL COMMENT '更新时间匹配规则',
  `books_type` varchar(255) DEFAULT NULL COMMENT '小说类型匹配规则',
  `books_synopsis` varchar(255) DEFAULT NULL COMMENT '小说简介匹配规则',
  `books_img` varchar(255) DEFAULT NULL COMMENT '小说封面匹配规则',
  `chapter_name` varchar(255) DEFAULT NULL COMMENT '章节名匹配规则',
  `chapter_url` varchar(255) DEFAULT NULL COMMENT '章节地址匹配规则',
  `info_title` varchar(255) DEFAULT NULL COMMENT '章节标题',
  `info_content` varchar(255) DEFAULT NULL COMMENT '章节内容',
  `is_zuixin` tinyint(4) DEFAULT '1' COMMENT '最新章节匹配1：正序；2：倒序',
  PRIMARY KEY (`rule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='具体添加规则';

-- ----------------------------
-- Table structure for books_seo
-- ----------------------------
DROP TABLE IF EXISTS `books_seo`;
CREATE TABLE `books_seo` (
  `seo_id` int(11) NOT NULL AUTO_INCREMENT,
  `seo_module` varchar(255) NOT NULL DEFAULT '' COMMENT '模块标识',
  `seo_remark` varchar(255) DEFAULT '' COMMENT '模块备注',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_keywords` text,
  `seo_description` text,
  `is_disable` tinyint(4) DEFAULT '0' COMMENT '是否禁用 0否 1是',
  PRIMARY KEY (`seo_id`,`seo_module`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for books_shelf
-- ----------------------------
DROP TABLE IF EXISTS `books_shelf`;
CREATE TABLE `books_shelf` (
  `user_id` int(8) NOT NULL COMMENT '用户id',
  `books_id` int(8) NOT NULL COMMENT '书籍id',
  `sort` int(4) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`books_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for books_type
-- ----------------------------
DROP TABLE IF EXISTS `books_type`;
CREATE TABLE `books_type` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '类型名称',
  `type_sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for books_user
-- ----------------------------
DROP TABLE IF EXISTS `books_user`;
CREATE TABLE `books_user` (
  `user_id` int(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(255) DEFAULT '' COMMENT '用户名',
  `user_password` varchar(255) DEFAULT '' COMMENT '用户密码',
  `user_img` varchar(255) DEFAULT '' COMMENT '用户头像',
  `user_email` varchar(255) DEFAULT '' COMMENT '用户邮箱',
  `add_time` datetime DEFAULT NULL COMMENT '创建时间',
  `is_disable` tinyint(4) DEFAULT '0' COMMENT '是否禁用',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
