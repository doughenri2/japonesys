-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Abr-2017 às 15:59
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marmitexonline`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dessert`
--

CREATE TABLE `dessert` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dessert_name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `qtd_dessert` int(11) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dessert`
--

INSERT INTO `dessert` (`id`, `id_user`, `dessert_name`, `price`, `qtd_dessert`, `entry_date`) VALUES
(3, 2, 'teste sobremesa', '12,50', 2, '2017-03-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `drinks`
--

CREATE TABLE `drinks` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `drink_name` varchar(100) NOT NULL,
  `drink_price` varchar(10) NOT NULL,
  `qtd_drink` int(11) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `drinks`
--

INSERT INTO `drinks` (`id`, `id_user`, `drink_name`, `drink_price`, `qtd_drink`, `entry_date`) VALUES
(2, 2, 'dasdas', '12,50', 1, '0000-00-00'),
(3, 2, 'teste', '15,50', 1, '2017-03-16'),
(4, 2, 'teste', '15,50', 1, '2017-03-16'),
(5, 2, 'teste', '15,50', 1, '2017-03-16'),
(6, 2, 'teste', '15,50', 1, '2017-03-16'),
(7, 2, 'teste', '15,50', 1, '2017-03-16'),
(8, 2, 'teste', '15,50', 1, '2017-03-16'),
(9, 2, 'teste', '15,50', 1, '2017-03-16'),
(10, 2, 'teste', '15,50', 1, '2017-03-16'),
(11, 2, 'teste', '15,50', 1, '2017-03-16'),
(12, 2, 'teste', '15,50', 1, '2017-03-16'),
(13, 2, 'teste', '15,50', 1, '2017-03-16'),
(14, 2, 'teste', '15,50', 1, '2017-03-16'),
(15, 2, 'teste', '15,50', 1, '2017-03-16'),
(16, 2, 'teste', '15,50', 1, '2017-03-16'),
(17, 2, 'teste', '15,50', 1, '2017-03-16'),
(18, 2, 'teste', '15,50', 1, '2017-03-16'),
(19, 2, 'teste', '15,50', 1, '2017-03-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `neighborhood_taxes`
--

CREATE TABLE `neighborhood_taxes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nboor_name` varchar(100) NOT NULL,
  `nboor_tax` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `neighborhood_taxes`
--

INSERT INTO `neighborhood_taxes` (`id`, `id_user`, `nboor_name`, `nboor_tax`) VALUES
(5, 2, 'Vila Betânia', '120.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_method`) VALUES
(1, 'Dinheiro'),
(2, 'Cartão de Débito'),
(3, 'Cartão de Crédito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nome_telefone` varchar(100) NOT NULL,
  `tel_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `phones`
--

INSERT INTO `phones` (`id`, `id_user`, `nome_telefone`, `tel_number`) VALUES
(1, 1, 'teste tel 1', '(12)92803-5771'),
(2, 2, 'Tel ', '(12)98203-5771');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pots`
--

CREATE TABLE `pots` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `delivery_time` varchar(45) NOT NULL,
  `mini_size` varchar(45) NOT NULL,
  `normal_size` varchar(45) NOT NULL,
  `big_size` varchar(45) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pots`
--

INSERT INTO `pots` (`id`, `id_user`, `delivery_time`, `mini_size`, `normal_size`, `big_size`, `entry_date`) VALUES
(2, 2, '01:00', '10.00', '15.00', '20.00', '2017-03-13'),
(3, 1, '12:33', '123.33', '123.32', '2,321.21', '2017-03-04'),
(4, 1, '01:30', '10.00', '11.11', '12.00', '2017-03-05'),
(5, 2, '01:30', '20.00', '25.00', '30.00', '2017-03-14'),
(6, 2, '01:30', '10.00', '15.50', '20.00', '2017-03-16'),
(8, 2, '01:30', '10.00', '10.00', '10.00', '2017-03-27'),
(9, 2, '01:02', '10.00', '100.56', '100.14', '2017-03-28'),
(10, 2, '01:20', '10.00', '10.00', '10.00', '2017-04-02'),
(11, 2, '01:30', '10.00', '20.00', '30.00', '2017-04-03'),
(12, 2, '01:30', '50.00', '60.00', '12.00', '2017-04-09'),
(13, 2, '01:30', '10.00', '10.00', '10.00', '2017-04-17'),
(14, 2, '01:50', '15.00', '15.00', '15.00', '2017-04-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pots_asks`
--

CREATE TABLE `pots_asks` (
  `id` int(11) NOT NULL,
  `id_rice` int(11) NOT NULL,
  `id_bean` int(11) NOT NULL,
  `id_garrison` int(11) NOT NULL,
  `id_mixture` int(11) NOT NULL,
  `id_salad` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_dessert` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` varchar(250) NOT NULL,
  `entry_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pots_asks`
--

INSERT INTO `pots_asks` (`id`, `id_rice`, `id_bean`, `id_garrison`, `id_mixture`, `id_salad`, `id_size`, `id_dessert`, `id_user`, `id_company`, `entry_date`, `status`) VALUES
(2, 46, 14, 15, 14, 14, 1, 3, 12, 'c81e728d9d4c2f636f067f89cc14862c', '2017-04-19', 1),
(3, 46, 14, 15, 14, 14, 1, 3, 12, 'c81e728d9d4c2f636f067f89cc14862c', '2017-04-19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pots_beans`
--

CREATE TABLE `pots_beans` (
  `id` int(11) NOT NULL,
  `id_pot` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pots_beans`
--

INSERT INTO `pots_beans` (`id`, `id_pot`, `name`) VALUES
(2, 2, ''),
(3, 3, 'qwe'),
(4, 4, 'feijao 1'),
(5, 5, 'qa'),
(6, 6, 'feijao 1'),
(7, 7, 'teste'),
(8, 8, 'dasdas'),
(9, 9, 'dasds'),
(10, 10, 'teste'),
(11, 11, 'teste feijÃ£o 2'),
(12, 12, 'teste'),
(13, 13, 'dasdas'),
(14, 14, 'TESTE FEIJAO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pots_garrison`
--

CREATE TABLE `pots_garrison` (
  `id` int(11) NOT NULL,
  `id_pot` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pots_garrison`
--

INSERT INTO `pots_garrison` (`id`, `id_pot`, `name`) VALUES
(2, 2, ''),
(3, 3, ''),
(4, 4, 'guarnicao'),
(5, 5, 'ds'),
(6, 5, ''),
(7, 6, 'ga'),
(8, 7, 'te'),
(9, 8, 'dasdsa'),
(10, 9, 'dasa'),
(11, 10, 'teste'),
(12, 11, 'teste feijÃ£o 1'),
(13, 12, 'teste'),
(14, 13, 'dsdas'),
(15, 14, 'TESTE GUARNIÃ‡ÃƒO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pots_mixture`
--

CREATE TABLE `pots_mixture` (
  `id` int(11) NOT NULL,
  `id_pot` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pots_mixture`
--

INSERT INTO `pots_mixture` (`id`, `id_pot`, `name`) VALUES
(2, 2, ''),
(3, 3, ''),
(4, 4, 'teste mistura'),
(5, 5, 'dsadas'),
(6, 6, 'mistura 1'),
(7, 7, 'tes'),
(8, 8, 'das'),
(9, 9, 'dasdas'),
(10, 10, 'teste'),
(11, 11, 'teste feijÃ£o 1'),
(12, 12, 'teste'),
(13, 13, 'dasdas'),
(14, 14, 'TESTE MISTURA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pots_rice`
--

CREATE TABLE `pots_rice` (
  `id` int(11) NOT NULL,
  `id_pot` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pots_rice`
--

INSERT INTO `pots_rice` (`id`, `id_pot`, `name`) VALUES
(41, 9, 'teste2'),
(42, 10, 'tess'),
(43, 11, 'teste arroz 1'),
(44, 12, 'teste'),
(45, 13, 'aasddasdas'),
(46, 14, 'TESTE ARROZ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pots_salad`
--

CREATE TABLE `pots_salad` (
  `id` int(11) NOT NULL,
  `id_pot` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pots_salad`
--

INSERT INTO `pots_salad` (`id`, `id_pot`, `name`) VALUES
(2, 2, ''),
(3, 3, ''),
(4, 4, 'sala'),
(5, 5, 'ds'),
(6, 6, 'dasdasdas'),
(7, 7, 't'),
(8, 8, 'dasdas'),
(9, 9, 'dasds'),
(10, 10, 'teste'),
(11, 11, 'teste feijÃ£o 2'),
(12, 12, 'teste'),
(13, 13, 'dasdas'),
(14, 14, 'TESTE SALADA ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pots_sizes`
--

CREATE TABLE `pots_sizes` (
  `id` int(11) NOT NULL,
  `size_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pots_sizes`
--

INSERT INTO `pots_sizes` (`id`, `size_name`) VALUES
(1, 'MINI'),
(2, 'NORMAL'),
(3, 'GRANDE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pots_sizes_prices`
--

CREATE TABLE `pots_sizes_prices` (
  `id` int(11) NOT NULL,
  `id_pot` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `price` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `entry_date` date NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user_type`, `login`, `password`, `entry_date`, `user_status`) VALUES
(1, 2, 'doughenri_', '3b16dc694c38d04f7d7451cc37d3c654', '2017-02-28', 1),
(2, 1, 'douglas', '3b16dc694c38d04f7d7451cc37d3c654', '2017-02-28', 1),
(3, 1, 'doughenri2', '192b7d59c5d730d6eb0d1de112557b16', '2017-02-28', 1),
(4, 1, 'asd', 'f970e2767d0cfe75876ea857f92e319b', '2017-03-28', 1),
(5, 2, 'douglas2', '8d15c746644fad448fedaad6679f6c2e', '2017-03-28', 1),
(6, 1, 'douglas3', 'fcb55b136cbe5166b67772f60783d49a', '2017-03-28', 1),
(7, 3, 'teste@teste', '698dc19d489c4e4db73e28a713eab07b', '2017-04-18', 1),
(8, 3, 'teste@teste', '698dc19d489c4e4db73e28a713eab07b', '2017-04-18', 1),
(9, 3, 'teste@teste', '698dc19d489c4e4db73e28a713eab07b', '2017-04-18', 1),
(10, 3, 'teste@teste', '698dc19d489c4e4db73e28a713eab07b', '2017-04-18', 1),
(11, 3, 'teste@asuhdsauo', '698dc19d489c4e4db73e28a713eab07b', '2017-04-19', 1),
(12, 3, 'ronaldo@ronaldo.com', 'c5aa3124b1adad080927ce4d144c6b33', '2017-04-19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_buyer`
--

CREATE TABLE `user_buyer` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_buyer`
--

INSERT INTO `user_buyer` (`id`, `id_user`, `name`) VALUES
(1, 10, 'teste'),
(2, 11, 'teste'),
(3, 12, 'auhahua');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_f`
--

CREATE TABLE `user_f` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_cpf` varchar(100) NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_address` varchar(100) NOT NULL,
  `start_hour` varchar(45) NOT NULL,
  `finish_hour` varchar(45) NOT NULL,
  `make_delivery` tinyint(1) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(10) NOT NULL,
  `street` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `nboor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_f`
--

INSERT INTO `user_f` (`id`, `id_user`, `user_cpf`, `user_name`, `logo_address`, `start_hour`, `finish_hour`, `make_delivery`, `cep`, `city`, `uf`, `street`, `number`, `nboor`, `complement`) VALUES
(1, 1, '44527089862', 'Douglas Henrique', 'images/c4ca4238a0b923820dcc509a6f75849bgoogle.png', '03:00', '10:30', 1, '12245492', 'São José dos Campos', 'SP', 'Alameda José Alves de Siqueira Filho', 90, 'Vila Betânia', 'teste'),
(2, 5, '123.213.213-21', 'teasda', '', '', '', 0, '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_j`
--

CREATE TABLE `user_j` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_cnpj` varchar(100) NOT NULL,
  `social_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fantasy_name` varchar(100) NOT NULL,
  `logo_address` varchar(200) NOT NULL,
  `start_hour` varchar(45) NOT NULL,
  `finish_hour` varchar(45) NOT NULL,
  `make_delivery` tinyint(1) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(10) NOT NULL,
  `street` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `nboor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_j`
--

INSERT INTO `user_j` (`id`, `id_user`, `user_cnpj`, `social_name`, `fantasy_name`, `logo_address`, `start_hour`, `finish_hour`, `make_delivery`, `cep`, `city`, `uf`, `street`, `number`, `nboor`, `complement`) VALUES
(1, 2, '91.898.982/1989-82', 'Douglas Henrique LTDA1', 'Nome fantasia Douglas', 'images/c81e728d9d4c2f636f067f89cc14862cgoogle.png', '08:30', '18:30', 1, '12245492', 'São José dos Campos', 'SP', 'Alameda José Alves de Siqueira Filho', 90, 'Vila Betânia', 'casa'),
(2, 3, '12.321.321/0392-10', 'DOUGLAS HENRIQUE LTDA', 'douglasdjiaha ', '', '', '', 0, '', '', '', '', 0, '', ''),
(3, 4, '12.321.321/3213-21', 'assdadas', 'dsadasdas', '', '', '', 0, '', '', '', '', 0, '', ''),
(4, 6, '64.384.384/3848-34', 'dasdasdasdasá', 'dasdsadsa', '', '', '', 0, '12245492', 'São José dos Campos', 'SP', 'Alameda José Alves de Siqueira Filho', 0, 'Vila Betânia', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_payment_methods`
--

CREATE TABLE `user_payment_methods` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_payment_method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_types`
--

INSERT INTO `user_types` (`id`, `name`) VALUES
(1, 'Pessoa Jurídica'),
(2, 'Pessoa Física');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neighborhood_taxes`
--
ALTER TABLE `neighborhood_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots`
--
ALTER TABLE `pots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots_asks`
--
ALTER TABLE `pots_asks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots_beans`
--
ALTER TABLE `pots_beans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots_garrison`
--
ALTER TABLE `pots_garrison`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots_mixture`
--
ALTER TABLE `pots_mixture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots_rice`
--
ALTER TABLE `pots_rice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots_salad`
--
ALTER TABLE `pots_salad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots_sizes`
--
ALTER TABLE `pots_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pots_sizes_prices`
--
ALTER TABLE `pots_sizes_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_buyer`
--
ALTER TABLE `user_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_f`
--
ALTER TABLE `user_f`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_j`
--
ALTER TABLE `user_j`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payment_methods`
--
ALTER TABLE `user_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dessert`
--
ALTER TABLE `dessert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `neighborhood_taxes`
--
ALTER TABLE `neighborhood_taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pots`
--
ALTER TABLE `pots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pots_asks`
--
ALTER TABLE `pots_asks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pots_beans`
--
ALTER TABLE `pots_beans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pots_garrison`
--
ALTER TABLE `pots_garrison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pots_mixture`
--
ALTER TABLE `pots_mixture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pots_rice`
--
ALTER TABLE `pots_rice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `pots_salad`
--
ALTER TABLE `pots_salad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pots_sizes`
--
ALTER TABLE `pots_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pots_sizes_prices`
--
ALTER TABLE `pots_sizes_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_buyer`
--
ALTER TABLE `user_buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_f`
--
ALTER TABLE `user_f`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_j`
--
ALTER TABLE `user_j`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_payment_methods`
--
ALTER TABLE `user_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
