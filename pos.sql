-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 02:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `productid` int(11) NOT NULL,
  `ismain` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `created_at`, `updated_at`, `name`, `productid`, `ismain`) VALUES
(1, '2023-09-16 03:29:11', '2023-09-16 03:29:11', '1694863751.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_100000_create_password_resets_table', 1),
(71, '2014_10_12_000000_create_users_table', 2),
(72, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(73, '2019_08_19_000000_create_failed_jobs_table', 2),
(74, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(75, '2023_08_22_192129_create_product_table', 2),
(76, '2023_09_10_140334_create_image_table', 2),
(77, '2023_09_14_182449_create_sale_table', 2),
(78, '2023_09_14_183001_create_transaction_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `srp` double(8,2) NOT NULL,
  `orig` double(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `srp`, `orig`, `qty`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nescafe', NULL, 10.00, 8.00, 8, 1, '2023-09-16 03:29:11', '2023-09-16 04:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `productid` int(11) NOT NULL,
  `transactionid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `srp` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `created_at`, `updated_at`, `productid`, `transactionid`, `qty`, `srp`) VALUES
(1, '2023-09-16 03:36:13', '2023-09-16 03:36:13', 1, 1, 1, 10.00),
(2, '2023-09-16 03:38:19', '2023-09-16 03:38:19', 1, 2, 1, 10.00),
(3, '2023-09-16 03:38:32', '2023-09-16 03:38:32', 1, 3, 1, 10.00),
(4, '2023-09-16 03:59:10', '2023-09-16 03:59:10', 1, 5, 1, 10.00),
(5, '2023-09-16 04:00:54', '2023-09-16 04:00:54', 1, 6, 1, 10.00),
(7, '2023-09-16 04:01:51', '2023-09-16 04:01:51', 1, 8, 1, 10.00),
(8, '2023-09-16 04:03:18', '2023-09-16 04:03:18', 1, 9, 1, 10.00),
(9, '2023-09-16 04:03:50', '2023-09-16 04:03:50', 1, 10, 1, 10.00),
(12, '2023-09-16 04:04:37', '2023-09-16 04:04:37', 1, 13, 1, 10.00),
(13, '2023-09-16 04:05:24', '2023-09-16 04:05:24', 1, 14, 3, 10.00),
(14, '2023-09-16 04:06:08', '2023-09-16 04:06:08', 1, 15, 3, 10.00),
(16, '2023-09-16 04:12:16', '2023-09-16 04:12:16', 1, 17, 1, 10.00),
(17, '2023-09-16 04:12:25', '2023-09-16 04:12:25', 1, 18, 2, 10.00),
(18, '2023-09-16 04:18:54', '2023-09-16 04:18:54', 1, 19, 2, 10.00),
(20, '2023-09-16 04:27:52', '2023-09-16 04:27:52', 1, 26, 2, 10.00),
(21, '2023-09-16 04:32:27', '2023-09-16 04:32:27', 1, 27, 1, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `total` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `created_at`, `updated_at`, `userid`, `total`) VALUES
(1, '2023-09-16 03:36:13', '2023-09-16 03:36:13', 1, 0.00),
(2, '2023-09-16 03:38:19', '2023-09-16 03:38:19', 1, 10.00),
(3, '2023-09-16 03:38:32', '2023-09-16 03:38:32', 1, 10.00),
(5, '2023-09-16 03:59:10', '2023-09-16 03:59:10', 1, 10.00),
(6, '2023-09-16 04:00:54', '2023-09-16 04:00:54', 1, 10.00),
(8, '2023-09-16 04:01:51', '2023-09-16 04:01:51', 1, 10.00),
(9, '2023-09-16 04:03:18', '2023-09-16 04:03:18', 1, 10.00),
(10, '2023-09-16 04:03:50', '2023-09-16 04:03:50', 1, 10.00),
(13, '2023-09-16 04:04:37', '2023-09-16 04:04:37', 1, 10.00),
(14, '2023-09-16 04:05:24', '2023-09-16 04:05:24', 1, 10.00),
(15, '2023-09-16 04:06:08', '2023-09-16 04:06:08', 1, 30.00),
(17, '2023-09-16 04:12:16', '2023-09-16 04:12:16', 1, 10.00),
(18, '2023-09-16 04:12:25', '2023-09-16 04:12:25', 1, 20.00),
(19, '2023-09-16 04:18:54', '2023-09-16 04:18:54', 1, 20.00),
(26, '2023-09-16 04:27:52', '2023-09-16 04:27:52', 1, 20.00),
(27, '2023-09-16 04:32:27', '2023-09-16 04:32:27', 1, 10.00);

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
  `type` varchar(255) NOT NULL DEFAULT 'employee',
  `active` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jordan', 's@g.com', NULL, '$2y$10$h.0/MOR353RMIof6K3zr3.vFig2g8aco7ddwUQaLux6tjPzCR3Nsq', 'employee', 1, NULL, '2023-09-16 03:28:51', '2023-09-16 03:28:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
