-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Set-2023 às 18:31
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `foodmarket`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcarrinho`
--

DROP TABLE IF EXISTS `tbcarrinho`;
CREATE TABLE IF NOT EXISTS `tbcarrinho` (
  `idCarrinho` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `valorTotalP` double DEFAULT NULL,
  PRIMARY KEY (`idCarrinho`),
  KEY `idProduto` (`idProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
CREATE TABLE IF NOT EXISTS `tbcliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(100) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfpagamento`
--

DROP TABLE IF EXISTS `tbfpagamento`;
CREATE TABLE IF NOT EXISTS `tbfpagamento` (
  `idFPagamento` int(11) NOT NULL AUTO_INCREMENT,
  `fPagamento` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idFPagamento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbingredientes`
--

DROP TABLE IF EXISTS `tbingredientes`;
CREATE TABLE IF NOT EXISTS `tbingredientes` (
  `idIngredientes` int(11) NOT NULL AUTO_INCREMENT,
  `ingrediente` varchar(150) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `custo` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idIngredientes`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbingredientes`
--

INSERT INTO `tbingredientes` (`idIngredientes`, `ingrediente`, `quantidade`, `custo`) VALUES
(1, 'Maracujá', 1000, '10.00'),
(2, 'Açucar cristal de confeito', 500, '9.00'),
(3, 'Açúcar cristal', 1000, '6.00'),
(4, 'Açucar de confeiteiro', 500, '6.00'),
(5, 'Amendoim torrado', 1000, '34.00'),
(6, 'Açúcar refinado', 1000, '4.00'),
(7, 'Capim santo', 40, '3.00'),
(8, 'lasca de amendoa', 1000, '94.00'),
(9, 'Granulado tradicional branco', 500, '12.00'),
(10, 'avelã', 1000, '84.00'),
(11, 'Canela em pó', 50, '5.00'),
(12, 'Cenoura', 1000, '11.00'),
(13, 'Confeito Tradicional de chocolate', 500, '10.00'),
(14, 'Chocolate ao leite', 2000, '64.00'),
(15, 'Chocolate branco', 2000, '69.00'),
(16, 'Coco ralado fresco', 250, '10.00'),
(17, 'Chocolate meio amargo', 2000, '64.00'),
(18, 'Coco ralado', 100, '6.00'),
(19, 'Confeitos Macio Chocolate', 500, '14.00'),
(20, 'Leite Condensado', 395, '7.00'),
(21, 'Creme de leite', 200, '3.80'),
(22, 'Doce de leite', 140, '9.00'),
(23, 'Leite em pó', 400, '16.00'),
(24, 'Manteiga', 200, '8.00'),
(25, 'Nutella', 640, '40.00'),
(26, 'Café Solúvel', 100, '8.00'),
(27, 'Brigadeiro tradicional', 519, '60.00'),
(28, 'Brigadeiro de café', 544, '62.00'),
(29, 'Brigadeiro tradicional branco', 519, '65.00'),
(30, 'brigadeiro maracuja', 536, '71.00'),
(31, 'brigadeiro ninho', 553, '57.00'),
(32, 'brigadeiro de beijinho', 506, '57.00'),
(33, 'brigadeiro de caramelo salgado', 519, '42.00'),
(34, 'sneacker', 50, '4.00'),
(35, 'granulado de chocolate', 400, '34.00'),
(36, 'glucose', 1000, '12.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

DROP TABLE IF EXISTS `tbproduto`;
CREATE TABLE IF NOT EXISTS `tbproduto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(100) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `valor_unitario` double DEFAULT NULL,
  `valor_venda` double DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `produto`, `descricao`, `valor_unitario`, `valor_venda`, `foto`) VALUES
(1, 'Brigadeiro de Chocolate', 'Brigadeiro saboroso de chocolate ao leite.', 1.99, 3.99, NULL),
(2, 'Brigadeiro de Morango', 'Brigadeiro com sabor de morango fresco.', 2.49, 4.99, NULL),
(3, 'Brigadeiro de Coco', 'Brigadeiro com coco ralado para um toque tropical.', 2.99, 5.99, NULL),
(4, 'Brigadeiro de Amendoim', 'Brigadeiro com pedaços de amendoim crocante.', 2.29, 4.49, NULL),
(5, 'Brigadeiro de Leite Condensado', 'Brigadeiro clássico com leite condensado.', 1.79, 3.49, NULL),
(6, 'Brigadeiro de Maracujá', 'Brigadeiro com sabor refrescante de maracujá.', 2.69, 5.49, NULL),
(7, 'Brigadeiro de Limão', 'Brigadeiro com toque cítrico de limão.', 2.49, 4.99, NULL),
(8, 'Brigadeiro de Nozes', 'Brigadeiro com pedaços de nozes crocantes.', 3.49, 6.99, NULL),
(9, 'Brigadeiro de Pistache', 'Brigadeiro com sabor delicado de pistache.', 3.19, 6.49, NULL),
(10, 'Brigadeiro de Café', 'Brigadeiro com sabor intenso de café.', 2.79, 5.49, NULL),
(11, 'Brigadeiro de Abacaxi', 'Brigadeiro com sabor tropical de abacaxi.', 2.69, 5.49, NULL),
(12, 'Brigadeiro de Baunilha', 'Brigadeiro com aroma suave de baunilha.', 2.29, 4.49, NULL),
(13, 'Brigadeiro de Cereja', 'Brigadeiro com pedaços de cereja fresca.', 2.99, 5.99, NULL),
(14, 'Brigadeiro de Limão Siciliano', 'Brigadeiro com o sabor cítrico do limão siciliano.', 2.49, 4.99, NULL),
(15, 'Brigadeiro de Manga', 'Brigadeiro com sabor refrescante de manga.', 2.79, 5.49, NULL),
(16, 'Brigadeiro de Frutas Vermelhas', 'Brigadeiro com mistura de frutas vermelhas.', 3.29, 6.49, NULL),
(17, 'Brigadeiro de Pistache com Chocolate Branco', 'Brigadeiro com pistache e chocolate branco.', 3.49, 6.99, NULL),
(18, 'Brigadeiro de Doce de Leite', 'Brigadeiro com sabor doce de leite.', 1.99, 3.99, NULL),
(19, 'Brigadeiro de Avelã', 'Brigadeiro com o sabor único da avelã.', 3.19, 6.49, NULL),
(20, 'Brigadeiro de Maracujá com Chocolate Branco', 'Brigadeiro com maracujá e chocolate branco.', 3.29, 6.49, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(1000) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvenda`
--

DROP TABLE IF EXISTS `tbvenda`;
CREATE TABLE IF NOT EXISTS `tbvenda` (
  `idVenda` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `idCarrinho` int(11) DEFAULT NULL,
  `valorTotal` double DEFAULT NULL,
  `ValorPago` double DEFAULT NULL,
  `ValorPendente` double DEFAULT NULL,
  `dataVenda` date DEFAULT NULL,
  `dataEntrega` date DEFAULT NULL,
  `idFormaPagamento` int(11) DEFAULT NULL,
  `statusPagamento` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idVenda`),
  KEY `idCliente` (`idCliente`),
  KEY `idCarrinho` (`idCarrinho`),
  KEY `idFormaPagamento` (`idFormaPagamento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
