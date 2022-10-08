-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Out-2022 às 17:45
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `progweb3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `token`
--

CREATE TABLE `token` (
  `idToken` int(3) NOT NULL,
  `hashToken` varchar(200) NOT NULL,
  `idUser` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `token`
--

INSERT INTO `token` (`idToken`, `hashToken`, `idUser`) VALUES
(7, 'eyJhbGciOiJTSEEyNTYiLCJ0eXAiOiJKV1QifQ==.ImV5SnBjM01pT2lKc2IyTmhiR2h2YzNRaUxDSnViMjFsSWpvaWNtRndhR0ZsYkNJc0ltUmhkR0ZvYjNKaElqb2lNRE10TVRBdE1qQXlNaUF3TlRvME1qb3hOQ0J3YlNKOSI=.++iq5DwDFAR43Qboc/s6irdnMx', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(3) NOT NULL,
  `nomeUser` varchar(40) NOT NULL,
  `senhaUser` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUser`, `nomeUser`, `senhaUser`) VALUES
(1, 'maristella', '1234'),
(2, 'raphael', '1234'),
(3, 'heloisa', 'bitch'),
(4, 'henrique', '157'),
(5, 'juju', 'calvo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`idToken`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `token`
--
ALTER TABLE `token`
  MODIFY `idToken` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
