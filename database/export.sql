-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for owsas
DROP DATABASE IF EXISTS `owsas`;
CREATE DATABASE IF NOT EXISTS `owsas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `owsas`;

-- Dumping structure for table owsas.applicant
DROP TABLE IF EXISTS `applicant`;
CREATE TABLE IF NOT EXISTS `applicant` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `IDtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moblieNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.applicant: ~0 rows (approximately)
/*!40000 ALTER TABLE `applicant` DISABLE KEYS */;
INSERT INTO `applicant` (`id`, `users_id`, `IDtype`, `IDnumber`, `moblieNo`, `dateOfBirth`, `created_at`, `updated_at`) VALUES
	(1, 2, 'MyKad', '123456789', '08912345678', '1994-03-15', '2020-07-15 04:21:33', '2020-07-15 04:21:33');
/*!40000 ALTER TABLE `applicant` ENABLE KEYS */;

-- Dumping structure for table owsas.application
DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `applicationdate` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.application: ~0 rows (approximately)
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
/*!40000 ALTER TABLE `application` ENABLE KEYS */;

-- Dumping structure for table owsas.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table owsas.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_10_10_050631_create_university_table', 1),
	(5, '2019_10_10_051148_create_qualification_table', 1),
	(6, '2019_10_10_052045_create_applicant_table', 1),
	(7, '2019_10_10_053131_create_result_table', 1),
	(8, '2019_10_10_053809_create_application_table', 1),
	(9, '2019_10_10_093627_create_qualificationobtained_table', 1),
	(10, '2019_10_10_094434_create_uniadmin_table', 1),
	(11, '2019_10_10_094934_create_programme_table', 1),
	(12, '2019_11_24_123221_create_subject_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table owsas.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.password_resets: ~1 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('Admin@Admin.com', '$2y$10$2/YoOVV6kl3ZyEUToiHBOOCOmfUcHykM8ouZDAzXS0HQtfs/jmyFG', '2020-09-28 04:09:20');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table owsas.programme
DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `university_id` int(11) NOT NULL,
  `programmename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closingdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.programme: ~1 rows (approximately)
/*!40000 ALTER TABLE `programme` DISABLE KEYS */;
INSERT INTO `programme` (`id`, `university_id`, `programmename`, `description`, `closingdate`, `created_at`, `updated_at`) VALUES
	(1, 1, 'This Program', 'Just This Program', '2020-09-30', '2020-09-28 04:17:57', '2020-09-28 04:44:16');
/*!40000 ALTER TABLE `programme` ENABLE KEYS */;

-- Dumping structure for table owsas.qualification
DROP TABLE IF EXISTS `qualification`;
CREATE TABLE IF NOT EXISTS `qualification` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qulificationName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimumScore` int(11) NOT NULL,
  `maximumScore` int(11) NOT NULL,
  `resultCalcDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradelist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.qualification: ~1 rows (approximately)
/*!40000 ALTER TABLE `qualification` DISABLE KEYS */;
INSERT INTO `qualification` (`id`, `qulificationName`, `minimumScore`, `maximumScore`, `resultCalcDescription`, `gradelist`, `created_at`, `updated_at`) VALUES
	(1, 'This Qualification', 40, 100, 'Average of 5 subject', '1-100', '2020-09-28 04:15:27', '2020-09-28 04:15:27');
/*!40000 ALTER TABLE `qualification` ENABLE KEYS */;

-- Dumping structure for table owsas.qualificationobtained
DROP TABLE IF EXISTS `qualificationobtained`;
CREATE TABLE IF NOT EXISTS `qualificationobtained` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `overallscore` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.qualificationobtained: ~0 rows (approximately)
/*!40000 ALTER TABLE `qualificationobtained` DISABLE KEYS */;
INSERT INTO `qualificationobtained` (`id`, `overallscore`, `applicant_id`, `qualification_id`, `created_at`, `updated_at`) VALUES
	(1, 60, 1, 1, '2020-09-28 05:03:21', '2020-09-28 05:03:44');
/*!40000 ALTER TABLE `qualificationobtained` ENABLE KEYS */;

-- Dumping structure for table owsas.result
DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `score` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.result: ~0 rows (approximately)
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
INSERT INTO `result` (`id`, `applicant_id`, `subject_id`, `score`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 60.00, '2020-09-28 05:00:48', '2020-09-28 05:01:00'),
	(2, 1, 2, 60.00, '2020-09-28 05:01:11', '2020-09-28 05:01:11'),
	(3, 1, 3, 60.00, '2020-09-28 05:01:21', '2020-09-28 05:01:21'),
	(4, 1, 4, 60.00, '2020-09-28 05:01:34', '2020-09-28 05:01:34'),
	(5, 1, 5, 60.00, '2020-09-28 05:01:44', '2020-09-28 05:01:44');
/*!40000 ALTER TABLE `result` ENABLE KEYS */;

-- Dumping structure for table owsas.subject
DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subjectName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeScore` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.subject: ~5 rows (approximately)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`id`, `subjectName`, `typeScore`, `created_at`, `updated_at`) VALUES
	(1, 'Subject 1', '100', '2020-09-28 04:15:51', '2020-09-28 04:15:51'),
	(2, 'Subject 2', '100', '2020-09-28 04:16:06', '2020-09-28 04:16:06'),
	(3, 'Subject 3', '100', '2020-09-28 04:16:19', '2020-09-28 04:16:19'),
	(4, 'Subject 4', '100', '2020-09-28 04:16:31', '2020-09-28 04:16:31'),
	(5, 'Subject 5', '100', '2020-09-28 04:16:40', '2020-09-28 04:16:40');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;

-- Dumping structure for table owsas.uniadmin
DROP TABLE IF EXISTS `uniadmin`;
CREATE TABLE IF NOT EXISTS `uniadmin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.uniadmin: ~1 rows (approximately)
/*!40000 ALTER TABLE `uniadmin` DISABLE KEYS */;
INSERT INTO `uniadmin` (`id`, `users_id`, `university_id`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, '2020-09-28 04:11:56', '2020-09-28 04:11:56');
/*!40000 ALTER TABLE `uniadmin` ENABLE KEYS */;

-- Dumping structure for table owsas.university
DROP TABLE IF EXISTS `university`;
CREATE TABLE IF NOT EXISTS `university` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UniName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.university: ~1 rows (approximately)
/*!40000 ALTER TABLE `university` DISABLE KEYS */;
INSERT INTO `university` (`id`, `UniName`, `created_at`, `updated_at`) VALUES
	(1, 'This University', '2020-09-28 04:11:00', '2020-09-28 04:11:00');
/*!40000 ALTER TABLE `university` ENABLE KEYS */;

-- Dumping structure for table owsas.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table owsas.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'AdminOwsas', 'Admin', 'Admin@Admin.com', NULL, '$2y$10$y/Q5LRS3ytE5TrD6L/a27eaqZZ8wUt790FY3XkA4.R/vGQoP4VbIy', 'AdminSys', NULL, '2020-07-15 03:40:08', '2020-07-15 03:40:08'),
	(2, 'Applicant01', 'Applicant', 'ThisApp@app.com', NULL, '$2y$10$zyoVu2o5IOrT/c4qJfdQzOlUzwUZKSB9iXbMRXBnJKtwdho.DjnTW', 'Applicant', NULL, '2020-07-15 04:20:15', '2020-07-15 04:20:15'),
	(3, 'This Admin For This Uni', 'ThisAdm', 'ThisAdm@This.com', NULL, '$2y$10$FFfmaKzkIxZJf9HPI56DXOh9MzFRjW11tKCQBk..80vwwTdcADLGO', 'AdminUni', NULL, '2020-09-28 04:11:56', '2020-09-28 04:11:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
