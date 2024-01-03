
--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(50) NOT NULL,
  `codeCategorie` varchar(10) NOT NULL,
  PRIMARY KEY (`idCategorie`)
);

INSERT INTO categorie (nomCategorie, codeCategorie) VALUES ('Plus de 18 ans', 'P18');


--
-- Structure de la table `licencie`
--

DROP TABLE IF EXISTS `licencie`;
CREATE TABLE IF NOT EXISTS `licencie` (
  `idLicencie` int NOT NULL AUTO_INCREMENT,
  `numLicence` varchar(20) NOT NULL,
  `nomLicencie` varchar(50) NOT NULL,
  `prenomLicencie` varchar(50) NOT NULL,
  `categorieId` int NOT NULL,
  PRIMARY KEY (`idLicencie`),
  UNIQUE KEY `numLicence` (`numLicence`),
  FOREIGN KEY (`categorieId`) REFERENCES categorie(`idCategorie`) ON DELETE CASCADE
);


--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idContact` int NOT NULL AUTO_INCREMENT,
  `nomContact` varchar(50) NOT NULL,
  `prenomContact` varchar(50) NOT NULL,
  `emailContact` varchar(100) NOT NULL,
  `numTelContact` varchar(15) NOT NULL,
  `licencieId` int NOT NULL,
  PRIMARY KEY (`idContact`),
  FOREIGN KEY (`licencieId`) REFERENCES licencie(`idLicencie`) ON DELETE CASCADE
);


--
-- Structure de la table `educateur`
--

DROP TABLE IF EXISTS `educateur`;
CREATE TABLE IF NOT EXISTS `educateur` (
  `idEducateur` int NOT NULL AUTO_INCREMENT,
  `emailEducateur` varchar(100) NOT NULL,
  `mdpEducateur` varchar(100) NOT NULL,
  `licencieId` int NOT NULL,
  PRIMARY KEY (`idEducateur`),
  UNIQUE KEY `emailEducateur` (`emailEducateur`),
  FOREIGN KEY (`licencieId`) REFERENCES licencie(`idLicencie`) ON DELETE CASCADE
);


