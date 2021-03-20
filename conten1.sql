-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 07:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempolisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kode_user` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `username`, `password`, `nama_user`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'user1', 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id_testing` int(30) NOT NULL,
  `kehilangan_hp2` varchar(50) NOT NULL,
  `pembegalan2` varchar(50) NOT NULL,
  `curanmor2` varchar(50) NOT NULL,
  `pencopetan2` varchar(50) NOT NULL,
  `penipuan2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id_testing`, `kehilangan_hp2`, `pembegalan2`, `curanmor2`, `pencopetan2`, `penipuan2`) VALUES
(7, '21', '7', '6', '12', '8');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `no` int(30) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kehilangan_hp` varchar(50) NOT NULL,
  `pembegalan` varchar(50) NOT NULL,
  `curanmor` varchar(50) NOT NULL,
  `pencopetan` varchar(50) NOT NULL,
  `penipuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`no`, `bulan`, `lokasi`, `kehilangan_hp`, `pembegalan`, `curanmor`, `pencopetan`, `penipuan`) VALUES
(8, 'januari', 'Pusat', '20', '12', '6', '23', '17'),
(9, 'februari', 'Timur', '17', '10', '3', '17', '15'),
(10, 'maret', 'Barat', '7', '14', '8', '15', '14'),
(11, 'april', 'Utara', '5', '7', '12', '13', '12'),
(12, 'mei', 'Pusat', '3', '4', '21', '5', '16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id_testing`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `kode_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id_testing` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
