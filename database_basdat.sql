-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 05:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_basdat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_05_164657_add_role_to_users_table', 2),
(5, '2024_10_05_183840_create_siswa_table', 3),
(6, '2024_10_05_183844_create_orang_tua_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `no_kk` int(11) NOT NULL,
  `nisn_siswa` int(11) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` int(11) NOT NULL,
  `penghasilan_ibu` int(11) NOT NULL,
  `no_hp_ayah` varchar(15) DEFAULT NULL,
  `no_hp_ibu` varchar(15) DEFAULT NULL,
  `alamat_ayah` text NOT NULL,
  `alamat_ibu` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`no_kk`, `nisn_siswa`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `no_hp_ayah`, `no_hp_ibu`, `alamat_ayah`, `alamat_ibu`, `user_id`) VALUES
(44444, 1111122221, 'Bapak', 'Ibuk', 'Kontraktor', 'Boss', 123, 123, '081807711148', '081807711148', 'D', 'D', 12),
(11111342, 1233211421, 'Boni', 'Buni', 'Serabutan', 'IRT', 150000, 0, '081807711148', '081807711148', 'Jalan in aja dulu', 'Jalan in aja dulu', 9),
(123123123, 1234567891, 'Ayah', 'Ibu', 'Kontraktor', 'IRT', 15, 0, '081807711148', '081807711148', 'A', 'A', 2),
(123123321, 1231231231, 'John Pork', 'Marry', 'Kuli', 'IRT', 150000, 15000000, '081807711148', '081807711148', 'C', 'C', 5),
(123321123, 1111111111, 'Ayah', 'Ibu', 'Kontraktor', 'IRT', 15, 0, '081807711148', '081807711148', 'B', 'B', 4),
(222222222, 1234567877, 'Bapak', 'Ibuk', 'Kontraktor', 'Boss', 123, 123, '081807711148', '081807711148', 'Kampung Durian Runtuh', 'Kampung Durian Runtuh', 11),
(237261123, 1112223334, 'XYZ', 'PQR', 'Serabutan', 'IRT', 150000, 0, '081807711148', '081807711148', 'Jalan Pegangsaan', 'Jalan Pegangsaan', 10);

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
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nisn_siswa` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `status_pendaftaran` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nisn_siswa`, `id_sekolah`, `tanggal_pendaftaran`, `status_pendaftaran`, `username`, `password`) VALUES
(13, 1234567891, 1, '2024-10-06', 'valid', 'billydawson2014@gmail.com', '$2y$12$vtQOBFtDpUWaKRsCY6DvuO5uBrKKm6fuVWucLmHUFVy7FVMSX4GBS'),
(14, 1111111111, 1, '2024-10-06', 'valid', 'dummy1@gmail.com', '$2y$12$DuHUtUt36RpP.q1uKrDTguM8XwMdy6QAMIBazdHHxZ0rzmjJihGv6'),
(15, 1231231231, 1, '2024-10-06', 'valid', 'dummy2@gmail.com', '$2y$12$LR56C5js6T7AF1.evr89u.9lPr7k8dWgonR79mseT7Jt2wYkSBLtS'),
(16, 1233121321, 1, '2024-10-06', 'valid', 'dummy3@gmail.com', '$2y$12$whlf4wXpkuYGjcb90sUGlubSxoAgMxPFHbz48SINo5bLBl7Q5TYjm'),
(17, 1211111119, 1, '2024-10-06', 'valid', 'dummy4@gmail.com', '$2y$12$XD5TnJKcCPzGYDgRyGXAa.lw55rcVLw3L6HH75cEFxXHZ1xi7i6u6'),
(18, 1111221111, 1, '2024-10-06', 'valid', 'dummy5@gmail.com', '$2y$12$E4YNfEgFLk1kCzyx1rPBJOmwTmI1mphYIbmEfckLw3KCyOcOWel1a'),
(19, 1233211421, 1, '2024-10-06', 'valid', 'dummy6@gmail.com', '$2y$12$4kevDrYmc4WF3WulI.x.T.wuEsPrnlcbICFFyxC1mw4ktGcBz/n36'),
(20, 1112223334, 1, '2024-10-06', 'valid', 'dummy7@gmail.com', '$2y$12$JUKbAwHOdvj.7dC7WDNF9e8ln3C.r8FdprTeR/qajrcmDTff7H.kG'),
(21, 1234567877, 1, '2024-10-06', 'valid', 'dummy8@gmail.com', '$2y$12$cjKlB8vHQbxC/e6CvQeow.WL.mTD0LhEv7o2P8R9e/kI.rtRvpzBm'),
(22, 1111122221, 3, '2024-10-07', 'valid', 'dummy9@gmail.com', '$2y$12$zwFIrPS36eFpIRdQY7QfS.cmTrgtYVxgP7WR7Yp0hafvu25u1AzVy');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_pendaftaran`, `id_sekolah`) VALUES
(86, 18, 1),
(87, 17, 1),
(88, 14, 1),
(89, 15, 1),
(90, 16, 1),
(91, 13, 2),
(92, 21, 2),
(93, 20, 2),
(94, 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `kuota_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `kuota_siswa`) VALUES
(1, 'SMAN 1 Surabaya', 'Jalan-jalan ke pasar minggu', 10),
(2, 'SMAN 2 Surabaya', 'Jalanin aja dulu', 10),
(3, 'SMAN 3 Surabaya', 'Jalan panjang menuju kesuksesan', 10);

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
('Qy15tNFLLPyr9g6mY2gdsx1vc1ZHJ53KG5imD3ac', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNE1DRGdkU2d4WEVqU1ZaNFRCSG1sRzBKNEcwMW5jTmdTZTg3cGIyTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wZW5ndW11bWFuIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1728272224);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `nilai_rapor` float NOT NULL,
  `nik` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp_siswa` varchar(15) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pilihan_sekolah_1` varchar(100) DEFAULT NULL,
  `pilihan_sekolah_2` varchar(100) DEFAULT NULL,
  `pilihan_sekolah_3` varchar(100) DEFAULT NULL,
  `jarak_sekolah_1` float DEFAULT NULL,
  `jarak_sekolah_2` float DEFAULT NULL,
  `jarak_sekolah_3` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn_siswa`, `nama_siswa`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nilai_rapor`, `nik`, `email`, `no_hp_siswa`, `user_id`, `pilihan_sekolah_1`, `pilihan_sekolah_2`, `pilihan_sekolah_3`, `jarak_sekolah_1`, `jarak_sekolah_2`, `jarak_sekolah_3`) VALUES
(1111111111, 'Alomani', '2004-12-12', 'Laki-laki', 'C', 67, '1111111111', 'dummy1@gmail.com', '081807711148', 4, '1', '2', '3', 10, 15, 20),
(1111122221, 'Tes Semoga', '2011-11-11', 'Laki-laki', 'ABCDEFG', 78, '3211233211', 'dummy9@gmail.com', '081807711148', 12, '3', NULL, NULL, 19, NULL, NULL),
(1111221111, 'Zilong Dragon Warrior', '2007-01-13', 'Laki-laki', 'Gedangan City', 78, '45361928', 'dummy5@gmail.com', '081807711148', 8, '1', '2', '3', 7, 30, 25),
(1112223334, 'Abc', '2004-10-12', 'Perempuan', 'Jalan Pegangsaan', 80, '1231231256', 'dummy7@gmail.com', '081807711148', 10, '1', '2', NULL, 1000, 1000, NULL),
(1211111119, 'Mei mei', '2005-10-13', 'Perempuan', 'Taman Pinang', 88, '829189103', 'dummy4@gmail.com', '081807711148', 7, '1', '2', '3', 8, 12, 300),
(1231231231, 'Mamat', '2004-12-12', 'Laki-laki', 'F', 45, '1919191919', 'dummy2@gmail.com', '081807711148', 5, '1', '2', '3', 301, 20, 15),
(1233121321, 'Ibnu', '2003-02-12', 'Laki-laki', 'B', 99, '001001001', 'dummy3@gmail.com', '081807711148', 6, '1', '2', '3', 340, 304, 275),
(1233211421, 'Bobi Bon', '2012-12-11', 'Laki-laki', 'Jalanin aja dulu', 99, '6746391', 'dummy6@gmail.com', '081807711148', 9, '1', NULL, NULL, 22, NULL, NULL),
(1234567877, 'Jonathan', '2004-10-19', 'Laki-laki', 'Kampung Durian Runtuh', 69, '123456', 'dummy8@gmail.com', '081807711148', 11, '1', '2', NULL, 90, 19, NULL),
(1234567891, 'John Doe', '2004-10-12', 'Laki-laki', 'DEF', 98, '12345678910', 'billydawson2014@gmail.com', '081807711148', 2, '1', '2', '3', 14, 15, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Billy Dawson', 'billy.dawson-2022@ftmm.unair.ac.id', NULL, '$2y$12$fAaH6ye0ShdacMmV9aM.fek5g.5bhRrErh7atkMpGQYRjK.tBwNPW', NULL, '2024-09-09 20:31:12', '2024-09-09 20:31:12', 'user'),
(2, 'Billy Dawson', 'billydawson2014@gmail.com', NULL, '$2y$12$wWV0127Ft18xSg.9Ss9leeOKJ7qCEN7H5SZ5pLj9ByyME8MB7SPO2', NULL, '2024-09-22 00:20:05', '2024-09-22 00:20:05', 'user'),
(3, 'billydawson', 'admin@gmail.com', NULL, '$2y$12$LcOHgOckFdC/OK0HwYZDyOYzewMxiCoL9j7EVLbmPstFQqYGCWAa6', NULL, '2024-10-05 10:41:50', '2024-10-05 10:41:50', 'admin'),
(4, 'Alomani', 'dummy1@gmail.com', NULL, '$2y$12$aj2EMcaA0pEfoqwOPksXveBVbm.7KSehiX0fz9xlTmTjHHmEdudRO', NULL, '2024-10-06 03:43:11', '2024-10-06 03:43:11', 'user'),
(5, 'Mamat', 'dummy2@gmail.com', NULL, '$2y$12$Eg.IbaAEarAq/2w/1Nq4NuQYRWw7TRp9eNJ9fzIg/fHSLpLL3.M8S', NULL, '2024-10-06 03:45:27', '2024-10-06 03:45:27', 'user'),
(6, 'Ibnu', 'dummy3@gmail.com', NULL, '$2y$12$i60PVAim72li.XLer3kNV.pTG5fy0wDd51309VRWe0561Cex4GuPO', NULL, '2024-10-06 03:47:10', '2024-10-06 03:47:10', 'user'),
(7, 'Mei mei', 'dummy4@gmail.com', NULL, '$2y$12$XlAI7Z0K8UMnsCbYhTePa.2DSobIpGsD.hmZ8..1XwAhkpA7BwPfe', NULL, '2024-10-06 03:50:57', '2024-10-06 03:50:57', 'user'),
(8, 'Zilong', 'dummy5@gmail.com', NULL, '$2y$12$UN7fkyT5gzNnuLgPhyD7PeYSp8zhyG2xDbg5ohZbK.ugaSgUccpXa', NULL, '2024-10-06 03:54:48', '2024-10-06 03:54:48', 'user'),
(9, 'Bobi', 'dummy6@gmail.com', NULL, '$2y$12$1wE81C43cI9nRMODX2tUJ.ke2Vkl5CRqi5H0MhxOmmrREKTGPMVEe', NULL, '2024-10-06 05:34:47', '2024-10-06 05:34:47', 'user'),
(10, 'Abc', 'dummy7@gmail.com', NULL, '$2y$12$1Ga93wH7yQrdAQ8M6Ai2bOKPVy9thBTEaDMtsjDeyOIPZ0qOlfKtS', NULL, '2024-10-06 07:53:23', '2024-10-06 07:53:23', 'user'),
(11, 'Jonathan', 'dummy8@gmail.com', NULL, '$2y$12$s.UCENZLFdgTd4SCjQIrE.nzeCZ0ueKm7m2UvpMt//eCW7/8DfqFa', NULL, '2024-10-06 08:47:56', '2024-10-06 08:47:56', 'user'),
(12, 'billydawson', 'dummy9@gmail.com', NULL, '$2y$12$UpXDJ5QuFIn8.qDnTFSsrezm.G32sqGJ7L6VXZGZOeTH/yIwesVYW', NULL, '2024-10-06 20:05:44', '2024-10-06 20:05:44', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`no_kk`),
  ADD UNIQUE KEY `no_kk` (`no_kk`),
  ADD UNIQUE KEY `nisn_siswa` (`nisn_siswa`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD UNIQUE KEY `nisn_siswa` (`nisn_siswa`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`),
  ADD KEY `fk_id_sekolah` (`id_sekolah`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn_siswa`),
  ADD UNIQUE KEY `nisn_siswa` (`nisn_siswa`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD CONSTRAINT `orang_tua_ibfk_1` FOREIGN KEY (`nisn_siswa`) REFERENCES `siswa` (`nisn_siswa`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`nisn_siswa`) REFERENCES `siswa` (`nisn_siswa`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `fk_id_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`),
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
