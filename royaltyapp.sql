-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `laravel`;

-- Dumping structure for table laravel.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `phone_1` varchar(191) NOT NULL,
  `phone_2` varchar(191) DEFAULT NULL,
  `new_points` varchar(191) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.clients: 29 rows
DELETE FROM `clients`;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `fname`, `lname`, `email`, `notes`, `phone_1`, `phone_2`, `new_points`, `updated_at`) VALUES
	(84, 'John22', 'Doe22', NULL, NULL, '123', '123', '70', '2023-03-01 10:53:43'),
	(83, 'John21', 'Doe21', NULL, NULL, '321234234', '2310854503', '1477', '2023-03-02 10:13:11'),
	(82, 'John20', 'Doe20', 'johndoe20@yahoo.com', NULL, '', '', '', '2022-11-10 21:20:37'),
	(81, 'John19', 'Doe19', 'johndoe19@yahoo.com', NULL, '', '', '', '2022-11-09 20:09:10'),
	(80, 'John18', 'Doe18', 'johndoe18@yahoo.com', NULL, '', '', '', '2022-11-10 21:20:37'),
	(79, 'John17', 'Doe17', 'johndoe17@gmail.com', NULL, '', '', '', '2022-11-09 20:09:10'),
	(78, 'John16', 'Doe16', NULL, NULL, '787878', '8552321', '5500', '2023-03-01 11:33:49'),
	(77, 'John15', 'Doe15', 'johndoe15@gmail.com', NULL, '', '', '', '2022-11-09 20:09:10'),
	(76, 'John14', 'Doe14', 'johndoe14@gmail.com', NULL, '', '', '', '2022-11-10 21:20:37'),
	(75, 'John13', 'Doe13', 'johndoe13@gmail.com', NULL, '', '', '', '2022-11-11 10:26:27'),
	(74, 'John12', 'Doe12', 'johndoe12@gmail.com', NULL, '', '', '', '2022-11-10 21:20:37'),
	(72, 'John10', 'Doe10', 'johndoe10@gmail.com', NULL, '', '', '', '2022-11-10 21:20:37'),
	(73, 'John11', 'Doe11', 'johndoe11@gmail.com', NULL, '', '', '', '2022-11-10 21:20:37'),
	(71, 'John9', 'Doe9', 'johndoe9@gmail.com', NULL, '', '', '', '2022-11-09 20:09:10'),
	(70, 'John8', 'Doe8', 'johndoe8@mail.com', NULL, '', '', '', '2022-11-10 21:20:37'),
	(69, 'John7', 'Doe7', 'johndoe7@mail.com', NULL, '', '', '', '2022-11-11 10:26:27'),
	(68, 'John6', 'Doe6', 'johndoe6@mail.com', NULL, '', '', '', '2022-11-09 20:09:10'),
	(67, 'John5', 'Doe5', 'johndoe5@mail.com', NULL, '', '', '', '2022-11-11 10:26:27'),
	(66, 'John4', 'Doe4', 'johndoe4@mail.com', NULL, '', '', '', '2022-11-11 10:26:27'),
	(65, 'John3', 'Doe3', 'johndoe3@mail.com', NULL, '', '', '', '2022-11-10 21:20:37'),
	(64, 'John2', 'Doe2', 'johndoe2@mail.com', NULL, '', '', '', '2022-11-11 10:26:27'),
	(63, 'John1', 'Doe1', 'johndoe1@mail.com', NULL, '', '', '', '2022-11-11 10:26:27'),
	(85, 'Petros', 'Papagiannis', 'p.papagiannis@nup.ac.cy', NULL, '+35733290744', NULL, '0', NULL),
	(86, 'Petros', 'Pap', 'p.papagianni@mail.com', NULL, '9999999999', NULL, '0', NULL),
	(87, 'Test', 'Patient 1', 'test1@mail.com', NULL, '11111111111', '1231231231233333', '0', NULL),
	(88, 'ΠΕΤΡΟΣ', 'ΠΑΠΑΓΙΑΝΝΗΣ', 'peterpapagiannis@yahoo.com', NULL, '99260744', NULL, '66', '2023-02-24 12:14:48'),
	(89, 'Test', 'Test', 'test@mail.com', NULL, '123456789', '25223654', '131', '2023-02-24 12:18:02'),
	(90, 'Petros', 'Pap', NULL, '1231231231231232134444444444444444444444444444', '(999) 999-9999', '9999999', '78', '2023-03-01 10:48:28'),
	(92, 'John', 'Snow', NULL, 'Hello Again!!', '878966548', '887899632', '1', '2023-03-01 10:52:34'),
	(93, 'Stylianos', 'Georgiou', NULL, NULL, '99250085', NULL, '202', '2023-03-02 12:57:57');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.migrations: ~4 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table laravel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table laravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table laravel.points_history
CREATE TABLE IF NOT EXISTS `points_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL DEFAULT 0,
  `points` varchar(255) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table laravel.points_history: ~18 rows (approximately)
DELETE FROM `points_history`;
INSERT INTO `points_history` (`id`, `clientid`, `points`, `created`, `updated_by`) VALUES
	(4, 84, '370', '2023-02-21 14:24:18', 1),
	(5, 83, '55', '2023-02-21 14:28:12', 1),
	(6, 83, '205', '2023-02-21 14:28:29', 1),
	(7, 83, '205', '2023-02-24 13:55:21', 1),
	(8, 88, '66', '2023-02-24 14:14:48', 1),
	(9, 89, '86', '2023-02-24 14:15:36', 1),
	(10, 89, '131', '2023-02-24 14:18:02', 1),
	(11, 90, '45', '2023-02-24 14:18:54', 1),
	(12, 90, '56', '2023-03-01 10:32:21', 1),
	(13, 90, '78', '2023-03-01 10:35:12', 1),
	(14, 92, '1', '2023-03-01 10:56:42', 1),
	(15, 92, '501', '2023-03-01 10:58:15', 1),
	(16, 90, '578', '2023-03-01 11:04:56', 1),
	(17, 84, '570', '2023-03-01 12:53:35', 1),
	(18, 78, '500', '2023-03-01 12:55:24', 1),
	(19, 78, '10000', '2023-03-01 13:09:34', 1),
	(20, 83, '2427', '2023-03-01 13:34:49', 1),
	(21, 83, '1477', '2023-03-02 12:13:11', 1),
	(22, 93, '202', '2023-03-02 14:57:57', 2);

-- Dumping structure for table laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Petros Papagiannis', 'peterpapagiannis@yahoo.com', NULL, '$2y$10$NnG0bS4Kruvx2ni/IrsiOezVZfZi9hjywEW4QSsUQKQ04e4LmenIK', 1, NULL, '2023-02-17 06:44:39', '2023-02-17 06:44:39'),
	(2, 'Stylianos Dominate', 'stylianos@dominate.com.cy', NULL, '$2y$10$BoTWi1T0LQ7w0OLghwyczuAjbnHhFd/9ROnK/53Zp4my0L3/GQybC', 1, NULL, '2023-03-01 12:25:13', '2023-03-01 12:25:13'),
	(6, 'Cashier 2', '123@mail.com', NULL, 'Etr2JR2g', 0, NULL, '2023-03-02 06:33:37', '2023-03-02 12:30:14');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
