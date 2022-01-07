-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2022 at 12:16 PM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapidiot_rapidiot`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activityType` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activityById` bigint(20) UNSIGNED NOT NULL,
  `deviceNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deviceStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sharedControlWith` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activityType`, `activityById`, `deviceNumber`, `deviceStatus`, `pinId`, `pinStatus`, `details`, `sharedControlWith`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Device Update', 1, '', '1', '-', '-', 'Device Details Updated', 0, NULL, '2021-02-27 06:09:57', '2021-02-27 06:09:57'),
(2, 'Device Update', 1, '9908VRSK244014', '0', '-', '-', 'Device Details Updated', 0, NULL, '2021-02-27 06:10:13', '2021-02-27 06:10:13'),
(3, 'Device Update', 1, '9908VRSK244014', '1', '-', '-', 'Device Details Updated', 0, NULL, '2021-02-27 06:36:29', '2021-02-27 06:36:29'),
(4, 'Device Update', 1, '9908VRSK244014', '1', '-', '-', 'Device Details Updated', 0, NULL, '2021-02-27 06:36:41', '2021-02-27 06:36:41'),
(5, 'Device Update', 1, '9908VRSK244014', '1', '-', '-', 'Device Details Updated', 0, NULL, '2021-02-28 02:44:24', '2021-02-28 02:44:24'),
(6, 'Device Update', 3, '9908VRSK244015', '1', '-', '-', 'Device Details Updated', 0, NULL, '2021-03-20 03:06:56', '2021-03-20 03:06:56'),
(7, 'Device Update', 3, '9908VRSK244015', '0', '-', '-', 'Device Details Updated', 0, NULL, '2021-03-20 03:11:38', '2021-03-20 03:11:38'),
(8, 'Device Update', 3, '9908VRSK244015', '1', '-', '-', 'Device Details Updated', 0, NULL, '2021-03-20 03:12:16', '2021-03-20 03:12:16'),
(9, 'Pin Updated', 3, '9908VRSK244015', '1', '25', '1', 'Pin Updated', 0, NULL, '2021-03-26 12:08:37', '2021-03-26 12:08:37'),
(10, 'Pin Updated', 3, '9908VRSK244015', '1', '25', '0', 'Pin Updated', 0, NULL, '2021-03-26 12:08:40', '2021-03-26 12:08:40'),
(11, 'Pin Updated', 3, '9908VRSK244015', '1', '29', '1', 'Pin Updated', 0, NULL, '2021-03-26 12:08:41', '2021-03-26 12:08:41'),
(12, 'Pin Updated', 3, '9908VRSK244015', '1', '29', '0', 'Pin Updated', 0, NULL, '2021-03-26 12:08:42', '2021-03-26 12:08:42'),
(13, 'New User Registration from App', 0, '-', '-', '-', '-', 'New User Registration from Mobile app', 0, NULL, '2021-04-28 12:48:02', '2021-04-28 12:48:02'),
(14, 'New User Registration from App', 0, '-', '-', '-', '-', 'New User Registration from Mobile app', 0, NULL, '2021-04-28 12:50:10', '2021-04-28 12:50:10'),
(15, 'New User Registration from App', 0, '-', '-', '-', '-', 'New User Registration from Mobile app', 0, NULL, '2021-04-28 12:52:34', '2021-04-28 12:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deviceNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinsInDevice` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deviceAddedByID` tinyint(1) NOT NULL DEFAULT 0,
  `deviceModifiedByID` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `deviceNumber`, `pinsInDevice`, `name`, `details`, `is_active`, `deviceAddedByID`, `deviceModifiedByID`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '9908VRSK244014', 8, '8 Pin Device', '8 pin Device details', 1, 1, 1, NULL, '2021-02-27 11:35:06', '2021-02-27 06:09:29'),
(2, '9908VRSK244015', 8, '8 Pin Device', '8 pin Device details', 1, 1, 1, NULL, '2021-02-27 11:35:06', '2021-03-20 03:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `device_pins`
--

CREATE TABLE `device_pins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deviceNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinNumber` smallint(5) UNSIGNED NOT NULL,
  `pinStatus` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_pins`
--

INSERT INTO `device_pins` (`id`, `deviceNumber`, `name`, `pinNumber`, `pinStatus`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, '9908VRSK244014', 'Pin 1', 1, 1, 1, NULL, '2021-02-27 06:09:29', '2021-03-23 02:34:54'),
(18, '9908VRSK244014', 'Pin 2', 2, 0, 1, NULL, '2021-02-27 06:09:29', '2021-07-06 03:02:21'),
(19, '9908VRSK244014', 'Pin 3', 3, 1, 1, NULL, '2021-02-27 06:09:29', '2021-07-06 03:02:29'),
(20, '9908VRSK244014', 'Pin 4', 4, 1, 1, NULL, '2021-02-27 06:09:29', '2021-07-06 03:02:29'),
(21, '9908VRSK244014', 'Pin 5', 5, 1, 1, NULL, '2021-02-27 06:09:29', '2021-07-06 03:02:29'),
(22, '9908VRSK244014', 'Pin 6', 6, 1, 1, NULL, '2021-02-27 06:09:29', '2021-07-06 03:02:29'),
(23, '9908VRSK244014', 'Pin 7', 7, 1, 1, NULL, '2021-02-27 06:09:29', '2021-07-06 03:01:53'),
(24, '9908VRSK244014', 'Pin 8', 8, 1, 1, NULL, '2021-02-27 06:09:29', '2021-07-06 03:01:53'),
(25, '9908VRSK244015', 'Pin 1', 1, 0, 1, NULL, '2021-03-20 03:06:11', '2021-03-26 12:08:40'),
(26, '9908VRSK244015', 'Pin 2', 2, 0, 1, NULL, '2021-03-20 03:06:11', '2021-03-20 03:06:11'),
(27, '9908VRSK244015', 'Pin 3', 3, 0, 1, NULL, '2021-03-20 03:06:11', '2021-03-20 03:10:28'),
(28, '9908VRSK244015', 'Pin 4', 4, 0, 1, NULL, '2021-03-20 03:06:11', '2021-03-20 03:06:11'),
(29, '9908VRSK244015', 'Pin 5', 5, 0, 1, NULL, '2021-03-20 03:06:11', '2021-03-26 12:08:42'),
(30, '9908VRSK244015', 'Pin 6', 6, 0, 1, NULL, '2021-03-20 03:06:11', '2021-03-20 03:06:11'),
(31, '9908VRSK244015', 'Pin 7', 7, 0, 1, NULL, '2021-03-20 03:06:11', '2021-03-20 03:06:11'),
(32, '9908VRSK244015', 'Pin 8', 8, 0, 1, NULL, '2021-03-20 03:06:11', '2021-03-20 03:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `device_registrations`
--

CREATE TABLE `device_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `deviceNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_registrations`
--

INSERT INTO `device_registrations` (`id`, `userId`, `deviceNumber`, `name`, `details`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 1, '9908VRSK244014', '8 Pin Device', '8 pin Device details', 1, NULL, '2021-02-27 06:09:29', '2021-02-28 02:44:24'),
(5, 3, '9908VRSK244015', 'LivingRoom Device', '8 pin Device details', 1, NULL, '2021-03-20 03:06:11', '2021-03-20 03:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_09_092606_create_devices_table', 1),
(5, '2021_02_16_083432_create_user_devices_table', 1),
(6, '2021_02_16_083604_create_device_pins_table', 1),
(7, '2021_02_16_083624_create_activities_table', 1),
(8, '2021_02_27_112222_create_device_registrations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `createed_by_id` bigint(20) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_expired` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `city`, `state`, `address`, `zipcode`, `avatar`, `email`, `password`, `email_verified_at`, `createed_by_id`, `is_active`, `is_expired`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ravi', 'asdfg', 'asgf', 'asdgf', 'dg', 'dsfgad', 'asdfa', 'user.png', 'kumar.ravi305@gmail.com', '$2y$10$.VMmjZnLWJCS.yBbTwOb2e89KgI4KBiauxnd42gGBKEZ6hdaort7.', '2021-02-27 06:03:25', NULL, 0, 0, NULL, NULL, '2021-02-27 06:03:06', '2021-02-28 02:45:04'),
(2, 'Kumar', 'Babu', '9987655432', 'Hyd', 'Telangana', 'Mothinagar', '500018', '1614500029.jpg', 'kumar@gmail.com', '$2y$10$mAd3puja946ekka1o482aOkXurmJe/8qDTtWFdTnxA/HnLWgXNH7W', '2021-02-02 11:43:33', NULL, 0, 0, NULL, NULL, '2021-02-27 06:13:17', '2021-02-28 02:43:49'),
(3, 'Siddardha', 'Devarayapalli', '9398867646', 'SPSR Nellore', 'AP', 'Vykuntaputam 1st line Kavali', '524201', 'user.png', 'Devarayapallisiddu@gmail.com', '$2y$10$O.6yKPHVfa2NCdBAYmSbUeYTLEd/6LyUYUZh1vuCWo5eApbPmrCde', '2021-03-20 08:32:08', NULL, 0, 0, NULL, NULL, '2021-03-20 02:59:08', '2021-03-20 02:59:08'),
(4, 'Siddardha', 'Devarayapalli', '9398867646', 'SPSR Nellore', 'AP', 'Vykuntaputam 1st line Kavali', '524201', 'user.png', 'myiotact@gmail.com', '$2y$10$7cJCZ4hZnHKUEmRkoVQh..xA9uyDoGcr0XPlFg3S/peA0hTOv1MLC', '2021-03-20 08:32:17', NULL, 0, 0, NULL, NULL, '2021-03-20 03:00:45', '2021-03-20 03:00:45'),
(5, 'Ravi', 'asdfg', 'asgf', 'asdgf', 'dg', 'dsfgad', 'asdfa', 'user.png', 'cadideh248@gridmire.com', '$2y$10$MGtBHrrNeCalyGjQY9l4nO.wZZQtHXolGrlnLVWTWCcBqT1AhzOk.', NULL, NULL, 0, 0, NULL, NULL, '2021-04-28 12:48:01', '2021-04-28 12:48:01'),
(6, 'Ravi', 'asdfg', 'asgf', 'asdgf', 'dg', 'dsfgad', 'asdfa', 'user.png', 'kjohnson@kintul.buzz', '$2y$10$abxAci1i4bHFjFKeIdyXTOn3/9WDrPaF8GjHJRpX9tHhpDPbM5as2', NULL, NULL, 0, 0, NULL, NULL, '2021-04-28 12:50:10', '2021-04-28 12:50:10'),
(7, 'Ravi', 'asdfg', 'asgf', 'asdgf', 'dg', 'dsfgad', 'asdfa', 'user.png', 'Bused1938@einrot.com', '$2y$10$IARgSENyo3fn3sIacYDFMepsPyWw8FrsI/ZsuVPxNuqQP9TEQkow2', NULL, NULL, 0, 0, NULL, NULL, '2021-04-28 12:52:34', '2021-04-28 12:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `deviceNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `canAccessBy` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_devices`
--

INSERT INTO `user_devices` (`id`, `userId`, `deviceNumber`, `canAccessBy`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 1, '9908VRSK244014', 1, 1, NULL, '2021-02-27 06:09:29', '2021-02-27 06:09:29'),
(5, 1, '9908VRSK244014', 2, 1, '2021-03-20 02:45:31', '2021-02-27 06:09:29', '2021-03-20 02:45:31'),
(6, 1, '9908VRSK244014', 3, 1, NULL, '2021-03-20 03:04:26', '2021-03-20 03:04:26'),
(7, 3, '9908VRSK244015', 3, 1, NULL, '2021-03-20 03:06:11', '2021-03-20 03:06:11'),
(8, 3, '9908VRSK244015', 4, 1, NULL, '2021-03-20 03:07:31', '2021-03-20 03:07:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_pins`
--
ALTER TABLE `device_pins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_registrations`
--
ALTER TABLE `device_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `device_pins`
--
ALTER TABLE `device_pins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `device_registrations`
--
ALTER TABLE `device_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
