-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 09:44 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.28

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `id` int(11) NOT NULL,
  `plant_code` int(10) NOT NULL,
  `dept_code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `manager_name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `tbl_departments`
--

INSERT INTO `tbl_departments` (`id`, `plant_code`, `dept_code`, `name`, `manager_name`, `description`) VALUES
(1, 46, 'XL1', 'XLPE', 'brwxx096', 'XL01'),
(2, 43, 'LD1', 'LDPE', 'xxw00097', 'LD01'),
(3, 36, 'PP34', 'PP 3/4', 'brxx0102', 'PP34'),
(4, 12, 'UO12', 'U&O 1&2', 'xxw001xx', 'UO12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_devices`
--

CREATE TABLE `tbl_devices` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ;

--
-- Dumping data for table `tbl_devices`
--

INSERT INTO `tbl_devices` (`id`, `name`, `description`) VALUES
(1, 'brg-xlp-bcd-gf-01', 'Borouge XLPE Ground Floor No.1'),
(2, 'brg-xlp-bcd-gf-02', 'Borouge XLPE Ground Floor No.2'),
(3, 'brg-xlp-bcd-11F-01', 'Borouge XLPE 11th Floor No.1'),
(4, 'brg-xlp-bcd-2f-01', 'Borouge XLPE 2ndFloor No.2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tokens`
--

CREATE TABLE `tbl_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(125) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `expiry_date` int(11) NOT NULL
) ;

--
-- Dumping data for table `tbl_tokens`
--

INSERT INTO `tbl_tokens` (`id`, `token`, `user_id`, `expiry_date`) VALUES
(18, 'ExcUSLyEz43pKjVRt9XzzN3X8yVunVZj', 2, 1654513354),
(20, '-5kEuRNcpkGdU3NrSb5KzVzbjuE9Spjn', 0, 1654716205),
(21, 'QFa466heygawNPnzEhaCHWHDXsax72DV', 0, 1654716323),
(22, 'VrjLY2kMpw6e8gjXkWNxr2RxsDFWKkgU', 0, 1654716349),
(23, 'pY_-gG8vZhyNsPSx5jzWfER-j7bGFmL7', 0, 1654796415),
(24, 'ZkbGJ93hNcWgZH7cdtx8gFP-_-jTYgwz', 0, 1654797062),
(25, '_yyET6hmcALsQ4-yZ2-r5zarJN62RxjC', 0, 1654824445),
(26, 'KNJKDdUp8Nqs6_zHj7GcmPsPq5R4WsY7', 0, 1654824447),
(27, '-9DuhhEqrNaK6EWMh5rhqWxzzTGBhjPw', 0, 1654824530),
(28, 'JbJE9TCM3L_LgppVp3y7HcADa7ZF59QF', 0, 1654827922),
(29, 'HpfX-HmDjxQgh-csymUQS2dX-PeEWTxz', 0, 1654830376),
(30, 'y4-hMEm4GAj8Npcz7hwmMt-bbAXYgRsB', 0, 1654840040),
(31, 'bBg47bFCt_T2X7vKCDgbRr57cz3kbzdb', 0, 1654840091),
(32, 'T4BYaRn7DGyR-a9p4sswpAz4v_FL5Qu_', 0, 1654841399),
(33, '8tt47KrwyyRxUKHa3ST4kvfCEa_XnfnB', 0, 1654999508),
(34, '5PqBBC8582rhrARqCqUry5rYEHZSSCPc', 0, 1655002838),
(35, 'XV7ta9NhcA3Ybt_E4JXRyHXxUYV3jea5', 0, 1655084278),
(36, 'pG6_Tu-_8_FGFEb6Ck9gvWgULd4sjm5U', 0, 1655084371),
(37, 'LDThFPYf2dye3MG7cgjGkfJ3cSqmRbgT', 0, 1655106196);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
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
  `company` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `url_string`, `username`, `fullname`, `first_name`, `last_name`, `email`, `address`, `code`, `password`, `num_logins`, `last_login`, `trongate_user_id`, `isConfirmed`, `user_token`, `phone`, `role_id`, `company`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'user_one', 'user1', 'User One', 'User One', '', 'user@user.net', 'Jl. Besar', 'BRW0235220220526', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 21, 1654916438, 5, 1, '', '', 1, NULL, 'user_one.jpg', '2022-04-02 06:40:39', '2022-05-12 10:41:27'),
(2, 'admin', 'admin', 'Admin', 'Administrator', '', 'admin@user.net', 'Jl. Besar', 'tmELBp54pSsxjRDc', '$2y$11$4WpgcXCvdUB1ueyLbdLx2.rmBa3o.6bZr4KY7RQl7rsKrL9ktLFBC', 12, 1655019796, 1, 1, '', '345345', 88, NULL, 'admin.png', '2022-04-02 06:40:39', '2022-05-12 09:05:50'),
(3, 'webmaster', 'webmaster', 'Webmaster', 'Webmaster', '', 'webmaster@user.net', 'Jl. Besar', 'tmELBp54pSsxjRDc', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 1, 1647538590, 10, 1, '', '', 99, NULL, 'webmaster.png', '2022-04-02 06:40:39', '2022-05-12 09:05:40'),
(4, 'user_two', 'user2', 'User Two', 'User Two', '', 'user@user.net', 'Jl. Besar', 'BRW0234220220526', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 22, 1654997878, 5, 1, '', '', 1, NULL, 'user_one.jpg', '2022-04-02 06:40:39', '2022-05-12 10:41:27'),
(5, 'user_three', 'user3', 'User Three', 'User Three', '', 'user@user.net', 'Jl. Besar', 'BRW0239820220526', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 19, 1653111007, 5, 1, '', '', 1, NULL, 'user_one.jpg', '2022-04-02 06:40:39', '2022-05-12 10:41:27'),
(6, 'user_four', 'user4', 'User Four', 'User Four', '', 'user@user.net', 'Jl. Besar', 'BRW0239820220526', '$2y$11$bFw83r0WMnhFJSv3KYkpq.bNXMTBMpzc1JJP7bgGqWJ/y4isrFNEi', 19, 1653111007, 5, 1, '', '', 1, NULL, 'user_one.jpg', '2022-04-02 06:40:39', '2022-05-12 10:41:27'),
(10, NULL, 'gnRsaDYMp4', 'Rahman', NULL, NULL, NULL, '', 'Yp6kLNe7Wv8DKunG', '$2y$11$3DSpG9bIDyxTupC4derPreehxq4aqdNXHHKFs0.LKTck2NZvI.WG2', 1, 1654753640, 0, NULL, '', '056565656', 0, 'J-Best', 'noimage.jpg', '2022-06-09 03:39:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitors`
--

CREATE TABLE `tbl_visitors` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL DEFAULT '0',
  `user_code` varchar(50) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `log_at` datetime NOT NULL,
  `log_type` varchar(50) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `tbl_visitors`
--

INSERT INTO `tbl_visitors` (`id`, `device_id`, `user_code`, `user_id`, `log_at`, `log_type`, `notes`) VALUES
(1, 1, 'BRW0239820220526', 0, '2022-06-12 08:33:03', 'punch_in', NULL),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_devices`
--
ALTER TABLE `tbl_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tokens`
--
ALTER TABLE `tbl_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_departments`
--
ALTER TABLE `tbl_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_devices`
--
ALTER TABLE `tbl_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tokens`
--
ALTER TABLE `tbl_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
