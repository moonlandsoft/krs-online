-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2015 at 03:46 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kuliah_pbw_krs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `npk` int(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `gelar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`npk`, `nama`, `alamat`, `jenis_kelamin`, `gelar`) VALUES
(10651010, 'HARDIAN OKTAVIANTO', 'JEMBER', 'Laki-laki', 'S.Si'),
(10651015, 'YENI DWI RAHAYU', 'JEMBER', 'Perempuan', 'M.KOM'),
(10651025, 'VICTOR WAHANGGARA', 'JEMBER', 'Laki-laki', 'S.KOM'),
(10651030, 'MUDAFIQ RIYAN PRATAMA', 'JEMBER', 'Laki-laki', 'S.KOM'),
(10651035, 'LUTFI ALI MUHAROM', 'JEMBER', 'Laki-laki', 'S.Si');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_matakuliah`
--

CREATE TABLE IF NOT EXISTS `dosen_matakuliah` (
`id` int(10) NOT NULL,
  `dosen_npk` int(12) NOT NULL,
  `matakuliah_kode` varchar(10) NOT NULL,
  `tahun_ajaran` int(5) NOT NULL,
  `jumlah_maksimal` int(2) NOT NULL,
  `join` int(2) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_matakuliah`
--

INSERT INTO `dosen_matakuliah` (`id`, `dosen_npk`, `matakuliah_kode`, `tahun_ajaran`, `jumlah_maksimal`, `join`) VALUES
(6, 10651030, 'TI023', 20151, 30, 1),
(7, 10651030, 'TI022', 20151, 30, 0),
(8, 10651015, 'TI006', 20151, 30, 1),
(9, 10651015, 'TI007', 20151, 30, 1),
(10, 10651010, 'TI008', 20151, 30, 0),
(11, 10651035, 'TI009', 20151, 30, 0),
(12, 10651035, 'TI010', 20151, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_prodi`
--

CREATE TABLE IF NOT EXISTS `dosen_prodi` (
`id` int(10) NOT NULL,
  `dosen_npk` int(12) NOT NULL,
  `prodi_kode` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_prodi`
--

INSERT INTO `dosen_prodi` (`id`, `dosen_npk`, `prodi_kode`) VALUES
(1, 10651030, 1065),
(3, 10651010, 1065),
(4, 10651025, 1065),
(5, 10651035, 1065),
(6, 10651015, 1065);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_wali`
--

CREATE TABLE IF NOT EXISTS `dosen_wali` (
`id` bigint(20) NOT NULL,
  `dosen_npk` int(12) NOT NULL,
  `mahasiswa_nim` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_wali`
--

INSERT INTO `dosen_wali` (`id`, `dosen_npk`, `mahasiswa_nim`) VALUES
(1, 10651010, 1410651040),
(2, 10651010, 1410651076),
(3, 10651015, 1410651077),
(4, 10651015, 1410651183);

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE IF NOT EXISTS `krs` (
`id` bigint(20) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `dosen_mk_id` varchar(10) NOT NULL,
  `tahun_ajaran` int(5) NOT NULL,
  `accept` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `nim`, `dosen_mk_id`, `tahun_ajaran`, `accept`) VALUES
(1, '1410651077', '7', 20151, 1),
(3, '1410651077', '6', 20151, 1),
(7, '1410651183', '8', 20151, 0),
(8, '1410651040', '6', 20151, 0),
(9, '1410651040', '9', 20151, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` int(10) NOT NULL,
  `prodi_kode` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tahun_masuk` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `prodi_kode`, `nama`, `alamat`, `telepon`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `tahun_masuk`) VALUES
(1410651040, 1065, 'MOH KHOIRUL ANAM', 'Bondowoso', '082323537668', 'Bondowoso', '1995-02-12', 'ISLAM', 'Laki-laki', 2014),
(1410651076, 1065, 'Achmad Rizky Hardiansyah', 'LUMAJANG', '08737463743', 'LUmaJang', '2015-06-01', 'ISLAM', 'Laki-laki', 2014),
(1410651077, 1065, 'Fauzi Maghfiroh Muslim', 'Banyuwangi', '0863476343', 'Banyuwangi', '2015-06-01', 'ISLAM', 'Laki-laki', 2014),
(1410651183, 1065, 'Nur Fawaid', 'Goa Goa', '0892874234', 'Tak etemmoh', '1995-05-30', 'ISLAM', 'Laki-laki', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sks` int(1) NOT NULL,
  `singkatan` varchar(20) DEFAULT NULL,
  `semester` int(2) NOT NULL,
  `prodi_kode` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode`, `nama`, `sks`, `singkatan`, `semester`, `prodi_kode`) VALUES
('TI006', 'ALGORITMA DAN STRUKTUR DATA', 3, 'ALGODAT', 2, 1065),
('TI007', 'PRAKTIKUM ALGORITMA DAN STRUKTUR DATA', 1, 'Prak ALGODAT', 2, 1065),
('TI008', 'MATEMATIKA DISKRIT', 3, 'MATDIS', 2, 1065),
('TI009', 'SISTEM OPERASI', 3, 'SO', 2, 1065),
('TI010', 'PRAKTIKUM SISTEM OPERASI', 1, 'PSO', 2, 1065),
('TI011', 'BASIS DATA', 3, 'BD', 2, 1065),
('TI012', 'PRAKTIKUM BASIS DATA', 1, 'PBD', 2, 1065),
('TI022', 'PEMROGRAMAN WEB', 3, 'PBW', 4, 1065),
('TI023', 'PRAKTIKUM PEMROGRAMAN WEB', 1, 'Prak PBW', 4, 1065);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `kode` int(4) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode`, `nama`) VALUES
(1065, 'TEKNIK INFORMATIKA');

-- --------------------------------------------------------

--
-- Table structure for table `sks`
--

CREATE TABLE IF NOT EXISTS `sks` (
`id` bigint(20) NOT NULL,
  `mahasiswa_nim` int(10) NOT NULL,
  `jumlah_sks` int(2) NOT NULL,
  `tahun_ajaran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('admin','dosen','mahasiswa') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'HARDIAN OKTAVIANTO', '10651010', '4c66ac3d337fcd8ebf05d22cb29325a3', 'dosen'),
(3, 'YENI DWI RAHAYU', '10651015', 'e8de8c646e8f7380dbfcbb399aeec023', 'dosen'),
(4, 'VICTOR WAHANGGARA', '10651025', '1917f6421f89a97eed7ca36c9d06d8eb', 'dosen'),
(5, 'MUDAFIQ RIYAN PRATAMA', '10651030', 'e3afb8fc95d1f838ac8873d658651f28', 'dosen'),
(6, 'LUTFI ALI MUHAROM', '10651035', '76b99c52a365094ed6ca3707a6dbf668', 'dosen'),
(7, 'MOH KHOIRUL ANAM', '1410651040', '9279ec34818192f7d79ccd0de3cfae2f', 'mahasiswa'),
(8, 'Achmad Rizky Hardiansyah', '1410651076', '0033c5562f0fe510aa67e43747925f4e', 'mahasiswa'),
(9, 'Fauzi Maghfiroh Muslim', '1410651077', '0033c5562f0fe510aa67e43747925f4e', 'mahasiswa'),
(10, 'Nur Fawaid', '1410651183', 'fe55a1f2beae68492fa1669294b3a90c', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`npk`);

--
-- Indexes for table `dosen_matakuliah`
--
ALTER TABLE `dosen_matakuliah`
 ADD PRIMARY KEY (`id`), ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indexes for table `dosen_prodi`
--
ALTER TABLE `dosen_prodi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen_wali`
--
ALTER TABLE `dosen_wali`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`nim`), ADD KEY `prodi_kode` (`prodi_kode`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `sks`
--
ALTER TABLE `sks`
 ADD PRIMARY KEY (`id`), ADD KEY `mahasiswa_nim` (`mahasiswa_nim`,`tahun_ajaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen_matakuliah`
--
ALTER TABLE `dosen_matakuliah`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dosen_prodi`
--
ALTER TABLE `dosen_prodi`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dosen_wali`
--
ALTER TABLE `dosen_wali`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sks`
--
ALTER TABLE `sks`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
