-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 03:37 AM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `ten` varchar(6) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ten`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hoatdong`
--

DROP TABLE IF EXISTS `hoatdong`;
CREATE TABLE `hoatdong` (
  `stt` int(11) NOT NULL,
  `manv` varchar(6) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `masach` varchar(6) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `kieu` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `giatri` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hoatdong`
--

INSERT INTO `hoatdong` (`stt`, `manv`, `masach`, `kieu`, `giatri`) VALUES
(1, 'nv1234', 'ms3981', 'Thêm', ''),
(2, 'nv1234', 'ms3981', 'Thay đổi', ''),
(5, 'nv1234', 'ms8213', 'Xóa', ''),
(6, 'nv1234', 'ms3012', 'Thêm', ''),
(7, 'nv1234', 'ms4918', 'Thay đổi', ''),
(8, 'nv1234', 'ms6381', 'Thêm', ''),
(9, 'nv1234', 'ms4918', 'Xóa', ''),
(10, 'nv8291', 'ms6381', 'Thay đổi', ''),
(11, 'nv8291', 'ms6381', 'Xóa', ''),
(13, 'nv7923', 'ms6821', 'Thêm', ''),
(14, 'nv7923', 'ms3790', 'Xóa', ''),
(16, 'nv7621', 'ms4628', 'Thay đổi', ''),
(17, 'nv1234', 'ms4271', 'Thay đổi', ''),
(18, 'nv1234', 'ms4271', 'Thay đổi', '');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang` (
  `stt` int(11) NOT NULL,
  `taikhoan` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `matkhau` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `hoten` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `mua` varchar(8) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `gioitinh` varchar(5) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`stt`, `taikhoan`, `matkhau`, `hoten`, `sdt`, `mua`, `diachi`, `gioitinh`) VALUES
(1, 'kh7281', '123', 'Trần A', '0391827482', '0', 'Hoàng Mai', 'Nam'),
(2, 'kh2718', '123', 'Trần Đăng', '0983726182', '0', 'Long Biên', 'Nữ'),
(6, 'kh1234', '123', 'Trấn Thành', '09281726', '', 'Hà Nội', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `muasach`
--

DROP TABLE IF EXISTS `muasach`;
CREATE TABLE `muasach` (
  `stt` int(11) NOT NULL,
  `taikhoan` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `masach` varchar(6) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `soluong` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tien` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `muasach`
--

INSERT INTO `muasach` (`stt`, `taikhoan`, `masach`, `soluong`, `tien`) VALUES
(3, 'kh2718', 'ms2139', '10', '625000'),
(4, 'kh7281', 'ms6821', '18', '2419200'),
(5, 'kh7281', 'ms4628', '18', '1260000'),
(6, 'kh1234', 'ms4271', '50', '1025000'),
(7, 'kh1234', 'ms2139', '80', '5000000'),
(15, 'kh7281', 'ms2139', '1', '62500');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE `nhanvien` (
  `stt` int(11) NOT NULL,
  `manv` varchar(6) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `hoten` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(10) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `pass` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `diachi` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`stt`, `manv`, `hoten`, `sdt`, `pass`, `diachi`) VALUES
(1, 'nv8291', 'Ngọc Trinh', '0362718472', '12345', 'Đà Nẵng'),
(3, 'nv2468', 'Phạm Hằng', '0931824295', '123456', 'Nam Định'),
(12, 'nv7923', 'Hoàng', '0937192649', '11234', 'Hồ Chí Minh'),
(14, 'nv5832', 'Bích Phương', '09886842', '11234', 'Việt Nam'),
(15, 'nv7621', 'Độ Mixi', '037129394', 'nv7621', 'Hà Nội'),
(18, 'nv1234', 'Con Mòe', '095743647', '123456', 'Hạ Long');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

DROP TABLE IF EXISTS `sach`;
CREATE TABLE `sach` (
  `stt` int(11) NOT NULL,
  `masach` varchar(6) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tensach` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `tacgia` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `dongia` int(11) DEFAULT NULL,
  `soluong` smallint(6) DEFAULT NULL,
  `theloai` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`stt`, `masach`, `tensach`, `tacgia`, `dongia`, `soluong`, `theloai`, `anh`) VALUES
(12, 'ms6821', 'Cuốn sách khổng lồ về các thí nghiệm khoa học', 'Alastair Smith', 134400, 100, 'Khoa Học', 'cuon_sach_ve_cac_thi_nghiem_khoa_hoc__tb_9-2019__1421d00a68bd443cae39c92fef8f4413_master.jpg'),
(13, 'ms4628', 'Vật Lí 12', 'Nhiều tác giả', 70000, 250, 'Sách giáo khoa', '4dfa33da46dd8d6283b416662c684e2b.jpg'),
(14, 'ms4271', 'Doremon', 'Fujiko F Fujio', 30500, 120, 'Truyện Tranh', 'doc_truyen_tranh_doremon_chap_36_nghe_thuat_lam_truyen_tranh_001.jpg'),
(43, 'ms3226', 'Toán 8', 'Nhiều tác giả', 21000, 81, 'Sách giáo khoa', '2477486428945_s_01.d20171009.t172708.945854.jpg'),
(44, 'ms3418', 'Xuyên vào sách toán học', 'Someone', 110000, 88, 'Toán học', 'img_9801.jpg'),
(45, 'ms1393', 'Làm Đ*', 'Vũ Trọng Phụng', 210000, 81, 'Văn Học', 'vh-vtp-lam-di.jpg'),
(46, 'ms5441', 'Tắt Đèn', 'Ngô Tất Tố ', 654345, 80, 'Văn Học', 'images.jpg'),
(48, 'ms9319', 'Van Hoc', 'A', 201933, 20, 'Văn Học', 'tac-pham-van-hoc-la-gi2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ten`);

--
-- Indexes for table `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `muasach`
--
ALTER TABLE `muasach`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`stt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoatdong`
--
ALTER TABLE `hoatdong`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `muasach`
--
ALTER TABLE `muasach`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
