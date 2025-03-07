-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 21, 2025 lúc 07:19 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahangbansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_khuyenmai`
--

CREATE TABLE `chitiet_khuyenmai` (
  `MASACH` char(6) DEFAULT NULL,
  `MAKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_khuyenmai`
--

INSERT INTO `chitiet_khuyenmai` (`MASACH`, `MAKM`) VALUES
('SC0001', 1),
('SC0005', 2),
('SC0010', 3),
('SC0015', 4),
('SC0008', 5),
('SC0018', 1),
('SC0020', 2),
('SC0013', 3),
('SC0017', 4),
('SC0001', 1),
('SC0005', 2),
('SC0010', 3),
('SC0015', 4),
('SC0008', 5),
('SC0018', 1),
('SC0020', 2),
('SC0013', 3),
('SC0017', 4),
('SC0001', 1),
('SC0005', 2),
('SC0010', 3),
('SC0015', 4),
('SC0008', 5),
('SC0018', 1),
('SC0020', 2),
('SC0013', 3),
('SC0017', 4),
('SC0001', 1),
('SC0005', 2),
('SC0010', 3),
('SC0015', 4),
('SC0008', 5),
('SC0018', 1),
('SC0020', 2),
('SC0013', 3),
('SC0017', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_nxb`
--

CREATE TABLE `chitiet_nxb` (
  `MASACH` char(6) DEFAULT NULL,
  `MANXB` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_nxb`
--

INSERT INTO `chitiet_nxb` (`MASACH`, `MANXB`) VALUES
('SC0011', 'NXB001'),
('SC0012', 'NXB002'),
('SC0003', 'NXB003'),
('SC0004', 'NXB004'),
('SC0015', 'NXB005'),
('SC0006', 'NXB001'),
('SC0007', 'NXB002'),
('SC0018', 'NXB003'),
('SC0009', 'NXB004'),
('SC0010', 'NXB005'),
('SC0011', 'NXB001'),
('SC0012', 'NXB002'),
('SC0003', 'NXB003'),
('SC0004', 'NXB004'),
('SC0015', 'NXB005'),
('SC0006', 'NXB001'),
('SC0007', 'NXB002'),
('SC0018', 'NXB003'),
('SC0009', 'NXB004'),
('SC0010', 'NXB005'),
('SC0011', 'NXB001'),
('SC0012', 'NXB002'),
('SC0003', 'NXB003'),
('SC0004', 'NXB004'),
('SC0015', 'NXB005'),
('SC0006', 'NXB001'),
('SC0007', 'NXB002'),
('SC0018', 'NXB003'),
('SC0009', 'NXB004'),
('SC0010', 'NXB005'),
('SC0011', 'NXB001'),
('SC0012', 'NXB002'),
('SC0003', 'NXB003'),
('SC0004', 'NXB004'),
('SC0015', 'NXB005'),
('SC0006', 'NXB001'),
('SC0007', 'NXB002'),
('SC0018', 'NXB003'),
('SC0009', 'NXB004'),
('SC0010', 'NXB005');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `MaDH` char(15) DEFAULT NULL,
  `MaSach` char(6) DEFAULT NULL,
  `SoLuongCTDH` int(11) DEFAULT NULL,
  `DonGia` decimal(10,2) DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`MaDH`, `MaSach`, `SoLuongCTDH`, `DonGia`, `TrangThai`, `ghi_chu`) VALUES
('DH20240201001', 'SC0001', 2, 175000.00, 'Chờ xác nhận', 'Gói hàng cẩn thận giúp mình.'),
('DH20240205002', 'SC0003', 1, 270000.00, 'Đã xác nhận', 'Giao sau 18h, xin cảm ơn!'),
('DH20240210003', 'SC0005', 3, 153333.00, 'Đang giao', 'Không cần bọc quà.'),
('DH20240215004', 'SC0007', 1, 520000.00, 'Hoàn thành', 'Cảm ơn shop, dịch vụ rất tốt!'),
('DH20240220005', 'SC0009', 2, 95000.00, 'Hủy', 'Đặt nhầm, mong shop thông cảm.'),
('DH20240201001', 'SC0001', 2, 175000.00, 'Chờ xác nhận', 'Gói hàng cẩn thận giúp mình.'),
('DH20240205002', 'SC0003', 1, 270000.00, 'Đã xác nhận', 'Giao sau 18h, xin cảm ơn!'),
('DH20240210003', 'SC0005', 3, 153333.00, 'Đang giao', 'Không cần bọc quà.'),
('DH20240215004', 'SC0007', 1, 520000.00, 'Hoàn thành', 'Cảm ơn shop, dịch vụ rất tốt!'),
('DH20240220005', 'SC0009', 2, 95000.00, 'Hủy', 'Đặt nhầm, mong shop thông cảm.'),
('DH20240201001', 'SC0001', 2, 175000.00, 'Chờ xác nhận', 'Gói hàng cẩn thận giúp mình.'),
('DH20240205002', 'SC0003', 1, 270000.00, 'Đã xác nhận', 'Giao sau 18h, xin cảm ơn!'),
('DH20240210003', 'SC0005', 3, 153333.00, 'Đang giao', 'Không cần bọc quà.'),
('DH20240215004', 'SC0007', 1, 520000.00, 'Hoàn thành', 'Cảm ơn shop, dịch vụ rất tốt!'),
('DH20240220005', 'SC0009', 2, 95000.00, 'Hủy', 'Đặt nhầm, mong shop thông cảm.'),
('DH20240201001', 'SC0001', 2, 175000.00, 'Chờ xác nhận', 'Gói hàng cẩn thận giúp mình.'),
('DH20240205002', 'SC0003', 1, 270000.00, 'Đã xác nhận', 'Giao sau 18h, xin cảm ơn!'),
('DH20240210003', 'SC0005', 3, 153333.00, 'Đang giao', 'Không cần bọc quà.'),
('DH20240215004', 'SC0007', 1, 520000.00, 'Hoàn thành', 'Cảm ơn shop, dịch vụ rất tốt!'),
('DH20240220005', 'SC0009', 2, 95000.00, 'Hủy', 'Đặt nhầm, mong shop thông cảm.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_phieu_nhap`
--

CREATE TABLE `chi_tiet_phieu_nhap` (
  `MaPN` int(11) DEFAULT NULL,
  `MaSach` char(6) DEFAULT NULL,
  `SoLuongCTPN` int(11) DEFAULT NULL,
  `DonGia` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_phieu_nhap`
--

INSERT INTO `chi_tiet_phieu_nhap` (`MaPN`, `MaSach`, `SoLuongCTPN`, `DonGia`) VALUES
(1, 'SC0001', 50, 75000.00),
(1, 'SC0002', 30, 82000.00),
(2, 'SC0015', 20, 115000.00),
(2, 'SC0010', 40, 90000.00),
(3, 'SC0015', 60, 67000.00),
(3, 'SC0020', 25, 135000.00),
(4, 'SC0012', 35, 92000.00),
(4, 'SC0013', 15, 150000.00),
(5, 'SC0008', 50, 78000.00),
(5, 'SC0016', 45, 102000.00),
(1, 'SC0001', 50, 75000.00),
(1, 'SC0002', 30, 82000.00),
(2, 'SC0015', 20, 115000.00),
(2, 'SC0010', 40, 90000.00),
(3, 'SC0015', 60, 67000.00),
(3, 'SC0020', 25, 135000.00),
(4, 'SC0012', 35, 92000.00),
(4, 'SC0013', 15, 150000.00),
(5, 'SC0008', 50, 78000.00),
(5, 'SC0016', 45, 102000.00),
(1, 'SC0001', 50, 75000.00),
(1, 'SC0002', 30, 82000.00),
(2, 'SC0015', 20, 115000.00),
(2, 'SC0010', 40, 90000.00),
(3, 'SC0015', 60, 67000.00),
(3, 'SC0020', 25, 135000.00),
(4, 'SC0012', 35, 92000.00),
(4, 'SC0013', 15, 150000.00),
(5, 'SC0008', 50, 78000.00),
(5, 'SC0016', 45, 102000.00),
(1, 'SC0001', 50, 75000.00),
(1, 'SC0002', 30, 82000.00),
(2, 'SC0015', 20, 115000.00),
(2, 'SC0010', 40, 90000.00),
(3, 'SC0015', 60, 67000.00),
(3, 'SC0020', 25, 135000.00),
(4, 'SC0012', 35, 92000.00),
(4, 'SC0013', 15, 150000.00),
(5, 'SC0008', 50, 78000.00),
(5, 'SC0016', 45, 102000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_phieu_xuat`
--

CREATE TABLE `chi_tiet_phieu_xuat` (
  `MaPX` int(11) DEFAULT NULL,
  `MaSach` char(6) DEFAULT NULL,
  `SoLuongCTPX` int(11) DEFAULT NULL,
  `DonGia` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_phieu_xuat`
--

INSERT INTO `chi_tiet_phieu_xuat` (`MaPX`, `MaSach`, `SoLuongCTPX`, `DonGia`) VALUES
(1, 'SC0011', 10, 120000.00),
(1, 'SC0012', 5, 85000.00),
(2, 'SC0015', 8, 130000.00),
(2, 'SC0010', 12, 95000.00),
(3, 'SC0015', 15, 70000.00),
(3, 'SC0002', 10, 140000.00),
(4, 'SC0005', 7, 99000.00),
(4, 'SC0003', 3, 160000.00),
(5, 'SC0008', 9, 82000.00),
(5, 'SC0019', 6, 110000.00),
(1, 'SC0011', 10, 120000.00),
(1, 'SC0012', 5, 85000.00),
(2, 'SC0015', 8, 130000.00),
(2, 'SC0010', 12, 95000.00),
(3, 'SC0015', 15, 70000.00),
(3, 'SC0002', 10, 140000.00),
(4, 'SC0005', 7, 99000.00),
(4, 'SC0003', 3, 160000.00),
(5, 'SC0008', 9, 82000.00),
(5, 'SC0019', 6, 110000.00),
(1, 'SC0011', 10, 120000.00),
(1, 'SC0012', 5, 85000.00),
(2, 'SC0015', 8, 130000.00),
(2, 'SC0010', 12, 95000.00),
(3, 'SC0015', 15, 70000.00),
(3, 'SC0002', 10, 140000.00),
(4, 'SC0005', 7, 99000.00),
(4, 'SC0003', 3, 160000.00),
(5, 'SC0008', 9, 82000.00),
(5, 'SC0019', 6, 110000.00),
(1, 'SC0011', 10, 120000.00),
(1, 'SC0012', 5, 85000.00),
(2, 'SC0015', 8, 130000.00),
(2, 'SC0010', 12, 95000.00),
(3, 'SC0015', 15, 70000.00),
(3, 'SC0002', 10, 140000.00),
(4, 'SC0005', 7, 99000.00),
(4, 'SC0003', 3, 160000.00),
(5, 'SC0008', 9, 82000.00),
(5, 'SC0019', 6, 110000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `MaDG` int(11) NOT NULL,
  `NoiDung` text DEFAULT NULL,
  `MaSach` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`MaDG`, `NoiDung`, `MaSach`) VALUES
(1, 'Cuốn sách này rất hay, nội dung sâu sắc và dễ hiểu.', 'SC0001'),
(2, 'Một câu chuyện tuyệt vời, rất đáng để đọc!', 'SC0002'),
(3, 'Sách trình bày khá chi tiết, nhưng hơi khó hiểu ở một số phần.', 'SC0003'),
(4, 'Tuyệt vời! Tôi đã học được rất nhiều kiến thức bổ ích từ cuốn sách này.', 'SC0004'),
(5, 'Nội dung phong phú, văn phong hấp dẫn, rất đáng giá.', 'SC0015'),
(6, 'Một cuốn sách truyền cảm hứng, tôi rất thích!', 'SC0006'),
(7, 'Sách hơi dài nhưng nội dung rất chất lượng.', 'SC0007'),
(8, 'Kiến thức trong sách rất thực tế, phù hợp với người mới bắt đầu.', 'SC0008'),
(9, 'Cốt truyện hấp dẫn, tác giả viết rất lôi cuốn.', 'SC0019'),
(10, 'Mình đã đọc đi đọc lại cuốn này nhiều lần, rất hay!', 'SC0010'),
(11, 'Sách giải thích rõ ràng, dễ hiểu, rất phù hợp cho sinh viên.', 'SC0011'),
(12, 'Một trong những cuốn sách hay nhất mình từng đọc!', 'SC0012'),
(13, 'Tác giả phân tích rất sâu, giúp mình hiểu vấn đề rõ hơn.', 'SC0013'),
(15, 'Sách đẹp, nội dung tốt nhưng giá hơi cao.', 'SC0015');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_gia`
--

CREATE TABLE `don_gia` (
  `DonGia` int(11) NOT NULL,
  `masach` char(6) DEFAULT NULL,
  `ThoiDiem` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `don_gia`
--

INSERT INTO `don_gia` (`DonGia`, `masach`, `ThoiDiem`) VALUES
(75000, 'SC0001', NULL),
(85000, 'SC0002', NULL),
(65000, 'SC0003', NULL),
(70000, 'SC0004', NULL),
(50000, 'SC0005', NULL),
(80000, 'SC0006', NULL),
(90000, 'SC0007', NULL),
(75000, 'SC0008', NULL),
(95000, 'SC0009', NULL),
(120000, 'SC0010', NULL),
(99000, 'SC0011', NULL),
(89000, 'SC0012', NULL),
(95000, 'SC0013', NULL),
(91000, 'SC0015', NULL),
(99000, 'SC0016', NULL),
(105000, 'SC0017', NULL),
(98000, 'SC0018', NULL),
(115000, 'SC0019', NULL),
(89000, 'SC0020', NULL),
(75000, 'SC0001', NULL),
(85000, 'SC0002', NULL),
(65000, 'SC0003', NULL),
(70000, 'SC0004', NULL),
(50000, 'SC0005', NULL),
(80000, 'SC0006', NULL),
(90000, 'SC0007', NULL),
(75000, 'SC0008', NULL),
(95000, 'SC0009', NULL),
(120000, 'SC0010', NULL),
(99000, 'SC0011', NULL),
(89000, 'SC0012', NULL),
(95000, 'SC0013', NULL),
(91000, 'SC0015', NULL),
(99000, 'SC0016', NULL),
(105000, 'SC0017', NULL),
(98000, 'SC0018', NULL),
(115000, 'SC0019', NULL),
(89000, 'SC0020', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `MaDH` char(15) NOT NULL,
  `NgayGioLap` datetime DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL,
  `TongTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`MaDH`, `NgayGioLap`, `TrangThai`, `TongTien`) VALUES
('DH20240201001', '2024-02-01 10:30:00', 'Chờ xác nhận', 350000),
('DH20240205002', '2024-02-05 15:00:00', 'Đã xác nhận', 270000),
('DH20240210003', '2024-02-10 12:45:00', 'Đang giao', 460000),
('DH20240215004', '2024-02-15 18:20:00', 'Hoàn thành', 520000),
('DH20240220005', '2024-02-20 09:10:00', 'Hủy', 190000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dot_khuyen_mai`
--

CREATE TABLE `dot_khuyen_mai` (
  `MaKM` int(11) NOT NULL,
  `TenKM` varchar(255) NOT NULL,
  `NgayBD` date DEFAULT NULL,
  `NgayKT` date DEFAULT NULL,
  `tylegiam` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dot_khuyen_mai`
--

INSERT INTO `dot_khuyen_mai` (`MaKM`, `TenKM`, `NgayBD`, `NgayKT`, `tylegiam`) VALUES
(1, 'Giảm giá hè 2024', '2024-06-01', '2024-06-30', NULL),
(2, 'Khuyến mãi Black Friday', '2024-11-25', '2024-11-30', NULL),
(3, 'Tết Âm Lịch 2025', '2025-01-20', '2025-02-05', NULL),
(4, 'Ngày sách Việt Nam', '2024-04-15', '2024-04-23', NULL),
(5, 'Back to School 2024', '2024-08-15', '2024-09-10', NULL),
(6, 'Giảm giá hè 2024', '2024-06-01', '2024-06-30', NULL),
(7, 'Khuyến mãi Black Friday', '2024-11-25', '2024-11-30', NULL),
(8, 'Tết Âm Lịch 2025', '2025-01-20', '2025-02-05', NULL),
(9, 'Ngày sách Việt Nam', '2024-04-15', '2024-04-23', NULL),
(10, 'Back to School 2024', '2024-08-15', '2024-09-10', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `MaGH` int(11) NOT NULL,
  `MaTK` varchar(10) NOT NULL,
  `MaSach` char(6) NOT NULL,
  `soluong` int(11) NOT NULL CHECK (`soluong` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaTK` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `DiaChi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MaTK`, `Email`, `MatKhau`, `HoTen`, `SDT`, `DiaChi`) VALUES
('KH00067S', 'anth@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Nguyễn Thụy Hoàng Anh\r\n', '0123456789', 'Phường 3, Thành Phố Vĩnh Long'),
('KH27707Y', 'vydt@gmail.com', '$2y$10$..BrWEUJfVilzlr1xQP/tOaAeXViCRtH3.TspULGYbZCBW335ExA6', 'Đường Thảo Vy', '0135792468', 'TP Ngã Sáu, tỉnh Hậu Giang'),
('KH59385V', 'quynhnkn@gmail.com', '$2y$10$MPk0IhTt9XRh04pR4oQZN.ZFsHDO2Fy4CO8qHallkixilnWSieq7e', 'Ngô Kế Như Quỳnh', '0987654321', 'Tỉnh Tiền Giang'),
('KH83230E', 'linh@gmail.com', '$2y$10$Kcz5HabkWTpeMCCWloRWvO3VVt9wpJxU65/HmbKDltg4iJ5I7HEea', 'Lý Ngọc Linh', '0998998998', NULL);

--
-- Bẫy `khach_hang`
--
DELIMITER $$
CREATE TRIGGER `before_insert_customers` BEFORE INSERT ON `khach_hang` FOR EACH ROW BEGIN
    SET NEW.MaTK = CONCAT('KH', 
        LPAD(FLOOR(RAND() * 100000), 5, '0'), 
        CHAR(65 + FLOOR(RAND() * 26)));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_check_Email` BEFORE INSERT ON `khach_hang` FOR EACH ROW BEGIN
    IF NEW.Email NOT REGEXP '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Email không hợp lệ! Hãy nhập đúng định dạng (VD: example@mail.com)';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `MaNV` char(5) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `NV_ChucVu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`MaNV`, `Email`, `MatKhau`, `HoTen`, `SDT`, `NV_ChucVu`) VALUES
('NV001', 'an@gmail.com', '$2y$10$vXOMiYHiSn7RVeKBJM/AHOUyT7WfFxnquqRWHpC5dy1TEOEozhvga', 'Dương Hoài An', '2003-08-28', 'Kế toán'),
('NV002', 'kieu@gmail.com', '$2y$10$xodBQeRphes4i7X14GYfMOJIkIHM3vdlb/WodArA/limjPus5Bvlu', 'Nguyễn Thúy Kiều', '2004-07-14', 'Bán hàng');

--
-- Bẫy `nhan_vien`
--
DELIMITER $$
CREATE TRIGGER `trg_check_Email_NV` BEFORE INSERT ON `nhan_vien` FOR EACH ROW BEGIN
    IF NEW.Email NOT REGEXP '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Email không hợp lệ! Hãy nhập đúng định dạng (VD: example@mail.com)';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_check_MaNV` BEFORE INSERT ON `nhan_vien` FOR EACH ROW BEGIN
    IF NEW.MaNV NOT REGEXP '^NV[0-9]{3}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Mã nhân viên không hợp lệ! Định dạng đúng: NV001, NV123,...';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_xuat_ban`
--

CREATE TABLE `nha_xuat_ban` (
  `MaNXB` char(6) NOT NULL,
  `TenNXB` varchar(255) NOT NULL,
  `DiaChi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_xuat_ban`
--

INSERT INTO `nha_xuat_ban` (`MaNXB`, `TenNXB`, `DiaChi`) VALUES
('NXB001', 'Nhà xuất bản Kim Đồng', 'Hà Nội, Việt Nam'),
('NXB002', 'Nhà xuất bản Trẻ', 'TP. Hồ Chí Minh, Việt Nam'),
('NXB003', 'Nhà xuất bản Văn Học', 'Hà Nội, Việt Nam'),
('NXB004', 'Nhà xuất bản Giáo Dục', 'Hà Nội, Việt Nam'),
('NXB005', 'Nhà xuất bản Lao Động', 'Hà Nội, Việt Nam'),
('NXB006', 'Nhà xuất bản Thế Giới', 'Hà Nội, Việt Nam'),
('NXB007', 'Nhà xuất bản Khoa Học & Kỹ Thuật', 'Hà Nội, Việt Nam'),
('NXB008', 'Nhà xuất bản Tổng Hợp TP. Hồ Chí Minh', 'TP. Hồ Chí Minh, Việt Nam'),
('NXB009', 'Nhà xuất bản Văn Hóa - Văn Nghệ', 'TP. Hồ Chí Minh, Việt Nam'),
('NXB010', 'Nhà xuất bản Chính Trị Quốc Gia', 'Hà Nội, Việt Nam'),
('NXB011', 'Penguin Random House', 'New York, USA'),
('NXB012', 'HarperCollins', 'New York, USA'),
('NXB013', 'Simon & Schuster', 'New York, USA'),
('NXB014', 'Macmillan Publishers', 'London, UK'),
('NXB015', 'Hachette Livre', 'Paris, France'),
('NXB016', 'Oxford University Press', 'Oxford, UK'),
('NXB017', 'Cambridge University Press', 'Cambridge, UK'),
('NXB018', 'Scholastic Corporation', 'New York, USA'),
('NXB019', 'Bloomsbury Publishing', 'London, UK'),
('NXB020', 'Vintage Books', 'New York, USA');

--
-- Bẫy `nha_xuat_ban`
--
DELIMITER $$
CREATE TRIGGER `trg_check_MaNXB` BEFORE INSERT ON `nha_xuat_ban` FOR EACH ROW BEGIN
    IF NEW.MaNXB NOT REGEXP '^NXB[0-9]{3}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'MaNXB phải có định dạng "NXB" + 3 số (VD: NXB001, NXB123)';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_nhap`
--

CREATE TABLE `phieu_nhap` (
  `MaPN` int(11) NOT NULL,
  `NhaCungCap` varchar(255) DEFAULT NULL,
  `NgayNhap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_nhap`
--

INSERT INTO `phieu_nhap` (`MaPN`, `NhaCungCap`, `NgayNhap`) VALUES
(1, 'Nhà Sách Minh Khai', '2024-02-01'),
(2, 'Công Ty Phát Hành Sách Fahasa', '2024-02-10'),
(3, 'Nhà Sách Tiki', '2024-02-15'),
(4, 'Alpha Books', '2024-02-20'),
(5, 'NXB Trẻ', '2024-02-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_xuat`
--

CREATE TABLE `phieu_xuat` (
  `MaPX` int(11) NOT NULL,
  `NgayXuat` date DEFAULT NULL,
  `MaNV` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_xuat`
--

INSERT INTO `phieu_xuat` (`MaPX`, `NgayXuat`, `MaNV`) VALUES
(1, '2024-03-01', 'NV001'),
(2, '2024-03-05', 'NV002'),
(3, '2024-03-10', 'NV002'),
(4, '2024-03-15', 'NV001'),
(5, '2024-03-20', 'NV001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_tri_vien`
--

CREATE TABLE `quan_tri_vien` (
  `MaTK` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quan_tri_vien`
--

INSERT INTO `quan_tri_vien` (`MaTK`, `Email`, `MatKhau`, `HoTen`, `SDT`) VALUES
(1, 'ngoquynh30041997@gmail.com', '$2y$10$DpEsVsKR97lzhbFngU.7IuGvXqshZLlBT1jtorb8w.ot3WLHs64/a', 'Ngo Kế Như Quỳnh', '0372623835');

--
-- Bẫy `quan_tri_vien`
--
DELIMITER $$
CREATE TRIGGER `trg_check_Email_QTV` BEFORE INSERT ON `quan_tri_vien` FOR EACH ROW BEGIN
    IF NEW.Email NOT REGEXP '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Email không hợp lệ! Hãy nhập đúng định dạng (VD: example@mail.com)';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaSach` char(6) NOT NULL,
  `TenSach` varchar(255) NOT NULL,
  `MoTa` text DEFAULT NULL,
  `NgonNgu` varchar(100) DEFAULT NULL,
  `NamXB` year(4) DEFAULT NULL,
  `Hinh` varchar(1280) DEFAULT NULL,
  `MaTG` char(5) DEFAULT NULL,
  `MaTL` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MaSach`, `TenSach`, `MoTa`, `NgonNgu`, `NamXB`, `Hinh`, `MaTG`, `MaTL`) VALUES
('SC0001', 'Cho Tôi Xin Một Vé Đi Tuổi Thơ', 'Câu chuyện kể về tuổi thơ đầy màu sắc và những kỷ niệm khó quên của nhân vật chính.', 'Tiếng Việt', '2008', 'sc0001.jpg', 'TG001', 'TL009'),
('SC0002', 'Dế Mèn Phiêu Lưu Ký', 'Câu chuyện nổi tiếng về chuyến phiêu lưu của chú dế mèn thông minh, gan dạ.', 'Tiếng Việt', '1941', 'sc0002.jpg', 'TG003', 'TL009'),
('SC0003', 'Tắt Đèn', 'Một tác phẩm phản ánh xã hội thực dân nửa phong kiến và cuộc sống khốn khó của nông dân Việt Nam.', 'Tiếng Việt', '1939', 'sc0003.jpg', 'TG005', 'TL005'),
('SC0004', 'Số Đỏ', 'Tiểu thuyết châm biếm nổi tiếng, miêu tả xã hội thành thị nửa Tây hóa đầu thế kỷ 20.', 'Tiếng Việt', '1936', 'sc0004.jpg', 'TG006', 'TL014'),
('SC0005', 'Chí Phèo', 'Câu chuyện bi kịch của một người nông dân nghèo bị xã hội tha hóa.', 'Tiếng Việt', '1941', 'sc0005.jpg', 'TG004', 'TL005'),
('SC0006', 'Mắt Biếc', 'Một tác phẩm lãng mạn sâu lắng về tình yêu tuổi học trò.', 'Tiếng Việt', '1990', 'sc0006.jpg', 'TG001', 'TL009'),
('SC0007', 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 'Một câu chuyện về những ngày tháng tuổi thơ tuyệt đẹp.', 'Tiếng Việt', '2010', 'sc0007.jpg', 'TG001', 'TL009'),
('SC0008', 'Những Ngày Thơ Ấu', 'Cuốn tự truyện nổi tiếng về tuổi thơ đầy khó khăn và cảm động.', 'Tiếng Việt', '1941', 'sc0008.jpg', 'TG022', 'TL009'),
('SC0009', 'Đất Rừng Phương Nam', 'Một câu chuyện phiêu lưu giàu chất thơ của cậu bé An trên vùng đất Nam Bộ.', 'Tiếng Việt', '1957', 'sc0009.jpg', 'TG021', 'TL009'),
('SC0010', 'Harry Potter và Hòn Đá Phù Thủy', 'Tác phẩm mở đầu cho loạt truyện đình đám về thế giới phù thủy của Harry Potter.', 'Tiếng Anh', '1997', 'sc0010.jpg', 'TG011', 'TL003'),
('SC0011', '1984', 'Một kiệt tác văn học về chủ nghĩa toàn trị và kiểm soát tư tưởng.', 'Tiếng Anh', '1949', 'SC0011.jpg', 'TG012', 'TL006'),
('SC0012', 'Rừng Na Uy', 'Một câu chuyện đẹp về tình yêu, tuổi trẻ và nỗi cô đơn.', 'Tiếng Nhật', '1987', 'sc0012.jpg', 'TG013', 'TL013'),
('SC0013', 'Chiến Tranh và Hòa Bình', 'Một sử thi đồ sộ về thời kỳ chiến tranh Napoléon tại nước Nga.', 'Tiếng Nga', '0000', 'SC0013.jpg', 'TG014', 'TL006'),
('SC0015', 'Kiêu Hãnh và Định Kiến', 'Một tác phẩm kinh điển về tình yêu và tầng lớp quý tộc Anh.', 'Tiếng Anh', '0000', 'sc0015.jpg', 'TG016', 'TL013'),
('SC0016', 'Những Cuộc Phiêu Lưu của Tom Sawyer', 'Câu chuyện về cậu bé Tom tinh nghịch và đầy phiêu lưu.', 'Tiếng Anh', '0000', 'sc0016.jpg', 'TG017', 'TL009'),
('SC0017', 'Tội Ác và Hình Phạt', 'Một trong những tiểu thuyết kinh điển về tội lỗi và sự chuộc tội.', 'Tiếng Nga', '0000', 'sc0017.jpg', 'TG018', 'TL006'),
('SC0018', 'Chúa Tể Những Chiếc Nhẫn', 'Bộ tiểu thuyết giả tưởng huyền thoại về cuộc chiến chống lại bóng tối.', 'Tiếng Anh', '1954', 'sc0018.jpg', 'TG019', 'TL003'),
('SC0019', 'IT', 'Một câu chuyện kinh dị rùng rợn về tên hề Pennywise.', 'Tiếng Anh', '1986', 'SC0019.jpg', 'TG020', 'TL004'),
('SC0020', 'Bến Xe', 'Thứ tôi có thể cho em trong cuộc đời này chỉ là danh dự trong sạch và một tương lai tươi đẹp mà thôi. Thế nhưng, nếu chúng ta có kiếp sau, nếu kiếp sau tôi có đôi mắt sáng, tôi sẽ ở bến xe này… đợi em.', 'Tiếng Việt', '2020', 'SC0020.jpg', 'TG023', 'TL012');

--
-- Bẫy `sach`
--
DELIMITER $$
CREATE TRIGGER `trg_check_MaSach` BEFORE INSERT ON `sach` FOR EACH ROW BEGIN
    IF NEW.MaSach NOT REGEXP '^[A-Z]{2}[0-9]{4}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'MaSach phải có định dạng 2 chữ cái + 4 số (VD: BK1234, TL0001)';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tac_gia`
--

CREATE TABLE `tac_gia` (
  `MaTG` char(5) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `QueQuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tac_gia`
--

INSERT INTO `tac_gia` (`MaTG`, `HoTen`, `QueQuan`) VALUES
('TG001', 'Nguyễn Nhật Ánh', 'Quảng Nam'),
('TG002', 'Nguyễn Huy Thiệp', 'Hà Nội'),
('TG003', 'Tô Hoài', 'Hà Nội'),
('TG004', 'Nam Cao', 'Hà Nam'),
('TG005', 'Nguyễn Công Hoan', 'Bắc Ninh'),
('TG006', 'Vũ Trọng Phụng', 'Hà Nội'),
('TG007', 'Nguyễn Đình Thi', 'Hà Nội'),
('TG008', 'Xuân Quỳnh', 'Hà Tây'),
('TG009', 'Hồ Biểu Chánh', 'Tiền Giang'),
('TG010', 'Nguyễn Khải', 'Nam Định'),
('TG011', 'J.K. Rowling', 'Anh'),
('TG012', 'George Orwell', 'Anh'),
('TG013', 'Haruki Murakami', 'Nhật Bản'),
('TG014', 'Leo Tolstoy', 'Nga'),
('TG015', 'Gabriel Garcia Marquez', 'Colombia'),
('TG016', 'Jane Austen', 'Anh'),
('TG017', 'Mark Twain', 'Mỹ'),
('TG018', 'Fyodor Dostoevsky', 'Nga'),
('TG019', 'J.R.R. Tolkien', 'Anh'),
('TG020', 'Stephen King', 'Mỹ'),
('TG021', 'Đoàn Giỏi', 'Kiên Giang'),
('TG022', 'Nguyên Hồng', 'Nam Định'),
('TG023', 'Thương Thái Vi', 'NULL');

--
-- Bẫy `tac_gia`
--
DELIMITER $$
CREATE TRIGGER `trg_check_MaTG` BEFORE INSERT ON `tac_gia` FOR EACH ROW BEGIN
    IF NEW.MaTG NOT REGEXP '^TG[0-9]{3}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'MaTG phải có định dạng TGxxx (ví dụ: TG001, TG123)';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `the_loai`
--

CREATE TABLE `the_loai` (
  `MaTL` char(5) NOT NULL,
  `TenTL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `the_loai`
--

INSERT INTO `the_loai` (`MaTL`, `TenTL`) VALUES
('TL001', 'Tiểu thuyết'),
('TL002', 'Truyện ngắn'),
('TL003', 'Kỳ ảo'),
('TL004', 'Kinh dị'),
('TL005', 'Hiện thực'),
('TL006', 'Văn học cổ điển'),
('TL007', 'Triết học'),
('TL008', 'Khoa học viễn tưởng'),
('TL009', 'Thiếu nhi'),
('TL010', 'Tâm lý'),
('TL011', 'Lịch sử'),
('TL012', 'Tình cảm'),
('TL013', 'Lãng mạn'),
('TL014', 'Châm biếm'),
('TL015', 'Hồi ký'),
('TL016', 'Tự truyện');

--
-- Bẫy `the_loai`
--
DELIMITER $$
CREATE TRIGGER `trg_check_MaTL` BEFORE INSERT ON `the_loai` FOR EACH ROW BEGIN
    IF NEW.MaTL NOT REGEXP '^[A-Z]{2}[0-9]{3}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'MaTL phải có định dạng 2 chữ cái + 3 số (VD: TL001, BK123)';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_ky_thuat`
--

CREATE TABLE `thong_tin_ky_thuat` (
  `MaSach` char(6) DEFAULT NULL,
  `KichThuoc` varchar(50) DEFAULT NULL,
  `SoTrang` int(11) DEFAULT NULL,
  `LoaiBia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_ky_thuat`
--

INSERT INTO `thong_tin_ky_thuat` (`MaSach`, `KichThuoc`, `SoTrang`, `LoaiBia`) VALUES
('SC0001', '13x20 cm', 250, 'Bìa mềm'),
('SC0002', '14x21 cm', 300, 'Bìa cứng'),
('SC0003', '12x19 cm', 220, 'Bìa mềm'),
('SC0004', '15x23 cm', 400, 'Bìa cứng'),
('SC0005', '13x20 cm', 280, 'Bìa mềm'),
('SC0006', '14x22 cm', 320, 'Bìa mềm'),
('SC0007', '12x18 cm', 210, 'Bìa mềm'),
('SC0008', '14x21 cm', 350, 'Bìa cứng'),
('SC0009', '15x24 cm', 450, 'Bìa cứng'),
('SC0010', '13x20 cm', 275, 'Bìa mềm');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_khuyenmai`
--
ALTER TABLE `chitiet_khuyenmai`
  ADD KEY `MASACH` (`MASACH`),
  ADD KEY `MAKM` (`MAKM`);

--
-- Chỉ mục cho bảng `chitiet_nxb`
--
ALTER TABLE `chitiet_nxb`
  ADD KEY `MASACH` (`MASACH`),
  ADD KEY `MANXB` (`MANXB`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD KEY `MaDH` (`MaDH`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Chỉ mục cho bảng `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  ADD KEY `MaPN` (`MaPN`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Chỉ mục cho bảng `chi_tiet_phieu_xuat`
--
ALTER TABLE `chi_tiet_phieu_xuat`
  ADD KEY `MaPX` (`MaPX`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`MaDG`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Chỉ mục cho bảng `don_gia`
--
ALTER TABLE `don_gia`
  ADD KEY `fk_sach_nxb` (`masach`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Chỉ mục cho bảng `dot_khuyen_mai`
--
ALTER TABLE `dot_khuyen_mai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`MaGH`),
  ADD KEY `MaTK` (`MaTK`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaTK`),
  ADD UNIQUE KEY `unique_SDT` (`SDT`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`MaNV`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  ADD PRIMARY KEY (`MaNXB`);

--
-- Chỉ mục cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD PRIMARY KEY (`MaPN`);

--
-- Chỉ mục cho bảng `phieu_xuat`
--
ALTER TABLE `phieu_xuat`
  ADD PRIMARY KEY (`MaPX`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Chỉ mục cho bảng `quan_tri_vien`
--
ALTER TABLE `quan_tri_vien`
  ADD PRIMARY KEY (`MaTK`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaSach`),
  ADD KEY `MaTG` (`MaTG`),
  ADD KEY `MaTL` (`MaTL`);

--
-- Chỉ mục cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`MaTG`);

--
-- Chỉ mục cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`MaTL`);

--
-- Chỉ mục cho bảng `thong_tin_ky_thuat`
--
ALTER TABLE `thong_tin_ky_thuat`
  ADD KEY `MaSach` (`MaSach`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `MaDG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `dot_khuyen_mai`
--
ALTER TABLE `dot_khuyen_mai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phieu_xuat`
--
ALTER TABLE `phieu_xuat`
  MODIFY `MaPX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `quan_tri_vien`
--
ALTER TABLE `quan_tri_vien`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_khuyenmai`
--
ALTER TABLE `chitiet_khuyenmai`
  ADD CONSTRAINT `chitiet_khuyenmai_ibfk_1` FOREIGN KEY (`MASACH`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitiet_khuyenmai_ibfk_2` FOREIGN KEY (`MAKM`) REFERENCES `dot_khuyen_mai` (`MaKM`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitiet_nxb`
--
ALTER TABLE `chitiet_nxb`
  ADD CONSTRAINT `chitiet_nxb_ibfk_1` FOREIGN KEY (`MASACH`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitiet_nxb_ibfk_2` FOREIGN KEY (`MANXB`) REFERENCES `nha_xuat_ban` (`MaNXB`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `don_hang` (`MaDH`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `chi_tiet_phieu_nhap`
--
ALTER TABLE `chi_tiet_phieu_nhap`
  ADD CONSTRAINT `chi_tiet_phieu_nhap_ibfk_1` FOREIGN KEY (`MaPN`) REFERENCES `phieu_nhap` (`MaPN`),
  ADD CONSTRAINT `chi_tiet_phieu_nhap_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `chi_tiet_phieu_xuat`
--
ALTER TABLE `chi_tiet_phieu_xuat`
  ADD CONSTRAINT `chi_tiet_phieu_xuat_ibfk_1` FOREIGN KEY (`MaPX`) REFERENCES `phieu_xuat` (`MaPX`),
  ADD CONSTRAINT `chi_tiet_phieu_xuat_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `don_gia`
--
ALTER TABLE `don_gia`
  ADD CONSTRAINT `fk_sach_nxb` FOREIGN KEY (`masach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `khach_hang` (`MaTK`) ON DELETE CASCADE,
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phieu_xuat`
--
ALTER TABLE `phieu_xuat`
  ADD CONSTRAINT `phieu_xuat_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhan_vien` (`MaNV`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`MaTG`) REFERENCES `tac_gia` (`MaTG`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`MaTL`) REFERENCES `the_loai` (`MaTL`);

--
-- Các ràng buộc cho bảng `thong_tin_ky_thuat`
--
ALTER TABLE `thong_tin_ky_thuat`
  ADD CONSTRAINT `thong_tin_ky_thuat_ibfk_1` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
