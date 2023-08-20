-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2023 pada 15.34
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

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
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
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
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_cara_booking`
--

CREATE TABLE `ms_cara_booking` (
  `id_cara_booking` bigint(20) UNSIGNED NOT NULL,
  `cara_booking` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_cara_booking`
--

INSERT INTO `ms_cara_booking` (`id_cara_booking`, `cara_booking`, `created_at`, `updated_at`) VALUES
(1, '<p>tes</p>', '2023-05-28 10:12:38', '2023-05-28 10:12:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_galeri`
--

CREATE TABLE `ms_galeri` (
  `id_galeri` bigint(20) UNSIGNED NOT NULL,
  `file_galeri` varchar(255) NOT NULL,
  `judul_galeri` varchar(255) NOT NULL,
  `tentang_galeri` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_galeri`
--

INSERT INTO `ms_galeri` (`id_galeri`, `file_galeri`, `judul_galeri`, `tentang_galeri`, `created_at`, `updated_at`) VALUES
(1, '1685268627_62bc6fde3f50c.png', 'Pemandangan indah tanau talang', 'berlibur rame-rame', '2023-05-28 10:10:27', '2023-05-28 10:10:27'),
(2, '1685268652_051622100_1595855483-IMG_20200725_143424.jpg', 'Lokasi kemah danau talang', 'liburan cuy', '2023-05-28 10:10:52', '2023-05-28 10:10:52'),
(3, '1685268668_Danau-Talang.jpg', 'Pemandangan indah tanau talang', 'indah', '2023-05-28 10:11:08', '2023-05-28 10:11:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_kavling`
--

CREATE TABLE `ms_kavling` (
  `id_kavling` bigint(20) UNSIGNED NOT NULL,
  `kode_kavling` varchar(255) NOT NULL,
  `nama_kavling` varchar(255) NOT NULL,
  `nama_saya` varchar(20) NOT NULL,
  `status_kavling` int(11) NOT NULL COMMENT '0 = Tidak Aktif, 1 = Aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_kavling`
--

INSERT INTO `ms_kavling` (`id_kavling`, `kode_kavling`, `nama_kavling`, `nama_saya`, `status_kavling`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'Kavling 1', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(2, 'K2', 'Kavling 2', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(3, 'K3', 'Kavling 3', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(4, 'K4', 'Kavling 4', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(5, 'K5', 'Kavling 5', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(6, 'K6', 'Kavling 6', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(7, 'K7', 'Kavling 7', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(8, 'K8', 'Kavling 8', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(9, 'K9', 'Kavling 9', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(10, 'K10', 'Kavling 10', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(11, 'K11', 'Kavling 11', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(12, 'K12', 'Kavling 12', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(13, 'K13', 'Kavling 13', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(14, 'K14', 'Kavling 14', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(15, 'K15', 'Kavling 15', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(16, 'K16', 'Kavling 16', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(17, 'K17', 'Kavling 17', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(18, 'K18', 'Kavling 18', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(19, 'K19', 'Kavling 19', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(20, 'K20', 'Kavling 20', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(21, 'K21', 'Kavling 21', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(22, 'K22', 'Kavling 22', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(23, 'K23', 'Kavling 23', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(24, 'K24', 'Kavling 24', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(25, 'K25', 'Kavling 25', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(26, 'K26', 'Kavling 26', '', 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(27, 'K27', 'Kavling 27', 'deki', 1, '2023-05-27 04:56:25', '2023-08-14 14:19:35'),
(28, 'K28', 'Kavling 28', 'ajo', 1, '2023-05-27 04:56:25', '2023-08-14 14:19:28'),
(29, 'K1000', 'Kavling No 29000', 'udin', 1, '2023-08-14 14:07:22', '2023-08-14 14:19:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_syarat_ketentuan`
--

CREATE TABLE `ms_syarat_ketentuan` (
  `id_syarat_ketentuan` bigint(20) UNSIGNED NOT NULL,
  `syarat_ketentuan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_syarat_ketentuan`
--

INSERT INTO `ms_syarat_ketentuan` (`id_syarat_ketentuan`, `syarat_ketentuan`, `created_at`, `updated_at`) VALUES
(2, '<p>tes</p>', '2023-05-28 10:12:09', '2023-05-28 10:12:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_tata_tertib`
--

CREATE TABLE `ms_tata_tertib` (
  `id_tata_tertib` bigint(20) UNSIGNED NOT NULL,
  `tata_tertib` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_tata_tertib`
--

INSERT INTO `ms_tata_tertib` (`id_tata_tertib`, `tata_tertib`, `created_at`, `updated_at`) VALUES
(1, '<p>tes</p>', '2023-05-28 10:12:23', '2023-05-28 10:12:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
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
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_anggota`
--

CREATE TABLE `ta_anggota` (
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `id_booking` bigint(20) NOT NULL,
  `id_kavling` bigint(20) NOT NULL,
  `no_booking` varchar(255) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `umur_anggota` int(11) NOT NULL,
  `jk_anggota` varchar(255) NOT NULL,
  `status_anggota` varchar(255) NOT NULL,
  `notelp_anggota` varchar(255) NOT NULL,
  `biaya_perorang` varchar(255) NOT NULL,
  `alamat_lengkap_anggota` text NOT NULL,
  `riwayat_penyakit_anggota` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ta_anggota`
--

INSERT INTO `ta_anggota` (`id_anggota`, `id_booking`, `id_kavling`, `no_booking`, `nik`, `nama_anggota`, `umur_anggota`, `jk_anggota`, `status_anggota`, `notelp_anggota`, `biaya_perorang`, `alamat_lengkap_anggota`, `riwayat_penyakit_anggota`, `created_at`, `updated_at`) VALUES
(11, 11, 2, '#BO-KAV-5-4DMN5EGJHR', 'Natus et irure proid', 'Eos id error invento', 19, 'Perempuan', 'Umum', '65', '15000', 'Architecto iusto omn', 'Voluptatibus accusam', '2023-08-16 15:23:39', '2023-08-16 15:24:05'),
(12, 11, 2, '#BO-KAV-5-4DMN5EGJHR', 'Accusamus deleniti e', 'Magni animi aut nat', 80, 'Laki-laki', 'Pelajar', '34', '15000', 'Ut culpa animi ex e', 'Corrupti ullamco si', '2023-08-16 15:23:44', '2023-08-16 15:24:05'),
(13, 10, 1, '#BO-KAV-5-4DMN5EGJHR', 'Natus et irure proid', 'Eos id error invento', 19, 'Perempuan', 'Umum', '65', '15000', 'Architecto iusto omn', 'Voluptatibus accusam', '2023-08-16 15:23:53', '2023-08-16 15:24:05'),
(14, 10, 1, '#BO-KAV-5-4DMN5EGJHR', 'Accusamus deleniti e', 'Magni animi aut nat', 80, 'Laki-laki', 'Pelajar', '34', '15000', 'Ut culpa animi ex e', 'Corrupti ullamco si', '2023-08-16 15:23:59', '2023-08-16 15:24:05'),
(15, 13, 5, '#BO-KAV-5-LXJFDNWKSS', '1311032110970001', 'udin', 21, 'Perempuan', 'Pelajar', '082285248130', '15000', 'aasd', 'asd', '2023-08-16 16:07:47', '2023-08-16 16:08:27'),
(16, 13, 5, '#BO-KAV-5-LXJFDNWKSS', '1311032110970002', 'qwe', 23, 'Laki-laki', 'Mahasiswa', '082285248130', '15000', 'as', 'as', '2023-08-16 16:08:05', '2023-08-16 16:08:27'),
(17, 12, 4, '#BO-KAV-5-LXJFDNWKSS', '1311032110970001', 'udin', 21, 'Perempuan', 'Pelajar', '082285248130', '15000', 'aasd', 'asd', '2023-08-16 16:08:17', '2023-08-16 16:08:27'),
(18, 12, 4, '#BO-KAV-5-LXJFDNWKSS', '1311032110970002', 'qwe', 23, 'Laki-laki', 'Mahasiswa', '082285248130', '15000', 'as', 'as', '2023-08-16 16:08:22', '2023-08-16 16:08:27'),
(19, 15, 9, '#BO-KAV-5-EUG8JZQ1V2', 'Sapiente tempore de', 'Earum esse mollit il', 30, 'Laki-laki', 'Pelajar', '18', '15000', 'Nobis eos deleniti', 'Labore at qui id vol', '2023-08-16 16:19:16', '2023-08-16 16:19:49'),
(20, 15, 9, '#BO-KAV-5-EUG8JZQ1V2', 'Animi nobis sunt ex', 'Est beatae tenetur u', 99, 'Laki-laki', 'Umum', '62', '15000', 'Aspernatur enim enim', 'Dolor laborum suscip', '2023-08-16 16:19:21', '2023-08-16 16:19:49'),
(21, 14, 8, '#BO-KAV-5-EUG8JZQ1V2', 'Possimus blanditiis', 'Et nesciunt consequ', 19, 'Perempuan', 'Pelajar', '94', '15000', 'Atque corrupti exce', 'Placeat ut sit proi', '2023-08-16 16:19:30', '2023-08-16 16:19:49'),
(22, 14, 8, '#BO-KAV-5-EUG8JZQ1V2', 'Eos dolor et volupta', 'Ut velit temporibus', 100, 'Laki-laki', 'Umum', '32', '15000', 'Ut deserunt officiis', 'Quo perferendis vita', '2023-08-16 16:19:37', '2023-08-16 16:19:49'),
(23, 16, 11, '#BO-KAV-5-CV7TILTQMU', 'Dolor sed quisquam m', 'Ex ipsam qui consequ', 47, 'Perempuan', 'Umum', '23', '15000', 'Quia duis quis omnis', 'At voluptates est la', '2023-08-16 16:24:50', '2023-08-16 16:38:21'),
(24, 17, 4, '#BO-KAV-5-UNBTXMVZ8R', 'Modi facilis ipsam c', 'Consequat Nemo sapi', 70, 'Laki-laki', 'Mahasiswa', '98', '15000', 'Voluptate et quas vo', 'Illum corporis eum', '2023-08-16 17:20:28', '2023-08-16 17:20:33'),
(25, 19, 5, '#BO-KAV-5-SQZEUHKOPD', 'Distinctio Et accus', 'Nulla aliquam et lab', 38, 'Perempuan', 'Umum', '46', '15000', 'Neque aperiam dolor', 'Accusamus qui autem', '2023-08-20 12:20:40', '2023-08-20 13:10:27'),
(26, 18, 4, '#BO-KAV-5-SQZEUHKOPD', 'Mollitia in ullamco', 'Sunt minim dolor ut', 59, 'Perempuan', 'Pelajar', '21', '15000', 'Deleniti et dolore r', 'Ut enim consequuntur', '2023-08-20 12:20:51', '2023-08-20 13:10:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_booking`
--

CREATE TABLE `ta_booking` (
  `id_booking` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_kavling` bigint(20) NOT NULL,
  `no_booking` varchar(255) DEFAULT NULL,
  `tanggal_booking` date NOT NULL,
  `lama_menginap` varchar(255) NOT NULL,
  `total_biaya` varchar(255) NOT NULL,
  `status_pesanan` int(11) NOT NULL COMMENT '0 = Belum Booking, 1 = Berhasil Booking',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ta_booking`
--

INSERT INTO `ta_booking` (`id_booking`, `id_user`, `id_kavling`, `no_booking`, `tanggal_booking`, `lama_menginap`, `total_biaya`, `status_pesanan`, `created_at`, `updated_at`) VALUES
(10, 5, 1, '#BO-KAV-5-4DMN5EGJHR', '2023-08-16', '1', '30000', 1, '2023-08-16 15:23:24', '2023-08-16 15:24:05'),
(11, 5, 2, '#BO-KAV-5-4DMN5EGJHR', '2023-08-16', '1', '30000', 1, '2023-08-16 15:23:29', '2023-08-16 15:24:05'),
(12, 5, 4, '#BO-KAV-5-LXJFDNWKSS', '2023-08-16', '1', '30000', 1, '2023-08-16 16:07:24', '2023-08-16 16:08:27'),
(13, 5, 5, '#BO-KAV-5-LXJFDNWKSS', '2023-08-16', '1', '30000', 1, '2023-08-16 16:07:29', '2023-08-16 16:08:27'),
(14, 5, 8, '#BO-KAV-5-EUG8JZQ1V2', '2023-08-16', '1', '30000', 1, '2023-08-16 16:19:01', '2023-08-16 16:19:49'),
(15, 5, 9, '#BO-KAV-5-EUG8JZQ1V2', '2023-08-16', '1', '30000', 1, '2023-08-16 16:19:05', '2023-08-16 16:19:49'),
(16, 5, 11, '#BO-KAV-5-CV7TILTQMU', '2023-08-16', '1', '15000', 1, '2023-08-16 16:24:41', '2023-08-16 16:38:21'),
(17, 5, 4, '#BO-KAV-5-UNBTXMVZ8R', '2023-08-17', '1', '15000', 1, '2023-08-16 17:20:21', '2023-08-16 17:20:33'),
(18, 5, 4, '#BO-KAV-5-SQZEUHKOPD', '2023-08-20', '1', '15000', 1, '2023-08-20 12:18:24', '2023-08-20 13:10:27'),
(19, 5, 5, '#BO-KAV-5-SQZEUHKOPD', '2023-08-20', '1', '15000', 1, '2023-08-20 12:18:29', '2023-08-20 13:10:27'),
(20, 5, 1, '', '2023-08-20', '1', '0', 0, '2023-08-20 13:30:25', '2023-08-20 13:30:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_file_pembayaran`
--

CREATE TABLE `ta_file_pembayaran` (
  `id_file_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `id_final_booking` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `no_booking` varchar(255) NOT NULL,
  `nama_file_pembayaran` varchar(255) NOT NULL,
  `ctt_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ta_file_pembayaran`
--

INSERT INTO `ta_file_pembayaran` (`id_file_pembayaran`, `id_final_booking`, `id_user`, `no_booking`, `nama_file_pembayaran`, `ctt_pembayaran`, `created_at`, `updated_at`) VALUES
(2, 3, 5, '#BO-KAV-5-4DMN5EGJHR', '1692199481_bukti-transfer-brimo.jpg', 'sudah dibayar', '2023-08-16 15:24:41', '2023-08-16 15:24:41'),
(3, 4, 5, '#BO-KAV-5-LXJFDNWKSS', '1692202132_7a2a54914b7408dbceb49246b0de929f.jpg', 'bayar', '2023-08-16 16:08:52', '2023-08-16 16:08:52'),
(4, 5, 5, '#BO-KAV-5-EUG8JZQ1V2', '1692202805_f4ce2e63ec7be0e549d6de826ecb3de6.jpg', 'gas', '2023-08-16 16:20:05', '2023-08-16 16:20:05'),
(5, 8, 5, '#BO-KAV-5-SQZEUHKOPD', '1692537685_bukti-transfer-brimo.jpg', 'gas', '2023-08-20 13:21:25', '2023-08-20 13:21:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ta_final_booking`
--

CREATE TABLE `ta_final_booking` (
  `id_final_booking` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `no_booking` varchar(255) NOT NULL,
  `total_menginap` varchar(255) NOT NULL,
  `final_biaya` varchar(255) NOT NULL,
  `status_final` int(11) NOT NULL COMMENT '0 = Belum Bayar, 1 = Pembayaran diproses, 2 = pembayaran diterima, 3 = pembayaran ditolak',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jam_masuk` varchar(20) NOT NULL,
  `jam_keluar` varchar(20) NOT NULL,
  `exp_date` datetime(6) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ta_final_booking`
--

INSERT INTO `ta_final_booking` (`id_final_booking`, `id_user`, `no_booking`, `total_menginap`, `final_biaya`, `status_final`, `created_at`, `jam_masuk`, `jam_keluar`, `exp_date`, `updated_at`) VALUES
(3, 5, '#BO-KAV-5-4DMN5EGJHR', '2', '60000', 2, '2023-08-16 15:24:05', '', '', '0000-00-00 00:00:00.000000', '2023-08-16 17:12:11'),
(4, 5, '#BO-KAV-5-LXJFDNWKSS', '2', '60000', 2, '2023-08-16 16:08:27', '', '', '0000-00-00 00:00:00.000000', '2023-08-16 17:12:13'),
(5, 5, '#BO-KAV-5-EUG8JZQ1V2', '2', '60000', 2, '2023-08-16 16:19:49', '', '', '0000-00-00 00:00:00.000000', '2023-08-16 17:12:16'),
(6, 5, '#BO-KAV-5-CV7TILTQMU', '1', '15000', 3, '2023-08-16 16:38:21', '', '', '2023-08-16 08:38:21.000000', '2023-08-16 17:20:03'),
(7, 5, '#BO-KAV-5-UNBTXMVZ8R', '1', '15000', 3, '2023-08-16 17:20:33', '', '', '2023-08-17 02:20:33.000000', '2023-08-20 12:16:20'),
(8, 5, '#BO-KAV-5-SQZEUHKOPD', '2', '30000', 2, '2023-08-20 13:10:27', '08.00', '16.00', '2023-08-20 22:10:27.000000', '2023-08-20 13:21:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_user` varchar(255) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `status_akun` int(11) DEFAULT NULL COMMENT '0 = Tidak Aktif, 1 = Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_telp`, `password`, `nama_panggilan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `foto_user`, `foto_ktp`, `alamat_lengkap`, `status_akun`, `created_at`, `updated_at`) VALUES
(1, 'Putra Evans Pratama', 'admin@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-05-27 04:56:25', '2023-05-27 04:56:25'),
(5, 'user', 'user@gmail.com', '082285248130', '$2y$10$QmR9oh4N/pND7FbjcamYEu00QghL98vvsez90S02QSCzk27xyZfkK', 'Putra', 'Laki-laki', 'Padang Pariaman', '2023-07-03', '1688396836_TARIKH.jpg', '1688396840_1683454410_l-img20210420015823jpg20210420005933.jpeg', 'Padang Panjang', 1, '2023-07-03 15:02:25', '2023-07-03 15:02:25');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ms_cara_booking`
--
ALTER TABLE `ms_cara_booking`
  MODIFY `id_cara_booking` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ms_galeri`
--
ALTER TABLE `ms_galeri`
  MODIFY `id_galeri` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ms_kavling`
--
ALTER TABLE `ms_kavling`
  MODIFY `id_kavling` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `ms_syarat_ketentuan`
--
ALTER TABLE `ms_syarat_ketentuan`
  MODIFY `id_syarat_ketentuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ms_tata_tertib`
--
ALTER TABLE `ms_tata_tertib`
  MODIFY `id_tata_tertib` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ta_anggota`
--
ALTER TABLE `ta_anggota`
  MODIFY `id_anggota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `ta_booking`
--
ALTER TABLE `ta_booking`
  MODIFY `id_booking` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `ta_file_pembayaran`
--
ALTER TABLE `ta_file_pembayaran`
  MODIFY `id_file_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ta_final_booking`
--
ALTER TABLE `ta_final_booking`
  MODIFY `id_final_booking` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
