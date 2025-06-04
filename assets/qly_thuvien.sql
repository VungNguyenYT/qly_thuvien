-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 04, 2025 lúc 03:28 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qly_thuvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieumuon`
--

CREATE TABLE `chitietphieumuon` (
  `MaPM` varchar(10) NOT NULL,
  `MaSach` varchar(10) NOT NULL,
  `SoLuong` int(11) NOT NULL CHECK (`SoLuong` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `MaHS` varchar(10) NOT NULL,
  `TenHS` varchar(100) NOT NULL,
  `Lop` varchar(20) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`MaHS`, `TenHS`, `Lop`, `GioiTinh`) VALUES
('HS01', 'Nguyễn Văn An', '10A1', 'Nam'),
('HS02', 'Trần Thị Bình', '11A2', 'Nữ'),
('HS03', 'Lê Hoàng Cường', '12A3', 'Nam'),
('HS04', 'Phạm Thị Dung', '10A2', 'Nữ'),
('HS05', 'Hoàng Minh Đức', '11A1', 'Nam'),
('HS06', 'Đặng Thu Hà', '12B1', 'Nữ'),
('HS07', 'Ngô Quang Huy', '10B3', 'Nam'),
('HS08', 'Võ Thị Lan', '11B2', 'Nữ'),
('HS09', 'Phan Văn Nam', '12A1', 'Nam'),
('HS10', 'Đỗ Thị Yến', '10C1', 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieumuon`
--

CREATE TABLE `phieumuon` (
  `MaPM` varchar(10) NOT NULL,
  `MaHS` varchar(10) NOT NULL,
  `MaThuThu` varchar(10) NOT NULL,
  `NgayMuon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaSach` varchar(10) NOT NULL,
  `TenSach` varchar(200) NOT NULL,
  `TacGia` varchar(100) DEFAULT NULL,
  `NXB` varchar(100) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL CHECK (`SoLuong` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MaSach`, `TenSach`, `TacGia`, `NXB`, `SoLuong`) VALUES
('S001', 'Dế Mèn Phiêu Lưu Ký', 'Tô Hoài', 'NXB Kim Đồng', 4),
('S002', 'Lão Hạc', 'Nam Cao', 'NXB Giáo Dục', 5),
('S003', 'Tắt Đèn', 'Ngô Tất Tố', 'NXB Văn Học', 8),
('S004', 'Chiếc Lược Ngà', 'Nguyễn Quang Sáng', 'NXB Trẻ', 5),
('S005', 'Tuổi Thơ Dữ Dội', 'Phùng Quán', 'NXB Kim Đồng', 6),
('S006', 'Bí Mật Của Naoko', 'Higashino Keigo', 'NXB Trẻ', 4),
('S007', 'Nhà Giả Kim', 'Paulo Coelho', 'NXB Hội Nhà Văn', 9),
('S008', 'Đắc Nhân Tâm', 'Dale Carnegie', 'NXB Tổng hợp TP.HCM', 12),
('S009', 'Không Gia Đình', 'Hector Malot', 'NXB Văn Học', 10),
('S010', 'Harry Potter và Hòn Đá Phù Thủy', 'J.K. Rowling', 'NXB Trẻ', 15),
('S011', 'Ba Ngày Hạnh Phúc', 'Miaki Sugaru', 'IPM', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinmuon`
--

CREATE TABLE `thongtinmuon` (
  `ID` int(11) NOT NULL,
  `MaHS` varchar(10) NOT NULL,
  `TenHS` varchar(100) DEFAULT NULL,
  `MaSach` varchar(10) NOT NULL,
  `TenSach` varchar(200) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `NgayMuon` date NOT NULL,
  `TrangThai` varchar(20) DEFAULT 'Chưa trả'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinmuon`
--

INSERT INTO `thongtinmuon` (`ID`, `MaHS`, `TenHS`, `MaSach`, `TenSach`, `SoLuong`, `NgayMuon`, `TrangThai`) VALUES
(1, 'HS01', 'Nguyễn Văn An', 'S001', 'Dế Mèn Phiêu Lưu Ký', 1, '2025-06-04', 'Đã trả'),
(2, 'HS01', 'Nguyễn Văn An', 'S011', 'Ba Ngày Hạnh Phúc', 1, '2025-06-04', 'Đã trả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuthu`
--

CREATE TABLE `thuthu` (
  `MaThuThu` varchar(10) NOT NULL,
  `TenThuThu` varchar(100) NOT NULL,
  `ChucVu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD PRIMARY KEY (`MaPM`,`MaSach`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`MaHS`);

--
-- Chỉ mục cho bảng `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD PRIMARY KEY (`MaPM`),
  ADD KEY `MaHS` (`MaHS`),
  ADD KEY `MaThuThu` (`MaThuThu`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaSach`);

--
-- Chỉ mục cho bảng `thongtinmuon`
--
ALTER TABLE `thongtinmuon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaHS` (`MaHS`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Chỉ mục cho bảng `thuthu`
--
ALTER TABLE `thuthu`
  ADD PRIMARY KEY (`MaThuThu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `thongtinmuon`
--
ALTER TABLE `thongtinmuon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD CONSTRAINT `chitietphieumuon_ibfk_1` FOREIGN KEY (`MaPM`) REFERENCES `phieumuon` (`MaPM`),
  ADD CONSTRAINT `chitietphieumuon_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD CONSTRAINT `phieumuon_ibfk_1` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`),
  ADD CONSTRAINT `phieumuon_ibfk_2` FOREIGN KEY (`MaThuThu`) REFERENCES `thuthu` (`MaThuThu`);

--
-- Các ràng buộc cho bảng `thongtinmuon`
--
ALTER TABLE `thongtinmuon`
  ADD CONSTRAINT `thongtinmuon_ibfk_1` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`),
  ADD CONSTRAINT `thongtinmuon_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
