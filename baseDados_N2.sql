-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jun-2020 às 02:06
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

CREATE DATABASE n2;

USE n2;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_consulta`
--

CREATE TABLE `tb_consulta` (
  `id` int(11) NOT NULL,
  `crm` varchar(20) COLLATE utf8_bin NOT NULL,
  `cpf_paciente` varchar(14) COLLATE utf8_bin NOT NULL,
  `data_consulta` date NOT NULL,
  `horario` time NOT NULL,
  `diagnostico` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `tratamento` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `exames` varchar(500) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_consulta`
--

INSERT INTO `tb_consulta` (`id`, `crm`, `cpf_paciente`, `data_consulta`, `horario`, `diagnostico`, `tratamento`, `exames`) VALUES
(2, '12444343434', '43815861829', '2020-06-15', '00:23:10', 'O paciente está com virose.', 'Se hidratar, dramim e buscopan.', 'Solicitação de um exame de sangue');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_medico`
--

CREATE TABLE `tb_medico` (
  `crm` varchar(20) COLLATE utf8_bin NOT NULL,
  `nome_m` varchar(200) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(14) COLLATE utf8_bin NOT NULL,
  `dt_nasc` date NOT NULL,
  `nacionalidade` varchar(100) COLLATE utf8_bin NOT NULL,
  `especialidade` varchar(100) COLLATE utf8_bin NOT NULL,
  `celular` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `senha` varchar(30) COLLATE utf8_bin NOT NULL,
  `cep` varchar(14) COLLATE utf8_bin NOT NULL,
  `logradouro` varchar(100) COLLATE utf8_bin NOT NULL,
  `numero` varchar(10) COLLATE utf8_bin NOT NULL,
  `bairro` varchar(100) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(100) COLLATE utf8_bin NOT NULL,
  `estado` varchar(50) COLLATE utf8_bin NOT NULL,
  `complemento` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_medico`
--

INSERT INTO `tb_medico` (`crm`, `nome_m`, `cpf`, `dt_nasc`, `nacionalidade`, `especialidade`, `celular`, `email`, `senha`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `complemento`) VALUES
('12444343434', 'Fulano de Sicrano', '43815861829', '1998-11-02', 'Brasileiro', 'Clinico Geral', '11988888888', 'teste@gmail.com', '123', '05590-000', 'Rua Pereira do Lago', '24', 'Vila Gomes', 'SÃ£o Paulo', 'SP', '432');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_paciente`
--

CREATE TABLE `tb_paciente` (
  `cpf` varchar(14) COLLATE utf8_bin NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `dt_nasc` date NOT NULL,
  `sexo` varchar(10) COLLATE utf8_bin NOT NULL,
  `celular` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `convenio` varchar(100) COLLATE utf8_bin NOT NULL,
  `cep` varchar(14) COLLATE utf8_bin NOT NULL,
  `logradouro` varchar(100) COLLATE utf8_bin NOT NULL,
  `numero` varchar(10) COLLATE utf8_bin NOT NULL,
  `bairro` varchar(100) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(100) COLLATE utf8_bin NOT NULL,
  `estado` varchar(100) COLLATE utf8_bin NOT NULL,
  `complemento` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_paciente`
--

INSERT INTO `tb_paciente` (`cpf`, `nome`, `dt_nasc`, `sexo`, `celular`, `email`, `convenio`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `complemento`) VALUES
('23667569840', 'Lidiaaaaaaaa', '2020-02-01', 'Feminino', '11988888888', 'teste@teste.com', 'Bradesco', '12233250', 'Rua GalilÃ©ia', '2213', 'Bosque dos Eucaliptos', 'SÃ£o JosÃ© dos Campos', 'SP', 'teste');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_consulta`
--
ALTER TABLE `tb_consulta`
  ADD PRIMARY KEY (`id`) KEY_BLOCK_SIZE=10;

--
-- Indexes for table `tb_medico`
--
ALTER TABLE `tb_medico`
  ADD PRIMARY KEY (`crm`);

--
-- Indexes for table `tb_paciente`
--
ALTER TABLE `tb_paciente`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_consulta`
--
ALTER TABLE `tb_consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
