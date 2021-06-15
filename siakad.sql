-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 05:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(2) NOT NULL,
  `nrp` varchar(32) NOT NULL,
  `id_makul` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nrp`, `id_makul`) VALUES
(6, 'testdosen', 1),
(7, 'testdosen', 3),
(9, 'testdosen', 2),
(10, '1111', 1),
(11, '1111', 3),
(12, '1111', 2),
(13, '1112', 1),
(14, '1112', 3),
(15, '1112', 2),
(16, '1113', 1),
(17, '1113', 3),
(18, '1113', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(2) NOT NULL,
  `nim` varchar(32) NOT NULL,
  `id_makul` int(2) NOT NULL,
  `nilai` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `id_makul`, `nilai`) VALUES
(1, 'testmhs', 4, 0),
(2, 'testmhs', 1, 80),
(7, 'testmhs', 2, 0),
(9, 'testmhs', 3, 0),
(10, '5555', 4, 0),
(11, '5556', 2, 0),
(12, '5557', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_makul` int(2) NOT NULL,
  `nama_makul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_makul`, `nama_makul`) VALUES
(1, 'SISTEM BASIS DATA'),
(2, 'PEMROGRAMAN BASIS DATA'),
(3, 'KEAMANAN SISTEM INFORMASI'),
(4, 'DATA MINING'),
(5, 'KALKULUS'),
(6, 'FISIKA'),
(7, 'KALKULUS'),
(8, 'FISIKA'),
(10, 'OLAHRAGA'),
(11, 'TEKNIK MIKROPROSESOR');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `userpass` char(32) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useren` enum('A','Y','N') NOT NULL DEFAULT 'N',
  `userrole` tinyint(4) NOT NULL,
  `userlogged` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `userpass`, `username`, `useren`, `userrole`, `userlogged`) VALUES
(1, 'testadmin', '098f6bcd4621d373cade4e832627b4f6', 'ADMIN', 'A', 1, 0),
(2, 'testdosen', '098f6bcd4621d373cade4e832627b4f6', 'DOSEN IDAMAN', 'Y', 2, 0),
(3, 'testmhs', '098f6bcd4621d373cade4e832627b4f6', 'MAHASISWA', 'Y', 4, 0),
(5, '1111', '098f6bcd4621d373cade4e832627b4f6', 'CHARISMA', 'Y', 2, 0),
(6, '5555', '098f6bcd4621d373cade4e832627b4f6', 'RAFLI', 'Y', 4, 0),
(7, '1112', '098f6bcd4621d373cade4e832627b4f6', 'AGUNG', 'Y', 2, 0),
(8, '5556', '098f6bcd4621d373cade4e832627b4f6', 'KHUSNUL', 'Y', 4, 0),
(9, '1113', '098f6bcd4621d373cade4e832627b4f6', 'RISMA', 'Y', 2, 0),
(10, '5557', '098f6bcd4621d373cade4e832627b4f6', 'ALVIN', 'Y', 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_makul`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_makul` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
