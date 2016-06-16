-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Juin 2016 à 11:28
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `finalproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `fp_avatar`
--

CREATE TABLE `fp_avatar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `size` int(10) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fp_avatar`
--

INSERT INTO `fp_avatar` (`id`, `user_id`, `name`, `img_path`, `size`, `type`) VALUES
(1, 0, 'profil-picture.jpg', 'img/profil-picture.jpg', 10, 'jpg'),
(14, 1, '__Ra575ffe524bb05.jpg', 'img/__Ra575ffe524bb05.jpg', 90440, '.jpg'),
(15, 1, '1251576004d6a3022.jpg', 'img/1251576004d6a3022.jpg', 39014, '.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `fp_characters`
--

CREATE TABLE `fp_characters` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lvl` int(3) NOT NULL,
  `strength` int(3) NOT NULL,
  `dexterity` int(3) NOT NULL,
  `spirit` int(3) NOT NULL,
  `social` int(3) NOT NULL,
  `page_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `gender` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fp_equipment`
--

CREATE TABLE `fp_equipment` (
  `id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fp_history`
--

CREATE TABLE `fp_history` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `img_id` int(11) NOT NULL,
  `choice1` varchar(255) NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `choice4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fp_img`
--

CREATE TABLE `fp_img` (
  `id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fp_inventory`
--

CREATE TABLE `fp_inventory` (
  `id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `amount` int(2) NOT NULL,
  `max_slot` int(2) NOT NULL,
  `gold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fp_objects`
--

CREATE TABLE `fp_objects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dice` int(2) NOT NULL,
  `damage` int(4) NOT NULL,
  `defense` int(4) NOT NULL,
  `value` int(4) NOT NULL,
  `weight` int(4) NOT NULL,
  `heal` int(4) NOT NULL,
  `energy` int(4) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fp_objects`
--

INSERT INTO `fp_objects` (`id`, `name`, `dice`, `damage`, `defense`, `value`, `weight`, `heal`, `energy`, `img_id`) VALUES
(1, 'Katana', 1, 10, 0, 35, 3, 0, 0, 0),
(2, 'Daguer', 1, 4, 0, 2, 1, 0, 0, 0),
(3, 'TwoHandSword', 2, 6, 0, 50, 4, 0, 0, 0),
(4, 'ChainsawAxe', 3, 6, 0, 80, 5, 0, 0, 0),
(5, 'Avenger', 2, 4, 0, 40, 3, 0, 0, 0),
(6, 'Magnum', 2, 6, 0, 50, 4, 0, 0, 0),
(7, 'Predator', 2, 6, 0, 50, 4, 0, 0, 0),
(8, 'Vindicator', 2, 6, 0, 50, 3, 0, 0, 0),
(9, 'Vulcan', 2, 4, 0, 40, 3, 0, 0, 0),
(10, 'Spike', 2, 6, 0, 50, 4, 0, 0, 0),
(11, 'SparkRifle', 2, 8, 0, 60, 4, 0, 0, 0),
(12, 'ClusterRifle', 2, 10, 0, 80, 5, 0, 0, 0),
(13, 'AlienRifle', 2, 8, 0, 80, 3, 0, 0, 0),
(14, 'AlienPlasma', 4, 6, 0, 150, 3, 0, 0, 0),
(15, 'MiniGun', 2, 12, 0, 100, 25, 0, 0, 0),
(16, 'Serum', 0, 0, 0, 100, 1, 15, 0, 0),
(17, 'InformaticPart', 0, 0, 0, 5, 0, 0, 0, 0),
(18, 'Meat', 0, 0, 0, 5, 0, 0, 0, 0),
(19, 'ArmorPart', 0, 0, 0, 100, 1, 0, 0, 0),
(20, 'MecaPart', 0, 0, 0, 5, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fp_pnj`
--

CREATE TABLE `fp_pnj` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `exp` int(11) NOT NULL,
  `strength` int(3) NOT NULL,
  `dexterity` int(3) NOT NULL,
  `spirit` int(3) NOT NULL,
  `social` int(3) NOT NULL,
  `attack` int(2) NOT NULL,
  `img_id` int(11) NOT NULL,
  `meet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fp_pnj`
--

INSERT INTO `fp_pnj` (`id`, `name`, `exp`, `strength`, `dexterity`, `spirit`, `social`, `attack`, `img_id`, `meet`) VALUES
(1, 'Drone', 1, 10, 16, 10, 10, 3, 0, 0),
(2, 'Traqueur', 2, 14, 14, 10, 10, 3, 0, 0),
(3, 'FantassinAlien', 3, 16, 12, 10, 9, 5, 0, 0),
(4, 'Robot', 6, 23, 14, 6, 6, 9, 0, 0),
(5, 'Renegat', 7, 29, 8, 12, 0, 12, 0, 0),
(6, 'Ravageur', 16, 30, 9, 1, 1, 15, 0, 0),
(7, 'Mara', 0, 12, 18, 12, 14, 5, 0, 0),
(8, 'Commandant', 0, 14, 16, 14, 14, 0, 0, 0),
(9, 'Docteur', 0, 10, 14, 14, 18, 0, 0, 0),
(10, 'Armurier', 0, 18, 14, 10, 10, 0, 0, 0),
(11, 'BossStart', 7, 12, 14, 14, 12, 8, 0, 0),
(12, 'BossFinal', 13, 22, 18, 18, 20, 12, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fp_users`
--

CREATE TABLE `fp_users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `last_connexion` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fp_users`
--

INSERT INTO `fp_users` (`id`, `pseudo`, `email`, `lastname`, `firstname`, `password`, `avatar`, `token`, `last_connexion`, `ip`, `role`, `created_at`, `modified_at`) VALUES
(1, 'Alrack', 'sylnadre@gmail.com', 'Rougee', 'Thomas', '$2y$10$dT8Ya0R917HwOY540Ra9YOmomu4xvmEiljPTYVgE7naOuZU7Lmqqy', 15, 'vC8IxuRcgzqy2yc6nxNrWhrW8WzqUlZiAMqDJf9p-OvbnFuo5F6UJjrxO4PcnJMCL4Yf2gD2FZCBF92R', '2016-06-15 10:01:02', '::1', 'user', '2016-06-10 15:10:34', '2016-06-15 10:01:02');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `fp_avatar`
--
ALTER TABLE `fp_avatar`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fp_characters`
--
ALTER TABLE `fp_characters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fp_equipment`
--
ALTER TABLE `fp_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fp_history`
--
ALTER TABLE `fp_history`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fp_img`
--
ALTER TABLE `fp_img`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fp_inventory`
--
ALTER TABLE `fp_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fp_objects`
--
ALTER TABLE `fp_objects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fp_pnj`
--
ALTER TABLE `fp_pnj`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fp_users`
--
ALTER TABLE `fp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `fp_avatar`
--
ALTER TABLE `fp_avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `fp_characters`
--
ALTER TABLE `fp_characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fp_equipment`
--
ALTER TABLE `fp_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fp_history`
--
ALTER TABLE `fp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fp_img`
--
ALTER TABLE `fp_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fp_inventory`
--
ALTER TABLE `fp_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fp_objects`
--
ALTER TABLE `fp_objects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `fp_pnj`
--
ALTER TABLE `fp_pnj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `fp_users`
--
ALTER TABLE `fp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
