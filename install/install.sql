DROP TABLE IF EXISTS `qqlogin_config`;</explode>
CREATE TABLE `qqlogin_config` (
  `k` varchar(32) NOT NULL,
  `v` text,
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>
INSERT INTO `qqlogin_config` VALUES ('title', 'UK云QQ互联分发系统');</explode>
INSERT INTO `qqlogin_config` VALUES ('keywords', 'UK云QQ互联分发系统');</explode>
INSERT INTO `qqlogin_config` VALUES ('description', 'UK云QQ互联分发系统');</explode>
INSERT INTO `qqlogin_config` VALUES ('repair', '0');</explode>
INSERT INTO `qqlogin_config` VALUES ('qq', '2874992246');</explode>
INSERT INTO `qqlogin_config` VALUES ('mail', '2874992246@qq.com');</explode>
INSERT INTO `qqlogin_config` VALUES ('qqqun', '732541300');</explode>
INSERT INTO `qqlogin_config` VALUES ('qqqunurl', 'https://jq.qq.com/?_wv=1027&k=5MSQnpl');</explode>
INSERT INTO `qqlogin_config` VALUES ('regrepair', '1');</explode>
INSERT INTO `qqlogin_config` VALUES ('gg', '用户通知');</explode>
INSERT INTO `qqlogin_config` VALUES ('tz', '站长通知');</explode>
INSERT INTO `qqlogin_config` VALUES ('aqqdl', '1');</explode>
INSERT INTO `qqlogin_config` VALUES ('aqqbd', '1');</explode>
INSERT INTO `qqlogin_config` VALUES ('uqqdl', '1');</explode>
INSERT INTO `qqlogin_config` VALUES ('uqqbd', '1');</explode>
INSERT INTO `qqlogin_config` VALUES ('number', '1');</explode>
INSERT INTO `qqlogin_config` VALUES ('numbers', '1');</explode>
INSERT INTO `qqlogin_config` VALUES ('muban', 'ukyun');</explode>
INSERT INTO `qqlogin_config` VALUES ('adminloginmuban', 'admin_ukyun');</explode>
INSERT INTO `qqlogin_config` VALUES ('userloginmuban', 'user_ukyun');</explode>
INSERT INTO `qqlogin_config` VALUES ('abjapi', '../assets/imgs/bj.png');</explode>
INSERT INTO `qqlogin_config` VALUES ('ubjapi', '../assets/imgs/bj.png');</explode>

DROP TABLE IF EXISTS `qqlogin_user`;</explode>
CREATE TABLE `qqlogin_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL COMMENT '用户账号',
  `pass` varchar(150) NOT NULL COMMENT '登录密码',
  `qq` varchar(150) NOT NULL COMMENT '用户QQ',
  `active` varchar(150) NOT NULL COMMENT '账号状态',
  `power` text COMMENT '用户权限',
  `name` text COMMENT '用户名字',
  `last` datetime NOT NULL COMMENT '最后登录时间',
  `ip` varchar(150) NOT NULL COMMENT 'IP地址',
  `lastip` varchar(150) NOT NULL COMMENT '最后登录IP',
  `boss` varchar(150) NOT NULL COMMENT '用户上级',
  `city` varchar(150) NOT NULL COMMENT '用户地址',
  `access_token` text COMMENT '快捷QQ登录',
   PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

INSERT INTO `qqlogin_user`(`user`, `pass`, `qq`, `active`, `power`, `name`, `last`, `lastip`, `ip`, `boss`, `city`, `access_token`) VALUES
('admin', '123456', '2874992246', '1', '1', '辉辉很乖', 'NULL', 'NULL', 'NULL', '1', '广西南宁', '');</explode>

DROP TABLE IF EXISTS `qqlogin_site`;</explode>
CREATE TABLE `qqlogin_site` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(200) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `callback` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `user` varchar(150) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `qqlogin_daili`;</explode>
CREATE TABLE `qqlogin_daili` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) NOT NULL COMMENT '用户账号',
  `pass` varchar(150) NOT NULL COMMENT '登录密码',
  `qq` varchar(150) NOT NULL COMMENT '用户QQ',
  `active` varchar(150) NOT NULL COMMENT '账号状态',
  `name` text COMMENT '用户名字',
  `last` datetime NOT NULL COMMENT '最后登录时间',
  `ip` varchar(150) NOT NULL COMMENT 'IP地址',
  `lastip` varchar(150) NOT NULL COMMENT '最后登录IP',
  `boss` varchar(150) NOT NULL COMMENT '用户上级',
  `city` varchar(150) NOT NULL COMMENT '用户地址',
  `number` varchar(150) NOT NULL COMMENT '额度',
  `power` text COMMENT '用户权限',
  `access_token` text COMMENT '快捷QQ登录',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `qqlogin_log`;</explode>
CREATE TABLE `qqlogin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(150) DEFAULT NULL,
  `type` varchar(20) NULL,
  `date` datetime NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `data` text NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `qqlogin_logs`;</explode>
CREATE TABLE `qqlogin_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(150) DEFAULT NULL,
  `type` varchar(20) NULL,
  `date` datetime NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `data` text NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `qqlogin_kms`;</explode>
CREATE TABLE `qqlogin_kms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `km` varchar(150) NOT NULL COMMENT '卡密号',
  `zt` varchar(150) NOT NULL COMMENT '卡密状态',
  `userid` varchar(150) NOT NULL COMMENT '用户ID',
  `addtime` datetime NOT NULL COMMENT '添加时间',
  `usetime` datetime NOT NULL COMMENT '使用时间',
  `number` varchar(150) NOT NULL COMMENT '卡密额度',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>