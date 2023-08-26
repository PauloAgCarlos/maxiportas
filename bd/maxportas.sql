-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Ago-2023 às 19:12
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
-- Estrutura da tabela `agregar`
--

CREATE TABLE `agregar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `observacao` text NOT NULL,
  `ultima_alteracao` date NOT NULL,
  `ativo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `basicos_usuarios`
--

INSERT INTO `basicos_usuarios` (`id`, `nome_ususario`, `telefone_usuario`, `email_login`, `libera_xml_pedido`, `libera_painel_producao`, `desconto_maximo`, `grupo_de_usuarios`, `observacao`, `ultima_alteracao`, `ativo`) VALUES
(2, 'TC Update', '72y2223', 'er@dde.com', 'on', 'on', '0', 'Administradores da Empresa', '', '2023-08-03', 'on'),
(3, 'TC', '89439223w', 'eAr@dde.com', '', 'on', '0', 'Administradores da Empresa', '', '2023-08-24', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `ano_mes` varchar(100) NOT NULL,
  `dias_uteis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao_de_clientes`
--

CREATE TABLE `classificacao_de_clientes` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`id`, `descricao`, `codigo_produto`, `observacao`, `custo`, `markup`, `valor`, `rendimento`, `ultima_alteracao`, `ativo`) VALUES
(1, 'DescriçãoUpdate', 'CCorHJ--jf788!', 'bjkgvutgkj', '0', '0', '0', '', '2023-08-17', 'on');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dobradicas`
--

INSERT INTO `dobradicas` (`id`, `descricao`, `codigo_produto`, `medida_inicial`, `medida_final`, `quantidade_de_furos`, `distancia_primeiro_furo`, `ultima_alteracao`, `ativo`) VALUES
(1, 'Descrição', 'CDobHJ-hd363d', '9', '5', 5, 12, '2023-08-10', 'on'),
(2, 'DescriçãoUpdateAAA', 'CDobHJ-hf7484', '91', '5', 5, 32, '2023-08-23', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `insumos`
--

INSERT INTO `insumos` (`id`, `descricao`, `codigo_produto`, `observacao`, `custo`, `markup`, `valor`, `unidade`, `codigo_da_fabrica`, `ultima_alteracao`, `imagem`, `ativo`) VALUES
(2, 'Alfredo Torres', 'CInHJ-abc123', 'hjdfbvilerbh', '0', '0', '0', 'Unidade', '', '2023-08-24', 'upload/64d221d195fd2.png', 'on');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logado`
--

INSERT INTO `logado` (`id`, `nome`, `email`, `senha`, `parceiro_colaborador`, `cpf`, `rg`, `cep`, `endereco`, `telefone`, `complemento`, `bairro`, `cidade`, `uf`, `nascimento`, `nivel`) VALUES
(15, 'Paulo', 'paulo@gmail.com', '121212', '', 1001, 1, 100, 'Endereço Paulo', '(00) 93593-59359', 'Complemento Paulo', 'Bairro Paulo', 'Cidade Paulo', '001', '01/01/2000', 'adm'),
(23, 'Torres Code', 'torres@teste.com', '121212', 'Parceiro', 0, 2, 11111, 'V2', '', '44', 'São', '2ww', '001', '11/11/1111', 'user');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimentacao_consumo_de_materia_prima`
--

INSERT INTO `movimentacao_consumo_de_materia_prima` (`id`, `descricao`, `codigo_produto`, `codigo_da_fabrica`, `tipo`, `unidade`, `op`, `consumo`, `perda`, `total`, `custo_total`, `data_pedido`, `entrou_em_producao`, `produzido`, `ativo`) VALUES
(7, 'DescriçãoUpdate', 'CConMatPriHJ-hbjn', 'iok', 'Tipo ', 'Unidade ', 0, '4.000', '0', '0', '0', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(8, 'Descrição 1', 'CConMatPriHJ-10', '11', 'Tipo ', 'Unidade ', 0, '450.000', '0', '0', '0', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(9, 'Nome A', 'CConMatPriHJ-hregyiiee', '4fh', 'Tipo 2', 'Unidade 1', 9, '7.000', '9', '89', '0', '2023-08-16', '2023-08-12', '2023-08-23', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `painel_pedidos_orcamentos`
--

CREATE TABLE `painel_pedidos_orcamentos` (
  `id` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `quantidade_de_quadros` varchar(255) NOT NULL,
  `quantidade_de_portas` varchar(255) NOT NULL,
  `quantidade_de_vidros` varchar(255) NOT NULL,
  `orcamentos` varchar(255) NOT NULL,
  `pedidos` varchar(255) NOT NULL,
  `tipos_orcamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `painel_pedidos_orcamentos`
--

INSERT INTO `painel_pedidos_orcamentos` (`id`, `valor`, `quantidade_de_quadros`, `quantidade_de_portas`, `quantidade_de_vidros`, `orcamentos`, `pedidos`, `tipos_orcamento`) VALUES
(1, '2000', '28', '33', '50', '92', '90', 'Quantidade de Quadros'),
(2, '1000', '20', '50', '70', '202', '200', 'Quantidade de Portas'),
(3, '3000', '50', '60', '100', '300', '150', 'Quantidade de Vidros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `painel_vendas_mensais`
--

CREATE TABLE `painel_vendas_mensais` (
  `id` int(11) NOT NULL,
  `ano_mes` varchar(100) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(18, 'Descrição 22', 'on', 'on', 'on', 'on', 'Agregar Simples', 'Metro', 'Vidro Simples', 'Esquadreta', 'Esquadreta Reforcada A ', 'Esquadreta Reforcada B ', 'on', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'CPHJ-gfruyu', '0.00', '0.00', '0.00', 'gfvk', 'bhjkjjhm', 'upload/64d14c9f86635.png', 'on'),
(19, 'Descrição', 'on', 'on', 'on', 'on', 'Agregar Simples', 'Metro', 'Vidro Simples', 'Esquadreta', 'Esquadreta Reforcada A ', 'Esquadreta Reforcada B ', 'on', '2.00', '10.00', '10.00', '12.20', '12.00', '12.00', '22.00', '2.00', '6.00', '12.00', 'CPHJ-gj76fg', '22.00', '12.00', '11.00', 'Refrnn', 'Detalhes', 'upload/64d29ed5c9c2a.png', 'on');

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
  `volume` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao_do_produto`, `codigo_produto`, `codigo_da_fabrica`, `referencia`, `libera_para_venda`, `bloqueia_estoque_negativo`, `embalagem_fornecedor`, `consumo_medio`, `massa`, `ultima_alteracao`, `ativo`, `custo_atual`, `markup`, `venda`, `ipi`, `unidade_basica`, `estoque`, `estoque_minimo`, `estoque_de_seguranca`, `tempo_de_reposicao`, `linha`, `embalagem`, `localizador`, `classificacao_fiscal`, `volume`) VALUES
(4, 'Produto 1 Update', 'CProdHJ-vrejgkbrehigy43', '63672e', 'eferfr', 'on', 'on', '2', '3', '4', '2023-09-03', 'on', '10', '4', '22', '3', 'Unidade', '4', '5', '6', '8', 'Linha', '43', 'ff44', '4', '6');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tintas`
--

INSERT INTO `tintas` (`id`, `descricao`, `codigo_produto`, `unidade`, `custo`, `codigo_da_fabrica`, `ultima_alteracao`, `ativo`) VALUES
(3, 'Tinta 5 Update', 'CtinHJ-j87329', 'Grama', '12', '12', '2023-08-23', 'on'),
(4, 'Descrição 1', 'CTinHJ-gfhe73332', 'Grama', '12', '11', '2023-08-24', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_do_item_agregar`
--

CREATE TABLE `tipo_do_item_agregar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `movimentacao_consumo_de_materia_prima`
--
ALTER TABLE `movimentacao_consumo_de_materia_prima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `painel_pedidos_orcamentos`
--
ALTER TABLE `painel_pedidos_orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
