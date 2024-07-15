-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2024 at 11:40 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duanmau`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_binh_luan` int(10) NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngay_dang` date NOT NULL,
  `ma_hang_hoa` int(10) DEFAULT NULL,
  `ma_khach_hang` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hang_hoa` int(10) NOT NULL,
  `ten_hang_hoa` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh_nen` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh_1` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh_2` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `don_gia` float NOT NULL,
  `muc_giam_gia` int(5) DEFAULT NULL,
  `ma_loai_hang` int(11) DEFAULT NULL,
  `mo_ta_hang_hoa` text COLLATE utf8_unicode_ci NOT NULL,
  `so_luot_xem` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hang_hoa`, `ten_hang_hoa`, `hinh_anh`, `hinh_anh_nen`, `hinh_anh_1`, `hinh_anh_2`, `don_gia`, `muc_giam_gia`, `ma_loai_hang`, `mo_ta_hang_hoa`, `so_luot_xem`) VALUES
(1, 'Bliss Dress - Đầm Xòe Dạo Phố', '/DuAnMau/content/images/image1.1.webp', '/DuAnMau/content/images/image1.2.webp', '/DuAnMau/content/images/image1.3.webp', '/DuAnMau/content/images/image1.4.webp', 2000000, 50, 1, 'Nhẹ nhàng, mềm mại trong thiết kế đầm hoa yêu kiều. Đầm cổ thuyền, có độ dài qua gối cùng kiểu dáng chữ A quen thuộc, khéo léo tôn lên nét đẹp dịu dàng của người mặc. Thiết kế tạo điểm nhấn thắt đai ngang eo, giúp che khuyết điểm tốt.', 11),
(2, 'Camellia Midi - Đầm Lụa Phối Hoa', '/DuAnMau/content/images/image2.1.webp', '/DuAnMau/content/images/image2.2.webp', '/DuAnMau/content/images/image2.3.webp', '/DuAnMau/content/images/image2.4.webp', 100000, NULL, 1, 'hi', 13),
(3, 'Đầm Cổ Chéo Xếp Ly', '/DuAnMau/content/images/image3.1.webp', '/DuAnMau/content/images/image3.2.webp', '/DuAnMau/content/images/image3.3.webp', '/DuAnMau/content/images/image3.4.webp', 300000, 10, 1, 'met', 7),
(4, 'Đầm Lụa Trễ Vai Chun Eo Xòe', '/DuAnMau/content/images/image4.1.webp', '/DuAnMau/content/images/image4.2.webp', '/DuAnMau/content/images/image4.3.webp', '/DuAnMau/content/images/image4.4.webp', 10000000, 90, 1, 'hiii', 7),
(7, 'Blue SEA Dress - Đầm Maxi Họa Tiết', '/DuAnMau/content/images/17209879711.webp', '/DuAnMau/content/images/17209879712.webp', '/DuAnMau/content/images/17209948853.webp', '/DuAnMau/content/images/17209879714.webp', 2000000, 50, 1, 'đẹp', 10);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_khach_hang` int(10) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kich_hoat` bit(1) NOT NULL DEFAULT b'1',
  `vai_tro` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_khach_hang`, `email`, `so_dien_thoai`, `mat_khau`, `ho_ten`, `hinh_anh`, `kich_hoat`, `vai_tro`) VALUES
(1, 'admin@gmail.com', '1505', '123', 'admin', NULL, b'1', b'1'),
(21, 'congtdph52792@gmail.com', '0972964795', '123', 'Nguyễn Văn A', '/DuAnMau/content/images/17209917492.jpg', b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `loai_hang`
--

CREATE TABLE `loai_hang` (
  `ma_loai_hang` int(10) NOT NULL,
  `ten_loai_hang` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai_hang`
--

INSERT INTO `loai_hang` (`ma_loai_hang`, `ten_loai_hang`) VALUES
(1, 'IVY moda'),
(89, 'IVY kids');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_binh_luan`),
  ADD KEY `ma_hang_hoa` (`ma_hang_hoa`),
  ADD KEY `ma_khach_hang` (`ma_khach_hang`);

--
-- Indexes for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hang_hoa`),
  ADD KEY `ma_loai` (`ma_loai_hang`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_khach_hang`);

--
-- Indexes for table `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`ma_loai_hang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_binh_luan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hang_hoa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_khach_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `ma_loai_hang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_hang_hoa`) REFERENCES `hang_hoa` (`ma_hang_hoa`);

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai_hang`) REFERENCES `loai_hang` (`ma_loai_hang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
