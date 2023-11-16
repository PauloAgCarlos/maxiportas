-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10-Nov-2023 às 13:01
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
(5, 'TEs', '9863722', 'tes@gma.dede', '123', 'adm', 12, 'Administradores da Empresa', 'sdfghj', '2023-11-08', 'on'),
(6, 'hjaluminio', '09863709', 'hjaluminio@gmail.com', '12345678', 'adm', 12, 'Administradores da Empresa', 'Obs', '2023-11-08', 'on'),
(7, 'Julio', '43998145293', 'ti@hjaluminio.com.br', 'Mrjulio086', 'adm', 0, 'Administradores da Empresa', '', '0000-00-00', 'on'),
(8, 'Marcieli', '4330560052', 'marcieli@hjaluminio.com.br', 'mudar123', 'adm', 0, 'Administradores da Empresa', '', '0000-00-00', 'on');

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
  `cnpj` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `atividade_principal` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `abertura` varchar(255) DEFAULT NULL,
  `porte` varchar(255) DEFAULT NULL,
  `situacao` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `fantasia` varchar(255) DEFAULT NULL,
  `natureza_juridica` varchar(255) DEFAULT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `cnpj`, `nome`, `senha`, `email`, `atividade_principal`, `endereco`, `abertura`, `porte`, `situacao`, `tipo`, `fantasia`, `natureza_juridica`, `nivel`) VALUES
(89, '31036967000157', 'VICTORY PARTICIPACOES LTDA', '', '', 'Holdings de instituições não-financeiras', 'RUA DIAMETRAL, 102, SAGRADA FAMILIA, BELO HORIZONTE - MG', '26/07/2018', 'DEMAIS', 'ATIVA', 'MATRIZ', 'VICTORY PARTICIPACOES LTDA', '206-2 - Sociedade Empresária Limitada', 'user'),
(90, '42270291000188', 'JH HUMENHUK - VESTUARIO E INFORMATICA LTDA', '', '', 'Comércio varejista especializado de equipamentos de telefonia e comunicação', 'RUA CANARIO, 250, PARQUE VENEZA, ARAPONGAS - PR', '10/06/2021', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(91, '20767511000140', '20.767.511 WEVERTON HENRIQUE MATHEUSSI', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA MIGUEL ANTONUCCI - ATE 488/489, 210, CENTRO, CANDIDO MOTA - SP', '04/08/2014', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(92, '11118851000150', 'ADILSON FARIAS DOS SANTOS', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA MARINGA, 178, COPEL, BOM SUCESSO - PR', '08/09/2009', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(93, '21178832000172', 'CRISTIANO DA SILVA BORGUEZAO', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA RODRIGUES, 475, VILA RODRIGUES, ASSIS - SP', '07/10/2014', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DECUORE PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(94, '29306211000139', 'CRIVELAR MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA TANGARA, 1061, JARDIM PETROPOLIS, ARAPONGAS - PR', '21/12/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'CRIVELAR MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(95, '01299595000190', 'D.H INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA TANGARA, 1580, JARDIM PETROPOLIS, ARAPONGAS - PR', '04/07/1996', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DECOR HOME', '206-2 - Sociedade Empresária Limitada', 'user'),
(96, '08176730000150', 'ODORIZZI & LIMA LTDA', '', '', 'Comércio varejista de móveis', 'RUA PAULO HONORATO SOARES, 161, DISTRITO INDUSTRIAL MANOEL MESSIAS BARBOSA, CANDIDO MOTA - SP', '21/07/2006', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(97, '46040771000103', 'ALEX U PAVANI', '', '', 'Fabricação de móveis com predominância de madeira', 'AVENIDA ESPIRITO SANTO, 110, JARDIM APUCARANA, APUCARANA - PR', '14/04/2022', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DOM - MOVEIS SOB MEDIDA', '213-5 - Empresário (Individual)', 'user'),
(98, '26881855000162', 'EXCLUSIVE MOVELARIA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA SANHACO-REI, 216, JARDIM SANTA ALICE, ARAPONGAS - PR', '17/01/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'EXCLUSIVE MOVELARIA', '206-2 - Sociedade Empresária Limitada', 'user'),
(99, '07973649000138', 'GENIVALDO BENEDITO DE ALMEIDA & CIA LTDA', '', '', 'Comércio varejista de móveis', 'RUA ASSAD CHADI, 810, VIAL GAZOLA, CANDIDO MOTA - SP', '12/04/2006', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(100, '52867660000178', 'GUADAIM MOVEIS E ELETRODOMESTICOS LTDA', '', '', 'Comércio varejista de móveis', 'AVENIDA ARMANDO SALLES DE OLIVEIRA, 129, CENTRO, ASSIS - SP', '18/08/1983', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(101, '58517657000100', 'ICOMAR - INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA FELIX JABUR, 386, CENTRO, CANDIDO MOTA - SP', '05/01/1988', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(102, '43983894000190', 'IDEALLIZZE MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA RONDONIA, 500, JARDIM PARANA II, ASTORGA - PR', '22/10/2021', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'IDEALLIZZE MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(103, '05523967000171', 'KNR INDUSTRIA MOVELEIRA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'AVENIDA ARVELINO DURANTE, 410, PQ INDUSTRIAL, SABAUDIA - PR', '22/01/2003', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'KNR MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(104, '16744669000128', 'H. C. MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'AVENIDA JUVENCIO BARBOSA SILVEIRA (ZONA 19), 428, GIARDINO SAN MARCO, MARINGA - PR', '21/08/2012', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'LOVAT MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(105, '37920005000142', 'MARCIO APARECIDO FABRICIO PACHIERI LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'ESTRADA ARACA, 1881, PARQUE INDUSTRIAL BANDEIRANTES, MARINGA - PR', '30/07/2020', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'MADEARTE', '206-2 - Sociedade Empresária Limitada', 'user'),
(106, '26726154000159', 'RONALDO ALVES LEAL DA SILVA 26228875825', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA SATURNO (JD SATELITE), 07, COOPERATIVA, SAO BERNARDO DO CAMPO - SP', '16/12/2016', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'N&P MOVEIS PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(107, '32245307000149', 'FERREIRA PORTO MARCENARIA LTDA', '', '', 'Comércio varejista de móveis', 'RUA SAO CAETANO, 330, JARDIM ALVORADA, CANDIDO MOTA - SP', '13/12/2018', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'PORTO MARCENARIA', '206-2 - Sociedade Empresária Limitada', 'user'),
(108, '86723129000143', 'RODRIZAN INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA ANTONIO PESCADOR, 197, PARQ. INDUSTRIAL III, SERTANOPOLIS - PR', '17/02/1994', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'RODRIZAN MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(109, '00781215000197', 'RUD RACK INDUSTRIA E COMERCIO DE MOVEIS LTDA.', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA HUNGRIA, 2270, MANOEL MULLER, ROLANDIA - PR', '01/08/1995', 'DEMAIS', 'ATIVA', 'MATRIZ', 'RUD RACK', '206-2 - Sociedade Empresária Limitada', 'user'),
(110, '03438869000100', 'A. P. GARCIA JUNIOR & CIA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA SAO JOSE, 180, JD. SANTA IZABEL, CAMBE - PR', '16/09/1999', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(111, '17944953000100', 'THIAGO MUELLER PLANEJADOS LTDA.', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA MARIO VINCI, 326, PARQUE INDUSTRIAL RICIERI RESQUETTI, ASTORGA - PR', '16/04/2013', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'PLANEJADOS MUELLER', '206-2 - Sociedade Empresária Limitada', 'user'),
(112, '03766882000270', 'TRIUNFAL COZINHAS E MODULADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RODOVIA CELSO GARCIA CID, 3073, JD RIVIERA, CAMBE - PR', '25/11/2009', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'FILIAL', 'TRIUNFAL MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(113, '13688870000147', 'VAZ MOVELARIA INDUSTRIA E COMERCIO LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA ARTHUR BOCATTO, 111, JARDIM VO ZEZINHO, CAMBE - PR', '11/05/2011', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'VAZ MOVELARIA', '206-2 - Sociedade Empresária Limitada', 'user'),
(114, '29337597000146', 'BMD MOVELARIA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA CATORRITA, 220, JARDIM DO SOL, ARAPONGAS - PR', '02/01/2018', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'CHAIR HOUSE', '206-2 - Sociedade Empresária Limitada', 'user'),
(115, '41007743000170', 'VANESSA PIRES RAMOS PLANEJADOS', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA SANTOS, 257, JD QUEIROZ, CAMBE - PR', '26/02/2021', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'EXCLUSIVA PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(116, '27227674000180', 'FABIO APARECIDO QUIEZI 00729294994', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA CURRIQUEIRO-DO-CHAO, 179, JARDIM PORTAL DAS FLORES II, ARAPONGAS - PR', '06/03/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'LUXE PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(117, '30433108000139', 'H VAZ BESSON MOVEIS', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA EDUARDO DISPARO GOMES, 715, RESIDENCIAL ABUSSAFE, CAMBE - PR', '11/05/2018', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(118, '20335768000123', 'MB MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA NORUEGA, 501, CENTRO, CAMBE - PR', '23/05/2014', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(119, '20229157000109', 'JPR INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA NORUEGA, 589, CENTRO, CAMBE - PR', '22/04/2014', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(120, '30517880000139', 'REGINALDO FERNANDES BALIERO 02384125982', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA ALMEIDA PORTO, 400, VILA OLIVEIRA, ROLANDIA - PR', '22/05/2018', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'LINEAR PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(121, '35797801000104', 'MARCENARIA SANTA HELENA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA EUCLIDES DA CUNHA, 1297, CENTRO, ALTO PARANA - PR', '16/12/2019', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', 'MARCENARIA SANTA HELENA', '206-2 - Sociedade Empresária Limitada', 'user'),
(122, '50462824000151', 'CHIULE ARAUJO INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA PAVÃOZINHO DO PARÁ, 1985, PARQUE INDUSTRIAL II, ARAPONGAS - PR', '26/04/2023', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(123, '50284842000271', 'SUCESSO TOTAL COMERCIO DE MOVEIS LTDA', '', '', 'Comércio varejista de móveis', 'RUA TOVACU, 576, VILA TRIANGULO, ARAPONGAS - PR', '26/04/2023', 'MICRO EMPRESA', 'ATIVA', 'FILIAL', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(124, '35643349000126', 'RAFAEL CHIULE MOVEIS PLANEJADOS', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA TAPAJOS, 145, NOSSA SENHORA DA APARECIDA, ROLANDIA - PR', '28/11/2019', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(125, '44897906000126', 'MOVEARA INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA BENTERERE DE PEITO CINZA, 115, PARQUE INDUSTRIAL II, ARAPONGAS - PR', '17/01/2022', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(126, '28965476000186', 'RAFELI INDUSTRIA E COMERCIO DE MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA GARRINCHA DO MATO GROSSO, 241, JARDIM VALE DAS PEROBAS, ARAPONGAS - PR', '30/10/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'RAFELI', '206-2 - Sociedade Empresária Limitada', 'user'),
(127, '14911171000187', 'RAD & DANA MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'AVENIDA ARACI SOARES DOS SANTOS, 747, JARDIM NOVA LONDRINA, LONDRINA - PR', '11/01/2012', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'SAVANA MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(128, '07177863000188', 'SIELLO\\\'S MOVELARIA LTDA', '', '', 'Comércio varejista de móveis', 'AVENIDA DOS PIONEIROS, 438, CENTRO, MANDAGUARI - PR', '18/01/2005', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'SIELLO\\\'S MOVELARIA', '206-2 - Sociedade Empresária Limitada', 'user'),
(129, '23696036000157', 'THIAGO PRIETO BRIQUES LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA JOAO MAZETO, 190, PARQUE INDUSTRIAL II, COLORADO - PR', '19/11/2015', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'TC MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(130, '27163425000178', 'V PONCIANO SILVA - MOVEIS', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA BEM-TE-VI-RAJADO, 57, CASA FAMILIA ARAPONGAS I, ARAPONGAS - PR', '21/02/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'PONCIANO PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(131, '80312887000192', 'LIPE - INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'R HENRIQUE PAULA SILVA, 23, JARDIM PAINEIRAS, APUCARANA - PR', '08/10/1987', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(132, '02691826000170', 'BELIMOVEIS IND E COM DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA ALCATRAZ, 136, VILA INDUSTRIAL, ARAPONGAS - PR', '05/08/1998', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(133, '02808002000137', 'FRATTO MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA DO MOGNO, 685, CDA, ASSIS - SP', '20/10/1998', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(134, '33503869000108', 'MARCELO RODELLA 26848386820', '', '', 'Fabricação de móveis com predominância de madeira', 'AVENIDA JOAO FLAUZINO BARBOSA, 210, PARQUE SANTA CRUZ, CANDIDO MOTA - SP', '02/05/2019', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(135, '12830101000179', 'MAXIMA - MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA BACURAU AMERICANO, 323, JARDIM PLANALTO, ARAPONGAS - PR', '05/11/2010', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'MAXIMA MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(136, '24235704000101', 'REALIZZA MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA JACOMO VALERIO, 611, CENTRO, SABAUDIA - PR', '23/02/2016', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'REALIZZA MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(137, '26798245000108', 'SLE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA FOGO APAGOU, 150, JARDIM PRIMAVERA, ARAPONGAS - PR', '04/01/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'SLE MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(138, '10202475000114', 'A. S. CAMARA COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA ESTORIL, 210, JARDIM SAO FRANCISCO DE ASSIS, LONDRINA - PR', '26/06/2008', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(139, '51018866000160', '51.018.866 FABIO DIAS VELLOZO', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA AGUIAS - DE 1801/1802 AO FIM, 2023, JARDIM CASA BRANCA, ARAPONGAS - PR', '12/06/2023', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(140, '04857092000181', 'SALES & ZAGO LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA FRANCISCO DELGADO SANCHES, 1063, JARDIM VITORIA, CAMBE - PR', '18/01/2002', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DESTAQUE MOVEIS LTDA', '206-2 - Sociedade Empresária Limitada', 'user'),
(141, '19046584000164', 'SAMBI INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'R TECELAO, 161, JARDIM BANDEIRANTES, ARAPONGAS - PR', '26/09/2013', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DIMOL MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(142, '19272530000117', 'ESPACO ADEQUADO LTDA', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA CAETANO PERES CLABONDE, 73, PARQUE INDUSTRIAL ZONA OESTE II, APUCARANA - PR', '07/11/2013', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'ESPACO ADEQUADO', '206-2 - Sociedade Empresária Limitada', 'user'),
(143, '19649903000126', 'N. BERLIN MARCENARIA', '', '', 'Fabricação de móveis com predominância de madeira', 'AVENIDA ALTO YPIRANGA, 390, VILA ALTO IPIRANGA, ALTO PARANA - PR', '31/01/2014', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', 'MARCENARIA BELDAN', '213-5 - Empresário (Individual)', 'user'),
(144, '34436830000188', 'ZANI & BARROS LTDA', '', '', 'Comércio varejista de móveis', 'RUA JACOB BARTOLOMEU MINATTI, 490W, CENTRO, LONDRINA - PR', '06/08/2019', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'ZANI MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(145, '09106052000111', 'COSTA E CAMARGO MOVEIS LTDA.', '', '', 'Fabricação de móveis com predominância de madeira', 'RUA SALVINO DE SOUZA ANDRADE, 577, VILA SAO LUIZ, OURINHOS - SP', '21/09/2007', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(146, '12592129000115', 'GAMYLE ILUMINACAO LTDA', '', '', 'Comércio varejista de móveis', 'R PADRE SEVERINO CERUTTI, 538, VILA SAO JOSE, APUCARANA - PR', '17/09/2010', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', 'GAMYLE DISTRIBUDORA', '206-2 - Sociedade Empresária Limitada', 'user'),
(147, '28173654000136', 'L S G AMBIENTES PLANEJADOS LTDA', '', '', 'Comércio varejista de móveis', 'AVENIDA DOUTOR GASTAO VIDIGAL, 3035, JARDIM FREGADOLLI, MARINGA - PR', '13/07/2017', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', 'INUSITTA MARINGA', '206-2 - Sociedade Empresária Limitada', 'user'),
(151, '23239351000155', 'EDNALDO GOMES DE FARIAS 05580355742', '1234', 'Updategerador@sss.com', '********', 'AVENIDA PERIMETRAL PRUDENTE DE MORAIS, 760, VILA SAO LUIS, DUQUE DE CAXIAS - RJ', '09/09/2015', 'MICRO EMPRESA', 'INAPTA', 'MATRIZ', 'FARIAS BOLOS', '213-5 - Empresário (Individual)', 'user');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_de_pagamento`
--

CREATE TABLE `forma_de_pagamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(50) NOT NULL,
  `atividade_principal` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `abertura` varchar(255) DEFAULT NULL,
  `porte` varchar(255) DEFAULT NULL,
  `situacao` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `fantasia` varchar(255) DEFAULT NULL,
  `natureza_juridica` varchar(255) DEFAULT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `logado`
--

INSERT INTO `logado` (`id`, `nome`, `email`, `senha`, `atividade_principal`, `cpf`, `endereco`, `abertura`, `porte`, `situacao`, `tipo`, `fantasia`, `natureza_juridica`, `nivel`) VALUES
(46, 'Paulo', 'paulo@gmail.com', '121212', 'Adm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adm'),
(48, 'VICTORY PARTICIPACOES LTDA', '', '', 'Holdings de instituições não-financeiras', '31036967000157', 'RUA DIAMETRAL, 102, SAGRADA FAMILIA, BELO HORIZONTE - MG', '26/07/2018', 'DEMAIS', 'ATIVA', 'MATRIZ', 'VICTORY PARTICIPACOES LTDA', '206-2 - Sociedade Empresária Limitada', 'user'),
(49, 'JH HUMENHUK - VESTUARIO E INFORMATICA LTDA', '', '', 'Comércio varejista especializado de equipamentos de telefonia e comunicação', '42270291000188', 'RUA CANARIO, 250, PARQUE VENEZA, ARAPONGAS - PR', '10/06/2021', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(50, '20.767.511 WEVERTON HENRIQUE MATHEUSSI', '', '', 'Fabricação de móveis com predominância de madeira', '20767511000140', 'RUA MIGUEL ANTONUCCI - ATE 488/489, 210, CENTRO, CANDIDO MOTA - SP', '04/08/2014', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(51, 'ADILSON FARIAS DOS SANTOS', '', '', 'Fabricação de móveis com predominância de madeira', '11118851000150', 'RUA MARINGA, 178, COPEL, BOM SUCESSO - PR', '08/09/2009', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(52, 'CRISTIANO DA SILVA BORGUEZAO', '', '', 'Fabricação de móveis com predominância de madeira', '21178832000172', 'RUA RODRIGUES, 475, VILA RODRIGUES, ASSIS - SP', '07/10/2014', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DECUORE PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(53, 'CRIVELAR MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '29306211000139', 'RUA TANGARA, 1061, JARDIM PETROPOLIS, ARAPONGAS - PR', '21/12/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'CRIVELAR MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(54, 'D.H INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '01299595000190', 'RUA TANGARA, 1580, JARDIM PETROPOLIS, ARAPONGAS - PR', '04/07/1996', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DECOR HOME', '206-2 - Sociedade Empresária Limitada', 'user'),
(55, 'ODORIZZI & LIMA LTDA', '', '', 'Comércio varejista de móveis', '08176730000150', 'RUA PAULO HONORATO SOARES, 161, DISTRITO INDUSTRIAL MANOEL MESSIAS BARBOSA, CANDIDO MOTA - SP', '21/07/2006', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(56, 'ALEX U PAVANI', '', '', 'Fabricação de móveis com predominância de madeira', '46040771000103', 'AVENIDA ESPIRITO SANTO, 110, JARDIM APUCARANA, APUCARANA - PR', '14/04/2022', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DOM - MOVEIS SOB MEDIDA', '213-5 - Empresário (Individual)', 'user'),
(57, 'EXCLUSIVE MOVELARIA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '26881855000162', 'RUA SANHACO-REI, 216, JARDIM SANTA ALICE, ARAPONGAS - PR', '17/01/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'EXCLUSIVE MOVELARIA', '206-2 - Sociedade Empresária Limitada', 'user'),
(58, 'GENIVALDO BENEDITO DE ALMEIDA & CIA LTDA', '', '', 'Comércio varejista de móveis', '07973649000138', 'RUA ASSAD CHADI, 810, VIAL GAZOLA, CANDIDO MOTA - SP', '12/04/2006', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(59, 'GUADAIM MOVEIS E ELETRODOMESTICOS LTDA', '', '', 'Comércio varejista de móveis', '52867660000178', 'AVENIDA ARMANDO SALLES DE OLIVEIRA, 129, CENTRO, ASSIS - SP', '18/08/1983', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(60, 'ICOMAR - INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '58517657000100', 'RUA FELIX JABUR, 386, CENTRO, CANDIDO MOTA - SP', '05/01/1988', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(61, 'IDEALLIZZE MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '43983894000190', 'RUA RONDONIA, 500, JARDIM PARANA II, ASTORGA - PR', '22/10/2021', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'IDEALLIZZE MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(62, 'KNR INDUSTRIA MOVELEIRA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '05523967000171', 'AVENIDA ARVELINO DURANTE, 410, PQ INDUSTRIAL, SABAUDIA - PR', '22/01/2003', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'KNR MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(63, 'H. C. MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '16744669000128', 'AVENIDA JUVENCIO BARBOSA SILVEIRA (ZONA 19), 428, GIARDINO SAN MARCO, MARINGA - PR', '21/08/2012', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'LOVAT MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(64, 'MARCIO APARECIDO FABRICIO PACHIERI LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '37920005000142', 'ESTRADA ARACA, 1881, PARQUE INDUSTRIAL BANDEIRANTES, MARINGA - PR', '30/07/2020', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'MADEARTE', '206-2 - Sociedade Empresária Limitada', 'user'),
(65, 'RONALDO ALVES LEAL DA SILVA 26228875825', '', '', 'Fabricação de móveis com predominância de madeira', '26726154000159', 'RUA SATURNO (JD SATELITE), 07, COOPERATIVA, SAO BERNARDO DO CAMPO - SP', '16/12/2016', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'N&P MOVEIS PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(66, 'FERREIRA PORTO MARCENARIA LTDA', '', '', 'Comércio varejista de móveis', '32245307000149', 'RUA SAO CAETANO, 330, JARDIM ALVORADA, CANDIDO MOTA - SP', '13/12/2018', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'PORTO MARCENARIA', '206-2 - Sociedade Empresária Limitada', 'user'),
(67, 'RODRIZAN INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '86723129000143', 'RUA ANTONIO PESCADOR, 197, PARQ. INDUSTRIAL III, SERTANOPOLIS - PR', '17/02/1994', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'RODRIZAN MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(68, 'RUD RACK INDUSTRIA E COMERCIO DE MOVEIS LTDA.', '', '', 'Fabricação de móveis com predominância de madeira', '00781215000197', 'RUA HUNGRIA, 2270, MANOEL MULLER, ROLANDIA - PR', '01/08/1995', 'DEMAIS', 'ATIVA', 'MATRIZ', 'RUD RACK', '206-2 - Sociedade Empresária Limitada', 'user'),
(69, 'A. P. GARCIA JUNIOR & CIA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '03438869000100', 'RUA SAO JOSE, 180, JD. SANTA IZABEL, CAMBE - PR', '16/09/1999', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(70, 'THIAGO MUELLER PLANEJADOS LTDA.', '', '', 'Fabricação de móveis com predominância de madeira', '17944953000100', 'RUA MARIO VINCI, 326, PARQUE INDUSTRIAL RICIERI RESQUETTI, ASTORGA - PR', '16/04/2013', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'PLANEJADOS MUELLER', '206-2 - Sociedade Empresária Limitada', 'user'),
(71, 'TRIUNFAL COZINHAS E MODULADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '03766882000270', 'RODOVIA CELSO GARCIA CID, 3073, JD RIVIERA, CAMBE - PR', '25/11/2009', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'FILIAL', 'TRIUNFAL MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(72, 'VAZ MOVELARIA INDUSTRIA E COMERCIO LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '13688870000147', 'RUA ARTHUR BOCATTO, 111, JARDIM VO ZEZINHO, CAMBE - PR', '11/05/2011', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'VAZ MOVELARIA', '206-2 - Sociedade Empresária Limitada', 'user'),
(73, 'BMD MOVELARIA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '29337597000146', 'RUA CATORRITA, 220, JARDIM DO SOL, ARAPONGAS - PR', '02/01/2018', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'CHAIR HOUSE', '206-2 - Sociedade Empresária Limitada', 'user'),
(74, 'VANESSA PIRES RAMOS PLANEJADOS', '', '', 'Fabricação de móveis com predominância de madeira', '41007743000170', 'RUA SANTOS, 257, JD QUEIROZ, CAMBE - PR', '26/02/2021', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'EXCLUSIVA PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(75, 'FABIO APARECIDO QUIEZI 00729294994', '', '', 'Fabricação de móveis com predominância de madeira', '27227674000180', 'RUA CURRIQUEIRO-DO-CHAO, 179, JARDIM PORTAL DAS FLORES II, ARAPONGAS - PR', '06/03/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'LUXE PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(76, 'H VAZ BESSON MOVEIS', '', '', 'Fabricação de móveis com predominância de madeira', '30433108000139', 'RUA EDUARDO DISPARO GOMES, 715, RESIDENCIAL ABUSSAFE, CAMBE - PR', '11/05/2018', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(77, 'MB MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '20335768000123', 'RUA NORUEGA, 501, CENTRO, CAMBE - PR', '23/05/2014', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(78, 'JPR INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '20229157000109', 'RUA NORUEGA, 589, CENTRO, CAMBE - PR', '22/04/2014', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(79, 'REGINALDO FERNANDES BALIERO 02384125982', '', '', 'Fabricação de móveis com predominância de madeira', '30517880000139', 'RUA ALMEIDA PORTO, 400, VILA OLIVEIRA, ROLANDIA - PR', '22/05/2018', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'LINEAR PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(80, 'MARCENARIA SANTA HELENA LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '35797801000104', 'RUA EUCLIDES DA CUNHA, 1297, CENTRO, ALTO PARANA - PR', '16/12/2019', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', 'MARCENARIA SANTA HELENA', '206-2 - Sociedade Empresária Limitada', 'user'),
(81, 'CHIULE ARAUJO INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '50462824000151', 'RUA PAVÃOZINHO DO PARÁ, 1985, PARQUE INDUSTRIAL II, ARAPONGAS - PR', '26/04/2023', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(82, 'SUCESSO TOTAL COMERCIO DE MOVEIS LTDA', '', '', 'Comércio varejista de móveis', '50284842000271', 'RUA TOVACU, 576, VILA TRIANGULO, ARAPONGAS - PR', '26/04/2023', 'MICRO EMPRESA', 'ATIVA', 'FILIAL', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(83, 'RAFAEL CHIULE MOVEIS PLANEJADOS', '', '', 'Fabricação de móveis com predominância de madeira', '35643349000126', 'RUA TAPAJOS, 145, NOSSA SENHORA DA APARECIDA, ROLANDIA - PR', '28/11/2019', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(84, 'MOVEARA INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '44897906000126', 'RUA BENTERERE DE PEITO CINZA, 115, PARQUE INDUSTRIAL II, ARAPONGAS - PR', '17/01/2022', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(85, 'RAFELI INDUSTRIA E COMERCIO DE MOVEIS PLANEJADOS L', '', '', 'Fabricação de móveis com predominância de madeira', '28965476000186', 'RUA GARRINCHA DO MATO GROSSO, 241, JARDIM VALE DAS PEROBAS, ARAPONGAS - PR', '30/10/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'RAFELI', '206-2 - Sociedade Empresária Limitada', 'user'),
(86, 'RAD & DANA MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '14911171000187', 'AVENIDA ARACI SOARES DOS SANTOS, 747, JARDIM NOVA LONDRINA, LONDRINA - PR', '11/01/2012', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'SAVANA MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(87, 'SIELLO\\\'S MOVELARIA LTDA', '', '', 'Comércio varejista de móveis', '07177863000188', 'AVENIDA DOS PIONEIROS, 438, CENTRO, MANDAGUARI - PR', '18/01/2005', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'SIELLO\\\'S MOVELARIA', '206-2 - Sociedade Empresária Limitada', 'user'),
(88, 'THIAGO PRIETO BRIQUES LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '23696036000157', 'RUA JOAO MAZETO, 190, PARQUE INDUSTRIAL II, COLORADO - PR', '19/11/2015', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'TC MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(89, 'V PONCIANO SILVA - MOVEIS', '', '', 'Fabricação de móveis com predominância de madeira', '27163425000178', 'RUA BEM-TE-VI-RAJADO, 57, CASA FAMILIA ARAPONGAS I, ARAPONGAS - PR', '21/02/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'PONCIANO PLANEJADOS', '213-5 - Empresário (Individual)', 'user'),
(90, 'LIPE - INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '80312887000192', 'R HENRIQUE PAULA SILVA, 23, JARDIM PAINEIRAS, APUCARANA - PR', '08/10/1987', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(91, 'BELIMOVEIS IND E COM DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '02691826000170', 'RUA ALCATRAZ, 136, VILA INDUSTRIAL, ARAPONGAS - PR', '05/08/1998', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(92, 'FRATTO MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '02808002000137', 'RUA DO MOGNO, 685, CDA, ASSIS - SP', '20/10/1998', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(93, 'MARCELO RODELLA 26848386820', '', '', 'Fabricação de móveis com predominância de madeira', '33503869000108', 'AVENIDA JOAO FLAUZINO BARBOSA, 210, PARQUE SANTA CRUZ, CANDIDO MOTA - SP', '02/05/2019', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(94, 'MAXIMA - MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '12830101000179', 'RUA BACURAU AMERICANO, 323, JARDIM PLANALTO, ARAPONGAS - PR', '05/11/2010', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'MAXIMA MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(95, 'REALIZZA MOVEIS PLANEJADOS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '24235704000101', 'RUA JACOMO VALERIO, 611, CENTRO, SABAUDIA - PR', '23/02/2016', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'REALIZZA MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(96, 'SLE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '26798245000108', 'RUA FOGO APAGOU, 150, JARDIM PRIMAVERA, ARAPONGAS - PR', '04/01/2017', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'SLE MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(97, 'A. S. CAMARA COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '10202475000114', 'RUA ESTORIL, 210, JARDIM SAO FRANCISCO DE ASSIS, LONDRINA - PR', '26/06/2008', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(98, '51.018.866 FABIO DIAS VELLOZO', '', '', 'Fabricação de móveis com predominância de madeira', '51018866000160', 'RUA AGUIAS - DE 1801/1802 AO FIM, 2023, JARDIM CASA BRANCA, ARAPONGAS - PR', '12/06/2023', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', '', '213-5 - Empresário (Individual)', 'user'),
(99, 'SALES & ZAGO LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '04857092000181', 'RUA FRANCISCO DELGADO SANCHES, 1063, JARDIM VITORIA, CAMBE - PR', '18/01/2002', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DESTAQUE MOVEIS LTDA', '206-2 - Sociedade Empresária Limitada', 'user'),
(100, 'SAMBI INDUSTRIA E COMERCIO DE MOVEIS LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '19046584000164', 'R TECELAO, 161, JARDIM BANDEIRANTES, ARAPONGAS - PR', '26/09/2013', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'DIMOL MOVEIS PLANEJADOS', '206-2 - Sociedade Empresária Limitada', 'user'),
(101, 'ESPACO ADEQUADO LTDA', '', '', 'Fabricação de móveis com predominância de madeira', '19272530000117', 'RUA CAETANO PERES CLABONDE, 73, PARQUE INDUSTRIAL ZONA OESTE II, APUCARANA - PR', '07/11/2013', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'ESPACO ADEQUADO', '206-2 - Sociedade Empresária Limitada', 'user'),
(102, 'N. BERLIN MARCENARIA', '', '', 'Fabricação de móveis com predominância de madeira', '19649903000126', 'AVENIDA ALTO YPIRANGA, 390, VILA ALTO IPIRANGA, ALTO PARANA - PR', '31/01/2014', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', 'MARCENARIA BELDAN', '213-5 - Empresário (Individual)', 'user'),
(103, 'ZANI & BARROS LTDA', '', '', 'Comércio varejista de móveis', '34436830000188', 'RUA JACOB BARTOLOMEU MINATTI, 490W, CENTRO, LONDRINA - PR', '06/08/2019', 'MICRO EMPRESA', 'ATIVA', 'MATRIZ', 'ZANI MOVEIS', '206-2 - Sociedade Empresária Limitada', 'user'),
(104, 'COSTA E CAMARGO MOVEIS LTDA.', '', '', 'Fabricação de móveis com predominância de madeira', '09106052000111', 'RUA SALVINO DE SOUZA ANDRADE, 577, VILA SAO LUIZ, OURINHOS - SP', '21/09/2007', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user'),
(105, 'GAMYLE ILUMINACAO LTDA', '', '', 'Comércio varejista de móveis', '12592129000115', 'R PADRE SEVERINO CERUTTI, 538, VILA SAO JOSE, APUCARANA - PR', '17/09/2010', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', 'GAMYLE DISTRIBUDORA', '206-2 - Sociedade Empresária Limitada', 'user'),
(106, 'L S G AMBIENTES PLANEJADOS LTDA', '', '', 'Comércio varejista de móveis', '28173654000136', 'AVENIDA DOUTOR GASTAO VIDIGAL, 3035, JARDIM FREGADOLLI, MARINGA - PR', '13/07/2017', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', 'INUSITTA MARINGA', '206-2 - Sociedade Empresária Limitada', 'user'),
(110, 'EDNALDO GOMES DE FARIAS 05580355742', 'Updategerador@sss.com', '1234', '********', '23239351000155', 'AVENIDA PERIMETRAL PRUDENTE DE MORAIS, 760, VILA SAO LUIS, DUQUE DE CAXIAS - RJ', '09/09/2015', 'MICRO EMPRESA', 'INAPTA', 'MATRIZ', 'FARIAS BOLOS', '213-5 - Empresário (Individual)', 'user');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `atividade_principal` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `abertura` varchar(255) DEFAULT NULL,
  `porte` varchar(255) DEFAULT NULL,
  `situacao` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `fantasia` varchar(255) DEFAULT NULL,
  `natureza_juridica` varchar(255) DEFAULT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `cnpj`, `nome`, `senha`, `email`, `atividade_principal`, `endereco`, `abertura`, `porte`, `situacao`, `tipo`, `fantasia`, `natureza_juridica`, `nivel`) VALUES
(3, '05148702000130', 'W E R SERVICOS LTDA', '1234', 'Updatepareceiro@teste.sfe', 'Instalações elétricas', 'RUA PADRE ALUISIO BOEING, 500, BARRA DO RIO CERRO, JARAGUA DO SUL - SC', '15/07/2002', 'EMPRESA DE PEQUENO PORTE', 'ATIVA', 'MATRIZ', '', '206-2 - Sociedade Empresária Limitada', 'user');

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
(10, 'TC', '<p>10 Portas</p><p>5 Travessas</p>', '31/08/2023', '31/08/2023', '', 'Finalizado', 'Paulo'),
(11, 'Paulo Carlos', '<p>10 Travessas</p>', '04/09/2023', '04/09/2023', '', 'Finalizado', 'Paulo'),
(12, 'PC', '<p>10 Portas com uma fechadura</p>', '07/09/2023', '07/09/2023', '', 'Em Andamento', ''),
(13, 'Dev', '<p>10 Porta 3 Dobradissas</p>', '14/09/2023', '14/09/2023', '', 'Em Andamento', ''),
(14, 'DevAholic', '<p>testettt</p>', '12/10/2023', '12/10/2023', '', 'Em Andamento', '');

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
(21, 'Descrição Perfil', 'on', 'on', 'on', 'on', 'Agregar Simples', 'Metro', 'Vidro Simples', 'Esquadreta', 'Esquadreta Reforcada A ', 'Esquadreta Reforcada B ', 'on', 2.00, 10.00, 10.00, 12.20, 12.00, 8.00, 15.00, 12.00, 87.00, 50.00, 'CPHJ-FT102', 22.00, 12.00, 89.00, 'Ref', 'Det', 'upload/654aa00827ce2.avif', 'on'),
(24, 'Nome 10', 'on', 'on', 'on', 'on', 'Agregar Simples', 'Metro', 'Vidro Simples', 'Esquadreta', 'Esquadreta Reforcada A ', 'Esquadreta Reforcada B ', 'on', 2.00, 10.00, 10.00, 12.20, 12.00, 30.00, 22.00, 1.00, 5.00, 50.00, 'CPHJ-124002', 22.00, 12.00, 12.00, '', '', 'upload/654e10ddbcbcb.avif', 'on');

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
(13, 'DOB. ALTA SIMPLES HD', 'CProdHJ-01', '', '0', '', '', '', '', 0, '0000-00-00', '', 0, 0, 0, '', 'Unidade', '', '', '', '', 'Linha', '', '', '', '', '100'),
(14, ' DOB. RETA SIMPLES HD', 'CProdHJ-02', '', '0', '', '', '', '', 0, '0000-00-00', '', 0, 0, 0, '', 'Unidade', '', '', '', '', 'Linha', '', '', '', '', '10'),
(15, 'ACIDATO 4MM', 'CProdHJ-03', '', '0', '', '', '', '', 0, '0000-00-00', '', 0, 0, 0, '', 'Unidade', '', '', '', '', 'Linha', '', '', '', '', '10'),
(16, 'ACIDATO BRONZE 4MM', 'CProdHJ-04', '', '0', '', '', '', '', 0, '0000-00-00', '', 0, 0, 0, '', 'Unidade', '', '', '', '', 'Linha', '', '', '', '', '10');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_clientes_system`
--

CREATE TABLE `tbl_clientes_system` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` text NOT NULL,
  `bairro` text DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `fone` varchar(255) DEFAULT NULL,
  `cep` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_clientes_system`
--

INSERT INTO `tbl_clientes_system` (`id`, `nome`, `endereco`, `bairro`, `cidade`, `fone`, `cep`) VALUES
(6, 'VICTORY PARTICIPACOES LTDA', 'RUA DIAMETRAL, 102, SAGRADA FAMILIA, BELO HORIZONTE - MG', NULL, NULL, NULL, '31036967000157'),
(7, 'VICTORY PARTICIPACOES LTDA', 'RUA DIAMETRAL, 102, SAGRADA FAMILIA, BELO HORIZONTE - MG', NULL, NULL, NULL, '31036967000157'),
(8, 'JH HUMENHUK - VESTUARIO E INFORMATICA LTDA', 'RUA CANARIO, 250, PARQUE VENEZA, ARAPONGAS - PR', NULL, NULL, NULL, '42270291000188'),
(9, 'LUANA THOMAZ BERTONI 30665927827', 'AVENIDA PRESIDENTE KENNEDY, 5312, TUPI, PRAIA GRANDE - SP', NULL, NULL, NULL, '28207944000153'),
(10, 'LUANA THOMAZ BERTONI 30665927827', 'AVENIDA PRESIDENTE KENNEDY, 5312, TUPI, PRAIA GRANDE - SP', NULL, NULL, NULL, '28207944000153'),
(11, 'VICTORY PARTICIPACOES LTDA', 'RUA DIAMETRAL, 102, SAGRADA FAMILIA, BELO HORIZONTE - MG', NULL, NULL, NULL, '31036967000157'),
(12, 'A GUADAIM TARUMA - MOVEIS E ELETRODOMESTICOS LTDA', 'AV ARAPONGAS, 253, JARDIM DOS PASSAROS - II, TARUMA - SP', NULL, NULL, NULL, '03423452000174'),
(13, 'A M DE SOUZA - MOVEIS E ELETROS', 'AVENIDA PARANA, 86, CENTRO, NOVA AURORA - PR', NULL, NULL, NULL, '13214539000195'),
(14, 'A. M. A. MARCENARIA LTDA', 'AVENIDA ALTO IPIRANGA, 371, VILA ALTO IPIRANGA, ALTO PARANA - PR', NULL, NULL, NULL, '19534563000198'),
(15, 'A C DE ALMEIDA & CIA LTDA', 'RUA REGIO EMILIA, 10, CENTRO, IRECE - BA', NULL, NULL, NULL, '16334716000165'),
(16, 'VICTORY PARTICIPACOES LTDA', 'RUA DIAMETRAL, 102, SAGRADA FAMILIA, BELO HORIZONTE - MG', NULL, NULL, NULL, '31036967000157'),
(17, 'VICTORY PARTICIPACOES LTDA', 'RUA DIAMETRAL, 102, SAGRADA FAMILIA, BELO HORIZONTE - MG', NULL, NULL, NULL, '31036967000157'),
(18, 'VICTORY PARTICIPACOES LTDA', 'RUA DIAMETRAL, 102, SAGRADA FAMILIA, BELO HORIZONTE - MG', NULL, NULL, NULL, '31036967000157'),
(19, 'VICTORY PARTICIPACOES LTDA', 'RUA DIAMETRAL, 102, SAGRADA FAMILIA, BELO HORIZONTE - MG', NULL, NULL, NULL, '31036967000157'),
(20, 'JH HUMENHUK - VESTUARIO E INFORMATICA LTDA', 'RUA CANARIO, 250, PARQUE VENEZA, ARAPONGAS - PR', NULL, NULL, NULL, '42270291000188'),
(21, '20.767.511 WEVERTON HENRIQUE MATHEUSSI', 'RUA MIGUEL ANTONUCCI - ATE 488/489, 210, CENTRO, CANDIDO MOTA - SP', NULL, NULL, NULL, '20767511000140'),
(22, 'ADILSON FARIAS DOS SANTOS', 'RUA MARINGA, 178, COPEL, BOM SUCESSO - PR', NULL, NULL, NULL, '11118851000150'),
(23, 'CRISTIANO DA SILVA BORGUEZAO', 'RUA RODRIGUES, 475, VILA RODRIGUES, ASSIS - SP', NULL, NULL, NULL, '21178832000172'),
(24, 'CRIVELAR MOVEIS PLANEJADOS LTDA', 'RUA TANGARA, 1061, JARDIM PETROPOLIS, ARAPONGAS - PR', NULL, NULL, NULL, '29306211000139'),
(25, 'D.H INDUSTRIA E COMERCIO DE MOVEIS LTDA', 'RUA TANGARA, 1580, JARDIM PETROPOLIS, ARAPONGAS - PR', NULL, NULL, NULL, '01299595000190'),
(26, 'ODORIZZI & LIMA LTDA', 'RUA PAULO HONORATO SOARES, 161, DISTRITO INDUSTRIAL MANOEL MESSIAS BARBOSA, CANDIDO MOTA - SP', NULL, NULL, NULL, '08176730000150'),
(27, 'ALEX U PAVANI', 'AVENIDA ESPIRITO SANTO, 110, JARDIM APUCARANA, APUCARANA - PR', NULL, NULL, NULL, '46040771000103'),
(28, 'EXCLUSIVE MOVELARIA LTDA', 'RUA SANHACO-REI, 216, JARDIM SANTA ALICE, ARAPONGAS - PR', NULL, NULL, NULL, '26881855000162'),
(29, 'GENIVALDO BENEDITO DE ALMEIDA & CIA LTDA', 'RUA ASSAD CHADI, 810, VIAL GAZOLA, CANDIDO MOTA - SP', NULL, NULL, NULL, '07973649000138'),
(30, 'GUADAIM MOVEIS E ELETRODOMESTICOS LTDA', 'AVENIDA ARMANDO SALLES DE OLIVEIRA, 129, CENTRO, ASSIS - SP', NULL, NULL, NULL, '52867660000178'),
(31, 'ICOMAR - INDUSTRIA E COMERCIO DE MOVEIS LTDA', 'RUA FELIX JABUR, 386, CENTRO, CANDIDO MOTA - SP', NULL, NULL, NULL, '58517657000100'),
(32, 'IDEALLIZZE MOVEIS PLANEJADOS LTDA', 'RUA RONDONIA, 500, JARDIM PARANA II, ASTORGA - PR', NULL, NULL, NULL, '43983894000190'),
(33, 'KNR INDUSTRIA MOVELEIRA LTDA', 'AVENIDA ARVELINO DURANTE, 410, PQ INDUSTRIAL, SABAUDIA - PR', NULL, NULL, NULL, '05523967000171'),
(34, 'H. C. MOVEIS PLANEJADOS LTDA', 'AVENIDA JUVENCIO BARBOSA SILVEIRA (ZONA 19), 428, GIARDINO SAN MARCO, MARINGA - PR', NULL, NULL, NULL, '16744669000128'),
(35, 'MARCIO APARECIDO FABRICIO PACHIERI LTDA', 'ESTRADA ARACA, 1881, PARQUE INDUSTRIAL BANDEIRANTES, MARINGA - PR', NULL, NULL, NULL, '37920005000142'),
(36, 'RONALDO ALVES LEAL DA SILVA 26228875825', 'RUA SATURNO (JD SATELITE), 07, COOPERATIVA, SAO BERNARDO DO CAMPO - SP', NULL, NULL, NULL, '26726154000159'),
(37, 'FERREIRA PORTO MARCENARIA LTDA', 'RUA SAO CAETANO, 330, JARDIM ALVORADA, CANDIDO MOTA - SP', NULL, NULL, NULL, '32245307000149'),
(38, 'RODRIZAN INDUSTRIA E COMERCIO DE MOVEIS LTDA', 'RUA ANTONIO PESCADOR, 197, PARQ. INDUSTRIAL III, SERTANOPOLIS - PR', NULL, NULL, NULL, '86723129000143'),
(39, 'RUD RACK INDUSTRIA E COMERCIO DE MOVEIS LTDA.', 'RUA HUNGRIA, 2270, MANOEL MULLER, ROLANDIA - PR', NULL, NULL, NULL, '00781215000197'),
(40, 'A. P. GARCIA JUNIOR & CIA LTDA', 'RUA SAO JOSE, 180, JD. SANTA IZABEL, CAMBE - PR', NULL, NULL, NULL, '03438869000100'),
(41, 'THIAGO MUELLER PLANEJADOS LTDA.', 'RUA MARIO VINCI, 326, PARQUE INDUSTRIAL RICIERI RESQUETTI, ASTORGA - PR', NULL, NULL, NULL, '17944953000100'),
(42, 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'RODOVIA CELSO GARCIA CID, 3073, JD RIVIERA, CAMBE - PR', NULL, NULL, NULL, '03766882000270'),
(43, 'VAZ MOVELARIA INDUSTRIA E COMERCIO LTDA', 'RUA ARTHUR BOCATTO, 111, JARDIM VO ZEZINHO, CAMBE - PR', NULL, NULL, NULL, '13688870000147'),
(44, 'BMD MOVELARIA LTDA', 'RUA CATORRITA, 220, JARDIM DO SOL, ARAPONGAS - PR', NULL, NULL, NULL, '29337597000146'),
(45, 'VANESSA PIRES RAMOS PLANEJADOS', 'RUA SANTOS, 257, JD QUEIROZ, CAMBE - PR', NULL, NULL, NULL, '41007743000170'),
(46, 'FABIO APARECIDO QUIEZI 00729294994', 'RUA CURRIQUEIRO-DO-CHAO, 179, JARDIM PORTAL DAS FLORES II, ARAPONGAS - PR', NULL, NULL, NULL, '27227674000180'),
(47, 'H VAZ BESSON MOVEIS', 'RUA EDUARDO DISPARO GOMES, 715, RESIDENCIAL ABUSSAFE, CAMBE - PR', NULL, NULL, NULL, '30433108000139'),
(48, 'MB MOVEIS PLANEJADOS LTDA', 'RUA NORUEGA, 501, CENTRO, CAMBE - PR', NULL, NULL, NULL, '20335768000123'),
(49, 'JPR INDUSTRIA E COMERCIO DE MOVEIS LTDA', 'RUA NORUEGA, 589, CENTRO, CAMBE - PR', NULL, NULL, NULL, '20229157000109'),
(50, 'REGINALDO FERNANDES BALIERO 02384125982', 'RUA ALMEIDA PORTO, 400, VILA OLIVEIRA, ROLANDIA - PR', NULL, NULL, NULL, '30517880000139'),
(51, 'MARCENARIA SANTA HELENA LTDA', 'RUA EUCLIDES DA CUNHA, 1297, CENTRO, ALTO PARANA - PR', NULL, NULL, NULL, '35797801000104'),
(52, 'CHIULE ARAUJO INDUSTRIA E COMERCIO DE MOVEIS LTDA', 'RUA PAVÃOZINHO DO PARÁ, 1985, PARQUE INDUSTRIAL II, ARAPONGAS - PR', NULL, NULL, NULL, '50462824000151'),
(53, 'SUCESSO TOTAL COMERCIO DE MOVEIS LTDA', 'RUA TOVACU, 576, VILA TRIANGULO, ARAPONGAS - PR', NULL, NULL, NULL, '50284842000271'),
(54, 'RAFAEL CHIULE MOVEIS PLANEJADOS', 'RUA TAPAJOS, 145, NOSSA SENHORA DA APARECIDA, ROLANDIA - PR', NULL, NULL, NULL, '35643349000126'),
(55, 'MOVEARA INDUSTRIA E COMERCIO DE MOVEIS LTDA', 'RUA BENTERERE DE PEITO CINZA, 115, PARQUE INDUSTRIAL II, ARAPONGAS - PR', NULL, NULL, NULL, '44897906000126'),
(56, 'RAFELI INDUSTRIA E COMERCIO DE MOVEIS PLANEJADOS LTDA', 'RUA GARRINCHA DO MATO GROSSO, 241, JARDIM VALE DAS PEROBAS, ARAPONGAS - PR', NULL, NULL, NULL, '28965476000186'),
(57, 'RAD & DANA MOVEIS PLANEJADOS LTDA', 'AVENIDA ARACI SOARES DOS SANTOS, 747, JARDIM NOVA LONDRINA, LONDRINA - PR', NULL, NULL, NULL, '14911171000187'),
(58, 'SIELLO\\\'S MOVELARIA LTDA', 'AVENIDA DOS PIONEIROS, 438, CENTRO, MANDAGUARI - PR', NULL, NULL, NULL, '07177863000188'),
(59, 'THIAGO PRIETO BRIQUES LTDA', 'RUA JOAO MAZETO, 190, PARQUE INDUSTRIAL II, COLORADO - PR', NULL, NULL, NULL, '23696036000157'),
(60, 'V PONCIANO SILVA - MOVEIS', 'RUA BEM-TE-VI-RAJADO, 57, CASA FAMILIA ARAPONGAS I, ARAPONGAS - PR', NULL, NULL, NULL, '27163425000178'),
(61, 'LIPE - INDUSTRIA E COMERCIO DE MOVEIS LTDA', 'R HENRIQUE PAULA SILVA, 23, JARDIM PAINEIRAS, APUCARANA - PR', NULL, NULL, NULL, '80312887000192'),
(62, 'BELIMOVEIS IND E COM DE MOVEIS LTDA', 'RUA ALCATRAZ, 136, VILA INDUSTRIAL, ARAPONGAS - PR', NULL, NULL, NULL, '02691826000170'),
(63, 'FRATTO MOVEIS LTDA', 'RUA DO MOGNO, 685, CDA, ASSIS - SP', NULL, NULL, NULL, '02808002000137'),
(64, 'MARCELO RODELLA 26848386820', 'AVENIDA JOAO FLAUZINO BARBOSA, 210, PARQUE SANTA CRUZ, CANDIDO MOTA - SP', NULL, NULL, NULL, '33503869000108'),
(65, 'MAXIMA - MOVEIS PLANEJADOS LTDA', 'RUA BACURAU AMERICANO, 323, JARDIM PLANALTO, ARAPONGAS - PR', NULL, NULL, NULL, '12830101000179'),
(66, 'REALIZZA MOVEIS PLANEJADOS LTDA', 'RUA JACOMO VALERIO, 611, CENTRO, SABAUDIA - PR', NULL, NULL, NULL, '24235704000101'),
(67, 'SLE MOVEIS LTDA', 'RUA FOGO APAGOU, 150, JARDIM PRIMAVERA, ARAPONGAS - PR', NULL, NULL, NULL, '26798245000108'),
(68, 'A. S. CAMARA COMERCIO DE MOVEIS LTDA', 'RUA ESTORIL, 210, JARDIM SAO FRANCISCO DE ASSIS, LONDRINA - PR', NULL, NULL, NULL, '10202475000114'),
(69, '51.018.866 FABIO DIAS VELLOZO', 'RUA AGUIAS - DE 1801/1802 AO FIM, 2023, JARDIM CASA BRANCA, ARAPONGAS - PR', NULL, NULL, NULL, '51018866000160'),
(70, 'SALES & ZAGO LTDA', 'RUA FRANCISCO DELGADO SANCHES, 1063, JARDIM VITORIA, CAMBE - PR', NULL, NULL, NULL, '04857092000181'),
(71, 'SAMBI INDUSTRIA E COMERCIO DE MOVEIS LTDA', 'R TECELAO, 161, JARDIM BANDEIRANTES, ARAPONGAS - PR', NULL, NULL, NULL, '19046584000164'),
(72, 'ESPACO ADEQUADO LTDA', 'RUA CAETANO PERES CLABONDE, 73, PARQUE INDUSTRIAL ZONA OESTE II, APUCARANA - PR', NULL, NULL, NULL, '19272530000117'),
(73, 'N. BERLIN MARCENARIA', 'AVENIDA ALTO YPIRANGA, 390, VILA ALTO IPIRANGA, ALTO PARANA - PR', NULL, NULL, NULL, '19649903000126'),
(74, 'ZANI & BARROS LTDA', 'RUA JACOB BARTOLOMEU MINATTI, 490W, CENTRO, LONDRINA - PR', NULL, NULL, NULL, '34436830000188'),
(75, 'COSTA E CAMARGO MOVEIS LTDA.', 'RUA SALVINO DE SOUZA ANDRADE, 577, VILA SAO LUIZ, OURINHOS - SP', NULL, NULL, NULL, '09106052000111'),
(76, 'GAMYLE ILUMINACAO LTDA', 'R PADRE SEVERINO CERUTTI, 538, VILA SAO JOSE, APUCARANA - PR', NULL, NULL, NULL, '12592129000115'),
(77, 'L S G AMBIENTES PLANEJADOS LTDA', 'AVENIDA DOUTOR GASTAO VIDIGAL, 3035, JARDIM FREGADOLLI, MARINGA - PR', NULL, NULL, NULL, '28173654000136'),
(81, 'EDNALDO GOMES DE FARIAS 05580355742', 'AVENIDA PERIMETRAL PRUDENTE DE MORAIS, 760, VILA SAO LUIS, DUQUE DE CAXIAS - RJ', NULL, NULL, NULL, '23239351000155');

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
  `imagem_perfil` varchar(255) NOT NULL,
  `perfil_lado_esquerdo` varchar(255) NOT NULL,
  `usinagem_para_esquerdo` varchar(100) NOT NULL,
  `puxador_esquerdo` varchar(100) NOT NULL,
  `perfil_lado_direito` varchar(255) NOT NULL,
  `usinagem_para_direito` varchar(100) NOT NULL,
  `puxador_direito` varchar(100) NOT NULL,
  `perfil_lado_superior` varchar(255) NOT NULL,
  `usinagem_para_superior` varchar(100) NOT NULL,
  `puxador_superior` varchar(100) NOT NULL,
  `perfil_lado_inferior` varchar(255) NOT NULL,
  `usinagem_para_inferior` varchar(100) NOT NULL,
  `puxador_inferior` varchar(100) NOT NULL,
  `vidro` varchar(255) NOT NULL,
  `tv` varchar(5) DEFAULT NULL,
  `servicos` varchar(255) NOT NULL,
  `travessa` varchar(255) NOT NULL,
  `portas_pares` varchar(255) NOT NULL,
  `reforco` varchar(255) NOT NULL,
  `desempenador` varchar(255) DEFAULT NULL,
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
  `ap_fab_produzido` varchar(50) NOT NULL,
  `ap_fab_entregue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_ordem_producao`
--

INSERT INTO `tbl_ordem_producao` (`id`, `id_uniq`, `cliente`, `modo`, `qtd`, `altura`, `largura`, `imagem_perfil`, `perfil_lado_esquerdo`, `usinagem_para_esquerdo`, `puxador_esquerdo`, `perfil_lado_direito`, `usinagem_para_direito`, `puxador_direito`, `perfil_lado_superior`, `usinagem_para_superior`, `puxador_superior`, `perfil_lado_inferior`, `usinagem_para_inferior`, `puxador_inferior`, `vidro`, `tv`, `servicos`, `travessa`, `portas_pares`, `reforco`, `desempenador`, `esquadreta`, `ponteira`, `kit`, `valor_item_cliente`, `porcento_desconto`, `desconto`, `produto`, `prod_qtd`, `prod_usinagem_puxador`, `prod_valor_item_cliente`, `prod_porcento_desconto`, `prod_desconto`, `val_forma_pagamento`, `val_condicao_pagamento`, `val_situacao_financeira`, `val_qtd_portas`, `val_qtd_vidros`, `val_qtd_quadros`, `val_qtd_total`, `val_total_consumidor`, `val_valor_itens_clientes`, `val_porcento_desconto`, `val_desconto`, `val_frete`, `val_total_cliente`, `out_valor_itens_parceiro`, `out_porcento_desconto`, `out_desconto`, `out_total_parceiro`, `out_markup_parceiro`, `out_total_fabrica`, `out_markup_fabrica`, `obs_observacao_op`, `ap_cli_aprovacao_cliente`, `ap_cli_aprovacao_cliente_data`, `ap_cli_cliente_retira`, `ap_cli_pedido_parceiro`, `ap_parc_aprovacao_parceiro`, `ap_parc_andamento_parceiro`, `ap_parc_entregue_data`, `ap_parc_vendedor_interno`, `ap_parc_vendedor_externo`, `ap_parc_vendedor_pedido`, `ap_fab_aprovacao_fabrica`, `ap_fab_pedido_fabrica_data`, `ap_fab_andamento`, `ap_fab_entrou_producao_data`, `ap_fab_produzido`, `ap_fab_entregue`) VALUES
(45, '65400f1ca18b2', 'Fredy', 'Porta', 12, 16, 18, '', 'Nome Consulta 2', 'Sem Usinagem', '', 'Nome Consulta 2', 'Sem Usinagem', '', 'Nome Consulta 2', 'Sem Usinagem', '', 'Nome Consulta 2', 'Sem Usinagem', '', '', '0', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, '6540113cf351e', 'Name Cliente', 'Porta', 16, 78, 653, '', 'Descrição', 'Sem Usinagem', '', 'Descrição', 'Sem Usinagem', '', 'Descrição', 'Sem Usinagem', '', 'Descrição', 'Sem Usinagem', '', '', '0', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, '654011d1368d0', 'HJ Allúminios Update', 'Porta', 567, 56, 7, '', 'Descrição 22', 'Sem Usinagem', '', 'Descrição 22', 'Sem Usinagem', '', 'Descrição 22', 'Sem Usinagem', '', 'Descrição 22', 'Sem Usinagem', '', '', '0', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, '654633f56461f', 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'Porta', 12, 13, 14, '', '', 'Sem Usinagem', '', '', 'Sem Usinagem', '', '', 'Sem Usinagem', '', '', 'Sem Usinagem', '', '', '0', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, '6546343f21c71', 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'Porta', 1, 22, 23, '', '', 'Sem Usinagem', '', '', 'Sem Usinagem', '', '', 'Sem Usinagem', '', '', 'Sem Usinagem', '', '', '0', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, '65463baf6deb6', 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'Porta', 12, 67, 77, 'https://hjaluminio.com.br/sistema/perfil/upload/654639e1b9bcc.jpeg', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', '', '0', 'Rebaixo', '', '', '', '', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, '654643a190dee', 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'Porta', 1, 0, 0, 'https://hjaluminio.com.br/sistema/perfil/upload/654639e1b9bcc.jpeg', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', '', NULL, 'Rebaixo', '', '', '', NULL, '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, '65467831e9a30', 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'Porta', 1, 0, 0, 'https://hjaluminio.com.br/sistema/perfil/upload/654639e1b9bcc.jpeg', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', '', '1', 'Rebaixo', '', '', '', '1', '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, '65467a263b5e9', 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'Porta', 1, 0, 0, 'https://hjaluminio.com.br/sistema/perfil/upload/654639e1b9bcc.jpeg', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', '', NULL, 'Rebaixo', '', '', '', NULL, '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, '65467b388c23d', 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'Porta', 1, 0, 0, 'https://hjaluminio.com.br/sistema/perfil/upload/654639e1b9bcc.jpeg', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', '', NULL, 'Rebaixo', '', '', '', NULL, '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, '65467f00c70e1', 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'Porta', 1, 0, 0, 'https://hjaluminio.com.br/sistema/perfil/upload/654639e1b9bcc.jpeg', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', '', NULL, 'Rebaixo', '', '', '', NULL, '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, '6549579539768', 'TRIUNFAL COZINHAS E MODULADOS LTDA', 'Porta', 112, 6, 88, 'https://hjaluminio.com.br/sistema/perfil/upload/654639e1b9bcc.jpeg', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', '', NULL, 'Rebaixo', '', '', '', NULL, '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, '654a5fd69bc0e', '', 'Porta', 1, 0, 0, 'https://hjaluminio.com.br/sistema/perfil/upload/654639e1b9bcc.jpeg', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', 'Perfil 1', 'Sem Usinagem', '', '', NULL, 'Rebaixo', '', '', '', NULL, '', '', '', '', '', '', '', '', 'Usinagem Puxador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_do_item_agregar`
--

CREATE TABLE `tipo_do_item_agregar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codigo_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos_dos_clientes`
--
ALTER TABLE `pedidos_dos_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
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
-- AUTO_INCREMENT de tabela `tbl_clientes_system`
--
ALTER TABLE `tbl_clientes_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `tbl_ordem_producao`
--
ALTER TABLE `tbl_ordem_producao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
