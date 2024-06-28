-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/06/2024 às 17:04
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Banco de dados: `thecrow`
-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `thecrow` CHARACTER SET utf8mb4 COLLATE=utf8mb4_unicode_ci;
USE `thecrow`;

-- Estrutura para tabela `crow`
CREATE TABLE `crow` (
  `id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `tip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Despejando dados para a tabela `crow`
INSERT INTO `crow` (`id`, `hash`, `name`, `tip`) VALUES
(1, 'hash1', 'Hugin', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(2, 'hash2', 'Ylva', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(3, 'hash3', 'Eartha', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(4, 'hash4', 'Grim', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(5, 'hash5', 'Caligo', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(6, 'hash6', 'Hrafn', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(7, 'hash7', 'Yvar', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(8, 'hash8', 'Grimnir', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(9, 'hash9', 'Arkyn', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(10, 'hash10', 'Alfodr', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(11, 'hash11', 'Myrkvi', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo'),
(12, 'hash12', 'Munin', 'Aqui vai ficar o texto com a dica ou uma charada de onde pode estar esse corvo');

-- Índices de tabela `crow`
ALTER TABLE `crow`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabela `crow`
ALTER TABLE `crow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


-- --------------------------------------------------------


-- Estrutura para tabela `usertype`
CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Despejando dados para a tabela `usertype`
INSERT INTO `usertype` (`id`, `description`) VALUES
(1, 'Admin'),
(2, 'User');

-- Índices de tabela `usertype`
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabela `usertype`
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


-- --------------------------------------------------------


-- Estrutura para tabela `user`
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_usertype` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Despejando dados para a tabela `user`
INSERT INTO `user` (`id`, `name`, `email`, `password`, `id_usertype`, `id_photo`) VALUES
(1, 'Administrador', 'admin@thecrows.com', '$2y$10$XTbFFjRTPrhG.9kdP3Yp7OnXZKrnixi3BaGLqv9AVEWZ8JeqlIpJy', 1, 0);


-- Índices de tabela `user`
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_usertype` (`id_usertype`),
  ADD KEY `id_photo` (`id_photo`);

-- AUTO_INCREMENT de tabela `user`
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- Restrições para tabelas `user`
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_usertype`) REFERENCES `usertype` (`id`);


-- --------------------------------------------------------


-- Estrutura para tabela `rank`
CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_crow` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Índices de tabela `rank`
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_crow`),
  ADD KEY `id_crow` (`id_crow`);

-- AUTO_INCREMENT de tabela `rank`
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

-- Restrições para tabelas `rank`
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rank_ibfk_2` FOREIGN KEY (`id_crow`) REFERENCES `crow` (`id`) ON DELETE CASCADE;

--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;