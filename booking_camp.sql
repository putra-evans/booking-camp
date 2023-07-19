-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Jul 2023 pada 15.45
-- Versi server: 8.0.33-cll-lve
-- Versi PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putraemy_booking_camp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_cara_booking`
--

CREATE TABLE `ms_cara_booking` (
  `id_cara_booking` bigint UNSIGNED NOT NULL,
  `cara_booking` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_cara_booking`
--

INSERT INTO `ms_cara_booking` (`id_cara_booking`, `cara_booking`, `created_at`, `updated_at`) VALUES
(1, '<ol>\r\n<li>pengunjung wajib registrasi dan login di web <em>camp ground</em> Danau Talang</li>\r\n<li>pada&nbsp; menu profil pengunjung wajib melengkapi data untuk di cek admin</li>\r\n<li>setelah akun di aktivasi oleh admin pengunjung bisa melakukan pembookingan</li>\r\n<li>pada menu booking pengunjung bisa memilih kavling dan tanggal yang diinginkan untuk melakukan&nbsp;<em>camping</em></li>\r\n<li>lalu pengunjung harus mengisikan data anggota tim jika ada dan lakukan pembookingan</li>\r\n<li>&nbsp;pada menu pesanan pengunjung harus melakukan pembayaran dan mengupload bukti pembayaran untuk divalidas admin</li>\r\n<li>jika status pesanan sudah diterima pengunjung bisa melakukan aktivitas di&nbsp;<em>camp ground</em> Danau Talang</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2023-05-28 10:12:38', '2023-07-12 12:50:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_galeri`
--

CREATE TABLE `ms_galeri` (
  `id_galeri` bigint UNSIGNED NOT NULL,
  `file_galeri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_galeri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang_galeri` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_galeri`
--

INSERT INTO `ms_galeri` (`id_galeri`, `file_galeri`, `judul_galeri`, `tentang_galeri`, `created_at`, `updated_at`) VALUES
(2, '1685268652_051622100_1595855483-IMG_20200725_143424.jpg', 'Lokasi kemah danau talang', 'liburan cuy', '2023-05-28 10:10:52', '2023-05-28 10:10:52'),
(3, '1685268668_Danau-Talang.jpg', 'Pemandangan indah tanau talang', 'indah', '2023-05-28 10:11:08', '2023-05-28 10:11:08'),
(7, '1688354566_download.jfif', 'DANAU TALANG', 'penampakan danau talang saat cuaca cerah', '2023-07-03 03:22:46', '2023-07-03 03:22:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_kavling`
--

CREATE TABLE `ms_kavling` (
  `id_kavling` bigint UNSIGNED NOT NULL,
  `kode_kavling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kavling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kavling` int NOT NULL COMMENT '0 = Tidak Aktif, 1 = Aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_kavling`
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
(28, 'K28', 'Kavling 28', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(29, 'K29', 'Kavling 29', 1, '2023-05-28 11:03:55', '2023-06-21 01:39:10'),
(31, 'K31', 'Kavling 31', 1, '2023-07-07 14:35:42', '2023-07-07 14:35:42'),
(32, 'K30', 'Kavling 30', 1, '2023-07-13 12:02:01', '2023-07-13 12:02:01'),
(33, 'K32', 'Kavling 32', 1, '2023-07-13 12:02:38', '2023-07-13 12:02:38'),
(34, 'K33', 'Kavling 33', 1, '2023-07-13 12:02:56', '2023-07-13 12:02:56'),
(35, 'K34', 'Kavling 34', 1, '2023-07-13 12:03:20', '2023-07-13 12:03:20'),
(36, 'K35', 'Kavling 35', 1, '2023-07-13 12:03:37', '2023-07-13 12:03:37'),
(37, 'K36', 'Kavling 36', 1, '2023-07-13 12:03:53', '2023-07-13 12:03:53'),
(38, 'K37', 'Kavling 37', 1, '2023-07-13 12:04:17', '2023-07-13 12:04:17'),
(39, 'K38', 'Kavling 38', 1, '2023-07-13 12:04:34', '2023-07-13 12:04:34'),
(40, 'K39', 'Kavling 39', 1, '2023-07-13 12:05:00', '2023-07-13 12:05:00'),
(41, 'K40', 'Kavling 40', 1, '2023-07-13 12:05:16', '2023-07-13 12:05:16'),
(42, 'K41', 'Kavling 41', 1, '2023-07-13 12:05:52', '2023-07-13 12:05:52'),
(43, 'K42', 'Kavling 42', 1, '2023-07-13 12:06:09', '2023-07-13 12:06:09'),
(44, 'K43', 'Kavling 43', 1, '2023-07-13 12:06:24', '2023-07-13 12:06:24'),
(45, 'K44', 'Kavling 44', 1, '2023-07-13 12:06:37', '2023-07-13 12:06:37'),
(46, 'K45', 'Kavling 45', 1, '2023-07-13 12:06:51', '2023-07-13 12:06:51'),
(47, 'K46', 'Kavling 46', 1, '2023-07-13 12:07:18', '2023-07-13 12:07:18'),
(48, 'K47', 'Kavling 47', 1, '2023-07-13 12:07:32', '2023-07-13 12:07:32'),
(49, 'K48', 'Kavling 48', 1, '2023-07-13 12:07:47', '2023-07-13 12:07:47'),
(50, 'K49', 'Kavling 49', 1, '2023-07-13 12:08:03', '2023-07-13 12:08:03'),
(51, 'K50', 'Kavling 50', 1, '2023-07-13 12:08:17', '2023-07-13 12:08:17'),
(52, 'K51', 'Kavling 51', 1, '2023-07-13 12:09:15', '2023-07-13 12:09:15'),
(53, 'K52', 'Kavling 52', 1, '2023-07-13 12:09:29', '2023-07-13 12:09:29'),
(54, 'K53', 'Kavling 53', 1, '2023-07-13 12:09:42', '2023-07-13 12:09:42'),
(55, 'K54', 'Kavling 54', 1, '2023-07-13 12:09:59', '2023-07-13 12:09:59'),
(56, 'K55', 'Kavling 55', 1, '2023-07-13 12:10:18', '2023-07-13 12:10:18'),
(57, 'K56', 'Kavling 56', 1, '2023-07-13 12:10:32', '2023-07-13 12:10:32'),
(58, 'K57', 'Kavling 57', 1, '2023-07-13 12:10:46', '2023-07-13 12:10:46'),
(59, 'K58', 'Kavling 58', 1, '2023-07-13 12:11:21', '2023-07-13 12:11:21'),
(60, 'K59', 'Kavling 59', 1, '2023-07-13 12:11:37', '2023-07-13 12:11:37'),
(61, 'K60', 'Kavling 60', 1, '2023-07-13 12:11:50', '2023-07-13 12:11:50'),
(62, 'K61', 'Kavling 61', 1, '2023-07-13 12:12:08', '2023-07-13 12:12:08'),
(63, 'K62', 'Kavling 62', 1, '2023-07-13 12:12:24', '2023-07-13 12:12:24'),
(64, 'K63', 'Kavling 63', 1, '2023-07-13 12:12:38', '2023-07-13 12:12:38'),
(65, 'K64', 'Kavling 64', 1, '2023-07-13 12:12:51', '2023-07-13 12:12:51'),
(66, 'K65', 'Kavling 65', 1, '2023-07-13 12:13:06', '2023-07-13 12:13:06'),
(67, 'K66', 'Kavling 66', 1, '2023-07-13 12:13:19', '2023-07-13 12:13:19'),
(68, 'K67', 'Kavling 67', 1, '2023-07-13 12:13:33', '2023-07-13 12:13:33'),
(69, 'K68', 'Kavling 68', 1, '2023-07-13 12:13:45', '2023-07-13 12:13:45'),
(70, 'K69', 'Kavling 69', 1, '2023-07-13 12:14:01', '2023-07-13 12:14:01'),
(71, 'K70', 'Kavling 70', 1, '2023-07-13 12:14:17', '2023-07-13 12:14:17'),
(72, 'K71', 'Kavling 71', 1, '2023-07-13 12:14:48', '2023-07-13 12:14:48'),
(73, 'K72', 'Kavling 72', 1, '2023-07-13 12:15:03', '2023-07-13 12:15:03'),
(74, 'K73', 'Kavling 73', 1, '2023-07-13 12:15:19', '2023-07-13 12:15:19'),
(75, 'K74', 'Kavling 74', 1, '2023-07-13 12:15:33', '2023-07-13 12:15:33'),
(76, 'K75', 'Kavling 75', 1, '2023-07-13 12:15:47', '2023-07-13 12:15:47'),
(77, 'K76', 'Kavling 76', 1, '2023-07-13 12:16:03', '2023-07-13 12:16:03'),
(78, 'K77', 'Kavling 77', 1, '2023-07-13 12:16:16', '2023-07-13 12:16:16'),
(79, 'K78', 'Kavling 78', 1, '2023-07-13 12:16:30', '2023-07-13 12:16:30'),
(80, 'K79', 'Kavling 79', 1, '2023-07-13 12:16:46', '2023-07-13 12:16:46'),
(81, 'K80', 'Kavling 80', 1, '2023-07-13 12:16:59', '2023-07-13 12:16:59'),
(82, 'K81', 'Kavling 81', 1, '2023-07-13 12:17:15', '2023-07-13 12:17:15'),
(83, 'K82', 'Kavling 82', 1, '2023-07-13 12:17:31', '2023-07-13 12:17:31'),
(84, 'K83', 'Kavling 83', 1, '2023-07-13 12:17:45', '2023-07-13 12:17:45'),
(85, 'K84', 'Kavling 84', 1, '2023-07-13 12:17:58', '2023-07-13 12:17:58'),
(86, 'K85', 'Kavling 85', 1, '2023-07-13 12:18:13', '2023-07-13 12:18:13'),
(87, 'K86', 'Kavling 86', 1, '2023-07-13 12:18:26', '2023-07-13 12:18:26'),
(88, 'K87', 'Kavling 87', 1, '2023-07-13 12:18:40', '2023-07-13 12:18:40'),
(89, 'K88', 'Kavling 88', 1, '2023-07-13 12:18:52', '2023-07-13 12:18:52'),
(90, 'K89', 'Kavling 89', 1, '2023-07-13 12:19:06', '2023-07-13 12:19:06'),
(91, 'K90', 'Kavling 90', 1, '2023-07-13 12:19:20', '2023-07-13 12:19:20'),
(92, 'K91', 'Kavling 91', 1, '2023-07-13 12:19:37', '2023-07-13 12:19:37'),
(93, 'K92', 'Kavling 92', 1, '2023-07-13 12:19:52', '2023-07-13 12:19:52'),
(94, 'K93', 'Kavling 93', 1, '2023-07-13 12:20:08', '2023-07-13 12:20:08'),
(95, 'K94', 'Kavling 94', 1, '2023-07-13 12:20:23', '2023-07-13 12:20:23'),
(96, 'K95', 'Kavling 95', 1, '2023-07-13 12:20:46', '2023-07-13 12:20:46'),
(97, 'K96', 'Kavling 96', 1, '2023-07-13 12:21:00', '2023-07-13 12:21:00'),
(98, 'K97', 'Kavling 97', 1, '2023-07-13 12:21:19', '2023-07-13 12:21:19'),
(99, 'K98', 'Kavling 98', 1, '2023-07-13 12:21:33', '2023-07-13 12:21:33'),
(100, 'K99', 'Kavling 99', 1, '2023-07-13 12:21:47', '2023-07-13 12:21:47'),
(101, 'K100', 'Kavling 100', 1, '2023-07-13 12:22:05', '2023-07-13 12:22:05'),
(102, 'K101', 'Kavling 101', 1, '2023-07-13 12:22:48', '2023-07-13 12:22:48'),
(103, 'K102', 'Kavling 102', 1, '2023-07-13 12:23:10', '2023-07-13 12:23:10'),
(104, 'K103', 'Kavling 103', 1, '2023-07-13 12:23:26', '2023-07-13 12:23:26'),
(105, 'K104', 'Kavling 104', 1, '2023-07-13 12:23:43', '2023-07-13 12:23:43'),
(106, 'K105', 'Kavling 105', 1, '2023-07-13 12:23:59', '2023-07-13 12:23:59'),
(107, 'K106', 'Kavling 106', 1, '2023-07-13 12:24:16', '2023-07-13 12:24:16'),
(108, 'K107', 'Kavling 107', 1, '2023-07-13 12:24:31', '2023-07-13 12:24:31'),
(109, 'K108', 'Kavling 108', 1, '2023-07-13 12:24:47', '2023-07-13 12:24:47'),
(110, 'K109', 'Kavling 109', 1, '2023-07-13 12:25:07', '2023-07-13 12:25:07'),
(111, 'K110', 'Kavling 110', 1, '2023-07-13 12:25:20', '2023-07-13 12:25:20'),
(112, 'K111', 'Kavling 111', 1, '2023-07-13 12:25:36', '2023-07-13 12:25:36'),
(113, 'K112', 'Kavling 112', 1, '2023-07-13 12:25:54', '2023-07-13 12:25:54'),
(114, 'K113', 'Kavling 113', 1, '2023-07-13 12:26:09', '2023-07-13 12:26:09'),
(115, 'K114', 'Kavling 114', 1, '2023-07-13 12:26:27', '2023-07-13 12:26:27'),
(116, 'K115', 'Kavling 115', 1, '2023-07-13 12:26:39', '2023-07-13 12:26:39'),
(117, 'K116', 'Kavling 116', 1, '2023-07-13 12:26:55', '2023-07-13 12:26:55'),
(118, 'K117', 'Kavling 117', 1, '2023-07-13 12:27:10', '2023-07-13 12:27:10'),
(119, 'K118', 'Kavling 118', 1, '2023-07-13 12:27:25', '2023-07-13 12:27:25'),
(120, 'K119', 'Kavling 119', 1, '2023-07-13 12:27:41', '2023-07-13 12:27:41'),
(121, 'K120', 'Kavling 120', 1, '2023-07-13 12:27:59', '2023-07-13 12:27:59'),
(122, 'K121', 'Kavling 121', 1, '2023-07-13 12:28:32', '2023-07-13 12:28:32'),
(123, 'K122', 'Kavling 122', 1, '2023-07-13 12:28:47', '2023-07-13 12:28:47'),
(124, 'K123', 'Kavling 123', 1, '2023-07-13 12:29:05', '2023-07-13 12:29:05'),
(125, 'K124', 'Kavling 124', 1, '2023-07-13 12:29:18', '2023-07-13 12:29:18'),
(126, 'K125', 'Kavling 125', 1, '2023-07-13 12:29:31', '2023-07-13 12:29:31'),
(127, 'K126', 'Kavling 126', 1, '2023-07-13 12:29:48', '2023-07-13 12:29:48'),
(128, 'K127', 'Kavling 127', 1, '2023-07-13 12:30:12', '2023-07-13 12:30:12'),
(129, 'K128', 'Kavling 128', 1, '2023-07-13 12:30:30', '2023-07-13 12:30:30'),
(130, 'K129', 'Kavling 129', 1, '2023-07-13 12:30:59', '2023-07-13 12:30:59'),
(131, 'K130', 'Kavling 130', 1, '2023-07-13 12:31:16', '2023-07-13 12:31:16'),
(132, 'K131', 'Kavling 131', 1, '2023-07-13 12:31:36', '2023-07-13 12:31:36'),
(133, 'K132', 'Kavling 132', 1, '2023-07-13 12:31:54', '2023-07-13 12:31:54'),
(134, 'K137', 'Kavling 137', 1, '2023-07-13 12:32:11', '2023-07-13 12:32:11'),
(135, 'K138', 'Kavling 138', 1, '2023-07-13 12:32:27', '2023-07-13 12:32:27'),
(136, 'K139', 'Kavling 139', 1, '2023-07-13 12:32:46', '2023-07-13 12:32:46'),
(137, 'K140', 'Kavling 140', 1, '2023-07-13 12:33:02', '2023-07-13 12:33:02'),
(138, 'K141', 'Kavling 141', 1, '2023-07-13 12:33:18', '2023-07-13 12:33:18'),
(139, 'K142', 'Kavling 142', 1, '2023-07-13 12:33:36', '2023-07-13 12:33:36'),
(140, 'K143', 'Kavling 143', 1, '2023-07-13 12:33:54', '2023-07-13 12:33:54'),
(141, 'K144', 'Kavling 144', 1, '2023-07-13 12:34:10', '2023-07-13 12:34:10'),
(142, 'K145', 'Kavling 145', 1, '2023-07-13 12:34:29', '2023-07-13 12:34:29'),
(143, 'K146', 'Kavling 146', 1, '2023-07-13 12:34:46', '2023-07-13 12:34:46'),
(144, 'K147', 'Kavling 147', 1, '2023-07-13 12:35:02', '2023-07-13 12:35:02'),
(145, 'K148', 'Kavling 148', 1, '2023-07-13 12:35:21', '2023-07-13 12:35:21'),
(146, 'K149', 'Kavling 149', 1, '2023-07-13 12:35:56', '2023-07-13 12:35:56'),
(147, 'K150', 'Kavling 150', 1, '2023-07-13 12:36:17', '2023-07-13 12:36:17'),
(148, 'K151', 'Kavling 151', 1, '2023-07-13 12:36:33', '2023-07-13 12:36:33'),
(149, 'K152', 'Kavling 152', 1, '2023-07-13 12:36:49', '2023-07-13 12:36:49'),
(150, 'K153', 'Kavling 153', 1, '2023-07-13 12:37:11', '2023-07-13 12:37:11'),
(151, 'K158', 'Kavling 158', 1, '2023-07-13 12:37:36', '2023-07-13 12:37:36'),
(152, 'K154', 'Kavling 154', 1, '2023-07-13 12:37:56', '2023-07-13 12:37:56'),
(153, 'K155', 'Kavling 155', 1, '2023-07-13 12:38:15', '2023-07-13 12:38:15'),
(154, 'K156', 'Kavling 156', 1, '2023-07-13 12:38:33', '2023-07-13 12:38:33'),
(155, 'K157', 'Kavling 157', 1, '2023-07-13 12:38:54', '2023-07-13 12:38:54'),
(156, 'K159', 'Kavling 159', 1, '2023-07-13 12:39:27', '2023-07-13 12:39:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_syarat_ketentuan`
--

CREATE TABLE `ms_syarat_ketentuan` (
  `id_syarat_ketentuan` bigint UNSIGNED NOT NULL,
  `syarat_ketentuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_syarat_ketentuan`
--

INSERT INTO `ms_syarat_ketentuan` (`id_syarat_ketentuan`, `syarat_ketentuan`, `created_at`, `updated_at`) VALUES
(3, '<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ol>\r\n<li style=\"font-weight: bold;\"><strong>melaporkan diri kepada pengelola yang ada di pos sebelum dan sesudah kegiatan dilakukan dengan membawa bukti invoice pembookingan</strong></li>\r\n<li style=\"font-weight: bold;\"><strong>Menyerahkan fotocopy identitas ktp/ sim/ kartu pelajar/ mahasiswa/ paspor yang masih berlaku</strong></li>\r\n<li style=\"font-weight: bold;\"><strong>Pengunjung wajib check out tepat waktu sesuai invoice pembookingan&nbsp;</strong></li>\r\n<li style=\"font-weight: bold;\"><strong>1 (satu) tenda hanya boleh maksimal diisi sebanyak 5 orang</strong></li>\r\n<li style=\"font-weight: bold;\"><strong>Bagi pengunjung berumur &lt; 17 tahun harus ada yang mendampingi seperti keluarga/wali (surat ijin orang tua jika diperlukan).</strong></li>\r\n<li style=\"font-weight: bold;\"><strong>barang berharga seperti hp, dompet dll dijaga dengan sebaik-baiknya, kehilangan barang pribadi diluar tanggung jawab pengelola tempat</strong></li>\r\n<li style=\"font-weight: bold;\"><strong>Dilarang membawa senjata tajam kecuali untuk keperluan memasak</strong></li>\r\n<li style=\"font-weight: bold;\"><strong>&nbsp;Dilarang membawa obat-obatan terlarang</strong></li>\r\n<li style=\"font-weight: bold;\"><strong>Pengunjung wajib mentaati semua peraturan selama masih berada di kawasan camp ground Danau Talang jika tidak maka akan dikenakan sanksi sesuai dengan ketentuan dan peraturan perundang-undangan yang berlaku&nbsp;</strong></li>\r\n</ol>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2023-05-28 11:04:16', '2023-07-11 14:09:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_tata_tertib`
--

CREATE TABLE `ms_tata_tertib` (
  `id_tata_tertib` bigint UNSIGNED NOT NULL,
  `tata_tertib` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_tata_tertib`
--

INSERT INTO `ms_tata_tertib` (`id_tata_tertib`, `tata_tertib`, `created_at`, `updated_at`) VALUES
(3, '<p>&nbsp;</p>\r\n<ol>\r\n<li>Menjaga ucapan, tingkah laku&nbsp; dan perbuatan yang tidak pantas</li>\r\n<li>wajib menjaga kebersihan dan tidak boleh buang sampah sembarangan</li>\r\n<li>Membawa cukup logistik, perlengkapan dan peralatan secukupnya sesuai tujuan kunjungan</li>\r\n<li>Membawa obat-obatan P3K seperti obat sakit kepala, sakit perut, obat luka, obat malaria, dan obat-obatan pribadi jika ada riwayat penyakit</li>\r\n<li>riwayat penyakit seperti asma (sesak napas), pilek alergi (rinitis alergi), sinusitis, dan alergi kulit karena udara dingin wajib membawa obat pribadi</li>\r\n<li>Membawa perlengkapan tidur (jaket, selimut, kaus kaki dll).</li>\r\n<li>Menggunakan pakaian yang tebal dan hangat karena cuaca dingin</li>\r\n<li>Tidak boleh tidur berpasangan (lawan jenis) dalam 1 tenda kecuali sudah menikah atau keluarga kandung</li>\r\n<li>pengunjung wajib mentaati semua tata tertib selama masih berada di kawasan&nbsp;<em>camp ground&nbsp;</em>Danau Talang</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2023-05-28 11:05:17', '2023-07-12 12:49:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
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
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(2, 'user', 'web', '2023-05-27 04:56:25', '2023-05-27 04:56:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_anggota`
--

CREATE TABLE `ta_anggota` (
  `id_anggota` bigint UNSIGNED NOT NULL,
  `id_booking` bigint NOT NULL,
  `id_kavling` bigint NOT NULL,
  `no_booking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_anggota` int NOT NULL,
  `jk_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_perorang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap_anggota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `riwayat_penyakit_anggota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ta_anggota`
--

INSERT INTO `ta_anggota` (`id_anggota`, `id_booking`, `id_kavling`, `no_booking`, `nik`, `nama_anggota`, `umur_anggota`, `jk_anggota`, `status_anggota`, `notelp_anggota`, `biaya_perorang`, `alamat_lengkap_anggota`, `riwayat_penyakit_anggota`, `created_at`, `updated_at`) VALUES
(1, 1, 12, '#BO-KAV-15-SCZVO6F9DT', '981364136421953', 'hada', 22, 'Laki-laki', 'Mahasiswa', '8326', '15000', 'padang', 'sehat', '2023-07-10 04:04:07', '2023-07-10 04:50:12'),
(2, 1, 12, '#BO-KAV-15-SCZVO6F9DT', '1275847247', 'pijah', 23, 'Laki-laki', 'Mahasiswa', '2467', '15000', 'padang', 'sehat', '2023-07-10 04:05:09', '2023-07-10 04:50:12'),
(3, 2, 12, '#BO-KAV-15-SCZVO6F9DT', '981364136421953', 'hada', 22, 'Laki-laki', 'Mahasiswa', '8326', '15000', 'padang', 'sehat', '2023-07-10 04:29:33', '2023-07-10 04:50:12'),
(4, 2, 12, '#BO-KAV-15-SCZVO6F9DT', '1275847247', 'pijah', 23, 'Laki-laki', 'Mahasiswa', '2467', '15000', 'padang', 'sehat', '2023-07-10 04:29:51', '2023-07-10 04:50:12'),
(5, 4, 11, '#BO-KAV-16-VI5JHYCHPE', '3289732', 'scbksa', 23, 'Laki-laki', 'Mahasiswa', '03948957', '15000', 'mbdaskdhsa', 'csakdsa,', '2023-07-10 06:55:53', '2023-07-10 06:56:05'),
(6, 5, 11, '#BO-KAV-17-H84BO3ZYXV', '94595', 'andre', 25, 'Laki-laki', 'Mahasiswa', '163264', '15000', 'dvsabndas', 'sehat', '2023-07-10 06:57:59', '2023-07-10 06:58:09'),
(7, 6, 25, '#BO-KAV-18-0ZD4YJVPZJ', '67135', 'zonda', 25, 'Laki-laki', 'Umum', '738213', '15000', 'solok', 'sehat', '2023-07-10 08:07:28', '2023-07-10 08:07:46'),
(9, 11, 10, '#BO-KAV-18-IJ0U1YKORL', '389562', 'adik sayang', 24, 'Perempuan', 'Mahasiswa', '086734', '15000', 'solok', 'sehat selalu aamiin', '2023-07-11 13:48:36', '2023-07-11 14:00:06'),
(10, 11, 10, '#BO-KAV-18-IJ0U1YKORL', '763463785', 'aye ganteng', 30, 'Laki-laki', 'Umum', '082163', '15000', 'solok', 'sehat selalu aamiin', '2023-07-11 13:50:22', '2023-07-11 14:00:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_booking`
--

CREATE TABLE `ta_booking` (
  `id_booking` bigint UNSIGNED NOT NULL,
  `id_user` bigint NOT NULL,
  `id_kavling` bigint NOT NULL,
  `no_booking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_booking` date NOT NULL,
  `lama_menginap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pesanan` int NOT NULL COMMENT '0 = Belum Booking, 1 = Berhasil Booking',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ta_booking`
--

INSERT INTO `ta_booking` (`id_booking`, `id_user`, `id_kavling`, `no_booking`, `tanggal_booking`, `lama_menginap`, `total_biaya`, `status_pesanan`, `created_at`, `updated_at`) VALUES
(1, 15, 12, '#BO-KAV-15-SCZVO6F9DT', '2023-07-10', '1', '30000', 1, '2023-07-10 03:53:56', '2023-07-10 04:50:12'),
(2, 15, 12, '#BO-KAV-15-SCZVO6F9DT', '2023-07-11', '1', '30000', 1, '2023-07-10 04:29:16', '2023-07-10 04:50:12'),
(4, 16, 11, '#BO-KAV-16-VI5JHYCHPE', '2023-07-11', '1', '15000', 1, '2023-07-10 06:55:12', '2023-07-10 06:56:05'),
(5, 17, 11, '#BO-KAV-17-H84BO3ZYXV', '2023-07-12', '1', '15000', 1, '2023-07-10 06:57:16', '2023-07-10 06:58:09'),
(6, 18, 25, '#BO-KAV-18-0ZD4YJVPZJ', '2023-07-10', '1', '15000', 1, '2023-07-10 08:06:49', '2023-07-10 08:07:46'),
(11, 18, 10, '#BO-KAV-18-IJ0U1YKORL', '2023-07-11', '1', '30000', 1, '2023-07-11 13:46:45', '2023-07-11 14:00:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_file_pembayaran`
--

CREATE TABLE `ta_file_pembayaran` (
  `id_file_pembayaran` bigint UNSIGNED NOT NULL,
  `id_final_booking` bigint NOT NULL,
  `id_user` bigint NOT NULL,
  `no_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctt_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ta_file_pembayaran`
--

INSERT INTO `ta_file_pembayaran` (`id_file_pembayaran`, `id_final_booking`, `id_user`, `no_booking`, `nama_file_pembayaran`, `ctt_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 15, '#BO-KAV-15-SCZVO6F9DT', '1688964642_WhatsApp Image 2023-06-21 at 20.05.41.jpeg', 'LUNAS', '2023-07-10 04:50:42', '2023-07-10 04:50:42'),
(2, 3, 17, '#BO-KAV-17-H84BO3ZYXV', '1688972339_WhatsApp Image 2023-06-21 at 20.05.39.jpeg', 'lunas', '2023-07-10 06:58:59', '2023-07-10 06:58:59'),
(3, 4, 18, '#BO-KAV-18-0ZD4YJVPZJ', '1688976694_Danau_Talang.jpg', 'lunas', '2023-07-10 08:11:34', '2023-07-10 08:11:34'),
(4, 5, 18, '#BO-KAV-18-IJ0U1YKORL', '1689084034_WhatsApp Image 2023-06-21 at 20.05.39.jpeg', 'lunas', '2023-07-11 14:00:34', '2023-07-11 14:00:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_final_booking`
--

CREATE TABLE `ta_final_booking` (
  `id_final_booking` bigint UNSIGNED NOT NULL,
  `id_user` bigint NOT NULL,
  `no_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_menginap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_final` int NOT NULL COMMENT '0 = Belum Bayar, 1 = Pembayaran diproses, 2 = pembayaran diterima, 3 = pembayaran ditolak',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ta_final_booking`
--

INSERT INTO `ta_final_booking` (`id_final_booking`, `id_user`, `no_booking`, `total_menginap`, `final_biaya`, `status_final`, `created_at`, `updated_at`) VALUES
(1, 15, '#BO-KAV-15-SCZVO6F9DT', '2', '60000', 2, '2023-07-10 04:50:12', '2023-07-10 04:51:17'),
(2, 16, '#BO-KAV-16-VI5JHYCHPE', '1', '15000', 0, '2023-07-10 06:56:05', '2023-07-10 06:56:05'),
(3, 17, '#BO-KAV-17-H84BO3ZYXV', '1', '15000', 2, '2023-07-10 06:58:09', '2023-07-10 08:12:12'),
(4, 18, '#BO-KAV-18-0ZD4YJVPZJ', '1', '15000', 2, '2023-07-10 08:07:46', '2023-07-10 08:12:05'),
(5, 18, '#BO-KAV-18-IJ0U1YKORL', '1', '30000', 1, '2023-07-11 14:00:07', '2023-07-11 14:00:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
  `status_akun` int DEFAULT NULL COMMENT '0 = Tidak Aktif, 1 = Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_telp`, `password`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `foto_user`, `foto_ktp`, `alamat_lengkap`, `status_akun`, `created_at`, `updated_at`) VALUES
(1, 'Sintia Noftika', 'admin@gmail.com', '09374765', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'icin', 'Laki-laki', 'ampang', '1999-11-18', NULL, NULL, 'gn. pangilun', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(10, 'sintia', 'sintia@gmail.com', '0823', '$2y$10$DuYvIE9vYj936hsazMFdhe7F5Gc5TqfFotW0zi7JNPu4x3JCggUv.', 'icin', 'Perempuan', 'kp.batu', '1999-11-18', '1687352936_WhatsApp Image 2023-06-21 at 20.04.06.jpeg', '1687352991_WhatsApp Image 2023-06-21 at 20.03.26.jpeg', 'solok', 1, '2023-06-21 12:57:19', '2023-06-21 12:57:19'),
(12, 'putra evans', 'putra@gmail.com', NULL, '$2y$10$JP6HNGCRZQRikZAiwPLIne4jE5Pw.MSLpTep2wFVqgqGeaA3xq3aW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-02 15:47:27', '2023-07-02 15:47:27'),
(13, 'mita', 'mita@gmail.com', '09329', '$2y$10$vld4TSec2a4hBqhDzvXlxe1tW2yd9nrmkOlHqSX.hdZ7gnpUcV5qu', 'sumi', 'Laki-laki', 'mentawai', '2023-06-27', NULL, NULL, 'mentawai', 1, '2023-07-03 02:51:04', '2023-07-03 02:51:04'),
(14, 'User', 'user@gmail.com', NULL, '$2y$10$InpXH5f5spR6rlkGhzSlC.y9QETRkPkMX3Sgm3hSrK3nUa3nhWAe.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-03 03:10:05', '2023-07-03 03:10:05'),
(15, 'arif', 'arif@gmail.com', '0976', '$2y$10$IuaNfZ0Q7Qha3afrVUZ57.IF0BW4f7GesPpJ7iyVimPemsP1CVS5G', 'ripkun', 'Laki-laki', 'sijunjung', '1999-08-08', NULL, NULL, 'sijunjung kota', 1, '2023-07-03 03:58:38', '2023-07-03 03:58:38'),
(16, 'randa', 'randa@gmail.com', NULL, '$2y$10$tNH1bg7mqMLVogFK8n.gleOPWj3MBIq9Z1fIJXfRt1F7t/zccR3Xy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-10 06:50:31', '2023-07-10 06:50:31'),
(17, 'nopi', 'nopi@gmail.com', NULL, '$2y$10$tBlrVpvb7y9CrEsLD68he.Xzaat43eZ.OrG730dkQMTj75lAjS4SK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-10 06:57:00', '2023-07-10 06:57:00'),
(18, 'andre', 'andre@gmail.com', '83236', '$2y$10$2gBJn23gsd33UgBxIOu5/.m5iwz8E1S9N0vGPJVW2i0NB4ScDJFdO', 'aye', 'Laki-laki', 'solok', '1999-07-12', '1688976296_WhatsApp Image 2023-06-21 at 20.04.06.jpeg', '1688976305_WhatsApp Image 2023-06-21 at 20.03.26.jpeg', 'solok', 1, '2023-07-10 07:01:24', '2023-07-10 07:01:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `ms_cara_booking`
--
ALTER TABLE `ms_cara_booking`
  ADD PRIMARY KEY (`id_cara_booking`);

--
-- Indeks untuk tabel `ms_galeri`
--
ALTER TABLE `ms_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `ms_kavling`
--
ALTER TABLE `ms_kavling`
  ADD PRIMARY KEY (`id_kavling`);

--
-- Indeks untuk tabel `ms_syarat_ketentuan`
--
ALTER TABLE `ms_syarat_ketentuan`
  ADD PRIMARY KEY (`id_syarat_ketentuan`);

--
-- Indeks untuk tabel `ms_tata_tertib`
--
ALTER TABLE `ms_tata_tertib`
  ADD PRIMARY KEY (`id_tata_tertib`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `ta_anggota`
--
ALTER TABLE `ta_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `ta_booking`
--
ALTER TABLE `ta_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `ta_file_pembayaran`
--
ALTER TABLE `ta_file_pembayaran`
  ADD PRIMARY KEY (`id_file_pembayaran`);

--
-- Indeks untuk tabel `ta_final_booking`
--
ALTER TABLE `ta_final_booking`
  ADD PRIMARY KEY (`id_final_booking`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ms_cara_booking`
--
ALTER TABLE `ms_cara_booking`
  MODIFY `id_cara_booking` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ms_galeri`
--
ALTER TABLE `ms_galeri`
  MODIFY `id_galeri` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ms_kavling`
--
ALTER TABLE `ms_kavling`
  MODIFY `id_kavling` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `ms_syarat_ketentuan`
--
ALTER TABLE `ms_syarat_ketentuan`
  MODIFY `id_syarat_ketentuan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ms_tata_tertib`
--
ALTER TABLE `ms_tata_tertib`
  MODIFY `id_tata_tertib` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ta_anggota`
--
ALTER TABLE `ta_anggota`
  MODIFY `id_anggota` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ta_booking`
--
ALTER TABLE `ta_booking`
  MODIFY `id_booking` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ta_file_pembayaran`
--
ALTER TABLE `ta_file_pembayaran`
  MODIFY `id_file_pembayaran` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ta_final_booking`
--
ALTER TABLE `ta_final_booking`
  MODIFY `id_final_booking` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
