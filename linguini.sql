-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 jan. 2024 à 14:38
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `linguini`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` varchar(50) NOT NULL,
  `cat_pic` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_desc`, `cat_pic`) VALUES
(2, 'Pizza Buenissima', 'Découvrez nos pizzas ', 'pizz.jpg'),
(4, 'Pasta Deliciosa', 'Découvrez nos pâtes', 'catpate.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ing_name` varchar(50) NOT NULL,
  `ing_calo` int NOT NULL,
  `ing_gram` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients_products`
--

DROP TABLE IF EXISTS `ingredients_products`;
CREATE TABLE IF NOT EXISTS `ingredients_products` (
  `id_ingredient` int NOT NULL,
  `id_meal` int NOT NULL,
  KEY `id_ingredient` (`id_ingredient`),
  KEY `id_meal` (`id_meal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `m_title` varchar(50) NOT NULL,
  `m_content` varchar(300) NOT NULL,
  `m_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_msg` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_msg` (`user_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(50) NOT NULL,
  `pro_desc` varchar(100) NOT NULL,
  `pro_pic` varchar(50) NOT NULL,
  `pro_price` float NOT NULL,
  `product_cat` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_cat` (`product_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_desc`, `pro_pic`, `pro_price`, `product_cat`) VALUES
(5, 'Les pâtes Antes', 'Elles sont épatantes ', 'antes.jpg', 9.5, 4),
(6, 'La Casablanca', 'Le charme de la Gambas ', 'casaba.jpg', 12, 2),
(7, 'Spaghetti alla Carbonara', 'Sans crème s\'il-vous-plaît', 'carbonara.png', 9.5, 4),
(8, 'La bannie', 'Illégale dans plus de 80 pays ', 'hawai.jpg', 12, 2),
(9, 'Spaghetti alla Bolognese', 'Un classique revisité', 'bolo.jpg', 9, 4),
(10, 'La Napoli', 'Vous nous remercierez', 'pizz2.jpg', 12, 2),
(11, 'Fetuccine al Tartuffo', 'Vous en redemanderez', 'tatuf.jpg', 12, 4),
(12, 'La Calzone', 'Elle vous surprendra', 'calz.jpg', 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `userorder`
--

DROP TABLE IF EXISTS `userorder`;
CREATE TABLE IF NOT EXISTS `userorder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `total_price` float NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `admin`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 1, 'Ruler', 'Flag', 'ruler@flag.com', '$2y$10$iXorG.oZRZnHANIiB8eu8e9NYUmfnt/yk6xVN1g6gGMsr3qUhfs6u'),
(2, 0, 'Saber', 'Fate', 'saber@fate.com', '$2y$10$Zba6H96ugnYPCuem4tCl6.E/RV.cNrVJAYL2C38CdLJO7Y4olkYtW'),
(3, 1, 'admin', 'admin', 'admin@admin.com', '$2y$10$fiIqZ2hvWV2JDuSSWW1MuuG3TkvL4kgBG7p8419UBpbevoahO8Ul6');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `user_msg` FOREIGN KEY (`user_msg`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
