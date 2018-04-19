-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2018 at 02:24 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bake`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 284),
(2, 1, NULL, NULL, 'Groups', 2, 23),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Pages', 24, 27),
(9, 8, NULL, NULL, 'display', 25, 26),
(10, 1, NULL, NULL, 'Posts', 28, 59),
(11, 10, NULL, NULL, 'index', 29, 30),
(12, 10, NULL, NULL, 'view', 31, 32),
(14, 10, NULL, NULL, 'edit', 33, 34),
(15, 10, NULL, NULL, 'delete', 35, 36),
(16, 1, NULL, NULL, 'Users', 60, 87),
(17, 16, NULL, NULL, 'index', 61, 62),
(18, 16, NULL, NULL, 'view', 63, 64),
(19, 16, NULL, NULL, 'add', 65, 66),
(20, 16, NULL, NULL, 'edit', 67, 68),
(21, 16, NULL, NULL, 'delete', 69, 70),
(22, 16, NULL, NULL, 'login', 71, 72),
(23, 16, NULL, NULL, 'logout', 73, 74),
(24, 1, NULL, NULL, 'Widgets', 88, 99),
(25, 24, NULL, NULL, 'index', 89, 90),
(26, 24, NULL, NULL, 'view', 91, 92),
(27, 24, NULL, NULL, 'add', 93, 94),
(28, 24, NULL, NULL, 'edit', 95, 96),
(29, 24, NULL, NULL, 'delete', 97, 98),
(30, 1, NULL, NULL, 'AclExtras', 100, 101),
(31, 1, NULL, NULL, 'DebugKit', 102, 103),
(34, 16, NULL, NULL, 'admin_index', 75, 76),
(35, 2, NULL, NULL, 'admin_index', 13, 14),
(36, 2, NULL, NULL, 'admin_view', 15, 16),
(37, 2, NULL, NULL, 'admin_add', 17, 18),
(38, 2, NULL, NULL, 'admin_edit', 19, 20),
(39, 2, NULL, NULL, 'admin_delete', 21, 22),
(40, 10, NULL, NULL, 'admin_index', 37, 38),
(41, 10, NULL, NULL, 'admin_view', 39, 40),
(42, 10, NULL, NULL, 'admin_add', 41, 42),
(43, 10, NULL, NULL, 'admin_edit', 43, 44),
(44, 10, NULL, NULL, 'admin_delete', 45, 46),
(45, 16, NULL, NULL, 'admin_view', 77, 78),
(46, 16, NULL, NULL, 'admin_add', 79, 80),
(47, 16, NULL, NULL, 'admin_edit', 81, 82),
(48, 16, NULL, NULL, 'admin_delete', 83, 84),
(49, 16, NULL, NULL, 'admin_login', 85, 86),
(50, 1, NULL, NULL, 'Comments', 104, 125),
(51, 50, NULL, NULL, 'index', 105, 106),
(52, 50, NULL, NULL, 'view', 107, 108),
(53, 50, NULL, NULL, 'add', 109, 110),
(54, 50, NULL, NULL, 'edit', 111, 112),
(55, 50, NULL, NULL, 'delete', 113, 114),
(56, 50, NULL, NULL, 'admin_index', 115, 116),
(57, 50, NULL, NULL, 'admin_view', 117, 118),
(58, 50, NULL, NULL, 'admin_add', 119, 120),
(59, 50, NULL, NULL, 'admin_edit', 121, 122),
(60, 50, NULL, NULL, 'admin_delete', 123, 124),
(61, 1, NULL, NULL, 'Subjects', 126, 147),
(62, 61, NULL, NULL, 'index', 127, 128),
(63, 61, NULL, NULL, 'view', 129, 130),
(64, 61, NULL, NULL, 'add', 131, 132),
(65, 61, NULL, NULL, 'edit', 133, 134),
(66, 61, NULL, NULL, 'delete', 135, 136),
(67, 61, NULL, NULL, 'admin_index', 137, 138),
(68, 61, NULL, NULL, 'admin_view', 139, 140),
(69, 61, NULL, NULL, 'admin_add', 141, 142),
(70, 61, NULL, NULL, 'admin_edit', 143, 144),
(71, 61, NULL, NULL, 'admin_delete', 145, 146),
(72, 1, NULL, NULL, 'Orders', 148, 171),
(73, 72, NULL, NULL, 'index', 149, 150),
(74, 72, NULL, NULL, 'view', 151, 152),
(75, 72, NULL, NULL, 'add', 153, 154),
(76, 72, NULL, NULL, 'edit', 155, 156),
(77, 72, NULL, NULL, 'delete', 157, 158),
(78, 72, NULL, NULL, 'admin_index', 159, 160),
(79, 72, NULL, NULL, 'admin_view', 161, 162),
(80, 72, NULL, NULL, 'admin_add', 163, 164),
(81, 72, NULL, NULL, 'admin_edit', 165, 166),
(82, 72, NULL, NULL, 'admin_delete', 167, 168),
(84, 72, NULL, NULL, 'preview', 169, 170),
(96, 1, NULL, NULL, 'Conditions', 172, 193),
(97, 96, NULL, NULL, 'index', 173, 174),
(98, 96, NULL, NULL, 'admin_index', 175, 176),
(99, 96, NULL, NULL, 'view', 177, 178),
(100, 96, NULL, NULL, 'admin_view', 179, 180),
(101, 96, NULL, NULL, 'add', 181, 182),
(102, 96, NULL, NULL, 'admin_add', 183, 184),
(103, 96, NULL, NULL, 'edit', 185, 186),
(104, 96, NULL, NULL, 'admin_edit', 187, 188),
(105, 96, NULL, NULL, 'delete', 189, 190),
(106, 96, NULL, NULL, 'admin_delete', 191, 192),
(107, 1, NULL, NULL, 'Requirements', 194, 213),
(108, 107, NULL, NULL, 'index', 195, 196),
(110, 107, NULL, NULL, 'view', 197, 198),
(112, 107, NULL, NULL, 'add', 199, 200),
(114, 107, NULL, NULL, 'edit', 201, 202),
(116, 107, NULL, NULL, 'delete', 203, 204),
(118, 1, NULL, NULL, 'FirstConditions', 214, 235),
(119, 118, NULL, NULL, 'index', 215, 216),
(120, 118, NULL, NULL, 'admin_index', 217, 218),
(121, 118, NULL, NULL, 'view', 219, 220),
(122, 118, NULL, NULL, 'admin_view', 221, 222),
(123, 118, NULL, NULL, 'add', 223, 224),
(124, 118, NULL, NULL, 'admin_add', 225, 226),
(125, 118, NULL, NULL, 'edit', 227, 228),
(126, 118, NULL, NULL, 'admin_edit', 229, 230),
(127, 118, NULL, NULL, 'delete', 231, 232),
(128, 118, NULL, NULL, 'admin_delete', 233, 234),
(129, 1, NULL, NULL, 'ExtraRequirements', 236, 255),
(130, 129, NULL, NULL, 'index', 237, 238),
(131, 129, NULL, NULL, 'admin_index', 239, 240),
(132, 129, NULL, NULL, 'view', 241, 242),
(133, 129, NULL, NULL, 'add', 243, 244),
(134, 129, NULL, NULL, 'admin_add', 245, 246),
(135, 129, NULL, NULL, 'edit', 247, 248),
(136, 129, NULL, NULL, 'admin_edit', 249, 250),
(137, 129, NULL, NULL, 'delete', 251, 252),
(138, 129, NULL, NULL, 'admin_delete', 253, 254),
(140, 10, NULL, NULL, 'msf_setup', 47, 48),
(141, 10, NULL, NULL, 'msf_step', 49, 50),
(142, 1, NULL, NULL, 'Profiles', 256, 281),
(143, 142, NULL, NULL, 'index', 257, 258),
(144, 142, NULL, NULL, 'admin_index', 259, 260),
(145, 142, NULL, NULL, 'view', 261, 262),
(146, 142, NULL, NULL, 'admin_view', 263, 264),
(147, 142, NULL, NULL, 'add', 265, 266),
(148, 142, NULL, NULL, 'admin_add', 267, 268),
(149, 142, NULL, NULL, 'edit', 269, 270),
(150, 142, NULL, NULL, 'admin_edit', 271, 272),
(151, 142, NULL, NULL, 'delete', 273, 274),
(152, 142, NULL, NULL, 'admin_delete', 275, 276),
(155, 1, NULL, NULL, 'Between', 282, 283),
(156, 142, NULL, NULL, 'msf_setup', 277, 278),
(157, 142, NULL, NULL, 'msf_step', 279, 280),
(158, 107, NULL, NULL, 'admin_view', 205, 206),
(159, 107, NULL, NULL, 'admin_add', 207, 208),
(160, 107, NULL, NULL, 'admin_edit', 209, 210),
(161, 107, NULL, NULL, 'admin_delete', 211, 212),
(162, 10, NULL, NULL, 'home', 51, 52),
(163, 10, NULL, NULL, 'msf_index', 53, 54),
(164, 10, NULL, NULL, 'private_view', 55, 56),
(165, 10, NULL, NULL, 'student', 57, 58);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4),
(3, NULL, 'Group', 3, NULL, 5, 6),
(4, NULL, 'Group', 4, NULL, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 10, '1', '1', '1', '1'),
(4, 2, 24, '1', '1', '1', '1'),
(5, 3, 1, '-1', '-1', '-1', '-1'),
(7, 3, 14, '1', '1', '1', '1'),
(8, 3, 27, '1', '1', '1', '1'),
(9, 3, 28, '1', '1', '1', '1'),
(10, 3, 23, '1', '1', '1', '1'),
(11, 4, 1, '-1', '-1', '-1', '-1'),
(13, 4, 14, '-1', '-1', '-1', '-1'),
(14, 4, 27, '1', '1', '1', '1'),
(15, 4, 28, '-1', '-1', '-1', '-1'),
(16, 4, 23, '1', '1', '1', '1'),
(17, 2, 23, '1', '1', '1', '1'),
(18, 2, 42, '-1', '-1', '-1', '-1'),
(19, 2, 43, '-1', '-1', '-1', '-1'),
(20, 2, 40, '-1', '-1', '-1', '-1'),
(21, 2, 41, '-1', '-1', '-1', '-1'),
(22, 3, 140, '1', '1', '1', '1'),
(23, 3, 156, '1', '1', '1', '1'),
(24, 3, 84, '1', '1', '1', '1'),
(25, 3, 74, '1', '1', '1', '1'),
(26, 3, 165, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE `cds` (
  `titel` varchar(200) DEFAULT NULL,
  `interpret` varchar(200) DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `frequency_not_ok` tinyint(4) NOT NULL DEFAULT '0',
  `frequency_remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration_remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_not_ok` tinyint(4) DEFAULT NULL,
  `rate_remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_remarks_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qualification_remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_locked` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `frequency_not_ok`, `frequency_remarks`, `duration_remarks`, `rate_not_ok`, `rate_remarks`, `rate_remarks_unit`, `tag1`, `tag2`, `qualification_remarks`, `tutor_type`, `tutor_gender`, `is_locked`, `created`, `modified`) VALUES
(7, 5, 8, 1, NULL, NULL, NULL, '1', '/hr', '', '', '', '全職補習導師', '男', 0, '2015-09-03 23:18:45', '2015-09-03 23:18:45'),
(8, 5, 8, 1, NULL, NULL, NULL, '1', '/hr', '', '', '', '全職補習導師', '男', 0, '2015-09-03 23:26:18', '2015-09-03 23:26:18'),
(9, 5, 8, 1, NULL, NULL, NULL, '1', '/hr', '', '', '', '全職補習導師', '男', 0, '2015-09-03 23:26:51', '2015-09-03 23:26:51'),
(10, 5, 8, 1, NULL, NULL, NULL, '1', '/hr', '', '', '', '全職補習導師', '男', 0, '2015-09-03 23:29:35', '2015-09-03 23:29:35'),
(11, 5, 8, 1, NULL, NULL, NULL, '1', '/hr', '', '', '', '全職補習導師', '男', 0, '2015-09-03 23:29:52', '2015-09-03 23:29:52'),
(12, 5, 8, 1, NULL, NULL, NULL, '1', '/hr', '', '', '', '全職補習導師', '男', 0, '2015-09-04 00:39:11', '2015-09-04 00:39:11'),
(13, 5, 8, 1, NULL, NULL, NULL, '1', '/hr', '', '', '', '全職補習導師', '男', 0, '2015-09-04 00:45:46', '2015-09-04 00:45:46'),
(14, 5, 8, 1, NULL, NULL, NULL, '1', '/hr', '', '', '', '全職補習導師', '男', 0, '2015-09-04 00:46:22', '2015-09-04 00:46:22'),
(45, 5, 9, 0, NULL, NULL, 0, NULL, NULL, '港大法律系畢業', 'Eng 5**', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus.\n\n', '全職補習導師', '男', 1, '2015-09-10 17:50:59', '2015-10-04 19:34:37'),
(46, 5, 8, 1, '', '', 0, '500', '/hr', 'werwe', 'wer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus.', '全職補習導師', '男', 0, '2015-09-28 19:10:54', '2015-09-28 19:10:54'),
(47, 5, 9, 1, '1', '1.5', 1, '500', NULL, 'werwer', 'werwer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus.', '全職補習導師', '男', 0, '2015-09-28 19:16:04', '2015-09-28 19:16:04'),
(48, 5, 9, 0, NULL, NULL, 1, '345', NULL, '34345', '34534', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus.', '全職補習導師', '男', 0, '2015-09-28 19:27:08', '2015-09-28 19:27:08'),
(49, 5, 9, 0, NULL, NULL, 1, '555', '/hr', 'wer', 'wer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus.', '全職補習導師', '男', 0, '2015-09-28 19:33:56', '2015-09-28 19:33:56'),
(50, 5, 9, 0, NULL, NULL, 0, NULL, '/hr', '234', '234', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus.', '全職補習導師', '男', 0, '2015-09-28 20:57:44', '2015-09-28 20:57:44'),
(51, 7, 15, 0, NULL, NULL, NULL, '123', '/hr', '123', '123', '123', '大學程度', '男', 0, '2015-11-08 17:58:30', '2015-11-08 17:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `week` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `post_id`, `week`, `start`, `end`) VALUES
(1, 8, '逢星期一至五', '03:09:00', '03:09:00'),
(2, 9, '逢星期一至五', '05:00:00', '06:30:00'),
(3, 9, '逢星期一至五', '08:00:00', '09:00:00'),
(4, 10, '逢星期六日', '09:00:00', '12:00:00'),
(5, 10, '逢星期二四', '02:00:00', '04:00:00'),
(6, 11, '逢星期一至五', '10:53:00', '12:23:00'),
(7, 12, '每日', '10:58:00', '12:28:00'),
(8, 13, '逢星期一三五', '07:11:00', '11:11:00'),
(9, 14, '逢星期一三五', '02:45:00', '10:45:00'),
(10, 15, '逢星期一至五', '05:49:00', '11:19:00'),
(11, 16, '逢星期二四', '09:52:00', '11:22:00'),
(12, 17, '逢星期一至五', '08:54:00', '11:54:00'),
(13, 18, '逢星期一至五', '09:55:00', '11:55:00'),
(14, 19, '每日', '09:02:00', '11:32:00'),
(15, 20, '逢星期二四', '07:11:00', '11:41:00'),
(16, 21, '逢星期一三五', '09:22:00', '11:52:00'),
(17, 22, '逢星期一三五', '05:23:00', '11:53:00'),
(18, 23, '逢星期二四', '06:26:00', '11:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `extra_requirements`
--

CREATE TABLE `extra_requirements` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `extra_requirements`
--

INSERT INTO `extra_requirements` (`id`, `post_id`, `name`) VALUES
(1, 9, 'Must be patient'),
(2, 9, 'HAHAHAHAHA');

-- --------------------------------------------------------

--
-- Table structure for table `first_conditions`
--

CREATE TABLE `first_conditions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `week` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` time(6) NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `first_conditions`
--

INSERT INTO `first_conditions` (`id`, `post_id`, `week`, `start`, `end`) VALUES
(1, 9, '星期六', '11:00:00.000000', '05:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'administrators', '2015-07-30 12:01:24', '2015-07-30 12:01:24'),
(2, 'managers', '2015-07-30 12:01:30', '2015-07-30 12:01:30'),
(3, 'tutors', '2015-07-30 12:01:35', '2015-07-30 13:38:20'),
(4, 'students', '2015-07-30 13:38:36', '2015-07-30 13:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `full_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel1` int(20) NOT NULL,
  `tel2` int(20) DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_reference`, `student_id`, `tutor_id`, `full_address`, `email`, `tel1`, `tel2`, `contact_person`, `status`, `is_confirmed`, `created`, `modified`) VALUES
(1, 'LHPL044', 9, 3, '11', '', 92139143, 12345678, '11', 1, 1, '2015-09-03 18:28:04', '2015-09-05 19:52:09'),
(2, 'LHPL048', 9, 45, '123', 'abc@abc.com', 12312312, 12312312, 'Alvin', 0, 0, '2015-10-04 19:34:37', '2015-10-04 19:34:37');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `tg_orders_insert` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
  INSERT INTO orders_seq VALUES (NULL);
  SET NEW.transaction_reference = CONCAT('LHPL', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_seq`
--

CREATE TABLE `orders_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders_seq`
--

INSERT INTO `orders_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home_tel` int(255) DEFAULT NULL,
  `mobile` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_grade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `student_number` int(11) DEFAULT NULL,
  `frequency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first` date NOT NULL,
  `is_specific` tinyint(4) NOT NULL DEFAULT '0',
  `body` text COLLATE utf8_unicode_ci,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `how` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agree` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_ordered` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `contact_person`, `home_tel`, `mobile`, `email`, `student_grade`, `student_number`, `frequency`, `duration`, `first`, `is_specific`, `body`, `district`, `estate`, `rate`, `rate_unit`, `tutor_type`, `tutor_gender`, `how`, `agree`, `created`, `modified`, `is_ordered`) VALUES
(8, 1, '', 'Alvin', NULL, 92139143, 'admin', 'K1', 0, '3', '1.5', '2015-08-20', 0, NULL, '半山', 'q', '導師自訂', '/每小時', '', '', '', 1, '2015-08-20 07:09:57', '2015-08-20 07:09:57', 0),
(9, 5, '', '', NULL, 92139143, 'admin', '中六', NULL, '2', '1.5', '2015-09-29', 0, NULL, '沙田', 'Castello', '200', '/每小時', '現職教師／全職補習導師', '男', 'Google', 1, '2015-08-29 08:27:21', '2015-10-04 19:34:37', 1),
(10, 1, '', '', NULL, 92139143, 'admin', '中六', NULL, '4', '1.5', '2015-09-03', 0, NULL, '薄扶林', '1', '導師自訂', '/hr', '現職教師／全職補習導師', '', '', 1, '2015-09-03 06:57:31', '2015-09-03 06:57:31', 0),
(11, 1, '', '', NULL, 92139143, 'chun.alvinmok@gmail.com', '小三', 4, '2', '1.5', '2015-09-10', 0, NULL, '半山', '1', '導師自訂', '/hr', '大學程度／大學畢業', '', '', 1, '2015-09-10 22:54:14', '2015-09-10 22:54:14', 0),
(12, 1, '', '', NULL, 92139143, 'chun.alvinmok@gmail.com', '幼稚園', 3, '4', '1.5', '2015-09-10', 0, NULL, '薄扶林', '1', '導師自訂', '/hr', '大學程度／大學畢業', '', '', 1, '2015-09-10 22:58:38', '2015-09-10 22:58:38', 0),
(13, 1, '', '', NULL, 92139143, 'chun.alvinmok@gmail.com', 'Pre-School', 4, '4', '1', '2015-09-10', 0, NULL, '薄扶林', '1', '導師自訂', '/hr', '大學程度／大學畢業', '', '', 1, '2015-09-10 23:13:49', '2015-09-10 23:13:49', 0),
(14, 1, '', '', NULL, 0, 'chun.alvinmok@gmail.com', '幼稚園', 4, '3', '2', '2015-09-10', 0, NULL, '薄扶林', '1', '導師自訂', '/hr', '大學程度／大學畢業', '', '', 1, '2015-09-10 23:47:41', '2015-09-10 23:47:41', 0),
(15, 5, '', '', NULL, 0, 'chun.alvinmok@gmail.com', 'Pre-School', NULL, '4', '1.5', '2015-09-10', 0, NULL, '西環', '1', '導師自訂', '/hr', '現職教師／全職補習導師', '', '', 1, '2015-09-10 23:49:55', '2015-09-10 23:49:55', 0),
(16, 1, '', '', NULL, 0, 'chun.alvinmok@gmail.com', 'Pre-School', NULL, '3', '1.5', '2015-09-10', 0, NULL, '薄扶林', '6', '導師自訂', '/hr', '應屆DSE考生', '', '', 1, '2015-09-10 23:52:58', '2015-09-10 23:52:58', 0),
(17, 1, '', '', NULL, 0, 'chun.alvinmok@gmail.com', 'Pre-School', NULL, '2', '1', '2015-09-10', 0, NULL, '半山', '888', '導師自訂', '/hr', '應屆DSE考生', '', '', 1, '2015-09-10 23:54:17', '2015-09-10 23:54:17', 0),
(18, 1, '', '', NULL, 0, 'chun.alvinmok@gmail.com', '小一', NULL, '3', '1', '2015-09-10', 0, NULL, '半山', '77', '導師自訂', '/hr', '大學程度／大學畢業', '', '', 1, '2015-09-10 23:56:11', '2015-09-10 23:56:11', 0),
(19, 1, '', '', NULL, 0, 'chun.alvinmok@gmail.com', '小一', NULL, '2', '1.5', '2015-09-11', 0, NULL, '薄扶林', '1', '導師自訂', '/hr', '大學程度／大學畢業', '', '', 1, '2015-09-11 00:02:59', '2015-09-11 00:02:59', 0),
(20, 1, '', '', NULL, 0, 'chun.alvinmok@gmail.com', '幼稚園', NULL, '2', '1.5', '2015-09-11', 0, NULL, '西環', '1', '導師自訂', '/hr', '外籍導師', '', '', 1, '2015-09-11 00:19:40', '2015-09-11 00:19:40', 0),
(21, 1, '', '', NULL, 0, 'chun.alvinmok@gmail.com', '幼稚園', NULL, '3', '1.5', '2015-09-11', 0, NULL, '薄扶林', 'q', '導師自訂', '/hr', '應屆DSE考生', '', '', 1, '2015-09-11 00:22:21', '2015-09-11 00:22:21', 0),
(22, 1, '', '', NULL, 0, 'chun.alvinmok@gmail.com', '幼稚園', NULL, '2', '1.5', '2015-09-11', 0, NULL, '半山', '1', '導師自訂', '/hr', '大學程度／大學畢業', '', '', 1, '2015-09-11 00:23:33', '2015-09-11 00:23:33', 0),
(23, 1, '', '', NULL, 0, 'chun.alvinmok@gmail.com', '幼稚園', NULL, '4', '2', '2015-09-11', 0, NULL, '半山', 'q', '導師自訂', '/hr', '大學程度／大學畢業', '', '', 1, '2015-09-11 00:26:28', '2015-09-11 00:26:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts_subjects`
--

CREATE TABLE `posts_subjects` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts_subjects`
--

INSERT INTO `posts_subjects` (`id`, `post_id`, `subject_id`) VALUES
(12, 8, 2),
(13, 8, 76),
(14, 9, 3),
(15, 10, 2),
(16, 11, 33),
(17, 12, 33),
(18, 13, 32),
(19, 14, 32),
(20, 15, 33),
(21, 16, 32),
(22, 17, 33),
(23, 18, 32),
(24, 19, 32),
(25, 20, 33),
(26, 21, 32),
(27, 22, 32),
(28, 23, 33);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_year` int(11) NOT NULL,
  `identity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_type_education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_type_music` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tutor_type_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `how` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agree` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `full_name_en`, `full_name_chi`, `nickname`, `gender`, `birth_year`, `identity`, `district`, `estate`, `address`, `tutor_type`, `tutor_type_education`, `tutor_type_music`, `tutor_type_language`, `tag`, `how`, `agree`) VALUES
(1, 5, 'Alvin', '中文', '', '男', 1987, '1111111', '藍田', '1', '1', '全職補習導師', '博士學位', '', '', '123', '舊有用戶，再次找尋導師', 1),
(2, 7, '123', '123', '', '男', 1960, '123', '半山', '1', '1', '大學程度', '大學畢業', '', '', '1', '', 1),
(3, 10, '333', '333', '', '男', 1962, '33', '西環', '33', '33', '大學程度', '大學生', '', '', '33', 'Google', 1),
(4, 11, 't', 't', '', '女', 1962, '4', '薄扶林', '4', '4', '大學程度', '高中畢業（DSE）', '', '', '4', 'Yahoo!', 1),
(5, 24, '2', '2', '', '女', 1962, '1', '半山', '1', '1', '大學畢業', '大學生', '', '', '1', 'Yahoo!', 1),
(6, 24, '2', '2', '', '女', 1962, '1', '半山', '1', '1', '大學畢業', '大學生', '', '', '1', 'Yahoo!', 1),
(7, 24, '2', '2', '', '女', 1962, '1', '半山', '1', '1', '大學畢業', '大學生', '', '', '1', 'Yahoo!', 1),
(8, 24, '2', '2', '', '女', 1962, '1', '半山', '1', '1', '大學畢業', '大學生', '', '', '1', 'Yahoo!', 1),
(9, 24, '2', '2', '', '女', 1962, '1', '半山', '1', '1', '大學畢業', '大學生', '', '', '1', 'Yahoo!', 1),
(10, 30, '123', '123', '', '女', 1962, '3333', '薄扶林', '11', '1', '大學畢業', '高中畢業（DSE）', '', '', '1', 'Facebook', 1),
(11, 30, '123', '123', '', '女', 1962, '3333', '薄扶林', '11', '1', '大學畢業', '高中畢業（DSE）', '', '', '1', 'Yahoo!', 1),
(12, 35, 'qwe', 'qwe', '', '女', 1962, '1', '半山', '1', '1', '大學畢業', '大學畢業', '', '', '1', 'Yahoo!', 1),
(13, 38, '123', '123', '', '女', 1963, '22', '薄扶林', '1', '1', '大學畢業', '大學畢業', '', '', '1', 'Yahoo!', 1),
(14, 38, '123', '123', '', '女', 1963, '22', '薄扶林', '1', '1', '大學畢業', '大學畢業', '', '', '1', '舊有用戶，再次找尋導師', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles_subjects`
--

CREATE TABLE `profiles_subjects` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles_subjects`
--

INSERT INTO `profiles_subjects` (`id`, `profile_id`, `subject_id`) VALUES
(1, 1, 31),
(2, 2, 32);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `post_id`, `name`) VALUES
(1, 10, '0'),
(2, 10, '0'),
(3, 11, '0'),
(4, 11, '0'),
(5, 12, '0'),
(6, 12, '0'),
(7, 13, '0'),
(8, 13, '0'),
(9, 14, '0'),
(10, 14, '0'),
(11, 15, '0'),
(12, 15, '0'),
(13, 16, '0'),
(14, 16, '0'),
(15, 17, '0'),
(16, 17, '0'),
(17, 18, '0'),
(18, 18, '0'),
(19, 19, '0'),
(20, 19, '0'),
(21, 20, '0'),
(22, 20, '0'),
(23, 21, '0'),
(24, 21, '0'),
(25, 22, '0'),
(26, 22, '0'),
(27, 23, '0'),
(28, 23, '0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `grade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `post_id`, `grade`, `number`) VALUES
(1, 8, 'K2', '男'),
(2, 8, '中一', '男');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `catno` int(11) NOT NULL,
  `cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `catno`, `cat`) VALUES
(1, '全科', 1, '中學（初中及DSE）'),
(2, '中文', 1, '中學（初中及DSE）'),
(3, '英文', 1, '中學（初中及DSE）'),
(4, '數學', 1, '中學（初中及DSE）'),
(5, '數學（M1）', 1, '中學（初中及DSE）'),
(6, '數學（M2）', 1, '中學（初中及DSE）'),
(7, '中國文學', 1, '中學（初中及DSE）'),
(8, '英國文學', 1, '中學（初中及DSE）'),
(9, '中國歷史', 1, '中學（初中及DSE）'),
(10, '世界歷史', 1, '中學（初中及DSE）'),
(11, '地理', 1, '中學（初中及DSE）'),
(12, '通識', 1, '中學（初中及DSE）'),
(13, '綜合科學', 1, '中學（初中及DSE）'),
(14, '綜合人民', 1, '中學（初中及DSE）'),
(15, '附加數學', 1, '中學（初中及DSE）'),
(16, '純粹數學', 1, '中學（初中及DSE）'),
(17, '應用數學', 1, '中學（初中及DSE）'),
(18, '物理', 1, '中學（初中及DSE）'),
(19, '生物', 1, '中學（初中及DSE）'),
(20, '化學', 1, '中學（初中及DSE）'),
(21, '商業', 1, '中學（初中及DSE）'),
(22, '會計', 1, '中學（初中及DSE）'),
(23, '經濟', 1, '中學（初中及DSE）'),
(24, '企業概論', 1, '中學（初中及DSE）'),
(25, '政府及公共事務', 1, '中學（初中及DSE）'),
(26, '統計學', 1, '中學（初中及DSE）'),
(27, 'BAFS', 1, '中學（初中及DSE）'),
(28, '電腦', 1, '中學（初中及DSE）'),
(29, '全科', 0, '小學'),
(30, '中文', 0, '小學'),
(31, '英文', 0, '小學'),
(32, '數學', 0, '小學'),
(33, '常識', 0, '小學'),
(34, 'Cambridge YLE Starters', 2, '公開試（除 DSE 及 IB）及會話'),
(35, 'Cambridge YLE Movers', 2, '公開試（除 DSE 及 IB）及會話'),
(36, 'Cambridge YLE Flyers', 2, '公開試（除 DSE 及 IB）及會話'),
(37, 'Cambridge KET', 2, '公開試（除 DSE 及 IB）及會話'),
(38, 'Cambridge PET', 2, '公開試（除 DSE 及 IB）及會話'),
(39, 'Cambridge FCE', 2, '公開試（除 DSE 及 IB）及會話'),
(40, 'Cambridge CAE', 2, '公開試（除 DSE 及 IB）及會話'),
(41, 'Cambridge CPE', 2, '公開試（除 DSE 及 IB）及會話'),
(42, 'Cambridge IELTS', 2, '公開試（除 DSE 及 IB）及會話'),
(43, 'TOEFL', 2, '公開試（除 DSE 及 IB）及會話'),
(44, 'TOEFL Junior', 2, '公開試（除 DSE 及 IB）及會話'),
(45, 'Common Entrance 13+', 2, '公開試（除 DSE 及 IB）及會話'),
(46, 'GCE', 2, '公開試（除 DSE 及 IB）及會話'),
(47, 'GCSE', 2, '公開試（除 DSE 及 IB）及會話'),
(48, 'IB 全科', 3, 'IB MYP/Diploma'),
(49, 'IB 中文', 3, 'IB MYP/Diploma'),
(50, 'IB 中國文學', 3, 'IB MYP/Diploma'),
(51, 'IB 英文', 3, 'IB MYP/Diploma'),
(52, 'IB 英國文學', 3, 'IB MYP/Diploma'),
(53, 'IB 數學', 3, 'IB MYP/Diploma'),
(54, 'IB 歷史', 3, 'IB MYP/Diploma'),
(55, 'IB 地理', 3, 'IB MYP/Diploma'),
(56, 'IB 經濟', 3, 'IB MYP/Diploma'),
(57, 'IB 哲學', 3, 'IB MYP/Diploma'),
(58, 'IB 心理學', 3, 'IB MYP/Diploma'),
(59, 'IB 電腦', 3, 'IB MYP/Diploma'),
(60, 'IB 科學', 3, 'IB MYP/Diploma'),
(61, 'IB 物理', 3, 'IB MYP/Diploma'),
(62, 'IB 化學', 3, 'IB MYP/Diploma'),
(63, 'IB 生物', 3, 'IB MYP/Diploma'),
(64, 'IB 環境系統', 3, 'IB MYP/Diploma'),
(65, 'IB 藝術/美術設計', 3, 'IB MYP/Diploma'),
(66, 'IB 音樂', 3, 'IB MYP/Diploma'),
(67, 'IB 戲劇藝術', 3, 'IB MYP/Diploma'),
(68, 'IB 拓展論文（EE）', 3, 'IB MYP/Diploma'),
(69, 'IB 知識論文（TOK）', 3, 'IB MYP/Diploma'),
(70, '普通話', 2, '公開試（除 DSE 及 IB）及會話'),
(71, '廣東話', 2, '公開試（除 DSE 及 IB）及會話'),
(72, '英語會話', 2, '公開試（除 DSE 及 IB）及會話'),
(73, '日語', 2, '公開試（除 DSE 及 IB）及會話'),
(74, '韓語', 2, '公開試（除 DSE 及 IB）及會話'),
(75, '法語', 2, '公開試（除 DSE 及 IB）及會話'),
(76, '意大利語', 2, '公開試（除 DSE 及 IB）及會話'),
(77, '德語', 2, '公開試（除 DSE 及 IB）及會話'),
(78, '西班牙語', 2, '公開試（除 DSE 及 IB）及會話'),
(79, 'Phonics/英文拼音', 2, '公開試（除 DSE 及 IB）及會話'),
(80, 'Trinity GESE', 2, '公開試（除 DSE 及 IB）及會話');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `name`) VALUES
('LHPL001', 'Jhon'),
('LHPL002', 'Mark'),
('LHPL003', 'Name');

--
-- Triggers `table1`
--
DELIMITER $$
CREATE TRIGGER `tg_table1_insert` BEFORE INSERT ON `table1` FOR EACH ROW BEGIN
  INSERT INTO table1_seq VALUES (NULL);
  SET NEW.id = CONCAT('LHPL', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `table1_seq`
--

CREATE TABLE `table1_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table1_seq`
--

INSERT INTO `table1_seq` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

CREATE TABLE `test1` (
  `id` int(11) NOT NULL,
  `tid` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test1`
--

INSERT INTO `test1` (`id`, `tid`, `name`) VALUES
(1, 'LHPL005', 'name');

--
-- Triggers `test1`
--
DELIMITER $$
CREATE TRIGGER `tg_test1_insert` BEFORE INSERT ON `test1` FOR EACH ROW BEGIN
  INSERT INTO test1_seq VALUES (NULL);
  SET NEW.tid = CONCAT('LHPL', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `test1_seq`
--

CREATE TABLE `test1_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test1_seq`
--

INSERT INTO `test1_seq` (`id`) VALUES
(5);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `profile_id`, `topic`, `min`, `max`) VALUES
(2, 3, '29', 2, 3),
(3, 9, '29', 1, 2),
(4, 10, '29', 2, 5),
(5, 11, '29', 2, 5),
(6, 12, '29', 1, 2),
(7, 13, '29', 2, 3),
(8, 14, '29', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` int(20) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `is_student` tinyint(4) NOT NULL DEFAULT '0',
  `is_tutor` tinyint(4) NOT NULL DEFAULT '0',
  `default_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `contact_person`, `mobile`, `group_id`, `is_student`, `is_tutor`, `default_role`, `created`, `modified`) VALUES
(1, 'chun.alvinmok@gmail.com', '123', 'Alvin', 12345678, 1, 1, 0, 'student', '2015-07-30 12:01:45', '2016-07-09 15:19:48'),
(2, 'manager', '5b50461d14eab867094b49b8d2e2452fbb01c355', 'manager', 12345679, 2, 1, 1, 'student', '2015-07-30 12:01:55', '2015-07-30 12:01:55'),
(3, 'tutor', '5062132615c60fb4550189a57596e6ac7bc03b3e', 'tutor', 12245678, 3, 0, 1, 'tutor', '2015-07-30 12:02:04', '2015-07-31 16:07:56'),
(4, 'student', '01344a7dfec110af2b6efd1d93b9dcfa309dc12b', 'student', 12745678, 3, 1, 0, 'student', '2015-07-30 22:54:30', '2015-07-31 04:14:59'),
(5, 'abc@abc.com', 'ad6e31e0f13095fb1bc3ed9d9fcc402251e00724', 'Alvin', 12345670, 3, 1, 1, 'student', '2015-09-02 10:20:09', '2015-09-02 10:20:09'),
(7, 'abc2@abc.com', 'ad6e31e0f13095fb1bc3ed9d9fcc402251e00724', 'Test', 33333333, 3, 0, 1, 'tutor', '2015-09-11 00:39:21', '2015-11-08 17:58:04'),
(8, 'cba@cba.com', 'ad6e31e0f13095fb1bc3ed9d9fcc402251e00724', 'Alvin', 0, 3, 1, 0, 'student', '2015-09-17 10:56:40', '2015-09-17 10:56:40'),
(9, 'abc@tutor.com', '166c3e0f346a292300b079d0d770c7715ed16daf', 'Peter', NULL, 3, 0, 1, 'tutor', '2016-08-30 16:15:50', '2016-08-30 17:33:57'),
(10, '', '6bca2c29e827dffe26ccfef90b4cc189a52e3223', '', 33333333, 0, 0, 0, '', '2016-08-30 17:33:57', '2016-08-30 17:33:57'),
(11, 'ddd@tutor.com', '166c3e0f346a292300b079d0d770c7715ed16daf', 'Dave', NULL, 3, 0, 1, 'tutor', '2016-08-30 18:06:20', '2016-08-30 21:09:34'),
(17, 'ggg@ggg.com', 'abc', 'ggg', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:11:51', '2016-08-30 21:11:51'),
(18, 'ggg@ggdg.com', 'abc', 'gggfff', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:12:21', '2016-08-30 21:12:21'),
(19, 'ggdddddg@ggdg.com', 'abc', 'gggffffff', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:12:37', '2016-08-30 21:12:37'),
(20, 'f@3455.com', '1234', 'Test', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:13:00', '2016-08-30 21:13:00'),
(21, '234234@23423.com', '1234', 'ervrv', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:13:40', '2016-08-30 21:13:40'),
(22, 'ahaha@gmail.com', 'abc', 'Ahaha', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:15:45', '2016-08-30 21:15:45'),
(23, '234234@324234.com', '111', '34234', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:18:27', '2016-08-30 21:18:27'),
(24, 'av@ab.com', '6bca2c29e827dffe26ccfef90b4cc189a52e3223', 'av', 11111111, 3, 0, 1, 'tutor', '2016-08-30 21:25:36', '2016-08-30 21:31:35'),
(26, 'last@last.com', '123', 'Last', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:32:57', '2016-08-30 21:32:57'),
(27, 'last@lasts.com', '9dc7a6113af4297a5f0f2c3d4a2fbf0e6806beff', 'Last', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:35:02', '2016-08-30 21:35:02'),
(28, 'te@te.com', '11', 'te', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:39:56', '2016-08-30 21:39:56'),
(29, 'te@tes.com', '11', 'te', NULL, 3, 0, 1, 'tutor', '2016-08-30 21:41:09', '2016-08-30 21:41:09'),
(30, '11@12345.com', '9dc7a6113af4297a5f0f2c3d4a2fbf0e6806beff', '444', 12333333, 3, 0, 1, 'tutor', '2016-08-30 22:07:01', '2016-08-30 22:10:17'),
(31, 'lala@lala.com', '123', 'lalala', NULL, 3, 0, 1, 'tutor', '2016-08-30 22:10:55', '2016-08-30 22:10:55'),
(32, 'lala@lasla.com', '123', 'lalala', NULL, 3, 0, 1, 'tutor', '2016-08-30 22:11:35', '2016-08-30 22:11:35'),
(33, 'lalahkhk@yahoo.com.hk', '123', 'lalala', NULL, 3, 0, 1, 'tutor', '2016-08-30 22:12:42', '2016-08-30 22:12:42'),
(34, 'lalah21e12ekhk@yahoo.com.hk', '123', 'lalala', NULL, 3, 0, 1, 'tutor', '2016-08-30 22:13:57', '2016-08-30 22:13:57'),
(35, 'yhetrh@rtt.com', '9dc7a6113af4297a5f0f2c3d4a2fbf0e6806beff', '13366', NULL, 3, 0, 1, 'tutor', '2016-08-30 22:39:31', '2016-08-30 22:40:16'),
(36, 'gg@12579.com', '123', 'gg', NULL, 3, 0, 1, 'tutor', '2016-08-30 23:23:29', '2016-08-30 23:23:29'),
(37, 'vw@thg.com', 'abc', 'gg', NULL, 3, 0, 1, 'tutor', '2016-08-30 23:25:05', '2016-08-30 23:25:05'),
(38, 'fff@145.com', '9dc7a6113af4297a5f0f2c3d4a2fbf0e6806beff', 'fff', 12345678, 3, 0, 1, 'tutor', '2016-08-30 23:27:23', '2016-08-30 23:42:39'),
(39, 'chun.alvinmok@me.com', '9dc7a6113af4297a5f0f2c3d4a2fbf0e6806beff', 'Alvin', NULL, 3, 1, 0, 'student', '2017-08-02 00:14:52', '2017-08-02 00:14:52'),
(40, 'chun.alv@gmail.com', 'ad6e31e0f13095fb1bc3ed9d9fcc402251e00724', 'Alvin', NULL, 3, 0, 1, 'tutor', '2017-12-31 19:25:45', '2017-12-31 19:25:45'),
(41, 'dddd@gmail.com', '53061bfeb2c15ef882017a13fe688a7f28e78303', 'fdf', NULL, 3, 1, 0, 'student', '2018-01-18 02:19:23', '2018-01-18 02:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`id`, `user_id`, `order_id`) VALUES
(1, 1, 1),
(2, 5, 1),
(3, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `part_no` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_acos_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_acos_alias` (`alias`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aros_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_aros_alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  ADD KEY `idx_aco_id` (`aco_id`);

--
-- Indexes for table `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_requirements`
--
ALTER TABLE `extra_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_conditions`
--
ALTER TABLE `first_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_seq`
--
ALTER TABLE `orders_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_subjects`
--
ALTER TABLE `posts_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles_subjects`
--
ALTER TABLE `profiles_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1_seq`
--
ALTER TABLE `table1_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test1_seq`
--
ALTER TABLE `test1_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cds`
--
ALTER TABLE `cds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `extra_requirements`
--
ALTER TABLE `extra_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `first_conditions`
--
ALTER TABLE `first_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders_seq`
--
ALTER TABLE `orders_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `posts_subjects`
--
ALTER TABLE `posts_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `profiles_subjects`
--
ALTER TABLE `profiles_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `table1_seq`
--
ALTER TABLE `table1_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `test1`
--
ALTER TABLE `test1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test1_seq`
--
ALTER TABLE `test1_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
