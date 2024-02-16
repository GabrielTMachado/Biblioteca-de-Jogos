-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/11/2023 às 01:59
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
-- Banco de dados: `bdtrabalho2pii`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_jogo`
--

CREATE TABLE `tab_jogo` (
  `pk_id_jogo` int(11) NOT NULL,
  `nome_jogo` varchar(80) NOT NULL,
  `desc_jogo` varchar(255) NOT NULL,
  `img_jogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_jogo`
--

INSERT INTO `tab_jogo` (`pk_id_jogo`, `nome_jogo`, `desc_jogo`, `img_jogo`) VALUES
(2, 'R6', 'Jogo de piupiupoupou', 'imagem em brege'),
(4, 'R6', 'Jogo de piupiupoupou', 'imagem'),
(5, 'Minecraft', 'Jogo de piupiupoupou', 'imagem em brege'),
(6, 'Dokidoki Literature club', 'Morte e Amor', 'asdasdasd');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `pk_id_usu` int(11) NOT NULL,
  `nome_usu` varchar(80) NOT NULL,
  `senha_usu` varchar(255) NOT NULL,
  `email_usu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_jogo`
--
ALTER TABLE `tab_jogo`
  ADD PRIMARY KEY (`pk_id_jogo`);

--
-- Índices de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`pk_id_usu`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_jogo`
--
ALTER TABLE `tab_jogo`
  MODIFY `pk_id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `pk_id_usu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
