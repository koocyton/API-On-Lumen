
CREATE TABLE `user` (
  `id` int(16) NOT NULL COMMENT '用户 ID',
  `account` varchar(20) NOT NULL COMMENT '账号',
  `password` char(32) NOT NULL COMMENT '密码',
  `nick_name` varchar(20) NOT NULL COMMENT '昵称',
  `token` varchar(100) NOT NULL COMMENT 'token',
  `token_secret` varchar(100) NOT NULL COMMENT 'token secret',
  `deleted_at` int(10) DEFAULT NULL COMMENT '软删除时间',
  `created_at` int(10) NOT NULL COMMENT '创建时间',
  `updated_at` int(10) NOT NULL COMMENT '上次登录时间',
  `channels_id` text NOT NULL COMMENT '用户的频道'
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `user` (`id`, `account`, `password`, `token`, `token_secret`, `nick_name`, `deleted_at`, `created_at`, `updated_at`, `channels_id`) VALUES (1, 'koocyton@gmail.com', '6e5e32f49d30db450234d6c3ec2625d5', '89e838b6723a9c6ece25', '837d578dfbe3c8c9539ab65d669c42df9046', 'koocyton', NULL, 1234567890, 1481643982, '1,2,3');
