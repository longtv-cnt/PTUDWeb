-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2021 lúc 05:45 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ontap`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietvandon`
--

CREATE TABLE `chitietvandon` (
  `id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vandon` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hanghoa_id` int(19) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietvandon`
--

INSERT INTO `chitietvandon` (`id`, `vandon`, `hanghoa_id`, `soluong`) VALUES
('vandon1', 'VD02DN', 2, 1),
('vandon2', 'VD01HP', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hangsx_id` int(19) NOT NULL,
  `quycach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`id`, `ten`, `hangsx_id`, `quycach`) VALUES
(1, 'apple Watch', 1, 'đóng hộp'),
(2, 'B phone 3', 2, 'đóng hộp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`id`, `ten`, `mota`) VALUES
(1, 'apple', 'Công nghệ hiện đại màn hình tràn viền'),
(2, 'BKAV', 'chống trộm');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `hienthi`
-- (See below for the actual view)
--
CREATE TABLE `hienthi` (
`id` varchar(32)
,`hovaten` varchar(255)
,`ten` varchar(255)
,`soluong` int(11)
,`nguoinhan` varchar(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `hovaten`, `dienthoai`, `email`, `diachi`) VALUES
(1, 'Trần Văn Long', '0233455666', 'example@gmail.com', 'Hải Phòng'),
(2, 'Trần Hồng Hà', '0876789789', 'example2@gmail.com', 'Vĩnh Phúc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tendaydu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyenhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `matkhau`, `tendaydu`, `quyenhan`) VALUES
(1, 'longtv', '123456', 'Trần Văn Long', 1),
(2, 'hoant', '123456', 'Nguyễn Thị Hoa', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vandon`
--

CREATE TABLE `vandon` (
  `id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhanvien_id` int(11) NOT NULL,
  `trangthai` int(1) NOT NULL,
  `nguoinhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia chi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaygiaohang` datetime NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vandon`
--

INSERT INTO `vandon` (`id`, `nhanvien_id`, `trangthai`, `nguoinhan`, `dienthoai`, `dia chi`, `ngaygiaohang`, `ghichu`) VALUES
('VD01HP', 1, 1, 'Nguyễn Hà Đông', '0945645332', 'An Dương HP', '2021-11-29 10:33:25', 'Hàng dễ vỡ'),
('VD02DN', 2, 2, 'Hải Vân', '0936734678', 'Đà Nẵng', '2021-11-29 09:27:25', '');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `hienthi`
--
DROP TABLE IF EXISTS `hienthi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hienthi`  AS SELECT `vandon`.`id` AS `id`, `nhanvien`.`hovaten` AS `hovaten`, `hanghoa`.`ten` AS `ten`, `chitietvandon`.`soluong` AS `soluong`, `vandon`.`nguoinhan` AS `nguoinhan` FROM (((`vandon` join `nhanvien`) join `hanghoa`) join `chitietvandon`) WHERE `vandon`.`nhanvien_id` = `nhanvien`.`id` AND `vandon`.`id` = `chitietvandon`.`vandon` AND `hanghoa`.`id` = `chitietvandon`.`hanghoa_id` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietvandon`
--
ALTER TABLE `chitietvandon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vandon` (`vandon`),
  ADD KEY `hanghoa_id` (`hanghoa_id`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hangsx_id` (`hangsx_id`);

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vandon`
--
ALTER TABLE `vandon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanvien_id` (`nhanvien_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietvandon`
--
ALTER TABLE `chitietvandon`
  ADD CONSTRAINT `chitietvandon_ibfk_1` FOREIGN KEY (`vandon`) REFERENCES `vandon` (`id`),
  ADD CONSTRAINT `chitietvandon_ibfk_2` FOREIGN KEY (`hanghoa_id`) REFERENCES `hanghoa` (`id`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`hangsx_id`) REFERENCES `hangsanxuat` (`id`);

--
-- Các ràng buộc cho bảng `vandon`
--
ALTER TABLE `vandon`
  ADD CONSTRAINT `vandon_ibfk_1` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
