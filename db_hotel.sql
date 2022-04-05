-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 10:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `fasilitashtl`
--

CREATE TABLE `fasilitashtl` (
  `id_fasilitas` bigint(20) UNSIGNED NOT NULL,
  `nama_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitashtl`
--

INSERT INTO `fasilitashtl` (`id_fasilitas`, `nama_fasilitas`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Kolam Api', 'kolam.jpg', 'Lantai 3 Bawah Tanah', '2022-03-23 20:53:32', '2022-03-23 20:53:32'),
(2, 'Coffee Maker', 'pexels-suhel-vba-3659683.jpg', 'Keadaan Normal', '2022-03-24 19:26:06', '2022-03-24 19:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitaskmr`
--

CREATE TABLE `fasilitaskmr` (
  `id_fasilitas` bigint(20) UNSIGNED NOT NULL,
  `nama_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitaskmr`
--

INSERT INTO `fasilitaskmr` (`id_fasilitas`, `nama_fasilitas`, `tipe_kamar`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'Kamar berukuran luas 32 m2', 'Superior', 'superior.jpg', '2022-04-04 21:49:09', '2022-04-04 21:49:09'),
(3, 'Kamar berukuran luas 45 m2', 'Deluxe', 'deluxe.jpg', '2022-04-04 21:49:49', '2022-04-04 21:49:49'),
(4, 'Kamar mandi shower', 'Superior', 'shower.jpg', '2022-04-04 21:59:49', '2022-04-04 21:59:49'),
(5, 'Coffee Maker', 'Superior', 'coffee maker.jpg', '2022-04-04 22:00:06', '2022-04-04 22:00:06'),
(6, 'AC', 'Superior', 'ac.jpg', '2022-04-04 22:00:30', '2022-04-04 22:00:30'),
(7, 'LED TV 32 inch', 'Superior', 'tv32.jpg', '2022-04-04 22:00:53', '2022-04-04 22:00:53'),
(8, 'Kamar mandi shower dan Bath Tub', 'Deluxe', 'bathtub.jpg', '2022-04-04 22:01:30', '2022-04-04 22:01:30'),
(9, 'Coffee Maker', 'Deluxe', 'coffee maker.jpg', '2022-04-04 22:01:54', '2022-04-04 22:01:54'),
(10, 'Sofa', 'Deluxe', 'sofa.jpg', '2022-04-04 22:02:13', '2022-04-04 22:02:13'),
(11, 'LED TV 40 inch', 'Deluxe', 'tv40.jpg', '2022-04-04 22:04:40', '2022-04-04 22:04:40'),
(12, 'AC', 'Deluxe', 'ac.jpg', '2022-04-04 22:05:57', '2022-04-04 22:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` bigint(20) UNSIGNED NOT NULL,
  `tipe_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `tipe_kamar`, `jumlah_kamar`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Superior', 23, 'deluxe.jpg', NULL, NULL),
(2, 'Deluxe', 23, 'deluxe.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kamar_has_fasilitas`
--

CREATE TABLE `kamar_has_fasilitas` (
  `id_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_03_09_082935_create_permission_tables', 1),
(5, '2022_03_11_042728_create_tamu_table', 1),
(6, '2022_03_11_042800_create_resepsionis_table', 1),
(7, '2022_03_11_042848_create_admin_table', 1),
(8, '2022_03_11_042917_create_kamar_table', 1),
(9, '2022_03_11_042936_create_fasilitaskmr_table', 1),
(10, '2022_03_11_042948_create_fasilitashtl_table', 1),
(11, '2022_03_11_043026_create_kamar_has_fasilitas_table', 1),
(12, '2022_03_11_043053_create_reservasi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 3),
(3, 'App\\User', 4);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resepsionis`
--

CREATE TABLE `resepsionis` (
  `id_resepsionis` bigint(20) UNSIGNED NOT NULL,
  `nama_resepsionis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_resepsionis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp_resepsionis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` bigint(20) UNSIGNED NOT NULL,
  `tgl_checkin` date NOT NULL,
  `tgl_checkout` date NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `nama_pemesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tamu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp_tamu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-03-23 20:47:18', '2022-03-23 20:47:18'),
(2, 'resepsionis', 'web', '2022-03-23 20:47:18', '2022-03-23 20:47:18'),
(3, 'tamu', 'web', '2022-03-23 20:47:18', '2022-03-23 20:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` bigint(20) UNSIGNED NOT NULL,
  `nama_tamu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tamu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp_tamu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noktp_tamu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@role.test', NULL, '$2y$10$OezJFny4bDbmhje7.OoM0.6M/MVr/e6QaZpKHcnTXAmFMeHcy37WC', NULL, '2022-03-23 20:47:18', '2022-03-23 20:47:18'),
(2, 'Resepsionis', 'resepsionis@role.test', NULL, '$2y$10$WgMgeyaavzePRhwT8SJrleRx0fmYuik2SZgCuVEVV8nsPP3gDM39i', NULL, '2022-03-23 20:47:18', '2022-03-23 20:47:18'),
(3, 'Tamu', 'tamu@role.test', NULL, '$2y$10$l8V2HK5n5S6qvXejaDazKeKy6SRckGofI8MhgVMGPvPPfgBLiV4Ky', NULL, '2022-03-23 20:47:19', '2022-03-23 20:47:19'),
(4, 'Delila', 'delila@gmail.com', NULL, '$2y$10$iagF.ZVZdnM50etn4/EmlO2uVSq8U4A6wtKdPoOF4K4BqIkYODxAu', NULL, '2022-03-23 20:55:03', '2022-03-23 20:55:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitashtl`
--
ALTER TABLE `fasilitashtl`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `fasilitaskmr`
--
ALTER TABLE `fasilitaskmr`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `resepsionis`
--
ALTER TABLE `resepsionis`
  ADD PRIMARY KEY (`id_resepsionis`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

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
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitashtl`
--
ALTER TABLE `fasilitashtl`
  MODIFY `id_fasilitas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitaskmr`
--
ALTER TABLE `fasilitaskmr`
  MODIFY `id_fasilitas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resepsionis`
--
ALTER TABLE `resepsionis`
  MODIFY `id_resepsionis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
