--
-- Estrutura da tabela `ll_galeria`
--

CREATE TABLE `ll_galeria` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`tipo` ENUM('0','1','2') NULL DEFAULT '0',
	`nome` VARCHAR(200) NULL DEFAULT NULL,
	`capa` INT(11) NULL DEFAULT NULL,
	`galeria` INT(5) NULL DEFAULT NULL,
	`data` VARCHAR(20) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;


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
