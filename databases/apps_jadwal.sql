-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 01:29 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apps_jadwal`
--

-- --------------------------------------------------------

--
-- Table structure for table `alarm`
--

CREATE TABLE IF NOT EXISTS `alarm` (
  `id_alarm` int(5) NOT NULL AUTO_INCREMENT,
  `topik` text NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `id_nada` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_alarm`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `kode_guru` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `mapel` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `nama`, `mapel`, `foto`) VALUES
(0, '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jumat`
--

CREATE TABLE IF NOT EXISTS `jumat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_guru` varchar(11) NOT NULL,
  `waktu_awal` varchar(11) NOT NULL,
  `waktu_akhir` varchar(11) NOT NULL,
  `jam_ke` varchar(11) NOT NULL,
  `kelas_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kamis`
--

CREATE TABLE IF NOT EXISTS `kamis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_guru` varchar(11) NOT NULL,
  `waktu_awal` varchar(11) NOT NULL,
  `waktu_akhir` varchar(11) NOT NULL,
  `jam_ke` varchar(11) NOT NULL,
  `kelas_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `nama`) VALUES
(1, 'XII RPL D'),
(2, 'XII RPL A'),
(3, 'XII RPL C'),
(4, 'XII RPL B');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `blokir` int(11) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `user`, `pass`, `nama_lengkap`, `blokir`) VALUES
(1, 'admin', 'admin', 'Administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nada`
--

CREATE TABLE IF NOT EXISTS `nada` (
  `id_nada` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `nama_nada` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  PRIMARY KEY (`id_nada`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `kepala_sekolah` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_sekolah`, `alamat_sekolah`, `kepala_sekolah`, `foto`) VALUES
(1, 'SMK Negeri 1 Lemahsugih', 'Jln. Raya Padarek Kec. Lemahsugih - Majalengka 45465', 'Dr. Din Ahdin', '906250_foto.png');

-- --------------------------------------------------------

--
-- Table structure for table `rabu`
--

CREATE TABLE IF NOT EXISTS `rabu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_guru` varchar(11) NOT NULL,
  `waktu_awal` varchar(11) NOT NULL,
  `waktu_akhir` varchar(11) NOT NULL,
  `jam_ke` varchar(11) NOT NULL,
  `kelas_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sabtu`
--

CREATE TABLE IF NOT EXISTS `sabtu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_guru` varchar(11) NOT NULL,
  `waktu_awal` varchar(11) NOT NULL,
  `waktu_akhir` varchar(11) NOT NULL,
  `jam_ke` varchar(11) NOT NULL,
  `kelas_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `selasa`
--

CREATE TABLE IF NOT EXISTS `selasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_guru` varchar(11) NOT NULL,
  `waktu_awal` varchar(11) NOT NULL,
  `waktu_akhir` varchar(11) NOT NULL,
  `jam_ke` varchar(11) NOT NULL,
  `kelas_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `selasa`
--

INSERT INTO `selasa` (`id`, `kode_guru`, `waktu_awal`, `waktu_akhir`, `jam_ke`, `kelas_id`) VALUES
(5, '0', '09:40', '10:00', '-', '0');

-- --------------------------------------------------------

--
-- Table structure for table `senin`
--

CREATE TABLE IF NOT EXISTS `senin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_guru` varchar(11) NOT NULL,
  `waktu_awal` varchar(11) NOT NULL,
  `waktu_akhir` varchar(11) NOT NULL,
  `jam_ke` varchar(11) NOT NULL,
  `kelas_id` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE IF NOT EXISTS `waktu` (
  `id_waktu` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` varchar(10) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_waktu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
