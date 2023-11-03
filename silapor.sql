-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 03:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silapor`
--

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
(5, '2023_09_19_062148_create_divisions_table', 1),
(6, '2023_09_19_062443_add_division_id_to_users_table', 1),
(7, '2023_09_20_131723_add_is_admin_to_users_table', 2),
(8, '2023_09_20_140333_create_reports_table', 3),
(9, '2023_09_21_102326_add_satker_id_to_reports_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` enum('diterima','revisi','diperiksa') NOT NULL DEFAULT 'diperiksa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `satker_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `file`, `keterangan`, `status`, `created_at`, `updated_at`, `satker_id`) VALUES
(6, 3, 'GTraKEjWEa1Z5gjxweznX0yGcBSkgThFTlUIjBCc.pdf', NULL, 'diperiksa', '2022-02-21 03:26:09', '2022-09-21 03:26:09', 1),
(7, 4, 'OQkBeTcPnnhb7x7lkCVxf4fl8LKUn6qTvokZWPX9.pdf', NULL, 'diperiksa', '2023-02-21 03:44:44', '2023-09-21 03:44:44', 3),
(8, 3, 'SskEmi8EyjmAQTbCSpca3QXjtTvz1jqq9kaNzibW.pdf', NULL, 'diperiksa', '2023-01-19 17:00:00', '2023-09-21 14:18:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

CREATE TABLE `satker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_satuan_kerja` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satker`
--

INSERT INTO `satker` (`id`, `nama_satuan_kerja`, `created_at`, `updated_at`) VALUES
(1, 'SEKRETARIAT JENDERAL', NULL, '2023-09-20 06:27:45'),
(3, 'DITJEN HAKI KALSEL', '2023-09-21 03:26:52', '2023-09-21 03:26:52'),
(4, 'DITJEN ADMINISTRASI HUKUM UMUM KANWIL KALSEL', '2023-11-01 06:10:06', '2023-11-01 06:10:06'),
(5, 'DITJEN PEMASYARAKATAN KANWIL KALSEL', '2023-11-01 06:10:40', '2023-11-01 06:10:40'),
(6, 'DITJEN IMIGRASI KANWIL KALSEL', '2023-11-01 06:11:12', '2023-11-01 06:11:12'),
(7, 'DITJEN PP KALSEL', '2023-11-01 06:11:48', '2023-11-01 06:11:48'),
(8, 'DITJEN HAM KANWIL KALSEL', '2023-11-01 06:12:21', '2023-11-01 06:12:21'),
(9, 'BPHN KANWIL KALSEL', '2023-11-01 06:12:53', '2023-11-01 06:12:53'),
(10, 'BALITBANG HAM KANWIL KALSEL', '2023-11-01 06:13:26', '2023-11-01 06:13:26'),
(11, 'KANIM BANJARMASIN', '2023-11-01 06:13:50', '2023-11-01 06:13:50'),
(12, 'KANIM BATULICIN', '2023-11-01 06:16:09', '2023-11-01 06:16:09'),
(13, 'LAPAS BANJARMASIN', '2023-11-01 06:16:33', '2023-11-01 06:16:33'),
(14, 'LAPAS NARKOTIKA KARANG INTAN', '2023-11-01 06:17:31', '2023-11-01 06:17:31'),
(15, 'LAPAS PEREMPUAN MARTAPURA', '2023-11-01 06:18:12', '2023-11-01 06:18:12'),
(16, 'LAPAS KOTABARU', '2023-11-01 06:18:41', '2023-11-01 06:18:41'),
(17, 'LAPAS AMUNTAI', '2023-11-01 23:43:18', '2023-11-01 23:43:18'),
(18, 'LAPAS BANJARBARU', '2023-11-01 23:47:06', '2023-11-01 23:47:06'),
(19, 'LAPAS TANJUNG', '2023-11-01 23:47:32', '2023-11-01 23:47:32'),
(20, 'LPKA MARTAPURA', '2023-11-01 23:48:41', '2023-11-01 23:48:41'),
(21, 'RUTAN PELAIHARI', '2023-11-01 23:49:12', '2023-11-01 23:49:12'),
(22, 'RUTAN KANDANGAN', '2023-11-01 23:49:46', '2023-11-01 23:49:46'),
(23, 'RUTAN RANTAU', '2023-11-01 23:51:04', '2023-11-01 23:51:04'),
(24, 'RUTAN BARABAI', '2023-11-01 23:51:28', '2023-11-01 23:51:28'),
(25, 'RUTAN MARABAHAN', '2023-11-01 23:52:02', '2023-11-01 23:52:02'),
(26, 'RUTAN TANJUNG', '2023-11-01 23:52:24', '2023-11-01 23:52:24'),
(27, 'RUPBASAN BANJARMASIN', '2023-11-01 23:53:01', '2023-11-01 23:53:01'),
(28, 'BAPAS BANJARMASIN', '2023-11-01 23:53:38', '2023-11-01 23:53:38'),
(29, 'BAPAS AMUNTAI', '2023-11-01 23:53:59', '2023-11-01 23:53:59'),
(30, 'LAPAS BATULICIN', '2023-11-01 23:54:25', '2023-11-01 23:54:25'),
(31, 'BAPAS BATULICIN', '2023-11-01 23:54:50', '2023-11-01 23:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `satker_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `is_admin`, `created_at`, `updated_at`, `satker_id`) VALUES
(1, 'Muhammad Achyadi Rahmat', 'C030321067', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-09-19 02:54:35', '2023-09-19 02:54:35', 1),
(3, 'Muhammad Siddiq', 'C030321075', '$2y$10$NDhOzNAIl85i/nMA8RCIC.PMZA/.6/qlAf6iknXwU118ieieC4UfK', 0, '2023-09-20 06:55:43', '2023-09-20 06:55:43', 1),
(4, 'Muhammad Dedy Setiady', 'C030321068', '$2y$10$4J.E1D1QoO0dOWAq0yH/bOZ66eLXWiRpucIYASTAR0b7BcuYy3vPy', 0, '2023-09-20 13:58:06', '2023-09-21 03:27:04', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`),
  ADD KEY `reports_satker_id_foreign` (`satker_id`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_satker_id_foreign` (`satker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `satker`
--
ALTER TABLE `satker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_satker_id_foreign` FOREIGN KEY (`satker_id`) REFERENCES `satker` (`id`),
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_satker_id_foreign` FOREIGN KEY (`satker_id`) REFERENCES `satker` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
