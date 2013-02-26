-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 26/02/2013 às 21h14min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `knauf_cleaneo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `archives`
--

CREATE TABLE IF NOT EXISTS `archives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL COMMENT '1-projeto; 2-descrição; 3-modelo',
  `id_customer` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `data` varchar(200) NOT NULL,
  `date` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `archives`
--

INSERT INTO `archives` (`id`, `id_type`, `id_customer`, `id_project`, `data`, `date`) VALUES
(7, 1, 45, 39, 'Tulips.jpg', 1361799120),
(8, 1, 45, 39, 'Koala.jpg', 1361799121),
(13, 3, 45, 41, 'modelo (1).docx', 1361820473),
(14, 2, 45, 42, 'Jornal-Extra-RJ.pdf', 1361888444),
(15, 1, 45, 46, 'Tulips.jpg', 1361900832),
(16, 3, 45, 46, 'modelo (1).docx', 1361900832);

-- --------------------------------------------------------

--
-- Estrutura da tabela `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL COMMENT '1-Arquiteto; 2-Instalador',
  `id_pessoa` int(11) NOT NULL COMMENT '1-Fisica, 2-Juridica',
  `email` varchar(200) NOT NULL,
  `profissao` varchar(200) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `cel` varchar(50) NOT NULL,
  `razao` varchar(200) NOT NULL,
  `fantasia` varchar(200) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `valido` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `id_category`, `id_pessoa`, `email`, `profissao`, `cpf`, `senha`, `nome`, `cep`, `endereco`, `complemento`, `bairro`, `cidade`, `estado`, `tel`, `cel`, `razao`, `fantasia`, `cnpj`, `hash`, `valido`) VALUES
(1, 2, 1, 'teste@teste.com', '', '12312', '847dc0f7420f7d9b30abccf8729bd028', 'fwe', '312312', 'sdfsd', 'sdf', 'ssdf', 'sdfsd', 'RJ', '3123', '123', '', '', '', '324755125227c8e680', 1),
(2, 2, 1, 'teste@teste.com', '', 'qwe', '157eb9ce33644ada6d0499c1097c4f5d', 'qwe', 'qwe', 'qwe', '', 'qwe', '', '', '', '', '', '', '', '2253451252a0c97425', 1),
(44, 1, 1, 'herculanoweb@gmail.com', '', '406.806.496-20', '81dc9bdb52d04dc20036dbd8313ed055', 'Herculano', 'we', 'wer', 'wer', 'wer', 'wer', 'RJ', 'we', 'wer', '', '', '', '30513512697c1ddbd2', 1),
(45, 1, 1, 'herculano@dizain.com.br', 'Arquiteto', '406.806.496-20', '81dc9bdb52d04dc20036dbd8313ed055', 'fewfwe we', 'fwe', 'wefwe', 'we', 'wef', 'wef', 'RJ', 'wef', 'wef', '', '', '', '24820512762f55a435', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `contato` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-salvo; 2-enviado; 3-lixo; 4-eliminado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`id`, `id_customer`, `id_category`, `id_pessoa`, `nome`, `cep`, `endereco`, `bairro`, `cidade`, `estado`, `tel`, `contato`, `status`) VALUES
(39, 45, 1, 1, 'teste', ' we2342423', 'gdfg ', ' dfgdf', ' dfgdf', 'RJ', ' 32423324', ' dfgdf', 1),
(40, 45, 1, 1, '12e12', ' 12e', ' 12e12e', ' 12e', '12e', 'RJ', ' 12e', 'wqdqwdqwdqwd', 3),
(41, 45, 1, 1, 'Jiaj Jpoeeee', ' 21312', ' ffwe', ' fwe', ' fwef', 'RJ', ' 123123', ' sdfsdfsdfsd', 3),
(42, 45, 1, 1, 'teste com ppdf', ' 12312', ' sdfsd', ' sdfsd', ' sdf', 'RJ', ' 123123123', ' sdfsdfsd', 3),
(46, 45, 1, 1, '234wewef', ' 234', ' 234', ' 234', ' 234234', 'RJ', ' 2342', ' 234', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 = Admin; 2 = Judge',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
