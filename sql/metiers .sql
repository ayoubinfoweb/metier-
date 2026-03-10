-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2026 at 04:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metiers`
--

-- --------------------------------------------------------

--
-- Table structure for table `artisans`
--

CREATE TABLE `artisans` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `metier_id` int(11) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artisans`
--

INSERT INTO `artisans` (`id`, `utilisateur_id`, `metier_id`, `telephone`, `adresse`, `ville`) VALUES
(2, 7, 1, '06559895868', 'hay karima dar chaimae fir3awn1', 'temara'),
(3, 8, 5, '60558822', 'hay karima dar chaimae fir3awn', 'temara'),
(4, 9, 28, '0655887799', 'hay karima dar chaimae fir3awn', 'gargarat');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `artisan_id` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL CHECK (`note` between 1 and 5),
  `commentaire` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`, `image`) VALUES
(1, 'Bâtiment', ''),
(2, 'Réparation & Maintenance', ''),
(3, 'Artisanat traditionnel', ''),
(4, 'Décoration & Design', ''),
(5, 'Automobile', ''),
(6, 'Beauté & Services personnels', ''),
(7, 'Services à domicile', ''),
(8, 'All categories', '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sujet` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_envoi` datetime DEFAULT current_timestamp(),
  `repondu` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demandes`
--

CREATE TABLE `demandes` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date_demande` date NOT NULL,
  `statut` enum('en attente','acceptée','refusée','terminée') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demandes`
--

INSERT INTO `demandes` (`id`, `client_id`, `service_id`, `date_demande`, `statut`) VALUES
(3, 10, 2, '2026-03-07', 'en attente'),
(4, 10, 2, '2026-03-07', 'en attente'),
(5, 10, 2, '2026-03-07', 'en attente'),
(6, 10, 2, '2026-03-09', 'en attente'),
(7, 10, 4, '2026-03-10', 'en attente');

-- --------------------------------------------------------

--
-- Table structure for table `metiers`
--

CREATE TABLE `metiers` (
  `id` int(11) NOT NULL,
  `nom_metier` varchar(100) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metiers`
--

INSERT INTO `metiers` (`id`, `nom_metier`, `categorie_id`) VALUES
(1, 'Maçon', 1),
(2, 'Plombier', 1),
(3, 'Électricien', 1),
(4, 'Peintre', 1),
(5, 'Carreleur', 1),
(6, 'Menuisier aluminium', 1),
(7, 'Menuisier bois', 1),
(8, 'Réparateur électroménager', 2),
(9, 'Réparateur climatisation', 2),
(10, 'Technicien informatique', 2),
(11, 'Réparateur téléphone', 2),
(12, 'Mécanicien auto', 2),
(13, 'Serrurier', 2),
(14, 'Ferronnier', 3),
(15, 'Tapis traditionnel', 3),
(16, 'Zellige', 3),
(17, 'Potier', 3),
(18, 'Céramiste', 3),
(19, 'Tailleur traditionnel', 3),
(20, 'Décorateur intérieur', 4),
(21, 'Designer meuble', 4),
(22, 'Plâtrier décoratif', 4),
(23, 'Installateur papier peint', 4),
(24, 'Électricien auto', 5),
(25, 'Tôlier', 5),
(26, 'Peintre auto', 5),
(27, 'Laveur voiture', 5),
(28, 'Coiffeur', 6),
(29, 'Esthéticienne', 6),
(30, 'Maquilleuse', 6),
(31, 'Couturière', 6),
(32, 'Femme de ménage', 7),
(33, 'Jardinier', 7),
(34, 'Gardien', 7),
(35, 'Agent de nettoyage', 7);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `artisan_id` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `artisan_id`, `titre`, `description`, `prix`, `image`) VALUES
(2, 2, 'macon', '???? Petit texte pour ton site (service maçon)\r\n\r\nJe suis maçon professionnel spécialisé dans la construction de maisons, murs et fondations. Je garantis un travail solide, précis et respectant les délais.\r\n\r\nSi tu veux, je peux aussi te donner :\r\n\r\n✅ une description courte\r\n\r\n✅ une description longue\r\n\r\n✅ les services détaillés (fondation, dallage, rénovation…)\r\n\r\nTu veux pour ton site ? ????', 250.00, 'images/arisants-img/download.jpg'),
(3, 3, 'preperer des chouse ', 'Si tu veux, je peux te faire une version avec 4 cartes sur la première ligne et 2 cartes plus grandes sur la deuxième, exactement comme ton dessin ----- / -------- pour que ça ressemble visuellement à ce que tu voulais.\r\n\r\nVeux que je fasse ça ?\r\n\r\nmerier presenter\r\n\r\nAh, tu veux que je te fasse un exemple de présentation des métiers/services avec le code Bootstrap, comme sur ton site, avec des cartes bien organisées. ????\r\n\r\nVoici un modèle clair et prêt à l’emploi :', 500.00, 'images/arisants-img/download.jpg'),
(4, 4, 'coifeur', 'Ah ???? je comprends mieux maintenant ! Tu parles juste du texte “description” en général, pas du code ou de la programmation.\r\n\r\nDonc “texte” ici signifie simplement un contenu écrit qui explique quelque chose. Par exemple :\r\n\r\nUne description d’un artisan : “Ali est un coiffeur spécialisé dans les coupes modernes et les colorations.”\r\n\r\nUne description d’un service : “Ce service inclut lavage, coupe et coiffage pour hommes et femmes.”\r\n\r\n???? Différents types de texte « description »\r\n\r\nDescriptif court : 1 ou 2 phrases, résumé rapide.\r\n\r\nDescriptif long : plusieurs phrases ou paragraphes, plus détaillé.\r\n\r\nBullet points / liste : pour expliquer les points clés ou les étapes d’un service.', 20.00, 'images/arisants-img/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('client','artisan','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `role`) VALUES
(6, 'ayoub', 'mansouri', 'ayoub.artisan@gmail.com', '$2y$10$N7PpaSpSZ2Sx3jTSeB98.eQWuoFGh9ynOnFDdb9WDAh51rvglhNLm', 'artisan'),
(7, 'kirim', 'mokaram', 'karim.artisan@gmail.com', '$2y$10$3qLVfkBy.xzSgDAGadF3yuLVO6kBf1Eh3OVoUJakpxonraondpHVe', 'artisan'),
(8, 'mohameed', 'mansouri', 'mohamed.artisan@gmail.com', '$2y$10$CM/WaKs.oVWcOEV.MFZcluQiPorlCgwV6nRLCB4C1jimxQihjL2oG', 'artisan'),
(9, 'chaimae', 'mansouri', 'chaimae.artisan@gmail.com', '$2y$10$Kdxm0pkpgpEFMI0LH5Cpd.JoiXFrkhGJED/XEy1856aNQUPG3u./K', 'artisan'),
(10, 'karim', 'sa3id', 'karimsa3im.client@gmail.com', '$2y$10$pH4jxPGhpWhxBeLmWr96I.v5HWZKRjjBUbSIT9QOa1VzLzYgINy/6', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artisans`
--
ALTER TABLE `artisans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `metier_id` (`metier_id`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `artisan_id` (`artisan_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `metiers`
--
ALTER TABLE `metiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artisans`
--
ALTER TABLE `artisans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metiers`
--
ALTER TABLE `metiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artisans`
--
ALTER TABLE `artisans`
  ADD CONSTRAINT `artisans_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `artisans_ibfk_2` FOREIGN KEY (`metier_id`) REFERENCES `metiers` (`id`);

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`);

--
-- Constraints for table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `demandes_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `metiers`
--
ALTER TABLE `metiers`
  ADD CONSTRAINT `metiers_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
