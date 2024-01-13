-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 13 jan. 2024 à 08:24
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clubsport`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `nom_categorie` varchar(50) NOT NULL,
  `code_categorie` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`, `code_categorie`) VALUES
(3, 'Junior', 'M15'),
(4, 'Minime', 'M14'),
(5, 'Senior', 'P18');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `nom_contact` varchar(50) NOT NULL,
  `prenom_contact` varchar(50) NOT NULL,
  `email_contact` varchar(100) NOT NULL,
  `num_tel_contact` varchar(15) NOT NULL,
  `licencie_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom_contact`, `prenom_contact`, `email_contact`, `num_tel_contact`, `licencie_id`) VALUES
(7, 'Dupont', 'niyona emmanuel', 'yeoepro921@gmail.com', '0779341886', 5),
(8, 'TAHI', 'niyona emmanuel', 'yeoepro921@gmail.com', '0779341886', 6),
(9, 'Doe', 'niyona emmanuel', 'yeoepro921@gmail.com', '0779341886', 7),
(10, 'ciéés', 'do', 'silueruth2021@gmail.com', '0779341886', 8);

-- --------------------------------------------------------

--
-- Structure de la table `educateur`
--

CREATE TABLE `educateur` (
  `id` int NOT NULL,
  `email_educateur` varchar(100) NOT NULL,
  `mdp_educateur` varchar(100) NOT NULL,
  `licencie_id` int NOT NULL,
  `est_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `educateur`
--

INSERT INTO `educateur` (`id`, `email_educateur`, `mdp_educateur`, `licencie_id`, `est_admin`) VALUES
(5, 'yeoepro921@gmail.com', '$2y$10$pUGXPtqHN02T3xQG71Gwk./bWsN8p.WPlVSJn3DfAO8EiAiAMBCjS', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `licencie`
--

CREATE TABLE `licencie` (
  `id` int NOT NULL,
  `num_licence` varchar(20) NOT NULL,
  `nom_licencie` varchar(50) NOT NULL,
  `prenom_licencie` varchar(50) NOT NULL,
  `categorie_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `licencie`
--

INSERT INTO `licencie` (`id`, `num_licence`, `nom_licencie`, `prenom_licencie`, `categorie_id`) VALUES
(5, '24127989', 'Doe', 'John', 4),
(6, '24127990', 'Doe', 'Johanna', 3),
(7, '24764131', 'Yéo', 'Niyona Emmanuel', 5),
(8, '24895657', 'Doe', 'Mick', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licencieId` (`licencie_id`);

--
-- Index pour la table `educateur`
--
ALTER TABLE `educateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailEducateur` (`email_educateur`),
  ADD KEY `licencieId` (`licencie_id`);

--
-- Index pour la table `licencie`
--
ALTER TABLE `licencie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numLicence` (`num_licence`),
  ADD KEY `categorieId` (`categorie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `educateur`
--
ALTER TABLE `educateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `licencie`
--
ALTER TABLE `licencie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`licencie_id`) REFERENCES `licencie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `educateur`
--
ALTER TABLE `educateur`
  ADD CONSTRAINT `educateur_ibfk_1` FOREIGN KEY (`licencie_id`) REFERENCES `licencie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `licencie`
--
ALTER TABLE `licencie`
  ADD CONSTRAINT `licencie_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
