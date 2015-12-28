CREATE TABLE IF NOT EXISTS contenir (
  cde_moment varchar(20) NOT NULL default '',
  cde_client varchar(5) NOT NULL default '',
  produit char(3) NOT NULL default '',
  quantite int(11) NOT NULL default '0',
  PRIMARY KEY  (cde_moment,cde_client,produit)
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;