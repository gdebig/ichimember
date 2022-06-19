-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2022 at 04:36 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ichi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_datadiri`
--

DROP TABLE IF EXISTS `tbl_datadiri`;
CREATE TABLE IF NOT EXISTS `tbl_datadiri` (
  `diri_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tempatlahir` varchar(250) NOT NULL,
  `tanggallahir` varchar(15) NOT NULL,
  `gender` enum('laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `noktp` varchar(50) NOT NULL,
  `uploadktp` varchar(300) NOT NULL,
  `notelp` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `keahlian` text NOT NULL,
  `bagidata` enum('Ya','Tidak') NOT NULL,
  `tempatkerja` varchar(500) NOT NULL,
  `alamatkerja` text NOT NULL,
  `telpkerja` varchar(30) NOT NULL,
  `emailkerja` varchar(250) NOT NULL,
  `scholar_id` varchar(500) NOT NULL,
  `scopus_id` varchar(500) NOT NULL,
  `orcid_id` varchar(500) NOT NULL,
  `sinta_id` varchar(50) NOT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`diri_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dpr`
--

DROP TABLE IF EXISTS `tbl_dpr`;
CREATE TABLE IF NOT EXISTS `tbl_dpr` (
  `dpr_id` int(11) NOT NULL AUTO_INCREMENT,
  `kodedpr` varchar(4) NOT NULL,
  `dpr_nama` varchar(250) NOT NULL,
  `dpr_tingkat` enum('Pusat','Reg','Prov','Kab','Kec') NOT NULL,
  `nosk` varchar(250) NOT NULL,
  `file_sk` varchar(250) NOT NULL,
  `expired` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dpr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organisasi`
--

DROP TABLE IF EXISTS `tbl_organisasi`;
CREATE TABLE IF NOT EXISTS `tbl_organisasi` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `namaorganisasi` varchar(300) NOT NULL,
  `jabatan` varchar(300) NOT NULL,
  `thnawal` varchar(5) NOT NULL,
  `thnakhir` varchar(5) NOT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`org_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

DROP TABLE IF EXISTS `tbl_pekerjaan`;
CREATE TABLE IF NOT EXISTS `tbl_pekerjaan` (
  `kerja_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `namainstansi` varchar(300) NOT NULL,
  `jabatan` varchar(300) NOT NULL,
  `thnawal` varchar(5) NOT NULL,
  `thnakhir` varchar(5) NOT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kerja_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

DROP TABLE IF EXISTS `tbl_pendidikan`;
CREATE TABLE IF NOT EXISTS `tbl_pendidikan` (
  `pend_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `jenjang` enum('Diploma','Sarjana','Magister','Doktor','Profesi','Lain-lain','SD','SMP','SMU') NOT NULL,
  `namauniv` varchar(300) NOT NULL,
  `fakultas` varchar(300) NOT NULL,
  `jurusan` varchar(300) NOT NULL,
  `thnmasuk` varchar(5) NOT NULL,
  `thnlulus` varchar(5) NOT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengurus`
--

DROP TABLE IF EXISTS `tbl_pengurus`;
CREATE TABLE IF NOT EXISTS `tbl_pengurus` (
  `peng_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dpr_id` int(11) NOT NULL,
  `tingkat` enum('pusat','reg','kec') NOT NULL,
  `jabatan` enum('pembina','ahli','ketua','wakilketua','sekretaris','wakilsekretaris','bendahara','wakilbendahara','koordinator','wakilkoordinator','anggota') NOT NULL,
  `tahunawal` varchar(6) NOT NULL,
  `tahunakhir` varchar(6) NOT NULL,
  `jobdesc` text NOT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`peng_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_publikasi`
--

DROP TABLE IF EXISTS `tbl_publikasi`;
CREATE TABLE IF NOT EXISTS `tbl_publikasi` (
  `pub_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tipepublikasi` enum('Artikel','Makalah','Buku') NOT NULL,
  `judul` varchar(500) NOT NULL,
  `mediapublikasi` varchar(300) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `linkpub` text NOT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `dpr_id` int(5) NOT NULL,
  `kodeanggota` varchar(25) NOT NULL,
  `username` varchar(300) NOT NULL,
  `namalengkap` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL,
  `type` varchar(4) NOT NULL,
  `kehormatan` enum('ya','tidak') NOT NULL,
  `confirm` enum('ya','tidak') NOT NULL,
  `softdelete` enum('Tidak','Ya') NOT NULL,
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
