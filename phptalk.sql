-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 05 月 28 日 00:02
-- 服务器版本: 5.5.42-cll-lve
-- PHP 版本: 5.4.40

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `phptalk`
--

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(8) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `pid` int(8) NOT NULL COMMENT '帖子id',
  `uid` int(8) NOT NULL COMMENT '用户id',
  `reply_cid` int(8) DEFAULT NULL COMMENT '回复评论id',
  `content` longtext NOT NULL COMMENT '评论内容',
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `comment_hot`
--

CREATE TABLE IF NOT EXISTS `comment_hot` (
  `chid` int(8) NOT NULL AUTO_INCREMENT COMMENT '评论赞id',
  `cid` int(8) NOT NULL COMMENT '评论id',
  `uid` int(8) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`chid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论点赞表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `pid` int(8) NOT NULL AUTO_INCREMENT COMMENT '帖子id',
  `uid` int(8) NOT NULL COMMENT '用户id',
  `sid` int(8) NOT NULL COMMENT '分类id',
  `title` text NOT NULL COMMENT '帖子标题',
  `content` longtext NOT NULL COMMENT '帖子内容',
  `status` varchar(11) NOT NULL DEFAULT 'common' COMMENT '帖子状态',
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
  `is_have_comment` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否评论',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='帖子表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`pid`, `uid`, `sid`, `title`, `content`, `status`, `post_time`, `is_have_comment`) VALUES
  (1, 1, 1, 'hello world', '<p>hello world</p>', 'common', '2015-05-28 00:02:23', 1);

-- --------------------------------------------------------

--
-- 表的结构 `post_hot`
--

CREATE TABLE IF NOT EXISTS `post_hot` (
  `phid` int(8) NOT NULL AUTO_INCREMENT COMMENT '帖子赞id',
  `pid` int(8) NOT NULL COMMENT '帖子id',
  `uid` int(8) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`phid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='帖子点赞表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `post_hot`
--

INSERT INTO `post_hot` (`phid`, `pid`, `uid`) VALUES
  (1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sorts`
--

CREATE TABLE IF NOT EXISTS `sorts` (
  `sid` int(8) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `sname` varchar(255) NOT NULL COMMENT '分类名',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='帖子表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sorts`
--

INSERT INTO `sorts` (`sid`, `sname`) VALUES
  (1, '默认分类');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `role` varchar(11) NOT NULL COMMENT '身份',
  `state` varchar(11) NOT NULL DEFAULT 'normal' COMMENT '用户状态',
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `avatar` varchar(255) NOT NULL DEFAULT 'images/avatar.png' COMMENT '头像路径',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `role`, `state`, `register_time`, `avatar`) VALUES
  (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '123456@qq.com', 'manager', 'normal', '2015-05-27 23:51:37', 'upload/avatar/avatar.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
