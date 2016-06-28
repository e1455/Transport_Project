-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2016 at 01:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `software`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `user_id` int(10) unsigned NOT NULL,
  `vehicle_id` int(10) unsigned NOT NULL,
  `plate_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_service` time NOT NULL,
  `end_service` time NOT NULL,
  `wage_over_distance` decimal(8,2) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `user_id` (`user_id`),
  KEY `employee_vehicle_id_foreign` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`user_id`, `vehicle_id`, `plate_number`, `start_service`, `end_service`, `wage_over_distance`, `score`) VALUES
(1, 2, '63863', '09:30:00', '18:30:00', '40.00', 60),
(2, 3, '74637', '08:30:00', '19:00:00', '70.00', 80),
(3, 1, '758574', '11:00:00', '20:30:00', '150.00', 64),
(4, 1, '1235', '08:00:00', '15:40:00', '100.00', 40),
(5, 4, '86985', '10:35:00', '19:20:00', '50.00', 73);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(3, 'Customer'),
(2, 'Employee'),
(1, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `user_id` int(10) unsigned NOT NULL,
  `customer_info` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `date_service` date NOT NULL,
  `start_service` time NOT NULL,
  `end_service` time NOT NULL,
  `score` int(11) NOT NULL,
  `distance` decimal(8,2) NOT NULL,
  `payed` tinyint(1) NOT NULL DEFAULT '0',
  KEY `service_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`user_id`, `customer_info`, `date_service`, `start_service`, `end_service`, `score`, `distance`, `payed`) VALUES
(1, 'ali rostami', '2016-06-23', '10:10:00', '11:30:00', 30, '4.00', 0),
(1, 'ahmad hosseni', '2016-06-23', '13:37:00', '15:21:00', 70, '13.50', 0),
(1, 'mohsen hatami', '2016-06-23', '17:05:00', '19:18:00', 53, '3.21', 0),
(1, 'mohmad rashti', '2016-06-14', '11:52:00', '14:13:00', 62, '8.00', 0),
(1, 'hashem lotfi', '2016-06-14', '15:26:00', '18:42:00', 81, '5.50', 0),
(1, 'kamran maleki', '2016-03-09', '09:38:00', '10:42:00', 74, '3.00', 0),
(1, 'ghasem torkashvand', '2016-03-09', '11:31:00', '13:16:00', 31, '6.00', 0),
(1, 'parvin shayeshteh', '2016-03-09', '14:54:00', '16:24:00', 67, '4.60', 0),
(1, 'mahdi varesteh', '2016-03-17', '10:54:00', '14:24:00', 87, '9.00', 0),
(1, 'milad oskomi', '2016-03-17', '13:34:00', '17:30:00', 67, '4.60', 0),
(2, 'ali rostami', '2016-06-19', '10:10:00', '11:30:00', 60, '3.00', 0),
(2, 'ahmad hosseni', '2016-06-19', '13:37:00', '15:21:00', 73, '10.50', 0),
(2, 'mohsen hatami', '2016-06-19', '17:05:00', '19:18:00', 93, '5.21', 0),
(2, 'mohmad rashti', '2016-05-23', '11:52:00', '14:13:00', 62, '8.00', 0),
(2, 'hashem lotfi', '2016-05-23', '15:26:00', '18:42:00', 81, '5.50', 1),
(2, 'kamran maleki', '2016-03-09', '09:38:00', '10:42:00', 74, '3.00', 1),
(2, 'ghasem torkashvand', '2016-03-09', '11:31:00', '13:16:00', 31, '6.00', 0),
(2, 'parvin shayeshteh', '2016-03-09', '14:54:00', '16:24:00', 67, '4.60', 0),
(2, 'mahdi varesteh', '2016-03-17', '10:54:00', '14:24:00', 87, '9.00', 1),
(2, 'milad oskomi', '2016-03-17', '13:34:00', '17:30:00', 67, '4.60', 0),
(3, 'ali rostami', '2016-06-19', '10:10:00', '11:30:00', 60, '3.00', 0),
(3, 'ahmad hosseni', '2016-06-19', '13:37:00', '15:21:00', 73, '10.50', 0),
(3, 'mohsen hatami', '2016-06-19', '17:05:00', '19:18:00', 93, '5.21', 0),
(3, 'mohmad rashti', '2016-05-23', '11:52:00', '14:13:00', 62, '8.00', 0),
(3, 'hashem lotfi', '2016-05-23', '15:26:00', '18:42:00', 81, '5.50', 0),
(3, 'kamran maleki', '2016-03-09', '09:38:00', '10:42:00', 74, '3.00', 0),
(3, 'ghasem torkashvand', '2016-03-09', '11:31:00', '13:16:00', 31, '6.00', 0),
(3, 'parvin shayeshteh', '2016-03-09', '14:54:00', '16:24:00', 67, '4.60', 0),
(3, 'mahdi varesteh', '2016-03-17', '10:54:00', '14:24:00', 87, '9.00', 0),
(3, 'milad oskomi', '2016-03-17', '13:34:00', '17:30:00', 67, '4.60', 0),
(4, 'ali rostami', '2016-06-19', '10:10:00', '11:30:00', 60, '3.00', 0),
(4, 'ahmad hosseni', '2016-06-19', '13:37:00', '15:21:00', 73, '10.50', 0),
(4, 'mohsen hatami', '2016-06-19', '17:05:00', '19:18:00', 93, '5.21', 0),
(4, 'mohmad rashti', '2016-05-23', '11:52:00', '14:13:00', 62, '8.00', 0),
(4, 'hashem lotfi', '2016-05-23', '15:26:00', '18:42:00', 81, '5.50', 0),
(4, 'kamran maleki', '2016-03-09', '09:38:00', '10:42:00', 74, '3.00', 0),
(4, 'ghasem torkashvand', '2016-03-09', '11:31:00', '13:16:00', 31, '6.00', 0),
(4, 'parvin shayeshteh', '2016-03-09', '14:54:00', '16:24:00', 67, '4.60', 0),
(4, 'mahdi varesteh', '2016-03-17', '10:54:00', '14:24:00', 87, '9.00', 0),
(4, 'milad oskomi', '2016-03-17', '13:34:00', '17:30:00', 67, '4.60', 0),
(5, 'ali rostami', '2016-06-19', '10:10:00', '11:30:00', 60, '3.00', 0),
(5, 'ahmad hosseni', '2016-06-19', '13:37:00', '15:21:00', 73, '10.50', 0),
(5, 'mohsen hatami', '2016-06-19', '17:05:00', '19:18:00', 93, '5.21', 0),
(5, 'mohmad rashti', '2016-05-23', '11:52:00', '14:13:00', 62, '8.00', 0),
(5, 'hashem lotfi', '2016-05-23', '15:26:00', '18:42:00', 81, '10.50', 0),
(5, 'kamran maleki', '2016-03-09', '09:38:00', '10:42:00', 74, '3.00', 0),
(5, 'ghasem torkashvand', '2016-03-09', '11:31:00', '13:16:00', 31, '6.00', 0),
(5, 'parvin shayeshteh', '2016-03-09', '14:54:00', '16:24:00', 67, '4.60', 0),
(5, 'mahdi varesteh', '2016-03-17', '10:54:00', '14:24:00', 87, '9.00', 0),
(5, 'milad oskomi', '2016-03-17', '13:34:00', '17:30:00', 67, '4.60', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `family` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `national_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_national_code_unique` (`national_code`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `family`, `national_code`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Masoud', 'Darvishi', '5260150899', 'masouddarvishi56@yahoo.com', '$2y$10$F1D2QfEztaq3hIe3VpUnw.LVclhDpm3n1o8rVcHQv3SkLzJRTkdNy', NULL, '2016-06-24 20:48:35', '2016-06-26 05:57:26'),
(2, 2, 'Ehsan', 'Hosseni', '857396905', 'ehsan14@yahoo.com', '$2y$10$DgQj2NiVlOWlb73ppDqkYO6qMhRzYC3fM9BCUQ2HCkWl/WO74OOB6', NULL, '2016-06-24 20:49:25', '2016-06-26 10:05:18'),
(3, 2, 'hasan', 'yari', '9584956', 'hasan@yahoo.com', '$2y$10$jhX3TE.XBAdVy0MZcML5VuowChpf8g1sMPPlnIxF16ttimvINkkW.', NULL, '2016-06-24 21:26:41', '2016-06-24 21:26:41'),
(4, 2, 'Mohsen', 'Rahmat', '6846758', 'mohsen@yahoo.com', '$2y$10$kmn95YwlTUiO7PZW7qIvJ.BvFyeVrVJR45ONNp8AHgyoF4aJovOSy', NULL, '2016-06-26 06:25:09', '2016-06-26 06:31:27'),
(5, 2, 'Reza', 'Zaheri', '247234', 'reza@yahoo.com', '$2y$10$9qhprurK3dKTE66AVe.M9O22hnu1skcFE8Y7kji3b4QesB667lDgi', NULL, '2016-06-26 10:14:45', '2016-06-26 10:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicle_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`) VALUES
(4, 'Car'),
(2, 'Motorcycle'),
(3, 'Pickup'),
(1, 'Truck');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
