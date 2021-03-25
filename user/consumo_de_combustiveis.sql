-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 04:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consumo_de_combustiveis`
--

-- --------------------------------------------------------

--
-- Table structure for table `abastecimentos`
--

CREATE TABLE `abastecimentos` (
  `id_abastecimentos` int(11) NOT NULL,
  `adata` date NOT NULL,
  `maquina` int(10) NOT NULL,
  `obra` int(11) DEFAULT NULL,
  `combustivel` int(11) NOT NULL,
  `litros` decimal(10,2) DEFAULT NULL,
  `km` decimal(10,2) DEFAULT NULL,
  `horas` decimal(10,2) DEFAULT NULL,
  `assinatura` varchar(50) DEFAULT NULL,
  `reciclagem` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abastecimentos`
--


-- --------------------------------------------------------

--
-- Table structure for table `combustiveis`
--

CREATE TABLE `combustiveis` (
  `id_combustiveis` int(11) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `preco` decimal(2,2) DEFAULT NULL,
  `reciclagem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `combustiveis`
--



-- --------------------------------------------------------

--
-- Table structure for table `maquinas`
--

CREATE TABLE `maquinas` (
  `id_maquinas` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `matricula` varchar(9) DEFAULT NULL,
  `combustivel` int(11) DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `km` int(11) DEFAULT NULL,
  `h` int(11) DEFAULT NULL,
  `km_iniciais` decimal(10,2) DEFAULT NULL,
  `h_iniciais` decimal(10,2) DEFAULT NULL,
  `observacoes` varchar(400) DEFAULT NULL,
  `reciclagem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maquinas`
--


-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE `obras` (
  `id_obras` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `mostrar` varchar(3) DEFAULT NULL,
  `reciclagem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obras`
--



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adm` int(1) DEFAULT NULL,
  `nfc` varchar(12) NOT NULL,
  `reciclagem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `abastecimentos`
--
ALTER TABLE `abastecimentos`
  ADD PRIMARY KEY (`id_abastecimentos`),
  ADD KEY `obra` (`obra`),
  ADD KEY `abastecimentos_ibfk_2` (`maquina`),
  ADD KEY `abastecimentos_ibfk_3` (`combustivel`);

--
-- Indexes for table `combustiveis`
--
ALTER TABLE `combustiveis`
  ADD PRIMARY KEY (`id_combustiveis`);

--
-- Indexes for table `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id_maquinas`),
  ADD KEY `combustivel` (`combustivel`);

--
-- Indexes for table `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id_obras`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abastecimentos`
--
ALTER TABLE `abastecimentos`
  MODIFY `id_abastecimentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `combustiveis`
--
ALTER TABLE `combustiveis`
  MODIFY `id_combustiveis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id_maquinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `obras`
--
ALTER TABLE `obras`
  MODIFY `id_obras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abastecimentos`
--
ALTER TABLE `abastecimentos`
  ADD CONSTRAINT `abastecimentos_ibfk_1` FOREIGN KEY (`obra`) REFERENCES `obras` (`id_obras`),
  ADD CONSTRAINT `abastecimentos_ibfk_2` FOREIGN KEY (`maquina`) REFERENCES `maquinas` (`id_maquinas`),
  ADD CONSTRAINT `abastecimentos_ibfk_3` FOREIGN KEY (`combustivel`) REFERENCES `combustiveis` (`id_combustiveis`);

--
-- Constraints for table `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`combustivel`) REFERENCES `combustiveis` (`id_combustiveis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
