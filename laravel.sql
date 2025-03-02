/*
 Navicat Premium Dump SQL

 Source Server         : laravel
 Source Server Type    : MySQL
 Source Server Version : 80403 (8.4.3)
 Source Host           : localhost:3306
 Source Schema         : laravel

 Target Server Type    : MySQL
 Target Server Version : 80403 (8.4.3)
 File Encoding         : 65001

 Date: 02/03/2025 20:44:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for blogs
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_blog` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_blog` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT 0,
  `users_id` bigint UNSIGNED NOT NULL,
  `cate_blog_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `blogs_name_blog_unique`(`name_blog` ASC) USING BTREE,
  UNIQUE INDEX `blogs_slug_blog_unique`(`slug_blog` ASC) USING BTREE,
  INDEX `blogs_users_id_foreign`(`users_id` ASC) USING BTREE,
  INDEX `blogs_cate_blog_id_foreign`(`cate_blog_id` ASC) USING BTREE,
  CONSTRAINT `blogs_cate_blog_id_foreign` FOREIGN KEY (`cate_blog_id`) REFERENCES `category_blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `blogs_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blogs
-- ----------------------------

-- ----------------------------
-- Table structure for cart_details
-- ----------------------------
DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE `cart_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cart_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cart_details_cart_id_foreign`(`cart_id` ASC) USING BTREE,
  INDEX `cart_details_product_id_foreign`(`product_id` ASC) USING BTREE,
  CONSTRAINT `cart_details_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart_details
-- ----------------------------

-- ----------------------------
-- Table structure for carts
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `carts_customer_id_foreign`(`customer_id` ASC) USING BTREE,
  INDEX `carts_product_id_foreign`(`product_id` ASC) USING BTREE,
  CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carts
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameCate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `categories_namecate_unique`(`nameCate` ASC) USING BTREE,
  UNIQUE INDEX `categories_slug_unique`(`slug` ASC) USING BTREE,
  INDEX `categories_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `categories_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Đầm', 'dam', 'images/category/kqymVXAnVL9VeYZhi6pMGdmAePYQCJmUF4PkqDIN.jpg', 1, NULL, '2025-03-02 00:18:18');
INSERT INTO `categories` VALUES (2, 'Jerald Wisozk', 'jerald-wisozk', 'images/category/cat-2.jpg', 1, NULL, NULL);
INSERT INTO `categories` VALUES (3, 'Litzy Botsford', 'litzy-botsford', 'images/category/cat-1.jpg', 1, NULL, NULL);
INSERT INTO `categories` VALUES (4, 'Dejon Olson', 'dejon-olson', 'images/category/cat-3.jpg', 1, NULL, NULL);
INSERT INTO `categories` VALUES (5, 'Santiago Goldner DDS', 'santiago-goldner-dds', 'images/category/cat-3.jpg', 1, NULL, NULL);

-- ----------------------------
-- Table structure for category_blogs
-- ----------------------------
DROP TABLE IF EXISTS `category_blogs`;
CREATE TABLE `category_blogs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `category_blogs_name_unique`(`name` ASC) USING BTREE,
  UNIQUE INDEX `category_blogs_slug_unique`(`slug` ASC) USING BTREE,
  INDEX `category_blogs_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `category_blogs_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category_blogs
-- ----------------------------

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `comments_product_id_foreign`(`product_id` ASC) USING BTREE,
  INDEX `comments_customer_id_foreign`(`customer_id` ASC) USING BTREE,
  CONSTRAINT `comments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for configs
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link_twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link_linkedin` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of configs
-- ----------------------------
INSERT INTO `configs` VALUES (1, 'images/logo/2J5ocriSAt9JT2fxOtoUFU3lb1AgHN6FUSdSmucl.jpg', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', '0866940634', 'Âu Cơ Tây Hồ Hà Nội', 'admin@gmail.com', '2025-03-02 00:15:18', '2025-03-02 01:30:38');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contacts
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for group_users
-- ----------------------------
DROP TABLE IF EXISTS `group_users`;
CREATE TABLE `group_users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group_users
-- ----------------------------
INSERT INTO `group_users` VALUES (1, 'Margie Jacobson', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `group_users` VALUES (2, 'Mallory Willms Sr.', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `group_users` VALUES (3, 'Gaetano Balistreri', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `group_users` VALUES (4, 'Ms. Elza Luettgen Sr.', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `group_users` VALUES (5, 'Nat Daugherty', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `group_users` VALUES (6, 'Dr. Seth Zboncak', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `group_users` VALUES (7, 'Miss Elouise Stehr DDS', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `group_users` VALUES (8, 'Nick Bergnaum V', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `group_users` VALUES (9, 'Miss Annetta Marks', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `group_users` VALUES (10, 'Destiney O\'Conner', '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2013_10_26_093958_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (2, '2013_10_26_094220_create_roles_table', 1);
INSERT INTO `migrations` VALUES (3, '2013_10_26_094413_create_permissions_roles_table', 1);
INSERT INTO `migrations` VALUES (4, '2014_10_11_000000_create_group_users_table', 1);
INSERT INTO `migrations` VALUES (5, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (6, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (9, '2022_01_24_155452_create_sales_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_01_26_073712_create_posts_table', 1);
INSERT INTO `migrations` VALUES (11, '2022_03_28_145146_create_suppliers_table', 1);
INSERT INTO `migrations` VALUES (12, '2022_03_30_130730_create_categories_table', 1);
INSERT INTO `migrations` VALUES (13, '2022_03_30_133942_create_origins_table', 1);
INSERT INTO `migrations` VALUES (14, '2022_03_30_133943_create_products_table', 1);
INSERT INTO `migrations` VALUES (15, '2022_03_30_134643_create_comments_table', 1);
INSERT INTO `migrations` VALUES (16, '2022_03_30_134901_create_orders_table', 1);
INSERT INTO `migrations` VALUES (17, '2022_03_30_135316_create_carts_table', 1);
INSERT INTO `migrations` VALUES (18, '2022_04_04_101501_create_shipment_details_table', 1);
INSERT INTO `migrations` VALUES (19, '2022_04_06_082341_create_sale_product_table', 1);
INSERT INTO `migrations` VALUES (20, '2022_04_07_160614_create_cart_details_table', 1);
INSERT INTO `migrations` VALUES (21, '2022_04_28_233457_create_configs_table', 1);
INSERT INTO `migrations` VALUES (22, '2022_05_01_111548_create_category_blogs_table', 1);
INSERT INTO `migrations` VALUES (23, '2022_05_01_111611_create_blogs_table', 1);
INSERT INTO `migrations` VALUES (24, '2022_05_02_210552_create_order_details_table', 1);
INSERT INTO `migrations` VALUES (25, '2022_05_05_010608_create_contacts_table', 1);
INSERT INTO `migrations` VALUES (26, '2025_01_23_092505_create_product_images_table', 1);
INSERT INTO `migrations` VALUES (27, '2025_03_02_000800_create_sliders_table', 1);

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_details_order_id_foreign`(`order_id` ASC) USING BTREE,
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fullname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `orders_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `orders_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for origins
-- ----------------------------
DROP TABLE IF EXISTS `origins`;
CREATE TABLE `origins`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of origins
-- ----------------------------
INSERT INTO `origins` VALUES (1, 'Afghanistan', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `origins` VALUES (2, 'Akrotiri và Dhekelia', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `origins` VALUES (3, 'Ả Rập Saudi', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `origins` VALUES (4, 'Các tiểu vương quốc Ả Rập Thống nhất', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `origins` VALUES (5, 'Armenia', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `origins` VALUES (6, 'Azerbaijan', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `origins` VALUES (7, 'Ấn Độ', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (8, 'Lãnh thổ Ấn Độ Dương thuộc Anh', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (9, 'Bahrain', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (10, 'Bangladesh', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (11, 'Bhutan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (12, 'Brunei', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (13, 'Campuchia', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (14, 'Quần đảo Cocos (Keeling)', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (15, 'Đài Loan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (16, 'Georgia/Gruzia', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (17, 'Đảo Giáng sinh', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (18, 'Hồng Kông', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (19, 'Indonesia', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (20, 'Iran', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (21, 'Iraq', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (22, 'Israel', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (23, 'Jordan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (24, 'Kazakhstan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (25, 'Kuwait', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (26, 'Kyrgyzstan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (27, 'Lào', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (28, 'Liban', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (29, 'Ma Cao', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (30, 'Malaysia', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (31, 'Maldives', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (32, 'Mông Cổ', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (33, 'Myanma', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (34, 'Nagorno-Karabakh', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (35, 'Nepal', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (36, 'Nga', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (37, 'Nhật Bản', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (38, 'Oman', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (39, 'Pakistan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (40, 'Quốc gia Palestine', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (41, 'Philippines', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (42, 'Qatar', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (43, 'Singapore', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (44, 'Bắc Síp', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (45, 'Síp', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (46, 'Sri Lanka', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (47, 'Syria', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (48, 'Tajikistan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (49, 'Thái Lan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (50, 'Đông Timor', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (51, 'Thổ Nhĩ Kỳ', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (52, 'Triều Tiên', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (53, 'Hàn Quốc', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (54, 'Trung Quốc', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (55, 'Turkmenistan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (56, 'Uzbekistan', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (57, 'Việt Nam', '2025-03-02 00:15:19', '2025-03-02 00:15:19');
INSERT INTO `origins` VALUES (58, 'Yemen', '2025-03-02 00:15:19', '2025-03-02 00:15:19');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED NOT NULL,
  `key_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'LOAI SAN PHAM', 'Loại sản phẩm', 0, '', '2025-03-02 00:15:17', '2025-03-02 00:15:17');
INSERT INTO `permissions` VALUES (2, 'XEM LOAI SAN PHAM', '', 1, 'XEM-LOAI-SAN-PHAM', '2025-03-02 00:15:17', '2025-03-02 00:15:17');
INSERT INTO `permissions` VALUES (3, 'THEM LOAI SAN PHAM', '', 1, 'THEM-LOAI-SAN-PHAM', '2025-03-02 00:15:17', '2025-03-02 00:15:17');
INSERT INTO `permissions` VALUES (4, 'SUA LOAI SAN PHAM', '', 1, 'SUA-LOAI-SAN-PHAM', '2025-03-02 00:15:17', '2025-03-02 00:15:17');
INSERT INTO `permissions` VALUES (5, 'XOA LOAI SAN PHAM', '', 1, 'XOA-LOAI-SAN-PHAM', '2025-03-02 00:15:17', '2025-03-02 00:15:17');
INSERT INTO `permissions` VALUES (6, 'SAN PHAM', 'Sản phẩm', 0, '', '2025-03-02 00:15:17', '2025-03-02 00:15:17');
INSERT INTO `permissions` VALUES (7, 'XEM SAN PHAM', '', 6, 'XEM-SAN-PHAM', '2025-03-02 00:15:17', '2025-03-02 00:15:17');
INSERT INTO `permissions` VALUES (8, 'THEM SAN PHAM', '', 6, 'THEM-SAN-PHAM', '2025-03-02 00:15:17', '2025-03-02 00:15:17');
INSERT INTO `permissions` VALUES (9, 'SUA SAN PHAM', '', 6, 'SUA-SAN-PHAM', '2025-03-02 00:15:17', '2025-03-02 00:15:17');
INSERT INTO `permissions` VALUES (10, 'XOA SAN PHAM', '', 6, 'XOA-SAN-PHAM', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (11, 'NHA PHAN PHOI', 'Nhà phân phối', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (12, 'XEM NHA PHAN PHOI', '', 11, 'XEM-NHA-PHAN-PHOI', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (13, 'THEM NHA PHAN PHOI', '', 11, 'THEM-NHA-PHAN-PHOI', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (14, 'SUA NHA PHAN PHOI', '', 11, 'SUA-NHA-PHAN-PHOI', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (15, 'XOA NHA PHAN PHOI', '', 11, 'XOA-NHA-PHAN-PHOI', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (16, 'LOAI BAI VIET', 'Loại bài viết', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (17, 'XEM LOAI BAI VIET', '', 16, 'XEM-LOAI-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (18, 'THEM LOAI BAI VIET', '', 16, 'THEM-LOAI-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (19, 'SUA LOAI BAI VIET', '', 16, 'SUA-LOAI-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (20, 'XOA LOAI BAI VIET', '', 16, 'XOA-LOAI-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (21, 'BAI VIET', 'Bài viết', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (22, 'XEM BAI VIET', '', 21, 'XEM-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (23, 'THEM BAI VIET', '', 21, 'THEM-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (24, 'SUA BAI VIET', '', 21, 'SUA-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (25, 'XOA BAI VIET', '', 21, 'XOA-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (26, 'LIEN HE', 'Liên hệ', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (27, 'XEM LIEN HE', '', 26, 'XEM-LIEN-HE', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (28, 'THEM LIEN HE', '', 26, 'THEM-LIEN-HE', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (29, 'SUA LIEN HE', '', 26, 'SUA-LIEN-HE', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (30, 'XOA LIEN HE', '', 26, 'XOA-LIEN-HE', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (31, 'DON HANG', 'Đơn hàng', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (32, 'XEM DON HANG', '', 31, 'XEM-DON-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (33, 'THEM DON HANG', '', 31, 'THEM-DON-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (34, 'SUA DON HANG', '', 31, 'SUA-DON-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (35, 'XOA DON HANG', '', 31, 'XOA-DON-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (36, 'NHOM KHACH HANG', 'Nhóm khách hàng', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (37, 'XEM NHOM KHACH HANG', '', 36, 'XEM-NHOM-KHACH-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (38, 'THEM NHOM KHACH HANG', '', 36, 'THEM-NHOM-KHACH-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (39, 'SUA NHOM KHACH HANG', '', 36, 'SUA-NHOM-KHACH-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (40, 'XOA NHOM KHACH HANG', '', 36, 'XOA-NHOM-KHACH-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (41, 'KHACH HANG', 'Khách hàng', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (42, 'XEM KHACH HANG', '', 41, 'XEM-KHACH-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (43, 'THEM KHACH HANG', '', 41, 'THEM-KHACH-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (44, 'SUA KHACH HANG', '', 41, 'SUA-KHACH-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (45, 'XOA KHACH HANG', '', 41, 'XOA-KHACH-HANG', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (46, 'NHAN VIEN', 'Nhân viên', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (47, 'XEM NHAN VIEN', '', 46, 'XEM-NHAN-VIEN', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (48, 'THEM NHAN VIEN', '', 46, 'THEM-NHAN-VIEN', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (49, 'SUA NHAN VIEN', '', 46, 'SUA-NHAN-VIEN', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (50, 'XOA NHAN VIEN', '', 46, 'XOA-NHAN-VIEN', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (51, 'CHUC VU', 'Chức vụ', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (52, 'XEM CHUC VU', '', 51, 'XEM-CHUC-VU', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (53, 'THEM CHUC VU', '', 51, 'THEM-CHUC-VU', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (54, 'SUA CHUC VU', '', 51, 'SUA-CHUC-VU', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (55, 'XOA CHUC VU', '', 51, 'XOA-CHUC-VU', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (56, 'BAI VIET', 'Bài viết', 0, '', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (57, 'XEM BAI VIET', '', 56, 'XEM-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (58, 'THEM BAI VIET', '', 56, 'THEM-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (59, 'SUA BAI VIET', '', 56, 'SUA-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');
INSERT INTO `permissions` VALUES (60, 'XOA BAI VIET', '', 56, 'XOA-BAI-VIET', '2025-03-02 00:15:18', '2025-03-02 00:15:18');

-- ----------------------------
-- Table structure for permissions_roles
-- ----------------------------
DROP TABLE IF EXISTS `permissions_roles`;
CREATE TABLE `permissions_roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `permmission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `permissions_roles_permmission_id_foreign`(`permmission_id` ASC) USING BTREE,
  INDEX `permissions_roles_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `permissions_roles_permmission_id_foreign` FOREIGN KEY (`permmission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permissions_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions_roles
-- ----------------------------
INSERT INTO `permissions_roles` VALUES (1, 2, 2);
INSERT INTO `permissions_roles` VALUES (2, 3, 2);
INSERT INTO `permissions_roles` VALUES (3, 4, 2);
INSERT INTO `permissions_roles` VALUES (4, 5, 2);
INSERT INTO `permissions_roles` VALUES (5, 7, 2);
INSERT INTO `permissions_roles` VALUES (6, 8, 2);
INSERT INTO `permissions_roles` VALUES (7, 9, 2);
INSERT INTO `permissions_roles` VALUES (8, 10, 2);
INSERT INTO `permissions_roles` VALUES (9, 12, 2);
INSERT INTO `permissions_roles` VALUES (10, 13, 2);
INSERT INTO `permissions_roles` VALUES (11, 14, 2);
INSERT INTO `permissions_roles` VALUES (12, 15, 2);
INSERT INTO `permissions_roles` VALUES (13, 17, 2);
INSERT INTO `permissions_roles` VALUES (14, 18, 2);
INSERT INTO `permissions_roles` VALUES (15, 19, 2);
INSERT INTO `permissions_roles` VALUES (16, 20, 2);
INSERT INTO `permissions_roles` VALUES (17, 22, 2);
INSERT INTO `permissions_roles` VALUES (18, 23, 2);
INSERT INTO `permissions_roles` VALUES (19, 24, 2);
INSERT INTO `permissions_roles` VALUES (20, 25, 2);
INSERT INTO `permissions_roles` VALUES (21, 27, 2);
INSERT INTO `permissions_roles` VALUES (22, 28, 2);
INSERT INTO `permissions_roles` VALUES (23, 29, 2);
INSERT INTO `permissions_roles` VALUES (24, 30, 2);
INSERT INTO `permissions_roles` VALUES (25, 32, 2);
INSERT INTO `permissions_roles` VALUES (26, 33, 2);
INSERT INTO `permissions_roles` VALUES (27, 34, 2);
INSERT INTO `permissions_roles` VALUES (28, 35, 2);
INSERT INTO `permissions_roles` VALUES (29, 37, 2);
INSERT INTO `permissions_roles` VALUES (30, 38, 2);
INSERT INTO `permissions_roles` VALUES (31, 39, 2);
INSERT INTO `permissions_roles` VALUES (32, 40, 2);
INSERT INTO `permissions_roles` VALUES (33, 42, 2);
INSERT INTO `permissions_roles` VALUES (34, 43, 2);
INSERT INTO `permissions_roles` VALUES (35, 44, 2);
INSERT INTO `permissions_roles` VALUES (36, 45, 2);
INSERT INTO `permissions_roles` VALUES (37, 47, 2);
INSERT INTO `permissions_roles` VALUES (38, 48, 2);
INSERT INTO `permissions_roles` VALUES (39, 49, 2);
INSERT INTO `permissions_roles` VALUES (40, 50, 2);
INSERT INTO `permissions_roles` VALUES (41, 52, 2);
INSERT INTO `permissions_roles` VALUES (42, 53, 2);
INSERT INTO `permissions_roles` VALUES (43, 54, 2);
INSERT INTO `permissions_roles` VALUES (44, 55, 2);
INSERT INTO `permissions_roles` VALUES (45, 57, 2);
INSERT INTO `permissions_roles` VALUES (46, 58, 2);
INSERT INTO `permissions_roles` VALUES (47, 59, 2);
INSERT INTO `permissions_roles` VALUES (48, 60, 2);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_update` datetime NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_images_product_id_foreign`(`product_id` ASC) USING BTREE,
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 405 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES (1, 1, 'images/products/y1QPDJTD3tKD9S8DiE7xOpckpkSOgGUrGcjOZBGi.jpg', '2025-03-02 00:27:19', '2025-03-02 00:27:19');
INSERT INTO `product_images` VALUES (2, 1, 'images/products/nUhgkZyq23WKseBazOaahJFgeLzz6M5F0wJGDufX.jpg', '2025-03-02 00:27:19', '2025-03-02 00:27:19');
INSERT INTO `product_images` VALUES (3, 1, 'images/products/Og4a44Lh61p7heCZq0MFzNcxlkek0Dlo2tJuY71X.jpg', '2025-03-02 00:27:19', '2025-03-02 00:27:19');
INSERT INTO `product_images` VALUES (4, 1, 'images/products/tlGGAgUKK7iKwBFPv7GqtUjHrMmC8d2Jn5yycPef.jpg', '2025-03-02 00:27:19', '2025-03-02 00:27:19');
INSERT INTO `product_images` VALUES (205, 1, 'images/products/067.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (206, 1, 'images/products/068.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (207, 1, 'images/products/069.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (208, 1, 'images/products/070.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (209, 2, 'images/products/071.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (210, 2, 'images/products/072.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (211, 2, 'images/products/073.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (212, 2, 'images/products/074.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (213, 3, 'images/products/075.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (214, 3, 'images/products/076.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (215, 3, 'images/products/077.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (216, 3, 'images/products/078.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (217, 4, 'images/products/079.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (218, 4, 'images/products/080.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (219, 4, 'images/products/081.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (220, 4, 'images/products/082.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (221, 5, 'images/products/083.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (222, 5, 'images/products/084.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (223, 5, 'images/products/085.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (224, 5, 'images/products/086.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (225, 6, 'images/products/087.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (226, 6, 'images/products/088.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (227, 6, 'images/products/089.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (228, 6, 'images/products/090.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (229, 7, 'images/products/091.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (230, 7, 'images/products/092.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (231, 7, 'images/products/093.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (232, 7, 'images/products/094.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (233, 8, 'images/products/095.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (234, 8, 'images/products/096.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (235, 8, 'images/products/097.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (236, 8, 'images/products/098.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (237, 9, 'images/products/099.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (238, 9, 'images/products/100.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (239, 9, 'images/products/101.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (240, 9, 'images/products/102.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (241, 10, 'images/products/103.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (242, 10, 'images/products/104.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (243, 10, 'images/products/105.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (244, 10, 'images/products/106.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (245, 11, 'images/products/107.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (246, 11, 'images/products/108.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (247, 11, 'images/products/109.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (248, 11, 'images/products/110.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (249, 12, 'images/products/111.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (250, 12, 'images/products/112.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (251, 12, 'images/products/113.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (252, 12, 'images/products/114.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (253, 13, 'images/products/115.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (254, 13, 'images/products/116.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (255, 13, 'images/products/117.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (256, 13, 'images/products/118.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (257, 14, 'images/products/119.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (258, 14, 'images/products/120.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (259, 14, 'images/products/121.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (260, 14, 'images/products/122.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (261, 15, 'images/products/123.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (262, 15, 'images/products/124.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (263, 15, 'images/products/125.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (264, 15, 'images/products/126.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (265, 16, 'images/products/127.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (266, 16, 'images/products/128.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (267, 16, 'images/products/129.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (268, 16, 'images/products/130.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (269, 17, 'images/products/131.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (270, 17, 'images/products/132.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (271, 17, 'images/products/133.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (272, 17, 'images/products/134.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (273, 18, 'images/products/135.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (274, 18, 'images/products/136.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (275, 18, 'images/products/137.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (276, 18, 'images/products/138.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (277, 19, 'images/products/139.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (278, 19, 'images/products/140.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (279, 19, 'images/products/141.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (280, 19, 'images/products/142.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (281, 20, 'images/products/143.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (282, 20, 'images/products/144.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (283, 20, 'images/products/145.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (284, 20, 'images/products/146.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (285, 21, 'images/products/147.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (286, 21, 'images/products/148.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (287, 21, 'images/products/149.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (288, 21, 'images/products/150.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (289, 22, 'images/products/151.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (290, 22, 'images/products/152.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (291, 22, 'images/products/153.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (292, 22, 'images/products/154.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (293, 23, 'images/products/155.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (294, 23, 'images/products/156.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (295, 23, 'images/products/157.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (296, 23, 'images/products/158.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (297, 24, 'images/products/159.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (298, 24, 'images/products/160.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (299, 24, 'images/products/161.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (300, 24, 'images/products/162.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (301, 25, 'images/products/163.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (302, 25, 'images/products/164.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (303, 25, 'images/products/165.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (304, 25, 'images/products/166.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (305, 26, 'images/products/167.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (306, 26, 'images/products/168.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (307, 26, 'images/products/169.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (308, 26, 'images/products/170.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (309, 27, 'images/products/171.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (310, 27, 'images/products/172.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (311, 27, 'images/products/173.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (312, 27, 'images/products/174.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (313, 28, 'images/products/175.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (314, 28, 'images/products/176.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (315, 28, 'images/products/177.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (316, 28, 'images/products/178.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (317, 29, 'images/products/179.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (318, 29, 'images/products/180.jpeg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (319, 29, 'images/products/181.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (320, 29, 'images/products/182.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (321, 30, 'images/products/183.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (322, 30, 'images/products/184.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (323, 30, 'images/products/185.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (324, 30, 'images/products/186.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (325, 31, 'images/products/187.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (326, 31, 'images/products/188.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (327, 31, 'images/products/189.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (328, 31, 'images/products/190.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (329, 32, 'images/products/191.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (330, 32, 'images/products/192.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (331, 32, 'images/products/193.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (332, 32, 'images/products/194.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (333, 33, 'images/products/195.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (334, 33, 'images/products/196.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (335, 33, 'images/products/197.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (336, 33, 'images/products/198.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (337, 34, 'images/products/199.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (338, 34, 'images/products/200.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (339, 34, 'images/products/201.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (340, 34, 'images/products/202.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (341, 35, 'images/products/203.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (342, 35, 'images/products/204.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (343, 35, 'images/products/205.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (344, 35, 'images/products/206.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (345, 36, 'images/products/207.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (346, 36, 'images/products/208.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (347, 36, 'images/products/209.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (348, 36, 'images/products/210.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (349, 37, 'images/products/211.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (350, 37, 'images/products/212.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (351, 37, 'images/products/213.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (352, 37, 'images/products/214.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (353, 38, 'images/products/215.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (354, 38, 'images/products/216.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (355, 38, 'images/products/217.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (356, 38, 'images/products/218.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (357, 39, 'images/products/219.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (358, 39, 'images/products/220.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (359, 39, 'images/products/221.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (360, 39, 'images/products/222.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (361, 40, 'images/products/223.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (362, 40, 'images/products/224.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (363, 40, 'images/products/225.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (364, 40, 'images/products/226.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (365, 41, 'images/products/227.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (366, 41, 'images/products/228.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (367, 41, 'images/products/229.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (368, 41, 'images/products/230.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (369, 42, 'images/products/231.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (370, 42, 'images/products/232.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (371, 42, 'images/products/233.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (372, 42, 'images/products/234.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (373, 43, 'images/products/235.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (374, 43, 'images/products/236.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (375, 43, 'images/products/237.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (376, 43, 'images/products/238.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (377, 44, 'images/products/239.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (378, 44, 'images/products/240.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (379, 44, 'images/products/241.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (380, 44, 'images/products/242.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (381, 45, 'images/products/243.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (382, 45, 'images/products/244.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (383, 45, 'images/products/245.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (384, 45, 'images/products/246.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (385, 46, 'images/products/247.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (386, 46, 'images/products/248.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (387, 46, 'images/products/249.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (388, 46, 'images/products/250.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (389, 47, 'images/products/251.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (390, 47, 'images/products/252.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (391, 47, 'images/products/253.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (392, 47, 'images/products/254.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (393, 48, 'images/products/255.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (394, 48, 'images/products/256.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (395, 48, 'images/products/257.png', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (396, 48, 'images/products/258.png', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (397, 49, 'images/products/259.png', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (398, 49, 'images/products/260.png', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (399, 49, 'images/products/261.png', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (400, 49, 'images/products/262.png', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (401, 50, 'images/products/263.png', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (402, 50, 'images/products/264.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (403, 50, 'images/products/265.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');
INSERT INTO `product_images` VALUES (404, 50, 'images/products/266.jpg', '2025-03-02 01:18:28', '2025-03-02 01:18:28');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `namePro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` double NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discounts` double NOT NULL DEFAULT 0,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `products_namepro_unique`(`namePro` ASC) USING BTREE,
  UNIQUE INDEX `products_slug_unique`(`slug` ASC) USING BTREE,
  INDEX `products_origin_id_foreign`(`origin_id` ASC) USING BTREE,
  INDEX `products_users_id_foreign`(`users_id` ASC) USING BTREE,
  INDEX `products_category_id_foreign`(`category_id` ASC) USING BTREE,
  INDEX `products_supplier_id_foreign`(`supplier_id` ASC) USING BTREE,
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Váy ngủ lụa hai dây xuyên thấu ren ngực sexy Q62 - Đầm ngủ hai dây sexy - Váy ngủ nữ', 'images/products/001.jpeg', 14, 1500000, '1', 20, 'vay-ngu-lua-hai-day-xuyen-thau-ren-nguc-sexy-q62---dam-ngu-hai-day-sexy---vay-ngu-nu', '<p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">Sản phẩm bao gồm : Váy ( KHÔNG kèm chip)</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">Váy ngủ tạo cho bạn cảm giác mới mẻ hấp dẫn, tôn lên vẻ đẹp quý phái, sang trọng và thêm phần quyến rũ khi bước vào phòng ngủ.<br style=\"line-height: 21px;\">- Chất liệu: Satin lụa.</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"line-height: 21px;\">* SIZE:&nbsp;</span>Freesize phù hợp cho người dưới 58kg (tuỳ chiều cao).</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"line-height: 21px;\">CAM KẾT:</span></p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">Đổi sản phẩm nếu lỗi</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">-----------------</p><ol style=\"line-height: 21px; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\"><li style=\"line-height: 21px;\">Điều kiện áp dụng (trong vòng 03 ngày kể từ khi nhận sản phẩm):</li></ol><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">- Hàng hóa hư hỏng, lỗi.</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">- Hàng không đúng, kiểu dáng như hình.</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">- Không đúng số lượng, không đủ bộ như trong đơn hàng.</p><ol start=\"2\" style=\"line-height: 21px; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\"><li style=\"line-height: 21px;\">Trường hợp không đủ điều kiện áp dụng chính sách:</li></ol><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">- Quá 03 ngày kể từ khi Quý khách nhận hàng.</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">- Gửi lại hàng không đúng mẫu mã, không phải hàng của shop.</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">- Đặt nhầm sản phẩm, không thích, không hợp</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">-----------------</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"line-height: 21px;\">CHÁT với SHOP nếu bạn cần tư vấn thêm nhé !!!</span></p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\"><img title=\"\" src=\"https://salt.tikicdn.com/ts/tmp/00/65/ea/8ba3cd235eb215b46b91022fe26e202d.jpg\" alt=\"\" style=\"max-width: 100%; line-height: 21px; display: block; width: auto; height: auto; margin: 0px auto;\"></p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\"><img title=\"\" src=\"https://salt.tikicdn.com/ts/tmp/79/1c/6a/d044fcad99c604ff2296f3d912c2fb82.jpg\" alt=\"\" style=\"max-width: 100%; line-height: 21px; display: block; width: auto; height: auto; margin: 0px auto;\"></p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\"><img title=\"\" src=\"https://salt.tikicdn.com/ts/tmp/a8/b6/ff/0e65757eca1e59540032db7346d5c842.jpg\" alt=\"\" style=\"max-width: 100%; line-height: 21px; display: block; width: auto; height: auto; margin: 0px auto;\"></p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\"><img title=\"\" src=\"https://salt.tikicdn.com/ts/tmp/36/46/3a/e0d0ea0e52523cd5492258b9396e8228.jpg\" alt=\"\" style=\"max-width: 100%; line-height: 21px; display: block; width: auto; height: auto; margin: 0px auto;\"></p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p><p style=\"margin: 5px 0px 12px; line-height: 21px; word-break: break-word; color: rgb(36, 36, 36); font-family: Inter, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify;\">Sản phẩm này là tài sản cá nhân được bán bởi Nhà Bán Hàng Cá Nhân và không thuộc đối tượng phải chịu thuế GTGT. Do đó hoá đơn VAT không được cung cấp trong trường hợp này.</p>', 17, 1, 1, 1, '2025-03-02 00:27:19', '2025-03-02 00:27:19', NULL);
INSERT INTO `products` VALUES (2, 'Váy công sở nữ cao cấp', 'images/products/002.jpeg', 10, 350000, '1', 20, 'vay-cong-so-nu-cao-cap-1', 'Váy công sở thanh lịch, phù hợp cho dân văn phòng.', 15, 1, 3, 2, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (3, 'Quần jeans nữ cá tính', 'images/products/003.jpeg', 25, 450000, '1', 15, 'quan-jeans-nu-ca-tinh-2', 'Quần jeans ôm sát tôn dáng, thoải mái vận động.', 22, 1, 2, 5, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (4, 'Áo sơ mi nữ thanh lịch', 'images/products/004.jpeg', 30, 299000, '1', 10, 'ao-so-mi-nu-thanh-lich-3', 'Áo sơ mi nữ dễ phối đồ, phù hợp mọi dịp.', 18, 1, 4, 1, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (5, 'Chân váy xòe phong cách Hàn Quốc', 'images/products/005.jpeg', 15, 420000, '1', 25, 'chan-vay-xoe-han-quoc-4', 'Chân váy xòe giúp tôn dáng và tạo sự nữ tính.', 20, 1, 1, 3, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (6, 'Giày cao gót sang trọng', 'images/products/006.jpeg', 12, 650000, '1', 30, 'giay-cao-got-sang-trong-5', 'Giày cao gót thiết kế hiện đại, êm chân.', 10, 1, 5, 6, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (7, 'Túi xách da thật phong cách', 'images/products/007.jpeg', 8, 1200000, '1', 40, 'tui-xach-da-that-6', 'Túi xách làm từ da thật, sang trọng và bền.', 35, 1, 3, 4, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (8, 'Đầm dạ hội lộng lẫy', 'images/products/008.jpeg', 5, 980000, '1', 50, 'dam-da-hoi-long-lay-7', 'Đầm dạ hội cao cấp, giúp bạn nổi bật trong sự kiện.', 42, 1, 2, 8, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (9, 'Bộ đồ thể thao năng động', 'images/products/009.jpeg', 20, 250000, '1', 5, 'bo-the-thao-nang-dong-8', 'Thích hợp cho các hoạt động thể thao ngoài trời.', 28, 1, 4, 9, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (10, 'Áo len cổ cao mùa đông', 'images/products/010.jpeg', 18, 315000, '1', 18, 'ao-len-co-cao-9', 'Áo len giữ ấm tốt, mềm mịn và thoải mái.', 30, 1, 3, 7, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (11, 'Quần short nữ trẻ trung', 'images/products/011.jpeg', 22, 275000, '1', 8, 'quan-short-nu-10', 'Quần short phong cách năng động, dễ phối đồ.', 25, 1, 2, 1, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (12, 'Set đồ công sở nữ cao cấp', 'images/products/012.jpeg', 12, 850000, '1', 20, 'set-do-cong-so-nu-11', 'Bộ đồ công sở hiện đại, sang trọng.', 38, 1, 1, 3, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (13, 'Chân váy bút chì ôm sát', 'images/products/013.jpeg', 14, 420000, '1', 30, 'chan-vay-but-chi-12', 'Chân váy ôm sát giúp tôn dáng, phù hợp đi làm.', 14, 1, 3, 5, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (14, 'Áo thun basic nữ', 'images/products/014.jpeg', 28, 220000, '1', 5, 'ao-thun-basic-nu-13', 'Áo thun thoáng mát, phù hợp với mùa hè.', 9, 1, 4, 2, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (15, 'Váy maxi đi biển', 'images/products/015.jpeg', 10, 550000, '1', 25, 'vay-maxi-di-bien-14', 'Váy maxi nhẹ nhàng, thoáng mát cho mùa hè.', 48, 1, 2, 7, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (16, 'Giày sneaker nữ', 'images/products/016.jpeg', 18, 650000, '1', 10, 'giay-sneaker-nu-15', 'Sneaker thoải mái, phù hợp đi chơi, dạo phố.', 50, 1, 5, 6, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (17, 'Túi tote vải canvas', 'images/products/017.jpeg', 24, 300000, '1', 15, 'tui-tote-vai-canvas-16', 'Túi tote rộng rãi, tiện lợi khi đi học.', 19, 1, 3, 4, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (18, 'Quần legging thể thao', 'images/products/018.jpeg', 15, 270000, '1', 12, 'quan-legging-the-thao-17', 'Quần legging co giãn, phù hợp tập gym.', 26, 1, 4, 8, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (19, 'Áo khoác dù nữ chống nắng', 'images/products/019.jpeg', 8, 450000, '1', 22, 'ao-khoac-du-nu-18', 'Áo khoác nhẹ, chống nắng, phù hợp mùa hè.', 29, 1, 5, 1, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (20, 'Set váy áo mùa thu', 'images/products/020.jpeg', 6, 780000, '1', 35, 'set-vay-ao-mua-thu-19', 'Set váy áo mềm mại, giữ ấm tốt.', 32, 1, 1, 2, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (21, 'Đầm babydoll đáng yêu', 'images/products/021.jpeg', 10, 560000, '1', 25, 'dam-babydoll-dang-yeu-20', 'Đầm babydoll form rộng, dễ thương.', 45, 1, 2, 5, '2025-03-02 00:35:10', '2025-03-02 00:35:10', NULL);
INSERT INTO `products` VALUES (22, 'Áo hoodie nữ dáng rộng', 'images/products/022.jpeg', 20, 320000, '1', 10, 'ao-hoodie-nu-dang-rong-21', 'Áo hoodie phong cách Hàn Quốc, chất vải dày dặn.', 12, 1, 4, 3, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (23, 'Quần jogger thể thao nữ', 'images/products/023.jpeg', 15, 275000, '1', 15, 'quan-jogger-the-thao-nu-22', 'Quần jogger co giãn, thoải mái vận động.', 23, 1, 2, 8, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (24, 'Đầm suông đơn giản', 'images/products/024.jpeg', 10, 400000, '1', 20, 'dam-suong-don-gian-23', 'Đầm suông nhẹ nhàng, phù hợp mọi dáng người.', 18, 1, 2, 6, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (25, 'Áo blazer nữ công sở', 'images/products/025.jpeg', 8, 650000, '1', 25, 'ao-blazer-nu-24', 'Blazer nữ sang trọng, dễ phối đồ.', 19, 1, 3, 1, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (26, 'Túi xách nữ mini cao cấp', 'images/products/026.jpeg', 12, 850000, '1', 30, 'tui-xach-nu-mini-25', 'Túi xách nhỏ gọn, phong cách hiện đại.', 30, 1, 3, 5, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (27, 'Giày lười nữ thoải mái', 'images/products/027.jpeg', 18, 490000, '1', 12, 'giay-luoi-nu-26', 'Giày lười thiết kế tinh tế, dễ mang.', 27, 1, 5, 4, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (28, 'Balo vải canvas phong cách', 'images/products/028.jpeg', 14, 350000, '1', 5, 'balo-vai-canvas-27', 'Balo rộng rãi, phù hợp đi học, đi chơi.', 32, 1, 3, 9, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (29, 'Váy body quyến rũ', 'images/products/029.jpeg', 9, 720000, '1', 28, 'vay-body-quyen-ru-28', 'Váy ôm sát giúp tôn dáng, thích hợp dự tiệc.', 44, 1, 1, 2, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (30, 'Áo len cổ lọ giữ ấm', 'images/products/030.jpeg', 17, 310000, '1', 18, 'ao-len-co-lo-29', 'Áo len mềm mại, giữ nhiệt tốt vào mùa đông.', 33, 1, 4, 5, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (31, 'Chân váy tennis nữ', 'images/products/031.jpeg', 20, 360000, '1', 22, 'chan-vay-tennis-nu-30', 'Chân váy ngắn trẻ trung, năng động.', 16, 1, 2, 5, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (32, 'Bộ đồ ngủ cotton dễ thương', 'images/products/032.jpeg', 15, 280000, '1', 10, 'bo-do-ngu-cotton-31', 'Bộ đồ ngủ thoáng mát, mềm mại, dễ chịu.', 11, 1, 3, 3, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (33, 'Váy trễ vai đi biển', 'images/products/033.jpeg', 12, 590000, '1', 20, 'vay-tre-vai-di-bien-32', 'Váy trễ vai thoải mái, phù hợp thời trang hè.', 46, 1, 2, 8, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (34, 'Áo khoác cardigan nữ', 'images/products/034.jpeg', 10, 480000, '1', 15, 'ao-khoac-cardigan-nu-33', 'Cardigan len dệt kim, nhẹ nhàng và ấm áp.', 29, 1, 4, 1, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (35, 'Túi đeo chéo nữ nhỏ gọn', 'images/products/035.jpeg', 18, 300000, '1', 5, 'tui-deo-cheo-nu-34', 'Túi đeo chéo nhỏ, tiện lợi khi di chuyển.', 35, 1, 3, 4, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (36, 'Giày sandal nữ mùa hè', 'images/products/036.jpeg', 14, 450000, '1', 10, 'giay-sandal-nu-35', 'Sandal thiết kế thoáng mát, phù hợp du lịch.', 50, 1, 5, 6, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (37, 'Áo dài cách tân nữ', 'images/products/037.jpeg', 6, 890000, '1', 30, 'ao-dai-cach-tan-nu-36', 'Áo dài cách tân phong cách truyền thống kết hợp hiện đại.', 39, 1, 1, 9, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (38, 'Quần culottes nữ sang trọng', 'images/products/038.jpeg', 16, 410000, '1', 15, 'quan-culottes-nu-37', 'Quần culottes ống rộng, dễ phối với nhiều kiểu áo.', 22, 1, 2, 2, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (39, 'Váy công chúa lộng lẫy', 'images/products/039.jpeg', 8, 950000, '1', 35, 'vay-cong-chua-long-lay-38', 'Váy xòe công chúa, phù hợp sự kiện đặc biệt.', 48, 1, 1, 5, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (40, 'Bộ đồ gym nữ thể thao', 'images/products/040.jpeg', 20, 320000, '1', 5, 'bo-do-gym-nu-39', 'Bộ đồ thể thao chất liệu co giãn, thoáng mát.', 24, 1, 4, 3, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (41, 'Đầm ren quyến rũ', 'images/products/041.jpeg', 10, 780000, '1', 25, 'dam-ren-quyen-ru-40', 'Đầm ren sang trọng, tạo sự quyến rũ.', 45, 1, 2, 6, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (42, 'Áo sơ mi họa tiết vintage', 'images/products/042.jpeg', 15, 295000, '1', 8, 'ao-so-mi-hoa-tiet-41', 'Áo sơ mi phong cách cổ điển, dễ phối đồ.', 37, 1, 3, 8, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (43, 'Set áo váy công sở', 'images/products/043.jpeg', 7, 890000, '1', 28, 'set-ao-vay-cong-so-42', 'Set áo váy lịch sự, sang trọng.', 41, 1, 1, 1, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (44, 'Váy midi họa tiết hoa', 'images/products/044.jpeg', 12, 590000, '1', 15, 'vay-midi-hoa-tiet-43', 'Váy midi phong cách vintage, nữ tính.', 31, 1, 2, 9, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (45, 'Bộ pijama lụa sang trọng', 'images/products/045.jpeg', 9, 750000, '1', 25, 'bo-pijama-lua-44', 'Bộ pijama lụa mềm mịn, thoải mái khi mặc.', 43, 1, 3, 4, '2025-03-02 00:38:06', '2025-03-02 00:38:06', NULL);
INSERT INTO `products` VALUES (46, 'Chân váy ren nữ tính', 'images/products/046.jpeg', 45, 250000, '1', 25, 'chan-vay-ren-nu-tinh', 'Chân váy ren phong cách Hàn Quốc, thiết kế thanh lịch', 15, 1, 3, 5, '2025-03-02 00:39:08', '2025-03-02 00:39:08', NULL);
INSERT INTO `products` VALUES (47, 'Đầm ôm body gợi cảm', 'images/products/047.jpeg', 20, 320000, '1', 35, 'dam-om-body-goi-cam', 'Đầm ôm body gợi cảm phù hợp đi tiệc, sự kiện', 20, 1, 4, 9, '2025-03-02 00:39:08', '2025-03-02 00:39:08', NULL);
INSERT INTO `products` VALUES (48, 'Set áo croptop và chân váy', 'images/products/048.jpeg', 18, 290000, '1', 30, 'set-ao-croptop-va-chan-vay', 'Set áo croptop kết hợp chân váy ngắn trẻ trung', 12, 1, 5, 5, '2025-03-02 00:39:08', '2025-03-02 00:39:08', NULL);
INSERT INTO `products` VALUES (49, 'Váy xòe tay dài vintage', 'images/products/049.jpeg', 22, 350000, '1', 40, 'vay-xoe-tay-dai-vintage', 'Váy xòe phong cách vintage, phù hợp mọi dịp', 25, 1, 5, 6, '2025-03-02 00:39:08', '2025-03-02 00:39:08', NULL);
INSERT INTO `products` VALUES (50, 'Quần culottes nữ lưng cao', 'images/products/050.jpeg', 30, 270000, '1', 20, 'quan-culottes-nu-lung-cao', 'Quần culottes nữ lưng cao, dễ phối đồ', 30, 1, 5, 7, '2025-03-02 00:39:08', '2025-03-02 00:39:08', NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Khách hàng', 'Tài khoản của Khách hàng', 1, NULL);
INSERT INTO `roles` VALUES (2, 'ADMIN', 'Tài khoản của admin', 1, NULL);

-- ----------------------------
-- Table structure for sale_product
-- ----------------------------
DROP TABLE IF EXISTS `sale_product`;
CREATE TABLE `sale_product`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sale_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sale_product_sale_id_foreign`(`sale_id` ASC) USING BTREE,
  INDEX `sale_product_product_id_foreign`(`product_id` ASC) USING BTREE,
  CONSTRAINT `sale_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sale_product_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sale_product
-- ----------------------------

-- ----------------------------
-- Table structure for sales
-- ----------------------------
DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `number_sale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percent` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sales
-- ----------------------------
INSERT INTO `sales` VALUES (1, '20', '10', '0', '00:00:10', '00:00:12', NULL, NULL, NULL);
INSERT INTO `sales` VALUES (2, '10', '13', '1', '00:00:16', '00:00:17', NULL, NULL, NULL);
INSERT INTO `sales` VALUES (3, '30', '15', '0', '00:00:18', '00:00:19', NULL, NULL, NULL);
INSERT INTO `sales` VALUES (4, '20', '20', '0', '00:00:09', '00:00:10', NULL, NULL, NULL);
INSERT INTO `sales` VALUES (5, '12', '25', '0', '00:00:19', '00:00:20', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for shipment_details
-- ----------------------------
DROP TABLE IF EXISTS `shipment_details`;
CREATE TABLE `shipment_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `shipment_details_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `shipment_details_order_id_foreign`(`order_id` ASC) USING BTREE,
  CONSTRAINT `shipment_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shipment_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shipment_details
-- ----------------------------

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `caption` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `profile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (1, NULL, NULL, NULL, 'slider/H22la45IfzV6ou9J5iaOtRCi3x25dZVy30KOVY3z.jpg', 'chan-vay-but-chi-12', '2025-03-02 01:28:14', '2025-03-02 01:28:14');
INSERT INTO `sliders` VALUES (2, NULL, NULL, NULL, 'slider/b8MxoCa7urTryFcE4TcfM6y7RjXJa95Qxz5gzLK8.jpg', 'bo-the-thao-nang-dong-8', '2025-03-02 01:28:24', '2025-03-02 01:28:24');
INSERT INTO `sliders` VALUES (3, NULL, NULL, NULL, 'slider/sgc3HSda1oaFJcjVcY3v5AvsnfFb9Jd33n0tOUjR.jpg', 'ao-so-mi-nu-thanh-lich-3', '2025-03-02 01:28:35', '2025-03-02 01:28:35');
INSERT INTO `sliders` VALUES (4, NULL, NULL, NULL, 'slider/m3eJ48Gcz7Un9E4lBF4lXEY1vClXm6eWKv7KbgL2.jpg', 'quan-jeans-nu-ca-tinh-2', '2025-03-02 01:29:05', '2025-03-02 01:29:05');
INSERT INTO `sliders` VALUES (5, NULL, NULL, NULL, 'slider/t2fpWljP87TpC2C3RrDG2UQcd3hgAnp5MamNRExq.jpg', 'set-ao-croptop-va-chan-vay', '2025-03-02 01:29:18', '2025-03-02 01:29:18');

-- ----------------------------
-- Table structure for suppliers
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameSupplier` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES (1, 'Dr. Reid Miller', '4273 Bode Manors\nTarafort, SC 09683', '401-209-4797', 0, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `suppliers` VALUES (2, 'Johan Jacobs', '5648 Karson Lakes\nLake Maceystad, MO 22150', '262.748.3806', 0, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `suppliers` VALUES (3, 'Tito Cole', '296 Osinski Hills\nRussstad, NE 58045-9930', '+14452275137', 0, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `suppliers` VALUES (4, 'Prof. Howard Maggio', '136 Royce Gardens Suite 678\nEvieburgh, NY 58824-1000', '970.600.2224', 1, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `suppliers` VALUES (5, 'Mr. Magnus Feeney DVM', '955 Smitham Corners\nPort Mauricehaven, OK 39267-8123', '630.632.3009', 1, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `suppliers` VALUES (6, 'Molly Casper', '51788 Mandy Spring\nWest Floridaberg, MA 57594-6728', '661-429-9825', 1, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `suppliers` VALUES (7, 'Abagail Schaefer', '98698 Larson Walk\nRoyceburgh, MD 27259', '760.269.5402', 1, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `suppliers` VALUES (8, 'Velda Cassin', '1952 Kessler Locks Apt. 231\nChaimland, OK 14841', '956-801-2852', 0, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `suppliers` VALUES (9, 'Eveline Schuster PhD', '580 Bogan Estates\nSouth Dariana, ND 93908-7999', '570-388-6335', 0, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);
INSERT INTO `suppliers` VALUES (10, 'Mara Glover', '8635 Metz Keys Suite 160\nGreenfurt, NE 43762-1101', '(941) 436-9703', 1, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);

-- ----------------------------
-- Table structure for temp_products
-- ----------------------------
DROP TABLE IF EXISTS `temp_products`;
CREATE TABLE `temp_products`  (
  `id` bigint UNSIGNED NOT NULL DEFAULT 0,
  `new_id` bigint UNSIGNED NOT NULL DEFAULT 0
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of temp_products
-- ----------------------------
INSERT INTO `temp_products` VALUES (1, 1);
INSERT INTO `temp_products` VALUES (9, 2);
INSERT INTO `temp_products` VALUES (10, 3);
INSERT INTO `temp_products` VALUES (11, 4);
INSERT INTO `temp_products` VALUES (12, 5);
INSERT INTO `temp_products` VALUES (13, 6);
INSERT INTO `temp_products` VALUES (14, 7);
INSERT INTO `temp_products` VALUES (15, 8);
INSERT INTO `temp_products` VALUES (16, 9);
INSERT INTO `temp_products` VALUES (17, 10);
INSERT INTO `temp_products` VALUES (18, 11);
INSERT INTO `temp_products` VALUES (19, 12);
INSERT INTO `temp_products` VALUES (20, 13);
INSERT INTO `temp_products` VALUES (21, 14);
INSERT INTO `temp_products` VALUES (22, 15);
INSERT INTO `temp_products` VALUES (23, 16);
INSERT INTO `temp_products` VALUES (24, 17);
INSERT INTO `temp_products` VALUES (25, 18);
INSERT INTO `temp_products` VALUES (26, 19);
INSERT INTO `temp_products` VALUES (27, 20);
INSERT INTO `temp_products` VALUES (28, 21);
INSERT INTO `temp_products` VALUES (29, 22);
INSERT INTO `temp_products` VALUES (30, 23);
INSERT INTO `temp_products` VALUES (31, 24);
INSERT INTO `temp_products` VALUES (32, 25);
INSERT INTO `temp_products` VALUES (33, 26);
INSERT INTO `temp_products` VALUES (34, 27);
INSERT INTO `temp_products` VALUES (35, 28);
INSERT INTO `temp_products` VALUES (36, 29);
INSERT INTO `temp_products` VALUES (37, 30);
INSERT INTO `temp_products` VALUES (38, 31);
INSERT INTO `temp_products` VALUES (39, 32);
INSERT INTO `temp_products` VALUES (40, 33);
INSERT INTO `temp_products` VALUES (41, 34);
INSERT INTO `temp_products` VALUES (42, 35);
INSERT INTO `temp_products` VALUES (43, 36);
INSERT INTO `temp_products` VALUES (44, 37);
INSERT INTO `temp_products` VALUES (45, 38);
INSERT INTO `temp_products` VALUES (46, 39);
INSERT INTO `temp_products` VALUES (47, 40);
INSERT INTO `temp_products` VALUES (48, 41);
INSERT INTO `temp_products` VALUES (49, 42);
INSERT INTO `temp_products` VALUES (50, 43);
INSERT INTO `temp_products` VALUES (51, 44);
INSERT INTO `temp_products` VALUES (52, 45);
INSERT INTO `temp_products` VALUES (53, 46);
INSERT INTO `temp_products` VALUES (54, 47);
INSERT INTO `temp_products` VALUES (55, 48);
INSERT INTO `temp_products` VALUES (56, 49);
INSERT INTO `temp_products` VALUES (57, 50);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `avatar` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address_detail` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `group_user` int UNSIGNED NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  INDEX `users_group_user_foreign`(`group_user` ASC) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `users_group_user_foreign` FOREIGN KEY (`group_user`) REFERENCES `group_users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'users/avatar/i6LRYeWnYUUff92cnJ9txn1Ad9gpUvv52HFomoDt.jpg', 'Lincoln Smitham DDS', '63232 Kuhic Trail\nPort Madelynnhaven, DC 81493-5572', 'tútrjsrtj', '09765945602', 'admin@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1', 1, NULL, 2, NULL, NULL, '2025-03-02 00:15:18', '2025-03-02 01:30:20', NULL);
INSERT INTO `users` VALUES (2, 'https://webmaudep.com/demo/thucpham/tp01/images/product-5.jpg', 'Nolan Schmidt', '998 Maritza Fort\nLake Abelview, OH 90639-1124', '1969 Rolfson Field\nNew Alexieport, WY 00158-0134', '(435) 723-4594', 'user@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1', 0, 7, 1, NULL, NULL, '2025-03-02 00:15:18', '2025-03-02 00:15:18', NULL);

SET FOREIGN_KEY_CHECKS = 1;
