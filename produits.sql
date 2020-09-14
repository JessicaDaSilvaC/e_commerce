-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 août 2020 à 10:26
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `produits`
--

-- --------------------------------------------------------

--
-- Structure de la table `tous_les_produit`
--

CREATE TABLE `tous_les_produit` (
  `id_produit` int(11) NOT NULL,
  `adresse_achat` varchar(80) NOT NULL,
  `nom_produit` varchar(80) NOT NULL,
  `reference` varchar(80) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `date_achat` date NOT NULL,
  `date_fin_garantie` date NOT NULL,
  `prix` varchar(100) NOT NULL,
  `conseil_entretiens` text NOT NULL,
  `ticket_achat` text DEFAULT NULL,
  `manuel_utilisation` text DEFAULT NULL,
  `url_achat` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tous_les_produit`
--
ALTER TABLE `tous_les_produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tous_les_produit`
--
ALTER TABLE `tous_les_produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
