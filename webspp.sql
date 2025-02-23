-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2025 at 12:24 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webspp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `tingkat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `jurusan`, `angkatan`, `aktif`, `created_at`, `updated_at`) VALUES
(5, 'XI', 'RPL', '333', 1, '2025-02-19 07:07:50', '2025-02-19 07:10:39'),
(7, 'XI', 'MULTIMEDIA', '2022', 0, NULL, NULL),
(8, 'XII', 'PEMASARAN', '2021', 0, NULL, NULL),
(9, 'X', 'RPL', '2024', 0, NULL, NULL),
(10, 'XI', 'MULTIMEDIA', '2023', 0, NULL, NULL),
(11, 'X', 'RPL', '2023', 0, NULL, NULL),
(12, 'XI', 'RPL', '2022', 0, NULL, NULL),
(13, 'XII', 'RPL', '2021', 0, NULL, NULL),
(14, 'X', 'MULTIMEDIA', '2023', 0, NULL, NULL),
(15, 'XI', 'MULTIMEDIA', '2022', 0, NULL, NULL),
(16, 'XII', 'MULTIMEDIA', '2021', 0, NULL, NULL),
(17, 'X', 'PEMASARAN', '2024', 0, NULL, NULL),
(18, 'XI', 'PEMASARAN', '2023', 0, NULL, NULL),
(19, 'XII', 'PEMASARAN', '2022', 0, NULL, NULL),
(20, 'X', 'AKUNTANSI', '2024', 0, NULL, NULL),
(21, 'XI', 'AKUNTANSI', '2023', 0, NULL, NULL),
(22, 'XII', 'AKUNTANSI', '2022', 0, NULL, NULL),
(23, 'X', 'TKJ', '2024', 0, NULL, NULL),
(24, 'XI', 'TKJ', '2023', 0, NULL, NULL),
(25, 'XII', 'TKJ', '2022', 0, NULL, NULL),
(26, 'X', 'RPL', '222', 1, '2025-02-22 20:56:07', '2025-02-22 20:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2025_02_07_141700_create_datasiswas_table', 2),
(9, '2025_02_09_142210_create_kelas_table', 3),
(10, '2025_02_09_143413_create_siswa_table', 4),
(11, '2025_02_09_150622_create_history_table', 5),
(12, '2025_02_11_101400_create_settings_table', 6),
(13, '2025_02_11_111117_rename_table_settings_to_transaksi', 7),
(14, '2025_02_11_121950_create_transaksi_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `nama_satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_lembaga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_tlp` int DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepala_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_kepsek` int DEFAULT NULL,
  `bendahara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_bendahara` int DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nama_satuan`, `no_lembaga`, `no_tlp`, `alamat`, `kota`, `kepala_sekolah`, `nip_kepsek`, `bendahara`, `nip_bendahara`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'YAYASAN PENDIDIKAN NURUL ILMA 123', '123123', 3123333, 'ddd', 'fff', 'aaa', 2232323, 'ssss', 23212323, '1740283253_yysn.png', '2025-02-19 08:33:29', '2025-02-22 21:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `nama_siswa`, `id_kelas`, `jenis_kelamin`, `tgl_lahir`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, '09837654', '3874098763', 'desfa', 0, 'P', '2025-02-09', '093789378', '2025-02-09 07:50:31', '2025-02-09 08:03:51'),
(2, '09876487', '0394857645', 'lolii2222', 0, 'L', '2025-02-09', '05283975892', '2025-02-09 08:11:06', '2025-02-19 07:45:12'),
(4, '1001', '2001', 'Andi Saputra', 0, 'L', '2007-01-15', '081234567890', NULL, NULL),
(5, '1002', '2002', 'Budi Santoso', 0, 'L', '2006-05-22', '081234567891', NULL, NULL),
(6, '1003', '2003', 'Citra Dewi', 0, 'P', '2005-09-10', '081234567892', NULL, NULL),
(7, '1004', '2004', 'Dian Prasetyo', 0, 'L', '2007-03-05', '081234567893', NULL, NULL),
(8, '1005', '2005', 'Eka Wijaya', 0, 'P', '2006-07-18', '081234567894', NULL, NULL),
(9, '1006', '2006', 'Fajar Ramadhan', 0, 'L', '2005-02-14', '081234567895', NULL, NULL),
(10, '1007', '2007', 'Gina Anggraini', 0, 'P', '2007-11-22', '081234567896', NULL, NULL),
(11, '1008', '2008', 'Hendra Saputra', 0, 'L', '2006-04-30', '081234567897', NULL, NULL),
(12, '1009', '2009', 'Indra Kurniawan', 0, 'L', '2005-06-12', '081234567898', NULL, NULL),
(13, '1010', '2010', 'Joko Riyadi', 0, 'L', '2007-10-08', '081234567899', NULL, NULL),
(14, '1011', '2011', 'Kiki Amelia', 0, 'P', '2006-08-25', '081234567900', NULL, NULL),
(15, '1012', '2012', 'Lina Maulida', 0, 'P', '2005-12-05', '081234567901', NULL, NULL),
(16, '1013', '2013', 'Mira Septiani', 0, 'P', '2007-09-19', '081234567902', NULL, NULL),
(17, '1014', '2014', 'Novi Yulianti', 0, 'P', '2006-02-28', '081234567903', NULL, NULL),
(18, '1015', '2015', 'Oki Setiawan', 0, 'L', '2005-07-01', '081234567904', NULL, NULL),
(19, '17171717171717717171', '12345645', 'rath', 5, 'P', '2025-02-23', '13213131231', '2025-02-22 20:39:20', '2025-02-22 20:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_siswa` int NOT NULL,
  `tipe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagihan` int DEFAULT NULL,
  `bayar` int NOT NULL,
  `sisa` int DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'desfa', 'de@gmail.com', NULL, '$2y$12$zw0A.YuYF1T9q7UfzVZt5OcSWiesnOfA8v9BfxC2TF..PiuD9Ll/2', NULL, '2025-02-06 04:07:38', '2025-02-06 04:07:38'),
(2, 'Qotrun', 'qotrun@gmail.com', NULL, '$2y$12$ljH07CViLAIS/niUFh/05e5i1WVH6VJFJ.a7BIoTR5npMr96gyceS', NULL, '2025-02-07 06:38:11', '2025-02-07 06:38:11'),
(3, 'dafa', 'dafa@gmail.com', NULL, '$2y$12$9NBNkAukCR7trTb8px.6tOapq3KZ2Wzt84pvIJVafLdHQH4ScGJry', NULL, '2025-02-17 06:19:27', '2025-02-17 06:19:27');

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
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datasiswa_nis_unique` (`nis`),
  ADD UNIQUE KEY `datasiswa_nisn_unique` (`nisn`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
