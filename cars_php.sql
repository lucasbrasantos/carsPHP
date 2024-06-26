-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/06/2024 às 02:35
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

-- Criação do banco de dados
CREATE DATABASE `cars_php` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

-- Seleção do banco de dados
USE `cars_php`;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cars_php`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `marca` varchar(128) NOT NULL,
  `cor` varchar(128) NOT NULL,
  `ano` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `usado` varchar(3) NOT NULL,
  `adicionais` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`adicionais`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cars`
--

INSERT INTO `cars` (`id`, `marca`, `cor`, `ano`, `preco`, `usado`, `adicionais`) VALUES
(55, 'Ford', 'Green', 2052, 76634, 'não', '[\"Airbag\"]'),
(56, 'Ford', 'White', 1902, 37728, 'sim', '[\"Estofado de couro\",\"GPS\"]'),
(65, 'Ford', 'Black', 2048, 77280, 'sim', '[\"Vidro com insulfilm\",\"Airbag\"]'),
(66, 'Ford', 'Silver', 2086, 1073, 'sim', '[\"Possui tela touch\",\"GPS\"]'),
(67, 'Mercedes-Benz', 'Blue', 1975, 28567, 'sim', '[]'),
(70, 'Ford', 'Silver', 1993, 62668, 'não', '[\"Possui tela touch\",\"Airbag\"]'),
(71, 'Mercedes-Benz', 'White', 1940, 49758, 'sim', '[\"GPS\"]'),
(72, 'BMW', 'White', 2049, 7119, 'não', '[\"Vidro com insulfilm\",\"Pe\\u00e7as originais\",\"Possui tela touch\",\"Estofado de couro\"]'),
(73, 'Ford', 'White', 1904, 16039, 'não', '[\"Vidro com insulfilm\",\"Pe\\u00e7as originais\",\"Estofado de couro\",\"GPS\"]');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
