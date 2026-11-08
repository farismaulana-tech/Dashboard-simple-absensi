-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2026 at 01:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `id_absensi` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Hadir','Sakit','Izin','Alpha') NOT NULL,
  `jam_absen` time DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `pencatat` enum('Sistem','Guru Piket','Wali Kelas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`id_absensi`, `nisn`, `tanggal`, `status`, `jam_absen`, `keterangan`, `pencatat`) VALUES
(1, '0081234501', '2026-09-14', 'Hadir', '07:15:00', NULL, 'Guru Piket'),
(2, '0081234502', '2026-09-14', 'Sakit', NULL, 'Surat dokter dilampirkan', 'Wali Kelas'),
(3, '0072345601', '2026-09-14', 'Hadir', '07:10:00', NULL, 'Guru Piket'),
(4, '0072345602', '2026-09-14', 'Izin', NULL, 'Acara keluarga', 'Wali Kelas'),
(5, '0063456701', '2026-09-14', 'Alpha', NULL, 'Tanpa keterangan', 'Guru Piket');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Wali Kelas','Guru Piket') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `username`, `password`, `role`) VALUES
(1, '198501012010011001', 'Ahmad Zaini, S.Kom.', 'admin_piket', 'Admin', 'Guru Piket'),
(2, '199005122014022003', 'Siti Aminah, M.Pd.', 'wali_rpl1', 'Admin', 'Wali Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `tingkat` enum('X','XI','XII','XIII') NOT NULL,
  `kompetensi_keahlian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `tingkat`, `kompetensi_keahlian`) VALUES
(1, 'X TKJ 1', 'X', 'Teknik Komputer dan Jaringan'),
(2, 'XI RPL 1', 'XI', 'Rekayasa Perangkat Lunak'),
(3, 'XII TKJ 2', 'XII', 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(15) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama_lengkap`, `id_kelas`, `jenis_kelamin`, `password`) VALUES
('0063456701', '222310', 'Rizky Ramadhan', 3, 'L', NULL),
('0072345601', '232405', 'Budi Santoso', 2, 'L', NULL),
('0072345602', '232406', 'Siti Rahmawati', 2, 'P', NULL),
('00812341331', '242521', 'Dewi Lestaridd', 1, 'L', NULL),
('0081234501', '242501', 'Andi Pratama', 1, 'L', NULL),
('0081234502', '242502', 'Dewi Lestari', 1, 'P', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `fk_absensi_siswa` (`nisn`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `fk_siswa_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD CONSTRAINT `fk_absensi_siswa` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
