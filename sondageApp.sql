-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 01 déc. 2020 à 17:11
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
-- Structure de la table `friendsList`
--

CREATE TABLE `friendsList` (
  `friendsList_id` int(11) NOT NULL,
  `friendsList_userID1` int(11) NOT NULL,
  `friendsList_userID2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `friendsList`
--

INSERT INTO `friendsList` (`friendsList_id`, `friendsList_userID1`, `friendsList_userID2`) VALUES
(2, 1, 21),
(3, 1, 21),
(4, 1, 20),
(8, 1, 21),
(13, 1, 19),
(14, 1, 19),
(17, 22, 19);

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
(1, 'lorem ipsum ta mere la pite', '2020-11-29 15:59:38', 19, 1),
(2, 'lorem ipsum ta mere la pitelorem ipsum ta mere la pite', '2020-11-29 15:59:39', 20, 1),
(3, 'MESSAGE', '2020-11-29 16:37:25', 19, 1),
(4, 'text', '2020-11-29 17:27:05', 19, 1),
(5, 'text', '2020-11-29 17:27:13', 19, 1),
(6, 'text', '2020-11-29 17:30:17', 19, 1),
(7, 'sdfsdf', '2020-11-29 17:30:37', 19, 2),
(8, 'azdazd', '2020-11-29 17:30:51', 19, 1),
(9, 'kjkjh', '2020-11-29 17:31:09', 22, 1),
(10, 'qsdqds', '2020-11-29 18:02:12', 22, 1),
(11, 'qsdqdssqxazd', '2020-11-29 18:02:21', 22, 1),
(12, 'sqdazdaz', '2020-11-29 18:02:35', 19, 1),
(13, 'lhsqcljza', '2020-11-29 18:30:05', 22, 1),
(14, 'lhsqcljzaca', '2020-11-29 18:30:14', 22, 1),
(15, 'zedzed', '2020-11-30 22:51:40', 19, 19),
(16, 'zedzedzedzed', '2020-11-30 22:51:45', 19, 19),
(17, 'test', '2020-11-30 22:52:28', 19, 19),
(18, 'test', '2020-11-30 23:05:36', 19, 19),
(19, 'zczec', '2020-11-30 23:07:19', 19, 2),
(20, 'zadazd', '2020-11-30 23:07:26', 19, 2),
(21, 'ezfzef', '2020-12-01 17:24:47', 19, 3),
(22, 'ezfzefezfezf', '2020-12-01 17:24:48', 19, 3);

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
(1, 'question', 1, '0000-00-00 00:00:00'),
(2, 'question2', 1, '0000-00-00 00:00:00'),
(3, 'Que vais je manger ? ', 1, '0000-00-00 00:00:00'),
(10, 'Test question', 19, '2020-11-30 18:44:15'),
(11, 'Test question', 19, '2020-11-30 18:45:41'),
(12, 'Test question', 19, '2020-11-30 18:46:17'),
(13, 'Test question', 19, '2020-11-30 18:46:56'),
(14, 'Test question', 19, '2020-11-30 18:54:43'),
(15, 'Test question', 19, '2020-11-30 19:07:06'),
(16, 'Test time', 1, '2020-11-30 19:12:17'),
(17, 'test test ', 1, '2020-11-30 19:13:56'),
(18, 'test user', 22, '2020-11-30 19:26:12'),
(19, 'TEST TIMETIME', 19, '2020-11-30 20:36:15'),
(20, 'test samy', 19, '2020-11-30 21:36:10'),
(21, 'ZFEZF', 19, '2020-12-01 11:51:13'),
(22, 'test', 19, '2020-12-01 16:07:53'),
(23, 'question 1', 19, '2020-12-01 16:13:19'),
(24, 'DLJJKSNDLKDS', 19, '2020-12-01 16:26:24'),
(25, 'sqdqsd', 19, '2020-12-01 16:36:06');

-- --------------------------------------------------------

--
-- Structure de la table `sondageReponse`
--

CREATE TABLE `sondageReponse` (
  `sondageReponse_id` int(11) NOT NULL,
  `sondage_id` int(11) NOT NULL,
  `sondageReponse_reponse` varchar(255) NOT NULL,
  `sondageReponse_reponseScore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sondageReponse`
--

INSERT INTO `sondageReponse` (`sondageReponse_id`, `sondage_id`, `sondageReponse_reponse`, `sondageReponse_reponseScore`) VALUES
(1, 3, 'Mcdo', 1),
(2, 3, 'Chinois', 1),
(3, 3, 'TEST', 1),
(4, 3, 'TEST', 1),
(5, 16, 'test', 1),
(6, 16, 'test', 1),
(7, 17, 'mcdo', 1),
(8, 17, 'quick', 1),
(9, 17, 'mcdo', 1),
(10, 17, 'quick', 1),
(11, 18, 'user', 1),
(12, 18, 'user', 1),
(13, 19, 'reponse 1', 13),
(14, 19, 'reponse 2', 11),
(15, 25, 'qsdqsd', 0),
(16, 25, 'sqdqsdqsd', 0),
(17, 25, 'ergege', 0),
(18, 25, 'regerg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `sondageReponseUser`
--

CREATE TABLE `sondageReponseUser` (
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
(19, 'Ayoub93', 'test', 'test', 'test@gmail.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 1),
(20, 'Ayoub', 'Ayoub', 'Ayoub', 'ayoub@gmail.com', '16019fea43d823bf1d80e183484127fec43287e5b6ad8cc3d4ac42b9523af3e6', 0),
(21, 'Ayoub9360', 'mathilde', 'Ayoub', 'mathilde@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0),
(22, 'login', 'Ayoub', 'login', 'login@gmail.com', '428821350e9691491f616b754cd8315fb86d797ab35d843479e732ef90665324', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `friendsList`
--
ALTER TABLE `friendsList`
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
-- Index pour la table `sondageReponse`
--
ALTER TABLE `sondageReponse`
  ADD PRIMARY KEY (`sondageReponse_id`);

--
-- Index pour la table `sondageReponseUser`
--
ALTER TABLE `sondageReponseUser`
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
-- AUTO_INCREMENT pour la table `friendsList`
--
ALTER TABLE `friendsList`
  MODIFY `friendsList_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `sondage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `sondageReponse`
--
ALTER TABLE `sondageReponse`
  MODIFY `sondageReponse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `sondageReponseUser`
--
ALTER TABLE `sondageReponseUser`
  MODIFY `sondageReponseUser_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
