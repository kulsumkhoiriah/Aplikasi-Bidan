-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 01:35 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `bidan`
--

CREATE TABLE `bidan` (
  `id` int(11) NOT NULL,
  `nama_bidan` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidan`
--

INSERT INTO `bidan` (`id`, `nama_bidan`, `jam_mulai`, `jam_akhir`) VALUES
(111, ' Bidan Kays  AM Keb', '08:00:00', '16:00:00'),
(112, 'Bidan Sherlly AM Keb', '16:00:00', '23:00:00'),
(113, 'Bidan Kulsum AM keb', '23:00:00', '07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(5) NOT NULL,
  `nama_diagnosa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `nama_diagnosa`) VALUES
(1, 'Konsultasi'),
(2, 'Melahirkan Normal'),
(3, 'Sesar');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_registrasi`
--

CREATE TABLE `jenis_registrasi` (
  `id` int(2) NOT NULL,
  `nama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_registrasi`
--

INSERT INTO `jenis_registrasi` (`id`, `nama`) VALUES
(1, 'offline'),
(2, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `no_pendaftaran` varchar(50) NOT NULL,
  `registrasi` int(2) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_persalinan` int(5) DEFAULT NULL,
  `bidan` int(5) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_pendaftaran`, `registrasi`, `tanggal_masuk`, `nama_pasien`, `alamat`, `no_hp`, `jenis_persalinan`, `bidan`, `tanggal_keluar`) VALUES
('1005200018', 2, '2020-06-15 05:56:37', 'Awkarin', 'Cikampek', '2147483647', 3, 111, '2020-05-10'),
('1105200019', 2, '2020-06-19 09:24:07', 'Maemunah', 'Karawang', '2147483647', 1, 112, '2020-05-12'),
('2206200001', 1, '2020-06-22 09:15:19', 'Lisa Black Pink', 'Karawang', '08971218123', 3, 112, '2020-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `rs_rujukan`
--

CREATE TABLE `rs_rujukan` (
  `id_rs` int(5) NOT NULL,
  `nama_rs` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_rujukan`
--

INSERT INTO `rs_rujukan` (`id_rs`, `nama_rs`, `alamat`) VALUES
(121, 'Rumah Kasih', 'Cikampek'),
(122, 'Fatmawati', 'Bekasi'),
(123, 'Rumah Bersalin', 'Karawang');

-- --------------------------------------------------------

--
-- Table structure for table `rujukan`
--

CREATE TABLE `rujukan` (
  `no_pendaftaran` varchar(50) NOT NULL,
  `id_rs` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rujukan`
--

INSERT INTO `rujukan` (`no_pendaftaran`, `id_rs`) VALUES
('2206200001', 121);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidan`
--
ALTER TABLE `bidan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_registrasi`
--
ALTER TABLE `jenis_registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD KEY `jenis_persalinan` (`jenis_persalinan`) USING BTREE,
  ADD KEY `bidan` (`bidan`),
  ADD KEY `registrasi` (`registrasi`);

--
-- Indexes for table `rs_rujukan`
--
ALTER TABLE `rs_rujukan`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indexes for table `rujukan`
--
ALTER TABLE `rujukan`
  ADD KEY `id_rs` (`id_rs`),
  ADD KEY `no_invoice` (`no_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`registrasi`) REFERENCES `jenis_registrasi` (`id`),
  ADD CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`jenis_persalinan`) REFERENCES `diagnosa` (`id`),
  ADD CONSTRAINT `pasien_ibfk_3` FOREIGN KEY (`bidan`) REFERENCES `bidan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rujukan`
--
ALTER TABLE `rujukan`
  ADD CONSTRAINT `rujukan_ibfk_3` FOREIGN KEY (`no_pendaftaran`) REFERENCES `pasien` (`no_pendaftaran`) ON DELETE CASCADE,
  ADD CONSTRAINT `rujukan_ibfk_4` FOREIGN KEY (`id_rs`) REFERENCES `rs_rujukan` (`id_rs`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
