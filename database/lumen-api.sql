-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-21 12:39:51
-- 服务器版本： 10.1.17-MariaDB
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lumen-api`
--

-- --------------------------------------------------------

--
-- 表的结构 `channel`
--

CREATE TABLE `channel` (
  `id` int(11) NOT NULL COMMENT '频道 id',
  `name` varchar(100) NOT NULL COMMENT '频道名称',
  `region` enum('whole','region','section','group') NOT NULL COMMENT '地域类型，全国，地区，地段，群',
  `banner` text NOT NULL COMMENT 'banner 条',
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `deleted_at` int(10) DEFAULT NULL,
  `style` text NOT NULL COMMENT '样式',
  `body` text NOT NULL COMMENT '正文内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `channel`
--

INSERT INTO `channel` (`id`, `name`, `region`, `banner`, `created_at`, `updated_at`, `deleted_at`, `style`, `body`) VALUES
(1, '北京', 'region', '', 1434343434, 1481988347, NULL, '11,12', ''),
(2, '美女', 'whole', '', 1434343434, 1481988345, NULL, '', ''),
(3, '西直门', 'section', '', 1434343434, 1481988344, NULL, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `deleted_at` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `author`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'title', 'content', 'author', 1434343434, 1481988350, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tile-style`
--

CREATE TABLE `tile-style` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `brief` varchar(100) NOT NULL COMMENT '简介',
  `sketch` varchar(100) NOT NULL COMMENT '简介',
  `introduction` text NOT NULL COMMENT '详细',
  `type` enum('marquee','picture','title','icon') NOT NULL COMMENT '类型: 图片  标题',
  `picture-type` enum('icon','big','normal','landscape','portrait','square') NOT NULL COMMENT '图片类型：',
  `line-take` enum('1','2','3','4','5') NOT NULL COMMENT '一行多少个'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tile-style`
--

INSERT INTO `tile-style` (`id`, `title`, `brief`, `sketch`, `introduction`, `type`, `picture-type`, `line-take`) VALUES
(11, '', '', '', '', 'marquee', 'big', ''),
(12, '', '', '', '', 'picture', 'portrait', '2');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL COMMENT '用户 ID',
  `account` varchar(20) NOT NULL COMMENT '账号',
  `password` char(32) NOT NULL COMMENT '密码',
  `token` varchar(100) NOT NULL COMMENT 'token',
  `token_secret` varchar(100) NOT NULL COMMENT 'token secret',
  `deleted_at` int(10) DEFAULT NULL COMMENT '软删除时间',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  `updated_at` int(10) NOT NULL COMMENT '上次登录时间',
  `channels_id` text NOT NULL COMMENT '用户的频道'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `token`, `token_secret`, `deleted_at`, `created_at`, `updated_at`, `channels_id`) VALUES
(1, 'koocyton@gmail.com', '6e5e32f49d30db450234d6c3ec2625d5', '89e838b6723a9c6ece25', '837d578dfbe3c8c9539ab65d669c42df9046', NULL, 1234567890, 1482313611, '1,2,3'),
(2, 'doopps@gmail.com', '111', '123', '123', NULL, 1434343434, 1481988357, '1,2,3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`account`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '频道 id', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;