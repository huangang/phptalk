
CREATE TABLE IF NOT EXISTS `users` (
	`uid` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户id',
	`username` varchar(255) NOT NULL COMMENT '用户名',
	`password` varchar(255) NOT NULL COMMENT '密码',
	`email` varchar(255) NOT NULL COMMENT '邮箱',
	`role` varchar(11) NOT NULL COMMENT '身份',
	`register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
	`avatar` varchar(255) NOT NULL DEFAULT 'upload/avatar/avatar.png' COMMENT '头像路径',
	PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `posts` (
  `pid` int(8) NOT NULL AUTO_INCREMENT COMMENT '帖子id',
  `uid` int(8) NOT NULL COMMENT '用户id',
  `sid` int(8) NOT NULL COMMENT '分类id',
  `title` text NOT NULL COMMENT '帖子标题',
  `content` longtext NOT NULL COMMENT '帖子内容',
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
  `is_have_comment` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否评论',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='帖子表' AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `sorts` (
  `sid` int(8) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `sname` varchar(255) NOT NULL COMMENT '分类名',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='帖子表' AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(8) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `pid` int(8) NOT NULL COMMENT '帖子id',
  `uid` int(8) NOT NULL COMMENT '用户id',
  `reply_cid` int(8) DEFAULT NULL COMMENT '回复评论id',
  `content` longtext NOT NULL COMMENT '评论内容',
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `posthot` (
  `phid` int(8) NOT NULL AUTO_INCREMENT COMMENT '帖子赞id',
  `pid` int(8) NOT NULL AUTO_INCREMENT COMMENT '帖子id',
  `uid` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  PRIMARY KEY (`phid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='帖子点赞表' AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `commenthot` (
  `chid` int(8) NOT NULL AUTO_INCREMENT COMMENT '评论赞id',
  `cid` int(8) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `uid` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  PRIMARY KEY (`chid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论点赞表' AUTO_INCREMENT=1 ;