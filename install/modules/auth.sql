
--

create table `mdv_users` 
(
 `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL,
  `last_login` int(10) UNSIGNED,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



create table `mdv_roles`
(
 `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_name` (`name`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `mdv_roles` (`id`, `name`, `description`) VALUES(1, 'login', 'Login privileges, granted after account confirmation');
INSERT INTO `mdv_roles` (`id`, `name`, `description`) VALUES(2, 'admin', 'Administrative user, has access to everything.');





CREATE TABLE IF NOT EXISTS `mdv_users_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE IF NOT EXISTS `mdv_users_sessions` (
 `user_id` int(10) UNSIGNED NOT NULL,
 `time_stamp` int(10) UNSIGNED,
`session_id` varchar(32), 
PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- add test admin

insert into `mdv_users` (`id`,`email`,`username`,`password` ,  `last_login`)
values 
(1,'admin@admin.ru','admin',md5('1234'),UNIX_TIMESTAMP());

insert into `mdv_users_roles` (`user_id`,`role_id` ) values (1,1);
insert into `mdv_users_roles` (`user_id`,`role_id` ) values (1,2);







