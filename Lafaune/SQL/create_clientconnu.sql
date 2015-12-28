CREATE TABLE IF NOT EXISTS `clientconnu` (
  `clt_code` varchar(5) NOT NULL DEFAULT '',
  `clt_nom` varchar(25) DEFAULT NULL,
  `clt_adresse` varchar(50) DEFAULT NULL,
  `clt_tel` varchar(15) DEFAULT NULL,
  `clt_email` varchar(50) DEFAULT NULL,
  `clt_motPasse` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`clt_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;