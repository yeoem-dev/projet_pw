-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 14 jan. 2024 à 18:37
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
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240114100241', '2024-01-14 10:07:13', 164),
('DoctrineMigrations\\Version20240114175550', '2024-01-14 17:56:02', 45);

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

-- --------------------------------------------------------

--
-- Structure de la table `mail_contact`
--

CREATE TABLE `mail_contact` (
  `id` int NOT NULL,
  `expediteur_id` int NOT NULL,
  `date_envoi` datetime NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mail_contact_contact`
--

CREATE TABLE `mail_contact_contact` (
  `mail_contact_id` int NOT NULL,
  `contact_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mail_edu`
--

CREATE TABLE `mail_edu` (
  `id` int NOT NULL,
  `expediteur_id` int NOT NULL,
  `date_envoie` datetime NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mail_edu`
--

INSERT INTO `mail_edu` (`id`, `expediteur_id`, `date_envoie`, `objet`, `message`) VALUES
(4, 5, '2024-01-14 18:22:52', 'ejkwje', 'ewew');

-- --------------------------------------------------------

--
-- Structure de la table `mail_edu_educateur`
--

CREATE TABLE `mail_edu_educateur` (
  `mail_edu_id` int NOT NULL,
  `educateur_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mail_edu_educateur`
--

INSERT INTO `mail_edu_educateur` (`mail_edu_id`, `educateur_id`) VALUES
(4, 5);

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
  ADD KEY `IDX_4C62E638B56DCD74` (`licencie_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `educateur`
--
ALTER TABLE `educateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_763C0122B56DCD74` (`licencie_id`);

--
-- Index pour la table `licencie`
--
ALTER TABLE `licencie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3B755612BCF5E72D` (`categorie_id`);

--
-- Index pour la table `mail_contact`
--
ALTER TABLE `mail_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_96DF675710335F61` (`expediteur_id`);

--
-- Index pour la table `mail_contact_contact`
--
ALTER TABLE `mail_contact_contact`
  ADD PRIMARY KEY (`mail_contact_id`,`contact_id`),
  ADD KEY `IDX_94F6F3BB3362CFB6` (`mail_contact_id`),
  ADD KEY `IDX_94F6F3BBE7A1254A` (`contact_id`);

--
-- Index pour la table `mail_edu`
--
ALTER TABLE `mail_edu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8CB8D4A310335F61` (`expediteur_id`);

--
-- Index pour la table `mail_edu_educateur`
--
ALTER TABLE `mail_edu_educateur`
  ADD PRIMARY KEY (`mail_edu_id`,`educateur_id`),
  ADD KEY `IDX_7A814C4C9D911D20` (`mail_edu_id`),
  ADD KEY `IDX_7A814C4C6BFC1A0E` (`educateur_id`);

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
-- AUTO_INCREMENT pour la table `mail_contact`
--
ALTER TABLE `mail_contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mail_edu`
--
ALTER TABLE `mail_edu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E638B56DCD74` FOREIGN KEY (`licencie_id`) REFERENCES `licencie` (`id`);

--
-- Contraintes pour la table `educateur`
--
ALTER TABLE `educateur`
  ADD CONSTRAINT `FK_763C0122B56DCD74` FOREIGN KEY (`licencie_id`) REFERENCES `licencie` (`id`);

--
-- Contraintes pour la table `licencie`
--
ALTER TABLE `licencie`
  ADD CONSTRAINT `FK_3B755612BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `mail_contact`
--
ALTER TABLE `mail_contact`
  ADD CONSTRAINT `FK_96DF675710335F61` FOREIGN KEY (`expediteur_id`) REFERENCES `educateur` (`id`);

--
-- Contraintes pour la table `mail_contact_contact`
--
ALTER TABLE `mail_contact_contact`
  ADD CONSTRAINT `FK_94F6F3BB3362CFB6` FOREIGN KEY (`mail_contact_id`) REFERENCES `mail_contact` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_94F6F3BBE7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `mail_edu`
--
ALTER TABLE `mail_edu`
  ADD CONSTRAINT `FK_8CB8D4A310335F61` FOREIGN KEY (`expediteur_id`) REFERENCES `educateur` (`id`);

--
-- Contraintes pour la table `mail_edu_educateur`
--
ALTER TABLE `mail_edu_educateur`
  ADD CONSTRAINT `FK_7A814C4C6BFC1A0E` FOREIGN KEY (`educateur_id`) REFERENCES `educateur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7A814C4C9D911D20` FOREIGN KEY (`mail_edu_id`) REFERENCES `mail_edu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
