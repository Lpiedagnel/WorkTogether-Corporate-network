-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 23 avr. 2023 à 10:47
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `worktogether`
--
CREATE DATABASE IF NOT EXISTS `worktogether` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `worktogether`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `author_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `text`, `created_at`, `author_id`, `message_id`) VALUES
(20, 'Sed quis justo ut neque scelerisque aliquam. Phasellus velit neque, efficitur id mauris eu, fermentum bibendum diam. Nulla facilisi. Duis ac euismod lectus. Sed nec tellus sit amet leo consectetur dictum. Proin id cursus risus. Nunc rhoncus viverra congue.', '2023-04-22 09:49:17', 27, 85),
(21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur accumsan non mi eget tincidunt. Cras tempor eros dolor, vel varius arcu maximus eu. ', '2023-04-22 09:49:42', 27, 86),
(22, 'Praesent sit amet urna rutrum, euismod turpis ut, egestas nibh. Praesent lobortis quis ipsum egestas efficitur. Donec varius, dui id sodales feugiat, justo justo accumsan libero, at interdum libero neque id ante. Ut iaculis aliquet vehicula. Curabitur in luctus purus, vel euismod turpis. ', '2023-04-22 09:50:06', 24, 86),
(23, 'Morbi accumsan aliquet tortor, non euismod lorem fermentum quis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse nec lorem mauris. ', '2023-04-22 09:50:16', 24, 84);

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `since_when` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `follow`
--

INSERT INTO `follow` (`id`, `follower_id`, `followed_id`, `since_when`) VALUES
(104, 27, 23, '2023-04-22'),
(105, 27, 28, '2023-04-22'),
(106, 24, 29, '2023-04-22'),
(107, 24, 25, '2023-04-22'),
(108, 23, 25, '2023-04-22');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(49, 27, 85),
(50, 27, 86),
(51, 24, 86),
(52, 24, 84);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `author_id`, `text`, `img_path`, `created_at`) VALUES
(84, 30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur accumsan non mi eget tincidunt. Cras tempor eros dolor, vel varius arcu maximus eu.', NULL, '2023-04-22 09:48:20'),
(85, 30, 'Praesent sit amet urna rutrum, euismod turpis ut, egestas nibh. Praesent lobortis quis ipsum egestas efficitur. Donec varius, dui id sodales feugiat, justo justo accumsan libero, at interdum libero neque id ante. Ut iaculis aliquet vehicula. Curabitur in luctus purus, vel euismod turpis.', NULL, '2023-04-22 09:48:33'),
(86, 27, 'Maecenas sit amet orci in lorem cursus iaculis. Quisque id augue nibh. Fusce at ultricies risus. Aliquam sit amet dolor faucibus, hendrerit justo nec, rhoncus risus. Donec sit amet lacus in elit pretium pretium. Sed at nisi imperdiet justo facilisis efficitur. Etiam eu velit in neque gravida porttitor ac ut elit. Proin vitae sem sed leo consequat pretium id sit amet purus.', NULL, '2023-04-22 09:49:06'),
(87, 23, 'Bienvenue sur WorkTogether ! N&#039;hésitez pas à tester les différentes fonctionnalités et interagir avec les autres utilisateurs.', NULL, '2023-04-22 09:53:21');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `job` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL DEFAULT 'uploads/default_avatar.jpg',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `job`, `email`, `password`, `img_path`, `is_admin`) VALUES
(23, 'Admin', 'WorkTogether', 'Administrateur de WorkTogether', 'admin@worktogether.fr', '$2y$12$.sVPAz5zlAxjZgucMg/COukA63k.0BnJ6DkGxHERrNDyld4GqhoXO', 'uploads/default_avatar.jpg', 1),
(24, 'John', 'Doe', 'Commercial', 'john-doe@worktogether.com', '$2y$12$AfeZIiaTNBmvQPuc/a.Rsuu4.iRO0JkuneZlAZvDJJybWXNLNcjCO', 'uploads/default_avatar.jpg', 0),
(25, 'Jane', 'Doe', 'Avocate', 'jane-doe@worktogether.com', '$2y$12$WkirICGSa0zCE0Yp.t2gWuNzBfKruAQERxZrJagDXSAuCEYDIOVnG', 'uploads/default_avatar.jpg', 0),
(26, 'Robert', 'Florent', NULL, 'robert-andre@worktogether.com', '$2y$12$bPfEj06t6ieXWUxSNL3GkO/dFSJdKCq5D2p/Y2SIa5G3lDecMM.ea', 'uploads/default_avatar.jpg', 0),
(27, 'Florian', 'Andre', NULL, 'florian-andre@worktogether.com', '$2y$12$1.Wex4pj1fM4bcigsITOP.E2fAXN/wnZyqM1gY7D2.Hfsu98o4r1y', 'uploads/default_avatar.jpg', 0),
(28, 'Pauline', 'Pierre', 'Dirigeante', 'pauline-pierre@worktogether.com', '$2y$12$Q/S36U8arHy83eh7hOXCbO8p9S/cPKvS52/68gsnqLZX6IQSsyBci', 'uploads/default_avatar.jpg', 0),
(29, 'Jean', 'Philippe', NULL, 'jean-philippe@worktogether.com', '$2y$12$ksqKjqw6.Ieuu07TNpidJuZt6zOag6W6PubCN7LFJYZsJeo.Zx1dG', 'uploads/default_avatar.jpg', 0),
(30, 'Marc', 'Fontaine', NULL, 'marc-fontaine@worktogether.com', '$2y$12$EvCa/Y91CPjPRPDLEeGI5OlQLqcz73qfQzoTIuc8q/ne.ERoJtsze', 'uploads/default_avatar.jpg', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
