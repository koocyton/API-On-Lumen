
CREATE TABLE `manager` (
  `id` int(16) NOT NULL COMMENT '管理员 id',
  `account` varchar(20) NOT NULL COMMENT '账号',
  `password` char(32) NOT NULL COMMENT '密码',
  `deleted_at` int(10) DEFAULT NULL COMMENT '软删除的时间戳',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  `updated_at` int(10) NOT NULL COMMENT '更新时间',
  `privileges` text NOT NULL COMMENT '权限'
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `manager-operation` (
  `id` int(11) NOT NULL COMMENT '日志顺序id',
  `manager_id` int(11) NOT NULL COMMENT '操作员 id',
  `manager_name` varchar(50) NOT NULL COMMENT '操作者名称',
  `request_method` enum('GET','POST') NOT NULL COMMENT 'request method',
  `request_uri` varchar(100) NOT NULL COMMENT '请求的 url',
  `post_data` text NOT NULL COMMENT 'post 数据',
  `created_at` int(10) NOT NULL COMMENT '请求的时间'
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `manager` (`id`, `account`, `password`, `deleted_at`, `created_at`, `updated_at`, `privileges`) VALUES (1, 'koocyton@gmail.com', '6e5e32f49d30db450234d6c3ec2625d5', NULL, 1434343434, 1481634528, '');



