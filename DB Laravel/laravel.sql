-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2024 pada 11.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_07_06_175148_barang', 1),
(4, '2024_07_06_175249_jenis_barang', 1),
(5, '2024_07_06_175440_transaksi', 1),
(6, '2024_07_06_175912_detail_transaksi', 1),
(7, '2024_07_06_184552_diskon', 1),
(8, '2014_10_12_100000_create_password_resets_table', 2),
(9, '2024_07_27_163339_create_laporan_data_table', 3),
(10, '2024_07_27_175337_create_laporan_data_table', 4);

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
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `id_jenis`, `kode`, `nama_barang`, `harga`, `stok`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 8, 'JB-1722235215-0CkWX', 'AC Politron', 2000000, 4, NULL, '2024-07-28 23:40:15', '2024-07-28 23:40:15'),
(6, 10, 'JB-1722237259-i10fU', 'ASUS ROG', 10000000, 21, NULL, '2024-07-29 00:14:19', '2024-07-29 00:14:19'),
(7, 10, 'JB-1722245073-y2ACk', 'Asus TUF Gaming', 16000000, 14, NULL, '2024-07-29 02:24:33', '2024-07-29 02:24:33'),
(8, 8, 'JB-1722246465-GY0pH', 'AC Toshiba', 1500000, 10, NULL, '2024-07-29 02:47:45', '2024-07-29 02:47:45'),
(9, 8, 'JB-1722248413-qGfoK', 'Mistubisi', 1000000, 14, NULL, '2024-07-29 03:20:13', '2024-07-29 03:20:13'),
(10, 10, 'JB-1722248491-IAFcQ', 'Lenovo', 1750000, 11, NULL, '2024-07-29 03:21:32', '2024-07-29 03:21:32'),
(14, 16, 'JB-1722256925-FIr5X', 'Jam Dinding', 100000, 14, NULL, '2024-07-29 05:42:05', '2024-07-29 05:42:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_transaksi`
--

CREATE TABLE `tbl_detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_transaksi` varchar(255) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_diskon`
--

CREATE TABLE `tbl_diskon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_belanja` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_barang`
--

CREATE TABLE `tbl_jenis_barang` (
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_jenis_barang`
--

INSERT INTO `tbl_jenis_barang` (`id_jenis`, `kategori`, `created_at`, `updated_at`) VALUES
(8, 'ACC', '2024-07-29 06:17:39', '2024-07-29 05:41:39'),
(10, 'Laptop', '2024-07-29 00:13:40', '2024-07-29 00:13:40'),
(16, 'Elektronik', '2024-07-29 05:41:31', '2024-07-29 05:41:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan_data`
--

CREATE TABLE `tbl_laporan_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pajak_id` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_laporan_data`
--

INSERT INTO `tbl_laporan_data` (`id`, `pajak_id`, `barang`, `kode`, `jumlah`, `modal`, `total`, `created_at`, `updated_at`) VALUES
(19, 0, 'AC LG', 'JB-1722234431-ozTt2', 5, 1000000, 5000000, '2024-07-29 01:49:21', '2024-07-29 05:47:51'),
(22, 0, 'AC Toshiba', 'JB-1722246465-GY0pH', 3, 1500000, 4500000, '2024-07-29 02:48:02', '2024-07-29 02:48:02'),
(23, 0, 'Asus TUF Gaming', 'JB-1722245073-y2ACk', 1, 16000000, 16000000, '2024-07-29 02:50:29', '2024-07-29 02:50:29'),
(26, 0, 'Jam Dinding', 'JB-1722256925-FIr5X', 10, 100000, 1000000, '2024-07-29 08:24:06', '2024-07-29 08:24:06'),
(27, 0, 'AC Politron', 'JB-1722235215-0CkWX', 20, 2000000, 40000000, '2024-07-29 08:32:22', '2024-07-29 08:32:22'),
(28, 0, 'Mistubisi', 'JB-1722248413-qGfoK', 10, 1000000, 10000000, '2024-07-29 08:34:31', '2024-07-29 08:34:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pajak`
--

CREATE TABLE `tbl_pajak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `no_invoice` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_pajak`
--

INSERT INTO `tbl_pajak` (`id`, `nama`, `npwp`, `total`, `no_invoice`, `created_at`, `updated_at`) VALUES
(4, 'Cahyono', '211323', 5000000, 'NI-0001', '2024-07-29 07:56:54', '2024-07-29 08:21:27'),
(5, 'Ujang', '3231', 5000000, 'NI-0002', '2024-07-29 07:58:21', '2024-07-29 07:58:21'),
(6, 'Cahyono', '312124', 4500000, 'NI-0003', '2024-07-29 08:22:18', '2024-07-29 09:27:26'),
(7, 'Mamat', '21132', 16000000, 'NI-0004', '2024-07-29 08:22:52', '2024-07-29 08:22:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('super_admin','admin','direktur','') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin@gmail.com', '$2y$12$t4YiTfrWPfwT06imwGU9NeUf9U/DhEbw/xGj.kNRflD/D2qh2fxVy', NULL, 'super_admin', '2024-07-26 05:59:47', '2024-07-26 05:59:47'),
(9, 'admin2', 'admin2@gmail.com', '$2y$12$fsku9ouu7v7fDmNWjdnJh.du8.dEltxtQlExkO2WOfZzRUijnvyYy', NULL, 'admin', '2024-08-04 01:37:07', '2024-08-04 01:37:07'),
(10, 'direktur', 'direktur@gmail.com', '$2y$12$18l7J1NYK3VEIVeJvWYU7u3rwRu0foznZnPVt5nh5e89AuP3AwsLy', NULL, 'direktur', '2024-08-04 01:48:29', '2024-08-04 01:48:29'),
(11, 'aji', 'aji@gmail.com', '$2y$12$v0.o.5EelK8PtlXY02znaO0G0Qv7VYqDbhag11aaVqQrzYUHjAbvu', NULL, 'super_admin', '2024-08-04 02:19:02', '2024-08-04 02:22:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jenis_barang`
--
ALTER TABLE `tbl_jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tbl_laporan_data`
--
ALTER TABLE `tbl_laporan_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pajak`
--
ALTER TABLE `tbl_pajak`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_barang`
--
ALTER TABLE `tbl_jenis_barang`
  MODIFY `id_jenis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan_data`
--
ALTER TABLE `tbl_laporan_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_pajak`
--
ALTER TABLE `tbl_pajak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
