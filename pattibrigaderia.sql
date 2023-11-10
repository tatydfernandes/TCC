-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Nov-2023 às 19:17
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
-- Banco de dados: `pattibrigaderia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
CREATE TABLE IF NOT EXISTS `tbcliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(100) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `municipio` varchar(200) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `cliente`, `celular`, `municipio`, `cep`, `logradouro`, `numero`, `complemento`, `email`, `bairro`) VALUES
(2, 'teste NOme', '9000000009', 'são paulo', '08150350', 'rua de teste', 3000, 'casa teste 1', 'teste@teste.com', NULL),
(3, 'Vinicius Telles', '11977825356', 'São Paulo', '08150350', 'Rua Samuel Pedro dos Santos', 114, 'Casa 4', 'telles861@gmail.com', 'Jardim Robru');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfpagamento`
--

DROP TABLE IF EXISTS `tbfpagamento`;
CREATE TABLE IF NOT EXISTS `tbfpagamento` (
  `idFPagamento` int(11) NOT NULL AUTO_INCREMENT,
  `fPagamento` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idFPagamento`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbfpagamento`
--

INSERT INTO `tbfpagamento` (`idFPagamento`, `fPagamento`) VALUES
(1, 'Dinheiro'),
(2, 'Crédito'),
(3, 'Débito'),
(4, 'Pix');

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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

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
(37, 'glucose', 1000, '12.00'),
(38, 'Pistache', 1000, '220.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

DROP TABLE IF EXISTS `tbproduto`;
CREATE TABLE IF NOT EXISTS `tbproduto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(100) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `valor_venda` decimal(10,2) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `produto`, `descricao`, `valor_unitario`, `valor_venda`, `foto`, `categoria`) VALUES
(1, 'Brigadeiro de Capim Santo', 'Brigadeiro feito com capim santo e enrolado em amêndoa laminada', '2.82', '3.00', '5a0f6dd5252b900d2110170730e22e2e.png', NULL),
(2, 'Brigadeiro casadinho', 'Misturado', '2.30', '3.00', '0a4e714f9427936152bec7b7aa92aebc.png', NULL),
(5, 'teste carrinho 2', NULL, '2.00', '2.50', NULL, 'Brigadeiro');

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
  `idProduto` int(11) DEFAULT NULL,
  `qtdProduto` int(11) DEFAULT NULL,
  `valorTotalProduto` decimal(10,2) DEFAULT NULL,
  `tpVenda` varchar(100) DEFAULT NULL,
  `dtVenda` date DEFAULT NULL,
  `dtEntrega` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `idFPagamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVenda`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbvenda`
--

INSERT INTO `tbvenda` (`idVenda`, `idCliente`, `idProduto`, `qtdProduto`, `valorTotalProduto`, `tpVenda`, `dtVenda`, `dtEntrega`, `status`, `idFPagamento`) VALUES
(1, 0, NULL, NULL, NULL, 'Pronta entrega', '2023-11-08', '2023-11-08', 'Pago', 4),
(2, NULL, NULL, 2, '6.00', NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, 1, '3.00', NULL, NULL, NULL, NULL, NULL),
(4, 2, NULL, NULL, NULL, 'Encomenda', '2023-11-08', '2023-11-29', 'Parcial', NULL),
(5, NULL, NULL, 3, '9.00', NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, 5, '12.50', NULL, NULL, NULL, NULL, NULL),
(7, 2, NULL, NULL, NULL, 'Pronta entrega', '2023-11-08', '2023-11-08', 'Pago', NULL),
(8, NULL, NULL, 5, '12.50', NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, 15, '45.00', NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, 12, '36.00', NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
