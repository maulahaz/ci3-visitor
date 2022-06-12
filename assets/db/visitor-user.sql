-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.1.72-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table visitor.tbl_departments
CREATE TABLE IF NOT EXISTS `tbl_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plant_code` int(10) NOT NULL,
  `dept_code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `manager_name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table visitor.tbl_departments: 4 rows
/*!40000 ALTER TABLE `tbl_departments` DISABLE KEYS */;
INSERT INTO `tbl_departments` (`id`, `plant_code`, `dept_code`, `name`, `manager_name`, `description`) VALUES
	(1, 46, 'XL1', 'XLPE', 'brwxx096', 'XL01'),
	(2, 43, 'LD1', 'LDPE', 'xxw00097', 'LD01'),
	(3, 36, 'PP34', 'PP 3/4', 'brxx0102', 'PP34'),
	(4, 12, 'UO12', 'U&O 1&2', 'xxw001xx', 'UO12');
/*!40000 ALTER TABLE `tbl_departments` ENABLE KEYS */;

-- Dumping structure for table visitor.tbl_devices
CREATE TABLE IF NOT EXISTS `tbl_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table visitor.tbl_devices: 4 rows
/*!40000 ALTER TABLE `tbl_devices` DISABLE KEYS */;
INSERT INTO `tbl_devices` (`id`, `name`, `description`) VALUES
	(1, 'brg-xlp-bcd-gf-01', 'Borouge XLPE Ground Floor No.1'),
	(2, 'brg-xlp-bcd-gf-02', 'Borouge XLPE Ground Floor No.2'),
	(3, 'brg-xlp-bcd-11F-01', 'Borouge XLPE 11th Floor No.1'),
	(4, 'brg-xlp-bcd-2f-01', 'Borouge XLPE 2ndFloor No.2');
/*!40000 ALTER TABLE `tbl_devices` ENABLE KEYS */;

-- Dumping structure for table visitor.tbl_tokens
CREATE TABLE IF NOT EXISTS `tbl_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(125) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `expiry_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table visitor.tbl_tokens: 1 rows
/*!40000 ALTER TABLE `tbl_tokens` DISABLE KEYS */;
INSERT INTO `tbl_tokens` (`id`, `token`, `user_id`, `expiry_date`) VALUES
	(18, 'ExcUSLyEz43pKjVRt9XzzN3X8yVunVZj', 2, 1654513354);
/*!40000 ALTER TABLE `tbl_tokens` ENABLE KEYS */;

-- Dumping structure for table visitor.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_string` varchar(255) DEFAULT NULL,
  `username` varchar(55) DEFAULT NULL,
  `fullname` varchar(50) NOT NULL,
  `first_name` varchar(65) DEFAULT NULL,
  `last_name` varchar(75) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `code` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `num_logins` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  `trongate_user_id` int(11) NOT NULL,
  `isConfirmed` tinyint(1) DEFAULT NULL,
  `user_token` varchar(32) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table visitor.tbl_users: 6 rows
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`id`, `url_string`, `username`, `fullname`, `first_name`, `last_name`, `email`, `address`, `code`, `password`, `num_logins`, `last_login`, `trongate_user_id`, `isConfirmed`, `user_token`, `phone`, `role_id`, `picture`, `created_at`, `updated_at`) VALUES
	(1, 'user_one', 'user1', 'User One', 'User One', '', 'user@user.net', 'Jl. Besar', 'BRW0235220220526', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 19, 1653111007, 5, 1, '', '', 1, 'user_one.jpg', '2022-04-02 10:40:39', '2022-05-12 14:41:27'),
	(2, 'admin', 'admin', 'Admin', 'Administrator', '', 'admin@user.net', 'Jl. Besar', 'tmELBp54pSsxjRDc', '$2y$11$4WpgcXCvdUB1ueyLbdLx2.rmBa3o.6bZr4KY7RQl7rsKrL9ktLFBC', 17, 1654490557, 1, 1, '', '', 88, 'admin.png', '2022-04-02 10:40:39', '2022-05-12 13:05:50'),
	(3, 'webmaster', 'webmaster', 'Webmaster', 'Webmaster', '', 'webmaster@user.net', 'Jl. Besar', 'tmELBp54pSsxjRDc', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 1, 1647538590, 10, 1, '', '', 99, 'webmaster.png', '2022-04-02 10:40:39', '2022-05-12 13:05:40'),
	(4, 'user_two', 'user2', 'User Two', 'User Two', '', 'user@user.net', 'Jl. Besar', 'BRW0234220220526', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 19, 1653111007, 5, 1, '', '', 1, 'user_one.jpg', '2022-04-02 10:40:39', '2022-05-12 14:41:27'),
	(5, 'user_three', 'user3', 'User Three', 'User Three', '', 'user@user.net', 'Jl. Besar', 'BRW0239820220526', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 19, 1653111007, 5, 1, '', '', 1, 'user_one.jpg', '2022-04-02 10:40:39', '2022-05-12 14:41:27'),
	(6, 'user_four', 'user4', 'User Four', 'User Four', '', 'user@user.net', 'Jl. Besar', 'BRW0239820220526', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 19, 1653111007, 5, 1, '', '', 1, 'user_one.jpg', '2022-04-02 10:40:39', '2022-05-12 14:41:27');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

-- Dumping structure for table visitor.tbl_visitors
CREATE TABLE IF NOT EXISTS `tbl_visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL DEFAULT '0',
  `user_code` varchar(50) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `log_at` datetime NOT NULL,
  `log_type` varchar(50) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Dumping data for table visitor.tbl_visitors: 19 rows
/*!40000 ALTER TABLE `tbl_visitors` DISABLE KEYS */;
INSERT INTO `tbl_visitors` (`id`, `device_id`, `user_code`, `user_id`, `log_at`, `log_type`, `notes`) VALUES
	(1, 1, 'BRW0239820220526', 0, '2022-05-26 08:33:03', 'punch_in', NULL),
	(2, 1, 'BRW0234220220526', NULL, '2022-05-26 08:22:44', 'punch_in', 'test'),
	(51, 2, 'BRW0239820220526', NULL, '2022-05-26 16:10:42', 'punch_in', NULL),
	(52, 1, 'BRW0235220220526', NULL, '2022-05-26 16:10:59', 'punch_in', NULL),
	(53, 3, 'BRW0239820220526', NULL, '2022-05-26 16:11:19', 'punch_out', NULL),
	(49, 4, 'BRW0239820220526', NULL, '2022-05-26 16:05:51', 'punch_out', NULL),
	(50, 3, 'BRW0235520220526', NULL, '2022-05-26 16:08:17', 'punch_in', NULL),
	(47, 1, 'BRW0234420220526', NULL, '2022-05-26 16:05:15', 'punch_in', NULL),
	(48, 4, 'BRW0234420220526', NULL, '2022-05-26 16:05:24', 'punch_out', NULL),
	(54, 4, 'BRW0234220220526', NULL, '2022-06-01 06:44:52', 'punch_out', 'notes'),
	(55, 4, 'BRW0234220220526', NULL, '2022-06-01 06:44:53', 'punch_in', 'notes'),
	(56, 3, 'BRW0230020220556', NULL, '2022-06-01 07:48:11', 'punch_in', 'notes'),
	(57, 2, 'BRW0230020220556', NULL, '2022-06-01 07:50:16', 'punch_out', 'notes'),
	(58, 1, 'BRW0235220220526', NULL, '2022-06-01 07:52:48', 'punch_out', 'notes'),
	(59, 2, 'BRW0235220220526', NULL, '2022-06-01 10:22:45', 'punch_in', 'notes'),
	(60, 1, 'BRW0235220220526', NULL, '2022-06-01 10:22:54', 'punch_out', 'notes'),
	(61, 2, 'BRW0239820220526', NULL, '2022-06-05 14:52:20', 'punch_in', 'notes'),
	(62, 2, 'BRW0239820220526', NULL, '2022-06-05 14:52:26', 'punch_out', 'notes'),
	(63, 2, 'BRW0239820220526', NULL, '2022-06-05 14:55:38', 'punch_in', 'notes');
/*!40000 ALTER TABLE `tbl_visitors` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
