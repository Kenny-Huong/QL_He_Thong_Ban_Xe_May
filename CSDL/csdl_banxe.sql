-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 08:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdl_banxe`
--

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `soluongdat` int(11) NOT NULL,
  `tongtien` bigint(20) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `ghichu` text DEFAULT NULL,
  `tenkh` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `tensp`, `soluongdat`, `tongtien`, `sdt`, `hoten`, `email`, `diachi`, `ghichu`, `tenkh`, `created_at`) VALUES
(27, 'Vespa GTS 150 ABS', 1, 126500000, '0966523444', 'Hoàng Thị Linh', 'htlinh1@gmail.com', 'Hà Nội', 'Ship đúng đơn', 'hoangthilinh1', '2024-11-02 17:51:38'),
(28, 'Super Cub 2025', 1, 86292000, '0972221972', 'Lê Hoài Khiêm', 'khiemletn612@gmail.com', 'Thái Nguyên', 'Ship đúng số lượng.', 'lehoaikhiem', '2024-11-02 18:46:42'),
(29, 'Elegant 50', 2, 33400000, '0972221972', 'Lê Hoài Khiêm', 'khiemletn612@gmail.com', 'Thái Nguyên', 'Ship đúng số lượng.', 'lehoaikhiem', '2024-11-02 18:46:42'),
(30, 'GD110', 1, 28490000, '0972221972', 'Lê Hoài Khiêm', 'khiemletn612@gmail.com', 'Thái Nguyên', 'Ship đúng số lượng.', 'lehoaikhiem', '2024-11-02 18:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `giohang_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `tensp` varchar(255) DEFAULT NULL,
  `gia` bigint(20) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` bigint(20) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`giohang_id`, `id`, `hinhanh`, `tensp`, `gia`, `soluong`, `tongtien`, `tenkh`, `created_at`) VALUES
(11, 1, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1680512879-86024cad1e83101d97359d7351051156-493-1.gif', 'Vario 160', 59990000, 1, 59990000, 'hoangthilinh1', '2024-11-02 17:52:05'),
(12, 24, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1670484333-86024cad1e83101d97359d7351051156-278-1.png', 'Vespa GTS 300 ABS', 155400000, 1, 155400000, 'hoangthilinh1', '2024-11-02 17:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `tenhang` varchar(30) NOT NULL,
  `logo` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`tenhang`, `logo`) VALUES
('HONDA', '../HINH/LOGO/HONDA.png'),
('PIAGGIO', '../HINH/LOGO/PIAGGIO.png'),
('SUZUKI', '../HINH/LOGO/SUZUKI.png'),
('SYM', '../HINH/LOGO/SYM.png'),
('YAMAHA', '../HINH/LOGO/YAMAHA.png');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sodienthoai` varchar(20) DEFAULT NULL,
  `noidung` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `hovaten`, `email`, `sodienthoai`, `noidung`, `created_at`) VALUES
(1, 'Khieêm lê', 'khiemletn612@gmail.com', NULL, 'Rất tốt', '2024-10-27 09:07:43'),
(2, 'Khieêm lê', 'khiemletn612@gmail.com', NULL, 'Rất tốt', '2024-10-27 09:10:26'),
(3, 'Nguyễn Văn A', 'nguyenvana@gmail.com', NULL, 'Trang web hơi xấu', '2024-10-27 09:16:56'),
(4, 'Hướng Phan Đình', 'huonghihi@gmail.com', NULL, 'hihihi', '2024-10-27 10:30:01'),
(5, 'Lê Hoài Khiêm', 'sdgwgwe@gmail.com', '0987666123', 'Rất tốt', '2024-10-28 10:20:39'),
(6, 'Lê Hoài Khiêm', 'sdgwgwe@gmail.com', '0987666321', 'Rất tốt', '2024-10-28 10:37:51'),
(7, 'Lê Hoài Khiêm', 'sdgwgwe@gmail.com', '123456', 'Rất tốt', '2024-10-28 19:25:05'),
(8, 'Lê Hoài Khiêm', 'khiemletn612@gmail.com', '0987666123443423', 'Rất tốt', '2024-10-28 19:30:17'),
(9, 'Lê Hoài Khiêm', 'khiemletn612@gmail.com', '0987666123443423', 'Rất tốt', '2024-10-28 19:32:56'),
(10, 'Lê Hoài Khiêm', 'khiemletn612@gmail.com', '0987666123443423', 'Rất tốt', '2024-10-28 19:34:15'),
(11, 'Hướng Phan Đình', 'khiemletn612@gmail.com', '0987666123443423', 'Rất tốt', '2024-10-28 19:34:30'),
(12, 'Lê Hoài Khiêm', 'khiemletn612@gmail.com', '0987666123123123', 'Rất tốt', '2024-10-28 19:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(100) DEFAULT NULL,
  `gia` bigint(20) DEFAULT NULL,
  `hinhanh` longtext DEFAULT NULL,
  `kichthuoc` char(80) DEFAULT NULL,
  `chieucaoyen` char(20) DEFAULT NULL,
  `sizebanh` char(150) DEFAULT NULL,
  `engine` varchar(200) DEFAULT NULL,
  `CC` char(20) DEFAULT NULL,
  `congsuat` varchar(100) DEFAULT NULL,
  `CCnhot` varchar(50) DEFAULT NULL,
  `CCxang` varchar(20) DEFAULT NULL,
  `phanh` varchar(100) DEFAULT NULL,
  `gear` varchar(20) DEFAULT NULL,
  `noidung` longtext DEFAULT NULL,
  `tenhang` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `gia`, `hinhanh`, `kichthuoc`, `chieucaoyen`, `sizebanh`, `engine`, `CC`, `congsuat`, `CCnhot`, `CCxang`, `phanh`, `gear`, `noidung`, `tenhang`) VALUES
(1, 'Vario 160', 59990000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1680512879-86024cad1e83101d97359d7351051156-493-1.gif', '1.929 x 679 x 1.088 mm', '778 mm', 'Trước 100/80-14 ; Sau 120/70-14', 'eSP+, 4 van, 4 kỳ, phun xăng điện tử, làm mát bằng dung dịch', '156,9 cc', '11,3 kW (15,4 PS) tại 8.500 vòng / phút', '0,8 khi thay nhớt', '0,9 khi rã máy', 'Phanh đĩa (ABS);Phanh đĩa', 'Vô cấp Tự động', '', 'HONDA'),
(2, 'Wave Alpha 2025', 18939273, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1720687938-86024cad1e83101d97359d7351051156-602-1.png', '1.913 x 689 x 1.076 mm', '770 mm', '90/80-17M/C 46P Sau: 120/70-17M/C 58P', '4 kỳ, 1 xilanh, làm mát bằng không khí.', '109,1 cm3', '6,12kW tại 7.500 vòng/phút', '0.8L khi thay nhớt ; 1.0L khi rã máy', '3,7L', 'Tang trống; Tang trống', '4 số', '', 'HONDA'),
(3, 'CB150R SF', 105500000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1555732880-86024cad1e83101d97359d7351051156-419-1.jpg', '2.019 x 719 x 1.039 mm', ' 797 mm', '100/80-17 52P - 130/70-17 62P', '4 thì, một xilanh, DOHC', '149,16 cc', '16,6 mã lực @ 9.000 vòng/phút', '1.1 lít khi thay nhớt ; 1.3 lít khi rã máy', '12L', 'Phanh đĩa;Phanh đĩa', '6 Cấp', '', 'HONDA'),
(4, 'AIR BLADE 2025', 42012000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1717217440-86024cad1e83101d97359d7351051156-644-1.jpg', '1.887 x 687 x 1.092 mm', '775 mm', 'Trước 80/90-14 ; Sau 90/90-14', 'Phun xăng điện tử FI, 4 kỳ, 1 xy lanh, làm mát bằng dung dịch', '149,3 cm3', '8,75kW tại 8.500 vòng/phút', ' 0,8L khi thay nhớt ; 0,9L khi rã máy', '4,4L', 'Trước: Phanh đĩa CBS (AB125); Sau: Tang trống.', 'Vô cấp Tự động', '', 'HONDA'),
(5, 'Super Cub 2025', 86292000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1720680956-86024cad1e83101d97359d7351051156-392-1.png', '1.910 x 718 x 1.002mm', '780 mm', 'Maxxis Tortuga: 120/80-12 65J - 130/80-12 69J', 'PGM-FI, SOHC 4 kỳ, 1 xi lanh, làm mát bằng không khí.', '125cc', '6,79 kW tại 7.500 vòng/phút', '0.8L khi thay nhớt ; 1.0L khi rã máy', '3,7L', 'Thắng dĩa; Tang trống', '4 Cấp', '', 'HONDA'),
(6, 'SH 125i 2024', 73921091, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1691142353-86024cad1e83101d97359d7351051156-588-1.png', '2.090 x 739 x 1.129 mm', '799 mm', '120/80-16 ; 100/80-16', 'PGM-FI, xăng, 4 kỳ, 1 xy-lanh, làm mát bằng dung dịch', '124,8cm³', '9,6kW/8.250 vòng/phút (SH 125i)', '0,8 khi thay nhớt ; 0,9 khi rã máy', '7,8L', 'Phanh đĩa ABS; Phanh đĩa', 'Vô cấp', '', 'HONDA'),
(7, 'EXCITER 155 2024', 54000000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1719906134-86024cad1e83101d97359d7351051156-600-1.jpg', '1.975x 665 x 1.105mm.', '795 mm', '120/80-16 ; 100/80-16', 'SOHC, 4 thì, VVA, xi lanh đơn, làm mát bằng chất lỏng', '155 cc', '17,7kW tại 9,500 vòng/phút', 'Thay nhớt 0,85 lít - lọc nhớt 1,15 lít', '5,4L', 'Phanh đĩa ABS; Phanh đĩa', '6 Cấp', '', 'YAMAHA'),
(8, 'XSR 155', 74500000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1578017803-86024cad1e83101d97359d7351051156-435-1.png', ' 2.000 x 805 x 1.080 (mm)', '810 mm', '110/70/17 - 140/70/17', 'PGM-FI, xăng, 4 kỳ, SOHC, 1 xy-lanh, làm mát bằng dung dịch', '155 cm³', '14,2 kW (19,3 PS)/ 10.000 vòng/phút​', 'thay nhớt 0.85 Lít (thay lọc nhớt là 0.95 Lít)', '10L', 'Phanh đĩa ABS;Phanh đĩa', '6 cấp', '', 'YAMAHA'),
(9, 'Yamaha PG-1', 30347000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1702023321-86024cad1e83101d97359d7351051156-630-1.png', '1,820 mm x 690 mm x 1,160 mm', '795 mm', '90/ 100-16M/ C 51P (lốp có săm)', '4 kỳ, 2 van, SOHC, làm mát bằng không khí', '113,7 cc', '6.6kW tại 7,000 vòng/phút', '0,8L', '5,1L', 'Phanh đĩa; Tang trống', '4 Cấp', '', 'YAMAHA'),
(10, 'MT-15', 69000000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1550724726-86024cad1e83101d97359d7351051156-409-1.png', '800 x 1.965 x 1.065 mm', ' 810 mm', '110 / 70-17 M - 140 / 70-17 M', 'PGM-FI, xăng, 4 kỳ, 1 xy-lanh, SOHC, làm mát bằng dung dịch', '155cm³', '19 mã lực tại 10.000 v/ph', 'thay nhớt 0.85 Lít (thay lọc nhớt là 0.95 Lít)', '7,8L', 'Đĩa đơn 292 mm;Đĩa dơn 220mm', '6 cấp', '', 'YAMAHA'),
(11, 'Janus 2025', 29151000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1729220084-86024cad1e83101d97359d7351051156-664-1.jpg', '1850 x 705 x 1120 mm', '770 mm', 'Lốp không săm 80/80-14M/C 43P - 100/70-14M/C 51P', 'Xăng 4 kỳ, làm mát bằng không khí', '124,9 cc', '7,0 kW tại 8.000 vòng/phút', '0,8L khi thay nhớt', '4,2L', 'Phanh đĩa ABS;Phanh đĩa', 'Vô cấp, điều khiển t', '', 'YAMAHA'),
(12, 'WR155R', 79000000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1687922960-86024cad1e83101d97359d7351051156-581-1.png', '2.145 x 840 x 1.200 mm', '888 mm', '2,75-21 45P/ 4,10-18 59P', '4 kỳ, SOHC, 4 van, VVA', '155 cc', '16,5kW tại 10.000 vòng/phút', '1,1L', '8,1L', 'Đĩa; Đĩa', '6 Cấp', '', 'YAMAHA'),
(13, 'SYM Priti 125 2025', 29500000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1725856838-86024cad1e83101d97359d7351051156-658-1.png', '1780 x 630 x 1060 mm', '725 mm', '90/90-10 ; 100/80-10', 'Xăng 4 kỳ, 01 xi lanh, làm mát bằng không khí', '124,6 cm3', '7,1 kW/ 7000 vòng/phút', '1,2L', '6,5 L', 'Phanh đĩa CBS;Tang trống', 'Vô Cấp', NULL, 'SYM'),
(14, 'SYM Elite 50 2024', 23100000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1721376130-86024cad1e83101d97359d7351051156-257-1.png', '1.725 x 650 x 1025mm', '740mm', 'Không ruột 90/90-10', '4 thì', '49.5cc', '2,7 kw/8000 r.p.m', '0,8L', '4.5L', 'Phanh trống (đùm);Phanh trống (đùm)', 'Vô Cấp', NULL, 'SYM'),
(15, 'Tuscany 150 2023', 45000000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1695352380-86024cad1e83101d97359d7351051156-601-1.png', '1.855 x 715 x 1.130 mm', '780 mm', '110/70 R12 - 120/70 R12', 'SOHC, làm mát không khí, 4 thì, xi lanh đơn', '149,6 cc', '8,5 kW/ 8.000 vòng/phút', '0,9L', '5,7 L', 'Phanh đĩa(226mm); Phanh đĩa(220mm)', 'Vô Cấp', NULL, 'SYM'),
(16, 'SYM Shark 2024', 24300000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1719975269-86024cad1e83101d97359d7351051156-650-1.png', '1931 x 665 x 1096 (mm)', '750 mm', 'Có ruột 70/90- 14 ; 80/90- 14', 'Xăng 4 kỳ, 01 xi lanh, làm mát bằng không khí', '49.5 cc', '2.45 kw/ 8000 rpm', '0,9L', '5L', 'Tang trống;Tang trống', 'Vô Cấp', NULL, 'SYM'),
(17, 'SYM Passing 50', 24200000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1720152596-86024cad1e83101d97359d7351051156-652-1.png', ' 1.880 x 690 x 1.080mm', '660 mm', 'Có ruột 70/90-14 ; 80/90-14', 'Xăng 4 kỳ, 01 xi lanh, làm mát bằng không khí', '49.5 cc', '2.45 kw/8000rpm', '1,1L', '4.5L', 'Tang trống; Tang trống', 'Vô Cấp', NULL, 'SYM'),
(22, 'Elegant 50', 16700000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1721360563-86024cad1e83101d97359d7351051156-80-1.png', '1,910 mm x 680 mm x 1,070 mm', '750 mm', '70/90-17 ; 80/90-17 (có săm)', '4 thì/ Làm mát bằng không khí', '49cc', '2.78PS/7500 rpm', '0,8L', '4L', 'Phanh trống; Phanh trống', '4 số', '', 'SYM'),
(23, 'Vespa GTS 150 ABS', 126500000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1702529916-86024cad1e83101d97359d7351051156-378-1.jpg', 'Dài 1.985mm x rộng 740mm', '800 mm', 'Trước 120/70/12 - Sau 130/70/12', 'i-Get xi lanh đơn, 4 kì, 4 van, làm mát bằng dung dịch', '155.1 cc', '10.8 kW/ 8,250 vòng/phút', '1,2L', '7L', 'ABS Phanh đĩa đường kính 220 mm;ABS Phanh đĩa đường kính 220 mm', 'Vô cấp Tự động', NULL, 'PIAGGIO'),
(24, 'Vespa GTS 300 ABS', 155400000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1670484333-86024cad1e83101d97359d7351051156-278-1.png', 'Dài 1.950 mm x rộng 740 mm', '787 mm', 'lốp trước 120/70 -12, lốp sau 130/70 - 12', '4 thì 4 van, xy lanh đơn, làm mát bằng dung dịch', '278,3 cc', '17,5 kW / 8.250 vòng/phút', '1,2L', '8,5L', 'Đĩa đơn, 220 mm, có ABS;Đĩa đơn, 220 mm, có ABS', 'Vô cấp, điều khiển t', NULL, 'PIAGGIO'),
(25, 'MP3 400 HPE 2024', 340000000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1676001668-86024cad1e83101d97359d7351051156-549-1.png', 'Dài 2200 mm x rộng 800 mm', '790 mm', '2 x 110/70-13 -140/70-14 Tubeless', '4 thì - 4 van - trục cam đơn(SOHC)', '399 cc', ' 35 mã lực (26 kw)/7.500 vòng/phút', '1,5L', '13,7L', 'Phanh trước/sau: Đĩa đôi 258mm;Đĩa đơn 240 mm', 'Vô Cấp', NULL, 'PIAGGIO'),
(26, 'Vespa GTV 2024', 159800000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1691470128-86024cad1e83101d97359d7351051156-589-1.png', '1.975 x 775 x 1.375 mm', '790 mm', 'Tubeless 120/70 - 12” - 130/70 - 12”', 'HPE xi lanh đơn, 4 thì, 4 van, phun xăng điện tử', '278cc', '17.5 kW (23.8 HP)/8,250 vòng/phút', '1L', '8,5L', 'Phanh đĩa ABS/ASR;Phanh đĩa ABS/ASR', 'Vô Cấp', NULL, 'PIAGGIO'),
(27, 'Zip', 36000000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1534508561-86024cad1e83101d97359d7351051156-47-1.png', '1.700 x 680 x 1.200 mm', '765 mm', 'Trước 100/80 - 10 ; Sau 120/70-10', 'Hiper 4 xi lanh đơn, 4 kỳ', '96 cc', '4.2 KW/6.750 vòng/phút', '0,08L', '7L', 'Phanh đĩa; Phanh tang trống', 'Vô cấp Tự động', NULL, 'PIAGGIO'),
(28, '946 Christian Dior', 697500000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1647506396-86024cad1e83101d97359d7351051156-500-1.jpg', '1.965 x 730 x 805 mm.', '790 mm', '120/70/12 - 130/70/12', 'Xi-lanh đơn, 4 thì, làm mát bằng gió, phun xăng điện tử (EFI).', '125 cc - 150 cc', '11.4kW / 8.750 vòng/phút (125cc) -- 13kW / 8.000 vòng/phút', '1L', '8L', 'Đĩa 220 mm cả trước và sau', 'Vô cấp', NULL, 'PIAGGIO'),
(29, 'GD110', 28490000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1495181834-86024cad1e83101d97359d7351051156-244-1.jpg', '1.905 x 745 x 1.065 mm', '766 mm', 'Trước 2,50 - 17 38L , Sau 2,75 - 17 47P', 'SOHC, 4 thì, xi lanh đơn, làm mát không khí', '112,8 cc', '6,2 kW / 8,000 vòng / phút', '1,1L khi thay nhớt ; 1,3L khi rã máy', '8,5L', 'Tang trống', '4 số côn tay', NULL, 'SUZUKI'),
(30, 'GSX S150', 54900000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1670056738-86024cad1e83101d97359d7351051156-243-1.jpg', '2.020 x 745 x 1.040 mm', '785 mm', 'Trước: 90/80-17M/C 46P, Sau: 130/70-17M/C 62P', 'DOHC, 4 thì, làm mát bằng dung dịch', '147,3 cc', '14,1 kW / 10,500 vòng / phút', '1,1L khi thay nhớt ; 1,3L khi rã máy', '11L', 'Đĩa; Đĩa', '6 cấp số, côn tay', NULL, 'SUZUKI'),
(31, 'V-Strom 250SX', 132900000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1685000879-86024cad1e83101d97359d7351051156-580-1.png', '2180 x 880 x 1355 mm', '835 mm', 'Tubeless 100/90-19M/C - 140/70-17M/C', 'Xăng, 4 kỳ, 1 xi-lanh, SOHC, làm mát bằng dầu (hệ thống làm mát dầu SOCS độc', '249 cc', '26kW tại 9.300 vòng/phút', '1,5L khi thay nhớt ; 1,8L khi rã máy', '12L', 'Phanh đĩa ABS; Phanh đĩa', '6 cấp', NULL, 'SUZUKI'),
(32, 'Burgman Street 125', 48600000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1614411182-86024cad1e83101d97359d7351051156-470-1.png', '1.880 x 715 x 1.140 mm', '780 mm', 'Trước 90/90-12 54J ; Sau: 90/100-10 53J', 'Xi-lanh đơn, 4 kỳ, làm mát bằng gió', '124,3 cc', '6,4kW tại 6750 vòng/phút', '0,8L khi thay nhớt; 0,9L khi rã máy', '5,5L', 'Phanh đĩa; Tang trống', 'Vô cấp Tự động', NULL, 'SUZUKI'),
(33, 'SATRIA 2024', 48490000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1702453796-86024cad1e83101d97359d7351051156-391-1.png', '1.960 x 675 x 980 mm.', '765 mm', 'Trước: 70/90-17 38P - Sau: 80/90-17 50P', '4 thì, 1 xi-lanh, làm mát bằng gió.', '147,3 cc', '13,6kW tại 10.000 vòng / phút', '1,2L khi thay nhớt; 1,5L khi rã máy', '4,5L', 'Đĩa - Nissin 2 Pis; Đĩa - Nissin 1 Pis', '6 Cấp', NULL, 'SUZUKI'),
(34, 'Raider 2024', 45990000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/400_307_1669972382-86024cad1e83101d97359d7351051156-381-1.png', '1.960 x 675 x 980 mm.', '765 mm', 'Lốp trước 70/90-17 ; Lốp sau 80/90/17', 'Xy-lanh đơn, DOHC, 4 van, 4 thì, làm mắt bằng dung dịch.', '147,3 cc', '18,45KW tại 10.000 vòng/phút', '1,5L khi thay nhớt; 1,7L khi rã máy', '12L', 'Phanh đĩa, đường kính 330 mm; Phanh đĩa, đường kính 220 mm', '6 Cấp', NULL, 'SUZUKI');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sodienthoai` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `email`, `sodienthoai`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 999999999, 'e00cf25ad42683b3df678c61f42c6bda'),
(2, 'lehoaikhiemadmin', 'lhkhiem.dhti15a5hn@sv.uneti.edu.vn', 984602634, 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan_user`
--

CREATE TABLE `taikhoan_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sodienthoai` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan_user`
--

INSERT INTO `taikhoan_user` (`id`, `username`, `email`, `sodienthoai`, `password`, `created_at`) VALUES
(1, 'nguyenvana', 'nguyenvana@gmail.com', '0987654321', 'e10adc3949ba59abbe56e057f20f883e', '2024-10-31 17:54:04'),
(2, 'lehoaikhiem', 'lkhiem23@gmail.com', '0984602634', 'e10adc3949ba59abbe56e057f20f883e', '2024-11-01 10:12:17'),
(3, 'hoangthilinh1', 'htlinh@gmail.com', '0396444567', '32cacb2f994f6b42183a1300d9a3e8d6', '2024-11-02 07:40:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`giohang_id`),
  ADD UNIQUE KEY `unique_id_tenkh` (`id`,`tenkh`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`tenhang`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sp_h` (`tenhang`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan_user`
--
ALTER TABLE `taikhoan_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taikhoan_user`
--
ALTER TABLE `taikhoan_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sp_h` FOREIGN KEY (`tenhang`) REFERENCES `hang` (`tenhang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
