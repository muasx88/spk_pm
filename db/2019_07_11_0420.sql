-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11 Jul 2019 pada 04.18
-- Versi Server: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.3.7-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@spk.com', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_fasilitas`
--

CREATE TABLE `kriteria_fasilitas` (
  `id_kriteria` int(2) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_fasilitas`
--

INSERT INTO `kriteria_fasilitas` (`id_kriteria`, `pilihan_kriteria`, `bobot`) VALUES
(1, 'Sangat Penting', 5),
(2, 'Penting', 4),
(3, 'Cukup Penting', 3),
(4, 'Sedang', 2),
(5, 'Sangat Tidak Penting', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_harga`
--

CREATE TABLE `kriteria_harga` (
  `id_kriteria` int(2) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_harga`
--

INSERT INTO `kriteria_harga` (`id_kriteria`, `pilihan_kriteria`, `bobot`) VALUES
(2, 'Sangat Murah', 5),
(3, 'Murah', 4),
(4, 'Sedang', 3),
(5, 'Mahal', 2),
(6, 'Sangat Mahal', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_jarakkota`
--

CREATE TABLE `kriteria_jarakkota` (
  `id_kriteria` int(2) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_jarakkota`
--

INSERT INTO `kriteria_jarakkota` (`id_kriteria`, `pilihan_kriteria`, `bobot`) VALUES
(2, 'Sangat Dekat', 5),
(3, 'Dekat', 4),
(4, 'Sedang', 3),
(5, 'Jauh', 2),
(6, 'Sangat Jauh', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_jarakpasar`
--

CREATE TABLE `kriteria_jarakpasar` (
  `id_kriteria` int(2) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_jarakpasar`
--

INSERT INTO `kriteria_jarakpasar` (`id_kriteria`, `pilihan_kriteria`, `bobot`) VALUES
(1, 'Sangat Penting', 5),
(2, 'Penting', 4),
(3, 'Cukup Penting', 3),
(4, 'Sedang', 2),
(5, 'Sangat Tidak Penting', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_keamanan`
--

CREATE TABLE `kriteria_keamanan` (
  `id_kriteria` int(2) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_keamanan`
--

INSERT INTO `kriteria_keamanan` (`id_kriteria`, `pilihan_kriteria`, `bobot`) VALUES
(2, 'Sangat Penting', 5),
(3, 'Penting', 4),
(4, 'Cukup Penting', 3),
(5, 'Sedang', 2),
(6, 'Sangat Tidak Penting', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(2) NOT NULL,
  `id_perumahan` int(2) NOT NULL,
  `C1` int(2) NOT NULL,
  `C2` int(2) NOT NULL,
  `C3` int(2) NOT NULL,
  `C4` int(2) NOT NULL,
  `C5` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_perumahan`, `C1`, `C2`, `C3`, `C4`, `C5`) VALUES
(2, 7, 2, 3, 1, 4, 1),
(3, 8, 3, 2, 2, 3, 1),
(6, 9, 2, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkingan`
--

CREATE TABLE `perangkingan` (
  `id` int(11) NOT NULL,
  `nama_perumahan` varchar(50) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `perangkingan`
--

INSERT INTO `perangkingan` (`id`, `nama_perumahan`, `nilai`) VALUES
(65, 'Perumahan A', 18.4),
(66, 'Perumahan B', 20.2),
(67, 'Perumahan C', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perumahan`
--

CREATE TABLE `perumahan` (
  `id_perumahan` int(11) NOT NULL,
  `nama_perumahan` varchar(50) NOT NULL,
  `alamat_perumahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `perumahan`
--

INSERT INTO `perumahan` (`id_perumahan`, `nama_perumahan`, `alamat_perumahan`) VALUES
(7, 'Perumahan A', 'Jl. Jalan aja dulu kali aja jodoh'),
(8, 'Perumahan B', 'Jl Sepak Bola'),
(9, 'Perumahan C', 'Jl jalan ke tepi sawah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `kriteria_fasilitas`
--
ALTER TABLE `kriteria_fasilitas`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_harga`
--
ALTER TABLE `kriteria_harga`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_jarakkota`
--
ALTER TABLE `kriteria_jarakkota`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_jarakpasar`
--
ALTER TABLE `kriteria_jarakpasar`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_keamanan`
--
ALTER TABLE `kriteria_keamanan`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `C1` (`C1`),
  ADD KEY `C2` (`C2`),
  ADD KEY `C3` (`C3`),
  ADD KEY `C4` (`C4`),
  ADD KEY `C5` (`C5`),
  ADD KEY `id_perumahan` (`id_perumahan`);

--
-- Indexes for table `perangkingan`
--
ALTER TABLE `perangkingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perumahan`
--
ALTER TABLE `perumahan`
  ADD PRIMARY KEY (`id_perumahan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kriteria_fasilitas`
--
ALTER TABLE `kriteria_fasilitas`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kriteria_harga`
--
ALTER TABLE `kriteria_harga`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kriteria_jarakkota`
--
ALTER TABLE `kriteria_jarakkota`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kriteria_jarakpasar`
--
ALTER TABLE `kriteria_jarakpasar`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kriteria_keamanan`
--
ALTER TABLE `kriteria_keamanan`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `perangkingan`
--
ALTER TABLE `perangkingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `id_perumahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_perumahan`) REFERENCES `perumahan` (`id_perumahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`C1`) REFERENCES `kriteria_harga` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`C2`) REFERENCES `kriteria_jarakkota` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_4` FOREIGN KEY (`C3`) REFERENCES `kriteria_jarakpasar` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_5` FOREIGN KEY (`C4`) REFERENCES `kriteria_keamanan` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_6` FOREIGN KEY (`C5`) REFERENCES `kriteria_fasilitas` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
