-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 162.210.100.153:3306
-- Generation Time: Sep 30, 2019 at 09:21 AM
-- Server version: 5.6.26
-- PHP Version: 7.0.33-0+deb9u5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostmm_unilink`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8_unicode_ci DEFAULT 'Myanmar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `deleted_at`, `created_at`, `updated_at`, `name`, `code`, `country`) VALUES
(1, NULL, '2019-08-28 20:29:12', '2019-08-28 20:29:12', 'Myanmar Airways International', '8M', ''),
(2, NULL, '2019-08-28 20:32:13', '2019-08-28 20:32:13', 'All Nippon Airways', 'NH', '');

-- --------------------------------------------------------

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `backup_size` varchar(10) COLLATE utf8_unicode_ci DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cargoreceipts`
--

CREATE TABLE `cargoreceipts` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_id` int(11) NOT NULL DEFAULT '0',
  `packing_list` int(11) NOT NULL DEFAULT '0',
  `loading_plan` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cargoreceipts`
--

INSERT INTO `cargoreceipts` (`id`, `deleted_at`, `created_at`, `updated_at`, `job_id`, `packing_list`, `loading_plan`) VALUES
(1, NULL, '2019-09-04 10:02:42', '2019-09-04 10:02:42', 1, 88, 0),
(2, NULL, '2019-09-26 05:24:37', '2019-09-26 05:24:37', 10, 134, 134),
(3, NULL, '2019-09-26 05:33:28', '2019-09-26 05:33:28', 8, 135, 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT '',
  `address` varchar(256) COLLATE utf8_unicode_ci DEFAULT '',
  `phone` varchar(256) COLLATE utf8_unicode_ci DEFAULT '0',
  `email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attention` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credibility` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration` int(10) UNSIGNED DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `remark1` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark2` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark3` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_id` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `deleted_at`, `created_at`, `updated_at`, `name`, `address`, `phone`, `email`, `attention`, `credibility`, `registration`, `expire_date`, `remark1`, `remark2`, `remark3`, `reg_id`) VALUES
(1, NULL, '2019-08-25 22:29:14', '2019-08-30 22:32:12', 'Sinotrans', 'Yangon', '08888888', 'test@gmail.com', 'U Tun Ye Htwe', 'CY', 1, '2025-12-31', 'Importer', 'Importer', 'Together work about 10 Year', '0001'),
(3, NULL, '2019-08-25 23:49:34', '2019-08-25 23:49:34', 'U Tun Ye Htwe', 'Yangon', '07777777', 'test@gmail.com', 'U Tun Ye Htwe', 'Ye Mi', 7, '2020-12-31', 'Importer', 'Exporter', 'Together work about 10 Year', '0002'),
(4, NULL, '2019-08-29 03:18:14', '2019-08-29 03:18:14', 'Kyaw Min', 'Yangon', '038383`', 'kyaw09798@gmail.com', 'Kyaw Min', 'Credibility', 65, '2019-08-31', 'Working  Together', 'Exporter', 'Together work about 8 Year', '0003'),
(5, NULL, '2019-09-03 02:55:40', '2019-09-03 02:55:40', 'Host Myanmar', '#835, Mayangone Township', '09429306291', 'admin@hostmyanmar.net', 'Khaing Swe Win', NULL, 86, '2020-12-16', NULL, NULL, NULL, '100006709'),
(6, NULL, '2019-09-03 02:58:46', '2019-09-03 02:58:46', 'Aung Shwin Le', '#835, Mayangone Township', '448013922', 'admin@hostmyanmar.net', 'kyaw swar  thant', NULL, 87, '2019-09-03', NULL, NULL, NULL, '10005874'),
(7, NULL, '2019-09-26 04:56:39', '2019-09-26 04:56:39', 'YST', 'YANGON', '9999', 'dev2.hmm@gmail.com', 'TEST', '3434', 126, '2019-09-26', NULL, NULL, NULL, '111');

-- --------------------------------------------------------

--
-- Table structure for table `compulsories`
--

CREATE TABLE `compulsories` (
  `id` int(11) NOT NULL,
  `bill_registration` int(11) DEFAULT NULL,
  `commericial_invoice` int(11) DEFAULT NULL,
  `credit` varchar(45) DEFAULT NULL,
  `letter_head` int(11) DEFAULT NULL,
  `packing_list` int(11) DEFAULT NULL,
  `reference_no` varchar(45) DEFAULT NULL,
  `sale_contract` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compulsories`
--

INSERT INTO `compulsories` (`id`, `bill_registration`, `commericial_invoice`, `credit`, `letter_head`, `packing_list`, `reference_no`, `sale_contract`, `job_id`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 14, 15, NULL, 13, 16, 'RF-223342', 17, 1, NULL, '2019-08-26 00:58:29', '2019-08-26 00:58:29'),
(2, 24, 25, 'credit team', 23, 26, 'RF-223343', 27, 2, '2019-08-26 21:15:53', '2019-08-26 21:15:53', '2019-08-26 02:53:54'),
(3, 30, 31, 'credit team', 29, 32, 'RF-223342', 33, 2, '2019-08-26 21:15:53', '2019-08-26 21:15:53', '2019-08-26 02:58:48'),
(4, 36, 37, 'credit team', 35, 38, 'RF-223342', 39, 2, '2019-08-26 21:15:53', '2019-08-26 21:15:53', '2019-08-26 04:03:36'),
(5, 42, 43, 'credit team', 41, 44, 'RF-223342', 45, 2, '2019-08-26 21:15:53', '2019-08-26 21:15:53', '2019-08-26 04:04:30'),
(6, 48, 49, 'credit team', 47, 50, 'RF-223342', 51, 2, '2019-08-26 21:15:53', '2019-08-26 21:15:53', '2019-08-26 04:04:44'),
(7, 73, 74, NULL, 72, 75, NULL, 76, 3, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48'),
(8, 94, 95, NULL, 93, 96, 'RF-223342', 97, 6, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:19'),
(9, 102, 103, 'credit team', 101, 104, 'RF-223343', 105, 7, NULL, '2019-09-05 06:45:36', '2019-09-05 06:45:36'),
(10, 109, 110, NULL, 108, 111, 'RF-223342', 112, 8, NULL, '2019-09-05 06:48:21', '2019-09-05 06:48:21'),
(11, 118, 119, NULL, 117, 120, NULL, 121, 9, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27'),
(12, 128, 129, NULL, 127, 130, NULL, 131, 10, NULL, '2019-09-26 05:10:18', '2019-09-26 05:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(1000) COLLATE utf8_unicode_ci DEFAULT '[]',
  `color` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `tags`, `color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administration', '[]', '#000', NULL, '2018-03-05 22:13:54', '2018-03-05 22:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `designation` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `gender` varchar(191) COLLATE utf8_unicode_ci DEFAULT 'Male',
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `mobile2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `dept` int(10) UNSIGNED DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `date_hire` date DEFAULT NULL,
  `date_left` date DEFAULT NULL,
  `salary_cur` decimal(15,3) NOT NULL DEFAULT '0.000',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `gender`, `mobile`, `mobile2`, `email`, `dept`, `city`, `address`, `about`, `date_birth`, `date_hire`, `date_left`, `salary_cur`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Admin', 'Male', '8888888888', '', 'admin@hostmyanmar.net', 1, 'Pune', 'Karve nagar, Pune 411030', 'About user / biography', '2018-03-06', '2018-03-06', '2018-03-06', '0.000', NULL, '2018-03-05 22:14:06', '2018-03-05 22:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `fieldoperations`
--

CREATE TABLE `fieldoperations` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fieldoperations`
--

INSERT INTO `fieldoperations` (`id`, `deleted_at`, `created_at`, `updated_at`, `job_id`, `name`, `short`, `type`, `value`) VALUES
(1, NULL, '2019-09-04 02:31:56', '2019-09-04 02:31:56', 1, 'Actual Arrival Date', 'actual_date', 'date', '2019-09-05'),
(2, NULL, '2019-09-04 02:31:56', '2019-09-04 02:31:56', 1, 'Issued DO Date', 'issued_do_date', 'date', NULL),
(3, NULL, '2019-09-04 02:31:56', '2019-09-04 02:31:56', 1, 'Examination Date', 'examination_date', 'date', NULL),
(4, NULL, '2019-09-04 02:31:56', '2019-09-04 02:31:56', 1, 'Cargo Delivery Date', 'cargo_delivery_date', 'date', NULL),
(5, NULL, '2019-09-05 04:48:38', '2019-09-05 04:48:38', 3, 'Actual Arrival Date', 'actual_date', 'date', NULL),
(6, NULL, '2019-09-05 04:48:38', '2019-09-05 04:48:38', 3, 'Collect Airway Bill', 'airway_bill', 'file', '92'),
(7, NULL, '2019-09-05 04:48:38', '2019-09-05 04:48:38', 3, 'Examination Date', 'examination_date', 'date', NULL),
(8, NULL, '2019-09-05 04:48:38', '2019-09-05 04:48:38', 3, 'Cargo Delivery Date', 'cargo_delivery_date', 'date', NULL),
(9, NULL, '2019-09-05 06:49:26', '2019-09-05 06:49:26', 8, 'Actual Arrival Date', 'actual_date', 'date', NULL),
(10, NULL, '2019-09-05 06:49:26', '2019-09-05 06:49:26', 8, 'Collect Airway Bill', 'airway_bill', 'file', '116'),
(11, NULL, '2019-09-05 06:49:26', '2019-09-05 06:49:26', 8, 'Examination Date', 'examination_date', 'date', '2019-09-05'),
(12, NULL, '2019-09-05 06:49:26', '2019-09-05 06:49:26', 8, 'Cargo Delivery Date', 'cargo_delivery_date', 'date', '2019-09-05'),
(13, NULL, '2019-09-26 05:22:55', '2019-09-26 05:32:23', 10, 'Actual Arrival Date', 'actual_date', 'date', NULL),
(14, NULL, '2019-09-26 05:22:55', '2019-09-26 05:22:55', 10, 'Receive Date', 'received_date', 'date', '2019-09-26'),
(15, NULL, '2019-09-26 05:22:55', '2019-09-26 05:22:55', 10, 'Cargo Pickup', 'cargo_pickup', 'date', '2019-09-26'),
(16, NULL, '2019-09-26 05:22:55', '2019-09-26 05:22:55', 10, 'Examination Date', 'examination_date', 'date', '2019-09-26'),
(17, NULL, '2019-09-26 05:22:55', '2019-09-26 05:22:55', 10, 'Allow Shipment', 'allow_shipment', 'date', '2019-09-26'),
(18, NULL, '2019-09-26 05:22:55', '2019-09-26 05:32:23', 10, 'Remarks', 'remark', 'text', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `original` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `copy` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `status` varchar(256) COLLATE utf8_unicode_ci DEFAULT 'success'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `deleted_at`, `created_at`, `updated_at`, `original`, `copy`, `date`, `expire_date`, `status`) VALUES
(1, NULL, '2019-08-25 22:29:14', '2019-08-25 22:29:14', '[2]', '[3]', '2019-08-26', '2025-12-31', 'success'),
(2, NULL, '2019-08-25 22:31:55', '2019-08-25 22:31:55', '[7]', '[8]', '2019-08-26', '2020-12-31', 'success'),
(3, NULL, '2019-08-25 22:31:55', '2019-08-25 22:31:55', '[7]', '[6]', '2019-08-26', '2019-12-31', 'success'),
(4, NULL, '2019-08-25 22:31:55', '2019-08-25 22:31:55', '[3]', '[4]', '2019-08-26', '2019-12-31', 'success'),
(5, NULL, '2019-08-25 22:31:55', '2019-08-25 22:31:55', '[2]', '[3]', '2019-08-26', '2019-12-31', 'success'),
(6, NULL, '2019-08-25 22:31:55', '2019-08-25 22:31:55', '[4]', '[8]', '2019-08-26', '2019-12-31', 'success'),
(7, NULL, '2019-08-25 23:49:34', '2019-08-25 23:49:34', '[2]', '[6]', '2019-08-26', '2020-12-31', 'success'),
(8, NULL, '2019-08-25 23:49:35', '2019-08-25 23:49:35', '[5]', '[3]', '2019-08-26', '2019-08-31', 'success'),
(9, NULL, '2019-08-25 23:49:35', '2019-08-25 23:49:35', '[6]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(10, NULL, '2019-08-25 23:49:35', '2019-08-25 23:49:35', '[3]', '[4]', '2019-08-26', '2019-08-31', 'success'),
(11, NULL, '2019-08-25 23:49:35', '2019-08-25 23:49:35', '[2]', '[5]', '2019-08-26', '2019-08-31', 'success'),
(12, NULL, '2019-08-25 23:49:35', '2019-08-25 23:49:35', '[3]', '[4]', '2019-08-26', '2019-08-31', 'success'),
(13, NULL, '2019-08-26 00:58:29', '2019-08-27 03:06:20', '[2,3]', '[4,5]', '2019-08-26', '2019-08-31', 'success'),
(14, NULL, '2019-08-26 00:58:29', '2019-08-26 00:58:29', '[5]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(15, NULL, '2019-08-26 00:58:29', '2019-08-27 03:06:20', '[4]', '[4]', '2019-08-26', '2019-08-31', 'success'),
(16, NULL, '2019-08-26 00:58:29', '2019-08-27 03:06:20', '[4]', '[4]', '2019-08-26', '2019-08-31', 'success'),
(17, NULL, '2019-08-26 00:58:29', '2019-08-27 03:06:20', '[4]', '[4]', '2019-08-26', '2019-08-31', 'success'),
(18, NULL, '2019-08-26 00:58:29', '2019-08-26 00:58:29', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(19, NULL, '2019-08-26 00:58:30', '2019-08-26 00:58:30', '[1]', '[1]', '2019-08-26', '2019-08-31', 'success'),
(20, NULL, '2019-08-26 00:58:30', '2019-08-26 00:58:30', '[2]', '[2]', '2019-08-26', '2019-08-31', 'success'),
(21, NULL, '2019-08-26 00:58:30', '2019-08-26 00:58:30', '[3]', '[3]', '2019-08-26', '2019-08-31', 'success'),
(22, NULL, '2019-08-26 00:58:30', '2019-08-26 00:58:30', '[4]', '[4]', '2019-08-26', '2019-08-31', 'success'),
(23, NULL, '2019-08-26 02:53:54', '2019-08-26 02:53:54', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(24, NULL, '2019-08-26 02:53:54', '2019-08-26 02:53:54', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(25, NULL, '2019-08-26 02:53:54', '2019-08-26 02:53:54', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(26, NULL, '2019-08-26 02:53:54', '2019-08-26 02:53:54', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(27, NULL, '2019-08-26 02:53:54', '2019-08-26 02:53:54', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(28, NULL, '2019-08-26 02:53:55', '2019-08-26 02:53:55', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(29, NULL, '2019-08-26 02:58:47', '2019-08-26 02:58:47', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(30, NULL, '2019-08-26 02:58:48', '2019-08-26 02:58:48', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(31, NULL, '2019-08-26 02:58:48', '2019-08-26 02:58:48', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(32, NULL, '2019-08-26 02:58:48', '2019-08-26 02:58:48', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(33, NULL, '2019-08-26 02:58:48', '2019-08-26 02:58:48', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(34, NULL, '2019-08-26 02:58:48', '2019-08-26 02:58:48', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(35, NULL, '2019-08-26 04:03:36', '2019-08-26 04:03:36', '[2]', '[3]', '2019-08-26', '2019-08-31', 'success'),
(36, NULL, '2019-08-26 04:03:36', '2019-08-26 04:03:36', '[6]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(37, NULL, '2019-08-26 04:03:36', '2019-08-26 04:03:36', '[5]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(38, NULL, '2019-08-26 04:03:36', '2019-08-26 04:03:36', '[2]', '[4]', '2019-08-26', '2019-08-31', 'success'),
(39, NULL, '2019-08-26 04:03:36', '2019-08-26 04:03:36', '[5]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(40, NULL, '2019-08-26 04:03:36', '2019-08-26 04:03:36', '[6]', '[3]', '2019-08-26', '2019-08-31', 'success'),
(41, NULL, '2019-08-26 04:04:29', '2019-08-26 04:04:29', '[2]', '[3]', '2019-08-26', '2019-08-31', 'success'),
(42, NULL, '2019-08-26 04:04:29', '2019-08-26 04:04:29', '[6]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(43, NULL, '2019-08-26 04:04:29', '2019-08-26 04:04:29', '[5]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(44, NULL, '2019-08-26 04:04:29', '2019-08-26 04:04:29', '[2]', '[4]', '2019-08-26', '2019-08-31', 'success'),
(45, NULL, '2019-08-26 04:04:29', '2019-08-26 04:04:29', '[5]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(46, NULL, '2019-08-26 04:04:30', '2019-08-26 04:04:30', '[6]', '[3]', '2019-08-26', '2019-08-31', 'success'),
(47, NULL, '2019-08-26 04:04:43', '2019-08-26 04:04:43', '[2]', '[3]', '2019-08-26', '2019-08-31', 'success'),
(48, NULL, '2019-08-26 04:04:43', '2019-08-26 04:04:43', '[6]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(49, NULL, '2019-08-26 04:04:44', '2019-08-26 04:04:44', '[5]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(50, NULL, '2019-08-26 04:04:44', '2019-08-26 04:04:44', '[2]', '[4]', '2019-08-26', '2019-08-31', 'success'),
(51, NULL, '2019-08-26 04:04:44', '2019-08-26 04:04:44', '[5]', '[7]', '2019-08-26', '2019-08-31', 'success'),
(52, NULL, '2019-08-26 04:04:44', '2019-08-26 04:04:44', '[6]', '[3]', '2019-08-26', '2019-08-31', 'success'),
(53, NULL, '2019-08-26 04:04:44', '2019-08-26 04:04:44', '[]', '[]', '2019-08-26', '2019-08-31', 'success'),
(54, NULL, '2019-08-26 04:04:44', '2019-08-26 04:04:44', '[1]', '[1]', '2019-08-26', '2019-08-31', 'success'),
(55, NULL, '2019-08-27 03:18:11', '2019-08-27 03:18:11', '[2]', '[4]', '2019-08-27', '2019-08-31', 'success'),
(56, NULL, '2019-08-27 03:18:11', '2019-08-27 03:18:11', '[5]', '[3]', '2019-08-31', '2019-08-31', 'success'),
(57, NULL, '2019-08-27 03:18:11', '2019-08-27 03:18:11', '[2]', '[4]', '2019-08-27', '2019-08-31', 'success'),
(58, NULL, '2019-08-27 03:18:11', '2019-08-27 03:18:11', '[3]', '[6]', '2019-08-27', '2019-08-31', 'success'),
(59, NULL, '2019-08-27 03:18:11', '2019-08-27 03:18:11', '[2]', '[4]', '2019-08-31', '2019-08-27', 'success'),
(60, NULL, '2019-08-27 03:20:19', '2019-08-27 03:20:19', '[6]', '[4]', '2019-08-27', '2019-08-31', 'success'),
(61, NULL, '2019-08-27 03:20:19', '2019-08-27 03:20:19', '[2]', '[4]', '2019-08-31', '2019-08-31', 'success'),
(62, NULL, '2019-08-27 03:20:19', '2019-08-27 03:20:19', '[3]', '[4]', '2019-08-27', '2019-08-31', 'success'),
(63, NULL, '2019-08-27 03:20:19', '2019-08-27 03:20:19', '[8]', '[6]', '2019-08-27', '2019-08-31', 'success'),
(64, NULL, '2019-08-27 03:20:19', '2019-08-27 03:20:19', '[6]', '[7]', '2019-08-31', '2019-08-27', 'success'),
(65, NULL, '2019-08-29 03:18:14', '2019-08-29 03:18:14', '[2]', '[6]', '2019-08-29', '2019-08-31', 'success'),
(66, NULL, '2019-08-29 03:18:14', '2019-08-29 03:18:14', '[5]', '[3]', '2019-08-29', '2019-08-31', 'success'),
(67, NULL, '2019-08-29 03:18:14', '2019-08-29 03:18:14', '[2]', '[4]', '2019-08-29', '2019-09-07', 'success'),
(68, NULL, '2019-08-29 03:18:14', '2019-08-29 03:18:14', '[5]', '[8]', '2019-08-29', '2019-09-07', 'success'),
(69, NULL, '2019-08-29 03:18:14', '2019-08-29 03:18:14', '[2]', '[3]', '2019-08-29', '2019-09-07', 'success'),
(70, NULL, '2019-08-29 03:18:14', '2019-08-29 03:18:14', '[4]', '[6]', '2019-08-29', '2019-09-07', 'success'),
(71, NULL, '2019-08-30 01:44:20', '2019-08-30 01:44:20', '[6]', '[7]', '2019-08-30', '2019-08-30', 'success'),
(72, NULL, '2019-08-30 01:52:47', '2019-08-30 01:52:47', '[6]', '[7]', '2019-08-30', '2019-08-30', 'success'),
(73, NULL, '2019-08-30 01:52:47', '2019-08-30 01:52:47', '[]', '[]', NULL, NULL, 'success'),
(74, NULL, '2019-08-30 01:52:47', '2019-08-30 01:52:47', '[]', '[]', NULL, NULL, 'success'),
(75, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', '[]', '[]', NULL, NULL, 'success'),
(76, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', '[]', '[]', NULL, NULL, 'success'),
(77, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', '[2]', '[4]', NULL, NULL, 'success'),
(78, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', '[]', '[]', NULL, NULL, 'success'),
(79, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', '[1]', '[1]', NULL, NULL, 'success'),
(80, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', '[2]', '[2]', NULL, NULL, 'success'),
(81, NULL, '2019-08-30 22:32:12', '2019-08-30 22:32:12', '[2,8]', '[4]', '2019-08-31', '2019-08-15', 'success'),
(82, NULL, '2019-08-30 22:32:12', '2019-08-30 22:32:12', '[6]', '[4]', '2019-08-29', '2019-08-31', 'success'),
(83, NULL, '2019-08-30 22:32:12', '2019-08-30 22:32:12', '[5]', '[2,6]', '2019-08-22', '2019-08-31', 'success'),
(84, NULL, '2019-08-30 22:32:12', '2019-08-30 22:32:12', '[2]', '[3]', '2019-08-19', '2019-08-31', 'success'),
(85, NULL, '2019-08-30 22:32:12', '2019-08-30 22:32:12', '[2]', '[3]', '2019-08-30', '2019-08-31', 'success'),
(86, NULL, '2019-09-03 02:55:40', '2019-09-03 02:55:40', '[9]', '[9]', '2019-09-03', '2020-12-16', 'success'),
(87, NULL, '2019-09-03 02:58:46', '2019-09-03 02:58:46', '[9]', '[9]', '2019-09-03', '2019-09-03', 'success'),
(88, NULL, '2019-09-04 10:02:42', '2019-09-04 10:02:42', '[2]', '[6]', '2019-09-04', '2019-09-28', 'success'),
(89, NULL, '2019-09-05 04:48:31', '2019-09-05 04:48:31', '[4]', '[3]', '2019-09-05', '2019-09-28', 'success'),
(90, NULL, '2019-09-05 04:48:31', '2019-09-05 04:48:31', '[2]', '[4]', '2019-09-28', NULL, 'success'),
(91, NULL, '2019-09-05 04:48:31', '2019-09-05 04:48:31', '[5]', '[3]', '2019-09-05', '2019-09-28', 'success'),
(92, NULL, '2019-09-05 04:48:38', '2019-09-05 04:48:38', '[]', '[]', NULL, NULL, 'success'),
(93, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:19', '[2]', '[3]', '2019-09-05', '2019-09-30', 'success'),
(94, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:19', '[3]', '[4]', '2019-09-05', '2019-09-30', 'success'),
(95, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:43', '[3]', '[3]', '2019-09-05', '2019-09-30', 'success'),
(96, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:43', '[3]', '[3]', '2019-09-05', '2019-09-30', 'success'),
(97, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:43', '[3]', '[3]', '2019-09-05', '2019-09-30', 'success'),
(98, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:19', '[2,9]', '[3]', '2019-09-05', '2019-09-30', 'success'),
(99, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:19', '[5]', '[6]', '2019-09-05', '2019-09-30', 'success'),
(100, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:19', '[3]', '[8]', '2019-09-05', '2019-09-30', 'success'),
(101, NULL, '2019-09-05 06:45:36', '2019-09-05 06:45:36', '[2]', '[3]', '2019-09-05', '2019-09-30', 'success'),
(102, NULL, '2019-09-05 06:45:36', '2019-09-05 06:45:36', '[3]', '[4]', '2019-09-05', '2019-09-30', 'success'),
(103, NULL, '2019-09-05 06:45:36', '2019-09-05 06:45:36', '[3]', '[4]', '2019-09-05', '2019-09-30', 'success'),
(104, NULL, '2019-09-05 06:45:36', '2019-09-05 06:45:36', '[7]', '[5]', '2019-09-05', NULL, 'success'),
(105, NULL, '2019-09-05 06:45:36', '2019-09-05 06:45:36', '[3]', '[4]', '2019-09-05', '2019-09-30', 'success'),
(106, NULL, '2019-09-05 06:46:12', '2019-09-05 06:46:12', '[2]', '[4]', '2019-09-05', '2019-09-30', 'success'),
(107, NULL, '2019-09-05 06:46:12', '2019-09-05 06:46:12', '[5]', '[7]', '2019-09-24', NULL, 'success'),
(108, NULL, '2019-09-05 06:48:21', '2019-09-05 06:48:21', '[2]', '[4]', '2019-09-05', '2019-09-30', 'success'),
(109, NULL, '2019-09-05 06:48:21', '2019-09-05 06:48:21', '[6]', '[4]', '2019-09-05', '2019-09-30', 'success'),
(110, NULL, '2019-09-05 06:48:21', '2019-09-05 06:48:21', '[6]', '[4]', '2019-09-05', '2019-09-30', 'success'),
(111, NULL, '2019-09-05 06:48:21', '2019-09-05 06:48:21', '[7]', '[2]', '2019-09-05', NULL, 'success'),
(112, NULL, '2019-09-05 06:48:21', '2019-09-05 06:48:21', '[2]', '[3]', '2019-09-05', '2019-09-30', 'success'),
(113, NULL, '2019-09-05 06:48:48', '2019-09-05 06:48:48', '[]', '[]', NULL, '2019-09-28', 'success'),
(114, NULL, '2019-09-05 06:48:48', '2019-09-05 06:48:48', '[]', '[]', NULL, NULL, 'success'),
(115, NULL, '2019-09-05 06:48:48', '2019-09-05 06:48:48', '[2]', '[7]', '2019-09-05', '2019-09-30', 'success'),
(116, NULL, '2019-09-05 06:49:26', '2019-09-05 06:49:26', '[2]', '[7]', '2019-09-05', '2019-09-30', 'success'),
(117, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', '[2]', '[4]', NULL, '2019-09-12', 'success'),
(118, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', '[]', '[]', NULL, NULL, 'success'),
(119, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', '[]', '[]', NULL, NULL, 'success'),
(120, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', '[]', '[]', NULL, NULL, 'success'),
(121, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', '[]', '[]', NULL, NULL, 'success'),
(122, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', '[]', '[]', NULL, NULL, 'success'),
(123, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', '[]', '[]', NULL, NULL, 'success'),
(124, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', '[]', '[]', NULL, NULL, 'success'),
(125, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', '[]', '[]', NULL, NULL, 'success'),
(126, NULL, '2019-09-26 04:56:39', '2019-09-26 04:56:39', '[]', '[]', '2019-09-26', '2019-09-26', 'success'),
(127, NULL, '2019-09-26 05:10:18', '2019-09-26 05:10:18', '[2]', '[3]', '2019-09-26', '2019-10-12', 'success'),
(128, NULL, '2019-09-26 05:10:18', '2019-09-26 05:10:18', '[6]', '[7]', '2019-09-26', '2019-10-12', 'success'),
(129, NULL, '2019-09-26 05:10:18', '2019-09-26 05:10:18', '[]', '[]', NULL, NULL, 'success'),
(130, NULL, '2019-09-26 05:10:18', '2019-09-26 05:10:18', '[]', '[]', NULL, NULL, 'success'),
(131, NULL, '2019-09-26 05:10:18', '2019-09-26 05:10:18', '[]', '[]', NULL, NULL, 'success'),
(132, NULL, '2019-09-26 05:21:32', '2019-09-26 05:21:32', '[2]', '[4,2]', NULL, NULL, 'success'),
(133, NULL, '2019-09-26 05:21:32', '2019-09-26 05:21:32', '[]', '[]', NULL, NULL, 'success'),
(134, NULL, '2019-09-26 05:24:37', '2019-09-26 05:24:37', '[2]', '[4]', '2019-09-26', '2019-10-05', 'success'),
(135, NULL, '2019-09-26 05:33:28', '2019-09-26 05:33:28', '[2]', '[]', NULL, '2019-09-26', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `ie_infos`
--

CREATE TABLE `ie_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `certificate` int(10) UNSIGNED DEFAULT NULL,
  `mcc` int(10) UNSIGNED DEFAULT NULL,
  `mgma` int(10) UNSIGNED DEFAULT NULL,
  `mia` int(10) UNSIGNED DEFAULT NULL,
  `umfcci` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ie_infos`
--

INSERT INTO `ie_infos` (`id`, `deleted_at`, `created_at`, `updated_at`, `company_id`, `certificate`, `mcc`, `mgma`, `mia`, `umfcci`) VALUES
(1, NULL, '2019-08-25 23:49:35', '2019-08-25 23:49:35', 3, 8, 9, 10, 11, 12),
(2, NULL, '2019-08-29 03:18:15', '2019-08-29 03:18:15', 4, 66, 67, 68, 69, 70),
(3, NULL, '2019-08-30 22:32:12', '2019-08-30 22:32:12', 1, 81, 82, 83, 84, 85);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_no` varchar(256) COLLATE utf8_unicode_ci DEFAULT '0',
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `imp_exp_id` int(10) UNSIGNED DEFAULT NULL,
  `shipment_id` int(10) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `process` varchar(256) COLLATE utf8_unicode_ci DEFAULT '0',
  `contact_person` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_service_type` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_clearance` int(11) NOT NULL DEFAULT '0',
  `trucking` int(11) NOT NULL DEFAULT '0',
  `supplement` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `deleted_at`, `created_at`, `updated_at`, `job_no`, `customer_id`, `imp_exp_id`, `shipment_id`, `date`, `process`, `contact_person`, `job_service_type`, `custom_clearance`, `trucking`, `supplement`) VALUES
(1, NULL, '2019-08-26 00:51:20', '2019-09-26 04:34:08', 'JOB-0001', 1, 3, 1, '2019-08-26', '5', 'test', 'self', 3, 0, 11),
(2, '2019-08-26 21:15:54', '2019-08-26 02:27:49', '2019-08-26 21:15:54', 'JOB-0002', 1, 3, 2, '2019-08-26', '1', 'test', 'self', 8, 9, 13),
(3, '2019-09-05 00:00:00', '2019-08-29 03:23:41', '2019-09-05 04:48:38', 'JOB-0003', 4, 4, 3, '2019-08-29', '1', 'test', 'self', 2, 9, 11),
(6, NULL, '2019-09-05 06:23:45', '2019-09-05 06:34:19', 'JOB-0002', 3, 1, 6, '2019-09-05', '1', 'Test', 'self', 2, 0, 11),
(7, NULL, '2019-09-05 06:36:50', '2019-09-05 06:46:12', 'JOB-0007', 5, 4, 7, '2019-09-30', '2', 'Test Person', 'self', 4, 0, 0),
(8, NULL, '2019-09-05 06:47:31', '2019-09-26 05:33:28', 'JOB-0008', 6, 3, 8, '2019-09-05', '4', 'TEST Contact', 'self', 1, 0, 0),
(9, NULL, '2019-09-05 06:57:41', '2019-09-12 03:47:27', 'JOB-0009', 1, 1, 9, '2019-09-05', '1', 'New Person', 'self', 2, 9, 11),
(10, NULL, '2019-09-26 05:04:51', '2019-09-26 05:24:37', 'JOB-0010', 7, 1, 10, '2019-09-26', '4', 'test', 'self', 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `la_configs`
--

CREATE TABLE `la_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_configs`
--

INSERT INTO `la_configs` (`id`, `key`, `section`, `value`, `created_at`, `updated_at`) VALUES
(1, 'sitename', '', 'Unilink Myanmar', '2018-03-05 22:13:54', '2018-04-17 20:26:57'),
(2, 'sitename_part1', '', 'Unilink', '2018-03-05 22:13:54', '2018-04-17 20:26:57'),
(3, 'sitename_part2', '', 'Myanmar', '2018-03-05 22:13:54', '2018-04-17 20:26:57'),
(4, 'sitename_short', '', 'Unilink', '2018-03-05 22:13:54', '2018-04-17 20:26:57'),
(5, 'site_description', '', 'Host Myanmar is powerful web development team.', '2018-03-05 22:13:55', '2018-04-17 20:26:57'),
(6, 'sidebar_search', '', '0', '2018-03-05 22:13:55', '2018-04-17 20:26:57'),
(7, 'show_messages', '', '0', '2018-03-05 22:13:55', '2018-04-17 20:26:57'),
(8, 'show_notifications', '', '0', '2018-03-05 22:13:55', '2018-04-17 20:26:57'),
(9, 'show_tasks', '', '0', '2018-03-05 22:13:55', '2018-04-17 20:26:57'),
(10, 'show_rightsidebar', '', '0', '2018-03-05 22:13:55', '2018-04-17 20:26:57'),
(11, 'skin', '', 'skin-blue', '2018-03-05 22:13:55', '2018-04-17 20:26:57'),
(12, 'layout', '', 'fixed', '2018-03-05 22:13:55', '2018-04-17 20:26:57'),
(13, 'default_email', '', 'test@example.com', '2018-03-05 22:13:55', '2018-04-17 20:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `la_menus`
--

CREATE TABLE `la_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'module',
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `hierarchy` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_menus`
--

INSERT INTO `la_menus` (`id`, `name`, `url`, `icon`, `type`, `parent`, `hierarchy`, `created_at`, `updated_at`) VALUES
(1, 'Team', '#', 'fa-group', 'custom', 0, 7, '2018-03-05 22:13:54', '2019-09-04 10:39:43'),
(2, 'Users', 'users', 'fa-group', 'module', 1, 5, '2018-03-05 22:13:54', '2018-04-10 09:13:48'),
(3, 'Uploads', 'uploads', 'fa-files-o', 'module', 0, 5, '2018-03-05 22:13:54', '2019-09-04 10:39:43'),
(4, 'Departments', 'departments', 'fa-tags', 'module', 1, 2, '2018-03-05 22:13:54', '2018-04-10 09:13:43'),
(5, 'Employees', 'employees', 'fa-group', 'module', 1, 6, '2018-03-05 22:13:54', '2018-04-10 09:13:48'),
(6, 'Roles', 'roles', 'fa-user-plus', 'module', 1, 3, '2018-03-05 22:13:54', '2018-04-10 09:13:45'),
(7, 'Organizations', 'organizations', 'fa-university', 'module', 1, 1, '2018-03-05 22:13:54', '2018-04-10 09:13:40'),
(8, 'Permissions', 'permissions', 'fa-magic', 'module', 1, 4, '2018-03-05 22:13:54', '2018-04-10 09:13:48'),
(12, 'PortNames', 'portnames', 'fa fa-ship', 'module', 22, 4, '2019-07-30 00:23:07', '2019-09-04 10:39:12'),
(13, 'Services', 'services', 'fa fa-server', 'module', 0, 4, '2019-07-30 00:37:48', '2019-09-04 10:40:05'),
(14, 'Jobs', 'jobs', 'fa fa-cube', 'module', 0, 2, '2019-07-30 01:37:11', '2019-09-04 10:40:05'),
(18, 'Companies', 'companies', 'fa-cube', 'module', 22, 1, '2019-08-04 21:27:07', '2019-09-04 10:38:53'),
(19, 'Job Center', 'jobcenters', 'fa-joomla', 'custom', 0, 1, '2019-08-21 00:35:38', '2019-09-04 10:38:51'),
(20, 'AirLines', 'airlines', 'fa fa-plane', 'module', 22, 3, '2019-08-28 20:27:47', '2019-09-04 10:39:08'),
(21, 'ShippingLines', 'shippinglines', 'fa fa-ship', 'module', 22, 2, '2019-08-28 20:51:02', '2019-09-04 10:39:05'),
(22, 'Data Center', '#', 'fa-database', 'custom', 0, 3, '2019-09-04 10:38:30', '2019-09-04 10:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `maccs`
--

CREATE TABLE `maccs` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `receipt` int(11) NOT NULL DEFAULT '0',
  `channel` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ro` int(11) NOT NULL DEFAULT '0',
  `undertaking_letter` int(11) NOT NULL DEFAULT '0',
  `physical_letter` int(11) NOT NULL DEFAULT '0',
  `planned_checkin` date DEFAULT NULL,
  `custom_data` int(11) NOT NULL DEFAULT '0',
  `attach_document` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `maccs`
--

INSERT INTO `maccs` (`id`, `deleted_at`, `created_at`, `updated_at`, `receipt`, `channel`, `ro`, `undertaking_letter`, `physical_letter`, `planned_checkin`, `custom_data`, `attach_document`, `job_id`) VALUES
(1, NULL, '2019-08-27 03:20:19', '2019-08-27 03:20:19', 60, 'channel1', 62, 61, 63, NULL, 64, '2323', 1),
(2, NULL, '2019-09-05 04:48:32', '2019-09-05 04:48:32', 89, 'channel1', 91, 90, 0, NULL, 0, NULL, 3),
(3, NULL, '2019-09-05 06:46:12', '2019-09-05 06:46:12', 106, NULL, 0, 107, 0, '2019-09-05', 0, '2323', 7),
(4, NULL, '2019-09-05 06:48:48', '2019-09-05 06:48:48', 113, 'channel2', 115, 114, 0, NULL, 0, '2323', 8),
(5, NULL, '2019-09-26 05:21:32', '2019-09-26 05:21:32', 132, NULL, 0, 133, 0, '2019-09-26', 0, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_05_26_050000_create_modules_table', 1),
(2, '2014_05_26_055000_create_module_field_types_table', 1),
(3, '2014_05_26_060000_create_module_fields_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2014_12_01_000000_create_uploads_table', 1),
(7, '2016_05_26_064006_create_departments_table', 1),
(8, '2016_05_26_064007_create_employees_table', 1),
(9, '2016_05_26_064446_create_roles_table', 1),
(10, '2016_07_05_115343_create_role_user_table', 1),
(11, '2016_07_06_140637_create_organizations_table', 1),
(12, '2016_07_07_134058_create_backups_table', 1),
(13, '2016_07_07_134058_create_menus_table', 1),
(14, '2016_09_10_163337_create_permissions_table', 1),
(15, '2016_09_10_163520_create_permission_role_table', 1),
(16, '2016_09_22_105958_role_module_fields_table', 1),
(17, '2016_09_22_110008_role_module_table', 1),
(18, '2016_10_06_115413_create_la_configs_table', 1),
(19, '2019_07_30_042637_create_files_table', 1),
(20, '2019_07_30_042959_create_companies_table', 1),
(21, '2019_07_30_064524_create_ie_infos_table', 1),
(22, '2019_07_30_065307_create_portnames_table', 1),
(23, '2019_07_30_070748_create_services_table', 1),
(24, '2019_07_30_080711_create_jobs_table', 1),
(25, '2019_07_30_081024_create_shipments_table', 1),
(26, '2019_08_29_025747_create_airlines_table', 1),
(27, '2019_08_29_032102_create_shippinglines_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_db` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `view_col` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fa_icon` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `is_gen` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `label`, `name_db`, `view_col`, `model`, `controller`, `fa_icon`, `is_gen`, `created_at`, `updated_at`) VALUES
(1, 'Users', 'Users', 'users', 'name', 'User', 'UsersController', 'fa-group', 1, '2018-03-05 22:13:52', '2018-03-05 22:13:55'),
(2, 'Uploads', 'Uploads', 'uploads', 'name', 'Upload', 'UploadsController', 'fa-files-o', 1, '2018-03-05 22:13:53', '2018-03-05 22:13:55'),
(3, 'Departments', 'Departments', 'departments', 'name', 'Department', 'DepartmentsController', 'fa-tags', 1, '2018-03-05 22:13:53', '2018-03-05 22:13:55'),
(4, 'Employees', 'Employees', 'employees', 'name', 'Employee', 'EmployeesController', 'fa-group', 1, '2018-03-05 22:13:53', '2018-03-05 22:13:55'),
(5, 'Roles', 'Roles', 'roles', 'name', 'Role', 'RolesController', 'fa-user-plus', 1, '2018-03-05 22:13:53', '2018-03-05 22:13:55'),
(6, 'Organizations', 'Organizations', 'organizations', 'name', 'Organization', 'OrganizationsController', 'fa-university', 1, '2018-03-05 22:13:53', '2018-03-05 22:13:55'),
(7, 'Backups', 'Backups', 'backups', 'name', 'Backup', 'BackupsController', 'fa-hdd-o', 1, '2018-03-05 22:13:53', '2018-03-05 22:13:55'),
(8, 'Permissions', 'Permissions', 'permissions', 'name', 'Permission', 'PermissionsController', 'fa-magic', 1, '2018-03-05 22:13:54', '2018-03-05 22:13:55'),
(9, 'Companies', 'Companies', 'companies', 'name', 'Company', 'CompaniesController', 'fa-cube', 1, '2019-07-29 21:50:19', '2019-07-29 22:00:00'),
(10, 'Files', 'Files', 'files', 'date', 'File', 'FilesController', 'fa-cube', 1, '2019-07-29 21:53:54', '2019-07-29 21:56:37'),
(11, 'IE_Infos', 'IE_Infos', 'ie_infos', 'company_id', 'IE_Info', 'IE_InfosController', 'fa-cube', 1, '2019-07-30 00:10:35', '2019-07-30 00:15:25'),
(12, 'PortNames', 'PortNames', 'portnames', 'name', 'PortName', 'PortNamesController', 'fa-ship', 1, '2019-07-30 00:21:22', '2019-07-30 00:23:07'),
(13, 'Shipments', 'Shipments', 'shipments', 'type', 'Shipment', 'ShipmentsController', 'fa-ship', 1, '2019-07-30 00:23:44', '2019-07-30 01:40:25'),
(14, 'Services', 'Services', 'services', 'name', 'Service', 'ServicesController', 'fa-server', 1, '2019-07-30 00:34:16', '2019-07-30 00:37:48'),
(15, 'Jobs', 'Jobs', 'jobs', 'job_no', 'Job', 'JobsController', 'fa-cube', 1, '2019-07-30 00:44:01', '2019-07-30 01:37:11'),
(16, 'Compulsories', 'Compulsories', 'compulsories', '', 'Compulsory', 'CompulsoriesController', 'fa-cube', 0, '2019-08-12 21:52:51', '2019-08-12 21:52:51'),
(17, 'ServiceDetails', 'ServiceDetails', 'servicedetails', '', 'ServiceDetail', 'ServiceDetailsController', 'fa-cube', 0, '2019-08-20 09:40:41', '2019-08-20 09:40:41'),
(18, 'Truckings', 'Truckings', 'truckings', '', 'Trucking', 'TruckingsController', 'fa-truck', 0, '2019-08-21 01:28:05', '2019-08-21 01:28:05'),
(19, 'Maccs', 'Maccs', 'maccs', '', 'Macc', 'MaccsController', 'fa-cube', 0, '2019-08-22 00:02:14', '2019-08-22 00:02:14'),
(20, 'FieldOperations', 'FieldOperations', 'fieldoperations', '', 'FieldOperation', 'FieldOperationsController', 'fa-cube', 0, '2019-08-23 22:04:32', '2019-08-23 22:04:32'),
(21, 'AirLines', 'AirLines', 'airlines', 'name', 'AirLine', 'AirLinesController', 'fa-plane', 1, '2019-08-28 20:21:15', '2019-08-28 20:27:47'),
(22, 'ShippingLines', 'ShippingLines', 'shippinglines', 'name', 'ShippingLine', 'ShippingLinesController', 'fa-ship', 1, '2019-08-28 20:40:49', '2019-08-28 20:51:02'),
(23, 'CargoReceipts', 'CargoReceipts', 'cargoreceipts', '', 'CargoReceipt', 'CargoReceiptsController', 'fa-cube', 0, '2019-09-04 09:03:45', '2019-09-04 09:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `module_fields`
--

CREATE TABLE `module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `colname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `module` int(10) UNSIGNED NOT NULL,
  `field_type` int(10) UNSIGNED NOT NULL,
  `unique` tinyint(1) NOT NULL DEFAULT '0',
  `defaultvalue` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `minlength` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `maxlength` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `popup_vals` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `listing_col` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_fields`
--

INSERT INTO `module_fields` (`id`, `colname`, `label`, `module`, `field_type`, `unique`, `defaultvalue`, `minlength`, `maxlength`, `required`, `popup_vals`, `sort`, `listing_col`, `created_at`, `updated_at`) VALUES
(1, 'name', 'Name', 1, 16, 0, '', 5, 250, 1, '', 0, 1, '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(2, 'context_id', 'Context', 1, 13, 0, '0', 0, 0, 0, '', 0, 0, '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(3, 'email', 'Email', 1, 8, 1, '', 0, 250, 0, '', 0, 1, '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(4, 'password', 'Password', 1, 17, 0, '', 6, 250, 1, '', 0, 0, '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(5, 'type', 'User Type', 1, 7, 0, 'Employee', 0, 0, 0, '[\"Employee\",\"Client\"]', 0, 1, '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(6, 'name', 'Name', 2, 16, 0, '', 5, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(7, 'path', 'Path', 2, 19, 0, '', 0, 250, 0, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(8, 'extension', 'Extension', 2, 19, 0, '', 0, 20, 0, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(9, 'caption', 'Caption', 2, 19, 0, '', 0, 250, 0, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(10, 'user_id', 'Owner', 2, 7, 0, '1', 0, 0, 0, '@users', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(11, 'hash', 'Hash', 2, 19, 0, '', 0, 250, 0, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(12, 'public', 'Is Public', 2, 2, 0, '0', 0, 0, 0, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(13, 'name', 'Name', 3, 16, 1, '', 1, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(14, 'tags', 'Tags', 3, 20, 0, '[]', 0, 0, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(15, 'color', 'Color', 3, 19, 0, '', 0, 50, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(16, 'name', 'Name', 4, 16, 0, '', 5, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(17, 'designation', 'Designation', 4, 19, 0, '', 0, 50, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(18, 'gender', 'Gender', 4, 18, 0, 'Male', 0, 0, 1, '[\"Male\",\"Female\"]', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(19, 'mobile', 'Mobile', 4, 14, 0, '', 10, 20, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(20, 'mobile2', 'Alternative Mobile', 4, 14, 0, '', 10, 20, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(21, 'email', 'Email', 4, 8, 1, '', 5, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(22, 'dept', 'Department', 4, 7, 0, '0', 0, 0, 1, '@departments', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(23, 'city', 'City', 4, 19, 0, '', 0, 50, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(24, 'address', 'Address', 4, 1, 0, '', 0, 1000, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(25, 'about', 'About', 4, 19, 0, '', 0, 0, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(26, 'date_birth', 'Date of Birth', 4, 4, 0, 'NULL', 0, 0, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(27, 'date_hire', 'Hiring Date', 4, 4, 0, 'NULL', 0, 0, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(28, 'date_left', 'Resignation Date', 4, 4, 0, 'NULL', 0, 0, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(29, 'salary_cur', 'Current Salary', 4, 6, 0, '0.0', 0, 2, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(30, 'name', 'Name', 5, 16, 1, '', 1, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(31, 'display_name', 'Display Name', 5, 19, 0, '', 0, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(32, 'description', 'Description', 5, 21, 0, '', 0, 1000, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(33, 'parent', 'Parent Role', 5, 7, 0, '1', 0, 0, 0, '@roles', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(34, 'dept', 'Department', 5, 7, 0, '1', 0, 0, 0, '@departments', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(35, 'name', 'Name', 6, 16, 1, '', 5, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(36, 'email', 'Email', 6, 8, 0, '', 0, 250, 0, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(37, 'phone', 'Phone', 6, 14, 0, '', 0, 20, 0, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(38, 'website', 'Website', 6, 23, 0, '', 0, 250, 0, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(39, 'assigned_to', 'Assigned to', 6, 7, 0, '0', 0, 0, 0, '@employees', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(40, 'connected_since', 'Connected Since', 6, 4, 0, 'NULL', 0, 0, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(41, 'address', 'Address', 6, 1, 0, '', 0, 1000, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(42, 'city', 'City', 6, 19, 0, '', 0, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(43, 'description', 'Description', 6, 21, 0, '', 0, 1000, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(44, 'profile_image', 'Profile Image', 6, 12, 0, '', 0, 250, 0, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(45, 'profile', 'Company Profile', 6, 9, 0, '', 0, 250, 0, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(46, 'name', 'Name', 7, 16, 1, '', 0, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(47, 'file_name', 'File Name', 7, 19, 1, '', 0, 250, 1, '', 0, 1, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(48, 'backup_size', 'File Size', 7, 19, 0, '0', 0, 10, 1, '', 0, 0, '2018-03-05 22:13:53', '2018-03-05 22:13:53'),
(49, 'name', 'Name', 8, 16, 1, '', 1, 250, 1, '', 0, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(50, 'display_name', 'Display Name', 8, 19, 0, '', 0, 250, 1, '', 0, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(51, 'description', 'Description', 8, 21, 0, '', 0, 1000, 0, '', 0, 0, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(52, 'name', 'Name', 9, 19, 0, NULL, 0, 256, 1, '', 0, 1, '2019-07-29 21:50:55', '2019-08-28 21:55:51'),
(53, 'address', 'Address', 9, 19, 0, NULL, 0, 256, 1, '', 0, 1, '2019-07-29 21:51:20', '2019-08-28 21:56:43'),
(54, 'phone', 'Phone', 9, 19, 0, '0', 0, 256, 0, '', 0, 1, '2019-07-29 21:51:52', '2019-07-29 21:51:52'),
(55, 'email', 'Email', 9, 8, 0, NULL, 0, 256, 0, '', 0, 1, '2019-07-29 21:52:09', '2019-07-29 21:52:09'),
(56, 'attention', 'Attention', 9, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-07-29 21:52:37', '2019-07-29 21:52:37'),
(57, 'credibility', 'Credibility', 9, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-07-29 21:53:08', '2019-07-29 21:53:08'),
(58, 'original', 'Original', 10, 24, 0, NULL, 0, 0, 0, '', 0, 1, '2019-07-29 21:54:22', '2019-07-29 21:54:22'),
(59, 'copy', 'Copy', 10, 24, 0, NULL, 0, 0, 0, '', 0, 1, '2019-07-29 21:54:44', '2019-07-29 21:54:44'),
(60, 'date', 'Date', 10, 4, 0, NULL, 0, 0, 0, '', 0, 1, '2019-07-29 21:55:29', '2019-07-30 02:22:32'),
(61, 'expire_date', 'Expire Date', 10, 4, 0, NULL, 0, 0, 0, '', 0, 1, '2019-07-29 21:55:54', '2019-07-30 02:22:45'),
(62, 'status', 'Status', 10, 19, 0, 'success', 0, 256, 0, '', 0, 0, '2019-07-29 21:56:20', '2019-07-29 21:56:20'),
(63, 'registration', 'Registration', 9, 7, 0, NULL, 0, 0, 1, '@files', 0, 1, '2019-07-29 21:57:25', '2019-08-28 21:57:03'),
(64, 'expire_date', 'Expire Date', 9, 4, 0, NULL, 0, 0, 0, '', 0, 1, '2019-07-29 21:58:01', '2019-07-29 21:58:01'),
(65, 'remark1', 'Remark1', 9, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-07-29 21:59:05', '2019-07-29 21:59:05'),
(66, 'remark2', 'Remark2', 9, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-07-29 21:59:23', '2019-07-29 21:59:23'),
(67, 'remark3', 'Remark3', 9, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-07-29 21:59:43', '2019-07-29 21:59:43'),
(68, 'company_id', 'Company', 11, 7, 0, NULL, 0, 0, 0, '@companies', 0, 1, '2019-07-30 00:11:33', '2019-07-30 00:11:33'),
(69, 'certificate', 'Certificate', 11, 7, 0, NULL, 0, 0, 0, '@files', 0, 1, '2019-07-30 00:12:31', '2019-07-30 00:14:56'),
(70, 'mcc', 'MCC', 11, 7, 0, NULL, 0, 0, 0, '@files', 0, 1, '2019-07-30 00:13:00', '2019-07-30 00:13:00'),
(71, 'mgma', 'MGMA', 11, 7, 0, NULL, 0, 0, 0, '@files', 0, 1, '2019-07-30 00:13:24', '2019-07-30 00:13:24'),
(72, 'mia', 'MIA', 11, 7, 0, NULL, 0, 0, 0, '@files', 0, 1, '2019-07-30 00:13:51', '2019-07-30 00:13:51'),
(73, 'umfcci', 'UMFCCI', 11, 7, 0, NULL, 0, 0, 0, '@files', 0, 1, '2019-07-30 00:14:46', '2019-08-05 21:17:07'),
(74, 'country', 'Country', 12, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-07-30 00:22:00', '2019-07-30 00:22:00'),
(75, 'name', 'Name', 12, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-07-30 00:22:17', '2019-07-30 00:22:17'),
(76, 'status', 'Status', 12, 19, 0, 'yes', 0, 256, 0, '', 0, 0, '2019-07-30 00:22:53', '2019-07-30 00:22:57'),
(77, 'type', 'Type', 13, 7, 0, NULL, 0, 0, 0, '[\"IMPORT\",\"EXPORT\"]', 0, 1, '2019-07-30 00:25:17', '2019-07-30 00:25:17'),
(78, 'transport', 'Transport', 13, 7, 0, NULL, 0, 0, 0, '[\"SEA\",\"AIR\"]', 0, 1, '2019-07-30 00:26:10', '2019-07-30 00:26:10'),
(79, 'commodity', 'Commodity', 13, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-07-30 00:26:39', '2019-07-30 00:26:39'),
(80, 'pkgs', 'PKGS', 13, 13, 0, '0', 0, 11, 0, '', 0, 1, '2019-07-30 00:27:16', '2019-07-30 00:27:16'),
(81, 'kgs', 'KGS', 13, 13, 0, '0', 0, 11, 0, '', 0, 1, '2019-07-30 00:27:40', '2019-07-30 00:27:40'),
(82, 'pol', 'POL', 13, 7, 0, NULL, 0, 0, 0, '@portnames', 0, 1, '2019-07-30 00:28:13', '2019-07-30 00:28:13'),
(83, 'pod', 'POD', 13, 7, 0, NULL, 0, 0, 0, '@portnames', 0, 0, '2019-07-30 00:28:51', '2019-07-30 00:28:51'),
(84, 'eta', 'ETA', 13, 4, 0, NULL, 0, 0, 0, '', 0, 1, '2019-07-30 00:29:08', '2019-07-30 00:29:08'),
(85, 'etd', 'ETD', 13, 4, 0, NULL, 0, 0, 0, '', 0, 1, '2019-07-30 00:29:31', '2019-07-30 00:29:31'),
(86, 'date', 'Date', 13, 4, 0, NULL, 0, 0, 0, '', 0, 1, '2019-07-30 00:29:55', '2019-07-30 00:29:55'),
(87, 'vessel_no', 'Vessel No.', 13, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-07-30 00:30:32', '2019-08-18 22:17:49'),
(88, 'name', 'Name', 14, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-07-30 00:34:37', '2019-07-30 00:34:37'),
(89, 'import', 'Import', 14, 2, 0, '0', 0, 0, 0, '', 0, 0, '2019-07-30 00:35:39', '2019-08-15 21:03:19'),
(90, 'export', 'Export', 14, 2, 0, NULL, 0, 0, 0, '', 0, 0, '2019-07-30 00:36:08', '2019-08-15 21:03:19'),
(91, 'type', 'Type', 14, 7, 0, NULL, 0, 0, 0, '[\"Custom Clearance\",\"Trucking\",\"Supplement\"]', 0, 1, '2019-07-30 00:37:35', '2019-08-15 21:03:02'),
(92, 'job_no', 'Job No.', 15, 19, 0, '0', 0, 256, 0, '', 0, 1, '2019-07-30 01:33:56', '2019-07-30 01:33:56'),
(93, 'customer_id', 'Customer', 15, 7, 0, NULL, 0, 0, 0, '@companies', 0, 1, '2019-07-30 01:34:26', '2019-07-30 01:34:26'),
(94, 'imp_exp_id', 'IMP/EXP', 15, 7, 0, NULL, 0, 0, 0, '@companies', 0, 1, '2019-07-30 01:35:01', '2019-07-30 01:35:01'),
(95, 'shipment_id', 'Shipment', 15, 7, 0, NULL, 0, 0, 0, '@shipments', 0, 1, '2019-07-30 01:35:29', '2019-07-30 01:35:29'),
(96, 'date', 'Date', 15, 4, 0, NULL, 0, 0, 0, '', 0, 1, '2019-07-30 01:35:42', '2019-07-30 01:35:42'),
(97, 'process', 'Process', 15, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-07-30 01:36:21', '2019-07-30 01:36:21'),
(98, 'letter_head', 'Letter Head', 16, 7, 0, NULL, 0, 0, 0, '@files', 0, 0, '2019-08-12 21:53:35', '2019-08-12 21:53:35'),
(99, 'bill_registration', 'Bill Registration', 16, 7, 0, NULL, 0, 0, 0, '@files', 0, 0, '2019-08-12 21:54:22', '2019-08-12 21:54:22'),
(100, 'reference_no', 'Reference No', 16, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-12 21:54:56', '2019-08-12 21:54:56'),
(101, 'commericial_invoice', 'Commericial Invoice', 16, 7, 0, NULL, 0, 0, 0, '@files', 0, 0, '2019-08-12 21:55:21', '2019-08-12 21:55:21'),
(102, 'packing_list', 'Packing List', 16, 7, 0, NULL, 0, 0, 0, '@files', 0, 0, '2019-08-12 21:55:47', '2019-08-12 21:55:47'),
(103, 'sale_contract', 'Sale Contract', 16, 7, 0, NULL, 0, 0, 0, '@files', 0, 0, '2019-08-12 21:56:33', '2019-08-12 21:56:33'),
(104, 'credit', 'Credit', 16, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-12 21:57:09', '2019-08-12 21:57:09'),
(105, 'job_id', 'Job No.', 16, 7, 0, NULL, 0, 0, 0, '@jobs', 0, 0, '2019-08-12 21:57:39', '2019-08-12 21:57:39'),
(106, 'contact_person', 'Contact Person', 15, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-08-18 21:59:45', '2019-08-18 21:59:45'),
(107, 'job_service_type', 'Job Service Type', 15, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-18 22:28:41', '2019-08-18 22:28:41'),
(108, 'custom_clearance', 'Custom Clearance', 15, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-18 22:30:26', '2019-08-18 22:30:26'),
(109, 'trucking', 'Trucking', 15, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-18 22:30:53', '2019-08-18 22:30:53'),
(110, 'supplement', 'Supplement', 15, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-18 22:31:29', '2019-08-18 22:31:29'),
(111, 'name', 'Name', 17, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-20 09:41:00', '2019-08-20 09:41:00'),
(112, 'file', 'file', 17, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-20 09:41:37', '2019-08-20 09:41:37'),
(113, 'job_no', 'Job No.', 17, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-20 09:42:02', '2019-08-20 09:42:02'),
(114, 'cargo_receipt', 'Cargo Receipt', 18, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-21 02:50:27', '2019-08-21 02:50:27'),
(115, 'shipper', 'Shipper', 18, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-21 02:52:19', '2019-08-21 02:52:19'),
(116, 'sender', 'Sender', 18, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-21 02:52:52', '2019-08-21 02:52:52'),
(117, 'receiver', 'Receiver', 18, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-21 02:53:25', '2019-08-21 02:53:25'),
(118, 'delivery_date', 'Delivery Date', 18, 4, 0, NULL, 0, 0, 0, '', 0, 0, '2019-08-21 02:53:58', '2019-08-21 02:53:58'),
(119, 'job_id', 'Job No.', 18, 13, 0, NULL, 0, 11, 0, '', 0, 0, '2019-08-21 03:22:56', '2019-08-21 03:22:56'),
(120, 'receipt', 'Receipt', 19, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-22 00:03:29', '2019-08-22 00:03:29'),
(121, 'channel', 'Channel', 19, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-22 00:04:56', '2019-08-22 00:04:56'),
(122, 'ro', 'RO', 19, 13, 0, NULL, 0, 11, 0, '', 0, 0, '2019-08-22 00:05:23', '2019-08-22 00:05:23'),
(123, 'undertaking_letter', 'Undertaking Letter', 19, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-22 00:06:01', '2019-08-22 00:06:01'),
(124, 'physical_letter', 'Physical Letter', 19, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-22 00:06:52', '2019-08-22 00:06:52'),
(125, 'planned_checkin', 'Planned Checkin', 19, 4, 0, NULL, 0, 0, 0, '', 0, 0, '2019-08-22 00:08:10', '2019-08-22 00:08:10'),
(126, 'custom_data', 'Custom Data', 19, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-22 00:15:50', '2019-08-22 00:15:50'),
(127, 'attach_document', 'Attach Document', 19, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-22 00:16:27', '2019-08-22 00:16:27'),
(128, 'job_id', 'Job No.', 19, 13, 0, NULL, 0, 11, 0, '', 0, 0, '2019-08-22 02:51:32', '2019-08-22 02:51:32'),
(129, 'job_id', 'Job No', 20, 13, 0, '0', 0, 11, 0, '', 0, 0, '2019-08-23 22:05:08', '2019-08-23 22:05:08'),
(130, 'name', 'Name', 20, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-23 22:05:39', '2019-08-23 22:05:39'),
(131, 'short', 'Short name', 20, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-23 22:06:22', '2019-08-23 22:06:22'),
(132, 'type', 'Type', 20, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-23 22:06:41', '2019-08-23 22:06:41'),
(133, 'value', 'Value', 20, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-23 22:07:27', '2019-08-23 22:07:27'),
(134, 'name', 'Name', 21, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-08-28 20:21:42', '2019-08-28 20:21:42'),
(135, 'code', 'Code', 21, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-08-28 20:22:01', '2019-08-28 20:22:01'),
(136, 'country', 'Country', 21, 7, 0, 'Myanmar', 0, 0, 0, '[\"Myanmar\",\"Korea\",\"China\",\"Thai\",\"Singapore\",\"Malaysia\",\"Bangladesh\",\"Vietnam\",\"Japan\"]', 0, 1, '2019-08-28 20:26:31', '2019-08-28 20:31:41'),
(137, 'name', 'Name', 22, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-08-28 20:41:18', '2019-08-28 20:41:18'),
(138, 'code', 'Code', 22, 19, 0, NULL, 0, 256, 0, '', 0, 1, '2019-08-28 20:49:41', '2019-08-28 20:49:45'),
(139, 'reg_id', 'Reg ID', 9, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-08-28 21:49:59', '2019-08-28 21:49:59'),
(140, 'job_id', 'Job No.', 23, 13, 0, NULL, 0, 11, 0, '', 0, 0, '2019-09-04 09:04:30', '2019-09-04 09:04:30'),
(141, 'packing_list', 'Packing List', 23, 13, 0, NULL, 0, 11, 0, '', 0, 0, '2019-09-04 09:04:53', '2019-09-04 09:04:53'),
(142, 'loading_plan', 'Loading Plan', 23, 13, 0, NULL, 0, 11, 0, '', 0, 0, '2019-09-04 09:05:13', '2019-09-04 09:05:13'),
(143, 'vol', 'VOL', 13, 19, 0, NULL, 0, 256, 0, '', 0, 0, '2019-09-13 07:39:28', '2019-09-13 07:39:28'),
(144, 'line', 'Line', 13, 13, 0, NULL, 0, 11, 0, '', 0, 0, '2019-09-13 08:42:20', '2019-09-13 08:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `module_field_types`
--

CREATE TABLE `module_field_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_field_types`
--

INSERT INTO `module_field_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Address', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(2, 'Checkbox', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(3, 'Currency', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(4, 'Date', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(5, 'Datetime', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(6, 'Decimal', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(7, 'Dropdown', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(8, 'Email', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(9, 'File', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(10, 'Float', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(11, 'HTML', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(12, 'Image', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(13, 'Integer', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(14, 'Mobile', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(15, 'Multiselect', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(16, 'Name', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(17, 'Password', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(18, 'Radio', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(19, 'String', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(20, 'Taginput', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(21, 'Textarea', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(22, 'TextField', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(23, 'URL', '2018-03-05 22:13:52', '2018-03-05 22:13:52'),
(24, 'Files', '2018-03-05 22:13:52', '2018-03-05 22:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_to` int(10) UNSIGNED DEFAULT NULL,
  `connected_since` date DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_image` int(11) NOT NULL,
  `profile` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN_PANEL', 'Admin Panel', 'Admin Panel Permission', NULL, '2018-03-05 22:13:54', '2018-03-05 22:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `portnames`
--

CREATE TABLE `portnames` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(256) COLLATE utf8_unicode_ci DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portnames`
--

INSERT INTO `portnames` (`id`, `deleted_at`, `created_at`, `updated_at`, `country`, `name`, `status`) VALUES
(1, '2019-08-25 22:16:39', '2019-07-31 08:27:59', '2019-08-25 22:16:39', 'Myanmar', 'MYANMAR TRADING', 'yes'),
(2, NULL, '2019-08-25 22:16:53', '2019-08-25 22:17:31', 'Myanmar', 'AWPT', 'yes'),
(3, NULL, '2019-08-25 22:17:18', '2019-08-25 22:17:18', 'Myanmar', 'MIP', 'yes'),
(4, NULL, '2019-08-25 22:17:56', '2019-08-25 22:17:56', 'Myanmar', 'MIPL', 'yes'),
(5, NULL, '2019-08-25 22:18:15', '2019-08-25 22:18:15', 'Myanmar', 'MITT', 'yes'),
(6, NULL, '2019-08-25 22:19:40', '2019-08-25 22:19:40', 'China', 'CNBHY', 'yes'),
(7, NULL, '2019-08-25 22:20:10', '2019-08-25 22:20:10', 'China', 'CNDLC', 'yes'),
(8, NULL, '2019-08-25 22:20:39', '2019-08-25 22:20:39', 'China', 'CNDGT', 'yes'),
(9, NULL, '2019-08-25 22:20:59', '2019-08-25 22:20:59', 'China', 'CNHME', 'yes'),
(10, NULL, '2019-08-25 22:21:54', '2019-08-25 22:21:54', 'Singapore', 'SGSIN', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(10) UNSIGNED DEFAULT '1',
  `dept` int(10) UNSIGNED DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `parent`, `dept`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SUPER_ADMIN', 'Super Admin', 'Full Access Role', 1, 1, NULL, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(2, 'PROCESS-1', 'PROCESS-1', NULL, 1, 1, NULL, '2019-09-25 10:48:00', '2019-09-25 10:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_module`
--

CREATE TABLE `role_module` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `acc_view` tinyint(1) NOT NULL,
  `acc_create` tinyint(1) NOT NULL,
  `acc_edit` tinyint(1) NOT NULL,
  `acc_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module`
--

INSERT INTO `role_module` (`id`, `role_id`, `module_id`, `acc_view`, `acc_create`, `acc_edit`, `acc_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(2, 1, 2, 1, 1, 1, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(3, 1, 3, 1, 1, 1, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(4, 1, 4, 1, 1, 1, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(5, 1, 5, 1, 1, 1, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(6, 1, 6, 1, 1, 1, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(7, 1, 7, 1, 1, 1, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(8, 1, 8, 1, 1, 1, 1, '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(9, 1, 10, 1, 1, 1, 1, '2019-07-29 21:56:37', '2019-07-29 21:56:37'),
(10, 1, 9, 1, 1, 1, 1, '2019-07-29 22:00:00', '2019-07-29 22:00:00'),
(11, 1, 11, 1, 1, 1, 1, '2019-07-30 00:15:25', '2019-07-30 00:15:25'),
(12, 1, 12, 1, 1, 1, 1, '2019-07-30 00:23:07', '2019-07-30 00:23:07'),
(13, 1, 14, 1, 1, 1, 1, '2019-07-30 00:37:48', '2019-07-30 00:37:48'),
(14, 1, 15, 1, 1, 1, 1, '2019-07-30 01:37:11', '2019-07-30 01:37:11'),
(15, 1, 13, 1, 1, 1, 1, '2019-07-30 01:40:25', '2019-07-30 01:40:25'),
(16, 1, 21, 1, 1, 1, 1, '2019-08-28 20:27:47', '2019-08-28 20:27:47'),
(17, 1, 22, 1, 1, 1, 1, '2019-08-28 20:51:02', '2019-08-28 20:51:02'),
(18, 2, 1, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(19, 2, 2, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(20, 2, 3, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(21, 2, 4, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(22, 2, 5, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(23, 2, 6, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(24, 2, 7, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(25, 2, 8, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(26, 2, 9, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(27, 2, 10, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(28, 2, 11, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(29, 2, 12, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(30, 2, 13, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(31, 2, 14, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(32, 2, 15, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(33, 2, 16, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(34, 2, 17, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(35, 2, 18, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(36, 2, 19, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(37, 2, 20, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(38, 2, 21, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(39, 2, 22, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(40, 2, 23, 1, 0, 0, 0, '2019-09-25 10:48:00', '2019-09-25 10:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_module_fields`
--

CREATE TABLE `role_module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `access` enum('invisible','readonly','write') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module_fields`
--

INSERT INTO `role_module_fields` (`id`, `role_id`, `field_id`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(2, 1, 2, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(3, 1, 3, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(4, 1, 4, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(5, 1, 5, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(6, 1, 6, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(7, 1, 7, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(8, 1, 8, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(9, 1, 9, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(10, 1, 10, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(11, 1, 11, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(12, 1, 12, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(13, 1, 13, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(14, 1, 14, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(15, 1, 15, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(16, 1, 16, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(17, 1, 17, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(18, 1, 18, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(19, 1, 19, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(20, 1, 20, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(21, 1, 21, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(22, 1, 22, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(23, 1, 23, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(24, 1, 24, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(25, 1, 25, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(26, 1, 26, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(27, 1, 27, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(28, 1, 28, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(29, 1, 29, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(30, 1, 30, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(31, 1, 31, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(32, 1, 32, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(33, 1, 33, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(34, 1, 34, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(35, 1, 35, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(36, 1, 36, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(37, 1, 37, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(38, 1, 38, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(39, 1, 39, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(40, 1, 40, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(41, 1, 41, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(42, 1, 42, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(43, 1, 43, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(44, 1, 44, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(45, 1, 45, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(46, 1, 46, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(47, 1, 47, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(48, 1, 48, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(49, 1, 49, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(50, 1, 50, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(51, 1, 51, 'write', '2018-03-05 22:13:54', '2018-03-05 22:13:54'),
(52, 1, 52, 'write', '2019-07-29 21:50:55', '2019-07-29 21:50:55'),
(53, 1, 53, 'write', '2019-07-29 21:51:21', '2019-07-29 21:51:21'),
(54, 1, 54, 'write', '2019-07-29 21:51:52', '2019-07-29 21:51:52'),
(55, 1, 55, 'write', '2019-07-29 21:52:09', '2019-07-29 21:52:09'),
(56, 1, 56, 'write', '2019-07-29 21:52:37', '2019-07-29 21:52:37'),
(57, 1, 57, 'write', '2019-07-29 21:53:08', '2019-07-29 21:53:08'),
(58, 1, 58, 'write', '2019-07-29 21:54:22', '2019-07-29 21:54:22'),
(59, 1, 59, 'write', '2019-07-29 21:54:44', '2019-07-29 21:54:44'),
(60, 1, 60, 'write', '2019-07-29 21:55:29', '2019-07-29 21:55:29'),
(61, 1, 61, 'write', '2019-07-29 21:55:54', '2019-07-29 21:55:54'),
(62, 1, 62, 'write', '2019-07-29 21:56:20', '2019-07-29 21:56:20'),
(63, 1, 63, 'write', '2019-07-29 21:57:26', '2019-07-29 21:57:26'),
(64, 1, 64, 'write', '2019-07-29 21:58:01', '2019-07-29 21:58:01'),
(65, 1, 65, 'write', '2019-07-29 21:59:05', '2019-07-29 21:59:05'),
(66, 1, 66, 'write', '2019-07-29 21:59:23', '2019-07-29 21:59:23'),
(67, 1, 67, 'write', '2019-07-29 21:59:43', '2019-07-29 21:59:43'),
(68, 1, 68, 'write', '2019-07-30 00:11:33', '2019-07-30 00:11:33'),
(69, 1, 69, 'write', '2019-07-30 00:12:31', '2019-07-30 00:12:31'),
(70, 1, 70, 'write', '2019-07-30 00:13:00', '2019-07-30 00:13:00'),
(71, 1, 71, 'write', '2019-07-30 00:13:24', '2019-07-30 00:13:24'),
(72, 1, 72, 'write', '2019-07-30 00:13:51', '2019-07-30 00:13:51'),
(73, 1, 73, 'write', '2019-07-30 00:14:46', '2019-07-30 00:14:46'),
(74, 1, 74, 'write', '2019-07-30 00:22:00', '2019-07-30 00:22:00'),
(75, 1, 75, 'write', '2019-07-30 00:22:17', '2019-07-30 00:22:17'),
(76, 1, 76, 'write', '2019-07-30 00:22:53', '2019-07-30 00:22:53'),
(77, 1, 77, 'write', '2019-07-30 00:25:17', '2019-07-30 00:25:17'),
(78, 1, 78, 'write', '2019-07-30 00:26:10', '2019-07-30 00:26:10'),
(79, 1, 79, 'write', '2019-07-30 00:26:39', '2019-07-30 00:26:39'),
(80, 1, 80, 'write', '2019-07-30 00:27:16', '2019-07-30 00:27:16'),
(81, 1, 81, 'write', '2019-07-30 00:27:40', '2019-07-30 00:27:40'),
(82, 1, 82, 'write', '2019-07-30 00:28:13', '2019-07-30 00:28:13'),
(83, 1, 83, 'write', '2019-07-30 00:28:51', '2019-07-30 00:28:51'),
(84, 1, 84, 'write', '2019-07-30 00:29:09', '2019-07-30 00:29:09'),
(85, 1, 85, 'write', '2019-07-30 00:29:31', '2019-07-30 00:29:31'),
(86, 1, 86, 'write', '2019-07-30 00:29:55', '2019-07-30 00:29:55'),
(87, 1, 87, 'write', '2019-07-30 00:30:32', '2019-07-30 00:30:32'),
(88, 1, 88, 'write', '2019-07-30 00:34:37', '2019-07-30 00:34:37'),
(89, 1, 89, 'write', '2019-07-30 00:35:40', '2019-07-30 00:35:40'),
(90, 1, 90, 'write', '2019-07-30 00:36:08', '2019-07-30 00:36:08'),
(91, 1, 91, 'write', '2019-07-30 00:37:35', '2019-07-30 00:37:35'),
(92, 1, 92, 'write', '2019-07-30 01:33:56', '2019-07-30 01:33:56'),
(93, 1, 93, 'write', '2019-07-30 01:34:26', '2019-07-30 01:34:26'),
(94, 1, 94, 'write', '2019-07-30 01:35:01', '2019-07-30 01:35:01'),
(95, 1, 95, 'write', '2019-07-30 01:35:29', '2019-07-30 01:35:29'),
(96, 1, 96, 'write', '2019-07-30 01:35:42', '2019-07-30 01:35:42'),
(97, 1, 97, 'write', '2019-07-30 01:36:21', '2019-07-30 01:36:21'),
(98, 1, 98, 'write', '2019-08-12 21:53:35', '2019-08-12 21:53:35'),
(99, 1, 99, 'write', '2019-08-12 21:54:22', '2019-08-12 21:54:22'),
(100, 1, 100, 'write', '2019-08-12 21:54:56', '2019-08-12 21:54:56'),
(101, 1, 101, 'write', '2019-08-12 21:55:21', '2019-08-12 21:55:21'),
(102, 1, 102, 'write', '2019-08-12 21:55:47', '2019-08-12 21:55:47'),
(103, 1, 103, 'write', '2019-08-12 21:56:33', '2019-08-12 21:56:33'),
(104, 1, 104, 'write', '2019-08-12 21:57:09', '2019-08-12 21:57:09'),
(105, 1, 105, 'write', '2019-08-12 21:57:39', '2019-08-12 21:57:39'),
(106, 1, 106, 'write', '2019-08-18 21:59:45', '2019-08-18 21:59:45'),
(107, 1, 107, 'write', '2019-08-18 22:28:41', '2019-08-18 22:28:41'),
(108, 1, 108, 'write', '2019-08-18 22:30:26', '2019-08-18 22:30:26'),
(109, 1, 109, 'write', '2019-08-18 22:30:53', '2019-08-18 22:30:53'),
(110, 1, 110, 'write', '2019-08-18 22:31:29', '2019-08-18 22:31:29'),
(111, 1, 111, 'write', '2019-08-20 09:41:00', '2019-08-20 09:41:00'),
(112, 1, 112, 'write', '2019-08-20 09:41:37', '2019-08-20 09:41:37'),
(113, 1, 113, 'write', '2019-08-20 09:42:02', '2019-08-20 09:42:02'),
(114, 1, 114, 'write', '2019-08-21 02:50:27', '2019-08-21 02:50:27'),
(115, 1, 115, 'write', '2019-08-21 02:52:19', '2019-08-21 02:52:19'),
(116, 1, 116, 'write', '2019-08-21 02:52:52', '2019-08-21 02:52:52'),
(117, 1, 117, 'write', '2019-08-21 02:53:25', '2019-08-21 02:53:25'),
(118, 1, 118, 'write', '2019-08-21 02:53:58', '2019-08-21 02:53:58'),
(119, 1, 119, 'write', '2019-08-21 03:22:56', '2019-08-21 03:22:56'),
(120, 1, 120, 'write', '2019-08-22 00:03:29', '2019-08-22 00:03:29'),
(121, 1, 121, 'write', '2019-08-22 00:04:56', '2019-08-22 00:04:56'),
(122, 1, 122, 'write', '2019-08-22 00:05:23', '2019-08-22 00:05:23'),
(123, 1, 123, 'write', '2019-08-22 00:06:01', '2019-08-22 00:06:01'),
(124, 1, 124, 'write', '2019-08-22 00:06:52', '2019-08-22 00:06:52'),
(125, 1, 125, 'write', '2019-08-22 00:08:10', '2019-08-22 00:08:10'),
(126, 1, 126, 'write', '2019-08-22 00:15:50', '2019-08-22 00:15:50'),
(127, 1, 127, 'write', '2019-08-22 00:16:27', '2019-08-22 00:16:27'),
(128, 1, 128, 'write', '2019-08-22 02:51:32', '2019-08-22 02:51:32'),
(129, 1, 129, 'write', '2019-08-23 22:05:09', '2019-08-23 22:05:09'),
(130, 1, 130, 'write', '2019-08-23 22:05:39', '2019-08-23 22:05:39'),
(131, 1, 131, 'write', '2019-08-23 22:06:22', '2019-08-23 22:06:22'),
(132, 1, 132, 'write', '2019-08-23 22:06:41', '2019-08-23 22:06:41'),
(133, 1, 133, 'write', '2019-08-23 22:07:27', '2019-08-23 22:07:27'),
(134, 1, 134, 'write', '2019-08-28 20:21:42', '2019-08-28 20:21:42'),
(135, 1, 135, 'write', '2019-08-28 20:22:01', '2019-08-28 20:22:01'),
(136, 1, 136, 'write', '2019-08-28 20:26:31', '2019-08-28 20:26:31'),
(137, 1, 137, 'write', '2019-08-28 20:41:18', '2019-08-28 20:41:18'),
(138, 1, 138, 'write', '2019-08-28 20:49:41', '2019-08-28 20:49:41'),
(139, 1, 139, 'write', '2019-08-28 21:49:59', '2019-08-28 21:49:59'),
(140, 1, 140, 'write', '2019-09-04 09:04:30', '2019-09-04 09:04:30'),
(141, 1, 141, 'write', '2019-09-04 09:04:53', '2019-09-04 09:04:53'),
(142, 1, 142, 'write', '2019-09-04 09:05:13', '2019-09-04 09:05:13'),
(143, 1, 143, 'write', '2019-09-13 07:39:28', '2019-09-13 07:39:28'),
(144, 1, 144, 'write', '2019-09-13 08:42:20', '2019-09-13 08:42:20'),
(145, 2, 1, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(146, 2, 2, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(147, 2, 3, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(148, 2, 4, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(149, 2, 5, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(150, 2, 6, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(151, 2, 7, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(152, 2, 8, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(153, 2, 9, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(154, 2, 10, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(155, 2, 11, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(156, 2, 12, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(157, 2, 13, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(158, 2, 14, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(159, 2, 15, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(160, 2, 16, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(161, 2, 17, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(162, 2, 18, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(163, 2, 19, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(164, 2, 20, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(165, 2, 21, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(166, 2, 22, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(167, 2, 23, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(168, 2, 24, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(169, 2, 25, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(170, 2, 26, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(171, 2, 27, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(172, 2, 28, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(173, 2, 29, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(174, 2, 30, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(175, 2, 31, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(176, 2, 32, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(177, 2, 33, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(178, 2, 34, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(179, 2, 35, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(180, 2, 36, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(181, 2, 37, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(182, 2, 38, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(183, 2, 39, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(184, 2, 40, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(185, 2, 41, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(186, 2, 42, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(187, 2, 43, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(188, 2, 44, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(189, 2, 45, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(190, 2, 46, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(191, 2, 47, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(192, 2, 48, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(193, 2, 49, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(194, 2, 50, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(195, 2, 51, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(196, 2, 52, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(197, 2, 53, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(198, 2, 54, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(199, 2, 55, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(200, 2, 56, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(201, 2, 57, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(202, 2, 63, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(203, 2, 64, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(204, 2, 65, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(205, 2, 66, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(206, 2, 67, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(207, 2, 139, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(208, 2, 58, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(209, 2, 59, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(210, 2, 60, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(211, 2, 61, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(212, 2, 62, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(213, 2, 68, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(214, 2, 69, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(215, 2, 70, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(216, 2, 71, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(217, 2, 72, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(218, 2, 73, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(219, 2, 74, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(220, 2, 75, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(221, 2, 76, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(222, 2, 77, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(223, 2, 78, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(224, 2, 79, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(225, 2, 80, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(226, 2, 81, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(227, 2, 82, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(228, 2, 83, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(229, 2, 84, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(230, 2, 85, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(231, 2, 86, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(232, 2, 87, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(233, 2, 143, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(234, 2, 144, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(235, 2, 88, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(236, 2, 89, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(237, 2, 90, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(238, 2, 91, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(239, 2, 92, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(240, 2, 93, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(241, 2, 94, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(242, 2, 95, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(243, 2, 96, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(244, 2, 97, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(245, 2, 106, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(246, 2, 107, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(247, 2, 108, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(248, 2, 109, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(249, 2, 110, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(250, 2, 98, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(251, 2, 99, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(252, 2, 100, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(253, 2, 101, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(254, 2, 102, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(255, 2, 103, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(256, 2, 104, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(257, 2, 105, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(258, 2, 111, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(259, 2, 112, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(260, 2, 113, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(261, 2, 114, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(262, 2, 115, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(263, 2, 116, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(264, 2, 117, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(265, 2, 118, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(266, 2, 119, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(267, 2, 120, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(268, 2, 121, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(269, 2, 122, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(270, 2, 123, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(271, 2, 124, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(272, 2, 125, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(273, 2, 126, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(274, 2, 127, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(275, 2, 128, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(276, 2, 129, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(277, 2, 130, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(278, 2, 131, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(279, 2, 132, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(280, 2, 133, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(281, 2, 134, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(282, 2, 135, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(283, 2, 136, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(284, 2, 137, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(285, 2, 138, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(286, 2, 140, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(287, 2, 141, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00'),
(288, 2, 142, 'readonly', '2019-09-25 10:48:00', '2019-09-25 10:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicedetails`
--

CREATE TABLE `servicedetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` int(11) NOT NULL DEFAULT '0',
  `job_no` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `servicedetails`
--

INSERT INTO `servicedetails` (`id`, `deleted_at`, `created_at`, `updated_at`, `name`, `file`, `job_no`) VALUES
(1, NULL, '2019-08-26 00:58:29', '2019-08-26 00:58:29', 'MIC Certificate', 18, 1),
(2, NULL, '2019-08-26 00:58:30', '2019-08-26 00:58:30', 'MIC Recommendation Letter', 19, 1),
(3, NULL, '2019-08-26 00:58:30', '2019-08-26 00:58:30', 'MIC Test Exam Letter', 20, 1),
(4, NULL, '2019-08-26 00:58:30', '2019-08-26 00:58:30', 'MOPF Test Exam Letter', 21, 1),
(5, NULL, '2019-08-26 00:58:30', '2019-08-26 00:58:30', '2% Exam Letter', 22, 1),
(6, NULL, '2019-08-26 04:04:44', '2019-08-26 04:04:44', 'Application Form', 53, 2),
(7, NULL, '2019-08-26 04:04:44', '2019-08-26 04:04:44', 'Others', 54, 2),
(8, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', 'A Form', 78, 3),
(9, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', 'D Form', 79, 3),
(10, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', 'E Form', 80, 3),
(11, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:19', 'A Form', 98, 6),
(12, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:19', 'D Form', 99, 6),
(13, NULL, '2019-09-05 06:34:19', '2019-09-05 06:34:19', 'E Form', 100, 6),
(14, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', 'A Form', 123, 9),
(15, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', 'D Form', 124, 9),
(16, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', 'E Form', 125, 9);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `import` tinyint(1) NOT NULL DEFAULT '0',
  `export` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `deleted_at`, `created_at`, `updated_at`, `name`, `import`, `export`, `type`) VALUES
(1, NULL, '2019-08-25 22:22:40', '2019-08-25 22:22:49', 'Normal Clearance', 1, 1, 'Custom Clearance'),
(2, NULL, '2019-08-25 22:23:07', '2019-08-25 22:23:07', 'Co Examination', 1, 0, 'Custom Clearance'),
(3, NULL, '2019-08-25 22:23:25', '2019-08-25 22:23:25', 'MIC Examination', 1, 1, 'Custom Clearance'),
(4, NULL, '2019-08-25 22:23:36', '2019-08-25 22:23:36', 'CMP', 1, 1, 'Custom Clearance'),
(5, NULL, '2019-08-25 22:23:53', '2019-08-25 22:23:53', 'MIC with duty', 1, 1, 'Custom Clearance'),
(6, NULL, '2019-08-25 22:24:10', '2019-08-25 22:24:10', 'Repair and Return', 1, 1, 'Custom Clearance'),
(7, NULL, '2019-08-25 22:24:39', '2019-08-25 22:24:39', 'Express', 1, 1, 'Custom Clearance'),
(8, NULL, '2019-08-25 22:24:59', '2019-08-25 22:24:59', 'Special Order', 1, 0, 'Custom Clearance'),
(9, NULL, '2019-08-25 22:25:39', '2019-08-25 22:25:39', 'Trucking', 1, 1, 'Trucking'),
(10, NULL, '2019-08-25 22:26:02', '2019-08-25 22:26:02', 'OGA Doc: Application', 1, 1, 'Supplement'),
(11, NULL, '2019-08-25 22:26:18', '2019-08-25 22:26:18', 'MOC country origin', 1, 1, 'Supplement'),
(12, NULL, '2019-08-25 22:26:31', '2019-08-25 22:26:31', 'UMFCCI', 1, 1, 'Supplement'),
(13, NULL, '2019-08-25 22:26:45', '2019-08-25 22:26:45', 'MOA Phytho', 1, 1, 'Supplement');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transport` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commodity` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pkgs` int(11) DEFAULT '0',
  `kgs` int(11) DEFAULT '0',
  `pol` int(11) DEFAULT '0',
  `pod` int(11) DEFAULT '0',
  `eta` date DEFAULT NULL,
  `etd` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `vessel_no` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vol` varchar(256) COLLATE utf8_unicode_ci DEFAULT '1x40''',
  `line` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `deleted_at`, `created_at`, `updated_at`, `type`, `transport`, `commodity`, `pkgs`, `kgs`, `pol`, `pod`, `eta`, `etd`, `date`, `vessel_no`, `vol`, `line`) VALUES
(1, NULL, '2019-08-26 00:51:20', '2019-08-26 00:51:20', 'IMPORT', 'SEA', 'W.H.K', 75, 20368, 3, 2, '2019-08-26', '2019-08-26', '2019-08-26', 'VS-2323MM', '2x40\'', 1),
(2, '2019-08-26 21:15:12', '2019-08-26 02:27:49', '2019-08-26 21:15:12', 'EXPORT', 'SEA', 'Commodity', 323, 43, 2, 4, '2019-08-31', '2019-08-27', '2019-08-26', 'VS-JP01', '2x40\'', 2),
(3, NULL, '2019-08-29 03:23:41', '2019-08-29 03:23:41', 'IMPORT', 'AIR', 'W.H.K', 232, 45, 3, 5, '2019-08-29', '2019-09-07', '2019-08-26', 'VS-CH12', '2x40\'', 3),
(4, NULL, '2019-09-01 04:58:33', '2019-09-01 04:58:33', 'EXPORT', 'SEA', 'Engines', NULL, NULL, 2, 2, '2019-09-01', '2019-09-03', '2019-09-01', 'VS-4', '2x40\'', 1),
(5, NULL, '2019-09-05 03:28:55', '2019-09-05 03:28:55', 'IMPORT', 'SEA', 'Engines', 8, 20000, 2, 6, '2019-09-06', '2019-09-01', '2019-09-05', 'VS-4', '2x40\'', 3),
(6, NULL, '2019-09-05 06:23:45', '2019-09-05 06:23:45', 'IMPORT', 'SEA', NULL, NULL, NULL, 5, 7, '2019-09-28', '2019-09-15', '2019-09-05', 'VS-4', '20x20\'', 1),
(7, NULL, '2019-09-05 06:36:50', '2019-09-05 06:36:50', 'EXPORT', 'SEA', 'COM', 23, 34, 4, 6, '2019-09-09', '2019-09-09', '2019-09-05', 'VS-54', '3x40\'', 2),
(8, NULL, '2019-09-05 06:47:31', '2019-09-05 06:47:31', 'IMPORT', 'AIR', 'Commodity *', 23, 34, 3, 2, '2019-09-13', '2019-09-19', '2019-09-05', 'VS-65', '5x20\'', 2),
(9, NULL, '2019-09-05 06:57:41', '2019-09-05 06:57:41', 'EXPORT', 'AIR', 'W.H.K', 343, 23, 5, 7, '2019-09-07', '2019-09-09', '2019-09-05', 'VS-23', '3x40\'', 3),
(10, NULL, '2019-09-26 05:04:51', '2019-09-26 05:04:51', 'EXPORT', 'AIR', NULL, NULL, NULL, 2, 10, '2019-09-26', '2019-09-27', '2019-09-26', '877', '1x40\'', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shippinglines`
--

CREATE TABLE `shippinglines` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shippinglines`
--

INSERT INTO `shippinglines` (`id`, `deleted_at`, `created_at`, `updated_at`, `name`, `code`) VALUES
(1, NULL, '2019-08-28 20:53:36', '2019-08-28 20:53:36', 'FAR SHIPPING (SINGAPORE)PTE LTD', '11AV');

-- --------------------------------------------------------

--
-- Table structure for table `truckings`
--

CREATE TABLE `truckings` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cargo_receipt` int(11) NOT NULL DEFAULT '0',
  `shipper` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `job_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `truckings`
--

INSERT INTO `truckings` (`id`, `deleted_at`, `created_at`, `updated_at`, `cargo_receipt`, `shipper`, `sender`, `receiver`, `delivery_date`, `job_id`) VALUES
(1, NULL, '2019-08-26 04:04:44', '2019-08-26 04:04:44', 52, 'MIT', 'Sender1', 'Receiver', '2019-08-31', 2),
(2, NULL, '2019-08-30 01:52:48', '2019-08-30 01:52:48', 77, 'MIT', 'Sender1', 'Receiver', '2019-08-30', 3),
(3, NULL, '2019-09-12 03:47:27', '2019-09-12 03:47:27', 122, NULL, NULL, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT '1',
  `hash` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `path`, `extension`, `caption`, `user_id`, `hash`, `public`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Recipe_20180404_113616_01.jpg', '/Users/hostmyanmar/Desktop/laraadmin/hfw/storage/uploads/2018-04-10-160507-Recipe_20180404_113616_01.jpg', 'jpg', '', 1, 'larefnrl4pcogktl5x3r', 0, '2018-04-10 09:35:12', '2018-04-10 09:35:07', '2018-04-10 09:35:12'),
(2, 'certificate1.jpg', '/home/www/unilink.hostmm.net/storage/uploads/2019-07-30-081130-certificate1.jpg', 'jpg', '', 1, 'lqiaw3xylf2gqjg6637x', 0, NULL, '2019-07-30 01:41:30', '2019-07-30 01:41:30'),
(3, 'certificate2.jpg', '/home/www/unilink.hostmm.net/storage/uploads/2019-07-30-081130-certificate2.jpg', 'jpg', '', 1, 'bipbexkuordadxb6vbuf', 0, NULL, '2019-07-30 01:41:30', '2019-07-30 01:41:30'),
(4, 'certificate3.jpg', '/home/www/unilink.hostmm.net/storage/uploads/2019-07-30-081131-certificate3.jpg', 'jpg', '', 1, 'mjf76w0rfx5ikuocuwfj', 0, NULL, '2019-07-30 01:41:31', '2019-09-05 03:53:32'),
(5, 'certificate4.jpg', '/home/www/unilink.hostmm.net/storage/uploads/2019-07-30-081134-certificate4.jpg', 'jpg', '', 1, 'q3eeeu0b328rbrtor7ay', 0, NULL, '2019-07-30 01:41:34', '2019-07-30 01:41:34'),
(6, 'certificate5.jpg', '/home/www/unilink.hostmm.net/storage/uploads/2019-07-30-081135-certificate5.jpg', 'jpg', '', 1, 'hqavljpijmzyunpcp6ss', 0, NULL, '2019-07-30 01:41:35', '2019-07-30 01:41:35'),
(7, 'certificate6.jpg', '/home/www/unilink.hostmm.net/storage/uploads/2019-07-30-081135-certificate6.jpg', 'jpg', '', 1, 'ij2dtsypt2zict2sv73m', 0, NULL, '2019-07-30 01:41:35', '2019-07-30 01:41:35'),
(8, 'certificate7.jpg', '/home/www/unilink.hostmm.net/storage/uploads/2019-07-30-081136-certificate7.jpg', 'jpg', '', 1, 'iefo5pfad1zuj0sgemov', 0, NULL, '2019-07-30 01:41:36', '2019-07-30 01:41:36'),
(9, 'mdyhill.png', '/home/www/unilink.hostmm.net/storage/uploads/2019-09-03-025513-mdyhill.png', 'png', '', 1, 'l5brubyuoj3aepuhn5tw', 0, NULL, '2019-09-03 02:55:13', '2019-09-03 02:55:13'),
(10, 'bangkokairways.png', '/home/www/unilink.hostmm.net/storage/uploads/2019-09-05-095023-bangkokairways.png', 'png', '', 1, 'chyqjvspsjaw0pek57of', 0, NULL, '2019-09-05 09:50:23', '2019-09-05 09:50:23'),
(11, 'customerflow.jpg', '/home/www/unilink.hostmm.net/storage/uploads/2019-09-26-052410-customerflow.jpg', 'jpg', '', 1, 'buabss3uewrkznnkjxww', 0, NULL, '2019-09-26 05:24:10', '2019-09-26 05:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `context_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `type` varchar(191) COLLATE utf8_unicode_ci DEFAULT 'Employee',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `context_id`, `email`, `password`, `type`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, 'admin@hostmyanmar.net', '$2y$10$wiVsEYXt/1pW/zCtkytRzODl7QfRUuB6sPy9dgXXETpF8LZIgjlC2', 'Employee', '0nDtFAzRMirMQcaA1h0qCFc4GM6UgW7BhUTZ6bJgvi6Ht2nnRExYS7oQe6w7', NULL, '2018-03-05 22:14:06', '2019-09-05 10:31:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `backups_name_unique` (`name`),
  ADD UNIQUE KEY `backups_file_name_unique` (`file_name`);

--
-- Indexes for table `cargoreceipts`
--
ALTER TABLE `cargoreceipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_registration_foreign` (`registration`);

--
-- Indexes for table `compulsories`
--
ALTER TABLE `compulsories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_dept_foreign` (`dept`);

--
-- Indexes for table `fieldoperations`
--
ALTER TABLE `fieldoperations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ie_infos`
--
ALTER TABLE `ie_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ie_infos_company_id_foreign` (`company_id`),
  ADD KEY `ie_infos_certificate_foreign` (`certificate`),
  ADD KEY `ie_infos_mcc_foreign` (`mcc`),
  ADD KEY `ie_infos_mgma_foreign` (`mgma`),
  ADD KEY `ie_infos_mia_foreign` (`mia`),
  ADD KEY `ie_infos_omfcc_foreign` (`umfcci`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_customer_id_foreign` (`customer_id`),
  ADD KEY `jobs_imp_exp_id_foreign` (`imp_exp_id`),
  ADD KEY `jobs_shipment_id_foreign` (`shipment_id`);

--
-- Indexes for table `la_configs`
--
ALTER TABLE `la_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_menus`
--
ALTER TABLE `la_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maccs`
--
ALTER TABLE `maccs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_fields_module_foreign` (`module`),
  ADD KEY `module_fields_field_type_foreign` (`field_type`);

--
-- Indexes for table `module_field_types`
--
ALTER TABLE `module_field_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_name_unique` (`name`),
  ADD KEY `organizations_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `portnames`
--
ALTER TABLE `portnames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD KEY `roles_parent_foreign` (`parent`),
  ADD KEY `roles_dept_foreign` (`dept`);

--
-- Indexes for table `role_module`
--
ALTER TABLE `role_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_role_id_foreign` (`role_id`),
  ADD KEY `role_module_module_id_foreign` (`module_id`);

--
-- Indexes for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_fields_role_id_foreign` (`role_id`),
  ADD KEY `role_module_fields_field_id_foreign` (`field_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `servicedetails`
--
ALTER TABLE `servicedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippinglines`
--
ALTER TABLE `shippinglines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truckings`
--
ALTER TABLE `truckings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `backups`
--
ALTER TABLE `backups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cargoreceipts`
--
ALTER TABLE `cargoreceipts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `compulsories`
--
ALTER TABLE `compulsories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fieldoperations`
--
ALTER TABLE `fieldoperations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `ie_infos`
--
ALTER TABLE `ie_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `la_configs`
--
ALTER TABLE `la_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `la_menus`
--
ALTER TABLE `la_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `maccs`
--
ALTER TABLE `maccs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `module_fields`
--
ALTER TABLE `module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `module_field_types`
--
ALTER TABLE `module_field_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portnames`
--
ALTER TABLE `portnames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_module`
--
ALTER TABLE `role_module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servicedetails`
--
ALTER TABLE `servicedetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shippinglines`
--
ALTER TABLE `shippinglines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `truckings`
--
ALTER TABLE `truckings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_registration_foreign` FOREIGN KEY (`registration`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_dept_foreign` FOREIGN KEY (`dept`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ie_infos`
--
ALTER TABLE `ie_infos`
  ADD CONSTRAINT `ie_infos_certificate_foreign` FOREIGN KEY (`certificate`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ie_infos_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ie_infos_mcc_foreign` FOREIGN KEY (`mcc`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ie_infos_mgma_foreign` FOREIGN KEY (`mgma`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ie_infos_mia_foreign` FOREIGN KEY (`mia`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ie_infos_omfcc_foreign` FOREIGN KEY (`umfcci`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD CONSTRAINT `module_fields_field_type_foreign` FOREIGN KEY (`field_type`) REFERENCES `module_field_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_fields_module_foreign` FOREIGN KEY (`module`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_dept_foreign` FOREIGN KEY (`dept`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_module`
--
ALTER TABLE `role_module`
  ADD CONSTRAINT `role_module_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_module_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  ADD CONSTRAINT `role_module_fields_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `module_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_module_fields_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
