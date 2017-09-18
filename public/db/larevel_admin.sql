-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  `fb_id` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `google_id` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `fname` varchar(200) CHARACTER SET latin1 NOT NULL,
  `lname` varchar(200) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(20) CHARACTER SET latin1 NOT NULL,
  `registered_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `reset_request_datetime` datetime DEFAULT NULL,
  `email_confirmation_code` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `is_confirm` tinyint(4) DEFAULT '0',
  `login_count` int(11) DEFAULT NULL,
  `profile_url_large` text CHARACTER SET latin1,
  `profile_url_small` text CHARACTER SET latin1,
  `profile_url_extra_small` text CHARACTER SET latin1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_user_type_idx` (`user_type_id`),
  CONSTRAINT `fk_users_user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) CHARACTER SET latin1 NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2016-06-01 05:16:47