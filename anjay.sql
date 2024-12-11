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


-- Dumping database structure for laravel-11pplg3-naufal-db
CREATE DATABASE IF NOT EXISTS `laravel-11pplg3-naufal-db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel-11pplg3-naufal-db`;

-- Dumping structure for table laravel-11pplg3-naufal-db.admin_about
CREATE TABLE IF NOT EXISTS `admin_about` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_subjudul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.admin_about: ~3 rows (approximately)
INSERT INTO `admin_about` (`id`, `img`, `judul`, `sub_subjudul`, `work`, `sub_work`, `created_at`, `updated_at`, `logo`) VALUES
	(27, 'img_about/3FaINkPgbPTGitHMFoVWIoh7TB5mK9HLBFAPrOft.jpg', 'Muhammad Naufal Abdul Malik', 'Lahir: 6 Februari 2008, Sekolah: SMKN 1 Ciomas, Jurusan Pengembangan Perangkat lunak dan gim, Kelas 11 Hobi: Bermain sepak bola, voli, dan bermusik. saya berkeinginan bisa sukses di usia muda berkat semua nya', 'Backend', 'Saya Memahami Sedikit tentang backend di bahasa pemograman laravel dan php', '2024-11-30 16:18:03', '2024-12-05 01:24:26', 'logo_about/IC1DUHKuKqS9nl2iSX8xetUc4DtO60ET8U0RLQTA.gif'),
	(28, NULL, 'halo', 'naufal', 'desain', 'Smkn 1 ciomasA', '2024-12-05 01:26:56', '2024-12-05 07:41:52', 'logo_about/B1EYhOrbCneh8eR5YxZIBcFzxSAipM0nvrqaXo5l.gif'),
	(29, NULL, 'halo', 'naufal', 'Vollyball', 'd', '2024-12-05 07:45:37', '2024-12-10 07:48:32', 'logo_about/AwQY8Ys1zZvcAJX7EbsZm5NyxUYOUuCAF9WzG4uH.gif');

-- Dumping structure for table laravel-11pplg3-naufal-db.ahome
CREATE TABLE IF NOT EXISTS `ahome` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.ahome: ~0 rows (approximately)

-- Dumping structure for table laravel-11pplg3-naufal-db.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.cache: ~6 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('admin@gmail.com|127.0.0.1', 'i:3;', 1726755646),
	('admin@gmail.com|127.0.0.1:timer', 'i:1726755645;', 1726755645),
	('adminn@gmail.com|127.0.0.1', 'i:3;', 1729118783),
	('adminn@gmail.com|127.0.0.1:timer', 'i:1729118783;', 1729118783),
	('user@gmail.com|127.0.0.1', 'i:1;', 1726755235),
	('user@gmail.com|127.0.0.1:timer', 'i:1726755235;', 1726755235);

-- Dumping structure for table laravel-11pplg3-naufal-db.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.cache_locks: ~0 rows (approximately)

-- Dumping structure for table laravel-11pplg3-naufal-db.certificate
CREATE TABLE IF NOT EXISTS `certificate` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `certificates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.certificate: ~5 rows (approximately)
INSERT INTO `certificate` (`id`, `certificates`, `name`, `description`, `year`, `created_at`, `updated_at`) VALUES
	(4, 'public/img/J0CHQVqOVTff2WFyWiarjLjhyYbfi68fRD1PkEVh.png', 'Naufal', 'adminn@gmail.com', 2010, '2024-10-16 16:11:23', '2024-10-16 16:11:23'),
	(5, 'img/6KxeITB14QAr5UtJBeF3pJg3v2QcOo0rQ470iqPA.png', 'Naufal', 'adminn@gmail.com', 2010, '2024-10-16 17:22:32', '2024-10-16 17:22:32'),
	(6, 'img/WSgA23p9HIho2xPQoMtqb2IaZGeadOTdH9hcarxp.png', 'Naufal', 'adminn@gmail.com', 2010, '2024-10-16 17:38:52', '2024-10-16 17:38:52'),
	(7, 'public/img/zEQOGpmcqupxHCdWr6xu3hqTIXg8XBg9nwRe2kTy.png', 'Naufal', 'adminn@gmail.com', 2010, '2024-10-17 02:59:43', '2024-10-17 02:59:43'),
	(8, 'public/img/avah2Q9aXOZnbaGVSx0Q3Eg2mhnDIP8DcDE72WHC.png', 'Naufal', 'adminn@gmail.com', 2010, '2024-10-17 03:02:51', '2024-10-17 03:02:51'),
	(9, 'public/storage/img/wRU6dLzDmrE3Iu3zpHC2d9MzDGKiFND6sc4Q2t0p.png', 'Naufal', 'adminn@gmail.com', 2011, '2024-10-17 03:12:29', '2024-10-17 03:12:29');

-- Dumping structure for table laravel-11pplg3-naufal-db.certificates
CREATE TABLE IF NOT EXISTS `certificates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.certificates: ~3 rows (approximately)
INSERT INTO `certificates` (`id`, `name`, `issued_by`, `issued_at`, `description`, `file`, `image`, `created_at`, `updated_at`) VALUES
	(18, 'Belajar Dasar Pemrograman Web', 'dicoding', '2023-11-23', 'Kelas ini membahas tuntas dasar HTML dan CSS sebagai tiga fondasi pembuatan website. Fondasi tersebut diperlukan untuk Anda yang ingin\r\n mengembangkan kemampuan pengembangan website ke tahap yang lebih lanjut. Disusun dan diverifikasi oleh tim expert Dicoding, materi yang disajikan\r\n terstruktur dan komprehensif.', 'certificates/files/Q2w1c7AEct0xHtJSDUZK5Rw3qnNJ265xxVmtz6Kh.pdf', 'certificates/images/iJnMkxMkSWoYx9Ta9ViYVdEtYXnTWxqu8A4XFF0h.png', '2024-12-03 03:15:37', '2024-12-03 03:15:37'),
	(19, 'LISTENING AND READING', 'TOEIC', '2024-03-20', 'Tes bahasa inggris dengan mengerjakan 200 soal ada reading dan listening', 'certificates/files/wuy7s2oiyHv3iPcIapyJTX5FYN06czW9g3rAWZpR.pdf', 'certificates/images/RPkfC9u1FaDEA7dARGJbjTTO7gBk3DlDdbmw0Z5h.jpg', '2024-12-10 06:33:59', '2024-12-10 06:33:59'),
	(20, 'Literasi Digital', 'Kominfo', '2024-02-20', 'Seminar literasi digital sektor pendidikan SMKN 1 Ciomas', 'certificates/files/VkLCGwXFEs3X9Xks9BcNfDKSb3ek1BmE2gzo145v.pdf', 'certificates/images/kzJFVFoZEz6RaskZwxYnz58XZu3IZu0IrdfgScOG.jpg', '2024-12-10 06:56:08', '2024-12-10 06:56:08');

-- Dumping structure for table laravel-11pplg3-naufal-db.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.contact: ~6 rows (approximately)
INSERT INTO `contact` (`id`, `name`, `email`, `mail`, `created_at`, `updated_at`) VALUES
	(16, 'admin', 'admin@gmail.com', 'eeee', '2024-12-05 04:45:12', '2024-12-05 04:45:12'),
	(18, 'Naufal', 'naufaai@gmail.com', 'hai', '2024-12-05 04:59:04', '2024-12-05 04:59:04'),
	(20, 'Naufal', 'naufalabdulmalik123@gmail.com', 'j', '2024-12-05 05:01:13', '2024-12-05 05:01:13'),
	(22, 'hasbi', 'hasbimuhammad804@gmail.com', 'hhhhhh', '2024-12-05 05:05:11', '2024-12-05 05:05:11'),
	(23, 'hasbi', 'hsbimuhammad804@gmail.com', 'k', '2024-12-05 05:07:15', '2024-12-05 05:07:15'),
	(24, 'naud', 'hsimuhammad804@gmail.com', 'ja', '2024-12-05 05:09:27', '2024-12-05 05:09:27'),
	(25, 'Naufal', 'addin@gmail.com', 'semagat', '2024-12-10 03:56:06', '2024-12-10 03:56:06'),
	(26, 'Naufal', 'adssin@gmail.com', 'kii', '2024-12-10 06:09:41', '2024-12-10 06:09:41');

-- Dumping structure for table laravel-11pplg3-naufal-db.failed_jobs
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

-- Dumping data for table laravel-11pplg3-naufal-db.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laravel-11pplg3-naufal-db.home
CREATE TABLE IF NOT EXISTS `home` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_subjudul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.home: ~0 rows (approximately)
INSERT INTO `home` (`id`, `img`, `judul`, `sub_subjudul`, `work`, `sub_work`, `created_at`, `updated_at`) VALUES
	(5, 'images/EQsypTkjAQosUBHksYz5HmfwXOF2fvgZ2dKGVGDY.png', 'Muhammad Naufal Abdul Malik', 'Hello i\'am', 'Backend', 'backend in laravel', '2024-10-24 08:38:15', '2024-12-10 07:46:12');

-- Dumping structure for table laravel-11pplg3-naufal-db.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.jobs: ~0 rows (approximately)

-- Dumping structure for table laravel-11pplg3-naufal-db.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.job_batches: ~0 rows (approximately)

-- Dumping structure for table laravel-11pplg3-naufal-db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.migrations: ~10 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '0001_01_01_000000_create_users_table', 1),
	(5, '0001_01_01_000001_create_cache_table', 1),
	(6, '0001_01_01_000002_create_jobs_table', 1),
	(7, '2024_09_19_144513_buat_table_admin_about', 2),
	(8, '2024_09_26_170613_create_homes_table', 3),
	(9, '2024_09_27_065231_create_skills_table', 4),
	(11, '2024_10_01_181503_create_contacts_table', 5),
	(12, '2024_11_08_064006_create_certificates_table', 6),
	(14, '2024_11_15_070513_create_projects_table', 7),
	(15, '2024_12_03_100753_add_image_to_certificates_table', 7),
	(17, '2024_12_04_141455_add_logo_to_admin_about_table', 8),
	(18, '2024_12_05_202202_add_image_to_projects_table', 9),
	(19, '2024_12_05_225324_add_image_to_skills_table', 10);

-- Dumping structure for table laravel-11pplg3-naufal-db.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel-11pplg3-naufal-db.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_at` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.projects: ~2 rows (approximately)
INSERT INTO `projects` (`id`, `name`, `description`, `link`, `issued_at`, `image`, `created_at`, `updated_at`) VALUES
	(12, 'Uji Level', 'Proyek yang kami sedang jalankan yaitu Tobapos (Toko Bako Poin of sale) tentang sistem penjualan kasir dan manjemen keuangan', 'https://youtu.be/CtRIsakAgjQ?si=crd2Wa1MbrjcFU4H', '2024-12-06', 'projects/gNliXboHy02AjDxQD38PHTO7qb6cvnrHw8akE00X.jpg', '2024-12-05 13:57:48', '2024-12-05 23:12:12');

-- Dumping structure for table laravel-11pplg3-naufal-db.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('b3oTDmK3vPev3CwT5gVvY3Ddqsm405GSbnzSPmJ5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFAwVHF1d01LS0hYUlhqeXFnWUJUTWpNOEkyejV6b0lKOXl4d3Z0SyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly90ZXN0LnRlc3QvYWRtaW4vZGFzaGJvYXJkIjt9fQ==', 1733846068);

-- Dumping structure for table laravel-11pplg3-naufal-db.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.skills: ~4 rows (approximately)
INSERT INTO `skills` (`id`, `title`, `description`, `status`, `image`, `created_at`, `updated_at`) VALUES
	(31, 'html', 'saya bisa menguasai html tidak terlalau banyak perlu belajar lagi', 85, NULL, '2024-11-28 07:02:23', '2024-12-05 23:14:06'),
	(32, 'css', 'bagian ini saya harus belajar lebih banyak lagi', 50, NULL, '2024-11-29 22:09:22', '2024-12-05 23:18:05'),
	(34, 'Laravel', 'p', 75, NULL, '2024-12-10 07:07:50', '2024-12-10 07:07:50'),
	(35, 'php', 'p', 80, NULL, '2024-12-10 07:08:24', '2024-12-10 07:08:24');

-- Dumping structure for table laravel-11pplg3-naufal-db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'users',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel-11pplg3-naufal-db.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$x9LlSsrC6F2ST68qdD8Go.WMyhc4G.8.RU2os9nLA5K0udvC86Pu.', NULL, '2024-09-19 06:32:23', '2024-09-19 06:32:23'),
	(2, 'user', 'user@gmail.com', 'users', NULL, '$2y$12$y44WnJ1s1KIW5r0XOLKzcOxrQwp41mgrNrdrSmq5GpI.jdCLAj4jC', NULL, '2024-09-19 07:13:20', '2024-09-19 07:13:20'),
	(3, 'admin', 'addmin@gmail.com', 'admin', NULL, '$2y$12$tROz3QWMikTcbkIGKDuCyuP1CgofEDH4FMSyOYTh0ZrIZ4iRqVhoe', NULL, '2024-09-19 07:21:34', '2024-09-19 07:21:34'),
	(7, 'Nau', 'naufalabdulmalik123@gmail.com', 'users', NULL, '$2y$12$qDA1.K31iJxLMn61101ikeUw5ZGnJiU4kPFDARmmczuDmWGqZO5Su', NULL, '2024-11-27 07:23:17', '2024-11-27 07:23:17');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
