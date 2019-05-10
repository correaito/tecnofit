-- --------------------------------------------------------

--
-- Estrutura para tabela `familias`
--

CREATE TABLE `familias` (
  `familia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL,
  `sigla` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `familias`
--

INSERT INTO `familias` (`familia`, `id`, `sigla`) VALUES
('Suco', 1, 'SUC');

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `grupo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL,
  `sigla` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `familia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `grupos`
--

INSERT INTO `grupos` (`grupo`, `id`, `sigla`, `familia`) VALUES
('Natural', 2, 'NAT', 'SUC'),
('Batida', 3, 'BAT', 'SUC'),
('Energetico', 4, 'ENE', 'SUC');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vtotal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `data`, `numero`, `vtotal`) VALUES
(43, '2019-05-06', '0000002', '63.50'),
(42, '2019-05-06', '0000001', '43.50'),
(49, '2019-05-08', '0000004', '15,50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `prodt_pedido`
--

CREATE TABLE `prodt_pedido` (
  `id` int(11) NOT NULL,
  `quantidade` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vunitario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vtotal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pedido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_produto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `prodt_pedido`
--

INSERT INTO `prodt_pedido` (`id`, `quantidade`, `vunitario`, `vtotal`, `pedido`, `id_produto`) VALUES
(99, '1', '30,00', '30.00', '0000001', '7'),
(100, '1', '10,00', '10.00', '0000001', '8'),
(101, '1', '3,50', '3.50', '0000001', '1'),
(102, '1', '15,00', '15.00', '0000002', '6'),
(103, '1', '30,00', '30.00', '0000002', '7'),
(104, '1', '15,00', '15.00', '0000002', '5'),
(105, '1', '3,50', '3.50', '0000002', '1'),
(119, '1', '3,50', '3.50', '0000004', '1'),
(120, '1', '12,00', '12.00', '0000004', '16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `familia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grupo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `familia_ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grupo_ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`id`, `familia`, `grupo`, `tipo`, `descricao`, `preco`, `sku`, `codigo`, `familia_ref`, `grupo_ref`, `tipo_ref`) VALUES
(1, 'SUC', 'NAT', 'ABX', 'Suco natural de abacaxi 360ml', '3,50', 'SUCNATABX', '0001', 'Suco', 'Natural', 'Abacaxi'),
(5, 'SUC', 'NAT', 'ABX', 'Suco Natural de Abacaxi - Copo 350ml', '15,00', 'SUCNATABX', '0002', 'Suco', 'Natural', 'Abacaxi'),
(6, 'SUC', 'BAT', 'VIT', 'Suco Batida Vitaminada - Copo 350ml', '15,00', 'SUCBATVIT', '0001', 'Suco', 'Batida', 'Vitaminado'),
(7, 'SUC', 'NAT', 'ABX', 'Suco Natural de Abacaxi - Jarra 500ml', '30,00', 'SUCNATABX', '0003', 'Suco', 'Natural', 'Abacaxi'),
(8, 'SUC', 'ENE', 'MOR', 'Suco Energético de Morango Extra 350ml', '10,00', 'SUCENEMOR', '0001', 'Suco', 'Energetico', 'Morango'),
(16, 'SUC', 'NAT', 'ACE', 'Suco Natural de Acerola Teste - Copo 350ml', '12,00', 'SUCNATACE', '0001', 'Suco', 'Natural', 'Acerola');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipos`
--

CREATE TABLE `tipos` (
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL,
  `sigla` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `familia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grupo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `tipos`
--

INSERT INTO `tipos` (`tipo`, `id`, `sigla`, `familia`, `grupo`) VALUES
('Acerola', 3, 'ACE', 'SUC', 'NAT'),
('Abacaxi', 4, 'ABX', 'SUC', 'NAT'),
('Vitaminado', 5, 'VIT', 'SUC', 'BAT'),
('Shake', 6, 'SHA', 'SUC', 'BAT'),
('Morango', 8, 'MOR', 'SUC', 'ENE'),
('Chocolate', 7, 'CHO', 'SUC', 'ENE');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `prodt_pedido`
--
ALTER TABLE `prodt_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `prodt_pedido`
--
ALTER TABLE `prodt_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;