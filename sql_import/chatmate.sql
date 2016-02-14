-- Adminer 4.2.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `apitokens`;
CREATE TABLE `apitokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `apiToken` varchar(32) NOT NULL,
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `apitokens` (`id`, `userID`, `apiToken`, `creationDate`) VALUES
(3,	1,	'de2b95190b6eacab5faa3d72699e9373',	'2016-02-13 13:41:45');

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `postTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `messages` (`id`, `userID`, `message`, `postTime`) VALUES
(12,	1,	'Waddap',	'2016-02-13 13:41:50'),
(13,	1,	'TEST &lt;img src=&quot;&quot;&gt;',	'2016-02-13 13:42:43');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstLogin` datetime NOT NULL,
  `lastLogin` datetime NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstLogin`, `lastLogin`, `isAdmin`) VALUES
(1,	'Test',	'test@test.com',	'$2y$10$g94LeyXOJY7p6z4ydQdmUO2Cali6IXkypr50bxnMyf5T2D0AWPGyW',	'2016-02-13 13:41:45',	'2016-02-14 04:37:02',	0);

-- 2016-02-14 12:02:28
