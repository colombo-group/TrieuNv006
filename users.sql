-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2016 at 08:20 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bai_6`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `pass` text NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `phone` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `sex` tinyint(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` char(50) NOT NULL DEFAULT 'avatar.jpg',
  `presenter` varchar(50) DEFAULT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `mail`, `lastname`, `firstname`, `pass`, `role`, `phone`, `birthday`, `sex`, `date`, `avatar`, `presenter`, `description`) VALUES
(1, 'admiooon', 'admid@gmail.com', 'Mouse', 'Mickey', '123', 1, '231654987', '2016-10-26', 1, '2016-10-28 06:40:28', 'avatar.jpg', '', 'Cuoc doi von di bat cong, cong long khong bao h thang'),
(2, 'admod', 'admod@gmail.com', 'Nguyen', 'Tung', '123', 2, '231654987', '2016-10-12', 1, '2016-10-28 06:39:14', 'admod.jpg', '', 'Cuoc doi von da khong thang, nen dung co vuot cho thang cong long'),
(3, 'DaiNguyen', 'Dai@gmail.com', 'Nguyen', 'Dai', '123456', 2, '965869593', '2016-10-29', 1, '2016-10-27 10:38:26', 'avatar.jpg', 'admin', 'Dep trai co gi sai'),
(4, 'HocNT', 'Hoc@gmail.com', 'Nguyen', 'Hoc', '123', 2, '987123654', '2016-10-25', 1, '2016-10-28 07:37:30', 'avatar.jpg', '', 'Quyet tam tan do em Ngoc Anh'),
(7, 'NgocTram', 'Tram@gmail.com', 'Ngoc', 'Tram', '123', 1, '666555444', '2016-10-18', 1, '2016-10-27 09:20:55', 'avatar.jpg', 'TrieuNv', 'xyz'),
(8, 'NhanPham', 'Nhan@gmail.com', 'Pham', 'Nhan', '123', 2, '987522222', '0000-00-00', 1, '2016-10-27 09:20:00', 'admin.jpg', 'Trieu', 'ahihi'),
(9, 'Trieu', 'Trieu@gmail.com', 'Trieu', 'Trieu', '123', 1, '1233222222', '2016-10-27', 1, '2016-10-27 09:17:56', 'avatar.jpg', '', ':D'),
(10, 'TrieuNv', 'TrieuNv@gmail.com', 'Nguyen', 'Trieu', '123', 3, '01699277055', '2016-11-10', 1, '2016-08-01 07:43:52', 'TrieuNv.jpg', '', 'Dep trai nhat lang'),
(11, 'Thu', 'Thu@gmail.com', 'Nguyen', 'Thu', '123', 1, '654987132', '2016-11-01', 2, '2016-11-03 10:10:11', 'avatar.jpg', '', ''),
(12, 'Tien', 'tien@gmail.com', 'Nguyen', 'Tien', '123', 1, '123543123', '2016-10-31', 1, '2016-11-03 10:25:02', 'Tien.jpg', '', ''),
(13, 'Thanh', 'thanh@gmail.com', 'Nguyen', 'Thanh', '123', 1, '123432123', '2016-11-03', 1, '2016-11-03 10:26:00', 'Thanh.jpg', '', ''),
(15, 'Phuc', 'phuc@gmail.com', 'Hoang', 'Phuc', '123', 1, '043249234904', '2016-11-24', 1, '2016-11-03 10:29:10', 'Phuc.jpg', '', ''),
(16, 'Hoan', 'hoan@gmail.com', 'Nguyen', 'Hoan', '123', 1, '123098875', '2016-11-07', 3, '2016-11-03 10:33:01', 'Hoan.jpg', '', ''),
(17, 'Nhan', 'nhan123@gmail.com', 'Pham', 'Nhan', '123', 1, '039495069', '2016-05-04', 1, '2016-11-04 04:23:54', 'avatar.jpg', 'Dai', ''),
(18, 'Long', 'long@colombo.com', 'Pham', 'Long', '123', 1, '123987456', '2016-11-23', 1, '2016-11-04 04:27:21', 'avatar.jpg', 'Nhan', ''),
(19, 'Dai', 'dai111@gmail.com', 'Dai', 'Dai', '123', 1, '979874234243', '2016-11-22', 1, '2016-11-05 03:30:25', 'Dai.jpg', 'Nhan', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`mail`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
