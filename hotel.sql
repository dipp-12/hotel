-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 01:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `Nama Pemesan` varchar(240) NOT NULL,
  `Nomor Identitas` bigint(16) NOT NULL,
  `Jenis Kelamin` varchar(12) NOT NULL,
  `Tipe Kamar` varchar(12) NOT NULL,
  `Tanggal Pesan` varchar(12) NOT NULL,
  `Durasi Penginapan` varchar(12) NOT NULL,
  `Termasuk Breakfast` varchar(6) NOT NULL,
  `Discount` varchar(4) NOT NULL,
  `Total Bayar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`Nama Pemesan`, `Nomor Identitas`, `Jenis Kelamin`, `Tipe Kamar`, `Tanggal Pesan`, `Durasi Penginapan`, `Termasuk Breakfast`, `Discount`, `Total Bayar`) VALUES
('Nadhif', 1234567890123456, 'Laki-Laki', 'standar', '30/04/2024', '1 hari', 'Tidak', '0%', '500.000'),
('Wawan', 1234567890123456, 'Laki-Laki', 'standar', '30/04/2024', '1 hari', 'Ya', '0%', '580.000'),
('Evan', 1233333333333333, 'Laki-Laki', 'family', '20/05/2024', '3 hari', 'Ya', '10%', '2.130.000'),
('room', 1234567890123456, 'Laki-Laki', 'standar', '30/04/2024', '4 hari', 'Ya', '10%', '2.120.000'),
('Nadhif', 1234567890123456, 'Laki-Laki', 'deluxe', '20/05/2024', '1 hari', 'Tidak', '0%', '600.000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
