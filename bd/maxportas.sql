-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Ago-2023 às 13:56
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
-- Estrutura da tabela `acessorios`
--

CREATE TABLE `acessorios` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `observacao` text NOT NULL,
  `custo_unitario` decimal(10,0) NOT NULL,
  `markup` decimal(10,0) NOT NULL,
  `valor_unitario` decimal(10,0) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `tipo_do_acessorio` varchar(255) NOT NULL,
  `desconto_corte` decimal(10,0) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `codigo_da_fabrica` varchar(255) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acessorios`
--

INSERT INTO `acessorios` (`id`, `descricao`, `codigo_produto`, `observacao`, `custo_unitario`, `markup`, `valor_unitario`, `unidade`, `tipo_do_acessorio`, `desconto_corte`, `imagem`, `codigo_da_fabrica`, `ultima_alteracao`, `ativo`) VALUES
(1, 'Descrição Toorescode', 'CAcHJ-hrgfue', 'vugfchgkjm', '0', '0', '0', 'Unidade', 'Outro', '0', 'upload/64d21bc389cea.png', '11', '2023-08-10', '');

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
(42, '999999', 'HJ Allúminio', '', '', '', '', '', '', '', '', '', '', '', 'Selecione...'),
(44, '111111', 'HJ Allúminios Update', '', '', '', '', '', '', '', '', '', '', '', 'Selecione...'),
(47, '111111', 'HJ Allúminios Update', '9999999999', '', '', '', '', '', '', '', '', '', '', 'Selecione...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `esquadretas`
--

CREATE TABLE `esquadretas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `observacao` text NOT NULL,
  `custo_metro` decimal(10,0) NOT NULL,
  `markup` decimal(10,0) NOT NULL,
  `valor_unitario` decimal(10,0) NOT NULL,
  `agregar` varchar(255) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `codigo_da_fabrica` varchar(100) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `esquadretas`
--

INSERT INTO `esquadretas` (`id`, `descricao`, `observacao`, `custo_metro`, `markup`, `valor_unitario`, `agregar`, `codigo_produto`, `unidade`, `imagem`, `codigo_da_fabrica`, `ultima_alteracao`, `ativo`) VALUES
(2, 'Descrição', 'ffregrt', '0', '0', '0', 'Agregar Simples', 'CEsHJ-7d6', 'Unidade', 'upload/64ccf70a8f7df.png', '', '2023-08-16', 'on'),
(3, 'Descrição 1 Updateaaa', 'sdfrsfweew', '2', '11', '21', 'Agregar Simples1', 'CEsHJ-91c', 'Unidade2', 'upload/64cd02e686e17.png', '11', '2023-08-23', 'on'),
(4, 'DescriçãoUpdate', 'Afghfy', '2', '11', '21', 'Agregar Simples3', 'CEsHJ-d16', 'Unidade1', 'upload/64cd5052c0d2b.png', '11', '2023-08-24', 'on'),
(5, 'Descrição', 'bjvjhm', '0', '0', '0', 'Agregar Simples', 'CEsHJ-bnjs88', 'Unidade', 'upload/64d14f9e30258.png', '', '2023-08-10', 'on');

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
-- Estrutura da tabela `insumos`
--

CREATE TABLE `insumos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `observacao` text NOT NULL,
  `custo` decimal(10,0) NOT NULL,
  `markup` decimal(10,0) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `unidade` varchar(100) NOT NULL,
  `codigo_da_fabrica` varchar(100) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `insumos`
--

INSERT INTO `insumos` (`id`, `descricao`, `codigo_produto`, `observacao`, `custo`, `markup`, `valor`, `unidade`, `codigo_da_fabrica`, `ultima_alteracao`, `imagem`, `ativo`) VALUES
(2, 'Alfredo Torres', 'CInHJ-124002', 'hjdfbvilerbh', '0', '0', '0', 'Unidade', '', '2023-08-24', 'upload/64d221d195fd2.png', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logado`
--

CREATE TABLE `logado` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `parceiro_colaborador` varchar(100) NOT NULL,
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

INSERT INTO `logado` (`id`, `nome`, `email`, `senha`, `parceiro_colaborador`, `cpf`, `rg`, `cep`, `endereco`, `telefone`, `complemento`, `bairro`, `cidade`, `uf`, `nascimento`, `nivel`) VALUES
(12, 'Torres', 'teste@gmail.com', '12345', '', 10101, 1, 10101, 'EndereçoUser', '0', 'Complemento', 'Bairro', 'Cidade', 'Uf', '1222222', 'user'),
(15, 'Paulo', 'paulo@gmail.com', '121212', '', 1001, 1, 100, 'Endereço Paulo', '(00) 93593-59359', 'Complemento Paulo', 'Bairro Paulo', 'Cidade Paulo', '001', '01/01/2000', 'adm'),
(18, 'Alfredo', 'alfredo@teste.com', '1211', '', 111111, 11, 11111, 'Endereço Alfredo', '(11) 11111-11111', 'Complemento Alfredo', 'Bairro Alfredo', 'Cidade Alfredo', '11', '11/22/2022', 'user'),
(19, 'adm', 'paulo@gmail.com', '212333', '', 0, 0, 11111, '', '(99) 12211-22222', '', 'Bairro', '', '11111', '11/11/1111', 'adm'),
(20, 'adm', 'gaivotas@teste.com', '344323443', '', 111111, 2, 11111, 'V2', '(11) 01101-10110', 'Complemento', 'Bairro Paulo', 'Cidade Paulo', '111111', '12/11/2020', 'adm'),
(21, 'TC', 'tc@gmail.com', '0192837465', 'Colaborador', 111111, 2, 11111, 'V2', '(99) 12211-22222', 'Complemento TC', 'Bairro São Paulo', 'Brasil', '111111', '01/01/2000', 'adm');

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
(70, 'Name Razão Social', 'Name Fantasia', 'Complemento HJ', 'Cidade User', 'Endereço Name', 'gaivotas@teste.com', 'instagram', 'facebook', '1111111', 'Bairro User', '2022', '0000', '11', '2222222', '999999999', '(00) 93593-59359', 'upload/64c846bacf2f8.png'),
(72, 'Name Razão SocialAAAAA', 'Name Fantasia', 'Complemento HJ', 'Cidade User', 'Endereço Name', 'gaivotas@teste.com', 'instagram', 'facebook', '1111111', 'Bairro User', '1111', '11111-111', '11', '2222222', '999999999', '(99) 12211-22222', 'upload/64c8481f96402.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `puxadoracoplado` varchar(11) NOT NULL,
  `ponteira_acoplado` varchar(11) NOT NULL,
  `ponteira_obrigatoria` varchar(11) NOT NULL,
  `exige_pinturano_vidro` varchar(11) NOT NULL,
  `agregar` varchar(255) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `vidro` varchar(255) NOT NULL,
  `esquadreta` varchar(255) NOT NULL,
  `esquadreta_reforcada_a` varchar(255) NOT NULL,
  `esquadreta_reforcada_b` varchar(255) NOT NULL,
  `esquadreta_dupla` varchar(255) NOT NULL,
  `custo_metro` decimal(10,2) NOT NULL,
  `desconto_corte_perfil` decimal(10,2) NOT NULL,
  `desconto_corte_vidro` decimal(10,2) NOT NULL,
  `desconto_corte_travessa` decimal(10,2) NOT NULL,
  `desconto_corte_travessa_oculta` decimal(10,2) NOT NULL,
  `perda_bordas` decimal(10,2) NOT NULL,
  `perda_corte` decimal(10,2) NOT NULL,
  `dimensao` decimal(10,2) NOT NULL,
  `perda_bordas_retalho` decimal(10,2) NOT NULL,
  `perda_corte_retalho` decimal(10,2) NOT NULL,
  `codigo_produto` varchar(50) NOT NULL,
  `ultima_alteracao` decimal(10,2) NOT NULL,
  `largura_da_mascara` decimal(10,2) NOT NULL,
  `codigo_da_fabrica` decimal(10,2) NOT NULL,
  `referencias_do_mercado` text NOT NULL,
  `detalhes` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ativo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `descricao`, `puxadoracoplado`, `ponteira_acoplado`, `ponteira_obrigatoria`, `exige_pinturano_vidro`, `agregar`, `unidade`, `vidro`, `esquadreta`, `esquadreta_reforcada_a`, `esquadreta_reforcada_b`, `esquadreta_dupla`, `custo_metro`, `desconto_corte_perfil`, `desconto_corte_vidro`, `desconto_corte_travessa`, `desconto_corte_travessa_oculta`, `perda_bordas`, `perda_corte`, `dimensao`, `perda_bordas_retalho`, `perda_corte_retalho`, `codigo_produto`, `ultima_alteracao`, `largura_da_mascara`, `codigo_da_fabrica`, `referencias_do_mercado`, `detalhes`, `imagem`, `ativo`) VALUES
(16, 'Nome Consulta 2', 'on', '', '', '', 'Agregar Simples', 'Metro', 'Vidro Simples', 'Esquadreta', 'Esquadreta Reforcada A ', 'Esquadreta Reforcada B ', 'on', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'CPHJ-236', '0.00', '0.00', '0.00', '', '', 'upload/64c8e6b17f244.png', 'on'),
(18, 'Descrição 22', 'on', 'on', 'on', 'on', 'Agregar Simples', 'Metro', 'Vidro Simples', 'Esquadreta', 'Esquadreta Reforcada A ', 'Esquadreta Reforcada B ', 'on', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'CPHJ-gfruyu', '0.00', '0.00', '0.00', 'gfvk', 'bhjkjjhm', 'upload/64d14c9f86635.png', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `puxadores`
--

CREATE TABLE `puxadores` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `usinagem_box_tres` varchar(100) NOT NULL,
  `medida_maxima_para_usinagem` varchar(100) NOT NULL,
  `agregar` varchar(255) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `codigo_da_fabrica` varchar(100) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `ponteira_obrigatoria` varchar(20) NOT NULL,
  `referencias_do_mercado` text NOT NULL,
  `custo_metro` decimal(10,0) NOT NULL,
  `markup` decimal(10,0) NOT NULL,
  `metragem_minima` decimal(10,0) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `desconto_corte` varchar(10) NOT NULL,
  `perda` decimal(10,0) NOT NULL,
  `perda_bordas` decimal(10,0) NOT NULL,
  `perda_corte` decimal(10,0) NOT NULL,
  `dimensao` decimal(10,0) NOT NULL,
  `perda_bordas_retalho` decimal(10,0) NOT NULL,
  `perda_corte_retalho` decimal(10,0) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `puxadores`
--

INSERT INTO `puxadores` (`id`, `descricao`, `usinagem_box_tres`, `medida_maxima_para_usinagem`, `agregar`, `unidade`, `codigo_da_fabrica`, `codigo_produto`, `ponteira_obrigatoria`, `referencias_do_mercado`, `custo_metro`, `markup`, `metragem_minima`, `valor`, `desconto_corte`, `perda`, `perda_bordas`, `perda_corte`, `dimensao`, `perda_bordas_retalho`, `perda_corte_retalho`, `imagem`, `ultima_alteracao`, `ativo`) VALUES
(8, 'DescriçãoUpdate', 'Usinagem Ogrigatória', '9', '', 'Metro', '', 'CPuHJ-hfr999', 'on', 'jgvjk', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', 'upload/64d14df8a4715.png', '2023-08-24', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo_de_servico` varchar(255) NOT NULL,
  `exibe_no_orcamento` varchar(100) NOT NULL,
  `exibe_na_lista_de_corte` varchar(100) NOT NULL,
  `observacao` text NOT NULL,
  `custo_metro` decimal(10,0) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `markup` decimal(10,0) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `adiciona_para_o_corte` decimal(10,0) NOT NULL,
  `calculo` varchar(255) NOT NULL,
  `codigo_da_fabrica` varchar(100) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `descricao`, `tipo_de_servico`, `exibe_no_orcamento`, `exibe_na_lista_de_corte`, `observacao`, `custo_metro`, `codigo_produto`, `markup`, `valor`, `adiciona_para_o_corte`, `calculo`, `codigo_da_fabrica`, `ultima_alteracao`, `ativo`) VALUES
(6, 'hbjbj', 'Potra', 'on', 'on', 'jkvugkkm', '0', 'CSeHJ-nds99', '0', '0', '0', 'on', '', '0000-00-00', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `travessas`
--

CREATE TABLE `travessas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `agregar` varchar(255) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `esquadreta` varchar(255) NOT NULL,
  `oculto` varchar(10) NOT NULL,
  `referencias_do_mercado` text NOT NULL,
  `custo_metro` decimal(10,2) NOT NULL,
  `markup` decimal(10,2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `desconto_corte_vidro` decimal(10,2) NOT NULL,
  `perda` decimal(10,2) NOT NULL,
  `perda_bordas` decimal(10,2) NOT NULL,
  `perda_corte` decimal(10,2) NOT NULL,
  `dimensao` decimal(10,2) NOT NULL,
  `perda_bordas_retalho` decimal(10,2) NOT NULL,
  `perda_corte_retalho` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `travessas`
--

INSERT INTO `travessas` (`id`, `descricao`, `codigo_produto`, `agregar`, `unidade`, `esquadreta`, `oculto`, `referencias_do_mercado`, `custo_metro`, `markup`, `valor`, `desconto_corte_vidro`, `perda`, `perda_bordas`, `perda_corte`, `dimensao`, `perda_bordas_retalho`, `perda_corte_retalho`, `imagem`, `ultima_alteracao`, `ativo`) VALUES
(16, 'DescriçãoUpdate', 'CTHJ-456', 'Agregar Simples', 'Metro', 'Esquadreta', 'on', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'upload/64c8e360ef47e.png', '0000-00-00', 0),
(17, 'Descrição 1', 'CTHJ-e56', 'Agregar Simples', 'Metro', 'Esquadreta', 'on', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'upload/64c8e383a9e62.png', '0000-00-00', 0),
(18, 'Descrição21', 'CTHJ-af4589', 'Agregar Simples', 'Metro', 'Esquadreta', 'on', 'hbj', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'upload/64d14d6945cc2.png', '2023-09-02', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vidros`
--

CREATE TABLE `vidros` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `agregar` varchar(255) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `liberado_para` varchar(255) NOT NULL,
  `permite_pintura` varchar(20) NOT NULL,
  `codigo_da_fabrica` varchar(50) NOT NULL,
  `codigo_produto` varchar(50) NOT NULL,
  `observacao` text NOT NULL,
  `custo_metro` decimal(10,2) NOT NULL,
  `markup` decimal(10,2) NOT NULL,
  `markup_avulso` decimal(10,2) NOT NULL,
  `metragem_minima` decimal(10,2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `valor_avulso` decimal(10,2) NOT NULL,
  `valor_com_perda` decimal(10,2) NOT NULL,
  `perda` decimal(10,2) NOT NULL,
  `perda_avulso` decimal(10,2) NOT NULL,
  `perda_bordas` decimal(10,2) NOT NULL,
  `perda_corte` decimal(10,2) NOT NULL,
  `perda_bordas_retalho` decimal(10,2) NOT NULL,
  `perda_corte_retalho` decimal(10,2) NOT NULL,
  `dimensao` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vidros`
--

INSERT INTO `vidros` (`id`, `descricao`, `agregar`, `unidade`, `liberado_para`, `permite_pintura`, `codigo_da_fabrica`, `codigo_produto`, `observacao`, `custo_metro`, `markup`, `markup_avulso`, `metragem_minima`, `valor`, `valor_avulso`, `valor_com_perda`, `perda`, `perda_avulso`, `perda_bordas`, `perda_corte`, `perda_bordas_retalho`, `perda_corte_retalho`, `dimensao`, `imagem`, `ultima_alteracao`, `ativo`) VALUES
(26, 'hihg', 'Agregar Simples', 'Metro', 'Portas', 'on', '11', 'CVHJ-j49334', 'dtcftcgf', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'upload/64d14e5c18f28.png', '2023-08-11', 'on');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessorios`
--
ALTER TABLE `acessorios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `esquadretas`
--
ALTER TABLE `esquadretas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `img_backup`
--
ALTER TABLE `img_backup`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

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
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `puxadores`
--
ALTER TABLE `puxadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `travessas`
--
ALTER TABLE `travessas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `vidros`
--
ALTER TABLE `vidros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessorios`
--
ALTER TABLE `acessorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `esquadretas`
--
ALTER TABLE `esquadretas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `img_backup`
--
ALTER TABLE `img_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `logado`
--
ALTER TABLE `logado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `puxadores`
--
ALTER TABLE `puxadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `travessas`
--
ALTER TABLE `travessas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `vidros`
--
ALTER TABLE `vidros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
