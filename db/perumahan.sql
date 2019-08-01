-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2019 pada 17.21
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
(8, 'TAMAN DARUSSALAM (type 36)', 'Jl.Green kuantan Residence Block I-1 jl.Wates Km 9,6 Rewulu Sedayu Bantul'),
(14, ' PALGADING (type 36)', 'Logandeng, Playen, kab. Gunungkidul Yogyakarta '),
(18, ' DJOGJAVILLAGE (type 36)', 'RANGKAATAPJOGJA (RAJ,Ploso Kuning IV, Minomartani, kec. Ngaglik, Kabupaten  Sleman, Daerah Yogyakarta 55581');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `perumahan`
--
ALTER TABLE `perumahan`
  ADD PRIMARY KEY (`id_perumahan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `id_perumahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
