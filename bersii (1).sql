-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2022 pada 04.56
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
('780570', 'bersiirefill@gmail.com', '$2y$10$vVmrVmzuFf8YX1QaLo7ZB.N7jspwtOTOtManiqQlznxGPtD32/Fb.', 'Admin Bersii', 'Administrator', '2022-12-27 01:20:00', '2022-12-27 01:20:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_refill`
--

CREATE TABLE `isi_refill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` varchar(191) NOT NULL,
  `nomor_seri` varchar(191) NOT NULL,
  `stok` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `isi_refill`
--

INSERT INTO `isi_refill` (`id`, `id_produk`, `nomor_seri`, `stok`, `created_at`, `updated_at`) VALUES
(2, 'PRD-1974327192', '00000000c0ed5881', 13, '2022-12-27 22:32:09', '2022-12-27 22:32:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_refill_riwayat`
--

CREATE TABLE `jenis_refill_riwayat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_trx` varchar(191) NOT NULL,
  `id_produk` varchar(191) NOT NULL,
  `jumlah` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
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
(1, 'App\\Models\\Admin', '780570', '00000000c0ed5881', '9a9e1a74d6d4f6c66e835c799d708162e41faf6a532f72ba4cb8348dd422bef9', '[\"*\"]', '2022-12-28 03:52:02', NULL, '2022-12-28 03:05:41', '2022-12-28 03:52:02'),
(2, 'App\\Models\\Admin', '780570', '00000000c0ed5881', 'f6f47f023b3920c6e9d2ed679af428a1432d5701288901030aff98afe488bf83', '[\"*\"]', '2022-12-28 03:44:09', NULL, '2022-12-28 03:44:09', '2022-12-28 03:44:09'),
(3, 'App\\Models\\Admin', '780570', '00000000c0ed5881', 'b1f4682f80d0157957cf289a0cc4284baa8e5b07a4fc8ad5abce4675ea1fd991', '[\"*\"]', '2022-12-28 03:51:57', NULL, '2022-12-28 03:51:57', '2022-12-28 03:51:57'),
(4, 'App\\Models\\Admin', '780570', '00000000c0ed5881', '3bc9b8845939179dede7485d8db56d8c957412e1207baf7e020535b2e68ef5b6', '[\"*\"]', NULL, NULL, '2022-12-28 03:52:10', '2022-12-28 03:52:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_supplier`
--

CREATE TABLE `produk_supplier` (
  `id_produk` varchar(191) NOT NULL,
  `kode_supplier` varchar(191) DEFAULT NULL,
  `nama_produk` varchar(191) DEFAULT NULL,
  `stok` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_supplier`
--

INSERT INTO `produk_supplier` (`id_produk`, `kode_supplier`, `nama_produk`, `stok`, `created_at`, `updated_at`) VALUES
('PRD-1974327192', 'BSPL-349', 'So Wangi', 55, '2022-12-27 01:35:39', '2022-12-27 22:32:09');

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
('00000000c0ed5881', '-7.9666204', '112.6326321', '0', 'Singosari', '2022-12-27 01:21:17', '2022-12-28 03:06:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_refills`
--

CREATE TABLE `riwayat_refills` (
  `id_trx` varchar(191) NOT NULL,
  `nomor_seri` varchar(191) NOT NULL,
  `id_user` varchar(191) NOT NULL,
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
('BSPL-349', 'Ahmad Muzakki', 'Maju Jaya Sentosa Abadi Lancar', '08123456', 'Sawojajar', '2022-12-27 01:20:00', '2022-12-27 04:49:58'),
('BSPL-709', 'Fauzan Mustofa', 'Sumber Selamat', '08123456', 'Singosari', '2022-12-27 01:20:00', '2022-12-27 01:20:00');

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
('449217', 'Achmad Agil Susanto', 'ahmadagilsusanto@gmail.com', '6282237174435', 'Sawojajar', '$2y$10$6mlty3efWKQ2xwxwHeE7g.5jTZ2ay5rgN6PxblxUZ7N4kd52zbh46', NULL, 'JVoPUImi16FXeT4A', '2022-12-27 01:20:00', '2022-12-27 01:20:00'),
('548983', 'Hanustavira Guru Acarya', 'hanustavira.acarya@binus.ac.id', '6285745402100', 'Singosari', '$2y$10$n6tFXxA55MdrW7sGMB5EGe3PIIAXo5FCxcOcpolMALGtsryw/GVq2', NULL, 'K0eCgKKoIoGFL8tp', '2022-12-27 01:20:00', '2022-12-27 01:20:00'),
('587341', 'Fauzan Mustofa', 'fauzanmusthofa.fm@gmail.com', '6281111116098', 'Sawojajar', '$2y$10$C3Yj6nH44GRAPrjr724zjumw1QgduFMNrUzIVRXT3Vy1LHAiKSUtC', NULL, '71vYubkl91AEgbi5', '2022-12-27 01:20:00', '2022-12-27 01:20:00'),
('666227', 'Viana Salsabila Tauda', 'vianatauda@gmail.com', '6281344847038', 'Sawojajar', '$2y$10$MeYc1QwUl0K.2e0UhXvefOm9shsKhmVK.tY2BaB3h2k1hG.ejYM1.', NULL, 'OlP3cgGJDDAjngqa', '2022-12-27 01:20:00', '2022-12-27 01:20:00'),
('903243', 'Thomas Harman Bintang', 'thomasharman99@gmail.com', '6285171191215', 'Blimbing', '$2y$10$fNeSlBb.UUmGSmnsDq8G1.L7uKwPFFACh7FwGBOjl/sB81yuSpqqC', NULL, 'Wb8l8dle9lJB1Ndh', '2022-12-27 01:20:00', '2022-12-27 01:20:00');

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
('548983', '50000.00', '2022-12-27 01:20:00', '2022-12-27 01:20:00'),
('587341', '150000.00', '2022-12-27 01:20:00', '2022-12-27 01:20:00'),
('666227', '75000.00', '2022-12-27 01:20:00', '2022-12-27 01:20:00'),
('903243', '90000.00', '2022-12-27 01:20:00', '2022-12-27 01:20:00'),
('449217', '65000.00', '2022-12-27 01:20:00', '2022-12-27 01:20:00');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
