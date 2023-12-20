-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2022 às 03:16
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
create database jogomemoria;
use jogomemoria;
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarJogador` (IN `nome` VARCHAR(50), IN `cpf` VARCHAR(11), IN `telefone` VARCHAR(20), IN `email` VARCHAR(50), IN `usuario` VARCHAR(20), IN `dataNasc` DATE, IN `senha` VARCHAR(50))   insert into jogador(nome, cpf, telefone, email, usuario, dataNasc, senha) values (nome,cpf,telefone,email,usuario,dataNasc, PASSWORD(senha))$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarPartida` (IN `codigoJogador` INT(11), IN `modo` INT(2), IN `dimensao` VARCHAR(3), IN `datajogo` DATETIME, IN `resultado` INT(1), IN `tempoJogo` TIME)   insert into partida(partida.codigoJogador,partida.modo,partida.dimensao,partida.datajogo,partida.resultado,partida.tempoJogo) VALUES (codigoJogador,modo,dimensao,datajogo,resultado,tempoJogo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarHistoricoJogador` (IN `codigo` INT)   select * from partida where partida.codigoJogador = codigo ORDER BY partida.datajogo DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarPorUsuario` (IN `usuario` VARCHAR(20))   select * from jogador where jogador.usuario = usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarPreHistoricoJogador` (IN `codigo` INT)   select * from partida where partida.codigoJogador = codigo ORDER BY partida.datajogo DESC LIMIT 4$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarRanking` (IN `dimensao` VARCHAR(3))   select partida.dimensao, partida.tempoJogo, jogador.nome from partida inner join jogador on partida.codigoJogador = jogador.codigo where partida.dimensao = dimensao and partida.modo = 1 and partida.resultado = 1 order by partida.tempoJogo asc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarTodasPartidas` ()   select partida.dimensao, partida.tempoJogo, jogador.nome as 'nome' from partida inner join jogador on partida.codigoJogador = jogador.codigo where partida.modo = 1 and partida.resultado = 1 order by partida.dimensao desc, partida.tempoJogo asc$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`codigo`, `nome`, `cpf`, `telefone`, `email`, `usuario`, `dataNasc`, `senha`) VALUES
(3, 'Matheus Roberto Mariano', '46159884867', '15991391598', 'matheusrobertomariano@gmail.com', 'skyrunnerbr', '2003-06-23', '*91998DA4C36297A82F777A8C5A9D5EB4A90121E7'),
(10, 'Matheus Roberto Mariano', '12345678909', '15991391598', 'matheusrobertomariano@gmail.com', 'skyrunner_br', '2003-06-23', '*91998DA4C36297A82F777A8C5A9D5EB4A90121E7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `partida`
--

CREATE TABLE `partida` (
  `codigo` int(11) NOT NULL,
  `codigoJogador` int(11) NOT NULL,
  `modo` int(2) NOT NULL,
  `dimensao` varchar(3) NOT NULL,
  `datajogo` datetime NOT NULL,
  `resultado` int(1) NOT NULL,
  `tempoJogo` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `partida`
--

INSERT INTO `partida` (`codigo`, `codigoJogador`, `modo`, `dimensao`, `datajogo`, `resultado`, `tempoJogo`) VALUES
(20, 3, 0, '2x2', '2022-12-07 18:21:05', 1, '00:00:00'),
(21, 3, 1, '2x2', '2022-12-07 18:22:30', 1, '00:00:01'),
(22, 3, 1, '2x2', '2022-12-07 18:22:55', 1, '00:00:03'),
(23, 3, 0, '4x4', '2022-12-07 18:28:59', 0, '00:00:00'),
(24, 3, 1, '2x2', '2022-12-07 18:29:27', 1, '00:00:00'),
(25, 3, 1, '4x4', '2022-12-07 19:04:32', 1, '00:00:08'),
(26, 3, 1, '2x2', '2022-12-07 19:08:41', 0, '00:00:00'),
(27, 3, 1, '4x4', '2022-12-07 19:09:37', 1, '00:00:08'),
(28, 3, 1, '6x6', '2022-12-07 19:14:11', 1, '00:01:06'),
(29, 3, 0, '2x2', '2022-12-07 19:16:19', 1, '00:00:00'),
(30, 3, 0, '2x2', '2022-12-07 19:16:29', 0, '00:00:00'),
(31, 3, 1, '4x4', '2022-12-07 19:16:36', 0, '00:00:00'),
(32, 3, 0, '4x4', '2022-12-07 19:36:47', 0, '00:00:00'),
(33, 3, 0, '2x2', '2022-12-07 19:44:58', 1, '00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices para tabela `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigoJogador` (`codigoJogador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `partida`
--
ALTER TABLE `partida`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`codigoJogador`) REFERENCES `jogador` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
