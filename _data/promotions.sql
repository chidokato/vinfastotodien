-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 03, 2024 lúc 06:12 AM
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
-- Cơ sở dữ liệu: `rinlisa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`id`, `user_id`, `product_id`, `name`, `parent`, `slug`, `img`, `content`, `status`, `title`, `description`, `created_at`, `updated_at`) VALUES
(8, 1, NULL, 'sale thang 1', 0, 'sale-thang-1', NULL, 'sale thang 1', 'true', 'sale thang 1', 'sale thang 1', '2024-01-31 01:42:34', '2024-01-31 01:42:34'),
(9, NULL, 614, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 01:42:34', '2024-01-31 01:42:34'),
(10, NULL, 613, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 01:42:34', '2024-01-31 01:42:34'),
(11, NULL, 612, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 01:42:34', '2024-01-31 01:42:34'),
(12, NULL, 611, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 01:42:34', '2024-01-31 01:42:34'),
(13, NULL, 610, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 01:42:34', '2024-01-31 01:42:34'),
(14, NULL, 574, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:31:21', '2024-01-31 02:31:21'),
(15, NULL, 573, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:31:21', '2024-01-31 02:31:21'),
(16, NULL, 572, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:31:21', '2024-01-31 02:31:21'),
(17, NULL, 571, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:31:21', '2024-01-31 02:31:21'),
(18, NULL, 592, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:32:19', '2024-01-31 02:32:19'),
(19, NULL, 591, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:32:19', '2024-01-31 02:32:19'),
(20, NULL, 590, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:32:19', '2024-01-31 02:32:19'),
(21, NULL, 588, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:32:19', '2024-01-31 02:32:19'),
(22, NULL, 587, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:32:19', '2024-01-31 02:32:19'),
(23, NULL, 586, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:32:19', '2024-01-31 02:32:19');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
