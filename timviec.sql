-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2022 lúc 11:45 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `timviec`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucviec`
--

CREATE TABLE `danhmucviec` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `trangthai_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmucviec`
--

INSERT INTO `danhmucviec` (`id_danhmuc`, `tendanhmuc`, `trangthai_dm`) VALUES
(3, 'IT', 1),
(4, 'LUẬT', 1),
(5, 'Khác', 1),
(6, 'CÔNG NGHỆ KỸ THUẬT', 1),
(7, 'Y HỌC', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `admin` int(11) NOT NULL,
  `nhatuyendung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `password`, `phone`, `address`, `admin`, `nhatuyendung`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '0123456789', 'ĐẠI HỌC CẦN THƠ', 1, 0),
('cuong123', '4297f44b13955235245b2497399d7a93', '0123456789', '123455435', 0, 1),
('trannhanthe', '4297f44b13955235245b2497399d7a93', '0123456789', '1234', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vieclam`
--

CREATE TABLE `vieclam` (
  `id` int(11) NOT NULL,
  `id_danhmuc` varchar(100) NOT NULL,
  `tenviec` varchar(100) NOT NULL,
  `mota` longtext NOT NULL,
  `username` varchar(100) NOT NULL,
  `anhbia` varchar(100) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vieclam`
--

INSERT INTO `vieclam` (`id`, `id_danhmuc`, `tenviec`, `mota`, `username`, `anhbia`, `trangthai`, `ngaytao`) VALUES
(18, '4', 'CẦN TUYỂN 5 LUẬT SƯ CHUYÊN LUẬT HÀNH CHÍNH', '<p>Yêu cầu:</p><ul><li>Nắm vững kiến thức về luật hành chính công nói chung</li><li>tốt nghiệp đại học chính quy Khá trở lên</li><li>Biết nhiều ngoại ngữ là 1 lợi thế</li></ul><p>Phúc lợi:</p><ul><li>Được tham gia đầy đủ BHXH</li><li>Lương: 8-15tr</li></ul><p>Nộp hồ sơ:</p><ul><li>Hồ sơ gửi về công ti: …..</li><li>Hạn chót: 31/12/2022</li><li>Mọi thắc mắt vui lòng liên hệ: zzz@gmail.com</li></ul>', 'cuong123', '', 1, '2022-11-17 04:31:08'),
(19, '5', 'TUYỂN BẢO VỆ TOÀN THỜI GIAN ', '<p>Yêu cầu:</p><ul><li>Đảm bảo nghiệp vụ bảo vệ</li><li>Có khả năng xử lý tình huống nhanh</li><li>Biết sửa chữa điện dân dụng và có nghiệp vụ PCCC là 1 lợi thế</li></ul><p>Phúc lợi:&nbsp;</p><ul><li>Được hưởng đầy đủ chính sách: BHXH</li><li>Lương: 8-10tr</li><li>…</li></ul><p>Nộp hồ sơ:&nbsp;</p><ul><li>Tại công ti</li><li>Hạn chót: 31/12/2022</li><li>Giải đáp: xxx@gmail.com</li></ul>', 'cuong123', '1668665707_tải xuống.jpg', 1, '2022-11-17 06:15:15'),
(20, '5', 'Tìm nhân viên bán hàng', '<p>Yêu cầu công việc:</p><ul><li>Bán hàng ngày<strong> 4</strong> giờ, <strong>6</strong> ngày trên tuần</li><li>Làm việc theo ca, có thể xoay ca</li><li>Địa điểm: Centercoconut, Ngan Dừa, Vị Thanh</li><li>Có tính siêng năng, chăm chỉ</li></ul><p>Lương 15-20k/h</p>', 'trannhanthe', '1668665862_seller.jpg', 1, '2022-11-18 06:12:39'),
(21, '7', 'Tuyển 5 Bác Sĩ đa khoa cho bệnh viện THYN', '<p>Yêu cầu công việc</p><ul><li>5 năm kinh nghiệm</li><li>Có bằng cấp</li><li>Biết chuyên khoa là một lợi thế</li><li>Viết chữ coi được</li></ul><p>Phúc lợi</p><ul><li>Lương thỏa thuận từ 30.000.000&nbsp;</li><li>Bao ăn bao ở</li><li>Có xe đưa đón</li><li>Được trợ cấp các loại bảo hiểm</li></ul><p>Hồ sơ :</p><p>Nộp tại BV THYN. Ngan dừa, Tp Vị Thanh. Trước ngày 30/12/2022.</p>', 'trannhanthe', '1668665998_doctor.jpg', 1, '2022-11-17 06:20:04'),
(22, '3', 'THYN Group Seeking 100 Fresher php dev', '<p><strong>Required:</strong></p><ul><li>knowledge of php, html, JS,…</li><li>English: TOEIC 500+, ELTS 5.0+, &nbsp;B1+,…</li><li>present Skill is a benefit</li></ul><p>Salary 800$ - 3000$</p><p>Sent your applicant to THYN Group At xxxxxxxxx, xxxxxxxx, xxxxxx, xxxxxxxx by 30/11/2022</p><p>&nbsp;</p>', 'cuong123', '1668739101_dev-la-gi-1.jpg', 0, '2022-11-18 02:38:21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmucviec`
--
ALTER TABLE `danhmucviec`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `vieclam`
--
ALTER TABLE `vieclam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmucviec`
--
ALTER TABLE `danhmucviec`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `vieclam`
--
ALTER TABLE `vieclam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
