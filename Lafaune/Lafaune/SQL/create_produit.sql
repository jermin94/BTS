CREATE TABLE IF NOT EXISTS `produit` (
  `pdt_ref` varchar(3) NOT NULL DEFAULT '',
  `pdt_designation` varchar(50) DEFAULT NULL,
  `pdt_prix` decimal(5,0) DEFAULT NULL,
  `pdt_image` varchar(50) DEFAULT NULL,
  `pdt_categorie` varchar(3) DEFAULT NULL,
  `pdt_dimension` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`pdt_ref`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;