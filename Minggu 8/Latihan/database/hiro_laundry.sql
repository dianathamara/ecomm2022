-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Jun 2020 pada 06.14
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiro_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_paket`
--

CREATE TABLE `jenis_paket` (
  `kd_paket` char(5) NOT NULL,
  `id_kategori` char(5) NOT NULL,
  `nm_paket` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_paket`
--

INSERT INTO `jenis_paket` (`kd_paket`, `id_kategori`, `nm_paket`, `harga`) VALUES
('KP001', 'K001', 'Cucian Komplit Kilat 1 hari selesai', 12000),
('KP002', 'K001', 'Cucian kering reguler 2 hari', 7000),
('KP003', 'K001', 'Cucian Komplit Kilat 2 hari selesai', 10000),
('KP004', 'K004', 'Cuci Helms', 15000),
('KP005', 'K002', 'Cuci Komplit Bayi', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(4) NOT NULL,
  `nm_kategori` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`) VALUES
('K001', 'Laundry Kiloan'),
('K002', 'Laundry Pelengkapan Bayi'),
('K003', 'Laundry Sepatu'),
('K004', 'Laundry Helm'),
('K005', 'Laundry Satuan'),
('K006', 'Laundry / Cuci Karpet ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(5) NOT NULL,
  `nm_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `alamat`, `no_telp`) VALUES
('P0001', 'Beni ', 'Perum.Pura Blok R3 No 07, Rt05 Rw07', '08912345781'),
('P0002', 'Brain', 'Perum. Inkopad blok Q7 No 8', '08981823123'),
('P0003', 'Abil ', ' Apartement Kalibata city Tower 2c 05 16 ', '08981823123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` char(11) NOT NULL,
  `idUser` char(15) NOT NULL,
  `idPelanggan` char(5) NOT NULL,
  `kd_paket` char(5) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL,
  `berat` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `idUser`, `idPelanggan`, `kd_paket`, `tgl_masuk`, `tgl_kembali`, `status`, `berat`, `tarif`, `total`, `keterangan`) VALUES
('T200617001', 'NU20060700001', 'P0001', 'KP005', '2020-06-17', '2020-05-19', 'Lunas', 1, 50000, 50000, '2 kaos'),
('T200617002', 'NU20060700001', 'P0002', 'KP004', '2020-06-17', '2020-06-19', 'Belum Lunas', 1, 15000, 15000, '10 kaos'),
('T200618001', 'NU20060700002', 'P0003', 'KP005', '2020-06-18', '2020-06-20', 'Belum Lunas', 1, 50000, 50000, '2 kaos dalam, 3 celana pendek, 1 jaket baby, 1 topi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(15) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role_id`, `active`, `nama`) VALUES
('NU20060700001', 'admin', '$2y$10$WE6ZhfzwDDFnls/1pIeNa.z5dDqOT1tKCOtd4WlUhWWgDMuePZcKu', 1, 1, 'Administrator'),
('NU20060700002', 'triatmojo', '$2y$10$VkCFtBkjZVEmsNeYVeEFmesBiDcncCSTTOBCLcOQ5UEOyBISmAHOO', 2, 1, 'Tri atmojo'),
('NU20061800001', 'steven', '$2y$10$W.QbhTAP7w9cmvKy.MaupuWypmb8iwevN.3xlQouhd7ThJpDsZB1W', 2, 0, 'Steven ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_paket`
--
ALTER TABLE `jenis_paket`
  ADD PRIMARY KEY (`kd_paket`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `id_pelanggan` (`idUser`,`idPelanggan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
