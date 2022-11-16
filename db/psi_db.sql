-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2022 pada 08.05
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `stambuk` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`stambuk`, `nama`, `jenis_kelamin`, `jurusan`) VALUES
('F55117001', 'Fadli Nur Zaman', 'Laki-laki', 'Arsitek'),
('F55117002', 'Ummul Fajri Rahmat', 'Laki-laki', 'Elektro'),
('F55117003', 'Aldair', 'Laki-laki', 'Sipil'),
('F55117004', 'Arfan Afandy', 'Perempuan', 'Sipil'),
('F55117005', 'Audy Ruslan', 'Laki-laki', 'Teknologi Informasi');

--
-- Trigger `tb_alternatif`
--
DELIMITER $$
CREATE TRIGGER `update` AFTER UPDATE ON `tb_alternatif` FOR EACH ROW UPDATE tb_penilaian SET stambuk=new.stambuk,nama=new.nama WHERE stambuk=old.stambuk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `stambuk` varchar(20) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `pengalaman_kerja` float NOT NULL,
  `pendidikan` float NOT NULL,
  `usia` float NOT NULL,
  `status_perkawinan` float NOT NULL,
  `alamat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`stambuk`, `nama`, `pengalaman_kerja`, `pendidikan`, `usia`, `status_perkawinan`, `alamat`) VALUES
('F55117001', 'Fadli Nur Zaman', 0.5, 1, 0.7, 0.7, 0.8),
('F55117002', 'Ummul Fajri Rahmat', 0.8, 0.7, 1, 0.5, 1),
('F55117003', 'Aldair', 1, 0.3, 0.4, 0.7, 1),
('F55117004', 'Arfan Afandy', 0.2, 1, 0.5, 0.9, 0.7),
('F55117005', 'Audy Ruslan', 1, 0.7, 0.4, 0.7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ranking`
--

CREATE TABLE `tb_ranking` (
  `no` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ranking`
--

INSERT INTO `tb_ranking` (`no`, `nama`, `nilai_akhir`) VALUES
(1, 'Fadli Nur Zaman', 0.773),
(2, 'Ummul Fajri Rahmat', 0.845),
(3, 'Aldair', 0.615),
(4, 'Arfan Afandy', 0.684),
(5, 'Audy Ruslan', 0.686);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`stambuk`);

--
-- Indeks untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`stambuk`);

--
-- Indeks untuk tabel `tb_ranking`
--
ALTER TABLE `tb_ranking`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_ranking`
--
ALTER TABLE `tb_ranking`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
