-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-21 12:41:13
-- 服务器版本： 10.1.17-MariaDB
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lumen-backend`
--

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

CREATE TABLE `manager` (
  `id` int(16) NOT NULL COMMENT '管理员 id',
  `account` varchar(20) NOT NULL COMMENT '账号',
  `password` char(32) NOT NULL COMMENT '密码',
  `deleted_at` int(10) DEFAULT NULL COMMENT '软删除的时间戳',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  `updated_at` int(10) NOT NULL COMMENT '更新时间',
  `privileges` text NOT NULL COMMENT '权限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `manager`
--

INSERT INTO `manager` (`id`, `account`, `password`, `deleted_at`, `created_at`, `updated_at`, `privileges`) VALUES
(1, 'koocyton@gmail.com', '6e5e32f49d30db450234d6c3ec2625d5', 1482317140, 1434343434, 1482313434, '');

-- --------------------------------------------------------

--
-- 表的结构 `operation-record`
--

CREATE TABLE `operation-record` (
  `id` int(11) NOT NULL COMMENT '日志顺序id',
  `manager_id` int(11) NOT NULL COMMENT '操作员 id',
  `manager_name` varchar(50) NOT NULL COMMENT '操作者名称',
  `request_method` enum('GET','POST') NOT NULL COMMENT 'request method',
  `request_uri` varchar(100) NOT NULL COMMENT '请求的 url',
  `post_data` text NOT NULL COMMENT 'post 数据',
  `created_at` int(10) NOT NULL COMMENT '请求的时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `deleted_at` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`account`);

--
-- Indexes for table `operation-record`
--
ALTER TABLE `operation-record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT COMMENT '管理员 id', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `operation-record`
--
ALTER TABLE `operation-record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志顺序id';
--
-- 使用表AUTO_INCREMENT `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;