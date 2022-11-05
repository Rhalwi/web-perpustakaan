-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2022 pada 00.49
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jenkel` varchar(20) NOT NULL,
  `telepon` int(20) NOT NULL,
  `level` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `foto`, `nama`, `username`, `password`, `jenkel`, `telepon`, `level`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `email`) VALUES
(2, '', 'anggota', 'anggota', 'anggota', 'laki-laki', 8, 'anggota', 'PM', '', '0000-00-00', ''),
(7, '62b49c5858f88.jpg', 'hgdys', 'admin', 'admin', 'lk', 81, 'petugas', 'pppp', 'p', '2022-06-22', 'my.tauruslove@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) NOT NULL,
  `sampul` varchar(100) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_buku` int(10) NOT NULL,
  `stok_buku` int(10) NOT NULL,
  `dipinjam` int(10) NOT NULL,
  `tanggal_masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `sampul`, `isbn`, `judul`, `penerbit`, `tahun_buku`, `stok_buku`, `dipinjam`, `tanggal_masuk`) VALUES
(1, 'solo leveling.jpg', '-', 'Solo Leveling', 'D&C Media', 2016, 1, 0, '22 januari 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `no_pinjam` int(11) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pinjam` varchar(225) NOT NULL,
  `kembali` varchar(225) NOT NULL,
  `status` varchar(100) NOT NULL,
  `denda` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`no_pinjam`, `id_buku`, `id_anggota`, `nama`, `pinjam`, `kembali`, `status`, `denda`) VALUES
(1, 1, 2, 'anggota', '2022-06-06', '2022-06-25', 'kembali', '12000'),
(2, 1, 2, 'anggota', '2022-06-22', '2022-07-17', 'kembali', '18000'),
(13, 1, 2, 'anggota', '2022-06-25', '2022-06-25', 'kembali', '0'),
(16, 1, 2, 'anggota', '2022-06-16', '2022-06-25', 'kembali', '2000'),
(24, 1, 2, 'anggota', '2022-07-16', '2022-07-15', 'kembali', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`no_pinjam`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `no_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
