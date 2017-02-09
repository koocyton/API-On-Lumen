-- MySQL dump 10.16  Distrib 10.1.17-MariaDB, for osx10.12 (x86_64)
--
-- Host: localhost    Database: lumen-backend
-- ------------------------------------------------------
-- Server version 10.1.17-MariaDB

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
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manager` (
  `id` int(16) NOT NULL AUTO_INCREMENT COMMENT '管理员 id',
  `account` varchar(20) NOT NULL COMMENT '账号',
  `username` varchar(254) NOT NULL,
  `password` char(32) NOT NULL COMMENT '密码',
  `token` varchar(50) NOT NULL,
  `token_secret` varchar(50) NOT NULL,
  `deleted_at` int(10) DEFAULT NULL COMMENT '软删除的时间戳',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  `updated_at` int(10) NOT NULL COMMENT '更新时间',
  `privileges` text NOT NULL COMMENT '权限',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (1,'koocyton@gmail.com','刘毅','6e5e32f49d30db450234d6c3ec2625d5','1e1517365bdd4dcaafa0','dcb382ae91dfba0c8382c438766d4ccf96db',NULL,1434343434,1486664537,''),(2,'liuyi.hn@gmail.com','刘毅','6e5e32f49d30db450234d6c3ec2625d5','','',NULL,1434343434,1484410152,''),(3,'doopps@gmail.com','刘毅','6e5e32f49d30db450234d6c3ec2625d5','','',NULL,1434343434,1484373000,'');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operation-record`
--

DROP TABLE IF EXISTS `operation-record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operation-record` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志顺序id',
  `manager_id` int(11) NOT NULL COMMENT '操作员 id',
  `manager_name` varchar(50) NOT NULL COMMENT '操作者名称',
  `request_method` enum('GET','POST') NOT NULL COMMENT 'request method',
  `request_uri` varchar(100) NOT NULL COMMENT '请求的 url',
  `post_data` text NOT NULL COMMENT 'post 数据',
  `created_at` int(10) NOT NULL COMMENT '请求的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operation-record`
--

LOCK TABLES `operation-record` WRITE;
/*!40000 ALTER TABLE `operation-record` DISABLE KEYS */;
INSERT INTO `operation-record` VALUES (1,1,'koocyton@gmail.com','GET','operation/list','',1482576183),(2,1,'koocyton@gmail.com','GET','operation/list','',1482576192),(3,1,'koocyton@gmail.com','GET','operation/list','',1482576196),(4,1,'koocyton@gmail.com','GET','operation/list','',1482576227),(5,1,'koocyton@gmail.com','GET','login/signout','',1482576231),(6,1,'koocyton@gmail.com','GET','login','',1482576231),(7,1,'koocyton@gmail.com','POST','login/signin','{\"_token\":\"\",\"account\":\"koocyton@gmail.com\",\"password\":\"qe2ao3ba\"}',1482576232),(8,1,'koocyton@gmail.com','GET','manager/list','',1482576233),(9,1,'koocyton@gmail.com','GET','operation/list','',1482576235);
/*!40000 ALTER TABLE `operation-record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `category` enum('task','bug','doc') NOT NULL,
  `author` varchar(255) NOT NULL,
  `owner` text NOT NULL,
  `subscribers` text NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `deleted_at` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-10  2:28:24
