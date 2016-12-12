-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2016-12-12 09:32:53
-- 服务器版本： 5.6.25
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumen-backend`
--

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

CREATE TABLE `manager` (
  `id` int(16) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `is_action` enum('on','off') NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `privileges` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `manager`
--

INSERT INTO `manager` (`id`, `account`, `password`, `is_action`, `created_at`, `updated_at`, `privileges`) VALUES
(1, 'koocyton@gmail.com', '6e5e32f49d30db450234d6c3ec2625d5', 'on', 1234567890, 1481475662, '');

-- --------------------------------------------------------

--
-- 表的结构 `manager-operation`
--

CREATE TABLE `manager-operation` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `manager_name` varchar(50) NOT NULL,
  `request_method` enum('GET','POST') NOT NULL,
  `request_uri` varchar(100) NOT NULL,
  `post_data` text NOT NULL,
  `created_at` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `token` varchar(100) NOT NULL,
  `token_secret` varchar(100) NOT NULL,
  `is_action` enum('on','off') NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `privileges` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `token`, `token_secret`, `is_action`, `created_at`, `updated_at`, `privileges`) VALUES
(1, 'koocyton@gmail.com', '6e5e32f49d30db450234d6c3ec2625d5', 'd9617b0b7d0adcace53055bf503fbc120378cfa252eb2afd0200d7e1c1bc4463', 'f2aef0c31774e637d860031d991c74f23bc4dd536d283d1333c8bb434d07cf5d', 'on', 1234567890, 1481475892, '');

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
-- Indexes for table `manager-operation`
--
ALTER TABLE `manager-operation`
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
-- 使用表AUTO_INCREMENT `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `manager-operation`
--
ALTER TABLE `manager-operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
