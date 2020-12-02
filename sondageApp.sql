-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 02 déc. 2020 à 20:24
-- Version du serveur :  10.5.8-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sondageApp`
--
CREATE DATABASE IF NOT EXISTS `sondageApp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sondageApp`;

-- --------------------------------------------------------

--
-- Structure de la table `friendslist`
--

CREATE TABLE `friendslist` (
  `friendsList_id` int(11) NOT NULL,
  `friendsList_userID1` int(11) NOT NULL,
  `friendsList_userID2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `friendslist`
--

INSERT INTO `friendslist` (`friendsList_id`, `friendsList_userID1`, `friendsList_userID2`) VALUES
(18, 26, 23),
(21, 26, 24),
(24, 26, 25);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `message_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `sondage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`message_id`, `message_content`, `message_date`, `user_id`, `sondage_id`) VALUES
(23, 'Vraiment super !', '2020-12-01 17:54:23', 26, 31),
(24, 'McDo of course', '2020-12-01 17:54:54', 26, 32),
(25, 'C\'est l\'hiver', '2020-12-01 17:55:30', 26, 33),
(26, 'Top !', '2020-12-01 17:55:43', 26, 34),
(27, 'On est d\'accord', '2020-12-01 18:00:36', 23, 31),
(28, 'I agree', '2020-12-01 18:01:16', 23, 32),
(29, 'Un peu d\'optimisme !', '2020-12-01 18:01:31', 23, 33),
(30, 'Yes !', '2020-12-01 18:02:20', 23, 34),
(31, 'Je n\'ai jamais vu ca', '2020-12-01 18:02:57', 24, 31),
(32, 'Non du poulet', '2020-12-01 18:03:13', 24, 32),
(33, 'Super film !', '2020-12-01 18:03:29', 24, 34),
(34, 'Une pÃ©pite', '2020-12-01 18:04:05', 25, 31),
(35, 'Je vais prendre des nuggets', '2020-12-01 18:04:26', 25, 32),
(36, 'J\'adore le mauvais temps et dÃ©teste le soleil', '2020-12-01 18:04:57', 25, 33),
(37, 'Je n\'aime pas les films', '2020-12-01 18:05:15', 25, 34),
(38, 'Je prÃ©fÃ¨re la pluie', '2020-12-01 18:05:26', 25, 34),
(39, 'Test', '2020-12-01 22:43:08', 26, 37);

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

CREATE TABLE `sondage` (
  `sondage_id` int(11) NOT NULL,
  `sondage_question` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sondage_finish` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sondage`
--

INSERT INTO `sondage` (`sondage_id`, `sondage_question`, `user_id`, `sondage_finish`) VALUES
(31, 'Est ce que notre projet est bien ?', 26, '2021-09-06 16:06:39'),
(32, 'Que vais-je manger ce soir ?', 26, '2020-12-01 17:06:55'),
(33, 'Quelle temps fait-il demain ?', 26, '2020-12-01 17:07:07'),
(34, 'Quel film je vais regarder ce soir ?', 26, '2020-12-01 17:08:48'),
(37, 'Quel série je vais regarder ?', 26, '2020-12-01 21:40:35'),
(38, 'Quel survetement acheter ? ', 24, '2021-07-14 19:39:14');

-- --------------------------------------------------------

--
-- Structure de la table `sondagereponse`
--

CREATE TABLE `sondagereponse` (
  `sondageReponse_id` int(11) NOT NULL,
  `sondage_id` int(11) NOT NULL,
  `sondageReponse_reponse` varchar(255) NOT NULL,
  `sondageReponse_reponseScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sondagereponse`
--

INSERT INTO `sondagereponse` (`sondageReponse_id`, `sondage_id`, `sondageReponse_reponse`, `sondageReponse_reponseScore`) VALUES
(17, 31, 'Excellent', 3),
(18, 31, 'Incroyable', 1),
(19, 32, 'Kfc', 1),
(20, 32, 'McDo', 3),
(21, 33, 'Beau ', 1),
(22, 33, 'Pas beau', 2),
(23, 34, 'Hunger Games', 2),
(24, 34, 'Indiana Jones', 2),
(29, 37, 'Lucifer', 1),
(30, 37, 'Suits', 0),
(31, 38, 'Le nike', 0),
(32, 38, 'Le Addidas', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sondagereponseuser`
--

CREATE TABLE `sondagereponseuser` (
  `sondageReponseUser_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sondage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_pseudo` varchar(30) NOT NULL,
  `user_firstName` varchar(30) NOT NULL,
  `user_lastName` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_pseudo`, `user_firstName`, `user_lastName`, `user_email`, `user_password`, `user_online`) VALUES
(23, 'sachaPseudo', 'Sacha', 'Le Bras', 'mail@mail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 1),
(24, 'AyoubPseudo', 'Ayoub', 'El Guendouz', 'mail2@mail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0),
(25, 'MathildePseudo', 'Mathilde', 'Asselin', 'mail3@mail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0),
(26, 'Alexandre.G', 'Alexandre', 'Gaillot', 'alexandre@mail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `friendslist`
--
ALTER TABLE `friendslist`
  ADD PRIMARY KEY (`friendsList_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Index pour la table `sondage`
--
ALTER TABLE `sondage`
  ADD PRIMARY KEY (`sondage_id`);

--
-- Index pour la table `sondagereponse`
--
ALTER TABLE `sondagereponse`
  ADD PRIMARY KEY (`sondageReponse_id`);

--
-- Index pour la table `sondagereponseuser`
--
ALTER TABLE `sondagereponseuser`
  ADD PRIMARY KEY (`sondageReponseUser_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `friendslist`
--
ALTER TABLE `friendslist`
  MODIFY `friendsList_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `sondage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `sondagereponse`
--
ALTER TABLE `sondagereponse`
  MODIFY `sondageReponse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `sondagereponseuser`
--
ALTER TABLE `sondagereponseuser`
  MODIFY `sondageReponseUser_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
