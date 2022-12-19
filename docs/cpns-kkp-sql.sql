-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 03:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position_apply` varchar(50) NOT NULL,
  `test_location` varchar(50) NOT NULL,
  `time_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_location`
--

CREATE TABLE `test_location` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_time`
--

CREATE TABLE `test_time` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `time_at` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nik` varchar(16) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sex` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `biodata_submitted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ijazah` varchar(200) NOT NULL,
  `cv` varchar(200) DEFAULT NULL,
  `position_apply` varchar(50) NOT NULL,
  `document_submitted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL,
  `verified_by` varchar(50) DEFAULT NULL,
  `verified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nik`, `created_at`, `email`, `password`, `name`, `dob`, `sex`, `address`, `photo`, `biodata_submitted_at`, `ijazah`, `cv`, `position_apply`, `document_submitted_at`, `status`, `verified_by`, `verified_at`) VALUES
('1212121212121212', '2022-12-18 16:16:00', 'wa@wa.id', '51251811c13e410b1282989d8c075a00', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00 00:00:00', '', NULL, '', '0000-00-00 00:00:00', '', NULL, '0000-00-00 00:00:00');

INSERT INTO `users` (`nik`, `created_at`, `email`, `password`, `name`, `dob`, `sex`, `address`, `photo`, `biodata_submitted_at`, `ijazah`, `cv`, `position_apply`, `document_submitted_at`, `status`, `verified_by`, `verified_at`) VALUES
('3527031101020011', '2022-12-18 16:16:00', 'arifbadrus08@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00 00:00:00', '', NULL, '', '0000-00-00 00:00:00', '', NULL, '0000-00-00 00:00:00');
INSERT INTO `users` (`nik`, `created_at`, `email`, `password`, `name`, `dob`, `sex`, `address`, `photo`, `biodata_submitted_at`, `ijazah`, `cv`, `position_apply`, `document_submitted_at`, `status`, `verified_by`, `verified_at`) VALUES
('3521231231823197', '2022-12-18 16:16:00', 'mamanabdul08@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00 00:00:00', '', NULL, '', '0000-00-00 00:00:00', '', NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `test_location`
--
ALTER TABLE `test_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_time`
--
ALTER TABLE `test_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `verified_by` (`verified_by`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `users` (`nik`);

--
-- Constraints for table `test_time`
--
ALTER TABLE `test_time`
  ADD CONSTRAINT `test_time_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `test_location` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`verified_by`) REFERENCES `admin` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
