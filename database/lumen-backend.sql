-- MySQL dump 10.16  Distrib 10.1.17-MariaDB, for osx10.12 (x86_64)
--
-- Host: localhost    Database: lumen-backend
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
-- Table structure for table `grouping`
--

DROP TABLE IF EXISTS `grouping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grouping` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(254) NOT NULL COMMENT '组名',
  `deleted_at` int(10) DEFAULT NULL COMMENT '组的开关',
  `privileges` text NOT NULL COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grouping`
--

LOCK TABLES `grouping` WRITE;
/*!40000 ALTER TABLE `grouping` DISABLE KEYS */;
INSERT INTO `grouping` VALUES (1,'项目组',NULL,'/task/list,/task/detail,/task/create,/task/update,/task/apply,/project/api-list,/project/api-detail,/project/api-create,/project/api-update,/project/api-apply,/project/data-list,/project/data-detail,/project/data-create,/project/data-update,/project/data-apply,/project/doc-list,/project/doc-detail,/project/doc-create,/project/doc-update,/project/doc-apply,/operation/me,/operation/list,/manager/list,/manager/detail,/manager/apply,/manager/create,/manager/update,/grouping/list,/grouping/detail,/grouping/create,/grouping/update'),(2,'美术组',NULL,'/task/list,/task/detail,/task/create,/task/update,/task/apply,/project/api-list,/project/api-detail,/project/api-create,/project/api-update,/project/api-apply,/project/data-list,/project/data-detail,/project/data-create,/project/data-update,/project/data-apply,/project/doc-list,/project/doc-detail,/project/doc-create,/project/doc-update,/project/doc-apply,/operation/me,/operation/list,/manager/list,/manager/detail,/manager/apply,/manager/create,/manager/update,/grouping/list,/grouping/detail,/grouping/create,/grouping/update'),(3,'策划组',NULL,'/task/list,/task/detail,/task/create,/task/update,/task/apply,/project/api-list,/project/api-detail,/project/api-create,/project/api-update,/project/api-apply,/project/data-list,/project/data-detail,/project/data-create,/project/data-update,/project/data-apply,/project/doc-list,/project/doc-detail,/project/doc-create,/project/doc-update,/project/doc-apply,/operation/me,/operation/list,/manager/list,/manager/detail,/manager/apply,/manager/create,/manager/update,/grouping/list,/grouping/detail,/grouping/create,/grouping/update'),(4,'测试组',NULL,'/task/list,/task/detail,/task/create,/task/update,/task/apply,/project/api-list,/project/api-detail,/project/api-create,/project/api-update,/project/api-apply,/project/data-list,/project/data-detail,/project/data-create,/project/data-update,/project/data-apply,/project/doc-list,/project/doc-detail,/project/doc-create,/project/doc-update,/project/doc-apply,/operation/me,/operation/list,/manager/list,/manager/detail,/manager/apply,/manager/create,/manager/update,/grouping/list,/grouping/detail,/grouping/create,/grouping/update'),(5,'客户端',NULL,'/task/list,/task/detail,/task/create,/task/update,/task/apply,/project/api-list,/project/api-detail,/project/api-create,/project/api-update,/project/api-apply,/project/data-list,/project/data-detail,/project/data-create,/project/data-update,/project/data-apply,/project/doc-list,/project/doc-detail,/project/doc-create,/project/doc-update,/project/doc-apply,/operation/me,/operation/list,/manager/list,/manager/detail,/manager/apply,/manager/create,/manager/update,/grouping/list,/grouping/detail'),(6,'服务端',NULL,'/task/list,/task/detail,/task/create,/task/update,/task/apply,/project/api-list,/project/api-detail,/project/api-create,/project/api-update,/project/api-apply,/project/data-list,/project/data-detail,/project/data-create,/project/data-update,/project/data-apply,/project/doc-list,/project/doc-detail,/project/doc-create,/project/doc-update,/project/doc-apply,/operation/me,/operation/list,/manager/list,/manager/detail,/manager/apply,/manager/create,/manager/update,/grouping/list,/grouping/detail,/grouping/create,/grouping/update');
/*!40000 ALTER TABLE `grouping` ENABLE KEYS */;
UNLOCK TABLES;

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
  `groupings` text NOT NULL COMMENT '权限',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (9,'test@test.com','TEST','cddb44e3bdf429f02230289435338d75','5fbd6f876458aa040fc2','625ba250d8214fb669fb51dc86750dd443d6',NULL,1487125937,1487125957,'美术组,策划组,客户端');
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
INSERT INTO `operation-record` VALUES (7,9,'test@test.com','POST','login/signin','{\"_token\":\"\",\"account\":\"test@test.com\",\"password\":\"test@test.com\"}',1482576232);
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
  `status` enum('process','resolve','discard') NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `deleted_at` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (1,'我说一大堆，你也不明白啊','doc','1','刘毅','','4','process',0,0,NULL),(2,'任务描述','bug','1','大毛','','说明','resolve',0,0,NULL),(3,'任务描述','task','1','德慧','','说　明说　明说　明说　明说　明','discard',0,0,NULL),(4,'这里是说明哦这里是说明哦这里是说明哦这里是说明哦','bug','1','大毛','','这里是说明哦','process',0,0,NULL),(5,' 任务描述 任务描述 任务描述','doc','1','刘毅','','说　明说　明说　明说　明说　明','process',0,0,NULL),(6,'描述','bug','1','大毛','','描述','process',1486802651,1486802651,NULL),(7,'asdfsafsafsasaf','bug','1','刘毅','','safdsasafafsfsa','process',1486803484,1486803484,NULL),(8,'asfdsafsafsaf','task','1','','','asdfsafsaf','process',1486803494,1486803494,NULL),(9,'任务描述','bug','1','刘毅','','说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明\r\n说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明说　明','process',1487032552,1487032552,NULL);
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

-- Dump completed on 2017-02-15 10:43:30
