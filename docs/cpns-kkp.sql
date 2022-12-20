-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2022 pada 09.05
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpns-kkp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`email`, `password`, `name`) VALUES
('admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nik` varchar(16) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `sex` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `biodata_submitted_at` varchar(100) NOT NULL,
  `ijazah` varchar(200) NOT NULL,
  `cv` varchar(200) DEFAULT NULL,
  `position_apply` varchar(50) NOT NULL,
  `location_test` varchar(50) NOT NULL,
  `time_test` varchar(50) NOT NULL,
  `document_submitted_at` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `verified_by` varchar(50) DEFAULT NULL,
  `verified_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nik`, `created_at`, `email`, `password`, `name`, `dob`, `sex`, `address`, `photo`, `biodata_submitted_at`, `ijazah`, `cv`, `position_apply`, `location_test`, `time_test`, `document_submitted_at`, `status`, `verified_by`, `verified_at`) VALUES
('3527031101020011', '2022-12-20 03:41:26', 'arifbadrus08@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Arief Badrus Sholeh', '2002-01-11', 'Laki-laki', 'Pamekasan, Madura', 'photo_3527031101020011.jpg', '20-12-2022 10:42:15', 'ijazah_3527031101020011.pdf', 'cv_3527031101020011.pdf', 'Biro Perencanaan', 'Surabaya', '10.00 - 12.00', '20-12-2022 10:43:13', 'passed', 'admin@gmail.com', '20-12-2022 11:41:27'),
('3527031101020022', '2022-12-20 03:46:56', 'muhammad08@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Muhammad', '2003-06-16', 'Laki-laki', 'Jakarta', 'photo_3527031101020022.jpg', '20-12-2022 15:00:48', 'ijazah_3527031101020022.pdf', 'cv_3527031101020022.pdf', 'Biro Hukum dan Organisasi', 'Malang', '12.30 - 14.30', '20-12-2022 15:01:13', 'passed', 'admin@gmail.com', '20-12-2022 15:01:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `verified_by` (`verified_by`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`verified_by`) REFERENCES `admin` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
