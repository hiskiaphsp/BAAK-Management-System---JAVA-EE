-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2023 at 01:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `id_users` int NOT NULL,
  `start_booking` datetime DEFAULT NULL,
  `close_booking` datetime DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_ruangan`, `id_users`, `start_booking`, `close_booking`, `status`, `keterangan`) VALUES
(13, 11, 10, '2023-12-15 10:30:00', '2023-12-15 12:00:00', 'Approve', 'yoloo'),
(14, 11, 10, '2023-12-15 13:30:00', '2023-12-15 14:00:00', 'Rejected', 'yoloo'),
(15, 11, 10, '2023-12-15 13:30:00', '2023-12-15 16:00:00', 'Rejected', 'yoloo'),
(16, 11, 10, '2023-12-11 18:52:00', '2023-12-12 16:52:00', 'Canceled', 'wrwerew'),
(17, 11, 10, '2023-12-11 15:55:00', '2023-12-12 15:55:00', 'Canceled', 'asdasda'),
(18, 11, 10, '2023-12-10 16:00:00', '2023-12-10 20:00:00', 'Canceled', 'sdadsd'),
(19, 11, 10, '2023-12-15 10:31:00', '2023-12-15 13:00:00', 'Canceled', 'yoloo'),
(20, 11, 10, '2023-12-15 10:31:00', '2023-12-15 13:00:00', 'Canceled', 'yoloo'),
(21, 11, 10, '2023-12-15 10:31:00', '2023-12-15 13:00:00', 'Approve', 'yoloo'),
(22, 11, 10, '2023-12-15 10:31:00', '2023-12-15 13:00:00', 'Rejected', 'yoloo'),
(23, 11, 10, '2023-12-15 10:32:00', '2023-12-15 13:00:00', 'Rejected', 'yoloo'),
(24, 11, 10, '2023-12-15 10:32:00', '2023-12-15 13:00:00', 'Approve', 'yoloo'),
(25, 11, 10, '2023-12-15 13:00:00', '2023-12-15 14:00:00', 'Rejected', 'yoloo'),
(26, 11, 10, '2023-12-11 15:59:00', '2023-12-11 22:00:00', 'Canceled', 'Untuk Aktivitas HIMATIF dalam perkumpulan untuk Tutotrial Besar'),
(27, 13, 13, '2024-01-15 05:10:00', '2024-01-16 04:11:00', 'Canceled', '000000');

-- --------------------------------------------------------

--
-- Table structure for table `izin_bermalam`
--

CREATE TABLE `izin_bermalam` (
  `id` int NOT NULL,
  `id_users` int DEFAULT NULL,
  `keterangan` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tujuan` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu_berangkat` datetime DEFAULT NULL,
  `waktu_kembali` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izin_bermalam`
--

INSERT INTO `izin_bermalam` (`id`, `id_users`, `keterangan`, `tujuan`, `waktu_berangkat`, `waktu_kembali`, `status`) VALUES
(1, 10, 'Bertemu Oramg Tua', 'Laguboti', '2023-12-06 14:47:21', '2023-12-07 14:47:21', 'Canceled'),
(2, 10, 'Pulang Kerumah', 'Laguboti', '2023-12-15 10:22:00', '2023-12-17 10:22:00', 'Approve'),
(3, 10, 'asdas', 'asdasd', '2023-12-10 11:05:00', '2023-12-12 11:05:00', 'Approve'),
(4, 10, 'Izin Ngurus KTM', 'adsad', '2023-12-12 11:10:00', '2023-12-15 11:10:00', 'Approve'),
(5, 10, 'dasdasd', 'asdsadsa', '2023-12-15 17:24:00', '2023-12-17 15:22:00', 'Rejected'),
(6, 13, 'Kembai ke rumah', 'Balige', '2023-12-15 17:34:00', '2023-12-17 18:39:00', 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `izin_keluar`
--

CREATE TABLE `izin_keluar` (
  `id` int NOT NULL,
  `id_users` int DEFAULT NULL,
  `keterangan` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu_berangkat` datetime DEFAULT NULL,
  `waktu_kembali` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izin_keluar`
--

INSERT INTO `izin_keluar` (`id`, `id_users`, `keterangan`, `waktu_berangkat`, `waktu_kembali`, `status`) VALUES
(1, 10, 'Ngurus ATM', '2023-12-06 14:47:21', '2023-12-07 14:47:21', 'Canceled'),
(2, 10, 'Ngurus ATM', '2023-12-06 14:47:21', '2023-12-07 14:47:21', 'Approve'),
(3, 10, 'Izin Ngurus KTM', '2023-12-09 22:19:00', '2023-12-10 22:23:00', 'Pending'),
(4, 10, 'Izin Ngurus KTM', '2023-12-09 22:19:00', '2023-12-10 22:23:00', 'Pending'),
(5, 10, 'sdsdasdas', '2023-12-09 22:25:00', '2023-12-08 22:25:00', 'Rejected'),
(6, 13, 'Perbaiki ATM', '2023-12-15 04:45:00', '2023-12-15 11:43:00', 'Canceled'),
(7, 13, 'Perbaiki ATM', '2023-12-15 04:45:00', '2023-12-15 11:43:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int NOT NULL,
  `id_kaos` int DEFAULT NULL,
  `id_users` int DEFAULT NULL,
  `jenis_pembayaran` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nominal_pembayaran` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_kaos`, `id_users`, `jenis_pembayaran`, `nominal_pembayaran`) VALUES
(2, 2, 10, 'DANA', 150000),
(3, 2, 10, 'DANA', 150000),
(4, 2, 13, 'DANA', 150000),
(5, 2, 13, 'Mandiri', 150000),
(6, 5, 13, 'BNI', 100);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `ukuran` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga` bigint DEFAULT NULL,
  `keterangan` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `ukuran`, `harga`, `keterangan`) VALUES
(2, 'XL', 150000, 'test'),
(5, 'XXL', 100, '20'),
(7, 'L', 1000, 'Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int NOT NULL,
  `nama_ruangan` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_ruangan` varchar(250) COLLATE utf8mb4_general_ci DEFAULT 'Avaiable',
  `kapasitas` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`, `status_ruangan`, `kapasitas`) VALUES
(11, 'Auditorium', 'Available', '900'),
(13, 'Lapangan Hijau', 'Available', '8000'),
(15, 'Ruang Diskusi', 'Available', '100');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int NOT NULL,
  `id_users` int DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan_surat` text COLLATE utf8mb4_general_ci,
  `nama_surat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `id_users`, `topic`, `keterangan_surat`, `nama_surat`, `status`) VALUES
(2, 10, 'Surat Pengunduran Diri', 'test', NULL, 'Approve'),
(3, 10, 'Surat Pengunduran Diri', 'test]', NULL, 'Rejected'),
(4, 10, 'Surat Pengunduran Diri', 'test', NULL, 'Rejected'),
(5, 10, 'Surat Pengunduran Diri', 'test', NULL, 'Rejected'),
(6, 10, 'Surat Pengunduran Diri', 'test', '1156347518.xlsx', 'Approve'),
(7, 10, 'Permintaan Surat Pengunduran Diri', 'test', 'surat_mahasiswa_6577d324c30e1.pdf', 'Approve'),
(8, 13, 'Surat Keterangan Mahasiswa', 'Surat aja', NULL, 'Approve'),
(9, 14, 'Surat Keterangan Mahasiswa', 'Surat', NULL, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `roles` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `Nomor_KTP` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NIM` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nama_Lengkap` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nomor_Handphone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roles`, `Nomor_KTP`, `NIM`, `Nama_Lengkap`, `Nomor_Handphone`, `token`) VALUES
(5, 'admin1212', '$2a$10$C7CCEPSfxo7I3jpgFWL8fOvUrgZARb.N29Rdoo/nq3pDs1HcWuUDO', 'Admin', '1234567890', NULL, 'John Doe', '081234567890', NULL),
(6, 'admin', '$2a$10$TSS37qfSwy.EbLFpcX0QaujhlSmMTJ43jkuuQyOOTADo4k47gbvx.', 'Admin', NULL, '987654321', 'Test', NULL, 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJqb2huX2RvZTEyM2RzIiwiZXhwIjoxNzAzMTY5NDk4LCJpYXQiOjE3MDI1NjQ2OTh9.1QcTJoGWfzcxP8s_nHiIR-ppgEiCLH4UGhwEjhChab0'),
(7, 'admin123', '$2a$10$AaonkWthp0O3DeTIEvzJyOqGlw1GyPKjA3PuM/PDsMCihLzY9PeVO', 'Admin', '1234567890', '987654321', 'admin', '081234567890', NULL),
(9, 'adfda', '$2a$10$KBfTHIY2HIuRxtRcJ9JxNu1G9WXmZ29./osOfNj5SmOYVJOafANGa', 'Mahasiswa', '12345678922230', '987654321', 'admin123', '081234567890', NULL),
(10, 'if321034', '$2a$10$Z0p6qzFcDLmjjN1DUJOl2exxcX7M7AP/LsjNraGFey4d92pCwpwiC', 'Mahasiswa', '12345678922230', '987654321', 'admin', '081234567890', NULL),
(12, 'adfadf', '$2a$10$YG61JsYTFvderYAx/aZPCOp5gl4uVKOFw0NFhgCrvWpLCkBy0hyCG', 'Mahasiswa', '4343', '987654321', 'klkl', '4343', NULL),
(13, 'hiskia', '$2a$10$TSS37qfSwy.EbLFpcX0QaujhlSmMTJ43jkuuQyOOTADo4k47gbvx.', 'Mahasiswa', '4343', '10910910', 'fdafda', '4343', NULL),
(14, 'hiskiaphsp', '$2a$10$TSS37qfSwy.EbLFpcX0QaujhlSmMTJ43jkuuQyOOTADo4k47gbvx.', 'Admin', '9302903290', '11321013', 'kia', '087890782107', 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJoaXNraWFwaHNwIiwiZXhwIjoxNzAzMjA4MDYyLCJpYXQiOjE3MDI2MDMyNjJ9.v4-V9TypnmaygtxQtBoIf-LCcjTSiCG6vo7h5krlkAA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `izin_bermalam`
--
ALTER TABLE `izin_bermalam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `izin_keluar`
--
ALTER TABLE `izin_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kaos` (`id_kaos`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `izin_bermalam`
--
ALTER TABLE `izin_bermalam`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `izin_keluar`
--
ALTER TABLE `izin_keluar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `izin_bermalam`
--
ALTER TABLE `izin_bermalam`
  ADD CONSTRAINT `izin_bermalam_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `izin_keluar`
--
ALTER TABLE `izin_keluar`
  ADD CONSTRAINT `izin_keluar_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_kaos`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
