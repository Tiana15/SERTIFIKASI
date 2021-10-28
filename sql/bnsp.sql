-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 02:28 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `kategori` enum('undangan','pengumuman','nota_dinas','pemberitahuan') NOT NULL,
  `judul` varchar(300) NOT NULL,
  `namaberkas` varchar(500) NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diedit_pada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `nomor_surat`, `kategori`, `judul`, `namaberkas`, `dibuat_pada`, `diedit_pada`) VALUES
(1, 'h', 'undangan', 'l', 'undangan_hari_guru_nasional_(HGN)_tahun_20214.pdf', '2021-10-28 11:02:11', '2021-10-28 11:02:11'),
(2, 'l', 'undangan', 'lo', 'undangan_hari_guru_nasional_(HGN)_tahun_20215.pdf', '2021-10-28 11:38:43', '2021-10-28 11:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status_account` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(500) NOT NULL,
  `level` enum('super_admin','admin') NOT NULL,
  `nim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `full_name`, `username`, `password`, `status_account`, `created_at`, `photo`, `level`, `nim`) VALUES
(1, 'Lusi Tiana Trisila', 'lusi', '$2y$10$8/3HAesCKz.Zzw8bHyniTeegF2OSL85Jlzvy7Z4FVPvswnvitdQ.a', 'active', '2021-10-24 17:00:00', 'WhatsApp_Image_2021-10-25_at_20_33_572.jpeg', 'admin', '1831710054_D3_18'),
(2, 'Syifa Ayunda', 'syifa', '$2y$10$8/3HAesCKz.Zzw8bHyniTeegF2OSL85Jlzvy7Z4FVPvswnvitdQ.a', 'active', '2021-10-25 05:24:25', 'logo-garuda-pancasila-warna.jpg', 'super_admin', 'ulvi.yulianti@gmail.com'),
(3, 'DWIYANTI 1', 'ulvi', '$2y$10$ZLR.AVzL6NbEPOyke6ddz.e.uQ3TvCdbwzvGIMdNL8jjG6PegRsQe', 'active', '2021-10-25 14:20:34', 'Me.jpeg', 'admin', 'ulvia1@gmail.com'),
(5, 'syifa', 'syifa', '$2y$10$8/3HAesCKz.Zzw8bHyniTeegF2OSL85Jlzvy7Z4FVPvswnvitdQ.a', 'active', '2021-10-25 05:21:57', '', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
