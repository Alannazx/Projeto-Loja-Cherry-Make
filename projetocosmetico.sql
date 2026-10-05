-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/10/2026 às 16:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetocosmetico`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `ativo`) VALUES
(1, 'Rosto', 1),
(2, 'Olhos', 1),
(3, 'Lábios', 1),
(4, 'Ferramenta e Acessorios', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cep` varchar(200) DEFAULT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `data_nascimento`, `email`, `cep`, `senha`) VALUES
(1, 'Cliente Thayssa', '123.456.789-10', '(21)98756-4321', NULL, 'thayssa123@gmail.com', 'Nova Iguaçu - 	RJ', ''),
(2, 'Cliente Anabelle', '456.123.798-20', '(21)91235-0987', NULL, 'belle321@gmail.com', 'Nova Iguaçu - 	RJ', ''),
(3, 'Alanna Félix', '552.879.621-90', '21987654321', '2008-08-27', 'alanna@gmail.com', '26291018', '$2y$10$.ss');

-- --------------------------------------------------------

--
-- Estrutura para tabela `entrada_mercadoria`
--

CREATE TABLE `entrada_mercadoria` (
  `id` int(11) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `mercadoria` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `entrada_mercadoria`
--

INSERT INTO `entrada_mercadoria` (`id`, `fornecedor`, `mercadoria`, `data`) VALUES
(2, 3, 'Embalagens de papelão p/ envios.', '2026-10-05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `item_fornecido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `cnpj`, `telefone`, `email`, `endereco`, `item_fornecido`) VALUES
(1, 'Nature Color Imports LTDA', '12.345.678/0001-90', '(31) 91234-1010', 'contatonature@gmail.com', 'Belo Horizonte - MG', 'Pigmentos, extratos e essências naturais'),
(2, 'Rei do Plástico LTDA ', '98.765.432/0002-90', '(11) 94002-8922', 'reidoplastico@email.com', 'São Paulo - SP', 'Embalagens dos produtos'),
(3, 'Império das Embalagens', '64.728.615/7366-36', '(21) 98945-6565', 'imperioembala@gmail.com', 'Duque de Caxias - RJ', 'Embalagens de envio e caixas dos produtos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota_fiscal_venda`
--

CREATE TABLE `nota_fiscal_venda` (
  `id` int(11) NOT NULL,
  `venda_id` int(11) NOT NULL,
  `modelo` varchar(5) NOT NULL,
  `serie` varchar(5) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `data_emissao` date NOT NULL,
  `valor_total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `estoque` int(11) NOT NULL DEFAULT 0,
  `preco` int(11) NOT NULL,
  `sku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `categoria_id`, `nome`, `marca`, `descricao`, `ativo`, `estoque`, `preco`, `sku`) VALUES
(1, 1, 'Base Matte Líquida - Skins', 'Cherry Make', 'Tons diversos', 1, 30, 50, 'BS-001'),
(2, 2, 'Paleta de Sombras - Cherry Blossom', 'Cherry Make', 'Paleta de diversos tons', 1, 25, 40, ''),
(3, 1, 'Pó Translúcido Matte - Cloud Touch', 'Cherry Make', NULL, 1, 25, 30, ''),
(4, 1, 'Corretivo líquido - Flawless', 'Cherry Make', 'Tons diversos', 1, 30, 40, ''),
(5, 2, 'Máscara de Cílios - Lash Drama', 'Cherry Make', NULL, 1, 20, 25, ''),
(6, 3, 'Batom Matte - Ruby Flame', 'Cherry Make', NULL, 1, 15, 20, ''),
(7, 4, 'Esponja de Maquiagem - Red Blend', 'Cherry Make', NULL, 1, 20, 10, ''),
(8, 1, 'Blush - Pinky Cheeks', 'Cherry Make', NULL, 1, 20, 25, ''),
(9, 1, 'Iluminador Prateado - Metalic Cherry', 'Cherry Make', NULL, 1, 20, 15, ''),
(11, 1, 'Gel de Sobrancelha - Beaty Brows', 'Cherry Make', NULL, 1, 20, 15, ''),
(12, 3, 'Gloss - Cherry Glow', 'Cherry Make', NULL, 1, 35, 30, ''),
(13, 2, 'Lápis de olho - Berry Eye', 'Cherry Make', NULL, 1, 15, 10, ''),
(14, 1, 'Spray Fixador de Maquiagem - Super Fix', 'Cherry Make', NULL, 1, 20, 20, ''),
(15, 2, 'Cílios Postiços - Dream Lashes', 'Cherry Make', NULL, 1, 35, 5, ''),
(16, 4, 'Kit Pincéis - Beauty Brushes', 'Cherry Make', 'Kit com 5 pincéis.', 1, 10, 45, ''),
(17, 3, 'Hidratante Labial - Lip Kiss', 'Cherry Make', NULL, 1, 25, 15, ''),
(18, 1, 'Paleta 3 em 1 - Berry Dreams', 'Cherry Make', 'Paleta 3 em 1', 1, 25, 30, ''),
(19, 4, 'Necessaire - Beauty Case', 'Cherry Make', NULL, 1, 15, 25, ''),
(20, 1, 'Blush - Rosé Kiss', 'Cherry Make', NULL, 1, 25, 25, ''),
(21, 3, 'Batom Líquido - Ruby', 'Cherry Make', NULL, 1, 30, 15, ''),
(22, 4, 'Curvex - Lash Curl', 'Cherry Make', NULL, 1, 15, 10, ''),
(23, 2, 'Delineador - Eye Crush', 'Cherry Make', NULL, 1, 30, 20, ''),
(24, 4, 'Espelho - Beauty Mirror', 'Cherry Make', NULL, 1, 15, 35, ''),
(25, 4, 'Faixa de cabelo - Sweet Band', 'Cherry Make', NULL, 1, 15, 10, ''),
(26, 1, 'Primer  - Velvet Blur', 'Cherry Make', NULL, 1, 25, 20, ''),
(27, 3, 'Gloss Rosa - Candy Gloss', 'Cherry Make', NULL, 1, 30, 25, ''),
(28, 1, 'Sérum Primer Hidratante  - Glass Skin', 'Cherry Make', NULL, 1, 20, 35, ''),
(29, 3, 'Gloss Vermelho - Love Potion', 'Cherry Make', NULL, 1, 25, 25, ''),
(30, 3, 'Cherry Mystery Box', 'Cherry Make', NULL, 1, 50, 50, ''),
(31, 4, 'Cola de Cílios - Super Glue', 'Cherry Make', NULL, 1, 15, 15, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `perfil` enum('admin','vendedor') NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `perfil`, `ativo`) VALUES
(1, 'Alanna', 'alannaescola3d@gmail.com', '$2y$10$Txc3aOjRwo/LvJ9vi9TB3.sUN0AuvpPnMqRi37RVQJqqurDMzPqqa', 'admin', 1),
(2, 'Leticia', 'leticiatxms@gmail.com', '$2y$10$oCTChs/XIMt1dd4Gq0x/0uE6J6fVWdD/pJb/DCmqmyxTvTpL5Tynm', 'admin', 1),
(9, 'Bruna', 'bruna@gmail.com', '$2y$10$QdectOdPwbIW/.3B604h9.gCZVW1rjzMvk02oHO7Cv3OalM9AOTl2', 'admin', 1),
(10, 'Lara', 'lara@gmail.com', '$2y$10$hLAYCoBw/ct3rYO2iMU9NOQIh25fFWq.iW/4Qy01IWG3475z9XAVe', 'admin', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 1,
  `vendedor_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `data`, `quantidade`, `vendedor_id`, `produto_id`, `created_at`) VALUES
(2, '2026-09-11', 5, 9, 17, '2026-09-11 14:42:21'),
(3, '2026-09-03', 1, 10, 12, '2026-09-11 14:42:35'),
(4, '2026-09-15', 2, 2, 30, '2026-09-15 11:15:04');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `entrada_mercadoria`
--
ALTER TABLE `entrada_mercadoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices de tabela `nota_fiscal_venda`
--
ALTER TABLE `nota_fiscal_venda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `venda_id` (`venda_id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `idx_nf_venda_data` (`data_emissao`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_categoria` (`categoria_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `entrada_mercadoria`
--
ALTER TABLE `entrada_mercadoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `nota_fiscal_venda`
--
ALTER TABLE `nota_fiscal_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `entrada_mercadoria`
--
ALTER TABLE `entrada_mercadoria`
  ADD CONSTRAINT `fk_entrada_fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `nota_fiscal_venda`
--
ALTER TABLE `nota_fiscal_venda`
  ADD CONSTRAINT `fk_nf_venda_venda` FOREIGN KEY (`venda_id`) REFERENCES `venda_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
