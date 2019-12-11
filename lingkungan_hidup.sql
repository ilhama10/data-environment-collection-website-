-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2019 pada 03.47
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lingkungan_hidup`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `air`
--

CREATE TABLE `air` (
  `ID_Lokasi` int(11) NOT NULL,
  `PH` int(11) NOT NULL,
  `Kejernihan` int(11) NOT NULL,
  `Waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `air`
--

INSERT INTO `air` (`ID_Lokasi`, `PH`, `Kejernihan`, `Waktu`) VALUES
(1, 34, 14, '2019-12-25 00:00:00'),
(1, 12, 23, '2019-12-25 00:00:05'),
(2, 23, 23, '2019-12-25 00:00:00'),
(2, 0, 0, '2019-12-09 00:00:05'),
(2, 12, 35, '2019-12-09 00:00:00'),
(2, 23, 22, '2019-12-09 00:00:05'),
(3, 23, 52, '2019-12-18 00:00:00'),
(3, 21, 32, '2019-12-09 00:00:05'),
(4, 23, 24, '2019-12-09 00:00:00'),
(4, 23, 13, '2019-12-09 00:00:05'),
(1, 34, 34, '2019-12-10 08:47:14'),
(1, 56, 90, '2019-12-10 08:47:27'),
(2, 7, 100, '2019-12-10 09:06:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`akses`) VALUES
('admin'),
('masyarakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelamin`
--

CREATE TABLE `kelamin` (
  `jenis_kelamin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelamin`
--

INSERT INTO `kelamin` (`jenis_kelamin`) VALUES
('laki-laki'),
('perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(30) NOT NULL,
  `nama_kota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Surabaya'),
(2, 'Malang'),
(4, 'gresik'),
(5, 'Pasuruan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `ID_Lokasi` int(11) NOT NULL,
  `Longitude` decimal(10,0) NOT NULL,
  `Latitude` decimal(10,0) NOT NULL,
  `Nama_Lokasi` varchar(30) NOT NULL,
  `id_kota` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`ID_Lokasi`, `Longitude`, `Latitude`, `Nama_Lokasi`, `id_kota`) VALUES
(1, '177', '2000', 'Rungkut', 1),
(2, '455', '322', 'Tambaksari', 1),
(3, '766', '3434', 'Sawojajar', 2),
(4, '256', '898', 'Cangar', 2),
(7, '454', '456', 'gebang', 1),
(8, '256', '325', 'haha', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanah`
--

CREATE TABLE `tanah` (
  `ID_Lokasi` int(11) NOT NULL,
  `Kelembapan` int(11) NOT NULL,
  `PH` int(11) NOT NULL,
  `Waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanah`
--

INSERT INTO `tanah` (`ID_Lokasi`, `Kelembapan`, `PH`, `Waktu`) VALUES
(4, 57, 5, '2019-12-10 00:10:00'),
(4, 67, 6, '2019-12-10 00:21:00'),
(1, 66, 5, '2019-12-10 00:00:12'),
(1, 70, 8, '2019-12-10 00:00:00'),
(3, 58, 6, '2019-12-10 02:00:00'),
(3, 71, 8, '2019-12-10 03:00:00'),
(2, 56, 5, '2019-12-10 00:07:08'),
(2, 45, 6, '2019-12-10 00:08:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `udara`
--

CREATE TABLE `udara` (
  `ID_Lokasi` int(11) NOT NULL,
  `Suhu` int(11) NOT NULL,
  `Kelembapan` int(11) NOT NULL,
  `Kadar_CO` int(11) NOT NULL,
  `Waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `udara`
--

INSERT INTO `udara` (`ID_Lokasi`, `Suhu`, `Kelembapan`, `Kadar_CO`, `Waktu`) VALUES
(4, 23, 70, 43, '2019-12-10 00:07:00'),
(4, 25, 56, 60, '2019-12-10 00:17:00'),
(1, 24, 70, 40, '2019-12-10 00:12:12'),
(1, 22, 76, 40, '2019-12-10 00:19:19'),
(3, 26, 59, 50, '2019-12-10 03:07:12'),
(3, 27, 60, 70, '2019-12-10 06:15:14'),
(2, 24, 56, 50, '2019-12-10 06:10:11'),
(2, 27, 56, 70, '2019-12-10 09:11:22'),
(2, 23, 23, 12, '2019-12-10 08:48:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `lahir` date NOT NULL,
  `id_lokasi` int(30) NOT NULL,
  `akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `nama_user`, `foto_user`, `jenis_kelamin`, `lahir`, `id_lokasi`, `akses`) VALUES
('bungaaa', 'bungaaa@gmai.com', '202cb962ac59075b964b07152d234b70', 'bungaaaa', 'standard.jpg', 'Perempuan', '2019-12-02', 2, 'admin'),
('fadhil', 'f.ikhsanta@gmail.com', '202cb962ac59075b964b07152d234b70', 'Fadhil Ikhsan', 'standard.jpg', 'Laki-laki', '2019-12-19', 2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `air`
--
ALTER TABLE `air`
  ADD KEY `ID_Lokasi` (`ID_Lokasi`);

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`akses`);

--
-- Indeks untuk tabel `kelamin`
--
ALTER TABLE `kelamin`
  ADD PRIMARY KEY (`jenis_kelamin`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`ID_Lokasi`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `tanah`
--
ALTER TABLE `tanah`
  ADD KEY `ID_Lokasi` (`ID_Lokasi`);

--
-- Indeks untuk tabel `udara`
--
ALTER TABLE `udara`
  ADD KEY `ID_Lokasi` (`ID_Lokasi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `jenis_kelamin` (`jenis_kelamin`),
  ADD KEY `akses` (`akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `ID_Lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `air`
--
ALTER TABLE `air`
  ADD CONSTRAINT `air_ibfk_1` FOREIGN KEY (`ID_Lokasi`) REFERENCES `lokasi` (`ID_Lokasi`);

--
-- Ketidakleluasaan untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `lokasi_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);

--
-- Ketidakleluasaan untuk tabel `tanah`
--
ALTER TABLE `tanah`
  ADD CONSTRAINT `tanah_ibfk_1` FOREIGN KEY (`ID_Lokasi`) REFERENCES `lokasi` (`ID_Lokasi`);

--
-- Ketidakleluasaan untuk tabel `udara`
--
ALTER TABLE `udara`
  ADD CONSTRAINT `udara_ibfk_1` FOREIGN KEY (`ID_Lokasi`) REFERENCES `lokasi` (`ID_Lokasi`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`jenis_kelamin`) REFERENCES `kelamin` (`jenis_kelamin`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`akses`) REFERENCES `akses` (`akses`),
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`ID_Lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
