CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `produto` (`id`, `nome`) VALUES
	(13, 'Relé Eletromecânico'),
	(14, 'Almofada de Ganso Canadense'); 
