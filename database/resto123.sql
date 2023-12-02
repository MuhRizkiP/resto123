-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2023 pada 09.58
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto123`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_menu` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_menu`, `jumlah_menu`, `total_harga`) VALUES
(1, 7, 7, 100, 111100),
(2, 9, 3, 3, 45000),
(5, 13, 3, 2, 30000),
(7, 13, 3, 2, 30000),
(8, 13, 3, 1, 15000),
(9, 14, 3, 2, 30000),
(10, 15, 3, 1, 15000),
(12, 16, 3, 1, 15000),
(13, 17, 3, 1, 15000),
(14, 18, 3, 3, 45),
(15, 19, 3, 1, 15000),
(16, 3, 3, 2, 30000),
(18, 20, 3, 3, 45),
(21, 4, 3, 1, 15000),
(22, 21, 3, 1, 15000),
(23, 22, 3, 1, 15000),
(24, 23, 3, 1, 15000),
(25, 24, 3, 1, 15000),
(26, 25, 3, 7, 105000),
(27, 5, 3, 1, 15000),
(28, 6, 3, 1, 15000),
(30, 26, 3, 1, 15000),
(31, 27, 3, 1, 15000),
(32, 28, 3, 1, 15000),
(33, 29, 3, 3, 45000),
(34, 30, 3, 1, 15000),
(35, 10, 3, 1, 15000),
(36, 31, 3, 1, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kategori_menu` int(11) NOT NULL,
  `nama_kategori_menu` varchar(30) NOT NULL,
  `foto_kategori_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kategori_menu`, `nama_kategori_menu`, `foto_kategori_menu`) VALUES
(1, 'Makanan', 'ayam.webp'),
(3, 'Minuman', 'minum.webp'),
(10, 'Menu Paket', 'menupaket.webp'),
(11, 'Menu Promo', 'promo.webp'),
(12, 'Camilan', '3t5navlXGbepANigzlmu.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori_menu` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `deskripsi_menu` varchar(255) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `status_menu` enum('tersedia','habis') NOT NULL,
  `foto_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori_menu`, `nama_menu`, `deskripsi_menu`, `harga_menu`, `status_menu`, `foto_menu`) VALUES
(3, 1, 'Ayam Goreng', 'DESKRIPSI 1', 15000, 'tersedia', 'ayam.webp'),
(7, 10, 'Paket Hemat', 'PAKET MURAH MERIAH UNTUK KAUM MENDANG MENDING', 25000, 'tersedia', ''),
(9, 3, 'McCafe', 'SEGER', 20000, 'habis', 'hqKEmLptRscAWumMVg9f.webp'),
(12, 11, 'Paket Lebaran', 'Selamat Idul Fitri Mohon Maaf Lahir Batin', 30000, 'habis', 'promo.webp'),
(13, 3, 'Es Teh', 'seger', 5000, 'tersedia', 'minum.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id_role_user` int(11) NOT NULL,
  `nama_role_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id_role_user`, `nama_role_user`) VALUES
(1, 'admin'),
(2, 'kasir'),
(3, 'Testers');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `nomor_transaksi` varchar(30) NOT NULL,
  `grand_total_harga` int(11) NOT NULL DEFAULT 0,
  `nama_pembeli` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_transaksi` enum('selesai','onproses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `waktu_transaksi`, `nomor_transaksi`, `grand_total_harga`, `nama_pembeli`, `id_user`, `status_transaksi`) VALUES
(1, '2023-10-27 02:50:02', 'INV/2024/0001', 0, 'Udin', 1, 'selesai'),
(2, '2023-10-27 09:10:13', 'INV/2023/0002', 0, 'p', 1, 'selesai'),
(3, '2023-10-27 09:10:34', 'INV/2023/0003', 40000, 'p', 1, 'selesai'),
(4, '2023-10-27 10:14:05', 'INV/2023/0004', 15000, 'q', 1, 'selesai'),
(5, '2023-10-27 10:15:28', 'INV/2023/0005', 15000, 'q', 1, 'selesai'),
(6, '2023-10-27 11:13:06', 'INV/2023/0006', 15000, 'p', 1, 'selesai'),
(7, '2023-10-27 13:53:53', 'INV/2023/0007', 116100, '`', 1, 'selesai'),
(8, '2023-10-27 13:58:34', 'INV/2023/0008', 0, 'jopi', 1, 'selesai'),
(9, '2023-10-27 13:58:50', 'INV/2023/0009', 50000, 'jopi', 1, 'selesai'),
(10, '2023-11-03 07:23:50', 'INV/2023/0010', 15000, 'p', 1, 'selesai'),
(11, '2023-11-03 07:45:53', 'INV/2023/0011', 0, 'p', 1, 'onproses'),
(12, '2023-11-03 07:46:02', 'INV/2023/0012', 0, 'p', 1, 'selesai'),
(13, '2023-11-03 07:54:59', 'INV/2023/0013', 80000, 'p', 1, 'selesai'),
(14, '2023-11-03 11:19:03', 'INV/2023/0014', 30000, 'p', 1, 'selesai'),
(15, '2023-11-03 13:08:22', 'INV/2023/0015', 20000, 'q', 1, 'selesai'),
(16, '2023-11-03 14:11:09', 'INV/2023/0016', 15000, 'r', 1, 'selesai'),
(17, '2023-11-03 14:12:18', 'INV/2023/0017', 15000, 'y', 1, 'selesai'),
(18, '2023-11-03 14:13:26', 'INV/2023/0018', 45, 'r', 1, 'selesai'),
(19, '2023-11-03 14:15:51', 'INV/2023/0019', 15000, 'u', 1, 'selesai'),
(20, '2023-11-10 07:32:48', 'INV/2023/0020', 75, 'b', 1, 'selesai'),
(21, '2023-11-10 09:13:53', 'INV/2023/0021', 15000, 'G', 1, 'selesai'),
(22, '2023-11-10 09:16:07', 'INV/2023/0022', 15000, 'L', 1, 'selesai'),
(23, '2023-11-10 09:16:51', 'INV/2023/0023', 15000, 'E', 1, 'selesai'),
(24, '2023-11-10 09:18:26', 'INV/2023/0024', 15000, 'K', 1, 'selesai'),
(25, '2023-11-10 10:40:10', 'INV/2023/0025', 105000, 'kiki', 1, 'selesai'),
(26, '2023-11-17 10:21:39', 'INV/2023/0026', 0, 'kikik', 1, 'onproses'),
(27, '2023-11-17 10:22:00', 'INV/2023/0027', 15000, 'rizki', 1, 'selesai'),
(28, '2023-11-17 10:22:55', 'INV/2023/0028', 15000, 'rizki', 1, 'selesai'),
(29, '2023-11-24 07:21:11', 'INV/2023/0029', 0, 'rizki', 4, 'onproses'),
(30, '2023-11-24 08:32:49', 'INV/2023/0030', 15000, 'jovi', 4, 'selesai'),
(31, '2023-11-24 09:01:47', 'INV/2023/0031', 15000, 'rizki', 4, 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_role_user`, `nama_user`, `username`, `password`, `photo_user`) VALUES
(1, 1, 'administartor aplikasi', 'admin', '$2y$10$iOuDMJROcUsLsR0wz7/Ml.PKNdsEkEROcs3BkKVbdJGe3NG9Fpfie', ''),
(2, 2, 'kasir toko123', 'kasir', '$2y$10$IedNGA19UX4XN0B8veY4Gur5b2iF4NIQaVeICIXmNSlQgTED7YTF6', ''),
(4, 1, 'Rizki P', 'R', '$2y$10$2RIV5cFJM4KS.Q4YBal8Lu4wPtSCYjkgBIWA/VXsEbFtW2Av1MwD6', ''),
(5, 1, 'AlfaR', 'Alfa', '$2y$10$gcu2Ro2L4LTuStjeP8/NAOXUP9Ldy0zzl/3oPlrDSBRu46uwvFn4C', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `transaksi` (`id_transaksi`),
  ADD KEY `barang` (`id_menu`);

--
-- Indeks untuk tabel `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kategori_menu`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `kategori` (`id_kategori_menu`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id_role_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_user` (`id_role_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kategori_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id_role_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `barang` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `kategori_menu` FOREIGN KEY (`id_kategori_menu`) REFERENCES `kategori_menu` (`id_kategori_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_user` FOREIGN KEY (`id_role_user`) REFERENCES `role_user` (`id_role_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
