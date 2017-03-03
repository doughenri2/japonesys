-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2017 at 01:48 PM
-- Server version: 10.1.21-MariaDB
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
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `uf` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `neighborhood` varchar(100) NOT NULL,
  `complement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adresses`
--

INSERT INTO `adresses` (`id`, `id_user`, `cep`, `city`, `uf`, `street`, `number`, `neighborhood`, `complement`) VALUES
(1, 2, '12245492', 'SÃ£o JosÃ© dos Campos', 'SP', 'Alameda JosÃ© Alves de Siqueira Filho', 90, 'Vila BetÃ¢nia', 'casa'),
(2, 2, '12245492', 'SÃ£o JosÃ© dos Campos', 'SP', 'Alameda JosÃ© Alves de Siqueira Filho', 10, 'Vila BetÃ¢nia', 'desanda');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `drink_name` varchar(100) NOT NULL,
  `drink_price` varchar(10) NOT NULL,
  `qtd_drink` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nome_telefone` varchar(100) NOT NULL,
  `tel_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `login`, `password`, `entry_date`, `user_status`) VALUES
(1, 2, 'doughenri_', '3b16dc694c38d04f7d7451cc37d3c654', '2017-02-28', 1),
(2, 1, 'douglas', '3b16dc694c38d04f7d7451cc37d3c654', '2017-02-28', 1),
(3, 1, 'doughenri2', '192b7d59c5d730d6eb0d1de112557b16', '2017-02-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_f`
--

CREATE TABLE `user_f` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_cpf` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_f`
--

INSERT INTO `user_f` (`id`, `id_user`, `user_cpf`, `user_name`) VALUES
(1, 1, '445.270.898-62', 'Douglas Henrique');

-- --------------------------------------------------------

--
-- Table structure for table `user_j`
--

CREATE TABLE `user_j` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_cnpj` varchar(100) NOT NULL,
  `social_name` varchar(100) NOT NULL,
  `fantasy_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_j`
--

INSERT INTO `user_j` (`id`, `id_user`, `user_cnpj`, `social_name`, `fantasy_name`) VALUES
(1, 2, '91.898.982/1989-82', 'Douglas Henrique', 'douglas'),
(2, 3, '12.321.321/0392-10', 'DOUGLAS HENRIQUE LTDA', 'douglasdjiaha ');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`) VALUES
(1, 'Pessoa Jurídica'),
(2, 'Pessoa Física');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_f`
--
ALTER TABLE `user_f`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_j`
--
ALTER TABLE `user_j`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
