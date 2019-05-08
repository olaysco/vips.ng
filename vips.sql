-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for vips
CREATE DATABASE IF NOT EXISTS `vips` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `vips`;

-- Dumping structure for table vips.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `hear_about` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `referral_code` varchar(50) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table vips.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `full_name`, `hear_about`, `email`, `phone_number`, `password`, `referral_code`, `created_at`, `updated_at`) VALUES
	(000000000001, 'Jegede David', 'online', 'jegede@gmail.com', '080909888', 'popopopo', '1', '2019-05-06 19:49:23', '2019-05-06 19:49:38'),
	(000000000002, '', '', 'mmmmmm@maio.com', '', '0909p909', '', '2019-05-06 20:55:19', '2019-05-06 20:55:19'),
	(000000000003, 'oololl', 'gsearch', 'emmanueljoshua@gmail.com', '087456789', 'emmanuel', '1234567', '2019-05-06 21:09:15', '2019-05-06 21:09:15'),
	(000000000004, 'oololl', 'gsearch', 'emmanueljoshua@gmail.com', '090987654', 'joshuaa', '1234567', '2019-05-06 21:10:04', '2019-05-06 21:10:04');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
