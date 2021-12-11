-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 09:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dieuchuyen`
--

CREATE TABLE `dieuchuyen` (
  `id` varchar(32) NOT NULL,
  `hocsinh` varchar(32) NOT NULL,
  `tungay` datetime NOT NULL,
  `lop_id` int(11) NOT NULL,
  `lydo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id` varchar(32) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `lop_id` int(11) NOT NULL,
  `hovaten` varchar(255) NOT NULL,
  `ngaysinh` datetime NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`id`, `trangthai`, `lop_id`, `hovaten`, `ngaysinh`, `mota`) VALUES
('1', 1, 2, 'Nguyễn Văn A', '1989-07-05 00:00:00', 'aaaa'),
('12', 1, 1, '', '2021-12-31 00:00:00', 'abc'),
('22', 7, 2, 'sadfdf', '2021-12-29 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `id` int(11) NOT NULL,
  `namvaotruong` int(11) NOT NULL,
  `khoihientai` int(11) NOT NULL,
  `datotnghiep` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`id`, `namvaotruong`, `khoihientai`, `datotnghiep`) VALUES
(1, 2000, 12, b'00'),
(2, 2000, 12, b'00');

-- --------------------------------------------------------

--
-- Table structure for table `thannhan`
--

CREATE TABLE `thannhan` (
  `id` int(11) NOT NULL,
  `hocsinh_id` varchar(32) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `quanhe` varchar(50) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tongketnam`
--

CREATE TABLE `tongketnam` (
  `id` int(11) NOT NULL,
  `hocsinh_id` varchar(32) NOT NULL,
  `namhoc` varchar(9) NOT NULL,
  `nhanxetchung` text NOT NULL,
  `uudiem` text NOT NULL,
  `cankhacphuc` text NOT NULL,
  `duoclenlop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `tendaydu` varchar(255) NOT NULL,
  `quyenhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `matkhau`, `tendaydu`, `quyenhan`) VALUES
(1, 'vinh', 'a', 'Quang Vinh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dieuchuyen`
--
ALTER TABLE `dieuchuyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocsinh` (`hocsinh`),
  ADD KEY `lop_id` (`lop_id`);

--
-- Indexes for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lop_id` (`lop_id`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thannhan`
--
ALTER TABLE `thannhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocsinh_id` (`hocsinh_id`);

--
-- Indexes for table `tongketnam`
--
ALTER TABLE `tongketnam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocsinh_id` (`hocsinh_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dieuchuyen`
--
ALTER TABLE `dieuchuyen`
  ADD CONSTRAINT `dieuchuyen_ibfk_1` FOREIGN KEY (`hocsinh`) REFERENCES `hocsinh` (`id`),
  ADD CONSTRAINT `dieuchuyen_ibfk_2` FOREIGN KEY (`lop_id`) REFERENCES `lop` (`id`);

--
-- Constraints for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_ibfk_1` FOREIGN KEY (`lop_id`) REFERENCES `lop` (`id`);

--
-- Constraints for table `thannhan`
--
ALTER TABLE `thannhan`
  ADD CONSTRAINT `thannhan_ibfk_1` FOREIGN KEY (`hocsinh_id`) REFERENCES `hocsinh` (`id`);

--
-- Constraints for table `tongketnam`
--
ALTER TABLE `tongketnam`
  ADD CONSTRAINT `tongketnam_ibfk_1` FOREIGN KEY (`hocsinh_id`) REFERENCES `hocsinh` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
