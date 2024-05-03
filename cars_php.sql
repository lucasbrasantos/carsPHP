-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/05/2024 às 02:00
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cars`
--

INSERT INTO `cars` (`id`, `marca`, `cor`, `ano`, `preco`) VALUES
(29, 'Toyota', 'Blue', 1933, 60867),
(30, 'Mercedes-Benz', 'White', 2045, 74016),
(31, 'Mercedes-Benz', 'Blue', 1996, 36625),
(32, 'Honda', 'Blue', 1976, 82839),
(33, 'Toyota', 'Red', 2067, 83159),
(34, 'Toyota', 'Red', 1936, 64803),
(35, 'Ford', 'Red', 2007, 34922);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
