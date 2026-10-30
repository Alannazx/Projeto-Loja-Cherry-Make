-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2026 às 14:15
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
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente_cpf` char(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pendente','pago','enviado','entregue','cancelado') NOT NULL DEFAULT 'pendente',
  `endereco_entrega` varchar(255) NOT NULL,
  `cep_entrega` varchar(9) DEFAULT NULL,
  `valor_frete` decimal(10,2) NOT NULL DEFAULT 0.00,
  `prazo_frete_dias` int(11) DEFAULT NULL,
  `forma_pagamento` enum('pix','cartao','boleto') NOT NULL DEFAULT 'pix',
  `valor_total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_item`
--

CREATE TABLE `pedido_item` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `variacao_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL
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
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `categoria_id`, `nome`, `marca`, `descricao`, `ativo`, `estoque`, `preco`) VALUES
(1, 1, 'Base Matte Líquida - Skins', 'Cherry Make', 'Base líquida com acabamento matte, ideal para deixar a pele com aparência uniforme e aveludada. Perfeita para compor maquiagens do dia a dia ou produções especiais.', 1, 30, 50),
(2, 2, 'Paleta de Sombras - Cherry Blossom', 'Cherry Make', 'Uma paleta de sombras inspirada na delicadeza das flores de cerejeira. Ideal para criar looks delicados, românticos ou marcantes para qualquer ocasião.', 1, 25, 40),
(3, 1, 'Pó Translúcido Matte - Cloud Touch', 'Cherry Make', 'Pó translúcido perfeito para finalizar a maquiagem, ajudar a controlar o brilho e proporcionar um acabamento matte suave e natural.', 1, 25, 30),
(4, 1, 'Corretivo líquido - Flawless', 'Cherry Make', 'Corretivo líquido ideal para disfarçar pequenas imperfeições e uniformizar a aparência da pele. Fácil de aplicar, combina perfeitamente com sua rotina de maquiagem.', 1, 30, 40),
(5, 2, 'Máscara de Cílios - Lash Drama', 'Cherry Make', 'Máscara de cílios para destacar o olhar e proporcionar uma aparência de cílios mais definidos e volumosos. O toque perfeito para completar sua maquiagem.', 1, 20, 25),
(6, 3, 'Batom Matte - Ruby Flame', 'Cherry Make', 'Batom matte com uma proposta intensa e elegante. Ideal para destacar os lábios e criar produções sofisticadas, modernas e cheias de personalidade.', 1, 15, 20),
(7, 4, 'Esponja de Maquiagem - Red Blend', 'Cherry Make', 'Esponja macia e prática, ideal para espalhar base, corretivo e outros produtos líquidos ou cremosos, ajudando a conquistar um acabamento uniforme.', 1, 20, 10),
(8, 1, 'Blush - Pinky Cheeks', 'Cherry Make', 'Blush perfeito para adicionar um toque rosado às bochechas e deixar a maquiagem com uma aparência mais delicada, alegre e natural.', 1, 20, 25),
(9, 1, 'Iluminador Prateado - Metalic Cherry', 'Cherry Make', 'Iluminador com proposta metálica prateada, ideal para realçar pontos estratégicos do rosto e adicionar um toque luminoso e moderno à maquiagem.', 1, 20, 15),
(11, 1, 'Gel de Sobrancelha - Beaty Brows', 'Cherry Make', 'Gel para ajudar a pentear, alinhar e manter os fios das sobrancelhas no lugar. Ideal para conquistar um visual organizado e valorizar o olhar.', 1, 20, 15),
(12, 3, 'Gloss - Cherry Glow', 'Cherry Make', 'Gloss labial inspirado no brilho das cerejas. Perfeito para deixar os lábios com aparência luminosa e um acabamento delicado, ideal para qualquer momento.', 1, 35, 30),
(13, 2, 'Lápis de olho - Berry Eye', 'Cherry Make', 'Lápis de olho prático para destacar o olhar e criar diferentes estilos de maquiagem. Ideal para produções discretas ou looks mais intensos.', 1, 15, 10),
(14, 1, 'Spray Fixador de Maquiagem - Super Fix', 'Cherry Make', 'Spray fixador desenvolvido para finalizar a maquiagem e ajudar a manter o visual por mais tempo. Um aliado para completar sua rotina de beleza.', 1, 20, 20),
(15, 2, 'Cílios Postiços - Dream Lashes', 'Cherry Make', 'Cílios postiços ideais para destacar o olhar e adicionar um efeito especial à maquiagem. Perfeitos para festas, eventos ou produções glamourosas.', 1, 35, 5),
(16, 4, 'Kit Pincéis - Beauty Brushes', 'Cherry Make', 'Kit de pincéis prático e versátil para auxiliar na aplicação e no acabamento da maquiagem. Ideal para espalhar produtos, esfumar sombras e criar diferentes makes.', 1, 10, 45),
(17, 3, 'Hidratante Labial - Lip Kiss', 'Cherry Make', 'Hidratante labial ideal para ajudar a manter os lábios macios e confortáveis. Perfeito para incluir na rotina de cuidados diários e antes da aplicação do batom.', 1, 25, 15),
(18, 1, 'Paleta 3 em 1 - Berry Dreams', 'Cherry Make', 'Paleta multifuncional pensada para facilitar sua rotina de beleza. Uma opção prática para criar diferentes combinações de maquiagem com mais criatividade.', 1, 25, 30),
(19, 4, 'Necessaire - Beauty Case', 'Cherry Make', 'Necessaire charmosa e prática para guardar maquiagens e acessórios de beleza. Ideal para organizar seus produtos em casa ou levá-los na bolsa durante passeios e viagens.', 1, 15, 25),
(20, 1, 'Blush - Rosé Kiss', 'Cherry Make', 'Blush com proposta delicada e romântica, ideal para adicionar um toque de cor às bochechas e proporcionar um visual fresco e harmonioso.', 1, 25, 25),
(21, 3, 'Batom Líquido - Ruby', 'Cherry Make', 'Batom líquido ideal para destacar os lábios com elegância. Perfeito para completar produções modernas e criar um visual marcante em diferentes ocasiões.', 1, 30, 15),
(22, 4, 'Curvex - Lash Curl', 'Cherry Make', 'Acessório de maquiagem desenvolvido para curvar os cílios e realçar o olhar. Pode ser utilizado antes da máscara de cílios para ajudar a valorizar o resultado.', 1, 15, 10),
(23, 2, 'Delineador - Eye Crush', 'Cherry Make', 'Delineador ideal para criar traços delicados ou marcantes e destacar os olhos. Perfeito para quem gosta de experimentar diferentes estilos de maquiagem.', 1, 30, 20),
(24, 4, 'Espelho - Beauty Mirror', 'Cherry Make', 'Espelho prático para auxiliar na aplicação da maquiagem e nos cuidados diários com a pele. Um acessório indispensável para sua rotina de beleza.', 1, 15, 35),
(25, 4, 'Faixa de cabelo - Sweet Band', 'Cherry Make', 'Faixa de cabelo ideal para manter os fios afastados do rosto durante a maquiagem e os cuidados com a pele. Prática, confortável e charmosa.', 1, 15, 10),
(26, 1, 'Primer  - Velvet Blur', 'Cherry Make', 'Primer ideal para preparar a pele antes da maquiagem, ajudando a criar uma superfície mais uniforme para a aplicação dos próximos produtos.', 1, 25, 20),
(27, 3, 'Gloss - Candy Gloss', 'Cherry Make', 'Gloss rosa perfeito para adicionar brilho e um toque delicado de cor aos lábios. Ideal para maquiagens românticas, casuais ou cheias de charme.', 1, 30, 25),
(28, 1, 'Sérum Primer Hidratante  - Glass Skin', 'Cherry Make', 'Sérum primer desenvolvido para preparar a pele antes da maquiagem. Ideal para complementar a rotina de beleza e proporcionar uma aparência luminosa e bem cuidada.', 1, 20, 35),
(29, 3, 'Gloss - Love Potion', 'Cherry Make', 'Gloss vermelho que combina brilho e personalidade. Ideal para destacar os lábios e adicionar um toque ousado e sofisticado à sua produção.', 1, 30, 25),
(30, 3, 'Cherry Mystery Box', 'Cherry Make', 'Uma caixa surpresa especial para quem ama maquiagem! Uma seleção misteriosa de gloss para tornar sua experiência de compra ainda mais divertida.', 1, 50, 50),
(31, 4, 'Cola de Cílios - Super Glue', 'Cherry Make', 'Cola desenvolvida para auxiliar na fixação dos cílios postiços durante a maquiagem. Ideal para complementar sua produção e valorizar o resultado dos cílios.', 1, 15, 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `relatorio` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `relatorios`
--

INSERT INTO `relatorios` (`id`, `usuario_id`, `data`, `relatorio`, `created_at`) VALUES
(1, 1, '2026-09-28', 'Hoje vendi 50 produtinhos e bati a meta', '2026-09-28 12:24:47');

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


-- --------------------------------------------------------

--
-- Estrutura para tabela `variacao`
--

CREATE TABLE `variacao` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda_cliente`
--

CREATE TABLE `venda_cliente` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `status` enum('aberta','finalizada') NOT NULL DEFAULT 'aberta',
  `valor_total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedido_item`
--
ALTER TABLE `pedido_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `variacao_id` (`variacao_id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_categoria` (`categoria_id`);

--
-- Índices de tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_relatorio_usuario` (`usuario_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `variacao`
--
ALTER TABLE `variacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `venda_cliente`
--
ALTER TABLE `venda_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_venda_usuario` (`usuario_id`),
  ADD KEY `idx_venda_cliente` (`cliente_id`),
  ADD KEY `idx_venda_data` (`data`),
  ADD KEY `idx_venda_status` (`status`);

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
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_item`
--
ALTER TABLE `pedido_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `variacao`
--
ALTER TABLE `variacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `venda_cliente`
--
ALTER TABLE `venda_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Restrições para tabelas `pedido_item`
--
ALTER TABLE `pedido_item`
  ADD CONSTRAINT `fk_pedido_item_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `fk_pedido_item_variacao` FOREIGN KEY (`variacao_id`) REFERENCES `variacao` (`id`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `relatorios`
--
ALTER TABLE `relatorios`
  ADD CONSTRAINT `fk_relatorio_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `variacao`
--
ALTER TABLE `variacao`
  ADD CONSTRAINT `fk_variacao_produto` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Restrições para tabelas `venda_cliente`
--
ALTER TABLE `venda_cliente`
  ADD CONSTRAINT `fk_venda_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_venda_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
