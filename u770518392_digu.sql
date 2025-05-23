-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2025 at 08:16 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u770518392_digu`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Miss Beverly Kovacek PhD', NULL, '2025-03-10 13:26:14', '2025-03-11 03:13:25', '2025-03-11 03:13:25'),
(2, 'Gabrielle Kertzmann', NULL, '2025-03-10 13:26:14', '2025-03-11 03:13:07', '2025-03-11 03:13:07'),
(3, 'Victor Wiza', NULL, '2025-03-10 13:26:14', '2025-03-11 03:13:10', '2025-03-11 03:13:10'),
(4, 'General Cole', NULL, '2025-03-10 13:26:14', '2025-03-11 03:13:13', '2025-03-11 03:13:13'),
(5, 'Jazmyn Lesch', NULL, '2025-03-10 13:26:14', '2025-03-11 03:13:16', '2025-03-11 03:13:16'),
(6, 'Yasmin Stroman', NULL, '2025-03-10 13:26:14', '2025-03-11 03:13:19', '2025-03-11 03:13:19'),
(7, 'Reilly Kunde', NULL, '2025-03-10 13:26:14', '2025-03-11 03:13:22', '2025-03-11 03:13:22'),
(8, 'IDFC BANK', 'public/dKmYKPGiJL8dFQOXtjAQrEMzQMWie4JjKrDH2Pn8.jpg', '2025-03-10 13:26:15', '2025-03-11 20:26:20', '2025-03-11 20:26:20'),
(9, 'BANK OF BARODA', 'public/IIX26dNbB7Z0LgcrVD5Lx944p5uABaZjH3aER58h.png', '2025-03-10 13:26:15', '2025-03-11 20:26:16', '2025-03-11 20:26:16'),
(10, 'Berta Okuneva', NULL, '2025-03-10 13:26:15', '2025-03-11 03:13:28', '2025-03-11 03:13:28'),
(11, 'IDFC BANK', 'public/ASg2Hdgh6oLaSerdN4WpN5yS6JWdHflJdCcLJcms.jpg', '2025-03-12 00:14:10', '2025-03-12 00:14:10', NULL),
(12, 'ADITYA BIRLA - Term Loan', 'public/AGEPwMNMPgWUedCqRAQT50SVc7KAXu6gP6zjG9Eb.jpg', '2025-03-12 14:04:38', '2025-03-12 14:04:38', NULL),
(13, 'AXIS BANK', 'public/zJ0WpblgTWVLTpZMoAkLEHkhXFpfd1PImmsHuqAd.jpg', '2025-03-12 14:06:31', '2025-03-12 14:06:31', NULL),
(14, 'BAJAJ FINSERVE', 'public/cHW1JsbMdDFEIs2iDM77eaHlpcV7AXSKWGXsEDbU.png', '2025-03-12 14:07:50', '2025-03-12 14:07:50', NULL),
(15, 'BANDHAN BANK', 'public/QcjIpszLDeacpQT6UeJUc9obrJwr46AiDR0Y9FPC.jpg', '2025-03-12 14:10:21', '2025-03-12 14:10:21', NULL),
(16, 'CHOLAMANDALAM', 'public/llMja0SUWMzewX1NybQe1Ga05fOlC7dMdtok4H2M.jpg', '2025-03-18 18:59:58', '2025-03-18 19:00:54', NULL),
(17, 'CREDITSAISON', 'public/RcBQwBsUrsbnhhMyIW0ZNmtPBk0qJiOkmgfv7oS9.png', '2025-03-18 19:02:29', '2025-03-18 19:02:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_applications`
--

CREATE TABLE `loan_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_applicant` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `pan_number` varchar(255) NOT NULL,
  `pan_image` varchar(255) NOT NULL DEFAULT 'tete',
  `adhar_number` varchar(255) NOT NULL,
  `adhar_image` varchar(255) NOT NULL DEFAULT 'tete',
  `pincode` varchar(255) NOT NULL,
  `status` enum('pending','inreview','completed','rejected') NOT NULL,
  `reason_of_rejection` varchar(255) DEFAULT NULL,
  `loan_type_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_applications`
--

INSERT INTO `loan_applications` (`id`, `user_id`, `name_of_applicant`, `phone`, `amount`, `pan_number`, `pan_image`, `adhar_number`, `adhar_image`, `pincode`, `status`, `reason_of_rejection`, `loan_type_id`, `bank_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 1, 'DIGMBAR SHINGATE', '7066933720', 50000, '45646', 'public/jrvJpjpbVafROjHqi076wun0MzFFdvxaYgqL3MyA.png', '5454654', 'public/af6fZ6D8HZPxhn6FSvkGKuRE1xxT1dy27IARBCVG.png', '410101', 'completed', NULL, 11, 8, '2025-03-11 03:20:01', '2025-03-27 14:23:09', '2025-03-27 14:23:09'),
(8, 1, 'Bhushan Shinagte', '7066933120', 25000, 'EFT4545C', 'public/IVXkjvQxrUtNcPhSq0WDwLZrsCULTUD5l9vtA6TH.png', '4545446546', 'public/3j0ePy2XpX4xANlOKBajiihKHiuSEXcDsClcW7iD.jpg', '410101', 'pending', NULL, 11, 9, '2025-03-11 08:23:58', '2025-03-11 08:30:10', '2025-03-11 08:30:10'),
(9, 1, 'Bhushan Shinagte', '7066933120', 25000, 'EFT4545C', 'public/xtDflfCIhFkzX3CBnFDu97mfyvNxLRm9SIeiScXT.png', '4545446546', 'public/7658NPLHRVdlcQFmDpjenU1r1tH5PcWSwdrtOEgx.jpg', '410101', 'pending', NULL, 11, 9, '2025-03-11 08:27:00', '2025-03-11 08:30:15', '2025-03-11 08:30:15'),
(10, 1, 'Bhushan Shinagte', '7066933120', 25000, 'EFT4545C', 'public/Mi9E5owyZ9LVAOw3z0LcRpZbE3Fy42nr8rcNwIAv.png', '4545446546', 'public/GfVc0gnBAfyblRY5w8yFjHdz9OiLcyok5ctX62Mb.jpg', '410101', 'inreview', NULL, 11, 9, '2025-03-11 08:27:43', '2025-03-27 14:23:06', '2025-03-27 14:23:06'),
(11, 4, 'Raj mane', '4455667788', 20000, 'MGHGFH545', 'public/7XdbedIpG2bPlqBEEQaV7tUBpfO5BpGDj9rXrjTf.png', '546546456', 'public/0VPHV0RaZcHLRsmoUh8CYgX3N5mCTiOXKtzFKOhK.png', '410101', 'pending', NULL, 11, 8, '2025-03-11 09:06:41', '2025-03-11 09:24:35', '2025-03-11 09:24:35'),
(12, 4, 'Raj mane', '4455667788', 20000, 'MGHGFH545', 'public/ZCxoDdeDS6oUH8EzwTBWqvNtqYBwFLjtN3K9NhdP.png', '546546456', 'public/wzFe6XZHpWjAw9y70ns2JcdIQbPl14TycZ60o7Fn.png', '410101', 'pending', NULL, 11, 8, '2025-03-11 09:07:33', '2025-03-11 09:21:18', '2025-03-11 09:21:18'),
(13, 4, 'Raj mane', '4455667788', 20000, 'MGHGFH545', 'public/L0EznpCmKtNIJj03H3dFzzqUSfBRNferRj6Jev2s.png', '546546456', 'public/0ZEUj5e0Ta6o5n3SpNDeS9t3nsKdhBxX0SFtTwV2.png', '410101', 'pending', NULL, 11, 8, '2025-03-11 09:12:04', '2025-03-11 09:24:38', '2025-03-11 09:24:38'),
(14, 4, 'Raj mane', '4455667788', 20000, 'MGHGFH545', 'public/yMfjaM8BBpwq34j7YKswNnnyhXgAnvKk6W2Uu6Ph.png', '546546456', 'public/7Qeq86F9jhbKXMnmNAmrTdMA4ljHCXe9thlYdK1I.png', '410101', 'pending', NULL, 11, 8, '2025-03-11 09:14:20', '2025-03-11 09:24:41', '2025-03-11 09:24:41'),
(15, 4, 'Raj mane', '4455667788', 20000, 'MGHGFH545', 'public/vifcXB4FpmfiaXokNXifrVOATb7VsFHS3evjPjH5.png', '546546456', 'public/a12NBYItNyNo70iXncioVbCQrdp6UJYkgXzOMR0c.png', '410101', 'pending', NULL, 11, 8, '2025-03-11 09:15:08', '2025-03-11 09:24:52', '2025-03-11 09:24:52'),
(16, 1, 'Raj mane Updated new', '4455667788', 20000, 'MGHGFH545', 'public/SKaYjgcmsH0lvo25EqeOuXOz54XTd5oFtDiL8NBC.png', '546546456', 'public/BpnU22ILQJWuTiJH27BqdrCqNRdtmPuLhzVo5gGb.png', '410101', 'rejected', 'documents are not clear', 11, 8, '2025-03-11 09:18:23', '2025-03-27 14:23:02', '2025-03-27 14:23:02'),
(17, 4, 'Nagrah Shelar', '3366998877', 35000, 'MHHH54545', 'public/RNkW2gZMMBb0DoImt0Q1mhuXw3LIxTXCLueG8y8n.png', '65465465456', 'public/CLmwpvbvMy4w7btvkyCdKrazXvVE4G06kIpe47X8.png', '410101', 'rejected', NULL, 11, 11, '2025-03-11 11:43:26', '2025-03-27 14:22:58', '2025-03-27 14:22:58'),
(18, 1, 'Rohit Tiwari', '7219688018', 50000, 'ACDFR4566C', 'public/tLKM0alzhI5nzTvbCHLBugwjjxN1qcw4zmqUasBK.pdf', '454554644664', 'public/fTNIbJFWw8NJUz6yrLMvtdYxLG1m3FmJbp072GD5.pdf', '410101', 'rejected', NULL, 11, 11, '2025-03-11 17:58:55', '2025-03-27 14:22:54', '2025-03-27 14:22:54'),
(19, 12, 'Rahul tiwari', '7757047989', 1000000, 'DERT4566C', 'public/yR9sEAi8sGIzceCrYT2k7ydvryNAcr5CoXQSY9mg.pdf', '5544567777', 'public/oV5hWspTJ856IzDy64pNpw1IliHY43yJdRvpnkoT.pdf', '456789', 'rejected', NULL, 14, 11, '2025-03-11 18:04:03', '2025-03-27 14:22:51', '2025-03-27 14:22:51'),
(20, 13, 'Raju', '7276060180', 50000, 'Fg for ghghf', 'public/d2uuPjK4pcE2SYq7BLOHbbvSeXfOsrJcFkpDseh1.pdf', '988765543322', 'public/7r9QVzoZQLbiZgTMDPCPKay1DK6c6GmLkSpruW7V.pdf', '411033', 'rejected', 'hello', 22, 11, '2025-03-11 20:23:40', '2025-03-27 14:22:48', '2025-03-27 14:22:48'),
(21, 13, 'Raju', '7276060180', 50000, 'Fg for ghghf', 'public/KTdcdzZU08sFWDW0URnfa7S4hiuKqvuARauqSU2D.pdf', '988765543322', 'public/Kj1Cn9upm1wBzmozSxZS7oVrvF2E5Sb7ZtQ46nMP.pdf', '411033', 'rejected', 'in co doc', 22, 8, '2025-03-11 20:23:43', '2025-03-27 14:22:43', '2025-03-27 14:22:43'),
(23, 15, 'Chandrkant Kisan Gaikwad', '8108455921', 300000, 'BMWPG8238B', 'public/4hsg76Y0wyQTGVGYI5dXbWJgrzVeyweaCX2ZNy2f.jpg', '575157674290', 'public/p3dWG6ha0uqnggZjo6EpYhTayIxv5yWJL5P895TX.jpg', '421306', 'rejected', 'doc pen', 12, 15, '2025-03-15 07:40:20', '2025-03-27 14:22:39', '2025-03-27 14:22:39'),
(24, 16, 'kishore dilbhar sonawane', '8591508551', 1000000, 'lAXPS9408F', 'public/v3fxjIW2Jh70bKBTR6xe1a5Xqucei9YF80ype4XP.png', '475144715236', 'public/XX2Yje493smV2Ccm6cLBn73qWvI7N3nLSLBJeW0J.jpg', '421306', 'rejected', NULL, 15, 11, '2025-03-15 09:09:20', '2025-03-27 14:22:36', '2025-03-27 14:22:36'),
(25, 16, 'kishore dilbhar sonawane', '8591508551', 1000000, 'lAXPS9408F', 'public/D7Hs5QTQD9yLebGwhiKj2MyUq5qrpb66JiZOiwK2.png', '475144715236', 'public/zKBlLVqw0YdJHRsQHMngqz56fO71lAZ1pRINICau.jpg', '421306', 'rejected', 'docment pending', 15, 11, '2025-03-15 09:09:21', '2025-03-27 14:22:32', '2025-03-27 14:22:32'),
(26, 17, 'rahul', '1234567890', 500000, 'iqjwsiodjowas', 'public/s2SYZ7prBkVtnQyDIfC2InYOMzHIjRaTWUgWq24e.webp', '99999999999', 'public/lMlH78mA2G9HEzKpDaUxtJusRYARiG4pA8eJwBTA.webp', '421302', 'rejected', 'docment pending', 21, 11, '2025-03-18 12:47:02', '2025-03-27 14:22:29', '2025-03-27 14:22:29'),
(27, 18, 'Vikas singh', '9820779720', 100000, 'FDFPS2102L', 'public/TbFDEFt1r0n322Yq8eQiGvOq5iaFRFZw97sdbxKF.png', '671099905030', 'public/LrXHBU2OZZmCEzlfOogNEd8gA9DHVcMNoYpNSRBX.png', '400701', 'rejected', 'castmar not pik tha call', 11, 14, '2025-03-29 12:48:52', '2025-04-06 07:54:18', NULL),
(28, 21, 'Mr. Rutvik Patil', '9137898236', 1000000, 'ENRPP4923B', 'public/R3YfRpI2YrhUa5FIYUfzHxPJhYj9zRFTI0v0BNcw.jpg', '996662021089', 'public/mVLh8RQd2okpaXBoi1ydc5ps7gkHHIuaSMwa9byE.jpg', '421102', 'pending', NULL, 13, 11, '2025-04-16 10:20:51', '2025-04-16 10:20:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(11, 'Personal Loan', '2025-03-11 03:11:26', '2025-03-11 03:11:26'),
(12, 'Home Loan', '2025-03-11 11:46:00', '2025-03-11 11:46:00'),
(13, 'Business Loan', '2025-03-11 16:45:15', '2025-03-11 16:45:15'),
(14, 'Gold Loan', '2025-03-11 16:46:06', '2025-03-11 16:46:06'),
(15, 'Car Loan(New Cars)', '2025-03-11 16:46:40', '2025-03-11 16:47:08'),
(16, 'Car Loan(Used Cars)', '2025-03-11 16:47:25', '2025-03-11 16:47:41'),
(17, 'Educational Loan', '2025-03-11 16:48:44', '2025-03-11 16:48:44'),
(19, 'MORGEGE LOAN', '2025-03-11 20:06:08', '2025-03-11 20:06:08'),
(20, 'INSTANT LOAN', '2025-03-11 20:07:47', '2025-03-11 20:07:47'),
(21, 'MUDRA LOAN', '2025-03-11 20:09:46', '2025-03-11 20:09:46'),
(22, 'STAND UP INDIAN  LOAN ( NEW BUSSINESS )', '2025-03-11 20:12:17', '2025-03-11 20:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_10_000001_create_banks_table', 1),
(6, '2025_03_10_000003_create_loan_types_table', 1),
(7, '2025_03_10_000004_create_loan_applications_table', 1),
(8, '2025_03_10_009003_add_foreigns_to_loan_applications_table', 1),
(9, '2025_03_10_175502_create_sessions_table', 1),
(10, '2025_03_10_175528_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(1, 'App\\Models\\User', 14),
(1, 'App\\Models\\User', 15),
(1, 'App\\Models\\User', 16),
(1, 'App\\Models\\User', 17),
(1, 'App\\Models\\User', 18),
(1, 'App\\Models\\User', 19),
(1, 'App\\Models\\User', 20),
(1, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('avinashmishra77777@GMAIL.COM', '$2y$12$9zn4vIXl.lvGnli4x8JjZ.q2Z2dP91OoGWrhm5tHNR9wqTDpRZKgK', '2025-03-11 20:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list banks', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(2, 'view banks', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(3, 'create banks', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(4, 'update banks', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(5, 'delete banks', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(6, 'list allloanapplications', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(7, 'view allloanapplications', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(8, 'create allloanapplications', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(9, 'update allloanapplications', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(10, 'delete allloanapplications', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(11, 'list loantypes', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(12, 'view loantypes', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(13, 'create loantypes', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(14, 'update loantypes', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(15, 'delete loantypes', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(16, 'list roles', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(17, 'view roles', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(18, 'create roles', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(19, 'update roles', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(20, 'delete roles', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(21, 'list permissions', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(22, 'view permissions', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(23, 'create permissions', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(24, 'update permissions', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(25, 'delete permissions', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(26, 'list users', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(27, 'view users', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(28, 'create users', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(29, 'update users', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(30, 'delete users', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth-token', '7ba03f30a5a5de7e2daf422bfa81f8974b2dfd9ae9e9c7cf03c018426f192aba', '[\"*\"]', NULL, NULL, '2025-03-11 17:37:49', '2025-03-11 17:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14'),
(2, 'super-admin', 'web', '2025-03-10 13:26:14', '2025-03-10 13:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('55CwiYPnzTKDSNnBARnAJdLd8rcwUSaqIn8YTXno', NULL, '18.220.172.207', 'curl/8.3.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmFrTm5zN2pFUTduVDY0YXNyMExOcHNHMFM4cG1lM0FUMHdWTHVVVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746893154),
('7eXpvAJYwEm4CqBs3yhdCnvfdXz9MwrDZWOQGX7E', NULL, '118.89.95.205', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) MicroMessenger Weixin QQ AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.62 XWEB/2692 MMWEBSDK/200901 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFJxNXJRWDdpNnNiQ1BMUEZ1SVI3Q3A2YW1zbkFuWjh5Vk9lMndBeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746964507),
('9PZRyDgMxLusfmFUylOVhthvcwXNM6grOsEpXleN', 1, '139.5.30.250', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS2FlbVJYcXdJUnJBdEtsNVptRDg2UjdvdVoxemd0d0FqczBMTHRmVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vcm5maW50ZWNoLmNvbS9hbGwtbG9hbi1hcHBsaWNhdGlvbnMvY3JlYXRlIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1746886799),
('bcaEcbhMDVv1z6eIduECUOfED2Dew6mnVa5Xp6Ij', NULL, '34.247.175.101', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0FXNHNranZNMzAzM3Y3dDlsQ2tNSVNINjZrSkFOS2VWUjFoWVBmSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746937339),
('dCXfVe8eQE1Zg7kv76ZMSGDV0ipVwpJqEIrQYjNe', NULL, '43.135.138.128', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGFaRDhIeXFDdndvbWV0bTRpVUtPTzlLNlcxU2hjNjFDSEF5ZmhyYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747005084),
('e2NkU0EVVNpgqSrrHZpXG0F5zeq1Mbjh3LLGc3k7', NULL, '217.198.191.213', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1VNb1dqS251RHRZTHhGNjBHcTJZelBINDFiOTQxUUt3TFdGa2NyVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746923576),
('FC7VkSslePxXOlplsemokkO3z4qyx8f9L0JTcGN8', NULL, '157.55.39.60', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXlic1h0N2E4cldGS0pxbVh5UGpKeGJLc1FhcERKbE5QTEJNdzk2WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746978555),
('GDsW6sNlJ2pfb0xdzWbY0xizsLA71wVQmpajct4h', NULL, '139.5.30.250', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVE5KZm5JSHZvZEZPZWlhbGJSRU9zS0FiSVZ2ckVESkU1bTRwTkhkeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746976919),
('ggWsICUrneDNSOhCaEJjfepW2L9bqUd9bRdxQayw', NULL, '3.123.42.119', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM3VEUFBlZVZIV2FhT1Y2eTZleUIxeUU4S1M1eGY3NDZWSDJTWTJSYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746937586),
('GibGlFJsI9uPbqJN78pEIrJKwp9uC4hVxxmFTCcg', NULL, '43.153.79.218', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnJ3SkEyQXVqcnY5dm5WcDNUbzkzN2V0ZjVrdnJKMW12SVJ3Y3VVRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LnJuZmludGVjaC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746983359),
('hx5NUQfCatCWFpQ6mdfD87mkAZs1Z0skFLmERAgC', NULL, '2a03:2880:f800:1::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTg5enlBb0liMDlyTW1jSE1aWVJoYjhtZXE4OTU1a1UzNUkzM3FnSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LnJuZmludGVjaC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1747010773),
('IBClUDnpi49QcgE5okTe6Aekl7UOt1zRb9BzCWtu', NULL, '2001:4ca0:108:42::7', 'quic-go-HTTP/3', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYXBJcjIwWjRGNU52bzVxUGlJNnFndGZYc292VWM3OEd6amY2VlE2ViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746963272),
('iO860jDeX0eKvcZnXGl5dIQAO29hkCLwpKG2hBgJ', 1, '139.5.30.253', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia2hSNnhxcXpSQm52VjJVcHlqYWhsamptcDFXNUd6N2NTSHRKcjJPciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vcm5maW50ZWNoLmNvbS9hbGwtbG9hbi1hcHBsaWNhdGlvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1747036531),
('KfILtxcimtifdyec7s9ycHy4VtxUZXF9C0ggrwTP', NULL, '118.89.95.205', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) MicroMessenger Weixin QQ AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.62 XWEB/2692 MMWEBSDK/200901 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkhpQlBCRU5WbURwYXZrSVJNemZOSk1VdjVGRXpmRFE0Rk1lVXl3USI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746963997),
('kpXryJkglojSm6Dq5uCNcyKHMqF6dZsP1FCs4qZR', NULL, '35.165.73.68', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV001alRTd1M0S1J1OTRkb0NyM25RZVdvdmxqZHo3VzZCUHlkcHAwTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746905923),
('M4Bq5gvSEI4SP5bteaWzq9Y5kQxhT7r2AMBTnJ9D', NULL, '2a02:4780:11:c0de::21', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNkJFUERZZzgxOXZDOXRKRjIzaGxGS1c4ZEkzandOb2w4OVVGY01nSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746962817),
('n02DbMDbpPojL7V5P2hPICJytAQAPcORbYMSLc96', NULL, '2a03:2880:f800:f::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0VYTEo0QVVSalJPa1FYSktram9lajNjZXdEZnVXWUJoc3p0RE41RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746937916),
('nkoBfBqTv3Ve1iQBBBtRiJW6TlDk1xSiIAgyeWir', NULL, '135.148.195.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 OPR/99.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTEhWTFlWYWxlMVg1TTUzR2RtZWFUdkJjNUZuUkJvaHlKZFI5dmtjZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746922074),
('o4JOhMRat0EzcGSRbaYUD6Jz7Xm9rkzHzgcEbjjg', NULL, '2001:4ca0:108:42::7', 'quic-go-HTTP/3', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNmpQRkcwVVp0bHJDSnBMbXpmNzFlV2dnVjJDQXhzM2phM2JXYnlXMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746951637),
('pfK875nk69cK0A5ouuz6umfpyNe8CfO6Ty5sfixO', NULL, '165.227.47.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUt1U0RYOWJST3FXdDhZSUF1dVdoNXliREhVSjZNNVZUd3M4OWNpcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746952817),
('pGYpZvToVvuM8FK01QKXYKo2N5Fm8moI4VdON12h', NULL, '42.236.101.251', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36; 360Spider', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTk9YaHR6VzBMWE13TVZRVFRralgwczh3M0djbVdmNGNiaWdtd0s4OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746969184),
('PrTC4ggUCh2X8D6aOdFwQtc98NzO19IkgIldaW46', NULL, '139.5.30.250', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjNGSXJ2ZFdqbWZJdnNQUFRDS3RGSW1OVVVVZW5IMmR4SHU3OXd2RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746978505),
('rNTT2eQPjqKdoY6ggZW7ck7JhE0MXCG7yAlZ2iS1', NULL, '42.234.91.9', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1BXQ3FvSndjdU1NNWtybXpZb0NjVkUxOGRHendpNXl5cFlEZHBaQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LnJuZmludGVjaC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1747001493),
('s7qaqgYjEhYhc2R7wkEbVzbVb5ErOiSg0hpLkLxn', NULL, '42.236.17.119', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36; 360Spider', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialFTR2RRM0RBS2RWV1o0U1dmRHlZSm9SSW04ZHVyOHNzR0c0SWZCTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746966430),
('UuvbE4bLzxoaUVxhJ1FCKaYhqUJvWWDfbO7hcVGc', NULL, '49.44.87.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXl1djhNeXVWWXBvSGZrUnJlSWNUOE1vNnl0RUwxOUJsSTJyRzE1eSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vcm5maW50ZWNoLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746886164),
('V7opjqJBgpuvn7ehidQhnTMc6oaeLq8tsGtSbrsN', NULL, '35.181.6.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYVZRUGY1UjltQ0NoSlVTRFZpQ05XMXpJdDFtTkJ4QzFscXl0RXVzZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746985150),
('whpyRpHlv1KysePLiqMKM6PRKydZrpMumPSgOfIu', NULL, '34.245.71.223', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2l5R2NiOHF5YnZFYXpZcFRXWTZmR1g1aFhoR0VTMVRwQTAydkNrTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LnJuZmludGVjaC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746947768),
('wZ8ev2AGyH7MY5wGtGA3zzE1smJ5fmoY7ZLA6mHG', NULL, '35.165.73.68', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFFDTTRZVjdTQWFOeDN2RWZ3R1ZMMEJHU0c5cnJtVjFkNkFvTDZ4WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vcm5maW50ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746905920),
('yXSKpOWKo5slplKf2FcKuIhnDwqzeknNRQBZZ7sX', NULL, '42.236.12.212', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36; 360Spider', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUJQd044UmJQNTJLZlJ2M0xtc3dzTk9CVVhud2drUmhPOVNlejJpeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LnJuZmludGVjaC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746966053),
('z6Anb7Npp4WXes5xwc7nSrnCRkjqU0xdQKC4goJz', NULL, '167.71.228.51', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTFSUU1KcFlTUU1tVEQwY2NuQ3p5S3QxVjIyMEJ5bHJ4M2xhTkFraiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LnJuZmludGVjaC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746991047);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('customer','staff','agent','admin') NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `created_at`, `updated_at`) VALUES
(1, 'RNFINTECH', '505-473-5960', 'admin@admin.com', '2025-03-10 13:26:14', '$2y$12$7gkaMGsLwQDaB0d2L6HudOxuypyra6GjqhdCZGPH.JYJSx9fC3uJi', NULL, 'admin', NULL, NULL, NULL, '2025-03-10 13:26:14', '2025-03-11 19:04:17'),
(4, 'Digu', '7755889944', 'shingatedigu@gmail.com', '2025-03-10 13:26:14', '$2y$12$ONONEzlOcz7phRNGgevol.XfXv35Ou.0qCoLZlB6QndLhDVBfSlzy', 'BGRrXhLDct09RBQy0Zhe54NzACSIZhbk9gfQqy19waRixl705bOS13dZ0wDQ', 'staff', 'eyJpdiI6IjdzNVVpV3ZUUTVWR0NUZzVGUzIxeUE9PSIsInZhbHVlIjoiTlRoRzllRXVOZVFCS2lRVkk2cFpxMXRkV2lGN2w4THJ3eGx4OHpGcVY5ND0iLCJtYWMiOiJkZGY2YmIzOGI2NjExN2UzZDdlZDQ4MjkzMDFmMzkzNjljYjQ2ZjIxZjZmY2ZjYTQ0ZTc0NjljNTdiNzM1MzAxIiwidGFnIjoiIn0=', 'eyJpdiI6Imh6V0ZUb2JPdEFvWGRaVnhDU0FLcVE9PSIsInZhbHVlIjoicnprMGNqVm92T1ArYjdVd2I4WUlwbnFLZmhHeFppbU4rWC9vRWhuWW9XTHlGc3lTYm0zOEJ2Q3MrZHYzNEFmVytPK3BscDZZaHI4Wk1KSUJuUy9RSko2TTlUOG1MZG0zOWpKSnE2OG5BbDVVMXJDWXdnMmxsVmUzNHJTZUw1OUFORmhmS2JtU2RyRjhiZTZyVFMwTDJjL0FrSDBjTHd2WEdQcDBtUFRYMFVxSzdPVlUyeHF4UVRpTXdGa1RGc3dMNjY2VWNTTlM4NFZDclhoazhzM2poNEhZanNxc21WMUczR3l1TFFpZS9DSkIzT3I2T3ptRWlCTkQ2b1NEQkhUUis2SWFOdWRydENTQ3loVkJPdFZoQmc9PSIsIm1hYyI6IjJmMDU0M2IyMDUwNGRkZGFjMDE2MTA4ZTM2OGU0NDRkMzgyYjZiYzllMzViMWI0NTc1M2E3NzdhM2I4ZTIxODQiLCJ0YWciOiIifQ==', '2025-03-11 13:43:51', '2025-03-10 13:26:15', '2025-03-11 14:38:05'),
(5, 'Digambar Shingate', '7066933720', 'digu@user.com', '2025-03-10 13:26:15', '$2y$12$cu/mZV.9t.mjTx4nLfUW2u4l.aQS3J9Du4ojsk7h9LnOFyV.36C9K', 'l3s98bvp2vvTD6MeOJogVnjWWcrwYi1PJlXAWyQ7AQ6nXtsY86BGedkw8OTQ', 'customer', 'eyJpdiI6IjJTYjVDV2UwSGEyWkhBUWtYZ1NBSHc9PSIsInZhbHVlIjoiY1JWNFBNSU5PeHZzRTRkKzRPdWQ4TlhydzlMekFKQXgwb2EwYXBqWFRzZz0iLCJtYWMiOiI2NTI5NGE4ZTRmYjc4NjI1ZWFiODJmOTU3ZmZkNzJlNjQ0Yjg0ZGJmNDJjZjY4N2M3OGRiOGFjOWUzMjA1NjMxIiwidGFnIjoiIn0=', 'eyJpdiI6Ik1EQ3RUNVVkYjNkNnd5eW1XL1IvcFE9PSIsInZhbHVlIjoiTzRVbDVjMEIva1Qwa3VGb05TdHVvNmsvZHZ3Z2hWOERjcVBkZ2Q5a2xXK3BZRnl0eFh4eURiUVJMSHBWL0t1ODZmUUhuTFB3aDU5R2lOalRzRkpWbkxuL0c3VlRleHpScWcwbVF3WjRMOHlxbm5vMFoxNDZCZWsrUlR0UEtUbURpb253Um5UMUJNa1F0TCtQSGw1SDA4UVlYTi81RWJVS2VMQndvMFV1TnZ3VHRScVVtZE13c050YXVMejVJZHBZSjVUMW9IZUZDL250bzFLTzdYdXBSaHFSQzA5NzVqOWxMWXd2Mm54Vm45L2JvVlg1WW9vR21jc2IyMWlyMGd1UXp2cElUUWZJSDA4bjRqNVhXY0ZzZEE9PSIsIm1hYyI6ImM5YzZhYmY5OTk0ZjA2MDgzZDg4ODg2OWY2OTA2MjZmZTIwZWU1MWRhNzE5MWU3Mjc2ODljNWYwMDFlNzU3MDIiLCJ0YWciOiIifQ==', '2025-03-11 16:15:42', '2025-03-10 13:26:15', '2025-03-11 16:15:42'),
(12, 'Avinash mishra', '1234567890', 'avinash.mishra@gmail.com', NULL, '$2y$12$OXyCXA9pbjRsyVSet6ODD.GNg6TnPcXQ3M5BEG2Scmz2lCuIlHpvy', NULL, 'customer', NULL, NULL, NULL, '2025-03-11 18:00:59', '2025-03-11 18:00:59'),
(13, 'AVINASH MISHRA', '9699724814', 'avinashmishra77777@gmail.com', NULL, '$2y$12$jeEcUP65aTVQgHitW2fcGugK02B2Vtj865SJbwTvW1lVkWxRgO9Mm', 'GA6LidYtLRriARZUnlBzxchyS34IhLQKK7SYgDSPoRQbVulxxQwG9K06iqL1', 'agent', NULL, NULL, NULL, '2025-03-11 20:16:04', '2025-03-11 20:20:24'),
(14, 'gaya yadav', '8412006075', 'yadavgayaprasad1971@gmail.com', NULL, '$2y$12$tc/5lqmaH11MZZZo6MPGHOAI/YyCad7g7Xu5zSEnzbyJR/EEvPbla', NULL, 'agent', NULL, NULL, NULL, '2025-03-12 08:20:54', '2025-03-12 08:26:38'),
(15, 'akash koli', '8652134644', 'aakarenterpriseshr@gmail.com', NULL, '$2y$12$meayD5U8ndRNCBodxx/3rO4k8KWqjVL0wV.OqNMCYPVmLYN1Y7ZEi', NULL, 'agent', NULL, NULL, NULL, '2025-03-15 07:31:25', '2025-03-15 07:31:25'),
(16, 'v m motar', '9359112806', 'vmmotors.9191@gmail.com', NULL, '$2y$12$zbbOYj7fCCCyInPV2yPSOuJg4/ezy1400d9NfGAXB0pZZmasrbSTO', 'ck90pFWmrXfjh9KGuqJN2HeogYp5fqFXqb6mYM4HMtc0ftavCpxO68A9uD0I', 'agent', NULL, NULL, NULL, '2025-03-15 08:58:43', '2025-03-15 09:01:47'),
(17, 'vijayshivajiraohingole', '7738737358', 'psacompany14@gmail.com', NULL, '$2y$12$B8gC1SzhCfg1lf2zVqdz3.kbBT0tl6ITUx8kHsRbL39JCIfUNRlxy', NULL, 'agent', NULL, NULL, NULL, '2025-03-18 12:43:20', '2025-03-18 12:43:20'),
(18, 'ROHIT TIWARI ( INSURENCE)', '8668874829', 'DEVILSBIRTHRT@GMAIL.COM', NULL, '$2y$12$EuUeg6DV1XbTDf9iez8n5O7AV/g0sE6o8jnohnPdOardtlZdHWPWm', NULL, 'agent', NULL, NULL, NULL, '2025-03-29 12:17:08', '2025-03-29 12:17:08'),
(19, 'dhiraj', 'sharma', 'sdhiraj1710@gmail.com', NULL, '$2y$12$FFOUmcqdNuB3DbmEyf/g/OqKyPt0f6iT8z//5avtDVDZtG.GhVPQq', NULL, 'agent', NULL, NULL, NULL, '2025-03-29 12:31:46', '2025-03-29 12:31:46'),
(20, 'nikhil', '9172824318', 'natlovers1432@gmail.com', NULL, '$2y$12$/Wkpi0dQPRyZdkHycLZgV.WuktjyWmPCg6W8WSLI9I2angVfg.dhK', NULL, 'agent', NULL, NULL, NULL, '2025-04-13 09:36:31', '2025-04-13 09:36:31'),
(21, 'Swapnil Joshi', '81088429546', 'swaptography@gmail.com', NULL, '$2y$12$ehEJntKNBddifAM6Yr7AD.PBxMOMrdPBL1GVGcWyjZc2wDBbNImqm', NULL, 'agent', NULL, NULL, NULL, '2025-04-16 08:50:56', '2025-04-16 08:50:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_applications_user_id_foreign` (`user_id`),
  ADD KEY `loan_applications_loan_type_id_foreign` (`loan_type_id`),
  ADD KEY `loan_applications_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD CONSTRAINT `loan_applications_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_applications_loan_type_id_foreign` FOREIGN KEY (`loan_type_id`) REFERENCES `loan_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
