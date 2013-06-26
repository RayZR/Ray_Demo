-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Dumping data for table mvc.data: 3 rows
DELETE FROM `data`;
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
INSERT INTO `data` (`id`, `text`) VALUES
	(75, 'This is something1'),
	(74, 'This is something'),
	(77, 'there is something 3');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;

-- Dumping data for table mvc.note: 7 rows
DELETE FROM `note`;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
INSERT INTO `note` (`noteId`, `userId`, `title`, `content`, `date_edited`) VALUES
	(13, 1, 'AAAAAAAAA', 'AAAAAAAAAAA', '2013-05-25 05:15:21'),
	(16, 1, 'ssssssss', 'ssssssssss', '2013-05-25 05:19:50'),
	(8, 1, 'ddddd', 'ddddddAAAAAAAaa', '2013-05-25 05:23:17'),
	(17, 1, 'adsasd', 'sdasd', '2013-05-25 05:27:59'),
	(18, 1, 'asdasd', 'dsadas', '2013-05-25 05:28:16'),
	(20, 26, 'asdasd', 'asdasdfff', '2013-05-25 05:38:10'),
	(21, 26, 'aaa', 'aaa', '2013-05-25 05:55:40');
/*!40000 ALTER TABLE `note` ENABLE KEYS */;

-- Dumping data for table mvc.users: 3 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
	(1, 'ray', '4de8d71b1412764a75d342a59ef859c20b12d2fcf277c16ca3c1e1ea079eccbf', 'owner'),
	(26, 'test', '678af70445170cdcd205792c6f77701743688d8e93233769a814d479858e8e77', 'default'),
	(25, 'sssss', 'c93f1a723c143ff89032a934a5e4299f9b64bf76dd5d6d4fc6d0dd6bbfc7a279', 'default');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
