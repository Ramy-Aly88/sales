-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 08:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(108) NOT NULL,
  `email` varchar(108) NOT NULL,
  `username` varchar(108) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `com_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `password`, `created_at`, `updated_at`, `added_by`, `updated_by`, `com_code`) VALUES
(1, 'admin', 'test@gmail.com', 'admin', '$2y$10$uD5m2idQ54GhpXEEqf1frejGNWNlMO1gnwJwJGBHcv/ysFaQEeu/y', '2023-02-12 20:40:12', '2023-02-12 20:40:12', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel_settings`
--

CREATE TABLE `admin_panel_settings` (
  `id` int(11) NOT NULL,
  `system_name` varchar(252) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `general_alert` varchar(153) DEFAULT NULL,
  `address` varchar(252) NOT NULL,
  `phone` varchar(108) NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `com_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_panel_settings`
--

INSERT INTO `admin_panel_settings` (`id`, `system_name`, `photo`, `active`, `general_alert`, `address`, `phone`, `added_by`, `updated_by`, `created_at`, `updated_at`, `com_code`) VALUES
(1, 'عزارما للاكترونيات والبرمجيات', '1682677848708.png', 1, 'رسالة تنية هامة جدا للأهمية', 'المنصورة', '01000314965', 0, 1, '0000-00-00 00:00:00', '2023-04-28 12:30:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `treasuries`
--

CREATE TABLE `treasuries` (
  `id` int(11) NOT NULL,
  `name` varchar(252) NOT NULL,
  `is_master` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'هل خزنة رئيسية0-1',
  `last_isal_exchange` bigint(20) NOT NULL COMMENT 'رقم اخر ايصال للصرف',
  `last_isal_collect` bigint(20) NOT NULL COMMENT 'رقم اخر ايصال تم تحصيلة',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `com_code` int(11) NOT NULL,
  `date` date NOT NULL COMMENT 'for search',
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `treasuries`
--

INSERT INTO `treasuries` (`id`, `name`, `is_master`, `last_isal_exchange`, `last_isal_collect`, `created_at`, `updated_at`, `added_by`, `updated_by`, `com_code`, `date`, `active`) VALUES
(1, 'الرئيسية', 1, 99, 999, '2023-03-24 23:28:31', '2023-04-24 18:58:56', 1, 1, 1, '2023-03-24', 1),
(7, 'الرئيسية1', 0, 99, 999, '2023-04-15 22:13:51', '2023-04-24 18:59:06', 1, 1, 1, '2023-04-15', 0),
(8, 'الرئيسية2', 0, 99, 999, '2023-04-24 18:58:43', '2023-04-24 18:59:15', 1, 1, 1, '2023-04-24', 1),
(9, 'كاشير1', 0, 0, 9, '2023-04-26 11:45:14', '2023-04-26 11:45:14', 1, NULL, 1, '2023-04-26', 1),
(10, 'كاشير2', 0, 9, 0, '2023-04-26 11:45:31', '2023-04-26 11:45:31', 1, NULL, 1, '2023-04-26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_panel_settings`
--
ALTER TABLE `admin_panel_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treasuries`
--
ALTER TABLE `treasuries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_panel_settings`
--
ALTER TABLE `admin_panel_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `treasuries`
--
ALTER TABLE `treasuries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
