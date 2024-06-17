-- Criação do banco de dados
CREATE DATABASE `cars_php` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

-- Seleção do banco de dados
USE `cars_php`;

-- Criação da tabela `cars`
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(128) NOT NULL,
  `cor` varchar(128) NOT NULL,
  `ano` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Alteração da tabela `cars` para adicionar novos campos
ALTER TABLE `cars`
ADD COLUMN `usado` VARCHAR(3) NOT NULL AFTER `preco`,
ADD COLUMN `adicionais` JSON AFTER `usado`;
