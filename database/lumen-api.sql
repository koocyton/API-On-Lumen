-- MySQL dump 10.16  Distrib 10.1.17-MariaDB, for osx10.12 (x86_64)
--
-- Host: localhost    Database: lumen-api
-- ------------------------------------------------------
-- Server version	10.1.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `channel`
--

DROP TABLE IF EXISTS `channel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '频道 id',
  `name` varchar(100) NOT NULL COMMENT '频道名称',
  `region` enum('whole','region','section','group') NOT NULL COMMENT '地域类型，全国，地区，地段，群',
  `banner` text NOT NULL COMMENT 'banner 条',
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `deleted_at` int(10) DEFAULT NULL,
  `style` text NOT NULL COMMENT '样式',
  `body` text NOT NULL COMMENT '正文内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channel`
--

LOCK TABLES `channel` WRITE;
/*!40000 ALTER TABLE `channel` DISABLE KEYS */;
INSERT INTO `channel` VALUES (1,'北京','region','',1434343434,1481988347,NULL,'11,12',''),(2,'美女','whole','',1434343434,1481988345,NULL,'',''),(3,'西直门','section','',1434343434,1481988344,NULL,'','');
/*!40000 ALTER TABLE `channel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `channel-template`
--

DROP TABLE IF EXISTS `channel-template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `channel-template` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `brief` varchar(100) NOT NULL COMMENT '简介',
  `sketch` varchar(100) NOT NULL COMMENT '简介',
  `introduction` text NOT NULL COMMENT '详细',
  `type` enum('marquee','picture','title','icon') NOT NULL COMMENT '类型: 图片  标题',
  `picture-type` enum('icon','big','normal','landscape','portrait','square') NOT NULL COMMENT '图片类型：',
  `line-take` enum('1','2','3','4','5') NOT NULL COMMENT '一行多少个'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channel-template`
--

LOCK TABLES `channel-template` WRITE;
/*!40000 ALTER TABLE `channel-template` DISABLE KEYS */;
INSERT INTO `channel-template` VALUES (11,'','','','','marquee','big',''),(12,'','','','','picture','portrait','2');
/*!40000 ALTER TABLE `channel-template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `deleted_at` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'title','content','author',1434343434,1481988350,NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(16) NOT NULL COMMENT '用户 ID',
  `account` varchar(20) NOT NULL COMMENT '账号',
  `password` char(32) NOT NULL COMMENT '密码',
  `token` varchar(100) NOT NULL COMMENT 'token',
  `token_secret` varchar(100) NOT NULL COMMENT 'token secret',
  `deleted_at` int(10) DEFAULT NULL COMMENT '软删除时间',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  `updated_at` int(10) NOT NULL COMMENT '上次登录时间',
  `channels_id` text NOT NULL COMMENT '用户的频道',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'koocyton@gmail.com','6e5e32f49d30db450234d6c3ec2625d5','89e838b6723a9c6ece25','837d578dfbe3c8c9539ab65d669c42df9046',NULL,1234567890,1483699392,'1,2,3'),(2,'doopps@gmail.com','111','123','123',NULL,1434343434,1481988357,'1,2,3');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-13 13:33:02
