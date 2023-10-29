-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29-Out-2023 às 17:40
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `acessorios`
--

INSERT INTO `acessorios` (`id`, `descricao`, `codigo_produto`, `observacao`, `custo_unitario`, `markup`, `valor_unitario`, `unidade`, `tipo_do_acessorio`, `desconto_corte`, `imagem`, `codigo_da_fabrica`, `ultima_alteracao`, `ativo`) VALUES
(1, 'Descrição Toorescode', 'CAcHJ-hrgfue', 'vugfchgkjm', 0, 0, 0, 'Unidade', 'Outro', 0, 'upload/64d21bc389cea.png', '11', '2023-08-10', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agregar`
--

CREATE TABLE `agregar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `observacao` text NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `basicos_usuarios`
--

CREATE TABLE `basicos_usuarios` (
  `id` int(11) NOT NULL,
  `nome_ususario` varchar(100) NOT NULL,
  `telefone_usuario` varchar(100) NOT NULL,
  `email_login` varchar(100) NOT NULL,
  `libera_xml_pedido` varchar(100) NOT NULL,
  `libera_painel_producao` varchar(100) NOT NULL,
  `desconto_maximo` decimal(10,0) NOT NULL,
  `grupo_de_usuarios` varchar(255) NOT NULL,
  `observacao` text NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `basicos_usuarios`
--

INSERT INTO `basicos_usuarios` (`id`, `nome_ususario`, `telefone_usuario`, `email_login`, `libera_xml_pedido`, `libera_painel_producao`, `desconto_maximo`, `grupo_de_usuarios`, `observacao`, `ultima_alteracao`, `ativo`) VALUES
(2, 'TC Update', '72y2223', 'er@dde.com', 'on', 'on', 0, 'Administradores da Empresa', '', '2023-08-03', 'on'),
(3, 'TC', '89439223w', 'eAr@dde.com', '', 'on', 0, 'Administradores da Empresa', '', '2023-08-24', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `ano_mes` varchar(100) NOT NULL,
  `dias_uteis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao_de_clientes`
--

CREATE TABLE `classificacao_de_clientes` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `classificacao_de_clientes`
--

INSERT INTO `classificacao_de_clientes` (`id`, `descricao`, `codigo_produto`) VALUES
(1, 'DescriçãoUpdate', 'CItemAg-10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `cpf_cnpj`, `nome_razao_socil`, `contato`, `telefone`, `celular`, `email`, `senha`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES
(42, '999999', 'HJ Allúminio', '', '', '', '', '', '', '', '', '', '', '', 'Selecione...'),
(44, '111111', 'HJ Allúminios Update', '', '', '', '', '', '', '', '', '', '', '', 'Selecione...'),
(47, '111111', 'HJ Allúminios Update', '9999999999', '', '', '', '', '', '', '', '', '', '', 'Selecione...'),
(48, '111111', 'Ttt', '101011', '935593163', '(00)00000-000000000', 'aaaa@sss.com', '4t54t544545', '11111-111', 'São Paulo', '00000', 'Complemento HJ', 'Brasília', 'Huíla', 'Estado 1'),
(49, '111111', 'Fredy', '9999999999', '935593163', '(00)00000-000000000', 'morador122@gmail.com', 'er34t54t54', '11111-111', 'São Paulo', '00000', 'Complemento HJ', 'Brasília', 'Huíla', 'Estado 1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `observacao` text NOT NULL,
  `custo` decimal(10,0) NOT NULL,
  `markup` decimal(10,0) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `rendimento` varchar(100) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`id`, `descricao`, `codigo_produto`, `observacao`, `custo`, `markup`, `valor`, `rendimento`, `ultima_alteracao`, `ativo`) VALUES
(1, 'DescriçãoUpdate', 'CCorHJ--jf788!', 'bjkgvutgkj', 0, 0, 0, '', '2023-08-17', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dobradicas`
--

CREATE TABLE `dobradicas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `medida_inicial` decimal(10,0) NOT NULL,
  `medida_final` decimal(10,0) NOT NULL,
  `quantidade_de_furos` int(11) NOT NULL,
  `distancia_primeiro_furo` int(11) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `dobradicas`
--

INSERT INTO `dobradicas` (`id`, `descricao`, `codigo_produto`, `medida_inicial`, `medida_final`, `quantidade_de_furos`, `distancia_primeiro_furo`, `ultima_alteracao`, `ativo`) VALUES
(1, 'Descrição', 'CDobHJ-hd363d', 9, 5, 5, 12, '2023-08-10', 'on'),
(2, 'DescriçãoUpdateAAA', 'CDobHJ-hf7484', 91, 5, 5, 32, '2023-08-23', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `esquadretas`
--

INSERT INTO `esquadretas` (`id`, `descricao`, `observacao`, `custo_metro`, `markup`, `valor_unitario`, `agregar`, `codigo_produto`, `unidade`, `imagem`, `codigo_da_fabrica`, `ultima_alteracao`, `ativo`) VALUES
(2, 'Descrição', 'ffregrt', 0, 0, 0, 'Agregar Simples', 'CEsHJ-7d6', 'Unidade', 'upload/64ccf70a8f7df.png', '', '2023-08-16', 'on'),
(3, 'Descrição 1 Updateaaa', 'sdfrsfweew', 2, 11, 21, 'Agregar Simples1', 'CEsHJ-91c', 'Unidade2', 'upload/64cd02e686e17.png', '11', '2023-08-23', 'on'),
(4, 'DescriçãoUpdate', 'Afghfy', 2, 11, 21, 'Agregar Simples3', 'CEsHJ-d16', 'Unidade1', 'upload/64cd5052c0d2b.png', '11', '2023-08-24', 'on'),
(5, 'Descrição', 'bjvjhm', 0, 0, 0, 'Agregar Simples', 'CEsHJ-bnjs88', 'Unidade', 'upload/64d14f9e30258.png', '', '2023-08-10', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `financas_condicao_pagamento`
--

CREATE TABLE `financas_condicao_pagamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL,
  `numero_de_parcelas` int(255) NOT NULL,
  `markup` varchar(100) NOT NULL,
  `prazo_primeira_parcela_dias` varchar(100) NOT NULL,
  `prazo_segunda_parcela_dias` varchar(100) NOT NULL,
  `intervalo_entre_parcelas_dias` varchar(100) NOT NULL,
  `entrada` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `financas_condicao_pagamento`
--

INSERT INTO `financas_condicao_pagamento` (`id`, `descricao`, `codigo_produto`, `tipo`, `ultima_alteracao`, `ativo`, `numero_de_parcelas`, `markup`, `prazo_primeira_parcela_dias`, `prazo_segunda_parcela_dias`, `intervalo_entre_parcelas_dias`, `entrada`) VALUES
(3, 'Descrição', 'CFinHJ-ftyuyh', 'Dias Corridos 1', '2023-08-24', 'on', 8, '6', '4', '12', '2', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_de_pagamento`
--

CREATE TABLE `forma_de_pagamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `forma_de_pagamento`
--

INSERT INTO `forma_de_pagamento` (`id`, `descricao`, `codigo_produto`) VALUES
(1, 'DescriçãoUpdate', 'CItemAg-bdfglhirdgsrkf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `img_backup`
--

CREATE TABLE `img_backup` (
  `id` int(11) NOT NULL,
  `imagem_backup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `img_backup`
--

INSERT INTO `img_backup` (`id`, `imagem_backup`) VALUES
(1, 'upload/avatar10.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `indicadores`
--

CREATE TABLE `indicadores` (
  `id` int(11) NOT NULL,
  `ano_mes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `indicadores`
--

INSERT INTO `indicadores` (`id`, `ano_mes`) VALUES
(1, '2023/28');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `insumos`
--

INSERT INTO `insumos` (`id`, `descricao`, `codigo_produto`, `observacao`, `custo`, `markup`, `valor`, `unidade`, `codigo_da_fabrica`, `ultima_alteracao`, `imagem`, `ativo`) VALUES
(2, 'Alfredo Torres', 'CInHJ-abc123', 'hjdfbvilerbh', 0, 0, 0, 'Unidade', '', '2023-08-24', 'upload/64d221d195fd2.png', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_de_produto`
--

CREATE TABLE `linha_de_produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL,
  `codigo_interno` varchar(255) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `linha_de_produto`
--

INSERT INTO `linha_de_produto` (`id`, `descricao`, `codigo_produto`, `codigo_interno`, `ultima_alteracao`, `ativo`) VALUES
(1, 'DescriçãoUpdate', 'CLinhProdHJ-rodHJ-nkj3iu3if', 'ejfhi3', '2023-08-18', 'on');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `logado`
--

INSERT INTO `logado` (`id`, `nome`, `email`, `senha`, `parceiro_colaborador`, `cpf`, `rg`, `cep`, `endereco`, `telefone`, `complemento`, `bairro`, `cidade`, `uf`, `nascimento`, `nivel`) VALUES
(15, 'Paulo', 'paulo@gmail.com', '121212', '', 1001, 1, 100, 'Endereço Paulo', '(00) 93593-59359', 'Complemento Paulo', 'Bairro Paulo', 'Cidade Paulo', '001', '01/01/2000', 'adm'),
(23, 'Torres Code', 'torres@teste.com', '121212', 'Parceiro', 0, 2, 11111, 'V2', '', '44', 'São', '2ww', '001', '11/11/1111', 'user'),
(25, 'Carlos', 'carlos@carlos.com', '121212', '', 111111, 2, 11111, 'V1', '935593163', 'err', 'Bairro', 'Huíla', '11111', '01/01/2000', 'adm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao_consumo_de_materia_prima`
--

CREATE TABLE `movimentacao_consumo_de_materia_prima` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL,
  `codigo_da_fabrica` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `op` int(255) NOT NULL,
  `consumo` decimal(60,3) NOT NULL,
  `perda` decimal(60,0) NOT NULL,
  `total` decimal(60,0) NOT NULL,
  `custo_total` decimal(60,0) NOT NULL,
  `data_pedido` date NOT NULL,
  `entrou_em_producao` date NOT NULL,
  `produzido` date NOT NULL,
  `ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `movimentacao_consumo_de_materia_prima`
--

INSERT INTO `movimentacao_consumo_de_materia_prima` (`id`, `descricao`, `codigo_produto`, `codigo_da_fabrica`, `tipo`, `unidade`, `op`, `consumo`, `perda`, `total`, `custo_total`, `data_pedido`, `entrou_em_producao`, `produzido`, `ativo`) VALUES
(7, 'DescriçãoUpdate', 'CConMatPriHJ-hbjn', 'iok', 'Tipo ', 'Unidade ', 0, 4.000, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 0),
(8, 'Descrição 1', 'CConMatPriHJ-10', '11', 'Tipo ', 'Unidade ', 0, 450.000, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', 0),
(9, 'Nome A', 'CConMatPriHJ-hregyiiee', '4fh', 'Tipo 2', 'Unidade 1', 9, 7.000, 9, 89, 0, '2023-08-16', '2023-08-12', '2023-08-23', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `painel_pedidos_orcamentos`
--

CREATE TABLE `painel_pedidos_orcamentos` (
  `id` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `pedidos` varchar(255) NOT NULL,
  `descricao_produto_pedido` varchar(255) NOT NULL,
  `qtd_produto_pedido` int(255) NOT NULL,
  `orcamento` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ano` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `painel_pedidos_orcamentos`
--

INSERT INTO `painel_pedidos_orcamentos` (`id`, `valor`, `pedidos`, `descricao_produto_pedido`, `qtd_produto_pedido`, `orcamento`, `status`, `ano`) VALUES
(5, '250', '', 'Travessa', 10, '', '', '2023'),
(6, '210', '', 'Porta', 20, '', '', '2023'),
(7, '220', '', 'Travessa', 25, '', '', '2023'),
(8, '210', '', 'Dobradissas', 50, '', '', '2022'),
(9, '250', '', 'Travessa', 12, '', 'Em Andamento', '2020'),
(10, '250', '', 'Porta', 10, '', 'Finalizado', '2023'),
(11, '300', '', 'Travessa', 10, '', 'Finalizado', '2022'),
(12, '230', '', 'Travessa', 12, '', 'Finalizado', '2022'),
(13, '310', '', 'Porta', 12, '', 'Finalizado', '2022'),
(14, '230', '', 'Dobradissas', 60, '', 'Finalizado', '2021'),
(17, '22', '', 'Travessa', 1, '', 'Em Andamento', '2021'),
(18, '22', '', 'Porta', 1, '', 'Finalizado', '2020'),
(19, '22', '', 'Dobradissas', 12, '', 'Finalizado', '2019'),
(20, '22', '', 'Porta', 1, '', 'Finalizado', '2023'),
(21, '22', '', 'Travessa', 2, '', 'Finalizado', '2023'),
(22, '22', '', 'Dobradissas', 5, '', 'Finalizado', '2023'),
(23, '22', '', 'Porta', 10, '', 'Em Andamento', '2023'),
(24, '22', '', 'Dobradissas', 3, '', 'Em Andamento', '2023'),
(25, '22', '', 'Porta', 10, '', 'Em Andamento', '2023'),
(26, '22', '', 'Dobradissas', 5, '', 'Finalizado', '2023');

-- --------------------------------------------------------

--
-- Estrutura da tabela `painel_vendas_mensais`
--

CREATE TABLE `painel_vendas_mensais` (
  `id` int(11) NOT NULL,
  `ano_mes` varchar(100) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `painel_vendas_mensais`
--

INSERT INTO `painel_vendas_mensais` (`id`, `ano_mes`, `valor`, `quantidade`) VALUES
(1, '2022/20', '40000', 14000),
(2, '2022/21', '40000', 2000),
(3, '2023/15', '55000', 56000),
(4, '2022/12', '30000', 15000),
(5, '2000/10', '20000', 10000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parametros`
--

CREATE TABLE `parametros` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL,
  `valor` int(255) NOT NULL,
  `observacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `parametros`
--

INSERT INTO `parametros` (`id`, `descricao`, `codigo_produto`, `valor`, `observacao`) VALUES
(2, 'Descrição 1', 'CParHJ-FT002', 43, 'rgre');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `razaosocial`, `nomefantasia`, `complemento`, `cidade`, `endreco`, `email`, `instagram`, `facebook`, `codigointerno`, `bairro`, `cnpj`, `cep`, `uf`, `ie`, `numero`, `telefone`, `imagem`) VALUES
(70, 'Name Razão Social', 'Name Fantasia', 'Complemento HJ', 'Cidade User', 'Endereço Name', 'gaivotas@teste.com', 'instagram', 'facebook', '1111111', 'Bairro User', '2022', '0000', '11', '2222222', '999999999', '(00) 93593-59359', 'upload/64c846bacf2f8.png'),
(72, 'Name Razão SocialAAAAA', 'Name Fantasia', 'Complemento HJ', 'Cidade User', 'Endereço Name', 'gaivotas@teste.com', 'instagram', 'facebook', '1111111', 'Bairro User', '1111', '11111-111', '11', '2222222', '999999999', '(99) 12211-22222', 'upload/64c8481f96402.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_dos_clientes`
--

CREATE TABLE `pedidos_dos_clientes` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `descricao_pedido` text NOT NULL,
  `data_inicial` varchar(255) NOT NULL,
  `data_final` varchar(255) NOT NULL,
  `garantia` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nome_responsavel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedidos_dos_clientes`
--

INSERT INTO `pedidos_dos_clientes` (`id`, `nome_cliente`, `descricao_pedido`, `data_inicial`, `data_final`, `garantia`, `status`, `nome_responsavel`) VALUES
(9, 'Torres Code', '<p>TTTTT</p>', '30/08/2023', '01/09/2023', '', 'Em Andamento', 'Carlos'),
(10, 'Torres Code', '<p>10 Portas</p><p>5 Travessas</p>', '31/08/2023', '31/08/2023', '', 'Finalizado', 'Paulo'),
(11, 'Torres Code', '<p>10 Travessas</p>', '04/09/2023', '04/09/2023', '', 'Finalizado', 'Paulo'),
(12, 'Torres Code', '<p>10 Portas com uma fechadura</p>', '07/09/2023', '07/09/2023', '', 'Em Andamento', ''),
(13, 'Torres Code', '<p>10 Porta 3 Dobradissas</p>', '14/09/2023', '14/09/2023', '', 'Em Andamento', ''),
(14, 'Torres Code', '<p>testettt</p>', '12/10/2023', '12/10/2023', '', 'Em Andamento', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `descricao`, `puxadoracoplado`, `ponteira_acoplado`, `ponteira_obrigatoria`, `exige_pinturano_vidro`, `agregar`, `unidade`, `vidro`, `esquadreta`, `esquadreta_reforcada_a`, `esquadreta_reforcada_b`, `esquadreta_dupla`, `custo_metro`, `desconto_corte_perfil`, `desconto_corte_vidro`, `desconto_corte_travessa`, `desconto_corte_travessa_oculta`, `perda_bordas`, `perda_corte`, `dimensao`, `perda_bordas_retalho`, `perda_corte_retalho`, `codigo_produto`, `ultima_alteracao`, `largura_da_mascara`, `codigo_da_fabrica`, `referencias_do_mercado`, `detalhes`, `imagem`, `ativo`) VALUES
(16, 'Nome Consulta 2', 'on', '', '', '', 'Agregar Simples', 'Metro', 'Vidro Simples', 'Esquadreta', 'Esquadreta Reforcada A ', 'Esquadreta Reforcada B ', 'on', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'CPHJ-236', 0.00, 0.00, 0.00, '', '', 'upload/64c8e6b17f244.png', 'on'),
(18, 'Descrição 22', 'on', 'on', 'on', 'on', 'Agregar Simples', 'Metro', 'Vidro Simples', 'Esquadreta', 'Esquadreta Reforcada A ', 'Esquadreta Reforcada B ', 'on', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'CPHJ-gfruyu', 0.00, 0.00, 0.00, 'gfvk', 'bhjkjjhm', 'upload/64d14c9f86635.png', 'on'),
(19, 'Descrição', 'on', 'on', 'on', 'on', 'Agregar Simples', 'Metro', 'Vidro Simples', 'Esquadreta', 'Esquadreta Reforcada A ', 'Esquadreta Reforcada B ', 'on', 2.00, 10.00, 10.00, 12.20, 12.00, 12.00, 22.00, 2.00, 6.00, 12.00, 'CPHJ-gj76fg', 22.00, 12.00, 11.00, 'Refrnn', 'Detalhes', 'upload/64d29ed5c9c2a.png', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `descricao_do_produto` varchar(255) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `codigo_da_fabrica` varchar(100) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `libera_para_venda` varchar(100) NOT NULL,
  `bloqueia_estoque_negativo` varchar(100) NOT NULL,
  `embalagem_fornecedor` varchar(100) NOT NULL,
  `consumo_medio` varchar(100) NOT NULL,
  `massa` decimal(10,0) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL,
  `custo_atual` decimal(10,0) NOT NULL,
  `markup` decimal(10,0) NOT NULL,
  `venda` decimal(10,0) NOT NULL,
  `ipi` varchar(100) NOT NULL,
  `unidade_basica` varchar(100) NOT NULL,
  `estoque` varchar(100) NOT NULL,
  `estoque_minimo` varchar(255) NOT NULL,
  `estoque_de_seguranca` varchar(255) NOT NULL,
  `tempo_de_reposicao` varchar(100) NOT NULL,
  `linha` varchar(255) NOT NULL,
  `embalagem` varchar(100) NOT NULL,
  `localizador` varchar(255) NOT NULL,
  `classificacao_fiscal` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `quantidade_stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao_do_produto`, `codigo_produto`, `codigo_da_fabrica`, `referencia`, `libera_para_venda`, `bloqueia_estoque_negativo`, `embalagem_fornecedor`, `consumo_medio`, `massa`, `ultima_alteracao`, `ativo`, `custo_atual`, `markup`, `venda`, `ipi`, `unidade_basica`, `estoque`, `estoque_minimo`, `estoque_de_seguranca`, `tempo_de_reposicao`, `linha`, `embalagem`, `localizador`, `classificacao_fiscal`, `volume`, `quantidade_stock`) VALUES
(5, 'Porta', 'CProdHJ-392774238', '11', 'eferfr', 'on', 'on', '12', '5', 9, '2023-09-29', 'on', 1000, 11, 22, '2', 'Unidade', '100', '10', '12', '2', 'Linha', '1', 's', '2', '22', '664'),
(6, 'Dobradissas', 'CProdHJ-9896', '11', 'eferfry', 'on', 'on', '5', '8', 90, '2023-09-28', 'on', 10, 11, 22, '8', 'Unidade1', '45', '9', '90', '8', 'Linha1', '8', 'default', '7', '4', '410'),
(7, 'Travessa', 'CProdHJ-jhfgfuek', 'guhjb', 'eferfr', 'on', 'on', '21', '89', 90, '2023-09-21', 'on', 1000, 11, 22, '9', 'Unidade1', '100', '90', '9', '8', 'Linha1', '9', 'sd', '8', '6', '968'),
(10, 'Produto', 'CProdHJ-hlbkm', 'u9ui', 'eferfry', 'on', 'on', '4', '2', 8, '2023-09-21', 'on', 10, 11, 22, '8', 'Unidade2', '8', '99', '8', '10', 'Linha2', '8', 'ff44', '8', '9', '1000');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `puxadores`
--

INSERT INTO `puxadores` (`id`, `descricao`, `usinagem_box_tres`, `medida_maxima_para_usinagem`, `agregar`, `unidade`, `codigo_da_fabrica`, `codigo_produto`, `ponteira_obrigatoria`, `referencias_do_mercado`, `custo_metro`, `markup`, `metragem_minima`, `valor`, `desconto_corte`, `perda`, `perda_bordas`, `perda_corte`, `dimensao`, `perda_bordas_retalho`, `perda_corte_retalho`, `imagem`, `ultima_alteracao`, `ativo`) VALUES
(8, 'Puxadores', 'Usinagem Ogrigatória', '9', '', 'Metro', '', 'CPuHJ-hfr999', 'on', 'jgvjk', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 'upload/64d14df8a4715.png', '2023-08-24', 'on');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `descricao`, `tipo_de_servico`, `exibe_no_orcamento`, `exibe_na_lista_de_corte`, `observacao`, `custo_metro`, `codigo_produto`, `markup`, `valor`, `adiciona_para_o_corte`, `calculo`, `codigo_da_fabrica`, `ultima_alteracao`, `ativo`) VALUES
(6, 'hbjbj', 'Potra', 'on', 'on', 'jkvugkkm', 0, 'CSeHJ-nds99', 0, 0, 0, 'on', '', '0000-00-00', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_clientes_system`
--

CREATE TABLE `tbl_clientes_system` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` text NOT NULL,
  `bairro` text NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `fone` varchar(255) NOT NULL,
  `cep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_clientes_system`
--

INSERT INTO `tbl_clientes_system` (`id`, `nome`, `endereco`, `bairro`, `cidade`, `fone`, `cep`) VALUES
(1, 'Fredy', 'São Paulo', 'Brasília', 'Huíla', '(00)00000-000000000', '11111-111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_ordem_producao`
--

CREATE TABLE `tbl_ordem_producao` (
  `id` int(11) NOT NULL,
  `id_uniq` text NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `modo` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `largura` int(11) NOT NULL,
  `perfil_lado_esquerdo` int(11) NOT NULL,
  `usinagem_para_esquerdo` varchar(255) NOT NULL,
  `puxador_esquerdo` varchar(255) NOT NULL,
  `perfil_lado_direito` int(11) NOT NULL,
  `usinagem_para_direito` varchar(255) NOT NULL,
  `puxador_direito` varchar(255) NOT NULL,
  `perfil_lado_superior` int(11) NOT NULL,
  `usinagem_para_superior` varchar(255) NOT NULL,
  `puxador_superior` varchar(255) NOT NULL,
  `perfil_lado_inferior` int(11) NOT NULL,
  `usinagem_para_inferior` varchar(255) NOT NULL,
  `puxador_inferior` varchar(255) NOT NULL,
  `vidro` varchar(255) NOT NULL,
  `tv` varchar(255) NOT NULL,
  `servicos` varchar(255) NOT NULL,
  `travessa` varchar(255) NOT NULL,
  `portas_pares` varchar(255) NOT NULL,
  `reforco` varchar(255) NOT NULL,
  `desempenador` varchar(255) NOT NULL,
  `esquadreta` varchar(255) NOT NULL,
  `ponteira` varchar(255) NOT NULL,
  `kit` varchar(255) NOT NULL,
  `valor_item_cliente` varchar(255) NOT NULL,
  `porcento_desconto` varchar(255) NOT NULL,
  `desconto` varchar(255) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `prod_qtd` varchar(255) NOT NULL,
  `prod_usinagem_puxador` varchar(255) NOT NULL,
  `prod_valor_item_cliente` varchar(255) NOT NULL,
  `prod_porcento_desconto` varchar(255) NOT NULL,
  `prod_desconto` varchar(255) NOT NULL,
  `val_forma_pagamento` varchar(255) NOT NULL,
  `val_condicao_pagamento` varchar(255) NOT NULL,
  `val_situacao_financeira` varchar(255) NOT NULL,
  `val_qtd_portas` varchar(255) NOT NULL,
  `val_qtd_vidros` varchar(255) NOT NULL,
  `val_qtd_quadros` varchar(255) NOT NULL,
  `val_qtd_total` varchar(255) NOT NULL,
  `val_total_consumidor` varchar(255) NOT NULL,
  `val_valor_itens_clientes` varchar(255) NOT NULL,
  `val_porcento_desconto` varchar(255) NOT NULL,
  `val_desconto` varchar(255) NOT NULL,
  `val_frete` varchar(255) NOT NULL,
  `val_total_cliente` varchar(255) NOT NULL,
  `out_valor_itens_parceiro` varchar(255) NOT NULL,
  `out_porcento_desconto` varchar(255) NOT NULL,
  `out_desconto` varchar(255) NOT NULL,
  `out_total_parceiro` varchar(255) NOT NULL,
  `out_markup_parceiro` varchar(255) NOT NULL,
  `out_total_fabrica` varchar(255) NOT NULL,
  `out_markup_fabrica` varchar(255) NOT NULL,
  `obs_observacao_op` varchar(255) NOT NULL,
  `ap_cli_aprovacao_cliente` varchar(255) NOT NULL,
  `ap_cli_aprovacao_cliente_data` varchar(255) NOT NULL,
  `ap_cli_cliente_retira` varchar(255) NOT NULL,
  `ap_cli_pedido_parceiro` varchar(255) NOT NULL,
  `ap_parc_aprovacao_parceiro` varchar(255) NOT NULL,
  `ap_parc_andamento_parceiro` varchar(255) NOT NULL,
  `ap_parc_entregue_data` varchar(255) NOT NULL,
  `ap_parc_vendedor_interno` varchar(255) NOT NULL,
  `ap_parc_vendedor_externo` varchar(255) NOT NULL,
  `ap_parc_vendedor_pedido` varchar(255) NOT NULL,
  `ap_fab_aprovacao_fabrica` varchar(255) NOT NULL,
  `ap_fab_pedido_fabrica_data` varchar(255) NOT NULL,
  `ap_fab_andamento` varchar(255) NOT NULL,
  `ap_fab_entrou_producao_data` varchar(255) NOT NULL,
  `ap_fab_produzido` varchar(11) NOT NULL,
  `ap_fab_entregue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_ordem_producao`
--

INSERT INTO `tbl_ordem_producao` (`id`, `id_uniq`, `cliente`, `modo`, `qtd`, `altura`, `largura`, `perfil_lado_esquerdo`, `usinagem_para_esquerdo`, `puxador_esquerdo`, `perfil_lado_direito`, `usinagem_para_direito`, `puxador_direito`, `perfil_lado_superior`, `usinagem_para_superior`, `puxador_superior`, `perfil_lado_inferior`, `usinagem_para_inferior`, `puxador_inferior`, `vidro`, `tv`, `servicos`, `travessa`, `portas_pares`, `reforco`, `desempenador`, `esquadreta`, `ponteira`, `kit`, `valor_item_cliente`, `porcento_desconto`, `desconto`, `produto`, `prod_qtd`, `prod_usinagem_puxador`, `prod_valor_item_cliente`, `prod_porcento_desconto`, `prod_desconto`, `val_forma_pagamento`, `val_condicao_pagamento`, `val_situacao_financeira`, `val_qtd_portas`, `val_qtd_vidros`, `val_qtd_quadros`, `val_qtd_total`, `val_total_consumidor`, `val_valor_itens_clientes`, `val_porcento_desconto`, `val_desconto`, `val_frete`, `val_total_cliente`, `out_valor_itens_parceiro`, `out_porcento_desconto`, `out_desconto`, `out_total_parceiro`, `out_markup_parceiro`, `out_total_fabrica`, `out_markup_fabrica`, `obs_observacao_op`, `ap_cli_aprovacao_cliente`, `ap_cli_aprovacao_cliente_data`, `ap_cli_cliente_retira`, `ap_cli_pedido_parceiro`, `ap_parc_aprovacao_parceiro`, `ap_parc_andamento_parceiro`, `ap_parc_entregue_data`, `ap_parc_vendedor_interno`, `ap_parc_vendedor_externo`, `ap_parc_vendedor_pedido`, `ap_fab_aprovacao_fabrica`, `ap_fab_pedido_fabrica_data`, `ap_fab_andamento`, `ap_fab_entrou_producao_data`, `ap_fab_produzido`, `ap_fab_entregue`) VALUES
(25, '6530045890bc9', 'ID: 44 | Nome: HJ Allúminios Update', 'Porta', 100, 3243, 0, 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(26, '65302fea66a95', 'ID: 42 | Nome: HJ Allúminio', 'Porta', 1, 259, 1000, 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '1', '', '', '', '1', '100', '', '', '', '', '', '', '', '', '', '', '', 'Observação deste produto', '', '2023-10-12', '', '1', '', '', '', '', '', '', '', '', '', '', '', 0),
(28, '653032427e06b', 'ID: 42 | Nome: HJ Allúminio', 'Porta', 1, 4000, 500, 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '90', '2', '2', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '100', '', '', '', '', '', '', '', '', '', '', '', 'Obs', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(29, '6530328f30687', 'ID: 42 | Nome: HJ Allúminio', 'Porta', 0, 0, 0, 19, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(30, '6530451ee770f', 'HJ Allúminios Update', 'Porta', 1, 9000, 8899, 0, 'Sem Usinagem', '', 2000, 'Sem Usinagem', '', 35566, 'Sem Usinagem', '', 455465, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Obs Teste', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(31, '6530498436980', 'HJ Allúminios Update', 'Porta', 1, 9000, 5000, 0, 'Sem Usinagem', '', 90, 'Sem Usinagem', '', 9, 'Sem Usinagem', '', 90, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Texto Obs', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(32, '6530db16f1e14', 'HJ Allúminios Update', 'Porta', 1200, 0, 0, 18, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(33, '6530e267e4def', 'HJ Allúminios Update', 'Porta', 0, 0, 0, 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(34, '6530ed43b0269', 'HJ Allúminios Update', 'Porta', 12, 0, 0, 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', 0, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '200', '2', '2', '12', '1200', '', '', '', '', '', '', '', 'Texto obs', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(35, '6530eeeb900bc', 'HJ Allúminio', 'Porta', 0, 0, 0, 19, 'Sem Usinagem', '', 20, 'Sem Usinagem', '', 21, 'Sem Usinagem', '', 22, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '1', 'Usinagem Puxador', '', '', '', '', '', '', '1', '1', '1', '1', '2000', '', '', '', '', '', '', '', '', '', '', '', '', 'Text', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(36, '6530efcd12203', 'HJ Allúminios Update', 'Porta', 1, 9000, 400, 18, 'Sem Usinagem', '', 20, 'Sem Usinagem', '', 21, 'Sem Usinagem', '', 22, 'Sem Usinagem', '', '', '', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Text', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(39, '653e00e13bdb2', 'HJ Allúminio', 'Porta', 12, 12, 12, 19, 'Sem Usinagem', '', 12, 'Sem Usinagem', '', 12, 'Sem Usinagem', '', 12, 'Sem Usinagem', '', '', '0', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '12', 12),
(40, '653e802583765', 'HJ Allúminios Update', 'Porta', 10, 10, 10, 19, 'Sem Usinagem', '', 10, 'Sem Usinagem', '', 10, 'Sem Usinagem', '', 10, 'Sem Usinagem', '', '', '0', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tintas`
--

CREATE TABLE `tintas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(100) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `custo` decimal(10,0) NOT NULL,
  `codigo_da_fabrica` varchar(100) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tintas`
--

INSERT INTO `tintas` (`id`, `descricao`, `codigo_produto`, `unidade`, `custo`, `codigo_da_fabrica`, `ultima_alteracao`, `ativo`) VALUES
(3, 'Tinta 5 Update', 'CtinHJ-j87329', 'Grama', 12, '12', '2023-08-23', 'on'),
(4, 'Descrição 1', 'CTinHJ-gfhe73332', 'Grama', 12, '11', '2023-08-24', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_do_item_agregar`
--

CREATE TABLE `tipo_do_item_agregar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo_do_item_agregar`
--

INSERT INTO `tipo_do_item_agregar` (`id`, `descricao`, `codigo_produto`) VALUES
(1, 'DescriçãoUpdate', 'CItemAg-FT1024566'),
(3, 'Nome Consulta', 'CItemAgHJ-fjkhierlre');

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
  `ativo` tinyint(1) NOT NULL,
  `quantidade_stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `travessas`
--

INSERT INTO `travessas` (`id`, `descricao`, `codigo_produto`, `agregar`, `unidade`, `esquadreta`, `oculto`, `referencias_do_mercado`, `custo_metro`, `markup`, `valor`, `desconto_corte_vidro`, `perda`, `perda_bordas`, `perda_corte`, `dimensao`, `perda_bordas_retalho`, `perda_corte_retalho`, `imagem`, `ultima_alteracao`, `ativo`, `quantidade_stock`) VALUES
(17, 'Travessa 1', 'CTHJ-e56', 'Agregar Simples', 'Metro', 'Esquadreta', 'on', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'upload/64c8e383a9e62.png', '0000-00-00', 0, ''),
(18, 'Travessa 2', 'CTHJ-af4589', 'Agregar Simples', 'Metro', 'Esquadreta', 'on', 'hbj', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'upload/64d14d6945cc2.png', '2023-09-02', 0, ''),
(19, 'Travessas', 'CTHJ-AD', 'Agregar Simples', 'Metro', 'Esquadreta', 'on', 'fbehflerhfjkler', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'upload/64f067e0e78fa.png', '2023-08-20', 0, '75');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades_de_produto`
--

CREATE TABLE `unidades_de_produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL,
  `codigo_interno` varchar(255) NOT NULL,
  `abreviacao` varchar(100) NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `unidades_de_produto`
--

INSERT INTO `unidades_de_produto` (`id`, `descricao`, `codigo_produto`, `codigo_interno`, `abreviacao`, `ultima_alteracao`, `ativo`) VALUES
(2, 'Nome Consulta', 'CLinhProdHJ-feeeda', 'cbhwuwy', 'Asrf', '2023-08-24', 'on'),
(3, 'Descrição 1', 'CLinhProdHJ-10', 'ejfh', 'adee', '2023-08-11', 'on');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vidros`
--

INSERT INTO `vidros` (`id`, `descricao`, `agregar`, `unidade`, `liberado_para`, `permite_pintura`, `codigo_da_fabrica`, `codigo_produto`, `observacao`, `custo_metro`, `markup`, `markup_avulso`, `metragem_minima`, `valor`, `valor_avulso`, `valor_com_perda`, `perda`, `perda_avulso`, `perda_bordas`, `perda_corte`, `perda_bordas_retalho`, `perda_corte_retalho`, `dimensao`, `imagem`, `ultima_alteracao`, `ativo`) VALUES
(26, 'hihg', 'Agregar Simples', 'Metro', 'Portas', 'on', '11', 'CVHJ-j49334', 'dtcftcgf', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'upload/64d14e5c18f28.png', '2023-08-11', 'on');

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
-- Índices para tabela `agregar`
--
ALTER TABLE `agregar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `basicos_usuarios`
--
ALTER TABLE `basicos_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefone_usuario` (`telefone_usuario`),
  ADD UNIQUE KEY `email_login` (`email_login`);

--
-- Índices para tabela `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `classificacao_de_clientes`
--
ALTER TABLE `classificacao_de_clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dobradicas`
--
ALTER TABLE `dobradicas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `esquadretas`
--
ALTER TABLE `esquadretas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `financas_condicao_pagamento`
--
ALTER TABLE `financas_condicao_pagamento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `forma_de_pagamento`
--
ALTER TABLE `forma_de_pagamento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `img_backup`
--
ALTER TABLE `img_backup`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `linha_de_produto`
--
ALTER TABLE `linha_de_produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logado`
--
ALTER TABLE `logado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `movimentacao_consumo_de_materia_prima`
--
ALTER TABLE `movimentacao_consumo_de_materia_prima`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `painel_pedidos_orcamentos`
--
ALTER TABLE `painel_pedidos_orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `painel_vendas_mensais`
--
ALTER TABLE `painel_vendas_mensais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `parceiros`
--
ALTER TABLE `parceiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos_dos_clientes`
--
ALTER TABLE `pedidos_dos_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

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
-- Índices para tabela `tbl_clientes_system`
--
ALTER TABLE `tbl_clientes_system`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_ordem_producao`
--
ALTER TABLE `tbl_ordem_producao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tintas`
--
ALTER TABLE `tintas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `tipo_do_item_agregar`
--
ALTER TABLE `tipo_do_item_agregar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `travessas`
--
ALTER TABLE `travessas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Índices para tabela `unidades_de_produto`
--
ALTER TABLE `unidades_de_produto`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `agregar`
--
ALTER TABLE `agregar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `basicos_usuarios`
--
ALTER TABLE `basicos_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `classificacao_de_clientes`
--
ALTER TABLE `classificacao_de_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `dobradicas`
--
ALTER TABLE `dobradicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `esquadretas`
--
ALTER TABLE `esquadretas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `financas_condicao_pagamento`
--
ALTER TABLE `financas_condicao_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `forma_de_pagamento`
--
ALTER TABLE `forma_de_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `img_backup`
--
ALTER TABLE `img_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `linha_de_produto`
--
ALTER TABLE `linha_de_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `logado`
--
ALTER TABLE `logado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `movimentacao_consumo_de_materia_prima`
--
ALTER TABLE `movimentacao_consumo_de_materia_prima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `painel_pedidos_orcamentos`
--
ALTER TABLE `painel_pedidos_orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `painel_vendas_mensais`
--
ALTER TABLE `painel_vendas_mensais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `parametros`
--
ALTER TABLE `parametros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `pedidos_dos_clientes`
--
ALTER TABLE `pedidos_dos_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT de tabela `tbl_clientes_system`
--
ALTER TABLE `tbl_clientes_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_ordem_producao`
--
ALTER TABLE `tbl_ordem_producao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tintas`
--
ALTER TABLE `tintas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo_do_item_agregar`
--
ALTER TABLE `tipo_do_item_agregar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `travessas`
--
ALTER TABLE `travessas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `unidades_de_produto`
--
ALTER TABLE `unidades_de_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vidros`
--
ALTER TABLE `vidros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
