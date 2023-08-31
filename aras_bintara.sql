-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Okt 2022 pada 09.10
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aras_bintara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `alamat_siswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `nama_siswa`, `tanggal_lahir`, `tempat_lahir`, `pendidikan_terakhir`, `alamat_siswa`) VALUES
(7, 'Yogi F.', '2005-12-01', '-', 'SMA', '-'),
(8, 'M. Saleh', '2005-12-01', '-', 'SMA', '-'),
(9, 'Arif Widyo', '2005-12-01', '-', 'SMA', '-'),
(10, 'Nur Huda', '2005-12-01', '-', 'SMA', '-'),
(11, 'M. Ezra', '2005-12-01', '-', 'SMA', '-'),
(12, 'Feridja', '2005-12-01', '-', 'SMA', '-'),
(13, 'M. Derby', '2005-12-01', '-', 'SMA', '-'),
(14, 'M. Aditya', '2005-12-01', '-', 'SMA', '-'),
(15, 'M. Zaki', '2005-12-01', '-', 'SMA', '-'),
(16, 'M. Rizky', '2005-12-01', '-', 'SMA', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(255) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'C1', 'Kesehatan', 0.15),
(2, 'C2', 'Pendidikan', 0.15),
(3, 'C3', 'Psikologi', 0.3),
(4, 'C4', 'Uji Akademik', 0.2),
(5, 'C5', 'Uji Jasmani', 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_nilai` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nilai_kesehatan` double NOT NULL,
  `nilai_pendidikan` double NOT NULL,
  `nilai_psikologi` double NOT NULL,
  `nilai_akademik` double NOT NULL,
  `nilai_jasmani` double NOT NULL,
  `ki` double NOT NULL,
  `id_penilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_nilai`, `nama_siswa`, `nilai_kesehatan`, `nilai_pendidikan`, `nilai_psikologi`, `nilai_akademik`, `nilai_jasmani`, `ki`, `id_penilai`) VALUES
(19, 'Yogi F.', 67, 76, 80, 79, 85, 0.86963216178562, 1),
(20, 'M. Saleh', 80, 78, 66, 75, 85, 0.80801459287879, 1),
(21, 'Arif Widyo', 80, 77, 62, 87, 90, 0.84759921290378, 1),
(22, 'Nur Huda', 85, 80, 85, 90, 85, 1, 1),
(23, 'M. Ezra', 80, 68, 85, 85, 78, 0.89388276862531, 1),
(24, 'M. Derby', 85, 75, 85, 85, 60, 0.88870631831435, 1),
(25, 'Feridja', 90, 76, 80, 83, 87, 0.96635307297876, 1),
(26, 'M. Aditya', 80, 80, 87, 78, 87, 0.96041537997501, 1),
(27, 'M. Zaki', 90, 77, 85, 80, 82, 0.96635307297876, 1),
(28, 'M. Rizky', 85, 69, 89, 75, 90, 0.89312152593252, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `jabatan_user`) VALUES
(1, 'Steve Jones', 'ironman@stark.com', 'ironman', 'admin'),
(2, 'Peter Stonks', 'peter123@man.com', 'akuluarbiasa', 'siswa'),
(8, 'sdmpolri', 'sdmpolri@gmail.com', 'sdm123', 'siswa'),
(9, 'polrestasmd', 'polrestasmd@gmail.com', 'resta123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
