-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
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


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum`;

-- Listage de la structure de table forum. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.category : ~5 rows (environ)
INSERT INTO `category` (`id_category`, `name`) VALUES
	(1, 'Cinema'),
	(2, 'Football'),
	(3, 'Boxe'),
	(4, 'Chess'),
	(5, 'Camping');

-- Listage de la structure de table forum. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `content` text,
  `creationDate` datetime DEFAULT NULL,
  `user_id` int NOT NULL,
  `topic_id` int NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `user_id` (`user_id`),
  KEY `topic_id` (`topic_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
  CONSTRAINT `post_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.post : ~2 rows (environ)
INSERT INTO `post` (`id_post`, `content`, `creationDate`, `user_id`, `topic_id`) VALUES
	(1, 'Tout est dans le titre, vos avis ?', '2024-04-26 11:08:41', 1, 1),
	(2, 'HALA, MADRID !!!', '2024-04-26 13:50:27', 2, 1);

-- Listage de la structure de table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL,
  `category_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.topic : ~1 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `category_id`, `user_id`) VALUES
	(1, 'Qui gagne la champion\'s league selon vous ?', '2024-04-26 10:17:55', 3, 1);

-- Listage de la structure de table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `role` json DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.user : ~2 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `password`, `creationDate`, `mail`, `role`) VALUES
	(1, 'user1', 'user1', '2024-04-26 10:16:42', NULL, NULL),
	(2, 'user2', 'user2', '2024-04-26 13:49:33', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
