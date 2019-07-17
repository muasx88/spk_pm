-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2019 pada 17.00
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `keterangan` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_fasilitas`
--

INSERT INTO `kriteria_fasilitas` (`id_kriteria`, `pilihan_kriteria`, `keterangan`, `bobot`) VALUES
(1, 'Sangat Layak dan Lengkap', '5 s/d 6', 5),
(2, 'Layak', '4 s/d 5', 4),
(3, 'Sedang', '3 s/d 4', 3),
(4, 'Kurang Layak', '2 s/d 3', 2),
(5, 'Sangat Tidak Layak', '1 s/d 2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_harga`
--

CREATE TABLE `kriteria_harga` (
  `id_kriteria` int(2) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_harga`
--

INSERT INTO `kriteria_harga` (`id_kriteria`, `pilihan_kriteria`, `keterangan`, `bobot`) VALUES
(2, 'Sangat Murah', '< 200 jt', 5),
(3, 'Murah', '200 jt - 250 jt', 4),
(4, 'Sedang', '250 jt - 300 jt', 3),
(5, 'Mahal', '300 jt - 350 jt', 2),
(6, 'Sangat Mahal', '> 400 jt', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_jarakkota`
--

CREATE TABLE `kriteria_jarakkota` (
  `id_kriteria` int(2) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_jarakkota`
--

INSERT INTO `kriteria_jarakkota` (`id_kriteria`, `pilihan_kriteria`, `keterangan`, `bobot`) VALUES
(2, 'Sangat Dekat', '< 5 km', 5),
(3, 'Dekat', '5 km - 10 km', 4),
(4, 'Sedang', '10 km - 20 km', 3),
(5, 'Jauh', '20 km - 40 km', 2),
(6, 'Sangat Jauh', '> 40 km', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_jarakpasar`
--

CREATE TABLE `kriteria_jarakpasar` (
  `id_kriteria` int(2) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_jarakpasar`
--

INSERT INTO `kriteria_jarakpasar` (`id_kriteria`, `pilihan_kriteria`, `keterangan`, `bobot`) VALUES
(1, 'Sangat Dekat', '< 2 km', 5),
(2, 'Dekat', '2 km - 3 km', 4),
(3, 'Sedang', '3 km - 4km', 3),
(4, 'Jauh', '4 km - 5 km', 2),
(5, 'Sangat Jauh', '> 5 km', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_keamanan`
--

CREATE TABLE `kriteria_keamanan` (
  `id_kriteria` int(2) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kriteria_keamanan`
--

INSERT INTO `kriteria_keamanan` (`id_kriteria`, `pilihan_kriteria`, `keterangan`, `bobot`) VALUES
(2, 'Sangat Penting', '> 8 orang', 5),
(3, 'Penting', '6 - 8 orang', 4),
(4, 'Cukup Penting', '4 - 6 orang', 3),
(5, 'Sedang', '2 - 4 orang', 2),
(6, 'Sangat Tidak Penting', '0 orang', 1);

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
(7, 7, 4, 4, 4, 4, 1),
(8, 8, 5, 4, 4, 4, 1),
(9, 9, 6, 4, 4, 4, 1),
(10, 10, 6, 4, 5, 4, 1),
(11, 11, 6, 4, 5, 4, 1),
(12, 12, 6, 4, 5, 4, 1),
(13, 13, 3, 5, 5, 5, 2),
(14, 14, 4, 5, 4, 4, 2),
(15, 15, 5, 5, 5, 4, 2),
(16, 16, 5, 5, 5, 3, 2),
(17, 17, 6, 5, 5, 4, 2),
(18, 18, 6, 3, 1, 5, 5),
(19, 19, 6, 3, 1, 5, 5);

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
(142, 'PALGADING (type 50)', 13.8),
(143, 'TAMAN DARUSSALAM (type 27)', 14.266666666667),
(144, ' PALGADING (type 36)', 12.516666666667),
(145, 'TAMAN DARUSSALAM (type 36)', 15.1),
(146, 'PALGADING (type 40)', 12.55),
(147, 'TAMAN RARUSSALAM (type 45)', 17.6),
(148, 'TAMAN DARUSSALAM (type 55)', 16.8),
(149, ' TAMAN DARUSSALAM (type 70)', 16.8),
(150, ' TAMAN DARUSSALAM (type 90)', 16.8),
(151, 'PALGADING (type55)', 15.05),
(152, 'PALGADING (type 33)', 10.05),
(153, ' DJOGJAVILLAGE (type 36)', 15.5),
(154, ' DJOGJAVILLAGE (type 45)', 15.5);

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
(7, 'TAMAN DARUSSALAM (type 27)', 'Jl.Green kuantan Residence Block I-1 jl.Wates Km 9,6 Rewulu Sedayu Bantul'),
(8, 'TAMAN DARUSSALAM (type 36)', 'Jl.Green kuantan Residence Block I-1 jl.Wates Km 9,6 Rewulu Sedayu Bantul'),
(9, 'TAMAN RARUSSALAM (type 45)', 'Jl.Green kuantan Residence Block I-1 jl.Wates Km 9,6 Rewulu Sedayu Bantul'),
(10, 'TAMAN DARUSSALAM (type 55)', 'Jl.Green kuantan Residence Block I-1 jl.Wates Km 9,6 Rewulu Sedayu Bantul'),
(11, ' TAMAN DARUSSALAM (type 70)', 'Jl.Green kuantan Residence Block I-1 jl.Wates Km 9,6 Rewulu Sedayu Bantul'),
(12, ' TAMAN DARUSSALAM (type 90)', 'Jl.Green kuantan Residence Block I-1 jl.Wates Km 9,6 Rewulu Sedayu Bantul'),
(13, 'PALGADING (type 33)', 'Logandeng, Playen, kab. Gunungkidul Yogyakarta '),
(14, ' PALGADING (type 36)', 'Logandeng, Playen, kab. Gunungkidul Yogyakarta '),
(15, 'PALGADING (type 40)', 'Logandeng, Playen, kab. Gunungkidul Yogyakarta '),
(16, 'PALGADING (type 50)', 'Logandeng, Playen, kab. Gunungkidul Yogyakarta '),
(17, 'PALGADING (type55)', 'Logandeng, Playen, kab. Gunungkidul Yogyakarta '),
(18, ' DJOGJAVILLAGE (type 36)', 'RANGKAATAPJOGJA (RAJ,Ploso Kuning IV, Minomartani, kec. Ngaglik, Kabupaten  Sleman, Daerah Yogyakarta 55581'),
(19, ' DJOGJAVILLAGE (type 45)', 'RANGKAATAPJOGJA (RAJ,Ploso Kuning IV, Minomartani, kec. Ngaglik, Kabupaten  Sleman, Daerah Yogyakarta 55581');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `kriteria_fasilitas`
--
ALTER TABLE `kriteria_fasilitas`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `kriteria_harga`
--
ALTER TABLE `kriteria_harga`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `kriteria_jarakkota`
--
ALTER TABLE `kriteria_jarakkota`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `kriteria_jarakpasar`
--
ALTER TABLE `kriteria_jarakpasar`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `kriteria_keamanan`
--
ALTER TABLE `kriteria_keamanan`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
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
-- Indeks untuk tabel `perangkingan`
--
ALTER TABLE `perangkingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perumahan`
--
ALTER TABLE `perumahan`
  ADD PRIMARY KEY (`id_perumahan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kriteria_fasilitas`
--
ALTER TABLE `kriteria_fasilitas`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kriteria_harga`
--
ALTER TABLE `kriteria_harga`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kriteria_jarakkota`
--
ALTER TABLE `kriteria_jarakkota`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kriteria_jarakpasar`
--
ALTER TABLE `kriteria_jarakpasar`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kriteria_keamanan`
--
ALTER TABLE `kriteria_keamanan`
  MODIFY `id_kriteria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `perangkingan`
--
ALTER TABLE `perangkingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT untuk tabel `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `id_perumahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
