-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 déc. 2024 à 17:25
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my_site_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `activity_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `saison` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`activity_id`, `name`, `description`, `saison`) VALUES
('BAS004', 'BASEBALL', 'Le baseball est un sport collectif où deux équipes de neuf joueurs s\'affrontent sur un terrain en forme de diamant. L\'objectif est de frapper une balle lancée par l\'adversaire avec une batte et de courir autour de quatre bases pour marquer des points. Ce sport combine stratégie, puissance et précision, et est très populaire en Amérique du Nord et au Japon.', 'Printemps, Été'),
('FOO005', 'FOOTING', 'Le footing est une activité physique consistant à courir à un rythme modéré sur une certaine distance ou durée. Pratiqué principalement en extérieur, il est accessible à tous, sans besoin d\'équipement complexe. C\'est un excellent moyen d\'améliorer sa condition physique, de renforcer le cœur et de réduire le stress.', 'Toute l\'année'),
('HOC002', 'HOCKEY', 'Le hockey est un sport collectif où deux équipes s\'affrontent pour marquer des buts en envoyant une balle ou un palet dans le but adverse à l\'aide de bâtons. Il se joue sur une patinoire (hockey sur glace) ou sur un terrain (hockey sur gazon). Ce sport exige rapidité, agilité et une coordination parfaite entre les joueurs.', 'Hiver'),
('KAY001', 'KAYAK', 'Le kayak est une petite embarcation légère propulsée par une pagaie double, utilisée principalement pour la navigation sur des rivières, des lacs ou en mer. Il existe différents types de kayaks, adaptés à la randonnée, à la course ou aux eaux vives. Conçu pour être stable et maniable, le kayak est souvent fabriqué en matériaux légers comme le plastique ou la fibre de carbone.', 'Printemps, Été'),
('SOC003', 'SOCCER ', 'Le soccer, ou football, est un sport collectif où deux équipes de 11 joueurs s\'affrontent pour marquer des buts en envoyant un ballon dans le but adverse. Le jeu se pratique sur un terrain rectangulaire, et les joueurs utilisent principalement leurs pieds pour contrôler et passer le ballon. C\'est l\'un des sports les plus populaires au monde, apprécié pour sa simplicité et son aspect dynamique.', 'Printemps, Été, Automne'),
('TEN006', 'TENNIS', 'Le tennis est un sport de raquette joué entre deux joueurs (simple) ou deux équipes de deux joueurs (double) qui s\'affrontent pour envoyer une balle au-dessus d\'un filet, dans le camp adverse. Le but est de marquer des points en faisant rebondir la balle dans les limites du terrain de l\'adversaire. Ce sport demande agilité, précision et endurance.', 'Printemps, Été, Automne');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `client_id` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_id`, `firstname`, `lastname`, `sex`, `age`, `email`) VALUES
('bravewomen', 'guiylaine', 'legrand', 'femme', 30, 'guiylaine@gmail.com'),
('frontendDev', 'aymane', 'smini', 'homme', 24, 'smini@gmail.com'),
('membreFeminin', 'assia', 'rabahi', 'femme', 24, 'rabahi@gmail'),
('membreFeminin1', 'thinhinane', 'ainas', 'femme', 24, 'ainas@gmail.com'),
('MM14', 'mehdi', 'masmar', 'homme', 24, 'mehdi@gmail.com'),
('specialone', 'alain', 'Desjardins', 'homme', 19, 'alain.desjardins@gmail.com'),
('thegoodplayer', 'abdelkrim', 'salhi', 'homme', 23, 'abdelk.salhi15@gmail.com'),
('utaku', 'mohammed', 'moujtahid', 'homme', 24, 'moujtahid@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `subscription`
--

CREATE TABLE `subscription` (
  `idClient` varchar(20) NOT NULL,
  `idActivity` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subscription`
--

INSERT INTO `subscription` (`idClient`, `idActivity`, `date`) VALUES
('thegoodplayer', 'HOC002', '2024-12-06'),
('thegoodplayer', 'SOC003', '2024-12-13'),
('MM14', 'TEN006', '2024-12-25'),
('MM14', 'SOC003', '2024-12-06'),
('utaku', 'KAY001', '2024-12-31'),
('utaku', 'BAS004', '2024-12-27'),
('membreFeminin', 'FOO005', '2024-12-17'),
('membreFeminin1', 'HOC002', '2024-12-28'),
('frontendDev', 'FOO005', '2024-12-26'),
('frontendDev', 'SOC003', '2024-12-11'),
('membreFeminin', 'TEN006', '2024-12-18'),
('membreFeminin1', 'TEN006', '2024-12-28'),
('thegoodplayer', 'FOO005', '2024-12-10'),
('bravewomen', 'HOC002', '2024-12-12'),
('specialone', 'FOO005', '2024-12-30'),
('bravewomen', 'FOO005', '2024-12-19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
