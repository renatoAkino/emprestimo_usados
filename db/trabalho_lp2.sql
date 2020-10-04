-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Out-2020 às 23:58
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabalho_lp2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_desc` varchar(255) NOT NULL,
  `item_img` varchar(255) NOT NULL,
  `item_status` varchar(20) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_desc`, `item_img`, `item_status`, `user_id`) VALUES
(3, 'tenis', 'tenis zica ', 'img/01.jpg', 'Disponivel', 1),
(6, 'viola', 'So p quem toca modÃ£o', 'img/02.jpg', 'Disponivel', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `loan`
--

CREATE TABLE `loan` (
  `id_loan` int(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `loan_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'admin', 'email', 'admin'),
(2, 'renato', 'renato', 'renato');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_item_user` (`user_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id_loan`),
  ADD KEY `fk_loan_user` (`user_id`),
  ADD KEY `fk_loan_item` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id_loan` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Limitadores para a tabela `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `fk_loan_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `fk_loan_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
