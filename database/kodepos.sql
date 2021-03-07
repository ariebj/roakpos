-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2021 at 12:30 AM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  AUTOCOMMIT = 0;
START TRANSACTION;
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Database: `pos`
  --
  -- --------------------------------------------------------
SET
  FOREIGN_KEY_CHECKS = 0;
-- ----------------------------
  -- Table structure for `postcode`
  -- ----------------------------
  DROP TABLE IF EXISTS `postcode`;
CREATE TABLE `postcode` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `kelurahan` varchar(100) NOT NULL,
    `kecamatan` varchar(100) NOT NULL,
    `kabupaten` varchar(100) NOT NULL,
    `provinsi` varchar(100) NOT NULL,
    `kodepos` varchar(5) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `ixkodepos` (`kodepos`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 81249 DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `postcode`
  --
INSERT INTO
  `categories` (
    `id`,
    `name`,
    `image`,
    `description`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    1,
    'Kopi',
    '27459a1b3eb93a1bb51128958549d23e',
    'Kopi',
    '2021-02-14 20:42:51',
    '2021-02-14 21:25:00'
  ),
  (
    2,
    'Non Kopi',
    '603194bd513eebcd55227a233a0c90fa',
    'Non Kopi',
    '2021-02-14 21:49:37',
    '2021-02-14 21:49:37'
  ),
  (
    3,
    'Makanan',
    '6fbcb02bc71ca7060f96df1b1f92ee71',
    'Makanan',
    '2021-02-14 21:23:20',
    '2021-02-14 21:23:20'
  ),
  (
    4,
    'Roastbean',
    'd2fbd701974359485d39cf4732677146',
    'Roastbean',
    '2021-02-14 21:24:45',
    '2021-02-14 21:24:45'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `failed_jobs`
  --
  CREATE TABLE `failed_jobs` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `uuid` varchar(255) NOT NULL,
    `connection` text NOT NULL,
    `queue` text NOT NULL,
    `payload` longtext NOT NULL,
    `exception` longtext NOT NULL,
    `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Table structure for table `migrations`
  --
  CREATE TABLE `migrations` (
    `id` int(10) UNSIGNED NOT NULL,
    `migration` varchar(255) NOT NULL,
    `batch` int(11) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `migrations`
  --
INSERT INTO
  `migrations` (`id`, `migration`, `batch`)
VALUES
  (1, '2014_10_12_000000_create_users_table', 1),
  (
    2,
    '2014_10_12_100000_create_password_resets_table',
    1
  ),
  (
    3,
    '2019_08_19_000000_create_failed_jobs_table',
    1
  ),
  (4, '2021_02_09_002255_create_products_table', 1),
  (
    5,
    '2021_02_09_002439_create_categories_table',
    1
  ),
  (
    6,
    '2021_02_14_223718_create_transactions_table',
    2
  ),
  (
    7,
    '2021_02_14_223957_create_product_transactions_table',
    2
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `password_resets`
  --
  CREATE TABLE `password_resets` (
    `email` varchar(255) NOT NULL,
    `token` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
-- --------------------------------------------------------
  --
  -- Table structure for table `products`
  --
  CREATE TABLE `products` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `name` varchar(255) NOT NULL,
    `category` varchar(255) DEFAULT 'Uncategories',
    `image` varchar(255) DEFAULT NULL,
    `description` text NOT NULL,
    `status`
    set('active', 'inactive') NOT NULL,
      `stock` int(11) NOT NULL,
      `price` int(11) NOT NULL,
      `created_at` timestamp NULL DEFAULT NULL,
      `updated_at` timestamp NULL DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `products`
  --
INSERT INTO
  `products` (
    `id`,
    `name`,
    `category`,
    `image`,
    `description`,
    `status`,
    `stock`,
    `price`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    1,
    'Aeropress Hot',
    'Kopi',
    'a76bcad1e67521bc0b3df21ebd3b5e07',
    'Kopi',
    'active',
    100,
    14000,
    '2021-02-14 20:53:20',
    '2021-02-14 20:53:20'
  ),
  (
    2,
    'Aeropress Ice',
    'Kopi',
    '97f705024ed873ea622f1773bc05a034',
    'Kopi',
    'active',
    89,
    15000,
    '2021-02-14 21:05:28',
    '2021-02-14 21:47:11'
  ),
  (
    3,
    'Affogato',
    'Kopi',
    '62fc0696193e1e98500356de74c039ea',
    'Affogato',
    'active',
    99,
    18000,
    '2021-02-14 23:27:01',
    '2021-02-15 01:10:16'
  ),
  (
    4,
    'Bonbon Hot',
    'Kopi',
    '772adc61e91db4ea9374a1b6dd4949ac',
    'Bonbon',
    'active',
    99,
    14000,
    '2021-02-14 23:29:43',
    '2021-02-15 01:10:16'
  ),
  (
    5,
    'Bonbon Ice',
    'Kopi',
    '1743886c12d55a096adb03dff74a5c7d',
    'Bonbon ice',
    'active',
    100,
    15000,
    '2021-02-15 01:04:56',
    '2021-02-15 01:04:56'
  ),
  (
    6,
    'Cafe Latte - Hot',
    'Kopi',
    'ac57a0503c0db32cd72695c8807cddf4',
    'Cafe Latte',
    'active',
    100,
    16000,
    '2021-02-15 09:10:54',
    '2021-02-15 11:12:49'
  ),
  (
    7,
    'Cafe Latte - Ice',
    'Kopi',
    'aad1fc86d01a17db2364041d5d503e3e',
    'Cafe latte ice',
    'active',
    100,
    17000,
    '2021-02-15 20:14:30',
    '2021-02-15 20:14:30'
  ),
  (
    8,
    'Cappuccino Hot',
    'Kopi',
    '59151863f56cfa4f387cdbf9c743163d',
    'Cappuccino Hot',
    'active',
    100,
    100,
    '2021-02-15 20:15:18',
    '2021-02-15 20:15:18'
  ),
  (
    9,
    'Cappuccino  - Ice',
    'Kopi',
    'd66861bc33f03e876944560cb270b956',
    'Cappuccino Ice',
    'active',
    100,
    17000,
    '2021-02-15 20:17:52',
    '2021-02-15 20:17:52'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `product_transactions`
  --
  CREATE TABLE `product_transactions` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `product_id` bigint(20) UNSIGNED NOT NULL,
    `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `qty` bigint(20) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
  -- Dumping data for table `product_transactions`
  --
INSERT INTO
  `product_transactions` (
    `id`,
    `product_id`,
    `invoice_number`,
    `qty`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    1,
    4,
    'TRP-000001',
    1,
    '2021-02-15 01:10:16',
    '2021-02-15 01:10:16'
  ),
  (
    2,
    3,
    'TRP-000001',
    1,
    '2021-02-15 01:10:16',
    '2021-02-15 01:10:16'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `transactions`
  --
  CREATE TABLE `transactions` (
    `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `user_id` bigint(20) UNSIGNED NOT NULL,
    `pay` int(11) NOT NULL,
    `total` int(11) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
  -- Dumping data for table `transactions`
  --
INSERT INTO
  `transactions` (
    `invoice_number`,
    `user_id`,
    `pay`,
    `total`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    'TRP-000001',
    1,
    32000,
    32000,
    '2021-02-15 01:10:16',
    '2021-02-15 01:10:16'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `users`
  --
  CREATE TABLE `users` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `remember_token` varchar(100) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `users`
  --
INSERT INTO
  `users` (
    `id`,
    `name`,
    `email`,
    `email_verified_at`,
    `password`,
    `remember_token`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    1,
    'Arie Bachtiar',
    'ariebj@gmail.com',
    '2021-02-09 07:02:50',
    '$2y$10$uXgUMvdp.pEMgaDL5mJYYu/9WQSG4MRZZr2EjhdH/4QYopcg0Vlpy',
    'Cj8YDTvO3h9BvZQvCWlZVBKr0WBCg8DSyaatto0x9R5bELhfrOCyRxFcHEf6',
    '2021-02-09 07:02:22',
    '2021-02-09 07:02:50'
  );
--
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `categories`
  --
ALTER TABLE
  `categories`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `category_name` (`name`) USING BTREE;
--
  -- Indexes for table `failed_jobs`
  --
ALTER TABLE
  `failed_jobs`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);
--
  -- Indexes for table `migrations`
  --
ALTER TABLE
  `migrations`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `password_resets`
  --
ALTER TABLE
  `password_resets`
ADD
  KEY `password_resets_email_index` (`email`);
--
  -- Indexes for table `products`
  --
ALTER TABLE
  `products`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `category` (`category`);
--
  -- Indexes for table `product_transactions`
  --
ALTER TABLE
  `product_transactions`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `users`
  --
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `users_email_unique` (`email`);
--
  -- AUTO_INCREMENT for dumped tables
  --
  --
  -- AUTO_INCREMENT for table `categories`
  --
ALTER TABLE
  `categories`
MODIFY
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
  -- AUTO_INCREMENT for table `failed_jobs`
  --
ALTER TABLE
  `failed_jobs`
MODIFY
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `migrations`
  --
ALTER TABLE
  `migrations`
MODIFY
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
--
  -- AUTO_INCREMENT for table `products`
  --
ALTER TABLE
  `products`
MODIFY
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
--
  -- AUTO_INCREMENT for table `product_transactions`
  --
ALTER TABLE
  `product_transactions`
MODIFY
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
  -- AUTO_INCREMENT for table `users`
  --
ALTER TABLE
  `users`
MODIFY
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
  -- Constraints for dumped tables
  --
  --
  -- Constraints for table `products`
  --
ALTER TABLE
  `products`
ADD
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`name`) ON DELETE
SET
  NULL ON UPDATE CASCADE;
COMMIT;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;