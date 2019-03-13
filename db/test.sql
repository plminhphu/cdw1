-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2019 at 04:27 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

DROP TABLE IF EXISTS `airlines`;
CREATE TABLE IF NOT EXISTS `airlines` (
  `id_airline` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_airline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_airline`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id_airline`, `name_airline`, `created_at`, `updated_at`) VALUES
(1, 'Vietname Airline', NULL, NULL),
(2, 'Vietject Air', NULL, NULL),
(3, 'Bamboo Airline', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
CREATE TABLE IF NOT EXISTS `airports` (
  `id_airport` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_airport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_city` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_airport`),
  KEY `airports_id_city_foreign` (`id_city`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id_airport`, `name_airport`, `id_city`, `created_at`, `updated_at`) VALUES
(1, 'Sân bay Nội Bài', 1, NULL, NULL),
(2, 'Sân bay Đà Nẵng', 2, NULL, NULL),
(3, 'Sân bay Tân Sơn Nhất', 3, NULL, NULL),
(4, 'Sân bay Hà Nội mới', 1, NULL, NULL),
(5, 'Sân bay Sài Gòn mới', 3, NULL, NULL),
(6, 'Sân bay Cần Thơ', 4, NULL, NULL),
(7, 'Sân bay Nha Trang', 5, NULL, NULL),
(8, 'Sân bay Phú Quốc', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id_booking` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number_booking` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `time_from` datetime NOT NULL,
  `flight_type` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `time_to` datetime DEFAULT NULL,
  `id_flightlist_to` bigint(20) UNSIGNED DEFAULT NULL,
  `id_flightlist_from` bigint(20) UNSIGNED NOT NULL,
  `id_paymethod` bigint(20) UNSIGNED NOT NULL,
  `cardnumber_paymethod` int(11) DEFAULT NULL,
  `name_paymethod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ccv_paymethod` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` int(11) NOT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` double(17,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `bookings_id_user_foreign` (`id_user`),
  KEY `bookings_id_flightlist_to_foreign` (`id_flightlist_to`),
  KEY `bookings_id_flightlist_from_foreign` (`id_flightlist_from`),
  KEY `bookings_id_paymethod_foreign` (`id_paymethod`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id_city` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_city` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_country` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_city`),
  KEY `cities_id_conutry_foreign` (`id_country`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id_city`, `name_city`, `code_city`, `id_country`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nội', 'HAN', 1, NULL, NULL),
(2, 'Đà Nẵng', 'DAN', 1, NULL, NULL),
(3, 'Hồ Chí Minh', 'SGN', 1, NULL, NULL),
(4, 'Cần Thơ', 'CAN', 1, NULL, NULL),
(5, 'Nha Trang', 'NHA', 1, NULL, NULL),
(6, 'Phú Quốc', 'PHU', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id_country` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_country`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id_country`, `name_country`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam', NULL, NULL),
(2, 'Nhật Bản', NULL, NULL),
(3, 'Hàn Quốc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flightclasses`
--

DROP TABLE IF EXISTS `flightclasses`;
CREATE TABLE IF NOT EXISTS `flightclasses` (
  `id_flightclass` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_flightclass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_flightclass`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flightclasses`
--

INSERT INTO `flightclasses` (`id_flightclass`, `name_flightclass`, `created_at`, `updated_at`) VALUES
(1, 'Economy', NULL, NULL),
(2, 'Business', NULL, NULL),
(3, 'Premium', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flightlists`
--

DROP TABLE IF EXISTS `flightlists`;
CREATE TABLE IF NOT EXISTS `flightlists` (
  `id_flightlist` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_airline` bigint(20) UNSIGNED NOT NULL,
  `id_city_from` bigint(20) UNSIGNED NOT NULL,
  `id_city_to` bigint(20) UNSIGNED NOT NULL,
  `id_airport_from` bigint(20) UNSIGNED NOT NULL,
  `id_airport_to` bigint(20) UNSIGNED NOT NULL,
  `time_from` datetime NOT NULL,
  `time_to` datetime NOT NULL,
  `people` int(11) NOT NULL,
  `max_people` int(11) NOT NULL,
  `transit` int(11) NOT NULL,
  `duration` time NOT NULL,
  `price` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_flightlist`),
  KEY `flightlists_id_airline_foreign` (`id_airline`),
  KEY `flightlists_id_city_from_foreign` (`id_city_from`),
  KEY `flightlists_id_city_to_foreign` (`id_city_to`),
  KEY `flightlists_id_airport_from_foreign` (`id_airport_from`),
  KEY `flightlists_id_airport_to_foreign` (`id_airport_to`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flightlists`
--

INSERT INTO `flightlists` (`id_flightlist`, `id_airline`, `id_city_from`, `id_city_to`, `id_airport_from`, `id_airport_to`, `time_from`, `time_to`, `people`, `max_people`, `transit`, `duration`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 1, 2, '2019-03-08 04:00:00', '2019-03-03 14:00:00', 0, 600, 0, '13:00:00', 1500000.00, NULL, NULL),
(2, 2, 1, 2, 1, 2, '2019-03-08 04:00:00', '2019-03-03 14:00:00', 0, 600, 10, '13:00:00', 1500000.00, NULL, NULL),
(3, 1, 1, 3, 1, 3, '2019-03-08 04:00:00', '2019-03-03 14:00:00', 0, 600, 1, '13:00:00', 1500000.00, NULL, NULL),
(4, 2, 1, 3, 1, 3, '2019-03-08 04:00:00', '2019-03-03 14:00:00', 0, 600, 1, '13:00:00', 1500000.00, NULL, NULL),
(5, 1, 1, 3, 4, 3, '2019-03-08 04:00:00', '2019-03-03 14:00:00', 0, 600, 1, '13:00:00', 1500000.00, NULL, NULL),
(6, 2, 1, 3, 1, 5, '2019-03-08 04:00:00', '2019-03-03 14:00:00', 0, 600, 1, '13:00:00', 1500000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_06_001249_create_notifications_table', 1),
(4, '2019_03_06_071724_create_countries_table', 1),
(5, '2019_03_06_071814_create_cities_table', 1),
(6, '2019_03_06_071855_create_airlines_table', 1),
(7, '2019_03_06_071918_create_airports_table', 1),
(8, '2019_03_06_072001_create_paymethods_table', 1),
(9, '2019_03_06_072020_create_flightclasses_table', 1),
(10, '2019_03_06_072039_create_passengers_table', 1),
(11, '2019_03_06_072056_create_flightlists_table', 1),
(12, '2019_03_06_072111_create_bookings_table', 1),
(13, '2019_03_06_092232_create_transits_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE IF NOT EXISTS `passengers` (
  `id_passenger` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname_passenger` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname_passenger` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender_passenger` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_booking` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_passenger`),
  KEY `passengers_id_booking_foreign` (`id_booking`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymethods`
--

DROP TABLE IF EXISTS `paymethods`;
CREATE TABLE IF NOT EXISTS `paymethods` (
  `id_paymethod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_paymethod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_paymethod`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymethods`
--

INSERT INTO `paymethods` (`id_paymethod`, `name_paymethod`, `created_at`, `updated_at`) VALUES
(1, 'Transfer', NULL, NULL),
(2, 'Credit Card', NULL, NULL),
(3, 'Paypal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transits`
--

DROP TABLE IF EXISTS `transits`;
CREATE TABLE IF NOT EXISTS `transits` (
  `id_transit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_flightlists` bigint(20) UNSIGNED NOT NULL,
  `id_airports_from` bigint(20) UNSIGNED NOT NULL,
  `id_airports_to` bigint(20) UNSIGNED NOT NULL,
  `time_from` datetime NOT NULL,
  `time_to` datetime NOT NULL,
  `time_duration` time NOT NULL,
  `time_transit` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transit`),
  KEY `transits_id_flightlists_foreign` (`id_flightlists`),
  KEY `transits_id_airports_from_foreign` (`id_airports_from`),
  KEY `transits_id_airports_to_foreign` (`id_airports_to`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transits`
--

INSERT INTO `transits` (`id_transit`, `id_flightlists`, `id_airports_from`, `id_airports_to`, `time_from`, `time_to`, `time_duration`, `time_transit`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 2, '2019-03-08 04:00:00', '2019-03-03 10:00:00', '06:00:00', '01:32:00', NULL, NULL),
(2, 4, 2, 3, '2019-03-08 10:00:00', '2019-03-03 14:00:00', '04:00:00', '00:00:00', NULL, NULL),
(3, 3, 1, 2, '2019-03-08 04:00:00', '2019-03-03 10:00:00', '06:00:00', '01:32:00', NULL, NULL),
(4, 3, 2, 3, '2019-03-08 10:00:00', '2019-03-03 14:00:00', '04:00:00', '00:00:00', NULL, NULL),
(5, 2, 1, 2, '2019-03-08 04:00:00', '2019-03-03 10:00:00', '06:00:00', '01:32:00', NULL, NULL),
(6, 1, 1, 2, '2019-03-08 04:00:00', '2019-03-03 10:00:00', '06:00:00', '01:32:00', NULL, NULL),
(7, 5, 4, 2, '2019-03-08 04:00:00', '2019-03-03 10:00:00', '06:00:00', '01:32:00', NULL, NULL),
(8, 5, 2, 3, '2019-03-08 10:00:00', '2019-03-03 14:00:00', '04:00:00', '00:00:00', NULL, NULL),
(9, 6, 4, 7, '2019-03-08 04:00:00', '2019-03-03 10:00:00', '06:00:00', '01:32:00', NULL, NULL),
(10, 6, 7, 3, '2019-03-08 10:00:00', '2019-03-03 14:00:00', '04:00:00', '00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_access` int(11) NOT NULL DEFAULT '0',
  `attempt` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `phone`, `email_verified_at`, `password`, `last_access`, `attempt`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 0, 'Phạm Lê Minh Phú', 'phamleminhphu123@gmail.com', 329886884, NULL, '$2y$10$3GbgeOvk7tRlwgr6bRFAm.GlPheztFXHLnlsAFAepVv7jR6aExv8O', 0, 0, '6KcAIlvNYAlGNDerZQXufJejzzJLw3EVfrz9qNwfbaHm4D9NSavBo4nvHEEC', '2019-03-12 21:11:28', '2019-03-12 21:11:28'),
(6, 0, 'PL Minh Phú', 'plmp.mptech@gmail.com', 337292905, NULL, '$2y$10$8eg9IqgHuo8RCHip7f6N/Omq7PFoYlTGAI./VzUjP9mDs6o.xjfAi', 0, 0, NULL, '2019-03-12 21:11:57', '2019-03-12 21:11:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
