-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2024 lúc 07:14 PM
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
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `note` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(5, 'Nam', 'Nam', 'nam123@gmail.com', 'vo van ngan', '55555555', '55555555555555', '2024-05-14 16:02:53', '2024-05-13 12:10:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'POCO F6 Pro lộ diện trên Geekbench với hiệu năng ấn tượng, ngày ra mắt không còn xa', 'Các đây ít hôm thì POCO F6 đã xuất hiện trên nền tảng đo điểm chuẩn Geekbench. Giờ đây đến lượt POCO F6 Pro cũng đã được phát hiện trên nền tảng này. Việc đạt một loạt chứng nhận như FCC, NBTC,.. cho thấy ngày ra mắt 2 mẫu điện thoại mới nhà POCO đã đến rất gần.', 'sample1.jpg', '2024-05-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Lộ ảnh trên tay thực tế dòng Pixel 9: Có tới 3 phiên bản, riêng dòng Pro có 2 biến thể', 'Sau khi ra mắt Google Pixel 8a thì sự chú ý của người dùng đang đổ dồn về dòng Google Pixel 9 sắp ra mắt. Trong diễn biến mới, những hình ảnh trên tay thực tế của Pixel 9, Pixel 9 Pro và Pixel 9 Pro XL đã bị rò rỉ, xác nhận một số thông số của các điện thoại.', 'sample2.jpg', '2024-05-13 02:07:14', '0000-00-00 00:00:00'),
(3, 'OPPO K12x ra mắt: Chip Snapdragon 5G, màn hình AMOLED 120Hz, giá từ 4.6 triệu đồng', 'OPPO K12 đã ra mắt tại Trung Quốc vào cuối tháng trước. Giờ đây, OPPO vừa tung ra thêm mẫu điện thoại mới thuộc dòng K là OPPO K12x với cấu hình tốt kèm giá bán hợp lý.', 'sample3.jpg', '2024-05-13 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'SamSung Galaxy S24 ultra', 4, 'Màu sắc: Bạc\r\nBộ nhớ: 1TB\r\nRam: 12GB', 26990000, 24990000, 'samsungs24ut.jpg', 'cái', NULL, NULL),
(2, 'iphone 13', 1, 'Màu sắc: Hồng\r\nBộ nhớ: 128GB\r\nRam: 6GB', 12990000, 12490000, 'ip13.jpg', 'cái', NULL, NULL),
(3, 'iphone 14', 1, 'Màu sắc: Xanh dương\r\nBộ nhớ: 512GB\r\nRam: 8GB', 23490000, 23190000, 'ip14.jpg', 'cái', NULL, NULL),
(4, 'iphone 15 plus', 1, 'Màu sắc: Hồng\r\nBộ nhớ: 128GB\r\nRam: 8GB', 22990000, 22490000, 'ip15plus.jpg', 'cái', NULL, NULL),
(5, 'iphone 12', 1, 'Màu sắc: Đen\r\nBộ nhớ: 128GB\r\nRam: 6GB', 10990000, 10490000, 'ip12.jpg', 'cái', NULL, NULL),
(6, 'SamSung Galaxy S24', 4, 'Màu sắc: Vàng\r\nBộ nhớ: 256GB\r\nRam: 8GB', 22990000, 21990000, 'samsungs24.jpg', 'cái', NULL, NULL),
(7, 'SamSung Galaxy A24', 4, 'Màu sắc: Đen\r\nBộ nhớ: 128GB\r\nRam: 6GB', 5890000, 4590000, 'samsunga24.jpg', 'cái', NULL, NULL),
(11, 'Vivo Y03', 3, 'Màu sắc: Xanh ngọc\r\nBộ nhớ: 64GB\r\nRam: 6GB', 3290000, 3190000, 'vivoy03.png', 'cái', NULL, NULL),
(12, 'SamSung Galaxy A25', 4, 'Màu sắc: Xám\r\nBộ nhớ: 128GB\r\nRam: 6GB', 6990000, 6490000, 'samsunga25.jpg', 'cái', NULL, NULL),
(18, 'SamSung Galaxy M54', 4, 'Màu sắc: Xanh\r\nBộ nhớ: 256GB\r\nRam: 8GB', 9990000, 8990000, 'samsungm54.jpg', 'cái', NULL, NULL),
(26, 'Oppo A60', 5, 'Màu sắc: Xanh ngọc\r\nBộ nhớ: 128GB\r\nRam: 8GB', 5490000, 5190000, 'oppoa60.jpg', 'cái', NULL, NULL),
(27, 'Oppo A17K', 5, 'Màu sắc: Vàng\r\nBộ nhớ: 64GB\r\nRam: 3GB', 2790000, NULL, 'oppoa17k.jpg', 'cái', NULL, NULL),
(42, 'Oppo A58', 5, 'Màu sắc: Đen\r\nBộ nhớ: 128GB\r\nRam: 8GB', 5990000, 5190000, 'oppoa58.jpg', 'cái', NULL, NULL),
(47, 'Xiaomi 14', 6, 'Màu sắc: Xanh lá cây\r\nBộ nhớ: 512GB\r\nRam: 12GB', 24490000, 21490000, 'xiaomi14.jpg', 'cái', NULL, NULL),
(48, 'Redmi Note13', 2, 'Màu sắc: Vàng\r\nBộ nhớ: 128GB\r\nRam: 8GB', 4790000, 4490000, 'redminote13.jpg', 'cái', NULL, NULL),
(51, 'SamSung Galaxy A55', 4, 'Màu sắc: Trắng\r\nBộ nhớ: 256GB\r\nRam: 12GB', 11990000, 11490000, 'samsunga55.jpg', 'cái', NULL, NULL),
(56, 'Vivo Y100', 3, 'Màu sắc: Xanh ngọc\r\nBộ nhớ: 256GB\r\nRam: 8GB', 7690000, 7490000, 'vivoy100.jpg', 'cái', NULL, NULL),
(59, 'Oppo Reno11', 5, 'Màu sắc: Hồng\r\nBộ nhớ: 256GB\r\nRam: 8GB', 8990000, 8490000, 'opporeno11.jpg', 'cái', NULL, NULL),
(60, 'Iphone 15 pro max', 2, 'Màu sắc: Titan\r\nBộ nhớ: 256GB\r\nRam: 8GB', 30000000, 28990000, 'ip15pm.jpg', 'cái', NULL, NULL),
(62, 'Iphone 15', 1, 'Màu sắc: Đen\r\nBộ nhớ: 128GB\r\nRam: 6GB', 21990000, 19990000, 'ip15.jpg', 'cái', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'samsung.jpg'),
(2, '', 'apple.jpg'),
(3, '', 'oppo.jpg'),
(4, '', 'xiaomi.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '', 'apple.jpg', NULL, NULL),
(2, 'Redmi', '', 'redmi.jpg', NULL, NULL),
(3, 'Vivo', '', 'vivo.jpg\r\n', NULL, NULL),
(4, 'SamSung', '', 'samsung.jpg', NULL, NULL),
(5, 'Oppo', '', 'oppo.jpg', NULL, NULL),
(6, 'Xiaomi', '', 'xiaomi.jpg', NULL, NULL),
(7, 'Realme', '', 'realme.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
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
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
