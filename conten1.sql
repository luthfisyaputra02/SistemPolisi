-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2020 pada 00.33
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `conten1`
--
CREATE DATABASE IF NOT EXISTS `conten1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `conten1`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `kode_user` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `username`, `password`, `nama_user`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'user1', 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testing`
--

CREATE TABLE IF NOT EXISTS `testing` (
  `no` int(30) NOT NULL AUTO_INCREMENT,
  `bulan2` int(50) NOT NULL,
  `lokasi2` varchar(50) NOT NULL,
  `kehilangan_hp2` varchar(50) NOT NULL,
  `pembegalan2` varchar(50) NOT NULL,
  `curanmor2` varchar(50) NOT NULL,
  `pencopetan2` varchar(50) NOT NULL,
  `penipuan2` varchar(50) NOT NULL,
  `kesimpulan2` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `testing`
--

INSERT INTO `testing` (`no2`,`bulan2`,`lokasi2`, `kehilangan_hp2`, `pembegalan2`, `curanmor2`, `pencopetan2`, `penipuan2`,`kesimpulan2`) VALUES
(5, '12', '4', '5', '3', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

CREATE TABLE IF NOT EXISTS `training` (
  `no` int(30) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kehilangan_hp` varchar(50) NOT NULL,
  `pembegalan` varchar(50) NOT NULL,
  `curanmor` varchar(50) NOT NULL,
  `pencopetan` varchar(50) NOT NULL,
  `penipuan` varchar(50) NOT NULL,
  `kesimpulan` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`no`,`bulan`,`lokasi`,`kehilangan_hp`, `pembegalan`, `curanmor`, `pencopetan`, `penipuan`, `kesimpulan`) VALUES
(1, 12, '231', '23', '32', '53', 'Lulus'),
(2, 13, '12', '2', '2', '2', 'Tidak Lulus'),
(3, 43, '7', '7', '7', '7', 'Tidak Lulus');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
