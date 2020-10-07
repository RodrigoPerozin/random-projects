-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Out-2020 às 04:38
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_rodrigolanches`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `categoria` varchar(45) COLLATE utf8_bin NOT NULL,
  `preco` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`id`, `nome`, `descricao`, `categoria`, `preco`) VALUES
(4, 'Brigadeiro', 'Docinho', 'Doces', '4.00'),
(5, 'X-Bacon', 'Carne, queijo, bacon, milho', 'Hamburgueres', '15.20'),
(6, 'Coxinha de carne', 'Com recheio por dentro', 'Salgados', '6.00'),
(8, 'Batata frita', 'Com cheddar ou bacon', 'Acompanhamentos', '12.50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanchonete`
--

CREATE TABLE `lanchonete` (
  `horarioAbertura` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `horarioFechamento` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `lanchonete`
--

INSERT INTO `lanchonete` (`horarioAbertura`, `horarioFechamento`, `nome`) VALUES
('11:00', '20:00', 'Rodrigo Lanches');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido` text COLLATE utf8_bin NOT NULL,
  `formaPedido` tinyint(2) NOT NULL COMMENT '0 - local\n1 - delivery',
  `numeroCliente` int(10) UNSIGNED NOT NULL,
  `andamento` tinyint(2) NOT NULL COMMENT '0 - finalizado\r\n1 - Ativo',
  `nomeFuncionario` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `pedido`, `formaPedido`, `numeroCliente`, `andamento`, `nomeFuncionario`) VALUES
(5, '1 - Batata Frita\r\n2 - Coca-cola\r\n3 - Coxinha de carne', 1, 21, 0, 'Rodrigo'),
(6, '1 - Sprite\r\n2 - Açai\r\n3 - Batata frita', 0, 12, 1, 'Rodrigo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `senha` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(85) COLLATE utf8_bin NOT NULL,
  `permissao` tinyint(2) NOT NULL COMMENT '0 - funcionario\n1 - administrador\n2 - master',
  `inicioEspediente` varchar(5) COLLATE utf8_bin NOT NULL,
  `fimEspediente` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`, `permissao`, `inicioEspediente`, `fimEspediente`) VALUES
(1, 'Rodrigo', '202cb962ac59075b964b07152d234b70', 'rodrigo@gmail.com', 0, '13:00', '19:00'),
(3, 'Diego', '202cb962ac59075b964b07152d234b70', 'diego@gmail.com', 1, '13:00', '19:30'),
(4, 'Luiz', '202cb962ac59075b964b07152d234b70', 'luizinho@gmail.com', 0, '13:00', '19:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
