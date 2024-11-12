-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2024 às 18:48
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `campustec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `recrutadores`
--

CREATE TABLE `recrutadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(255) NOT NULL,
  `numeroTel` varchar(20) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `emailPessoal` varchar(255) NOT NULL,
  `emailCorporativo` varchar(255) NULL,
  `senha` varchar(255) NOT NULL,
  `biografia` text NULL,
  `competencias` text NULL,
  `empresa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emailPessoal` (`emailPessoal`),
  UNIQUE KEY `emailCorporativo` (`emailCorporativo`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=22;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
