-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2023 pada 12.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_publik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` varchar(2000) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `instansi` varchar(150) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `lampiran` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id`, `judul`, `isi`, `tanggal`, `lokasi`, `instansi`, `kategori`, `lampiran`) VALUES
(1, 'test', 'tes', '2023-11-10', 'wua wua jalan kedodnon', 'kepolisian', 'kekerasan', 'kdrt.jpg'),
(2, 'pemograman web', 'guduguw', '2023-11-04', 'wua wua jalan kedodnon', 'kepolisian', 'kekerasan', 'kdrt.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `nik` int(20) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`nik`, `namalengkap`, `email`, `no_telepon`, `password`) VALUES
(74711, 'Muh. Falah Mubaraq', 'cikoh536@gmail.com', 2147483647, '12345'),
(747111, 'Muh. Falah Mubaraq', 'cikoh536@gmail.com', 876, '11111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
