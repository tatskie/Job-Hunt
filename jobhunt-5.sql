-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2018 at 04:09 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobhunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `job`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'housemaid', 9, '2018-02-13 16:00:00', '2018-02-13 16:00:00', NULL),
(2, 'carpenter', 9, '2018-02-13 16:00:00', '2018-02-13 16:00:00', NULL),
(3, 'labor', 9, '2018-02-13 16:00:00', '2018-02-13 16:00:00', NULL),
(4, 'construction worker', 9, '2018-02-13 16:00:00', '2018-02-13 16:00:00', NULL),
(5, 'painter', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 'operator', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 'driver', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 'agent', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 'contractor', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 'barbero', 4, '2018-02-21 11:02:26', '2018-02-21 11:02:26', NULL),
(11, 'pilot', 4, '2018-02-22 08:22:08', '2018-02-22 08:22:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `city`, `address`, `country`, `postal`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trans-Asia Shipping Lines, Inc.', 'Cebu City', 'MJ Cuenco Ave. corner Osmeña Blvd', 'philippines', '6000', 9, '2018-02-13 22:44:47', '2018-02-13 22:44:47', NULL),
(4, 'Colorsteel Systems Corporation', 'Cebu', 'Cebu City', 'philippines', '6000', 11, '2018-02-15 18:37:18', '2018-02-15 22:57:54', NULL),
(5, 'company name', 'manila', 'manila city', 'phillipines', '6000', 29, '2018-02-22 08:40:25', '2018-02-22 08:40:25', NULL),
(7, 'resource hiring agency', 'banilad', 'banilad cebu', 'phillipines', '6000', 6, '2018-02-27 05:31:52', '2018-02-27 05:31:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(10) UNSIGNED NOT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_start` year(4) NOT NULL,
  `year_end` year(4) DEFAULT NULL,
  `graduated` tinyint(1) NOT NULL DEFAULT '0',
  `discription` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `school`, `course`, `address`, `year_start`, `year_end`, `graduated`, `discription`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'st. cecilia\'s college', 'Bachelor of Science in Information Technology', NULL, 2012, 2017, 1, 'Tertiary', 7, '2018-02-06 08:04:15', '2018-02-12 22:48:07', '2018-02-12 22:48:07'),
(2, 'Maghaway National High School', NULL, NULL, 2002, 2006, 1, 'Secondary', 7, '2018-02-12 22:14:47', '2018-02-12 22:48:04', '2018-02-12 22:48:04'),
(3, 'Maghaway Elementary School', NULL, NULL, 1996, 2002, 1, 'Primary', 7, '2018-02-12 22:15:20', '2018-02-12 22:48:01', '2018-02-12 22:48:01'),
(4, 'St. Cecilia\'s College Cebu', 'Troubleshooting NCII', NULL, 2007, 2007, 1, 'Vocational', 7, '2018-02-12 22:16:07', '2018-02-12 22:47:57', '2018-02-12 22:47:57'),
(8, 'St. Cecilia\'s College Cebu', 'bachelor in science in information technology', 'minglanilla, cebu', 2004, 2017, 1, 'Tertiary', 7, '2018-02-12 22:49:04', '2018-02-13 16:16:20', NULL),
(9, 'asdasd', NULL, NULL, 2004, 2006, 1, 'Primary', 7, '2018-02-12 23:07:58', '2018-02-12 23:20:19', '2018-02-12 23:20:19'),
(10, 'asdas', NULL, NULL, 2002, 2006, 0, 'Primary', 7, '2018-02-12 23:15:39', '2018-02-12 23:20:22', '2018-02-12 23:20:22'),
(11, 'asd', NULL, NULL, 2002, 2006, 0, 'Primary', 7, '2018-02-12 23:20:39', '2018-02-12 23:29:57', '2018-02-12 23:29:57'),
(12, 'asd', NULL, NULL, 2002, 2006, 0, 'Primary', 7, '2018-02-13 03:58:15', '2018-02-13 04:04:21', '2018-02-13 04:04:21'),
(13, 'asdasd', NULL, NULL, 2002, 2006, 0, 'Primary', 7, '2018-02-13 04:00:59', '2018-02-13 04:04:46', '2018-02-13 04:04:46'),
(14, 'asdas', NULL, NULL, 2002, 2006, 0, 'Primary', 7, '2018-02-13 04:02:36', '2018-02-13 04:04:11', '2018-02-13 04:04:11'),
(15, 'asdas', NULL, NULL, 2002, 2002, 0, 'Primary', 7, '2018-02-13 04:04:30', '2018-02-13 04:04:50', '2018-02-13 04:04:50'),
(16, 'Asd edited', NULL, NULL, 2002, 2006, 0, 'Primary', 7, '2018-02-13 04:04:57', '2018-02-13 04:05:12', '2018-02-13 04:05:12'),
(17, 'Qwe', 'wqeqweqwe', NULL, 2002, 2006, 0, 'Tertiary', 7, '2018-02-13 05:46:05', '2018-02-13 05:59:47', '2018-02-13 05:59:47'),
(18, 'Asdasd', 'bachelor in science in information technology', NULL, 2002, 2006, 0, 'Associate', 7, '2018-02-13 06:01:08', '2018-02-13 06:02:10', '2018-02-13 06:02:10'),
(19, 'Maghaway Elementary School', NULL, 'maghaway, talisay city', 1996, 2001, 1, 'Primary', 7, '2018-02-13 16:06:48', '2018-02-13 16:16:32', NULL),
(20, 'Maghaway National High School', NULL, 'maghaway, talisay city', 2001, 2005, 1, 'Secondary', 7, '2018-02-13 16:07:15', '2018-02-13 16:16:38', NULL),
(21, 'asd', NULL, 'sad', 2002, 2006, 1, 'Primary', 7, '2018-02-13 16:15:54', '2018-02-13 16:15:59', '2018-02-13 16:15:59'),
(22, 'maghaway elementary school', NULL, 'maghaway talisay city cebu', 1996, 2002, 1, 'Primary', 26, '2018-02-22 08:24:20', '2018-02-22 08:24:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobcategories`
--

CREATE TABLE `jobcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `discription` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobcategories`
--

INSERT INTO `jobcategories` (`id`, `discription`, `user_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Carpenters construct and repair building frameworks and structures—such as stairways, doorframes, partitions, and rafters—made from wood and other materials. They also may install kitchen cabinets, siding, and drywall.', 7, 2, '2018-02-13 20:40:27', '2018-02-13 20:50:55', '2018-02-13 20:50:55'),
(2, 'Carpenters Construct And Repair Building Frameworks And Structures—such As Stairways, Doorframes, Partitions, And Rafters—made From Wood And Other Materials. They Also May Install Kitchen Cabinets, Siding, And Drywall.', 7, 2, '2018-02-13 20:51:18', '2018-02-13 20:51:46', '2018-02-13 20:51:46'),
(3, '<button type=\"button\" class=\"create-modal btn btn-primary pull-left btn-sm\" data-target=\"#category\" data-toggle=\"modal\">Update Job Category</button>', 7, 2, '2018-02-13 20:52:56', '2018-02-13 20:53:08', '2018-02-13 20:53:08'),
(4, 'Carpenters construct and repair building frameworks and structures—such as stairways, doorframes, partitions, and rafters—made from wood and other materials. They also may install kitchen cabinets, siding, and drywall.', 7, 2, '2018-02-13 20:53:26', '2018-02-13 20:54:38', '2018-02-13 20:54:38'),
(5, 'Carpenters construct and repair building frameworks and structures—such as stairways, doorframes, partitions, and rafters—made from wood and other materials. They also may install kitchen cabinets, siding, and drywall.', 7, 1, '2018-02-13 20:56:09', '2018-02-13 20:56:29', '2018-02-13 20:56:29'),
(6, 'Carpenters construct and repair building frameworks and structures—such as stairways, doorframes, partitions, and rafters—made from wood and other materials. They also may install kitchen cabinets, siding, and drywall.', 7, 1, '2018-02-13 20:56:14', '2018-02-13 20:56:37', '2018-02-13 20:56:37'),
(7, 'jobs', 7, 1, '2018-02-13 20:57:46', '2018-02-13 20:57:55', '2018-02-13 20:57:55'),
(8, 'jobs', 7, 1, '2018-02-13 20:57:49', '2018-02-13 20:58:06', '2018-02-13 20:58:06'),
(9, 'Carpenters construct and repair building frameworks and structures—such as stairways, doorframes, partitions, and rafters—made from wood and other materials. They also may install kitchen cabinets, siding, and drywall.e', 7, 2, '2018-02-13 20:58:11', '2018-02-13 22:18:08', NULL),
(10, 'something', 26, 6, '2018-02-22 08:22:32', '2018-02-22 08:22:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `employer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `employee_id`, `employer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hello please come to my office', 7, 11, '2018-02-23 08:13:44', '2018-02-23 08:13:44', NULL),
(3, 'cge po', 7, 11, '2018-02-23 08:28:23', '2018-02-23 08:28:23', NULL),
(4, 'please dont be late 10am...', 7, 11, '2018-02-23 08:28:51', '2018-02-23 08:28:51', NULL),
(5, 'okies', 7, 11, '2018-02-23 08:29:03', '2018-02-23 08:29:03', NULL),
(6, 'ok', 7, 11, '2018-02-23 08:43:51', '2018-02-23 08:43:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_06_154455_create_skills_table', 2),
(4, '2018_02_06_155840_create_educations_table', 3),
(5, '2018_02_06_160742_create_works_table', 4),
(6, '2018_02_14_034502_create_categories_table', 5),
(8, '2018_02_14_034529_create_jobcategories_table', 6),
(9, '2018_02_14_063243_create_companies_table', 7),
(12, '2018_02_14_063652_create_posts_table', 8),
(14, '2016_01_01_000000_add_voyager_user_fields', 9),
(15, '2016_01_01_000000_create_data_types_table', 9),
(16, '2016_01_01_000000_create_pages_table', 9),
(26, '2018_02_14_080558_add_slug_to_posts', 10),
(27, '2018_02_21_030123_create_replies_table', 10),
(28, '2018_02_21_061554_create_messages_table', 10),
(29, '2018_02_21_070940_create_notifications_table', 11),
(30, '2018_02_21_174818_create_permission_tables', 12),
(31, '2018_02_27_150555_create_ratings_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 4, 'App\\User'),
(1, 30, 'App\\User'),
(1, 32, 'App\\User'),
(1, 34, 'App\\User'),
(1, 35, 'App\\User'),
(1, 36, 'App\\User'),
(1, 37, 'App\\User'),
(1, 38, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `click` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `click`, `created_at`, `updated_at`) VALUES
('01a484c4-6b90-4065-9f85-c0642f6bb9ec', 'App\\Notifications\\RepliedToApplication', 11, 'App\\User', '{\"message\":{\"employer_id\":\"11\",\"employee_id\":\"7\",\"message\":\"cge po\",\"updated_at\":\"2018-02-23 16:28:23\",\"created_at\":\"2018-02-23 16:28:23\",\"id\":3,\"employer\":{\"id\":11,\"role_id\":null,\"first_name\":\"kall\",\"last_name\":\"siti\",\"middle_initial\":\"d\",\"date_of_birth\":\"1979-08-30\",\"contact\":\"092343593812\",\"address\":\"talisay\",\"city\":\"city\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"11_1519194724.jpg\",\"email\":\"allan.baruiz@ok.com\",\"provider\":null,\"provider_id\":null,\"verified\":\"1\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-02-14 05:49:02\",\"updated_at\":\"2018-02-22 06:43:33\",\"deleted_at\":null}},\"user\":{\"id\":7,\"role_id\":null,\"first_name\":\"kintal\",\"last_name\":\"huwng\",\"middle_initial\":\"si\",\"date_of_birth\":\"1990-08-03\",\"contact\":\"09234359381\",\"address\":\"maghaway\",\"city\":\"talisay\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"7_1518531498.jpg\",\"email\":\"allan.baruiz@pandotech.io\",\"provider\":null,\"provider_id\":null,\"verified\":\"0\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-01-31 05:35:20\",\"updated_at\":\"2018-02-14 06:18:56\",\"deleted_at\":null}}', '2018-02-23 08:28:27', 0, '2018-02-23 08:28:23', '2018-02-23 08:28:27'),
('221cb6dd-4f5b-46d2-b6ee-56fa0b4cebe6', 'App\\Notifications\\RepliedToApplication', 11, 'App\\User', '{\"message\":{\"employer_id\":\"11\",\"employee_id\":\"7\",\"message\":\"ok\",\"updated_at\":\"2018-02-23 16:43:51\",\"created_at\":\"2018-02-23 16:43:51\",\"id\":6,\"employer\":{\"id\":11,\"role_id\":null,\"first_name\":\"kall\",\"last_name\":\"siti\",\"middle_initial\":\"d\",\"date_of_birth\":\"1979-08-30\",\"contact\":\"092343593812\",\"address\":\"talisay\",\"city\":\"city\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"11_1519194724.jpg\",\"email\":\"allan.baruiz@ok.com\",\"provider\":null,\"provider_id\":null,\"verified\":\"1\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-02-14 05:49:02\",\"updated_at\":\"2018-02-22 06:43:33\",\"deleted_at\":null}},\"user\":{\"id\":7,\"role_id\":null,\"first_name\":\"kintal\",\"last_name\":\"huwng\",\"middle_initial\":\"si\",\"date_of_birth\":\"1990-08-03\",\"contact\":\"09234359381\",\"address\":\"maghaway\",\"city\":\"talisay\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"7_1518531498.jpg\",\"email\":\"allan.baruiz@pandotech.io\",\"provider\":null,\"provider_id\":null,\"verified\":\"0\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-01-31 05:35:20\",\"updated_at\":\"2018-02-14 06:18:56\",\"deleted_at\":null}}', '2018-02-23 08:43:59', 0, '2018-02-23 08:43:51', '2018-02-23 08:43:59'),
('3c077d35-99f2-47a0-8a81-babd300555f3', 'App\\Notifications\\RepliedToThread', 11, 'App\\User', '{\"post\":{\"id\":8,\"title\":\"Company Driver\",\"slug\":\"company-driver\",\"job\":\"<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\"><strong>HANATOUR CEBU INC.<\\/strong><\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">&nbsp;<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">Is looking for:<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">&nbsp;<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\"><strong>COMPANY&nbsp;<span class=\\\"highlight\\\" style=\\\"background-color: #ffffcc;\\\">DRIVER<\\/span><\\/strong><\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">&nbsp;<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">Qualifications Candidate must be:<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">\\r\\n<ul>\\r\\n<li>At least a High School Diploma or Vocational Course<\\/li>\\r\\n<li>At least 1 Year(s) of working experience in driving particularly<\\/li>\\r\\n<li>Must be in Good Moral Character and NO criminal records<\\/li>\\r\\n<li>Hardworking, trustworthy &amp; dependable<\\/li>\\r\\n<li>Organized and can handle multiple demands<\\/li>\\r\\n<li>Display effective multi-tasking and time management skills<\\/li>\\r\\n<li>Knowledgeable about latest motor vehicle laws and relevant regulations<\\/li>\\r\\n<li>Knowledgeable about safety measures to ensure the safety of the passengers<\\/li>\\r\\n<\\/ul>\\r\\n<\\/div>\",\"contact\":\"Interested applicants may email your Application Letter and Resume w\\/ picture to: hanatour_cebuinc@yahoo.com\\r\\n \\r\\nFor more Information please call: 236-4287 \\/ 236-4292\\r\\n \\r\\nLook for: Jeannette C. Caballero or Racquelyn Aton (Admin Assistant\\/HR)\",\"salary\":13000,\"city\":\"Cebu City\",\"company_id\":4,\"category_id\":1,\"user_id\":11,\"created_at\":\"2018-02-22 14:03:08\",\"updated_at\":\"2018-02-22 14:03:08\",\"deleted_at\":null,\"user\":{\"id\":11,\"role_id\":null,\"first_name\":\"kall\",\"last_name\":\"siti\",\"middle_initial\":\"d\",\"date_of_birth\":\"1979-08-30\",\"contact\":\"092343593812\",\"address\":\"talisay\",\"city\":\"city\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"11_1519194724.jpg\",\"email\":\"allan.baruiz@ok.com\",\"provider\":null,\"provider_id\":null,\"verified\":\"1\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-02-14 05:49:02\",\"updated_at\":\"2018-02-22 06:43:33\",\"deleted_at\":null}},\"user\":{\"id\":7,\"role_id\":null,\"first_name\":\"kintal\",\"last_name\":\"huwng\",\"middle_initial\":\"si\",\"date_of_birth\":\"1990-08-03\",\"contact\":\"09234359381\",\"address\":\"maghaway\",\"city\":\"talisay\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"7_1518531498.jpg\",\"email\":\"allan.baruiz@pandotech.io\",\"provider\":null,\"provider_id\":null,\"verified\":\"0\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-01-31 05:35:20\",\"updated_at\":\"2018-02-14 06:18:56\",\"deleted_at\":null}}', '2018-02-23 08:19:30', 0, '2018-02-23 08:13:05', '2018-02-23 08:19:30'),
('4e5d0512-220d-4b91-94a2-fcadffb912f7', 'App\\Notifications\\RepliedToThread', 11, 'App\\User', '{\"post\":{\"id\":8,\"title\":\"Company Driver\",\"slug\":\"company-driver\",\"job\":\"<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\"><strong>HANATOUR CEBU INC.<\\/strong><\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">&nbsp;<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">Is looking for:<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">&nbsp;<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\"><strong>COMPANY&nbsp;<span class=\\\"highlight\\\" style=\\\"background-color: #ffffcc;\\\">DRIVER<\\/span><\\/strong><\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">&nbsp;<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">Qualifications Candidate must be:<\\/div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif; font-size: small;\\\">\\r\\n<ul>\\r\\n<li>At least a High School Diploma or Vocational Course<\\/li>\\r\\n<li>At least 1 Year(s) of working experience in driving particularly<\\/li>\\r\\n<li>Must be in Good Moral Character and NO criminal records<\\/li>\\r\\n<li>Hardworking, trustworthy &amp; dependable<\\/li>\\r\\n<li>Organized and can handle multiple demands<\\/li>\\r\\n<li>Display effective multi-tasking and time management skills<\\/li>\\r\\n<li>Knowledgeable about latest motor vehicle laws and relevant regulations<\\/li>\\r\\n<li>Knowledgeable about safety measures to ensure the safety of the passengers<\\/li>\\r\\n<\\/ul>\\r\\n<\\/div>\",\"contact\":\"Interested applicants may email your Application Letter and Resume w\\/ picture to: hanatour_cebuinc@yahoo.com\\r\\n \\r\\nFor more Information please call: 236-4287 \\/ 236-4292\\r\\n \\r\\nLook for: Jeannette C. Caballero or Racquelyn Aton (Admin Assistant\\/HR)\",\"salary\":13000,\"city\":\"Cebu City\",\"company_id\":4,\"category_id\":1,\"user_id\":11,\"created_at\":\"2018-02-22 14:03:08\",\"updated_at\":\"2018-02-28 06:19:16\",\"deleted_at\":null,\"user\":{\"id\":11,\"role_id\":null,\"first_name\":\"kall\",\"last_name\":\"siti\",\"middle_initial\":\"d\",\"date_of_birth\":\"1979-08-30\",\"contact\":\"092343593812\",\"address\":\"talisay\",\"city\":\"city\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"11_1519194724.jpg\",\"email\":\"allan.baruiz@ok.com\",\"provider\":null,\"provider_id\":null,\"verified\":\"1\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-02-14 05:49:02\",\"updated_at\":\"2018-02-22 06:43:33\",\"deleted_at\":null}},\"user\":{\"id\":7,\"role_id\":null,\"first_name\":\"kintal\",\"last_name\":\"huwng\",\"middle_initial\":\"si\",\"date_of_birth\":\"1990-08-03\",\"contact\":\"09234359381\",\"address\":\"maghaway\",\"city\":\"talisay\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"7_1518531498.jpg\",\"email\":\"allan.baruiz@pandotech.io\",\"provider\":null,\"provider_id\":null,\"verified\":\"0\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-01-31 05:35:20\",\"updated_at\":\"2018-02-14 06:18:56\",\"deleted_at\":null}}', '2018-02-28 18:35:38', 0, '2018-02-28 18:35:32', '2018-02-28 18:35:38'),
('7da8b644-ac91-4564-a91f-b50d88eadaa3', 'App\\Notifications\\RepliedToApplication', 7, 'App\\User', '{\"message\":{\"employee_id\":\"7\",\"employer_id\":\"11\",\"message\":\"please dont be late 10am...\",\"updated_at\":\"2018-02-23 16:28:51\",\"created_at\":\"2018-02-23 16:28:51\",\"id\":4,\"employee\":{\"id\":7,\"role_id\":null,\"first_name\":\"kintal\",\"last_name\":\"huwng\",\"middle_initial\":\"si\",\"date_of_birth\":\"1990-08-03\",\"contact\":\"09234359381\",\"address\":\"maghaway\",\"city\":\"talisay\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"7_1518531498.jpg\",\"email\":\"allan.baruiz@pandotech.io\",\"provider\":null,\"provider_id\":null,\"verified\":\"0\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-01-31 05:35:20\",\"updated_at\":\"2018-02-14 06:18:56\",\"deleted_at\":null}},\"user\":{\"id\":11,\"role_id\":null,\"first_name\":\"kall\",\"last_name\":\"siti\",\"middle_initial\":\"d\",\"date_of_birth\":\"1979-08-30\",\"contact\":\"092343593812\",\"address\":\"talisay\",\"city\":\"city\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"11_1519194724.jpg\",\"email\":\"allan.baruiz@ok.com\",\"provider\":null,\"provider_id\":null,\"verified\":\"1\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-02-14 05:49:02\",\"updated_at\":\"2018-02-22 06:43:33\",\"deleted_at\":null}}', '2018-02-23 08:28:55', 0, '2018-02-23 08:28:51', '2018-02-23 08:28:55'),
('a7d5919f-4e33-40a1-8506-46df1e1ca7a5', 'App\\Notifications\\RepliedToApplication', 11, 'App\\User', '{\"message\":{\"employer_id\":\"11\",\"employee_id\":\"7\",\"message\":\"okies\",\"updated_at\":\"2018-02-23 16:29:03\",\"created_at\":\"2018-02-23 16:29:03\",\"id\":5,\"employer\":{\"id\":11,\"role_id\":null,\"first_name\":\"kall\",\"last_name\":\"siti\",\"middle_initial\":\"d\",\"date_of_birth\":\"1979-08-30\",\"contact\":\"092343593812\",\"address\":\"talisay\",\"city\":\"city\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"11_1519194724.jpg\",\"email\":\"allan.baruiz@ok.com\",\"provider\":null,\"provider_id\":null,\"verified\":\"1\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-02-14 05:49:02\",\"updated_at\":\"2018-02-22 06:43:33\",\"deleted_at\":null}},\"user\":{\"id\":7,\"role_id\":null,\"first_name\":\"kintal\",\"last_name\":\"huwng\",\"middle_initial\":\"si\",\"date_of_birth\":\"1990-08-03\",\"contact\":\"09234359381\",\"address\":\"maghaway\",\"city\":\"talisay\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"7_1518531498.jpg\",\"email\":\"allan.baruiz@pandotech.io\",\"provider\":null,\"provider_id\":null,\"verified\":\"0\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-01-31 05:35:20\",\"updated_at\":\"2018-02-14 06:18:56\",\"deleted_at\":null}}', '2018-02-23 08:38:26', 0, '2018-02-23 08:29:03', '2018-02-23 08:38:26'),
('cfc069a6-46cc-4fb6-a2f5-636a8a73f09e', 'App\\Notifications\\RepliedToThread', 6, 'App\\User', '{\"post\":{\"id\":10,\"title\":\"ACAS Support Staff\",\"slug\":\"acas-support-staff\",\"job\":\"<div><strong>CEBU<\\/strong><strong>&nbsp;CHAMBER OF COMMERCE AND INDUSTRY, INC.&nbsp;<\\/strong><\\/div>\\r\\n<div>&nbsp;<\\/div>\\r\\n<div>A non-stock, non-profit organization is in need of a dynamic professional to fill in the position of:<\\/div>\\r\\n<div>&nbsp;<\\/div>\\r\\n<div>\\r\\n<div><strong>ACAS SUPPORT STAFF<\\/strong><\\/div>\\r\\n<div>&nbsp;<\\/div>\\r\\n<div>ASSESSMENT, CERTIFICATION AND ACCREDITATION SYSTEM (ACAS) of the Cebu Chamber of Commerce and Industry, Inc. is a sustainability mechanism being&nbsp;<span class=\\\"highlight\\\" style=\\\"background-color: #ffffcc; font-weight: bold;\\\">pilot<\\/span>ed by the K to 12 plus project between the Philippine and German organizations, who commit on a partnership to build a competent workforce for globally competitive business in the Philippines through dualized training education. The Chamber ACAS is a way of response in addressing matching the needs of the industries with a skilled Philippine workforce,<\\/div>\\r\\n<div>&nbsp;<\\/div>\\r\\n<div>I. OBJECTIVE<\\/div>\\r\\n<div>&nbsp;<\\/div>\\r\\n<div>Recruitment of ACAS Support Staff to support the Unit Head during the&nbsp;<span class=\\\"highlight\\\" style=\\\"background-color: #ffffcc; font-weight: bold;\\\">pilot<\\/span>ing and implementation of the Chamber Assessment, Certification and Accreditation System.<\\/div>\\r\\n<div>&nbsp;<\\/div>\\r\\n<div>\\r\\n<div>DUTIES AND RESPONSIBILITIES<\\/div>\\r\\n<div>&nbsp;<\\/div>\\r\\n<div>A. To provide staff support and aide the promotion of Chamber ACAS to different stakeholders such as Member Companies of the Cebu Chamber, Business Membership Organizations, Industry Associations, and Technical Vocational Institutions. The assistance will be particularly needed in the following activities:<\\/div>\\r\\n<ul>\\r\\n<li>Research analysis for potential ACAS Stakeholders and Partners<\\/li>\\r\\n<li>Organization\\/Facilitation and Documentation of Committee Meetings, Industry Cluster Workshops, Focused Group Discussions, Company Visits, and training that engage Industry Participation on the Chamber ACAS<\\/li>\\r\\n<li>Coordination of Industry Cluster activities regarding the K to 12 PLUS Element under the K to 12 PLUS Project]<\\/li>\\r\\n<li>Development, support, and promotion of chamber goals, including message development, social media content creation, and media outreach for ACAS promotion<\\/li>\\r\\n<\\/ul>\\r\\n<div>This will entail but not limited to the following services:<\\/div>\\r\\n<ul>\\r\\n<li>Formulation for memos, emails, reports, and responses to questions and requests for information through incoming calls, emails or fax<\\/li>\\r\\n<li>Send and follow-up meeting invites to ensure full participation of ACAS stakeholders and partners during events<\\/li>\\r\\n<li>Perform administrative responsibilities including taking notes and photo documentation during meetings, preparing correspondence and managing files<\\/li>\\r\\n<\\/ul>\\r\\n<div>B. To support the conduct of Assessment and Certification of Senior High Students and Accreditation of Training Companies, In-company Trainers, and Assessors under the Chamber ACAS<\\/div>\\r\\n<ul>\\r\\n<li>Provide assistance in the execution of Chamber Assessment, Certification, and Accreditation covering events management, reporting and liquidation<\\/li>\\r\\n<li>Provide staff support during the planning, preparation, execution and post-event closure of In-company Trainers Training<\\/li>\\r\\n<\\/ul>\\r\\n<div>C. To maintain files and update fields under the ACAS Databank, as repository of ACAS data, forms, and catalogs<\\/div>\\r\\n<ul>\\r\\n<li>Answer inquiries recorded on the Databank Feedback field<\\/li>\\r\\n<li>Ensure proper naming convention, storing, updating and retrieving of files that are to be uploaded on the ACAS Databank<\\/li>\\r\\n<li>Develop and update information on the ACAS Databank such as Announcements and List of new partners and stakeholders<\\/li>\\r\\n<li>Schedule monthly reports generated through the ACAS Databank for monitoring and reporting purposes<\\/li>\\r\\n<li>Backup files uploaded from the Databank for security and internal purposes<\\/li>\\r\\n<\\/ul>\\r\\n<\\/div>\\r\\n<div>II. DIRECT SUPERVISOR<\\/div>\\r\\n<ul>\\r\\n<li>ACAS Unit Head<\\/li>\\r\\n<\\/ul>\\r\\n<div>\\r\\n<div style=\\\"color: #333333; font-family: arial, sans-serif;\\\">III. JOB SPECIFICATION<\\/div>\\r\\n<ul style=\\\"color: #333333; font-family: arial, sans-serif;\\\">\\r\\n<li>At least a Bachelor\'s degree in Public Relations, Business Administration, Liacom or related field<\\/li>\\r\\n<li>Excellent written and verbal communication skills<\\/li>\\r\\n<li>Knowledge of digital marketing tactics and email marketing<\\/li>\\r\\n<li>Excellent critical thinking skills and the ability to exercise good judgment and solve problems quickly and effectively<\\/li>\\r\\n<li>Excellent in communications strategy development<\\/li>\\r\\n<li>Experience in Events Management<\\/li>\\r\\n<li>Experience working in customer relations preferred<\\/li>\\r\\n<li>Flexible and can do multi-tasking<\\/li>\\r\\n<li>Reporting and analytics experience is a plus<\\/li>\\r\\n<li>Knowledge of the TVET system is preferred<\\/li>\\r\\n<\\/ul>\\r\\n<\\/div>\\r\\n<\\/div>\",\"contact\":\"Please submit your application letter, comprehensive resume with 2x2 I.D.picture & transcript of records to: mpdveloso@gmail.com \\/ stephdamazo@gmail.com \\/ ochavillomaryruth@gmail.com\\r\\n \\r\\nOr visit us personally at:\\r\\n \\r\\nCebu Chamber Of Commerce & Industry, Inc.\\r\\n3rd Floor, CCCI Center, Cor.. Commerce & Industry Sts.,\\r\\nNorth Reclamation Area, Cebu City\\r\\n \\r\\nTel. No. (032) 2321421 \\u2013 24 Local 115\",\"salary\":30000,\"city\":\"manduae city\",\"company_id\":7,\"category_id\":11,\"user_id\":6,\"created_at\":\"2018-02-27 13:34:25\",\"updated_at\":\"2018-03-01 02:27:18\",\"deleted_at\":null,\"user\":{\"id\":6,\"role_id\":null,\"first_name\":\"rubin\",\"last_name\":\"isom\",\"middle_initial\":\"a\",\"date_of_birth\":\"2018-01-28\",\"contact\":null,\"address\":\"manil\",\"city\":\"asd\",\"country\":\"asd\",\"gender\":\"a\",\"avatar\":\"default.jpg\",\"email\":\"rubin@gmail.com\",\"provider\":null,\"provider_id\":null,\"verified\":\"1\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-01-30 05:10:08\",\"updated_at\":\"2018-01-30 05:10:08\",\"deleted_at\":null}},\"user\":{\"id\":7,\"role_id\":null,\"first_name\":\"kintal\",\"last_name\":\"huwng\",\"middle_initial\":\"si\",\"date_of_birth\":\"1990-08-03\",\"contact\":\"09234359381\",\"address\":\"maghaway\",\"city\":\"talisay\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"7_1518531498.jpg\",\"email\":\"allan.baruiz@pandotech.io\",\"provider\":null,\"provider_id\":null,\"verified\":\"0\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-01-31 05:35:20\",\"updated_at\":\"2018-02-14 06:18:56\",\"deleted_at\":null}}', NULL, 0, '2018-02-28 18:34:28', '2018-02-28 18:34:28'),
('fc5ba4fc-6ab6-439d-b858-a0a8e3aa24c7', 'App\\Notifications\\RepliedToApplication', 7, 'App\\User', '{\"message\":{\"employee_id\":\"7\",\"employer_id\":\"11\",\"message\":\"hello please come to my office\",\"updated_at\":\"2018-02-23 16:13:44\",\"created_at\":\"2018-02-23 16:13:44\",\"id\":1,\"employee\":{\"id\":7,\"role_id\":null,\"first_name\":\"kintal\",\"last_name\":\"huwng\",\"middle_initial\":\"si\",\"date_of_birth\":\"1990-08-03\",\"contact\":\"09234359381\",\"address\":\"maghaway\",\"city\":\"talisay\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"7_1518531498.jpg\",\"email\":\"allan.baruiz@pandotech.io\",\"provider\":null,\"provider_id\":null,\"verified\":\"0\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-01-31 05:35:20\",\"updated_at\":\"2018-02-14 06:18:56\",\"deleted_at\":null}},\"user\":{\"id\":11,\"role_id\":null,\"first_name\":\"kall\",\"last_name\":\"siti\",\"middle_initial\":\"d\",\"date_of_birth\":\"1979-08-30\",\"contact\":\"092343593812\",\"address\":\"talisay\",\"city\":\"city\",\"country\":\"cebu\",\"gender\":\"Female\",\"avatar\":\"11_1519194724.jpg\",\"email\":\"allan.baruiz@ok.com\",\"provider\":null,\"provider_id\":null,\"verified\":\"1\",\"verification_token\":null,\"admin\":\"false\",\"created_at\":\"2018-02-14 05:49:02\",\"updated_at\":\"2018-02-22 06:43:33\",\"deleted_at\":null}}', '2018-02-23 08:15:05', 0, '2018-02-23 08:13:44', '2018-02-23 08:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('allan.baruiz@gmail.com', '$2y$10$ZPdYWHVHOJqvIpYJx21PKeTKqZDQumiKaMF2y8rxmHud8dSlxyQkK', '2018-02-22 08:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administer roles & permissions', 'web', '2018-02-21 10:48:49', '2018-02-21 10:48:49'),
(2, 'Create Post', 'web', '2018-02-21 10:49:02', '2018-02-21 10:49:02'),
(3, 'Edit Post', 'web', '2018-02-21 10:49:18', '2018-02-21 10:49:18'),
(4, 'Delete Post', 'web', '2018-02-21 10:49:26', '2018-02-21 10:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `job`, `contact`, `salary`, `city`, `company_id`, `category_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hosemaid', 'hosemaid', '<p>Urgent hiring housemaid. kanang kamao mo loto, laba, bantay bata, hatod og uban pa...</p>', 'My email: allan.baruiz@yahoo.com\r\nMy number: 09234359381', 10000, 'cebu', 4, 1, 11, '2018-02-20 22:35:27', '2018-02-20 22:35:36', NULL),
(2, 'housemaid', 'housemaid', '<p>urgent need housemaid. kanang kamao moloto, laba, bantay bata, hatod skwelaha og lihok sa balay.</p>', 'contact me\r\nemail: allan.baruiz@pandotech.io\r\nno: 09234359381', 7000, 'cebu', 4, 1, 11, '2018-02-20 22:36:49', '2018-02-20 22:36:49', NULL),
(3, 'urgent need of carpenter', 'urgent-need-of-carpenter', '<div><strong>MLHUILLIER SUPERMARKET WINE &amp; FOOD</strong><br /><br />Is currently looking for:</div>\r\n<div>&nbsp;</div>\r\n<div><strong><span class=\"highlight\" style=\"background-color: #ffffcc;\">CARPENTER</span></strong></div>\r\n<div>&nbsp;</div>\r\n<div><strong>Qualifications</strong>:</div>\r\n<div>\r\n<ul>\r\n<li style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">Candidate must possess at least Vocational Diploma/Short Course Certificate or High School Graduate with at least 1 Year(s) of working experience in the related field is required for this position.</li>\r\n<li style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">Willing to work overtime</li>\r\n<li style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">Reliable transportation to job site within Lahug area</li>\r\n</ul>\r\n</div>', 'How to Apply\r\nSend your resume and application letter to the following address:\r\n \r\nMLhuillier Supermarket Wine & Food\r\n371 Gorordo Avenue, Lahug, Cebu City, Philippines\r\n \r\nTelephone No.: (032) 238 1320', 6000, 'Cebu City', 4, 2, 11, '2018-02-22 05:55:27', '2018-02-22 05:55:27', NULL),
(4, 'hiring carpenter', 'hiring-carpenter', '<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">\r\n<div><strong>Scarborough&nbsp;Fine&nbsp;Furniture,&nbsp;Inc.</strong>&nbsp;was incorporated on March 14, 1997 with 60-40 joint venture with Filipino-British investors. It has started its commercial operation on July 31, 1997 in Barangan Agus, Mactan Lapu-lapu City, Cebu Philippines.</div>\r\n<div>&nbsp;</div>\r\n<div>After two years of commercial operation in Agus, the Filipino investors decided to invest their investment in the company to the British investors. In January 1999, the company transferred its operation to Barangay Canduman, Mandaue City. It has entered into a lease contract with Accrisor Development Corp. for five-year period. With good and high quality products,&nbsp;Scarborough&nbsp;was well known to the&nbsp;furniture&nbsp;industry. It has participated with various&nbsp;furniture&nbsp;shows both local and abroad.</div>\r\n<div>&nbsp;</div>\r\n<div>After the contract of lease expired, the company decided to construct its own factory building. After thorough study and evaluation as to the best location of its investment, the company chooses MEPZ2 as the hub of its operation. In May 2004, the company transferred its commercial operation in MEPZ2.</div>\r\n<div>&nbsp;</div>\r\n<div>For immediate hiring:</div>\r\n<div>&nbsp;</div>\r\n<div><strong><span class=\"highlight\" style=\"background-color: #ffffcc;\">CARPENTER</span></strong></div>\r\n<div>&nbsp;</div>\r\n<div><strong>Qualifications:</strong></div>\r\n<ul>\r\n<li>With 2-years minimum experience ( Furniture Indusrty )</li>\r\n<li>High School Graduate / College Level</li>\r\n<li>With good moral character</li>\r\n</ul>\r\n</div>', 'Send your resume and application letter to the following address:\r\n \r\nHuman Resource Department \r\nScarborough Fine Furniture Inc. \r\nLot 2, Block 9, MEPZ 2 \r\nBasak, Lapu-Lapu City \r\n \r\nTel Nos. 032-3415152 to 54', 8000, 'cebu city', 4, 1, 11, '2018-02-22 05:57:14', '2018-02-22 05:57:14', NULL),
(5, 'Collector', 'collector', '<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><strong>WORLDWIDE STEEL GROUP, INC</strong>., the pioneer company manufacturing steel bars in Cebu and a leading company in manufacturing, distribution, retailing and supplying quality Construction materials to different hardwares,&nbsp;<span class=\"highlight\" style=\"background-color: #ffffcc; font-weight: bold;\">Contractor</span>s and end users is looking for the following to join in its expansion.</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><br />Is currently looking for:</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">&nbsp;</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><strong>COLLECTOR</strong></div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">&nbsp;</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><strong>Job Description</strong></div>\r\n<ul style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">\r\n<li>On time collection of scheduled and for pick up payments</li>\r\n<li>On time delivery of counter receipt to customers preparation of daily IT report</li>\r\n<li>In charge of cash deposits and updating of passbooks</li>\r\n<li>In-charge of pdc warehousing transactions - pick up PDC from Banawa , endorse to treasury, bring to Metrobank</li>\r\n</ul>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><strong>Qualifications</strong></div>\r\n<ul style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">\r\n<li>High school graduate college level preferably with 6 months to 1 year experience in field collection but is not necessary.</li>\r\n<li>Can drive a motorcycle and with 1,2 license restriction code.</li>\r\n<li>Must be familiar with roads and establishments within Cebu Province.</li>\r\n</ul>', 'For interested applicants please send your Resume and Application Letter to:\r\n \r\nWorldwide Steel Group, Inc.\r\nSacris Rd., Extension\r\nMandaue City, Cebu\r\n \r\nc/o Mary Maquilan', 7000, 'minda', 4, 9, 11, '2018-02-22 05:58:37', '2018-02-22 05:58:37', NULL),
(6, 'Finishing Painter', 'finishing-painter', '<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><strong>ALICIA APARTELLE</strong></div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">&nbsp;</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">A Hotel-Apartelle located in uptown CEBU with 126 condo type rooms within the radius of two (2) shopping malls, university, hospitals, golf course and church is in need of:</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">&nbsp;</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><strong>FINISHING&nbsp;<span class=\"highlight\" style=\"background-color: #ffffcc;\">PAINTER</span></strong></div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">&nbsp;</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">\r\n<div><strong>Qualifications:</strong></div>\r\n<ul>\r\n<li>Candidate must possess at least Vocational Certificate/Short Course Certification related to&nbsp;<span class=\"highlight\" style=\"background-color: #ffffcc; font-weight: bold;\">painter</span>.</li>\r\n<li>Willing to work during night shift, Sundays &amp; holidays</li>\r\n<li>Ready for immediate employment</li>\r\n</ul>\r\n</div>', 'Submit your Letter of Application, Resume, Transcript of Records and other relevant credentials at the:\r\n \r\nAdmin Office\r\nAlicia Apartelle\r\nGov. M. Cuenco Ave., Banilad, Cebu City', 12000, 'luzon', 4, 5, 11, '2018-02-22 05:59:58', '2018-02-22 05:59:58', NULL),
(7, 'Construction Workers', 'construction-workers', '<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><strong>CONSTRUCTION WORKERS</strong></div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">&nbsp;</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">Qualifications:</div>\r\n<ul style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">\r\n<li>Proven experience as a&nbsp;<span class=\"highlight\" style=\"background-color: #ffffcc; font-weight: bold;\">painter</span></li>\r\n<li>Excellent knowledge of painting material and how to select, mix and apply them</li>\r\n<li>Solid knowledge of commercial and/or construction painting techniques</li>\r\n<li>Repairs, maintains and alters buildings, retaining walls and other brick or stone edifices.</li>\r\n<li>Plasters ceilings and/or walls.</li>\r\n<li>Does carpentry work incidental to masonry work.</li>\r\n<li>1+ years&rsquo; experience in finish carpentry</li>\r\n<li>Knowledge of lumber grades and countertop materials</li>\r\n<li>Willingness to work overtime when necessary to deliver the project on time</li>\r\n</ul>', 'Mandaue City, Cebu\r\nTotal vacancies for this job title : 1 \r\nPosted on : February 19, 2018\r\nJob ID : 264448', 12000, 'manila', 4, 4, 11, '2018-02-22 06:01:49', '2018-02-22 06:01:49', NULL),
(8, 'Company Driver', 'company-driver', '<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><strong>HANATOUR CEBU INC.</strong></div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">&nbsp;</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">Is looking for:</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">&nbsp;</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\"><strong>COMPANY&nbsp;<span class=\"highlight\" style=\"background-color: #ffffcc;\">DRIVER</span></strong></div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">&nbsp;</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">Qualifications Candidate must be:</div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif; font-size: small;\">\r\n<ul>\r\n<li>At least a High School Diploma or Vocational Course</li>\r\n<li>At least 1 Year(s) of working experience in driving particularly</li>\r\n<li>Must be in Good Moral Character and NO criminal records</li>\r\n<li>Hardworking, trustworthy &amp; dependable</li>\r\n<li>Organized and can handle multiple demands</li>\r\n<li>Display effective multi-tasking and time management skills</li>\r\n<li>Knowledgeable about latest motor vehicle laws and relevant regulations</li>\r\n<li>Knowledgeable about safety measures to ensure the safety of the passengers</li>\r\n</ul>\r\n</div>', 'Interested applicants may email your Application Letter and Resume w/ picture to: hanatour_cebuinc@yahoo.com\r\n \r\nFor more Information please call: 236-4287 / 236-4292\r\n \r\nLook for: Jeannette C. Caballero or Racquelyn Aton (Admin Assistant/HR)', 13000, 'Cebu City', 4, 1, 11, '2018-02-22 06:03:08', '2018-02-27 22:19:16', NULL),
(9, 'CADD Operator', 'cadd-operator', '<div class=\"content search_highlight\" style=\"margin-top: 10px; color: #333333; font-family: arial, sans-serif;\">\r\n<div><strong>ANQ CONSTRUCTION CORP.</strong></div>\r\n<div>&nbsp;</div>\r\n<div>For Immediate Hiring!</div>\r\n<div>&nbsp;</div>\r\n<div>\r\n<div><strong>CADD&nbsp;<span class=\"highlight\" style=\"background-color: #ffffcc;\">OPERATOR</span></strong></div>\r\n<div>&nbsp;</div>\r\n<div>Qualifications:</div>\r\n<ul>\r\n<li>Male or Female</li>\r\n<li>Graduate of BS in Architecture&nbsp; or Drafting</li>\r\n<li>At least 2 yrs. experience in CAD 2D &amp; 3D</li>\r\n<li>Has expertise in 3D sketch-up, Vray, &amp; Photoshop</li>\r\n<li>Has determination to work even under pressure</li>\r\n</ul>\r\n</div>\r\n</div>', 'Requirements:\r\nResume with 2x2 latest photo\r\nTranscript of record (Certified True Copy)\r\nCertificate of employment\r\nSample of works 2D & 3D (CAD operator)\r\nSubmit the above requirements to:\r\n \r\nAr. Alvin N. Quibilan\r\nANQ Construction Corp.\r\n757 Don. G. Quijada St. Guadalupe\r\nCebu City, Phillipines 6000', 8000, 'manila', 5, 6, 29, '2018-02-22 08:42:37', '2018-02-27 22:16:36', NULL),
(10, 'ACAS Support Staff', 'acas-support-staff', '<div><strong>CEBU</strong><strong>&nbsp;CHAMBER OF COMMERCE AND INDUSTRY, INC.&nbsp;</strong></div>\r\n<div>&nbsp;</div>\r\n<div>A non-stock, non-profit organization is in need of a dynamic professional to fill in the position of:</div>\r\n<div>&nbsp;</div>\r\n<div>\r\n<div><strong>ACAS SUPPORT STAFF</strong></div>\r\n<div>&nbsp;</div>\r\n<div>ASSESSMENT, CERTIFICATION AND ACCREDITATION SYSTEM (ACAS) of the Cebu Chamber of Commerce and Industry, Inc. is a sustainability mechanism being&nbsp;<span class=\"highlight\" style=\"background-color: #ffffcc; font-weight: bold;\">pilot</span>ed by the K to 12 plus project between the Philippine and German organizations, who commit on a partnership to build a competent workforce for globally competitive business in the Philippines through dualized training education. The Chamber ACAS is a way of response in addressing matching the needs of the industries with a skilled Philippine workforce,</div>\r\n<div>&nbsp;</div>\r\n<div>I. OBJECTIVE</div>\r\n<div>&nbsp;</div>\r\n<div>Recruitment of ACAS Support Staff to support the Unit Head during the&nbsp;<span class=\"highlight\" style=\"background-color: #ffffcc; font-weight: bold;\">pilot</span>ing and implementation of the Chamber Assessment, Certification and Accreditation System.</div>\r\n<div>&nbsp;</div>\r\n<div>\r\n<div>DUTIES AND RESPONSIBILITIES</div>\r\n<div>&nbsp;</div>\r\n<div>A. To provide staff support and aide the promotion of Chamber ACAS to different stakeholders such as Member Companies of the Cebu Chamber, Business Membership Organizations, Industry Associations, and Technical Vocational Institutions. The assistance will be particularly needed in the following activities:</div>\r\n<ul>\r\n<li>Research analysis for potential ACAS Stakeholders and Partners</li>\r\n<li>Organization/Facilitation and Documentation of Committee Meetings, Industry Cluster Workshops, Focused Group Discussions, Company Visits, and training that engage Industry Participation on the Chamber ACAS</li>\r\n<li>Coordination of Industry Cluster activities regarding the K to 12 PLUS Element under the K to 12 PLUS Project]</li>\r\n<li>Development, support, and promotion of chamber goals, including message development, social media content creation, and media outreach for ACAS promotion</li>\r\n</ul>\r\n<div>This will entail but not limited to the following services:</div>\r\n<ul>\r\n<li>Formulation for memos, emails, reports, and responses to questions and requests for information through incoming calls, emails or fax</li>\r\n<li>Send and follow-up meeting invites to ensure full participation of ACAS stakeholders and partners during events</li>\r\n<li>Perform administrative responsibilities including taking notes and photo documentation during meetings, preparing correspondence and managing files</li>\r\n</ul>\r\n<div>B. To support the conduct of Assessment and Certification of Senior High Students and Accreditation of Training Companies, In-company Trainers, and Assessors under the Chamber ACAS</div>\r\n<ul>\r\n<li>Provide assistance in the execution of Chamber Assessment, Certification, and Accreditation covering events management, reporting and liquidation</li>\r\n<li>Provide staff support during the planning, preparation, execution and post-event closure of In-company Trainers Training</li>\r\n</ul>\r\n<div>C. To maintain files and update fields under the ACAS Databank, as repository of ACAS data, forms, and catalogs</div>\r\n<ul>\r\n<li>Answer inquiries recorded on the Databank Feedback field</li>\r\n<li>Ensure proper naming convention, storing, updating and retrieving of files that are to be uploaded on the ACAS Databank</li>\r\n<li>Develop and update information on the ACAS Databank such as Announcements and List of new partners and stakeholders</li>\r\n<li>Schedule monthly reports generated through the ACAS Databank for monitoring and reporting purposes</li>\r\n<li>Backup files uploaded from the Databank for security and internal purposes</li>\r\n</ul>\r\n</div>\r\n<div>II. DIRECT SUPERVISOR</div>\r\n<ul>\r\n<li>ACAS Unit Head</li>\r\n</ul>\r\n<div>\r\n<div style=\"color: #333333; font-family: arial, sans-serif;\">III. JOB SPECIFICATION</div>\r\n<ul style=\"color: #333333; font-family: arial, sans-serif;\">\r\n<li>At least a Bachelor\'s degree in Public Relations, Business Administration, Liacom or related field</li>\r\n<li>Excellent written and verbal communication skills</li>\r\n<li>Knowledge of digital marketing tactics and email marketing</li>\r\n<li>Excellent critical thinking skills and the ability to exercise good judgment and solve problems quickly and effectively</li>\r\n<li>Excellent in communications strategy development</li>\r\n<li>Experience in Events Management</li>\r\n<li>Experience working in customer relations preferred</li>\r\n<li>Flexible and can do multi-tasking</li>\r\n<li>Reporting and analytics experience is a plus</li>\r\n<li>Knowledge of the TVET system is preferred</li>\r\n</ul>\r\n</div>\r\n</div>', 'Please submit your application letter, comprehensive resume with 2x2 I.D.picture & transcript of records to: mpdveloso@gmail.com / stephdamazo@gmail.com / ochavillomaryruth@gmail.com\r\n \r\nOr visit us personally at:\r\n \r\nCebu Chamber Of Commerce & Industry, Inc.\r\n3rd Floor, CCCI Center, Cor.. Commerce & Industry Sts.,\r\nNorth Reclamation Area, Cebu City\r\n \r\nTel. No. (032) 2321421 – 24 Local 115', 30000, 'manduae city', 7, 11, 6, '2018-02-27 05:34:25', '2018-02-28 18:27:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_id` int(10) UNSIGNED NOT NULL,
  `rateable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `created_at`, `updated_at`, `rating`, `rateable_id`, `rateable_type`, `user_id`) VALUES
(1, '2018-02-27 07:17:14', '2018-02-27 07:17:14', 3, 88, 'App\\Skill', 7),
(2, '2018-02-27 07:20:01', '2018-02-27 07:20:01', 5, 89, 'App\\Skill', 7),
(3, '2018-02-27 07:22:33', '2018-02-27 07:22:33', 3, 90, 'App\\Skill', 7),
(4, '2018-02-27 07:39:34', '2018-02-27 07:39:34', 5, 91, 'App\\Skill', 7),
(5, '2018-02-27 07:40:03', '2018-02-27 07:40:03', 1, 92, 'App\\Skill', 7),
(6, '2018-02-27 07:43:35', '2018-02-27 07:43:35', 3, 94, 'App\\Skill', 7),
(7, '2018-02-27 07:43:47', '2018-02-27 07:43:47', 1, 95, 'App\\Skill', 7),
(8, '2018-02-27 07:44:33', '2018-02-27 07:44:33', 4, 96, 'App\\Skill', 7),
(9, '2018-02-27 07:44:40', '2018-02-27 07:44:40', 5, 97, 'App\\Skill', 7),
(10, '2018-02-27 07:44:47', '2018-02-27 07:44:47', 1, 98, 'App\\Skill', 7),
(11, '2018-02-27 07:45:09', '2018-02-27 07:45:09', 1, 99, 'App\\Skill', 7);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `subject`, `cover_letter`, `resume`, `user_id`, `post_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'can i apply to the job', '<p>i am helpful and more comfortable with the job</p>', '7_1519402385.docx', 7, 8, '2018-02-23 08:13:05', '2018-02-23 08:13:05', NULL),
(2, 'testing', '<p>test</p>', '7_1519871668.docx', 7, 10, '2018-02-28 18:34:28', '2018-02-28 18:34:28', NULL),
(3, 'testing', '<p>test</p>', '7_1519871732.docx', 7, 8, '2018-02-28 18:35:32', '2018-02-28 18:35:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2018-02-21 10:49:51', '2018-02-21 10:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(5) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `rating`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mysql', 5, 7, '2018-02-06 07:53:01', '2018-02-08 21:44:48', '2018-02-08 21:44:48'),
(2, 'tatskie', 3, 7, '2018-02-08 19:17:14', '2018-02-08 19:17:17', '2018-02-08 19:17:17'),
(3, 'asdsad', 4, 7, '2018-02-08 21:00:06', '2018-02-08 21:42:39', '2018-02-08 21:42:39'),
(4, 'good', 1, 7, '2018-02-08 21:00:20', '2018-02-08 21:44:55', '2018-02-08 21:44:55'),
(5, 'ok', 3, 7, '2018-02-08 21:01:52', '2018-02-08 21:46:13', '2018-02-08 21:46:13'),
(6, 'asdsa', 2, 7, '2018-02-08 21:02:24', '2018-02-08 21:05:02', '2018-02-08 21:05:02'),
(7, 'ok', 5, 7, '2018-02-08 21:03:56', '2018-02-08 21:04:57', '2018-02-08 21:04:57'),
(8, 'k', 3, 7, '2018-02-08 21:04:36', '2018-02-08 21:05:00', '2018-02-08 21:05:00'),
(9, 'k', 2, 7, '2018-02-08 21:37:23', '2018-02-08 21:46:30', '2018-02-08 21:46:30'),
(10, 'k', 0, 7, '2018-02-08 21:37:36', '2018-02-08 21:46:32', '2018-02-08 21:46:32'),
(11, 'k', 0, 7, '2018-02-08 21:39:20', '2018-02-08 21:46:33', '2018-02-08 21:46:33'),
(12, 'k', 2, 7, '2018-02-08 21:40:18', '2018-02-08 21:46:33', '2018-02-08 21:46:33'),
(13, 'asdsad', 2, 7, '2018-02-08 21:40:22', '2018-02-08 21:45:01', '2018-02-08 21:45:01'),
(14, 'k', 0, 7, '2018-02-08 21:44:45', '2018-02-08 21:46:34', '2018-02-08 21:46:34'),
(15, 'k', 0, 7, '2018-02-08 21:44:48', '2018-02-08 21:46:17', '2018-02-08 21:46:17'),
(16, 'k', 0, 7, '2018-02-08 21:44:55', '2018-02-08 21:45:23', '2018-02-08 21:45:23'),
(17, 'k', 0, 7, '2018-02-08 21:45:01', '2018-02-08 21:45:15', '2018-02-08 21:45:15'),
(18, 'asdsa', 0, 7, '2018-02-08 21:46:08', '2018-02-08 21:46:35', '2018-02-08 21:46:35'),
(19, 'asdsa', 0, 7, '2018-02-08 21:46:13', '2018-02-08 21:46:35', '2018-02-08 21:46:35'),
(20, 'asdsa', 0, 7, '2018-02-08 21:46:17', '2018-02-08 21:46:36', '2018-02-08 21:46:36'),
(21, 'k', 0, 7, '2018-02-08 21:47:02', '2018-02-08 21:47:55', '2018-02-08 21:47:55'),
(22, 'asd', 0, 7, '2018-02-08 21:48:03', '2018-02-08 21:49:04', '2018-02-08 21:49:04'),
(23, 'ok', 0, 7, '2018-02-08 21:48:07', '2018-02-08 21:49:06', '2018-02-08 21:49:06'),
(24, 'waa', 0, 7, '2018-02-08 21:48:32', '2018-02-08 21:49:03', '2018-02-08 21:49:03'),
(25, 'cge', 0, 7, '2018-02-08 21:49:10', '2018-02-08 21:50:31', '2018-02-08 21:50:31'),
(26, 'ok', 0, 7, '2018-02-08 21:50:57', '2018-02-08 21:54:17', '2018-02-08 21:54:17'),
(27, 'okasdsad', 0, 7, '2018-02-08 21:58:21', '2018-02-08 22:08:02', '2018-02-08 22:08:02'),
(28, 'sad', 0, 7, '2018-02-08 22:01:13', '2018-02-08 22:09:03', '2018-02-08 22:09:03'),
(29, 'sample', 0, 7, '2018-02-08 22:06:50', '2018-02-08 22:09:15', '2018-02-08 22:09:15'),
(30, 'ok', 0, 7, '2018-02-08 22:09:25', '2018-02-08 22:31:56', '2018-02-08 22:31:56'),
(31, 'php', 0, 7, '2018-02-08 22:32:03', '2018-02-10 19:05:15', '2018-02-10 19:05:15'),
(32, 'laravel', 0, 7, '2018-02-10 17:34:12', '2018-02-10 19:03:30', '2018-02-10 19:03:30'),
(33, 'mysql', 0, 7, '2018-02-10 17:36:01', '2018-02-10 17:37:05', '2018-02-10 17:37:05'),
(34, 'css', 0, 7, '2018-02-10 17:36:14', '2018-02-10 17:36:59', '2018-02-10 17:36:59'),
(35, 'ok', 0, 7, '2018-02-10 17:36:52', '2018-02-10 17:36:55', '2018-02-10 17:36:55'),
(36, 'nice', 0, 7, '2018-02-10 17:42:28', '2018-02-10 17:42:31', '2018-02-10 17:42:31'),
(37, 'ok', 0, 7, '2018-02-10 17:42:37', '2018-02-10 17:42:45', '2018-02-10 17:42:45'),
(38, 'testing', 0, 7, '2018-02-10 17:47:37', '2018-02-10 19:03:08', '2018-02-10 19:03:08'),
(39, 'ok', 0, 7, '2018-02-10 17:50:29', '2018-02-10 19:03:06', '2018-02-10 19:03:06'),
(40, 'ok', 0, 7, '2018-02-10 17:50:29', '2018-02-10 17:54:04', '2018-02-10 17:54:04'),
(41, 'ok', 0, 7, '2018-02-10 17:53:51', '2018-02-10 17:53:59', '2018-02-10 17:53:59'),
(42, 'ok', 0, 7, '2018-02-10 17:53:53', '2018-02-10 17:53:57', '2018-02-10 17:53:57'),
(43, 'asd', 0, 7, '2018-02-10 18:59:24', '2018-02-10 19:02:11', '2018-02-10 19:02:11'),
(44, 'asdk', 0, 7, '2018-02-10 18:59:34', '2018-02-10 19:02:17', '2018-02-10 19:02:17'),
(45, 'asdsa', 0, 7, '2018-02-10 19:00:12', '2018-02-10 19:02:14', '2018-02-10 19:02:14'),
(46, 'asdsad', 0, 7, '2018-02-10 19:01:04', '2018-02-10 19:02:09', '2018-02-10 19:02:09'),
(47, 'asd', 0, 7, '2018-02-10 19:02:21', '2018-02-10 19:03:04', '2018-02-10 19:03:04'),
(48, 'laravel', 0, 7, '2018-02-10 19:03:13', '2018-02-10 19:03:27', '2018-02-10 19:03:27'),
(49, 'laravel', 0, 7, '2018-02-10 19:03:16', '2018-02-10 19:03:26', '2018-02-10 19:03:26'),
(50, 'good', 0, 7, '2018-02-10 19:03:21', '2018-02-10 19:03:24', '2018-02-10 19:03:24'),
(51, 'asd', 0, 7, '2018-02-10 19:05:20', '2018-02-10 19:05:23', '2018-02-10 19:05:23'),
(52, 'asd', 0, 7, '2018-02-10 19:08:54', '2018-02-10 19:09:03', '2018-02-10 19:09:03'),
(53, 'asda', 0, 7, '2018-02-10 19:08:56', '2018-02-10 19:10:24', '2018-02-10 19:10:24'),
(54, 'asdaas', 0, 7, '2018-02-10 19:08:58', '2018-02-10 19:10:25', '2018-02-10 19:10:25'),
(55, 'asdaasasd', 0, 7, '2018-02-10 19:08:59', '2018-02-10 19:10:27', '2018-02-10 19:10:27'),
(56, 'asd', 0, 7, '2018-02-10 19:09:14', '2018-02-10 19:10:29', '2018-02-10 19:10:29'),
(57, 'asdsa', 0, 7, '2018-02-10 19:10:39', '2018-02-10 19:14:39', '2018-02-10 19:14:39'),
(58, 'a', 0, 7, '2018-02-10 19:12:19', '2018-02-10 19:12:23', '2018-02-10 19:12:23'),
(59, 'asdsa', 0, 7, '2018-02-10 19:14:34', '2018-02-10 19:14:37', '2018-02-10 19:14:37'),
(60, 'asdsa', 0, 7, '2018-02-10 19:34:45', '2018-02-10 20:04:23', '2018-02-10 20:04:23'),
(61, 'asdsa', 0, 7, '2018-02-12 00:29:07', '2018-02-12 00:29:15', '2018-02-12 00:29:15'),
(62, 'asdsa', 0, 7, '2018-02-12 00:31:09', '2018-02-12 01:19:31', '2018-02-12 01:19:31'),
(63, 'asdsa', 0, 7, '2018-02-12 00:31:11', '2018-02-12 01:19:33', '2018-02-12 01:19:33'),
(64, 'asdsaasd', 0, 7, '2018-02-12 00:31:12', '2018-02-12 01:19:34', '2018-02-12 01:19:34'),
(65, 'asdsaasdasd', 0, 7, '2018-02-12 00:31:13', '2018-02-12 01:19:35', '2018-02-12 01:19:35'),
(66, 'sample', 0, 7, '2018-02-12 18:56:13', '2018-02-12 18:56:22', '2018-02-12 18:56:22'),
(67, 'sample1', 0, 7, '2018-02-12 18:56:15', '2018-02-12 18:56:20', '2018-02-12 18:56:20'),
(68, 'sample1', 0, 7, '2018-02-12 18:56:16', '2018-02-12 18:56:19', '2018-02-12 18:56:19'),
(69, 'asd', 0, 7, '2018-02-12 22:50:58', '2018-02-12 22:52:27', '2018-02-12 22:52:27'),
(70, 'asdasd', 0, 7, '2018-02-12 23:31:32', '2018-02-12 23:41:04', '2018-02-12 23:41:04'),
(71, 'asdsa edited', 0, 7, '2018-02-12 23:34:08', '2018-02-12 23:54:09', '2018-02-12 23:54:09'),
(72, 'asdsad', 0, 7, '2018-02-12 23:49:44', '2018-02-12 23:54:08', '2018-02-12 23:54:08'),
(73, 'asdas', 0, 7, '2018-02-12 23:51:58', '2018-02-12 23:54:06', '2018-02-12 23:54:06'),
(74, 'asdsad', 0, 7, '2018-02-12 23:53:52', '2018-02-12 23:54:04', '2018-02-12 23:54:04'),
(75, 'qwe', 0, 7, '2018-02-12 23:53:59', '2018-02-12 23:54:02', '2018-02-12 23:54:02'),
(76, 'ok', 0, 7, '2018-02-12 23:54:51', '2018-02-12 23:56:04', '2018-02-12 23:56:04'),
(77, 'asdasd', 0, 7, '2018-02-12 23:55:59', '2018-02-12 23:56:02', '2018-02-12 23:56:02'),
(78, 'php', 4, 7, '2018-02-12 23:56:07', '2018-02-27 07:22:20', '2018-02-27 07:22:20'),
(79, 'mysql', 3, 7, '2018-02-12 23:56:13', '2018-02-27 07:22:22', '2018-02-27 07:22:22'),
(80, 'testing', 0, 7, '2018-02-13 03:57:56', '2018-02-13 04:09:52', '2018-02-13 04:09:52'),
(81, 'asdsad', 0, 7, '2018-02-13 04:09:44', '2018-02-13 04:09:50', '2018-02-13 04:09:50'),
(82, 'laravel', 3, 7, '2018-02-13 16:18:55', '2018-02-27 07:22:24', '2018-02-27 07:22:24'),
(83, 'RESTful API Laravel', 4, 7, '2018-02-13 16:19:07', '2018-02-27 07:22:26', '2018-02-27 07:22:26'),
(84, 'photoshop cs6', 5, 7, '2018-02-13 16:19:15', '2018-02-27 07:22:18', '2018-02-27 07:22:18'),
(85, 'photoshop lightroom', 2, 7, '2018-02-13 16:19:21', '2018-02-27 07:22:28', '2018-02-27 07:22:28'),
(86, 'php', 1, 26, '2018-02-22 08:22:43', '2018-02-22 08:22:43', NULL),
(87, 'html', 3, 26, '2018-02-22 08:22:50', '2018-02-22 08:22:50', NULL),
(88, 'assa', 0, 7, '2018-02-27 07:17:14', '2018-02-27 07:22:15', '2018-02-27 07:22:15'),
(89, 'asdasd', 0, 7, '2018-02-27 07:20:01', '2018-02-27 07:22:11', '2018-02-27 07:22:11'),
(90, 'php', 0, 7, '2018-02-27 07:22:33', '2018-02-27 07:22:33', NULL),
(91, 'mysql', 0, 7, '2018-02-27 07:39:34', '2018-02-27 07:39:34', NULL),
(92, 'css', 0, 7, '2018-02-27 07:40:03', '2018-02-27 07:44:03', '2018-02-27 07:44:03'),
(93, 'nothing', 0, 7, '2018-02-27 07:40:10', '2018-02-27 07:40:51', '2018-02-27 07:40:51'),
(94, 'asd', 0, 7, '2018-02-27 07:43:35', '2018-02-27 07:43:40', '2018-02-27 07:43:40'),
(95, 'ok', 0, 7, '2018-02-27 07:43:47', '2018-02-27 07:44:00', '2018-02-27 07:44:00'),
(96, 'asdasd', 0, 7, '2018-02-27 07:44:33', '2018-02-27 07:45:02', '2018-02-27 07:45:02'),
(97, 'grabe', 0, 7, '2018-02-27 07:44:40', '2018-02-27 07:44:59', '2018-02-27 07:44:59'),
(98, 'nice', 0, 7, '2018-02-27 07:44:47', '2018-02-27 07:44:55', '2018-02-27 07:44:55'),
(99, 'css', 0, 7, '2018-02-27 07:45:09', '2018-02-27 07:45:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_initial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `contact` varchar(161) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `verification_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `middle_initial`, `date_of_birth`, `contact`, `address`, `city`, `country`, `gender`, `avatar`, `email`, `password`, `provider`, `provider_id`, `verified`, `verification_token`, `admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, NULL, 'uram', 'zamis', 's', '1990-03-08', '432-1234', 'maghaway', 'talisay city', 'philippines', 'Male', '4_1519400718.png', 'allan.baruiz@gmail.com', '$2y$10$6FHpxapj6ryq2ivKg.8l5.9ESScyeGAXCA2iT6EjSRHOe3bJ.ifBS', 'github', '10783847', '0', NULL, 'true', 'DegxiY0xRsglIHriuM8ZVsFB5pGwQctAL12mlqW9MANBE0NzmDEutOWMSsnT', '2018-01-27 19:34:03', '2018-02-23 07:45:18', NULL),
(6, NULL, 'rubin', 'isom', 'a', '2018-01-28', NULL, 'manil', 'asd', 'asd', 'a', 'default.jpg', 'rubin@gmail.com', '$2y$10$KYqwTGPrJCCqW6g8MV7FKeWmUiO9OssonnPQNkrTMllLBma3w4YnC', NULL, NULL, '1', NULL, 'false', 'HoAFIUWsvTdv5IyQneSzGbACUJeijmGYeTsZkh1rSF7S4bTzw6RKgk1MLnE7', '2018-01-29 21:10:08', '2018-01-29 21:10:08', NULL),
(7, NULL, 'kintal', 'huwng', 'si', '1990-08-03', '09234359381', 'maghaway', 'talisay', 'cebu', 'Female', '7_1518531498.jpg', 'allan.baruiz@pandotech.io', '$2y$10$nMD6rqOhFkarZSnGpK5GBuROalOvhhE7u1srS1.xLd6cM6WGI4dcG', NULL, NULL, '0', NULL, 'false', 'vgjRnIktP2KIlPKfH5jDMQUzrOdm3BXsbf6m3aihxLHtHSmgPQgBHxqfwGM7', '2018-01-30 21:35:20', '2018-02-13 22:18:56', NULL),
(8, NULL, 'shan', 'zenes', 'e', '1990-03-08', '09234359381', 'maghawaye', 'talisaye', 'cebue', 'Male', '8_1519276970.png', 'allan.baruiz@yahoo.com', '$2y$10$cpy2a5X.db16gy9fv6gf.ujxslb/s.xAsDp1cQO3Frn7i9UxWTFMa', NULL, NULL, '0', NULL, 'false', 'JIVgNe0hrt2BpU4ZmsNN7BHgcAlCNwY9nAqRJOyO0y2CzXu5dvhm9nx6N6rt', '2018-02-13 18:24:33', '2018-02-21 21:22:50', NULL),
(9, NULL, 'rolando', 'hadi', 'a', '1990-03-20', '90809809809', 'sanciangko street', 'cebu', 'philippines', 'Male', '9_1518588332.jpg', 'rolando@gmail.com', '$2y$10$Ojk9M3i2yfABqcbPHBJlmexuNbJWEwEQVhPHe3JhBrXlJl4dIoqMe', NULL, NULL, '1', NULL, 'false', 'D3ajI3ei0fENuGXqYqwbWemiumXWtSUlLmXH2A109oKhz8jzWT5IwHLrpFDJ', '2018-02-13 19:29:19', '2018-02-15 22:04:41', NULL),
(11, NULL, 'kall', 'siti', 'd', '1979-08-30', '092343593812', 'talisay', 'city', 'cebu', 'Female', '11_1519194724.jpg', 'allan.baruiz@ok.com', '$2y$10$ONW3SAPvlDrIN8.tY9kHNONr14UvIlbSKTWXyKAwv4z8YKIcUa3kq', NULL, NULL, '1', NULL, 'false', 'Jzhlok2hQblmz4qer1PlurbvDwDoeHZNHwVaQuduzk7yx6Yngss2km2jfHEs', '2018-02-13 21:49:02', '2018-02-21 22:43:33', NULL),
(12, NULL, 'john', 'doe', 'b', '1979-08-31', '12312321321321', 'asd', 'sad', 'sad', 'Male', 'default.jpg', 'john@asdasd.com', '$2y$10$UbbMbxLGWG77.ZwWoOWID.G54Uw/33mwfdPgp7rE4MORLKmwmDppq', NULL, NULL, '1', NULL, 'false', 'imXztWEJzPtReZNoMicGZB0xzFh3xXMKtWyz1j7tdQPRhOU6KB4Cruyv8Sxk', '2018-02-13 22:02:19', '2018-02-13 22:02:19', NULL),
(13, NULL, 'jane', 'doe', 'z', '1979-08-29', '123123123', 'lawaan', 'asd', 'asd', 'Male', 'default.jpg', 'jane@yahoo.com', '$2y$10$rt4ohI8g9VEt0M.b4NlDreIuviB3NkdWYVW9.SOsciGcl5S7WynLe', NULL, NULL, '1', NULL, 'false', 'q9GxgRC054XCU4sOoxywqKKbKDNpRqrPKCLwys8oze4PTqV6TFLO57rxNljz', '2018-02-13 22:03:23', '2018-02-13 22:03:23', NULL),
(25, NULL, 'benhe', 'kante', 'c', NULL, NULL, NULL, NULL, NULL, NULL, '25_1519316973.png', NULL, NULL, 'twitter', '935514432427327488', '0', NULL, 'false', 'RejSGUgY6jREUtlCSzdfw1aLIuF2sFvlddhMsGJw1GrkvfAWYtWvgvGN0CVF', '2018-02-21 22:49:07', '2018-02-22 08:29:33', NULL),
(26, NULL, 'Bob', 'Mac', 'q', '1990-03-03', '012312312312', 'talisay', 'cebu', 'phillipines', 'Male', 'default.jpg', 'bob@yahoo.com', '$2y$10$ilZmN8v7j4vfV8tt9peQMOvcHsGojW0oCmsqr9QMKvazRx3EwcsKC', 'facebook', '10208481420872590', '0', NULL, 'false', 'WC3MZDEEDyQhQ8VxgVm7qRTamURgxxEu3Sog87X6JsJuGzOK5ho9iSbd2hd9', '2018-02-21 23:11:08', '2018-02-22 08:21:06', NULL),
(27, NULL, 'iklan', 'korom', 'b', NULL, NULL, NULL, NULL, NULL, NULL, 'default.jpg', NULL, NULL, 'google', '114504700355355023416', '0', NULL, 'false', '5cnTzclmkkhm6sZ1hFugZ6k6R9qSwtlxRM9nPboeOSxWoMWWASwEv6rCSQFX', '2018-02-21 23:46:24', '2018-02-21 23:46:24', NULL),
(28, NULL, 'ralli', 'kumar', 'h', '1979-09-07', '123123123123', 'asda', 'asd', 'sad', 'Male', 'default.jpg', 'ralli@yahooo.com', '$2y$10$KYqwTGPrJCCqW6g8MV7FKeWmUiO9OssonnPQNkrTMllLBma3w4YnC', 'facebook', '952423134906462', '1', NULL, 'false', '5L9ND9NiCsRicRGcHVkZhQ6zlXIWInglz9831Tl726n4ksQtY0XoOKhnV3d8', '2018-02-21 23:46:44', '2018-02-22 08:43:38', NULL),
(29, NULL, 'rudy', 'gard', 'g', '1990-03-03', '09123456678', 'talisay', 'cebu', 'phillipines', 'Male', '29_1519317088.png', 'rudy@yahoo.com', '$2y$10$Az9GCbbuCWO/jd8ORy33HeGMQ56AS/4Aa/tHTBKDFxdrnVgD3Lx/6', NULL, NULL, '1', NULL, 'false', 'RuX3qJatJzMNCocxrdFTK71VzWYbw7AmsWZT6jLkxhA9yWaNeVRuUKedfXV3', '2018-02-22 08:30:38', '2018-02-22 08:31:28', NULL),
(30, NULL, 'ugmad', 'admin', 's', '1979-09-07', '09123456789', 'lawaan', 'talisay', 'phillipines', 'Male', 'default.jpg', 'admin@ugmad.io', '$2y$10$fzTZQtzAyfBUYAF.UpbAaeo1hpyzifSzuZaq/hY5DFgvwEB.C/wmS', NULL, NULL, '0', NULL, 'true', NULL, '2018-02-23 07:58:24', '2018-02-23 07:58:24', NULL),
(31, NULL, 'alex', 'mabilog', 'm', '1997-02-13', '09332635757', 'Lahug', 'Cebu', 'Philippines', 'Male', 'default.jpg', 'alex.mabilog@gmail.com', '$2y$10$U5fPsXPi9XBsVMhgHS8Uy.6RMtBrZWf9JR8.5K7t73tm.JaDJ48pG', NULL, NULL, '0', NULL, 'false', 'ZoKpSe4LuFASO8yTvGW9HfeMMDPTBP8okOoNk94ISybysnyd3IJXcKdxYhqR', '2018-02-23 09:06:35', '2018-02-23 09:06:35', NULL),
(32, NULL, 'a', 'a', 'a', '1979-09-10', '123123', 'a', 'a', 'a', 'Male', 'default.jpg', 'a@yahoo.com', '$2y$10$aMFR11DO3NoGeGaKmq8WeueGTul7S/Be3p6sHVUNaSGgQq9oedNpi', NULL, NULL, '0', NULL, 'false', NULL, '2018-02-23 10:26:27', '2018-02-23 10:26:27', NULL),
(33, NULL, 'a', 'a', 'a', '1979-09-12', '2', 'a', 'a', 'a', 'Male', 'default.jpg', 'b@yahoo.com', '$2y$10$3HkAW9ATpEbge/BS29/U/Ow1zPMIAeO1jd8W0/9y/mTXGG.gjr2im', NULL, NULL, '0', NULL, 'false', NULL, '2018-02-23 10:33:14', '2018-02-23 10:33:14', NULL),
(34, NULL, 'a', 'a', 'a', '1979-09-06', '2', 'b', 'b', 'b', 'Male', 'default.jpg', 'c@yahoo.com', '$2y$10$c4MR9yeFNLTyM1zVmNGEh.wj1y6NFedeyk1F1wPW4i0NFi3m4F5Eu', NULL, NULL, '0', NULL, 'false', NULL, '2018-02-23 10:34:23', '2018-02-23 10:34:23', NULL),
(35, NULL, 'b', 'b', 'b', '1979-08-30', 'b', 'b', 'b', 'b', 'Male', 'default.jpg', 'd@yahoo.com', '$2y$10$WPNtj0KuDrKv6CvgVhAE.OtbsNYJTniJ21EWVWLXduodr5SI/WkDG', NULL, NULL, '0', NULL, 'false', NULL, '2018-02-23 10:37:56', '2018-02-23 10:37:56', NULL),
(36, NULL, 'e', 'e', 'e', '1979-09-04', 'e', 'e', 'e', 'e', 'Male', 'default.jpg', 'e@yahoo.com', '$2y$10$DZS35tmJZ.BQgbca1445Pu231mw71dNqVeEN.twOBG5mRX3lufQ/i', NULL, NULL, '0', NULL, 'false', NULL, '2018-02-23 10:41:14', '2018-02-23 10:41:14', NULL),
(37, NULL, 'f', 'f', 'f', '1979-09-10', 'f', 'f', 'f', 'f', 'Female', 'default.jpg', 'f@yahoo.com', '$2y$10$0BzY1hBMnnNx7omkdhANLOXIrg2jFURjTLZg1LJ5nJtJbsTdIS1Cq', NULL, NULL, '0', NULL, 'false', NULL, '2018-02-23 10:43:06', '2018-02-23 10:43:06', NULL),
(38, NULL, 'tesing admin', 'admin', 'asdas', '1979-09-14', '12321321', 'asdasd', 'asd', 'asd', 'Male', 'default.jpg', 'asd@yahoo.coma', '$2y$10$AWpifWP18QQcppQefSWU5ehNC/8seAv91buzb741Q5PA.77GPtm.m', NULL, NULL, '0', NULL, 'true', NULL, '2018-02-27 22:12:06', '2018-02-27 22:13:26', '2018-02-27 22:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(10) UNSIGNED NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_start` year(4) NOT NULL,
  `date_end` year(4) DEFAULT NULL,
  `current` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `company`, `position`, `address`, `discription`, `date_start`, `date_end`, `current`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pando technologies', 'sr. web developer', 'singapore', 'something', 2017, NULL, 1, 7, '2018-02-06 08:11:06', '2018-02-13 01:25:32', NULL),
(2, 'google', 'web developer', 'google net', 'im a hacker hahaha', 2011, NULL, 1, 7, '2018-02-13 01:17:13', '2018-02-13 01:17:55', '2018-02-13 01:17:55'),
(3, 'test', 'test', 'test', 'test', 2012, 2012, 0, 7, '2018-02-13 01:25:58', '2018-02-13 01:30:35', '2018-02-13 01:30:35'),
(4, 'a', 'a', 'a', 'a', 2123, NULL, 1, 7, '2018-02-13 01:30:27', '2018-02-13 01:30:32', '2018-02-13 01:30:32'),
(5, 'qwe', 'qwe', 'wqe', 'wqe', 2017, NULL, 1, 7, '2018-02-13 04:28:57', '2018-02-13 04:29:06', '2018-02-13 04:29:06'),
(6, 'asd', 'asd', 'asd', 'asd', 2000, NULL, 1, 7, '2018-02-13 04:44:10', '2018-02-13 04:45:41', '2018-02-13 04:45:41'),
(7, 'qwe edited', 'qwe edited', 'qwe edited', 'qwe edited', 2016, 2001, 1, 7, '2018-02-13 04:46:27', '2018-02-13 05:23:51', '2018-02-13 05:23:51'),
(8, 'asd', 'asd', 'asd', 'asd', 2017, 2012, 0, 7, '2018-02-13 04:47:43', '2018-02-13 05:23:47', '2018-02-13 05:23:47'),
(9, 'qwe', 'qwe', 'qwe', 'qwe', 2016, 2016, 0, 7, '2018-02-13 05:29:05', '2018-02-13 05:31:29', '2018-02-13 05:31:29'),
(10, 'qweqwe', 'qweqwe', 'qwe', 'qwe', 2016, NULL, 1, 7, '2018-02-13 05:50:51', '2018-02-13 15:25:16', '2018-02-13 15:25:16'),
(11, 'jollibee foods corp.', 'service crew', 'jb 038, gaisano tabunok, sangi, talisay city', 'certified crew trainor in soda station', 2012, 2014, 0, 7, '2018-02-13 15:58:37', '2018-02-13 16:01:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobcategories`
--
ALTER TABLE `jobcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobcategories_user_id_foreign` (`user_id`),
  ADD KEY `jobcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_employee_id_foreign` (`employee_id`),
  ADD KEY `messages_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_company_id_foreign` (`company_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_id_rateable_type_index` (`rateable_id`,`rateable_type`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_index` (`user_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_user_id_foreign` (`user_id`),
  ADD KEY `replies_post_id_foreign` (`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `jobcategories`
--
ALTER TABLE `jobcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobcategories`
--
ALTER TABLE `jobcategories`
  ADD CONSTRAINT `jobcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `jobcategories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
