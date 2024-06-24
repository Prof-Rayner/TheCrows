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

--
-- Banco de dados: `thecrow`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `crow`
--

CREATE TABLE `crow` (
  `id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `tip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `crow`
--

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_crow` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `rank`
--

INSERT INTO `rank` (`id`, `id_user`, `id_crow`, `date`) VALUES
(1, 1, 12, '2024-06-21 12:51:16'),
(4, 1, 11, '2024-06-21 12:51:46'),
(7, 9, 12, '2024-06-21 13:41:48'),
(8, 8, 5, '2024-06-21 13:42:15'),
(9, 12, 1, '2024-06-21 13:45:14'),
(10, 11, 1, '2024-06-21 13:46:37'),
(11, 11, 2, '2024-06-21 13:46:38'),
(12, 11, 5, '2024-06-21 13:46:38'),
(13, 10, 1, '2024-06-21 13:47:13'),
(14, 10, 2, '2024-06-21 13:47:13'),
(15, 10, 5, '2024-06-21 13:47:13'),
(16, 15, 1, '2024-06-21 14:06:52'),
(17, 15, 2, '2024-06-21 14:06:52'),
(18, 15, 3, '2024-06-21 14:06:52'),
(19, 15, 5, '2024-06-21 14:06:52'),
(20, 15, 7, '2024-06-21 14:06:52'),
(21, 15, 9, '2024-06-21 14:06:52'),
(24, 16, 10, '2024-06-21 14:10:13'),
(25, 16, 2, '2024-06-21 14:10:13'),
(26, 16, 3, '2024-06-21 14:10:13'),
(27, 16, 5, '2024-06-21 14:10:13'),
(28, 16, 7, '2024-06-21 14:10:13'),
(29, 16, 9, '2024-06-21 14:10:13'),
(30, 16, 12, '2024-06-21 14:10:13'),
(31, 14, 1, '2024-06-21 14:14:26'),
(32, 14, 2, '2024-06-21 14:14:26'),
(33, 14, 3, '2024-06-21 14:14:26'),
(34, 14, 4, '2024-06-21 14:14:26'),
(35, 14, 5, '2024-06-21 14:14:26'),
(36, 14, 6, '2024-06-21 14:14:26'),
(37, 14, 7, '2024-06-21 14:14:26'),
(38, 15, 4, '2024-06-21 14:15:11'),
(39, 14, 8, '2024-06-21 14:15:54'),
(40, 16, 11, '2024-06-21 14:16:03'),
(41, 15, 6, '2024-06-21 14:16:17'),
(42, 14, 9, '2024-06-21 14:25:28'),
(43, 1, 1, '2024-06-21 14:48:34'),
(44, 13, 3, '2024-06-21 14:49:23'),
(45, 9, 3, '2024-06-21 14:49:29'),
(46, 11, 3, '2024-06-21 14:49:40'),
(47, 10, 4, '2024-06-21 14:49:43'),
(48, 16, 1, '2024-06-21 14:49:48'),
(49, 13, 1, '2024-06-21 14:49:49'),
(50, 13, 2, '2024-06-21 14:49:52'),
(51, 13, 4, '2024-06-21 14:49:55'),
(52, 13, 5, '2024-06-21 14:49:58'),
(53, 13, 6, '2024-06-21 14:50:03'),
(54, 13, 7, '2024-06-21 14:50:06'),
(55, 13, 8, '2024-06-21 14:50:09'),
(56, 13, 9, '2024-06-21 14:50:12'),
(57, 15, 8, '2024-06-21 14:50:13'),
(58, 13, 10, '2024-06-21 14:50:15'),
(59, 13, 11, '2024-06-21 14:50:17'),
(63, 15, 10, '2024-06-21 14:50:45'),
(64, 15, 11, '2024-06-21 14:50:49'),
(65, 13, 12, '2024-06-21 14:50:52'),
(66, 15, 12, '2024-06-21 14:50:54'),
(67, 16, 4, '2024-06-21 14:51:00'),
(69, 16, 6, '2024-06-21 14:51:08'),
(71, 10, 3, '2024-06-21 14:51:16'),
(72, 16, 8, '2024-06-21 14:51:17'),
(73, 10, 6, '2024-06-21 14:51:20'),
(74, 10, 7, '2024-06-21 14:51:27'),
(75, 10, 8, '2024-06-21 14:51:32'),
(76, 10, 9, '2024-06-21 14:51:35'),
(77, 10, 10, '2024-06-21 14:51:40'),
(78, 11, 4, '2024-06-21 14:51:42'),
(79, 10, 11, '2024-06-21 14:51:43'),
(80, 9, 1, '2024-06-21 14:51:50'),
(81, 10, 12, '2024-06-21 14:51:51'),
(83, 9, 2, '2024-06-21 14:51:55'),
(86, 9, 4, '2024-06-21 14:52:04'),
(87, 11, 6, '2024-06-21 14:52:04'),
(88, 9, 5, '2024-06-21 14:52:07'),
(89, 14, 10, '2024-06-21 14:52:11'),
(90, 9, 6, '2024-06-21 14:52:11'),
(91, 9, 7, '2024-06-21 14:52:14'),
(93, 9, 8, '2024-06-21 14:52:17'),
(94, 9, 9, '2024-06-21 14:52:21'),
(95, 11, 7, '2024-06-21 14:52:24'),
(96, 9, 10, '2024-06-21 14:52:25'),
(97, 9, 11, '2024-06-21 14:52:28'),
(98, 11, 9, '2024-06-21 14:52:31'),
(99, 14, 12, '2024-06-21 14:52:36'),
(100, 11, 8, '2024-06-21 14:52:38'),
(101, 14, 11, '2024-06-21 14:52:42'),
(102, 11, 10, '2024-06-21 14:52:46'),
(103, 11, 11, '2024-06-21 14:52:52'),
(104, 11, 12, '2024-06-21 14:52:59');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_usertype` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `id_usertype`, `id_photo`) VALUES
(1, 'Administrador', 'admin@g.com', '$2y$10$27p.8nZEEeiIQXdsCFfueerzfqFFH6OkfDvTN7B/oLqhQouD5rflO', 1, 13),
(2, 'teste', 'teste@g.com', '123', 2, 3),
(3, 'jeff', 'j@g.com', '$2y$10$TPWpoR4pmI.nnG40nZrxRe90h1f3PNSuCRigR4dad/tXEH5.C0dX.', 2, 1),
(4, 'Jeff Rayner', 'jeff.rfsimoes@sp.senac.br', '$2y$10$TyNS.cqadZwvt3mCFhV8T.JepE04w4AedTSDmsGH7FlYbl8vKw9Tu', 2, 1),
(5, 'asd', 'asd@g.com', '$2y$10$Utk3b29BbRTnKUlGmvDcnulY1pwZgIavk/TtjhMNWZkyHBwBgNx7i', 2, 11),
(6, 'maria', 'm@g.com', '$2y$10$27p.8nZEEeiIQXdsCFfueerzfqFFH6OkfDvTN7B/oLqhQouD5rflO', 2, 10),
(7, 'ant', 'ant@g.com', '$2y$10$xhLFRZDsQBIwwXw/xTkTkuyO2q.rXRyeJW5zFNCuRWN5zUZswZAnO', 2, 4),
(8, 'Bruno', 'bruno@gmail.com', '$2y$10$JPM7/n3iQsDycvt/VsGkdew9G2NhSElAKbTHMN9LNP0zOy0qIAxJS', 2, 1),
(9, 'Gabriel Alcantara', 't@g.com', '$2y$10$XItFXdh18rGbIk4jOqLdwOUWfipRXHMjlwK0y6yJuZ5Ww3iv5gNqm', 2, 13),
(10, 'richard', 'r@gmail.com', '$2y$10$vzZB3ipGAsKo57iiylG1EOl6yWGb1rkPbqG7q6JMtYsj7g4nBekvS', 2, 12),
(11, 'Otávio Henrique', 'otavio@g.com', '$2y$10$jO1XjB0Xng09pOwJM/XBWuBzLv039zQ/EuMGrsg6n85Q2QpfI6KSO', 2, 7),
(12, 'Samuel', 'henrickyoliveira.gon@gmail.com', '$2y$10$SXEn/AjDigyFIjv8Gfl01.N7zAfmxkLXWDSCPUrQpEmwD73IzGNoO', 2, 9),
(13, 'Leo', 'leo@g.com', '$2y$10$qc4j.P11CkXSi2jM6Z/opetIYHbOkDPEl73S5ulv3xpGbgjgjvGKq', 2, 7),
(14, 'Vitor', 'vitor@gmail.com', '$2y$10$Nrw3lryyo82eICluZ9xkMONzXr.gOA5kZY7ReBusGODsUEJc2TjYq', 2, 8),
(15, 'Nickolas Alves de Queiroz', 'nickolasalvesdequeiroz2007@gmail.com', '$2y$10$XyrGk9WUsfKGCRkdB1m1T.aa6pzUtnrI.D7Tsu0t0uP.QRpzF/fYO', 2, 1),
(16, 'Bruno Mendes', 'b@f.com', '$2y$10$AKYU.wHowCEQRpRE4IR59ebzDKCIq.IEt6qPL2gNQ4NBqCt5fBZhC', 2, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usertype`
--

INSERT INTO `usertype` (`id`, `description`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `crow`
--
ALTER TABLE `crow`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_crow`),
  ADD KEY `id_crow` (`id_crow`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_usertype` (`id_usertype`),
  ADD KEY `id_photo` (`id_photo`);

--
-- Índices de tabela `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `crow`
--
ALTER TABLE `crow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rank_ibfk_2` FOREIGN KEY (`id_crow`) REFERENCES `crow` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_usertype`) REFERENCES `usertype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
