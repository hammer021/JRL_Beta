-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 09:43 AM
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
-- Database: `jrl`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_matrix`
--

CREATE TABLE `tbl_access_matrix` (
  `id` int(11) NOT NULL,
  `access` text,
  `roleId` int(11) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_access_matrix`
--

INSERT INTO `tbl_access_matrix` (`id`, `access`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(7, '[{\"module\":\"Task\",\"total_access\":1,\"list\":1,\"create_records\":0,\"edit_records\":0,\"delete_records\":0},{\"module\":\"Booking\",\"total_access\":1,\"list\":1,\"create_records\":0,\"edit_records\":0,\"delete_records\":0}]', 2, 0, 1, '2022-07-12 05:17:32', 1, '2022-07-12 10:03:28'),
(8, '[{\"module\":\"Task\",\"total_access\":1,\"list\":1,\"create_records\":1,\"edit_records\":1,\"delete_records\":1},{\"module\":\"Booking\",\"total_access\":1,\"list\":1,\"create_records\":1,\"edit_records\":1,\"delete_records\":1}]', 1, 0, 1, '2022-07-12 09:59:32', 1, '2022-07-12 09:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `bookingId` int(4) NOT NULL,
  `roomName` varchar(256) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`bookingId`, `roomName`, `description`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `gambar`) VALUES
(1, 'AMD Ryzen', 'Berikut adalah keluaran Generasi ke-', 0, 1, '2022-07-20 10:25:30', 1, '2022-07-20 10:41:51', 'b8b9d4133aee118342a28369ebcd1c7d.jpg'),
(2, 'Android10.', 'ini portfolio', 0, 1, '2022-07-25 10:52:31', NULL, NULL, '2d83831a28eb4ad26159f68ff05e831e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(30, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-12 15:02:38'),
(31, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-13 08:28:01'),
(32, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-13 11:22:51'),
(33, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-13 11:23:12'),
(34, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-14 12:24:32'),
(35, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-14 13:25:09'),
(36, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-14 15:28:24'),
(37, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-15 14:31:56'),
(38, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-16 08:42:18'),
(39, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-16 09:21:59'),
(40, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-16 11:01:42'),
(41, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-16 12:07:11'),
(42, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":null}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-16 12:31:19'),
(43, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":null}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-16 12:34:17'),
(44, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-16 12:38:59'),
(45, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-16 12:48:18'),
(46, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-18 14:37:27'),
(47, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"MyAdm000\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-18 15:05:02'),
(48, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-18 15:08:46'),
(49, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-18 15:45:36'),
(50, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-18 15:47:02'),
(51, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-19 08:53:44'),
(52, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-19 09:17:15'),
(53, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-19 09:38:19'),
(54, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-19 09:53:17'),
(55, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-19 09:55:57'),
(56, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-19 15:45:56'),
(57, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-20 13:05:25'),
(58, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-21 11:55:02'),
(59, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-22 13:12:30'),
(60, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-22 15:10:09'),
(61, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-23 11:37:28'),
(62, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 12:24:49'),
(63, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 12:25:01'),
(64, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 12:26:26'),
(65, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 12:51:00'),
(66, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 12:53:12'),
(67, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 15:14:48'),
(68, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 15:16:21'),
(69, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 15:21:13'),
(70, 18, '{\"role\":\"2\",\"roleText\":\"User\",\"name\":\"Jonisss\",\"isAdmin\":\"0\",\"myreff\":\"BRVfggcEczH\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 15:49:43'),
(71, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-25 15:51:16'),
(72, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\",\"isAdmin\":\"1\",\"myreff\":\"AdminJRL\"}', '::1', 'Chrome 103.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows 10', '2022-07-26 13:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`, `status`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'System Administrator', 1, 0, 0, '2021-01-21 00:00:00', 1, '2022-06-17 20:21:46'),
(2, 'User', 1, 0, 0, '2021-01-13 00:00:00', 1, '2022-07-14 10:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `taskId` int(4) NOT NULL,
  `taskTitle` varchar(256) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `tipe` enum('head','konten','foot','') NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`taskId`, `taskTitle`, `description`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `tipe`, `gambar`, `link`) VALUES
(1, 'Yuk Join Sekarang', 'Small task related to addition, substraction', 0, 1, '2022-06-18 20:47:47', 1, '2022-07-15 09:33:13', 'head', 'e41fddef326ab73454385abc8393a9a5.jpg', NULL),
(2, 'Footer uyy', 'This Footer', 0, 1, '2022-06-18 20:49:48', 1, '2022-07-22 10:05:03', 'foot', '3f565438c03ee237219df5c0760938d1.jpg', 'https://www.youtube.com/embed/HFT7ATLQQx8'),
(6, 'Ini konten bergambar', 'testing bergambar', 0, 1, '2022-07-21 08:08:14', 1, '2022-07-25 10:15:02', 'konten', 'e698e4a9a0d4814cd348a726d9f31a9d.jpg', ''),
(11, 'Lorem Ipsum', 'It is a long established fact that a reader will be distracted by the reaa', 0, 1, '2022-07-21 10:54:47', NULL, NULL, 'konten', 'a459c776272d424a637e34876ba0046b.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT '2',
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `myreff` varchar(255) DEFAULT NULL,
  `refferal` varchar(255) DEFAULT NULL,
  `updatedreff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isAdmin`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `myreff`, `refferal`, `updatedreff`) VALUES
(1, 'admin@example.com', '$2y$10$6Y28WIo2Oz.p8xsEMYcCmuvvijXZU8.sRT3737ix.vN1CwGs3NJk6', 'System Administrator', '9890098900', 1, 1, 0, 0, '2015-07-01 18:56:49', 1, '2022-07-18 10:08:40', 'AdminJRL', 'AdminJRL', 0),
(2, 'manager@example.com', '$2y$10$6Y28WIo2Oz.p8xsEMYcCmuvvijXZU8.sRT3737ix.vN1CwGs3NJk6', 'Manager', '9890098900', 2, 0, 0, 1, '2016-12-09 17:49:56', 1, '2020-02-01 19:36:12', 'MyManager', 'Joniexplore09', 0),
(15, 'joni@example.com', '$2y$10$V.mu9niNAwHdJImaiV/VeOPO6I0hPK/kR.aaQTvnrFeeVedZnVjAi', 'Joni', '0898987654', 2, 0, 0, 1, '2022-07-12 10:31:07', 1, '2022-07-21 10:21:03', 'QgRz7YoEEOQ', 'MyManager', 0),
(18, 'jonisss@example.com', '$2y$10$oOG52QoAn9R6e9EFJn1muO7KJ/l0yLh.dhWLAPbtqEHO4nGgZBMwa', 'Jonisss', '0898987654', 2, 0, 0, 0, '2022-07-16 06:00:58', 18, '2022-07-25 10:50:36', 'Joniexplore09', 'AdminJRL', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_access_matrix`
--
ALTER TABLE `tbl_access_matrix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`taskId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_access_matrix`
--
ALTER TABLE `tbl_access_matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `bookingId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `taskId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
