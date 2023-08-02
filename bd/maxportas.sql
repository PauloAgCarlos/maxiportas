-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jul-2023 às 20:50
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `maxportas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `cpf_cnpj` varchar(50) NOT NULL,
  `nome_razao_socil` varchar(50) NOT NULL,
  `contato` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `cpf_cnpj`, `nome_razao_socil`, `contato`, `telefone`, `celular`, `email`, `senha`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES
(14, '010101', 'HJ Allúminios', '9999999999', '(00) 93593-59359', '(00)00000-0000', 'paulo@gmail.com', '1111111111', 'São Paulo', '11111-111', '999999999', 'Complemento HJ', 'Bairro User', 'Cidade User', 'Es'),
(15, '999999', 'HJ Allúminio', '9999999999', '(00) 93593-59359', '(00)00000-0000', 'teste02@gmail.com', 'wwwwwwww', '10101-111', 'São Paulo', '999999999', 'Complemento HJ', 'Bairro Paulo', 'Cidade Paulo', 'Estado 1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `img_backup`
--

CREATE TABLE `img_backup` (
  `id` int(11) NOT NULL,
  `imagem_backup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `img_backup`
--

INSERT INTO `img_backup` (`id`, `imagem_backup`) VALUES
(1, 'upload/avatar10.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logado`
--

CREATE TABLE `logado` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cpf` int(100) NOT NULL,
  `rg` int(20) NOT NULL,
  `cep` int(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `nascimento` varchar(100) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logado`
--

INSERT INTO `logado` (`id`, `nome`, `email`, `senha`, `cpf`, `rg`, `cep`, `endereco`, `telefone`, `complemento`, `bairro`, `cidade`, `uf`, `nascimento`, `nivel`) VALUES
(12, 'Torres', 'teste@gmail.com', '12345', 10101, 1, 10101, 'EndereçoUser', '0', 'Complemento', 'Bairro', 'Cidade', 'Uf', '1222222', 'user'),
(15, 'Paulo', 'paulo@gmail.com', '121212', 1001, 1, 100, 'Endereço Paulo', '(00) 93593-59359', 'Complemento Paulo', 'Bairro Paulo', 'Cidade Paulo', '001', '01/01/2000', 'adm'),
(18, 'Alfredo', 'alfredo@teste.com', '1211', 111111, 11, 11111, 'Endereço Alfredo', '(11) 11111-11111', 'Complemento Alfredo', 'Bairro Alfredo', 'Cidade Alfredo', '11', '11/22/2022', 'user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `razaosocial` varchar(50) NOT NULL,
  `nomefantasia` varchar(50) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `endreco` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `codigointerno` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `ie` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `razaosocial`, `nomefantasia`, `complemento`, `cidade`, `endreco`, `email`, `instagram`, `facebook`, `codigointerno`, `bairro`, `cnpj`, `cep`, `uf`, `ie`, `numero`, `telefone`, `imagem`) VALUES
(31, 'Teste', 'Name Fantasia', 'Complemento HJ', 'Cidade User', 'Endereço Name', 'gaivotas@teste.com', 'instagram', 'facebook', '1111111', 'Bairro User', '1111', '11111-111', '11', '2222222', '999999999', '(99) 12211-22222', 'upload/64bfc98bcfb3b.png'),
(60, 'Teste', 'Name Fantasia', 'Complemento HJ', 'Cidade User', 'Endereço Name', 'gaivotas@teste.com', 'instagram', 'facebook', '1111111', 'Bairro User', '1111', '11111-111', '11', '2222222', '999999999', '(99) 12211-22222', 'upload/64bffd2002a44.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `img_backup`
--
ALTER TABLE `img_backup`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logado`
--
ALTER TABLE `logado`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `parceiros`
--
ALTER TABLE `parceiros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `img_backup`
--
ALTER TABLE `img_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `logado`
--
ALTER TABLE `logado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
