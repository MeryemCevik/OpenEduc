-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2024 at 12:19 PM
-- Server version: 8.0.35
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openeduc`
--

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `Id_classe` int NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Niveau` varchar(100) NOT NULL,
  `effectif` int NOT NULL,
  `anneeScolaire` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Id_ecole` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`Id_classe`, `Nom`, `Niveau`, `effectif`, `anneeScolaire`, `Id_ecole`) VALUES
(1, 'CP Monsieur Bouleau', 'CP', 30, '2023/2024', 5),
(2, 'CE2 Bilingue Monsieur Bouleau', 'CE2', 21, '2023/2024', 5),
(3, 'CE2 Madame Bouleau', 'CE2', 28, '2023/2024', 5),
(4, 'CE1 Monsieur Bouleau', 'CE1', 31, '2023/2024', 5),
(5, 'CE2 Bilingue Madame Bouleau', 'CE2', 26, '2023/2024', 5),
(6, 'CM2 Bilingue Monsieur Roro', 'CM2', 25, '2023/2024', 5);

-- --------------------------------------------------------

--
-- Table structure for table `correspondant_apea`
--

CREATE TABLE `correspondant_apea` (
  `Id_corr_apea` int NOT NULL,
  `Civilite` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `correspondant_apea`
--

INSERT INTO `correspondant_apea` (`Id_corr_apea`, `Civilite`, `Nom`, `Prenom`, `Email`) VALUES
(1, 'Madame', 'Bokolski', 'Nadia', 'n,bokolski@laposte.net'),
(3, 'Madame', 'TEST', 'test', 'test@gmail.com'),
(4, 'Monsieur', 'test', 'test', 'test1@gmail.com'),
(5, 'Madame', 'CEVIK', 'Meryem', 'mcevik6738@gmail.com'),
(6, 'Monsieur', 'jb', 'jb', 'jb@jb.fr'),
(7, 'Monsieur', 'monsieur', 'm', 'm@gmail.com'),
(8, 'Madame', 'micheal', 'jacksun', 'mimi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `correspondant_mairie`
--

CREATE TABLE `correspondant_mairie` (
  `Id_corr_mairie` int NOT NULL,
  `Civilite` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Fonction` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Tel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `correspondant_mairie`
--

INSERT INTO `correspondant_mairie` (`Id_corr_mairie`, `Civilite`, `Nom`, `Prenom`, `Fonction`, `Email`, `Tel`) VALUES
(1, 'Monsieur', 'Bourg', 'Yves', 'Maire-Adjoint chargée de l\'éducation', 'education@rosheim.com', '388492760'),
(6, 'Madame', 'Bourg', 'Yves', 'Maire-Adjoint chargée de l\'éducation', 'education1@rosheim.com', '05055'),
(7, 'Monsieur', 'Bourg', 'Yves', 'Maire-Adjoint chargée de l\'éducation', 'education2@rosheim.com', '0541058'),
(8, 'Madame', 'CEVIK', 'Meryem', 'Maire-Adjoint chargée de l\'éducation', 'mcevik6738@gmail.com', '0740400404'),
(9, 'Monsieur', 'fe', 'dedede', 'Maire-Adjoint chargée de l\'éducation', 'crrcrc@g.com', 'crc'),
(10, 'Madame', 'dion', 'celine', 'Maire-Adjoint chargée de l\'éducation', 'cdion@gmai.com', '06060606'),
(11, 'Monsieur', 'JeSuis', 'Maire', 'Maire-Adjoint chargée de l\'éducation', 'LeMaire@gmail.com', '06060606');

-- --------------------------------------------------------

--
-- Table structure for table `ecole`
--

CREATE TABLE `ecole` (
  `Id_ecole` int NOT NULL,
  `Code_ecole` varchar(50) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `CP` varchar(100) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `Tel` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `type_etab` varchar(100) NOT NULL,
  `Id_corr_apea` int DEFAULT NULL,
  `Id_corr_mairie` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ecole`
--

INSERT INTO `ecole` (`Id_ecole`, `Code_ecole`, `Nom`, `Adresse`, `CP`, `Ville`, `Tel`, `Email`, `type_etab`, `Id_corr_apea`, `Id_corr_mairie`) VALUES
(3, '55151451741544', 'ea', 'bhbuyvbiyb', '67000', 'ede', '606060', 'mcevik6738@gmail.com', 'école élémentaire publique 877', NULL, NULL),
(4, '558ho848', 'eabhjh', '1 rlmd', '67000', 'ede', '606060', 'mcevik6738@gmail.com', 'école élémentaire publique 877nin', NULL, NULL),
(5, '0672868D', 'groupe scolaire du Rosenmeer', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '03 88 48 13 37', 'ce.0672868D@ac-strasbourg.fr', 'ecole elementaire publique', 8, 11),
(6, '0672868D', 'Autre ecole', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '0606060', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', NULL, NULL),
(8, '0672868D', 'blabla', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '02172170', 'ce.0672868D@ac-strasbourg.fr', 'ecole elementaire publique', 3, NULL),
(9, '0672868D', 'Autre ecole v1', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', 6, NULL),
(10, '0672868D', 'Autre ecole v2', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', NULL, NULL),
(11, '0672868DNUn,e', 'Autre ecole v3', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', NULL, 8),
(12, '0672868DNUn,e', 'Autre ecole v4', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', NULL, NULL),
(13, '0672868DNUn,e', 'Autre ecole v5', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire privée', NULL, NULL),
(14, '0672868DNUn,e', 'Autre ecole v6', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', NULL, NULL),
(15, '0672868DNUn,e', 'Autre ecole v7', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire privée', NULL, NULL),
(16, '0672868DNUn,e', 'Autre ecole v8', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire privée', NULL, NULL),
(17, '0672868DNUn,e', 'Autre ecole v9', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', NULL, NULL),
(18, '0672868DNUn,e', 'Autre ecole v10', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', NULL, NULL),
(19, '0672868DNUn,e', 'Autre ecole v11', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', NULL, NULL),
(20, '0672868DNUn,e', 'Autre ecole v12', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire privée', NULL, NULL),
(21, '0672868DNUn,e', 'Autre ecole v13', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire privée', NULL, NULL),
(22, '0672868DNUn,e', 'Autre ecole v14', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école élémentaire publique', NULL, NULL),
(23, '0672', 'Autre ecole v15', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école maternelle privée', 7, 10),
(24, '0672', 'Autre ecole v16', '11 rue du modification', '67100', 'Strasbourg', '2502', 'ce.0672868D@ac-strasbourg.fr', 'école maternelle privée', NULL, NULL),
(25, '55151451741544', 'ecole v17', '11 rue de l\'Eglise', '67560', 'ROSHEIM', '084880', 'ce.0672868D@ac-strasbourg.fr', 'école maternelle publique', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `historique`
--

CREATE TABLE `historique` (
  `Id_historique` int NOT NULL,
  `Entite` varchar(100) NOT NULL,
  `Attribut` varchar(100) NOT NULL,
  `Action` text NOT NULL,
  `Ancienne_Valeur` text NOT NULL,
  `Nouvelle_Valeur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Id_ecole` int NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Id_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `historique`
--

INSERT INTO `historique` (`Id_historique`, `Entite`, `Attribut`, `Action`, `Ancienne_Valeur`, `Nouvelle_Valeur`, `Id_ecole`, `Date`, `Id_utilisateur`) VALUES
(39, 'ecole', 'tout', 'creation', '', 'tout', 5, '2024-03-23 22:53:18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_utilisateur` int NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Email` text NOT NULL,
  `Mot_de_passe` text NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `Nom`, `Prenom`, `Email`, `Mot_de_passe`, `Role`) VALUES
(1, 'Hatt', 'Laurent', 'hattlaurent@gmail.com', 'fa032d703f78ef14056419a30ef87a67', 'secretaire general'),
(3, 'test', 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'referent local'),
(4, 'Cevik', 'Meryem', 'mcevik@gmail.com', 'dcbf400d8af9a32605808dd961bd65e4', 'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur_ecole`
--

CREATE TABLE `utilisateur_ecole` (
  `Id_Utilisateur_Ecole` int NOT NULL,
  `Id_ecole` int NOT NULL,
  `Id_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`Id_classe`),
  ADD KEY `Id_ecole` (`Id_ecole`);

--
-- Indexes for table `correspondant_apea`
--
ALTER TABLE `correspondant_apea`
  ADD PRIMARY KEY (`Id_corr_apea`);

--
-- Indexes for table `correspondant_mairie`
--
ALTER TABLE `correspondant_mairie`
  ADD PRIMARY KEY (`Id_corr_mairie`);

--
-- Indexes for table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`Id_ecole`),
  ADD KEY `Id_corr_apea` (`Id_corr_apea`),
  ADD KEY `Id_corr_mairie` (`Id_corr_mairie`);

--
-- Indexes for table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`Id_historique`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_utilisateur`);

--
-- Indexes for table `utilisateur_ecole`
--
ALTER TABLE `utilisateur_ecole`
  ADD PRIMARY KEY (`Id_Utilisateur_Ecole`),
  ADD KEY `Id_ecole` (`Id_ecole`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `Id_classe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `correspondant_apea`
--
ALTER TABLE `correspondant_apea`
  MODIFY `Id_corr_apea` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `correspondant_mairie`
--
ALTER TABLE `correspondant_mairie`
  MODIFY `Id_corr_mairie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `Id_ecole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `historique`
--
ALTER TABLE `historique`
  MODIFY `Id_historique` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateur_ecole`
--
ALTER TABLE `utilisateur_ecole`
  MODIFY `Id_Utilisateur_Ecole` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `Id_ecole` FOREIGN KEY (`Id_ecole`) REFERENCES `ecole` (`Id_ecole`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ecole`
--
ALTER TABLE `ecole`
  ADD CONSTRAINT `Id_corr_apea` FOREIGN KEY (`Id_corr_apea`) REFERENCES `correspondant_apea` (`Id_corr_apea`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Id_corr_mairie` FOREIGN KEY (`Id_corr_mairie`) REFERENCES `correspondant_mairie` (`Id_corr_mairie`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `Id_utilisateur` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `utilisateur_ecole`
--
ALTER TABLE `utilisateur_ecole`
  ADD CONSTRAINT `utilisateur_ecole_ibfk_1` FOREIGN KEY (`Id_ecole`) REFERENCES `ecole` (`Id_ecole`),
  ADD CONSTRAINT `utilisateur_ecole_ibfk_2` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
