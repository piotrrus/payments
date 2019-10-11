-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               10.1.37-MariaDB - mariadb.org binary distribution
-- Serwer OS:                    Win32
-- HeidiSQL Wersja:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Zrzut struktury bazy danych payments
CREATE DATABASE IF NOT EXISTS `payments` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `payments`;

-- Zrzut struktury tabela payments.banks
CREATE TABLE IF NOT EXISTS `banks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `currency_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currency_id` (`currency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli payments.banks: 6 rows
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` (`id`, `name`, `currency_id`, `created_at`, `updated_at`) VALUES
	(1, 'AliorBank', 1, NULL, NULL),
	(2, 'Pekao SA', 1, NULL, NULL),
	(3, 'Millenium', 1, NULL, NULL),
	(4, 'Bank Zachodni WBK', 1, NULL, NULL),
	(5, 'ING Bank', 1, NULL, NULL),
	(6, 'BRE bank SA', 1, NULL, NULL);
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;

-- Zrzut struktury tabela payments.bank_files_types
CREATE TABLE IF NOT EXISTS `bank_files_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `file_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli payments.bank_files_types: 6 rows
/*!40000 ALTER TABLE `bank_files_types` DISABLE KEYS */;
INSERT INTO `bank_files_types` (`id`, `bank_id`, `file_type_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL),
	(2, 2, 1, NULL, NULL),
	(3, 3, 2, NULL, NULL),
	(4, 4, 1, NULL, NULL),
	(5, 5, 1, NULL, NULL),
	(6, 1, 3, NULL, NULL);
/*!40000 ALTER TABLE `bank_files_types` ENABLE KEYS */;

-- Zrzut struktury tabela payments.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli payments.clients: 5 rows
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `firstname`, `lastname`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
	(1, 'MARTA', 'SZYMULA', NULL, NULL, 'UL.EWY 3 M.88 05-800 PRUSZKÓW', NULL, NULL),
	(2, 'ANNA', 'JAROSZEK', NULL, NULL, 'UL.WETERANÓW 11 M.11 20-083 LUBLIN', NULL, NULL),
	(3, 'MICHAŁ', 'JAGUSIAK', NULL, NULL, 'UL.MAKOWA 19 44-142 RYBNIK', NULL, NULL),
	(4, 'WOJCIECH', 'WALIGÓRA', NULL, NULL, 'SZAROCIN 90 M.5 58-516 LESZCZYNIEC', NULL, NULL),
	(5, 'ANNA', 'KAPICA', NULL, NULL, 'UL.PIOTRA SKARGI 89 M.6 95-119 PABIANICE', NULL, NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Zrzut struktury tabela payments.client_accounts
CREATE TABLE IF NOT EXISTS `client_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `account_nr` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli payments.client_accounts: 0 rows
/*!40000 ALTER TABLE `client_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_accounts` ENABLE KEYS */;

-- Zrzut struktury tabela payments.currency
CREATE TABLE IF NOT EXISTS `currency` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli payments.currency: 6 rows
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` (`id`, `name`) VALUES
	(1, 'PLN'),
	(2, 'EUR'),
	(3, 'USD'),
	(4, 'RUB'),
	(5, 'GBP'),
	(6, 'CHF');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;

-- Zrzut struktury tabela payments.files_types
CREATE TABLE IF NOT EXISTS `files_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli payments.files_types: 3 rows
/*!40000 ALTER TABLE `files_types` DISABLE KEYS */;
INSERT INTO `files_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'CSV', NULL, NULL),
	(2, 'XML', NULL, NULL),
	(3, 'DAT', NULL, NULL);
/*!40000 ALTER TABLE `files_types` ENABLE KEYS */;

-- Zrzut struktury tabela payments.payment_operations
CREATE TABLE IF NOT EXISTS `payment_operations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `account` int(26) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `payment_purpose` char(255) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imported_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli payments.payment_operations: 0 rows
/*!40000 ALTER TABLE `payment_operations` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_operations` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
