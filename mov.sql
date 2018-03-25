-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 06:34 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mov`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_true` tinyint(1) NOT NULL,
  `votes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answer_comments`
--

CREATE TABLE `answer_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `answer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answer_images`
--

CREATE TABLE `answer_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `answer_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_comments`
--

CREATE TABLE `assignment_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `assignment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_likes`
--

CREATE TABLE `assignment_likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `assignment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datas`
--

CREATE TABLE `datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datas`
--

INSERT INTO `datas` (`id`, `group_id`, `user_id`, `caption`, `type`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 'hhhhhhhhhhhhhhh', 0, '2018-03-21 01:00:00', '2018-03-21 01:00:00'),
(2, 7, 1, 'tttttttttttttt', 1, '2018-03-21 01:00:00', '2018-03-21 01:00:00'),
(3, 7, 1, 'tttttttttttttt', 2, '2018-03-21 01:00:00', '2018-03-21 01:00:00'),
(5, 7, 2, 'test1', 0, '2018-03-23 14:05:46', '2018-03-23 14:05:46'),
(6, 7, 2, 'test2', 1, '2018-03-23 14:10:03', '2018-03-23 14:10:03'),
(7, 7, 2, 'test3', 2, '2018-03-23 14:10:43', '2018-03-23 14:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `data_comments`
--

CREATE TABLE `data_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_comments`
--

INSERT INTO `data_comments` (`id`, `data_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ssssssssss', '2018-03-21 01:00:00', '2018-03-21 01:00:00'),
(2, 1, 2, 'ddddddddddddddddddddddd', '2018-03-21 01:00:00', '2018-03-21 01:00:00'),
(3, 2, 1, 'xxxxxxxxxxxxxxxx', '2018-03-21 01:00:00', '2018-03-21 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_files`
--

CREATE TABLE `data_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_images`
--

CREATE TABLE `data_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_images`
--

INSERT INTO `data_images` (`id`, `data_id`, `img`, `created_at`, `updated_at`) VALUES
(1, 2, '1.jpg', '2018-03-23 14:10:04', '2018-03-23 14:10:04'),
(2, 2, '2.jpg', '2018-03-23 14:10:04', '2018-03-23 14:10:04'),
(3, 6, 'rCrnssLNnl29OFC7H304X92zRG4ebUx4OEmti6pG.jpg', '2018-03-23 14:10:04', '2018-03-23 14:10:04'),
(4, 6, 'iUS4b9O8AgPw1NvyNYCJRAnUX2D8GYoxtbv5Di6i.jpg', '2018-03-23 14:10:04', '2018-03-23 14:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `data_image_contents`
--

CREATE TABLE `data_image_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `data_image_id` int(10) UNSIGNED NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vertices_1_x` int(11) NOT NULL,
  `vertices_1_y` int(11) NOT NULL,
  `vertices_2_x` int(11) NOT NULL,
  `vertices_2_y` int(11) NOT NULL,
  `vertices_3_x` int(11) NOT NULL,
  `vertices_3_y` int(11) NOT NULL,
  `vertices_4_x` int(11) NOT NULL,
  `vertices_4_y` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_image_contents`
--

INSERT INTO `data_image_contents` (`id`, `group_id`, `data_image_id`, `keyword`, `vertices_1_x`, `vertices_1_y`, `vertices_2_x`, `vertices_2_y`, `vertices_3_x`, `vertices_3_y`, `vertices_4_x`, `vertices_4_y`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'hello', 10, 30, 10, 30, 10, 30, 10, 30, NULL, NULL),
(2, 7, 2, 'os', 10, 30, 10, 30, 10, 30, 10, 30, NULL, NULL),
(3, 7, 4, 'os', 10, 30, 10, 30, 10, 30, 10, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_likes`
--

CREATE TABLE `data_likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_likes`
--

INSERT INTO `data_likes` (`id`, `data_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(6, 7, 2, '2018-03-24 09:56:47', '2018-03-24 09:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `data_links`
--

CREATE TABLE `data_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_links`
--

INSERT INTO `data_links` (`id`, `data_id`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://mail.google.com/mail/u/0/', NULL, NULL),
(2, 1, 'https://facebook.com', NULL, NULL),
(3, 5, 'https://www.youtube.com/watch?v=L2QTtdeL3dE', '2018-03-23 14:05:46', '2018-03-23 14:05:46'),
(4, 5, 'https://www.youtube.com/watch?v=L2QTtdeL3dE', '2018-03-23 14:05:46', '2018-03-23 14:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `data_id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 7, 7, 2, NULL, NULL),
(6, 1, 7, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_voices`
--

CREATE TABLE `data_voices` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_id` int(10) UNSIGNED NOT NULL,
  `voice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_voices`
--

INSERT INTO `data_voices` (`id`, `data_id`, `voice`, `created_at`, `updated_at`) VALUES
(1, 3, 'test.mp3', '2018-03-21 23:00:00', '2018-03-21 23:00:00'),
(2, 3, 'tw.wav', '2018-03-21 23:00:00', '2018-03-21 23:00:00'),
(3, 7, '8X9jwNpOUCVEnLwWj1VXyRqXlbA6mviXvX149TYx.mp3', '2018-03-23 14:10:43', '2018-03-23 14:10:43'),
(4, 7, 'E8AWUA5fc16XUB9o6VnR7T7An3A6KvYhGu4lNNVt.wav', '2018-03-23 14:10:44', '2018-03-23 14:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `data_voice_contents`
--

CREATE TABLE `data_voice_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_voice_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_voice_contents`
--

INSERT INTO `data_voice_contents` (`id`, `data_voice_id`, `group_id`, `keyword`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 'os', '10', '20', NULL, NULL),
(2, 4, 7, 'hello', '10', '20', NULL, NULL),
(3, 3, 7, 'os', '10', '20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', NULL, NULL),
(2, 'Computer Science', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_private` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_code`, `name`, `img`, `desc`, `is_private`, `type`, `created_at`, `updated_at`) VALUES
(6, 'sw group 2017', 'Database Group', 'DImbiYRciCCSnCmQ5nFgH3uMC4gm7l0sA4Q1ZQbZ.jpg', 'test test', 1, 1, '2017-11-27 19:43:43', '2017-11-28 13:23:08'),
(7, 'os group 2017', 'Database Group', 'ZKLZW9uuCigc2cYgk7OEYrLO0uxJuOQj4Dl3gZgR.jpg', 'test test', 1, 1, '2018-02-28 15:46:55', '2018-03-23 15:20:34'),
(10, 'os2 group 2017', 'Software Group', 'JklwwRTMywbySHFH9pY1rGON2cmOIFuqovbcxuQC.jpg', 'ugyjyguuhj', 1, 1, '2018-03-05 16:43:43', '2018-03-05 16:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `group_additional_infos`
--

CREATE TABLE `group_additional_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `university_id` int(10) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `grade` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_additional_infos`
--

INSERT INTO `group_additional_infos` (`id`, `group_id`, `university_id`, `faculty_id`, `grade`, `year`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 3, 2017, NULL, NULL),
(2, 7, 1, 1, 4, 2018, NULL, '2018-03-05 16:44:59'),
(3, 10, 1, 2, 4, 2018, '2018-03-05 16:43:43', '2018-03-05 16:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `group_interest_tag`
--

CREATE TABLE `group_interest_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `interest_tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_interest_tag`
--

INSERT INTO `group_interest_tag` (`id`, `group_id`, `interest_tag_id`, `created_at`, `updated_at`) VALUES
(11, 6, 1, NULL, NULL),
(12, 6, 2, NULL, NULL),
(13, 6, 4, NULL, NULL),
(14, 7, 1, NULL, NULL),
(15, 7, 2, NULL, NULL),
(16, 7, 4, NULL, NULL),
(17, 10, 1, NULL, NULL),
(18, 10, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `group_id`, `user_id`, `role`, `is_banned`, `created_at`, `updated_at`) VALUES
(9, 6, 2, 0, 0, NULL, NULL),
(12, 7, 2, 2, 0, NULL, NULL),
(13, 10, 2, 2, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interest_tags`
--

CREATE TABLE `interest_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interest_tags`
--

INSERT INTO `interest_tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'Programming', '2017-10-28 22:00:00', '2017-10-28 22:00:00'),
(2, 'Software Engineering', '2017-10-28 22:00:00', '2017-10-28 22:00:00'),
(3, 'Database', NULL, NULL),
(4, 'IoT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interest_tag_user`
--

CREATE TABLE `interest_tag_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `interest_tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interest_tag_user`
--

INSERT INTO `interest_tag_user` (`id`, `user_id`, `interest_tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lounges`
--

CREATE TABLE `lounges` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lounges`
--

INSERT INTO `lounges` (`id`, `group_id`, `user_id`, `caption`, `type`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'dddddddddd', 2, '2018-03-01 02:35:27', '2018-02-28 20:00:27'),
(4, 7, 2, 'test', 0, '2018-03-04 11:04:21', '2018-03-04 11:04:21'),
(7, 7, 2, 'test', 2, '2018-03-04 11:09:16', '2018-03-04 11:09:16'),
(8, 7, 2, 'test', 1, '2018-03-04 11:10:24', '2018-03-04 11:10:24'),
(9, 7, 2, 'test2', 1, '2018-03-04 11:12:06', '2018-03-04 11:12:06'),
(10, 7, 2, 'test2', 1, '2018-03-23 15:20:34', '2018-03-23 15:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `lounge_comments`
--

CREATE TABLE `lounge_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `lounge_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lounge_comments`
--

INSERT INTO `lounge_comments` (`id`, `lounge_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ddddddddddddd', '2018-03-02 00:10:32', '2018-03-02 00:10:32'),
(2, 1, 2, 'hhhhhhhhhhh', '2018-03-02 00:10:32', '2018-03-02 00:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `lounge_images`
--

CREATE TABLE `lounge_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `lounge_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lounge_images`
--

INSERT INTO `lounge_images` (`id`, `lounge_id`, `img`, `created_at`, `updated_at`) VALUES
(3, 8, 'EULIQECdM0trSAZYMEF5aIhxA2CnTH6XTmDjdSDi.jpg', '2018-03-04 11:10:25', '2018-03-04 11:10:25'),
(4, 8, 'PqIVScUR0xvJvHlIgj1vbASxJeGQsdaeMWrs1oFb.jpg', '2018-03-04 11:10:25', '2018-03-04 11:10:25'),
(5, 9, 'WpOvJLsDEr1wJB6nu87BpIZV9UTsAXU5yiixs6Nj.jpg', '2018-03-04 11:12:06', '2018-03-04 11:12:06'),
(6, 9, 'k2FKRQcgdWW6fwv14BUMX9mwLvXnsGqOynlETEMI.jpg', '2018-03-04 11:12:06', '2018-03-04 11:12:06'),
(7, 10, 'WcAbt1kh7zcmg4WuXLH6emi95kFTuZJzwbayclUY.jpg', '2018-03-23 15:20:34', '2018-03-23 15:20:34'),
(8, 10, 'Cq8SAWtfeQbVghbp7IEBEdvLy3JKcPVYcdTksUvS.jpg', '2018-03-23 15:20:34', '2018-03-23 15:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `lounge_likes`
--

CREATE TABLE `lounge_likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `lounge_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lounge_likes`
--

INSERT INTO `lounge_likes` (`id`, `lounge_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-03-02 00:10:32', '2018-03-02 00:10:32'),
(2, 1, 2, '2018-03-02 00:10:32', '2018-03-02 00:10:32'),
(5, 7, 2, '2018-03-05 19:45:09', '2018-03-05 19:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `lounge_poll_options`
--

CREATE TABLE `lounge_poll_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `lounge_id` int(10) UNSIGNED NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lounge_poll_options`
--

INSERT INTO `lounge_poll_options` (`id`, `lounge_id`, `option`, `created_at`, `updated_at`) VALUES
(1, 1, 'op 1', NULL, NULL),
(2, 1, 'op 2', NULL, NULL),
(3, 7, 'option 1', '2018-03-04 11:09:16', '2018-03-04 11:09:16'),
(4, 7, 'option 2', '2018-03-04 11:09:16', '2018-03-04 11:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `lounge_poll_option_user`
--

CREATE TABLE `lounge_poll_option_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `lounge_poll_option_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lounge_poll_option_user`
--

INSERT INTO `lounge_poll_option_user` (`id`, `lounge_poll_option_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 2, NULL, NULL),
(15, 4, 2, NULL, NULL);

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
(123, '2017_09_25_143707_create_user_roles_table', 1),
(124, '2017_10_25_000000_create_users_table', 1),
(125, '2017_10_25_100000_create_interest_tags_table', 1),
(126, '2017_10_25_111111_create_interest_tag_user_table', 1),
(127, '2017_10_25_135401_create_groups_table', 1),
(129, '2017_10_25_135545_create_group_interest_tag_table', 1),
(130, '2017_10_25_135566_create_group_user_table', 1),
(131, '2017_10_25_135638_create_lounges_table', 1),
(132, '2017_10_25_144627_create_lounge_images_table', 1),
(133, '2017_10_25_144700_create_lounge_poll_options_table', 1),
(134, '2017_10_25_146138_create_poll_option_user_table', 1),
(135, '2017_10_25_146139_create_lounge_comments_table', 1),
(136, '2017_10_25_146140_create_lounge_likes_table', 1),
(137, '2017_10_25_155718_create_datas_table', 1),
(138, '2017_10_25_165345_create_data_links_table', 1),
(139, '2017_10_25_165438_create_data_images_table', 1),
(140, '2017_10_25_165504_create_data_voices_table', 1),
(144, '2017_10_25_165652_create_data_comments_table', 1),
(145, '2017_10_25_165653_create_data_likes_table', 1),
(146, '2017_10_25_170000_create_assignments_table', 1),
(147, '2017_10_25_170001_create_assignment_comments_table', 1),
(148, '2017_10_25_170002_create_assignment_likes_table', 1),
(149, '2017_10_25_190100_create_questions_table', 1),
(150, '2017_10_25_195922_create_question_images_table', 1),
(151, '2017_10_25_196145_create_question_comments_table', 1),
(152, '2017_10_25_197452_create_answers_table', 1),
(153, '2017_10_25_198747_create_answer_images_table', 1),
(154, '2017_10_25_199722_create_answer_comments_table', 1),
(155, '2017_10_25_199723_create_question_likes_table', 1),
(156, '2017_10_25_199845_create_question_user_table', 1),
(159, '2017_10_25_135542_create_faculties_table', 2),
(160, '2017_10_25_135542_create_universities_table', 2),
(161, '2017_10_25_135543_create_group_additional_infos_table', 2),
(162, '2017_10_25_165504_create_data_files_table', 3),
(163, '2017_10_25_165651_create_data_user_table', 4),
(164, '2017_10_25_165506_create_data_image_contents_table', 5),
(165, '2017_10_25_165507_create_data_voice_contents_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_anonymous` tinyint(1) NOT NULL DEFAULT '0',
  `votes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_comments`
--

CREATE TABLE `question_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_images`
--

CREATE TABLE `question_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_likes`
--

CREATE TABLE `question_likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_user`
--

CREATE TABLE `question_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(10) UNSIGNED NOT NULL,
  `university` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `university`, `created_at`, `updated_at`) VALUES
(1, 'Helwan', NULL, NULL),
(2, 'Cairo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_password_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `reset_password_token`, `password`, `api_token`, `birth_date`, `gender`, `avatar`, `bio`, `user_role_id`, `created_at`, `updated_at`) VALUES
(1, 'eslam', 'jeksogsaa@gmail.com', 'mU4FI83VNKruxmgy1eXq1MHmE4wPwznmITBS5OsIRfUVgzQXBy5Q5i87bI4p', '$2y$10$kUnFXzKO8p2Hy7/oGcI8CuAkRYiqzL1bo6ZCa0/tohWj/H8zabK4u', 'TgLT4o6Lsp4FUFzbyEwACZWvWMllecMTfQTlhHMeCr5wjkqElE9lSKblE7wQ', '1993-07-30', 'm', 'yFAiEgmpgrrrmBuRg0FNrvb3YtAQNNXeLtkMQsfj.jpg', 'test test!', 2, '2017-11-19 11:45:31', '2018-03-05 20:15:18'),
(2, 'jekso', 'jeksogsa@gmail.com', '0IVTp3OkPwxUmiXQfSxST2sAxgkHYWDw0uKupCJhblkgzUu5HgtkfnuS3dwJ', '$2y$10$TghQ9.ZCfxEKqQlOMKnT7u57l3rulhhhzDhwYvwrJRZcY4zh8tbDy', 'ijPcf0DqDUzpNohCUnv33ATqx82tcHK3h61wNVzmzPPqFuSHwX9pLIIfamy0', '1993-07-30', 'm', 'ynamRqNeUbncPNwXup67gkyEfdRKvK0oOnCrd9ui.jpg', 'test test!', 2, '2017-11-19 12:04:53', '2018-03-05 20:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', '2017-10-27 22:00:00', '2017-10-27 22:00:00'),
(2, 'Student', '2017-10-27 22:00:00', '2017-10-27 22:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`),
  ADD KEY `answers_user_id_foreign` (`user_id`);

--
-- Indexes for table `answer_comments`
--
ALTER TABLE `answer_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_comments_answer_id_foreign` (`answer_id`),
  ADD KEY `answer_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `answer_images`
--
ALTER TABLE `answer_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_images_answer_id_foreign` (`answer_id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_comments`
--
ALTER TABLE `assignment_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_comments_assignment_id_foreign` (`assignment_id`),
  ADD KEY `assignment_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `assignment_likes`
--
ALTER TABLE `assignment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_likes_assignment_id_foreign` (`assignment_id`),
  ADD KEY `assignment_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datas_group_id_foreign` (`group_id`),
  ADD KEY `datas_user_id_foreign` (`user_id`);

--
-- Indexes for table `data_comments`
--
ALTER TABLE `data_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_comments_data_id_foreign` (`data_id`),
  ADD KEY `data_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `data_files`
--
ALTER TABLE `data_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_files_data_id_foreign` (`data_id`);

--
-- Indexes for table `data_images`
--
ALTER TABLE `data_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_images_data_id_foreign` (`data_id`);

--
-- Indexes for table `data_image_contents`
--
ALTER TABLE `data_image_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_image_contents_keyword_index` (`keyword`),
  ADD KEY `data_image_contents_data_image_id_foreign` (`data_image_id`),
  ADD KEY `data_image_contents_group_id_foreign` (`group_id`);

--
-- Indexes for table `data_likes`
--
ALTER TABLE `data_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_likes_data_id_foreign` (`data_id`),
  ADD KEY `data_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `data_links`
--
ALTER TABLE `data_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_links_data_id_foreign` (`data_id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_user_data_id_foreign` (`data_id`),
  ADD KEY `data_user_user_id_foreign` (`user_id`),
  ADD KEY `data_user_group_id_foreign` (`group_id`);

--
-- Indexes for table `data_voices`
--
ALTER TABLE `data_voices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_voices_data_id_foreign` (`data_id`);

--
-- Indexes for table `data_voice_contents`
--
ALTER TABLE `data_voice_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_voice_contents_keyword_index` (`keyword`),
  ADD KEY `data_voice_contents_data_voice_id_foreign` (`data_voice_id`),
  ADD KEY `data_voice_contents_group_id_foreign` (`group_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_group_code_unique` (`group_code`);

--
-- Indexes for table `group_additional_infos`
--
ALTER TABLE `group_additional_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_additional_infos_group_id_foreign` (`group_id`),
  ADD KEY `group_additional_infos_university_id_foreign` (`university_id`),
  ADD KEY `group_additional_infos_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `group_interest_tag`
--
ALTER TABLE `group_interest_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_interest_tag_group_id_foreign` (`group_id`),
  ADD KEY `group_interest_tag_interest_tag_id_foreign` (`interest_tag_id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_user_group_id_foreign` (`group_id`),
  ADD KEY `group_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `interest_tags`
--
ALTER TABLE `interest_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest_tag_user`
--
ALTER TABLE `interest_tag_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_tag_user_user_id_foreign` (`user_id`),
  ADD KEY `interest_tag_user_interest_tag_id_foreign` (`interest_tag_id`);

--
-- Indexes for table `lounges`
--
ALTER TABLE `lounges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lounges_group_id_foreign` (`group_id`),
  ADD KEY `lounges_user_id_foreign` (`user_id`);

--
-- Indexes for table `lounge_comments`
--
ALTER TABLE `lounge_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lounge_comments_lounge_id_foreign` (`lounge_id`),
  ADD KEY `lounge_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `lounge_images`
--
ALTER TABLE `lounge_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lounge_images_lounge_id_foreign` (`lounge_id`);

--
-- Indexes for table `lounge_likes`
--
ALTER TABLE `lounge_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lounge_likes_lounge_id_foreign` (`lounge_id`),
  ADD KEY `lounge_likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `lounge_poll_options`
--
ALTER TABLE `lounge_poll_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lounge_poll_options_lounge_id_foreign` (`lounge_id`);

--
-- Indexes for table `lounge_poll_option_user`
--
ALTER TABLE `lounge_poll_option_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lounge_poll_option_user_lounge_poll_option_id_foreign` (`lounge_poll_option_id`),
  ADD KEY `lounge_poll_option_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_group_id_foreign` (`group_id`),
  ADD KEY `questions_user_id_foreign` (`user_id`);

--
-- Indexes for table `question_comments`
--
ALTER TABLE `question_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_comments_question_id_foreign` (`question_id`),
  ADD KEY `question_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `question_images`
--
ALTER TABLE `question_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_images_question_id_foreign` (`question_id`);

--
-- Indexes for table `question_likes`
--
ALTER TABLE `question_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_user`
--
ALTER TABLE `question_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_user_question_id_foreign` (`question_id`),
  ADD KEY `question_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_reset_password_token_unique` (`reset_password_token`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD KEY `users_user_role_id_foreign` (`user_role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answer_comments`
--
ALTER TABLE `answer_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answer_images`
--
ALTER TABLE `answer_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignment_comments`
--
ALTER TABLE `assignment_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignment_likes`
--
ALTER TABLE `assignment_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `datas`
--
ALTER TABLE `datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_comments`
--
ALTER TABLE `data_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_files`
--
ALTER TABLE `data_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_images`
--
ALTER TABLE `data_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_image_contents`
--
ALTER TABLE `data_image_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_likes`
--
ALTER TABLE `data_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `data_links`
--
ALTER TABLE `data_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `data_voices`
--
ALTER TABLE `data_voices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_voice_contents`
--
ALTER TABLE `data_voice_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `group_additional_infos`
--
ALTER TABLE `group_additional_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `group_interest_tag`
--
ALTER TABLE `group_interest_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `interest_tags`
--
ALTER TABLE `interest_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `interest_tag_user`
--
ALTER TABLE `interest_tag_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lounges`
--
ALTER TABLE `lounges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lounge_comments`
--
ALTER TABLE `lounge_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lounge_images`
--
ALTER TABLE `lounge_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lounge_likes`
--
ALTER TABLE `lounge_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lounge_poll_options`
--
ALTER TABLE `lounge_poll_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lounge_poll_option_user`
--
ALTER TABLE `lounge_poll_option_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_comments`
--
ALTER TABLE `question_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_images`
--
ALTER TABLE `question_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_likes`
--
ALTER TABLE `question_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_user`
--
ALTER TABLE `question_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `answer_comments`
--
ALTER TABLE `answer_comments`
  ADD CONSTRAINT `answer_comments_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `answer_images`
--
ALTER TABLE `answer_images`
  ADD CONSTRAINT `answer_images_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assignment_comments`
--
ALTER TABLE `assignment_comments`
  ADD CONSTRAINT `assignment_comments_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assignment_likes`
--
ALTER TABLE `assignment_likes`
  ADD CONSTRAINT `assignment_likes_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `datas`
--
ALTER TABLE `datas`
  ADD CONSTRAINT `datas_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `datas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_comments`
--
ALTER TABLE `data_comments`
  ADD CONSTRAINT `data_comments_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_files`
--
ALTER TABLE `data_files`
  ADD CONSTRAINT `data_files_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_images`
--
ALTER TABLE `data_images`
  ADD CONSTRAINT `data_images_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_image_contents`
--
ALTER TABLE `data_image_contents`
  ADD CONSTRAINT `data_image_contents_data_image_id_foreign` FOREIGN KEY (`data_image_id`) REFERENCES `data_images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_image_contents_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_likes`
--
ALTER TABLE `data_likes`
  ADD CONSTRAINT `data_likes_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_links`
--
ALTER TABLE `data_links`
  ADD CONSTRAINT `data_links_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_user`
--
ALTER TABLE `data_user`
  ADD CONSTRAINT `data_user_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_voices`
--
ALTER TABLE `data_voices`
  ADD CONSTRAINT `data_voices_data_id_foreign` FOREIGN KEY (`data_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_voice_contents`
--
ALTER TABLE `data_voice_contents`
  ADD CONSTRAINT `data_voice_contents_data_voice_id_foreign` FOREIGN KEY (`data_voice_id`) REFERENCES `data_voices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_voice_contents_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_additional_infos`
--
ALTER TABLE `group_additional_infos`
  ADD CONSTRAINT `group_additional_infos_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_additional_infos_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_additional_infos_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_interest_tag`
--
ALTER TABLE `group_interest_tag`
  ADD CONSTRAINT `group_interest_tag_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_interest_tag_interest_tag_id_foreign` FOREIGN KEY (`interest_tag_id`) REFERENCES `interest_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `interest_tag_user`
--
ALTER TABLE `interest_tag_user`
  ADD CONSTRAINT `interest_tag_user_interest_tag_id_foreign` FOREIGN KEY (`interest_tag_id`) REFERENCES `interest_tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interest_tag_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lounges`
--
ALTER TABLE `lounges`
  ADD CONSTRAINT `lounges_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lounges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lounge_comments`
--
ALTER TABLE `lounge_comments`
  ADD CONSTRAINT `lounge_comments_lounge_id_foreign` FOREIGN KEY (`lounge_id`) REFERENCES `lounges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lounge_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lounge_images`
--
ALTER TABLE `lounge_images`
  ADD CONSTRAINT `lounge_images_lounge_id_foreign` FOREIGN KEY (`lounge_id`) REFERENCES `lounges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lounge_likes`
--
ALTER TABLE `lounge_likes`
  ADD CONSTRAINT `lounge_likes_lounge_id_foreign` FOREIGN KEY (`lounge_id`) REFERENCES `lounges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lounge_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lounge_poll_options`
--
ALTER TABLE `lounge_poll_options`
  ADD CONSTRAINT `lounge_poll_options_lounge_id_foreign` FOREIGN KEY (`lounge_id`) REFERENCES `lounges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lounge_poll_option_user`
--
ALTER TABLE `lounge_poll_option_user`
  ADD CONSTRAINT `lounge_poll_option_user_lounge_poll_option_id_foreign` FOREIGN KEY (`lounge_poll_option_id`) REFERENCES `lounge_poll_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lounge_poll_option_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_comments`
--
ALTER TABLE `question_comments`
  ADD CONSTRAINT `question_comments_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_images`
--
ALTER TABLE `question_images`
  ADD CONSTRAINT `question_images_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_user`
--
ALTER TABLE `question_user`
  ADD CONSTRAINT `question_user_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
