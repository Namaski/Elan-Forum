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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.category : ~10 rows (environ)
INSERT INTO `category` (`id_category`, `name`) VALUES
	(1, 'Cinema'),
	(2, 'Football'),
	(3, 'Boxe'),
	(4, 'Chess'),
	(5, 'Camping'),
	(7, 'Technology'),
	(8, 'Music'),
	(9, 'Travel'),
	(10, 'Food'),
	(11, 'Movies');

-- Listage de la structure de table forum. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `content` text,
  `creationDate` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `topic_id` int NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `user_id` (`user_id`),
  KEY `topic_id` (`topic_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE SET NULL,
  CONSTRAINT `post_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.post : ~21 rows (environ)
INSERT INTO `post` (`id_post`, `content`, `creationDate`, `user_id`, `topic_id`) VALUES
	(1, 'Tout est dans le titre, vos avis ?', '2024-04-26 11:08:41', 1, 1),
	(2, 'HALA, MADRID !!!', '2024-04-26 13:50:27', 2, 1),
	(3, 'I think AI and VR are going to be huge in 2024.', '2024-04-27 15:10:00', 3, 3),
	(4, 'Totally agree! Especially interested in how AI will change everyday life.', '2024-04-27 15:20:00', 1, 3),
	(5, 'The new album by ArtistX is a masterpiece, don\'t you think?', '2024-04-27 16:15:00', 4, 4),
	(6, 'Absolutely! It has been on repeat in my house.', '2024-04-27 16:20:00', 2, 4),
	(7, 'Japan is definitely on my bucket list. So much to see and do!', '2024-04-28 10:10:00', 5, 5),
	(8, 'Don\'t miss out on Italy either, the food alone is worth the trip!', '2024-04-28 10:15:00', 3, 5),
	(9, 'Renewable energy is the future, indeed. We should invest more in solar and wind.', '2024-04-29 08:40:00', 6, 6),
	(10, 'I think the Brazilian team has a strong chance in the next Olympics.', '2024-04-29 09:20:00', 7, 7),
	(11, 'If you want to cook like an Italian, always choose fresh ingredients.', '2024-04-29 10:05:00', 8, 8),
	(12, 'Virtual reality will revolutionize not just gaming, but also how we interact with media.', '2024-04-29 10:50:00', 9, 9),
	(13, 'Don\'t forget to check out the latest indie film, "Echos in Silence". It\'s a masterpiece.', '2024-04-29 11:15:00', 10, 10),
	(14, 'Absolutely, using VR to attend concerts is something I\'m really looking forward to.', '2024-04-29 10:55:00', 6, 9),
	(15, 'Solar panels are becoming more efficient and cheaper, which is great for everyone.', '2024-04-29 08:45:00', 3, 6),
	(16, 'My favorite Italian dish to cook is traditional lasagna, what\'s yours?', '2024-04-29 10:10:00', 5, 8),
	(17, 'ihuihio', NULL, NULL, 13),
	(18, 'nanana', NULL, NULL, 14),
	(19, 'nanana', NULL, NULL, 15),
	(20, '', NULL, NULL, 16),
	(21, 'gdhgfd', NULL, NULL, 17);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.topic : ~15 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `category_id`, `user_id`) VALUES
	(1, 'Qui gagne la champion\'s league selon vous ?', '2024-04-26 10:17:55', 2, 1),
	(3, 'Latest Tech Trends 2024', '2024-04-27 15:00:00', 7, 3),
	(4, 'Best Albums of 2023', '2024-04-27 16:00:00', 8, 4),
	(5, 'Top Travel Destinations', '2024-04-28 10:00:00', 9, 5),
	(6, 'Future of Renewable Energy', '2024-04-29 08:30:00', 7, 6),
	(7, '2024 Olympics Predictions', '2024-04-29 09:10:00', 3, 7),
	(8, 'Secrets of Italian Cooking', '2024-04-29 10:00:00', 10, 8),
	(9, 'Virtual Reality in Gaming', '2024-04-29 10:40:00', 7, 9),
	(10, 'Indie Films to Watch', '2024-04-29 11:10:00', 10, 10),
	(11, 'faezfeaz', NULL, 1, NULL),
	(12, 'dsfcghfcx', NULL, 1, NULL),
	(13, 'dsfcghfcx', NULL, 1, NULL),
	(14, 'nanana', NULL, 3, NULL),
	(15, 'nanana', NULL, 1, NULL),
	(16, '', NULL, 1, NULL),
	(17, 'ghd', NULL, 1, NULL);

-- Listage de la structure de table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `creationDate` datetime DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` json DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.user : ~17 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `password`, `creationDate`, `email`, `role`) VALUES
	(1, 'user1', 'user1', '2024-04-26 10:16:42', 'user1@example.com', NULL),
	(2, 'user2', 'user2', '2024-04-26 13:49:33', 'user2@example.com', NULL),
	(3, 'user3', 'password3', '2024-04-27 14:30:00', 'user3@example.com', '{"role": "member"}'),
	(4, 'user4', 'password4', '2024-04-28 09:20:00', 'user4@example.com', '{"role": "admin"}'),
	(5, 'user5', 'password5', '2024-04-28 16:45:00', 'user5@example.com', '{"role": "member"}'),
	(6, 'user6', 'password6', '2024-04-29 08:15:00', 'user6@example.com', '{"role": "member"}'),
	(7, 'user7', 'password7', '2024-04-29 09:00:00', 'user7@example.com', '{"role": "member"}'),
	(8, 'user8', 'password8', '2024-04-29 09:45:00', 'user8@example.com', '{"role": "admin"}'),
	(9, 'user9', 'password9', '2024-04-29 10:30:00', 'user9@example.com', '{"role": "member"}'),
	(10, 'user10', 'password10', '2024-04-29 11:00:00', 'user10@example.com', '{"role": "admin"}'),
	(11, 'Username11', '', NULL, '', NULL),
	(12, 'Username11gfe', 'Passworddsfd', NULL, 'Email@test.com', NULL),
	(13, 'Username12', 'Password12', NULL, 'Email@test.com', NULL),
	(14, 'Username13', 'Password13', NULL, 'Email13@test.com', NULL),
	(15, 'Username13', 'Password13', NULL, 'Email13@test.com', NULL),
	(16, 'Username13', 'Password13', NULL, 'email@test.com', NULL),
	(17, 'user1', '$2y$10$t6.7uM1PNjR9Dkx70HMyF.ZyDEUX1HdqSDOiOV6rE/t8RKWi7qnKi', NULL, 'user125@test.com', NULL),
	(18, 'user25', '$2y$10$0HCkBeMXu9IOVOtraeSdue93Nr1aTGeu.atyUGyN4KLE0LinTUghS', NULL, 'user25@example.com', NULL),
	(19, 'user1', '$2y$10$Q/oU12Kwa4DERlGGlPbz3eec0t96wiKy7oT2yeqrmyn2A5Z4CgiwK', NULL, 'user56548@example.com', NULL),
	(20, 'user1', '$2y$10$ieEZEVuriwYuu3U6DFUf0.IH02r4UQtmNtEnJmDrfXU7XknBd7Yy6', NULL, 'email564894@example.com', NULL),
	(21, 'user1', '$2y$10$1V71e38fM5l2oGoHUY/6s.9EFMg428QG9gmaYOGKRx6eUAv.0.I5O', NULL, 'user55645@example.com', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
