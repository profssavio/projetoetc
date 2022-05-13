--
-- Banco de Dados: `projetomodelodb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cpf` char(11) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `situacao` char(1) DEFAULT 'A',
  `sexo` char(1) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` int(11) NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `fk_tb_cliente_tb_usuario_idx` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfil`
--

CREATE TABLE IF NOT EXISTS `tb_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_perfil`
--

INSERT INTO `tb_perfil` (`perfil`) VALUES
('Administrador'),
('Funcionário'),
('Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `senha` varchar(42) NOT NULL,
  `perfil` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_tb_usuario_tb_perfil1_idx` (`perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;


--
-- Restrições para a tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD CONSTRAINT `fk_tb_cliente_tb_usuario` FOREIGN KEY (`usuario`) REFERENCES `tb_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_tb_usuario_tb_perfil1` FOREIGN KEY (`perfil`) REFERENCES `tb_perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

