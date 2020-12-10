-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 07:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `server_inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followups`
--

CREATE TABLE `followups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `server_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Serial_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Asset_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rack_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rack_unit_No` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_and_modal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followups`
--

INSERT INTO `followups` (`id`, `server_type`, `Serial_no`, `Asset_no`, `Rack_no`, `Rack_unit_No`, `product_and_modal`, `status`, `remark`, `update_user_id`, `update_user_name`, `created_at`, `updated_at`) VALUES
(1, 'Physical', 'vsdzf66', '43222', '2', '3', 'Dell', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 04:33:00', '2020-10-18 04:33:00'),
(2, 'Physical', 'vsdzf66', '43222', '2', '3', 'Dell', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 04:46:39', '2020-10-18 04:46:39'),
(3, 'Physical', 'vsdzf66', '33444', '5', '4', 'hp', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 04:54:54', '2020-10-18 04:54:54'),
(4, 'Physical', 'vsdzf66', '33444', '5', '4', 'hp', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 05:50:31', '2020-10-18 05:50:31'),
(5, 'Physical', 'vsdzf66', '33444', '5', '4', 'hp', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 05:50:54', '2020-10-18 05:50:54'),
(6, 'Physical', 'vsdzf66', '33444', '5', '4', 'hp', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 05:51:36', '2020-10-18 05:51:36'),
(7, 'Physical', 'vsdzf66', '33444', '5', '4', 'hp', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 06:49:12', '2020-10-18 06:49:12'),
(8, 'Physical', 'vsdzf66', '98090', '6', '5', 'HP', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 06:55:55', '2020-10-18 06:55:55'),
(9, 'Physical', 'vvdvf', '5665', '4', '6', 'bdv', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 07:08:56', '2020-10-18 07:08:56'),
(10, 'Physical', 'gefwedse', 'fswsad', '5', '6', 'dfgd', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 07:11:19', '2020-10-18 07:11:19'),
(11, 'Physical', 'vsdzf', '6554', '4', '6', 'bdv', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 07:15:05', '2020-10-18 07:15:05'),
(12, 'Virtual', '', '', '', '', '', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 10:39:05', '2020-10-18 10:39:05'),
(13, 'Virtual', '', '', '', '', '', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 10:39:34', '2020-10-18 10:39:34'),
(14, 'Physical', 'vsdzf66gg', '3222', '4', '6', 'bdv', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-18 12:19:26', '2020-10-18 12:19:26'),
(15, 'Physical', 'vsdzf66', '65543', '4', '9', 'HP', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-24 05:46:43', '2020-10-24 05:46:43'),
(16, 'Physical', 'vsdzf66', '65543', '4', '9', 'HP', 'Update', '', '1', 'Nuwan Athukorala', '2020-10-24 11:13:03', '2020-10-24 11:13:03'),
(17, 'Physical', 'vsdzf66gg', '3222', '4', '6', 'bdv', 'Remove', '', '1', 'Nuwan Athukorala', '2020-10-24 12:04:49', '2020-10-24 12:04:49'),
(18, 'Virtual', 'vsdzf66', '33444', '5', '4', 'hp', 'Remove', '', '1', 'Nuwan Athukorala', '2020-10-24 12:09:31', '2020-10-24 12:09:31'),
(19, 'Virtual', '', '', '', '', '', 'Remove', '', '1', 'Nuwan Athukorala', '2020-10-24 12:09:38', '2020-10-24 12:09:38'),
(20, 'Virtual', '', '', '', '', '', 'Remove', '', '1', 'Nuwan Athukorala', '2020-10-24 12:09:43', '2020-10-24 12:09:43'),
(21, 'Physical', 'vsdzf', '43322', '4', '7', 'HP', 'Create', '', '1', 'Nuwan Athukorala', '2020-10-24 22:14:42', '2020-10-24 22:14:42'),
(22, 'Physical', 'vsdzf66', '65543', '4', '9', 'HP', 'Update', '', '1', 'Nuwan Athukorala', '2020-10-25 02:23:47', '2020-10-25 02:23:47'),
(23, 'Physical', 'vsdzf66', '33444', '5', '4', 'hp', 'Remove', '', '1', 'Nuwan Athukorala', '2020-10-25 02:23:56', '2020-10-25 02:23:56'),
(24, 'Physical', 'vsdzf66', 'vsdf', '4', '7', 'HP DL320 G8 V2', 'Create', '', '1', 'Nuwan Athukorala', '2020-11-01 10:11:00', '2020-11-01 10:11:00'),
(25, 'Physical', 'CN711907BCE', '18508', 'RACK 0001', '20', 'DL320 G8 V2', 'Create', '', '1', 'Nuwan Athukorala', '2020-11-01 10:14:04', '2020-11-01 10:14:04'),
(26, 'Physical', 'CN711907BC', '18472', 'R001', '29', 'HP DL 160 G6', 'Create', '', '1', 'Nuwan Athukorala', '2020-11-01 10:20:31', '2020-11-01 10:20:31'),
(27, 'Physical', 'vsdzf', '185083', 'RACK 0001', '7', 'HP DL320 G8 V2', 'Create', '', '1', 'Nuwan Athukorala', '2020-11-01 10:25:36', '2020-11-01 10:25:36'),
(28, 'Physical', 'vsdzf66222', '18508554', '4', '6', 'bdv', 'Create', '', '1', 'Nuwan Athukorala', '2020-11-01 10:51:14', '2020-11-01 10:51:14'),
(29, 'Physical', 'CN711907BC', '18472', 'R001', '29', 'HP DL 160 G6', 'Remove', '', '1', 'Nuwan Athukorala', '2020-11-01 10:52:12', '2020-11-01 10:52:12'),
(30, 'Physical', 'CN711907BC', '18472', 'RACK 0001', '29', 'HP DL320 G8 V2', 'Create', '', '1', 'Nuwan Athukorala', '2020-11-01 11:07:10', '2020-11-01 11:07:10'),
(31, 'Physical', 'vsdzf66', '65543', '4', '9', 'HP', 'Update', '', '1', 'Nuwan Athukorala', '2020-11-25 12:45:09', '2020-11-25 12:45:09'),
(32, 'Physical', 'vsdzf66', '65543', '4', '9', 'HP', 'Update', '', '1', 'Nuwan Athukorala', '2020-11-25 12:55:37', '2020-11-25 12:55:37'),
(33, 'Physical', 'vsdzf66', '65543', '4', '9', 'HP', 'Update', '', '1', 'Nuwan Athukorala', '2020-11-25 12:57:23', '2020-11-25 12:57:23'),
(34, 'Physical', 'vsdzf66', '65543', '4', '9', 'HP', 'Update', '', '1', 'Nuwan Athukorala', '2020-11-25 12:57:46', '2020-11-25 12:57:46'),
(35, 'NAS', 'CN711907BCE', '34333', 'RACK 0005', '7', 'HP DL320 G8 V2', 'Create', '', '1', 'Nuwan Athukorala', '2020-11-25 13:47:29', '2020-11-25 13:47:29'),
(36, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Create', '', '1', 'Nuwan Athukorala', '2020-11-25 13:56:07', '2020-11-25 13:56:07'),
(37, 'Switch', 'CN711907BCE43', '5453', 'RACK 00015', '5', '6543g', 'Create', '', '1', 'Nuwan Athukorala', '2020-11-25 14:00:30', '2020-11-25 14:00:30'),
(38, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-07 12:33:48', '2020-12-07 12:33:48'),
(39, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-07 12:34:04', '2020-12-07 12:34:04'),
(40, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-07 12:35:41', '2020-12-07 12:35:41'),
(41, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-07 12:36:25', '2020-12-07 12:36:25'),
(42, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-07 12:42:22', '2020-12-07 12:42:22'),
(43, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-07 12:43:38', '2020-12-07 12:43:38'),
(44, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-07 12:43:51', '2020-12-07 12:43:51'),
(45, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-07 12:57:52', '2020-12-07 12:57:52'),
(46, 'Physical', 'vsfasd', '34534', 'gt44', '453', 'fdfsd', 'Create', '', '1', 'Nuwan Athukorala', '2020-12-07 12:58:54', '2020-12-07 12:58:54'),
(47, 'Physical', 'bdgdrg', 'grgert', 'bdfg', 'gge', 'grge', 'Create', '', '1', 'Nuwan Athukorala', '2020-12-07 21:02:53', '2020-12-07 21:02:53'),
(48, 'NAS', 'vsdzf66', '4432', 'hbxfgx4', '5', 'bsdfv', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-07 21:10:32', '2020-12-07 21:10:32'),
(49, 'Physical', 'vsdzf66222', '18508554', '4', '6', 'bdv', 'Power off', '', '1', 'Nuwan Athukorala', '2020-12-10 10:20:07', '2020-12-10 10:20:07'),
(50, 'Physical', 'vsfasd', '34534', 'gt44', '453', 'fdfsd', 'Power off', '', '1', 'Nuwan Athukorala', '2020-12-10 10:29:34', '2020-12-10 10:29:34'),
(51, 'Physical', 'vsfasd', '34534', 'gt44', '453', 'fdfsd', 'Power off', '', '1', 'Nuwan Athukorala', '2020-12-10 10:30:50', '2020-12-10 10:30:50'),
(52, 'Physical', 'vsfasd', '34534', 'gt44', '453', 'fdfsd', 'Power off', '', '1', 'Nuwan Athukorala', '2020-12-10 10:33:23', '2020-12-10 10:33:23'),
(53, 'Physical', 'vsdzf', '185083', 'RACK 0001', '7', 'HP DL320 G8 V2', 'Power off', '', '1', 'Nuwan Athukorala', '2020-12-10 10:33:29', '2020-12-10 10:33:29'),
(54, 'Physical', 'vsdzf', '185083', 'RACK 0001', '7', 'HP DL320 G8 V2', 'Power off', '', '1', 'Nuwan Athukorala', '2020-12-10 10:33:34', '2020-12-10 10:33:34'),
(55, 'Physical', 'vsdzf66222', '18508554', '4', '6', 'bdv', 'Power off', 'test', '1', 'Nuwan Athukorala', '2020-12-10 11:21:02', '2020-12-10 11:21:02'),
(56, 'Physical', 'CN711907BC', '18472', 'RACK 0001', '29', 'HP DL320 G8 V2', 'Remove', '', '1', 'Nuwan Athukorala', '2020-12-10 11:25:22', '2020-12-10 11:25:22'),
(57, 'Physical', 'vsdzf66222', '18508554', '4', '6', 'bdv', 'Remove', '', '1', 'Nuwan Athukorala', '2020-12-10 11:27:31', '2020-12-10 11:27:31'),
(58, 'Physical', 'bdgdrg', 'grgert', 'bdfg', 'gge', 'grge', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-10 11:34:21', '2020-12-10 11:34:21'),
(59, 'Physical', 'bdgdrg', 'grgert', 'bdfg', 'gge', 'grge', 'Update', '', '1', 'Nuwan Athukorala', '2020-12-10 11:48:51', '2020-12-10 11:48:51'),
(60, 'Physical', 'vsdzf', '43322', '4', '7', 'HP', 'Remove', '', '1', 'Nuwan Athukorala', '2020-12-10 11:49:03', '2020-12-10 11:49:03'),
(61, 'Physical', 'dfvds', '43322', 'vdfvds', 'dsgsdf', 'bdvds', 'Create', '', '1', 'Nuwan Athukorala', '2020-12-10 11:51:46', '2020-12-10 11:51:46'),
(62, 'Physical', 'CN711907BCE', '18508', 'RACK 0001', '20', 'DL320 G8 V2', 'Remove', '', '1', 'Nuwan Athukorala', '2020-12-10 12:08:13', '2020-12-10 12:08:13'),
(63, 'Physical', 'vsdzf', '185083', 'RACK 0001', '7', 'HP DL320 G8 V2', 'Remove', '', '1', 'Nuwan Athukorala', '2020-12-10 12:08:26', '2020-12-10 12:08:26'),
(64, 'Physical', 'vsdzf', '185083', 'RACK 0001', '7', 'HP DL320 G8 V2', 'Remove', '', '1', 'Nuwan Athukorala', '2020-12-10 12:09:39', '2020-12-10 12:09:39'),
(65, 'Physical', 'vsdzf', '185083', 'RACK 0001', '7', 'HP DL320 G8 V2', 'Remove', '', '1', 'Nuwan Athukorala', '2020-12-10 12:11:13', '2020-12-10 12:11:13'),
(66, 'Physical', 'vsdzf', '185083', 'RACK 0001', '7', 'HP DL320 G8 V2', 'Remove', '', '1', 'Nuwan Athukorala', '2020-12-10 12:11:59', '2020-12-10 12:11:59'),
(67, 'Physical', 'gefwedse', 'fswsad', '5', '6', 'dfgd', 'Remove', '', '1', 'Nuwan Athukorala', '2020-12-10 12:12:21', '2020-12-10 12:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 2),
(9, '2020_09_13_052357_create_serverdetails_table', 2),
(10, '2020_09_13_083600_create_followups_table', 2),
(11, '2020_10_18_082042_create_py_vir_server_tables_table', 3),
(12, '2020_10_24_103431_create_py_vir_serve_followups_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `py_vir_server_tables`
--

CREATE TABLE `py_vir_server_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `virtual_serv_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vir_machine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `virtual_machine_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `virtual_machine_os` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `virtual_apps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vir_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `py_vir_server_tables`
--

INSERT INTO `py_vir_server_tables` (`id`, `virtual_serv_token`, `vir_machine_name`, `virtual_machine_ip`, `virtual_machine_os`, `virtual_apps`, `added_user_id`, `added_user`, `vir_status`, `created_at`, `updated_at`) VALUES
(5, '85770', 'wfsd', 'saad', 'asD', 'f', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(6, '85770', 'csad', 'dawdaS', 'WAD', 'a', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(7, '12568', 'wfsd', 'saad', 'asD', 'f', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(8, '12568', 'csad', 'dawdaS', 'WAD', 'a', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(9, '15625', 'lkjkjk', 'ghj', 'hjbhj', 'g', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(10, '17064', 'dfsdf', 'vsdc', 'esd', 'f', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(11, '17064', 'vdsfds', 'vdsfgg', 'vdsfsfcs', 'd', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(12, '13241', 'bdfgvg', 'dsgdsf', 'gsdf', 'g', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(13, '12939', 'sds', 'gefv', 'ew', 'f', '1', 'Nuwan Athukorala', '0', NULL, '2020-12-10 12:12:21'),
(14, '63189', 'gaesf', 'fas', 'sda', 'f', '1', 'Nuwan Athukorala', '0', NULL, '2020-10-24 23:38:35'),
(15, '63189', 'fsad', 'ad', 'asdcad', 'w', '1', 'Nuwan Athukorala', '0', NULL, '2020-10-24 23:38:36'),
(16, '85998', 'hgerdrf', 'fsdfc', 'sdfv', 'e', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(17, '85998', 'fcasdc', 'asdca', 'fasfas', 's', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(18, '1912', 'TCS Server', '192.168.1.1', 'Windows', 'TCS', '1', 'Nuwan Athukorala', '1', NULL, '2020-11-25 13:13:57'),
(19, '1912', 'IT Workflow', '192.168.10.49', 'Windows', 'C', '1', 'Nuwan Athukorala', '0', NULL, '2020-10-24 10:37:16'),
(20, '1912', 'VDS', 'VDSF', 'DSFF', 'VDSF', '1', 'Nuwan Athukorala', '0', '2020-10-24 06:10:39', '2020-10-24 23:36:06'),
(21, '85998', 'hgfg', 'gfgf', 'hgjmn', 'nghgh', '1', 'Nuwan Athukorala', '0', '2020-10-24 06:12:04', '2020-10-24 10:43:07'),
(22, '63189', 'cb', 'cvb', 'bfvd', 'vdfsdd', '1', 'Nuwan Athukorala', '0', '2020-10-24 06:13:32', '2020-10-24 23:38:40'),
(23, '63189', 'cb', 'cvb', 'bfvd', 'vdfsdd', '1', 'Nuwan Athukorala', '0', '2020-10-24 06:14:54', '2020-10-24 23:38:38'),
(24, '85998', 'vdsc', 'sdvdvfv', 'bfd', 'vdsfs', '1', 'Nuwan Athukorala', '1', '2020-10-24 06:17:28', '2020-10-24 06:17:28'),
(25, '17064', 'sdc', 'asc', 'avscvb', 'vd', '1', 'Nuwan Athukorala', '1', '2020-10-24 06:18:27', '2020-10-24 06:18:27'),
(26, '17064', 'aa', 'asc', 'avscvb', 'vd', '1', 'Nuwan Athukorala', '1', '2020-10-24 06:18:48', '2020-10-24 06:18:48'),
(27, '85998', 'bbdfg', 'dgsdf', 'dsfs', 'ggggg', '1', 'Nuwan Athukorala', '0', '2020-10-24 10:43:21', '2020-10-24 10:43:25'),
(28, '1912', 'gef', 'dsf', 'ewa', 'sghhh', '1', 'Nuwan Athukorala', '0', '2020-10-24 10:46:12', '2020-10-24 23:36:04'),
(29, '1912', 'dfvsd', 'ggg', 'ggdd', 'ggggggg', '1', 'Nuwan Athukorala', '0', '2020-10-24 10:46:25', '2020-10-24 10:46:27'),
(30, '12939', 'fwaf', 'wefw', 'gwaef', 'verwerwe|fwerqw', '1', 'Nuwan Athukorala', '0', '2020-10-24 21:50:09', '2020-10-24 21:52:36'),
(31, '1912', 'dfvd', 'dsv', 'fvdsf', 'vdvdf|vdsfsf', '1', 'Nuwan Athukorala', '1', '2020-10-24 21:51:15', '2020-10-24 21:51:15'),
(32, '12939', 'vdsfd', 'sdvsdf', 'sdsafaf', 'vdfsef|fffff', '1', 'Nuwan Athukorala', '0', '2020-10-24 21:52:28', '2020-12-10 12:12:21'),
(33, '28085', 'fds', 'sfsd', 'sdw', 'gdghh|gggg', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:16:12', '2020-10-24 23:16:12'),
(34, '49041', 'fds', 'sfsd', 'sdw', 'gdghh|gggg', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:16:20', '2020-10-24 23:16:20'),
(35, '9477', 'fds', 'sfsd', 'sdw', 'gdghh|gggg', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:17:36', '2020-10-24 23:17:36'),
(36, '23424', 'fdg', 'gdsf', 'gesfs', 'gdghh|gggg|fsdfs', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:18:35', '2020-10-24 23:18:35'),
(37, '23424', 'bdfv', 'dcf', 'sc', 'vscsd|vdxcsca', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:23:52', '2020-10-24 23:23:52'),
(38, '23424', 'fvdsf', 'fsf', 'gvge', 'gsdfs|dfdsd', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:27:49', '2020-10-24 23:27:49'),
(39, '23424', 'vc cv', 'cvb', 'dcv bcdxv', 'cvcxv|cvcv', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:34:18', '2020-10-24 23:34:18'),
(40, '1912', 'dvxcv', 'csv', 'szv', 'vdsv|vxvscxv', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:35:19', '2020-10-24 23:35:19'),
(41, '1912', 'vvd', 'zv', 'sdv', 'ss|aa|vv', '1', 'Nuwan Athukorala', '0', '2020-10-24 23:35:49', '2020-10-24 23:36:02'),
(42, '63189', 'dvcxv', 'vczdx', 'vdcv', 'fff|ggg|hhh', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:37:51', '2020-10-24 23:37:51'),
(43, '63189', 'fdsfds', 'gdsvsz', 'dszfs', 'www|eee|rrr', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:38:10', '2020-10-24 23:38:10'),
(44, '63189', 'dvd', 'vdv', 'fdsfsf', 'bbb|gggg|nnn', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:38:29', '2020-10-24 23:38:29'),
(45, '63189', 'grgwe', 'erfrwae', 'fesfrw', 'efrer|ewerwr|erwer', '1', 'Nuwan Athukorala', '1', '2020-10-24 23:38:54', '2020-10-24 23:38:54'),
(46, '63189', 'vdscf', 'csad', 'sadf', 'dfsdfasdAFSGDHDHFDGDSFSFWRW|FFSFDFGFGDFHGvddg', '1', 'Nuwan Athukorala', '0', '2020-10-24 23:39:27', '2020-10-25 04:05:24'),
(47, '29505', 'User Backup – Life', '192.168.192.67', 'Win Svr 2012 R2 Std', 'U', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(48, '29505', 'User Backup – General', '192.168.192.210', 'Win Svr 2008 R2 Ent', 's', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(49, '29505', 'sdasd', '192.168.1.1', 'windows', 'ddddd|sssss', '1', 'Nuwan Athukorala', '1', '2020-11-01 10:23:23', '2020-11-01 10:23:23'),
(50, '83619', 'dsfcs', 'vdsfsf', 'vdsfawdwa', 'g', '1', 'Nuwan Athukorala', '0', NULL, '2020-12-10 12:11:13'),
(51, '60173', 'vsefcsf', '192.168.1.1', 'dsf', 'fffff|ddddd', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(52, '8737', 'User Backup – Life', '192.168.192.67', 'Win Svr 2012 R2 Std', 'User Backup – Life', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(53, '8737', 'User Backup – General', '192.168.192.210', 'Win Svr 2008 R2 Ent', 'User Backup – General', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(54, '89314', 'User Backup – Life', '192.168.192.67', 'Win Svr 2012 R2 Std', 'User Backup – Life', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(55, '89314', 'User Backup – General', '192.168.192.210', 'Win Svr 2008 R2 Ent', 'User Backup – General', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(56, '64413', 'User Backup – Life', '192.168.192.67', 'Win Svr 2012 R2 Std', 'User Backup – Life', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(57, '64413', 'User Backup – General', '192.168.192.210', 'Win Svr 2008 R2 Ent', 'User Backup – General', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(58, '68299', 'Win server 2012 R2', '192.168.192.67', 'Win server 2012 R2', 'User Backup – Life', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(59, '68299', 'User Backup – General', '192.168.192.210', 'Win Svr 2008 R2 Ent', 'User Backup – General', '1', 'Nuwan Athukorala', '1', NULL, NULL),
(60, '39613', 'gdsd', '192.168.1.1', 'was', 'vsdv|sadas', '1', 'Nuwan Athukorala', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `py_vir_serve_followups`
--

CREATE TABLE `py_vir_serve_followups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vm_server_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vm_server_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vm_server_update_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vm_server_update_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vm_server_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `py_vir_serve_followups`
--

INSERT INTO `py_vir_serve_followups` (`id`, `vm_server_token`, `vm_server_name`, `vm_server_update_user_id`, `vm_server_update_user`, `vm_server_status`, `created_at`, `updated_at`) VALUES
(1, '1912', 'TCS Server', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(2, '1912', 'IT Workflow', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(3, '1912', 'VDS', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 06:10:39', '2020-10-24 06:10:39'),
(4, '85998', 'hgfg', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 06:12:06', '2020-10-24 06:12:06'),
(5, '63189', 'cb', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 06:13:32', '2020-10-24 06:13:32'),
(6, '63189', 'cb', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 06:14:54', '2020-10-24 06:14:54'),
(7, '85998', 'vdsc', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 06:17:28', '2020-10-24 06:17:28'),
(8, '17064', 'sdc', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 06:18:27', '2020-10-24 06:18:27'),
(9, '17064', 'aa', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 06:18:48', '2020-10-24 06:18:48'),
(10, '1912', 'VDS', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 10:42:29', '2020-10-24 10:42:29'),
(11, '85998', 'hgfg', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 10:43:07', '2020-10-24 10:43:07'),
(12, '85998', 'bbdfg', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 10:43:21', '2020-10-24 10:43:21'),
(13, '85998', 'bbdfg', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 10:43:25', '2020-10-24 10:43:25'),
(14, '1912', 'gef', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 10:46:12', '2020-10-24 10:46:12'),
(15, '1912', 'dfvsd', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 10:46:25', '2020-10-24 10:46:25'),
(16, '1912', 'dfvsd', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 10:46:27', '2020-10-24 10:46:27'),
(17, '12939', 'fwaf', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 21:50:09', '2020-10-24 21:50:09'),
(18, '1912', 'dfvd', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 21:51:15', '2020-10-24 21:51:15'),
(19, '12939', 'vdsfd', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 21:52:28', '2020-10-24 21:52:28'),
(20, '12939', 'fwaf', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 21:52:36', '2020-10-24 21:52:36'),
(21, '9477', 'fds', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:17:36', '2020-10-24 23:17:36'),
(22, '23424', 'fdg', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:18:35', '2020-10-24 23:18:35'),
(23, '23424', 'bdfv', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:23:53', '2020-10-24 23:23:53'),
(24, '23424', 'fvdsf', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:27:49', '2020-10-24 23:27:49'),
(25, '23424', 'vc cv', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:34:18', '2020-10-24 23:34:18'),
(26, '1912', 'dvxcv', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:35:19', '2020-10-24 23:35:19'),
(27, '1912', 'vvd', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:35:51', '2020-10-24 23:35:51'),
(28, '1912', 'vvd', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 23:36:02', '2020-10-24 23:36:02'),
(29, '1912', 'TCS Server', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 23:36:03', '2020-10-24 23:36:03'),
(30, '1912', 'gef', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 23:36:04', '2020-10-24 23:36:04'),
(31, '1912', 'VDS', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 23:36:06', '2020-10-24 23:36:06'),
(32, '63189', 'dvcxv', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:37:51', '2020-10-24 23:37:51'),
(33, '63189', 'fdsfds', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:38:10', '2020-10-24 23:38:10'),
(34, '63189', 'dvd', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:38:29', '2020-10-24 23:38:29'),
(35, '63189', 'gaesf', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 23:38:35', '2020-10-24 23:38:35'),
(36, '63189', 'fsad', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 23:38:36', '2020-10-24 23:38:36'),
(37, '63189', 'cb', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 23:38:38', '2020-10-24 23:38:38'),
(38, '63189', 'cb', '1', 'Nuwan Athukorala', 'Remove', '2020-10-24 23:38:40', '2020-10-24 23:38:40'),
(39, '63189', 'grgwe', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:38:54', '2020-10-24 23:38:54'),
(40, '63189', 'vdscf', '1', 'Nuwan Athukorala', 'Update', '2020-10-24 23:39:29', '2020-10-24 23:39:29'),
(41, '63189', 'vdscf', '1', 'Nuwan Athukorala', 'Remove', '2020-10-25 04:05:24', '2020-10-25 04:05:24'),
(42, '29505', 'User Backup – Life', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(43, '29505', 'User Backup – General', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(44, '29505', 'sdasd', '1', 'Nuwan Athukorala', 'Update', '2020-11-01 10:23:24', '2020-11-01 10:23:24'),
(45, '83619', 'dsfcs', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(46, '60173', 'vsefcsf', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(47, '8737', 'User Backup – Life', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(48, '8737', 'User Backup – General', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(49, '89314', 'User Backup – Life', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(50, '89314', 'User Backup – General', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(51, '64413', 'User Backup – Life', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(52, '64413', 'User Backup – General', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(53, '68299', 'Win server 2012 R2', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(54, '68299', 'User Backup – General', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(55, '1912', 'TCS Server', '1', 'Nuwan Athukorala', 'Remove', '2020-11-25 13:12:03', '2020-11-25 13:12:03'),
(56, '1912', 'TCS Server', '1', 'Nuwan Athukorala', 'Remove', '2020-11-25 13:13:57', '2020-11-25 13:13:57'),
(57, '39613', 'gdsd', '1', 'Nuwan Athukorala', 'Create', NULL, NULL),
(58, '83619', 'dsfcs', '1', 'Nuwan Athukorala', 'Remove', '2020-12-10 12:10:44', '2020-12-10 12:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `serverdetails`
--

CREATE TABLE `serverdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Physial_or_Virtual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availble_vm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `virtual_serv_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Serial_No` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Asset_No` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serv_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Purchase_year` date NOT NULL,
  `Rack_No` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rack_unit_No` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_and_modal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vir_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vir_ipadd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vir_os` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Applications` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vir_application` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Created_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power_status` tinyint(1) NOT NULL DEFAULT 1,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serverdetails`
--

INSERT INTO `serverdetails` (`id`, `Physial_or_Virtual`, `availble_vm`, `virtual_serv_token`, `Serial_No`, `Asset_No`, `serv_location`, `Purchase_year`, `Rack_No`, `Rack_unit_No`, `product_and_modal`, `vir_name`, `ip_address`, `vir_ipadd`, `OS`, `vir_os`, `Applications`, `vir_application`, `Created_user_id`, `Created_by`, `power_status`, `Status`, `created_at`, `updated_at`) VALUES
(7, 'Virtual', 'Yes', '85770', 'vsdzf66', '33444', '', '2020-10-18', '5', '4', 'hp', '', '10.109.1.74', '', 'Windows', '', '|TCS', '', '1', 'Nuwan Athukorala', 1, 0, '2020-10-18 05:51:36', '2020-10-24 12:09:33'),
(8, 'Physical', 'Yes', '12568', 'vsdzf66', '33444', '', '2020-10-18', '5', '4', 'hp', '', '10.109.1.74', '', 'Windows', '', '|TCS', '', '1', 'Nuwan Athukorala', 1, 0, '2020-10-18 06:49:12', '2020-10-25 02:23:56'),
(9, 'Physical', 'Yes', '15625', 'vsdzf66', '98090', '', '2020-10-18', '6', '5', 'HP', '', '10.221.159.78', '', 'Windows', '', '|tcs|main', '', '1', 'Nuwan Athukorala', 1, 1, '2020-10-18 06:55:55', '2020-10-18 06:55:55'),
(10, 'Physical', 'Yes', '17064', 'vvdvf', '5665', '', '2020-10-18', '4', '6', 'bdv', '', '10.109.1.74', '', 'Windows', '', '|tsc', '', '1', 'Nuwan Athukorala', 1, 1, '2020-10-18 07:08:56', '2020-10-18 07:08:56'),
(11, 'Physical', 'Yes', '12939', 'gefwedse', 'fswsad', '', '2020-10-08', '5', '6', 'dfgd', '', '10.221.159.221', '', 'gred', '', '|gdfd|sdfs', '', '1', 'Nuwan Athukorala', 1, 0, '2020-10-18 07:11:19', '2020-12-10 12:12:21'),
(12, 'Physical', 'Yes', '63189', 'vsdzf', '6554', '', '2020-10-18', '4', '6', 'bdv', '', '10.109.3.131', '', 'gred', '', '|jjgfhfgh|hrdgdf', '', '1', 'Nuwan Athukorala', 1, 1, '2020-10-18 07:15:05', '2020-10-18 07:15:05'),
(13, 'Virtual', 'No', '', '', '', '', '2020-10-18', '', '', '', 'TCS Server', '', '10.100.4.5', '', 'Windows', '', '|app|non app', '1', 'Nuwan Athukorala', 1, 0, '2020-10-18 10:39:05', '2020-10-24 12:09:43'),
(14, 'Virtual', 'No', '', '', '', '', '2020-10-18', '', '', '', 'TCS Server', '', '10.100.4.5', '', 'Windows', '', '|app|non app', '1', 'Nuwan Athukorala', 1, 0, '2020-10-18 10:39:34', '2020-10-24 12:09:38'),
(15, 'Physical', 'Yes', '85998', 'vsdzf66gg', '3222', '', '2020-10-24', '4', '6', 'bdv', '', '10.109.3.123', '', 'Windows', '', '|tcs', '', '1', 'Nuwan Athukorala', 1, 0, '2020-10-18 12:19:25', '2020-10-24 12:04:49'),
(16, 'Physical', 'Yes', '1912', 'vsdzf66', '65543', '', '2020-10-24', '4', '9', 'HP', '', '192.168.12.1', '', 'Windows', '', 'One UI|TCS', '', '1', 'Nuwan Athukorala', 1, 1, '2020-10-24 05:46:43', '2020-11-25 12:57:46'),
(17, 'Physical', 'Yes', '23424', 'vsdzf', '43322', '', '2020-10-25', '4', '7', 'HP', '', '10.109.3.131', '', 'Windows', '', 'TCS|workflow', '', '1', 'Nuwan Athukorala', 1, 0, '2020-10-24 22:14:42', '2020-12-10 11:49:03'),
(18, 'Physical', 'No', '', 'vsdzf66', 'vsdf', '', '2020-11-01', '4', '7', 'HP DL320 G8 V2', '', '10.221.159.78', '', 'Linux 5.8', '', 'linu', '', '1', 'Nuwan Athukorala', 1, 1, '2020-11-01 10:11:00', '2020-11-01 10:11:00'),
(19, 'Physical', 'No', '', 'CN711907BCE', '18508', '', '2020-10-01', 'RACK 0001', '20', 'DL320 G8 V2', '', '192.168.10.58', '', 'Linux 5.8', '', 'Takaful App', '', '1', 'Nuwan Athukorala', 1, 1, '2020-11-01 10:14:03', '2020-11-01 10:14:03'),
(20, 'Physical', 'Yes', '29505', 'CN711907BC', '18472', '', '2020-11-01', 'R001', '29', 'HP DL 160 G6', '', '192.168.192.79', '', 'Windows 2012-R2 standard', '', 'User Backup – Life|User Backup – General', '', '1', 'Nuwan Athukorala', 1, 0, '2020-11-01 10:20:31', '2020-11-01 10:52:12'),
(21, 'Physical', 'Yes', '83619', 'vsdzf', '185083', '', '2020-11-01', 'RACK 0001', '7', 'HP DL320 G8 V2', '', '10.109.1.74', '', 'Linux 5.8', '', 'wwwwww|ssssss', '', '1', 'Nuwan Athukorala', 1, 0, '2020-11-01 10:25:36', '2020-12-10 12:11:59'),
(22, 'Physical', 'Yes', '60173', 'vsdzf66222', '18508554', '', '2020-11-01', '4', '6', 'bdv', '', '192.168.10.58', '', 'Windows', '', 'sssss|fffff', '', '1', 'Nuwan Athukorala', 0, 0, '2020-11-01 10:51:14', '2020-12-10 11:27:31'),
(23, 'Physical', 'Yes', '68299', 'CN711907BC', '18472', '', '2020-10-01', 'RACK 0001', '29', 'HP DL320 G8 V2', '', '192.168.192.79', '', 'Windows 2012-R2 standard', '', 'User Backup – Life', '', '1', 'Nuwan Athukorala', 1, 0, '2020-11-01 11:07:10', '2020-12-10 11:25:22'),
(24, 'NAS', 'No', '', 'vsdzf66', '4432', 'DR Site', '2020-11-25', 'hbxfgx4', '5', 'bsdfv', '', '10.221.159.78', '', '', '', '', '', '1', 'Nuwan Athukorala', 1, 1, '2020-11-25 13:56:06', '2020-12-07 21:10:32'),
(25, 'Switch', 'No', '', 'CN711907BCE43', '5453', '', '2020-11-25', 'RACK 00015', '5', '6543g', '', '', '', '', '', '', '', '1', 'Nuwan Athukorala', 1, 1, '2020-11-25 14:00:30', '2020-11-25 14:00:30'),
(26, 'Physical', 'Yes', '39613', 'vsfasd', '34534', '', '2020-12-07', 'gt44', '453', 'fdfsd', '', 'sdgsf', '', 'sds', '', 'gess|dsgsf', '', '1', 'Nuwan Athukorala', 1, 1, '2020-12-07 12:58:54', '2020-12-10 10:33:23'),
(27, 'Physical', 'No', '', 'bdgdrg', 'grgert', 'DR Site', '2020-12-08', 'bdfg', 'gge', 'grge', '', 'gert', '', 'gegeg', '', 'bfdbgd', '', '1', 'Nuwan Athukorala', 1, 1, '2020-12-07 21:02:53', '2020-12-07 21:02:53'),
(28, 'Physical', 'No', '', 'dfvds', '43322', 'DR Site', '2020-12-10', 'vdfvds', 'dsgsdf', 'bdvds', '', 'dbsg', '', 'bdsgsd', '', 'dsdssg', '', '1', 'Nuwan Athukorala', 1, 1, '2020-12-10 11:51:46', '2020-12-10 11:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `epf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `premission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `epf`, `fname`, `lname`, `name`, `username`, `email`, `email_verified_at`, `password`, `premission`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2829', 'Nuwan', 'Athukorala', 'Nuwan Athukorala', 'Nuwan.Athukorala', 'nuwan.athukorala@hnbassurance.com', NULL, '$2y$10$8eeFcSaAsajZKCvHAGynkepzGA2Soq8w3tiXBSwu7J4zliRpIpOFW', '1', 1, NULL, NULL, NULL),
(2, '2830', 'Damith', 'Maduranga', 'Damith Maduranga', 'Damith.Maduranga', 'damith.maduranga@hnbassurance.com', NULL, '$2y$10$94xiTnPJvA878eF93phoq.lViOlHEjBs9LdjY4TvjVBaSzNSf03N6', '2', 1, NULL, '2020-10-25 03:03:27', '2020-10-25 03:23:23'),
(3, '2831', 'Sampath', 'Kariyawasam', 'Sampath Kariyawasam', 'Sampath.Kariyawasam', 'samantha.hemakumara@hnbassurance.com', NULL, '$2y$10$kEBDdRcEdoPCb1WuAe7wEes2XxBWlF7QBgfFSyi./dY6QfL2B9a.W', '2', 1, NULL, '2020-10-25 03:24:41', '2020-10-25 03:24:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followups`
--
ALTER TABLE `followups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `py_vir_server_tables`
--
ALTER TABLE `py_vir_server_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `py_vir_serve_followups`
--
ALTER TABLE `py_vir_serve_followups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serverdetails`
--
ALTER TABLE `serverdetails`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followups`
--
ALTER TABLE `followups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `py_vir_server_tables`
--
ALTER TABLE `py_vir_server_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `py_vir_serve_followups`
--
ALTER TABLE `py_vir_serve_followups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `serverdetails`
--
ALTER TABLE `serverdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
