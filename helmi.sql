-- --------------------------------------------------------
-- Host:                         localhost
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


-- Dumping database structure for helmi
CREATE DATABASE IF NOT EXISTS `helmi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `helmi`;

-- Dumping structure for table helmi.failed_jobs
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

-- Dumping data for table helmi.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table helmi.kosts
CREATE TABLE IF NOT EXISTS `kosts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kost` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` text NOT NULL,
  `harga_per_bulan` int NOT NULL,
  `fasilitas` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table helmi.kosts: ~1 rows (approximately)
INSERT INTO `kosts` (`id`, `nama_kost`, `alamat`, `harga_per_bulan`, `fasilitas`, `created_at`, `updated_at`) VALUES
	(1, 'pratama', 'tipes', 400, 'kasur', '2024-07-16 10:43:21', '2024-07-16 10:32:23'),
	(2, 'babol', 'baron', 500, 'kasur', '2024-07-16 10:32:12', '2024-07-16 10:32:13'),
	(3, 'griya mustika', 'laweyan', 500, 'kamarmandi dalam', '2024-07-16 10:33:56', '2024-07-16 10:33:56');

-- Dumping structure for table helmi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table helmi.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table helmi.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table helmi.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table helmi.pemesanan
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kost_id` int DEFAULT NULL,
  `nama_penyewa` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kost_id` (`kost_id`),
  CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`kost_id`) REFERENCES `kosts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table helmi.pemesanan: ~0 rows (approximately)

-- Dumping structure for table helmi.pemesanans
CREATE TABLE IF NOT EXISTS `pemesanans` (
  `id` int unsigned NOT NULL,
  `kost_id` int NOT NULL AUTO_INCREMENT,
  `nama_penyewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kost_id` (`kost_id`),
  CONSTRAINT `FK_pemesanans_kosts` FOREIGN KEY (`kost_id`) REFERENCES `kosts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pemesanans_kosts_2` FOREIGN KEY (`kost_id`) REFERENCES `kosts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table helmi.pemesanans: ~0 rows (approximately)
INSERT INTO `pemesanans` (`id`, `kost_id`, `nama_penyewa`, `tanggal_mulai`, `tanggal_akhir`, `created_at`, `updated_at`) VALUES
	(1, 1, 'ucok', '2024-07-16', '2024-07-16', '2024-07-16 10:59:21', '2024-07-16 10:59:23'),
	(2, 2, 'helmi', '2024-07-16', '2024-07-16', '2024-07-16 10:22:19', '2024-07-16 10:22:19'),
	(3, 3, 'pathin', '2024-07-16', '2024-07-16', '2024-07-16 10:23:10', '2024-07-16 10:23:11');

-- Dumping structure for table helmi.personal_access_tokens
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

-- Dumping data for table helmi.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table helmi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table helmi.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'helmi', 'masdarhelmi23@gmil.com', NULL, '$2y$12$G/ZqJPgeeatgr7PoX.AHDuVD0xzLHua3ZrhqCgGddlTChatktZg5K', NULL, '2024-07-16 03:47:33', '2024-07-16 03:47:33'),
	(2, 'helmi', 'masdarhelmi26@gmil.com', NULL, '$2y$12$SDp32RJIaGPSnOHoiCdyiOw0ryiqf7wzR2j3Jmabc3SBPT0UtQWVC', NULL, '2024-07-16 03:49:57', '2024-07-16 03:49:57'),
	(3, 'helmi', 'masdarhelmi24@gmil.com', NULL, '$2y$12$CTWfVwFCQ3dmNfr11DsLTuv9UgtQGVeVv9GQdnRlqzdrLP7nqbb.O', NULL, '2024-07-16 03:53:27', '2024-07-16 03:53:27'),
	(4, 'helmi', 'masdarhelmi24@gmail.com', NULL, '$2y$12$QBAXe.C7IFSSl.bIzMu2AO0WlpT1u0MEKPJETPCN3GdZDKD5lNG32', NULL, '2024-07-16 03:55:09', '2024-07-16 03:55:09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
