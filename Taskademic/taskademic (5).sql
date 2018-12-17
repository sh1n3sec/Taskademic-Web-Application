-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Jan-2018 às 16:05
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskademic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAluno` varchar(50) NOT NULL,
  `emailAluno` varchar(100) NOT NULL,
  `passHash` varchar(50) NOT NULL,
  PRIMARY KEY (`idAluno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associada`
--

DROP TABLE IF EXISTS `associada`;
CREATE TABLE IF NOT EXISTS `associada` (
  `idDisciplina` int(11) NOT NULL,
  `idTarefa` int(11) NOT NULL,
  KEY `idDisciplina` (`idDisciplina`),
  KEY `idTarefa` (`idTarefa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCurso` varchar(50) NOT NULL,
  `idAluno` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCurso`),
  KEY `idAluno` (`idAluno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `idDisciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nomeDisciplina` varchar(50) NOT NULL,
  `ano` int(2) NOT NULL,
  `semestre` int(2) NOT NULL,
  `emailProf` varchar(50) DEFAULT NULL,
  `idAluno` int(11) DEFAULT NULL,
  `idCurso` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDisciplina`),
  KEY `idAluno` (`idAluno`),
  KEY `idCurso` (`idCurso`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

DROP TABLE IF EXISTS `tarefa`;
CREATE TABLE IF NOT EXISTS `tarefa` (
  `idTarefa` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTarefa` varchar(50) NOT NULL,
  `dataInicio` datetime NOT NULL,
  `dataFim` datetime NOT NULL,
  `progresso` decimal(5,2) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `idAluno` int(11) DEFAULT NULL,
  `idTipoTarefa` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTarefa`),
  KEY `idAluno` (`idAluno`),
  KEY `idTipoTarefa` (`idTipoTarefa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_tarefa`
--

DROP TABLE IF EXISTS `tipo_tarefa`;
CREATE TABLE IF NOT EXISTS `tipo_tarefa` (
  `idTipoTarefa` int(11) NOT NULL,
  `tipoTarefa` varchar(10) NOT NULL,
  PRIMARY KEY (`idTipoTarefa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_tarefa`
--

INSERT INTO `tipo_tarefa` (`idTipoTarefa`, `tipoTarefa`) VALUES
(1, 'Lazer'),
(2, 'Escolar');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
