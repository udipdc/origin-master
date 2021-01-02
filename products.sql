-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 05:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_log` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_image`, `product_log`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Operating Scissors', 'product__f1_1.jpg', 'product__f1_1.jpg', NULL, '2020-10-16 09:37:15', '2020-10-16 09:37:15'),
(2, 1, 'Scalpels and Knifes', 'product__f1_2.jpg', 'product__f1_2.jpg', NULL, '2020-10-16 09:37:52', '2020-10-16 09:37:52'),
(3, 2, 'Optics', 'product__f1_3.jpg', 'product__f1_3.jpg', NULL, '2020-10-16 09:38:07', '2020-10-16 09:38:07'),
(4, 2, 'Trocars', 'product__f1_4.jpg', 'product__f1_4.jpg', NULL, '2020-10-16 09:38:16', '2020-10-16 09:38:16'),
(5, 3, 'DIS1', 'product__f1_5.jpg', 'product__f1_5.jpg', NULL, '2020-10-16 09:38:30', '2020-10-16 09:38:30'),
(6, 3, 'DIS2', 'product__f1_6.jpg', 'product__f1_6.jpg', NULL, '2020-10-16 09:38:37', '2020-10-16 09:38:37'),
(7, 4, 'Sterilization1', 'product__f1_7.jpg', 'product__f1_7.jpg', NULL, '2020-10-16 09:38:50', '2020-10-16 09:38:50'),
(8, 4, 'Sterilization2', 'product__f1_8.jpg', 'product__f1_8.jpg', NULL, '2020-10-16 09:38:58', '2020-10-16 09:38:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
