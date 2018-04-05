CREATE DATABASE IF NOT EXISTS `api-fer` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `api-fer`;

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `npc` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pass` text,
  `type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO
	users(user, name, pass, type)
VALUES
	('admin', 'Admin', 'b24c985bbc7b2fd0214f6dd741bd22848668b0e7', 2);