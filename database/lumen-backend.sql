

CREATE TABLE `manager` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `is_action` enum('on','off') NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `privileges` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `manager-operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_id` int(11) NOT NULL,
  `manager_name` varchar(50) NOT NULL,
  `request_method` enum('GET','POST') NOT NULL,
  `request_uri` varchar(100) NOT NULL,
  `post_data` text NOT NULL,
  `created_at` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `token` varchar(100) NOT NULL,
  `token_secret` varchar(100) NOT NULL,
  `is_action` enum('on','off') NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `privileges` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `manager` (`id`, `account`, `password`, `is_action`, `created_at`, `updated_at`, `privileges`) VALUES (1, 'koocyton@gmail.com', '6e5e32f49d30db450234d6c3ec2625d5', 'on', 1234567890, 1481475662, '');

INSERT INTO `user` (`id`, `account`, `password`, `token`, `token_secret`, `is_action`, `created_at`, `updated_at`, `privileges`) VALUES (1, 'koocyton@gmail.com', '6e5e32f49d30db450234d6c3ec2625d5', 'd9617b0b7d0adcace53055bf503fbc120378cfa252eb2afd0200d7e1c1bc4463', 'f2aef0c31774e637d860031d991c74f23bc4dd536d283d1333c8bb434d07cf5d', 'on', 1234567890, 1481475892, '');

