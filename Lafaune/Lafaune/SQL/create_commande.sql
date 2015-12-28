CREATE TABLE IF NOT EXISTS commande (
  cde_moment varchar(20) NOT NULL default '',
  cde_client varchar(5) NOT NULL default '',
  cde_date varchar(10) NOT NULL default '0000-00-00',
  PRIMARY KEY  (cde_moment,cde_client)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;