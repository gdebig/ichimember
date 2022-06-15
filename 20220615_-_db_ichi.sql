-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2022 at 01:31 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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
  `dpr_id` int(11) NOT NULL,
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
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`diri_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_datadiri`
--

INSERT INTO `tbl_datadiri` (`diri_id`, `user_id`, `dpr_id`, `tempatlahir`, `tanggallahir`, `gender`, `alamat`, `noktp`, `uploadktp`, `notelp`, `email`, `foto`, `keahlian`, `bagidata`, `tempatkerja`, `alamatkerja`, `telpkerja`, `emailkerja`, `datecreated`, `datemodified`) VALUES
(1, 1, 0, 'Jakarta', '1982-10-07', 'laki', 'Bella Casa Residence Cluster Alamanda Blok A12 no 9, Jl. Tole Iskandar', '3276060710820008', '1_ktp.jpg', '081558805505', 'gdebig@gmail.com', '1_photopics.jpg', 'Machine Learning, Programming, Networking', 'Tidak', 'Fakultas Teknik', 'Kampus UI Depok', '02177834328', 'i.gde@ui.ac.id', '2022-06-05 17:00:00', '2022-06-05 17:00:00');

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
  `datecreated` timestamp NULL DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dpr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dpr`
--

INSERT INTO `tbl_dpr` (`dpr_id`, `kodedpr`, `dpr_nama`, `dpr_tingkat`, `nosk`, `file_sk`, `expired`, `datecreated`, `datemodified`) VALUES
(1, '01', 'Dewan Pengurus Pusat', 'Pusat', '01', '', '2023-06-09', '2022-06-09 17:00:00', '2022-06-11 00:39:08'),
(3, '02', 'Dewan Pimpinan Regional Sumatra Bagian Utara', 'Reg', '02', '', '2023-06-09', '2022-06-09 17:00:00', '2022-06-11 00:40:36'),
(4, '03', 'Dewan Pimpinan Regional Sumatra Bagian Selatan', 'Reg', '03', '', '2023-06-09', '2022-06-09 17:00:00', '2022-06-11 00:41:20'),
(5, '04', 'Dewan Pimpinan Regional Jawa Barat', 'Reg', '04', '', '2023-06-09', '2022-06-09 17:00:00', '2022-06-11 00:41:51'),
(6, '05', 'Dewan Pimpinan Regional Jawa Barat', 'Reg', '05', '', '2023-06-09', '2022-06-09 17:00:00', '2022-06-11 00:42:24'),
(7, '06', 'Dewan Pimpinan Regional Kalimantan Tengah', 'Reg', '06', '', '2022-06-11', '2022-06-09 17:00:00', '2022-06-11 00:42:47');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_organisasi`
--

INSERT INTO `tbl_organisasi` (`org_id`, `user_id`, `namaorganisasi`, `jabatan`, `thnawal`, `thnakhir`, `datecreated`, `datemodified`) VALUES
(2, 1, 'KMHD UI', 'Anggota', '2000', '2010', '2022-06-07 17:00:00', '2022-06-08 21:59:12');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`kerja_id`, `user_id`, `namainstansi`, `jabatan`, `thnawal`, `thnakhir`, `datecreated`, `datemodified`) VALUES
(2, 1, 'Jasa Konsultan', 'Junior Consultant', '2006', '2006', '2022-06-06 17:00:00', '2022-06-08 00:27:51');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`pend_id`, `user_id`, `jenjang`, `namauniv`, `fakultas`, `jurusan`, `thnmasuk`, `thnlulus`, `datecreated`, `datemodified`) VALUES
(1, 1, 'SD', 'SD Negeri Inpres Kotaraja', '', '', '1991', '1997', '2022-06-06 17:00:00', '2022-06-07 22:29:24');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_publikasi`
--

INSERT INTO `tbl_publikasi` (`pub_id`, `user_id`, `tipepublikasi`, `judul`, `mediapublikasi`, `tahun`, `linkpub`, `datecreated`, `datemodified`) VALUES
(2, 1, 'Buku', 'Makalah AIP', 'Makalah AIP', '2022', 'https://journals.utm.my/aej/article/view/17340', '2022-06-08 17:00:00', '2022-06-09 05:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `kodeanggota`, `username`, `namalengkap`, `password`, `status`, `type`, `kehormatan`, `confirm`, `softdelete`, `datecreated`, `datemodified`) VALUES
(1, '', 'gdebig@gmail.com', 'I Gde Dharma Nugraha', '$2y$10$hH89Oy/AB1YHIT45dcLo4uNWb8sGtSkgi.2lEpI8vw/9zAF5qKkVK', 'aktif', 'nnny', 'tidak', 'tidak', 'Tidak', '2022-05-28 21:56:14', '2022-06-15 09:26:58'),
(2, '111111', 'admin@ichi.or.id', 'Super Administrator', '$2y$10$jd3XlBvax6vQCmNwA6jj1udOXIQc3bSUbz.0hJ1ugeyjhHYa3/y5q', 'aktif', 'yyyn', 'tidak', 'ya', 'Tidak', '2022-06-10 01:53:27', '2022-06-15 09:27:04'),
(4, '111234', 'testadmin@ichi.or.id', 'Admin Saja', '$2y$10$XBQtK6LyHH3xcWyWwdHlvO2aAdIW7yBoDdw/pKFGiOkN5we/srl.K', 'aktif', 'nyyn', 'tidak', 'ya', 'Tidak', '2022-06-14 17:00:00', '2022-06-15 09:27:10'),
(5, '123789', 'test@ichi.or.id', 'test saja', '$2y$10$mWezF6ppW1p7.1MGXCxH0erGLf/jByXSlLvKOs.Vx2qigmZOb0lWC', 'aktif', 'nnyn', 'tidak', 'ya', 'Ya', '2022-06-14 17:00:00', '2022-06-15 09:27:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
