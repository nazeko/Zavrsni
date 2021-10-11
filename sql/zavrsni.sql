-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2021 at 07:45 PM
-- Server version: 8.0.26-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zavrsni`
--
CREATE DATABASE IF NOT EXISTS `zavrsni` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `zavrsni`;

-- --------------------------------------------------------

--
-- Table structure for table `drzave`
--

DROP TABLE IF EXISTS `drzave`;
CREATE TABLE `drzave` (
  `id` int NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `igraci`
--

DROP TABLE IF EXISTS `igraci`;
CREATE TABLE `igraci` (
  `ime` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pozicija` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` datetime NOT NULL,
  `visina` int NOT NULL,
  `tezina` int NOT NULL,
  `noga` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klubovi`
--

DROP TABLE IF EXISTS `klubovi`;
CREATE TABLE `klubovi` (
  `id` int NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lige`
--

DROP TABLE IF EXISTS `lige`;
CREATE TABLE `lige` (
  `id` int NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sazetak`
--

DROP TABLE IF EXISTS `sazetak`;
CREATE TABLE `sazetak` (
  `id` int NOT NULL,
  `utakmica_id` int NOT NULL,
  `igrac_id` int NOT NULL,
  `minuta` int NOT NULL,
  `rezultat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dogadaj` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tekst` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistike`
--

DROP TABLE IF EXISTS `statistike`;
CREATE TABLE `statistike` (
  `id` int NOT NULL,
  `utakmica_id` int NOT NULL,
  `klub_id` int NOT NULL,
  `udarci_u_metu` int NOT NULL,
  `udarci_izvan_mete` int NOT NULL,
  `blokirani_udarci` int NOT NULL,
  `posjed_lopte` int NOT NULL,
  `udarci_iz_kornera` int NOT NULL,
  `zaleda` int NOT NULL,
  `prekrsaji` int NOT NULL,
  `ubacaji` int NOT NULL,
  `zuti_kartoni` int NOT NULL,
  `kontre` int NOT NULL,
  `obrane_golmana` int NOT NULL,
  `udarci_s_gola` int NOT NULL,
  `ljecenje` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utakmice`
--

DROP TABLE IF EXISTS `utakmice`;
CREATE TABLE `utakmice` (
  `id` int NOT NULL,
  `datum` datetime NOT NULL,
  `sudac` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `stadion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gledatelji` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drzave`
--
ALTER TABLE `drzave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `igraci`
--
ALTER TABLE `igraci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klubovi`
--
ALTER TABLE `klubovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lige`
--
ALTER TABLE `lige`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sazetak`
--
ALTER TABLE `sazetak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistike`
--
ALTER TABLE `statistike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utakmice`
--
ALTER TABLE `utakmice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drzave`
--
ALTER TABLE `drzave`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `igraci`
--
ALTER TABLE `igraci`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klubovi`
--
ALTER TABLE `klubovi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lige`
--
ALTER TABLE `lige`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sazetak`
--
ALTER TABLE `sazetak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistike`
--
ALTER TABLE `statistike`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utakmice`
--
ALTER TABLE `utakmice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
