-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2021 lúc 09:54 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thcs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dieuchuyen`
--

CREATE TABLE `dieuchuyen` (
  `id` int(11) NOT NULL,
  `hocsinh` int(11) NOT NULL,
  `tungay` datetime NOT NULL,
  `lop_id` int(11) NOT NULL,
  `lydo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `lop_id` int(11) NOT NULL,
  `hovaten` varchar(255) NOT NULL,
  `ngaysinh` datetime NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`id`, `trangthai`, `lop_id`, `hovaten`, `ngaysinh`, `mota`) VALUES
(123, 1, 2, 'Mai Anh', '2000-12-06 09:38:39', ''),
(124, 1, 3, 'Mai Hoa', '2000-12-06 09:38:39', ''),
(125, 1, 1, 'Đào Anh', '2000-12-06 09:44:07', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(11) NOT NULL,
  `namvaotruong` int(11) NOT NULL,
  `khoihientai` int(11) NOT NULL,
  `datotnghiep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `namvaotruong`, `khoihientai`, `datotnghiep`) VALUES
(1, 2018, 7, 0),
(2, 2018, 7, 0),
(3, 2019, 6, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thannhan`
--

CREATE TABLE `thannhan` (
  `id` int(11) NOT NULL,
  `hocsinh_id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `quanhe` varchar(50) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tongketnam`
--

CREATE TABLE `tongketnam` (
  `id` int(11) NOT NULL,
  `hocsinh_id` int(11) NOT NULL,
  `namhoc` varchar(9) NOT NULL,
  `nhanxetchung` text NOT NULL,
  `uudiem` text NOT NULL,
  `cankhacphuc` text NOT NULL,
  `duoclenlop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tongketnam`
--

INSERT INTO `tongketnam` (`id`, `hocsinh_id`, `namhoc`, `nhanxetchung`, `uudiem`, `cankhacphuc`, `duoclenlop`) VALUES
(1, 123, '', 'có sáng tạo, hòa đồng', 'hoàn thành bài tập ', '', 0),
(2, 124, '', 'có sáng tạo, hòa đồng, vui vẻ', 'hoàn thành bài tập ', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `tendaydu` varchar(255) NOT NULL,
  `quyenhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `matkhau`, `tendaydu`, `quyenhan`) VALUES
(2, 'linh', '1', 'Phạm Thùy Linh', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dieuchuyen`
--
ALTER TABLE `dieuchuyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocsinh` (`hocsinh`),
  ADD KEY `lop_id` (`lop_id`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lop_id` (`lop_id`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thannhan`
--
ALTER TABLE `thannhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tongketnam`
--
ALTER TABLE `tongketnam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocsinh_id` (`hocsinh_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dieuchuyen`
--
ALTER TABLE `dieuchuyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thannhan`
--
ALTER TABLE `thannhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tongketnam`
--
ALTER TABLE `tongketnam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dieuchuyen`
--
ALTER TABLE `dieuchuyen`
  ADD CONSTRAINT `dieuchuyen_ibfk_1` FOREIGN KEY (`hocsinh`) REFERENCES `hocsinh` (`id`),
  ADD CONSTRAINT `dieuchuyen_ibfk_2` FOREIGN KEY (`lop_id`) REFERENCES `lop` (`id`);

--
-- Các ràng buộc cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_ibfk_1` FOREIGN KEY (`lop_id`) REFERENCES `lop` (`id`);

--
-- Các ràng buộc cho bảng `tongketnam`
--
ALTER TABLE `tongketnam`
  ADD CONSTRAINT `tongketnam_ibfk_1` FOREIGN KEY (`hocsinh_id`) REFERENCES `hocsinh` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
