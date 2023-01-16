-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2023 pada 21.51
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bersii`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id_admin` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `nama` varchar(191) DEFAULT NULL,
  `jabatan` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id_admin`, `email`, `password`, `nama`, `jabatan`, `created_at`, `updated_at`) VALUES
('303507', 'bersiirefill@gmail.com', '$2y$10$IeQvF427TH9izXZK.92VY.mX9WDeMA7dYeyK9wqiKeyhWoLNue3De', 'Admin Bersii', 'Administrator', '2023-01-09 20:12:20', '2023-01-09 20:12:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_refill`
--

CREATE TABLE `isi_refill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` varchar(191) NOT NULL,
  `nomor_seri` varchar(191) NOT NULL,
  `stok` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `isi_refill`
--

INSERT INTO `isi_refill` (`id`, `id_produk`, `nomor_seri`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'PRD-415051578', '00000000c0ed5881', 0.5, '2023-01-12 23:31:51', '2023-01-12 23:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_refill_riwayat`
--

CREATE TABLE `jenis_refill_riwayat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_trx` varchar(191) NOT NULL,
  `id_produk` varchar(191) NOT NULL,
  `jumlah_refill` double DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_25_091401_create_users_bersiis_table', 1),
(3, '2022_10_31_031302_wallet', 1),
(4, '2022_10_31_035100_riwayat_topup', 1),
(5, '2022_12_06_091952_create_admins_table', 1),
(6, '2022_12_06_094412_create_refill_stations_table', 1),
(7, '2022_12_07_085022_create_suppliers_table', 1),
(8, '2022_12_07_085332_create_produk_supplier_table', 1),
(9, '2022_12_07_090530_create_isi_refill_table', 1),
(10, '2022_12_07_095744_create_riwayat_refills_table', 1),
(11, '2022_12_07_100009_create_jenis_refill_riwayat_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Admin', '303507', '00000000c0ed5881', '16e1bf446952aa8b40209086f99fdb8ec3de46b01f441e50f5b8b2088bbf7639', '[\"*\"]', '2023-01-14 21:26:50', NULL, '2023-01-12 23:25:57', '2023-01-14 21:26:50'),
(2, 'App\\Models\\User', '882536', '00000000c0ed5881', '24f4ff3c7c19fd37080f12dea222ecc55ef6de1779f41580d70339860fd6c6bb', '[\"*\"]', '2023-01-14 20:19:39', NULL, '2023-01-14 20:19:38', '2023-01-14 20:19:39'),
(3, 'App\\Models\\User', '882536', '00000000c0ed5881', '846084fa56d6698df79e739125bc22a01b8283b1d748167f4caeb1ee4578eac9', '[\"*\"]', '2023-01-14 20:27:24', NULL, '2023-01-14 20:20:56', '2023-01-14 20:27:24'),
(4, 'App\\Models\\User', '882536', '00000000c0ed5881', '7f859410f0a3070f0bd19a0029d58ca74109a4e6d0f215be871eb764428bb283', '[\"*\"]', '2023-01-14 20:28:05', NULL, '2023-01-14 20:28:04', '2023-01-14 20:28:05'),
(5, 'App\\Models\\User', '882536', '00000000c0ed5881', '70e8e86904be3c938d16fa1f1f6eb4009e3231bf108077ff1c3b1f66567c5fe2', '[\"*\"]', '2023-01-14 21:43:24', NULL, '2023-01-14 20:30:20', '2023-01-14 21:43:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_supplier`
--

CREATE TABLE `produk_supplier` (
  `id_produk` varchar(191) NOT NULL,
  `kode_supplier` varchar(191) DEFAULT NULL,
  `nama_produk` varchar(191) DEFAULT NULL,
  `deskripsi_produk` varchar(191) DEFAULT NULL,
  `stok` double DEFAULT NULL,
  `harga_produk` bigint(20) DEFAULT NULL,
  `gambar_produk` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_supplier`
--

INSERT INTO `produk_supplier` (`id_produk`, `kode_supplier`, `nama_produk`, `deskripsi_produk`, `stok`, `harga_produk`, `gambar_produk`, `created_at`, `updated_at`) VALUES
('PRD-415051578', 'BSPL-784', 'Minyak Goreng Hatiku', 'Jagonya lengo', 0.5, 25000, 'PRD-415051578.jpg', '2023-01-09 21:24:17', '2023-01-12 23:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refill_stations`
--

CREATE TABLE `refill_stations` (
  `nomor_seri` varchar(191) NOT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `status_mesin` enum('0','1','2') DEFAULT NULL COMMENT '0=tidak aktif, 1=aktif, 2=maintenance',
  `alamat` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `refill_stations`
--

INSERT INTO `refill_stations` (`nomor_seri`, `latitude`, `longitude`, `status_mesin`, `alamat`, `created_at`, `updated_at`) VALUES
('00000000c0ed5881', '-7.9666204', '112.6326321', '0', 'Singosari', '2023-01-09 20:12:20', '2023-01-09 20:12:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_refills`
--

CREATE TABLE `riwayat_refills` (
  `id_trx` varchar(191) NOT NULL,
  `nomor_seri` varchar(191) NOT NULL,
  `id_user` varchar(191) NOT NULL,
  `total_harga` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_topup`
--

CREATE TABLE `riwayat_topup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(191) DEFAULT NULL,
  `topup_id` varchar(191) DEFAULT NULL,
  `nominal` decimal(10,2) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `payment_status` enum('1','2','3') DEFAULT NULL COMMENT '1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa',
  `snap_token` varchar(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `kode_supplier` varchar(191) NOT NULL,
  `nama_pemilik` varchar(191) DEFAULT NULL,
  `nama_toko` varchar(191) DEFAULT NULL,
  `nomor_telepon` varchar(191) DEFAULT NULL,
  `alamat` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`kode_supplier`, `nama_pemilik`, `nama_toko`, `nomor_telepon`, `alamat`, `created_at`, `updated_at`) VALUES
('BSPL-784', 'Fauzan Mustofa', 'Sumber Selamat', '08123456', 'Singosari', '2023-01-09 20:12:20', '2023-01-09 20:12:20'),
('BSPL-839', 'Ahmad Muzakki', 'Maju Jaya Sentosa Abadi Lancar', '08123456', 'Sawojajar', '2023-01-09 20:12:20', '2023-01-09 20:12:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_bersiis`
--

CREATE TABLE `users_bersiis` (
  `id` varchar(191) NOT NULL,
  `nama` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `nomor_telepon` varchar(191) DEFAULT NULL,
  `alamat` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `forgot_token` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_bersiis`
--

INSERT INTO `users_bersiis` (`id`, `nama`, `email`, `nomor_telepon`, `alamat`, `password`, `forgot_token`, `remember_token`, `created_at`, `updated_at`) VALUES
('249618', 'Achmad Agil Susanto', 'ahmadagilsusanto@gmail.com', '6282237174435', 'Sawojajar', '$2y$10$PyYqYSZqvEzVq/gEPWSAa.JP9Zn1reM9NjbWNmbVKXS555tOqhFB6', NULL, 'COlpQPKh4ZgZTogV', '2023-01-09 20:12:20', '2023-01-09 20:12:20'),
('399978', 'Fauzan Mustofa', 'fauzanmusthofa.fm@gmail.com', '6281111116098', 'Sawojajar', '$2y$10$YNvZMfs9Mbnyzj.bXtlP6u2DjdN05.oZI787kepC1f2IwkXAlmdBu', NULL, 'TD9zsrg1P1gU4Bt3', '2023-01-09 20:12:20', '2023-01-09 20:12:20'),
('707784', 'Thomas Harman Bintang', 'thomasharman99@gmail.com', '6285171191215', 'Blimbing', '$2y$10$lEC6ctepkB8WBb4pwYa8vu4wAaSf3c0ovz/q9LhLEa0NdjMBwPxLS', NULL, 'yIGzAnNeLVxzv5AC', '2023-01-09 20:12:20', '2023-01-09 20:12:20'),
('882536', 'Hanustavira Guru Acarya', 'hanustavira.acarya@binus.ac.id', '6285745402100', 'Singosari', '$2y$10$IBkSmx0O7ppueX6.QHYvjOOWJc0V0rGHurIUJK6oDZOxuQpYI8/yC', NULL, 'glDHUMb6HPFpHDg4', '2023-01-09 20:12:20', '2023-01-09 20:12:20'),
('981474', 'Viana Salsabila Tauda', 'vianatauda@gmail.com', '6281344847038', 'Sawojajar', '$2y$10$/1BeEBFxQQwFXHuqAWy8meWNKt92eb4UcbYrDO5zBcq0CbT/vaPcW', NULL, 'QUYZScZdLrHTxSDv', '2023-01-09 20:12:20', '2023-01-09 20:12:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wallet`
--

CREATE TABLE `wallet` (
  `id` varchar(191) NOT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wallet`
--

INSERT INTO `wallet` (`id`, `saldo`, `created_at`, `updated_at`) VALUES
('882536', '50000.00', '2023-01-09 20:12:20', '2023-01-09 20:12:20'),
('399978', '150000.00', '2023-01-09 20:12:20', '2023-01-09 20:12:20'),
('981474', '75000.00', '2023-01-09 20:12:20', '2023-01-09 20:12:20'),
('707784', '90000.00', '2023-01-09 20:12:20', '2023-01-09 20:12:20'),
('249618', '65000.00', '2023-01-09 20:12:20', '2023-01-09 20:12:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `isi_refill`
--
ALTER TABLE `isi_refill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `isi_refill_id_produk_index` (`id_produk`),
  ADD KEY `isi_refill_nomor_seri_index` (`nomor_seri`);

--
-- Indeks untuk tabel `jenis_refill_riwayat`
--
ALTER TABLE `jenis_refill_riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_refill_riwayat_id_trx_index` (`id_trx`),
  ADD KEY `jenis_refill_riwayat_id_produk_index` (`id_produk`);

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
  ADD KEY `personal_access_tokens_tokenable_type_index` (`tokenable_type`),
  ADD KEY `personal_access_tokens_tokenable_id_index` (`tokenable_id`);

--
-- Indeks untuk tabel `produk_supplier`
--
ALTER TABLE `produk_supplier`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_supplier_kode_supplier_index` (`kode_supplier`);

--
-- Indeks untuk tabel `refill_stations`
--
ALTER TABLE `refill_stations`
  ADD PRIMARY KEY (`nomor_seri`);

--
-- Indeks untuk tabel `riwayat_refills`
--
ALTER TABLE `riwayat_refills`
  ADD PRIMARY KEY (`id_trx`),
  ADD KEY `riwayat_refills_nomor_seri_index` (`nomor_seri`),
  ADD KEY `riwayat_refills_id_user_index` (`id_user`);

--
-- Indeks untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_topup_id_user_index` (`id_user`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indeks untuk tabel `users_bersiis`
--
ALTER TABLE `users_bersiis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wallet`
--
ALTER TABLE `wallet`
  ADD KEY `wallet_id_index` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `isi_refill`
--
ALTER TABLE `isi_refill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_refill_riwayat`
--
ALTER TABLE `jenis_refill_riwayat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
