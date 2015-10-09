--
-- Estrutura da tabela `ll_galeria`
--

CREATE TABLE IF NOT EXISTS `ll_galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` enum('0','1','2') DEFAULT '0',
  `nome` VARCHAR(200) NULL DEFAULT NULL,
  `capa` int(11) DEFAULT NULL,
  `galeria` int(5) DEFAULT NULL,
  `data` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Estrutura da tabela `ll_galeria_fotos`
--

CREATE TABLE IF NOT EXISTS `ll_galeria_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Estrutura da tabela `ll_galeria_videos`
--

CREATE TABLE IF NOT EXISTS `ll_galeria_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `galeria` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `descricao` varchar(252) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;
