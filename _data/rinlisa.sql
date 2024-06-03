-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2024 lúc 06:23 AM
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
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `title` varchar(120) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `sort_by` varchar(10) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `content`, `img`, `parent`, `title`, `description`, `status`, `sort_by`, `view`, `icon`, `slug`, `created_at`, `updated_at`) VALUES
(74, 1, 'Đồng hồ', NULL, NULL, 0, NULL, NULL, 'true', 'Product', NULL, NULL, 'dong-ho', '2024-01-05 03:09:59', '2024-01-05 03:09:59'),
(75, 1, 'Mặt', NULL, NULL, 74, NULL, NULL, 'true', 'Product', NULL, NULL, 'mat', '2024-01-05 03:10:06', '2024-01-05 03:10:06'),
(76, 1, 'Dây', NULL, NULL, 74, NULL, NULL, 'true', 'Product', NULL, NULL, 'day', '2024-01-05 03:10:14', '2024-01-05 03:10:14'),
(77, 1, 'Cafe', NULL, NULL, 0, NULL, NULL, 'true', 'Product', NULL, NULL, 'cafe', '2024-01-05 03:10:20', '2024-01-05 03:10:20'),
(78, 1, 'Mỹ phẩm', NULL, NULL, 0, NULL, NULL, 'true', 'Product', NULL, NULL, 'my-pham', '2024-01-05 03:10:32', '2024-01-05 03:10:32'),
(79, 1, 'Trái cây', NULL, NULL, 0, NULL, NULL, 'true', 'Product', NULL, NULL, 'trai-cay', '2024-01-05 03:10:40', '2024-01-05 03:10:40'),
(80, 1, 'Tin tức', NULL, NULL, 0, NULL, NULL, 'true', 'News', NULL, NULL, 'tin-tuc', '2024-01-05 03:10:48', '2024-01-05 03:10:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tuấn', '0977572947', 'tuan.pn92@gmail.com', 'true', '2023-12-17 21:37:59', '2023-12-17 21:37:59'),
(3, 'Long Le', '0353891860', 'levietlong.2910@gmail.com', 'true', '2023-12-18 07:43:04', '2023-12-18 07:43:04'),
(4, 'Trương thị Vinh', '0936146929', NULL, 'true', '2023-12-20 02:52:36', '2023-12-20 02:52:36'),
(6, NULL, NULL, NULL, 'true', '2023-12-23 13:41:20', '2023-12-23 13:41:20'),
(7, 'Nam', '0903435979', NULL, 'true', '2023-12-25 06:40:46', '2023-12-25 06:40:46'),
(8, 'Hoàng xuân Hoàn', '0912600215', NULL, 'true', '2024-01-02 23:01:48', '2024-01-02 23:01:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `note` varchar(10) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `post_id`, `section_id`, `name`, `img`, `note`, `content`, `created_at`, `updated_at`) VALUES
(550, 132, NULL, NULL, 'z4790439343228_7e3ce4843b4a1bf7683f38ea93f0a167.jpg', NULL, NULL, '2023-11-09 01:28:56', '2023-11-09 01:28:56'),
(551, 132, NULL, NULL, 'z4790598718499_a5387de176e632c08771a4e8db122328.jpg', NULL, NULL, '2023-11-09 01:28:56', '2023-11-09 01:28:56'),
(552, 132, NULL, NULL, 'z4791019540007_87950f4c9dd715651073aa798efa82b9.jpg', NULL, NULL, '2023-11-09 01:28:56', '2023-11-09 01:28:56'),
(553, 134, NULL, NULL, '39_z4790439343228_7e3ce4843b4a1bf7683f38ea93f0a167.jpg', NULL, NULL, '2023-11-09 01:39:19', '2023-11-09 01:39:19'),
(554, 134, NULL, NULL, '50_z4790598718499_a5387de176e632c08771a4e8db122328.jpg', NULL, NULL, '2023-11-09 01:39:19', '2023-11-09 01:39:19'),
(555, 134, NULL, NULL, '27_z4791019540007_87950f4c9dd715651073aa798efa82b9.jpg', NULL, NULL, '2023-11-09 01:39:19', '2023-11-09 01:39:19'),
(556, 135, NULL, NULL, 'z4739828117914_b3135b197feaa67ae7df71c64f49135c.jpg', NULL, NULL, '2023-11-09 01:43:30', '2023-11-09 01:43:30'),
(557, 136, NULL, NULL, '82_z4739828117914_b3135b197feaa67ae7df71c64f49135c.jpg', NULL, NULL, '2023-11-09 02:15:10', '2023-11-09 02:15:10'),
(558, 136, NULL, NULL, '68_z4790439343228_7e3ce4843b4a1bf7683f38ea93f0a167.jpg', NULL, NULL, '2023-11-09 02:15:10', '2023-11-09 02:15:10'),
(559, 136, NULL, NULL, '82_z4790598718499_a5387de176e632c08771a4e8db122328.jpg', NULL, NULL, '2023-11-09 02:15:10', '2023-11-09 02:15:10'),
(560, 136, NULL, NULL, '77_z4791019540007_87950f4c9dd715651073aa798efa82b9.jpg', NULL, NULL, '2023-11-09 02:15:10', '2023-11-09 02:15:10'),
(561, 137, NULL, NULL, '9054826469280461025.mp4', NULL, NULL, '2023-11-30 16:02:41', '2023-11-30 16:02:41'),
(562, 138, NULL, NULL, 'Picture1.jpg', NULL, NULL, '2023-12-04 07:09:11', '2023-12-04 07:09:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `name`, `slug`, `view`, `parent`, `created_at`, `updated_at`) VALUES
(51, 1, 'Đồng hồ', 'dong-ho', 1, 0, '2024-01-05 10:11:06', '2024-01-05 10:12:01'),
(52, 1, 'Mặt', 'mat', NULL, 51, '2024-01-05 10:11:14', '2024-01-05 10:11:14'),
(53, 1, 'Dây', 'day', NULL, 51, '2024-01-05 10:11:21', '2024-01-05 10:11:21'),
(54, 1, 'Cafe', 'cafe', 2, 0, '2024-01-05 10:11:28', '2024-01-05 10:12:02'),
(55, 1, 'Mỹ phẩm', 'my-pham', 3, 0, '2024-01-05 10:11:35', '2024-01-05 10:12:03'),
(56, 1, 'Trái cây', 'trai-cay', 4, 0, '2024-01-05 10:11:41', '2024-01-05 10:12:03'),
(57, 1, 'Tin tức', 'tin-tuc', 5, 0, '2024-01-05 10:11:53', '2024-01-05 10:12:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_04_13_035737_create_images_table', 2),
(10, '2023_04_13_084106_create_provinces_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `title` varchar(120) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `sort_by` varchar(10) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `user_id`, `category_id`, `name`, `sku`, `content`, `img`, `parent`, `title`, `description`, `status`, `sort_by`, `view`, `icon`, `slug`, `created_at`, `updated_at`) VALUES
(83, 1, 75, 'Hình dạng', 'shape', NULL, NULL, 0, NULL, NULL, 'true', NULL, NULL, NULL, 'hinh-dang', '2024-01-10 02:18:51', '2024-01-10 02:18:51'),
(84, 1, 75, 'Màu sắc', 'color', NULL, NULL, 0, NULL, NULL, 'true', NULL, NULL, NULL, 'mau-sac', '2024-01-10 02:26:02', '2024-01-10 02:26:02'),
(85, 1, 75, 'Kích thước', 'size', NULL, NULL, 0, NULL, NULL, 'true', NULL, NULL, NULL, 'kich-thuoc', '2024-01-10 02:26:14', '2024-01-10 02:26:14'),
(86, 1, 75, 'Tròn', NULL, NULL, NULL, 83, NULL, NULL, 'true', NULL, 1, NULL, 'tron', '2024-01-10 02:26:29', '2024-01-10 03:01:40'),
(87, 1, 75, 'Vuông', NULL, NULL, NULL, 83, NULL, NULL, 'true', NULL, 3, NULL, 'vuong', '2024-01-10 02:26:39', '2024-01-10 03:02:35'),
(88, 1, 75, 'Tonneau', NULL, NULL, NULL, 83, NULL, NULL, 'true', NULL, 2, NULL, 'tonneau', '2024-01-10 02:26:50', '2024-01-10 03:01:58'),
(89, 1, 75, 'Trắng', NULL, NULL, NULL, 84, NULL, NULL, 'true', NULL, 1, NULL, 'trang', '2024-01-10 02:27:06', '2024-01-10 03:02:44'),
(90, 1, 75, 'Đen', NULL, NULL, NULL, 84, NULL, NULL, 'true', NULL, 2, NULL, 'den', '2024-01-10 02:27:23', '2024-01-10 03:02:49'),
(91, 1, 75, 'Lớn', NULL, NULL, NULL, 85, NULL, NULL, 'true', NULL, 1, NULL, 'lon', '2024-01-10 02:55:30', '2024-01-10 03:02:54'),
(92, 1, 75, 'Nhỏ', NULL, NULL, NULL, 85, NULL, NULL, 'true', NULL, 2, NULL, 'nho', '2024-01-10 03:00:55', '2024-01-10 03:02:59'),
(93, 1, 75, 'Vừa', NULL, NULL, NULL, 85, NULL, NULL, 'true', NULL, 3, NULL, 'vua', '2024-01-10 03:03:18', '2024-01-10 03:03:18'),
(94, 1, 75, 'Vàng', NULL, NULL, NULL, 84, NULL, NULL, 'true', NULL, 3, NULL, 'vang', '2024-01-10 03:03:27', '2024-01-10 03:03:33'),
(95, 1, 76, 'Vật liệu', 'material', NULL, NULL, 0, NULL, NULL, 'true', NULL, NULL, NULL, 'vat-lieu', '2024-01-10 03:04:13', '2024-01-10 03:04:13'),
(96, 1, 76, 'Kim loại', NULL, NULL, NULL, 95, NULL, NULL, 'true', NULL, 1, NULL, 'kim-loai', '2024-01-10 03:04:26', '2024-01-10 03:04:26'),
(97, 1, 76, 'Da thú', NULL, NULL, NULL, 95, NULL, NULL, 'true', NULL, 2, NULL, 'da-thu', '2024-01-10 03:04:36', '2024-01-10 03:04:36'),
(98, 1, 76, 'Vải', NULL, NULL, NULL, 95, NULL, NULL, 'true', NULL, 3, NULL, 'vai', '2024-01-10 03:04:45', '2024-01-10 03:04:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `info` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `sort_by` varchar(10) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `shape` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `material` varchar(20) DEFAULT NULL,
  `title` varchar(120) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `name`, `detail`, `info`, `content`, `status`, `sort_by`, `slug`, `img`, `shape`, `color`, `size`, `material`, `title`, `description`, `created_at`, `updated_at`) VALUES
(211, 1, 75, 'ád', 'ád', NULL, '<p>&aacute;dasd</p>', 'true', 'News', 'ad', NULL, 'Lớn', NULL, NULL, NULL, NULL, NULL, '2024-01-12 21:51:22', '2024-01-12 21:51:22'),
(212, 1, 75, 'ád', 'ádasdasd', NULL, NULL, 'true', 'News', 'ad', NULL, 'Nhỏ', NULL, NULL, NULL, NULL, NULL, '2024-01-12 21:52:13', '2024-01-12 21:52:13'),
(213, 1, 75, 'á', 'đá', NULL, '<p>&aacute;dasdasd</p>', 'true', 'News', 'a', NULL, 'Vuông', 'Đen', 'Nhỏ', NULL, NULL, NULL, '2024-01-12 21:53:11', '2024-01-12 21:53:11'),
(214, 1, 76, 'á', 'đá', NULL, '<p>&aacute;dasd</p>', 'true', 'News', 'a', NULL, NULL, NULL, NULL, 'Da thú', NULL, NULL, '2024-01-12 21:53:25', '2024-01-12 21:53:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `header` text DEFAULT NULL,
  `hotline` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `name`, `address`, `title`, `description`, `footer`, `header`, `hotline`, `email`, `facebook`, `youtube`, `maps`, `img`, `favicon`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Công Viên Nghĩa trang Thiên Đường', 'Văn phòng giao dịch: Công ty cổ phần Nhà Ở Ngay RECO, số 19-21 Vũ Trọng Phụng, phường Thanh Xuân Trung, quận Thanh Xuân, Hà Nội', 'Công Viên Nghĩa trang Thiên Đường', 'Công Viên Nghĩa trang Thiên Đường', NULL, NULL, '038.930.1518', 'cskh.congvienthienduong@gmail.com', NULL, NULL, NULL, 'logo.png', '7_Rectangle 180_3.png', NULL, NULL, '2023-12-27 02:47:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `user_id`, `name`, `img`, `content`, `created_at`, `updated_at`) VALUES
(2, 1, 'áda', 'urushi_top.webp', 'sdasdasdasd', '2023-10-30 07:37:45', '2024-01-06 02:26:12'),
(3, 1, 'ádasd', 'section01_img01.png', NULL, '2024-01-06 02:26:20', '2024-01-06 03:21:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `yourname` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `yourname`, `email`, `address`, `phone`, `facebook`, `permission`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Nguyễn Văn Tuấn', 'tuan.pn92@gmail.com', 'Hà Nội', '0977572947', NULL, 1, NULL, '$2y$10$9fz78ri8PAvBIbSerrENiuTjo5WlAXRXdfCtkh.40ByOcTeSNYCsO', NULL, '2023-03-20 09:17:19', '2023-10-27 00:23:31'),
(2, 'admin', 'Admin', 'admin@gmail.com', 'Hà Nội', '0987654321', NULL, 1, NULL, '$2y$10$iZ2pQhjkLXIhP61difOIO.8Lra.RnxdNOwx78OBFh0ZdPnh40HrYC', NULL, '2023-10-27 00:25:09', '2023-11-10 03:30:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
