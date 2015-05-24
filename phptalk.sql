-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 24, 2015 at 02:27 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `phptalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(8) NOT NULL COMMENT '评论id',
  `pid` int(8) NOT NULL COMMENT '帖子id',
  `uid` int(8) NOT NULL COMMENT '用户id',
  `reply_cid` int(8) DEFAULT NULL COMMENT '回复评论id',
  `content` longtext NOT NULL COMMENT '评论内容',
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表';

-- --------------------------------------------------------

--
-- Table structure for table `comment_hot`
--

CREATE TABLE `comment_hot` (
  `chid` int(8) NOT NULL COMMENT '评论赞id',
  `cid` int(8) NOT NULL COMMENT '评论id',
  `uid` int(8) NOT NULL COMMENT '用户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论点赞表';

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int(8) NOT NULL COMMENT '帖子id',
  `uid` int(8) NOT NULL COMMENT '用户id',
  `sid` int(8) NOT NULL COMMENT '分类id',
  `title` text NOT NULL COMMENT '帖子标题',
  `content` longtext NOT NULL COMMENT '帖子内容',
  `status` varchar(11) NOT NULL DEFAULT 'common' COMMENT '帖子状态',
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
  `is_have_comment` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否评论'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='帖子表';

-- --------------------------------------------------------

--
-- Table structure for table `post_hot`
--

CREATE TABLE `post_hot` (
  `phid` int(8) NOT NULL COMMENT '帖子赞id',
  `pid` int(8) NOT NULL COMMENT '帖子id',
  `uid` int(8) NOT NULL COMMENT '用户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='帖子点赞表';

-- --------------------------------------------------------

--
-- Table structure for table `sorts`
--

CREATE TABLE `sorts` (
  `sid` int(8) NOT NULL COMMENT '分类id',
  `sname` varchar(255) NOT NULL COMMENT '分类名'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='帖子表';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(8) NOT NULL COMMENT '用户id',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `role` varchar(11) NOT NULL COMMENT '身份',
  `state` varchar(11) NOT NULL DEFAULT 'normal' COMMENT '用户状态',
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `avatar` varchar(255) NOT NULL DEFAULT 'upload/avatar/avatar.png' COMMENT '头像路径'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `comment_hot`
--
ALTER TABLE `comment_hot`
ADD PRIMARY KEY (`chid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `post_hot`
--
ALTER TABLE `post_hot`
ADD PRIMARY KEY (`phid`);

--
-- Indexes for table `sorts`
--
ALTER TABLE `sorts`
ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `cid` int(8) NOT NULL AUTO_INCREMENT COMMENT '评论id';
--
-- AUTO_INCREMENT for table `comment_hot`
--
ALTER TABLE `comment_hot`
MODIFY `chid` int(8) NOT NULL AUTO_INCREMENT COMMENT '评论赞id';
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `pid` int(8) NOT NULL AUTO_INCREMENT COMMENT '帖子id';
--
-- AUTO_INCREMENT for table `post_hot`
--
ALTER TABLE `post_hot`
MODIFY `phid` int(8) NOT NULL AUTO_INCREMENT COMMENT '帖子赞id';
--
-- AUTO_INCREMENT for table `sorts`
--
ALTER TABLE `sorts`
MODIFY `sid` int(8) NOT NULL AUTO_INCREMENT COMMENT '分类id';
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `uid` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户id';