-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 06:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbingan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_bimbingan`
--

CREATE TABLE `dt_bimbingan` (
  `id_record` int(20) NOT NULL,
  `thn_akademik` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `persen_progres` varchar(255) DEFAULT NULL,
  `qrcode` varchar(255) NOT NULL,
  `validasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_bimbingan`
--

INSERT INTO `dt_bimbingan` (`id_record`, `thn_akademik`, `nim`, `tgl`, `nidn`, `catatan`, `persen_progres`, `qrcode`, `validasi`) VALUES
(68, '2020/2021', '1803035', '28-04-2021', '0002038504', 'validasi ok hhhh', '78', '113', 'valid');

-- --------------------------------------------------------

--
-- Table structure for table `dt_dosen`
--

CREATE TABLE `dt_dosen` (
  `id` int(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_dosen`
--

INSERT INTO `dt_dosen` (`id`, `nidn`, `nama`, `pin`) VALUES
(1, '0005059202', 'Muhamad Mustamiin', '1234'),
(2, '0002038504', 'Kurnia Adi Cahyanto', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `dt_mhs`
--

CREATE TABLE `dt_mhs` (
  `id` int(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_mhs`
--

INSERT INTO `dt_mhs` (`id`, `nim`, `nama_mhs`) VALUES
(1, '1803035', 'Yui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_bimbingan`
--
ALTER TABLE `dt_bimbingan`
  ADD PRIMARY KEY (`id_record`);

--
-- Indexes for table `dt_dosen`
--
ALTER TABLE `dt_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dt_mhs`
--
ALTER TABLE `dt_mhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_bimbingan`
--
ALTER TABLE `dt_bimbingan`
  MODIFY `id_record` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `dt_dosen`
--
ALTER TABLE `dt_dosen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dt_mhs`
--
ALTER TABLE `dt_mhs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
