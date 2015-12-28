CREATE TABLE IF NOT EXISTS `categorie` (
  `cat_code` varchar(3) NOT NULL DEFAULT '',
  `cat_libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cat_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;