-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Mar 2021 pada 10.32
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'XII RPL A', 'rekayasa perangkat lunak'),
(4, 'XII TKJ A', 'teknik komputer dan jaringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kosong`
--

CREATE TABLE `tbl_kosong` (
  `kosong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `nisn_siswa` varchar(15) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `bulan_bayar` varchar(10) DEFAULT NULL,
  `tahun_bayar` varchar(10) NOT NULL,
  `spp_id` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `petugas_id`, `nisn_siswa`, `tanggal_bayar`, `bulan_bayar`, `tahun_bayar`, `spp_id`, `jumlah_bayar`, `ket`) VALUES
(9, 3, '12345', '2021-03-02', '3', '2020/2021', 2, 50000, 'lunas'),
(10, 3, '12345', '2021-03-01', '3', '2021/2022', 10, 50000, 'lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`, `created_at`, `updated_at`) VALUES
(3, 'admin', '$2y$10$sp2/jDdUDEI4ZM0YNTOrsuwHABjVQLjYhbu4MrAvRquANffGbxbbW', 'candra', 'admin', '2021-02-27 18:32:43', '2021-02-27 18:32:43'),
(4, 'petugas', '$2y$10$XLBdnfaBFTk7V.C9ryIArOn2tchaZTl5FSsTSi8dCzqrdQHqE2eoW', 'eren', 'petugas', '2021-03-01 01:51:36', '2021-03-01 01:51:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nisn` char(15) NOT NULL,
  `nis` char(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nisn`, `nis`, `nama`, `kelas_id`, `alamat`, `no_telp`, `password`) VALUES
('12345', '12345', 'Candra', 1, 'qwerty', '085', '$2y$10$.QLKT121YhWG26tGSFlc9OgLgNumGPXLH0ijW.2tFfOcCtS39ZA1a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_spp`
--

CREATE TABLE `tbl_spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_spp`
--

INSERT INTO `tbl_spp` (`id_spp`, `tahun`, `nominal`, `created_at`) VALUES
(2, '2020/2021', 50000, '0000-00-00 00:00:00'),
(10, '2021/2022', 50000, '2021-03-01 03:42:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `tbl_spp`
--
ALTER TABLE `tbl_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_spp`
--
ALTER TABLE `tbl_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
