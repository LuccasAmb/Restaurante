-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2019 at 11:45 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--
CREATE DATABASE IF NOT EXISTS `restaurante` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restaurante`;

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `IDCargos` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`IDCargos`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`IDCargos`, `Nome`) VALUES
(1, 'Funcionario'),
(2, 'Chef de Cozinhas'),
(3, 'Chef de Cozinha'),
(4, 'Chef de Cozinha'),
(5, 'Chef de Cozinha'),
(6, 'Chef de Cozinha'),
(7, 'Chef de Cozinha'),
(8, 'Chef de Cozinha'),
(9, 'Chef de Cozinha'),
(10, 'Chef de Cozinha'),
(11, 'Chef de Cozinha'),
(12, 'Chef de Cozinha'),
(13, 'Chef de Cozinha'),
(14, 'Chef de Cozinha'),
(15, 'Chef de Cozinha'),
(16, 'Chef de Cozinha'),
(17, 'Chef de Cozinha'),
(18, 'Chef de Cozinha'),
(24, 'Saboneteira'),
(25, 'Chef de Cozinha'),
(26, 'Ambrosio'),
(27, 'CAS'),
(28, 'Coxinha'),
(29, 'Nada'),
(30, 'Farinha'),
(31, 'Liquidificador Philcos'),
(32, 'FLAVIO'),
(33, 'Luccas'),
(47, 'Sua Tia'),
(46, 'Casa do Gugu'),
(45, 'Bolinho de Chuva'),
(41, 'Luccas'),
(42, 'adsa'),
(43, 'dsadasdsa'),
(44, 'Thalesssss5555'),
(48, 'Cause I Need Your Sway'),
(49, 'I NEED YOU'),
(50, 'Faxineiro'),
(51, 'Comedor'),
(52, 'Cause I Need Your Sway'),
(53, 'Comedorsss'),
(54, 'Soraia'),
(55, 'Feliz'),
(56, 'dasd');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `IDCategorias` smallint(15) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  PRIMARY KEY (`IDCategorias`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`IDCategorias`, `Nome`) VALUES
(1, 'Ingrediente'),
(5, 'Chocolate'),
(4, 'Bebida'),
(6, 'Chocolate Grego'),
(7, 'Ãgua'),
(8, 'Ãgua do Mar'),
(9, 'FranÃ§a'),
(10, 'Limpeza'),
(11, 'Cerveja'),
(16, 'Casa'),
(19, ''),
(20, 'Pokemon'),
(21, 'Sal'),
(22, 'Ãgua com gÃ¡s'),
(23, 'Cards'),
(24, 'Pokemon'),
(25, 'Naringe'),
(26, 'Pokemon'),
(27, 'Cards'),
(28, 'Falia'),
(29, 'Ãgua com gÃ¡s'),
(30, 'Ãgua'),
(31, 'adsad'),
(32, 'asdasd'),
(33, 'Ingrediente');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `IDClientes` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `IP` varchar(100) NOT NULL,
  `Nivel` varchar(100) NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (`IDClientes`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`IDClientes`, `Nome`, `IP`, `Nivel`) VALUES
(109, 'Cliente', '::1', 'cliente'),
(108, 'Cliente', '192.168.1.45', 'cliente'),
(110, 'Cliente', '10.68.98.161', 'cliente'),
(111, 'Cliente', '10.68.98.160', 'cliente'),
(112, 'Cliente', '10.68.98.69', 'cliente'),
(113, 'Cliente', '10.68.98.44', 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `custos`
--

DROP TABLE IF EXISTS `custos`;
CREATE TABLE IF NOT EXISTS `custos` (
  `IDCustos` smallint(6) NOT NULL AUTO_INCREMENT,
  `Dia` date NOT NULL,
  `Valor` decimal(10,2) NOT NULL,
  `Tipo` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`IDCustos`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custos`
--

INSERT INTO `custos` (`IDCustos`, `Dia`, `Valor`, `Tipo`) VALUES
(3, '2019-12-04', '677.00', 'despesa'),
(2, '2019-12-10', '11111.00', 'receita'),
(4, '2019-12-08', '22.00', 'receita'),
(5, '2019-12-09', '22.00', 'receita'),
(6, '2019-12-14', '22.00', 'receita'),
(7, '2019-12-15', '22.00', 'receita'),
(8, '2019-12-07', '33.00', 'receita'),
(9, '2019-12-10', '22.00', 'despesa');

-- --------------------------------------------------------

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `IDFornecedores` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(200) NOT NULL,
  `CNPJ` varchar(20) NOT NULL,
  `Telefone` varchar(20) DEFAULT '',
  `Endereco` varchar(100) DEFAULT '',
  `Email` varchar(100) DEFAULT '',
  `CEP` varchar(15) NOT NULL DEFAULT '',
  `Prazo` varchar(50) DEFAULT '',
  `Pagamento` varchar(50) DEFAULT '',
  `Observacoes` varchar(1000) DEFAULT '',
  `Foto` varchar(100) NOT NULL DEFAULT 'null.png',
  `Estado` varchar(100) DEFAULT 'on',
  PRIMARY KEY (`IDFornecedores`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fornecedores`
--

INSERT INTO `fornecedores` (`IDFornecedores`, `Nome`, `CNPJ`, `Telefone`, `Endereco`, `Email`, `CEP`, `Prazo`, `Pagamento`, `Observacoes`, `Foto`, `Estado`) VALUES
(103, 'Farinha de Trigosaaa', '4535434', '321312', 'R. AgrolÃ¢ndia', '2019-09-21', '', NULL, NULL, NULL, 'null.png', 'on'),
(104, 'Claro Tim Vivos', '3123123', '123123', 'Claro Tim Vivo', '2019-09-13', '', NULL, NULL, NULL, 'null.png', 'on'),
(102, 'Farinha de Agua', '4535434', '321312', 'R. AgrolÃ¢ndia', '2019-09-21', '', NULL, NULL, NULL, 'null.png', 'on'),
(101, 'Ferro de passar roupa', '423134213', '999222333', 'Ferro de passar roupa', '2019-09-21', '', NULL, NULL, NULL, 'null.png', 'on'),
(100, 'Luccas', '45345643', '45635645', 'Vargina Ferni', '2001-01-01', '', NULL, NULL, NULL, 'null.png', 'on'),
(96, 'Sesc Itaquera', '323232', '23232', 'Rua Paula Souza', '2018-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(95, 'Burger King', '456345', '4353', 'Rua Zona Leste', '2020-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(94, 'McDonalds', '27454454', '6544545', 'Rua Virgnia', '2018-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(93, 'Sesc Itaquera', '323232', '23232', 'Rua Paula Souza', '2018-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(92, 'Burger King', '456345', '4353', 'Rua Zona Leste', '2020-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(91, 'McDonalds', '27454454', '6544545', 'Rua Virgnia', '2018-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(90, 'Sesc Itaquera', '323232', '23232', 'Rua Paula Souza', '2018-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(89, 'Burger King', '456345', '4353', 'Rua Zona Leste', '2020-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(88, 'McDonalds', '27454454', '6544545', 'Rua Virgnia', '2018-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(87, 'Sesc Itaquera', '323232', '23232', 'Rua Paula Souza', '2018-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(86, 'Burger King', '456345', '4353', 'Rua Zona Leste', '2020-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(85, 'McDonalds', '27454454', '6544545', 'Rua Virgnia', '2018-01-02', '', NULL, NULL, NULL, 'null.png', 'on'),
(105, 'Banco Santander', '4535434', '44234234', 'Banco Santander', 'bancor@gmail.com', '4324234', '2 dias', 'Array', 'Sou rico!', 'null.png', 'on'),
(106, 'Frivaca', '4535434', '999222333', 'R. AgrolÃ¢ndia', 'luccasambrosio@outlook.com', '08.121-210', '321 anos', 'Array', 'Casas Bahia', 'null.png', 'on'),
(107, 'ETEC de Itaquera', '4535434', '4324234', 'ETEC de Itaquera', 'etec@etec.com', '08.121-210', '2 dias', 'Array', 'ETEC de Itaquera', 'null.png', 'on'),
(108, 'Oswaldo Catalano', '213213', '34424', 'Oswaldo Catalano', 'luccasambrosio@outlook.com', '3424234', '321 anos', 'Array', 'Oswaldo Catalano', 'null.png', 'on'),
(109, 'USP', '4535434', '4234234', 'USP', 'usp@usp.com', '08.121-210', '23123', 'Array', 'USP', 'null.png', 'on'),
(110, 'Eu nÃ£o aguento mais', '4535434', '324234', 'Eu nÃ£o aguento mais', 'luccasambrosio@outlook.com', '213123', '2 dias', 'Array', 'Eu nÃ£o aguento mais', 'null.png', 'on'),
(111, 'Tristeza', '23123123', '23213', 'R. AgrolÃ¢ndia', 'trist@feliz.com', '08.121-210', '23 aguas', 'Cheque,', 'trist@feliz.com', 'null.png', 'on'),
(112, 'Silas Malafaia', '213123', '23123', 'R. AgrolÃ¢ndia', 'silas@ldas.com', '08.121-210', '2 dias', 'Cheque,', 'asdasdasd', 'null.png', 'on'),
(113, 'Disgrace', '2313', '4324234', 'R. AgrolÃ¢ndia', 'dassa@adasd.com', '08.121-210', '2 dias', 'Cheque,', 'asdasd', 'null.png', 'on'),
(114, 'Don\'t Stop Believing', '23213123', '34234', 'Don\'t Stop Believing', 'ican@feel.you', '213123', '324 dias', ',', 'Don\'t Stop Believing', 'null.png', 'on'),
(115, 'Junk of The Heart', '23123123', '5435345', 'Junk of The Heart', 'isjunk@ofmy.mind', '34234', '324234 dias', ',', 'Junk of The Heart', 'null.png', 'on'),
(116, 'You Aren\'t Me Baby', '213213', '4324234', 'R. AgrolÃ¢ndia', 'luccasambrosio@outlook.com', '08.121-210', '3213123 decadas', 'Cheque,', 'You Aren\'t Me Baby', 'null.png', 'on'),
(117, 'Canseiaaaaaaaaa', '45345643', '324234', 'Cansei', 'cansei@demais.com', '213123', '3213 decadas', ',', 'Cansei', 'null.png', 'on'),
(118, 'ItuibaÃ­na', '23213123', '34234', 'R. AgrolÃ¢ndia', 'lucas@lucas.com', '08.121-210', '324234 dias', ',dinheiro,debito,cheque,', 'wfgdfhg', '81aa5ca2f5a7573b677bdeeb907cdedd.png', 'off'),
(119, 'Aleluia?s', '3123123', '4324234', 'Aleluia?', 'lucas@lucas.com', '4234234', '43234', ',dinheiro,debito,boleto,', 'Aleluia?', '55775925baf5bfa472ddd604e923d16f.png', 'off'),
(121, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(122, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(123, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(124, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(125, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(126, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(127, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(128, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(129, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(130, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(131, '', '', '', '', '', '', '', ',', '', 'null.png', 'on'),
(132, 'Ana LÃºcia Souza Ambrosio', '23.123.123/2222-22', '(34) 2 34', 'R. AgrolÃ¢ndia', 'luccasambrosio@gmail.com', '08121-21', '23 aguas', ',dinheiro,debito,boleto,cheque,', '', 'null.png', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `IDFuncionarios` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Usuario` varchar(100) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Senha` varchar(100) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `Nivel` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'funcionario',
  `CPF` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Telefone` int(20) DEFAULT NULL,
  `IDCargos` smallint(15) NOT NULL DEFAULT '1',
  `Salario` decimal(10,2) NOT NULL DEFAULT '998.00',
  `DataAdmissao` date DEFAULT NULL,
  `DataNasc` date DEFAULT NULL,
  `Endereco` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `CEP` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `Foto` varchar(100) CHARACTER SET utf8 DEFAULT 'null.png',
  `Estado` varchar(100) COLLATE utf8_general_mysql500_ci DEFAULT 'on',
  PRIMARY KEY (`IDFuncionarios`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`IDFuncionarios`, `Nome`, `Usuario`, `Senha`, `Nivel`, `CPF`, `Telefone`, `IDCargos`, `Salario`, `DataAdmissao`, `DataNasc`, `Endereco`, `CEP`, `Foto`, `Estado`) VALUES
(27, 'kaue', '', '', 'funcionario', '0', 2312, 1, '998.00', '2019-08-02', '2019-08-28', 'R. AgrolÃ¢ndia', '213123123', '61cc13f35de6490f89190cc6e2506ceb.jpg', 'on'),
(25, 'Freira', '', '', 'funcionario', '0', 387482348, 1, '998.00', '2019-07-28', '2019-08-28', 'R. AgrolÃ¢ndia', '8', 'cef474f36d960fb22d64438fc5448889.png', 'off'),
(26, 'lucao', '', '', 'funcionario', '0', 387482348, 1, '998.00', '2019-07-28', '2019-08-28', 'R. AgrolÃ¢ndia', '8', '3a851463189deafee81825c35001ba6e.jpg', 'on'),
(17, 'aaaaaaaaa', '', '', 'funcionario', '0', 23, 54, '998.00', '2019-07-29', '2019-08-08', 'R. AgrolÃ¢ndia', '1111111111', '6bcdf78df8e5884ed6e53947a9071559eeb6b67e3128c265ce0215972227d206_full.webp', 'on'),
(18, 'Ana LÃºcia Souza Ambrosio', '', '', 'funcionario', '0', 23123, 54, '998.00', '2019-08-01', '2019-08-29', 'R. AgrolÃ¢ndia', '8', '0831a92fa9d35926d9203d77a25c2584', 'on'),
(19, 'Ana LÃºcia Souza Ambrosiaoa', '', '', 'funcionario', '0', 23123, 1, '998.00', '2019-08-01', '2019-08-29', 'R. AgrolÃ¢ndia', '8', '77a5feae82d6391e0524e1aa7334099c', 'on'),
(20, 'Ana LÃºcia Souza Ambrosio', '', '', 'funcionario', '0', 0, 1, '998.00', '2019-08-01', '2019-08-22', 'R. AgrolÃ¢ndia', '8', '24c2bc4a5d51349ac13e3817ea52ce69webp', 'on'),
(21, 'a', '', '', 'funcionario', '0', 999222333, 1, '998.00', '2019-07-31', '2019-08-22', 'R. AgrolÃ¢ndia', '8', 'ab08795c28f3f5c83c08140ad7c5fdc0.png', 'off'),
(22, 'Ana LÃºcia Souza Ambrosio', '', '', 'funcionario', '0', 999222333, 1, '998.00', '2019-07-29', '2019-08-23', 'R. AgrolÃ¢ndia', '8', '127d0316421c77176575a4c65a68b4b7.png', 'on'),
(23, 'Rogerinhos', '', '', 'funcionario', '0', 999222333, 1, '998.00', '2019-08-05', '2019-08-23', 'R. AgrolÃ¢ndia', '8', '1295d1e5d7f7694ecdea6e1cded823d7.png', 'on'),
(24, 'FLAVIA', '', '', 'funcionario', '0', 999222333, 1, '998.00', '2019-07-29', '2019-08-28', 'R. AgrolÃ¢ndia', '8', 'e27785e704a0e7da2cf63a0f857db4d4.png', 'on'),
(30, 'MEUDEUSDOCEU', '', '', 'funcionario', '0', 999222333, 1, '998.00', '2019-07-30', '2019-08-29', 'R. AgrolÃ¢ndia', '8', '98e13f3225d10f13695ccc45178d84c8.png', 'on'),
(31, 'MOÃ‡A', '', '', 'funcionario', '0', 23123, 1, '998.00', '2019-08-01', '2019-08-29', 'R. AgrolÃ¢ndia', '8', '7969f67a9e63058ea127000661b52d62.jpg', 'on'),
(32, 'LUCCAS', '', '', 'funcionario', '0', 123123, 1, '998.00', '2019-07-30', '2019-08-30', 'LUCCASAMBROSIO', '123213', '9dd4e461268c8034f5c8564e155c67a6.jpg', 'on'),
(33, 'LUCAODOGL', '', '', 'funcionario', '0', 2312312, 1, '998.00', '2019-08-01', '2019-08-28', 'LUCAODOGL', '23123123', '76419bb123984d6cc9af3e54e360d6c3.jpg', 'on'),
(34, 'Ana LÃºcia Souza Ambrosio', '', '', 'funcionario', '0', 212312, 1, '998.00', '2019-07-30', '2019-08-21', 'R. AgrolÃ¢ndia', '8', '12c5e3708c337e5d98678a6366289d97.png', 'on'),
(41, 'Luccas Ambrosiossss', 'luccasambrosio@gmail.com', '8eb920cc8359b29063d093a9599097be', 'admin', '666', 940028922, 1, '998.00', '2019-09-04', '2019-09-07', 'Avenida Pires do z', '82224103', 'null.png', 'on'),
(43, 'LUCCAODOGRAU', 'cozinha@cozinha.com', '82ee206b2ad6bd2fe12b5d785e96953c', 'cozinha', '342343', 4324, 1, '998.00', '2019-02-02', '2019-01-01', 'CASA', '30943', 'null.png', 'on'),
(44, 'lUCCAOSS', NULL, NULL, 'funcionario', '345345', 43434, 1, '998.00', '2019-09-04', '2019-09-26', 'lUCCAOSS', '545345', 'null.png', 'on'),
(45, 'Fernando', NULL, NULL, 'funcionario', '32432432', 343243, 1, '998.00', '2019-09-03', '2019-09-07', 'Fernando', '02912312', 'null.png', 'on'),
(46, 'Fernandosss', NULL, NULL, 'funcionario', '4545', 992120212, 1, '998.00', '2019-09-05', '2019-09-07', 'Fernandosss', '5454', 'null.png', 'on'),
(49, 'LUCCASAMBROSIO', NULL, NULL, 'funcionario', '343434', 434343, 1, '998.00', '2019-09-06', '2019-09-28', 'LUCCASAMBROSIO', '3432434', '31d1d5449e89255bb779605d7257560f.png', 'on'),
(48, 'THALESDS', NULL, NULL, 'funcionario', '56565', 4312434, 1, '998.00', '2019-09-05', '2019-09-20', 'THALESDS', '6565', '67ad6168e2abcb74ce0b8c2240cc9acc.png', 'on'),
(50, 'LUCCASAMBROSIO', NULL, NULL, 'funcionario', '343434', 434343, 1, '998.00', '2019-09-06', '2019-09-28', 'LUCCASAMBROSIO', '3432434', 'b74029feeb77471bcb21b9d1698acdd2.png', 'on'),
(51, 'MANONÃƒOTENHONOMEVEIMEAJUDA\'\'\'\'\'\'', NULL, NULL, 'funcionario', '123456789', 40028922, 1, '998.00', '2004-06-05', '2026-05-30', '', '08410-010', NULL, 'on'),
(52, 'Luccas', NULL, NULL, 'funcionario', '543543', 1195236091, 1, '998.00', '2019-09-03', '2019-02-27', 'erfgdsfgsdf', '534534', 'f5aa9e3b453804b5d22a874499d46db2.png', 'on'),
(55, 'Coxinha de Frango', NULL, NULL, 'funcionario', '232', 34234234, 1, '998.00', '2019-08-27', '2019-09-07', 'Coxinha de Frango', '45435', 'cbaec433d38666c1c1970af9dd61106d.png', 'off'),
(54, 'aa', NULL, NULL, 'admin', '232323', 999222333, 56, '998.00', '2019-09-07', '2019-09-07', 'QueriaMorrer', '32323', 'null.png', 'on'),
(56, 'Elefante', NULL, NULL, 'admin', '131231233', 32423423, 1, '998.00', '2019-10-01', '2019-09-07', 'Cage The Elephant', '213123', 'c59be228928d686f5c9c94fc27cb69c5.png', 'off'),
(57, 'Ambrosio', NULL, NULL, 'funcionario', '0875522321', 999222333, 1, '998.00', '2019-09-07', '2019-09-07', 'R. AgrolÃ¢ndia', '08.121-210', '366cd89a0e86a2c2793fe30306b52129.png', 'off'),
(58, 'asd', NULL, NULL, 'funcionario', '23213', 34234, 1, '998.00', '2019-09-04', '2019-09-27', 'R. AgrolÃ¢ndiasaz', '08.121-210', '4348f938bbddd8475e967ccb47ecb234.png', 'off'),
(67, 'a', 'luccas@gmail.com', '8eb920cc8359b29063d093a9599097be', 'cozinha', '232.322.222-22', 2, 1, '998.00', '2019-12-07', '2019-12-06', 'rererere', '22222-222', 'c1d9f50f86825a1a2302ec2449c17196.png', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `IDIngredientes` smallint(6) NOT NULL AUTO_INCREMENT,
  `IDProdutos` smallint(6) NOT NULL,
  `IDPratos` smallint(6) NOT NULL,
  `Qtd` smallint(6) NOT NULL,
  `IDMedidas` smallint(6) NOT NULL,
  PRIMARY KEY (`IDIngredientes`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredientes`
--

INSERT INTO `ingredientes` (`IDIngredientes`, `IDProdutos`, `IDPratos`, `Qtd`, `IDMedidas`) VALUES
(1, 27, 18, 23, 1),
(29, 34, 21, 4, 1),
(5, 37, 20, 2, 2),
(9, 37, 22, 1, 2),
(56, 34, 23, 10, 1),
(57, 38, 25, 12, 1),
(58, 35, 25, 4, 2),
(60, 37, 26, 2222, 1),
(61, 29, 27, 4, 1),
(62, 32, 29, 5, 1),
(63, 28, 29, 4, 2),
(71, 37, 30, 3, 2),
(70, 19, 30, 4, 2),
(72, 38, 31, 22, 1),
(73, 34, 31, 1, 1),
(74, 27, 31, 7, 2),
(77, 38, 32, 11, 1),
(78, 37, 32, 16, 2),
(83, 49, 34, 100, 1),
(82, 32, 33, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
  `IDItens` smallint(6) NOT NULL AUTO_INCREMENT,
  `IDPedidos` smallint(6) NOT NULL,
  `IDPratos` smallint(6) NOT NULL,
  `Qtd` tinyint(4) NOT NULL,
  `Obs` text,
  PRIMARY KEY (`IDItens`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `itens`
--

INSERT INTO `itens` (`IDItens`, `IDPedidos`, `IDPratos`, `Qtd`, `Obs`) VALUES
(93, 94, 3, 6, 'jkniuoppip'),
(92, 94, 4, 7, ''),
(91, 95, 14, 2, ''),
(90, 94, 15, 5, 'asd'),
(89, 93, 15, 3, ''),
(94, 98, 15, 3, ''),
(95, 101, 3, 5, 'sem sabonete'),
(96, 101, 16, 3, 'sem carne'),
(97, 101, 15, 1, 'sem luccas'),
(98, 103, 16, 9, 'ghbsdhk'),
(99, 98, 16, 7, 'rteyeryt'),
(100, 105, 16, 3, 'heu kbdujctg k yttf Kissinger Judi Jethro laiutu lembro '),
(101, 107, 25, 14, ''),
(102, 111, 34, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `medidas`
--

DROP TABLE IF EXISTS `medidas`;
CREATE TABLE IF NOT EXISTS `medidas` (
  `IDMedidas` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`IDMedidas`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medidas`
--

INSERT INTO `medidas` (`IDMedidas`, `Nome`) VALUES
(1, 'gramas'),
(2, 'mililitros');

-- --------------------------------------------------------

--
-- Table structure for table `mesas`
--

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE IF NOT EXISTS `mesas` (
  `IDMesas` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `IP` varchar(100) NOT NULL,
  `Estado` varchar(20) DEFAULT 'on',
  PRIMARY KEY (`IDMesas`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mesas`
--

INSERT INTO `mesas` (`IDMesas`, `Nome`, `IP`, `Estado`) VALUES
(1, 'L2CORE501', '10.68.98.122', 'on'),
(2, 'L2CORE502', '10.68.98.123', 'on'),
(3, 'L2CORE503', '10.68.98.124', 'on'),
(4, 'L2CORE504', '10.68.98.125', 'on'),
(5, 'L2CORE505', '10.68.98.126', 'on'),
(6, 'L2CORE506', '10.68.98.127', 'on'),
(7, 'Computador de Luccas', '10.68.98.161', 'on'),
(8, 'PC da Giselle', '10.68.98.159', 'on'),
(9, 'PC do Luccas', '192.168.1.45', 'on'),
(10, 'Perolas', '', 'on'),
(11, '', '', 'on'),
(12, '', '', 'on'),
(13, '', '', 'on'),
(14, '', '', 'on'),
(15, 'Perolas', '', 'on'),
(16, 'Perolas', '', 'on'),
(17, '', '', 'on'),
(18, '', '', 'on'),
(19, '', '', 'on'),
(20, '', '', 'on'),
(21, '2', '10.0.0.0/16', 'on'),
(22, 'PC do Thales', '10.68.98.160', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `IDPedidos` smallint(6) NOT NULL AUTO_INCREMENT,
  `IDClientes` smallint(6) NOT NULL,
  `Observacoes` varchar(1000) DEFAULT NULL,
  `Estado` varchar(100) DEFAULT 'aberto',
  `DataEnvio` datetime DEFAULT NULL,
  PRIMARY KEY (`IDPedidos`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`IDPedidos`, `IDClientes`, `Observacoes`, `Estado`, `DataEnvio`) VALUES
(95, 108, NULL, 'pronto', '2019-12-08 23:43:46'),
(93, 108, NULL, 'pronto', '2019-12-08 23:37:44'),
(94, 108, NULL, 'preparo', '2019-12-10 08:16:56'),
(96, 108, NULL, 'aberto', NULL),
(97, 108, NULL, 'aberto', NULL),
(98, 110, NULL, 'aberto', '2019-12-09 13:49:55'),
(99, 110, NULL, 'aberto', NULL),
(100, 110, NULL, 'aberto', NULL),
(101, 111, NULL, 'entregue', '2019-12-09 14:01:01'),
(102, 111, NULL, 'aberto', NULL),
(103, 112, NULL, 'preparo', '2019-12-09 14:53:00'),
(104, 112, NULL, 'aberto', NULL),
(105, 112, NULL, 'preparo', '2019-12-09 14:53:49'),
(106, 112, NULL, 'aberto', NULL),
(107, 113, NULL, 'aberto', NULL),
(108, 113, NULL, 'aberto', NULL),
(109, 113, NULL, 'aberto', NULL),
(110, 109, NULL, 'aberto', NULL),
(111, 108, NULL, 'pronto', '2019-12-10 08:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `pratos`
--

DROP TABLE IF EXISTS `pratos`;
CREATE TABLE IF NOT EXISTS `pratos` (
  `IDPratos` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Descricao` varchar(200) NOT NULL,
  `Preco` decimal(15,2) NOT NULL DEFAULT '1.00',
  `Foto` varchar(100) NOT NULL DEFAULT 'null.png',
  `Estado` varchar(100) DEFAULT 'on',
  PRIMARY KEY (`IDPratos`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pratos`
--

INSERT INTO `pratos` (`IDPratos`, `Nome`, `Descricao`, `Preco`, `Foto`, `Estado`) VALUES
(1, 'Strogonoff de Alho', 'Muito gostoso, compra por favor', '434343.00', 'estragadonofe.jpg', 'on'),
(2, 'Strogonoff de Cancer', 'Muito gostoso, compra por favor', '434343.00', 'estragadonofe.jpg', 'on'),
(3, 'Saboneteira de Carnes', 'Gostosa demais!', '43234.00', 'e0e57e70d95796e5c2da740f8c45f9f1.png', 'on'),
(4, 'All You See Is It Fall', 'FOR ALL THE TIMES I\'D NEVER NEVER TURNED AWAY', '12312.00', 'a6cdd8e0d1603207cb11778bfb405e5b.png', 'on'),
(12, 'Pato Fritos', 'Muito bom', '500.00', 'null.png', 'on'),
(13, 'Frita com AÃ§Ãºcar', 'MUITO BOM', '1.00', '5206560a306a2e085a437fd258eb57ce.png', 'off'),
(14, 'RICARDO ELETRO', 'casas bahia', '43234.00', 'null.png', 'on'),
(15, 'Luccas', 'adasdasd', '2332.00', 'null.png', 'on'),
(16, 'LUIZ CARNE', 'DNTGSRIJOTJIOERTER', '2323.00', 'c55010bb1576c428ca0c603f2095b730.png', 'on'),
(17, 'asdas', 'adadad', '232.00', 'null.png', 'on'),
(18, 'Luccas', 'asdsadas', '2323.00', 'c45de709033f4b824b6fbb394c5b38ed.png', 'on'),
(19, 'CU', 'CU', '23.00', 'null.png', 'on'),
(20, 'sadas', 'asdas', '23.00', 'null.png', 'on'),
(21, 'CUAISDG', '1ASDASD', '22.00', 'null.png', 'on'),
(22, 'KALIUDA', '23ASDASDAS', '2.00', 'null.png', 'on'),
(23, 'nnnnnnn', 'sadasd', '1.00', 'b5df1005999c28cef9a77a212c374573.png', 'on'),
(24, 'wsqfda', 'sdas', '23.00', 'null.png', 'on'),
(25, 'Arroz com ovo', 'arroz a grelha com ovo cozido ou se preferir frito.', '100.00', 'f6becfd47c9285ea907ae3c1971cb526.png', 'on'),
(26, 'MÃ¡quina de Levar Electrolux', 'MÃ¡quina de Levar ElectroluxMÃ¡quina de Levar Electrolux', '2.00', 'null.png', 'on'),
(27, 'Geladeira Eletroaaa', 'a', '500.00', 'null.png', 'on'),
(28, 'Vinizzzz', 'WDFSG', '230.00', 'null.png', 'on'),
(29, 'ASFDFDGDSG', 'DSGSDG', '500.00', 'null.png', 'on'),
(30, 'biazinha bandida da zl', 'sffgdg', '2.00', 'null.png', 'on'),
(31, 'Ambrosio', '', '500.00', 'null.png', 'on'),
(32, 'Ana LÃºcia Souza Ambrosio', '', '500.00', 'null.png', 'on'),
(33, 'sagaz', 'sagaz', '2.00', 'null.png', 'on'),
(34, 'Comida Real', 'Comida Real', '22.00', 'null.png', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `IDProdutos` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Qtd` smallint(6) DEFAULT NULL,
  `IDMedidas` smallint(6) NOT NULL,
  `CodBarra` varchar(100) DEFAULT NULL,
  `DataFab` date DEFAULT '2001-01-01',
  `DataVal` date DEFAULT '2001-01-11',
  `IDFornecedores` smallint(6) DEFAULT NULL,
  `IDCategorias` smallint(20) NOT NULL DEFAULT '1',
  `Foto` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'null.png',
  `Estado` varchar(100) DEFAULT 'on',
  PRIMARY KEY (`IDProdutos`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`IDProdutos`, `Nome`, `Qtd`, `IDMedidas`, `CodBarra`, `DataFab`, `DataVal`, `IDFornecedores`, `IDCategorias`, `Foto`, `Estado`) VALUES
(20, 'AMOR', 0, 0, '40028922', '2019-08-14', '2019-08-14', 102, 1, '54638196_1GG.jpg', 'on'),
(21, 'KAUE', 0, 0, '444', '2019-08-15', '2019-08-13', 89, 1, 'aaa.png', 'on'),
(22, 'Carne', 0, 0, '4444', '2019-08-07', '2019-08-05', 85, 1, 'foto.jpg', 'on'),
(23, 'Carne', 0, 0, '44444', '2019-08-30', '2019-08-27', 85, 1, 'baf01ffa356828a0bee3eefa157168a8.png', 'on'),
(24, 'Carne', 0, 0, '2132', '2019-08-01', '2019-07-30', 93, 1, '21c2e59531c8710156d34a3c30ac81d5.png', 'on'),
(25, 'Carne', 0, 0, '454545', '2019-08-22', '2019-08-22', 87, 1, 'c174a90c84870d254fb95aa017fe6734.png', 'on'),
(19, 'KAUE', 0, 0, '40028922', '2019-08-14', '2019-08-15', 103, 1, '127828850_1GG.png', 'on'),
(26, 'aaaa', 0, 0, '23', '2019-08-08', '2019-08-27', 104, 1, 'download.fw.png', 'on'),
(27, 'aaaa', 0, 0, '2313213', '2019-08-01', '2019-08-20', 88, 1, 'glee.png.png', 'on'),
(28, 'Carne', 0, 0, '40028922', '2019-08-22', '2019-08-21', 85, 1, '29560997-sofa-de-canto-5-lugares-sued-animaleoni001-509-1-600x428.jpg', 'on'),
(29, 'Liquidificador Philcos', 8, 0, '546435645645645', '2019-09-05', '2019-09-07', 85, 1, '629b8667b236d98e908bb93d5297423d.jpg', 'on'),
(32, 'Sas', 23, 0, '2313', '2019-09-03', '2019-09-07', 96, 1, 'b088b126e9f5554ffc4f6fb574702753.png', 'on'),
(33, 'Saboneteira', 23, 0, '2313', '2019-09-03', '2019-09-07', 96, 1, '24dc0c8d7d3c44bfabacc31c2ae3bab4.png', 'on'),
(34, 'Saboneteira', 23, 0, '2313', '2019-09-03', '2019-09-07', 96, 1, '367b6570cc72c87fd6ad6dd64ae7d26c.png', 'on'),
(35, 'ThalesHenriqueseeaa11111', 23, 0, '3123123', '2019-09-07', '2019-09-28', 85, 1, '31b91bf726a7b4780de706511d084591.png', 'on'),
(37, 'Ana LÃºcia Souza Ambrosio', 2, 0, '3123123', '2019-09-07', '2019-09-07', 87, 1, '48c28293874d9eafcaef5617b5f26df7.png', 'on'),
(38, 'Danilosss', 3213, 0, '4324', '2019-09-26', '2019-09-07', 88, 1, 'd04acd15712bf6d0dbb6327318e681b6.png', 'on'),
(39, 'Geladeira In Blue', 23123, 2, '23213', '2019-09-07', '2019-12-12', 85, 20, 'null.png', 'on'),
(40, 'CEBOLA', 3213, 0, '213123', '2019-09-21', '2019-12-14', 105, 33, 'null.png', 'on'),
(41, 'CARNEs', 1, 1, '40028922', '2019-09-30', '2019-12-21', 111, 33, 'null.png', 'on'),
(47, 'aa', 2, 2, '324', '2019-05-05', '2019-12-13', 102, 33, 'null.png', 'on'),
(48, 'Saboneteira', 2, 0, '232', '2019-10-01', '2019-10-05', 107, 7, '8295c40bd8d556e56d45fd58a7d5abf7.png', 'off'),
(49, 'Arroz Real', 200, 1, '2222222222222222222', '2019-12-10', '2019-12-11', 85, 1, 'd5878e07fe8073ed27fb1e7772d4ebe9.png', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
CREATE TABLE IF NOT EXISTS `tarefas` (
  `IDTarefas` int(6) NOT NULL AUTO_INCREMENT,
  `Descricao` text NOT NULL,
  `IDFuncionarios` smallint(6) NOT NULL,
  PRIMARY KEY (`IDTarefas`)
) ENGINE=MyISAM AUTO_INCREMENT=573 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tarefas`
--

INSERT INTO `tarefas` (`IDTarefas`, `Descricao`, `IDFuncionarios`) VALUES
(572, 'Luccas', 41),
(571, 'Luccas', 41),
(570, 'Luccas', 41);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
