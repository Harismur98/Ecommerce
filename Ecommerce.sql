-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ecommerce
CREATE DATABASE IF NOT EXISTS `ecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ecommerce`;

-- Dumping structure for table ecommerce.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 - Active, 1 - Inactive',
  `is_delete` int NOT NULL DEFAULT '0' COMMENT '0 - Active, 1 - Inactive',
  `createdBy` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brands_createdby_foreign` (`createdBy`),
  CONSTRAINT `brands_createdby_foreign` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.brands: ~1 rows (approximately)
INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `is_delete`, `createdBy`, `created_at`, `updated_at`) VALUES
	(1, 'wag', 'wagu', 1, 1, 3, '2024-01-28 07:40:50', '2024-01-31 18:28:36');

-- Dumping structure for table ecommerce.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 - Active, 1 - Inactive',
  `is_delete` int NOT NULL DEFAULT '0' COMMENT '0 - not, 1 - deleted',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdBy` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_createdby_foreign` (`createdBy`),
  CONSTRAINT `categories_createdby_foreign` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.categories: ~16 rows (approximately)
INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `slug`, `status`, `is_delete`, `meta_title`, `meta_description`, `meta_keywords`, `createdBy`) VALUES
	(2, '2024-01-27 18:18:52', '2024-01-27 23:21:36', 'Baju', 'Baju-Barus', 1, 1, 'Baju', NULL, 'Baju', 3),
	(3, '2024-01-27 19:14:04', '2024-01-27 19:14:42', 'Baju', 'Baju-Raya-Ajuma', 1, 1, 'Baju', NULL, 'Baju', 3),
	(4, '2024-01-27 19:14:24', '2024-01-27 19:14:40', 'Baju', 'Baju-Raya-Ajuma-mam', 1, 1, 'Baju', NULL, 'Baju', 3),
	(5, '2024-01-27 21:38:33', '2024-01-27 21:41:14', 'Badminton', 'sport-badminton', 1, 1, 'Racket', NULL, NULL, 3),
	(6, '2024-01-27 21:39:39', '2024-01-27 21:41:12', 'Tennis', 'racket', 1, 1, 'asd', NULL, NULL, 3),
	(7, '2024-01-27 21:41:37', '2024-01-31 18:23:31', 'Sport', 'Sport', 1, 1, 'Sport_item', NULL, NULL, 3),
	(8, '2024-01-28 10:06:06', '2024-01-31 18:23:33', 'LifeStyle', 'LifeStyle', 1, 1, 'Barang Kehidupan', NULL, NULL, 3),
	(9, '2024-01-31 18:24:03', '2024-01-31 18:24:03', 'Electronics', 'electronics', 0, 0, 'Electronics', NULL, NULL, 3),
	(10, '2024-01-31 18:24:23', '2024-01-31 18:24:23', 'Fashion', 'fashion', 0, 0, 'Fashion', NULL, NULL, 3),
	(11, '2024-01-31 18:24:55', '2024-01-31 18:24:55', 'Home & Furniture', 'home-furniture', 0, 0, 'Home & Furniture', NULL, NULL, 3),
	(12, '2024-01-31 18:25:46', '2024-01-31 18:25:46', 'Beauty & Personal Care', 'beauty-personal-care', 0, 0, 'Beauty & Personal Care', NULL, NULL, 3),
	(13, '2024-01-31 18:26:37', '2024-01-31 18:26:37', 'Book, Movies & Music', 'book-movies-music', 0, 0, 'Book, Movies & Music', NULL, NULL, 3),
	(14, '2024-01-31 18:27:03', '2024-01-31 18:27:03', 'Toys & Games', 'toys-games', 0, 0, 'Toys & Games', NULL, NULL, 3),
	(15, '2024-01-31 18:27:37', '2024-01-31 18:27:37', 'Sports & Outdoors', 'sports-outdoors', 0, 0, 'Sports & Outdoors', NULL, NULL, 3),
	(16, '2024-01-31 18:28:12', '2024-01-31 18:28:12', 'Jewelry & Watches', 'jewelry-watches', 0, 0, 'Jewelry & Watches', NULL, NULL, 3),
	(17, '2024-02-01 00:48:38', '2024-02-01 00:48:38', 'Health & Wellness', 'health-wellness', 0, 0, 'Health & Wellness', NULL, NULL, 3);

-- Dumping structure for table ecommerce.colours
CREATE TABLE IF NOT EXISTS `colours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 - Active, 1 - Inactive',
  `is_delete` int NOT NULL DEFAULT '0' COMMENT '0 - Active, 1 - Inactive',
  `createdBy` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `colours_createdby_foreign` (`createdBy`),
  CONSTRAINT `colours_createdby_foreign` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.colours: ~2 rows (approximately)
INSERT INTO `colours` (`id`, `name`, `code`, `status`, `is_delete`, `createdBy`, `created_at`, `updated_at`) VALUES
	(1, 'BLue', '#12343', 0, 0, 3, '2024-01-28 08:07:13', '2024-01-28 08:07:13'),
	(2, 'Red', '#ff0000', 0, 0, 3, '2024-01-28 08:09:31', '2024-01-28 08:09:31');

-- Dumping structure for table ecommerce.colour_product
CREATE TABLE IF NOT EXISTS `colour_product` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `colour_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `colour_product_colour_id_foreign` (`colour_id`),
  KEY `colour_product_product_id_foreign` (`product_id`),
  CONSTRAINT `colour_product_colour_id_foreign` FOREIGN KEY (`colour_id`) REFERENCES `colours` (`id`),
  CONSTRAINT `colour_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.colour_product: ~1 rows (approximately)
INSERT INTO `colour_product` (`id`, `colour_id`, `product_id`, `created_at`, `updated_at`) VALUES
	(7, 1, 2, NULL, NULL);

-- Dumping structure for table ecommerce.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table ecommerce.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.migrations: ~19 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_01_22_030657_alter_users_table', 2),
	(6, '2024_01_27_022907_alter_users_table', 3),
	(7, '2024_01_27_073243_alter_table_user', 4),
	(8, '2024_01_27_160447_create_table_category', 5),
	(9, '2024_01_27_162553_alter_table_category', 6),
	(10, '2024_01_28_020306_alter_table_category', 7),
	(11, '2024_01_28_034731_create__sub_category', 8),
	(13, '2024_01_28_133524_create_product', 9),
	(14, '2024_01_28_151653_create__brand', 10),
	(16, '2024_01_28_155134_create__colour', 11),
	(17, '2024_01_28_171554_alter_product_table', 12),
	(18, '2024_01_30_023850_alter_products_table', 13),
	(20, '2024_01_30_043916_create_prodcut_colour', 14),
	(22, '2024_01_30_135722_create_size', 15),
	(24, '2024_01_31_031354_create_product_image', 16);

-- Dumping structure for table ecommerce.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table ecommerce.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table ecommerce.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryId` bigint unsigned NOT NULL,
  `subcategoryId` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `old_price` double(8,2) NOT NULL,
  `new_price` double(8,2) NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `additional_information` text COLLATE utf8mb4_unicode_ci,
  `shipping_n_returns` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 - Active, 1 - Inactive',
  `is_delete` int NOT NULL DEFAULT '0' COMMENT '0 - Active, 1 - Inactive',
  `createdBy` bigint unsigned NOT NULL,
  `brandId` bigint unsigned NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_categoryid_foreign` (`categoryId`),
  KEY `products_subcategoryid_foreign` (`subcategoryId`),
  KEY `products_createdby_foreign` (`createdBy`),
  KEY `products_brandid_foreign` (`brandId`),
  CONSTRAINT `products_brandid_foreign` FOREIGN KEY (`brandId`) REFERENCES `brands` (`id`),
  CONSTRAINT `products_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_createdby_foreign` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`),
  CONSTRAINT `products_subcategoryid_foreign` FOREIGN KEY (`subcategoryId`) REFERENCES `sub_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.products: ~1 rows (approximately)
INSERT INTO `products` (`id`, `title`, `slug`, `categoryId`, `subcategoryId`, `created_at`, `updated_at`, `old_price`, `new_price`, `short_description`, `description`, `additional_information`, `shipping_n_returns`, `status`, `is_delete`, `createdBy`, `brandId`, `sku`) VALUES
	(2, 'White', 'dress', 8, 2, '2024-01-28 09:36:30', '2024-01-31 18:28:30', 12.22, 22.22, '123', '123', '3', '12312', 1, 1, 3, 1, 'qwe');

-- Dumping structure for table ecommerce.product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` int DEFAULT NULL,
  `productId` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_productid_foreign` (`productId`),
  CONSTRAINT `product_images_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.product_images: ~2 rows (approximately)
INSERT INTO `product_images` (`id`, `filename`, `extension`, `order_by`, `productId`, `created_at`, `updated_at`) VALUES
	(1, '2spyfhibofkkod4avc2zq.jpg', 'jpg', NULL, 2, '2024-01-30 20:02:58', '2024-01-30 20:02:58'),
	(2, '2o9df4qupadot1u38w0ly.jpg', 'jpg', NULL, 2, '2024-01-30 20:02:58', '2024-01-30 20:02:58');

-- Dumping structure for table ecommerce.sizes
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `productId` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sizes_productid_foreign` (`productId`),
  CONSTRAINT `sizes_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.sizes: ~1 rows (approximately)
INSERT INTO `sizes` (`id`, `size`, `price`, `productId`, `created_at`, `updated_at`) VALUES
	(11, '1.2', 12.00, 2, '2024-01-30 20:12:18', '2024-01-30 20:12:18');

-- Dumping structure for table ecommerce.sub_categories
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 - Active, 1 - Inactive',
  `is_delete` int NOT NULL DEFAULT '0' COMMENT '0 - not, 1 - deleted',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdBy` bigint unsigned NOT NULL,
  `categoryId` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `_sub_category_createdby_foreign` (`createdBy`),
  KEY `_sub_category_categoryid_foreign` (`categoryId`),
  CONSTRAINT `_sub_category_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  CONSTRAINT `_sub_category_createdby_foreign` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.sub_categories: ~34 rows (approximately)
INSERT INTO `sub_categories` (`id`, `created_at`, `updated_at`, `name`, `slug`, `status`, `is_delete`, `meta_title`, `meta_description`, `meta_keywords`, `createdBy`, `categoryId`) VALUES
	(1, '2024-01-27 22:01:40', '2024-01-31 18:48:03', 'Tennis', 'tennis', 1, 1, 'Racket', NULL, NULL, 3, 7),
	(2, '2024-01-27 23:21:34', '2024-01-31 18:48:44', 'pyjamas', 'pyjamas', 1, 1, 'baju tidur', NULL, NULL, 3, 2),
	(3, '2024-01-29 22:42:49', '2024-01-31 18:48:45', 'Cloth', 'colth', 1, 1, 'b', NULL, NULL, 3, 8),
	(4, '2024-01-31 18:50:35', '2024-01-31 18:50:35', 'Kitchen & Dining', 'kitchen-dining', 0, 0, 'Kitchen & Dining', NULL, NULL, 3, 11),
	(5, '2024-01-31 18:50:56', '2024-01-31 18:50:56', 'Furniture', 'furniture', 0, 0, 'Furniture', NULL, NULL, 3, 11),
	(6, '2024-01-31 18:51:41', '2024-01-31 18:51:41', 'Sleepwear', 'sleepwear', 0, 0, 'Sleepwear', NULL, NULL, 3, 10),
	(7, '2024-01-31 18:52:04', '2024-01-31 19:07:08', 'Activewear', 'activewear', 0, 0, 'Activewear', NULL, NULL, 3, 10),
	(8, '2024-01-31 19:08:00', '2024-01-31 21:52:01', 'Shoes & Footwear', 'shoes-footwear', 0, 0, 'Shoes', NULL, NULL, 3, 10),
	(9, '2024-01-31 19:08:31', '2024-01-31 21:51:18', 'Kids Clothing', 'kids-clothing', 0, 0, 'Kids', NULL, NULL, 3, 10),
	(10, '2024-01-31 19:09:02', '2024-01-31 21:51:44', 'Women\'s Clothing', 'women-clothing', 0, 0, 'Women\'s', NULL, NULL, 3, 10),
	(11, '2024-01-31 19:09:24', '2024-01-31 19:11:46', 'Men\'s', 'men-clothing', 0, 0, 'Men\'s', NULL, NULL, 3, 10),
	(12, '2024-01-31 19:09:45', '2024-01-31 19:09:45', 'Gaming', 'gaming', 0, 0, 'Gaming', NULL, NULL, 3, 9),
	(13, '2024-01-31 19:10:14', '2024-01-31 19:10:14', 'Audio & Headphones', 'audio-headphones', 0, 0, 'Audio & Headphones', NULL, NULL, 3, 9),
	(14, '2024-01-31 19:12:43', '2024-01-31 19:12:43', 'Wearable Technologies', 'wearable-technologies', 0, 0, 'Wearable Technologies', NULL, NULL, 3, 9),
	(15, '2024-01-31 19:13:18', '2024-01-31 19:13:18', 'Camera & Photography', 'camera-photography', 0, 0, 'Camera & Photography', NULL, NULL, 3, 9),
	(16, '2024-01-31 19:13:44', '2024-01-31 19:13:44', 'Laptops & Computers', 'laptops-computers', 0, 0, 'Laptops & Computers', NULL, NULL, 3, 9),
	(17, '2024-01-31 19:14:23', '2024-01-31 19:14:23', 'Smartphones & Accessories', 'smartphones-accessories', 0, 0, 'Smartphones & Accessories', NULL, NULL, 3, 9),
	(18, '2024-02-01 00:45:15', '2024-02-01 00:45:15', 'Skincare', 'skincare', 0, 0, 'Skincare', NULL, NULL, 3, 12),
	(19, '2024-02-01 00:45:33', '2024-02-01 00:45:33', 'Makeup', 'makeup', 0, 0, 'Makeup', NULL, NULL, 3, 12),
	(20, '2024-02-01 00:45:52', '2024-02-01 00:45:52', 'Haircare', 'haircare', 0, 0, 'Haircare', NULL, NULL, 3, 12),
	(21, '2024-02-01 00:46:08', '2024-02-01 00:46:08', 'Fragrances', 'fragrances', 0, 0, 'Fragrances', NULL, NULL, 3, 12),
	(22, '2024-02-01 00:46:39', '2024-02-01 00:46:39', 'Bath & Body', 'bath-body', 0, 0, 'Bath & Body', NULL, NULL, 3, 12),
	(23, '2024-02-01 00:47:07', '2024-02-01 00:47:07', 'Men\'s Grooming', 'men-grooming', 0, 0, 'Men\'s Grooming', NULL, NULL, 3, 12),
	(24, '2024-02-01 00:49:23', '2024-02-01 00:49:23', 'Vitamins & Supplements', 'vitamins-supplements', 0, 0, 'Vitamins & Supplements', NULL, NULL, 3, 17),
	(25, '2024-02-01 00:50:00', '2024-02-01 00:50:00', 'Fitness Equipment', 'fitness-equipment', 0, 0, 'Fitness Equipment', NULL, NULL, 3, 17),
	(26, '2024-02-01 00:50:49', '2024-02-01 00:50:49', 'Personal Care Devices', 'personal-care-devices', 0, 0, 'Personal Care Devices', NULL, NULL, 3, 17),
	(27, '2024-02-01 00:51:13', '2024-02-01 00:51:13', 'Health Monitor', 'health-monitor', 0, 0, 'Health Monitor', NULL, NULL, 3, 17),
	(28, '2024-02-01 00:51:44', '2024-02-01 00:51:44', 'Sports Nutrition', 'sports-nutrition', 0, 0, 'Sports Nutrition', NULL, NULL, 3, 17),
	(29, '2024-02-01 00:51:59', '2024-02-01 00:51:59', 'Books', 'books', 0, 0, 'Books', NULL, NULL, 3, 13),
	(30, '2024-02-01 00:52:24', '2024-02-01 00:52:24', 'eBooks', 'ebooks', 0, 0, 'eBooks', NULL, NULL, 3, 13),
	(31, '2024-02-01 00:52:56', '2024-02-01 00:53:13', 'Movies & TV Shows', 'movies-tv-shows', 0, 0, 'Movies & TV Shows', NULL, NULL, 3, 13),
	(32, '2024-02-01 00:53:35', '2024-02-01 00:53:35', 'Music', 'music', 0, 0, 'Music', NULL, NULL, 3, 13),
	(33, '2024-02-01 00:53:57', '2024-02-01 00:53:57', 'Audiobooks', 'audiobooks', 0, 0, 'Audiobooks', NULL, NULL, 3, 13),
	(34, '2024-02-01 00:54:17', '2024-02-01 00:54:17', 'Sheet Music', 'sheet-music', 0, 0, 'Sheet Music', NULL, NULL, 3, 13);

-- Dumping structure for table ecommerce.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` int NOT NULL DEFAULT '0' COMMENT '0 - customer, 1 - admin',
  `status` int NOT NULL DEFAULT '0' COMMENT '0 - Active, 1 - Inactive',
  `is_delete` int NOT NULL DEFAULT '0' COMMENT '0 - not, 1 - deleted',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ecommerce.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `status`, `is_delete`) VALUES
	(3, 'admin', 'admin@gmail.com', NULL, '$2y$12$Guox1y1eiYTqtrMnWmMKi.VXSWa4c63Rda/hqlVcrDEQblwwG6446', NULL, '2024-01-21 21:54:54', '2024-01-21 21:54:54', 1, 0, 0),
	(4, 'admin2', 'admin2@gmail.com', NULL, '$2y$12$KyGUvtRIq21zXIuKwyYRM.1rQdR/lCg3oK4mh0/ycV5kMLpG0yIZG', NULL, '2024-01-21 22:47:37', '2024-01-21 22:47:37', 0, 0, 0),
	(5, 'Aiman', 'Aiman00@gmail.com', NULL, '$2y$12$nSD/wBGXSUh8dCL.jIs6xuRtF3ImuQszbnlyu17wggRPQqwpq93Ce', NULL, '2024-01-26 20:51:30', '2024-01-27 02:54:19', 1, 1, 1),
	(6, 'qwe', 'qwe@gmail.com', NULL, '$2y$12$ouQW.fCVRjjotUuI.f6NUukHpip7lbwCYnUpMGmwAa706ulIWgcfW', NULL, '2024-01-26 23:44:44', '2024-01-26 23:44:44', 1, 0, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
