-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 avr. 2023 à 23:20
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `soli56`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `ID_service` int(11) NOT NULL,
  `ID_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`ID_service`, `ID_categorie`) VALUES
(1, 1),
(1, 5),
(2, 1),
(2, 5),
(3, 1),
(4, 1),
(5, 6),
(6, 6),
(7, 4),
(8, 4),
(10, 2),
(10, 3),
(11, 2),
(11, 3),
(12, 8),
(13, 8),
(14, 2),
(14, 3),
(15, 2),
(15, 3),
(16, 2),
(16, 3),
(17, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `icone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`ID`, `nom`, `icone`) VALUES
(1, 'alimentaire', 'couverts.png'),
(2, 'emploi', 'emploi.png'),
(3, 'formation', 'formation.png'),
(4, 'hébergement', 'hebergement.png'),
(5, 'hygiène', 'hygiene.png'),
(6, 'santé', 'sante.png'),
(7, 'transport', 'transport.png'),
(8, 'wifi public', 'wifi.png');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `ID` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `resume` text DEFAULT NULL,
  `ouverture` text NOT NULL,
  `num_rue` varchar(11) DEFAULT NULL,
  `nom_rue` varchar(50) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `site_web` varchar(300) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`ID`, `nom`, `resume`, `ouverture`, `num_rue`, `nom_rue`, `cp`, `ville`, `tel`, `mail`, `site_web`, `photo`) VALUES
(1, 'Accueil de jour - CCAS de Lorient', 'Accueil avec entretien individuel sur place des personnes sans domicile stable\r\n<p>Possibilités : </p>\r\n<p>- De se restaurer et réaliser soi-même son repas, </p>\r\n<p>- D\'utiliser la douche (kit d\'hygiène à disposition)</p>\r\n<p>- De bénéficier de soins de premières nécessité, de solliciter un accompagnement (démarches, soutien...)</p>', 'Du lundi au vendredi\r\n- De 9h00 à 18h00', '33', 'rue du Couëdic', 56100, 'Lorient', '02.97.37.99.36', 'contact@lorem.com', 'https://www.lorient.bzh/ccas/les-solidarites/publics-sans-domicile-stable', NULL),
(2, 'Accueil de jour - Société Saint Vincent de Paul', 'Accueil avec entretien individuel sur place des personnes sans domicile stable.\r\n<p>Possibilités :</p>\r\n<p>- De se restaurer et réaliser soi-même son repas,</p>\r\n<p>- D\'utiliser la douche (kit d\'hygiène à disposition)</p>\r\n<p>- De bénéficier de soins de premières nécessité, de solliciter un accompagnement (démarches, soutien...)</p>', 'Du lundi au vendredi\r\n- De 9h00 à 18h00', '23', ' rue Texier la Houle', 56000, 'Vannes', '02.97.47.84.01', 'svp.vannes56@orange.fr', 'https://www.ssvp.fr/ssvp-du-morbihan/', NULL),
(3, 'Action Solidaire de Saint-Joseph La Salle', 'L\'équipe propose un repas, des produits d\'hygiène, des vêtements et des couvertures.\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.</p>', 'A partir de 18h00', '10', 'Vivamus facilisis', 56100, 'Lorient', '02.97.00.00.00', 'contact@lorem.com', '#', NULL),
(4, 'On veut du soleil', 'L\'équipe propose un repas, des produits d\'hygiène, des vêtements et des couvertures.\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.\r\n</p>', 'A partir de 18H00', '15', 'Vivamus facilisis', 56000, 'Vannes', '02.97.00.00.00', 'contact@lorem.com', '#', NULL),
(5, 'Centre planification familiale - Lorient', 'Centre hospitalier de Bretagne Sud\r\nSite du Scorff\r\nPôle Femme, Mère, Enfant\r\nCentre de Sante Sexuelle et centre IVG\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.\r\n</p>', 'Du lundi au samedi de 8h30 à 18h30', '1', 'rue Louis Guiguen ', 56100, 'Lorient', '02.97.06.91.84', 'centredeplanification@ch-bretagne-sud.fr', 'https://www.ghbs.bzh/information-transversale/annuaire-des-services/detail-d-un-service-270/centre-de-sante-sexuelle-et-centre-ivg-11.html?cHash=188890f9537b1310c6cdac382faa7770', NULL),
(6, 'Centre planification familiale - Vannes', 'Centre Hospitalier Bretagne Atlantique\r\nCentre de Sante Sexuelle et centre IVG.\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.\r\n</p>', 'Du lundi au samedi de 8h30 à 18h00', '20', 'boulevard Général Maurice', 56000, 'Vannes', '02.97.01.41.91', 'contact@lorem.com', 'http://www.ch-bretagne-atlantique.fr/nos-unites-et-services/annuaire-des-unites-et-services-526/centre-de-sante-sexuelle-centre-divg-37.html?cHash=b980e8ab6b731a81991f412862f56984', NULL),
(7, 'CHRS Résidence Le SAFRAN', 'Centres d\'Hébergement et de Réinsertion Sociale.\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.\r\n</p>', 'Lorem ipsum dolor sit amet', '57', 'Amiral courbet', 56100, 'Lorient', '02.97.64.05.05', 'contact@lorem.com', '#', NULL),
(8, 'CHRS Robelin', 'Centres d\'Hébergement et de Réinsertion Sociale.\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.\r\n</p>', 'Lorem ipsum dolor sit amet', '1', 'rue Robelin', 56100, 'Lorient', '02.97.35.33.40', 'contact@lorem.com', '#', NULL),
(10, 'Mission locale du Pays de Lorient', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', 'Lorem ipsum dolor sit amet', '9 bis', 'Place François Mitterand', 56100, 'Lorient', '02.97.21.42.05', 'contact@mllorient.org', 'https://www.mllorient.org/', NULL),
(11, 'Mission locale du Pays de Vannes - Zone du Prat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', 'Lorem ipsum dolor sit amet', '1', 'Allée de Kérivarho', 56000, 'Vannes', '02.97.01.65.40', 'contact@mlpv.org', 'https://www.mlpvannes.org/', NULL),
(12, 'Wifi Gare de Lorient', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', 'Lorem ipsum dolor sit amet', NULL, 'Place François Mitterand', 56100, 'Lorient', '02.97.00.00.00', 'contact@lorem.com', '#', NULL),
(13, 'Wifi Place de Bretagne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', 'Lorem ipsum dolor sit amet', NULL, 'Place de Bretagne', 5600, 'Vannes', '02.97.00.00.00', 'contact@lorem.com', '#', NULL),
(14, 'Pôle Emploi -  Agence LORIENT VILLE - Lorient', 'Service qui accueille, informe et oriente toutes les personnes, qu’elles soient ou non déjà en poste.\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.\r\n</p>', 'Lorem ipsum dolor sit amet', '20', 'Lorem ipsum dolor sit amet', 56100, 'Lorient', '3949', 'contact@lorem.com', '#', '\"\"'),
(15, 'Pôle Emploi -  Agence LORIENT VILLE - Lorient', 'Service qui accueille, informe et oriente toutes les personnes, qu’elles soient ou non déjà en poste.\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.\r\n</p>', 'Lorem ipsum dolor sit amet', '10', 'Vivamus facilisis', 56100, 'Lorient', '3949', 'contact@lorem.com', '#', '\"\"'),
(16, 'Pôle Emploi -  Agence LORIENT VILLE - Lorient', 'Service qui accueille, informe et oriente toutes les personnes, qu’elles soient ou non déjà en poste.\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.\r\n</p>', 'Lorem ipsum dolor sit amet', '2', 'rue Alice Coleno', 56100, 'Lorient', '3949', 'contact@lorem.com', 'https://www.pole-emploi.fr/annuaire/votre-pole-emploi/lorient-ville-56100', NULL),
(17, 'SIAO Vannes', 'Le service d\'accueil...\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.\r\n</p>', 'Lorem ipsum dolor sit amet', '3', 'avenue du Président Wilson', 56000, 'Vannes', '02.97.54.54.21', 'contact@lorem.com', 'https://www.siao56.fr/', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `num_rue` int(11) DEFAULT NULL,
  `nom_rue` varchar(50) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `mdp`, `nom`, `prenom`, `mail`, `num_rue`, `nom_rue`, `cp`, `ville`, `admin`) VALUES
('admin1', '*6D45FD76D5E9C6A404E39C25106A7F032659ACB8', 'Dichanne', 'Ludovic', 'ludovic_dichanne@outlook.com', NULL, NULL, 56100, 'Lorient', 1),
('admin2', '*0E6FD44C7B722784DAE6E67EF8C06FB1ACB3E0A6', 'Cardinale', 'Valériane', 'valeriane_cardinale@outlook.com', NULL, NULL, 56000, 'Vannes', 1),
('emilie561', '*DEBF494690FD1D61713BC08882BAE308E8AAAB13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('izach87', '*1928DC97C90CBAB6BE374F18B486F1C1E027010E', NULL, NULL, NULL, NULL, NULL, 56000, 'Vannes', 0),
('jacques520', '*6B65FD6C525A9828DF550286DAA7020DC077338D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('john21', '*BC8D5C14298F741B5731C79FF738F99EAD9F4C68', 'Winder', 'John', 'john21@outlook.com', 523, 'Avenue Jean Jaurès', 56100, 'Lorient', 0),
('kriss63', '*C38D0F2CFF7E038E71B5E50142A4AAA1191D0251', 'Durand', 'Kristell', NULL, NULL, NULL, 56100, 'Lorient', 0),
('marie210', '*6C8D5CA3A46F5A392A116B8965D4927113CDFAE6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`ID_service`,`ID_categorie`),
  ADD KEY `ID_1` (`ID_categorie`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`ID_service`) REFERENCES `services` (`ID`),
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`ID_categorie`) REFERENCES `categories` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
