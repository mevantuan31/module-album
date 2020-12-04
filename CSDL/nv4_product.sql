-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 04, 2020 lúc 04:31 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baithivinades`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nv4_product`
--

CREATE TABLE `nv4_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `weight` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nv4_product`
--

INSERT INTO `nv4_product` (`id`, `product_name`, `product_image`, `product_desc`, `created_at`, `updated_at`, `category_id`, `weight`) VALUES
(19, '#1 HLTV', 'iuubp2wdbhygmtaeegxluf.jpg', 'S1mple 1vs9', 1607050328, 0, 19, 1),
(20, 'Aduvjp', 'sandro-katalina-k1bo_vtizss-unsplash.jpg', 'dasdasd', 1607050777, 0, 20, 2),
(21, 'dsads', 'anh-1-5-1605274159536.jpg', 'dasdasdlol', 1607050793, 0, 21, 3),
(22, 'dsads', 'image1-31.jpg', 'dsavcxvxc', 1607050872, 0, 23, 4),
(23, 'dsads', '3_1.jpg', 'dsavcxvxccxczx', 1607050883, 0, 24, 5),
(24, 'fdvcc', '531adb4f85d3a2b6_1920xh_1.jpg', 'fdfhgjkljhgfytdsf', 1607050928, 0, 21, 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nv4_product`
--
ALTER TABLE `nv4_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nv4_product`
--
ALTER TABLE `nv4_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
