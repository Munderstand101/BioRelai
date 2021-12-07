-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3305
-- Generation Time: Jeu 16 Septembre 2021 à 12:28
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biorelai_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherents`
--

CREATE TABLE `adherents` (
  `idAdherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adherents`
--

INSERT INTO `adherents` (`idAdherent`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`idCategorie`, `nomCategorie`) VALUES
(1, 'Légumes'),
(2, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `idCommandes` int(11) NOT NULL,
  `dateCommandes` date NOT NULL,
  `idVente` int(11) NOT NULL,
  `idAdherent` int(11) NOT NULL,
  `statut` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`idCommandes`, `dateCommandes`, `idVente`, `idAdherent`, `statut`) VALUES
(45, '2021-12-07', 1, 1, 'valide'),
(46, '2021-12-07', 1, 1, 'valide'),
(49, '2021-12-07', 1, 1, 'valide');

-- --------------------------------------------------------

--
-- Table structure for table `lignescommandes`
--

CREATE TABLE `lignescommandes` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lignescommandes`
--

INSERT INTO `lignescommandes` (`idCommande`, `idProduit`, `quantite`) VALUES
(45, 4, '4'),
(45, 6, '5'),
(46, 1, '5'),
(46, 2, '5'),
(49, 3, '25'),
(49, 5, '425'),
(49, 7, '524');

-- --------------------------------------------------------

--
-- Table structure for table `producteur`
--

CREATE TABLE `producteur` (
  `idProducteur` int(11) NOT NULL,
  `adresseProducteur` varchar(50) NOT NULL,
  `communeProducteur` varchar(40) NOT NULL,
  `codePostalProducteur` varchar(5) NOT NULL,
  `descriptifProducteur` longtext NOT NULL,
  `photoProducteur` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producteur`
--

INSERT INTO `producteur` (`idProducteur`, `adresseProducteur`, `communeProducteur`, `codePostalProducteur`, `descriptifProducteur`, `photoProducteur`) VALUES
(1, 'ghfg', 'hfgh', 'hfghf', 'ghfgh', 'fgh'),
(2, 'test112', 'Bordeaux', '33000', 'MR PICKLES\r\n\r\ndesc : \r\n- fff\r\n- fff\r\n- fff\r\n- fff\r\n\r\nfhfghfg', 'https://i.cdn.turner.com/adultswim/big/img/2018/04/18/MrPicklesS02_fbsearchTn.jpg'),
(3, '3 avenue du producteur', 'Bordeaux', '33310', 'Producteur de fruits et legumes a bordeaux', 'https://lh3.googleusercontent.com/proxy/8aXH8Za5Jb0_0hXY1qKlHmtpy5FaTAJJiURiP3JhrGTTJCPvVWEmjdGPVGdpd8VK6Xhy-THGmWaNeAx9FtFxQOvh-vcDmvfuuRIjwTj7aNARei4AahQD8dBnlg');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(50) NOT NULL,
  `descriptifProduit` longtext NOT NULL,
  `photoProduit` varchar(225) NOT NULL,
  `idProducteur` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `descriptifProduit`, `photoProduit`, `idProducteur`, `idCategorie`) VALUES
(1, 'Pomme de terre', 'Pomme de terre', 'https://medias.pourlascience.fr/api/v1/images/view/5a82ae408fe56f4a6053d87d/width_300/image.jpg', 2, 1),
(2, 'Pomme ', 'Pomme ', 'https://lactualite.com/wp-content/uploads/2011/06/une-pomme-par-jour.jpg', 2, 2),
(3, 'Tomate', 'Tomate ...', 'Tomate', 2, 1),
(4, 'Courgette', 'Vert', './upload/produits/1638845356Gol_D._Roger_Portrait.png', 3, 1),
(5, 'Banane', 'Jaune', './upload/produits/1638847064banane.jpg', 3, 2),
(6, 'Betterave', 'Rouge', './upload/produits/1638847078betterave.png', 3, 1),
(7, 'Petit poids', 'vert', './upload/produits/1638847093ppoids.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proposer`
--

CREATE TABLE `proposer` (
  `idVente` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `unite` varchar(10) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposer`
--

INSERT INTO `proposer` (`idVente`, `idProduit`, `unite`, `quantite`, `prix`) VALUES
(1, 1, '1 kilo', 50, 1.81),
(1, 2, '1 kilo', 80, 1.2),
(2, 1, '555', 555, 55);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(128) NOT NULL,
  `statut` varchar(15) NOT NULL,
  `nomUtilisateur` varchar(40) NOT NULL,
  `prenomUtilisateur` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `mail`, `mdp`, `statut`, `nomUtilisateur`, `prenomUtilisateur`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'adherents', 'Campmas', 'Pierre'),
(2, 'test@producteurs.bio', '098f6bcd4621d373cade4e832627b4f6', 'producteurs', 'test112', 'test112'),
(3, 'test1', '098f6bcd4621d373cade4e832627b4f6', 'producteurs', 'producteur', 'producteur'),
(4, 'adherents@admin.com', '87c5ffa2157fb3cef54271390a8fa23f', 'visiteurs', 'fhfh', 'fhfh');

-- --------------------------------------------------------

--
-- Table structure for table `ventes`
--

CREATE TABLE `ventes` (
  `idVente` int(11) NOT NULL,
  `dateVente` date NOT NULL,
  `dateDebutProd` date NOT NULL,
  `dateFinProd` date NOT NULL,
  `dateFinCli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ventes`
--

INSERT INTO `ventes` (`idVente`, `dateVente`, `dateDebutProd`, `dateFinProd`, `dateFinCli`) VALUES
(1, '2021-11-16', '2021-11-01', '2021-11-30', '2021-11-30'),
(2, '2021-11-10', '2021-11-09', '2021-11-23', '2021-11-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adherents`
--
ALTER TABLE `adherents`
  ADD PRIMARY KEY (`idAdherent`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`idCommandes`),
  ADD KEY `idAdherent` (`idAdherent`),
  ADD KEY `idVente` (`idVente`);

--
-- Indexes for table `lignescommandes`
--
ALTER TABLE `lignescommandes`
  ADD PRIMARY KEY (`idCommande`,`idProduit`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Indexes for table `producteur`
--
ALTER TABLE `producteur`
  ADD PRIMARY KEY (`idProducteur`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idProducteur` (`idProducteur`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Indexes for table `proposer`
--
ALTER TABLE `proposer`
  ADD PRIMARY KEY (`idVente`,`idProduit`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`,`mail`);

--
-- Indexes for table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`idVente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adherents`
--
ALTER TABLE `adherents`
  MODIFY `idAdherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `idCommandes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `producteur`
--
ALTER TABLE `producteur`
  MODIFY `idProducteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `idVente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adherents`
--
ALTER TABLE `adherents`
  ADD CONSTRAINT `Adherents_ibfk_1` FOREIGN KEY (`idAdherent`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `Commandes_ibfk_1` FOREIGN KEY (`idAdherent`) REFERENCES `adherents` (`idAdherent`),
  ADD CONSTRAINT `Commandes_ibfk_2` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVente`);

--
-- Constraints for table `lignescommandes`
--
ALTER TABLE `lignescommandes`
  ADD CONSTRAINT `lignescommandes_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commandes` (`idCommandes`),
  ADD CONSTRAINT `lignescommandes_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`);

--
-- Constraints for table `producteur`
--
ALTER TABLE `producteur`
  ADD CONSTRAINT `Producteur_ibfk_1` FOREIGN KEY (`idProducteur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`),
  ADD CONSTRAINT `produits_ibfk_3` FOREIGN KEY (`idProducteur`) REFERENCES `producteur` (`idProducteur`);

--
-- Constraints for table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `proposer_ibfk_1` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVente`),
  ADD CONSTRAINT `proposer_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
