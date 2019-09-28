-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 12:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keptit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `keptit_appointment`
--

CREATE TABLE `keptit_appointment` (
  `id` int(11) NOT NULL,
  `userId` varchar(50) NOT NULL,
  `scheduledDt` varchar(100) NOT NULL,
  `appointmentName` varchar(250) NOT NULL,
  `appointmentId` varchar(60) NOT NULL,
  `scheduleType` varchar(500) NOT NULL,
  `countryCode` varchar(10) NOT NULL,
  `mobileNo` bigint(20) NOT NULL,
  `createdDt` varchar(100) NOT NULL,
  `isWeekly` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isMonthly` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isYearly` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isOneTime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keptit_appointment`
--

INSERT INTO `keptit_appointment` (`id`, `userId`, `scheduledDt`, `appointmentName`, `appointmentId`, `scheduleType`, `countryCode`, `mobileNo`, `createdDt`, `isWeekly`, `isMonthly`, `isYearly`, `isOneTime`) VALUES
(1, 'KT001', '2019-08-15T05:27:54.944Z', 'vikrant', '', 'birthday', '+1', 8807970555, '2019-08-16 07:09:14', 1, 1, 1, NULL),
(2, 'KT001', '2019-08-15T05:27:54.944Z', 'vikrant', '', 'birthday', '+1', 8807970555, '2019-08-16 07:09:44', 1, 1, 1, NULL),
(3, 'KT001', '2019-08-15T05:27:54.944Z', 'vikrant', '6b6edc1ec956049da92add7f332e7f1e', 'birthday', '+1', 8807970555, '2019-09-15 12:19:23', 1, 1, 1, NULL),
(4, 'KT001', '2019-08-15T05:27:54.944Z', 'vikrant', '87374e37eb5c33483d56104fa0809758', 'birthday', '+1', 8807970555, '2019-09-17 10:48:59', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keptit_groups`
--

CREATE TABLE `keptit_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keptit_groups`
--

INSERT INTO `keptit_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `keptit_login_attempts`
--

CREATE TABLE `keptit_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keptit_login_attempts`
--

INSERT INTO `keptit_login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(3, '::1', 'admin@admin.com1', 1569662643);

-- --------------------------------------------------------

--
-- Table structure for table `keptit_register`
--

CREATE TABLE `keptit_register` (
  `id` int(11) NOT NULL,
  `userId` varchar(20) NOT NULL,
  `lastUpdatedDt` varchar(150) DEFAULT NULL,
  `firstName` varchar(256) DEFAULT NULL,
  `lastName` varchar(256) DEFAULT NULL,
  `emailId` varchar(150) DEFAULT NULL,
  `dateOfBirth` varchar(250) DEFAULT NULL,
  `mobileNo` bigint(20) NOT NULL,
  `countryCode` varchar(20) NOT NULL,
  `deviceToken` varchar(500) NOT NULL,
  `deviceId` varchar(500) NOT NULL,
  `deviceType` varchar(10) NOT NULL,
  `otp` int(11) NOT NULL,
  `Image` text,
  `appointmentNumber` bigint(20) NOT NULL,
  `active_status` int(11) NOT NULL COMMENT '0- for inactive, 1 for active',
  `verification_method` int(11) NOT NULL COMMENT '1 for sms, 2 for call',
  `createdDate` varchar(50) NOT NULL,
  `modifiedDate` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keptit_register`
--

INSERT INTO `keptit_register` (`id`, `userId`, `lastUpdatedDt`, `firstName`, `lastName`, `emailId`, `dateOfBirth`, `mobileNo`, `countryCode`, `deviceToken`, `deviceId`, `deviceType`, `otp`, `Image`, `appointmentNumber`, `active_status`, `verification_method`, `createdDate`, `modifiedDate`) VALUES
(1, 'KT001', '2019-09-17 12:48:33', 'DDDDDDDDDDD', 'DDD', 'MSCSOFT04@GMAILCOM', NULL, 8484848486, '+1', '3434343', '3233', 'android', 8469, 'http://localhost/keptit/uploads/image/1568704713.jpg', 8001231234, 1, 1, '2019-08-15 10:36:21', ''),
(2, 'KT002', NULL, NULL, NULL, NULL, NULL, 8484848487, '+1', '3434343', '3233', 'android', 1234, NULL, 8001231234, 0, 0, '2019-08-15 10:38:44', ''),
(3, 'KT003', NULL, NULL, NULL, NULL, NULL, 9994880917, '+1', '34343437', '32335', 'ios', 7841, NULL, 8001231234, 1, 2, '2019-08-15 10:40:17', ''),
(4, 'KT004', NULL, NULL, NULL, NULL, NULL, 9994880918, '+1', '878787878', '32335', 'ios', 8495, NULL, 8001231234, 0, 0, '2019-08-16 03:34:34', ''),
(5, 'KT005', NULL, NULL, NULL, NULL, NULL, 999488097, '+1', '7878787888', '32335', 'ios', 4765, NULL, 8001231234, 0, 0, '2019-08-16 03:34:54', '2019-08-16 03:37:24'),
(6, 'KT006', NULL, NULL, NULL, NULL, NULL, 999488889, '+1', '78787878', '32335', 'ios', 6978, NULL, 8001231234, 0, 0, '2019-08-16 03:37:36', '2019-08-16 03:37:46'),
(7, 'KT007', NULL, NULL, NULL, NULL, NULL, 9994889955, '+1', '787877', '32335', 'ios', 6723, NULL, 8001231234, 0, 0, '2019-08-16 03:37:51', '2019-08-16 03:38:02'),
(8, 'KT008', NULL, NULL, NULL, NULL, NULL, 8807970555, '+1', 'qw23456575588hdjdkdk', 'aqgpv5321h', 'android', 6725, NULL, 8001231234, 0, 0, '2019-09-17 11:21:02', '2019-09-17 12:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `keptit_settings`
--

CREATE TABLE `keptit_settings` (
  `id` int(11) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `lastUpdatedDt` varchar(100) NOT NULL,
  `isCallReminder` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isTextReminder` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isCallRecordings` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isViewRecordings` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isCallTranscriptions` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isCustomizeTTS` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isPushNotification` int(11) NOT NULL COMMENT '1 for true, 0 for false',
  `isUnlimitedAppts` int(11) NOT NULL COMMENT '1 for true, 0 for false'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keptit_settings`
--

INSERT INTO `keptit_settings` (`id`, `userId`, `lastUpdatedDt`, `isCallReminder`, `isTextReminder`, `isCallRecordings`, `isViewRecordings`, `isCallTranscriptions`, `isCustomizeTTS`, `isPushNotification`, `isUnlimitedAppts`) VALUES
(1, 'KT001', '2019-08-16 07:04:00', 1, 0, 1, 1, 1, 1, 0, 0),
(2, 'KT008', '', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `keptit_users`
--

CREATE TABLE `keptit_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keptit_users`
--

INSERT INTO `keptit_users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$J7S.O7lUL5xPilY6WWO/Z./j0L9NwK4dbMj0iuZ07JhPGJupedjFG', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1569666215, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `keptit_users_groups`
--

CREATE TABLE `keptit_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keptit_users_groups`
--

INSERT INTO `keptit_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keptit_appointment`
--
ALTER TABLE `keptit_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keptit_groups`
--
ALTER TABLE `keptit_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keptit_login_attempts`
--
ALTER TABLE `keptit_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keptit_register`
--
ALTER TABLE `keptit_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobileNo` (`mobileNo`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `keptit_settings`
--
ALTER TABLE `keptit_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keptit_users`
--
ALTER TABLE `keptit_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `keptit_users_groups`
--
ALTER TABLE `keptit_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keptit_appointment`
--
ALTER TABLE `keptit_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keptit_groups`
--
ALTER TABLE `keptit_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keptit_login_attempts`
--
ALTER TABLE `keptit_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keptit_register`
--
ALTER TABLE `keptit_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keptit_settings`
--
ALTER TABLE `keptit_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keptit_users`
--
ALTER TABLE `keptit_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keptit_users_groups`
--
ALTER TABLE `keptit_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
