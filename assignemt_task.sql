-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 04:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignemt_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(56) NOT NULL,
  `description` varchar(256) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Category primary key',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Users primary key',
  `image` varchar(256) NOT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `category_id`, `user_id`, `image`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Auther', '', 1, 4, '', NULL, NULL, NULL, '2022-09-24 00:21:51', NULL),
(2, 'Authers', 'hello', 1, 4, '', NULL, NULL, NULL, '2022-09-23 19:51:05', NULL),
(3, 'Autherss', 'hello', 1, 4, '519156468168.jpg', NULL, NULL, NULL, '2022-09-23 19:57:19', NULL),
(4, 'Autherssd', 'hello', 1, 4, '1515870611850.jpg', NULL, NULL, NULL, '2022-09-23 20:02:30', NULL),
(5, 'Autherssdd', 'hello', 1, 4, '1049961065674.jpg', NULL, NULL, NULL, '2022-09-23 20:07:34', NULL),
(6, 'Autherssddddd', 'hello', 1, 4, '1552478166621.jpg', NULL, NULL, NULL, '2022-09-23 20:08:57', NULL),
(7, 'Autherssdddddd', 'hello', 1, 4, '5176591291581.jpg', NULL, NULL, NULL, '2022-09-23 20:09:31', NULL),
(8, 'Autherssddddddd', 'hello', 1, 4, '1282916108304.jpg', NULL, NULL, NULL, '2022-09-23 20:10:24', NULL),
(9, 'Autherssddddddddd', 'hello', 1, 4, '574067737320.jpg', NULL, NULL, NULL, '2022-09-23 20:20:56', NULL),
(10, 'Autherdssddddddddd', 'hello', 1, 4, '660593897766.jpg', NULL, NULL, NULL, '2022-09-23 20:21:18', NULL),
(11, 'Autherdssddddddddddd', 'hello', 1, 4, '4788889888560.jpg', NULL, NULL, NULL, '2022-09-23 20:22:00', NULL),
(12, 'Autherdssdddddddddddd', 'hello', 1, 4, '3213115690875.jpg', NULL, NULL, NULL, '2022-09-23 20:23:45', NULL),
(13, 'Autherdssddddddddddddd', 'hello', 1, 4, '2246352309900.jpg', NULL, NULL, NULL, '2022-09-23 20:24:34', NULL),
(14, 'Autherdssdddddddddddddd', 'hello', 1, 4, '450934454296.jpg', NULL, NULL, NULL, '2022-09-23 20:26:16', NULL),
(15, 'Autherdssddddddddddddddee', 'hello', 1, 4, '347768695241.jpg', NULL, NULL, NULL, '2022-09-23 20:30:49', NULL),
(16, 'Autherdssddddddddddddddeed', 'hello', 1, 4, '5479437071007.jpg', NULL, NULL, NULL, '2022-09-23 20:31:39', NULL),
(17, 'Autherdssddddddddddddddeedf', 'hello', 1, 4, '5552651592092.jpg', NULL, NULL, NULL, '2022-09-23 20:31:56', NULL),
(18, 'Autherdssddddddddddddddeedfd', 'hello', 1, 4, '1609059835158.jpg', NULL, NULL, NULL, '2022-09-23 22:07:54', NULL),
(19, 'g', 'hello', 1, 4, '1474278263472.jpg', NULL, NULL, NULL, '2022-09-23 22:09:12', NULL),
(20, 'new book', 'new book description', 2, 4, '4526024835680.jpg', NULL, NULL, NULL, '2022-09-24 00:35:19', NULL),
(21, 'new bookd', 'new book description', 2, 4, '4724057182353.jpg', NULL, NULL, NULL, '2022-09-24 02:25:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(56) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'hellofdd', '4397850862962.PNG', '2022-09-23 19:35:34', '0000-00-00 00:00:00', 4, NULL, NULL),
(2, 'new category', '2304611793090.PNG', '2022-09-24 00:33:54', '0000-00-00 00:00:00', 6, NULL, NULL),
(3, 'new categorys', '5223253020812.PNG', '2022-09-24 02:25:08', '0000-00-00 00:00:00', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `user_id`, `device_type`, `device_id`, `mac_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'android', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', 'asdsdsd', NULL, NULL, NULL),
(2, 2, 'android', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', 'asdsdsd', NULL, NULL, NULL),
(3, 3, 'android', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', 'asdsdsd', NULL, NULL, NULL),
(4, 4, 'android', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', 'asdsdsd', NULL, NULL, NULL),
(5, 5, 'android', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', 'asdsdsd', NULL, NULL, NULL),
(6, 6, 'Iphone', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', '12345678', NULL, NULL, NULL),
(7, 7, 'Iphone', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', '12345678', NULL, NULL, NULL),
(8, 8, 'Iphone', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', '12345678', NULL, NULL, NULL),
(9, 9, 'Iphone', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', '12345678', NULL, NULL, NULL),
(10, 10, 'Iphone', 'dIltGhm0Timr1THvK2x_k0:APA91bGhfOR\nEO5wIpZMED6fZuKuP0qpIJ2zD7TU6s9_Y\nwdj9gpD-1yX55VC3LAKI7tp2M1GQSZup-\nKxVb_PERSZ0RNj31BY0g-\nPugP_NsphWxS4He5SNR-\nn7fukzMHeh0Jyvc5sExSVG', '12345678', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

CREATE TABLE `image_galleries` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `images` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'CliniCall Personal Access Client', 'BfJ3DYYmBrQGjVzY7JeDLUL0htr0WlufubuAP16e', NULL, 'http://localhost', 1, 0, 0, '2020-12-07 10:51:39', '2020-12-07 10:51:39'),
(2, NULL, 'CliniCall Password Grant Client', 'VSI4PukB66yuvdPwJLpfgNjWDBHlkPNuUilfK03k', 'users', 'http://localhost', 0, 1, 0, '2020-12-07 10:51:39', '2020-12-07 10:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-12-07 10:51:39', '2020-12-07 10:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(56) NOT NULL,
  `lname` varchar(56) NOT NULL,
  `dob` varchar(56) NOT NULL,
  `address` varchar(256) NOT NULL,
  `email_verified` tinyint(4) DEFAULT 0,
  `image` varchar(256) DEFAULT NULL,
  `accessToken` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `dob`, `address`, `email_verified`, `image`, `accessToken`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`, `created_by`, `updated_by`) VALUES
(1, 'Jawadsssssddsdd', 'Rahman', '23-09-2022', 'Dubai', 0, '5597559297132.jpg', 'FIp6GwKsaa2bxLbEaegtvh8Se9kkK3zbx7dvM5YzK1MRMLmHRp7WHECoBIHQI8Ad7RebkJE9ePCwnxI1', '2022-09-23 18:56:03', NULL, NULL, NULL, NULL, NULL),
(2, 'Jawadsssssddsddd', 'Rahman', '23-09-2022', 'Dubai', 0, '3376173918834.jpg', 'z2QCnfo6ZGbDugGOiXVpOMb3nBrwGSrLGY8f9Wh0UAs1A1KlFxB6NfijArcxBWwJwAwEJDi5wM3bAOl0', '2022-09-23 18:59:06', NULL, NULL, NULL, NULL, NULL),
(3, 'Jawadsssssddsdddd', 'Rahman', '23-09-2022', 'Dubai', 0, '5504378260868.jpg', '3OFNP2rQjdwJdZUaqmL9iFimyrRuLvOySh9m3DRxVQo73aWDTRQA75zqpjr3QW8n9dJqiGrUhLQu9Z4X', '2022-09-23 18:59:31', NULL, NULL, NULL, NULL, NULL),
(4, 'Shahid', 'Rahman', '23-09-2022', 'Dubai', 0, '5719029193318.jpg', 'u8Pc6gyQyi3ts06MmDGNgtjx7eNeJKXERMg8j0eVTGd85uzlc98IwmeWwJPCe6oSjD9Pol4BmWVfwgWX', '2022-09-23 19:00:14', NULL, NULL, NULL, NULL, NULL),
(5, 'Muhammad Jawad Sagheer', 'sagheer', '10-02-1996', 'dubai abu', 0, '1512556967358.jpg', 'UmF0TQYdiX7c2cjkj0LZ1Z1bfYnbdTtdYq2UuV8ziyus93yMT2YXo8GAPJNKfEPwcGS4AhSdr4Hg3IWt', '2022-09-24 00:24:22', NULL, NULL, NULL, NULL, NULL),
(6, 'muhammad', 'jawad sagheer', '10-02-1996', 'Dubai deira', 0, '4028494519602.jpg', 'vyAlDPNqu6SJ0a2mlRC7ucT0aeeIVE2n0cQZmYfHJGtTUq4bj3j1JQzhQlNa0jBSKbTqn1EyeMidBzgT', '2022-09-24 00:32:42', NULL, NULL, NULL, NULL, NULL),
(7, 'muhammads', 'jawad sagheer', '10-02-1996', 'Dubai deira', 0, '2827103635749.jpg', '0AxnD562TqAroq6QDyRjViv2sd8lnEZEGHCC05SHlucV6o36I4CPfsMkoSNOYqCxbbx6dC9OsxO8rXy0', '2022-09-24 00:55:51', NULL, NULL, NULL, NULL, NULL),
(8, 'muhammadsd', 'jawad sagheer', '10-02-1996', 'Dubai deira', 0, '5273155830197.jpg', 'VZHqAuff7OgFNWoIkTl92JAnxBclEnOvfsHgXqeIuNgi7KH9oLeYdveWfvdBmVAgbKsTVLH9q9ENo42a', '2022-09-24 00:56:53', NULL, NULL, NULL, NULL, NULL),
(9, 'muhammadsds', 'jawad sagheer', '10-02-1996', 'Dubai deira', 0, '2941918572424.jpg', 'JCHxDP6uGMwAmNflgFR0F0U6e9kykomewz6ezRfZ7J4o7MoZfJlQaktKkJA83FevtKyZa8MJAmgC2wcp', '2022-09-24 00:58:13', NULL, NULL, NULL, NULL, NULL),
(10, 'muhammadsdsd', 'jawad sagheer', '10-02-1996', 'Dubai deira', 0, '2612458423490.jpg', 'sTrwz8tuUGuUbVQHJTJujPc1cm6uFNF9qxWLEnqtMXEGzxDa3Zl8wxao50KUsL6RZyEfr4Py0h7YzGWl', '2022-09-24 02:24:17', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign_idx` (`user_id`);

--
-- Indexes for table `image_galleries`
--
ALTER TABLE `image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `image_galleries`
--
ALTER TABLE `image_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
