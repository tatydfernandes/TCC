-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Nov-2023 às 16:41
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
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcarrinho`
--

DROP TABLE IF EXISTS `tbcarrinho`;
CREATE TABLE IF NOT EXISTS `tbcarrinho` (
  `idCarrinho` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `idVenda` int(11) NOT NULL,
  PRIMARY KEY (`idCarrinho`),
  KEY `idProduto` (`idProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcarrinho`
--

INSERT INTO `tbcarrinho` (`idCarrinho`, `idProduto`, `qtd`, `valor_unitario`, `valor_total`, `idVenda`) VALUES
(1, 6, 2, '3.00', '6.00', 1),
(2, 14, 12, '3.00', '36.00', 1),
(3, 15, 1, '3.00', '3.00', 1),
(4, 10, 2, '3.00', '6.00', 1),
(5, 8, 1, '3.00', '3.00', 1),
(6, 9, 4, '3.00', '12.00', 1),
(7, 16, 1, '3.00', '3.00', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `cliente`, `celular`, `municipio`, `cep`, `logradouro`, `numero`, `complemento`, `email`, `bairro`) VALUES
(2, 'unknown', '00000000', '-----------', '000000000', '--------------', 0, '-----', '------------', '---------------'),
(5, 'teste', '92564465', 'sp', '011111111', 'teste', 1, '5', 'teste@teste.com', 'teste');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `produto`, `descricao`, `valor_unitario`, `valor_venda`, `foto`, `categoria`) VALUES
(6, 'Brigadeiro de Capim Santo', 'Brigadeiro feito com capim santo e passado em amêndoa laminada', '3.00', '3.00', '5f36c106c796ebacf30feaf10808bea0.png', 'Brigadeiro'),
(10, 'Brigadeiro de Café', 'Brigadeiro feito com café e passado em confeitos de chocolate amargo.', '3.00', '3.00', '52b768c7a419644577688f8252e1971f.png', 'Brigadeiro'),
(8, 'Brigadeiro Tradicional', 'Brigadeiro tradicional', '3.00', '3.00', '45f4f041e29c1e4015132e797936c776.png', 'Brigadeiro'),
(9, 'Brigadeiro de Maracujá', 'Brigadeiro feito com maracujá', '3.00', '3.00', '7d5ce3a9b37a2c6c875c083aeadf4c90.png', 'Brigadeiro'),
(11, 'Brigadeiro Ferrerinho', 'Brigadeiro tradicional com avelã e nutella.', '3.00', '3.00', '0fa75bcadac896c4cf23e271d968bd18.png', 'Brigadeiro'),
(12, 'Brigadeiro Crocante', 'Brigadeiro feito com amendoim.', '3.00', '3.00', 'ea83eb04715f9d69cedb141197770c74.png', 'Brigadeiro'),
(13, 'Brigadeiro de Nutella', 'Brigadeiro feito com Nutella', '3.00', '3.00', 'd79a6ee324e112ebe194f705e8b79b23.png', 'Brigadeiro'),
(14, 'Brigadeiro de Paçoca', 'Brigadeiro feito com paçoca e passado na paçoca.', '3.00', '3.00', 'ccb97c55b0dd8f117b44540713ec1da5.png', 'Brigadeiro'),
(15, 'Brigadeiro Tradicional(Confete)', 'Brigadeiro tradicional com confetes.', '3.00', '3.00', 'c07fb1035f52894b3057c0573c405ea4.png', 'Brigadeiro'),
(16, 'Brigaderio Frutas do Bosque', 'Brigadeiro de frutas do bosque passado em açúcar vermelho.', '3.00', '3.00', '4fb5f4674fc11b0b4f5ed161fa45a213.png', 'Brigadeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvenda`
--

DROP TABLE IF EXISTS `tbvenda`;
CREATE TABLE IF NOT EXISTS `tbvenda` (
  `idVenda` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `tpVenda` varchar(100) DEFAULT NULL,
  `dtVenda` date DEFAULT NULL,
  `dtEntrega` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `idFPagamento` int(11) DEFAULT NULL,
  `totalVenda` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idVenda`),
  KEY `idCliente` (`idCliente`),
  KEY `idFPagamento` (`idFPagamento`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbvenda`
--

INSERT INTO `tbvenda` (`idVenda`, `idCliente`, `tpVenda`, `dtVenda`, `dtEntrega`, `status`, `idFPagamento`, `totalVenda`) VALUES
(1, 5, 'Pronta entrega', '2023-11-24', '2023-11-24', 'Parcial', 1, '69.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'administrador@admin.com', '$2y$10$7pSgcOr5dbA5cNUJ5uZxLOCd6D9QFUq86HxVioXgLCbezYNyyPGC6', '6Dpxw19uF4wzI4horHVQLEkyFAswf1zJEhEZBBCYqGuLWnOmvXDcQd6dYk1F', '2023-11-24 03:00:00', '2023-11-24 03:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
