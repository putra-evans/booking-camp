-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2023 at 11:37 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_camp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_06_055714_create_permission_tables', 1),
(6, '2023_05_10_130012_create_ms_kavling_table', 1),
(7, '2023_05_10_143743_create_ta_booking_table', 1),
(8, '2023_05_14_134340_create_ta_final_booking_table', 1),
(9, '2023_05_15_133526_create_ta_file_pembayaran_table', 1),
(10, '2023_05_19_090135_create_ms_syarat_ketentuan_table', 1),
(11, '2023_05_20_113432_create_ms_tata_tertib_table', 1),
(12, '2023_05_20_152828_create_ms_cara_booking_table', 1),
(13, '2023_05_21_135110_create_ta_anggota_table', 1),
(14, '2023_05_24_142100_create_ms_galeri_table', 1);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ms_cara_booking`
--

CREATE TABLE `ms_cara_booking` (
  `id_cara_booking` bigint(20) UNSIGNED NOT NULL,
  `cara_booking` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_cara_booking`
--

INSERT INTO `ms_cara_booking` (`id_cara_booking`, `cara_booking`, `created_at`, `updated_at`) VALUES
(1, '<p>tes</p>', '2023-05-28 10:12:38', '2023-05-28 10:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `ms_galeri`
--

CREATE TABLE `ms_galeri` (
  `id_galeri` bigint(20) UNSIGNED NOT NULL,
  `file_galeri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_galeri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang_galeri` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_galeri`
--

INSERT INTO `ms_galeri` (`id_galeri`, `file_galeri`, `judul_galeri`, `tentang_galeri`, `created_at`, `updated_at`) VALUES
(1, '1685268627_62bc6fde3f50c.png', 'Pemandangan indah tanau talang', 'berlibur rame-rame', '2023-05-28 10:10:27', '2023-05-28 10:10:27'),
(2, '1685268652_051622100_1595855483-IMG_20200725_143424.jpg', 'Lokasi kemah danau talang', 'liburan cuy', '2023-05-28 10:10:52', '2023-05-28 10:10:52'),
(3, '1685268668_Danau-Talang.jpg', 'Pemandangan indah tanau talang', 'indah', '2023-05-28 10:11:08', '2023-05-28 10:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `ms_kavling`
--

CREATE TABLE `ms_kavling` (
  `id_kavling` bigint(20) UNSIGNED NOT NULL,
  `kode_kavling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kavling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kavling` int(11) NOT NULL COMMENT '0 = Tidak Aktif, 1 = Aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_kavling`
--

INSERT INTO `ms_kavling` (`id_kavling`, `kode_kavling`, `nama_kavling`, `status_kavling`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'Kavling 1', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(2, 'K2', 'Kavling 2', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(3, 'K3', 'Kavling 3', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(4, 'K4', 'Kavling 4', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(5, 'K5', 'Kavling 5', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(6, 'K6', 'Kavling 6', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(7, 'K7', 'Kavling 7', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(8, 'K8', 'Kavling 8', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(9, 'K9', 'Kavling 9', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(10, 'K10', 'Kavling 10', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(11, 'K11', 'Kavling 11', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(12, 'K12', 'Kavling 12', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(13, 'K13', 'Kavling 13', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(14, 'K14', 'Kavling 14', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(15, 'K15', 'Kavling 15', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(16, 'K16', 'Kavling 16', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(17, 'K17', 'Kavling 17', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(18, 'K18', 'Kavling 18', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(19, 'K19', 'Kavling 19', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(20, 'K20', 'Kavling 20', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(21, 'K21', 'Kavling 21', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(22, 'K22', 'Kavling 22', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(23, 'K23', 'Kavling 23', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(24, 'K24', 'Kavling 24', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(25, 'K25', 'Kavling 25', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(26, 'K26', 'Kavling 26', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(27, 'K27', 'Kavling 27', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(28, 'K28', 'Kavling 28', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `ms_syarat_ketentuan`
--

CREATE TABLE `ms_syarat_ketentuan` (
  `id_syarat_ketentuan` bigint(20) UNSIGNED NOT NULL,
  `syarat_ketentuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_syarat_ketentuan`
--

INSERT INTO `ms_syarat_ketentuan` (`id_syarat_ketentuan`, `syarat_ketentuan`, `created_at`, `updated_at`) VALUES
(2, '<p>tes</p>', '2023-05-28 10:12:09', '2023-05-28 10:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `ms_tata_tertib`
--

CREATE TABLE `ms_tata_tertib` (
  `id_tata_tertib` bigint(20) UNSIGNED NOT NULL,
  `tata_tertib` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_tata_tertib`
--

INSERT INTO `ms_tata_tertib` (`id_tata_tertib`, `tata_tertib`, `created_at`, `updated_at`) VALUES
(1, '<p>tes</p>', '2023-05-28 10:12:23', '2023-05-28 10:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
(1, 'admin', 'web', '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(2, 'user', 'web', '2023-05-27 04:56:25', '2023-05-27 04:56:25');

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
-- Table structure for table `ta_anggota`
--

CREATE TABLE `ta_anggota` (
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `id_booking` bigint(20) NOT NULL,
  `id_kavling` bigint(20) NOT NULL,
  `no_booking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_anggota` int(11) NOT NULL,
  `jk_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_perorang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap_anggota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `riwayat_penyakit_anggota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ta_booking`
--

CREATE TABLE `ta_booking` (
  `id_booking` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_kavling` bigint(20) NOT NULL,
  `no_booking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_booking` date NOT NULL,
  `lama_menginap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pesanan` int(11) NOT NULL COMMENT '0 = Belum Booking, 1 = Berhasil Booking',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ta_file_pembayaran`
--

CREATE TABLE `ta_file_pembayaran` (
  `id_file_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `id_final_booking` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `no_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctt_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ta_final_booking`
--

CREATE TABLE `ta_final_booking` (
  `id_final_booking` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `no_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_menginap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_final` int(11) NOT NULL COMMENT '0 = Belum Bayar, 1 = Pembayaran diproses, 2 = pembayaran diterima, 3 = pembayaran ditolak',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci,
  `status_akun` int(11) DEFAULT NULL COMMENT '0 = Tidak Aktif, 1 = Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_telp`, `password`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `foto_user`, `foto_ktp`, `alamat_lengkap`, `status_akun`, `created_at`, `updated_at`) VALUES
(1, 'Putra Evans Pratama', 'admin@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(5, 'user', 'user@gmail.com', '082285248130', '$2y$10$QmR9oh4N/pND7FbjcamYEu00QghL98vvsez90S02QSCzk27xyZfkK', 'Putra', 'Laki-laki', 'Padang Pariaman', '2023-07-03', '1688396836_TARIKH.jpg', '1688396840_1683454410_l-img20210420015823jpg20210420005933.jpeg', 'Padang Panjang', 1, '2023-07-03 15:02:25', '2023-07-03 15:02:25');

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
-- Indexes for table `ms_cara_booking`
--
ALTER TABLE `ms_cara_booking`
  ADD PRIMARY KEY (`id_cara_booking`);

--
-- Indexes for table `ms_galeri`
--
ALTER TABLE `ms_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `ms_kavling`
--
ALTER TABLE `ms_kavling`
  ADD PRIMARY KEY (`id_kavling`);

--
-- Indexes for table `ms_syarat_ketentuan`
--
ALTER TABLE `ms_syarat_ketentuan`
  ADD PRIMARY KEY (`id_syarat_ketentuan`);

--
-- Indexes for table `ms_tata_tertib`
--
ALTER TABLE `ms_tata_tertib`
  ADD PRIMARY KEY (`id_tata_tertib`);

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
-- Indexes for table `ta_anggota`
--
ALTER TABLE `ta_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `ta_booking`
--
ALTER TABLE `ta_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `ta_file_pembayaran`
--
ALTER TABLE `ta_file_pembayaran`
  ADD PRIMARY KEY (`id_file_pembayaran`);

--
-- Indexes for table `ta_final_booking`
--
ALTER TABLE `ta_final_booking`
  ADD PRIMARY KEY (`id_final_booking`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ms_cara_booking`
--
ALTER TABLE `ms_cara_booking`
  MODIFY `id_cara_booking` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_galeri`
--
ALTER TABLE `ms_galeri`
  MODIFY `id_galeri` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ms_kavling`
--
ALTER TABLE `ms_kavling`
  MODIFY `id_kavling` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ms_syarat_ketentuan`
--
ALTER TABLE `ms_syarat_ketentuan`
  MODIFY `id_syarat_ketentuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_tata_tertib`
--
ALTER TABLE `ms_tata_tertib`
  MODIFY `id_tata_tertib` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ta_anggota`
--
ALTER TABLE `ta_anggota`
  MODIFY `id_anggota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_booking`
--
ALTER TABLE `ta_booking`
  MODIFY `id_booking` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_file_pembayaran`
--
ALTER TABLE `ta_file_pembayaran`
  MODIFY `id_file_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ta_final_booking`
--
ALTER TABLE `ta_final_booking`
  MODIFY `id_final_booking` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
