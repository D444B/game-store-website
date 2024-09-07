-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.26 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for game_store
DROP DATABASE IF EXISTS `game_store`;
CREATE DATABASE IF NOT EXISTS `game_store` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `game_store`;

-- Dumping structure for table game_store.company
DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table game_store.company: ~6 rows (approximately)
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`company_id`, `name`) VALUES
	(1, 'Blizzard'),
	(2, 'UbiSoft'),
	(3, 'Valve'),
	(6, 'Micorsoft'),
	(7, 'Activision'),
	(10, 'Capcom');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Dumping structure for table game_store.game
DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `game_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int unsigned NOT NULL,
  `genre_id` int unsigned NOT NULL,
  `price` decimal(20,2) unsigned NOT NULL,
  PRIMARY KEY (`game_id`),
  KEY `fk_game_company_id_idx` (`company_id`),
  KEY `fk_game_genre_id_idx` (`genre_id`),
  CONSTRAINT `fk_game_company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_game_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table game_store.game: ~9 rows (approximately)
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` (`game_id`, `name`, `company_id`, `genre_id`, `price`) VALUES
	(1, 'Warcraft 3', 1, 1, 9.99),
	(2, 'Warcraft 3 The Frozen Throne', 1, 1, 9.99),
	(3, 'Rayman 2', 2, 2, 5.49),
	(4, 'Rayman 3', 2, 2, 14.99),
	(5, 'The Orange Box', 3, 3, 10.50),
	(6, 'World of Warcraft', 1, 4, 49.99),
	(7, 'Portal 2', 3, 3, 10.49),
	(8, 'Assasin\'s Creed', 2, 5, 13.50);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;

-- Dumping structure for table game_store.genre
DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`genre_id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table game_store.genre: ~6 rows (approximately)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`genre_id`, `name`) VALUES
	(1, 'RTS'),
	(2, 'Platform'),
	(3, 'FPS'),
	(4, 'MMO'),
	(5, 'Adventure');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Dumping structure for table game_store.profile_image
DROP TABLE IF EXISTS `profile_image`;
CREATE TABLE IF NOT EXISTS `profile_image` (
  `profile_image_id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`profile_image_id`),
  UNIQUE KEY `uq_profile_image_user_id` (`user_id`),
  KEY `fk_profile_image_user_id` (`user_id`),
  CONSTRAINT `fk_profile_image_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table game_store.profile_image: ~4 rows (approximately)
/*!40000 ALTER TABLE `profile_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_image` ENABLE KEYS */;

-- Dumping structure for table game_store.recommendation
DROP TABLE IF EXISTS `recommendation`;
CREATE TABLE IF NOT EXISTS `recommendation` (
  `recommendation_id` int unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int unsigned NOT NULL,
  `recommended_game_id` int NOT NULL,
  PRIMARY KEY (`recommendation_id`),
  KEY `fk_recommendation_game_id_idx` (`game_id`),
  KEY `fk_recommendation_reccomended_game_id_idx` (`recommended_game_id`),
  CONSTRAINT `fk_recommendation_game_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_recommendation_game_recommended_game_id` FOREIGN KEY (`recommendation_id`) REFERENCES `game` (`game_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table game_store.recommendation: ~3 rows (approximately)
/*!40000 ALTER TABLE `recommendation` DISABLE KEYS */;
INSERT INTO `recommendation` (`recommendation_id`, `game_id`, `recommended_game_id`) VALUES
	(1, 1, 2),
	(2, 3, 4),
	(3, 1, 2);
/*!40000 ALTER TABLE `recommendation` ENABLE KEYS */;

-- Dumping structure for table game_store.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table game_store.user: ~17 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `email`, `password`) VALUES
	(25, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table game_store.user_game
DROP TABLE IF EXISTS `user_game`;
CREATE TABLE IF NOT EXISTS `user_game` (
  `user_game_id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `game_id` int unsigned NOT NULL,
  `card_number` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_game_id`),
  KEY `fk_user_game_user_id_idx` (`user_id`),
  KEY `fk_user_game_game_id_idx` (`game_id`),
  CONSTRAINT `fk_user_game_game_id` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_user_game_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- Dumping data for table game_store.user_game: ~21 rows (approximately)
/*!40000 ALTER TABLE `user_game` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_game` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
