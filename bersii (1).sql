-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2022 pada 00.31
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
  `nama_admin` varchar(191) DEFAULT NULL,
  `jabatan` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'App\\Models\\User', 196961, 'Abc', 'ae42a1e4eb4d67a66589b0245efdad337780c01d63ec3f00fd5c04e6188e96da', '[\"*\"]', '2022-12-18 10:58:07', NULL, '2022-12-18 10:57:44', '2022-12-18 10:58:07');

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
('BSPL-290', 'Fauzan Mustofa', 'Sumber Selamat', '08123456', 'Singosari', '2022-12-18 10:54:12', '2022-12-18 10:54:12'),
('BSPL-921', 'Ahmad Muzakki', 'Maju Jaya Sentosa Abadi Lancar', '08123456', 'Sawojajar', '2022-12-18 10:54:12', '2022-12-18 10:54:12');

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
('153189', 'Achmad Agil Susanto', 'ahmadagilsusanto@gmail.com', '6282237174435', 'Sawojajar', '$2y$10$8aobjBVflOvR0bvlqREyCefcPS10aCcJm51zB2pSjGrNWKG79F0yK', NULL, 'hfpT6DwifuJMMxyC', '2022-12-18 10:54:12', '2022-12-18 10:54:12'),
('196961', 'Hanustavira Guru Acarya', 'hanustavira.acarya@binus.ac.id', '6285745402100', 'Singosari', '$2y$10$gogdUMxrLkxL6dWw1/KNpeoPI8wuZke0Cfhq0lrTBcYbr8J7hYZ3G', NULL, 'SoG9kHupVlsIeYIM', '2022-12-18 10:54:11', '2022-12-18 10:54:11'),
('330798', 'Thomas Harman Bintang', 'thomasharman99@gmail.com', '6285171191215', 'Blimbing', '$2y$10$CVmPHRbL8yL6LoxplgZo0OGrrSR5xTtYCU2HaEt3IMm8oWU8UsGt2', NULL, 'lzHMTIxCclX9fVjK', '2022-12-18 10:54:12', '2022-12-18 10:54:12'),
('725454', 'Fauzan Mustofa', 'fauzanmusthofa.fm@gmail.com', '6281111116098', 'Sawojajar', '$2y$10$fmsjPjDDFQ3JV/l1qdeZfO7GPaP2QIHwticF5kv4GnJvLAi974tf2', NULL, 'PkCY7A6oNW0ksHnG', '2022-12-18 10:54:11', '2022-12-18 10:54:11'),
('877665', 'Viana Salsabila Tauda', 'vianatauda@gmail.com', '6281344847038', 'Sawojajar', '$2y$10$stOTrtLkKZ1L7GYk7pO9b.fXDSEwIsSID8uxw8gQns.7dxjpwLfA6', NULL, 'giGeSvCdUqiiBnKa', '2022-12-18 10:54:11', '2022-12-18 10:54:11');

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
('196961', '50000.00', '2022-12-18 10:54:11', '2022-12-18 10:54:11'),
('725454', '150000.00', '2022-12-18 10:54:11', '2022-12-18 10:54:11'),
('877665', '75000.00', '2022-12-18 10:54:12', '2022-12-18 10:54:12'),
('330798', '90000.00', '2022-12-18 10:54:12', '2022-12-18 10:54:12'),
('153189', '65000.00', '2022-12-18 10:54:12', '2022-12-18 10:54:12');

--
-- Indexes for dumped tables
--

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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `isi_refill`
--
ALTER TABLE `isi_refill`
  ADD CONSTRAINT `isi_refill_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk_supplier` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `isi_refill_ibfk_2` FOREIGN KEY (`nomor_seri`) REFERENCES `refill_stations` (`nomor_seri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_refill_riwayat`
--
ALTER TABLE `jenis_refill_riwayat`
  ADD CONSTRAINT `jenis_refill_riwayat_ibfk_1` FOREIGN KEY (`id_trx`) REFERENCES `riwayat_refills` (`id_trx`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jenis_refill_riwayat_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk_supplier` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_supplier`
--
ALTER TABLE `produk_supplier`
  ADD CONSTRAINT `produk_supplier_ibfk_1` FOREIGN KEY (`kode_supplier`) REFERENCES `suppliers` (`kode_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_refills`
--
ALTER TABLE `riwayat_refills`
  ADD CONSTRAINT `riwayat_refills_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_bersiis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_refills_ibfk_2` FOREIGN KEY (`nomor_seri`) REFERENCES `refill_stations` (`nomor_seri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  ADD CONSTRAINT `riwayat_topup_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_bersiis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users_bersiis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
