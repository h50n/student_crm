# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.21)
# Database: student_crm
# Generation Time: 2015-01-19 01:01:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table student_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_images`;

CREATE TABLE `student_images` (
  `student_image_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) unsigned DEFAULT NULL,
  `file location` varchar(256) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_image_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `student_images_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `student_images` WRITE;
/*!40000 ALTER TABLE `student_images` DISABLE KEYS */;

INSERT INTO `student_images` (`student_image_id`, `student_id`, `file location`, `date_created`)
VALUES
	(1,1,'dedede','2015-01-15 13:28:41');

/*!40000 ALTER TABLE `student_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_notes`;

CREATE TABLE `student_notes` (
  `student_note_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) unsigned NOT NULL,
  `note` varchar(11) DEFAULT NULL,
  `user` varchar(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_note_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `student_notes_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) DEFAULT '',
  `last_name` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `phone`, `email`, `address`, `date_created`)
VALUES
	(1,'mark','Hanson','34343','fefef','dwdwd','2015-01-15 13:28:30'),
	(17,'','','','','','2015-01-18 23:22:29'),
	(19,'','','','','','2015-01-18 23:22:42');

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(11) DEFAULT NULL,
  `first_name` varchar(11) DEFAULT NULL,
  `last_name` varchar(11) DEFAULT NULL,
  `password` varchar(11) DEFAULT NULL,
  `email` varchar(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `password`, `email`, `date_created`)
VALUES
	(1,NULL,'Test','Test 2','Tes',NULL,'2015-01-15 13:29:16'),
	(2,NULL,'Test','Test 2','Tes',NULL,'2015-01-15 13:29:26'),
	(3,NULL,'changes','tupac','Tes',NULL,'2015-01-15 20:09:18'),
	(4,NULL,'changes','tupac','Tes',NULL,'2015-01-15 20:09:23'),
	(5,NULL,'changes','tupac','Tes',NULL,'2015-01-15 20:35:30'),
	(6,NULL,'changes','tupac','Tes',NULL,'2015-01-15 20:35:34'),
	(7,NULL,'changes','tupac','Tes',NULL,'2015-01-15 20:35:35'),
	(8,NULL,'changes','tupac','Tes',NULL,'2015-01-15 20:35:40'),
	(9,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:22'),
	(10,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:25'),
	(11,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:27'),
	(12,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:31'),
	(13,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:45'),
	(14,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:47'),
	(15,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:49'),
	(16,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:51'),
	(17,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:52'),
	(18,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:52'),
	(19,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:53'),
	(20,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:53'),
	(21,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:54'),
	(22,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:54'),
	(23,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:24:59'),
	(24,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:25:01'),
	(25,NULL,'mike','mike','Tes',NULL,'2015-01-15 23:25:03'),
	(26,NULL,'','','Tes',NULL,'2015-01-15 23:29:16'),
	(27,NULL,'ddd','ddddd','Tes',NULL,'2015-01-15 23:29:24'),
	(28,NULL,'www','wwww','Tes',NULL,'2015-01-15 23:29:28'),
	(29,'test',NULL,NULL,'test',NULL,'2015-01-15 23:47:32'),
	(30,NULL,'www','wwww','Tes',NULL,'2015-01-15 23:55:23'),
	(31,NULL,'sss','sss','Tes',NULL,'2015-01-15 23:55:29'),
	(32,NULL,'sss','ssss','Tes',NULL,'2015-01-15 23:55:32'),
	(33,NULL,'sss','ssss','Tes',NULL,'2015-01-15 23:56:02'),
	(34,NULL,'','','Tes',NULL,'2015-01-15 23:56:05'),
	(35,NULL,'ssss','ssssss','Tes',NULL,'2015-01-15 23:56:08'),
	(36,NULL,'fgfg','vvhghgv','Tes',NULL,'2015-01-16 00:11:40'),
	(37,NULL,'hhh','hhjh','Tes',NULL,'2015-01-16 00:11:45'),
	(38,NULL,'','','','{email}','2015-01-17 01:21:11'),
	(39,NULL,'','','','{email}','2015-01-17 01:21:26'),
	(40,NULL,'','','','{email}','2015-01-17 01:21:29'),
	(41,NULL,'','','','{email}','2015-01-17 01:21:41'),
	(42,NULL,'','','','{email}','2015-01-17 01:21:44'),
	(43,NULL,'','','','{email}','2015-01-17 01:21:47'),
	(44,NULL,'','','','{email}','2015-01-17 01:24:55'),
	(45,NULL,'updated','updated','deddede','{email}','2015-01-17 01:25:00'),
	(46,'','Hello','Hello','Hello','Hello','2015-01-17 01:27:38'),
	(47,'','','','','','2015-01-17 01:27:40'),
	(48,'','hi','hi','hi','hi','2015-01-17 01:27:49');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
