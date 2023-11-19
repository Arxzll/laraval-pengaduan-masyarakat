-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 08:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `telp`) VALUES
(1, '1', 'pikri', 'pikir hetset', 'pikri123', '08521'),
(2, '111', 'user1', 'user1', '$2y$10$8mWR..OBiXxgbHmOx2B9hOk4bCe8yyMA3xf9AGfTNL/gdx1Gzw2o.', '0555'),
(3, '1234', 'nopal', 'opal', 'opal gaming', '08922'),
(4, '213213', 'asdasd', 'asdasd', '$2y$10$IdT7FoAPAMDr1k4qncqm9emC1UN.O1moiNtGBvw3e5jEh1WCGr4PW', '213213'),
(5, '243534543', 'apa aja', 'Ari', 'Ari123', '0812'),
(6, '666', 'asd', 'asd', 'asd', '777'),
(7, '777', 'user2', 'user2', '$2y$10$4YEG6ty0QlSdx7TaBLAi8OxIs3TMJ1QmjliD1YLuBmu07Sogi/dZu', '077777'),
(8, '888888', 'user5', 'user5', '$2y$10$llGMIN2pLSoyBnF62YrrQOWQDV/VtGtw7qxLtFcbDCNraNRvOQUgW', '00001231438');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(62, '2023-11-11', '888888', 'adasbdfbb wscfvasdasd', '1699664445a.PNG', 'selesai'),
(63, '2023-11-14', '888888', 'agoy ganteng ah ah ah', '1699922015ibnu.jpg', 'selesai'),
(64, '2023-11-14', '888888', 'asdad', '1699922221a.PNG', 'ditolak'),
(65, '2023-11-14', '888888', 'test update', '1700371305anime-jojo-s-bizarre-adventure-giorno-giovanna-gyro-zeppeli-wallpaper-preview.jpg', 'selesai'),
(66, '2023-11-15', '111', 'zxZXzxzx', '', 'ditolak'),
(67, '2023-11-19', '888888', 'test 1', '1700371267a.PNG', 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(8, 'petugas nopal', 'ptgs1', '$2y$10$qGuiXVMkocAFnn3pCjVMOOaiJDKVOOI95iqwC1FOasatV4udDiSYy', '80934572', 'petugas'),
(10, 'admin3', 'admin3', '$2y$10$wms/S6qNWfWTvi60qWKj.OC9XtM3saXqTnDN/7UxXU3Mxn7.b8Tvi', '3454575563452', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(17, 62, '2023-11-11', 'asdasdasddadasd', 8),
(18, 62, '2023-11-11', 'asdasdasddadasd', 8),
(19, 62, '2023-11-14', 'anjay', 8),
(20, 63, '2023-11-14', 'bau', 8),
(21, 63, '2023-11-19', 'aaaaaaa', 8),
(22, 64, '2023-11-19', 'bbbbbb', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
