-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th4 29, 2023 lúc 09:10 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ct271`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'Thu Thảo', 'thao47827@gmail.com', '123456789', 'z3242649918652_63438f36ab850d0478e469ca9a3770f3.jpg', '0946053795', 'Việt Nam', 'Quản lí', 'Tôi là một nhà phát triển web');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(100) NOT NULL,
  `box_title` varchar(255) NOT NULL,
  `box_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'GIÁ TỐT NHẤT', 'Bạn có thể kiểm tra giá cả trên tất cả các trang web khác rồi so sánh với chúng tôi'),
(2, 'ĐẢM BẢO SỰ HÀI LÒNG 100% TỪ CHÚNG TÔI', 'Hoàn trả miễn phí mọi thứ trong 3 tháng'),
(3, 'CHÚNG TÔI YÊU KHÁCH HÀNG CỦA CHÚNG TÔI', 'Chúng tôi được biết là nhà cung cấp dịch vụ tốt nhất có thể');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `size`) VALUES
(20, '::1', 1, 'Nhỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Nam', ''),
(2, 'Nữ', ''),
(3, 'Trẻ Em', ''),
(4, 'Khác', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(3, 'Thu Thảo', 'nguyenthuthao.010102@gmail.com', '123456', 'Việt Nam', 'Cà Mau', '0946053795', 'Cà Mau', 'z3376318597622_1c112c0eaec07114d15fede67a198a9c.jpg', '::1'),
(4, 'Anne', 'anne123@gmail.com', '123456789', 'Việt Nam', 'Cần Thơ', '0913088254', 'Ninh Kiều', 'Anne.png', '::1'),
(5, 'Nguyễn Thu Thảo', 'thao123@gmail.com', '123456789', 'Việt Nam', 'Cà Mau', '0946053795', 'Cái Nước', 'Ava1.jpg', '::1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `product_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(17, 3, 17, 190000, 617445955, 1, 'Nhỏ', '2023-04-13 08:34:11', 'Chưa hoàn tất'),
(18, 3, 18, 250000, 2022987965, 1, 'Nhỏ', '2023-04-13 08:34:45', 'Chưa hoàn tất'),
(19, 4, 2, 150000, 1592514184, 1, 'Lớn', '2023-04-16 10:42:37', 'Hoàn tất'),
(20, 4, 2, 150000, 2043613283, 1, 'Nhỏ', '2023-04-20 13:07:02', 'Chưa hoàn tất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_id`, `amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(2, 1592514184, 150000, 'Chuyển khoản ngân hàng', 544565464, '2023-04-16'),
(3, 1592514184, 150000, 'Chuyển khoản ngân hàng', 4464646, '2023-04-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`) VALUES
(2, 1, 2, '2023-04-15 09:04:51', 'Áo croptop', 'croptop.jpg', 'croptop.jpg', 'croptop.jpg', '150000', '', 'Croptop'),
(3, 1, 1, '2023-04-15 07:52:18', 'Áo len cổ lọ', 'ao-len-co-lo.jpg', 'ao-len-co-lo.jpg', 'ao-len-co-lo.jpg', '160000', '', 'Áo len'),
(4, 1, 1, '2023-03-28 15:15:57', 'Áo vest blazer', 'ao-vest-blazer-dep-3.jpg', 'ao-vest-blazer-dep-3.jpg', 'ao-vest-blazer-dep-3.jpg', '200000', '', 'Vest blazer'),
(5, 1, 2, '2023-03-28 15:16:11', 'Áo thun tay ngắn', 't-shirt.jpg', 't-shirt.jpg', 't-shirt.jpg', '120000', '', 'Áo thun'),
(6, 1, 2, '2023-03-28 15:16:29', 'Áo sơ mi nữ', 'somi.jpg', 'somi.jpg', 'somi.jpg', '140000', '', 'Sơ mi nữ'),
(7, 1, 1, '2023-03-28 15:16:40', 'Áo sweater', 'swt.jpg', 'swt.jpg', 'swt.jpg', '210000', '', 'Sweater'),
(8, 1, 2, '2023-03-28 15:16:52', 'Áo gile', 'gile.jpg', 'gile.jpg', 'gile.jpg', '180000', '', 'Gile'),
(9, 1, 1, '2023-03-28 15:17:02', 'Áo gile túi hộp', 'gile-tui-hop.jpg', 'gile-tui-hop.jpg', 'gile-tui-hop.jpg', '200000', '', 'Gile túi hộp'),
(10, 1, 1, '2023-03-28 15:17:14', 'Áo sơ mi nam', 'somi-vest-trang.jpg', 'somi-vest-trang.jpg', 'somi-vest-trang.jpg', '190000', '', 'Sơ mi nam'),
(11, 3, 2, '2023-03-28 15:17:36', 'Váy cổ vuông', 'covuong1.jpg', 'covuong2.jpg', 'covuong1.jpg', '220000', '', 'Váy cổ vuông'),
(12, 3, 2, '2023-03-28 15:17:59', 'Váy hai dây', 'dress.jpg', 'dress.jpg', 'dress.jpg', '170000', '', 'Váy hai dây'),
(13, 2, 2, '2023-03-28 15:18:15', 'Chân váy chữ A', 'chan-vay-chu-a.jpg', 'chan-vay-chu-a.jpg', 'chan-vay-chu-a.jpg', '185000', '', 'Chân váy chữ A'),
(14, 2, 2, '2023-03-28 15:18:29', 'Quần jean', 'jean.png', 'jean.png', 'jean.png', '195000', '', 'Jean'),
(15, 2, 1, '2023-03-28 15:18:50', 'Quần tây nam', 'quan_tay.jpg', 'quan_tay.jpg', 'quan_tay.jpg', '165000', '', 'Quần tây'),
(16, 2, 1, '2023-03-28 15:19:04', 'Quần jogger', 'quan-jogger.jpg', 'quan-jogger.jpg', 'quan-jogger.jpg', '175000', '', 'Jogger'),
(17, 2, 1, '2023-03-28 15:19:18', 'Quần short nam', 'quan-short-nam-cotton-mna-2-500x500.jpg', 'quan-short-nam-cotton-mna-2-500x500.jpg', 'quan-short-nam-cotton-mna-2-500x500.jpg', '190000', '', 'Quần short'),
(18, 2, 1, '2023-03-28 15:19:33', 'Quần túi hộp', 'quan-tui-hop.jpg', 'quan-tui-hop.jpg', 'quan-tui-hop.jpg', '250000', '', 'Quần túi hộp'),
(19, 2, 2, '2023-03-28 15:19:48', 'Chân váy tennis', 'tennis.jpg', 'tennis.jpg', 'tennis.jpg', '140000', '', 'Chân váy tennis'),
(20, 2, 2, '2023-03-28 15:20:06', 'Chân váy dài', 'vaydai.jpg', 'vaydai.jpg', 'vaydai.jpg', '175000', '', 'Chân váy dài'),
(23, 1, 1, '2023-04-15 07:52:44', 'Áo polo', 'polo.jpg', 'polo.jpg', 'polo.jpg', '150000', '', 'Polo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Áo', ''),
(2, 'Quần / Chân Váy', ''),
(3, 'Váy', ''),
(4, 'Giày / Dép', ''),
(5, 'Phụ Kiện', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_image`, `slider_url`) VALUES
(1, 'Slide number 1', '1.png', 'http://localhost/ct271/shop.php?p_cat=1'),
(2, 'Slide number 2', '2.png', 'http://localhost/ct271/shop.php?p_cat=2'),
(3, 'Slide number 3', '3.png', 'http://localhost/ct271/shop.php?p_cat=3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
