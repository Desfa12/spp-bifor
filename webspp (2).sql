-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2025 at 07:34 AM
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
-- Database: `webspp`
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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `angkatan` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `jurusan`, `angkatan`, `aktif`, `created_at`, `updated_at`) VALUES
(5, 'XI', 'REKAYASA PERANGKAT LUNAK (RPL)', '2024/2025', 1, '2025-02-19 07:07:50', '2025-02-25 14:32:01'),
(7, 'XI', 'MULTIMEDIA (MM)', '2024/2025', 1, NULL, '2025-02-25 14:32:56'),
(10, 'X', 'MULTIMEDIA (MM)', '2024/2025', 1, NULL, '2025-02-25 14:33:33'),
(11, 'X', 'TEKNIK JARINGAN KOMPUTER (TKJ)', '2024/2025', 1, NULL, '2025-02-25 14:33:41'),
(12, 'XI', 'TEKNIK JARINGAN KOMPUTER (TKJ)', '2024/2025', 1, NULL, '2025-02-25 14:33:50'),
(13, 'XII', 'REKAYASA PERANGKAT LUNAK (RPL)', '2024/2025', 1, NULL, '2025-02-25 14:32:15'),
(14, 'X', 'OTOMATISASI TATA KELOLA PERKANTORAN (OTKP)', '2024/2025', 1, NULL, '2025-02-25 14:34:01'),
(15, 'XII', 'TEKNIK JARINGAN KOMPUTER (TKJ)', '2024/2025', 1, NULL, '2025-02-25 14:34:12'),
(16, 'XII', 'MULTIMEDIA (MM)', '2024/2025', 1, NULL, '2025-02-25 14:37:21'),
(17, 'XI', 'OTOMATISASI TATA KELOLA PERKANTORAN (OTKP)', '2024/2025', 1, NULL, '2025-02-25 14:37:50'),
(18, 'XII', 'OTOMATISASI TATA KELOLA PERKANTORAN', '2024/2025', 0, NULL, '2025-02-25 14:28:32'),
(19, 'XII', 'PEMASARAN', '2022', 0, NULL, NULL),
(20, 'X', 'AKUNTANSI', '2024', 0, NULL, NULL),
(21, 'XI', 'AKUNTANSI', '2023', 0, NULL, NULL),
(22, 'XII', 'AKUNTANSI', '2022', 0, NULL, NULL),
(23, 'X', 'TKJ', '2024', 0, NULL, NULL),
(24, 'XI', 'TKJ', '2023', 0, NULL, NULL),
(25, 'XII', 'TKJ', '2022', 0, NULL, NULL);

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
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('viandry8002@gmail.com', '$2y$12$HRbNXoLdgvI6iuq463uk4eLR3ZvCDYabapzhhf6YmA/U5yqbGKxje', '2025-02-26 03:46:48');

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(255) DEFAULT NULL,
  `no_lembaga` varchar(255) DEFAULT NULL,
  `no_tlp` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kepala_sekolah` varchar(255) DEFAULT NULL,
  `nip_kepsek` varchar(18) DEFAULT NULL,
  `bendahara` varchar(255) DEFAULT NULL,
  `nip_bendahara` varchar(18) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `ttd_bendahara` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nama_satuan`, `no_lembaga`, `no_tlp`, `alamat`, `kota`, `kepala_sekolah`, `nip_kepsek`, `bendahara`, `nip_bendahara`, `logo`, `ttd_bendahara`, `created_at`, `updated_at`) VALUES
(1, 'YAYASAN PENDIDIKAN NURUL ILMA 123', '167816861', '087834013036', 'ddd', 'fff', 'aaa', '938372837389083832', 'ssss', '738372635245678987', '1741169444_dandels.jpg', '1741169638_ttd_rosi.jpeg', '2025-02-19 08:33:29', '2025-03-05 10:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `nama_siswa`, `id_kelas`, `jenis_kelamin`, `tgl_lahir`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, '09837654', '3874098763', 'desfa', 5, 'P', '2025-02-09', '093789378', '2025-02-09 07:50:31', '2025-02-09 08:03:51'),
(2, '09876487', '0394857645', 'lolii2222', 5, 'L', '2025-02-09', '05283975892', '2025-02-09 08:11:06', '2025-02-19 07:45:12'),
(4, '1001', '2001', 'Andi Saputra', 5, 'L', '2007-01-15', '081234567890', NULL, NULL),
(5, '1002', '2002', 'Budi Santoso', 5, 'L', '2006-05-22', '081234567891', NULL, NULL),
(6, '1003', '2003', 'Citra Dewi', 5, 'P', '2005-09-10', '081234567892', NULL, NULL),
(7, '1004', '2004', 'Dian Prasetyo', 5, 'L', '2007-03-05', '081234567893', NULL, NULL),
(8, '1005', '2005', 'Eka Wijaya', 5, 'P', '2006-07-18', '081234567894', NULL, NULL),
(9, '1006', '2006', 'Fajar Ramadhan', 5, 'L', '2005-02-14', '081234567895', NULL, NULL),
(10, '1007', '2007', 'Gina Anggraini', 5, 'P', '2007-11-22', '081234567896', NULL, NULL),
(11, '1008', '2008', 'Hendra Saputra', 5, 'L', '2006-04-30', '081234567897', NULL, NULL),
(12, '1009', '2009', 'Indra Kurniawan', 5, 'L', '2005-06-12', '081234567898', NULL, NULL),
(13, '1010', '2010', 'Joko Riyadi', 5, 'L', '2007-10-08', '081234567899', NULL, NULL),
(14, '1011', '2011', 'Kiki Amelia', 5, 'P', '2006-08-25', '081234567900', NULL, NULL),
(15, '1012', '2012', 'Lina Maulida', 5, 'P', '2005-12-05', '081234567901', NULL, NULL),
(16, '1013', '2013', 'Mira Septiani', 5, 'P', '2007-09-19', '081234567902', NULL, NULL),
(17, '1014', '2014', 'Novi Yulianti', 5, 'P', '2006-02-28', '081234567903', NULL, NULL),
(18, '1015', '2015', 'Oki Setiawan', 5, 'L', '2005-07-01', '081234567904', NULL, NULL),
(19, '17171717171717717171', '12345645', 'rath', 5, 'P', '2025-02-23', '13213131231', '2025-02-22 20:39:20', '2025-02-22 20:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `bulan` date DEFAULT NULL,
  `tagihan` int(11) DEFAULT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_siswa`, `sekolah`, `tipe`, `bulan`, `tagihan`, `bayar`, `sisa`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, 1, '', 'SPP', '2025-03-04', 200000, 100000, 100000, 'asd', '2025-03-04 10:08:44', '2025-03-04 10:08:44'),
(9, 1, '', 'DSP', '2025-03-04', 300000, 50000, 250000, NULL, '2025-03-04 10:45:39', '2025-03-04 10:45:39'),
(10, 1, '', 'SPP', '2025-03-05', 250000, 50000, 200000, NULL, '2025-03-04 10:47:29', '2025-03-04 10:47:29'),
(11, 1, '', 'SPP', '2025-03-07', 350000, 25000, 325000, NULL, '2025-03-04 10:52:58', '2025-03-04 10:52:58'),
(12, 5, '', 'DSP', '2025-03-04', 500000, 500000, 0, NULL, '2025-03-04 11:06:18', '2025-03-04 11:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `unique_code` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `unique_code`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'desfa', 'de@gmail.com', NULL, '', '$2y$12$zw0A.YuYF1T9q7UfzVZt5OcSWiesnOfA8v9BfxC2TF..PiuD9Ll/2', NULL, '2025-02-06 04:07:38', '2025-02-06 04:07:38'),
(2, 'Qotrun', 'qotrun@gmail.com', NULL, '', '$2y$12$ljH07CViLAIS/niUFh/05e5i1WVH6VJFJ.a7BIoTR5npMr96gyceS', NULL, '2025-02-07 06:38:11', '2025-02-07 06:38:11'),
(3, 'dafa', 'dafa@gmail.com', NULL, '', '$2y$12$9NBNkAukCR7trTb8px.6tOapq3KZ2Wzt84pvIJVafLdHQH4ScGJry', NULL, '2025-02-17 06:19:27', '2025-02-17 06:19:27'),
(4, 'viandry', 'viandry8002@gmail.com', NULL, '', '$2y$12$wn.XxjvYBCD5P0gdy6imB.dYWXU7oZU0VpdDOJLB2bfu5CGJ44vMO', NULL, '2025-02-26 03:09:30', '2025-02-26 03:09:30'),
(5, 'vian', 'vian@gmail.com', NULL, 'asd123', '$2y$12$.lu/ISXa9OJi5MuZMbPIYOUd/8qhu1GoiCB5C6zsEZxsIa0Zm8rpe', NULL, '2025-03-04 07:44:03', '2025-03-04 09:50:44'),
(6, 'dede', 'dede@gmail.com', NULL, 'dede123', '$2y$12$Ggde2QgrfHMVXDlHg6.GQOpSzp0tecZCGZvx47iuuxINFfei0o9xa', NULL, '2025-03-04 09:53:01', '2025-03-04 09:53:01');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
