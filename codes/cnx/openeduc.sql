-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2024 at 03:41 PM
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
  `anneeScolaire` varchar(10) NOT NULL,
  `Id_ecole` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `correspondant_apea`
--

CREATE TABLE `correspondant_apea` (
  ` Id_corr_apea` int NOT NULL,
  `Civilite` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `Tel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ecole`
--

CREATE TABLE `ecole` (
  `Id_ecole` int NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `CP` varchar(100) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `Tel` int NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Id_type_etab` int NOT NULL,
  `Id_corr_apea` int NOT NULL,
  `Id_corr_mairie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enregistrement`
--

CREATE TABLE `enregistrement` (
  `Id_enregistrement` int NOT NULL,
  `Id_utilisateur` int NOT NULL,
  `Id_historique` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `Nouvelle_Valeur` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_d_etablissement`
--

CREATE TABLE `type_d_etablissement` (
  `Id_type_etab` int NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Statut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  ADD PRIMARY KEY (` Id_corr_apea`);

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
  ADD KEY `Id_type_etab` (`Id_type_etab`),
  ADD KEY `Id_corr_apea` (`Id_corr_apea`),
  ADD KEY `Id_corr_mairie` (`Id_corr_mairie`);

--
-- Indexes for table `enregistrement`
--
ALTER TABLE `enregistrement`
  ADD PRIMARY KEY (`Id_enregistrement`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`),
  ADD KEY `Id_historique` (`Id_historique`);

--
-- Indexes for table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`Id_historique`);

--
-- Indexes for table `type_d_etablissement`
--
ALTER TABLE `type_d_etablissement`
  ADD PRIMARY KEY (`Id_type_etab`);

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
  MODIFY `Id_classe` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `correspondant_apea`
--
ALTER TABLE `correspondant_apea`
  MODIFY ` Id_corr_apea` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `correspondant_mairie`
--
ALTER TABLE `correspondant_mairie`
  MODIFY `Id_corr_mairie` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `Id_ecole` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enregistrement`
--
ALTER TABLE `enregistrement`
  MODIFY `Id_enregistrement` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historique`
--
ALTER TABLE `historique`
  MODIFY `Id_historique` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_d_etablissement`
--
ALTER TABLE `type_d_etablissement`
  MODIFY `Id_type_etab` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_utilisateur` int NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `Id_corr_mairie` FOREIGN KEY (`Id_corr_mairie`) REFERENCES `correspondant_mairie` (`Id_corr_mairie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Id_type_etab` FOREIGN KEY (`Id_type_etab`) REFERENCES `type_d_etablissement` (`Id_type_etab`);

--
-- Constraints for table `enregistrement`
--
ALTER TABLE `enregistrement`
  ADD CONSTRAINT `enregistrement_ibfk_1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`),
  ADD CONSTRAINT `enregistrement_ibfk_2` FOREIGN KEY (`Id_historique`) REFERENCES `historique` (`Id_historique`);

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
